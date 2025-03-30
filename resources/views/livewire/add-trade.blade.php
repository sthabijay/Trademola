<div class="h-full flex justify-center items-center max-w-3xl mx-auto">
    <form wire:submit.prevent="save" class="flex flex-col bg-white w-full p-8 gap-2 rounded-xl border-2 border-gray-100">
        <h1 class="text-2xl">Add Trade Entry</h1>

        <!-- Symbol -->
        <label for="symbol">Symbol</label>
        <input type="text" name="symbol" wire:model="symbol" class="border h-8 px-2 rounded-sm">
        @error('symbol') 
            <div class="text-red-500 text-sm">{{ $message }}</div> 
        @enderror

        <!-- Open/Close -->
        <label for="is_open">Open/Close 
            <input type="checkbox" name="is_open" wire:model="is_open">
        </label>
        @error('is_open') 
            <div class="text-red-500 text-sm">{{ $message }}</div> 
        @enderror

        <!-- Units -->
        <label for="units">Units</label>
        <input type="text" name="units" wire:model="units" class="border h-8 px-2 rounded-sm">
        @error('units') 
            <div class="text-red-500 text-sm">{{ $message }}</div> 
        @enderror

        <!-- Buy Price -->
        <label for="buy-price">Buy Price</label>
        <input type="text" name="buy-price" wire:model="buy_price" class="border h-8 px-2 rounded-sm">
        @error('buy_price') 
            <div class="text-red-500 text-sm">{{ $message }}</div> 
        @enderror

        <!-- Sell Price -->
        <label for="sell-price">Sell Price</label>
        <input type="text" name="sell-price" wire:model="sell_price" class="border h-8 px-2 rounded-sm">
        @error('sell_price') 
            <div class="text-red-500 text-sm">{{ $message }}</div> 
        @enderror

        <!-- Target -->
        <label for="target">Target</label>
        <input type="text" name="target" wire:model="target" class="border h-8 px-2 rounded-sm">
        @error('target') 
            <div class="text-red-500 text-sm">{{ $message }}</div> 
        @enderror

        <!-- StopLoss -->
        <label for="stoploss">StopLoss</label>
        <input type="text" name="stoploss" wire:model="stoploss" class="border h-8 px-2 rounded-sm">
        @error('stoploss') 
            <div class="text-red-500 text-sm">{{ $message }}</div> 
        @enderror

        <div class="flex justify-end gap-2">
            <input type="button" value="RNG" wire:click="random" class="bg-blue-500 p-2 w-48 mt-4 rounded-xl cursor-pointer text-white border-2 border-blue-500 hover:border-blue-200 transition-all">
            
            <input type="submit" value="Add Entry" class="bg-blue-500 p-2 w-48 mt-4 rounded-xl cursor-pointer text-white border-2 border-blue-500 hover:border-blue-200 transition-all">
        </div>
        <!-- Submit Button -->
    </form>
</div>
