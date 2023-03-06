<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            width: 1000px;
            margin: 0 auto;
            background: black;
        }

        canvas {
            display: block;
            margin: auto;
        }
    </style>
</head>
<body>
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
</body>
</html>

