<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/solarRoof.css') }}" rel="stylesheet" type="text/css">
    <style type="text/css">
        /* Hide the print button when printing */
        @media print {
            #print-btn {
                display: none;
            }
        }
    </style>
</head>
<body>
<br>
<br>
<br>
<br>
<br>
<div class="container-fluid marginas">
    <div class="row justify-content-center">
        <h1 class="text-center">STOGINES "KIEMO OAZE" MATAVIMO LAPAS</h1>
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-6 text-center">Data: {{ $date }}</div>
    </div>
    <br>
    <br>
    <br>
    <br>

    <div class="row">
        <div class="col-3"></div>
        <div class="col-2 uzklausaDuomenys">Vardas:</div>
        <div class="col-6 pasirinkimasDuomenys">{{ $name }}</div>
    </div>
    <div class="row">
        <div class="col-3"></div>
        <div class="col-2 uzklausaDuomenys">Pavarde:</div>
        <div class="col-6 pasirinkimasDuomenys">{{ $surname }}</div>
    </div>
    <div class="row">
        <div class="col-3"></div>
        <div class="col-2 uzklausaDuomenys">Tel.Nr:</div>
        <div class="col-6 pasirinkimasDuomenys">{{ $phone }}</div>
    </div>
    <div class="row">
        <div class="col-3"></div>
        <div class="col-2 uzklausaDuomenys">El.Pastas:</div>
        <div class="col-6 pasirinkimasDuomenys">{{ $email }}</div>
    </div>
    <div class="row">
        <div class="col-3"></div>
        <div class="col-2 uzklausaDuomenys">Adresas:</div>
        <div class="col-6 pasirinkimasDuomenys">{{ $address }}</div>
    </div>
    <br>
    <div class="row matavimoObjektas2">
        <div class="matavimoObjektas">
            <img src="../img/terasos/verikalas.png" alt="Terasos vertikalas" width="960" height="708">
            <p class="matavimasH1">{{ $h1 }}</p>
            <p class="matavimasH2">{{ $h2 }}</p>
            <p class="matavimasW">{{ $w }}</p>
            <p class="matavimasL">{{ $l }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-2 uzklausa">Modelis:</div>
        <div class="col-9 pasirinkimas">{{ $modelis }}</div>
    </div>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-2 uzklausa">Rėmo spalva:</div>
        <div class="col-9 pasirinkimas">{{ $remoSpalva }}</div>
    </div>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-2 uzklausa">Dažymo tipas:</div>
        <div class="col-9 pasirinkimas">{{ $dazymoTipas }}</div>
    </div>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-2 uzklausa">Dangos tipas:</div>
        <div class="col-9 pasirinkimas">{{ $dangosTipas }}</div>
    </div>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-2 uzklausa">GS 8 mm grūdintas:</div>
        <div class="col-9 pasirinkimas">{{ $gs }}</div>
    </div>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-2 uzklausa">Tvirtinimo tipas:</div>
        <div class="col-9 pasirinkimas">{{ $atramuTvirtinimoTipas }}</div>
    </div>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-2 uzklausa">Atmetimai:</div>
        <div class="col-9 pasirinkimas">{{ $atmetimai }}</div>
    </div>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-2 uzklausa">Dangteliai:</div>
        <div class="col-9 pasirinkimas">{{ $dangteliai }}</div>
    </div>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-2 uzklausa">Atramų skaičius:</div>
        <div class="col-9 pasirinkimas">{{ $atramusSkaicius }}</div>
    </div>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-2 uzklausa">Namo siena:</div>
        <div class="col-9 pasirinkimas">{{ $namoSiena }}</div>
    </div>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-2 uzklausa">Grindinio tipas:</div>
        <div class="col-9 pasirinkimas">{{ $grindinioTipas }}</div>
    </div>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-2 uzklausa">Papapildomi darbai:</div>
        <div class="col-9 pasirinkimas">{{ $papildomiDarbai }}</div>
    </div>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-11">Patvirtinu ankščiau norodytą informaciją:</div>
    </div>
<div class="row ">
    <div class="col-1 "></div>
    <div class="col-5 parasai">
        <div class="row parasai2">Matavo:</div>
        <div class="row ">V.pavardė, parašas</div>
    </div>
    <div class="col-6 parasai">
        <div class="row parasai2">Klientas</div>
        <div class="row ">V.pavardė, parašas</div>
    </div>


</div>

</div>
<button id="print-btn" onclick="window.print();">Print</button>
</body>
</html>
