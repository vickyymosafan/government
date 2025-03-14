<?php

declare(strict_types=1);

namespace App\Http\Livewire\Services;

use App\Models\KtpRegistration;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class StatusCheck extends Component
{
    use WithPagination;

    public $searchTerm = '';
    public $filterStatus = '';
    public $perPage = 10;
    
    protected $queryString = [
        'searchTerm' => ['except' => ''],
        'filterStatus' => ['except' => ''],
        'perPage' => ['except' => 10],
    ];

    public function updatingSearchTerm()
    {
        $this->resetPage();
    }

    public function updatingFilterStatus()
    {
        $this->resetPage();
    }

    public function render()
    {
        $userId = Auth::id();
        
        $applications = KtpRegistration::where('user_id', $userId)
            ->when($this->searchTerm, function ($query) {
                return $query->where(function ($query) {
                    $query->where('nik', 'like', '%' . $this->searchTerm . '%')
                        ->orWhere('nama_lengkap', 'like', '%' . $this->searchTerm . '%');
                });
            })
            ->when($this->filterStatus, function ($query) {
                return $query->where('status', $this->filterStatus);
            })
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage);

        $statuses = [
            'PENDING' => 'Menunggu Verifikasi',
            'VERIFIED' => 'Terverifikasi',
            'PROCESSING' => 'Sedang Diproses',
            'READY' => 'Siap Diambil',
            'COMPLETED' => 'Selesai',
            'REJECTED' => 'Ditolak'
        ];

        return view('livewire.services.status-check', [
            'applications' => $applications,
            'statuses' => $statuses
        ]);
    }
}
