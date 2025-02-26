var __awaiter = (this && this.__awaiter) || function (thisArg, _arguments, P, generator) {
    function adopt(value) { return value instanceof P ? value : new P(function (resolve) { resolve(value); }); }
    return new (P || (P = Promise))(function (resolve, reject) {
        function fulfilled(value) { try { step(generator.next(value)); } catch (e) { reject(e); } }
        function rejected(value) { try { step(generator["throw"](value)); } catch (e) { reject(e); } }
        function step(result) { result.done ? resolve(result.value) : adopt(result.value).then(fulfilled, rejected); }
        step((generator = generator.apply(thisArg, _arguments || [])).next());
    });
};
class AstroHamburger {
    /**
     * Constructor
     */
    constructor() {
        var _a, _b;
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
        this.initialTriggerText = (_b = (_a = this.modalMenuTrigger) === null || _a === void 0 ? void 0 : _a.textContent) !== null && _b !== void 0 ? _b : 'Open';
    }
    /**
     * Initialize the class
     */
    init() {
        this.toggleModalMenu();
    }
    /**
     * Toggle the modal menu
     */
    toggleModalMenu() {
        if (this.modalMenu && this.modalMenuTrigger) {
            this.modalMenuTrigger.addEventListener('click', () => {
                var _a;
                if ((_a = this.modalMenu) === null || _a === void 0 ? void 0 : _a.classList.contains('wa-astro-open-modal-menu')) {
                    this.closeModalMenu();
                }
                else {
                    this.openModalMenu();
                }
            });
        }
    }
    /**
     * Open the modal
     */
    openModalMenu() {
        return __awaiter(this, void 0, void 0, function* () {
            if (this.modalMenu) {
                // Step 1: Set display to block
                this.modalMenu.style.display = 'block';
                this.modalMenu.style.opacity = '0';
                // Step 2: Wait for the next frame to ensure display change is applied
                yield new Promise(resolve => requestAnimationFrame(resolve));
                // Step 3: Animate opacity
                this.modalMenu.style.transition = 'opacity 0.15s ease-in-out';
                this.modalMenu.style.opacity = '1';
                // Step 4: Add the open class after animation
                yield new Promise(resolve => setTimeout(resolve, 150));
                this.modalMenu.classList.add('wa-astro-open-modal-menu');
                this.switchTriggerText('opened');
            }
        });
    }
    /**
     * Close the modal
     */
    closeModalMenu() {
        return __awaiter(this, void 0, void 0, function* () {
            if (this.modalMenu) {
                // Step 1: Animate opacity back to 0
                this.modalMenu.style.transition = 'opacity 0.15s ease-in-out';
                this.modalMenu.style.opacity = '0';
                // Step 2: Wait for animation to complete
                yield new Promise(resolve => setTimeout(resolve, 150));
                // Step 3: Remove the open class and set display to none
                this.modalMenu.classList.remove('wa-astro-open-modal-menu');
                this.modalMenu.style.display = 'none';
                this.switchTriggerText('closed');
            }
        });
    }
    /**
     * Switch text of the modal trigger to "Close" and back to its original value
     */
    switchTriggerText(state) {
        if (this.modalMenuTrigger) {
            if (state === 'closed') {
                this.modalMenuTrigger.textContent = this.initialTriggerText;
            }
            else if (state === 'opened') {
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