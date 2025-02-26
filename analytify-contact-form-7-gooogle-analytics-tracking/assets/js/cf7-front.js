// IIFE - Immediately Invoked Function Expression
(function($, window, document) {
  'use strict';

  // Send Hit when mail sent successfully.
  document.addEventListener('wpcf7mailsent', function(event) {

    var form_id = event.detail.id.split('-').slice(0, 2).join('-');
    ga('send', {
      hitType: 'event',
      eventCategory: 'form',
      eventAction: 'submission',
      eventLabel: form_id
    });
  }, false);

  // Send Hit when mail failed.
  document.addEventListener('wpcf7mailfailed', function(event) {

    var form_id = event.detail.id.split('-').slice(0, 2).join('-');
    ga('send', {
      hitType: 'event',
      eventCategory: 'form',
      eventAction: 'mail failed',
      eventLabel: form_id
    });
  }, false);

  // Send Hit when validation failed.
  document.addEventListener('wpcf7invalid', function(event) {

    var form_id = event.detail.id.split('-').slice(0, 2).join('-');
    ga('send', {
      hitType: 'event',
      eventCategory: 'form',
      eventAction: 'validation failed',
      eventLabel: form_id
    });
  }, false);


  if ($('.wpcf7-form').length > 0) {
    $('.wpcf7-form').each(function(index, el) {

      var form = $(el).parent('.wpcf7').attr('id');
      var form_id = form.split('-').slice(0, 2).join('-');
      ga('send', {
        hitType: 'event',
        eventCategory: 'form',
        eventAction: 'impression',
        eventLabel: form_id,
        eventValue: 1,
        nonInteraction: 1
      });
    });

  }

}(window.jQuery, window, document));
