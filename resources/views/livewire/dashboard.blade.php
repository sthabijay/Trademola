<div class="max-w-7xl mx-auto h-full p-8 flex flex-col gap-2">
    <nav class="bg-white h-16 shrink-0 flex justify-center items-center rounded-2xl border border-gray-100">This is nav</nav>    
    <main class="max-h-[550px] min-h-[550px] flex gap-2">
        <div class="h-full flex flex-col gap-2">
            <div class="bg-neutral-50 max-h-96 w-3xs p-2 rounded-2xl shrink-0 px-auto flex flex-col gap-2 border border-gray-100 justify-between overflow-scroll no-scrollbar">
                    @foreach($trades as $trade)
                        <div class="bg-white h-16 border-2 shrink-0 p-2 flex justify-between items-center rounded-2xl shadow hover:border-blue-300 transition-all text-lg cursor-pointer {{ isset($selected_trade) && $selected_trade->id == $trade->id ? 'border-blue-400' : 'border-gray-200' }}" wire:click="change('{{$trade->id}}')">
                            <h1>{{$trade->symbol}}</h1><h2>{{$trade->is_open ? "Open" : "Close"}}</h2>
                        </div>
                    @endforeach                                
            </div>
            <button class="bg-white h-16 w-full border-2 shrink-0 border-gray-200 p-2 flex justify-center items-center rounded-2xl shadow hover:border-blue-200 transition-all text-lg" wire:click="addTrade">Add</button>
        </div>
        @if($selected_trade)
            <div class="bg-white w-full rounded-2xl p-4 overflow-y-auto no-scrollbar border border-gray-100">
            <div class="pl-2 flex flex-col gap-2 border-l-4 {{ $web_data->ltp > $selected_trade->buy_price ? 'border-l-green-500' : 'border-l-red-500' }}">
                <h1>Net Profit/Loss</h1>
                <h2>{{abs(($web_data->ltp - $selected_trade->buy_price)*$selected_trade->units)}}</h2>
            </div>
            <div class="p-2 gap-2 grid grid-cols-6 bg-blue-400 rounded-xl mt-2">
                <h1>LTP</h1>
                <h1>{{$web_data->ltp}}</h1>
            </div>
            <div class="p-2 gap-2 grid grid-cols-6">
                <h1>Units</h1>
                <h2>{{$selected_trade->units}}</h2>
            </div>
            <div class="p-2 gap-2 grid grid-cols-6">
                <h1>Buy</h1>
                <h2 class="col-span-5">{{$selected_trade->buy_price}}</h2>
            </div>
            <div class="p-2 gap-2 grid grid-cols-6">
                <h1>Sell</h1>
                <h2>{{$selected_trade->sell_price}}</h2>
            </div>
            <div class="p-2 gap-2 grid grid-cols-6">
                <h1>Target</h1>
                <h2>{{$selected_trade->target}}</h2>
                <h2 class="bg-amber-300 p-1 rounded-xl border border-amber-200">{{$selected_trade->target - $web_data->ltp}} off target</h2>
            </div>
            <div class="p-2 gap-2 grid grid-cols-6">
                <h1>Stoploss</h1>
                <h2>{{$selected_trade->stoploss}}</h2>
            </div>
            <button wire:click="deleteTrade({{$selected_trade}})" class="bg-red-500 p-2 px-4 rounded-xl text-white border-2 border-gray-400 hover:border-gray-200 transition-all cursor-pointer">Delete</button>
        </div>
        @endif
    </main>
</div>