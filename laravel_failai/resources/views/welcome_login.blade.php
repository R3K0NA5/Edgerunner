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
                                        <form method="POST" action="{{ route('login') }}">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <!-- Email Address -->
                                            <div class="loginas">
                                                <label for="email">Email</label>
                                                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                                            </div>
                                            <!-- Password -->
                                            <div class="loginas">
                                                <label for="password">Password</label>
                                                <input id="password" type="password" name="password" required autocomplete="current-password">
                                            </div>
                                            <div class="loginMygtukas">
                                                <button type="submit" >LOG IN</button>
                                            </div>
                                            <!-- Remember Me -->
                                            <div class="prisiminimas">
                                                <label for="remember_me">
                                                    <input id="remember_me" type="checkbox" name="remember" class="rememberMeTitle" >
                                                    <span>Remember me</span>
                                                </label>
                                            </div>

                                        </form>
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
                        <div><img src="{{ asset('img/homepage/sujungtasVirsus.png')}}" height="60px" width="600px" alt="tosp"></div>
                        <div class="innermenu">
                            <a href="{{ url('/registernewaccount') }}">REGISTER</a>
                        </div>
                        <div class="innermenu">
                            <a href="{{ url('/') }}">MAIN MENU</a>
                        </div>
                        <div><img src="{{ asset('img/homepage/sujungtaapacia.png')}}" alt="bottom"></div>
                    </div>
                </div>
            </div>
        </div>
    @endguest
<script src="{{ asset('js/webpage/rightMenu.js')}}"></script>
    @include('layouts.footer')

