import gsap from 'gsap'

const getTimeline = (options) => {
    return gsap.timeline(
    {
        paused: true,
        onComplete: () => {
            options.anchorEl.style.filter = "none"
        },
        onReverseComplete: () => {
            options.anchorEl.style.filter = "none"
        },
        onUpdate: () => {
            options.feBlur.setAttribute(
                "stdDeviation",
                options.primitiveValues.stdDeviation
            )
        },
    })

    .to(options.primitiveValues, { 
        duration: options.duration / 2,
        ease: "none",
        startAt: {stdDeviation: 0},
        stdDeviation: options.stdDeviation
    }, 0)
    .to(options.primitiveValues, { 
        duration: options.duration / 2,
        ease: "none",
        stdDeviation: 0
    })

    .to(options.defaultText, { 
        duration: options.duration,
        ease: "none", // Power1.easeInOut
        autoAlpha: 0
    }, 0)
    .to(options.hoverText, { 
        duration: options.duration,
        ease: "none", // Power1.easeInOut
        autoAlpha: 1
    }, 0)
    .to(options.defaultText, { 
        duration: options.duration,
        ease: "Power2.easeInOut",
        x: -25
    }, 0)
    .to(options.hoverText, { 
        duration: options.duration,
        ease: "Power2.easeInOut",
        startAt: {x: 25},
        x: 0
    }, 0)
}

export { getTimeline }