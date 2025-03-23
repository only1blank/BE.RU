<div class="header__row_auth">
    @auth
        <a
            href="{{ url('/profile') }}"
            class=""
        >
            <img src="{{ asset('img/icons8-male-user-96.png') }}" alt="Профиль">
        </a>
    @else
        <a
            href="{{ route('login') }}"
            class=""
        >
        <img src="{{ asset('img/Import.png') }}" alt="auth">
        </a>
    @endauth

</div>
    
