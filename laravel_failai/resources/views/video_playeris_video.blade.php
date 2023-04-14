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
    /* pagrindinis karuseles box START */
    .video_box_1_atm {
        border: 1px solid rgba(255, 0, 0, 0);
        height: 10vw;
        display: flex;
        overflow: hidden;
        flex-direction: row;
        position: relative;
        padding-right: 0px;
        padding-left: 0px;
    }

    .video_box_1_atm img {
        height: 100%;
        width: 15vw;
        transition: transform 0.3s ease-in-out, opacity 1.0s ease-in-out;
    }

    /* karusese nuotrauku nustatymai*/

    #imgList3 {
        border: 1px solid rgba(255, 0, 0, 0);
        height: 10vw;
        display: flex;
        overflow: hidden;
        flex-direction: row;
        /*clip-path: polygon(0px 0px, 95.39% -1px, 100% 100%, 0% 100%);*/
    }

    #imgList3 img {
        pointer-events: none;

    }

    /* karusese listinimo nustatymai*/
    #imgList3 ul {
        list-style-type: none;
    }

    #imgList3 li {
        margin-right: 1vw;
        list-style: none;
    }

    #imgList3 a {
        color: #007bff;
        text-decoration: none;
        background-color: transparent;
        width: 10vw;
        height: 10vw;
        display: flex;
    }

    #imgList2 {
        border: 1px solid rgba(255, 0, 0, 0);
        height: 10vw;
        display: flex;
        overflow: hidden;
        flex-direction: row;
        /*clip-path: polygon(0px 0px, 95.39% -1px, 100% 100%, 0% 100%);*/
    }

    #imgList2 img {
        pointer-events: none;

    }

    /* karusese listinimo nustatymai*/
    #imgList2 ul {
        list-style-type: none;
    }

    #imgList2 li {
        margin-right: 1vw;
        list-style: none;
    }

    #imgList2 a {
        color: #007bff;
        text-decoration: none;
        background-color: transparent;
        width: 10vw;
        height: 10vw;
        display: flex;
    }


    #imgList {
        border: 1px solid rgba(255, 0, 0, 0);
        height: 10vw;
        display: flex;
        overflow: hidden;
        flex-direction: row;
        /*clip-path: polygon(0px 0px, 95.39% -1px, 100% 100%, 0% 100%);*/
    }

    #imgList img {
        pointer-events: none;

    }

    /* karusese listinimo nustatymai*/
    #imgList ul {
        list-style-type: none;
    }

    #imgList li {
        margin-right: 1vw;
        list-style: none;
    }

    #imgList a {
        color: #007bff;
        text-decoration: none;
        background-color: transparent;
        width: 10vw;
        height: 10vw;
        display: flex;
    }

    /* karusese nuotrauku  reakcijos nuo hove nustatymai*/
    .video_box_1_atm img:hover {
        transform: scale(1.2);
        z-index: 2;
        opacity: 1;
    }

    /* soninis tekstas karuseles turinys*/
    .video_box_2_atm {
        border: 1px solid rgba(0, 0, 255, 0);
        height: 10vw;
        width: 100%;
        overflow: hidden;
    }

    .video_box_2_atm p {
        font-size: clamp(0.1rem, 0.65vw, 1rem);
        color: #005d7c;
        font-family: 'Viner Hand ITC', sans-serif;
    }

    /* pagrindinis karuseles box END*/
    /* video info/ iframe playerio/ playlist START*/
    /* animacijos nustatymai kaip atsiranda antra dalis paspaudus ant virsutines karuseles*/
    #info-row {
        opacity: 0;
        transform: translateY(-100%);
        transition: opacity 2s ease-in-out, transform 0.75s ease-in-out, height 0.5s ease-in-out 0s;
        height: 0;
        font-size: clamp(0.1rem, 2vw, 3rem);
        color: #005d7c;
    }

    /* playlist nustatymai START */
    #info-row li {
        text-decoration: none;
        border: 0.25vw solid rgba(255, 0, 0, 0);
        border-left-style: solid;
        border-left-width: 4px;
        height: 15%;
        text-overflow: ellipsis;
        width: 100%;
        max-width: 50vw;
        position: relative;
        transition: all 1s ease-in-out;
        text-indent: 0%;
        white-space: nowrap;
        overflow: hidden;
        border-left: 0.25vw solid;
        left: 0.4vw;
    }

    #info-row li::after {
        content: '';
        position: absolute;
        bottom: 0;
        right: 0;
        height: 100%;
        width: 50%;
        background: linear-gradient(to right, rgba(255, 255, 255, 0), white);
    }

    #info-row li:hover {
        /*overflow: visible;*/
        white-space: nowrap;
        text-indent: 0%;
    }

    #info-row li.overflowing:hover {
        /*overflow: visible;*/
        white-space: nowrap;
        text-indent: -20%;
    }

    #info-row li:hover::after {
        display: none;
    }

    #info-row ul {
        list-style: none;
        width: 100%;
        padding-left: 0;
    }

    /* dainu playlist virsutine dalis */
    .antras_dainu_meniu {
        clip-path: polygon(0% 0%, 100% 0%, 100% 30%, 100% 70%, 100% 100%, 5% 100%, 0% 70%, 0% 30%);
        background-color: #005d7c;
        color: white;
        font-size: clamp(0.1rem, 2vw, 3rem);
    }

    /* dainu playlist virsutine dalies teksto lygiavimas */
    .antras_dainu_meniu p {
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0;

    }

    /* playlist nustatymai END */
    /* Video playerio nustatymai START */
    .atm-video_playeris {
        border-top: 1vw solid #005d7c;
        border-right: 1vw solid #005d7c;
        border-left: 1vw solid rgba(255, 255, 255, 0);
        border-bottom: 1vw solid rgba(255, 255, 255, 0);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* background nuotraukos kaip nera nieko paleista nustatymai */
    .atm-video_playeris iframe {
        background-color: rgba(0, 93, 124, 0);
        height: 30vw;
        width: 100%;
        background-image: url("../img/logo.png");
        background-position: center center;
        background-repeat: no-repeat;
        background-size: contain;
    }

    .atm-video_playeris_tekstas {
        border-left: 1vw solid #005d7c;
        border-bottom: 1vw solid #005d7c;
        border-top: 1vw solid rgba(255, 255, 255, 0);
        border-right: 1vw solid rgba(255, 255, 255, 0);
    }

    /* Video playerio nustatymai END */
</style>

<body>
<div class="container-fluid">
    <div class="row">
        {{-- karuseles pradzia, <i class="fa fa-chevron-left"></i> nematomi elementai reguliuoja atstumus   --}}
        <div class="col-md-9 col-sm-9 col-9 video_box_1_atm flex-grow-0 flex-shrink-0">
            <div class="scroll-arrow left" id="scrollLeft"><i class="fa fa-chevron-left"></i></div>
            {{-- pirmas logotipas islaikyta pozicia ir forma --}}
            <div >
                <img src="../img/porpartlogotipas.png" alt="foto" draggable="false"
                     style="/*clip-path: polygon(0 0, 75% 0, 100% 100%, 0% 100%)*/;pointer-events: none;"></div>
            {{-- grupuoja pagal grupes paima ju foto, paspaudus prideda grupes pavadimima http://localhost/video_playeris_video/Hiperbole  --}}
            <ul id="imgList">
                @foreach($groups as $group)
                    @if($group->group == "popart")
                        <li>
                            <a href="/video_playeris_video/{{ $group->group }}" draggable="false">
                                <img src="{{ $group->photo }}" alt="foto" draggable="false">
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
            <div class="scroll-arrow right" id="scrollRight"><i class="fa fa-chevron-right"></i></div>

        </div>
        {{-- desinysis tekstas karuseles --}}
        <div class="col-md-3 col-sm-3 col-3 video_box_2_atm flex-grow-0 flex-shrink-0">
            <p>
                <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"Pop art" <br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lietuvos pop muzikos renginys<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Visų
                festivalių organizatorius ir rengėjas<br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;„Pop
                centras“
            </p>
        </div>
    </div>
    <div class="row">
        {{--karuseles pradzia, <i class="fa fa-chevron-left"></i> nematomi elementai reguliuoja atstumus--}}
        <div class="col-md-9 col-sm-9 col-9 video_box_1_atm flex-grow-0 flex-shrink-0">
            <div class="scroll-arrow left" id="scrollLeft2"><i class="fa fa-chevron-left"></i></div>
            {{--antras logotipas islaikyta pozicia ir forma--}}
            <div>
                <img src="../img/popartmarathon.png" alt="foto" draggable="false"
                     style="/*clip-path: polygon(0 0, 75% 0, 100% 100%, 0% 100%)*/;pointer-events: none;">
            </div>
            {{--grupuoja pagal grupes paima ju foto, paspaudus prideda grupes pavadimima http://localhost/video_playeris_video/123--}}
            <ul id="imgList2">
                @foreach($groups as $group)
                    @if($group->group == "popmarathon")
                        <li>
                            <a href="/video_playeris_video/{{ $group->group }}" draggable="false">
                                <img src="{{ $group->photo }}" alt="foto" draggable="false">
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
            <div class="scroll-arrow right" id="scrollRight2"><i class="fa fa-chevron-right"></i></div>
        </div>
        {{--desinysis tekstas karuseles--}}
        <div class="col-md-3 col-sm-3 col-3 video_box_2_atm flex-grow-0 flex-shrink-0">
            <p>
                <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"POPMARATHON" <br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lietuvos kitų muzikos žanrų renginys<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Organizuoja
                „Kitų renginių organizatorius“<br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;„Kitų
                centras“
            </p>
        </div>
    </div>
    <div class="row">
        {{--karuseles pradzia, <i class="fa fa-chevron-left"></i> nematomi elementai reguliuoja atstumus--}}
        <div class="col-md-9 col-sm-9 col-9 video_box_1_atm flex-grow-0 flex-shrink-0">
            <div class="scroll-arrow left" id="scrollLeft3"><i class="fa fa-chevron-left"></i></div>
            {{--antras logotipas islaikyta pozicia ir forma--}}
            <div style="scale: 1.3;">
                <img src="../img/kita.png" alt="foto" draggable="false"
                     style="/*clip-path: polygon(0 0, 75% 0, 100% 100%, 0% 100%)*/;pointer-events: none;">
            </div>
            {{--grupuoja pagal grupes paima ju foto, paspaudus prideda grupes pavadimima http://localhost/video_playeris_video/123--}}
            <ul id="imgList3">
                @foreach($groups as $group)
                    @if($group->group == "kiti")
                        <li>
                            <a href="/video_playeris_video/{{ $group->group }}" draggable="false">
                                <img src="{{ $group->photo }}" alt="foto" draggable="false">
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
            <div class="scroll-arrow right" id="scrollRight3"><i class="fa fa-chevron-right"></i></div>
        </div>
        {{--desinysis tekstas karuseles--}}
        <div class="col-md-3 col-sm-3 col-3 video_box_2_atm flex-grow-0 flex-shrink-0">
            <p>
                <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"Kiti" <br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lietuvos kitų muzikos žanrų renginys<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Organizuoja
                „Kitų renginių organizatorius“<br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;„Kitų
                centras“
            </p>
        </div>
    </div>
    {{-- islistina dainas pasirinktas is grupes --}}
    @if(isset($videos))
        {{-- kairiojo sono informacija apie video  --}}
        <div class="row" id="info-row" data-group="{{ $group }}" style="padding-top: 1vw;">
            <div class="col-md-3 col-sm-3 col-3 atm-video_playeris_tekstas">
                @foreach($videos as $video)
                    <p>{{ $video->information }}</p>
                @endforeach
            </div>
            {{-- vidurinis iframe  --}}
            <div class="col-md-6 col-sm-6 col-6 atm-video_playeris">
                <iframe id="songPlayer" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="col-md-3 col-sm-3 col-3"
                 style=" padding: 0; background-color: rgba(0,93,124,0)">
                {{-- playlistas islistntas is pasirinktos grupes --}}
                <div id="playlist">
                    <div class="antras_dainu_meniu"><p>Dainos</p></div>
                    <ul id="songList">
                        @foreach($videos as $video)
                            <li data-file="../img/{{ $video->path }}"><p>{{ $video->name }} - {{ $video->title }}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif
</div>

<script>
    var imgList = document.getElementById('imgList');
    var scrollLeft = document.getElementById('scrollLeft');
    var scrollRight = document.getElementById('scrollRight');
    var isDragging = false;
    var startX, scrollLeftStart;

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

    imgList.addEventListener("wheel", (event) => {
        event.preventDefault();
        imgList.scrollLeft += event.deltaY * 1.5;
    });


    var imgList2 = document.getElementById('imgList2');
    var scrollLeft2 = document.getElementById('scrollLeft2');
    var scrollRight2 = document.getElementById('scrollRight2');
    var isDragging2 = false;
    var startX2, scrollLeftStart2;

    // When a user presses the mouse button down on the ul, store the current mouse position and set the isDragging flag
    imgList2.addEventListener('mousedown', (event) => {
        if (event.button !== 0) return;
        isDragging2 = true;
        startX2 = event.pageX - imgList2.offsetLeft;
        scrollLeftStart2 = imgList2.scrollLeft;
    });

    // When a user moves the mouse while dragging, calculate the distance they have dragged and update the scroll position of the ul accordingly
    document.addEventListener('mousemove', (event) => {
        if (!isDragging2) return;
        event.preventDefault();
        const x = event.pageX - imgList2.offsetLeft;
        const distance = (x - startX2) * 1.5;
        imgList2.scrollLeft = scrollLeftStart2 - distance;
    });

    // When a user releases the mouse button, reset the isDragging flag and stop following the mouse cursor
    document.addEventListener('mouseup', (event) => {
        if (event.button !== 0) return;
        isDragging2 = false;
    });

    // When the mouse leaves the ul, reset the isDragging flag and stop following the mouse cursor
    imgList2.addEventListener('mouseleave', (event) => {
        isDragging2 = false;
    });

    imgList2.addEventListener("wheel", (event) => {
        event.preventDefault();
        imgList2.scrollLeft += event.deltaY * 1.5;
    });
    var imgList3 = document.getElementById('imgList3');
    var scrollLeft3 = document.getElementById('scrollLeft3');
    var scrollRight3 = document.getElementById('scrollRight3');
    var isDragging3 = false;
    var startX3, scrollLeftStart3;

    // When a user presses the mouse button down on the ul, store the current mouse position and set the isDragging flag
    imgList3.addEventListener('mousedown', (event) => {
        if (event.button !== 0) return;
        isDragging3 = true;
        startX3 = event.pageX - imgList3.offsetLeft;
        scrollLeftStart3 = imgList3.scrollLeft;
    });

    // When a user moves the mouse while dragging, calculate the distance they have dragged and update the scroll position of the ul accordingly
    imgList3.addEventListener('mousemove', (event) => {
        if (!isDragging3) return;
        event.preventDefault();
        const x = event.pageX - imgList3.offsetLeft;
        const distance = (x - startX3) * 1.5;
        imgList3.scrollLeft = scrollLeftStart3 - distance;
    });

    // When a user releases the mouse button, reset the isDragging flag and stop following the mouse cursor
    imgList3.addEventListener('mouseup', (event) => {
        if (event.button !== 0) return;
        isDragging3 = false;
    });

    // When the mouse leaves the ul, reset the isDragging flag and stop following the mouse cursor
    imgList3.addEventListener('mouseleave', (event) => {
        isDragging3 = false;
    });
    imgList3.addEventListener("wheel", (event) => {
        event.preventDefault();
        imgList3.scrollLeft += event.deltaY * 1.5;
    });

    /*dainu sarasas*/
    const songListElement = document.getElementById('songList');
    const songPlayerElement = document.getElementById('songPlayer');

    const songs = songListElement.querySelectorAll('li');
    songs.forEach(song => {
        if (song.scrollWidth > song.clientWidth) {
            song.classList.add('overflowing');
        }

        const file = song.getAttribute('data-file');
        song.addEventListener('click', () => {
            songPlayerElement.setAttribute('src', file);
        });
    });

    // Show/hide the info row based on the current URL
    const currentUrl = window.location.href;
    const groupName = currentUrl.split('/').pop();

    const infoRowForGroup = document.querySelector(`#info-row[data-group="${groupName}"]`);
    if (infoRowForGroup) {
        const infoRow = $(infoRowForGroup);
        infoRow.hide().css('opacity', 0).slideDown(100).animate({
            opacity: 1
        }, 5000);
    } else if (!groupName) {
        const infoRow = $('#info-row');
        infoRow.slideUp(100).animate({
            opacity: 0
        }, 5000);
    }
    const infoRow = $('#info-row');
    infoRow.addClass('animating');
    setTimeout(() => {
        //sioje dalyje norint sulyginti playerio dydi su viso konteinerio dydziu reiki redaguoti css('height', '35vw');
        infoRow.css('opacity', 1).css('transform', 'translateY(0%)').css('height', '35vw');
    }, 100);

    setTimeout(() => {
        infoRow.removeClass('animating');
    }, 1000);
</script>
</body>
