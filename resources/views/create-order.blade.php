<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <!-- Fonts -->
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
             @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Document</title>
    @livewireStyles
</head>
<body>
    <header class="header">
        <div class="container">
        <div class="header__row">
            <div class="header__row_logo">
                <a href="{{ route('welcome')}}"><img src="{{ asset('img/be.ru.png')}}" alt="logo"></a>
            </div>
            @auth
            <div class="header__row_menu">
                <a class="header__menu_item" href="{{ route('track')}}">Отследить посылку</a>
                <a class="header__menu_item" href="{{ route('create-order')}}">Отправить посылку</a>
                <a class="header__menu_item" href="">Правила приёма и доставки</a>
            </div>
            @endif
                @if (Route::has('login'))
                                <livewire:welcome.navigation />
                            @endif
            </div>
        </div>
    </header>
    @livewire('delivery-order')
    @livewireScripts
</body>
</html>