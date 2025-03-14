<div class="min-h-screen bg-slate-800 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto">
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="p-6 sm:p-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Profil Pengguna</h2>

                @if (session('message'))
                    <div class="alert alert-success mb-6">
                        {{ session('message') }}
                    </div>
                @endif

                <form wire:submit.prevent="updateProfile" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                            <input wire:model.blur="name" id="name" type="text" required 
                                class="input input-bordered w-full bg-gray-50 focus:bg-white" />
                            @error('name') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input wire:model.blur="email" id="email" type="email" required 
                                class="input input-bordered w-full bg-gray-50 focus:bg-white" />
                            @error('email') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="border-t border-gray-200 pt-6">
                        <h3 class="text-lg font-medium text-gray-800 mb-4">Ubah Password</h3>
                        <p class="text-sm text-gray-600 mb-4">Biarkan kosong jika tidak ingin mengubah password</p>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="current_password" class="block text-sm font-medium text-gray-700 mb-1">Password Saat Ini</label>
                                <input wire:model.blur="current_password" id="current_password" type="password" 
                                    class="input input-bordered w-full bg-gray-50 focus:bg-white" />
                                @error('current_password') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password Baru</label>
                                <input wire:model.blur="password" id="password" type="password" 
                                    class="input input-bordered w-full bg-gray-50 focus:bg-white" />
                                @error('password') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password Baru</label>
                                <input wire:model.blur="password_confirmation" id="password_confirmation" type="password" 
                                    class="input input-bordered w-full bg-gray-50 focus:bg-white" />
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end pt-4">
                        <button type="submit" class="btn btn-primary">
                            <span wire:loading.remove wire:target="updateProfile">Simpan Perubahan</span>
                            <span wire:loading wire:target="updateProfile">
                                <span class="loading loading-spinner loading-sm"></span>
                                Menyimpan...
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
