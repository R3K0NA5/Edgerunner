@include('layouts.header')



<div class="container d-flex align-items-center" style="min-height: 100vh;">
    <div class="row justify-content-center mx-auto" style="transform: scale(4);">
        @foreach ($sprites as $sprite)
            <div class="col-sm-6 col-md-4 col-lg-3 " style="background-color: rgba(79,122,191,0.3)">
                <div class="text-center">
                    <img src="../img/menu images/{{ $sprite->id }}.png" alt="{{ $sprite->description }}" style="transform: scale(1);">
                    <p style="color: red; ">{{ $sprite->description }}</p>
                    <form method="POST" action="{{ route('change.sprite') }}">
                        @csrf
                        <input type="hidden" name="sprite_id" value="{{ $sprite->id }}">
                        <button type="submit" >UPGRADE</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>


@include('layouts.footer')
