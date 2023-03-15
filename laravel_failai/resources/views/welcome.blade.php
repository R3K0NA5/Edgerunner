@include('layouts.header')
@guest
    <div class="container-fluid base backgroundImg">
        <div class="row row1">
            {{-- Kaire puse--}}
            <div class="col-md-8">
                {{--kaires virsus--}}
                <div class="row row2">
                    <div class="col-md-12"></div>
                </div>
                <div class="row row3">
                    <div class="col-md-12">
                        {{--Vidurys--}}
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-5 ">
                                <div class="rightMenu">
                                    <div class="waitingForConnectionText">
                                        <video width="400" height="100" loop autoplay muted>
                                            <source src="{{ asset('img/homepage/cb2m0-ufx3m.webm') }}"
                                                    type="video/webm">
                                        </video>
                                    </div>
                                    <div class="waitingForConnectionvideo">
                                        <video loop autoplay muted>
                                            <source src="{{ asset('img/homepage/uxxvi-a1xd1.webm') }}"
                                                    type="video/webm">
                                        </video>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                    </div>
                </div>
                {{--Kaires apacia--}}
                <div class="row row4">
                    <div class="col-md-12 "></div>
                </div>
            </div>
            {{--Desine puse--}}
            <div class="col-md-4 sideMeniuGame">
                <div>
                    <div><img src="{{ asset('img/homepage/sujungtasVirsus.png')}}" height="60px" width="600px"
                              alt="tosp"></div>

                    <div class="innermenu">
                        <a href="{{ url('/connect') }}">LOGIN</a>
                    </div>
                    <div class="innermenu">
                        <a href="{{ url('/registernewaccount') }}">REGISTER</a>
                    </div>
                    <div class="innermenu">
                        <a href="{{ url('/portfolio') }}">PORTFOLIO</a>
                    </div>

                    <div><img src="{{ asset('img/homepage/sujungtaapacia.png')}}" alt="bottom"></div>
                </div>
            </div>
        </div>
    </div>
