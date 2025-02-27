/**
 * External dependencies
 */
import { CountUp } from "countup.js";

export const doCounting = (element) => {
  const dataset = element.dataset;
  const data = Object.keys(dataset).reduce((previous, current) => {
    let value = dataset[current];
    if (current === "value") {
      if (!isNaN(parseFloat(value))) {
        let decimalPlaces = 0;
        const decimal = ".";
        if ((value + "").indexOf(decimal) >= 0) {
          decimalPlaces = (value + "").split(decimal)[1].length;
        }

        previous["value"] = value;
        previous["decimalPlaces"] = decimalPlaces;
      }
    } else if (["startVal", "duration", "scrollSpyDelay"].includes(current)) {
      value = parseFloat(value);
      if (!isNaN(value)) {
        if (current === "scrollSpyDelay") {
          value = value * 1000;
        }

        previous[current] = value;
      }
    } else if (["enableScrollSpy", "scrollSpyOnce"].includes(current)) {
      previous[current] = value === "true";
    } else if ("disableGrouping" === current) {
      previous["useGrouping"] = value !== "true";
    } else if (["separator", "decimal"].includes(current)) {
      previous[current] = value;
    }

    return previous;
  }, {});

  if (data?.value) {
    const counter = new CountUp(element, data.value, {
      ...data,
      enableScrollSpy: false,
      scrollSpyOnce: true,
      useEasing: true,
    });

    const animatingClass = "is-number-animating";

    const observer = new IntersectionObserver(
      ([e]) => {
        if (e.intersectionRatio > 0) {
          const blockElement = e.target.closest(
            ".wp-block-boldblocks-counting-number"
          );
          if (
            blockElement &&
            !blockElement.classList.contains(animatingClass)
          ) {
            blockElement.classList.add(animatingClass);
          }

          counter.reset();
          counter.start(() => {
            if (
              blockElement &&
              blockElement.classList.contains(animatingClass)
            ) {
              blockElement.classList.remove(animatingClass);
            }
          });

          if (data?.scrollSpyOnce) {
            observer.unobserve(element);
          }
        }
      },
      { threshold: [0] }
    );

    observer.observe(element);

    return { observer, element, data, counter };
  }
};
