const canvas = document.querySelector('canvas')
const c = canvas.getContext('2d')
canvas.width = 1000
canvas.height = 1000
const scaledCanvas = {
    width: canvas.width,
    height: canvas.height,
}
const floorCollisions2D = []
for (let i = 0; i < floorCollisions.length; i += 800) {
    floorCollisions2D.push(floorCollisions.slice(i, i + 800))
}
const collisionBlocks = []
floorCollisions2D.forEach((row, y) => {
    row.forEach((symbol, x) => {
        if (symbol === 83539) {
            collisionBlocks.push(
                new CollisionBlock({
                    position: {
                        x: x * 10,
                        y: y * 10,
                    },
                })
            )
        }
    })
})
const platformCollisions2D = []
for (let i = 0; i < platformCollisions.length; i += 800) {
    platformCollisions2D.push(platformCollisions.slice(i, i + 800))
}
const platformCollisionBlocks = []
platformCollisions2D.forEach((row, y) => {
    row.forEach((symbol, x) => {
        if (symbol === 83539) {
            platformCollisionBlocks.push(
                new CollisionBlock({
                    position: {
                        x: x * 10,
                        y: y * 10,
                    },
                    /*height: 4,*/
                })
            )
        }
    })
})

class Projectile {
    constructor({position, velocity, camerabox}) {
        this.position = position;
        this.velocity = velocity;
        this.radius = 3;
        this.camerabox = camerabox;
    }

    draw() {
        c.beginPath();
        c.arc(this.position.x, this.position.y, this.radius, 0, Math.PI * 2);
        c.fillStyle = 'white';
        c.fill();
        c.closePath();
    }

    update() {
        this.draw();
        this.position.x += this.velocity.x;
        this.position.y += this.velocity.y;

        if (
            this.position.x < this.camerabox.position.x ||
            this.position.x > this.camerabox.position.x + this.camerabox.width ||
            this.position.y < this.camerabox.position.y ||
            this.position.y > this.camerabox.position.y + this.camerabox.height
        ) {
            // Remove the projectile from the projectiles array if it's outside of the camerabox
            projectiles.splice(projectiles.indexOf(this), 1);
        }
    }

    isCollidingWith(enemy) {
        const dx = this.position.x - (enemy.hitbox.position.x + enemy.hitbox.width / 2);
        const dy = this.position.y - (enemy.hitbox.position.y + enemy.hitbox.height / 2);
        const distance = Math.sqrt(dx * dx + dy * dy);
        return distance < this.radius + Math.max(enemy.hitbox.width, enemy.hitbox.height) / 3;
    }
}

const projectiles = []
const gravity = 0.1

async function createPlayer(x, y, spriteId) {
    const response = await axios.get(`/sprite/${spriteId}`);
    const data = response.data.data;

    // Parse the sprite data into a JavaScript object
    const spriteData = {
        id: data.id,
        imageSrc: data.imageSrc,
        animations: data.animations,
    };

    const player = new Player({
        position: {
            x,
            y,
        },
        collisionBlocks,
        platformCollisionBlocks,
        imageSrc: spriteData.imageSrc,
        frameRate: 8,
        animations: spriteData.animations,
    });

    return player;
}

let player;

async function main() {
    // get the sprite ID for the authenticated user
    const spriteId = await axios.get('/user/sprite-id').then(response => response.data.sprite_id);

    // call createPlayer with the sprite ID
    const player1 = await createPlayer(100, 700, spriteId);
    player = player1;
    // rest of your code goes here
}

async function updateSpriteId(spriteId) {
    await axios.put('/user/sprite-id', {sprite_id: spriteId});
}

