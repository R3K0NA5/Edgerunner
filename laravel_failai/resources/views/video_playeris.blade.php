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
</head>

<style>


    .headeris {
        height: 10%;
        width: 100%;
        background-color: #005d7c;
        margin: 0;
        padding: 0;
        overflow: hidden;
    }

    .footeris {
        height: 10%;
        width: 100%;
        background-color: #005d7c;
        margin: 0;
        padding: 0;
        overflow: hidden;
    }

    /* elementai kuriuos istrinti ikeliant faila*/


    /* Judancio meniu stilistika START */
    .scroll-arrow {
        display: inline-block;
        position: relative;
        cursor: pointer;
        padding: 0;
        margin: 0;
        opacity: 0.5;
        font-size: 34px;
        transition: 0.2s;
    }

    /*sonininiu rodykliu ryskumas,lygiavimas uzvedus*/
    .arrow1 {
        margin-right: 6px;
    }

    .arrow2 {
        padding-left: 1vw;
    }


    .scroll-arrow:hover {
        transition: 0.2s;
        opacity: 1;
    }

    /*sliderio elementu isdeliojimas*/
    .scrool_menu ul {
        width: 79%;
        scroll-behavior: smooth;
        display: inline-block;
        position: relative;
        vertical-align: middle;
        text-align: center;
        overflow-x: scroll;
        overflow-y: hidden;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
        user-select: none;
        scrollbar-width: none;
        -ms-overflow-style: none;
    }

    .scrool_menu ul::-webkit-scrollbar {
        display: none;
    }

    .scrool_menu li {
        list-style: none;
        display: inline-block;
        position: relative;
        vertical-align: middle;
        width: 15%;
        margin: 0 2.5%;
        transition: 0.2s;
    }

    .scrool_menu li img {
        width: 10vw;
        pointer-events: none; /* panaikinamas  selectinimas ir draginimas elementu kaip swipini */
    }

    /* Judancio meniu stilistika END */
    /* Muzikos teksto nustatymai START */
    .song_info_box {
        border: 2px solid rgba(0, 0, 255, 0);
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 1vw;
    }

    #song-info {
        border: 5px solid #005d7c;
        height: 72%;
        position: relative;
        width: 84%;
        overflow-y: hidden;
        overflow-x: hidden;
        margin: 0;
        padding: 0;
        border-radius: 25px 50px 25px 50px;
        scrollbar-width: thin;
        scrollbar-color: #005d7c #ddd;
        max-height: 30vw;
        min-height: 30vw;
    }

    #song-info > * {
        margin: 0;
        padding: 0;
    }

    #song-info p {
        margin: 0;
        font-size: clamp(0.65rem, 1.2vw, 1.2rem);
        max-width: 100%;
        max-height: 100%;
        text-overflow: ellipsis;
        white-space: nowrap;
        overflow-y: auto;
        color: #003955;
        padding: 2vw 5vw;
    }

    .song-details a {
        color: #007bff;
        text-decoration: none;
        background-color: transparent;
        height: 100%;
        width: 100%;
        border: 1px solid rgba(255, 0, 0, 0);
        display: flex;
        align-content: center;
        align-items: center;
        top: 1vw;
        position: relative;
    }

    .song-text {
        display: none;
    }

    #song-info pre {
        white-space: pre-wrap;
        overflow: hidden;
    }

    #song-info::-webkit-scrollbar-thumb:hover {
        background-color: #003955;
    }

    /* Muzikos teksto nustatymai END */
    /* Muzikos playerio nustatymai START */
    .video_player_box {
        border: 2px solid rgba(255, 0, 0, 0);
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #video-player {
        width: 100%;
        max-width: 80vh;
        height: 0;
        padding-bottom: 56.25%; /* The aspect ratio of a standard video player (9/16) multiplied by 100 */
        position: relative;
        background-color: rgb(0, 93, 124);
        border: 1px solid #005d7c;
        border-radius: 25px 50px 25px 50px;
    }

    .video_pirmas_logotipas img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: 4px solid #005d7c;
        border-radius: 25px 50px 25px 50px;
        object-fit: none;

    }

    .video_pirmas_logotipas {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: 4px solid #005d7c;
        border-radius: 25px 50px 25px 50px;

    }

    #video-player iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: 4px solid #005d7c;
        border-radius: 25px 50px 25px 50px;
    }

    /* Muzikos playerio nustatymai END */
