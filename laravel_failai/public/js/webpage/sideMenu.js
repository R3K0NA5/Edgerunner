const sideMeniuGame = document.querySelector('.sideMeniuGame');
const sideMeniuGameX = sideMeniuGame.offsetLeft + sideMeniuGame.offsetWidth / 2;
const sideMeniuGameY = sideMeniuGame.offsetTop + sideMeniuGame.offsetHeight / 2;

document.addEventListener('mousemove', e => {
    const mouseX = e.clientX;
    const mouseY = e.clientY;

    const deltaX = -(mouseX - sideMeniuGameX) / 400;
    const deltaY = -(mouseY - sideMeniuGameY) / 400;

    const rotationY = Math.atan(deltaX / deltaY) * 5 / Math.PI;
    const rotationX = Math.atan(deltaY / Math.abs(deltaX)) * 5 / Math.PI;

    sideMeniuGame.style.transform = `translate3d(${deltaX}px, ${deltaY}px, 0) rotateY(${rotationY}deg) rotateX(${rotationX}deg)`;
});
