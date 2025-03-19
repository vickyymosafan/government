<?php

namespace App\Http\Livewire\Services;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\AktaRegistration as AktaRegistrationModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AktaRegistration extends Component
{
    use WithFileUploads;

    public $step = 1;

    // Step 1: Child Data
    public $nama_anak;
    public $jenis_kelamin;
    public $tempat_lahir;
    public $tanggal_lahir;
    public $nama_ayah;
    public $nama_ibu;

    // Step 2: Address
    public $alamat;
    public $rt_rw;
    public $kelurahan;
    public $kecamatan;
    public $kota;
    public $provinsi;
    public $kode_pos;

    // Step 3: Documents
    public $dokumen_kk;
    public $dokumen_ktp_ayah;
    public $dokumen_ktp_ibu;
    public $dokumen_surat_lahir;
    public $dokumen_pendukung;

    // Step 4: Agreement
    public $agreement = false;

    public function mount()
    {
        // Pre-fill data if user is authenticated
        if (Auth::check()) {
            $user = Auth::user();
            // You can pre-fill data here if needed
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
            'nama_anak' => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:L,P',
            'tempat_lahir' => 'required|string|max:50',
            'tanggal_lahir' => 'required|date|before:today',
            'nama_ayah' => 'required|string|max:100',
            'nama_ibu' => 'required|string|max:100',
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
            'dokumen_kk' => 'required|file|max:2048|mimes:jpeg,png,pdf',
            'dokumen_ktp_ayah' => 'required|file|max:2048|mimes:jpeg,png,pdf',
            'dokumen_ktp_ibu' => 'required|file|max:2048|mimes:jpeg,png,pdf',
            'dokumen_surat_lahir' => 'nullable|file|max:2048|mimes:jpeg,png,pdf',
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
            $dokumen_kk_path = $this->dokumen_kk->store('akta-registrations/dokumen-kk', 'public');
            $dokumen_ktp_ayah_path = $this->dokumen_ktp_ayah->store('akta-registrations/dokumen-ktp-ayah', 'public');
            $dokumen_ktp_ibu_path = $this->dokumen_ktp_ibu->store('akta-registrations/dokumen-ktp-ibu', 'public');
            
            // Store optional files if provided
            $dokumen_surat_lahir_path = null;
            if ($this->dokumen_surat_lahir) {
                $dokumen_surat_lahir_path = $this->dokumen_surat_lahir->store('akta-registrations/dokumen-surat-lahir', 'public');
            }
            
            $dokumen_pendukung_path = null;
            if ($this->dokumen_pendukung) {
                $dokumen_pendukung_path = $this->dokumen_pendukung->store('akta-registrations/dokumen-pendukung', 'public');
            }

            // Save to database
            AktaRegistrationModel::create([
                'nama_anak' => $this->nama_anak,
                'jenis_kelamin' => $this->jenis_kelamin,
                'tempat_lahir' => $this->tempat_lahir,
                'tanggal_lahir' => $this->tanggal_lahir,
                'nama_ayah' => $this->nama_ayah,
                'nama_ibu' => $this->nama_ibu,
                'alamat' => $this->alamat,
                'rt' => $rt,
                'rw' => $rw,
                'kelurahan' => $this->kelurahan,
                'kecamatan' => $this->kecamatan,
                'kota' => $this->kota,
                'provinsi' => $this->provinsi,
                'kode_pos' => $this->kode_pos,
                'dokumen_kk_path' => $dokumen_kk_path,
                'dokumen_ktp_ayah_path' => $dokumen_ktp_ayah_path,
                'dokumen_ktp_ibu_path' => $dokumen_ktp_ibu_path,
                'dokumen_surat_lahir_path' => $dokumen_surat_lahir_path,
                'dokumen_pendukung_path' => $dokumen_pendukung_path,
                'status' => 'PENDING',
                'user_id' => Auth::id() // Associate with the authenticated user
            ]);

            // Reset form and show success message
            $this->reset();
            $this->step = 1;
            $this->dispatchBrowserEvent('registration-completed', [
                'message' => 'Pengajuan Akta Kelahiran berhasil dikirim. Silahkan cek status pengajuan secara berkala.'
            ]);
            $this->dispatch('registration-completed');
        } catch (\Exception $e) {
            // Handle error
            session()->flash('error', 'Terjadi kesalahan. Silahkan coba lagi.');
            logger()->error('Akta Registration Error: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.services.akta-registration');
    }
}
