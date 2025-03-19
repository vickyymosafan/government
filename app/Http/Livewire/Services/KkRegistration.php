<?php

namespace App\Http\Livewire\Services;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\KkRegistration as KkRegistrationModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class KkRegistration extends Component
{
    use WithFileUploads;

    public $step = 1;

    // Step 1: Kepala Keluarga Data
    public $no_kk;
    public $nama_kepala_keluarga;
    public $jumlah_anggota;

    // Step 2: Address
    public $alamat;
    public $rt_rw;
    public $kelurahan;
    public $kecamatan;
    public $kota;
    public $provinsi;
    public $kode_pos;

    // Step 3: Documents
    public $dokumen_ktp;
    public $dokumen_akta;
    public $dokumen_pendukung;

    // Step 4: Agreement
    public $agreement = false;

    public function mount()
    {
        // Pre-fill name from authenticated user if available
        if (Auth::check()) {
            $this->nama_kepala_keluarga = Auth::user()->name;
        }
    }

    // Navigation methods
    public function nextStep()
    {
        $this->step++;
    }

    public function previousStep()
    {
        $this->step = max(1, $this->step - 1);
    }

    // Step submission methods
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
            'alamat' => 'required|string|max:200',
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
            'dokumen_ktp' => 'required|file|max:2048|mimes:jpeg,png,pdf',
            'dokumen_akta' => 'nullable|file|max:2048|mimes:jpeg,png,pdf',
            'dokumen_pendukung' => 'nullable|file|max:2048|mimes:jpeg,png,pdf'
        ]);

        $this->nextStep();
    }

    /**
     * Final form submission method (called from the agreement step)
     */
    public function submitRegistration()
    {
        $this->submit();
    }

    public function submit()
    {
        // Validate agreement
        $this->validate([
            'agreement' => 'accepted',
        ]);

        // Extract RT and RW from rt_rw field
        $rt_rw_parts = explode('/', $this->rt_rw);
        $rt = $rt_rw_parts[0] ?? '';
        $rw = $rt_rw_parts[1] ?? '';

        try {
            // Store files
            $dokumen_ktp_path = $this->dokumen_ktp->store('kk-registrations/dokumen-ktp', 'public');
            
            // Store optional files if provided
            $dokumen_akta_path = null;
            if ($this->dokumen_akta) {
                $dokumen_akta_path = $this->dokumen_akta->store('kk-registrations/dokumen-akta', 'public');
            }
            
            $dokumen_pendukung_path = null;
            if ($this->dokumen_pendukung) {
                $dokumen_pendukung_path = $this->dokumen_pendukung->store('kk-registrations/dokumen-pendukung', 'public');
            }

            // Save to database
            KkRegistrationModel::create([
                'no_kk' => $this->no_kk,
                'nama_kepala_keluarga' => $this->nama_kepala_keluarga,
                'jumlah_anggota' => $this->jumlah_anggota,
                'alamat' => $this->alamat,
                'rt' => $rt,
                'rw' => $rw,
                'kelurahan' => $this->kelurahan,
                'kecamatan' => $this->kecamatan,
                'kota' => $this->kota,
                'provinsi' => $this->provinsi,
                'kode_pos' => $this->kode_pos,
                'dokumen_ktp_path' => $dokumen_ktp_path,
                'dokumen_akta_path' => $dokumen_akta_path,
                'dokumen_pendukung_path' => $dokumen_pendukung_path,
                'status' => 'PENDING',
                'user_id' => Auth::id() // Associate with the authenticated user
            ]);

            // Reset form and show success message
            $this->reset();
            $this->step = 1;
            $this->dispatchBrowserEvent('registration-completed', [
                'message' => 'Pengajuan Kartu Keluarga berhasil dikirim. Silahkan cek status pengajuan secara berkala.'
            ]);
            $this->dispatch('registration-completed');
        } catch (\Exception $e) {
            // Handle error
            session()->flash('error', 'Terjadi kesalahan. Silahkan coba lagi.');
            logger()->error('KK Registration Error: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.services.kk-registration');
    }
}
