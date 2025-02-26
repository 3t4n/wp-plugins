<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://flothemes.com
 * @since      1.0.0
 *
 * @package    Pictimewp
 * @subpackage Pictimewp/admin/partials
 */


?>
	<h2 class="pt-settings--page-title"><?php _e('Pic-Time Settings','pictimewp') ?></h2>

	<div class="pt-settings--container">
		<div class="pt-settings--l-side">

		<?php

			if(isset($pictime_options['access_token'])) {
				$pt_gal_link = admin_url( $path = '/edit.php?post_type=flo_pictime_gallery', $scheme = 'admin' );
		?>
			<h3 class="pt-settings--block-title"> <?php _e("You're All Set!",'pictimewp') ?></h3>

			<div class="pt-settings--description">
				<?php echo sprintf(__('NOW YOU CAN CREATE NEW GALLERIES AND %s START MANAGING YOUR PROJECTS','pictimewp'),'<br/>'); ?>
			</div>

			<div class="pt-settings--container-btns">
		<?php

				echo sprintf(__('%s MANAGE PROJECTS %s','pictimewp'), '<a href="'.$pt_gal_link.'" target="_blank" class="pt-settings--btn">','</a>' );

				echo sprintf(__('%s Sync Data %s','pictimewp'), '<button class="pt-settings--btn pt-settings--resync" title="Use this button to update the PicTime Account settings.">','</button>' );

				echo '<span class="spinner pt-settings--sync-spinner"></span>';
		?>
			</div>
			<div class="pt-settings--logout">
				<div class="pt-settings--logout-l" >
					<?php _e('LOGOUT','pictimewp') ?>
				</div>
				<div class="pt-settings--logout-r" >
					<?php _e('CONNECT ANOTHER ACCOUNT','pictimewp') ?>
				</div>

				<div class="spinner pt-settings--logout-spinner"></div>
			</div>
		<?php
			}else{

		?>
			<div class="">
				<h3 class="pt-settings--block-title"> <?php echo sprintf(__('Your Pic-Time Galleries %s Seamlessly integrated','pictimewp'), '<br/>') ?></h3>
				<!-- Note: replace the link below to use a production link -->

				<div>

					<a href="https://flothemes.pic-time.com/oauth?redirectUrl=<?php echo admin_url('/admin.php?page=flo_pictime_settings') ?>&responseType=clientToken&appId=AAAAAJ8AAAB4b4VCkAlxpVQhmg,," class="pt-settings--btn">
						<?php
							_e('CONNECT PIC-TIME ACCOUNT','pictimewp');
						?>

					</a>
				</div>
			</div>
		<?php
			}
		?>
		</div>
		<div class="pt-settings--r-side">
			<a href="https://help.flothemes.com/category/423-flopictime" target="_blank" title="Check documentation" class="pt-docs-link pictime-icn_info"></a>
			<img src="<?php echo plugin_dir_url( __FILE__ ).'../img/pt.png' ?>" />
		</div>
	</div>
