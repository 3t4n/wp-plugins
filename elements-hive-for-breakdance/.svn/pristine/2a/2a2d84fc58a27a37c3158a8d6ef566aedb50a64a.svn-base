import { getMousePos } from './mouse_position'

// based on https://tympanus.net/codrops/2020/07/08/exploring-animations-for-menu-hover-effects/

let mousepos = {x: 0, y: 0}
let mousePosCache = mousepos
let direction = {x: mousePosCache.x-mousepos.x, y: mousePosCache.y-mousepos.y}

window.addEventListener('mousemove', e => mousepos = getMousePos(e))

class EhLinkMediaReveal {
    constructor(options) {

        this.container = options.containerEl
        this.outerEl = options.outerEl
        this.innerEl = options.innerEl
        this.mediaEl = options.mediaEl
        this.mediaType = options.mediaType

        this.animatableProps = options.animatableProps
        this.timelineProps = options.timelineProps

        this.init()
    }

    calcBounds() {
        this.bounds = {
            el: this.container.getBoundingClientRect(),
            reveal: this.outerEl.getBoundingClientRect()
        }
    }

    onMouseEnter() {
        this.showImage()
        this.firstRAFCycle = true
        this.loopRender()
    }

    onMouseLeave() {
        this.stopRendering()
        this.hideImage()
    }

    init() {
        this.container.addEventListener('mouseenter', this.onMouseEnter.bind(this))
        this.container.addEventListener('mouseleave', this.onMouseLeave.bind(this))
    }

    showImage() {
        
        gsap.killTweensOf(this.innerEl)
        gsap.killTweensOf(this.mediaEl)
        
        this.tl = gsap.timeline({
            onStart: () => {
                gsap.set([this.outerEl, this.innerEl], {delay: 0.1, opacity: 1})
                gsap.set(this.container, {zIndex: 1000})
                if ( this.mediaType == 'video') this.mediaEl.play()
            }
        })

        if(this.timelineProps.show.inner) {
            this.tl.to(this.innerEl, {
                ...this.timelineProps.show.inner
            })
        }

        if(this.timelineProps.show.media) {
            this.tl.to(this.mediaEl, {
                ...this.timelineProps.show.media
            }, 0)
        }
    }

    hideImage() {

        gsap.killTweensOf(this.innerEl)
        gsap.killTweensOf(this.mediaEl)

        this.tl = gsap.timeline({
            onStart: () => {
                gsap.set(this.container, {zIndex: 1})
                
            },
            onComplete: () => {
                gsap.set(this.outerEl, {opacity: 0})
                if ( this.mediaType == 'video') {
                    this.mediaEl.pause()
                    this.mediaEl.currentTime = 0
                }
            }
        })

        console.log(this.timelineProps.hide)

        if(this.timelineProps.hide.inner) {
            this.tl.to(this.innerEl,{
                ...this.timelineProps.hide.inner
            })
        }
    }

    loopRender() {
        if ( !this.requestId ) {
            this.requestId = requestAnimationFrame(this.render.bind(this))
        }
    }

    stopRendering() {
        if ( this.requestId ) {
            window.cancelAnimationFrame(this.requestId)
            this.requestId = undefined
        }
    }

    render() {
        this.requestId = undefined

        if ( this.firstRAFCycle ) {
            this.calcBounds()
        }

        const animatedProps = {
            x: this.animatableProps.tx.previous,
            y: this.animatableProps.ty.previous
        }

        const mouseDistanceX = gsap.utils.clamp(Math.abs(mousePosCache.x - mousepos.x), 0, 100)

        direction = {x: mousePosCache.x-mousepos.x, y: mousePosCache.y-mousepos.y}
        mousePosCache = {x: mousepos.x, y: mousepos.y}

        this.animatableProps.tx.current = Math.abs(mousepos.x - this.bounds.el.left) - this.bounds.reveal.width/2
        this.animatableProps.ty.current = Math.abs(mousepos.y - this.bounds.el.top) - this.bounds.reveal.height/2

        // props current
        if ( this.animatableProps.rotation ) 
            this.animatableProps.rotation.current = this.firstRAFCycle ? 0 : gsap.utils.mapRange(0,100,0, direction .x < 0 ? 120 : -120, mouseDistanceX )

        if ( this.animatableProps.scale)
            this.animatableProps.scale.current = this.firstRAFCycle ? 1 : gsap.utils.mapRange(0,80,1,5, mouseDistanceX);
        
        // props previous
        for ( const prop in this.animatableProps) {
            this.animatableProps[prop].previous =  this.firstRAFCycle ? this.animatableProps[prop].current : gsap.utils.interpolate(this.animatableProps[prop].previous, this.animatableProps[prop].current, this.animatableProps[prop].amt)
        }

        // timeline props
        if(this.animatableProps.rotation)
            animatedProps.rotation = this.animatableProps.rotation.previous

        const scaleProps = {}
        if(this.animatableProps.scale) {
            scaleProps.scaleX = this.animatableProps.scale.previous,
            scaleProps.scaleY = gsap.utils.mapRange(1,5,1,0.1,this.animatableProps.scale.previous)
        }

        gsap.set(this.outerEl, {
            ...animatedProps
        })

        if(this.animatableProps.scale) {
            gsap.set(this.mediaEl, {
                ...scaleProps
            })
        }

        this.firstRAFCycle = false
        this.loopRender()
    }
}

export { EhLinkMediaReveal }