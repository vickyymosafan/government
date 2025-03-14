<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use Illuminate\Support\Facades\Mail;

class Contact extends Component
{
    public $name;
    public $email;
    public $subject;
    public $message;
    
    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email',
        'subject' => 'required|min:5',
        'message' => 'required|min:10',
    ];
    
    protected $messages = [
        'name.required' => 'Nama lengkap wajib diisi.',
        'name.min' => 'Nama lengkap minimal 3 karakter.',
        'email.required' => 'Alamat email wajib diisi.',
        'email.email' => 'Format email tidak valid.',
        'subject.required' => 'Subjek pesan wajib diisi.',
        'subject.min' => 'Subjek pesan minimal 5 karakter.',
        'message.required' => 'Pesan wajib diisi.',
        'message.min' => 'Pesan minimal 10 karakter.',
    ];
    
    public function submitForm()
    {
        $this->validate();
        
        // In a real application, you would send an email here
        // For now, we'll just simulate a successful submission
        
        // Reset form fields
        $this->reset(['name', 'email', 'subject', 'message']);
        
        // Show success message
        session()->flash('message', 'Pesan Anda telah berhasil dikirim. Kami akan segera menghubungi Anda.');
        
        $this->dispatch('contact-form-submitted');
    }
    
    public function render()
    {
        return view('livewire.pages.contact');
    }
}
