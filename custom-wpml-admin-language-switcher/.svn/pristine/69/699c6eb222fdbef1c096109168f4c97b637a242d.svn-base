<div id="wp-admin-bar-custom-wpml-menu-content">
<!-- <select name="" id="custom-wpml-menu"></select> -->
	<div id="custom-wpml-menu-select">

		<div id="custom-wpml-menu-select-active">

		</div>

		<div id="custom-wpml-menu-select-dropdown">
			<ul><ul>
		</div>
	</div>
</div>

<script>
jQuery(document).ready(function($){
		var icl_ = jQuery('#icl-als-actions');
		var icl_active = icl_.find('#icl-als-first');
		var icl_other = icl_.find('#icl-als-inside');

		var active_lang_text = icl_active.text();
		var active_lang_flag = icl_active.find('img').attr('src');

		jQuery('#custom-wpml-menu-select-active').append('<img src="' + active_lang_flag + '" />' + active_lang_text);

		jQuery.each( icl_other.find('.icl-als-action'), function() {

			var other_lang_link = jQuery(this).find('a').attr('href');
			var other_lang_text = jQuery(this).text();
			var other_lang_flag = jQuery(this).find('img').attr('src');

			jQuery('#custom-wpml-menu-select-dropdown > ul').append('<li>'
						+ '<a href="' + other_lang_link + '">'
						+ '<div class="custom-wpml-flag"><img src="' + other_lang_flag + '" /></div>'
						+ '<div class="custom-wpml-label">' + other_lang_text + '</div>'
						+ '</a>'
						+ '</li>');
		});

		jQuery('#icl-als-wrap').remove();
	});
</script>