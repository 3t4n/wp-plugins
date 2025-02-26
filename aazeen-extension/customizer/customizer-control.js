/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

 jQuery(window).bind('load', function(){
 	//Widgets List Modification
 		jQuery('#available-widgets-list').prepend('<ul class="aazeen_widget_list"><li class="currnt_widgets"><a>'+objectL10n.optimwidgt+'</a></li><li><a>'+objectL10n.othrimwidgt+'</a></li></ul>');
 		jQuery('.aazeen_widget_list li:eq(1)').click(function() {
 			jQuery( '.aazeen_widget_list li').removeClass('currnt_widgets');
 			jQuery( this ).addClass('currnt_widgets');
 			jQuery( '#available-widgets').addClass('active-otherwidget');
 		});

 		jQuery('.aazeen_widget_list li:eq(0)').click(function() {
 			jQuery( '.aazeen_widget_list li').removeClass('currnt_widgets');
 			jQuery( this ).addClass('currnt_widgets');
 			jQuery( '#available-widgets').removeClass('active-otherwidget');
 		});



 	//Sort Widgets
 	jQuery('#available-widgets-list .widget-tpl').attr('data-order','99');
 	jQuery('#available-widgets-list [id^="widget-tpl-aazeen_slider_widget"]').attr('data-order','1');
  jQuery('#available-widgets-list [id^="widget-tpl-aazeen_client_widget"]').attr('data-order','6');
  jQuery('#available-widgets-list [id^="widget-tpl-aazeen_feature_widget"]').attr('data-order','2');
  jQuery('#available-widgets-list [id^="widget-tpl-aazeen_service_widget"]').attr('data-order','3');
  jQuery('#available-widgets-list [id^="widget-tpl-aazeen_team_widget"]').attr('data-order','4');
  jQuery('#available-widgets-list [id^="widget-tpl-aazeen_ex_post_carousel"]').attr('data-order','4');
  jQuery('#available-widgets-list [id^="widget-tpl-aazeen_contact_widget"]').attr('data-order','4');
  jQuery('#available-widgets-list [id^="widget-tpl-aazeen_product_carousel"]').attr('data-order','4');
  jQuery('#available-widgets-list [id^="widget-tpl-aazeen_post_masonry"]').attr('data-order','5');
  jQuery('#available-widgets-list [id^="widget-tpl-siteorigin-panels-builder"]').attr('data-order','1');
  jQuery('#available-widgets-list [id^="widget-tpl-aazeen_pricing_table"]').attr('data-order','7');





 	//Sort The widgets to aazeen Widgets First
 	jQuery('#available-widgets-list').find('.widget-tpl').sort(function (a, b) {
 	   return jQuery(a).attr('data-order') - jQuery(b).attr('data-order');
 	}).appendTo('#available-widgets-list');


 });
