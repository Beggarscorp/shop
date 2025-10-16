<?php

namespace App\Livewire\Auth;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

#[Layout('layouts.guest', ['slotTitle' => 'Login'])]

class Login extends Component
{
    public $email;
    public $password;

    public function login()
{
    $credentials = [
        'email' => $this->email,
        'password' => $this->password,
    ];

    if (Auth::attempt($credentials)) {
        $user = Auth::user();

        // Check if email is verified
        if (is_null($user->email_verified_at)) {
            Auth::logout();
            return redirect()->route('verification.notice')
                ->with('error', 'Please verify your email before logging in.');
        }

        session()->regenerate();

        if ($user->role === 'admin') {
            return redirect()->route('admin')->with('success', 'You logged in successfully');
        }

        if ($user->role === 'customer') {
            return redirect()->route('dashboard')->with('success', 'You logged in successfully');
        }
    }

    return back()->with('error', 'Invalid credentials');
}


    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.auth.login');
    }
}
