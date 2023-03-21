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
const projectileSprite = new Image();
projectileSprite.src = '../img/soldier/bullet.png';
class Projectile {
    constructor({ position, velocity, camerabox }) {
        this.position = position;
        this.velocity = velocity;
        this.width = 5; // Set the width of the projectile sprite
        this.height = 10; // Set the height of the projectile sprite
        this.camerabox = camerabox;
    }

    draw() {
        c.drawImage(projectileSprite, this.position.x, this.position.y, this.width, this.height);
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
            projectiles.splice(projectiles.indexOf(this), 1);
        }
    }

    isCollidingWith(enemy) {
        const dx = this.position.x - (enemy.hitbox.position.x + enemy.hitbox.width / 2);
        const dy = this.position.y - (enemy.hitbox.position.y + enemy.hitbox.height / 2);
        const distance = Math.sqrt(dx * dx + dy * dy);
        return distance < Math.max(this.width, this.height) / 2 + Math.max(enemy.hitbox.width, enemy.hitbox.height) / 3;
    }
}

const projectiles = []
const gravity = 0.1

async function createPlayer(x, y, spriteId) {
    const response = await axios.get(`/sprite/${spriteId}`);
    const data = response.data.data;

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

    const spriteId = await axios.get('/user/sprite-id').then(response => response.data.sprite_id);

    // call createPlayer with the sprite ID
    const player1 = await createPlayer(100, 700, spriteId);
    player = player1;

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

    const enemy1 = createEnemy(300, 700, '../img/soldier/idlek.png', 8, 200);
    const enemy2 = createEnemy(600, 700, '../img/soldier/idlek.png', 8, 200);
    const enemy3 = createEnemy(900, 700, '../img/soldier/idlek.png', 8, 200);
    const enemy4 = createEnemy(1200, 700, '../img/soldier/idlek.png', 8, 200);
    const enemy5 = createEnemy(1500, 700, '../img/soldier/idlek.png', 8, 200);
    const enemy6 = createEnemy(1800, 700, '../img/soldier/idlek.png', 8, 200);
    const enemy7 = createEnemy(2100, 700, '../img/soldier/idlek.png', 8, 200);
    const enemy8 = createEnemy(2300, 700, '../img/soldier/idlek.png', 8, 200);
    const enemy9 = createEnemy(2600, 700, '../img/soldier/idlek.png', 8, 200);
    const enemy10 = createEnemy(2900, 700, '../img/soldier/idlek.png', 8, 200);
    const enemy11 = createEnemy(3200, 700, '../img/soldier/idlek.png', 8, 200);
    const enemy12 = createEnemy(3500, 700, '../img/soldier/idlek.png', 8, 200);
    const enemy13 = createEnemy(3800, 700, '../img/soldier/idlek.png', 8, 200);
    const enemy14 = createEnemy(4100, 700, '../img/soldier/idlek.png', 8, 200);
    const enemy15 = createEnemy(4500, 700, '../img/soldier/idlek.png', 8, 200);
    const enemy16 = createEnemy(4600, 700, '../img/soldier/idlek.png', 8, 200);
    const enemy17 = createEnemy(5000, 700, '../img/soldier/idlek.png', 8, 200);

    const enemies = [enemy1, enemy2, enemy3, enemy4, enemy5, enemy6, enemy7, enemy8, enemy9, enemy10, enemy11, enemy12, enemy13, enemy14, enemy15, enemy16, enemy17];
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
        window.requestAnimationFrame(animate);
        c.fillStyle = "white";
        c.fillRect(0, 0, canvas.width, canvas.height);

        c.save();
        c.scale(1, 1);
        c.translate(camera.position.x, camera.position.y);
        background.update();
        collisionBlocks.forEach((collisionBlock) => {
            collisionBlock.update();
        });
        platformCollisionBlocks.forEach((block) => {
            block.update();
        });
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

        enemies.forEach((enemy) => {
            enemy.checkForHorizontalCanvasCollision();
            enemy.update();
            // Draw the hitbox for the enemy
            c.fillStyle = "rgba(85,255,0,0)";
            c.fillRect(
                enemy.hitbox.position.x,
                enemy.hitbox.position.y,
                enemy.hitbox.width,
                enemy.hitbox.height
            );
        });

        player.checkForHorizontalCanvasCollision();
        player.update();

        projectiles.forEach((projectile) => {
            projectile.update();
        });

        player.velocity.x = 0;
        if (keys.d.pressed) {
            player.switchSprite("Run");
            player.velocity.x = 2;
            player.lastDirection = "right";
            player.shouldPanCameraToTheLeft({ canvas, camera });
        } else if (keys.a.pressed) {
            player.switchSprite("RunLeft");
            player.velocity.x = -2;
            player.lastDirection = "left";
            player.shouldPanCameraToTheRight({ canvas, camera });
        } else if (player.velocity.y === 0) {
            if (player.lastDirection === "right") player.switchSprite("Idle");
            else player.switchSprite("IdleLeft");
        }

        if (player.velocity.y < 0) {
            player.shouldPanCameraDown({ camera, canvas });
            if (player.lastDirection === "right") player.switchSprite("Jump");
            else player.switchSprite("JumpLeft");
        } else if (player.velocity.y > 0) {
            player.shouldPanCameraUp({ camera, canvas });
            if (player.lastDirection === "right") player.switchSprite("Fall");
            else player.switchSprite("FallLeft");
        }

        c.fillStyle = "white";
        c.font = '1.3rem "JLS Data GothicC  NC", monospace';
        c.textAlign = "center";


        let scoreElement = document.getElementById("score");
        scoreElement.textContent = "SCORE: " + score;

        c.restore();
    }

    animate()
    let lastWPressTime = 0;

    window.addEventListener('keydown', (event) => {
        switch (event.key) {
            case 'd':
                keys.d.pressed = true;
                break;
            case 'a':
                keys.a.pressed = true;
                break;
            case 'w':
                let currentTime = Date.now();
                if (currentTime - lastWPressTime > 800) {
                    player.velocity.y = -5;
                    lastWPressTime = currentTime;
                }
                break;

        }
    });

    canvas.addEventListener('mousedown', (event) => {
        if (event.button === 0) { // Check if the left mouse button (Mouse 1) is clicked
            // Calculate the direction vector
            let adjustedMouseX = mousePosition.x - camera.position.x;
            let adjustedMouseY = mousePosition.y - camera.position.y;
            let dx = adjustedMouseX - (player.position.x + player.width);
            let dy = adjustedMouseY - (player.position.y + 50);

            // Normalize the direction vector
            let distance = Math.sqrt(dx * dx + dy * dy);
            let normalizedX = dx / distance;
            let normalizedY = dy / distance;

            // Set the projectile velocity
            let projectileSpeed = 25;
            let velocityX = normalizedX * projectileSpeed;
            let velocityY = normalizedY * projectileSpeed;

            // Create a new projectile with the calculated velocity
            projectiles.push(new Projectile({
                position: { x: player.position.x + player.width, y: player.position.y + 50 },
                velocity: { x: velocityX, y: velocityY },
                camerabox: player.camerabox,
            }));
        }
    });

    let mousePosition = { x: 0, y: 0 };

    canvas.addEventListener('mousemove', (event) => {
        const rect = canvas.getBoundingClientRect();
        mousePosition.x = event.clientX - rect.left;
        mousePosition.y = event.clientY - rect.top;
    });







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

    let activeEncoder;

    fetch('/user-preference') // replace with the actual endpoint to retrieve the user's preferred encoding type
        .then(response => response.json())
        .then(data => {
            const encodingType = data.encodingType; // assume the encoding type is returned as a string
            switch (encodingType) {
                case 'modified':
                    activeEncoder = 'modified';
                    break;
                case 'prefixSuffix':
                    activeEncoder = 'prefixSuffix';
                    break;
                case 'randomSuffix':
                    activeEncoder = 'randomSuffix';
                    break;
                case 'reversed':
                    activeEncoder = 'reversed';
                    break;
                case 'uppercase':
                    activeEncoder = 'uppercase';
                    break;
                case 'lowercase':
                    activeEncoder = 'lowercase';
                    break;
                case 'alternatingCase':
                    activeEncoder = 'alternatingCase';
                    break;
                case 'reversedAlternatingCase':
                    activeEncoder = 'reversedAlternatingCase';
                    break;
                case 'base64Reversed':
                    activeEncoder = 'base64Reversed';
                    break;
                default:
                    activeEncoder = 'btoa'; // default to btoa encoding
            }
        })
        .catch(error => {
            // handle error
        });

    function encodeScoreWithBtoaModified(score) {
        return btoa(`modified-${score.toString()}`);
    }

    function encodeScoreWithBtoaPrefixSuffix(score) {
        return btoa(`prefix-${score.toString()}-suffix`);
    }

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

    window.addEventListener('keydown', function (event) {
        if (event.key === 'l') {
            let encodedScore;
            switch (activeEncoder) {
                case 'modified':
                    encodedScore = encodeScoreWithBtoaModified(score);
                    break;
                case 'prefixSuffix':
                    encodedScore = encodeScoreWithBtoaPrefixSuffix(score);
                    break;
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
                default:
                    encodedScore = btoa(score.toString()); // default to btoa encoding
            }
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
                    window.location.href = 'http://localhost';
                })
                .catch(error => {
                    // handle error
                });
        }
    })
})
