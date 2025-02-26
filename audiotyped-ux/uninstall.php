<?php
/**
 * Runs on Uninstall of Audiotyped UX
 *
 * @package   [Audiotyped UX]
 * @author    [Helmut Naber]
 * @license   GPLv3
 * @link      [https://audiotyped.de]
 */
// Exit if uninstall is not from WordPress
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit; 
}

delete_option('audiotyped_tb_color');
delete_option('audiotyped_gb_color');
delete_option('audiotyped_hb_color');
delete_option('audiotyped_gf_color');
delete_option('audiotyped_hf_color');
delete_option('audiotyped_avatar');
delete_option('audiotyped_bubble');
delete_option('audiotyped_mf_size');
delete_option('audiotyped_df_size');
delete_option('audiotyped_shadow_blur');
delete_option('audiotyped_dgap_size');
delete_option('audiotyped_dc_size');
delete_option('audiotyped_ma_size');
delete_option('audiotyped_md_size');
delete_option('audiotyped_mbpv_size');
delete_option('audiotyped_mbph_size');
delete_option('audiotyped_dbpv_size');
delete_option('audiotyped_dbph_size');
delete_option('audiotyped_mgap_size');

?>