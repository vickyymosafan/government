<div class="min-h-screen flex items-center justify-center bg-slate-800 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full bg-white rounded-xl shadow-lg p-8">
        <div class="text-center">
            <a href="{{ route('home') }}" class="flex items-center justify-center space-x-3 group mb-6">
                <div class="w-12 h-12 rounded-full bg-gradient-to-br from-indigo-500 to-indigo-700 flex items-center justify-center transition-transform duration-300 group-hover:scale-110">
                    <span class="text-2xl font-bold text-white">D</span>
                </div>
            </a>
            <h2 class="text-2xl font-bold text-gray-800 mb-2">Daftar Akun Baru</h2>
            <p class="text-gray-600 mb-6">Buat akun untuk mengakses layanan kami</p>
        </div>

        <form wire:submit.prevent="register" class="space-y-6">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                <input wire:model.blur="name" id="name" type="text" required 
                    class="input input-bordered w-full bg-gray-50 focus:bg-white" 
                    placeholder="Nama lengkap Anda" />
                @error('name') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input wire:model.blur="email" id="email" type="email" required 
                    class="input input-bordered w-full bg-gray-50 focus:bg-white" 
                    placeholder="nama@email.com" />
                @error('email') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input wire:model.blur="password" id="password" type="password" required 
                    class="input input-bordered w-full bg-gray-50 focus:bg-white" 
                    placeholder="Minimal 8 karakter" />
                @error('password') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
                <input wire:model.blur="password_confirmation" id="password_confirmation" type="password" required 
                    class="input input-bordered w-full bg-gray-50 focus:bg-white" 
                    placeholder="Masukkan password yang sama" />
            </div>

            <div>
                <button type="submit" class="btn btn-primary w-full">
                    <span wire:loading.remove wire:target="register">Daftar</span>
                    <span wire:loading wire:target="register">
                        <span class="loading loading-spinner loading-sm"></span>
                        Memproses...
                    </span>
                </button>
            </div>
        </form>

        <div class="mt-6 text-center">
            <p class="text-sm text-gray-600">
                Sudah memiliki akun?
                <a href="{{ route('login') }}" class="font-medium text-indigo-600 hover:text-indigo-800 transition-colors duration-300">
                    Masuk sekarang
                </a>
            </p>
        </div>
    </div>
</div>
