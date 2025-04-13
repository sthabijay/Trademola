<div>
    <div>
        @if ($show)
            <div class="fixed inset-0 flex items-center justify-center z-50 bg-black/50">
                <div class="bg-white p-6 rounded-lg w-96 shadow-lg space-y-4">
                    <h2 class="text-xl font-semibold text-gray-800">Add New Log</h2>

                    {{-- Symbol --}}
                    <div>
                        <input
                            type="text"
                            wire:model="symbol"
                            class="w-full border-gray-300 rounded-md p-2 focus:ring focus:ring-cyan-200"
                            placeholder="Symbol"
                        />
                        @error('symbol')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Nickname (optional) --}}
                    <input
                        type="text"
                        wire:model="nickname"
                        class="w-full border-gray-300 rounded-md p-2 focus:ring focus:ring-cyan-200"
                        placeholder="Nickname (optional)"
                    />

                    {{-- Units --}}
                    <div>
                        <input
                            type="number"
                            wire:model="units"
                            class="w-full border-gray-300 rounded-md p-2 focus:ring focus:ring-cyan-200"
                            placeholder="Units"
                        />
                        @error('units')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Buy Price --}}
                    <div>
                        <input
                            type="number"
                            wire:model="buy_price"
                            class="w-full border-gray-300 rounded-md p-2 focus:ring focus:ring-cyan-200"
                            placeholder="Buy Price"
                        />
                        @error('buy_price')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Target (optional) --}}
                    <input
                        type="number"
                        wire:model="target"
                        class="w-full border-gray-300 rounded-md p-2 focus:ring focus:ring-cyan-200"
                        placeholder="Target (optional)"
                    />

                    {{-- Stoploss (optional) --}}
                    <input
                        type="number"
                        wire:model="stoploss"
                        class="w-full border-gray-300 rounded-md p-2 focus:ring focus:ring-cyan-200"
                        placeholder="Stoploss (optional)"
                    />

                    {{-- Tags (optional) --}}
                    <input
                        type="text"
                        wire:model="tags"
                        class="w-full border-gray-300 rounded-md p-2 focus:ring focus:ring-cyan-200"
                        placeholder="Tags (comma separated)"
                    />

                    {{-- Note (optional) --}}
                    <textarea
                        wire:model="note"
                        rows="3"
                        class="w-full border-gray-300 rounded-md p-2 focus:ring focus:ring-cyan-200"
                        placeholder="Note (optional)"
                    ></textarea>

                    {{-- Buttons --}}
                    <div class="flex justify-end gap-2">
                        <button wire:click="$set('show', false)" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">
                            Cancel
                        </button>
                        <button wire:click="createLog()" class="px-4 py-2 bg-cyan-700 text-white rounded hover:bg-cyan-600">
                            Save
                        </button>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <nav class="flex justify-between py-8 px-12">
        <span class="text-2xl font-serif">Trademola</span>
        <div class="flex gap-6 items-center">
            <span class="text-gray-700 font-bold">{{ Auth::user()->name }}</span>
            <div class="w-10 h-10 bg-amber-400 rounded-full"></div>
        </div>
    </nav>
    <div class="px-12 flex gap-12 h-[770px] ">
        <div class="flex flex-col gap-4 justify-between py-12">
            <ul class="flex flex-col gap-4">
                <li>
                    <a href="/dashboard" class="flex bg-cyan-200 text-cyan-700 border border-cyan-200 rounded-lg p-4 px-8 gap-2 w-[202px] hover:bg-cyan-100 hover:border-cyan-200 transition-all hover:text-cyan-700">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-layout-dashboard-icon lucide-layout-dashboard"><rect width="7" height="9" x="3" y="3" rx="1"/><rect width="7" height="5" x="14" y="3" rx="1"/><rect width="7" height="9" x="14" y="12" rx="1"/><rect width="7" height="5" x="3" y="16" rx="1"/></svg> Dashboard    
                    </a>
                </li>
                <li>
                    <a href="/portfolios" class="flex bg-white text-cyan-700 border border-cyan-200 rounded-lg p-4 px-8 gap-2 w-[202px] hover:bg-cyan-100 hover:border-cyan-200 transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-book-user-icon lucide-book-user"><path d="M15 13a3 3 0 1 0-6 0"/><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H19a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20"/><circle cx="12" cy="8" r="2"/></svg> Portfolios    
                    </a>
                </li>
                <li>
                    <a href="/dashboard" class="flex bg-white text-cyan-700 border border-cyan-200 rounded-lg p-4 px-8 gap-2 w-[202px] hover:bg-cyan-100 hover:border-cyan-200 transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chart-candlestick-icon lucide-chart-candlestick"><path d="M9 5v4"/><rect width="4" height="6" x="7" y="9" rx="1"/><path d="M9 15v2"/><path d="M17 3v2"/><rect width="4" height="8" x="15" y="5" rx="1"/><path d="M17 13v3"/><path d="M3 3v16a2 2 0 0 0 2 2h16"/></svg> Market    
                    </a>
                </li>
            </ul>
            <ul class="flex flex-col gap-4">
                <li>
                    <a href="/dashboard" class="flex bg-white text-cyan-700 border border-cyan-200 rounded-lg p-4 px-8 gap-2 w-[202px] hover:bg-cyan-100 hover:border-cyan-200 transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-settings-icon lucide-settings"><path d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z"/><circle cx="12" cy="12" r="3"/></svg> Setting    
                    </a>
                </li>
                <li>
                    <button wire:click="logOutUser" class="flex bg-red-100 text-red-700 rounded-lg p-4 px-8 gap-2 w-[202px] hover:bg-red-200 transition-all cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-log-out-icon lucide-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" x2="9" y1="12" y2="12"/></svg> Log out    
                    </button>
                </li>
            </ul>
        </div>
        <main class="bg-white w-full flex border-2 rounded-xl border-gray-300">
            <div class="w-[330px] bg-gray-50 rounded-l-2xl p-4 border-r-2 border-gray-300 shrink-0 flex flex-col">
                <div class="flex flex-col">
                    <h1 class="text-xl text-gray-700">{{$selected_portfolio->name}} Portfolio</h1>
                    <h1 class="text-2xl">Total Gain</h1>
                    <div class="text-3xl flex justify-between items-center">
                        @if($selected_portfolio->gross > 0)
                            {{-- Gain --}}
                            <h1 class="text-green-500">+Rs {{$selected_portfolio->gross}}</h1>
                            <h1 class="text-green-500 bg-green-100 flex items-center w-fit p-1 rounded-md">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-up-icon"><path d="m5 12 7-7 7 7"/><path d="M12 19V5"/></svg>
                                12%
                            </h1>
                        @elseif($selected_portfolio->gross < 0)
                            {{-- Loss --}}
                            <h1 class="text-red-500">-Rs {{ abs($selected_portfolio->gross) }}</h1>
                            <h1 class="text-red-500 bg-red-100 flex items-center w-fit p-1 rounded-md">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-down-icon"><path d="m19 12-7 7-7-7"/><path d="M12 5v14"/></svg>
                                -12%
                            </h1>
                        @else
                            {{-- Neutral --}}
                            <h1 class="text-gray-500">Rs 0</h1>
                            <h1 class="text-gray-500 bg-gray-100 flex items-center w-fit p-1 rounded-md">
                                
                                0%
                            </h1>
                        @endif
                    </div>
                    <div class="pt-2">
                        <div class="flex justify-between">
                            <h1>Current Investment</h1>
                            <h1>Rs {{$selected_portfolio->current_investment}}</h1>
                        </div>
                        <div class="flex justify-between">
                            <h1>Current Investment</h1>
                            <h1>Rs {{$selected_portfolio->current_value}}</h1>
                        </div>
                    </div>                    
                </div>
                <div class="bg-gray-300 w-full h-0.5 my-4"></div>
                <button wire:click="$set('show', true)" class="w-full bg-cyan-700 py-2 rounded-lg border border-cyan-700 text-white hover:bg-white hover:border-cyan-700 hover:text-cyan-700 transition-all cursor-pointer">+ Add Log</button>
                <div class="pt-4 flex flex-col gap-2 overflow-scroll no-scrollbar">
                    @foreach($logs as $log)
                        <div wire:click="selectLog({{$log->id}})" class="border bg-white border-gray-500 rounded-lg p-2 hover:bg-blue-50 cursor-pointer transition-all">
                            <div class="flex justify-between items-center text-lg">
                                <h1 class="text-gray-500">{{\Carbon\Carbon::parse($log->updated_at)->format('D, M d')}}</h1>
                                @if($log->total_units > 0)
                                    <span class="bg-green-200 text-green-500 rounded-lg px-2 py-1">Open</span>                                  
                                @else
                                <span class="bg-green-200 text-red-500 rounded-lg px-2 py-1">Close</span>                                    
                                @endif
                            </div>
                            <h1 class="text-2xl">{{$log->symbol}}</h1>
                            <h1>{{$log->total_units}} Units</h1>
                        </div>    
                    @endforeach
                </div>
            </div>
            @if($selected_log)
                <div class="w-full p-4 flex flex-col">
                <div>
                    <div class="text-2xl pb-2">{{$selected_log? \Carbon\Carbon::parse($selected_log->created_at)->format('D, M d') : ""}}</div>
                    <div class="flex items-center gap-2">
                        <h1 class="text-gray-500">Tags:</h1>
                        <span class="bg-cyan-200 text-cyan-700 rounded-lg py-1 px-2 hover:bg-cyan-300 transition-all cursor-pointer">+Add Tags</span>
                        @foreach(json_decode($selected_log->tags, true) as $tag)
                            <span class="bg-cyan-100 text-cyan-700 rounded-lg py-1 px-2 hover:bg-cyan-200 transition-all cursor-pointer"> {{$tag}}</span>
                        @endforeach                    
                        
                    </div>
                </div>
                <div class="bg-gray-300 w-full h-0.5 my-4 shrink-0"></div> 
                <div class="flex">
                    <div class="pr-4 w-full">
                        <div class="flex text-gray-500 gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-scroll-text-icon lucide-scroll-text"><path d="M15 12h-5"/><path d="M15 8h-5"/><path d="M19 17V5a2 2 0 0 0-2-2H4"/><path d="M8 21h12a2 2 0 0 0 2-2v-1a1 1 0 0 0-1-1H11a1 1 0 0 0-1 1v1a2 2 0 1 1-4 0V5a2 2 0 1 0-4 0v2a1 1 0 0 0 1 1h3"/></svg>
                        Notes:
                        </div>
                        <p class="overflow-scroll h-[600px] flex no-scrollbar">
                            {{$selected_log->note}}
                        </p>
                    </div>                   
                    <div class="px-4 w-[330px] shrink-0 border-l-2 border-gray-300">
                        <div class="grid grid-cols-2">
                            <h1 class="text-gray-500">Symbol</h1>
                            <h1>{{$selected_log->symbol}}</h1>
                        </div>
                        <div class="grid grid-cols-2">
                            <h1 class="text-gray-500">LTP</h1>
                            <h1>Rs 1200</h1>
                        </div>
                        <div class="grid grid-cols-2">
                            <h1 class="text-gray-500">Units</h1>
                            <h1>{{$selected_log->total_units}}</h1>
                        </div>
                        <div class="grid grid-cols-2">
                            <h1 class="text-gray-500">Gross Profit / Loss</h1>
                            <h1>Rs {{$selected_log->gross}}</h1>
                        </div>
                        <div class="grid grid-cols-2">
                            <h1 class="text-gray-500">Buy Price</h1>
                            <h1>Rs {{$selected_log->avg_buy_price}}</h1>
                        </div>
                        <div class="grid grid-cols-2">
                            <h1 class="text-gray-500">Target</h1>
                            <h1>Rs {{$selected_log->target}}</h1>
                        </div>
                        <div class="grid grid-cols-2">
                            <h1 class="text-gray-500">Stoploss</h1>
                            <h1>Rs {{$selected_log->stoploss}}</h1>
                        </div>
                        <div class="grid grid-cols-2">
                            <h1 class="text-gray-500">Rating</h1>
                            <h1>
                                @for($i = 0; $i < $selected_log->rating; $i++)
                                    ⭐
                                @endfor
                            </h1>
                        </div>
                        <h1 class="pt-2">Entries:</h1>
                        <button class="w-full bg-cyan-700 py-2 rounded-lg border border-cyan-700 text-white hover:bg-white hover:border-cyan-700 hover:text-cyan-700 transition-all cursor-pointer">+ Add Entries</button>
                        <div class="py-2 flex flex-col gap-2 overflow-scroll h-[360px] no-scrollbar">
                            @for($i = 0; $i < 10; $i++)
                                <div class="border border-green-500 bg-green-100 rounded-lg p-2">
                                <div class="flex justify-between items-center">
                                    <h1 class="text-gray-500">Thu, Apr 10</h1>
                                    <span class="bg-green-200 text-green-500 rounded-lg px-2 py-1">Buy</span>
                                </div>
                                <div class="flex gap-1">
                                    <h1 class="text-gray-500">Price: </h1>Rs 1000
                                </div>
                                <div class="flex gap-1">
                                    <h1 class="text-gray-500">Units: </h1>100
                                </div>
                            </div>
                            @endfor                            
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="flex justify-center items-center w-full">
                <div class="py-2 px-8 rounded-xl text-cyan-700 border border-cyan-700 flex flex-col justify-center items-center">
                    <div class="text-xl">No Log Selected</div>
                    <div class="text-md">Select a Log</div>
                </div>
            </div>
            @endif
        </main>
    </div>
</div>

{{-- <div class="max-w-7xl mx-auto h-full p-8 flex flex-col gap-2">
    <nav class="bg-white h-16 px-2 shrink-0 flex justify-end items-center rounded-2xl border border-gray-100 gap-2">
        <div>
            @guest
                <button wire:click="registerUser" class="bg-blue-500 p-2 w-24 rounded-xl text-white border border-blue-300 hover:border-blue-50 transition-all">Register</button>
                <button wire:click="logInUser" class="bg-blue-500 p-2 w-24 rounded-xl text-white border border-blue-300 hover:border-blue-50 transition-all">Log in</button>    
            @endguest

            @auth
                <span class="px-2 underline text-lg">Hi, {{ Auth::user()->name }}</span>
                <button wire:click="logOutUser" class="bg-blue-500 p-2 w-24 rounded-xl text-white border border-blue-300 hover:border-blue-50 transition-all">Log out</button>    
            @endauth 
        </div>
               
    </nav>    
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
            <button wire:click="editTrade({{$selected_trade}})" class="bg-blue-500 p-2 px-4 rounded-xl text-white border-2 border-gray-400 hover:border-gray-200 transition-all cursor-pointer">Edit</button>
        </div>
        @endif
    </main>
</div> --}}