</style>


<body>
<div class="row headeris"></div>
<div class="container-fluid">
    <div class="row scrool_menu">  {{--karusele--}}
        <div class="col-md-12" style="padding-left: 3vw; margin-bottom: 1vw;"> {{-- karuseles lygiavimas--}}
            <div class="scroll-arrow arrow1" id="scroll-left" onclick="scrollLeft()">
                <img draggable="false" src="../img/kaire.png" onerror="this.onerror=null; this.src='../img/kaire.svg'" style="width: 7vw;"/> {{--karuseles rodykle--}}
            </div>{{--karuseles saraso pradzia--}}
            <ul id="imgList">
                <li>
                    <div class="song-details">{{--karuseles elemento informacija--}}
                        <p class="song-text">Nežinau galbūt aš keistas<br>
                            O gal šiaip tokia diena<br>
                            Nusibodo viskas man<br>
                            Visko man jau gana<br>
                            Taip sunku<br>
                            Neramu<br><br>
                            Man atrodė, kad aš myliu<br>
                            Kad tik meilėje jėga<br>
                            O dabar širdy taip tuščia<br>
                            Ir artėja pabaiga<br>
                            Aš tariu:<br>
                            Lik sveika<br><br>
                            Tavo žodžiai tartum bangos be krantų<br>
                            Nežinau, kodėl tavęs nesuprantu<br>
                            Tavo akys man meluoja<br>
                            Ir neleidžia atsikvėpt<br>
                            Na kodėl tu kalbi, o man tylėt?<br><br>
                            Tu palinkėk man gero vėjo<br>
                            Palinkėk geros kloties<br>
                            Palinkėki džiaugsmo, meilės ir vilties<br>
                            Tu palinkėk man gero vėjo<br>
                            Tik nelinkėk piktos lemties<br>
                            Kad galėčiau aš gyvent be praeities<br>
                            Kad galėčiau aš gyvent be praeities<br><br>
                            Aš nenoriu taip gyventi<br>
                            Kaip anksčiau aš gyvenau<br>
                            Ir klausytis pažadų<br>
                            Kurios aš mintinai žinau<br>
                            Tu nepyk<br>
                            Ir suprask<br><br>
                            Reikia baigti šį žaidimą<br>
                            Bus geriau ir man ir tau<br>
                            Tu kalbėdavai kad myli<br>
                            Bet aš meilės nematau<br>
                            Išeinu<br>
                            Atleiski man<br><br>
                            Suprantu, nesulaikysiu aš tavęs<br>
                            Tu teisus ar ne, gyvenimas išspręs<br>
                            Gal ir aš ne visada<br>
                            Tau buvau tikrai gera<br>
                            Aš viena, tavęs šalia jau nebėra<br><br>
                            Tu palinkėk man gero vėjo<br>
                            Palinkėk geros kloties<br>
                            Palinkėki džiaugsmo, meilės ir vilties<br>
                            Tu palinkėk man gero vėjo<br>
                            Tik nelinkėk piktos lemties<br>
                            Kad galėčiau aš gyvent be praeities<br>
                            Kad galėčiau aš gyvent be praeities
                        </p>{{--tekstas kuris atsiranda kaireje--}}
                        <a href="#" class="play-video" draggable="false" data-video="https://www.youtube.com/embed/dCzDUuirh_k?controls=0"> {{--video linkas--}}
                            <img draggable="false" src="../img/palinkek man gero.png"/>{{--nuotrauka--}}
                        </a>
                    </div>
                </li>
                <li>
                    <div class="song-details">
                        <p class="song-text">Aš visą dieną buvau kine<br>Laukiau kol filmas pakeis mane<br>Juoką ir
                            ašaras ten radau<br>Tik tavo veido nepamačiau<br><br>
                            Visa tai tęsiasi jau senai<br>Tai, kaip ir tau, aš žinau tikrai<br>Ieškau tavęs jei girdi
                            mane<br>Gal pasirodysi ekrane<br><br>
                            Aš kreipiuosi tiesiai į aukščiausią ministeriją<br>Gal gali atsiųst žinutę MONO arba
                            STEREO<br><br>
                            Radijo bangos anksti ryte<br>Persmelkia gaiviai kasdien mane<br>Eteris klykia šimtais
                            balsų<br>Tavo tiktai nerandu tarp jų<br><br>
                            Aš reklamas vėl mieste skaitau<br>Tavo žinutės dar negavau<br><br>
                            Aš kreipiuosi tiesiai į aukščiausią ministeriją<br>Gal gali atsiųst žinutę MONO arba
                            STEREO<br><br>
                            Aš kreipiuosi dar kart į aukščiausią ministeriją<br>Gal gali atsiųst žinutę MONO arba STEREO<br>STEREO
                        </p>
                        <a href="#" class="play-video" draggable="false"
                           data-video="https://www.youtube.com/embed/MiSqj3bIe-0"><img draggable="false"
                                                                                       src="../img/mono arba stereo.png"/></a>
                    </div>
                </li>
                <li>
                    <div class="song-details">
                        <p class="song-text">Nežinau galbūt aš keistas<br>
                            O gal šiaip tokia diena<br>
                            Nusibodo viskas man<br>
                            Visko man jau gana<br>
                            Taip sunku<br>
                            Neramu<br><br>
                            Man atrodė, kad aš myliu<br>
                            Kad tik meilėje jėga<br>
                            O dabar širdy taip tuščia<br>
                            Ir artėja pabaiga<br>
                            Aš tariu:<br>
                            Lik sveika<br><br>
                            Tavo žodžiai tartum bangos be krantų<br>
                            Nežinau, kodėl tavęs nesuprantu<br>
                            Tavo akys man meluoja<br>
                            Ir neleidžia atsikvėpt<br>
                            Na kodėl tu kalbi, o man tylėt?<br><br>
                            Tu palinkėk man gero vėjo<br>
                            Palinkėk geros kloties<br>
                            Palinkėki džiaugsmo, meilės ir vilties<br>
                            Tu palinkėk man gero vėjo<br>
                            Tik nelinkėk piktos lemties<br>
                            Kad galėčiau aš gyvent be praeities<br>
                            Kad galėčiau aš gyvent be praeities<br><br>
                            Aš nenoriu taip gyventi<br>
                            Kaip anksčiau aš gyvenau<br>
                            Ir klausytis pažadų<br>
                            Kurios aš mintinai žinau<br>
                            Tu nepyk<br>
                            Ir suprask<br><br>
                            Reikia baigti šį žaidimą<br>
                            Bus geriau ir man ir tau<br>
                            Tu kalbėdavai kad myli<br>
                            Bet aš meilės nematau<br>
                            Išeinu<br>
                            Atleiski man<br><br>
                            Suprantu, nesulaikysiu aš tavęs<br>
                            Tu teisus ar ne, gyvenimas išspręs<br>
                            Gal ir aš ne visada<br>
                            Tau buvau tikrai gera<br>
                            Aš viena, tavęs šalia jau nebėra<br><br>
                            Tu palinkėk man gero vėjo<br>
                            Palinkėk geros kloties<br>
                            Palinkėki džiaugsmo, meilės ir vilties<br>
                            Tu palinkėk man gero vėjo<br>
                            Tik nelinkėk piktos lemties<br>
                            Kad galėčiau aš gyvent be praeities<br>
                            Kad galėčiau aš gyvent be praeities
                        </p>
                        <a href="#" class="play-video" draggable="false"
                           data-video="https://www.youtube.com/embed/dCzDUuirh_k?controls=0"><img draggable="false"
                                                                                                  src="../img/palinkek man gero.png"/></a>
                    </div>
                </li>
                <li>
                    <div class="song-details">
                        <p class="song-text">Aš visą dieną buvau kine<br>Laukiau kol filmas pakeis mane<br>Juoką ir
                            ašaras ten radau<br>Tik tavo veido nepamačiau<br><br>
                            Visa tai tęsiasi jau senai<br>Tai, kaip ir tau, aš žinau tikrai<br>Ieškau tavęs jei girdi
                            mane<br>Gal pasirodysi ekrane<br><br>
                            Aš kreipiuosi tiesiai į aukščiausią ministeriją<br>Gal gali atsiųst žinutę MONO arba
                            STEREO<br><br>
                            Radijo bangos anksti ryte<br>Persmelkia gaiviai kasdien mane<br>Eteris klykia šimtais
                            balsų<br>Tavo tiktai nerandu tarp jų<br><br>
                            Aš reklamas vėl mieste skaitau<br>Tavo žinutės dar negavau<br><br>
                            Aš kreipiuosi tiesiai į aukščiausią ministeriją<br>Gal gali atsiųst žinutę MONO arba
                            STEREO<br><br>
                            Aš kreipiuosi dar kart į aukščiausią ministeriją<br>Gal gali atsiųst žinutę MONO arba STEREO<br>STEREO
                        </p>
                        <a href="#" class="play-video" draggable="false"
                           data-video="https://www.youtube.com/embed/MiSqj3bIe-0"><img draggable="false"
                                                                                       src="../img/mono arba stereo.png"/></a>
                    </div>
                </li>
                <li>
                    <div class="song-details">
                        <p class="song-text">Nežinau galbūt aš keistas<br>
                            O gal šiaip tokia diena<br>
                            Nusibodo viskas man<br>
                            Visko man jau gana<br>
                            Taip sunku<br>
                            Neramu<br><br>
                            Man atrodė, kad aš myliu<br>
                            Kad tik meilėje jėga<br>
                            O dabar širdy taip tuščia<br>
                            Ir artėja pabaiga<br>
                            Aš tariu:<br>
                            Lik sveika<br><br>
                            Tavo žodžiai tartum bangos be krantų<br>
                            Nežinau, kodėl tavęs nesuprantu<br>
                            Tavo akys man meluoja<br>
                            Ir neleidžia atsikvėpt<br>
                            Na kodėl tu kalbi, o man tylėt?<br><br>
                            Tu palinkėk man gero vėjo<br>
                            Palinkėk geros kloties<br>
                            Palinkėki džiaugsmo, meilės ir vilties<br>
                            Tu palinkėk man gero vėjo<br>
                            Tik nelinkėk piktos lemties<br>
                            Kad galėčiau aš gyvent be praeities<br>
                            Kad galėčiau aš gyvent be praeities<br><br>
                            Aš nenoriu taip gyventi<br>
                            Kaip anksčiau aš gyvenau<br>
                            Ir klausytis pažadų<br>
                            Kurios aš mintinai žinau<br>
                            Tu nepyk<br>
                            Ir suprask<br><br>
                            Reikia baigti šį žaidimą<br>
                            Bus geriau ir man ir tau<br>
                            Tu kalbėdavai kad myli<br>
                            Bet aš meilės nematau<br>
                            Išeinu<br>
                            Atleiski man<br><br>
                            Suprantu, nesulaikysiu aš tavęs<br>
                            Tu teisus ar ne, gyvenimas išspręs<br>
                            Gal ir aš ne visada<br>
                            Tau buvau tikrai gera<br>
                            Aš viena, tavęs šalia jau nebėra<br><br>
                            Tu palinkėk man gero vėjo<br>
                            Palinkėk geros kloties<br>
                            Palinkėki džiaugsmo, meilės ir vilties<br>
                            Tu palinkėk man gero vėjo<br>
                            Tik nelinkėk piktos lemties<br>
                            Kad galėčiau aš gyvent be praeities<br>
                            Kad galėčiau aš gyvent be praeities
                        </p>
                        <a href="#" class="play-video" draggable="false"
                           data-video="https://www.youtube.com/embed/dCzDUuirh_k?controls=0"><img draggable="false"
                                                                                                  src="../img/palinkek man gero.png"/></a>
                    </div>
                </li>
                <li>
                    <div class="song-details">
                        <p class="song-text">Aš visą dieną buvau kine<br>Laukiau kol filmas pakeis mane<br>Juoką ir
                            ašaras ten radau<br>Tik tavo veido nepamačiau<br><br>
                            Visa tai tęsiasi jau senai<br>Tai, kaip ir tau, aš žinau tikrai<br>Ieškau tavęs jei girdi
                            mane<br>Gal pasirodysi ekrane<br><br>
                            Aš kreipiuosi tiesiai į aukščiausią ministeriją<br>Gal gali atsiųst žinutę MONO arba
                            STEREO<br><br>
                            Radijo bangos anksti ryte<br>Persmelkia gaiviai kasdien mane<br>Eteris klykia šimtais
                            balsų<br>Tavo tiktai nerandu tarp jų<br><br>
                            Aš reklamas vėl mieste skaitau<br>Tavo žinutės dar negavau<br><br>
                            Aš kreipiuosi tiesiai į aukščiausią ministeriją<br>Gal gali atsiųst žinutę MONO arba
                            STEREO<br><br>
                            Aš kreipiuosi dar kart į aukščiausią ministeriją<br>Gal gali atsiųst žinutę MONO arba STEREO<br>STEREO
                        </p>
                        <a href="#" class="play-video" draggable="false"
                           data-video="https://www.youtube.com/embed/MiSqj3bIe-0"><img draggable="false"
                                                                                       src="../img/mono arba stereo.png"/></a>
                    </div>
                </li>
                <li>
                    <div class="song-details">
                        <p class="song-text">Nežinau galbūt aš keistas<br>
                            O gal šiaip tokia diena<br>
                            Nusibodo viskas man<br>
                            Visko man jau gana<br>
                            Taip sunku<br>
                            Neramu<br><br>
                            Man atrodė, kad aš myliu<br>
                            Kad tik meilėje jėga<br>
                            O dabar širdy taip tuščia<br>
                            Ir artėja pabaiga<br>
                            Aš tariu:<br>
                            Lik sveika<br><br>
                            Tavo žodžiai tartum bangos be krantų<br>
                            Nežinau, kodėl tavęs nesuprantu<br>
                            Tavo akys man meluoja<br>
                            Ir neleidžia atsikvėpt<br>
                            Na kodėl tu kalbi, o man tylėt?<br><br>
                            Tu palinkėk man gero vėjo<br>
                            Palinkėk geros kloties<br>
                            Palinkėki džiaugsmo, meilės ir vilties<br>
                            Tu palinkėk man gero vėjo<br>
                            Tik nelinkėk piktos lemties<br>
                            Kad galėčiau aš gyvent be praeities<br>
                            Kad galėčiau aš gyvent be praeities<br><br>
                            Aš nenoriu taip gyventi<br>
                            Kaip anksčiau aš gyvenau<br>
                            Ir klausytis pažadų<br>
                            Kurios aš mintinai žinau<br>
                            Tu nepyk<br>
                            Ir suprask<br><br>
                            Reikia baigti šį žaidimą<br>
                            Bus geriau ir man ir tau<br>
                            Tu kalbėdavai kad myli<br>
                            Bet aš meilės nematau<br>
                            Išeinu<br>
                            Atleiski man<br><br>
                            Suprantu, nesulaikysiu aš tavęs<br>
                            Tu teisus ar ne, gyvenimas išspręs<br>
                            Gal ir aš ne visada<br>
                            Tau buvau tikrai gera<br>
                            Aš viena, tavęs šalia jau nebėra<br><br>
                            Tu palinkėk man gero vėjo<br>
                            Palinkėk geros kloties<br>
                            Palinkėki džiaugsmo, meilės ir vilties<br>
                            Tu palinkėk man gero vėjo<br>
                            Tik nelinkėk piktos lemties<br>
                            Kad galėčiau aš gyvent be praeities<br>
                            Kad galėčiau aš gyvent be praeities
                        </p>
                        <a href="#" class="play-video" draggable="false"
                           data-video="https://www.youtube.com/embed/dCzDUuirh_k?controls=0"><img draggable="false"
                                                                                                  src="../img/palinkek man gero.png"/></a>
                    </div>
                </li>
                <li>
                    <div class="song-details">
                        <p class="song-text">Aš visą dieną buvau kine<br>Laukiau kol filmas pakeis mane<br>Juoką ir
                            ašaras ten radau<br>Tik tavo veido nepamačiau<br><br>
                            Visa tai tęsiasi jau senai<br>Tai, kaip ir tau, aš žinau tikrai<br>Ieškau tavęs jei girdi
                            mane<br>Gal pasirodysi ekrane<br><br>
                            Aš kreipiuosi tiesiai į aukščiausią ministeriją<br>Gal gali atsiųst žinutę MONO arba
                            STEREO<br><br>
                            Radijo bangos anksti ryte<br>Persmelkia gaiviai kasdien mane<br>Eteris klykia šimtais
                            balsų<br>Tavo tiktai nerandu tarp jų<br><br>
                            Aš reklamas vėl mieste skaitau<br>Tavo žinutės dar negavau<br><br>
                            Aš kreipiuosi tiesiai į aukščiausią ministeriją<br>Gal gali atsiųst žinutę MONO arba
                            STEREO<br><br>
                            Aš kreipiuosi dar kart į aukščiausią ministeriją<br>Gal gali atsiųst žinutę MONO arba STEREO<br>STEREO
                        </p>
                        <a href="#" class="play-video" draggable="false"
                           data-video="https://www.youtube.com/embed/MiSqj3bIe-0"><img draggable="false"
                                                                                       src="../img/mono arba stereo.png"/></a>
                    </div>
                </li>
                <li>
                    <div class="song-details">
                        <p class="song-text">Nežinau galbūt aš keistas<br>
                            O gal šiaip tokia diena<br>
                            Nusibodo viskas man<br>
                            Visko man jau gana<br>
                            Taip sunku<br>
                            Neramu<br><br>
                            Man atrodė, kad aš myliu<br>
                            Kad tik meilėje jėga<br>
                            O dabar širdy taip tuščia<br>
                            Ir artėja pabaiga<br>
                            Aš tariu:<br>
                            Lik sveika<br><br>
                            Tavo žodžiai tartum bangos be krantų<br>
                            Nežinau, kodėl tavęs nesuprantu<br>
                            Tavo akys man meluoja<br>
                            Ir neleidžia atsikvėpt<br>
                            Na kodėl tu kalbi, o man tylėt?<br><br>
                            Tu palinkėk man gero vėjo<br>
                            Palinkėk geros kloties<br>
                            Palinkėki džiaugsmo, meilės ir vilties<br>
                            Tu palinkėk man gero vėjo<br>
                            Tik nelinkėk piktos lemties<br>
                            Kad galėčiau aš gyvent be praeities<br>
                            Kad galėčiau aš gyvent be praeities<br><br>
                            Aš nenoriu taip gyventi<br>
                            Kaip anksčiau aš gyvenau<br>
                            Ir klausytis pažadų<br>
                            Kurios aš mintinai žinau<br>
                            Tu nepyk<br>
                            Ir suprask<br><br>
                            Reikia baigti šį žaidimą<br>
                            Bus geriau ir man ir tau<br>
                            Tu kalbėdavai kad myli<br>
                            Bet aš meilės nematau<br>
                            Išeinu<br>
                            Atleiski man<br><br>
                            Suprantu, nesulaikysiu aš tavęs<br>
                            Tu teisus ar ne, gyvenimas išspręs<br>
                            Gal ir aš ne visada<br>
                            Tau buvau tikrai gera<br>
                            Aš viena, tavęs šalia jau nebėra<br><br>
                            Tu palinkėk man gero vėjo<br>
                            Palinkėk geros kloties<br>
                            Palinkėki džiaugsmo, meilės ir vilties<br>
                            Tu palinkėk man gero vėjo<br>
                            Tik nelinkėk piktos lemties<br>
                            Kad galėčiau aš gyvent be praeities<br>
                            Kad galėčiau aš gyvent be praeities
                        </p>
                        <a href="#" class="play-video" draggable="false"
                           data-video="https://www.youtube.com/embed/dCzDUuirh_k?controls=0"><img draggable="false"
                                                                                                  src="../img/palinkek man gero.png"/></a>
                    </div>
                </li>
                <li>
                    <div class="song-details">
                        <p class="song-text">Aš visą dieną buvau kine<br>Laukiau kol filmas pakeis mane<br>Juoką ir
                            ašaras ten radau<br>Tik tavo veido nepamačiau<br><br>
                            Visa tai tęsiasi jau senai<br>Tai, kaip ir tau, aš žinau tikrai<br>Ieškau tavęs jei girdi
                            mane<br>Gal pasirodysi ekrane<br><br>
                            Aš kreipiuosi tiesiai į aukščiausią ministeriją<br>Gal gali atsiųst žinutę MONO arba
                            STEREO<br><br>
                            Radijo bangos anksti ryte<br>Persmelkia gaiviai kasdien mane<br>Eteris klykia šimtais
                            balsų<br>Tavo tiktai nerandu tarp jų<br><br>
                            Aš reklamas vėl mieste skaitau<br>Tavo žinutės dar negavau<br><br>
                            Aš kreipiuosi tiesiai į aukščiausią ministeriją<br>Gal gali atsiųst žinutę MONO arba
                            STEREO<br><br>
                            Aš kreipiuosi dar kart į aukščiausią ministeriją<br>Gal gali atsiųst žinutę MONO arba STEREO<br>STEREO
                        </p>
                        <a href="#" class="play-video" draggable="false"
                           data-video="https://www.youtube.com/embed/MiSqj3bIe-0"><img draggable="false"
                                                                                       src="../img/mono arba stereo.png"/></a>
                    </div>
                </li>
            </ul>
            <div class="scroll-arrow arrow2" id="scroll-right" onclick="scrollRight()">
                <img draggable="false" src="../img/desine.png" onerror="this.onerror=null; this.src='../img/desine.svg'" style="width: 7vw;"/>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-6 order-2 order-md-1 song_info_box">
            <div id="song-info">
                <p>Informacija apie laidas<br>paspaudus ant epizodo mygtuko si<br> informacija isnyks</p> {{--Tekstine informacija kuria rodo tik uzkrovus puslapi--}}
            </div>
        </div>
        <div class="col-12 col-md-6 order-1 order-md-2 video_player_box">
            <div id="video-player">
                <div class="video_pirmas_logotipas">
                    <img src="../img/logo2.png"/> {{--nuotrauka kuria parodo tik uzkrovus puslapi--}}

                </div>
            </div>
        </div>
    </div>
