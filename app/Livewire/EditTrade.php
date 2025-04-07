<?php

namespace App\Livewire;

use App\Models\Trade;
use Livewire\Attributes\Title;
use Livewire\Component;

class EditTrade extends Component
{
    public Trade $trade;

    public $symbol;
    public $is_open = false;
    public $units;
    public $buy_price;
    public $sell_price;
    public $target;
    public $stoploss;

    public function mount($id)
    {
        $this->trade = Trade::findOrFail($id);
        $this->symbol = $this->trade->symbol;
        $this->is_open = $this->trade->is_open;
        $this->units = $this->trade->units;
        $this->buy_price = $this->trade->buy_price;
        $this->sell_price = $this->trade->sell_price;
        $this->target = $this->trade->target;
        $this->stoploss = $this->trade->stoploss;
    }

    public function save() {
        
        if ($this->sell_price) {
            $this->is_open = false;
        }else{
            $this->is_open = true;
        }

        $this->validate([
            'symbol' => 'required|string',
            'is_open' => 'boolean',
            'units' => 'required|integer',
            'buy_price' => 'required|integer',
            'sell_price' => 'nullable|integer',
            'target' => 'nullable|integer',
            'stoploss' => 'nullable|integer',
        ]);

        $this->trade->update([
            'symbol'=>$this->symbol, 
            'is_open'=>$this->is_open, 
            'buy_price'=>$this->buy_price, 
            'sell_price'=>$this->sell_price, 
            'units'=>$this->units, 
            'target'=>$this->target, 
            'stoploss'=>$this->stoploss]);

        return redirect()->to('/dashboard');    
    }

    #[Title('Edit Trade')]
    public function render()
    {
        return view('livewire.edit-trade');
    }
}
