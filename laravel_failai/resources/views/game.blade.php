@include('layouts.header')
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
@include('layouts.footer')

