<?php
/**
 * Admin View: Header
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
	
<h1><?php echo sprintf( esc_html__( 'Welcome to %s&nbsp;%s', 'acb' ), $data['Name'], $data['Version'] ); ?></h1>
	
<p class="about-text"><?php esc_html_e( 'Thank you for installing ACB. This plugin will help you display your WordPress content beautifully in AJAX grid. With automatic support for infinite load, ajax filtering, sorting, custom post types and category (taxonomy) filtering. ACB also includes a built-in views and likes system.', 'acb' ); ?></p>

<nav class="nav-tab-wrapper wp-clearfix" aria-label="Secondary menu">
	<?php foreach( $tabs as $tab => $name ) { ?>
	<a href="<?php echo esc_url( admin_url( 'admin.php?page=acb-' . $tab ) ); ?>" class="nav-tab <?php if ( $tab === str_replace( 'acb-', '', $page ) ) echo 'nav-tab-active'; ?>"><?php echo $name; ?></a>
	<?php } ?>
</nav>