/* based on https://codepen.io/mendieta/pen/WgvENJ?editors=1010 */
class EhInkCursorDot {
    constructor(props) {
        this.index = props.index;
        this.container = props.container
        this.sizeFactor = props.sizeFactor
        this.width = props.width
        this.sine = props.sine 
        this.angleSpeed = props.angleSpeed
        this.x = 0
        this.y = 0
        this.scale = this.sizeFactor - ( 0.05 * this.sizeFactor ) * this.index 
        this.range = ( this.width / 4 * this.scale ) / this.sizeFactor
        this.limit = this.width * 0.75 * this.scale
        this.element = document.createElement("span")
        this.element.style.transform = `scale(${this.scale})`
        this.container.appendChild(this.element)
        
    }
  
    lock() {
        this.lockX = this.x;
        this.lockY = this.y;
        this.angleX = Math.PI * 2 * Math.random();
        this.angleY = Math.PI * 2 * Math.random();
    }
  
    draw(idle) {
        if (!idle || this.index <= this.sine) {
          this.element.style.top = `${this.y}px`
          this.element.style.left = `${this.x}px`
        } else {
            this.angleX += this.angleSpeed;
            this.angleY += this.angleSpeed;
            this.y = this.lockY + Math.sin(this.angleY) * this.range;
            this.x = this.lockX + Math.sin(this.angleX) * this.range;
            this.element.style.top = `${this.y}px`
            this.element.style.left = `${this.x}px`
        }
    }
  }
  
  class EhInkCursor {
    constructor(props) {
      this.container = props.container
      this.sizeFactor = props.sizeFactor
      this.amount = props.amount 
      this.sine = props.sine / props.sizeFactor
      this.idleTimeout = props.idleTimeout
      this.angleSpeed = 0.05
      this.width = 26
      this.mouse = {x: 0, y: 0}
      this.lastFrame = new Date()
      this.dots = []
  
      this.init()
  
    }
  
    init() {
      window.addEventListener('mousemove', this.onMouseMove.bind(this))  
      window.addEventListener('touchmove', this.onTouchMove.bind(this))  
      this.initDots()
      this.render()
    }
  
    initDots() {
      for (let i = 0; i < this.amount; i++) {
        let dot = new EhInkCursorDot({
          index: i,
          container: this.container,
          sizeFactor: this.sizeFactor,
          width: this.width,
          sine: this.sine,
          angleSpeed: this.angleSpeed,
        })
        this.dots.push(dot)
      }
    }
  
    startIdleTimer() {
      this.timeoutID = setTimeout(this.lockDots.bind(this), this.idleTimeout)
      this.idle = false
    }
  
    resetIdleTimer() {
      clearTimeout(this.timeoutID)
      this.startIdleTimer()
    }
  
    lockDots() {
      this.idle = true
      this.dots.forEach(dot => {
        dot.lock()
      })
    }
  
    onMouseMove(e) {
      this.mouse.x = e.clientX - this.width / 2
      this.mouse.y = e.clientY - this.width / 2
      this.resetIdleTimer()
    }
  
    onTouchMove(e) {
      this.mouse.x = e.touches[0].clientX - this.width / 2
      this.mouse.y = e.touches[0].clientY - this.width / 2
      this.resetIdleTimer()
    }
  
    render(ts) {
      this.delta = ts - this.lastFrame
      this.positionCursor()
      this.lastFrame = ts
      requestAnimationFrame(this.render.bind(this))
    }
  
    positionCursor() {
      let x = this.mouse.x
      let y = this.mouse.y
      this.dots.forEach((dot, index, dots) => {
          let nextDot = dots[index + 1] || dots[0]
          dot.x = x
          dot.y = y
          dot.draw(this.idle)
          if (!this.idle || index <= this.sine) {
              const dx = (nextDot.x - dot.x) * 0.35
              const dy = (nextDot.y - dot.y) * 0.35
              x += dx
              y += dy
          }
      })
    }
  }
  
  export { EhInkCursor }
  
  