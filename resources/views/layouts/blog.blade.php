<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="40代で異業種からWeb制作会社へ就職した人間のプログです。Web制作やプログラミングに関して、日々ためになったことやわかったことを残していきます。">
    <meta name="format-detection" content="telephone=no">

    <title>{{ config('app.name', '40代からの挑戦') }}</title>

    <!-- Fonts -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/highlight.js'])
</head>
<body>
    @include('components.blog.header')

    {{ $slot }}

    @include('components.blog.footer')

    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
