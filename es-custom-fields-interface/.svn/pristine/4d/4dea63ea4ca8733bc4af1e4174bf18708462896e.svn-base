/*
* Custom Field GUI Utility 2.1.0
*
* Copyright (c) 2008-2009 Tomohiro Okuwaki
* Licensed under the MIT License:
* http://www.opensource.org/licenses/mit-license.php
*
* Since:       2008-10-15
* Last Update: 2009-07-09
*
* jQuery 1.3.2
* Facebox 1.2
* cookie.js
*
* Modificato da Enzo Sforna
* Ultimo aggiornamento 22/09/2009
* ES Custom Fields Interface  Version: 3.20 30/01/2010
*/



function getMediaURL (str)

{

	var media_url;

	if (str.match(/^<img/)){

		media_url = str.replace(/(<img src=")([^"]+)(".+)/,'$2');

	}

	else if (str.match(/^<embed/)){

		media_url = str.replace(/(<embed src=")([^"]+)(".+)/,'$2');

	}

	else if (str.match(/^<object/)){

		media_url = str.replace(/(<object data=")([^"]+)(".+)/,'$2');

	}

	else if (str.match(/^<a/)){

		media_url = str.replace(/(<a href=")([^"]+)(".+)/,'$2');

		}else{

		media_url = str;

	}

	return media_url;

}



function getMediaType (str){

	str=str.toLowerCase();

	var myEst = str.match(/[a-z]{2,5}$/i);

	var myType='';

	if(myEst=='pdf'||myEst=='rtf'||myEst=='svg'){

		myType=myEst;

	}

	else if(myEst=='jpg'||myEst=='gif'||myEst=='png'||myEst=='ico'){

		myType='image';

	}

	else if(myEst=='php'||myEst=='htm'||myEst=='html'||myEst=='shtm'||myEst=='shtml'){

		myType='web';

	}

	else if(myEst=='rss'||myEst=='rdf'||myEst=='atom'){

		myType='feed';

	}

	else if(myEst=='doc'||myEst=='docx'){

		myType='word';

	}

	else if(myEst=='xls'||myEst=='xlsx'){

		myType='excel';

	}

	else if(myEst=='odt'||myEst=='ott'||myEst=='sxw'||myEst=='stw'){

		myType='oo_write';

	}

	else if(myEst=='ods'||myEst=='ots'||myEst=='sxc'||myEst=='stc'){

		myType='oo_calc';

	}

	else {myType='file';

	}

	return myType;

}

// getPageScroll() by quirksmode.com



function getPageScroll(){

	var xScroll, yScroll;

	if (self.pageYOffset){

		yScroll = self.pageYOffset;

		xScroll = self.pageXOffset;

	}

	else if (document.documentElement && document.documentElement.scrollTop){

		// Explorer 6 Strict

		yScroll = document.documentElement.scrollTop;

		xScroll = document.documentElement.scrollLeft;

	}

	else if (document.body){

		// all other Explorers

		yScroll = document.body.scrollTop;

		xScroll = document.body.scrollLeft;

	}

	return new Array(xScroll,yScroll) 

}

// Adapted from getPageSize() by quirksmode.com



function getPageHeight(){

	var windowHeight

	if (self.innerHeight){

		// all except Explorer

		windowHeight = self.innerHeight;

	}

	else if (document.documentElement && document.documentElement.clientHeight){

		// Explorer 6 Strict Mode

		windowHeight = document.documentElement.clientHeight;

	}

	else if (document.body){

		// other Explorers

		windowHeight = document.body.clientHeight;

	}

	return windowHeight

}

// Custom Field GUI Utility jQuery

jQuery(function(){

	var file_type;

	var admin_url = location.href;

	var images_url = admin_url.replace(/(http.+)(wp-admin)(.+)/,'$1') + 'wp-content/plugins/es-custom-fields-interface/images/';

	var cancel_png = images_url + 'cancel.png';

	var required_png = images_url + 'required.png';

	// [start] multiple selection checkboxes

	jQuery('.postbox.multi_checkbox').each(function(){

		var checkboxs  = jQuery(this).find(':checkbox');

		var mc_val_elm = jQuery(this).find('.multi_checkbox_val');

		var mc_val_str = mc_val_elm.val();

		var mc_val_def = jQuery(this).find('.multi_checkbox_def').text();

		mc_val_def = mc_val_def.replace(/[ 　]*#[ 　]*/,',');

		var mc_val_arr = new Array;

		if (mc_val_str){

			mc_val_arr = mc_val_str.split(',');

			for (i = 0; i < mc_val_arr.length; i++){

				checkboxs.each(function(){

					if (jQuery(this).attr('title') == mc_val_arr[i]){

						jQuery(this).click();

					}

					});

			}

			}else{

			mc_val_elm.val(mc_val_def);

			mc_val_arr = mc_val_def.split(',');

			for (i = 0; i < mc_val_arr.length; i++){

				checkboxs.each(function(){

					if (jQuery(this).attr('title') == mc_val_arr[i]){

						jQuery(this).click();

					}

					});

			}

		}

		checkboxs.click(function(){

			var mc_val_arr = new Array;

			var parent = jQuery(this).parents('.multi_checkbox_list');

			parent.find(':checked').each(function(){

				mc_val_arr.push(jQuery(this).attr('title'));

			}

			);

			parent.find('input.multi_checkbox_val').val(mc_val_arr.join());

		}

		);

	}

	);

	// [end] more than one check box selected

	// [start] file field around the image field, set the event live

	jQuery('.clone_add_media').live('click', function(){

		// Click uploader (clc) field of id image stored in a cookie

		var clc_id = jQuery(this).parents('.imf').attr('id');

		jQuery.cookie('imf_clc_id',clc_id);

		// WP started the original uploader (did not work when run directly)

			jQuery(this).prev('a').click();

		// Motion to insert a custom field values when you close the Uploader

		jQuery('#TB_window #TB_closeWindowButton img, #TB_overlay').click(function(){

			// id from the cookie reset after you get the value assigned to a variable and

			var imf_clc_id = '#' + jQuery.cookie('imf_clc_id');

			var imf_val  = jQuery.cookie('imf_value');

			jQuery.cookie('imf_clc_id','');

			jQuery.cookie('imf_value','');

			// Add a custom field values

			if (imf_val){

				jQuery(imf_clc_id).find('input.data').val(imf_val);

				// button displays the file type icon and text field

				var media_url = getMediaURL (imf_val);

				var media_type = getMediaType (media_url);

				if (media_type){

					jQuery(imf_clc_id).find('input.data')

						.css('background','url(' + images_url + media_type + '.png) no-repeat 3px center')

						.css('padding-left','20px');

					if (media_type!='svg'){

						jQuery(imf_clc_id).find('a.imf_img').attr('href',media_url).html('<img src="' + media_url + '" width="150" />');

					}

					else {jQuery(imf_clc_id).find('a.imf_img').attr('href',media_url).html('<embed src="' + media_url + '" width="150" />' );

					}

					} else {

					jQuery(imf_clc_id).find('input.data').removeAttr('style');

				}

				jQuery(imf_clc_id).find('img.imf_clear').attr('src', cancel_png).show();

			}

			});

	}

	);

	// [end] set around the live image file field event field

	// [start] Mediaappuroda additional copy for each event

	var clone = jQuery('div#media-buttons').clone(true);

	clone.css({'float':'none','font-size':'13px'})

		.addClass('clone')

		.append('<img alt="'+phr[7]+'" src="images/media-button-other.gif" class="clone_add_media" style="cursor:pointer;"/>');

	clone.find('#add_image, #add_video, #add_audio').remove();

	clone.find('#add_media').hide();

	jQuery('div.clone_replace').replaceWith(clone);

	// [end] Mediaappuroda additional copy for each event

	// [start] button to add custom fields for uploader

	var imf_ins_btns = 

	'<span>'+phr[1]+'</span><br />' + //insert in custom field

	'<span class="button imf_ins_img">'+phr[2]+'</span>' +//img tag

	'<span class="button imf_ins_a">'+phr[3]+'</span>' +//a tag

	'<span class="button imf_ins_url">'+phr[4]+'</span><br /><br />';//url

	jQuery('#media-upload #media-items .submit').each(function(){

		jQuery(this).find('td:first-child').replaceWith('<th><span class="alignleft">Insert</span></th>');

	}

	);

	jQuery('#media-upload #media-items .submit .savesend').prepend(imf_ins_btns);

	jQuery('tr.url td.field p.help').before('<button type="button" class="button use_thumb">'+phr[5]+'</button>');

	jQuery('#media-items').live('mouseover', function(){

		if (jQuery('#media-upload #media-items .submit .savesend .imf_ins_url').text() == ''){

			jQuery('#media-upload #media-items .submit .savesend').prepend(imf_ins_btns);

			jQuery('tr.url td.field p.help').before('<a href="javascript:void(0);" class="button use_thumb">'+phr[5]+'</a>');

		}

		});

	// [end] custom fields to add a button for uploader

	// [start] in the custom field "URL" button to insert the event

	jQuery('.imf_ins_url').live('click', function(){

		var tr_submit = jQuery(this).parents('tr.submit');

		var tr_url = tr_submit.prevAll('tr.url');

		var media_url = tr_url.find('td.field input.urlfield').val();

		jQuery.cookie('imf_value',media_url);

		jQuery('p.ml-submit input:submit').click();

	}

	);

	// [end] custom field "URL" button to insert the event

	// [start] in the custom field "img tag" button to insert the event

	jQuery('.imf_ins_img').live('click', function(){

		var tr_submit = jQuery(this).parents('tr.submit');

		var tr_url = tr_submit.prevAll('tr.url');

		var tr_ttl = tr_submit.prevAll('tr.post_title');

		var tr_exc = tr_submit.prevAll('tr.post_excerpt');

		var tr_ctt = tr_submit.prevAll('tr.post_content');

		var media_url = tr_url.find('td.field input.urlfield').val();

		var media_type = media_url.match(/[a-z]{2,5}$/i);

		var media_ttl = tr_ttl.find('td.field input').val();

		var media_exc = tr_exc.find('td.field input').val();

		var media_ctt = tr_ctt.find('td.field textarea').val();

		var media_atr_alt = media_ttl;

		var media_atr_ttl = '';

		var media_elm;

		if (media_exc){

			media_atr_alt = media_exc;

		}

		if (media_ctt){

			media_atr_ttl = ' title="' + media_ctt + '"';

		}

		if (media_type!='svg'){

			media_elm = '<img src="' + media_url + '" alt="' + media_atr_alt + '"' + media_atr_ttl + ' class="cfg_img" />';

			}else{

			media_elm='<object data="'+media_url+'" alt="'+media_atr_alt+'" '+media_atr_ttl+' type="image/svg+xml" class="cfg_img"></object>';//<embed src=

		}

		jQuery.cookie('imf_value',media_elm);

		jQuery('p.ml-submit input:submit').click();

	}

	);

	// [end] custom field "img tag" button to insert the event

	// [start] in the custom field "a tag" button to insert the event

	jQuery('.imf_ins_a').live('click', function(){

		var tr_submit = jQuery(this).parents('tr.submit');

		var tr_url = tr_submit.prevAll('tr.url');

		var tr_ttl = tr_submit.prevAll('tr.post_title');

		var tr_exc = tr_submit.prevAll('tr.post_excerpt');

		var tr_ctt = tr_submit.prevAll('tr.post_content');

		var media_url = tr_url.find('td.field input.urlfield').val();

		var media_type = media_url.match(/[a-z]{2,5}$/i);

		var media_ttl = tr_ttl.find('td.field input').val();

		var media_exc = tr_exc.find('td.field input').val();

		var media_ctt = tr_ctt.find('td.field textarea').val();

		var media_atr_ttl = '';

		var media_elm;

		if (media_exc){

			media_atr_alt = media_exc;

		}

		if (media_ctt){

			media_atr_ttl = ' title="' + media_ctt + '"';

		}

		media_elm = '<a href="' + media_url + '"' + media_atr_ttl + ' class="cfg_link">' + media_ttl + '</a>';

		jQuery.cookie('imf_value',media_elm);

		jQuery('p.ml-submit input:submit').click();

	}

	);

	// [end] custom field "a tag" button to insert the event

	// [start] of the thumbnail URL to the "Link URL" into

	jQuery('tr.url .use_thumb').live('click', function(){

		var imaze_size_item = jQuery(this).parents('tr.url').nextAll('tr.image-size').find('td.field div.image-size-item:has(input:checked)');

		var thumb_size = imaze_size_item.find('label.help').text();

		thumb_size = thumb_size.replace(/(\()([0-9]+)([^0-9]+)([0-9]+)(\))/,'-$2x$4');

		var thumb_url = jQuery(this).prevAll('button.urlfile').attr('title');

		thumb_url = thumb_url.replace(/(\.[a-z]{2,5}$)/i,(thumb_size) + '$1');

		jQuery(this).prevAll('input.urlfield').val(thumb_url);

	}

	);

	// [end] of the thumbnail URL to the "Link URL" into

	// [start] on the screen displays thumbnails Management

	jQuery('div.imf').each(function(){

		var imf_input = jQuery(this).find('input.data');

		var imf_val = imf_input.val();

		if (imf_val){

			jQuery(this).find('img.imf_clear').attr('src', cancel_png).show();

			var media_url = getMediaURL (imf_val);

			var media_type = getMediaType (media_url);

			jQuery(this).find('input')

				.css('background','url(' + images_url + media_type + '.png) no-repeat 3px center')

				.css('padding-left','20px');

			if (media_type!='svg'){

				jQuery(this).find('a.imf_img').attr('href', media_url).html('<img src="' + media_url + '" width="150" />');

				}else{

				jQuery(this).find('a.imf_img').attr('href', media_url).html('<object data="' + media_url + '" width="150" type="image/svg+xml"></object>');

			}

		}else{

			jQuery(this).find('input').removeAttr('style');

		}

		imf_input.change(function(){

			var imf_val = jQuery(this).val();

			if (imf_val){

				getMediaURL (imf_val);

				getMediaType (media_url);

				jQuery(this)

					.css('background','url(' + images_url + media_type + '.png) no-repeat 3px center')

					.css('padding-left','20px');

				jQuery(this).nextAll('img.imf_clear').attr('src', cancel_png).show();

				}else{

				jQuery(this).removeAttr('style');

				jQuery(this).nextAll('img.imf_clear').attr('src', '').hide();

			}

			if (media_type!='svg'){

				jQuery(this).next('imf_thumb.span').find('a.imf_img').attr('href',media_url).html('<img src="' + media_url + '" width="150" />');

				}else{

				jQuery(this).next('imf_thumb.span').find('a.imf_img').attr('href',media_url).html('<object data="' + media_url + '" width="150" type="image/svg+xml"></object>');

			}

			});

	}

	);

	// [end] management screen displays thumbnails

	// [start] "clear" what happens when you press the button configuration

	jQuery('img.imf_clear').live('click', function(){

		jQuery(this).next('span').find('a.imf_img').removeAttr('href');

		jQuery(this).next('span').find('img').fadeOut('slow',function(){

			jQuery(this).remove();

		}

		);

		jQuery(this).prevAll('input').val('').removeAttr('style');

		jQuery(this).hide();

	}

	);

	// [end] "clear" what happens when you press the button configuration

	// [start] Check element type of mandatory

	var required_boxs = 

	'<div id="required_bg" style="display: none;"></div>' +

	'<div id="required_box" style="display: none;">' +

	'<p id="required_msg">Input is not required under</p>' +

	'</div>';

	jQuery('.wp-admin').append(required_boxs);

	//jQuery('.postbox.required h4').css({
/*
	jQuery('.postbox.required span.img_required').css({

		'padding-left': '20px',

		'background': 'url(' + required_png + ') no-repeat left top'

		});
*/		


	// "Open" button when you press event

	jQuery('#publishing-action #original_publish, #publishing-action #publish').live('click', function(){

		var slug = jQuery('#edit-slug-box #sample-permalink').text();

		if (slug){

			var add_height = 0, check = 0;

			var total_height = getPageScroll()[1] + (getPageHeight() / 20) + 80;

			jQuery('.postbox.required').each(function(){

				jQuery(this).removeAttr('style');

				// Input multiple selection fields check box field image file text field

				jQuery(this).filter('.textfield, .imf, .multi_checkbox, .textarea').each(function(){

					if (!(jQuery(this).find('.data').val())){

						jQuery('#custom_fields_interface').css({

							'position': 'static'

							});

						jQuery(this).css({

							'position': 'absolute',

							'z-index': '9',

							'width': '580px',

							'top':	total_height,

							'left': '50%',

							'margin-left': '-290px'

							});

						jQuery(this).addClass('required_err');

						add_height = jQuery(this).height() + 30;

						total_height += add_height;

						check = 1;

					}

					});

				// Check the radio button input box

				jQuery(this).filter('.checkbox, .radio').each(function(){

					var checked_elm = 0;

					jQuery(this).find('.data').each(function(){

						if (jQuery(this).attr('checked')){

							checked_elm++;

						}

						});

					if (!(checked_elm)){

						jQuery('#custom_fields_interface').css({

							'position': 'static'

							});

						jQuery(this).css({

							'position': 'absolute',

							'z-index': '9',

							'width': '580px',

							'top':	total_height,

							'left': '50%',

							'margin-left': '-290px'

							});

						jQuery(this).addClass('required_err');

						add_height = jQuery(this).height() + 30;

						total_height += add_height;

						check = 1;

					}

					});

				// Check input selection menu

				jQuery(this).filter('.select').each(function(){

					var selected_elm = 0;

					jQuery(this).find('.data').each(function(){

						if (jQuery(this).attr('selected')){

							selected_elm++;

						}

						});

					if (!(selected_elm)){

						jQuery('#custom_fields_interface').css({

							'position': 'static'

							});

						jQuery(this).css({

							'position': 'absolute',

							'z-index': '9',

							'width': '580px',

							'top':	total_height,

							'left': '50%',

							'margin-left': '-290px'

							});

						jQuery(this).addClass('required_err');

						add_height = jQuery(this).height() + 30;

						total_height += add_height;

						check = 1;

					}

					});

			}

			);

			if (check){

				jQuery('#required_bg').css({

					'top':	'0',

					'left': '0',

					'height': jQuery('#wpwrap').height()

						}).show();

				jQuery('#required_box').css({

					'top':	getPageScroll()[1] + (getPageHeight() / 20),

					'left': '50%',

					'height': total_height - getPageScroll()[1] - 30

					}).show();

				jQuery('#adminmenu, #favorite-actions, #side-info-column, #submitdiv, #pagesubmitdiv').css({

					'position': 'static'

					});

				jQuery(this).css({

					'position': 'absolute',

					'top':	getPageScroll()[1] + (getPageHeight() / 20) + 30,

					'left': '50%',

					'margin-left': '200px',

					'z-index': '10'

					});

				return false;

				}else{

				jQuery('#adminmenu, #favorite-actions, #side-info-column, #submitdiv, #pagesubmitdiv, .postbox.required').removeAttr('style');

				return true;

			}

			} else {

			return true;

		}

		});

	// [end] Check element type required

	// [start] erase the initial value of text field focus

	jQuery('.postbox.textfield').find('input.data').each(function(){

		jQuery(this).focus(function(){

			var default_val = jQuery(this).attr('title');

			var current_val = jQuery(this).val();

			if (default_val == current_val){

				jQuery(this).val('');

			}

			});

		jQuery(this).blur(function(){

			var default_val = jQuery(this).attr('title');

			var current_val = jQuery(this).val();

			if (current_val == ''){

				jQuery(this).val(default_val);

			}

			});

	}

	);

	// [end] erase the initial value of text field focus

	});

