/* eslint-disable no-undef */
const el = wp.element.createElement;

/**
 * 24x24 Tock icon
 */
const tockIcon = el(
  'svg',
  { width: 24, height: 24 },
  el('path', {
    d:
      'M10 15.619C6.84915 15.619 4.28572 13.0542 4.28572 9.90176C4.28572 7.24269 6.10957 5.00183 8.57143 4.36551V0C3.72557 0.693782 0 4.86162 0 9.90176C0 15.4274 4.47715 19.9069 10 19.9069C12.2461 19.9069 14.3193 19.1658 15.9887 17.9148L12.9003 14.825C12.0494 15.3287 11.0581 15.619 10 15.619 M15.7135 9.90176C15.7135 10.9604 15.4233 11.9522 14.9199 12.8035L18.0082 15.8935C19.2585 14.2232 19.9992 12.149 19.9992 9.90176C19.9992 4.86162 16.2736 0.693782 11.4277 0V4.36551C13.8896 5.00183 15.7135 7.24269 15.7135 9.90176',
  })
);

/**
 * Create a block that is displayed in the list of options when a dashboard
 * admin edits a page.
 * An admin can add multiple blocks to each page, each with a different button.
 *
 */
wp.blocks.registerBlockType('tock/booking-widget', {
  title: 'Tock',
  icon: tockIcon,
  category: 'widgets', // The section to display the widget in
  /**
   * The html displayed in 'edit' mode
   * @param {} props
   */
  edit: function (props) {
    const imgSrc = tockBlockVars.imgSrc;
    return wp.element.createElement('img', { src: imgSrc, style: { width: '180px' } }, null);
  },
  /**
   * Return null in order to have a dynamic block. Dynamic blocks
   * generate html through php code instead of js.
   *
   * Wordpress requires users to confirm the html if we modify the html
   * through javascript, whereas php modifications to html do not require
   * a user prompt.
   *
   * @param {*} props
   */
  save: function (props) {
    return null;
  },
});
