;(function( $, window ) {
    'use strict';
  
  /*  Keep the accordion field's first item opened */
  $(window).load(function () {
    $('.domain-for-sale-opened-accordion').each(function () {
      if (!$(this).hasClass('hidden')) {
        $(this).addClass('domain_for_sale_saved_filter')
      }
    })
  })
  $('.domain-for-sale-field-checkbox.domain_for_sale_advanced_filter').change(function (event) {
    $('.domain-for-sale-opened-accordion').each(function () {
      if ($(this).hasClass('hidden')) {
        $(this).removeClass('domain_for_sale_saved_filter')
      } else {
        $(this).addClass('domain_for_sale_saved_filter')
      }
      if (!$(this).hasClass('domain_for_sale_saved_filter')) {
        if (
          $(this)
            .find('.domain-for-sale-accordion-title')
            .siblings('.domain-for-sale-accordion-content')
            .hasClass('domain-for-sale-accordion-open')
        ) {
          $(this).find('.domain-for-sale-accordion-title')
        } else {
          $(this)
            .find('.domain-for-sale-accordion-title')
            .trigger('click')
          $(this)
            .find('.domain-for-sale-accordion-content')
            .find('.domain-for-sale-cloneable-add')
            .trigger('click')
        }
      }
    })
  })
  
  })( jQuery, window, document );