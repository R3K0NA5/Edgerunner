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
<div class="container-fluid marginas">
    <div class="row justify-content-center">
        <h2 class="text-center">STOGINES "SOLAR ROOF" MATAVIMO LAPAS</h2>
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-6 text-center">Data: {{ $date }}</div>
    </div>
    <br>
    <div class="row">
        <div class="col-3"></div>
        <div class="col-3">
            <div class="row text-center">Vardas: {{ $name }}</div>
            <div class="row text-center">Pavarde: {{ $surname }}</div>
        </div>
        <div class="col-5">
            <div class="row text-center">Tel.Nr: {{ $phone }}</div>
            <div class="row text-center">El.Pastas: {{ $email }}</div>
        </div>
        <div class="col-1"></div>
    </div>
    <div class="row">
        <div class="col-3"></div>
        <div class="col-9">Adresas: {{ $address }}</div>
    </div>
    <br>
    <div class="row">
        <div class="col-3"></div>
        <div class="col-9">Modelis: {{ $modelis }}</div>
    </div>
    <div class="row">
        <div class="col-3"></div>
        <div class="col-9">Remo spalva: {{ $remoSpalva }}</div>
    </div>
    <div class="row">
        <div class="col-3"></div>
        <div class="col-9">Dazymo tipas: {{ $dazymoTipas }}</div>
    </div>
    <div class="row">
        <div class="col-3"></div>
        <div class="col-9">$dangosTipas: {{ $dangosTipas }}</div>
    </div>
    <div class="row">
        <div class="col-3"></div>
        <div class="col-9">$gs: {{ $gs }}</div>
    </div>
    <div class="row">
        <div class="col-3"></div>
        <div class="col-9">$atramuTvirtinimoTipas: {{ $atramuTvirtinimoTipas }}</div>
    </div>
    <div class="row">
        <div class="col-3"></div>
        <div class="col-9">$atmetimai: {{ $atmetimai }}</div>
    </div>
    <div class="row">
        <div class="col-3"></div>
        <div class="col-9">$dangteliai: {{ $dangteliai }}</div>
    </div>
    <div class="row">
        <div class="col-3"></div>
        <div class="col-9">$atramusSkaicius: {{ $atramusSkaicius }}</div>
    </div>
    <div class="row">
        <div class="col-3"></div>
        <div class="col-9">$namoSiena: {{ $namoSiena }}</div>
    </div>
    <div class="row">
        <div class="col-3"></div>
        <div class="col-9">$grindinioTipas: {{ $grindinioTipas }}</div>
    </div>
    <div class="row">
        <div class="col-3"></div>
        <div class="col-9">$papildomiDarbai: {{ $papildomiDarbai }}</div>
    </div>

</div>
<button id="print-btn" onclick="window.print();">Print</button>
</body>
</html>
