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
    .container-fluid {
        height: 751px;

    }

    body {
        padding: 0;
    }

    .player {
        height: calc(100% - 100px);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        position: relative;
        overflow: hidden;
    }

    .dainos_nuotrauka {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 600px;
        box-shadow: inset -5px -5px 10px rgb(0, 93, 124),
        inset 5px 5px 10px rgb(0, 93, 124);
    }

    .dainos_nuotrauka img {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
        filter: drop-shadow(10px 10px 25px rgba(0, 0, 0, 0.9));
        padding: 10px;
        width: 300px;
        height: 300px;
        margin: 0;
    }

    .bar {
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #005d7c;
        height: 80px;
    }

    progress {
        width: 100%;
        background-color: white;
        border: 3px solid white;
        border-radius: 30px;
        -webkit-appearance: none;

    }

    progress::-webkit-progress-value {
        background-color: #005d7c;
        transition: width 0.2s linear;
    }

    progress::-moz-progress-bar {
        background-color: #005d7c;
        transition: width 0.2s linear;
    }

    .kontrole {
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #005d7c;
        padding-bottom: 21px;
    }
    /*Nuotrauka backgroundui playerio su nedideliu judejimu*/
    .uzpildas {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: -1;
        filter: blur(6px);
        width: 1550px;
        height: 1550px;
        animation: slide 200s linear infinite;
    }

    @keyframes slide {
        0% {
            transform: translate(-50%, -40%);
        }
        50% {
            transform: translate(-53%, -43%);
        }
        100% {
            transform: translate(-50%, -40%);
        }
    }

    .playlist {
        border-bottom: 46px solid #005d7c;
        padding: 0;
        border-right: 20px solid #005d7c;
        border-left: 20px solid #005d7c;
        background-color: #005d7c;
    }

    .playlist img {
        height: 100px;
        width: 100px;
        border-radius: 20px 0 0 20px
    }

    .playlist li {
        display: block;
        margin: 0;
        padding: 0;
        background-color: rgba(255, 255, 255, 0);
        color: #005d7c;
        cursor: pointer;
        outline: none;
        border: none;
        border-top: 10px solid rgba(255, 255, 255, 0);
        font-size: 16px;
        text-align: center;
        width: 100%;
        box-sizing: border-box;
    }

    .playlist ul {
        margin: 0;
        height: 639px;
        overflow-y: scroll;
        background-color: #005d7c;
    }

    .col-2 {
        padding: 0;
    }

    .playlist_songs {
        margin-right: 18px;
    }

    .paieskos_isore {
        background-color: #005d7c;
        display: flex;
        justify-content: center;
        align-items: center;
        padding-bottom: 20px;
    }

    #searchInput {
        border: none;
        border-radius: 50px;
        width: 80%;
        border-bottom: 2px solid #005d7c;
        color: #005d7c;
        font-size: 29px;
        text-align: center;
    }

    .dainos_foto {
        max-width: 100%;
        height: auto;
        object-fit: contain;
        display: flex;
        justify-content: flex-end;
        background-color: rgba(255, 0, 0, 0);
    }

    .dainos_info {
        background-color: rgba(255, 255, 255, 0.15);
        color: #ffffff;
        border-radius: 0 20px 20px 0;
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .dainos_info:hover {
        border-radius: 0 20px 20px 0;
        border: 1px solid #ffffff;
    }

    .dainos_info:active {
        border-radius: 0 20px 20px 0;
        border: 1px solid #005d7c;
        background-color: #005d7c;
        color: #ffffff;
    }

    .dainos_info.clicked {
        border-radius: 0 20px 20px 0;
        border: 1px solid #005d7c;
        background-color: #ffffff;
        color: #005d7c;
    }

    .kontrole button {
        background-color: rgba(83, 79, 204, 0);
        border: none;
    }

    .kontrole img {
        width: 50px;
        height: 50px;
    }

    #elapsedTime {
        color: white;
        font: 20px "Arial Rounded MT Bold";
        padding-right: 10px;
    }

    #remainingTime {
        color: white;
        font: 20px "Arial Rounded MT Bold";
        padding-left: 10px;
    }

    .grupe {
        flex: 1;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        font-size: 4vh;
    }

    .daina {
        flex: 1;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        font-size: 2vh;

    }

    @media screen and (max-width: 1920px) and (min-width: 1250px) {
        .grupe {
            font-size: 4vh;
        }

        .daina {
            font-size: 2vh;
        }
    }

    @media screen and (max-width: 1250px) and (min-width: 1000px) {
        .grupe {
            font-size: 3vh;
        }

        .daina {
            font-size: 1.5vh;
        }
    }

    @media screen and (max-width: 1000px) and (min-width: 575px) {
        .grupe {
            font-size: 2vh;
        }

        .daina {
            font-size: 1vh;
        }
    }

    .elapsedTime {
        text-align: left;
    }

    .remainingTime {
        text-align: right;
    }

    .mygtukai {
        display: flex;
        justify-content: inherit;
        position: relative;
        left: 9%;
    }

    .garsas {
        display: flex;
        justify-content: right;
    }

    #volumeSlider {
        -webkit-appearance: none;
        appearance: none;
        width: 100%;
        height: 20px;
        border-radius: 50px;
        background-color: white;
        outline: none;
    }

    #volumeSlider::-webkit-slider-thumb {
        -webkit-appearance: none;
        appearance: none;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background-color: #005d7c;
        cursor: pointer;
    }

    #volumeSlider::-moz-range-thumb {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background-color: #005d7c;
        cursor: pointer;
    }

    .sound_bar {
        display: flex;
        align-content: revert;
        align-items: center;
    }

    .kontrole {
        display: flex;
        flex-wrap: wrap;
    }

    .kontrole .col-9 {
        min-width: 200px;
    }

    .kontrole .col-3 {
        min-width: 200px;
    }
