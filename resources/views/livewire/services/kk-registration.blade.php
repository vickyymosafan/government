<div>
    <div class="bg-white shadow-lg rounded-lg p-8">
        <!-- Enhanced Progress Steps -->
        <div class="relative mb-12">
            <!-- Progress Bar -->
            @php
            $progressPercent = (($step-1)/3) * 100;
            @endphp
            <div class="absolute top-1/4 w-full h-1.5 bg-gray-100 rounded-full">
                <div class="h-full bg-blue-600 rounded-full transition-all duration-500 ease-in-out" style="width: {{ $progressPercent }}%"></div>
            </div>

            <!-- Step Circles with Enhanced Animation -->
            <div class="flex justify-between relative">
                @foreach (['Data KK', 'Alamat', 'Dokumen', 'Konfirmasi'] as $index => $label)
                    <div class="step flex flex-col items-center">
                        <div class="step-circle w-12 h-12 rounded-full flex items-center justify-center 
                            {{ $step > ($index + 1) ? 'bg-green-500 text-white' : ($step == ($index + 1) ? 'bg-blue-600 text-white' : 'bg-white border-2 border-gray-300 text-gray-500') }} 
                            font-bold text-lg shadow-md z-10 transition-all duration-300 transform hover:scale-110">
                            @if($step > ($index + 1))
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            @else
                                {{ $index + 1 }}
                            @endif
                        </div>
                        <div class="step-text mt-3 text-sm font-medium 
                            {{ $step > ($index + 1) ? 'text-green-500' : ($step == ($index + 1) ? 'text-blue-600' : 'text-gray-500') }}
                            transition-colors duration-300">
                            {{ $label }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Step 1: KK Data -->
        @if ($step == 1)
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-800">Data Kartu Keluarga</h2>
            <p class="text-gray-600">Masukkan data Kepala Keluarga</p>
        </div>

        <form wire:submit.prevent="submitStep1">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="form-group">
                    <label class="block text-gray-700 text-sm font-medium mb-2" for="no_kk">Nomor KK (Opsional)</label>
                    <input
                        id="no_kk"
                        type="text"
                        wire:model="no_kk"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                        placeholder="Masukkan nomor KK jika ada"
                    >
                    @error('no_kk') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label class="block text-gray-700 text-sm font-medium mb-2" for="nama_kepala_keluarga">Nama Kepala Keluarga</label>
                    <input
                        id="nama_kepala_keluarga"
                        type="text"
                        wire:model="nama_kepala_keluarga"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                        placeholder="Masukkan nama kepala keluarga"
                        required
                    >
                    @error('nama_kepala_keluarga') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label class="block text-gray-700 text-sm font-medium mb-2" for="jumlah_anggota">Jumlah Anggota Keluarga</label>
                    <input
                        id="jumlah_anggota"
                        type="number"
                        wire:model="jumlah_anggota"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                        placeholder="Masukkan jumlah anggota keluarga"
                        min="1"
                        max="20"
                        required
                    >
                    @error('jumlah_anggota') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="flex justify-end mt-8">
                <button
                    type="submit"
                    class="group px-6 py-3 bg-blue-600 text-white font-medium rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition-all duration-300 transform hover:translate-x-1"
                >
                    Lanjut <span class="ml-2 group-hover:translate-x-1 transition-transform inline-block">→</span>
                </button>
            </div>
        </form>
        @endif

        <!-- Step 2: Address -->
        @if ($step == 2)
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-800">Alamat Tempat Tinggal</h2>
            <p class="text-gray-600">Masukkan alamat tempat tinggal keluarga</p>
        </div>

        <form wire:submit.prevent="submitStep2">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="form-group md:col-span-2">
                    <label class="block text-gray-700 text-sm font-medium mb-2" for="alamat">Alamat</label>
                    <textarea
                        id="alamat"
                        wire:model="alamat"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                        placeholder="Masukkan alamat lengkap"
                        rows="3"
                        required
                    ></textarea>
                    @error('alamat') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label class="block text-gray-700 text-sm font-medium mb-2" for="rt_rw">RT/RW</label>
                    <input
                        id="rt_rw"
                        type="text"
                        wire:model="rt_rw"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                        placeholder="Contoh: 001/002"
                        required
                    >
                    @error('rt_rw') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label class="block text-gray-700 text-sm font-medium mb-2" for="kelurahan">Kelurahan/Desa</label>
                    <input
                        id="kelurahan"
                        type="text"
                        wire:model="kelurahan"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                        placeholder="Masukkan kelurahan/desa"
                        required
                    >
                    @error('kelurahan') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label class="block text-gray-700 text-sm font-medium mb-2" for="kecamatan">Kecamatan</label>
                    <input
                        id="kecamatan"
                        type="text"
                        wire:model="kecamatan"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                        placeholder="Masukkan kecamatan"
                        required
                    >
                    @error('kecamatan') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label class="block text-gray-700 text-sm font-medium mb-2" for="kota">Kota/Kabupaten</label>
                    <input
                        id="kota"
                        type="text"
                        wire:model="kota"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                        placeholder="Masukkan kota/kabupaten"
                        required
                    >
                    @error('kota') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label class="block text-gray-700 text-sm font-medium mb-2" for="provinsi">Provinsi</label>
                    <input
                        id="provinsi"
                        type="text"
                        wire:model="provinsi"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                        placeholder="Masukkan provinsi"
                        required
                    >
                    @error('provinsi') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label class="block text-gray-700 text-sm font-medium mb-2" for="kode_pos">Kode Pos</label>
                    <input
                        id="kode_pos"
                        type="text"
                        wire:model="kode_pos"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                        placeholder="Masukkan kode pos"
                        required
                    >
                    @error('kode_pos') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="flex justify-between mt-8">
                <button
                    type="button"
                    wire:click="previousStep"
                    class="group px-6 py-3 bg-gray-200 text-gray-700 font-medium rounded-lg shadow-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-300 focus:ring-opacity-50 transition-all duration-300 transform hover:-translate-x-1"
                >
                    <span class="mr-2 group-hover:-translate-x-1 transition-transform inline-block">←</span> Kembali
                </button>
                <button
                    type="submit"
                    class="group px-6 py-3 bg-blue-600 text-white font-medium rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition-all duration-300 transform hover:translate-x-1"
                >
                    Lanjut <span class="ml-2 group-hover:translate-x-1 transition-transform inline-block">→</span>
                </button>
            </div>
        </form>
        @endif

        <!-- Step 3: Documents -->
        @if ($step == 3)
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-800">Dokumen Pendukung</h2>
            <p class="text-gray-600">Unggah dokumen pendukung untuk pembuatan Kartu Keluarga</p>
        </div>

        <form wire:submit.prevent="submitStep3">
            <div class="space-y-6">
                <div class="form-group">
                    <label class="block text-gray-700 text-sm font-medium mb-2" for="dokumen_ktp">KTP Kepala Keluarga</label>
                    <div class="flex items-center justify-center w-full">
                        <label for="dokumen_ktp" class="flex flex-col items-center justify-center w-full h-40 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition-colors duration-300">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                @if ($dokumen_ktp)
                                    <div class="flex items-center space-x-2 text-green-500">
                                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <p class="text-sm">{{ $dokumen_ktp->getClientOriginalName() }}</p>
                                    </div>
                                    <p class="mt-2 text-xs text-gray-500">Klik untuk mengganti</p>
                                @else
                                    <svg class="w-10 h-10 mb-3 text-gray-400 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500">Klik untuk unggah KTP</p>
                                    <p class="text-xs text-gray-500">PNG, JPG atau PDF (Maks. 2MB)</p>
                                @endif
                            </div>
                            <input id="dokumen_ktp" type="file" wire:model="dokumen_ktp" class="hidden" accept=".jpg,.jpeg,.png,.pdf" />
                        </label>
                    </div>
                    @error('dokumen_ktp') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label class="block text-gray-700 text-sm font-medium mb-2" for="dokumen_akta">Akta Kelahiran (Opsional)</label>
                    <div class="flex items-center justify-center w-full">
                        <label for="dokumen_akta" class="flex flex-col items-center justify-center w-full h-40 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition-colors duration-300">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                @if ($dokumen_akta)
                                    <div class="flex items-center space-x-2 text-green-500">
                                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <p class="text-sm">{{ $dokumen_akta->getClientOriginalName() }}</p>
                                    </div>
                                    <p class="mt-2 text-xs text-gray-500">Klik untuk mengganti</p>
                                @else
                                    <svg class="w-10 h-10 mb-3 text-gray-400 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500">Klik untuk unggah Akta Kelahiran</p>
                                    <p class="text-xs text-gray-500">PNG, JPG atau PDF (Maks. 2MB)</p>
                                @endif
                            </div>
                            <input id="dokumen_akta" type="file" wire:model="dokumen_akta" class="hidden" accept=".jpg,.jpeg,.png,.pdf" />
                        </label>
                    </div>
                    @error('dokumen_akta') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label class="block text-gray-700 text-sm font-medium mb-2" for="dokumen_pendukung">Dokumen Pendukung Lainnya (Opsional)</label>
                    <div class="flex items-center justify-center w-full">
                        <label for="dokumen_pendukung" class="flex flex-col items-center justify-center w-full h-40 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition-colors duration-300">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                @if ($dokumen_pendukung)
                                    <div class="flex items-center space-x-2 text-green-500">
                                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <p class="text-sm">{{ $dokumen_pendukung->getClientOriginalName() }}</p>
                                    </div>
                                    <p class="mt-2 text-xs text-gray-500">Klik untuk mengganti</p>
                                @else
                                    <svg class="w-10 h-10 mb-3 text-gray-400 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500">Klik untuk unggah dokumen lainnya</p>
                                    <p class="text-xs text-gray-500">PNG, JPG atau PDF (Maks. 2MB)</p>
                                @endif
                            </div>
                            <input id="dokumen_pendukung" type="file" wire:model="dokumen_pendukung" class="hidden" accept=".jpg,.jpeg,.png,.pdf" />
                        </label>
                    </div>
                    @error('dokumen_pendukung') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="flex justify-between mt-8">
                <button
                    type="button"
                    wire:click="previousStep"
                    class="group px-6 py-3 bg-gray-200 text-gray-700 font-medium rounded-lg shadow-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-300 focus:ring-opacity-50 transition-all duration-300 transform hover:-translate-x-1"
                >
                    <span class="mr-2 group-hover:-translate-x-1 transition-transform inline-block">←</span> Kembali
                </button>
                <button
                    type="submit"
                    class="group px-6 py-3 bg-blue-600 text-white font-medium rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition-all duration-300 transform hover:translate-x-1"
                >
                    Lanjut <span class="ml-2 group-hover:translate-x-1 transition-transform inline-block">→</span>
                </button>
            </div>
        </form>
        @endif

        <!-- Step 4: Confirmation -->
        @if ($step == 4)
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-800">Konfirmasi Data</h2>
            <p class="text-gray-600">Periksa kembali data yang telah dimasukkan</p>
        </div>

        <div class="space-y-6">
            <div class="bg-blue-50 p-4 rounded-lg border border-blue-200">
                <p class="text-blue-800 text-sm">Mohon periksa kembali data yang telah Anda masukkan sebelum melakukan pengajuan Kartu Keluarga.</p>
            </div>

            <!-- Data KK -->
            <div class="bg-white p-6 rounded-lg border border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800 mb-3">Data Kartu Keluarga</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @if ($no_kk)
                    <div>
                        <p class="text-sm text-gray-500 mb-1">Nomor KK</p>
                        <p class="font-medium">{{ $no_kk }}</p>
                    </div>
                    @endif
                    <div>
                        <p class="text-sm text-gray-500 mb-1">Nama Kepala Keluarga</p>
                        <p class="font-medium">{{ $nama_kepala_keluarga }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 mb-1">Jumlah Anggota Keluarga</p>
                        <p class="font-medium">{{ $jumlah_anggota }} orang</p>
                    </div>
                </div>
            </div>

            <!-- Alamat -->
            <div class="bg-white p-6 rounded-lg border border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800 mb-3">Alamat</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="md:col-span-2">
                        <p class="text-sm text-gray-500 mb-1">Alamat Lengkap</p>
                        <p class="font-medium">{{ $alamat }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 mb-1">RT/RW</p>
                        <p class="font-medium">{{ $rt_rw }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 mb-1">Kelurahan/Desa</p>
                        <p class="font-medium">{{ $kelurahan }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 mb-1">Kecamatan</p>
                        <p class="font-medium">{{ $kecamatan }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 mb-1">Kota/Kabupaten</p>
                        <p class="font-medium">{{ $kota }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 mb-1">Provinsi</p>
                        <p class="font-medium">{{ $provinsi }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 mb-1">Kode Pos</p>
                        <p class="font-medium">{{ $kode_pos }}</p>
                    </div>
                </div>
            </div>

            <!-- Dokumen -->
            <div class="bg-white p-6 rounded-lg border border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800 mb-3">Dokumen</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <p class="text-sm text-gray-500 mb-2">KTP Kepala Keluarga</p>
                        @if ($dokumen_ktp)
                            <div class="bg-gray-100 p-2 rounded text-sm">
                                <span class="font-medium">{{ $dokumen_ktp->getClientOriginalName() }}</span>
                            </div>
                        @endif
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 mb-2">Akta Kelahiran</p>
                        @if ($dokumen_akta)
                            <div class="bg-gray-100 p-2 rounded text-sm">
                                <span class="font-medium">{{ $dokumen_akta->getClientOriginalName() }}</span>
                            </div>
                        @else
                            <div class="bg-gray-100 p-2 rounded text-sm text-gray-500">
                                <span>Tidak ada</span>
                            </div>
                        @endif
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 mb-2">Dokumen Pendukung Lainnya</p>
                        @if ($dokumen_pendukung)
                            <div class="bg-gray-100 p-2 rounded text-sm">
                                <span class="font-medium">{{ $dokumen_pendukung->getClientOriginalName() }}</span>
                            </div>
                        @else
                            <div class="bg-gray-100 p-2 rounded text-sm text-gray-500">
                                <span>Tidak ada</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="mt-6">
                <label class="inline-flex items-center">
                    <input type="checkbox" wire:model="agreement" class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                    <span class="ml-2 text-sm text-gray-700">Saya menyatakan bahwa data yang saya berikan adalah benar dan dapat dipertanggungjawabkan</span>
                </label>
                @error('agreement') <div class="text-red-500 text-xs mt-1">{{ $message }}</div> @enderror
            </div>

            <div class="flex justify-between mt-8">
                <button
                    type="button"
                    wire:click="previousStep"
                    class="group px-6 py-3 bg-gray-200 text-gray-700 font-medium rounded-lg shadow-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-300 focus:ring-opacity-50 transition-all duration-300 transform hover:-translate-x-1"
                >
                    <span class="mr-2 group-hover:-translate-x-1 transition-transform inline-block">←</span> Kembali
                </button>
                <button
                    type="button"
                    wire:click="submitRegistration"
                    @if(!$agreement) disabled @endif
                    class="group px-6 py-3 bg-green-600 text-white font-medium rounded-lg shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50 transition-all duration-300 transform hover:scale-105 disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:scale-100"
                >
                    <span class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Kirim Pengajuan
                    </span>
                </button>
            </div>
        </div>
        @endif
    </div>

    <!-- Enhanced Success Modal -->
    <div x-data="{ showModal: false }"
        x-on:registration-completed.window="
            showModal = true;
            setTimeout(() => {
                window.location.href = '{{ route('services') }}';
            }, 5000);
        ">
        <div x-show="showModal" 
            class="fixed inset-0 bg-black bg-opacity-60 z-50 flex items-center justify-center p-4 backdrop-blur-sm"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0">
            <div class="bg-white rounded-xl max-w-md w-full p-8 shadow-2xl transform" 
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform scale-95 translate-y-4"
                x-transition:enter-end="opacity-100 transform scale-100 translate-y-0"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 transform scale-100 translate-y-0"
                x-transition:leave-end="opacity-0 transform scale-95 translate-y-4">
                <div class="text-center">
                    <div class="mx-auto flex items-center justify-center h-20 w-20 rounded-full bg-green-100 mb-6 animate-bounce">
                        <svg class="h-10 w-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">Pengajuan Berhasil!</h3>
                    <p class="text-gray-600" x-text="$event.detail?.message || 'Pengajuan Kartu Keluarga berhasil dikirim. Silahkan cek status pengajuan secara berkala.'"></p>
                    <div class="mt-6">
                        <div class="inline-flex items-center justify-center space-x-2">
                            <svg class="animate-spin h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            <p class="text-gray-500">Mengalihkan dalam <span x-data="{count: 5}" x-init="setInterval(() => { if (count > 0) count--; }, 1000)" x-text="count" class="font-bold"></span> detik...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
