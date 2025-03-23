<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>BE.RU</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />


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
             <div class="about-us">
                <div class="about-us__description">
                        <p class="about-us__description_text">Компания be.ru — это современный сервис доставки, который предлагает  своим клиентам быстрые и удобные решения для транспортировки товаров. 
                            Мы понимаем, как важно для вас получать заказы вовремя и в целости,  поэтому наш приоритет — высокое качество обслуживания и надежность.</p>
                </div>
                <div class="about-us_right-item">
                    <img src="{{asset('img/сargo supply chain and supply chain management.svg')}}" class="about-us_right-item_img" alt="">
                </div>
             </div>
    
@livewire('news-slider')
@livewire('helpme')
<div class="how-it-work">
    <div class="container-how-it-work">
        <div class="how-it-work__title">
Как это работает?
        </div>
        <div class="how-it-work__description">
            <img class="how-it-work__description_item" src="{{asset('img/howwork.png')}}" alt="">
        </div>
    </div>
</div>
<footer class="footer">
    <div class="footer__row">
        <div class="footer__row_logo">
            <a href="{{ route('welcome')}}"><img src="{{ asset('img/be.ru.png')}}" alt="logo"></a>
        </div>
        <div class="footer__row_menu">
            <a class="footer__menu_item" href="{{ route('about')}}">О компании</a>
            <a class="footer__menu_item" href="{{ route('news')}}">Новости</a>
            <a class="footer__menu_item" href="{{ route('help')}}">{{ trans('messages.help') }}</a>
            <a class="footer__menu_item" href="{{ route('contacts')}}">{{ trans('messages.contacts') }}</a>
        </div>
        <div class="footer__row_social">
            <a href="#"><img src="{{ asset('img/facebook.png')}}" alt="facebook"></a>
    </div>
</footer>
    </body>
</html>
