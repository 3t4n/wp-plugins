// based on https://tympanus.net/codrops/2020/04/28/morphing-gooey-text-hover-effect/

class EhGooeyLink {
	constructor(options) {
        this.options = options
        this.options.primitiveValues = { stdDeviation: 0 }

        this.anchorEl = options.anchorEl
        this.animationType = options.animationType
        this.filterId = options.filterId
        this.tl = null

        this.init()
	}

    init() {
        this.getAnimation()
        this.initEvents()
    }

    getAnimation() {

        switch (this.animationType) {
            case 'default':
                import('./EhGooeyLinkAnimationsDefault.js').then( (animation) =>{
                    this.tl = animation.getTimeline(this.options)
                })
                break
            case 'shift-right':
                import('./EhGooeyLinkAnimationsRight.js').then( (animation) =>{
                    this.tl = animation.getTimeline(this.options)
                })
                break
            case 'shift-left':
                import('./EhGooeyLinkAnimationsLeft.js').then( (animation) =>{
                    this.tl = animation.getTimeline(this.options)
                })
                break
            case 'shift-up':
                import('./EhGooeyLinkAnimationsUp.js').then( (animation) =>{
                    this.tl = animation.getTimeline(this.options)
                })
                break
            case 'shift-down':
                import('./EhGooeyLinkAnimationsDown.js').then( (animation) =>{
                    this.tl = animation.getTimeline(this.options)
                })
                break
        }
    }

    initEvents() {
		this.onMouseEnter = () => {
			this.anchorEl.style.filter = `url(${this.filterId})`
			this.tl.play()
		}
		this.onMouseLeave = () => {
			this.anchorEl.style.filter = `url(${this.filterId})`
			this.tl.reverse()
		}
		this.anchorEl.addEventListener("mouseenter", this.onMouseEnter)
		this.anchorEl.addEventListener("mouseleave", this.onMouseLeave)
	}

    destroy() {
        this.tl.kill()
        this.tl = null
        this.anchorEl.removeEventListener("mouseenter", this.onMouseEnter)
		this.anchorEl.removeEventListener("mouseleave", this.onMouseLeave)
    }
}

export { EhGooeyLink }
