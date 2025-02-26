jQuery(function() {
    jQuery("#adminmenu").sortable({
        stop: function(event, ui) {
            aame_update_sortable_indexes();
        }
    });
    jQuery("#adminmenu").disableSelection();
});

function resetMenu(){
  jQuery('.wp-menu-separator').removeClass('ready-remove');
  //jQuery('.remove-separator').text('Remove Separator');
  jQuery('#adminmenu .seps-edit').slideUp('slow');
  jQuery('#adminmenu .wp-has-submenu .wp-submenu').slideDown('slow');
}

function aame_update_sortable_indexes() {
    resetMenu();
    var positions = new Array();
    var s = 0;

    var targets = jQuery('#adminmenu > li.wp-menu-separator');
    targets.each(function(){
      if(jQuery(this).hasClass('sep-hidden')){}
      else {
        jQuery(this).removeClass('new-separator').empty().append('<a class="separator"></a></li>');
      }
    });

    jQuery('#adminmenu > li > a:first-child').each(function(i, obj) {
      if(jQuery(this).hasClass('separator')){
        s++
        //console.log('separator'+s);
        jQuery(this).attr('href', 'separator'+s);
      }

        positions[i] = jQuery(this).attr('href');
    });

    var data = {
        action: 'update_menu_positions',
        menu_item_positions: positions.toString()
    };

    jQuery.post(ajaxurl, data, function(response) {});

}

jQuery(window).on('load', function(){
  jQuery('#collapse-menu').after('<li id="separator-menu" class="hide-if-no-js ui-sortable-handle"><button type="button" id="collapse-button" aria-label="Collapse Main menu" aria-expanded="true"><span class="dashicons dashicons-excerpt-view"></span><span class="collapse-button-label">Edit Separators</span></button><div class="seps-edit"><button class="add-separator"><span class="dashicons dashicons-plus"></span>Add Separator</button><button class="remove-separator"><span class="dashicons dashicons-minus"></span>Remove Separator</button></div></li>');

  jQuery('#separator-menu > button').on('click', function(){
    jQuery('#adminmenu .wp-submenu').slideUp('slow');
    jQuery('#adminmenu .seps-edit').slideDown('slow');
    jQuery('#adminmenu .wp-has-submenu').addClass('default');
    //jQuery('#wpcontent .wrap').addClass('fader');
  });

  //Add separator
  jQuery('.add-separator').on('click', function(){
    if(jQuery('#adminmenu .new-separator').length < 1) {
      jQuery('#collapse-menu').before('<li class="wp-not-current-submenu wp-menu-separator new-separator ui-sortable-handle" aria-hidden="true"><div class="separator"></div></li>');
    }
  });


  //Remove separator
  jQuery('.remove-separator').on('click', function(e){
    jQuery('.wp-menu-separator').addClass('ready-remove');
    delete_sep();
  });

  jQuery('#wpcontent').on('click', function(e){
    resetMenu();
  });

  function delete_sep(){
    /*jQuery('.remove-separator').text('Cancel');
    jQuery('.remove-separator').click(function(){
      jQuery('.remove-separator').text('Remove Separator');
      jQuery('.wp-menu-separator').removeClass('ready-remove');
      return false;
    });*/
    jQuery('.ready-remove').click(function(){
      jQuery(this).remove();
      aame_update_sortable_indexes();
    });
  }



});
