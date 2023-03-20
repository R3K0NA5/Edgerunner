@include('layouts.header')

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
                            <div class="col-md-8 ">
                                <div class="rightMenuPortforlio ">
                                    <table>
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Score</th>
                                            <th>Created At</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($scores as $score)
                                            <tr>
                                                <td>{{ $score->id }}</td>
                                                <td>{{ $score->score }}</td>
                                                <td>{{ $score->created_at }}</td>

                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                            <div class="col-md-1"></div>
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
                        <a href="{{ url('/') }}">MAIN MENU</a>
                    </div>
                    <div class="innermenu">
                        <a href="{{ route('statistics') }}">STATISTICS</a>
                    </div>
                    <div><img src="{{ asset('img/homepage/sujungtaapacia.png')}}" alt="bottom"></div>
                </div>
            </div>
        </div>
    </div>

<script src="{{ asset('js/webpage/rightMenu.js')}}"></script>
@include('layouts.footer')

