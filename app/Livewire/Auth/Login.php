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

           if(Auth::attempt($credentials))
           {
                session()->regenerate();
                return redirect()->route('admin')->with('success','You logged in successfully');
            }
            else
            {
               return redirect()->route('admin')->back()->with('error','Invalid credentials');
            }
        
    }

    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.auth.login');
    }
}
