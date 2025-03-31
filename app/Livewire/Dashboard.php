<?php

namespace App\Livewire;

use App\Models\Trade;
use App\Models\WebTable;
use Livewire\Attributes\Title;
use Livewire\Component;

class Dashboard extends Component
{
    public ?Trade $selected_trade = null;
    public ?WebTable $web_data = null;

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
        $this->web_data = WebTable::where('symbol', $this->selected_trade->symbol)->first();
    }

    #[Title('Dashboard')]
    public function render()
    {
        return view('livewire.dashboard', ['trades'=> Trade::all()]);
    }
}
