<?php

declare(strict_types=1);

namespace App\Http\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Login extends Component
{
    public string $email = '';
    public string $password = '';
    public bool $remember = false;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

    public function mount()
    {
        // Check if there's a redirect intended for e-KTP service
        if (Session::has('url.intended') && strpos(Session::get('url.intended'), 'layanan/daftar-ktp') !== false) {
            Session::flash('message', 'Silahkan login terlebih dahulu untuk melanjutkan pendaftaran e-KTP.');
        }
    }

    public function login()
    {
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            session()->regenerate();
            
            // If user was trying to access e-KTP registration, redirect there
            if (Session::has('url.intended') && strpos(Session::get('url.intended'), 'layanan/daftar-ktp') !== false) {
                return redirect()->route('services.ktp');
            }
            
            return redirect()->intended(route('home'));
        }

        $this->addError('email', __('auth.failed'));
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
