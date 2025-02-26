<?php
if( ! is_admin() ) {
	return;
}

function astro_sb_tabs_nav($panel) {

	// active tab class
	$active_class = 'nav-tab-active';

	echo '<nav class="nav-tab-wrapper">';

	$setting_tab_url = esc_url('?page='.ASTRO_SB_TEXTDOMAIN.'&tab=settings');
	echo '<a href="' . esc_url($setting_tab_url) . '" class="nav-tab ';
	if ($panel == 'settings') { echo esc_attr($active_class); }
	echo '">' . esc_html__('Settings', 'astro-sticky-buttons' ) . '</a>';

	$layout_tab_url = esc_url('?page='.ASTRO_SB_TEXTDOMAIN.'&tab=layout');
	echo '<a href="' . esc_url($layout_tab_url) . '" class="nav-tab ';
	if ($panel == 'layout') { echo esc_attr($active_class); }
	echo '">' . esc_html__('Layout', 'astro-sticky-buttons' ) . '</a>';

	$support_tab_url = esc_url('?page='.ASTRO_SB_TEXTDOMAIN.'&tab=support');
	echo '<a href="' . esc_url($support_tab_url) . '" class="nav-tab ';
	if ($panel == 'support') { echo esc_attr($active_class); }
	echo '">' . esc_html__('Support', 'astro-sticky-buttons' ) . '</a>';

	echo '</nav>';

}