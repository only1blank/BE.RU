<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BE.RU</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/app.css">

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
                    <a class="header__menu_item" href="{{ route('track')}}">Правила приёма и доставки</a>
                </div>
                @endif
                @if (Route::has('login'))
                    <livewire:welcome.navigation />
                @endif
            </div>
        </div>
    </header>
    <div class="delivery-block">

        <div class="delivery-block__img">
            <img src="{{asset('img/green tube.svg')}}" class="delivery-block__img_tube" alt="">
            <img src="{{asset('img/green star.svg')}}" class="delivery-block__img_star" alt="">
            <img src="{{asset('img/green button.svg')}}" class="delivery-block__img_button" alt="">
        </div>
        <span class="delivery-block__text">Беру и отправляю</span>
        <span class="delivery-block__partner">вместе с BE.RU</span>

    </div>
@livewire('about-us')

    @livewire('news-slider')
    @livewire('helpme')
    @livewire('howitwork')
@livewire('footer')


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@livewireScripts
</body>
</html>