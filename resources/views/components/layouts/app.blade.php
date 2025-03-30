<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $title ?? 'Page Title' }}</title>
        @vite('resources/css/app.css')
    </head>
    <body class="bg-gradient-to-b  from-orange-200 to-red-300 bg-no-repeat h-dvh w-full">
        {{ $slot }}
    </body>
</html>
