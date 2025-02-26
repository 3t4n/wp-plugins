<?php
function awcwc_admin_menu() {
    add_submenu_page('options-general.php', 'Archive widget collapsed with CSS', 'Archive widget collapsed with CSS', 'manage_options', 'archive-widget-collapsed-with-css', 'awcwc_admin' );
}
add_action( 'admin_menu', 'awcwc_admin_menu' );

function awcwc_admin() {
?>

<h1 class="awcwc_admin_title">Archive widget collapsed with CSS</h1>

<div class="awcwc_admin">

	<h2><span><?php esc_html_e( 'How to use', 'archive-widget-collapsed-with-css' ); ?></span></h2>
	<p><?php esc_html_e( 'Set the widget from the widget page.', 'archive-widget-collapsed-with-css' ); ?></p>
	<br />
	<p><a class="button button-primary button-large" href="<?php echo esc_url( admin_url( 'widgets.php' )); ?>"><?php esc_html_e( 'Go to widget page', 'simple-widget-display-conditions-lite' );?></a></p>
	<br />
	<p><?php esc_html_e( 'There is "Archive widget collapsed with CSS" on the widget page.', 'archive-widget-collapsed-with-css' ); ?></p>
	<p><img src="<?php if( get_locale( ) != 'ja' ){ echo esc_url( plugins_url( 'images/widjet_awcwc.png', __FILE__ )); }else{ echo esc_url( plugins_url( 'images/widjet_awcwc_ja.png', __FILE__ )); }?>" /></p>
	<br />
	<p><?php esc_html_e( 'Set this.', 'archive-widget-collapsed-with-css' ); ?></p>
	<p><img src="<?php if( get_locale( ) != 'ja' ){ echo esc_url( plugins_url( 'images/widjet_awcwc_setting.png', __FILE__ )); }else{ echo esc_url( plugins_url( 'images/widjet_awcwc_setting_ja.png', __FILE__ )); }?>" /></p>
	<br />
	<p><?php esc_html_e( 'The four types of patterns are as follows.', 'archive-widget-collapsed-with-css' ); ?></p>
	<br />
	<p class="awcwc_bold"><?php esc_html_e( 'pattern 1', 'archive-widget-collapsed-with-css' ); ?></p>
	<p><img src="<?php echo esc_url( plugins_url( 'images/pattern-1.png', __FILE__ )); ?>" /></p>	
	<br />
	<p class="awcwc_bold"><?php esc_html_e( 'pattern 2', 'archive-widget-collapsed-with-css' ); ?></p>
	<p><img src="<?php echo esc_url( plugins_url( 'images/pattern-2.png', __FILE__ )); ?>" /></p>
	<br />
	<p class="awcwc_bold"><?php esc_html_e( 'pattern 3', 'archive-widget-collapsed-with-css' ); ?></p>
	<p><img src="<?php echo esc_url( plugins_url( 'images/pattern-3.png', __FILE__ )); ?>" /></p>
	<br />
	<p class="awcwc_bold"><?php esc_html_e( 'pattern 4', 'archive-widget-collapsed-with-css' ); ?></p>
	<p><img src="<?php echo esc_url( plugins_url( 'images/pattern-4.png', __FILE__ )); ?>" /></p>

	<h2><span><?php esc_html_e( 'Support', 'archive-widget-collapsed-with-css' ); ?></span></h2>
	<p><?php esc_html_e( 'Please comment if there are any problems or bugs that you do not know how to use.', 'archive-widget-collapsed-with-css' ); ?><br />
	<span class="ccfif_more_details_link"><a href="https://yws.tokyo/archive-widget-collapsed-with-css/#respond" target="_blank" rel="noreferrer noopener"><?php esc_html_e( 'To comment', 'archive-widget-collapsed-with-css' ) ?></a></span></p>
</div>
<?php
}
