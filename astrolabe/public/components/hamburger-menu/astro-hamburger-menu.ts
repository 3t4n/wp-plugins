class AstroHamburger {

	/**
	 * The main modal with the menu
	 */
	private modalMenu: HTMLElement | null;

	/**
	 * The main trigger to open the modal with the menu
	 */
	private modalMenuTrigger: HTMLElement | null;

	/**
	 * Initial main trigger text content
	 */
	private initialTriggerText: string;

	/**
	 * Constructor
	 */
	constructor() {
		/**
		 * Select #wa-astro-modal-menu
		 */
		this.modalMenu = document.getElementById('wa-astro-modal-menu');

		/**
		 * Select #wa-astro-modal-menu-trigger
		 */
		this.modalMenuTrigger = document.getElementById('wa-astro-modal-menu-trigger');

		/**
		 * Set the initial trigger text
		 */
		this.initialTriggerText = this.modalMenuTrigger?.textContent ?? 'Open';

	}

	/**
	 * Initialize the class
	 */
	init(): void {
		this.toggleModalMenu();
	}

	/**
	 * Toggle the modal menu
	 */
	toggleModalMenu(): void {
		if (this.modalMenu && this.modalMenuTrigger) {
			this.modalMenuTrigger.addEventListener('click', () => {
				if (this.modalMenu?.classList.contains('wa-astro-open-modal-menu')) {
					this.closeModalMenu();
				} else {
					this.openModalMenu();
				}
			});
		}
	}

	/**
	 * Open the modal
	 */
	async openModalMenu(): Promise<void> {
		if (this.modalMenu) {
			// Step 1: Set display to block
			this.modalMenu.style.display = 'block';
			this.modalMenu.style.opacity = '0';

			// Step 2: Wait for the next frame to ensure display change is applied
			await new Promise(resolve => requestAnimationFrame(resolve));

			// Step 3: Animate opacity
			this.modalMenu.style.transition = 'opacity 0.15s ease-in-out';
			this.modalMenu.style.opacity = '1';

			// Step 4: Add the open class after animation
			await new Promise(resolve => setTimeout(resolve, 150));
			this.modalMenu.classList.add('wa-astro-open-modal-menu');
			this.switchTriggerText('opened');
		}
	}

	/**
	 * Close the modal
	 */
	async closeModalMenu(): Promise<void> {
		if (this.modalMenu) {
			// Step 1: Animate opacity back to 0
			this.modalMenu.style.transition = 'opacity 0.15s ease-in-out';
			this.modalMenu.style.opacity = '0';

			// Step 2: Wait for animation to complete
			await new Promise(resolve => setTimeout(resolve, 150));

			// Step 3: Remove the open class and set display to none
			this.modalMenu.classList.remove('wa-astro-open-modal-menu');
			this.modalMenu.style.display = 'none';

			this.switchTriggerText('closed');
		}
	}

	/**
	 * Switch text of the modal trigger to "Close" and back to its original value
	 */
	switchTriggerText(state: string): void {

		if (this.modalMenuTrigger) {
			if (state === 'closed') {
				this.modalMenuTrigger.textContent = this.initialTriggerText;
			} else if (state === 'opened') {
				this.modalMenuTrigger.textContent = 'Close';
			}
		}

	}
}

// Wait for the document to be fully loaded
document.addEventListener("DOMContentLoaded", () => {
	const astroHamburgerClass = new AstroHamburger();
	astroHamburgerClass.init();
});

