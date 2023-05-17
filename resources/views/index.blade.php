<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@lang('main.home')</title>

        @vite('resources/css/app.css')
    </head>

    <body>
        <div id="app"></div>

        @vite('resources/ts/app.ts')
    </body>
</html>
