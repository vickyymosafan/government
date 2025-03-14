<?php

namespace App\Http\Livewire\Services;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\KtpRegistration as KtpRegistrationModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class KtpRegistration extends Component
{
    use WithFileUploads;

    public $step = 1;

    // Step 1: Personal Data
    public $nik;
    public $nama_lengkap;
    public $tempat_lahir;
    public $tanggal_lahir;

    // Step 2: Address
    public $alamat;
    public $rt_rw;
    public $kelurahan;
    public $kecamatan;
    public $kota;
    public $provinsi;
    public $kode_pos;

    // Step 3: Documents
    public $foto_ktp;
    public $foto_diri;
    public $kartu_keluarga;

    // Step 4: Agreement
    public $agreement = false;

    public function mount()
    {
        // Pre-fill name from authenticated user if available
        if (Auth::check()) {
            $this->nama_lengkap = Auth::user()->name;
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
            'nik' => 'required|digits:16|unique:ktp_registrations,nik',
            'nama_lengkap' => 'required|string|max:100',
            'tempat_lahir' => 'required|string|max:50',
            'tanggal_lahir' => 'required|date|before:today'
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
            'foto_ktp' => 'required|image|max:2048',
            'foto_diri' => 'required|image|max:2048',
            'kartu_keluarga' => 'required|file|max:2048|mimes:jpeg,png,pdf'
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
            $foto_path = $this->foto_ktp->store('ktp-registrations/foto', 'public');
            $foto_diri_path = $this->foto_diri->store('ktp-registrations/foto-diri', 'public');
            $kartu_keluarga_path = $this->kartu_keluarga->store('ktp-registrations/kartu-keluarga', 'public');

            // Save to database
            KtpRegistrationModel::create([
                'nik' => $this->nik,
                'nama_lengkap' => $this->nama_lengkap,
                'tempat_lahir' => $this->tempat_lahir,
                'tanggal_lahir' => $this->tanggal_lahir,
                'jenis_kelamin' => 'L', // Default, adjust as needed
                'alamat' => $this->alamat,
                'rt' => $rt,
                'rw' => $rw,
                'kelurahan' => $this->kelurahan,
                'kecamatan' => $this->kecamatan,
                'kota' => $this->kota,
                'provinsi' => $this->provinsi,
                'kode_pos' => $this->kode_pos,
                'agama' => 'ISLAM', // Default, adjust as needed
                'status_perkawinan' => 'BELUM KAWIN', // Default, adjust as needed
                'pekerjaan' => '-', // Default, adjust as needed
                'kewarganegaraan' => 'WNI', // Default, adjust as needed
                'foto_path' => $foto_path,
                'foto_diri_path' => $foto_diri_path,
                'dokumen_pendukung_path' => $kartu_keluarga_path,
                'status' => 'PENDING',
                'user_id' => Auth::id() // Associate with the authenticated user
            ]);

            // Reset form and show success message
            $this->reset();
            $this->step = 1;
            // Coba dengan pendekatan berbeda
            $this->dispatchBrowserEvent('registration-completed', [
                'message' => 'Pengajuan KTP berhasil dikirim. Silahkan cek status pengajuan secara berkala.'
            ]);
            $this->dispatch('registration-completed'); // Tambahkan dispatch lagi untuk keamanan
        } catch (\Exception $e) {
            // Handle error
            session()->flash('error', 'Terjadi kesalahan. Silahkan coba lagi.');
            logger()->error('KTP Registration Error: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.services.ktp-registration');
    }
}