</style>


<body>
{{--pilnas playeris--}}
<div class="container-fluid">
    <div class="row ">
        <div class="col-sm-7 player">
            {{--playerio backgroundas uzkrovimo metu yra  logotipas--}}
            <img src="../img/logob.png" alt="foto" class="uzpildas">
            <div class="row dainos_nuotrauka">
                {{--playerio pagrindine nuotraukyte uzkrovimo metu yra  logotipas--}}
                <img src="../img/logo2.png" alt="foto">
            </div>
            {{--progreso baras, laikai--}}
            <div class="row bar">
                <div class="col-12">
                    <progress id="progressBar" value="0" max="100"></progress>
                </div>
                <div class="col-6 elapsedTime">
                    <span id="elapsedTime">0:00</span>
                </div>
                <div class="col-6 remainingTime">
                    <span id="remainingTime">0:00</span>
                </div>

            </div>
            <div class="row kontrole">
                {{--mygtukai--}}
                <div class="col-9 mygtukai">
                    <button id="prevButton"><img src="../img/previuos.png" alt="foto"></button>
                    <button id="playPauseButton"><img src="../img/play.png" alt="foto"></button>
                    <button id="nextButton"><img src="../img/next.png" alt="foto"></button>
                    <button id="repeatButton"><img src="../img/repeat0.png" alt="foto"></button>
                </div>
                <div class="col-3 garsas">
                    <img src="../img/volup.png" alt="foto">
                    <div class="sound_bar">
                        <div class="volume-slider-container">
                            <input type="range" min="0" max="1" step="0.01" value="1" id="volumeSlider">
                            <div class="fill"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        {{--dainu sarasas "playlist"--}}
        <div class="col-sm-5 playlist">
            <div class="row paieskos_isore">
                <input type="text" id="searchInput" onkeyup="searchSongs()"
                       placeholder="Paieška">
            </div>
            {{--playSong('audio failas', didinimas kad veiktu next +1,'nuotraukos failas')--}}
            <ul id="songList">
                <li onclick="playSong('../img/Fighting Myself .mp3',1,'../img/sc1.png')">
                    <div class="row playlist_songs">
                        <div class="col-2 dainos_foto">
                            {{--'nuotraukos failas')--}}
                            <img src="../img/sc1.png" alt="foto" class="img-fluid"
                                 style="max-width: 100%; height: auto; object-fit: fill;">
                        </div>
                        <div class="col-10 dainos_info" onclick="this.classList.toggle('clicked')">
                            {{--Grupes pavadinimas ir dainos pavadinimas--}}
                            <div class="row grupe">Linkin Park</div>
                            <div class="row daina">Fighting myself</div>
                        </div>
                    </div>
                </li>
                <li onclick="playSong('../img/Vandens zenklai.mp3', 2, '../img/vandens zenklai.png')">
                    <div class="row playlist_songs">
                        <div class="col-2 dainos_foto">
                            <img src="../img/vandens zenklai.png" alt="foto" class="img-fluid"
                                 style="max-width: 100%; height: auto; object-fit: fill;">
                        </div>
                        <div class="col-10 dainos_info" onclick="this.classList.toggle('clicked')">
                            <div class="row grupe">Hiperbolė</div>
                            <div class="row daina">Vandens ženklai</div>
                        </div>
                    </div>
                </li>
                <li onclick="playSong('../img/Rondo - Lauku Gele.mp3', 3, '../img/lauku gele.png')">
                    <div class="row playlist_songs">
                        <div class="col-2 dainos_foto">
                            <img src="../img/lauku gele.png" alt="foto" class="img-fluid"
                                 style="max-width: 100%; height: auto; object-fit: fill;">
                        </div>
                        <div class="col-10 dainos_info" onclick="this.classList.toggle('clicked')">
                            <div class="row grupe">Rondo</div>
                            <div class="row daina">Lauku gele</div>
                        </div>
                    </div>
                </li>
                <li onclick="playSong('../img/Rondo - Sala.mp3', 4, '../img/Rondo sala.png')">
                    <div class="row playlist_songs">
                        <div class="col-2 dainos_foto">
                            <img src="../img/Rondo sala.png" alt="foto" class="img-fluid"
                                 style="max-width: 100%; height: auto; object-fit: fill;">
                        </div>
                        <div class="col-10 dainos_info" onclick="this.classList.toggle('clicked')">
                            <div class="row grupe">Rondo</div>
                            <div class="row daina">Sala</div>
                        </div>
                    </div>
                </li>
                <li onclick="playSong('../img/Vasara, vasara.mp3', 5, '../img/vasara.png')">
                    <div class="row playlist_songs">
                        <div class="col-2 dainos_foto">
                            <img src="../img/vasara.png" alt="foto" class="img-fluid"
                                 style="max-width: 100%; height: auto; object-fit: fill;">
                        </div>
                        <div class="col-10 dainos_info" onclick="this.classList.toggle('clicked')">
                            <div class="row grupe">Hiperbolė</div>
                            <div class="row daina">Vasara</div>
                        </div>
                    </div>
                </li>
                <li onclick="playSong('../img/Andrius Mamontovas - _Kitoks pasaulis (2017)_.mp3', 6, '../img/kitoks pasaulis.png')">
                    <div class="row playlist_songs">
                        <div class="col-2 dainos_foto">
                            <img src="../img/kitoks pasaulis.png" alt="foto" class="img-fluid"
                                 style="max-width: 100%; height: auto; object-fit: fill;">
                        </div>
                        <div class="col-10 dainos_info" onclick="this.classList.toggle('clicked')">
                            <div class="row grupe">Andrius Mamontovas</div>
                            <div class="row daina">Kitoks pasaulis</div>
                        </div>
                    </div>
                </li>
                <li onclick="playSong('../img/Andrius Mamontovas - _Mono Arba Stereo_.mp3', 7, '../img/mono arba stereo.png')">
                    <div class="row playlist_songs">
                        <div class="col-2 dainos_foto">
                            <img src="../img/mono arba stereo.png" alt="foto" class="img-fluid"
                                 style="max-width: 100%; height: auto; object-fit: fill;">
                        </div>
                        <div class="col-10 dainos_info" onclick="this.classList.toggle('clicked')">
                            <div class="row grupe">Andrius Mamontovas</div>
                            <div class="row daina">Mono arba stereo</div>
                        </div>
                    </div>
                </li>
                <li onclick="playSong('../img/MG INTERNATIONAL - JUODA ORCHIDEJA  (Official).mp3', 8, '../img/juoda orchideja.png')">
                    <div class="row playlist_songs">
                        <div class="col-2 dainos_foto">
                            <img src="../img/juoda orchideja.png" alt="foto" class="img-fluid"
                                 style="max-width: 100%; height: auto; object-fit: fill;">
                        </div>
                        <div class="col-10 dainos_info" onclick="this.classList.toggle('clicked')">
                            <div class="row grupe">MG INTERNATIONAL</div>
                            <div class="row daina">Juoda orchideja</div>
                        </div>
                    </div>
                </li>
                <li onclick="playSong('../img/Dinamika - Palinkėk man gero vėjo (1994).mp3', 9, '../img/palinkek man gero.png')">
                    <div class="row playlist_songs">
                        <div class="col-2 dainos_foto">
                            <img src="../img/palinkek man gero.png" alt="foto" class="img-fluid"
                                 style="max-width: 100%; height: auto; object-fit: fill;">
                        </div>
                        <div class="col-10 dainos_info" onclick="this.classList.toggle('clicked')">
                            <div class="row grupe">Dinamika</div>
                            <div class="row daina">Palinkek man gero vejo</div>
                        </div>
                    </div>
                </li>
            </ul>
            <audio id="audioPlayer">
                <source src="" type="audio/mpeg">
            </audio>
        </div>
    </div>
