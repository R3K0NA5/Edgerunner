const canvas=document.querySelector('canvas')
const c =canvas.getContext('2d')

canvas.width=1024
canvas.height=576
const gravity = 0.05

class Sprite{
    constructor({position, imageSrc}) {
        this.position = position
        this.image = new Image()
        this.image.src = imageSrc
    }
    draw(){
        if (!this.image) return
        c.drawImage(this.image, this.position.x, this.position.y)
    }
    update(){
        this.draw()
    }
}

class Player{
    constructor(pasition) {
        this.position=pasition
        this.velocity={
            x:0,
            y:1
        }
        this.height=100
    }
    draw(){
        c.fillStyle='red'
        c.fillRect(this.position.x,this.position.y,100,this.height)
    }
    update(){
        this.draw()

        this.position.y += this.velocity.y
        this.position.x += this.velocity.x

        if(this.position.y + this.height + this.velocity.y < canvas.height)
        this.velocity.y += gravity
        else this.velocity.y = 0
    }
}
const player = new Player({x:100,y:100})
const player2 = new Player({x:200,y:50})
const keys ={
    d:{
        pressed:false,
    },
    a:{
        pressed:false,
    }
}

c.fillStyle='white'
c.fillRect(0,0,canvas.width,canvas.height)

const background = new Sprite({position:{x:0,y:0},imageSrc:'../img/background.png'})

function animate() {
    window.requestAnimationFrame(animate);

    c.fillStyle = 'white';
    c.fillRect(0, 0, canvas.width, canvas.height);

    background.update();

    player.update();
    player2.update();

    // Collision detection
    if (player.position.x < player2.position.x + 100 &&
        player.position.x + 100 > player2.position.x &&
        player.position.y < player2.position.y + player2.height &&
        player.position.y + player.height > player2.position.y) {
        // Players have collided
        // Increment player1 score and write to database
        let playerId = 1; // assuming player1 has ID of 1
        let score = 1; // increment score by 1
        $.ajax({
            type: 'POST',
            url: '/scores',
            data: { player_id: playerId, score: score },
            success: function(data) {
                console.log('Score saved to database');
            }
        });
    }

    player.velocity.x = 0;
    if (keys.d.pressed) player.velocity.x = 1;
    else if (keys.a.pressed) player.velocity.x = -1;
}

animate()

window.addEventListener('keydown',(event)=>{
    switch (event.key){
        case'd':
            keys.d.pressed = true
            break
        case'a':
            keys.a.pressed = true
            break
        case'w':
            player.velocity.y = -5
            break
    }
})
window.addEventListener('keyup',(event)=>{
    switch (event.key){
        case'd':
            keys.d.pressed = false
            break
        case'a':
            keys.a.pressed = false
            break
    }
})
