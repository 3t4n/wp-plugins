;(function (i, n) {
	typeof exports == 'object' && typeof module < 'u'
		? (module.exports = n(require('gsap')))
		: typeof define == 'function' && define.amd
		? define(['gsap'], n)
		: ((i = typeof globalThis < 'u' ? globalThis : i || self), (i.EhGooeyLink = n(i.gsap)))
})(this, function (i) {
	'use strict'
	var m = Object.defineProperty
	var T = (i, n, r) => (n in i ? m(i, n, { enumerable: !0, configurable: !0, writable: !0, value: r }) : (i[n] = r))
	var o = (i, n, r) => (T(i, typeof n != 'symbol' ? n + '' : n, r), r)
	const r = ((e) => (e && typeof e == 'object' && 'default' in e ? e : { default: e }))(i)
	class u {
		constructor(t) {
			o(this, 'destroy', () => {
				var t
				gsap.set([this.options.defaultText, this.options.hoverText], { clearProps: 'all' }),
					this.anchorEl.removeEventListener('mouseenter', this.onMouseEnter.bind(this)),
					this.anchorEl.removeEventListener('mouseleave', this.onMouseLeave.bind(this)),
					(t = this.tl) == null || t.kill(),
					(this.tl = null)
			})
			;(this.options = t),
				(this.options.primitiveValues = { stdDeviation: 0 }),
				(this.textGroup = t.textGroup),
				(this.anchorEl = t.anchorEl),
				(this.animationType = t.animationType),
				(this.filterId = t.filterId),
				(this.tl = null),
				(this.defaultText = t.defaultText),
				(this.hoverText = t.hoverText),
				(this.isTouchDevice = 'ontouchstart' in window),
				this.init()
		}
		init() {
			this.getAnimation(), this.initEvents()
		}
		getAnimation() {
			switch (this.animationType) {
				case 'shift-right':
					Promise.resolve()
						.then(() => s)
						.then((t) => {
							this.tl = t.getTimeline(this.options)
						})
					break
				case 'shift-left':
					Promise.resolve()
						.then(() => l)
						.then((t) => {
							this.tl = t.getTimeline(this.options)
						})
					break
				case 'shift-up':
					Promise.resolve()
						.then(() => d)
						.then((t) => {
							this.tl = t.getTimeline(this.options)
						})
					break
				case 'shift-down':
					Promise.resolve()
						.then(() => h)
						.then((t) => {
							this.tl = t.getTimeline(this.options)
						})
					break
			}
		}
		onMouseEnter() {
			var t
			;(this.textGroup.style.filter = `url(${this.filterId})`), (t = this.tl) == null || t.play()
		}
		onMouseLeave() {
			var t
			;(this.textGroup.style.filter = `url(${this.filterId})`), (t = this.tl) == null || t.reverse()
		}
		initTouchEvents() {
			this.anchorEl.addEventListener('touchstart', this.onMouseEnter.bind(this), { passive: !0 }),
				this.anchorEl.addEventListener('touchend', this.onMouseLeave.bind(this), { passive: !0 })
		}
		initMouseEvents() {
			this.anchorEl.addEventListener('mouseenter', this.onMouseEnter.bind(this)),
				this.anchorEl.addEventListener('mouseleave', this.onMouseLeave.bind(this))
		}
		onResize() {
			const t = getComputedStyle(this.anchorEl),
				v = t.getPropertyValue('--defaultTextXoffset'),
				a = t.getPropertyValue('--textYoffset'),
				f = t.getPropertyValue('--hoverTextXoffset')
			this.defaultText.setAttribute('x', v),
				this.defaultText.setAttribute('y', a),
				this.hoverText.setAttribute('x', f),
				this.hoverText.setAttribute('y', a)
		}
		initEvents() {
			this.isTouchDevice ? this.initTouchEvents() : this.initMouseEvents(),
				window.addEventListener('resize', this.onResize.bind(this))
		}
	}
	const s = Object.freeze(
			Object.defineProperty(
				{
					__proto__: null,
					getTimeline: (e) =>
						r.default
							.timeline({
								paused: !0,
								onComplete: () => {
									e.textGroup.style.filter = 'none'
								},
								onReverseComplete: () => {
									e.textGroup.style.filter = 'none'
								},
								onUpdate: () => {
									e.feBlur.setAttribute('stdDeviation', e.primitiveValues.stdDeviation)
								},
							})
							.to(
								e.primitiveValues,
								{ duration: e.duration / 2, ease: 'none', startAt: { stdDeviation: 0 }, stdDeviation: e.stdDeviation },
								0
							)
							.to(e.primitiveValues, { duration: e.duration / 2, ease: 'none', stdDeviation: 0 })
							.to(e.defaultText, { duration: e.duration, ease: 'power1.inOut', autoAlpha: 0 }, 0)
							.to(e.hoverText, { duration: e.duration, ease: 'power1.inOut', autoAlpha: 1 }, 0)
							.to(e.defaultText, { duration: e.duration, ease: 'power2.inOut', x: 25 }, 0)
							.to(e.hoverText, { duration: e.duration, ease: 'power2.inOut', startAt: { x: -25 }, x: 0 }, 0),
				},
				Symbol.toStringTag,
				{ value: 'Module' }
			)
		),
		l = Object.freeze(
			Object.defineProperty(
				{
					__proto__: null,
					getTimeline: (e) =>
						r.default
							.timeline({
								paused: !0,
								onComplete: () => {
									e.textGroup.style.filter = 'none'
								},
								onReverseComplete: () => {
									e.textGroup.style.filter = 'none'
								},
								onUpdate: () => {
									e.feBlur.setAttribute('stdDeviation', e.primitiveValues.stdDeviation)
								},
							})
							.to(
								e.primitiveValues,
								{ duration: e.duration / 2, ease: 'none', startAt: { stdDeviation: 0 }, stdDeviation: e.stdDeviation },
								0
							)
							.to(e.primitiveValues, { duration: e.duration / 2, ease: 'none', stdDeviation: 0 })
							.to(e.defaultText, { duration: e.duration, ease: 'power1.inOut', autoAlpha: 0 }, 0)
							.to(e.hoverText, { duration: e.duration, ease: 'power1.inOut', autoAlpha: 1 }, 0)
							.to(e.defaultText, { duration: e.duration, ease: 'power2.inOut', x: -25 }, 0)
							.to(e.hoverText, { duration: e.duration, ease: 'power2.inOut', startAt: { x: 25 }, x: 0 }, 0),
				},
				Symbol.toStringTag,
				{ value: 'Module' }
			)
		),
		d = Object.freeze(
			Object.defineProperty(
				{
					__proto__: null,
					getTimeline: (e) =>
						r.default
							.timeline({
								paused: !0,
								onComplete: () => {
									e.textGroup.style.filter = 'none'
								},
								onReverseComplete: () => {
									e.textGroup.style.filter = 'none'
								},
								onUpdate: () => {
									e.feBlur.setAttribute('stdDeviation', e.primitiveValues.stdDeviation)
								},
							})
							.to(
								e.primitiveValues,
								{ duration: e.duration / 2, ease: 'none', startAt: { stdDeviation: 0 }, stdDeviation: e.stdDeviation },
								0
							)
							.to(e.primitiveValues, { duration: e.duration / 2, ease: 'none', stdDeviation: 0 })
							.to(e.defaultText, { duration: e.duration, ease: 'power1.inOut', autoAlpha: 0 }, 0)
							.to(e.hoverText, { duration: e.duration, ease: 'power1.inOut', autoAlpha: 1 }, 0)
							.to(e.defaultText, { duration: e.duration, ease: 'power2.inOut', y: -10 }, 0)
							.to(e.hoverText, { duration: e.duration, ease: 'power2.inOut', startAt: { y: 10 }, y: 0 }, 0),
				},
				Symbol.toStringTag,
				{ value: 'Module' }
			)
		),
		h = Object.freeze(
			Object.defineProperty(
				{
					__proto__: null,
					getTimeline: (e) =>
						r.default
							.timeline({
								paused: !0,
								onComplete: () => {
									e.textGroup.style.filter = 'none'
								},
								onReverseComplete: () => {
									e.textGroup.style.filter = 'none'
								},
								onUpdate: () => {
									e.feBlur.setAttribute('stdDeviation', e.primitiveValues.stdDeviation)
								},
							})
							.to(
								e.primitiveValues,
								{ duration: e.duration / 2, ease: 'none', startAt: { stdDeviation: 0 }, stdDeviation: e.stdDeviation },
								0
							)
							.to(e.primitiveValues, { duration: e.duration / 2, ease: 'none', stdDeviation: 0 })
							.to(e.defaultText, { duration: e.duration, ease: 'power1.inOut', autoAlpha: 0 }, 0)
							.to(e.hoverText, { duration: e.duration, ease: 'power1.inOut', autoAlpha: 1 }, 0)
							.to(e.defaultText, { duration: e.duration, ease: 'power2.inOut', y: 10 }, 0)
							.to(e.hoverText, { duration: e.duration, ease: 'power2.inOut', startAt: { y: -10 }, y: 0 }, 0),
				},
				Symbol.toStringTag,
				{ value: 'Module' }
			)
		)
	return u
})
