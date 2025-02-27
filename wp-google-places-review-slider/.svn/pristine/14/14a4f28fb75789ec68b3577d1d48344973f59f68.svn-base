<?php
$urltrimmedtab = remove_query_arg( array('page', '_wpnonce', 'taction', 'tid', 'sortby', 'sortdir', 'opt', 'settings-updated' ) );

$urlsettings = esc_url( add_query_arg( 'page', 'wp_fb-settings',$urltrimmedtab ) );
$urlgooglesettings = esc_url( add_query_arg( 'page', 'wp_fb-googlesettings',$urltrimmedtab ) );
$urlreviewlist = esc_url( add_query_arg( 'page', 'wp_fb-reviews',$urltrimmedtab ) );
$urltemplateposts = esc_url( add_query_arg( 'page', 'wp_fb-templates_posts',$urltrimmedtab ) );
$urlgetpro = esc_url( add_query_arg( 'page', 'wp_fb-get_pro',$urltrimmedtab ) );
?>	
	<h2 class="nav-tab-wrapper">
	<a href="<?php echo $urlgooglesettings; ?>" class="nav-tab <?php if($_GET['page']=='wp_fb-googlesettings'){echo 'nav-tab-active';} ?>"><?php _e('Get Google Reviews', 'wp-google-reviews'); ?></a>
	<a href="<?php echo $urlreviewlist; ?>" class="nav-tab <?php if($_GET['page']=='wp_fb-reviews'){echo 'nav-tab-active';} ?>"><?php _e('Reviews List', 'wp-google-reviews'); ?></a>
	<a href="<?php echo $urltemplateposts; ?>" class="nav-tab <?php if($_GET['page']=='wp_fb-templates_posts'){echo 'nav-tab-active';} ?>"><?php _e('Templates', 'wp-google-reviews'); ?></a>
	<a href="<?php echo $urlgetpro; ?>" class="nav-tab <?php if($_GET['page']=='wp_fb-get_pro'){echo 'nav-tab-active';} ?>"><?php _e('Get Pro Version', 'wp-google-reviews'); ?></a>
	</h2>