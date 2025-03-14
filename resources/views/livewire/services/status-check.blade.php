<div class="min-h-screen bg-slate-800 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto">
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="p-6 sm:p-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-6 pb-2 border-b border-gray-200">Status Pengajuan e-KTP</h2>

                <!-- Search and Filter Section -->
                <div class="mb-6 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="col-span-1 md:col-span-2">
                        <label for="searchTerm" class="sr-only">Cari berdasarkan NIK atau Nama</label>
                        <div class="relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                            <input wire:model.debounce.300ms="searchTerm" type="text" id="searchTerm" class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Cari berdasarkan NIK atau Nama">
                        </div>
                    </div>
                    <div>
                        <label for="filterStatus" class="sr-only">Filter Status</label>
                        <select wire:model="filterStatus" id="filterStatus" class="block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            <option value="">Semua Status</option>
                            @foreach($statuses as $key => $status)
                                <option value="{{ $key }}">{{ $status }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Status Cards -->
                @if($applications->isEmpty())
                    <div class="bg-blue-50 border-l-4 border-blue-400 p-4 mb-6">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-blue-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2h-1V9z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-blue-700">
                                    Belum ada pengajuan e-KTP yang terdaftar. Silakan ajukan permohonan baru melalui menu <a href="{{ route('services.ktp') }}" class="font-medium underline">Pendaftaran e-KTP</a>.
                                </p>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NIK</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Pengajuan</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Detail</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($applications as $application)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $application->nik }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $application->nama_lengkap }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $application->created_at->format('d M Y') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @php
                                            $statusColors = [
                                                'PENDING' => 'bg-yellow-100 text-yellow-800',
                                                'VERIFIED' => 'bg-blue-100 text-blue-800',
                                                'PROCESSING' => 'bg-indigo-100 text-indigo-800',
                                                'READY' => 'bg-green-100 text-green-800',
                                                'COMPLETED' => 'bg-green-100 text-green-800',
                                                'REJECTED' => 'bg-red-100 text-red-800'
                                            ];
                                            $statusColor = $statusColors[$application->status] ?? 'bg-gray-100 text-gray-800';
                                        @endphp
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $statusColor }}">
                                            {{ $statuses[$application->status] ?? $application->status }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <button x-data x-on:click="$dispatch('open-modal', {id: 'application-{{ $application->id }}'})" class="text-blue-600 hover:text-blue-900">Lihat Detail</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $applications->links() }}
                    </div>

                    <!-- Application Detail Modals -->
                    @foreach($applications as $application)
                    <div 
                        x-data="{ open: false }" 
                        x-show="open" 
                        x-on:open-modal.window="if ($event.detail.id === 'application-{{ $application->id }}') open = true" 
                        x-on:keydown.escape.window="open = false"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform scale-90"
                        x-transition:enter-end="opacity-100 transform scale-100"
                        x-transition:leave="transition ease-in duration-300"
                        x-transition:leave-start="opacity-100 transform scale-100"
                        x-transition:leave-end="opacity-0 transform scale-90"
                        class="fixed inset-0 z-50 overflow-y-auto" 
                        style="display: none;"
                    >
                        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                            <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 transition-opacity" aria-hidden="true">
                                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                            </div>

                            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                            <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                    <div class="sm:flex sm:items-start">
                                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                                            <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4 pb-2 border-b border-gray-200">
                                                Detail Pengajuan e-KTP
                                            </h3>
                                            <div class="mt-2 space-y-4">
                                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                                    <div>
                                                        <h4 class="text-sm font-medium text-gray-500">NIK</h4>
                                                        <p class="text-sm text-gray-900">{{ $application->nik }}</p>
                                                    </div>
                                                    <div>
                                                        <h4 class="text-sm font-medium text-gray-500">Nama Lengkap</h4>
                                                        <p class="text-sm text-gray-900">{{ $application->nama_lengkap }}</p>
                                                    </div>
                                                </div>
                                                
                                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                                    <div>
                                                        <h4 class="text-sm font-medium text-gray-500">Tempat Lahir</h4>
                                                        <p class="text-sm text-gray-900">{{ $application->tempat_lahir }}</p>
                                                    </div>
                                                    <div>
                                                        <h4 class="text-sm font-medium text-gray-500">Tanggal Lahir</h4>
                                                        <p class="text-sm text-gray-900">{{ \Carbon\Carbon::parse($application->tanggal_lahir)->format('d M Y') }}</p>
                                                    </div>
                                                </div>
                                                
                                                <div>
                                                    <h4 class="text-sm font-medium text-gray-500">Alamat</h4>
                                                    <p class="text-sm text-gray-900">{{ $application->alamat }}, RT {{ $application->rt }}/RW {{ $application->rw }}, {{ $application->kelurahan }}, {{ $application->kecamatan }}, {{ $application->kota }}, {{ $application->provinsi }} {{ $application->kode_pos }}</p>
                                                </div>
                                                
                                                <div>
                                                    <h4 class="text-sm font-medium text-gray-500">Status Pengajuan</h4>
                                                    <p class="text-sm mt-1">
                                                        <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $statusColors[$application->status] ?? 'bg-gray-100 text-gray-800' }}">
                                                            {{ $statuses[$application->status] ?? $application->status }}
                                                        </span>
                                                    </p>
                                                </div>
                                                
                                                @if($application->status === 'REJECTED')
                                                <div class="bg-red-50 border-l-4 border-red-400 p-4">
                                                    <div class="flex">
                                                        <div class="flex-shrink-0">
                                                            <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                                            </svg>
                                                        </div>
                                                        <div class="ml-3">
                                                            <p class="text-sm text-red-700">
                                                                Pengajuan ditolak. Silakan periksa kembali data Anda dan ajukan kembali.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                                
                                                @if($application->status === 'READY')
                                                <div class="bg-green-50 border-l-4 border-green-400 p-4">
                                                    <div class="flex">
                                                        <div class="flex-shrink-0">
                                                            <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                            </svg>
                                                        </div>
                                                        <div class="ml-3">
                                                            <p class="text-sm text-green-700">
                                                                e-KTP Anda sudah siap diambil. Silakan datang ke kantor Disdukcapil dengan membawa bukti pengajuan dan KTP lama (jika ada).
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                                
                                                <div>
                                                    <h4 class="text-sm font-medium text-gray-500">Tanggal Pengajuan</h4>
                                                    <p class="text-sm text-gray-900">{{ $application->created_at->format('d M Y H:i') }}</p>
                                                </div>
                                                
                                                @if($application->updated_at->diffInSeconds($application->created_at) > 60)
                                                <div>
                                                    <h4 class="text-sm font-medium text-gray-500">Terakhir Diperbarui</h4>
                                                    <p class="text-sm text-gray-900">{{ $application->updated_at->format('d M Y H:i') }}</p>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                    <button type="button" @click="open = false" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                                        Tutup
                                    </button>
                                    @if($application->status === 'REJECTED')
                                    <a href="{{ route('services.ktp') }}" class="mt-3 sm:mt-0 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                                        Ajukan Kembali
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif

                <div class="mt-8 flex justify-center">
                    <a href="{{ route('services.ktp') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Ajukan Permohonan Baru
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
