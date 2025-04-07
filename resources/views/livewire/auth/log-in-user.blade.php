<div class="h-full flex justify-center items-center max-w-3xl mx-auto">
    <form wire:submit.prevent="logInUser" type="POST" class="flex flex-col bg-white w-full p-8 gap-2 rounded-xl border-2 border-gray-100">
        <h1 class="text-2xl">Log In</h1>

        <!-- Email -->
        <label for="email">Email*</label>
        <input type="email" name="email" wire:model="email" value="{{ old('email')}}" class="border h-8 px-2 rounded-sm">
        @error('email') 
            <div class="text-red-500 text-sm">{{ $message }}</div> 
        @enderror

        <!-- Password -->
        <label for="password">Password*</label>
        <input type="password" name="password" wire:model="password" class="border h-8 px-2 rounded-sm">
        @error('password') 
            <div class="text-red-500 text-sm">{{ $message }}</div> 
        @enderror

        <div class="mt-2 flex justify-end items-center gap-4">
            <a href="/user/register" class="underline text-blue-700">Not Register Yet?</a>
            <input type="submit" value="Log In" class="bg-blue-500 p-2 w-48 rounded-xl cursor-pointer text-white border-2 border-blue-500 hover:border-blue-200 transition-all">
        </div>
    </form>
</div>