</div>
<div class="row footeris"></div>
<script>
    var imgList = document.getElementById('imgList');
    var scrollRight = document.getElementById('scroll-right');
    var scrollLeft = document.getElementById('scroll-left');

    var isDragging = false;
    var startX, scrollLeftStart;

    // When a user clicks on the right arrow, the ul will scroll 750px to the right
    scrollRight.addEventListener('click', (event) => {
        if (!isDragging) {
            imgList.scrollBy(700, 0);
        }
    });

    // When a user clicks on the left arrow, the ul will scroll 750px to the left
    scrollLeft.addEventListener('click', (event) => {
        if (!isDragging) {
            imgList.scrollBy(-700, 0);
        }
    });

    // When a user presses the mouse button down on the ul, store the current mouse position and set the isDragging flag
    imgList.addEventListener('mousedown', (event) => {
        if (event.button !== 0) return;
        isDragging = true;
        startX = event.pageX - imgList.offsetLeft;
        scrollLeftStart = imgList.scrollLeft;
    });

    // When a user moves the mouse while dragging, calculate the distance they have dragged and update the scroll position of the ul accordingly
    document.addEventListener('mousemove', (event) => {
        if (!isDragging) return;
        event.preventDefault();
        const x = event.pageX - imgList.offsetLeft;
        const distance = (x - startX) * 1.5;
        imgList.scrollLeft = scrollLeftStart - distance;
    });

    // When a user releases the mouse button, reset the isDragging flag and stop following the mouse cursor
    document.addEventListener('mouseup', (event) => {
        if (event.button !== 0) return;
        isDragging = false;
    });

    // When the mouse leaves the ul, reset the isDragging flag and stop following the mouse cursor
    imgList.addEventListener('mouseleave', (event) => {
        isDragging = false;
    });

    var playButtons = document.getElementsByClassName('play-video');
    var videoPlayer = document.getElementById('video-player');
    var songInfo = document.getElementById('song-info');

    for (var i = 0; i < playButtons.length; i++) {
        playButtons[i].addEventListener('click', function () {
            // Get the song text from the correct song details element
            var songText = this.parentNode.querySelector('.song-text').innerHTML;

            // Get the video link from the clicked button's data-video attribute
            var videoLink = this.getAttribute('data-video');
            videoPlayer.innerHTML = '<iframe width="500" height="500" src="' + videoLink + '" title="Video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';

            // Update the song info with the selected song text
            songInfo.innerHTML = '<p>' + songText + '</p>';
        });
    }

</script>


</body>
