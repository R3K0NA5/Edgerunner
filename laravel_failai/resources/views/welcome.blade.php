
{{--<div>
    @if (Route::has('login'))
            @auth
                <a href="{{ url('/dashboard') }}">Dashboard</a>
            @else
                <a href="{{ route('login') }}">Login</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif--}}

<div class="base backgroundImg">
    <div class="row">
        <div class="col-md-12">
            @include('layouts.header')
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @include('layouts.footer')
        </div>
    </div>
</div>

