<div>
    <div class="bg-white shadow-lg rounded-lg p-8">
        <!-- Enhanced Progress Steps -->
        <div class="relative mb-12">
            <!-- Progress Bar -->
            @php
            $progressPercent = (($step-1)/4) * 100;
            $progressClass = 'w-[' . $progressPercent . '%]';
            @endphp
            <div class="absolute top-1/4 w-full h-1 bg-gray-200">
                <div class="h-full bg-blue-600 transition-all duration-300 {{ $progressClass }}"></div>
            </div>

            <!-- Step Circles -->
            <div class="flex justify-between relative">
                <div class="step flex flex-col items-center">
                    <div class="step-circle w-12 h-12 rounded-full flex items-center justify-center {{ $step >= 1 ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-600' }} font-bold text-lg shadow-md z-10">1</div>
                    <div class="step-text mt-3 text-sm font-medium {{ $step >= 1 ? 'text-blue-600' : 'text-gray-500' }}">Data Anak</div>
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

        <!-- Step 1: Child Data -->
        @if ($step == 1)
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-800">Data Anak</h2>
            <p class="text-gray-600">Masukkan data anak untuk pembuatan akta kelahiran</p>
        </div>

        <form wire:submit.prevent="submitStep1">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="form-group">
                    <label class="block text-gray-700 text-sm font-medium mb-2" for="nama_anak">Nama Lengkap Anak</label>
                    <input
                        id="nama_anak"
                        type="text"
                        wire:model="nama_anak"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                        placeholder="Masukkan nama lengkap anak"
                        required
                    >
                    @error('nama_anak') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label class="block text-gray-700 text-sm font-medium mb-2" for="jenis_kelamin">Jenis Kelamin</label>
                    <select
                        id="jenis_kelamin"
                        wire:model="jenis_kelamin"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                        required
                    >
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                    @error('jenis_kelamin') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label class="block text-gray-700 text-sm font-medium mb-2" for="tempat_lahir">Tempat Lahir</label>
                    <input
                        id="tempat_lahir"
                        type="text"
                        wire:model="tempat_lahir"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                        placeholder="Masukkan tempat lahir"
                        required
                    >
                    @error('tempat_lahir') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label class="block text-gray-700 text-sm font-medium mb-2" for="tanggal_lahir">Tanggal Lahir</label>
                    <input
                        id="tanggal_lahir"
                        type="date"
                        wire:model="tanggal_lahir"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                        required
                    >
                    @error('tanggal_lahir') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label class="block text-gray-700 text-sm font-medium mb-2" for="nama_ayah">Nama Ayah</label>
                    <input
                        id="nama_ayah"
                        type="text"
                        wire:model="nama_ayah"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                        placeholder="Masukkan nama ayah"
                        required
                    >
                    @error('nama_ayah') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label class="block text-gray-700 text-sm font-medium mb-2" for="nama_ibu">Nama Ibu</label>
                    <input
                        id="nama_ibu"
                        type="text"
                        wire:model="nama_ibu"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                        placeholder="Masukkan nama ibu"
                        required
                    >
                    @error('nama_ibu') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="flex justify-end mt-8">
                <button
                    type="submit"
                    class="px-6 py-3 bg-blue-600 text-white font-medium rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition-colors"
                >
                    Lanjut <span class="ml-2">→</span>
                </button>
            </div>
        </form>
        @endif

        <!-- Step 2: Address -->
        @if ($step == 2)
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-800">Alamat Tempat Tinggal</h2>
            <p class="text-gray-600">Masukkan alamat tempat tinggal</p>
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
                    class="px-6 py-3 bg-gray-200 text-gray-700 font-medium rounded-lg shadow-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-300 focus:ring-opacity-50 transition-colors"
                >
                    <span class="mr-2">←</span> Kembali
                </button>
                <button
                    type="submit"
                    class="px-6 py-3 bg-blue-600 text-white font-medium rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition-colors"
                >
                    Lanjut <span class="ml-2">→</span>
                </button>
            </div>
        </form>
        @endif

        <!-- Step 3: Documents -->
        @if ($step == 3)
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-800">Unggah Dokumen</h2>
            <p class="text-gray-600">Unggah dokumen pendukung untuk pembuatan akta kelahiran</p>
        </div>

        <form wire:submit.prevent="submitStep3">
            <div class="space-y-6">
                <div class="form-group">
                    <label class="block text-gray-700 text-sm font-medium mb-2" for="dokumen_kk">
                        Kartu Keluarga (KK) <span class="text-red-500">*</span>
                    </label>
                    <div class="mt-1 flex items-center">
                        <label class="w-full flex flex-col items-center px-4 py-6 bg-white text-blue-500 rounded-lg shadow-lg tracking-wide uppercase border border-blue-500 cursor-pointer hover:bg-blue-500 hover:text-white transition-colors">
                            <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                            </svg>
                            <span class="mt-2 text-base leading-normal">
                                {{ $dokumen_kk ? 'Ganti File' : 'Pilih File' }}
                            </span>
                            <input
                                id="dokumen_kk"
                                type="file"
                                wire:model="dokumen_kk"
                                class="hidden"
                                accept=".jpg,.jpeg,.png,.pdf"
                                required
                            >
                        </label>
                    </div>
                    <div class="mt-2">
                        @if ($dokumen_kk)
                            <p class="text-sm text-green-600">File dipilih: {{ $dokumen_kk->getClientOriginalName() }}</p>
                        @endif
                        <p class="text-xs text-gray-500">Format: JPG, PNG, PDF. Ukuran maksimal: 2MB</p>
                    </div>
                    @error('dokumen_kk') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label class="block text-gray-700 text-sm font-medium mb-2" for="dokumen_ktp_ayah">
                        KTP Ayah <span class="text-red-500">*</span>
                    </label>
                    <div class="mt-1 flex items-center">
                        <label class="w-full flex flex-col items-center px-4 py-6 bg-white text-blue-500 rounded-lg shadow-lg tracking-wide uppercase border border-blue-500 cursor-pointer hover:bg-blue-500 hover:text-white transition-colors">
                            <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                            </svg>
                            <span class="mt-2 text-base leading-normal">
                                {{ $dokumen_ktp_ayah ? 'Ganti File' : 'Pilih File' }}
                            </span>
                            <input
                                id="dokumen_ktp_ayah"
                                type="file"
                                wire:model="dokumen_ktp_ayah"
                                class="hidden"
                                accept=".jpg,.jpeg,.png,.pdf"
                                required
                            >
                        </label>
                    </div>
                    <div class="mt-2">
                        @if ($dokumen_ktp_ayah)
                            <p class="text-sm text-green-600">File dipilih: {{ $dokumen_ktp_ayah->getClientOriginalName() }}</p>
                        @endif
                        <p class="text-xs text-gray-500">Format: JPG, PNG, PDF. Ukuran maksimal: 2MB</p>
                    </div>
                    @error('dokumen_ktp_ayah') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label class="block text-gray-700 text-sm font-medium mb-2" for="dokumen_ktp_ibu">
                        KTP Ibu <span class="text-red-500">*</span>
                    </label>
                    <div class="mt-1 flex items-center">
                        <label class="w-full flex flex-col items-center px-4 py-6 bg-white text-blue-500 rounded-lg shadow-lg tracking-wide uppercase border border-blue-500 cursor-pointer hover:bg-blue-500 hover:text-white transition-colors">
                            <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                            </svg>
                            <span class="mt-2 text-base leading-normal">
                                {{ $dokumen_ktp_ibu ? 'Ganti File' : 'Pilih File' }}
                            </span>
                            <input
                                id="dokumen_ktp_ibu"
                                type="file"
                                wire:model="dokumen_ktp_ibu"
                                class="hidden"
                                accept=".jpg,.jpeg,.png,.pdf"
                                required
                            >
                        </label>
                    </div>
                    <div class="mt-2">
                        @if ($dokumen_ktp_ibu)
                            <p class="text-sm text-green-600">File dipilih: {{ $dokumen_ktp_ibu->getClientOriginalName() }}</p>
                        @endif
                        <p class="text-xs text-gray-500">Format: JPG, PNG, PDF. Ukuran maksimal: 2MB</p>
                    </div>
                    @error('dokumen_ktp_ibu') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label class="block text-gray-700 text-sm font-medium mb-2" for="dokumen_surat_lahir">
                        Surat Keterangan Lahir (Opsional)
                    </label>
                    <div class="mt-1 flex items-center">
                        <label class="w-full flex flex-col items-center px-4 py-6 bg-white text-blue-500 rounded-lg shadow-lg tracking-wide uppercase border border-blue-500 cursor-pointer hover:bg-blue-500 hover:text-white transition-colors">
                            <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                            </svg>
                            <span class="mt-2 text-base leading-normal">
                                {{ $dokumen_surat_lahir ? 'Ganti File' : 'Pilih File' }}
                            </span>
                            <input
                                id="dokumen_surat_lahir"
                                type="file"
                                wire:model="dokumen_surat_lahir"
                                class="hidden"
                                accept=".jpg,.jpeg,.png,.pdf"
                            >
                        </label>
                    </div>
                    <div class="mt-2">
                        @if ($dokumen_surat_lahir)
                            <p class="text-sm text-green-600">File dipilih: {{ $dokumen_surat_lahir->getClientOriginalName() }}</p>
                        @endif
                        <p class="text-xs text-gray-500">Format: JPG, PNG, PDF. Ukuran maksimal: 2MB</p>
                    </div>
                    @error('dokumen_surat_lahir') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label class="block text-gray-700 text-sm font-medium mb-2" for="dokumen_pendukung">
                        Dokumen Pendukung Lainnya (Opsional)
                    </label>
                    <div class="mt-1 flex items-center">
                        <label class="w-full flex flex-col items-center px-4 py-6 bg-white text-blue-500 rounded-lg shadow-lg tracking-wide uppercase border border-blue-500 cursor-pointer hover:bg-blue-500 hover:text-white transition-colors">
                            <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                            </svg>
                            <span class="mt-2 text-base leading-normal">
                                {{ $dokumen_pendukung ? 'Ganti File' : 'Pilih File' }}
                            </span>
                            <input
                                id="dokumen_pendukung"
                                type="file"
                                wire:model="dokumen_pendukung"
                                class="hidden"
                                accept=".jpg,.jpeg,.png,.pdf"
                            >
                        </label>
                    </div>
                    <div class="mt-2">
                        @if ($dokumen_pendukung)
                            <p class="text-sm text-green-600">File dipilih: {{ $dokumen_pendukung->getClientOriginalName() }}</p>
                        @endif
                        <p class="text-xs text-gray-500">Format: JPG, PNG, PDF. Ukuran maksimal: 2MB</p>
                    </div>
                    @error('dokumen_pendukung') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="flex justify-between mt-8">
                <button
                    type="button"
                    wire:click="previousStep"
                    class="px-6 py-3 bg-gray-200 text-gray-700 font-medium rounded-lg shadow-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-300 focus:ring-opacity-50 transition-colors"
                >
                    <span class="mr-2">←</span> Kembali
                </button>
                <button
                    type="submit"
                    class="px-6 py-3 bg-blue-600 text-white font-medium rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition-colors"
                >
                    Lanjut <span class="ml-2">→</span>
                </button>
            </div>
        </form>
        @endif

        <!-- Step 4: Confirmation -->
        @if ($step == 4)
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-800">Konfirmasi Data</h2>
            <p class="text-gray-600">Periksa kembali data yang telah dimasukkan sebelum mengirim</p>
        </div>

        <form wire:submit.prevent="submitRegistration">
            <div class="space-y-8">
                <!-- Child Data Summary -->
                <div class="bg-gray-50 rounded-lg p-6 shadow-sm">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Data Anak</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm font-medium text-gray-500">Nama Lengkap</p>
                            <p class="text-base text-gray-800">{{ $nama_anak }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Jenis Kelamin</p>
                            <p class="text-base text-gray-800">{{ $jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Tempat Lahir</p>
                            <p class="text-base text-gray-800">{{ $tempat_lahir }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Tanggal Lahir</p>
                            <p class="text-base text-gray-800">{{ \Carbon\Carbon::parse($tanggal_lahir)->format('d F Y') }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Nama Ayah</p>
                            <p class="text-base text-gray-800">{{ $nama_ayah }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Nama Ibu</p>
                            <p class="text-base text-gray-800">{{ $nama_ibu }}</p>
                        </div>
                    </div>
                </div>

                <!-- Address Summary -->
                <div class="bg-gray-50 rounded-lg p-6 shadow-sm">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Alamat</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="md:col-span-2">
                            <p class="text-sm font-medium text-gray-500">Alamat Lengkap</p>
                            <p class="text-base text-gray-800">{{ $alamat }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">RT/RW</p>
                            <p class="text-base text-gray-800">{{ $rt_rw }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Kelurahan/Desa</p>
                            <p class="text-base text-gray-800">{{ $kelurahan }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Kecamatan</p>
                            <p class="text-base text-gray-800">{{ $kecamatan }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Kota/Kabupaten</p>
                            <p class="text-base text-gray-800">{{ $kota }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Provinsi</p>
                            <p class="text-base text-gray-800">{{ $provinsi }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Kode Pos</p>
                            <p class="text-base text-gray-800">{{ $kode_pos }}</p>
                        </div>
                    </div>
                </div>

                <!-- Documents Summary -->
                <div class="bg-gray-50 rounded-lg p-6 shadow-sm">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Dokumen</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm font-medium text-gray-500">Kartu Keluarga (KK)</p>
                            <p class="text-base text-green-600">
                                <svg class="inline-block w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Diunggah
                            </p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">KTP Ayah</p>
                            <p class="text-base text-green-600">
                                <svg class="inline-block w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Diunggah
                            </p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">KTP Ibu</p>
                            <p class="text-base text-green-600">
                                <svg class="inline-block w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Diunggah
                            </p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Surat Keterangan Lahir</p>
                            <p class="text-base {{ $dokumen_surat_lahir ? 'text-green-600' : 'text-gray-400' }}">
                                @if ($dokumen_surat_lahir)
                                <svg class="inline-block w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Diunggah
                                @else
                                Tidak diunggah (opsional)
                                @endif
                            </p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Dokumen Pendukung Lainnya</p>
                            <p class="text-base {{ $dokumen_pendukung ? 'text-green-600' : 'text-gray-400' }}">
                                @if ($dokumen_pendukung)
                                <svg class="inline-block w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Diunggah
                                @else
                                Tidak diunggah (opsional)
                                @endif
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Agreement -->
                <div class="mt-6">
                    <label class="flex items-center">
                        <input type="checkbox" wire:model="agreement" class="form-checkbox h-5 w-5 text-blue-600">
                        <span class="ml-2 text-gray-700">Saya menyatakan bahwa data yang saya masukkan adalah benar dan dapat dipertanggungjawabkan</span>
                    </label>
                    @error('agreement') <span class="text-red-500 text-xs block mt-1">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="flex justify-between mt-8">
                <button
                    type="button"
                    wire:click="previousStep"
                    class="px-6 py-3 bg-gray-200 text-gray-700 font-medium rounded-lg shadow-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-300 focus:ring-opacity-50 transition-colors"
                >
                    <span class="mr-2">←</span> Kembali
                </button>
                <button
                    type="submit"
                    class="px-6 py-3 bg-green-600 text-white font-medium rounded-lg shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50 transition-colors"
                >
                    Kirim Pengajuan
                </button>
            </div>
        </form>
        @endif

        <!-- Success Modal -->
        <div
            x-data="{ show: false }"
            x-show="show"
            x-on:registration-completed.window="show = true; setTimeout(() => show = false, 5000)"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform scale-90"
            x-transition:enter-end="opacity-100 transform scale-100"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 transform scale-100"
            x-transition:leave-end="opacity-0 transform scale-90"
            class="fixed inset-0 flex items-center justify-center z-50"
            style="display: none;"
        >
            <div class="fixed inset-0 bg-black opacity-50"></div>
            <div class="bg-white rounded-lg p-8 max-w-md w-full mx-4 z-10 relative">
                <div class="flex items-center justify-center w-16 h-16 rounded-full bg-green-100 mx-auto mb-4">
                    <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 text-center mb-2">Pengajuan Berhasil!</h3>
                <p class="text-gray-600 text-center mb-6">Pengajuan Akta Kelahiran berhasil dikirim. Silahkan cek status pengajuan secara berkala.</p>
                <div class="flex justify-center">
                    <button
                        @click="show = false"
                        class="px-4 py-2 bg-blue-600 text-white font-medium rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition-colors"
                    >
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
