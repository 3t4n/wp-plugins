(function($) {
	
var quick_post_fields = [
'<div id="linkadvanceddiv" class="postbox ">',
'<div class="handlediv" title="Click to toggle"><br></div><h3 class="hndle"><span>Quick Post Content</span></h3>',
'<div class="inside" style="display: block;">',
'<table cellspacing="2" cellpadding="5" class="form-table" style="width: 100%;">',
'	<tbody><tr class="form-field">',
'		<th valign="top" scope="row"><label>Title</label></th>',
'		<td><input type="text" name="title[]" class="code" size="50" value="" style="width: 95%;"></td>',
'	</tr>',
'	<tr class="form-field">',
'		<th valign="top" scope="row"><label>Content</label></th>',
'		<td><textarea name="content[]" cols="50" rows="5" style="width: 95%;"></textarea></td>',
'	</tr>',
'<tr class="form-field">',
'	<th valign="top" scope="row"><label>Tags <small>(comma separated)</small></label></th>',
'	<td><input type="text" style="width: 95%;" value="" size="50" class="code" name="tags[]"></td>',
'</tr>',
'	<tr>',
'		<td align="right" colspan="2">',
'			<div style="margin-right: 24px;">',
'				<input type="button" value="+ Add More" accesskey="p" tabindex="4" class="button-primary add_more">',
'				<input type="button" value="- Remove This" accesskey="p" tabindex="4" class="button-primary remove_this">',
'			</div>',
'		</td>',
'	</tr>',
'</tbody></table>',
'</div>',
'</div>'
];
	
	$(function() {
		
		$('.handlediv').live('click', function() {
			$(this).parent().find('.inside').slideToggle('fast');
		});
		
		$('input.add_more').live('click', function() {
			$(quick_post_fields.join('')).appendTo( $('#normal-sortables') );
		});
		
		$('input.remove_this').live('click', function() {
				$(this).parents('.postbox').remove();
		});
		$(document).ready(function() {
			pageopts = $('#page-options').remove();
			postopts = $('#post-options').remove();
			if ($('#post_type').val() == 'post') {
				$('.general-options').after(postopts);
			} else if ($('#post_type').val() == 'page') {
				$('.general-options').after(pageopts);
			}
			
		});
		$('#post_type').change( function() {
			if ($(this).val() == 'post') {
				$('#page-options').remove();
				$('.general-options').after(postopts);
			} else if ($(this).val() == 'page') {
				$('#post-options').remove();
				$('.general-options').after(pageopts);
			}
		});
		
	});

})(jQuery);