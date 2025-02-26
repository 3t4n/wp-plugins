<?php
if ( ! defined('ABSPATH')) {
    exit;
} // Exit if accessed directly
?>

<div class="wrap">
	<h1><?php echo esc_html(get_admin_page_title()); ?></h1>

	<form method="post" action="#">
        <?php wp_nonce_field('update-gifty-options'); ?>

		<table class="form-table">
			<tbody>
			<tr>
				<th scope="row">
					<label for="module_code"><?php _e('Integration code', 'gifty') ?>:</label>
				</th>
				<td>
					<input name="module_code" id="module_code" type="text"
						   value="<?php echo sanitize_key($module_code); ?>" class="regular-text">
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label><?php _e('Show order module icon', 'gifty'); ?>:</label>
				</th>
				<td>
					<label>
						<input type="radio" name="module_icon_visibility" value="1"
                            <?php checked(1, sanitize_key($module_icon_visibility)); ?>>
                        <?php _e('Yes', 'gifty'); ?>
					</label>

					<label>
						<input type="radio" name="module_icon_visibility" value="0"
                            <?php checked(0, sanitize_key($module_icon_visibility)); ?>>
                        <?php _e('No', 'gifty'); ?>
					</label>

					<p class="description"><?php _e('The order module can be opened on every page of your website by click on the icon.',
                            'gifty'); ?></p>
				</td>
			</tr>
			</tbody>
		</table>

		<div id="submit" class="submit">
			<input type="submit" name="submit_settings" class="button button-primary"
				   value="<?php _e('Save settings', 'gifty'); ?>">
		</div>
	</form>
</div>