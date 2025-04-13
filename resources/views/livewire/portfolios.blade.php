<div>
    <div>
        @if ($show)
            <div class="fixed inset-0 flex items-center justify-center z-50 bg-black/50">
                <div class="bg-white p-6 rounded-lg w-96 shadow-lg space-y-4">
                    <h2 class="text-xl font-semibold text-gray-800">Add New Portfolio</h2>

                    <input
                        type="text"
                        wire:model="portfolioName"
                        class="w-full border-gray-300 rounded-md p-2 focus:ring focus:ring-cyan-200"
                        placeholder="Enter portfolio name"
                    />
                    @error('portfolioName')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror

                    <div class="flex justify-end gap-2">
                        <button wire:click="$set('show', false)" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Cancel</button>
                        <button wire:click="createPortfolio()" class="px-4 py-2 bg-cyan-700 text-white rounded hover:bg-cyan-600">Create</button>
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
                    <a href="/dashboard" class="flex bg-white text-cyan-700 border border-cyan-200 rounded-lg p-4 px-8 gap-2 w-[202px] hover:bg-cyan-100 hover:border-cyan-200 transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-layout-dashboard-icon lucide-layout-dashboard"><rect width="7" height="9" x="3" y="3" rx="1"/><rect width="7" height="5" x="14" y="3" rx="1"/><rect width="7" height="9" x="14" y="12" rx="1"/><rect width="7" height="5" x="3" y="16" rx="1"/></svg> Dashboard    
                    </a>
                </li>
                <li>
                    <a href="/portfolios" class="flex bg-cyan-200 text-cyan-700 border border-cyan-200 rounded-lg p-4 px-8 gap-2 w-[202px] hover:bg-cyan-100 hover:border-cyan-200 transition-all hover:text-cyan-700">
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
        <main class="bg-white w-full p-4 border-2 rounded-xl border-gray-300">
            <h1 class="text-xl text-gray-500 pb-4">Portfolios</h1>
            <button wire:click="$set('show', true)" class="w-[200px] bg-cyan-700 py-2 rounded-lg border border-cyan-700 text-white hover:bg-white hover:border-cyan-700 hover:text-cyan-700 transition-all cursor-pointer">+ Add Portfolio</button>
            <div class="py-4 overflow-scroll h-[660px] no-scrollbar">
                @foreach($portfolios as $portfolio)
                    <div wire:click='navigate({{$portfolio->id}})' class="p-4 flex flex-col gap-2 border border-gray-300 rounded-xl hover:bg-blue-50 transition-all cursor-pointer">
                        <div class="flex text-xl gap-2 justify-between">
                            <div>
                                <h1>Portfolio Name:</h1>
                                <h1 class="font-bold">{{$portfolio->name}}</h1>
                            </div>
                            @if(!$portfolio->IS_MAIN)
                                <button wire:click='deletePortfolio({{$portfolio->id}})' class="bg-red-500 px-4 py-2 h-fit rounded-lg text-white hover:bg-red-600 transition-all cursor-pointer">Delete</button>
                            @endif                                                   
                        </div>
                    <h1 class="text-gray-500 text-lg">Last Updated: Thu, Apr 10</h1>
                    <div class="flex gap-2">
                        <div class="bg-green-200 w-[330px] p-2 rounded-lg border border-green-500">
                            <h1 class="text-gray-500 text-xl">Total Gain / Loss</h1>
                            <div class="flex items-center text-3xl text-green-600 justify-between">
                                <h1>+Rs 12,000</h1>
                                <span class="text-green-600 bg-green-300 py-1 px-2 rounded-lg">+12%</span>
                            </div>
                        </div>
                        <div class="bg-purple-200 w-[330px] p-2 rounded-lg border border-purple-500">
                            <h1 class="text-gray-500 text-xl">Current Investment</h1>
                            <div class="flex items-center text-3xl text-gray-800 justify-between">
                                <h1 class="py-1 px-2">Rs 100,000</h1>
                            </div>
                        </div>
                        <div class="bg-orange-100 w-[330px] p-2 rounded-lg border border-orange-500">
                            <h1 class="text-gray-500 text-xl">Current Value</h1>
                            <div class="flex items-center text-3xl text-gray-800 justify-between">
                                <h1 class="py-1 px-2">Rs 112,000</h1>
                            </div>
                        </div>
                        <div class="bg-blue-200 w-[330px] p-2 rounded-lg border border-blue-500">
                            <h1 class="text-gray-500 text-xl">Units</h1>
                            <div class="flex items-center text-3xl text-gray-800 justify-between">
                                <h1 class="py-1 px-2">100</h1>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach                
            </div>
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