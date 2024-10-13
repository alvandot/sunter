<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Attributes\Title;
use Mary\Traits\Toast;

#[Title('Login')]
#[Layout('components.layouts.auth')]
class Login extends Component
{
    use Toast;

    public string $email = '';
    public string $password = '';
    public bool $remember = false;

    public function mount()
    {
        if (Auth::check() && Auth::user()->email != $this->email) {
            return redirect('/');
        }
    }

    public function login()
    {
        $credentials = $this->validate([
            'email' => ['required', 'email', 'min:3'],
            'password' => ['required', 'min:8'],
        ]);

        if (Auth::attempt($credentials, $this->remember)) {
            session()->regenerate();
            return $this->success('Berhasil masuk.', position: 'toast-bottom', timeout: 3000, redirectTo: '/');
        }

        $this->addError('email', 'Email atau password salah.');
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