main().then(() => {
    function createEnemy(x, y, imageSrc, frameRate) {
        return new Enemy({
            position: {
                x,
                y,
            },
            collisionBlocks,
            platformCollisionBlocks,
            imageSrc,
            frameRate,
        });
    }

    const enemy1 = createEnemy(300, 700, '../img/soldier/idle.png', 8, 200);
    const enemy2 = createEnemy(600, 700, '../img/soldier/idle.png', 8, 200);
    const enemies = [enemy1, enemy2,];
    const keys = {
        d: {
            pressed: false,
        },
        a: {
            pressed: false,
        },
    }
    const background = new Sprite({
        position: {
            x: 0,
            y: 0,
        },
        imageSrc: '../img/background.png',
    })
    const backgroundImageHeight = 1000
    const camera = {
        position: {
            x: 0,
            y: -backgroundImageHeight + scaledCanvas.height,
        },
    }
    let score = 0;

    function animate() {
        window.requestAnimationFrame(animate)
        c.fillStyle = 'white'
        c.fillRect(0, 0, canvas.width, canvas.height)

        c.save()
        c.scale(1, 1)
        c.translate(camera.position.x, camera.position.y)
        background.update()
        collisionBlocks.forEach((collisionBlock) => {
            collisionBlock.update()
        })
        platformCollisionBlocks.forEach((block) => {
            block.update()
        })
        // Check for collisions between projectiles and enemies
        for (let i = 0; i < projectiles.length; i++) {
            for (let j = 0; j < enemies.length; j++) {
                if (projectiles[i].isCollidingWith(enemies[j])) {
                    // Increase the score by 100
                    score += 100;
                    // Remove the enemy from the enemies array
                    enemies.splice(j, 1);
                    // Remove the projectile from the projectiles array
                    projectiles.splice(i, 1);
                    // Exit the loop since a projectile can only hit one enemy
                    break;
                }
            }
        }
        // Update the remaining enemies
        enemies.forEach((enemy) => {
            enemy.checkForHorizontalCanvasCollision()
            enemy.update()
            // Draw the hitbox for the enemy
            c.fillStyle = 'rgba(85,255,0,0)'
            c.fillRect(
                enemy.hitbox.position.x,
                enemy.hitbox.position.y,
                enemy.hitbox.width,
                enemy.hitbox.height
            )
        })
        // Update the player and projectiles
        player.checkForHorizontalCanvasCollision()
        player.update()

        projectiles.forEach((projectile) => {
            projectile.update();
        });

        player.velocity.x = 0
        if (keys.d.pressed) {
            player.switchSprite('Run')
            player.velocity.x = 2
            player.lastDirection = 'right'
            player.shouldPanCameraToTheLeft({canvas, camera})
        } else if (keys.a.pressed) {
            player.switchSprite('RunLeft')
            player.velocity.x = -2
            player.lastDirection = 'left'
            player.shouldPanCameraToTheRight({canvas, camera})
        } else if (player.velocity.y === 0) {
            if (player.lastDirection === 'right') player.switchSprite('Idle')
            else player.switchSprite('IdleLeft')
        }

        if (player.velocity.y < 0) {
            player.shouldPanCameraDown({camera, canvas})
            if (player.lastDirection === 'right') player.switchSprite('Jump')
            else player.switchSprite('JumpLeft')
        } else if (player.velocity.y > 0) {
            player.shouldPanCameraUp({camera, canvas})
            if (player.lastDirection === 'right') player.switchSprite('Fall')
            else player.switchSprite('FallLeft')
        }

        c.fillStyle = 'white';
        c.font = '20px Arial';
        c.fillText(`Score: ${score}`, 10, 30);
        c.restore()
    }

    animate()
    window.addEventListener('keydown', (event) => {
        switch (event.key) {
            case 'd':
                keys.d.pressed = true
                break
            case 'a':
                keys.a.pressed = true
                break
            case 'w':
                player.velocity.y = -4
                break
            case ' ':
                /*console.log('space')*/
                projectiles.push(new Projectile({
                    position: {x: player.position.x + player.width, y: player.position.y + 50},
                    velocity: {x: 10, y: 0},
                    camerabox: player.camerabox, // pass the camerabox to the constructor
                }))
                break
        }
    })
    window.addEventListener('keyup', (event) => {
        switch (event.key) {
            case 'd':
                keys.d.pressed = false
                break
            case 'a':
                keys.a.pressed = false
                break
        }
    })
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    /*function encodeScoreWithBtoa(score) {
        return btoa(score.toString());
    }*/

    function encodeScoreWithBtoaModified(score) {
        return btoa(`modified-${score.toString()}`);
    }

    function encodeScoreWithBtoaPrefixSuffix(score) {
        return btoa(`prefix-${score.toString()}-suffix`);
    }

    /*function encodeScoreWithBtoaRandomPrefix(score) {
        const prefix = Math.random().toString(36).substring(2, 7);
        return btoa(`${prefix}-${score.toString()}`);
    }*/

    function encodeScoreWithBtoaRandomSuffix(score) {
        const suffix = Math.random().toString(36).substring(2, 7);
        return btoa(`${score.toString()}-${suffix}`);
    }

    function encodeScoreWithBtoaReversed(score) {
        const reversedScore = score.toString().split('').reverse().join('');
        return btoa(`reversed-${reversedScore}`);
    }

    function encodeScoreWithBtoaUppercase(score) {
        const uppercaseScore = score.toString().toUpperCase();
        return btoa(`uppercase-${uppercaseScore}`);
    }

    function encodeScoreWithBtoaLowercase(score) {
        const lowercaseScore = score.toString().toLowerCase();
        return btoa(`lowercase-${lowercaseScore}`);
    }

    function encodeScoreWithBtoaAlternatingCase(score) {
        let alternatingCaseScore = '';
        for (let i = 0; i < score.toString().length; i++) {
            if (i % 2 === 0) {
                alternatingCaseScore += score.toString().charAt(i).toUpperCase();
            } else {
                alternatingCaseScore += score.toString().charAt(i).toLowerCase();
            }
        }
        return btoa(`alternating-${alternatingCaseScore}`);
    }

    function encodeScoreWithBtoaReversedAlternatingCase(score) {
        let reversedAlternatingCaseScore = '';
        for (let i = 0; i < score.toString().length; i++) {
            if (i % 2 === 0) {
                reversedAlternatingCaseScore += score.toString().charAt(i).toLowerCase();
            } else {
                reversedAlternatingCaseScore += score.toString().charAt(i).toUpperCase();
            }
        }
        return btoa(`reversed-alternating-${reversedAlternatingCaseScore}`);
    }

    function encodeScoreWithBtoaBase64Reversed(score) {
        const base64Score = btoa(score.toString());
        const reversedBase64Score = base64Score.split('').reverse().join('');
        return btoa(`base64-reversed-${reversedBase64Score}`);
    }

    /*function encodeScoreWithBtoaModifiedPrefixBase64Reversed(score) {
        const base64Score = btoa(score.toString());
        const reversedBase64Score = base64Score.split('').reverse().join('');
        return btoa(`modified-base64-reversed-${reversedBase64Score}`);
    }*/

    const activeEncoder = 'modified'; // set to the name of the encoder you want to use

    window.addEventListener('keydown', function (event) {
        if (event.key === 'l') {
            const scoreConstant = `const score = ${score};`; // Use template literal to create constant string
            eval(scoreConstant); // Evaluate the constant string to create the constant variable
            let encodedScore;
            switch (activeEncoder) {
                /*case 'btoa':
                    encodedScore = encodeScoreWithBtoa(score);
                    break;*/
                case 'modified':
                    encodedScore = encodeScoreWithBtoaModified(score);
                    break;
                case 'prefixSuffix':
                    encodedScore = encodeScoreWithBtoaPrefixSuffix(score);
                    break;
                /*case 'randomPrefix':
                    encodedScore = encodeScoreWithBtoaRandomPrefix(score);
                    break;*/
                case 'randomSuffix':
                    encodedScore = encodeScoreWithBtoaRandomSuffix(score);
                    break;
                case 'reversed':
                    encodedScore = encodeScoreWithBtoaReversed(score);
                    break;
                case 'uppercase':
                    encodedScore = encodeScoreWithBtoaUppercase(score);
                    break;
                case 'lowercase':
                    encodedScore = encodeScoreWithBtoaLowercase(score);
                    break;
                case 'alternatingCase':
                    encodedScore = encodeScoreWithBtoaAlternatingCase(score);
                    break;
                case 'reversedAlternatingCase':
                    encodedScore = encodeScoreWithBtoaReversedAlternatingCase(score);
                    break;
                case 'base64Reversed':
                    encodedScore = encodeScoreWithBtoaBase64Reversed(score);
                    break;
               /* case 'modifiedPrefixBase64Reversed':
                    encodedScore = encodeScoreWithBtoaModifiedPrefixBase64Reversed(score);
                    break;*/
                default:
                    encodedScore = encodeScoreWithBtoa(score); // default to btoa encoding
            }

            // Send a POST request to the score endpoint with the CSRF token
            fetch('/score', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({score: encodedScore}) // Send the encoded score data
            })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    // redirect to localhost:3000 after the score is updated
                    /*window.location.href = 'http://localhost';*/
                })
                .catch(error => {
                    // handle error
                });
        }
    });
})
