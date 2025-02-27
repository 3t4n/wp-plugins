(function ($) {
  'use strict';

  const {
    breakPoints,
    addCssToHead,
  } = responsiveBlockControlOptions;

  if (!addCssToHead) {
    return;
  }

  // add styles the clever way: https://dev.to/karataev/set-css-styles-with-javascript-3nl5
  var style = document.createElement('style');
  document.head.appendChild(style);
  style.sheet.insertRule('@media (min-width: ' + breakPoints.base + 'px) and (max-width: ' + breakPoints.tablet + 'px) {' +
      '  .rbc-is-hidden-on-mobile { clip: rect(1px, 1px, 1px, 1px) !important; clip-path: inset(50%) !important; height: 1px !important; ' +
			'width: 1px !important; margin: -1px !important; overflow: hidden !important; padding: 0 !important; position: absolute !important; } ' +
      '}');
  style.sheet.insertRule('@media (min-width: ' + breakPoints.tablet + 'px) and (max-width: ' + breakPoints.desktop + 'px) {' +
      '  .rbc-is-hidden-on-tablet { clip: rect(1px, 1px, 1px, 1px) !important; clip-path: inset(50%) !important; height: 1px !important; ' +
			'width: 1px !important; margin: -1px !important; overflow: hidden !important; padding: 0 !important; position: absolute !important; } ' +
			'}');
  style.sheet.insertRule('@media (min-width: ' + breakPoints.desktop + 'px) and (max-width: ' + breakPoints.wide + 'px) {' +
      '  .rbc-is-hidden-on-desktop { clip: rect(1px, 1px, 1px, 1px) !important; clip-path: inset(50%) !important; height: 1px !important; ' +
			'width: 1px !important; margin: -1px !important; overflow: hidden !important; padding: 0 !important; position: absolute !important; } ' +
			'}');
  style.sheet.insertRule('@media (min-width: ' + breakPoints.wide + 'px) {' +
      '  .rbc-is-hidden-on-wide { clip: rect(1px, 1px, 1px, 1px) !important; clip-path: inset(50%) !important; height: 1px !important; ' +
			'width: 1px !important; margin: -1px !important; overflow: hidden !important; padding: 0 !important; position: absolute !important; } ' +
			'}');
})(jQuery);

