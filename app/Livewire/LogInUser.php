<?php

namespace App\Livewire;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class LogInUser extends Component
{
    public $email;
    public $password;

    public function logInUser(Request $request) {
        $validated = $this->validate([
            'email' => 'required|email',
            'password' => 'required|string', 
        ]);

        if (Auth::attempt($validated)) {
            $request->session()->regenerate();

            return redirect()->to('/dashboard');
        }

        throw ValidationException::withMessages([
            'credentials' => 'Wrong credentials'
        ]);
    }

    public function render()
    {
        return view('livewire.auth.log-in-user');
    }
}
