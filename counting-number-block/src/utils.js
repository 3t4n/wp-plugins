/**
 * External dependencies
 */

/**
 * Build the dataset object
 *
 * @param {Object} attributes
 * @returns {Object}
 */
export const buildDataset = (attributes) => {
  const {
    value = 1000,
    startVal = 0,
    duration = 2,
    separator = ",",
    decimal = ".",
    enableScrollSpy = true,
    scrollSpyOnce,
    scrollSpyDelay = 0,
    disableGrouping = false,
    prefix = "",
    suffix = "",
  } = attributes;

  const attrs = {
    value,
    startVal,
    duration,
    separator,
    decimal,
    enableScrollSpy,
    scrollSpyOnce,
    scrollSpyDelay,
    disableGrouping,
    prefix,
    suffix,
  };

  return Object.keys(attrs).reduce((previous, current) => {
    let attr = current;
    if (current === "startVal") {
      attr = "start-val";
    } else if (current === "enableScrollSpy") {
      attr = "enable-scroll-spy";
    } else if (current === "scrollSpyOnce") {
      attr = "scroll-spy-once";
    } else if (current === "scrollSpyDelay") {
      attr = "scroll-spy-delay";
    }

    if (current === "disableGrouping") {
      if (attrs[current]) {
        previous["data-disable-grouping"] = attrs[current];
      }
    } else {
      previous[`data-${attr}`] = attrs[current];
    }

    return previous;
  }, {});
};

export const getStartValue = ({ deprecatedStartVal, startVal }) =>
  deprecatedStartVal ? "" : startVal;
