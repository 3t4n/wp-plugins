/**
 * Internal dependencies
 */
import { doCounting } from "./counting";

/**
 * Handle reduce motion
 *
 * @param {Array} instances
 * @param {Boolean} isReducedMotion
 */
const handleReduceMotion = (instances, isReducedMotion) => {
  instances.forEach((instance) => {
    const { observer, counter, data, element } = instance ?? {};
    if (!observer || !counter) {
      return;
    }

    if (isReducedMotion) {
      counter.printValue(data?.value);
      observer.unobserve(element);
    } else {
      observer.observe(element);
    }
  });
};

/**
 * Kick start the counting effect on frontend.
 */
window.addEventListener("load", function () {
  const countingElements = document.querySelectorAll(
    ".wp-block-boldblocks-counting-number .value"
  );

  if (countingElements.length) {
    const instances = [];
    countingElements.forEach((item) => {
      const instance = doCounting(item);
      if (instance) {
        instances.push(instance);
      }
    });

    const mediaQuery = window.matchMedia("(prefers-reduced-motion: reduce)");
    handleReduceMotion(instances, mediaQuery.matches);
    mediaQuery.addEventListener("change", () => {
      handleReduceMotion(instances, mediaQuery.matches);
    });
  }
});
