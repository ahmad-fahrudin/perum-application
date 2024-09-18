<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{
    public $name, $email, $password, $password_confirmation;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
    ];

    public function register()
    {
        $this->validate();

        // Buat user baru
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        // Login otomatis setelah registrasi
        auth()->login($user);

        return redirect()->route('dashboard'); // Ubah sesuai rute dashboard Anda
    }

    public function render()
    {
        return view('livewire.auth.register')->layout('layouts.auth');
    }
}
