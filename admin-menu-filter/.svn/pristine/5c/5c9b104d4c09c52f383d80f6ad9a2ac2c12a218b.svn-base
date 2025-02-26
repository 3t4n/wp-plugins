<?php

/*
  Plugin Name: Admin Menu Filter
  Description: Add filter functionallity on the left menu in WP Admin
  Version: 0.2.4
  Author: Ale Moreno
  Author URI: http://ale.desarrolloweburuguay.com
 */

if (!defined('ABSPATH')) {
  die('-1');
}


define('AMF_TEXT_DOMAIN', 'admin-menu-filter');

add_action('admin_bar_menu', 'amf_render_html', 10, 1);
add_action('admin_print_footer_scripts', 'amf_render_js', 100);
add_action('admin_head', 'amf_render_css', 20);

function amf_render_html($wp_admin_bar) {
  if (!is_admin()) {
    return;
  }
  $args = array(
    'id' => 'menu-filter',
    'title' => '<div class="admin-menu-filter"></div>',// <input type="text" placeholder="' . esc_attr(__('Find in menu', AMF_TEXT_DOMAIN)) . '" id="admin-menu-filter-input">',
    'meta' => array('class' => 'admin-menu-filter')
  );
  $wp_admin_bar->add_node($args);
}

function amf_render_css() {
  ?>
  <style type="text/css" id="amf-inline">
    @media screen and (min-width: 782px){
      li.menu-top.amfed{
        display: none;
      }
      li.menu-top li.amfed{
        opacity: .2;
      }
      li.admin-menu-filter .ab-item{
        overflow:hidden;
      }
      #admin-menu-filter-input{
        max-height: 70%;
        padding:0 4px;
        width: calc(100% - 8px);
        max-width: 120px;
        background: #CCC;
        border-color:#000;
      }
      #admin-menu-filter-input.fill{
        background: #fff;
        border-color:#fff;
      }
    }
  </style>
  <?php

}

function amf_render_js() {
  ?>
  <script type="text/javascript" id="amf-admin">
      'use strict';
    (function ($) {

     $.expr[':'].Contains = function (a, i, m) {
	  return $(a).text().toUpperCase().indexOf(m[3].toUpperCase()) >= 0;
	};
      var amfed_filtered = 'amfed';
      var amfed_input = 'admin-menu-filter-input';
	  var attr = {
		id:amfed_input,
		placeholder:'<?=esc_attr(__('Find in menu', AMF_TEXT_DOMAIN)) ?>',
	  };
	  var input = $('<input/>').attr(attr);
	  
	  $('li#wp-admin-bar-menu-filter .ab-item .admin-menu-filter').append(input);

      $(input).keyup(function (e) {

          var text = $(this).val();
          var menu = $('#adminmenu');
          if (text) {
            $(this).addClass('fill');
          } else {
            $(this).removeClass('fill');
          }
          $('li.menu-top', menu).addClass(amfed_filtered)
                  .filter(':Contains(' + text + ')')
                  .removeClass(amfed_filtered);

          $('li ul li', menu).addClass(amfed_filtered)
                  .filter(':Contains(' + text + ')')
                  .removeClass(amfed_filtered);
          $('li ul li', menu).not('.' + amfed_filtered).each(function (i, e) {
            $(e).closest('li').removeClass(amfed_filtered);
          });

        });


		
    })(jQuery);
  </script>
  <?php

}
