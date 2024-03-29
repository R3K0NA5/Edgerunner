class Enemy extends Sprite {
    constructor({
                    position,
                    collisionBlocks,
                    platformCollisionBlocks,
                    imageSrc,
                    frameRate,
                    scale = 1.5,
                    animations,
                }) {
        super({ imageSrc, frameRate, scale })
        this.position = position
        this.velocity = {
            x: 0,
            y: 1,
        }

        this.collisionBlocks = collisionBlocks
        this.platformCollisionBlocks = platformCollisionBlocks
        this.hitbox = {
            position: {
                x: this.position.x,
                y: this.position.y,
            },
            width: 10,
            height: 10,
        }

        this.animations = animations
        this.lastDirection = 'right'

        for (let key in this.animations) {
            const image = new Image()
            image.src = this.animations[key].imageSrc

            this.animations[key].image = image
        }

        this.camerabox = {
            position: {
                x: this.position.x,
                y: this.position.y,
            },
            width: 200,
            height: 200,
        }
    }

    switchSprite(key) {
        if (this.image === this.animations[key].image || !this.loaded) return

        this.currentFrame = 0
        this.image = this.animations[key].image
        this.frameBuffer = this.animations[key].frameBuffer
        this.frameRate = this.animations[key].frameRate
    }

    updateCamerabox() {
        this.camerabox = {
            position: {
                x: this.position.x - 250,
                y: this.position.y -230,
            },
            width: 601,
            height: 400,
        }
    }

    checkForHorizontalCanvasCollision() {
        if (
            this.hitbox.position.x + this.hitbox.width + this.velocity.x >= 8000 ||
            this.hitbox.position.x + this.velocity.x <= 0
        ) {
            this.velocity.x = 0
        }
    }

    shouldPanCameraToTheLeft({ canvas, camera }) {
        const cameraboxRightSide = this.camerabox.position.x + this.camerabox.width
        const scaledDownCanvasWidth = canvas.width / 1

        if (cameraboxRightSide >= 8000) return

        if (
            cameraboxRightSide >=
            scaledDownCanvasWidth + Math.abs(camera.position.x)
        ) {
            camera.position.x -= this.velocity.x /1
        }
    }

    shouldPanCameraToTheRight({ canvas, camera }) {
        if (this.camerabox.position.x <= 0) return

        if (this.camerabox.position.x <= Math.abs(camera.position.x)) {
            camera.position.x -= this.velocity.x
        }
    }

    shouldPanCameraDown({ canvas, camera }) {
        if (this.camerabox.position.y + this.velocity.y <= 0) return

        if (this.camerabox.position.y <= Math.abs(camera.position.y)) {
            camera.position.y -= this.velocity.y
        }
    }

    shouldPanCameraUp({ canvas, camera }) {
        if (
            this.camerabox.position.y + this.camerabox.height + this.velocity.y >=
            0
        )
            return

        const scaledCanvasHeight = canvas.height / 1

        if (
            this.camerabox.position.y + this.camerabox.height >=
            Math.abs(camera.position.y) + scaledCanvasHeight
        ) {
            camera.position.y -= this.velocity.y
        }
    }

    update() {
        this.updateFrames()
        this.updateHitbox()

        this.updateCamerabox()
        c.fillStyle = 'rgba(0, 0, 255, 0)'
        c.fillRect(
          this.camerabox.position.x,
          this.camerabox.position.y,
          this.camerabox.width,
          this.camerabox.height
        )
       //  draws out the image
        c.fillStyle = 'rgba(0,255,0,0)'
        c.fillRect(this.position.x, this.position.y, this.width, this.height)
        c.fillStyle = 'rgba(255,0,0,0)'
        c.fillRect(
          this.hitbox.position.x,
          this.hitbox.position.y,
          this.hitbox.width,
          this.hitbox.height
        )

        this.draw()

        this.position.x += this.velocity.x
        this.updateHitbox()
        this.checkForHorizontalCollisions()
        this.applyGravity()
        this.updateHitbox()
        this.checkForVerticalCollisions()
    }

    updateHitbox() {
        this.hitbox = {
            position: {
                x: this.position.x + 20,
                y: this.position.y + 0,
            },
            width: 50,
            height: 140,
        }
    }

    checkForHorizontalCollisions() {
        for (let i = 0; i < this.collisionBlocks.length; i++) {
            const collisionBlock = this.collisionBlocks[i]
            if (
                collision({
                    object1: this.hitbox,
                    object2: collisionBlock,
                })
            ) {
                if (this.velocity.x > 0) {
                    this.velocity.x = 0
                    const offset =
                        this.hitbox.position.x - this.position.x + this.hitbox.width
                    this.position.x = collisionBlock.position.x - offset - 0.01
                    break
                }
                if (this.velocity.x < 0) {
                    this.velocity.x = 0
                    const offset = this.hitbox.position.x - this.position.x
                    this.position.x =
                        collisionBlock.position.x + collisionBlock.width - offset + 0.01
                    break
                }
            }
        }
    }


    applyGravity() {
        this.velocity.y += gravity
        this.position.y += this.velocity.y
    }

    checkForVerticalCollisions() {
        for (let i = 0; i < this.collisionBlocks.length; i++) {
            const collisionBlock = this.collisionBlocks[i]

            if (
                collision({
                    object1: this.hitbox,
                    object2: collisionBlock,
                })
            ) {
                if (this.velocity.y > 0) {
                    this.velocity.y = 0

                    const offset =
                        this.hitbox.position.y - this.position.y + this.hitbox.height

                    this.position.y = collisionBlock.position.y - offset - 0.01
                    break
                }

                if (this.velocity.y < 0) {
                    this.velocity.y = 0

                    const offset = this.hitbox.position.y - this.position.y

                    this.position.y =
                        collisionBlock.position.y + collisionBlock.height - offset + 0.01
                    break
                }
            }
        }

        // platform collision blocks
        for (let i = 0; i < this.platformCollisionBlocks.length; i++) {
            const platformCollisionBlock = this.platformCollisionBlocks[i]

            if (
                platformCollision({
                    object1: this.hitbox,
                    object2: platformCollisionBlock,
                })
            ) {
                if (this.velocity.y > 0) {
                    this.velocity.y = 0

                    const offset =
                        this.hitbox.position.y - this.position.y + this.hitbox.height

                    this.position.y = platformCollisionBlock.position.y - offset - 0.01
                    break
                }
            }
        }
    }

    destroy() {
        // remove the enemy from the canvas
        c.clearRect(this.position.x, this.position.y, this.width, this.height)
        console.log('Enemy destroyed')
    }
    /*isCollidingWith(enemy) {
        const dx = this.position.x - enemy.position.x;
        const dy = this.position.y - enemy.position.y;
        console.log('Projectile collided with enemy!');
        const distance = Math.sqrt(dx * dx + dy * dy);
        if (distance < this.radius + enemy.width / 2) {
            // Remove the enemy
            const index = enemies.indexOf(enemy);
            if (index > -1) {
                enemies.splice(index, 1);
            }
            return true;
        }
        return false;
    }*/

   /* isCollidingWith(enemy) {
        const dx = this.position.x - enemy.position.x;
        const dy = this.position.y - enemy.position.y;
        const distance = Math.sqrt(dx * dx + dy * dy);
        console.log("dx: ", dx);
        console.log("dy: ", dy);
        console.log("distance: ", distance);
        return distance < this.radius + enemy.width / 2;
    }*/
}
