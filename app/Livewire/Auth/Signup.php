<?php

namespace App\Livewire\Auth;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

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
            Auth::login($user);

            return redirect()->route('admin')->with('success','User register and login successfully');
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
