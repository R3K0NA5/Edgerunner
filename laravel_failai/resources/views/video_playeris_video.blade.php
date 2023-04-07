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
        background-color: #005d7c;
        height: 5vw;
    }

    .footeris {
        background-color: #005d7c;
        height: 5vw;
    }

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
        border: 1px solid rgba(0, 128, 0, 0);
        height: 20vw;
        width: 20vw;
        clip-path: polygon(0 0, 75% 0, 100% 100%, 25% 100%);
        left: 11vw;
        top: -5vw;
        position: relative;
        transition: transform 0.3s ease-in-out, opacity 1.0s ease-in-out;
        opacity: 1;
    }

    #imgList {
        border: 1px solid rgba(255, 0, 0, 0);
        height: 10vw;
        display: flex;
        overflow: hidden;
        flex-direction: row;
        clip-path: polygon(0px 0px, 95.39% -1px, 100% 100%, 0% 100%);
    }

    #imgList ul {

    }

    #imgList li {
        left: -13vw;
        position: relative;
        margin-right: -4vw;
    }

    .video_box_1_atm img:hover {
        transform: scale(1.2);
        z-index: 2;
        opacity: 1;
    }

    .video_box_2_atm {
        border: 1px solid rgba(0, 0, 255, 0);
        height: 10vw;
        width: 100%;
        overflow: hidden;
        overflow: scroll;
    }

    .video_box_2_atm p {
        font-size: clamp(0.1rem, 1.2vw, 1rem);
        color: #005d7c; font-family: 'Viner Hand ITC', sans-serif;
    }

</style>

<body>
<div class="headeris"></div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-9 col-sm-9 col-9 video_box_1_atm flex-grow-0 flex-shrink-0">
            <div class="scroll-arrow left" id="scrollLeft"><i class="fa fa-chevron-left"></i></div>
            <div style="

position: relative;
left: -7.1vw;
z-index: 3;">

                <img src="../img/popart.png" alt="foto" draggable="false"
                     style="
                     clip-path: polygon(0 0, 75% 0, 100% 100%, 0% 100%);
                     pointer-events: none;
                     "></div>
            <ul id="imgList">

                <li><img src="../img/sc1.png" alt="foto" draggable="false"></li>
                <li><img src="../img/sc1.png" alt="foto" draggable="false"></li>
                <li><img src="../img/sc1.png" alt="foto" draggable="false"></li>
                <li><img src="../img/sc1.png" alt="foto" draggable="false"></li>
                <li><img src="../img/sc1.png" alt="foto" draggable="false"></li>
                <li><img src="../img/sc1.png" alt="foto" draggable="false"></li>
                <li><img src="../img/sc1.png" alt="foto" draggable="false"></li>
                <li><img src="../img/sc1.png" alt="foto" draggable="false"></li>
                <li><img src="../img/sc1.png" alt="foto" draggable="false"></li>
                <li><img src="../img/sc1.png" alt="foto" draggable="false"></li>

            </ul>
            <div class="scroll-arrow right" id="scrollRight"><i class="fa fa-chevron-right"></i></div>
        </div>
        <div class="col-md-3 col-sm-3 col-3 video_box_2_atm flex-grow-0 flex-shrink-0">
            <p>
                <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"Pop art" <br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lietuvos pop muzikos renginys<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Visų festivalių organizatorius ir rengėjas<br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;„Pop centras“
            </p>
        </div>
    </div>
</div>
<div class="footeris"></div>
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
</script>
</body>
