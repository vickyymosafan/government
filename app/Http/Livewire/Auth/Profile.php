<?php

declare(strict_types=1);

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Profile extends Component
{
    public string $name = '';
    public string $email = '';
    public string $current_password = '';
    public string $password = '';
    public string $password_confirmation = '';

    public function mount()
    {
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
    }

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
            'current_password' => 'nullable|required_with:password|current_password',
            'password' => 'nullable|min:8|confirmed',
        ];
    }

    public function updateProfile()
    {
        $this->validate();

        $user = User::find(Auth::id());
        $user->name = $this->name;
        
        if ($user->email !== $this->email) {
            $user->email = $this->email;
            $user->email_verified_at = null;
        }

        if ($this->password) {
            $user->password = Hash::make($this->password);
        }

        $user->save();

        $this->reset(['current_password', 'password', 'password_confirmation']);
        
        session()->flash('message', 'Profil berhasil diperbarui.');
    }

    public function render()
    {
        return view('livewire.auth.profile');
    }
}
