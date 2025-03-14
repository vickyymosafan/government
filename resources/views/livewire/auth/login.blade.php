<div class="min-h-screen flex items-center justify-center bg-slate-800 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full bg-white rounded-xl shadow-lg p-8">
        <div class="text-center">
            <a href="{{ route('home') }}" class="flex items-center justify-center space-x-3 group mb-6">
                <div class="w-12 h-12 rounded-full bg-gradient-to-br from-indigo-500 to-indigo-700 flex items-center justify-center transition-transform duration-300 group-hover:scale-110">
                    <span class="text-2xl font-bold text-white">D</span>
                </div>
            </a>
            <h2 class="text-2xl font-bold text-gray-800 mb-2">Masuk ke Akun</h2>
            <p class="text-gray-600 mb-6">Masukkan kredensial Anda untuk melanjutkan</p>
        </div>

        @if (session('message'))
        <div class="alert alert-info mb-6">
            {{ session('message') }}
        </div>
        @endif

        <form wire:submit.prevent="login" class="space-y-6">
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
                    placeholder="••••••••" />
                @error('password') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input wire:model="remember" id="remember" type="checkbox" class="checkbox checkbox-sm checkbox-primary" />
                    <label for="remember" class="ml-2 block text-sm text-gray-700">Ingat saya</label>
                </div>
                <a href="#" class="text-sm text-indigo-600 hover:text-indigo-800 transition-colors duration-300">
                    Lupa password?
                </a>
            </div>

            <div>
                <button type="submit" class="btn btn-primary w-full">
                    <span wire:loading.remove wire:target="login">Masuk</span>
                    <span wire:loading wire:target="login">
                        <span class="loading loading-spinner loading-sm"></span>
                        Memproses...
                    </span>
                </button>
            </div>
        </form>

        <div class="mt-6 text-center">
            <p class="text-sm text-gray-600">
                Belum memiliki akun?
                <a href="{{ route('register') }}" class="font-medium text-indigo-600 hover:text-indigo-800 transition-colors duration-300">
                    Daftar sekarang
                </a>
            </p>
        </div>
    </div>
</div>
