<?php

namespace App\Livewire;

use App\Models\Trade;
use App\Models\WebTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;

class Dashboard extends Component
{
    public ?Trade $selected_trade = null;
    public ?WebTable $web_data = null;
    public $trades;

    public function mount(){
        $this->trades = Trade::where('user_id', Auth::id())->get();
    }

    public function change($tradeId) {
        $this->selected_trade = Trade::find($tradeId);
        $this->web_data = WebTable::where('symbol', $this->selected_trade->symbol)->first();
    }

    public function addTrade()
    {
        return redirect()->to('/trade/add');
    }

    public function deleteTrade(Trade $trade){
        $trade->delete();

        return redirect()->to('/dashboard');
    }

    public function editTrade(Trade $trade){
        return redirect()->to("/trade/edit/{$trade->id}");
    }
    
    public function registerUser(){
        return redirect()->to('/user/register');
    }

    public function logInUser(){
        return redirect()->to('/user/login');
    }

    public function logOutUser(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerate();

        return redirect()->to('/dashboard');
    }

    #[Title('Dashboard')]
    public function render()
    {
        return view('livewire.dashboard');
    }
}
