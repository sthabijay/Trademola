<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

class Home extends Component
{
    public function gotoDashboard(){
        return redirect()->to('/dashboard');
    }

    public function gotoRegister(){
        return redirect()->to('/user/register');
    }

    public function gotoLogin(){
        return redirect()->to('/user/login');
    }

    #[Title('Trademola')]
    public function render()
    {
        return view('livewire.home');
    }
}
