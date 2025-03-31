<?php

namespace App\Livewire;

use App\Models\Trade;
use Livewire\Component;

class AddTrade extends Component
{
    public $symbol;
    public $is_open = false;
    public $units;
    public $buy_price;
    public $sell_price;
    public $target;
    public $stoploss;

    public function random()
    {
        $symbols = ['SPC', 'NABIL', 'NIFRA', 'NFS'];
        $this->symbol = $symbols[array_rand($symbols)]; 
        $this->is_open = (bool) rand(0, 1);
        $this->units = rand(10, 100); 
        $this->buy_price = rand(400, 500);
        $this->sell_price = rand(400, 500);
        $this->target = rand(500, 600);
        $this->stoploss = rand(300, 400); 
    }

    public function save() {
        $this->validate([
            'symbol' => 'required|string',
            'is_open' => 'boolean',
            'units' => 'required|integer',
            'buy_price' => 'required|integer',
            'sell_price' => 'required|integer',
            'target' => 'required|integer',
            'stoploss' => 'required|integer',
        ]);

        Trade::create([
            'symbol'=>$this->symbol, 
            'is_open'=>$this->is_open, 
            'buy_price'=>$this->buy_price, 
            'sell_price'=>$this->sell_price, 
            'units'=>$this->units, 
            'target'=>$this->target, 
            'stoploss'=>$this->stoploss]);

        return redirect()->to('/dashboard');    
    }

    public function render()
    {
        return view('livewire.add-trade');
    }
}
