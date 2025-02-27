import WebGLFluid from "./webgl_fluid.js"

class EhWebglFluid {
	constructor(options) {
		this.container = options.container
		this.sectionContainer = options.sectionContainer
		this.canvasClass = options.canvasClass
		this.fluidOptions = {
			TRIGGER: options.settings?.trigger ?? "hover",
			IMMEDIATE: options.settings?.immediate ?? false,
			SPLAT_RADIUS: options.settings?.splat_radius ?? 0.25,
			BLOOM: options.settings?.bloom ?? false,
			SUNRAYS: options.settings?.sunrays ?? false,
			CUSTOM_COLOR: options.settings?.custom_color ?? false,
			COLOR: options.settings?.color ?? "#000000",
		}

		this.init()
	}

	init() {
		this.createCanvas()
		this.initFluid()
	}

	createCanvas() {
		if (this.container.querySelector(`.${this.canvasClass}`)) {
			this.deleteCanvas()
		}
		this.canvas = document.createElement("canvas")
		this.canvas.classList.add(this.canvasClass)
		this.sectionContainer.insertAdjacentElement("beforebegin", this.canvas)
	}

	deleteCanvas() {
		this.container.querySelector(`.${this.canvasClass}`).remove()
	}

	initFluid() {
		WebGLFluid(this.canvas, {
			SIM_RESOLUTION: 128,
			DYE_RESOLUTION: 1024,
			DENSITY_DISSIPATION: 4,
			VELOCITY_DISSIPATION: 0.2,
			PRESSURE: 0.8,
			PRESSURE_ITERATIONS: 20,
			CURL: 30,
			SPLAT_FORCE: 6000,
			SHADING: true,
			COLORFUL: true,
			COLOR_UPDATE_SPEED: 10,
			PAUSED: false,
			BACK_COLOR: { r: 0, g: 0, b: 0 },
			TRANSPARENT: true,
			BLOOM_ITERATIONS: 8,
			BLOOM_RESOLUTION: 256,
			BLOOM_INTENSITY: 0.8,
			BLOOM_THRESHOLD: 0.6,
			BLOOM_SOFT_KNEE: 0.7,
			SUNRAYS_RESOLUTION: 196,
			SUNRAYS_WEIGHT: 1.0,
			...this.fluidOptions,
		})
	}
}

export { EhWebglFluid }
