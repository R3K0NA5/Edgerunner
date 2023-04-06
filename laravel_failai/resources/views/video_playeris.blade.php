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
    /* Judancio meniu stilistika START */
    .scroll-arrow {
        width: 10%;
        display: inline-block;
        position: relative;
        vertical-align: middle;
        cursor: pointer;
        padding: 0;
        margin: 0;
        opacity: 0.5;
        font-size: 34px;
        transition: 0.2s;
    }

    .scroll-arrow:hover {
        transition: 0.2s;
        opacity: 1;
    }

    .scrool_menu ul {
        width: 70%;
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
        width: 20%;
        margin: 0 2.5%;
        filter: grayscale(100%);
        transition: 0.2s;
    }

    .scrool_menu li img {
        width: 200px;
        pointer-events: none; /* panaikinamas  selectinimas ir draginimas elementu kaip swipini */
    }
    .scrool_menu button {
        overflow: visible;
        display: flex;
        position: relative;
        right: -82px;
        top: 163px;
    }
    /* Judancio meniu stilistika END */
    /* Muzikos teksto nustatymai END */
    #song-info {
        border: 2px solid black;
        width: 60vh;
        height: 60vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #video-player {
        border: 2px solid black;
        width: 60vh;
        height: 60vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .song-text {
        display: none;
    }

    #song-info pre {
        white-space: pre-wrap;
        overflow: hidden;
    }
    /* Muzikos teksto nustatymai END */
</style>

<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div id="video-player"></div>
        </div>
        <div class="col-md-6">
            <div id="song-info">
                <p>Pagrindinis langas paprasta informacija</p>
            </div>
        </div>
    </div>
    <div class="row scrool_menu">
        <div class="col-md-12">
            <div class="scroll-arrow" id="scroll-left">
                &#8592;
            </div>
            <ul id="imgList">
                <li data-song="mano stereo">
                    <button class="play-video" data-video="https://www.youtube.com/embed/MiSqj3bIe-0">Play Video
                    </button>
                    <img src="../img/palinkek man gero.png"/>
                </li>
                <li data-song="mano stereo">
                    <button class="play-video" data-video="https://www.youtube.com/embed/MiSqj3bIe-0">Play Video
                    </button>
                    <img src="../img/juoda orchideja.png"/>
                </li>
                <li>
                    <div class="song-details">
                        <p class="song-text">Aš visą dieną buvau kine<br>Laukiau kol filmas pakeis mane<br></p>
                        <button class="play-video" data-video="https://www.youtube.com/embed/MiSqj3bIe-0">Play
                            Video
                        </button>
                        <img src="../img/mono arba stereo.png"/>
                    </div>
                </li>
                <li>
                    <div class="song-details">
                        <p class="song-text"> Laukiau kol filmas pakeis mane<br>Aš visą dieną buvau kine<br></p>
                        <button class="play-video" data-video="https://www.youtube.com/embed/abc123">Play Video
                        </button>
                        <img src="../img/kitoks pasaulis.png"/>
                    </div>
                </li>

                <li>
                    <button class="play-video" data-video="https://www.youtube.com/embed/def456">Play Video</button>
                    <img src="../img/vasara.png"/>
                </li>
                <li>
                    <button class="play-video" data-video="https://www.youtube.com/embed/xyz789">Play Video</button>
                    <img src="../img/Rondo sala.png"/>
                </li>
            </ul>
            <div class="scroll-arrow" id="scroll-right" onclick="scrollRight()">
                &#8594;
            </div>
        </div>
    </div>
</div>

<script>
    var imgList = document.getElementById('imgList');
    var scrollRight = document.getElementById('scroll-right');
    var scrollLeft = document.getElementById('scroll-left');

    var isDragging = false;
    var startX, scrollLeftStart;

    // When a user clicks on the right arrow, the ul will scroll 750px to the right
    scrollRight.addEventListener('click', (event) => {
        if (!isDragging) {
            imgList.scrollBy(750, 0);
        }
    });

    // When a user clicks on the left arrow, the ul will scroll 750px to the left
    scrollLeft.addEventListener('click', (event) => {
        if (!isDragging) {
            imgList.scrollBy(-750, 0);
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
