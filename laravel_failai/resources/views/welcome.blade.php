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
                            <a href="{{ route('statistics') }}">STATISTICS</a>
                        </div>
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
<script src="{{ asset('js/webpage/rightMenu.js')}}"></script>
<script src="{{ asset('js/webpage/sidemenu.js')}}"></script>
@include('layouts.footer')
