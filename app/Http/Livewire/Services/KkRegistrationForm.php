<?php

namespace App\Http\Livewire\Services;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\KkRegistration;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class KkRegistrationForm extends Component
{
    use WithFileUploads;

    public $step = 1;
    public $no_kk;
    public $nama_kepala_keluarga;
    public $jumlah_anggota;
    
    // Alamat properties
    public $alamat;
    public $rt_rw;
    public $kelurahan;
    public $kecamatan;
    public $kota;
    public $provinsi;
    public $kode_pos;
    
    // File properties
    public $ktp_file;
    public $kk_file;
    
    // Terms agreement
    public $terms = false;
    
    public function mount()
    {
        $this->step = 1;
    }
    
    public function nextStep()
    {
        $this->step++;
    }
    
    public function previousStep()
    {
        $this->step--;
    }
    
    public function submitStep1()
    {
        $this->validate([
            'no_kk' => 'nullable|digits:16|unique:kk_registrations,no_kk',
            'nama_kepala_keluarga' => 'required|string|max:100',
            'jumlah_anggota' => 'required|integer|min:1|max:20'
        ]);
        $this->nextStep();
    }
    
    public function submitStep2()
    {
        $this->validate([
            'alamat' => 'required|string|max:255',
            'rt_rw' => 'required|string|max:10',
            'kelurahan' => 'required|string|max:50',
            'kecamatan' => 'required|string|max:50',
            'kota' => 'required|string|max:50',
            'provinsi' => 'required|string|max:50',
            'kode_pos' => 'required|string|max:10'
        ]);
        $this->nextStep();
    }
    
    public function submitStep3()
    {
        $this->validate([
            'ktp_file' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'kk_file' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);
        $this->nextStep();
    }
    
    public function removeFile($field)
    {
        $this->$field = null;
    }
    
    public function submitRegistration()
    {
        $this->validate([
            'terms' => 'accepted',
        ]);
        
        // Process the KTP file
        $ktpPath = $this->ktp_file->store('ktp_files', 'public');
        
        // Process the KK file if it exists
        $kkPath = null;
        if ($this->kk_file) {
            $kkPath = $this->kk_file->store('kk_files', 'public');
        }
        
        // Create the registration record
        $registration = KkRegistration::create([
            'no_kk' => $this->no_kk,
            'nama_kepala_keluarga' => $this->nama_kepala_keluarga,
            'jumlah_anggota' => $this->jumlah_anggota,
            'alamat' => $this->alamat,
            'rt_rw' => $this->rt_rw,
            'kelurahan' => $this->kelurahan,
            'kecamatan' => $this->kecamatan,
            'kota' => $this->kota,
            'provinsi' => $this->provinsi,
            'kode_pos' => $this->kode_pos,
            'ktp_file' => $ktpPath,
            'kk_file' => $kkPath,
            'status' => 'pending',
            'user_id' => Auth::id(),
        ]);
        
        // Dispatch browser event to show success modal
        $this->dispatchBrowserEvent('registration-completed', [
            'message' => 'Pengajuan Kartu Keluarga berhasil dikirim. Nomor registrasi: ' . $registration->id
        ]);
        
        // Reset the form
        $this->reset([
            'step', 'no_kk', 'nama_kepala_keluarga', 'jumlah_anggota',
            'alamat', 'rt_rw', 'kelurahan', 'kecamatan', 'kota', 'provinsi', 'kode_pos',
            'ktp_file', 'kk_file', 'terms'
        ]);
        
        $this->step = 1;
    }
    
    public function render()
    {
        return view('livewire.services.kk-registration');
    }
}
