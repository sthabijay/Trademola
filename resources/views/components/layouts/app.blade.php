<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $title ?? 'Page Title' }}</title>
        @vite('resources/css/app.css')
    </head>
    <body class="bg-gradient-to-b  from-white to-cyan-200 bg-no-repeat h-dvh w-full overflow-hidden">
        {{ $slot }}
    </body>
</html>
