<?php
$classes = [];
$position = get_option( 'simsm_panel_position', 'left');
$shadow = get_option( 'simsm_panel_shadow');
$auto_close = get_option( 'simsm_panel_close_on_outside_click');
$hide_desktop = get_option( 'simsm_hide_desktop' );
$hide_tablet = get_option( 'simsm_hide_tablet' );
$hide_mobile = get_option( 'simsm_hide_mobile' );

if($shadow){
    $classes[] = 'shadow';
}
if($auto_close){
    $classes[] = 'auto_close';
}
if($hide_desktop){
    $classes[] = 'simsm-hide-desktop';
}
if($hide_tablet){
    $classes[] = 'simsm-hide-tablet';
}
if($hide_mobile){
    $classes[] = 'simsm-hide-mobile';
}
$panel_class = '';
if( ! empty($classes)){
    $panel_class = implode(' ',$classes );
}
?>
<div id="simple-slideout-menu-panel" class="simple-slideout-menu-panel <?php echo esc_html( $position ); ?> <?php echo esc_html( $panel_class ); ?>">
    <a href="#" class="simple-slideout-menu-close" data-trigger="simple-slideout"><span class="dashicons dashicons-menu"></span></a>
    <?php 
    do_action('before_simple_slideout_menu');
    wp_nav_menu([
        'theme_location' => 'slideout_menu',
        'container'      => false, 
        'depth'          => 3,
        'menu_class'     => 'slideout-menu',
        'walker'         => new Simsm_Menu_Walker()

    ]); 
    do_action('after_simple_slideout_menu');
    ?>
</div>