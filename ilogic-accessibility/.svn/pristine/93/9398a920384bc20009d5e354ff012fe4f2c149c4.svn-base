<?php
/**
 * @link              http://ilogic.co.il/
 * @since             1.9
 * @package           Ila_Accessibility
 * 
 * @wordpress-plugin
 * Plugin Name:       iLogic accessibility for wordpress
 * Plugin URI:        http://ilogic.co.il/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.2
 * Author:            Jobaerul Kaes
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ila-accessibility
 * Domain Path:       /languages
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
///////////////////////////////////////////////

// Add the necessary frontend assets //
add_action( 'wp_enqueue_scripts', 'ila_enqueued_assets' );

function ila_enqueued_assets() {
  // icon font
	wp_enqueue_style( 'ila-font', plugin_dir_url( __FILE__ ) . 'assets/font-awesome.min.css' );
  // Custom Styles
  wp_enqueue_style( 'ila-style', plugin_dir_url( __FILE__ ) . 'assets/style.css' );
  // Load cookie jquery
  wp_enqueue_script( 'ila-script-cookie', plugin_dir_url( __FILE__ ) . 'assets/jquery.cookie.js', array( 'jquery' ), '1.0', true );
  // Custom script after jquery is loaded
  wp_enqueue_script( 'ila-script-custom', plugin_dir_url( __FILE__ ) . 'assets/script.js', array( 'jquery' ), '1.0', true );
}
// Add necessary Backend assets
add_action( 'admin_enqueue_scripts', 'ila_add_color_picker' );
function ila_add_color_picker( $hook ) {
 
    if( is_admin() ) { 
     
        // Add the color picker css file       
        wp_enqueue_style( 'wp-color-picker' ); 
         
        // Include our custom jQuery file with WordPress Color Picker dependency
        wp_enqueue_script( 'color-script-handle', plugins_url( 'assets/color-script.js', __FILE__ ), array( 'wp-color-picker' ), false, true ); 
    }
}
// Add Dynamic colors to frontend
function ila_custom_colors() {
    $options = get_option( 'ila_settings' );
    $MobOnOff=$options['ila_control_mob_1'];
    $CreOnOff=$options['ila_control_crelink_1'];
    echo "<style>";
    echo 'input[type="radio"].inpt-ila:checked + label, input[type="checkbox"].inpt-ila:checked + label, .settings-btn-ila + label, .ila-right .settings-btn-ila + label, .ila-left .settings-btn-ila + label, .layout-buttons-ila, .layout-buttons-ila a {color:'. $options['ila_set_color_primary'] ." !important;}";
    echo 'input[type="radio"].inpt-ila:checked + label, input[type="checkbox"].inpt-ila:checked + label, #reset-layout-ila:focus, .layout-buttons-ila:hover {background:'. $options['ila_set_color_secondary'] ." !important;}";
    echo '.settings-btn-ila:checked ~ .buttons-wrapper-ila, .layout-buttons-ila, #settings-btn-ila:checked + label, .settings-btn-ila + label {border-color:'. $options['ila_set_color_secondary'] ." !important;}";
    if ($MobOnOff == "off") {echo '@media screen and (max-width: 768px) {#wrap-ila {display: none !important;}}';}
    if ($CreOnOff == "off") {echo '#credit-links-ila a, #credit-links-ila span {display: none !important;} #credit-links-ila a.ila-extra-close {display: block !important;}';}
    echo "</style>";

}
add_action('wp_head','ila_custom_colors');
// Add the controls // 
function ila_front_control () { ?>
<?php
////// Condition for labels text /////
$options = get_option( 'ila_settings' );
//greyscale
if (isset($options['ila_button_title_gs']) && !empty($options['ila_button_title_gs'])) 
			{$grey_text=$options['ila_button_title_gs'];}
	else if ($options['ila_lang_choice_2'] == 2) {$grey_text="מונוכרום";}
		else {$grey_text="Greyscale";}
//inverse
if (isset($options['ila_button_title_ic']) && !empty($options['ila_button_title_ic'])) 
			{$inv_text=$options['ila_button_title_ic'];}
	else if ($options['ila_lang_choice_2'] == 2) {$inv_text="ניגודיות גבוהה";}
		else {$inv_text="Color Inverse";}
//link underline
if (isset($options['ila_button_title_lu']) && !empty($options['ila_button_title_lu'])) 
			{$lun_text=$options['ila_button_title_lu'];}
	else if ($options['ila_lang_choice_2'] == 2) {$lun_text="הדגשת קישורים";}
		else {$lun_text="Link Underline";}
//magnify it
if (isset($options['ila_button_title_mi']) && !empty($options['ila_button_title_mi'])) 
			{$magi_text=$options['ila_button_title_mi'];}
	else if ($options['ila_lang_choice_2'] == 2) {$magi_text="הגדלה מיידית";}
		else {$magi_text="Magnify It";}
//black cursor
if (isset($options['ila_button_title_bc']) && !empty($options['ila_button_title_bc'])) 
			{$bcur_text=$options['ila_button_title_bc'];}
	else if ($options['ila_lang_choice_2'] == 2) {$bcur_text="סמן גדול שחור";}
		else {$bcur_text="Black Cursor";}
//White cursor
if (isset($options['ila_button_title_wc']) && !empty($options['ila_button_title_wc'])) 
			{$wcur_text=$options['ila_button_title_wc'];}
	else if ($options['ila_lang_choice_2'] == 2) {$wcur_text="סמן גדול לבן";}
		else {$wcur_text="White Cursor";}
//Headline underline
if (isset($options['ila_button_title_hu']) && !empty($options['ila_button_title_hu'])) 
			{$hun_text=$options['ila_button_title_hu'];}
	else if ($options['ila_lang_choice_2'] == 2) {$hun_text="הדגשת כותרות";}
		else {$hun_text="Title Underline";}
//image tooltip
if (isset($options['ila_button_title_it']) && !empty($options['ila_button_title_it'])) 
			{$imt_text=$options['ila_button_title_it'];}
	else if ($options['ila_lang_choice_2'] == 2) {$imt_text="תיאור לתמונות";}
		else {$imt_text="Image Tooltip";}
//font
if (isset($options['ila_button_title_fo']) && !empty($options['ila_button_title_fo'])) 
			{$font_text=$options['ila_button_title_fo'];}
	else if ($options['ila_lang_choice_2'] == 2) {$font_text="הגדלת פונט";}
		else {$font_text="Font";}
//animation block
if (isset($options['ila_button_title_ab']) && !empty($options['ila_button_title_ab'])) 
			{$anib_text=$options['ila_button_title_ab'];}
	else if ($options['ila_lang_choice_2'] == 2) {$anib_text="חסימת אנימציה";}
		else {$anib_text="Block Animation";}
//Keyboard navigation
if (isset($options['ila_button_title_kn']) && !empty($options['ila_button_title_kn'])) 
			{$knav_text=$options['ila_button_title_kn'];}
	else if ($options['ila_lang_choice_2'] == 2) {$knav_text="ניווט מקלדת";}
		else {$knav_text="Keyboard Navigation";}
//reset all
if (isset($options['ila_button_title_ra']) && !empty($options['ila_button_title_ra'])) 
			{$rall_text=$options['ila_button_title_ra'];}
	else if ($options['ila_lang_choice_2'] == 2) {$rall_text="איפוס הגדרות";}
		else {$rall_text="RESET ALL";}
//Small font button
if (isset($options['ila_button_title_fonta']) && !empty($options['ila_button_title_fonta'])) 
			{$fonta_text=$options['ila_button_title_fonta'];}
	else if ($options['ila_lang_choice_2'] == 2) {$fonta_text="א";}
		else {$fonta_text="A";}
//Medium font button
if (isset($options['ila_button_title_fontb']) && !empty($options['ila_button_title_fontb'])) 
			{$fontb_text=$options['ila_button_title_fontb'];}
	else if ($options['ila_lang_choice_2'] == 2) {$fontb_text="+א";}
		else {$fontb_text="A+";}
//Large font button
if (isset($options['ila_button_title_fontc']) && !empty($options['ila_button_title_fontc'])) 
			{$fontc_text=$options['ila_button_title_fontc'];}
	else if ($options['ila_lang_choice_2'] == 2) {$fontc_text="++א";}
		else {$fontc_text="A++";}
//keyboard navi panel first
if (isset($options['ila_button_title_knmic']) && !empty($options['ila_button_title_knmic'])) 
			{$knpf_text=$options['ila_button_title_knmic'];}
	else if ($options['ila_lang_choice_2'] == 2) {$knpf_text="תוֹכֶן";}
		else {$knpf_text="Content";}
//keyboard navi panel second
if (isset($options['ila_button_title_knmim']) && !empty($options['ila_button_title_knmim'])) 
			{$knps_text=$options['ila_button_title_knmim'];}
	else if ($options['ila_lang_choice_2'] == 2) {$knps_text="תַפרִיט";}
		else {$knps_text="Menu";}
//keyboard navi panel third
if (isset($options['ila_button_title_knmia']) && !empty($options['ila_button_title_knmia'])) 
			{$knpt_text=$options['ila_button_title_knmia'];}
	else if ($options['ila_lang_choice_2'] == 2) {$knpt_text="תפריט גישה";}
		else {$knpt_text="Access panel";}
//Credit link first
if (isset($options['ila_button_title_credita']) && !empty($options['ila_button_title_credita'])) 
			{$credita_text=$options['ila_button_title_credita'];}
	else if ($options['ila_lang_choice_2'] == 2) {$credita_text="שלח משוב";}
		else {$credita_text="Feedback";}
//Credit link second
if (isset($options['ila_button_title_creditb']) && !empty($options['ila_button_title_creditb'])) 
			{$creditb_text=$options['ila_button_title_creditb'];}
	else if ($options['ila_lang_choice_2'] == 2) {$creditb_text="הצהרת נגישות";}
		else {$creditb_text="Declaration";}
//Credit link third
if (isset($options['ila_button_title_creditc']) && !empty($options['ila_button_title_creditc'])) 
			{$creditc_text=$options['ila_button_title_creditc'];}
	else if ($options['ila_lang_choice_2'] == 2) {$creditc_text="בטל נגישות";}
		else {$creditc_text="Close";}
///////////
?>
<!-- accessibility box -->
<div id="wrap-ila" <?php 
// condition to add right or left
$ila_cpos = $options['ila_control_pos_0'];
if ($ila_cpos == 'right') { $wrap_class_a="ila-right";}
else if ($ila_cpos == 'left') { $wrap_class_a="ila-left";}
else { $wrap_class_a="ila-right";}
// condition to add rtl or ltr
$ila_ldir = $options['ila_lang_dir_0'];
if ($ila_ldir == 'rtl') { $wrap_class_b="ila-rtl";}
else if ($ila_ldir == 'ltr') { $wrap_class_b="ila-ltr";}
else { $wrap_class_b="ila-ltr";}
echo 'class="'.$wrap_class_a.' '.$wrap_class_b.'"';
//
     ?>>
<!-- the gear icon that opens the accessability box when you click on it -->
<input id="settings-btn-ila" type="checkbox" class="inpt-ila settings-btn-ila" tabindex="0">
<label for="settings-btn-ila" class="settings-box-element-ila ac-label-ila" tabindex="0"><i class="fa fa-2x fa-wheelchair"></i></label>
<!-- the white box that contains the buttons -->
<div class="buttons-wrapper-ila settings-box-element-ila"></div>
<!-- accessibility triggers -->
	<!-- Animation blocker -->
	<input id="aniblock-layout-ila" class="inpt-ila aniblock-layout-ila" type="checkbox" name="aniblock">
	<label for="aniblock-layout-ila" class="layout-buttons-ila settings-box-element-ila btn-full" tabindex="0">
		<i class="fa fa-lightbulb-o" aria-hidden="true"></i> <?php echo $anib_text;?>
	</label>
	<!-- Keyboard Navigation -->
	<input id="keyboard-layout-ila" class="inpt-ila keyboard-layout-ila" type="checkbox" name="keyboard">
	<label for="keyboard-layout-ila" class="layout-buttons-ila settings-box-element-ila btn-full" tabindex="0">
		<i class="fa fa-keyboard-o" aria-hidden="true"></i> <?php echo $knav_text;?>
	</label>
	<!-- Black and white content -->
	<input id="grey-layout-ila" class="inpt-ila grey-layout-ila" type="radio" name="color-ila">
	<label for="grey-layout-ila" class="layout-buttons-ila settings-box-element-ila btn-left" tabindex="0">
		<i class="fa fa-low-vision" aria-hidden="true"></i> <?php echo $grey_text;?>
	</label>
	<!-- Inverse color content -->
	<input id="inverse-layout-ila" class="inpt-ila inverse-layout-ila" type="radio" name="color-ila">
	<label for="inverse-layout-ila" class="layout-buttons-ila settings-box-element-ila btn-right" tabindex="0">
		<i class="fa fa-adjust" aria-hidden="true"></i> <?php echo $inv_text;?>
	</label>
	<!-- Link Underline content -->
	<input id="aunderline-layout-ila" class="inpt-ila aunderline-layout-ila" type="checkbox" name="aunderline-ila">
	<label for="aunderline-layout-ila" class="layout-buttons-ila settings-box-element-ila btn-left" tabindex="0">
		<i class="fa fa-link" aria-hidden="true"></i> <?php echo $lun_text;?>
	</label>
	<!-- MAgnify content -->
	<input id="magnify-layout-ila" class="inpt-ila magnify-layout-ila" type="checkbox" name="magnify-ila">
	<label for="magnify-layout-ila" class="layout-buttons-ila settings-box-element-ila btn-right" tabindex="0">
		<i class="fa fa-search-plus" aria-hidden="true"></i> <?php echo $magi_text;?>
	</label>
	<!-- Big Black cursor -->
	<input id="bbcur-layout-ila" class="inpt-ila bbcur-layout-ila" type="radio" name="cursor-ila">
	<label for="bbcur-layout-ila" class="layout-buttons-ila settings-box-element-ila btn-left" tabindex="0">
		<i class="fa fa-mouse-pointer" aria-hidden="true"></i> <?php echo $bcur_text;?>
	</label>
	<!-- Big White cursor -->
	<input id="bwcur-layout-ila" class="inpt-ila bwcur-layout-ila" type="radio" name="cursor-ila">
	<label for="bwcur-layout-ila" class="layout-buttons-ila settings-box-element-ila btn-right" tabindex="0">
		<i class="fa fa-arrow-circle-up" aria-hidden="true"></i> <?php echo $wcur_text;?>
	</label>
	<!-- Headline underline-->
	<input id="hunderline-layout-ila" class="inpt-ila hunderline-layout-ila" type="checkbox" name="hunderline-ila">
	<label for="hunderline-layout-ila" class="layout-buttons-ila settings-box-element-ila btn-left" tabindex="0">
		<i class="fa fa-header" aria-hidden="true"></i> <?php echo $hun_text;?>
	</label>
	<!-- Image Tooltip-->
	<input id="imagetooltip-layout-ila" class="inpt-ila imagetooltip-layout-ila" type="checkbox" name="imagetooltip">
	<label for="imagetooltip-layout-ila" class="layout-buttons-ila settings-box-element-ila btn-right" tabindex="0">
		<i class="fa fa-file-image-o" aria-hidden="true"></i> <?php echo $imt_text;?>
	</label>
	<!-- Font size control -->
	<label id="font-size-ila" class="layout-buttons-ila settings-box-element-ila btn-full">
		<?php echo $font_text;?>: <a class="fsmall-ila" tabindex="0"><?php echo $fonta_text;?></a> <a class="fmedium-ila" tabindex="0"><?php echo $fontb_text;?></a> <a class="flarge-ila" tabindex="0"><?php echo $fontc_text;?></a> <a class="freset-ila" tabindex="0"><i class="fa fa-refresh" aria-hidden="true"></i></a>
	</label>
	<!-- Reset Button -->
	<label id="reset-layout-ila" class="layout-buttons-ila settings-box-element-ila btn-full" tabindex="0">
		<?php echo $rall_text;?>
	</label>
	<!-- Credit Links -->
	<label id="credit-links-ila" class="layout-buttons-ila settings-box-element-ila btn-full">
		<a tabindex="0" href="http://ilogic.co.il/contact-us/" target="_blank"><?php echo $credita_text;?></a> <span>|</span> <a tabindex="0" href="http://ilogic.co.il/ila-declaration/" target="_blank"><?php echo $creditb_text;?></a> <span>|</span> <a tabindex="0" class="ila-extra-close"><?php echo $creditc_text;?></a>
	</label>
	<!-- copyright Link -->
	<label id="copyright-link-ila" class="layout-buttons-ila settings-box-element-ila btn-full">
		<a tabindex="0" href="http://ilogic.co.il/" target="_blank">Developed by i-logic</a>
	</label>
<!-- // accessibility triggers -->
<p class="tooltip-ila" style="display: none;"></p>
<!-- keyboard menu control -->
	<div id="keynav-menu-ila">
			<a class="kccont-ila" tabindex="0"><?php echo $knpf_text;?></a> | <a class="kcmenu-ila" tabindex="0"><?php echo $knps_text;?></a> | <a class="kcpanel-ila" tabindex="0"><?php echo $knpt_text;?></a>
	</div>
</div>
<!-- // accessibility box -->
<?php                                
    }
add_action('wp_footer', 'ila_front_control');
///////////////////////////////////////////////
// Add the options page
add_action( 'admin_menu', 'ila_add_admin_menu' );
add_action( 'admin_init', 'ila_settings_init' );


function ila_add_admin_menu(  ) { 

	add_menu_page( 'iLogic accessibility', 'Accessibility', 'manage_options', 'ilogic_accessibility_', 'ila_options_page' );

}


function ila_settings_init(  ) { 

	register_setting( 'pluginPage', 'ila_settings' );

	add_settings_section(
		'ila_pluginPage_section', 
		__( 'Language and control position', 'ila' ), 
		'ila_settings_section_callback', 
		'pluginPage'
	);

	add_settings_field( 
		'ila_control_pos_0', 
		__( 'Controls position', 'ila' ), 
		'ila_control_pos_0_render', 
		'pluginPage', 
		'ila_pluginPage_section' 
	);

	add_settings_field( 
		'ila_control_mob_1', 
		__( 'Accebility on mobile devices', 'ila' ), 
		'ila_control_mob_1_render', 
		'pluginPage', 
		'ila_pluginPage_section' 
	);

	add_settings_field( 
		'ila_lang_choice_2', 
		__( 'Select language', 'ila' ), 
		'ila_lang_choice_2_render', 
		'pluginPage', 
		'ila_pluginPage_section' 
	);

	add_settings_field( 
		'ila_lang_dir_2', 
		__( 'Language Direction', 'ila' ), 
		'ila_lang_dir_2_render', 
		'pluginPage', 
		'ila_pluginPage_section' 
	);

	add_settings_field( 
		'ila_button_title_2', 
		__( 'Button Titles', 'ila' ), 
		'ila_button_title_2_render', 
		'pluginPage', 
		'ila_pluginPage_section' 
	);

}


function ila_control_pos_0_render(  ) { 

	$options = get_option( 'ila_settings' );
	?>
	<input type='radio' name='ila_settings[ila_control_pos_0]' <?php checked('right', $options['ila_control_pos_0']); ?> value='right'> Right &nbsp;&nbsp;
	<input type='radio' name='ila_settings[ila_control_pos_0]' <?php checked('left', $options['ila_control_pos_0']); ?> value='left'> Left
	<?php

}

function ila_control_mob_1_render(  ) { 

	$options = get_option( 'ila_settings' );
	?>
	<input type='radio' name='ila_settings[ila_control_mob_1]' <?php checked('on', $options['ila_control_mob_1']); ?> value='on'> On &nbsp;&nbsp;
	<input type='radio' name='ila_settings[ila_control_mob_1]' <?php checked('off', $options['ila_control_mob_1']); ?> value='off'> Off
	<?php

}

function ila_lang_choice_2_render(  ) { 

	$options = get_option( 'ila_settings' );
	?>
	<select name='ila_settings[ila_lang_choice_2]'>
		<option value='1' <?php selected( $options['ila_lang_choice_2'], 1 ); ?>>English</option>
		<option value='2' <?php selected( $options['ila_lang_choice_2'], 2 ); ?>>Hebrew</option>
		<option value='3' <?php selected( $options['ila_lang_choice_2'], 3 ); ?>>Other/Custom</option>
	</select>

<?php

}

function ila_lang_dir_2_render(  ) { 

	$options = get_option( 'ila_settings' );
	?>
	<input type='radio' name='ila_settings[ila_lang_dir_0]' <?php checked('rtl', $options['ila_lang_dir_0']); ?> value='rtl'> RTL &nbsp;&nbsp;
	<input type='radio' name='ila_settings[ila_lang_dir_0]' <?php checked('ltr', $options['ila_lang_dir_0']); ?> value='ltr'> LTR

<?php

}

function ila_button_title_2_render(  ) { 

	$options = get_option( 'ila_settings' );
	?>
	<br> Greyscale: <br>
	<input type='text' name='ila_settings[ila_button_title_gs]' value='<?php echo $options['ila_button_title_gs']; ?>'>
	<br> Inverse color: <br>
	<input type='text' name='ila_settings[ila_button_title_ic]' value='<?php echo $options['ila_button_title_ic']; ?>'>
	<br> Link underline: <br>
	<input type='text' name='ila_settings[ila_button_title_lu]' value='<?php echo $options['ila_button_title_lu']; ?>'>
	<br> Magnify: <br>
	<input type='text' name='ila_settings[ila_button_title_mi]' value='<?php echo $options['ila_button_title_mi']; ?>'>
	<br> Black cursor: <br>
	<input type='text' name='ila_settings[ila_button_title_bc]' value='<?php echo $options['ila_button_title_bc']; ?>'>
	<br> White cursor: <br>
	<input type='text' name='ila_settings[ila_button_title_wc]' value='<?php echo $options['ila_button_title_wc']; ?>'>
	<br> Headline underline: <br>
	<input type='text' name='ila_settings[ila_button_title_hu]' value='<?php echo $options['ila_button_title_hu']; ?>'>
	<br> Image tooltip: <br>
	<input type='text' name='ila_settings[ila_button_title_it]' value='<?php echo $options['ila_button_title_it']; ?>'>
	<br> Font: <br>
	<input type='text' name='ila_settings[ila_button_title_fo]' value='<?php echo $options['ila_button_title_fo']; ?>'>
	<br> Animation block: <br>
	<input type='text' name='ila_settings[ila_button_title_ab]' value='<?php echo $options['ila_button_title_ab']; ?>'>
	<br> Keyboard navigation: <br>
	<input type='text' name='ila_settings[ila_button_title_kn]' value='<?php echo $options['ila_button_title_kn']; ?>'>
	<br> Reset all: <br>
	<input type='text' name='ila_settings[ila_button_title_ra]' value='<?php echo $options['ila_button_title_ra']; ?>'>
	<hr>
	<br> Small font link: <br>
	<input type='text' name='ila_settings[ila_button_title_fonta]' value='<?php echo $options['ila_button_title_fonta'];?>'>
	<br> Medium font link: <br>
	<input type='text' name='ila_settings[ila_button_title_fontb]' value='<?php echo $options['ila_button_title_fontb'];?>'>
	<br> Large font link: <br>
	<input type='text' name='ila_settings[ila_button_title_fontc]' value='<?php echo $options['ila_button_title_fontc'];?>'>
	<hr>
	<br> Keyboard navigation panel item 'content': <br>
	<input type='text' name='ila_settings[ila_button_title_knmic]' value='<?php echo $options['ila_button_title_knmic'];?>'>
	<br> Keyboard navigation panel item 'menu': <br>
	<input type='text' name='ila_settings[ila_button_title_knmim]' value='<?php echo $options['ila_button_title_knmim'];?>'>
	<br> Keyboard navigation panel item 'Access buttons': <br>
	<input type='text' name='ila_settings[ila_button_title_knmia]' value='<?php echo $options['ila_button_title_knmia'];?>'>
	<hr>
	<br>Credit Links: 
	<input type='radio' name='ila_settings[ila_control_crelink_1]' <?php checked('on', $options['ila_control_crelink_1']); ?> value='on'> Show &nbsp;&nbsp;
	<input type='radio' name='ila_settings[ila_control_crelink_1]' <?php checked('off', $options['ila_control_crelink_1']); ?> value='off'> Hide <br>
	<br> Feedback link title: <br>
	<input type='text' name='ila_settings[ila_button_title_credita]' value='<?php echo $options['ila_button_title_credita'];?>'>
	<br> Declaration link title: <br>
	<input type='text' name='ila_settings[ila_button_title_creditb]' value='<?php echo $options['ila_button_title_creditb'];?>'>
	<br> Close link title: <br>
	<input type='text' name='ila_settings[ila_button_title_creditc]' value='<?php echo $options['ila_button_title_creditc'];?>'>
	<hr> Control Box colors
	<br> Text Color: <br>
	<input type="text" name="ila_settings[ila_set_color_primary]" value="<?php echo $options['ila_set_color_primary'];?>" class="color-field" >
	<br> Highlight Color: <br>
	<input type="text" name="ila_settings[ila_set_color_secondary]" value="<?php echo $options['ila_set_color_secondary'];?>" class="color-field" >
<?php

}

function ila_settings_section_callback(  ) { 

	echo __( 'Please choose the options for best accessibility of your site', 'ila' );

}


function ila_options_page(  ) { 

	?>
	<form action='options.php' method='post'>

		<h1>iLogic accessibility settings</h1>

		<?php
		settings_fields( 'pluginPage' );
		do_settings_sections( 'pluginPage' );
		submit_button();
		?>

	</form>
	<?php

}
///////////////////////