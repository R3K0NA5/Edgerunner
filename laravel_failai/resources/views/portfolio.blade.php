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
                            <div class="col-md-8 ">
                                <div class="rightMenuPortforlio">
                                    <div class="container-fluid port">
                                        <div class="row">
                                            <div class="col-md-2">
                                            </div>
                                            <div class="col-md-7">
                                                <h2>Donatas Gelumbauskas</h2>
                                            </div>
                                            <div class="col-md-3">
                                                <div style="text-align:center;">
                                                    <img src="{{ asset('img/homepage/img.png')}}"
                                                         style="border-radius:50%; height:100px; width:100px;"
                                                         alt="Image description">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <h3>Apie mane:</h3>
                                            </div>
                                            <div class="col-md-10">
                                                <p>Bendravimo gebėjimai.Geri bendravimo įgūdžiai su įvairaus amžiaus asmenimis,<br>
                                                    gebėjimas valdyti konfliktines situacijas. Mėgstu susiplanuoti laiką, darbo<br>
                                                    eigą, veiksmus, kad viskas vyktų sklandžiai. Gebėjimas greitai išanalizuoti <br>
                                                    bei prisitaikyti prie naujų aplinkų<br>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <h3>Darbo patirtis:</h3>
                                            </div>
                                            <div class="col-md-10">
                                                <p>Įmonė: UAB „Kilobaitas” Pareigos: IT technikas, serviso vadovas<br>
                                                    Kompiuterinės technikos tvarkymas;<br>
                                                    Garantinio serviso aptarnavimas;<br>
                                                    Tiesioginis ir nuotolinis klientų konsultavimas IT klausimais;<br>
                                                    Įrangos įrengimas/pritaikymas įmonėse, mokymosi įstaigose, biuruose ir pan.;<br>
                                                    Individualių situacijų sprendimas bendradarbiaujant su Lietuvos bei užsienio įmonėmis<br></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <h3>Kursai:</h3>
                                            </div>
                                            <div class="col-md-10">
                                                <p>Kursų organizatorius: Kauno informacinių technologijų mokykla<br>
                                                    Kursų pavadinimas: Multimedijos paslaugų tiekėjo<br>
                                                    Įgytos kompetencijos:<br>
                                                    Eksplotuoti kompiuterinę techninę įrangą;<br>
                                                    Patikrinti, naudotis ir išmanyti taikomąsias programas;<br>
                                                    Derinti įvairias operacines sistemas;<br>
                                                    Redaguoti vaizdo medžiagą, taikyti įrangą;<br>
                                                    Kurti, montuoti ir taikyti garso takelį;<br>
                                                    Kurti ir apdorti animaciją ir trimatę grafiką;<br>
                                                    Kurti vektorinius vaizdus, redaguoti ir montuoti taškinės grafikos darbus;<br>
                                                    Projektuoti, kurti ir administruoti tinklapius;<br>
                                                    Fotografuoti pagal vartotojo poreikius,vertinti fotografijas.<br>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
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
                    <div><img src="{{ asset('img/homepage/sujungtaapacia.png')}}" alt="bottom"></div>
                </div>
            </div>
        </div>
    </div>
@endguest
<script src="{{ asset('js/webpage/rightMenu.js')}}"></script>
@include('layouts.footer')

