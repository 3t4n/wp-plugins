class EhGlueButton {
	constructor(props) {
		this.container = props.container
		this.button = props.button
		this.position = {
			x: { target: 0, current: 0, original: 0 },
			y: { target: 0, current: 0, original: 0 },
		}
		this.limit = 70
		this.bcr = null
		this.resetDuration = 400
		this.isReset = false

		this.init()
	}

	setBcr() {
		this.bcr = this.container.getBoundingClientRect()
	}

	outSine(t, b, c, d) {
		return c * Math.sin((t / d) * (Math.PI / 2)) + b
	}

	startResetAnimation = () => {
		this.startTime = Date.now()
		requestAnimationFrame(this.animateReset.bind(this))
	}

	animateReset = () => {
		const time = Date.now() - this.startTime

		this.position.x.current = this.outSine(time, this.position.x.current, 0, this.resetDuration)
		this.position.y.current = this.outSine(time, this.position.y.current, 0, this.resetDuration)

		this.container.style.transform = `translate(${this.position.x.current}px, ${this.position.y.current}px)`

		if (time < this.resetDuration) {
			requestAnimationFrame(this.animateReset.bind(this))
		} else {
			this.isReset = true
		}
	}

	onMouseEnter() {
		this.setBcr()
	}

	onMouseMove(e) {
		this.isReset = false

		if (Math.abs(this.position.x.target) >= this.limit || Math.abs(this.position.y.target) >= this.limit) {
			this.startResetAnimation()
		} else {
			this.position.x.target = e.clientX - this.bcr.left - this.bcr.width / 2
			this.position.y.target = e.clientY - this.bcr.top - this.bcr.height / 2
			this.container.style.transform = `translate(${this.position.x.target}px, ${this.position.y.target}px)`
		}
	}

	onMouseLeave(e) {
		this.position.x.target = 0
		this.position.y.target = 0
		if (!this.isReset) this.startResetAnimation()
	}

	init() {
		this.container.addEventListener('mouseenter', this.onMouseEnter.bind(this))
		this.container.addEventListener('mousemove', this.onMouseMove.bind(this))
		this.container.addEventListener('mouseleave', this.onMouseLeave.bind(this))
	}
}

export { EhGlueButton }
