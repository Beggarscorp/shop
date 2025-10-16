<?php

namespace App\Livewire\Auth;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Support\Facades\Password;

#[Layout('layouts.guest')]
class ForgotPassword extends Component
{
    public $email;

    protected $rules = [
        'email' => 'required|email|exists:users,email'
    ];

    public function submit()
    {
        $this->validate();

        $status = Password::sendResetLink(['email' => $this->email]);

        if ($status === Password::RESET_LINK_SENT) {
            session()->flash('message', __($status));
        } else {
            $this->addError('email', __($status));
        }
    }
    public function render()
    {
        return view('livewire.auth.forgot-password');
    }
}
