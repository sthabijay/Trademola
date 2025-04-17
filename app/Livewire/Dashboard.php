<?php

namespace App\Livewire;

use App\Models\Log;
use App\Models\Portfolio;
use App\Models\Trade;
use App\Models\WebTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;

class Dashboard extends Component
{
    public ?Portfolio $selected_portfolio = null;
    public ?Log $selected_log = null;
    public ?Trade $selected_trade = null;
    public ?WebTable $web_data = null;
    public $trades;
    public $logs;
    public $showLogModel = false;
    public $showEntryModel = false;

    public $symbol;
    public $nickname;
    public $units;
    public $buy_price;
    public $target;
    public $stoploss;
    public $tags;
    public $note;

    public $portfolioId; 

    protected $rules = [
        'symbol' => 'required|string|max:10',
        'nickname' => 'nullable|string|max:50',
        'units' => 'required|numeric|min:0.0001',
        'buy_price' => 'required|numeric|min:0.0001',
        'target' => 'nullable|numeric|min:0',
        'stoploss' => 'nullable|numeric|min:0',
        'tags' => 'nullable|string|max:255',
        'note' => 'nullable|string',
    ];

    public function mount($id){
        $this->trades = Trade::where('user_id', Auth::id())->get();

        $this->portfolioId = $id;

        $this->selected_portfolio = Portfolio::find($id);
        $this->logs = Log::where('portfolio_id', $id)->orderBy('updated_at', 'desc')->get();
    }

    public function change($tradeId) {
        $this->selected_trade = Trade::find($tradeId);
        $this->web_data = WebTable::where('symbol', $this->selected_trade->symbol)->first();
    }

    public function selectLog($logId){
        $this->selected_log = Log::find($logId);
    }

    public function createLog(){
        $this->validate();

        $log = [
            'symbol' => 'AAPL',
            'nickname' => 'Swing Trade',
            'total_units' => 94,
            'gross' => 71568,
            'avg_buy_price' => 307,
            'target' => 2234,
            'stoploss' => 427,
            'avg_sell_price' => null,
            'rating' => 4,
            'tags' => [],
            'note' => 'This is a random trade log entry. Adjust parameters as needed.'
        ];

        Log::create([
            'portfolio_id' => $this->portfolioId, // Replace with the actual portfolio id
            'symbol' => $this->symbol,
            'nickname' => $this->nickname,
            'total_units' => $this->units,
            'gross' => 500,
            'avg_buy_price' => $this->buy_price,
            'target' => $this->target ?? intval($this->buy_price * 1.1),
            'stoploss' => $this->stoploss ?? intval($this->buy_price * 0.95),
            'rating' => $log['rating'],
            'tags' => json_encode([]),
            'note' => $log['note'],
        ]);

        return redirect()->to("/dashboard/{$this->portfolioId}");
    }

    public function addEntry()
    {
        $this->showEntryModel = true;
        $this->symbol = $this->selected_log->symbol;
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
