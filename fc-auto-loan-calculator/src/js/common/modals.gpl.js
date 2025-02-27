import { Modal } from '../ac.bootstrap.esm.min.js';

// https://getbootstrap.com/docs/5.3/components/modal/


// The Modals class provides a simple and reusable solution for initializing modals and setting up event handlers for modal elements. It includes methods for initializing a single modal, initializing event handlers for a specific modal, and initializing multiple modals based on the provided configurations.

// requestIdleCallback: This API allows you to schedule tasks to be executed during the browser's idle periods, which helps in performing background or non-urgent tasks without impacting the responsiveness of the user interface. The processNextModal function uses this API to initialize modals when the browser is idle, ensuring that the main thread is free for more critical tasks. If the browser does not support requestIdleCallback, the fallback function processNextModalFallback is used instead to achieve similar asynchronous processing using setTimeout. (As of 07/19/2024, Safari does not support.)

// processNextModalFallback: This function is used as a fallback mechanism to ensure that modals are still initialized in browsers that do not support the requestIdleCallback API. By using setTimeout, it breaks the initialization process into smaller chunks, avoiding long-running tasks that could block the main thread and affect the user experience.


class Modals {
	// Static property to store modal references
	static modals = {};

	/**
	 * Initializes a modal and sets up the event listener for the button or element click.
	 * @param {string} buttonId - The ID of the element that triggers modal open (may not be a button, but a link).
	 * @param {string} modalElementId - The ID of the modal element.
	 * @param {function} callback - The callback function to execute when the button is clicked.
	 * @param {function} [initCallback=null] - The optional callback function for additional initialization.
	 */
	static initializeModal (buttonId, modalElementId, callback, context = null, initCallback = null) {
		let options = { backdrop: 'static', focus: true, keyboard: true };

		const modalElement = document.getElementById(modalElementId);
		const modal = new Modal(modalElement, options);

		// Store the modal instance in the static property
		this.modals[modalElementId] = modal;

		// Execute the initCallback function if provided to initialize the modal with static data
		if (initCallback) {
			setTimeout(() => {
				initCallback();
			}, 0);
		}

		if (buttonId === null) {
			return;
		}

		const button = document.getElementById(buttonId);

		if (button) {
			button.addEventListener('click', () => {
				if (typeof callback === 'function' && context === null) {
					callback(modal);
				} else if (typeof callback === 'function' && context !== null) {
					const boundCallback = callback.bind(context);

					boundCallback(modal);
				} else {
					// eslint-disable-next-line no-console
					console.warn(`Callback ${callback} function not found.`);
				}
			});
		} else {
			// if trigger is null then modal will only be opened via JavaScript.
			// eslint-disable-next-line no-console
			console.warn(`Button with ID '${buttonId}' not found.`);
		}
	} // initializeModal()


	/**
	 * Initializes event handlers for a specific modal.
	 * @param {string} modalId - The ID of the modal element.
	 * @param {Array<{elementId: string, eventType: string, callback: function}>} eventHandlers - The array of event handler configurations.
	 */
	static initializeModalEvents (modalId, eventHandlers) {
		const modal = document.getElementById(modalId);

		if (modal) {
			if (eventHandlers) {
				eventHandlers.forEach(handler => {
					const element = document.getElementById(handler.elementId);

					if (element) {
						if (typeof handler.callback === 'function') {
							element.addEventListener(handler.eventType, handler.callback.bind(handler.context ? handler.context : null));
						} else {
							// eslint-disable-next-line no-console
							console.warn(`'${modalId}' Callback function not found.`);
						}
					} else {
						// eslint-disable-next-line no-console
						console.warn(`Element with ID '${handler.elementId}' not found.`);
					}
				});
			}
		} else {
			// eslint-disable-next-line no-console
			console.warn(`Modal with ID '${modalId}' not found.`);
		}
	}


	/**
	 * Initializes multiple modals based on the provided configurations.
	 * This method processes modal configurations in chunks to avoid blocking the main thread,
	 * using `requestIdleCallback` if available, or a fallback approach if not.
	 * @param {Array<{modalId: string, initModal: {buttonId: string, modalElementId: string, callback: function}, eventHandlers: Array<{elementId: string, eventType: string, callback: function}>}>} modalConfigs - The array of modal configurations.
	 */
	static initializeModals (modalConfigs) {
		let index = 0;

		this.modals = {};

		/**
		 * Processes the next batch of modals during idle periods to avoid blocking the main thread.
		 * @param {IdleDeadline} deadline - The IdleDeadline object provides information about the idle period.
		 */
		function processNextModal (deadline) {
			while (index < modalConfigs.length && (deadline.timeRemaining() > 0 || deadline.didTimeout)) {
				const config = modalConfigs[index++];

				if (config.initModal) {
					const { buttonId, modalElementId, callback, context, initCallback } = config.initModal;

					Modals.initializeModal(buttonId, modalElementId, callback, context, initCallback);
				}
				Modals.initializeModalEvents(config.modalId, config.eventHandlers);
			}

			if (index < modalConfigs.length) {
				requestIdleCallback(processNextModal, { timeout: 2000 });
			}
		}


		/**
		 * Fallback function to process modals using `setTimeout` if `requestIdleCallback` is not available.
		 */
		function processNextModalFallback () {
			if (index < modalConfigs.length) {
				const config = modalConfigs[index++];

				if (config.initModal) {
					const { buttonId, modalElementId, callback } = config.initModal;

					Modals.initializeModal(buttonId, modalElementId, callback);
				}
				Modals.initializeModalEvents(config.modalId, config.eventHandlers);
				setTimeout(processNextModalFallback, 0);
			}
		}

		// Use requestIdleCallback if available for non-blocking initialization, otherwise fallback to setTimeout
		if ('requestIdleCallback' in window) {
			requestIdleCallback(processNextModal, { timeout: 2000 });
		} else {
			processNextModalFallback();
		}
	}

}

export default Modals;

