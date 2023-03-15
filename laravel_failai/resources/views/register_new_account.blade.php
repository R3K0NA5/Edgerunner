<x-auth-session-status :status="session('status')"/>
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
                                    {{--<form method="POST" action="{{ route('login') }}">
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

                                    </form>--}}
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf

                                        <!-- Name -->
                                        <div class="registracijos">
                                            <label for="name">Name</label>
                                            <input id="name" type="text" name="name" :value="old('name')" required
                                                   autofocus autocomplete="name"/>
                                            <span class="mt-2">{{ $errors->first('name') }}</span>
                                        </div>

                                        <!-- Email Address -->
                                        <div class="registracijos">
                                            <label for="email">Email</label>
                                            <input id="email" type="email" name="email" :value="old('email')" required
                                                   autocomplete="username"/>
                                            <span class="mt-2">{{ $errors->first('email') }}</span>
                                        </div>

                                        <!-- Password -->
                                        <div class="registracijos">
                                            <label for="password">Password</label>
                                            <input id="password" type="password" name="password" required
                                                   autocomplete="new-password"/>
                                            <span class="mt-2">{{ $errors->first('password') }}</span>
                                        </div>

                                        <!-- Confirm Password -->
                                        <div class="registracijos">
                                            <label for="password_confirmation">Confirm Pass</label>
                                            <input id="password_confirmation" type="password"
                                                   name="password_confirmation" required autocomplete="new-password"/>
                                            <span class="mt-2">{{ $errors->first('password_confirmation') }}</span>
                                        </div>

                                        <div class="RegisterMygtukas">
                                            <button type="submit" >
                                                REGISTER
                                            </button>
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
                        <a href="{{ url('/connect') }}">LOGIN</a>
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
</script>
