<?php

namespace App\Livewire;

use App\Models\Trade;
use Livewire\Attributes\Title;
use Livewire\Component;

class Dashboard extends Component
{
    public ?Trade $selected_trade = null;

    public function addTrade()
    {
        return redirect()->to('/trade/add');
    }

    public function deleteTrade(Trade $trade){
        $trade->delete();

        return redirect()->to('/dashboard');
    }

    public function change($tradeId) {
        $this->selected_trade = Trade::find($tradeId);
    }

    #[Title('Dashboard')]
    public function render()
    {
        return view('livewire.dashboard', ['trades'=> Trade::all()]);
    }
}