@endguest
@auth
    @if (auth()?->user()?->isUser())
        <div class="container-fluid base backgroundImg">
            <div class="row row1">
                {{-- Kaire puse--}}
                <div class="col-md-8">
                    {{--kaires virsus--}}
                    <div class="row row2">
                        <div class="col-md-12"></div>
                    </div>
                    <div class="row row3">
                        <div class="col-md-12">
                            {{--Vidurys--}}
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-5 ">
                                    <div class=" row rightMenu">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-12 menuOperator">
                                                    <p>OPERATOR / {{ auth()->user()->name }}</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 menuContract">
                                                    <p>CONTRTRACT
                                                        START/ {{ auth()->user()->created_at->format('M j, Y') }}</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="menuSprite {{ 'sprite'.auth()->user()->sprite_id }}">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 menuRank">
                                                    <p>RANK / {{ auth()->user()->role }}</p>
                                                </div>
                                                <div class="col-md-6 menuExp">
                                                    <p>EXP / {{ auth()->user()->scores()->sum('score') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4"></div>
                            </div>
                        </div>
                    </div>
                    {{--Kaires apacia--}}
                    <div class="row row4">
                        <div class="col-md-12 "></div>
                    </div>
                </div>
                {{--Desine puse--}}
                <div class="col-md-4 sideMeniuGame">
                    <div>
                        <div><img src="{{ asset('img/homepage/sujungtasVirsus.png')}}" height="60px" width="600px"
                                  alt="tosp"></div>

                        <div class="innermenu">
                            <a href="{{ route('game') }}">START MISSION</a>
                        </div>
                        <div class="innermenu">
                            <a href="{{ route('change.sprite') }}">ARMORY</a>
                        </div>
                        <div class="innermenu">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                        style="background-color: transparent; color: #b7c6cc;  border: none; box-shadow: none; text-decoration: none;">
                                    LOGOUT
                                </button>
                            </form>
                        </div>
                        <div><img src="{{ asset('img/homepage/sujungtaapacia.png')}}" alt="bottom"></div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endauth
@auth
    @if (auth()?->user()?->isAdmin())
        <div class="container-fluid base backgroundImg">
            <div class="row row1">
                {{-- Kaire puse--}}
                <div class="col-md-8">
                    {{--kaires virsus--}}
                    <div class="row row2">
                        <div class="col-md-12"></div>
                    </div>
                    <div class="row row3">
                        <div class="col-md-12">
                            {{--Vidurys--}}
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-5 ">
                                    <div class=" row rightMenu">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-12 menuOperator">
                                                    <p>OPERATOR / {{ auth()->user()->name }}</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 menuContract">
                                                    <p>CONTRTRACT
                                                        START/ {{ auth()->user()->created_at->format('M j, Y') }}</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="menuSprite {{ 'sprite'.auth()->user()->sprite_id }}">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 menuRank">
                                                    <p>RANK / {{ auth()->user()->role }}</p>
                                                </div>
                                                <div class="col-md-6 menuExp">
                                                    <p>EXP / {{ auth()->user()->scores()->sum('score') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4"></div>
                            </div>
                        </div>
                    </div>
                    {{--Kaires apacia--}}
                    <div class="row row4">
                        <div class="col-md-12 "></div>
                    </div>
                </div>
                {{--Desine puse--}}
                <div class="col-md-4 sideMeniuGame">


                    <div>
                        <div><img src="{{ asset('img/homepage/sujungtasVirsus.png')}}" height="60px" width="600px"
                                  alt="tosp"></div>

                        <div class="innermenu">
                            <a href="{{ route('game') }}">START MISSION</a>
                        </div>
                        <div class="innermenu">
                            <a href="{{ route('change.sprite') }}">ARMORY</a>
                        </div>
                        <div class="innermenu">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                        style="background-color: transparent; color: #b7c6cc;  border: none; box-shadow: none; text-decoration: none;">
                                    LOGOUT
                                </button>
                            </form>
                        </div>
                        <div><img src="{{ asset('img/homepage/sujungtaapacia.png')}}" alt="bottom"></div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endauth
@include('layouts.footer')


<script>                                    /*Sistema valdyti v1*/

    const rightMenu = document.querySelector('.rightMenu');
    const rightMenuX = rightMenu.offsetLeft + rightMenu.offsetWidth / 2;
    const rightMenuY = rightMenu.offsetTop + rightMenu.offsetHeight / 2;

    document.addEventListener('mousemove', e => {
        const mouseX = e.clientX;
        const mouseY = e.clientY;

        const deltaX = -(mouseX - rightMenuX) / 90;
        const deltaY = -(mouseY - rightMenuY) / 90;

        const rotationY = Math.atan(deltaX / deltaY) * 20 / Math.PI;
        const rotationX = Math.atan(deltaY / Math.abs(deltaX)) * 20 / Math.PI;

        rightMenu.style.transform = `translate3d(${deltaX}px, ${deltaY}px, 0) rotateY(${rotationY}deg) rotateX(${rotationX}deg)`;
    });

    const sideMeniuGame = document.querySelector('.sideMeniuGame');
    const sideMeniuGameX = sideMeniuGame.offsetLeft + sideMeniuGame.offsetWidth / 2;
    const sideMeniuGameY = sideMeniuGame.offsetTop + sideMeniuGame.offsetHeight / 2;

    document.addEventListener('mousemove', e => {
        const mouseX = e.clientX;
        const mouseY = e.clientY;

        const deltaX = -(mouseX - sideMeniuGameX) / 400;
        const deltaY = -(mouseY - sideMeniuGameY) / 400;

        const rotationY = Math.atan(deltaX / deltaY) * 5 / Math.PI;
        const rotationX = Math.atan(deltaY / Math.abs(deltaX)) * 5 / Math.PI;

        sideMeniuGame.style.transform = `translate3d(${deltaX}px, ${deltaY}px, 0) rotateY(${rotationY}deg) rotateX(${rotationX}deg)`;
    });
</script>


{{--                                        Sistema kontroliuoti used admin and guest                      --}}
{{--@guest--}}
{{--    <a href="https://www.youtube.com/watch?v=dQw4w9"><h3>login</h3></a>--}}
{{--@else--}}
{{--    @auth--}}
{{--        @if (auth()?->user()?->isUser())--}}
{{--            <a href="https://www.youtube.com/watch?v=dQw4w9"><h3>User</h3></a>--}}
{{--            <a href="https://www.youtube.com/watch?v=dQw4w9"><h3>Logout</h3></a>--}}
{{--        @endif--}}
{{--    @endauth--}}
{{--    @auth--}}
{{--        @if (auth()?->user()?->isAdmin())--}}
{{--            <a href="https://www.youtube.com/watch?v=dQw4w9"><h3>admin</h3></a>--}}
{{--            <a href="https://www.youtube.com/watch?v=dQw4w9"><h3>Logout</h3></a>--}}
{{--        @endif--}}
{{--    @endauth--}}
{{--@endguest--}}
{{----}}


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
{{--<video width="300" height="300" loop autoplay muted>
    <source src="{{ asset('img/vmi9h-l9ojp.webm') }}" type="video/webm">
</video>--}}
