const rightMenu = document.querySelector('.rightMenu');
const rightMenuX = rightMenu.offsetLeft + rightMenu.offsetWidth / 2;
const rightMenuY = rightMenu.offsetTop + rightMenu.offsetHeight / 2;

document.addEventListener('mousemove', e => {
    const mouseX = e.clientX;
    const mouseY = e.clientY;

    const deltaX = -(mouseX - rightMenuX) / 90;
    const deltaY = -(mouseY - rightMenuY) / 90;

    const rotationY = Math.atan(deltaX / deltaY) * 20 / Math.PI;
    const rotationX = Math.atan(deltaY / Math.abs(deltaX)) * 20 / Math.PI;

    rightMenu.style.transform = `translate3d(${deltaX}px, ${deltaY}px, 0) rotateY(${rotationY}deg) rotateX(${rotationX}deg)`;
});
