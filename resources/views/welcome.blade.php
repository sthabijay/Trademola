<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trademola</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gradient-to-b from-red-400 to-orange-400">
        <a href="./dashboard" class="bg-blue-500 p-2 m-2 absolute border border-gray-100 shadow rounded-2xl text-white hover:border-gray-400 transition-all">Go to dashboard</a>
        {{-- <livewire:dashboard> --}}
</body>
</html>