/**
 * Internal dependencies
 */
import { doCounting } from "./counting";

/**
 * Get counting manager object
 *
 * @returns {Array}
 */
const getCountingManager = () => {
  if (!window.countingManager) {
    window.countingManager = {};
  }

  return window.countingManager;
};

/**
 * Kick start the counting effect.
 */
window.addEventListener(
  "boldblocks.countingNumber.settingsUpdated",
  ({ detail: { selector } = {} }) => {
    const manager = getCountingManager();
    if (manager[selector]) {
      const { observer, element } = manager[selector] ?? {};

      if (observer && element) {
        observer.unobserve(element);
      }
    }

    let blockElement = document.querySelector(selector);
    if (!blockElement) {
      const editorCanvas = document.querySelector(
        'iframe[name="editor-canvas"]'
      );
      if (editorCanvas) {
        blockElement =
          editorCanvas.contentWindow.document.querySelector(selector);
      }
    }
    if (blockElement) {
      manager[selector] = doCounting(blockElement);
    }
  }
);
