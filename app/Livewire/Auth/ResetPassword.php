<?php

namespace App\Livewire\Auth;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;

#[Layout('layouts.guest')]
class ResetPassword extends Component
{
    public $email;
    public $token;
    public $password;
    public $password_confirmation;

    protected $rules = [
        'email' => 'required|email|exists:users,email',
        'password' => 'required|min:8|confirmed'
    ];

    public function mount($token)
    {
        $this->token = $token;
        $this->email = request()->query('email');
    }

    public function submit()
    {
        $this->validate();

        $status = Password::reset(
            [
                'email' => $this->email,
                'password' => $this->password,
                'password_confirmation' => $this->password_confirmation,
                'token' => $this->token,
            ],
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->save();
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            session()->flash('message', __($status));
            return redirect()->route('login');
        } else {
            $this->addError('email', __($status));
        }
    }
    public function render()
    {
        return view('livewire.auth.reset-password');
    }
}
