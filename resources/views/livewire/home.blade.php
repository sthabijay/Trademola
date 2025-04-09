<div>
<div class="flex justify-between py-8 px-12">
    <span class="text-2xl font-serif">Trademola</span>
    <div class="flex gap-8">
        <button wire:click="gotoLogin" class="text-gray-700 hover:bg-cyan-200 px-6 py-2 rounded-lg transition-all cursor-pointer">Login</button>
        <button wire:click="gotoRegister" class="bg-cyan-700 px-4 py-2 rounded-lg text-white border-2 border-cyan-700 hover:bg-white hover:border-cyan-700 hover:text-cyan-700 transition-all cursor-pointer">Register</button>
    </div>
</div>
<main class="m-auto text-center font-bold py-12 flex flex-col justify-center items-center gap-12">
    <h1 class="flex justify-center items-center text-7xl">MASTER THE MARKETS, <br />ONE TRADE AT A TIME</h1>
    <button wire:click="gotoDashboard" class="bg-cyan-700 text-white px-4 py-2 w-fit rounded-lg text-xl border-2 border-cyan-700 hover:bg-white hover:border-cyan-700 hover:text-cyan-700 transition-all cursor-pointer">Get Started</button>
    <img src="./hero.png" alt="root-hero-image" class="border-4 border-cyan-700 rounded-3xl z-10">
    <img src="./green up arrow.png" alt="" class="absolute z-0 right-0 top-32">
    <img src="./green up arrow.png" alt="" class="absolute z-0 left-0 -bottom-20">
</main>
</div>