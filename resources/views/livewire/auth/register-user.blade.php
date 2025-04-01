<div class="h-full flex justify-center items-center max-w-3xl mx-auto">
    <form wire:submit.prevent="saveUser" class="flex flex-col bg-white w-full p-8 gap-2 rounded-xl border-2 border-gray-100">
        <h1 class="text-2xl">Register</h1>

        <!-- Name -->
        <label for="name">Name*</label>
        <input type="text" name="name" wire:model="name" value="{{ old('name')}}" class="border h-8 px-2 rounded-sm">
        @error('name') 
            <div class="text-red-500 text-sm">{{ $message }}</div> 
        @enderror

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

        <div class="flex justify-end gap-2">
            <input type="submit" value="Register" class="bg-blue-500 p-2 w-48 mt-4 rounded-xl cursor-pointer text-white border-2 border-blue-500 hover:border-blue-200 transition-all">
        </div>
    </form>
</div>
