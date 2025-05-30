<?php

namespace App\Livewire;

use App\Models\Portfolio;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;

class RegisterUser extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    public function saveUser(){
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

       $user = User::create([
            'name'=>$this->name,
            'email'=>$this->email,
            'password'=>$this->password,
        ]);

        Portfolio::create([
            'name'=>"Main",
            'user_id'=>$user->id,
            'IS_MAIN'=>true,
            'gross'=>0,
            'current_investment'=>0,
            'current_value'=>0
        ]);

        Auth::login($user);

        return redirect()->to('/dashboard');
    }

    #[Title('Register')]
    public function render()
    {
        return view('livewire.auth.register-user');
    }
}
