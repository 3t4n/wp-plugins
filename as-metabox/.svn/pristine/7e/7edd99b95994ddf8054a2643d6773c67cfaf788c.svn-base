
// Preload options div


jQuery(document).ready(function($){
  var html_append = '<div class="as_meta_icon_dialog" title="Icon Option" style="display:none;">'+
    '<div class="as_icon_search_bar">'+
      '<input type="text" placeholder="Search icon" />'+
    '</div>'+
    '<ul class="as_meta_icon_items"><ul>'+
  '</div>';
  $('html body').append(html_append);
});

(function($) {

var as_meta_menu_height = jQuery('#as_admin_tabs ul').height();
jQuery('.asa_admin_before_tab').css('min-height', as_meta_menu_height+'px');



$('#as_admin_tabs ul li a#as_tab_active').on('click', function(e){
	e.preventDefault();
	var as_this_href = $(this).attr('href');

	var as_this_clos_class = $(this).closest('li');
		as_this_clos_class.addClass('active');
		as_this_clos_class.prevAll().removeClass('active')
		as_this_clos_class.nextAll().removeClass('active');

	var as_content = $(as_this_href)
		$('div.as_tab_main_content').removeClass('active animated fadeIn');
		as_content.addClass('active animated fadeIn');
});
	

$('.as_metabox_color_picker').wpColorPicker();

$('.as_metabox_datepicker').each(function() {
    //standard options
    var as_dateFormat = $(this).attr('data-format');
    var as_options = { 
    	dateFormat: as_dateFormat
    };   


	$(this).datepicker(as_options);

});


// Range Option

$('.as_range_slider_option').each(function(){
	var handle 				= $( this ).find('#as_range_handle');
	var inputval 			= $( this ).find('input[type="hidden"]');
	var as_range_min 		= $( this ).attr('data-min');
	var as_range_max 		= $( this ).attr('data-max');
	var as_range_step 		= $( this ).attr('data-step');
	var as_range_value 		= $( this ).attr('data-value');

	$( this ).slider({
	  range: "min",
      create: function() {
      	var create_value = $( this ).slider( "value" );
        handle.text( create_value );
      },
      slide: function( event, ui ) {
        handle.text( ui.value );
        inputval.val( ui.value );
      },
      min: parseInt(as_range_min),
      max: parseInt(as_range_max),
      value: parseInt(as_range_value),
      step: parseInt(as_range_step)
    });

});




$('.as_meta_upload_button a.as_image_upload_option_btn').live('click', function(e){
	e.preventDefault();
	var as_image_output 	= $(this).closest('.as_inline_option');
	var as_image_link 		= as_image_output.find('li').find('input[type="text"]');
	var as_image_id 		= as_image_output.find('li').find('input[type="hidden"]');
	var as_image_prec 		= as_image_output.find('li.as_image_prev_option');

    var as_image = wp.media({
        title: '',
        // mutiple: true if you want to upload multiple files at once
        multiple: false
    }).open()
    .on('select', function(e){
        var as_uploaded_image = as_image.state().get('selection').first();

        var as_image_url = as_uploaded_image.toJSON().url;

        $(as_image_link).val(as_image_url);
        $(as_image_id).val(as_uploaded_image.id);

        as_image_prec.html('<img src="'+as_image_url+'" alt="#"><span onclick="as_remove_option(this)" id="as_image_prev_remove_option">Remove</span>').css('display', 'block');
    });


});


$( ".as_metabox_group_option_accordion" ).each(function () {
  var accordion_id = $(this).attr('id');
    $( "#"+accordion_id).accordion({
        header: "> div.as_metabox_group_items > h3",
        icons: false,
        event: "click",
        heightStyle: "content",
        active:false,
        collapsible: true
      })
      .sortable({
        axis: "y",
        handle: "h3",
        stop: function( event, ui ) {
          // IE doesn't register the blur when sorting
          // so trigger focusout handlers to remove .ui-state-focus
          ui.item.children( "h3" ).triggerHandler( "focusout" );          
 
          // Refresh accordion to handle new order
          $( this ).accordion( "refresh" );
          
        }
    });
});

  $('.as_metabox_group_add_new_button').on('click', function () {

    var thisitem                = $(this);
    var group                   = thisitem.closest('.as_main_single_contant_box').find('.hidden_format');
    var item_count              = group.attr('data-item-count');
    var cur_accordion           = thisitem.closest('.as_main_single_contant_box').find('.as_metabox_group_option_accordion');
    var count_tab               = cur_accordion.find('.as_metabox_group_items');
    var cur_accordion_id        = cur_accordion.attr('id');
    var cur_accordion_tab_count = cur_accordion.attr('data-item-count');
    var as_meta_nonce           = as_meta_local.nonce_local;
    
    thisitem.find('.as_group_meta_loading').css('display', 'inline-block');
    item_count++;
    $.ajax({
        url: ajaxurl,
        type: "POST",
        data: {
            action: 'as_meta_get_group_option',
            data: $.parseJSON(group.attr('data-json')),
            count: parseInt(item_count),
            nonce: as_meta_nonce,
        },
        success: function(result){          
          group.attr('data-item-count', item_count);
          $('#'+cur_accordion_id).append(result);
          $( '#'+cur_accordion_id ).accordion("refresh");
          $('#'+cur_accordion_id+" .as_metabox_group_items:last-child h3").trigger("click");
          as_tabs_return_text();
          thisitem.find('.as_group_meta_loading').css('display', 'none');     
          as_each_editor_active($.parseJSON(group.attr('data-json')).group_fields, item_count);
        }
    });   

  });
as_tabs_return_text();

$('span.as_meta_add_icon_action').live('click', function(){
      var as_meta_nonce           = as_meta_local.nonce_local;
      var thisval                 = $(this).closest('.as_main_single_contant_box').find('span.as_meta_add_icon_action');
          thisval.find('i').show(0);
        $.ajax({
            url: ajaxurl,
            type: "POST",
            data: {
                action: 'as_meta_get_font_icon',
                nonce: as_meta_nonce,
            },
            success: function(result){     
              $('.as_meta_icon_dialog ul.as_meta_icon_items').html('');
              $.each(JSON.parse(result), function(key, val){
                $('.as_meta_icon_dialog ul.as_meta_icon_items').append('<li data-select="inactive" data-value="'+val+'"><i class="fa '+val+'"></i></li>');
              });  
              var wWidth = $(window).width();
              var dWidth = wWidth * 0.8;
              var wHeight = $(window).height();
              var dHeight = wHeight * 0.9;
              $( "div.as_meta_icon_dialog" ).dialog({
              modal: true,
              height: dHeight,
              width: dWidth,
              resizable: false,
              draggable: false,
              position: {  my: "center", at: "center", of: window },
              buttons: [
                        {
                            text: "Cancel",
                            "class": 'button ',
                            click: function() {
                              $( this ).dialog( "close" );
                              $('ul.as_meta_icon_items li').removeAttr('data-select', 'active');  
                              $('ul.as_meta_icon_items li').removeClass('active');
                              $('ul.as_meta_icon_items li').attr('data-select', 'active');
                              $('ul.as_meta_icon_items li').addClass('active');
                              $('.as_meta_icon_dialog .as_icon_search_bar input[type="text"]').val('');
                            }
                        },
                        {
                          text: "Add icon",
                          "class": 'button button-primary as_meta_btn',
                          click: function() {
                            var curr_value = $(this).find('.as_meta_icon_items').find('li[data-select="active"]').attr('data-value');
                              if (curr_value !== undefined) {
                                thisval.closest('ul.as_meta_box_icon_option').find('li input').val(curr_value);
                                thisval.closest('ul.as_meta_box_icon_option').find('li.as_icon_prev_li').html('<span class="as_icon_prev"><i class="fa '+curr_value+'"></i></span>').css('display', 'block');

                                var rm_btn_text = thisval.closest('ul.as_meta_box_icon_option').find('li.remove_action_outer .as_meta_remove_icon_action').html();
                                thisval.closest('ul.as_meta_box_icon_option').find('li.remove_action_outer').html('<span class="button as-button-danger as_meta_remove_icon_action">'+rm_btn_text+'</span></span>').css('display', 'block');
                                $( this ).dialog( "close" );


                                $('ul.as_meta_icon_items li').removeAttr('data-select', 'active');  
                                $('ul.as_meta_icon_items li').removeClass('active');
                                $('ul.as_meta_icon_items li').attr('data-select', 'active');
                                $('ul.as_meta_icon_items li').addClass('active');
                                $('.as_meta_icon_dialog .as_icon_search_bar input[type="text"]').val('');

                              }else{
                                alert('Please select an icon.');
                              }
                            }
                        },
                      ]

              });
              $('div.ui-dialog').css('z-index', 999999).css('position', 'fixed').css('top', '5%');

              thisval.find('i').hide(0);
            }
        });   
});


$('ul.as_meta_icon_items li').live('click', function(){
  $('ul.as_meta_icon_items li').removeAttr('data-select', 'active');  
  $('ul.as_meta_icon_items li').removeClass('active');
  $(this).attr('data-select', 'active');
  $(this).addClass('active');
});


$('.as_meta_remove_icon_action').live('click', function () {
  var thisval = $(this);  
  var this_clos  = thisval.closest('.as_meta_box_icon_option');
  this_clos.find('li.as_icon_prev_li').css('display', 'none').find('span.as_icon_prev').remove();
  this_clos.find('li input').val('');
  thisval.closest('li.remove_action_outer').html('').css('display', 'none');
});

$('.as_meta_icon_dialog .as_icon_search_bar input[type="text"]').live('keyup', function(){
  var   curr_val  = $(this).val();
  var   foundicon = 'no';
  var   all_icon  = $('.as_meta_icon_dialog .as_meta_icon_items li');
  all_icon.hide();
  all_icon.each(function(){
      var cur_icon = $(this).attr('data-value'); 
      if (cur_icon.toLowerCase().indexOf(curr_val.toLowerCase()) >= 0) {
        foundicon = 'yes';
        $(this).show();
      }
  });  
  if (curr_val == '') {
    all_icon.show();
  }
});


$('.as_meta_auto_complete_outer .as_meta_wp_select_ajax').live('change keyup paste', function(){
    
    var thisval       = $(this).closest('.as_meta_auto_complete_outer');
    var search_target = $.parseJSON(thisval.attr('data-json'));
    var curr_val      = thisval.find('.as_meta_wp_select_ajax').val();
    var as_meta_nonce = as_meta_local.nonce_local;

    if (curr_val != "") {
      $.ajax({
          url: ajaxurl,
          type: "POST",
          data: {
              action: 'as_meta_wp_select_val',
              data: search_target,
              curr_val: curr_val,
              nonce: as_meta_nonce,
          },
          success: function(result){          
            //console.log(result);
              thisval.find('.as_meta_auto_complete_select').css('display', 'block');
              thisval.find('.as_meta_auto_complete_select').html(result);
          }
      });   
    }else{
      thisval.find('.as_meta_auto_complete_select').css('display', 'none');
      thisval.find('.as_meta_auto_complete_select').html('');
    }



});

    $('.as_meta_auto_complete_outer .as_meta_auto_complete_select li').live('click', function(){
      var thisval       = $(this).closest('.as_main_single_contant_box');
      var dataname      = thisval.find('.as_meta_auto_complete_outer').attr('data-name');
      var datajson      = thisval.find('.as_meta_auto_complete_outer').attr('data-json');
      var datajson      = $.parseJSON(datajson);
      var multiple      = datajson.multiple;
      var value         = $(this).find('h2').attr('data-val');
      var title         = $(this).find('h2').attr('data-title');      
      if (typeof(multiple) != 'boolean') {
        if (multiple == 'true') {
          multiple = true;
        }else{          
          multiple = false;
        }
      }
      if (multiple === true) {
        thisval.find('.as_meta_wp_selected_value ul').append('<li>'+
                '<h2>'+title+'</h2>'+
                '<input type="hidden" value="'+value+'" name="'+dataname+'">'+
                '<span class="as_meta_wp_select_remove"><i class="fa fa-close"></i></span>'+
              '</li>');
      }else{
        thisval.find('.as_meta_wp_selected_value ul').html('<li>'+
                '<h2>'+title+'</h2>'+
                '<input type="hidden" value="'+value+'" name="'+dataname+'">'+
                '<span class="as_meta_wp_select_remove"><i class="fa fa-close"></i></span>'+
              '</li>');
      }


    });

    $('.as_meta_wp_selected_value ul .as_meta_wp_select_remove').live('click', function(){
      $(this).closest('li').remove();
    });

})( jQuery );


function as_tabs_return_text(){
    jQuery('a[data-get-text="as-return-selector"]').each(function(){

      var as_keyup_text = jQuery(this).attr('data-return-text');

      jQuery('.as_metabox_group_content .as_main_single_contant_box').find('input#'+as_keyup_text).bind("change keyup paste", function () {

        jQuery(this).closest('.as_metabox_group_items').find('h3').find('a').html(jQuery(this).val());

      });

    });
}

function as_each_editor_active(data_json, count_item){
  jQuery.each(data_json, function(key, val){
    if (val.type == 'wp_editor') {
      tinymce.execCommand( 'mceAddEditor', true, val.id+'_'+count_item+'editor' );
    }
  });
}

function as_remove_group_option(th, item){  
  var main_box = jQuery(th).closest('.'+item);
    main_box.css('display', 'none');
    main_box.find('h3').trigger("click");
    setTimeout(function(){ 
      main_box.remove();
      jQuery( '.as_metabox_group_option_accordion' ).accordion("refresh");
    }, 500);

}

function as_remove_option(th){
  
  var main_box = jQuery(th).closest('ul');
  main_box.find('input[type="text"]').val('');
  main_box.find('input[type="hidden"]').val('');
  main_box.find('li.as_image_prev_option').html('');
}