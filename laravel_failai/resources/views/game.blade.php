{{--@include('layouts.header')
<div class="row game">
    <div class="col-2"></div>
    <div class="row ">
        <div class="col-8 gamewindow h-100">
            <div id="score"></div>
            <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <canvas id="game-canvas" data-sprite-id="{{ auth()->user()->sprite_id }}" ></canvas>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="{{ asset('/js/utils.js') }}"></script>
            <script src="{{ asset('/js/classes/CollisionBlock.js') }}"></script>
            <script src="{{ asset('/js/classes/Sprite.js') }}"></script>
            <script src="{{ asset('/js/classes/Enemy.js') }}"></script>
            <script src="{{ asset('/js/classes/Player.js') }}"></script>
            <script src="{{ asset('/js/data/collisions.js') }}"></script>
            <script src="{{ asset('/index.js') }}"></script>
        </div>
    </div>
    <div class="col-2"></div>
</div>
@include('layouts.footer')--}}
@include('layouts.header')
{{--<div class="row game">
    <div class="row">
        <div class="col-md-2">
            <div class="row">
                <div class="col-md-12">
                    <img src="../img/buttons/a0.png" alt="img">
                    Move left
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <img src="../img/buttons/w0.png" alt="img">
                    Move jump
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <img src="../img/buttons/d0.png" alt="img">
                    Move right
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="row ">
                <div class="col-8 gamewindow h-100">
                    <div id="score"></div>
                    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <canvas id="game-canvas" data-sprite-id="{{ auth()->user()->sprite_id }}" ></canvas>
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script src="{{ asset('/js/utils.js') }}"></script>
                    <script src="{{ asset('/js/classes/CollisionBlock.js') }}"></script>
                    <script src="{{ asset('/js/classes/Sprite.js') }}"></script>
                    <script src="{{ asset('/js/classes/Enemy.js') }}"></script>
                    <script src="{{ asset('/js/classes/Player.js') }}"></script>
                    <script src="{{ asset('/js/data/collisions.js') }}"></script>
                    <script src="{{ asset('/index.js') }}"></script>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="row">
                <div class="col-md-12">
                    <img src="../img/buttons/l0.png" alt="img">
                    End game
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <img src="../img/buttons/mouse0.png" alt="img">
                    Shoot
                </div>
            </div>
        </div>
    </div>
</div>--}}
<div class="row game tekkstoSpalvos">
    <div class="col-md-2 d-flex align-items-center justify-content-center">
        <div class="row">
            <div class="col-md-12">
                <img id="move-left-button" src="../img/buttons/a0.png" alt="img">
                Move left
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <img id="move-jump-button" src="../img/buttons/w0.png" alt="img">
                Move jump
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <img id="move-right-button" src="../img/buttons/d0.png" alt="img">
                Move right
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="row">
            <div class="col-8 gamewindow h-100 mx-auto text-center">
                <div id="score"></div>
                <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <canvas id="game-canvas" data-sprite-id="{{ auth()->user()->sprite_id }}"></canvas>
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script src="{{ asset('/js/utils.js') }}"></script>
                <script src="{{ asset('/js/classes/CollisionBlock.js') }}"></script>
                <script src="{{ asset('/js/classes/Sprite.js') }}"></script>
                <script src="{{ asset('/js/classes/Enemy.js') }}"></script>
                <script src="{{ asset('/js/classes/Player.js') }}"></script>
                <script src="{{ asset('/js/data/collisions.js') }}"></script>
                <script src="{{ asset('/index.js') }}"></script>
            </div>
        </div>
    </div>
    <div class="col-md-2 d-flex align-items-center justify-content-center">
        <div class="row">
            <div class="col-md-12">
                <img id="end-game-button" src="../img/buttons/l0.png" alt="img">
                End game
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <img id="shoot-button" src="../img/buttons/mouse0.png" alt="img">
                Shoot
            </div>
        </div>
    </div>
</div>
<script>
    // Add event listeners for keydown and keyup
    document.addEventListener("keydown", handleKeyDown);
    document.addEventListener("keyup", handleKeyUp);

    // Add event listeners for mousedown and mouseup
    document.getElementById("shoot-button").addEventListener("mousedown", handleMouseDown);
    document.getElementById("shoot-button").addEventListener("mouseup", handleMouseUp);

    function handleKeyDown(event) {
        if (event.key === "a") {
            document.getElementById("move-left-button").src = "../img/buttons/a1.png";
        } else if (event.key === "w") {
            document.getElementById("move-jump-button").src = "../img/buttons/w1.png";
        } else if (event.key === "d") {
            document.getElementById("move-right-button").src = "../img/buttons/d1.png";
        } else if (event.key === "l") {
            document.getElementById("end-game-button").src = "../img/buttons/l1.png";
        }
    }

    function handleKeyUp(event) {
        if (event.key === "a") {
            document.getElementById("move-left-button").src = "../img/buttons/a0.png";
        } else if (event.key === "w") {
            document.getElementById("move-jump-button").src = "../img/buttons/w0.png";
        } else if (event.key === "d") {
            document.getElementById("move-right-button").src = "../img/buttons/d0.png";
        } else if (event.key === "l") {
            document.getElementById("end-game-button").src = "../img/buttons/l0.png";
        }
    }

    function handleMouseDown(event) {
        console.log("Mouse down");
        document.getElementById("shoot-button").src = "../img/buttons/mouse1.png";
    }

    function handleMouseUp(event) {
        console.log("Mouse up");
        document.getElementById("shoot-button").src = "../img/buttons/mouse0.png";
    }

    // Add event listeners for keydown, keyup, mousedown, and mouseup
    document.addEventListener("keydown", handleKeyDown);
    document.addEventListener("keyup", handleKeyUp);
    document.getElementById("shoot-button").addEventListener("mousedown", handleMouseDown);
    document.getElementById("shoot-button").addEventListener("mouseup", handleMouseUp);
</script>
@include('layouts.footer')
