<?php

namespace App\Livewire;

use App\Models\Entry;
use App\Models\Log;
use App\Models\Portfolio;
use App\Models\Trade;
use App\Models\User;
use App\Models\WebTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;

class Dashboard extends Component
{
    public ?User $user = null;
    public ?Portfolio $selected_portfolio = null;
    public ?Log $selected_log = null;
    public ?Trade $selected_trade = null;
    public ?WebTable $web_data = null;
    public $trades;
    public $logs;
    public $entries;

    public $showLogModel = false;
    public $showEntryModel = false;
    public $showAddTag = false;
    public $showNoteTextbox = false;

    public $symbol;
    public $nickname;
    public $units;
    public $buy_price;
    public $target;
    public $stoploss;
    public $tags;
    public $note;

    public $portfolioId;
    
    public $price;
    public $is_buy;

    public $new_tag;
    public $new_note;

    public function mount($id){
        $this->trades = Trade::where('user_id', Auth::id())->get();

        $this->portfolioId = $id;
        $this->selected_portfolio = Portfolio::find($id);
        $this->user = User::find($this->selected_portfolio->user_id);

        $this->logs = Log::where('portfolio_id', $id)->orderBy('updated_at', 'desc')->get();

        $this->authorize('view', $this->selected_portfolio);
        
    }

    public function selectLog($logId){
        $this->selected_log = Log::find($logId);
        $this->entries = Entry::where('log_id', $this->selected_log->id)->orderBy('updated_at', 'desc')->get();
        $this->symbol = $this->selected_log->symbol;
    }

    public function createLog(){
        $this->validate([
            'symbol' => 'required|string|max:10',
            'nickname' => 'nullable|string|max:50',
            'units' => 'required|numeric|min:1',
            'buy_price' => 'required|numeric|min:0.0001',
            'target' => 'nullable|numeric|min:0',
            'stoploss' => 'nullable|numeric|min:0',
            'tags' => 'nullable|string|max:255',
            'note' => 'nullable|string',
        ]);

        $logCreated = Log::create([
            'portfolio_id' => $this->portfolioId,
            'symbol' => $this->symbol,
            'nickname' => $this->nickname,
            'total_units' => $this->units,
            'gross' => 0,
            'avg_buy_price' => $this->buy_price,
            'target' => $this->target ?? intval($this->buy_price * 1.1),
            'stoploss' => $this->stoploss ?? intval($this->buy_price * 0.95),
            'tags' => json_encode([$this->tags]),
            'note' => $this->note,
        ]);

        Entry::create([
            'log_id'=>$logCreated->id,
            'symbol'=>$this->symbol,
            'price'=>$this->buy_price,
            'units'=>$this->units,
            'is_buy'=>true,
        ]);

        return redirect()->to("/dashboard/{$this->portfolioId}");
    }

    public function createEntry()
    {
        $this->validate([
            'symbol' => 'required|string|max:10',
            'price' => 'required|numeric|min:0.0001',
            'units' => ['required', 'numeric', 'min:1', function ($attribute, $value, $fail) {
            if (!$this->is_buy && $value > $this->selected_log->total_units) {
                $fail("You can't sell more than you own (Max: {$this->selected_log->total_units}).");
            }
        }],
            'is_buy' => 'required|boolean',
        ]);
        
        Entry::create([
            'log_id' => $this->selected_log->id,
            'symbol' => $this->symbol,
            'price' => $this->price,
            'units' => $this->units,
            'is_buy' => $this->is_buy,
        ]);

        return redirect()->to("/dashboard/{$this->portfolioId}");
    }

    public function addTag()
    {
        $tags = json_decode($this->selected_log->tags, true) ?? [];

        if ($this->new_tag && !in_array($this->new_tag, $tags)) {
            $tags[] = $this->new_tag;

            $this->selected_log->tags = json_encode($tags);
            $this->selected_log->save();

            $this->new_tag = '';
            $this->showAddTag = false;
        }
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

    // public function change($tradeId) {
    //     $this->selected_trade = Trade::find($tradeId);
    //     $this->web_data = WebTable::where('symbol', $this->selected_trade->symbol)->first();
    // }

    // public function addTrade()
    // {
    //     return redirect()->to('/trade/add');
    // }

    // public function deleteTrade(Trade $trade){
    //     $trade->delete();

    //     return redirect()->to('/dashboard');
    // }

    // public function editTrade(Trade $trade){
    //     return redirect()->to("/trade/edit/{$trade->id}");
    // }
}