</div>
</body>

<script>
    const audioPlayer = document.querySelector('#audioPlayer');
    const progressBar = document.querySelector('#progressBar');
    const playPauseButton = document.querySelector('#playPauseButton');
    const prevButton = document.querySelector('#prevButton');
    const nextButton = document.querySelector('#nextButton');
    const repeatButton = document.querySelector('#repeatButton');
    const repeatImg = repeatButton.querySelector('img');
    const playlistItems = document.querySelectorAll('.playlist ul li');
    let currentSongIndex = -1;
    let isRepeating = false;
    const playPauseImg = document.querySelector('#playPauseButton img');
    const volumeSlider = document.getElementById("volumeSlider");
    const audioElement = document.getElementById("audioElement");

    /*Garso slideris*/

    volumeSlider.addEventListener("input", function () {
        audioPlayer.volume = volumeSlider.value;
    });

    /*Muzikos leidimas*/
    function stopAudio() {
        audioPlayer.pause();
        audioPlayer.currentTime = 0;
        progressBar.value = 0;
        playPauseImg.src = '../img/play.png';
    }

    function playSong(songPath, index, songImage) {
        stopAudio();
        audioPlayer.src = songPath;
        audioPlayer.load();
        progressBar.value = 0;
        audioPlayer.addEventListener('timeupdate', updateProgressBar);
        progressBar.addEventListener('click', function (e) {
            const pos = (e.pageX - this.offsetLeft) / this.offsetWidth;
            audioPlayer.currentTime = pos * audioPlayer.duration;
        });
        audioPlayer.play();
        playPauseImg.src = '../img/pause.png';

        // Set player images based on clicked song's image path
        const uzpildas = document.querySelector('.uzpildas');
        const dainosNuotrauka = document.querySelector('.dainos_nuotrauka img');

        uzpildas.src = songImage;
        dainosNuotrauka.src = songImage;

        currentSongIndex = index;
    }

    /*Progreso laikas*/
    function formatTime(milliseconds) {
        const totalSeconds = Math.floor(milliseconds / 1000);
        const minutes = Math.floor(totalSeconds / 60);
        const seconds = Math.floor(totalSeconds % 60);
        return `${minutes}:${seconds.toString().padStart(2, '0')}`;
    }

    /*Progreso bar uzpildas*/
    function updateProgressBar() {
        const progress = (audioPlayer.currentTime / audioPlayer.duration) * 100;

        if (isNaN(progress) || !isFinite(progress)) {
            requestAnimationFrame(updateProgressBar);
            return;
        }

        progressBar.value = progress;

        const elapsedTimeDisplay = document.getElementById('elapsedTime');
        const remainingTimeDisplay = document.getElementById('remainingTime');
        elapsedTimeDisplay.textContent = formatTime(audioPlayer.currentTime * 1000);
        remainingTimeDisplay.textContent = '-' + formatTime((audioPlayer.duration - audioPlayer.currentTime) * 1000);

        requestAnimationFrame(updateProgressBar);
    }

    /*Progreso bar valdymas paspaudimu*/
    progressBar.addEventListener('click', function (e) {
        const pos = (e.clientX - this.getBoundingClientRect().left) / this.offsetWidth;
        audioPlayer.currentTime = pos * audioPlayer.duration.toFixed(0);

        const thumbSize = getComputedStyle(progressBar).getPropertyValue('--thumb-size');
        const thumbPosition = `calc(${pos * 100}% - ${thumbSize} / 2)`;
        progressBar.style.setProperty('--thumb-position', thumbPosition);

        progressBar.value = pos * 100;
    });

    /*pauzes mygtukas*/
    function togglePlayPause() {
        if (audioPlayer.paused) {
            audioPlayer.play();
            playPauseImg.src = './img/pause.png';
            console.log('Audio played');
            audioPlayer.addEventListener('timeupdate', updateProgressBar);
        } else {
            audioPlayer.pause();
            playPauseImg.src = './img/play.png';
            console.log('Audio paused');
            audioPlayer.removeEventListener('timeupdate', updateProgressBar);
        }
    }

    /*repeat mygtukas*/
    function toggleRepeat() {
        isRepeating = !isRepeating;
        if (isRepeating) {
            repeatImg.src = '../img/repeat1.png';
        } else {
            repeatImg.src = '../img/repeat0.png';
        }
    }

    console.log(`Current song index: ${currentSongIndex}`);
    console.log(`Playlist items length: ${playlistItems.length}`);

    /*next mygtukas*/
    function playNextSong() {
        currentSongIndex = (currentSongIndex < playlistItems.length - 1) ? currentSongIndex + 1 : 0;
        const songPath = playlistItems[currentSongIndex].getAttribute('onclick').match(/'(.*?)'/)[1];
        const songImage = playlistItems[currentSongIndex].querySelector('.dainos_foto img').src;
        playSong(songPath, currentSongIndex, songImage);
    }

    /*previuos mygtukas*/
    function playPreviousSong() {
        currentSongIndex = (currentSongIndex > 0) ? currentSongIndex - 1 : playlistItems.length - 1;
        const songPath = playlistItems[currentSongIndex].getAttribute('onclick').match(/'(.*?)'/)[1];
        const songImage = playlistItems[currentSongIndex].querySelector('.dainos_foto img').src;
        console.log(songPath);
        playSong(songPath, currentSongIndex, songImage);
    }

    audioPlayer.addEventListener('ended', function () {
        if (isRepeating) {
            audioPlayer.currentTime = 0;
            audioPlayer.play();
            return;
        }
        playNextSong();
    });

    audioPlayer.addEventListener('pause', function () {
        playPauseImg.src = './img/play.png';
        console.log('Audio paused');
    });
    audioPlayer.addEventListener('play', function () {
        playPauseImg.src = '../img/pause.png';
        console.log('Audio played');
    });

    function searchSongs() {
        // Get the input value and convert to lowercase
        const input = document.getElementById("searchInput").value.toLowerCase();

        // Get the song list
        const songs = document.getElementById("songList").getElementsByTagName("li");

        // Loop through each song and show/hide based on the input value
        for (let i = 0; i < songs.length; i++) {
            const song = songs[i];
            const title = song.innerText.toLowerCase();
            if (title.indexOf(input) > -1) {
                song.style.display = "";
            } else {
                song.style.display = "none";
            }
        }
    }

    /*Mygtuko isvaizdos keitimas kaip paspaudi*/
    function handleClick(e) {
        // remove clicked class from all elements
        var elements = document.getElementsByClassName("dainos_info");
        for (var i = 0; i < elements.length; i++) {
            elements[i].classList.remove("clicked");
        }

        // add clicked class to the clicked element
        e.currentTarget.classList.add("clicked");
    }

    // add event listener to all dainos_info elements
    var dainosInfoElements = document.getElementsByClassName("dainos_info");
    for (var i = 0; i < dainosInfoElements.length; i++) {
        dainosInfoElements[i].addEventListener("click", handleClick);
    }

    prevButton.addEventListener('click', playPreviousSong);
    nextButton.addEventListener('click', playNextSong);
    playPauseButton.addEventListener('click', togglePlayPause);
    repeatButton.addEventListener('click', toggleRepeat);
</script>
</body>


