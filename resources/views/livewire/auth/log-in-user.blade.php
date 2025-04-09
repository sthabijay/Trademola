<div class="h-full flex justify-center items-center max-w-xl mx-auto drop-shadow-2xl">
    <form wire:submit.prevent="logInUser" type="POST" class="flex flex-col bg-white w-full p-8 gap-4 rounded-xl border border-cyan-700">
        <h1 class="text-3xl font-bold text-cyan-700">Log In</h1>

        <!-- Email -->
        <label for="email" class="text-gray-900">Email*</label>
        <input type="email" name="email" wire:model="email" value="{{ old('email')}}" class="border-none outline-none h-8 px-2 rounded-sm bg-gray-100 focus:ring focus:ring-gray-300 transition-all">
        @error('email') 
            <div class="text-red-500 text-sm">{{ $message }}</div> 
        @enderror

        <!-- Password -->
        <label for="password" class="text-gray-900">Password*</label>
        <input type="password" name="password" wire:model="password" class="border-none outline-none h-8 px-2 rounded-sm bg-gray-100 focus:ring focus:ring-gray-300 transition-all">
        @error('password') 
            <div class="text-red-500 text-sm">{{ $message }}</div> 
        @enderror

        <div class="flex justify-end items-center gap-4">
            <a href="/user/register" class="underline text-cyan-700 hover:bg-cyan-200 px-4 py-2 rounded-lg transition-all">Not Register Yet?</a>
            <input type="submit" value="Log In" class="bg-cyan-700 p-2 w-48 rounded-xl cursor-pointer text-white border hover:bg-white hover:border-cyan-700 hover:text-cyan-700 transition-all">
        </div>
    </form>
</div>
