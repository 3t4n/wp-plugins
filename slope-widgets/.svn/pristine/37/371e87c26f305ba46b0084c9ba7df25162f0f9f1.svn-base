"use strict";

(function (blocks, element) {
  var el = element.createElement;
  var calendarIcon = el('svg', {
    height: 30,
    width: 30
  }, el('path', {
    d: 'M12,19a1,1,0,1,0-1-1A1,1,0,0,0,12,19Zm5,0a1,1,0,1,0-1-1A1,1,0,0,0,17,19Zm0-4a1,1,0,1,0-1-1A1,1,0,0,0,17,15Zm-5,0a1,1,0,1,0-1-1A1,1,0,0,0,12,15ZM19,3H18V2a1,1,0,0,0-2,0V3H8V2A1,1,0,0,0,6,2V3H5A3,3,0,0,0,2,6V20a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V6A3,3,0,0,0,19,3Zm1,17a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V11H20ZM20,9H4V6A1,1,0,0,1,5,5H6V6A1,1,0,0,0,8,6V5h8V6a1,1,0,0,0,2,0V5h1a1,1,0,0,1,1,1ZM7,15a1,1,0,1,0-1-1A1,1,0,0,0,7,15Zm0,4a1,1,0,1,0-1-1A1,1,0,0,0,7,19Z'
  }));
  blocks.registerBlockType('slope-plugins/slope-reservations', {
    title: 'Slope Reservations',
    icon: calendarIcon,
    category: 'widgets',
    attributes: {
      lang: {
        type: 'string',
        "default": 'it'
      }
    },
    // The property below allows to render a preview on the block editor. The viewport width must be specified due to the width of our widget
    example: {
      viewportWidth: 1000
    },
    edit: function edit(props) {
      return slopeBlockPreviewManager.createSlopeBlock(el, [slopeBlockPreviewManager.createSlopeReservationDates(el), slopeBlockPreviewManager.createSlopeVerticalDivider(el), slopeBlockPreviewManager.createSlopeGuestsAndButtonContainer(el), slopeBlockPreviewManager.createSlopeLanguageSelect(el, ['it', 'en', 'fr', 'de'], props)]);
    },
    save: function save(props) {
      return '[slope-reservations lang=' + props.attributes.lang + ']';
    }
  });
})(window.wp.blocks, window.wp.element);