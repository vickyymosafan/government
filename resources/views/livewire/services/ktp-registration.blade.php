<div>
    <div class="bg-white shadow-lg rounded-lg p-8">
        <!-- Enhanced Progress Steps -->
        <div class="relative mb-12">
            <!-- Progress Bar -->
            @php
            $progressPercent = (($step-1)/3) * 100;
            $progressClass = 'w-[' . $progressPercent . '%]';
            @endphp
            <div class="absolute top-1/4 w-full h-1 bg-gray-200">
                <div class="h-full bg-blue-600 transition-all duration-300 {{ $progressClass }}"></div>
            </div>

            <!-- Step Circles -->
            <div class="flex justify-between relative">
                <div class="step flex flex-col items-center">
                    <div class="step-circle w-12 h-12 rounded-full flex items-center justify-center {{ $step >= 1 ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-600' }} font-bold text-lg shadow-md z-10">1</div>
                    <div class="step-text mt-3 text-sm font-medium {{ $step >= 1 ? 'text-blue-600' : 'text-gray-500' }}">Data Pribadi</div>
                </div>
                <div class="step flex flex-col items-center">
                    <div class="step-circle w-12 h-12 rounded-full flex items-center justify-center {{ $step >= 2 ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-600' }} font-bold text-lg shadow-md z-10">2</div>
                    <div class="step-text mt-3 text-sm font-medium {{ $step >= 2 ? 'text-blue-600' : 'text-gray-500' }}">Alamat</div>
                </div>
                <div class="step flex flex-col items-center">
                    <div class="step-circle w-12 h-12 rounded-full flex items-center justify-center {{ $step >= 3 ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-600' }} font-bold text-lg shadow-md z-10">3</div>
                    <div class="step-text mt-3 text-sm font-medium {{ $step >= 3 ? 'text-blue-600' : 'text-gray-500' }}">Dokumen</div>
                </div>
                <div class="step flex flex-col items-center">
                    <div class="step-circle w-12 h-12 rounded-full flex items-center justify-center {{ $step >= 4 ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-600' }} font-bold text-lg shadow-md z-10">4</div>
                    <div class="step-text mt-3 text-sm font-medium {{ $step >= 4 ? 'text-blue-600' : 'text-gray-500' }}">Konfirmasi</div>
                </div>
            </div>
        </div>

        <!-- Rest of the code remains the same -->

        <!-- Step Title -->
        <h2 class="text-2xl font-bold text-gray-800 mb-6 pb-3 border-b border-gray-200">
            @if ($step == 1)
            Data Pribadi
            @elseif ($step == 2)
            Alamat
            @elseif ($step == 3)
            Dokumen
            @elseif ($step == 4)
            Konfirmasi
            @endif
        </h2>

        <!-- Step 1: Personal Data -->
        @if ($step == 1)
        <form wire:submit.prevent="submitStep1">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="form-group">
                    <label class="block text-gray-700 text-sm font-medium mb-2" for="nik">NIK</label>
                    <input
                        type="text"
                        id="nik"
                        wire:model="nik"
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200"
                        placeholder="Masukkan 16 digit NIK" />
                    @error('nik')
                    <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="block text-gray-700 text-sm font-medium mb-2" for="nama_lengkap">Nama Lengkap</label>
                    <input
                        type="text"
                        id="nama_lengkap"
                        wire:model="nama_lengkap"
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200"
                        placeholder="Nama sesuai KTP" />
                    @error('nama_lengkap')
                    <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="block text-gray-700 text-sm font-medium mb-2" for="tempat_lahir">Tempat Lahir</label>
                    <input
                        type="text"
                        id="tempat_lahir"
                        wire:model="tempat_lahir"
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200"
                        placeholder="Kota/Kabupaten tempat lahir" />
                    @error('tempat_lahir')
                    <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="block text-gray-700 text-sm font-medium mb-2" for="tanggal_lahir">Tanggal Lahir</label>
                    <input
                        type="date"
                        id="tanggal_lahir"
                        wire:model="tanggal_lahir"
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200" />
                    @error('tanggal_lahir')
                    <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="flex justify-end mt-8">
                <button
                    type="submit"
                    class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors duration-200 flex items-center">
                    Lanjutkan
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>
        </form>
        @endif

        <!-- Step 2: Address -->
        @if ($step == 2)
        <form wire:submit.prevent="submitStep2">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="form-group">
                    <label class="block text-gray-700 text-sm font-medium mb-2" for="alamat">Alamat</label>
                    <textarea
                        id="alamat"
                        wire:model="alamat"
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200"
                        placeholder="Alamat lengkap" rows="3"></textarea>
                    @error('alamat')
                    <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="block text-gray-700 text-sm font-medium mb-2" for="rt_rw">RT/RW</label>
                    <input
                        type="text"
                        id="rt_rw"
                        wire:model="rt_rw"
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200"
                        placeholder="000/000" />
                    @error('rt_rw')
                    <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="block text-gray-700 text-sm font-medium mb-2" for="kelurahan">Kelurahan/Desa</label>
                    <input
                        type="text"
                        id="kelurahan"
                        wire:model="kelurahan"
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200"
                        placeholder="Nama kelurahan/desa" />
                    @error('kelurahan')
                    <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="block text-gray-700 text-sm font-medium mb-2" for="kecamatan">Kecamatan</label>
                    <input
                        type="text"
                        id="kecamatan"
                        wire:model="kecamatan"
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200"
                        placeholder="Nama kecamatan" />
                    @error('kecamatan')
                    <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="block text-gray-700 text-sm font-medium mb-2" for="kota">Kabupaten/Kota</label>
                    <input
                        type="text"
                        id="kota"
                        wire:model="kota"
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200"
                        placeholder="Nama kabupaten/kota" />
                    @error('kota')
                    <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="block text-gray-700 text-sm font-medium mb-2" for="provinsi">Provinsi</label>
                    <input
                        type="text"
                        id="provinsi"
                        wire:model="provinsi"
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200"
                        placeholder="Nama provinsi" />
                    @error('provinsi')
                    <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="block text-gray-700 text-sm font-medium mb-2" for="kode_pos">Kode Pos</label>
                    <input
                        type="text"
                        id="kode_pos"
                        wire:model="kode_pos"
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200"
                        placeholder="00000" />
                    @error('kode_pos')
                    <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="flex justify-between mt-8">
                <button
                    type="button"
                    wire:click="previousStep"
                    class="px-6 py-3 bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium rounded-lg transition-colors duration-200 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Kembali
                </button>
                <button
                    type="submit"
                    class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors duration-200 flex items-center">
                    Lanjutkan
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>
        </form>
        @endif

        <!-- Step 3: Documents -->
        @if ($step == 3)
        <form wire:submit.prevent="submitStep3">
            <div class="space-y-6">
                <div class="form-group">
                    <label class="block text-gray-700 text-sm font-medium mb-2" for="foto_ktp">Foto KTP</label>
                    <div class="flex items-center justify-center w-full">
                        <label for="foto_ktp" class="flex flex-col items-center justify-center w-full h-40 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Klik untuk upload</span> atau drag and drop</p>
                                <p class="text-xs text-gray-500">PNG, JPG, atau PDF (Max. 2MB)</p>
                            </div>
                            <input id="foto_ktp" wire:model="foto_ktp" type="file" class="hidden" accept="image/png, image/jpeg, application/pdf" />
                        </label>
                    </div>
                    @error('foto_ktp')
                    <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                    @enderror
                    @if($foto_ktp)
                    <div class="mt-2 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        <span class="ml-2 text-sm text-gray-700">File berhasil diunggah</span>
                    </div>
                    @endif
                </div>

                <div class="form-group">
                    <label class="block text-gray-700 text-sm font-medium mb-2" for="foto_diri">Foto Diri (Selfie)</label>
                    <div class="flex items-center justify-center w-full">
                        <label for="foto_diri" class="flex flex-col items-center justify-center w-full h-40 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Klik untuk upload</span> atau drag and drop</p>
                                <p class="text-xs text-gray-500">PNG atau JPG (Max. 2MB)</p>
                            </div>
                            <input id="foto_diri" wire:model="foto_diri" type="file" class="hidden" accept="image/png, image/jpeg" />
                        </label>
                    </div>
                    @error('foto_diri')
                    <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                    @enderror
                    @if($foto_diri)
                    <div class="mt-2 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        <span class="ml-2 text-sm text-gray-700">File berhasil diunggah</span>
                    </div>
                    @endif
                </div>

                <div class="form-group">
                    <label class="block text-gray-700 text-sm font-medium mb-2" for="kartu_keluarga">Kartu Keluarga</label>
                    <div class="flex items-center justify-center w-full">
                        <label for="kartu_keluarga" class="flex flex-col items-center justify-center w-full h-40 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Klik untuk upload</span> atau drag and drop</p>
                                <p class="text-xs text-gray-500">PNG, JPG, atau PDF (Max. 2MB)</p>
                            </div>
                            <input id="kartu_keluarga" wire:model="kartu_keluarga" type="file" class="hidden" accept="image/png, image/jpeg, application/pdf" />
                        </label>
                    </div>
                    @error('kartu_keluarga')
                    <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                    @enderror
                    @if($kartu_keluarga)
                    <div class="mt-2 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        <span class="ml-2 text-sm text-gray-700">File berhasil diunggah</span>
                    </div>
                    @endif
                </div>
            </div>

            <div class="flex justify-between mt-8">
                <button
                    type="button"
                    wire:click="previousStep"
                    class="px-6 py-3 bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium rounded-lg transition-colors duration-200 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Kembali
                </button>
                <button
                    type="submit"
                    class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors duration-200 flex items-center">
                    Lanjutkan
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>
        </form>
        @endif

        <!-- Step 4: Confirmation -->
        @if ($step == 4)
        <div class="space-y-6">
            <div class="bg-blue-50 p-4 rounded-lg border border-blue-200">
                <p class="text-blue-800 text-sm">Mohon periksa kembali data yang telah Anda masukkan sebelum melakukan pengajuan KTP.</p>
            </div>

            <!-- Personal Data Summary -->
            <div class="bg-white p-6 rounded-lg border border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800 mb-3">Data Pribadi</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <p class="text-sm text-gray-500">NIK</p>
                        <p class="font-medium">{{ $nik ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Nama Lengkap</p>
                        <p class="font-medium">{{ $nama_lengkap ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Tempat Lahir</p>
                        <p class="font-medium">{{ $tempat_lahir ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Tanggal Lahir</p>
                        <p class="font-medium">{{ $tanggal_lahir ? date('d F Y', strtotime($tanggal_lahir)) : '-' }}</p>
                    </div>
                </div>
            </div>

            <!-- Address Summary -->
            <div class="bg-white p-6 rounded-lg border border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800 mb-3">Alamat</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="md:col-span-2">
                        <p class="text-sm text-gray-500">Alamat Lengkap</p>
                        <p class="font-medium">{{ $alamat ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">RT/RW</p>
                        <p class="font-medium">{{ $rt_rw ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Kelurahan/Desa</p>
                        <p class="font-medium">{{ $kelurahan ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Kecamatan</p>
                        <p class="font-medium">{{ $kecamatan ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Kabupaten/Kota</p>
                        <p class="font-medium">{{ $kota ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Provinsi</p>
                        <p class="font-medium">{{ $provinsi ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Kode Pos</p>
                        <p class="font-medium">{{ $kode_pos ?? '-' }}</p>
                    </div>
                </div>
            </div>

            <!-- Documents Summary -->
            <div class="bg-white p-6 rounded-lg border border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800 mb-3">Dokumen</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <p class="text-sm text-gray-500 mb-2">Foto KTP</p>
                        @if($foto_ktp)
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span class="ml-2 text-sm">Dokumen diunggah</span>
                        </div>
                        @else
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                            </svg>
                            <span class="ml-2 text-sm">Belum diunggah</span>
                        </div>
                        @endif
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 mb-2">Foto Diri</p>
                        @if($foto_diri)
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span class="ml-2 text-sm">Dokumen diunggah</span>
                        </div>
                        @else
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                            </svg>
                            <span class="ml-2 text-sm">Belum diunggah</span>
                        </div>
                        @endif
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 mb-2">Kartu Keluarga</p>
                        @if($kartu_keluarga)
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span class="ml-2 text-sm">Dokumen diunggah</span>
                        </div>
                        @else
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                            </svg>
                            <span class="ml-2 text-sm">Belum diunggah</span>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Checkbox for terms -->
            <div class="mt-6">
                <label class="inline-flex items-center">
                    <input type="checkbox" wire:model="agreement" class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                    <span class="ml-2 text-sm text-gray-700">Saya menyatakan bahwa data yang saya berikan adalah benar dan dapat dipertanggungjawabkan</span>
                </label>
                @error('agreement')
                <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-between mt-8">
                <button
                    type="button"
                    wire:click="previousStep"
                    class="px-6 py-3 bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium rounded-lg transition-colors duration-200 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Kembali
                </button>
                <button
                    type="button"
                    wire:click="submitRegistration"
                    wire:loading.attr="disabled"
                    wire:loading.class="opacity-75"
                    x-data="{}"
                    @registration-completed.window="$dispatch('show-modal')"
                    class="px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg transition-colors duration-200 flex items-center"
                    @if(!$agreement) disabled @endif
                    :class="{ 'opacity-50 cursor-not-allowed': !$agreement }">
                    <span wire:loading.remove>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Ajukan Permohonan
                    </span>
                    <span wire:loading>
                        <svg class="animate-spin h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Memproses...
                    </span>
                </button>
            </div>
        </div>
        @endif
    </div>

    <!-- Add this at the end of your file, just before the final closing </div> -->
    <div x-data="{ showModal: false }"
        x-on:registration-completed.window="
                showModal = true;
                setTimeout(() => showModal = false, 5000);
             ">
        <!-- Modal backdrop -->
        <div x-show="showModal"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 bg-black bg-opacity-50 z-40"
            x-cloak></div>

        <!-- Modal -->
        <div x-show="showModal"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform translate-y-4"
            x-transition:enter-end="opacity-100 transform translate-y-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 transform translate-y-0"
            x-transition:leave-end="opacity-0 transform translate-y-4"
            class="fixed inset-0 z-50 flex items-center justify-center"
            x-cloak>
            <div class="bg-white rounded-lg shadow-xl max-w-md mx-auto p-6 w-full">
                <div class="text-center">
                    <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-green-100 mb-4">
                        <svg class="h-10 w-10 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Pengajuan Berhasil!</h3>
                    <p class="text-sm text-gray-500 mb-4">Pengajuan KTP Anda telah berhasil dikirim. Silahkan cek status pengajuan secara berkala.</p>
                    <button @click="showModal = false" class="btn btn-primary">OK</button>
                </div>
            </div>
        </div>
    </div>
</div>