import gsap from 'gsap'

const getTimeline = (options) => {
    
    return (
        gsap.timeline(
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

        .fromTo(
            options.primitiveValues,
            {
                stdDeviation: 0
            },
            {
                duration: options.duration / 2,
                ease: "none",
                stdDeviation: options.stdDeviation,
            },
            0
        )
        .to(options.primitiveValues, {
            duration: options.duration / 2,
            ease: "none",
            stdDeviation: 0,
        })

        .to(
            options.defaultText,
            {
                duration: options.duration,
                ease: "none",
                autoAlpha: 0,
            },
            0
        )
        .to(
            options.hoverText,
            {
                duration: options.duration,
                ease: "none",
                autoAlpha: 1,
            },
            0
        )
    )
}

export { getTimeline }