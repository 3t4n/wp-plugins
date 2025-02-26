/**
 * Module:  Modal Handler
 * @desc    Handles the functionality for the modal.
 */

const defaults = {
    debug:  false
};

/**
 * ModalHandler constructor.
 * @param options
 * @constructor
 */
function ModalHandler( options ) {
    this.options = jQuery.extend({}, defaults, options);
    this.init();
}

/**
 * Initializer the module.
 */
ModalHandler.prototype.init = function () {
    var debug = this.options.debug;

    debug ? console.log( 'Modal Handler Initialized!' ) : null;

    this.setEventHandlers();
};

/**
 * Set all event handlers.
 */
ModalHandler.prototype.setEventHandlers = function () {
    // Close Button
    jQuery(document).on('click', '#simple-gdpr-cookies-close a', (e) => {
        e.preventDefault();

        this.setCookie( 'default' );

        this.dismissModal();
    });

    // Accept/Decline Buttons
    jQuery(document).on('click', '#simple-gdpr-cookies-buttons button', function(e) {
        e.preventDefault();

        ModalHandler.prototype.setCookie( this.dataset['simpleGdprCookies'] );

        ModalHandler.prototype.dismissModal();
    });
};

/**
 * Sets the cookie for the plugin.
 *
 * @param cookieValue
 */
ModalHandler.prototype.setCookie = function ( cookieValue ) {
  var currentDate = new Date();
  var expiration;

  var dateObject = {
      'year'    : currentDate.getFullYear(),
      'month'   : currentDate.getMonth(),
      'day'     : currentDate.getDate(),
      'hours'   : currentDate.getHours(),
      'min'     : currentDate.getMinutes(),
      'sec'     : currentDate.getSeconds()
  };

  switch ( simple_gdpr_cookies['duration'] ) {
      case 'years':
          expiration = new Date(
              dateObject.year,
              dateObject.month,
              dateObject.day,
              dateObject.hours,
              dateObject.min,
              dateObject.sec
          );
          break;
      case 'months':
          expiration = new Date(
              dateObject.year,
              dateObject.month + parseInt(simple_gdpr_cookies['num']),
              dateObject.day,
              dateObject.hours,
              dateObject.min,
              dateObject.sec
          );
          break;
      case 'days':
          expiration = new Date(
              dateObject.year,
              dateObject.month,
              dateObject.day + parseInt(simple_gdpr_cookies['num']),
              dateObject.hours,
              dateObject.min,
              dateObject.sec
          );
          break;
      case 'hours':
          expiration = new Date(
              dateObject.year,
              dateObject.month,
              dateObject.day,
              dateObject.hours + parseInt(simple_gdpr_cookies['num']),
              dateObject.min,
              dateObject.sec
          );
          break;
      case 'minutes':
          expiration = new Date(
              dateObject.year,
              dateObject.month,
              dateObject.day,
              dateObject.hours,
              dateObject.min + parseInt(simple_gdpr_cookies['num']),
              dateObject.sec
          );
          break;
      case 'seconds':
          expiration = new Date(
              dateObject.year,
              dateObject.month,
              dateObject.day,
              dateObject.hours,
              dateObject.min,
              dateObject.sec + parseInt(simple_gdpr_cookies['num'])
          );
          break;
  }

  document.cookie = 'sgc_user_consent=' + cookieValue + '; expires=' + expiration + '; path=/';
};

/**
 * Dismiss the modal.
 */
ModalHandler.prototype.dismissModal = function() {
    if ( simple_gdpr_cookies['dismiss'] === 'fade' ) {
        jQuery('#simple-gdpr-cookies-banner').fadeOut();
    } else {
        jQuery('#simple-gdpr-cookies-banner').hide();
    }
};

module.exports = {
    init: function (opts) {
        return new ModalHandler(opts);
    }
};