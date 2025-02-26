<script type="text/javascript">
	jQuery(document).ready(function () {
		
		// Settings saved via Ajax
		jQuery("#save_settings").click(function () {
			var cjs_width = jQuery('#cjs_width').val();
			var cjs_height = jQuery('#cjs_height').val();
			var cjs_effect = jQuery('.cjs_effect').val();
			var cjs_auto_play = jQuery('#cjs_auto_play').is(":checked") ? '1' : '0';
			var cjs_auto_time = jQuery('#cjs_auto_time').val();
			var cjs_speed = jQuery('#cjs_speed').val();
			var cjs_pager = jQuery('#cjs_pager').is(":checked") ? '1' : '0';
			var cjs_controls = jQuery('#cjs_controls').is(":checked") ? '1' : '0';

			//alert(cjs_height);

			var data = {
				action: 'cjs_settings',
				cjs_setting_width: cjs_width,
				cjs_setting_height: cjs_height,
				cjs_setting_effect: cjs_effect,
				cjs_setting_auto_play: cjs_auto_play,
				cjs_setting_auto_time: cjs_auto_time,
				cjs_setting_speed: cjs_speed,
				cjs_setting_pager: cjs_pager,
				cjs_setting_controls: cjs_controls
			};

			jQuery.post('<?php echo admin_url('admin-ajax.php'); ?>', data, function (result) {
				//alert(result);
				jQuery("#cjs-setting-message").fadeIn();

				setTimeout(function () {
					jQuery("#cjs-setting-message").fadeOut();
				}, 3000);
			});
		});

		// Add Image via Ajax
		jQuery("#cjs_save_images").click(function () {

			var cjs_image_url = jQuery('#cjs_image_url').val();

			var data = {
				action: 'cjs_get_add_images',
				cjs_input_method: cjs_image_url
			};

			jQuery.post('<?php echo admin_url('admin-ajax.php'); ?>', data, function (result) {
				//alert(result);
				jQuery("#cjs-save-message").fadeIn();
				setTimeout(function () {
					jQuery("#cjs-save-message").fadeOut();
				}, 3000);
				
				location.reload();
			});
		});

		// Update Values via Ajax
		jQuery(".cjs-update-image").click(function () {
			var row = jQuery(this).parents('#list_item');
			var update_id = jQuery(this).data('id-update');
			var update_link = row.find('.cjs_img_link').val();
			var update_desc = row.find('.cjs_img_description').val();
			var update_title = row.find('.cjs_img_title').val();

			var data = {
				action: 'cjs_get_update_values',
				cjs_id: update_id,
				cjs_update_link: update_link,
				cjs_update_desc: update_desc,
				cjs_update_title: update_title
			};

			jQuery.post('<?php echo admin_url('admin-ajax.php'); ?>', data, function (result) {
				jQuery("#cjs-update-message").fadeIn();

				setTimeout(function () {
					jQuery("#cjs-update-message").fadeOut();
				}, 3000);
			});
		});

		jQuery(".cjs-delete-image").click(function () {
			var delete_id = jQuery(this).attr('data-id');

			var data = {
				action: 'cjs_get_delete_values',
				cjs_id: delete_id
			};

			jQuery.post('<?php echo admin_url('admin-ajax.php'); ?>', data, function (result) {
				jQuery("#cjs-del-message").fadeIn();

				setTimeout(function () {
					jQuery("#cjs-del-message").fadeOut();
				}, 3000);
			});

			jQuery(this).parents('#list_item').remove();
		});

	});
</script>
