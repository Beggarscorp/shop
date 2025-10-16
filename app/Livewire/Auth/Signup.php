<?php

namespace App\Livewire\Auth;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\userverify;

class Signup extends Component
{
    public $name;
    public $email;
    public $contact;
    public $password;
    public $password_confirmation;
    protected $rules = [
        'name' => 'required|string|min:3|max:255',
        'email' => 'required|email|unique:users,email',
        'contact' => 'required|string|unique:users,contact',
        'password' => 'required|confirmed|min:6',
    ];

    public function sendmail()
    {
        $to=$this->email;
        $msg='Test email';
        $subject="Test email by developer";
        Mail::to($to)->send(new userverify($msg,$subject));
        $this->dispatch('show-toast',message:'Mail sent successfully!');
    }
    public function register()
    {
        $this->validate();

        $user = User::create([
            'name'=>$this->name,
            'email'=>$this->email,
            'contact'=>$this->contact,
            'password'=>Hash::make($this->password)
        ]);

        if($user)
        {
            // Send email verification
            $user->sendEmailVerificationNotification();

            $this->dispatch('show-toast', message: 'Account created! Please verify your email.');
        }
        else
        {
            return redirect()->route('auth.login')->with('error','User not regitered');
        }

    }


    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.auth.signup');
    }
}
