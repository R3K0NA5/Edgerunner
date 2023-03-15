@include('layouts.header')


<div id="sprite-carousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        @foreach ($sprites as $key => $sprite)
            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                <div>
                    <div class="row justify-content-center mx-auto">
                        <div class="col-sm-6 col-md-4 col-lg-3">

                            <img src="{{ asset('img/homepage/sujungtasVirsus.png')}}" height="60px" width="600px"
                                 alt="tosp">

                            <div class="text-center karioNuotrauka">
                                <img src="../img/menu images/{{ $sprite->id }}.png" alt="{{ $sprite->description }}">
                                <p>{{ $sprite->description }}</p>
                                <form method="POST" action="{{ route('change.sprite') }}">
                                    @csrf
                                    <input type="hidden" name="sprite_id" value="{{ $sprite->id }}">
                                    <div class="PirkimoMygtukas">
                                        <button type="submit">UPGRADE</button>
                                    </div>
                                </form>
                            </div>
                            <img src="{{ asset('img/homepage/sujungtaapacia.png')}}" alt="bottom">
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <a href="#sprite-carousel" class="carousel-control-prev" role="button" data-slide="prev">
        <span aria-hidden="true">&lsaquo;</span>
        <span class="sr-only">Previous</span>
    </a>
    <a href="#sprite-carousel" class="carousel-control-next" role="button" data-slide="next">
        <span aria-hidden="true">&rsaquo;</span>
        <span class="sr-only">Next</span>
    </a>
</div>


@include('layouts.footer')
