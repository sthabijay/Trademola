<?php

namespace App\Livewire;

use App\Models\Portfolio;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Portfolios extends Component
{
    public $show = false;
    public $portfolioName = "";
    public $user;
    public $portfolios;

    public function mount(){
        $this->user = Auth::user()->id;   
        $this->portfolios = Portfolio::where('user_id', Auth::id())->get();
    }

    public function navigate($location){
        return redirect()->to("/dashboard/{$location}");
    }

    public function createPortfolio(){
        Portfolio::create([
            'name'=>$this->portfolioName,
            'user_id'=>$this->user,
            'IS_MAIN'=>false,
            'gross'=>0,
            'current_investment'=>0,
            'current_value'=>0
        ]);

        $this->show = false;

        return redirect()->to('/portfolios');
    }

    public function deletePortfolio(Portfolio $portfolio){
        $portfolio->delete();

        return redirect()->to('/portfolios');
    }

    public function render()
    {
        return view('livewire.portfolios');
    }
}
