<?php
/* Options Page */

// --------------------------------------------------------------------------------------
// CALLBACK FUNCTION FOR: register_uninstall_hook(__FILE__, 'ageverify_delete_plugin_options')
// --------------------------------------------------------------------------------------

// Delete options table entries ONLY when plugin deactivated AND deleted
function ageverify_delete_plugin_options() {
	delete_option('ageverify_settings');
}

// ------------------------------------------------------------------------------
// CALLBACK FUNCTION FOR: register_activation_hook(__FILE__, 'ageverify_add_defaults')
// ------------------------------------------------------------------------------

// Define default option settings
function ageverify_get_options_with_defaults() {
	$defaults = array(
		'ageverify_on'               => 0,
		'ageverify_background'       => '',
		'ageverify_logoselect'       => '',
		'ageverify_logoheight'       => '50',
		'ageverify_template'         => 'opaque',
		'ageverify_underageredirect' => 'https://ageverify.com',
		'ageverify_prompttext'       => __( 'Welcome! Please verify<br />your age to enter.<br /><br />Are you 21 years or older?', 'ageverify' ),
		'ageverify_fontsize'         => '24',
		'ageverify_entertext'        => __( 'Yes', 'ageverify' ),
		'ageverify_exittext'         => __( 'No', 'ageverify' ),
		'ageverify_bfontsize'        => '22',
		'ageverify_yytext'           => 'YYYY',
		'ageverify_mmtext'           => 'MM',
		'ageverify_ddtext'           => 'DD',
		'ageverify_remembertext'     => __( 'Remember Me', 'ageverify' ),
		'ageverify_colorp'           => '007000',
		'ageverify_colors'           => 'ffffff',
		'ageverify_age'              => '21',
		'ageverify_method'           => 'avp',
		'ageverify_countup'          => 0,
		'ageverify_altbackground'    => 'none',
		'ageverify_altlogo'          => 'none'
	);

	$options = get_option('ageverify_settings');

	return wp_parse_args( $options, $defaults );
}

function ageverify_add_defaults() {
	$tmp = get_option( 'ageverify_settings' );
    if ( ! is_array( $tmp ) ) {
		$arr = ageverify_get_options_with_defaults();
		update_option( 'ageverify_settings', $arr );
	}
}

// ------------------------------------------------------------------------------
// CALLBACK FUNCTION FOR: add_action('admin_init', 'ageverify_init' )
// ------------------------------------------------------------------------------
// THIS FUNCTION RUNS WHEN THE 'admin_init' HOOK FIRES, AND REGISTERS YOUR PLUGIN
// SETTING WITH THE WORDPRESS SETTINGS API. YOU WON'T BE ABLE TO USE THE SETTINGS
// API UNTIL YOU DO.
// ------------------------------------------------------------------------------

// Init plugin options to white-list our options.
function ageverify_init(){
	register_setting( 'ageverify_plugin_options', 'ageverify_settings', 'ageverify_validate_options' );
}

// ------------------------------------------------------------------------------
// CALLBACK FUNCTION FOR: add_action('admin_menu', 'ageverify_add_options_page');
// ------------------------------------------------------------------------------

// Add menu page
function ageverify_add_options_page() {
	add_menu_page(
		'AgeVerify',
		'AgeVerify',
		'manage_options',
		'age-verify-options',
		'ageverify_render_options_page',
		plugin_dir_url( __FILE__ ) . '/includes/AVicon20.png',
		85.420
	);
}


// ------------------------------------------------------------------------------
// CALLBACK FUNCTION SPECIFIED IN: add_options_page()
// ------------------------------------------------------------------------------
add_action( 'admin_init', 'ageverify_settings_init' );

function ageverify_settings_init(  ) {

	register_setting( 'pluginPage', 'ageverify_settings' );
    register_setting( 'customize', 'ageverify_settings' );
	register_setting( 'moreFromImbibeDigital', 'ageverify_settings' );

	add_settings_section(
		'ageverify_pluginPage_section',
		'',
		'ageverify_settings_section_callback',
		'pluginPage'
	);

	add_settings_field(
		'ageverify_on',
		__( 'Enable or Disable AgeVerify', 'ageverify' ),
		'ageverify_on_render',
		'pluginPage',
		'ageverify_pluginPage_section'
	);

	add_settings_field(
		'ageverify_background',
		'',
		'ageverify_background_render',
		'pluginPage',
		'ageverify_pluginPage_section'
	);

	add_settings_field(
		'ageverify_template',
		'',
		'ageverify_template_render',
		'pluginPage',
		'ageverify_pluginPage_section'
	);

    add_settings_field(
		'ageverify_prompttext',
		__( 'Age Verification Prompt Text', 'ageverify' ),
		'ageverify_prompttext_render',
		'pluginPage',
		'ageverify_pluginPage_section'
	);

	add_settings_field(
		'ageverify_fontsize',
		__( 'Prompt Text Font Size', 'ageverify' ),
		'ageverify_fontsize_render',
		'pluginPage',
		'ageverify_pluginPage_section'
	);

    add_settings_field(
		'ageverify_method',
		__( 'Select Age Verification Method', 'ageverify' ),
		'ageverify_method_render',
		'pluginPage',
		'ageverify_pluginPage_section'
	);

    add_settings_field(
		'ageverify_entertext',
		__( 'Enter Button Text', 'ageverify' ),
		'ageverify_entertext_render',
		'pluginPage',
		'ageverify_pluginPage_section'
	);

    add_settings_field(
		'ageverify_exittext',
		__( 'Exit Button Text', 'ageverify' ),
		'ageverify_exittext_render',
		'pluginPage',
		'ageverify_pluginPage_section'
	);

	add_settings_field(
		'ageverify_bfontsize',
		__( 'Button Text Font Size', 'ageverify' ),
		'ageverify_bfontsize_render',
		'pluginPage',
		'ageverify_pluginPage_section'
	);

	add_settings_field(
		'ageverify_yytext',
		__( 'Birth Year Input Placeholder Text', 'ageverify' ),
		'ageverify_yytext_render',
		'pluginPage',
		'ageverify_pluginPage_section'
	);

	add_settings_field(
		'ageverify_mmtext',
		__( 'Birth Month Input Placeholder Text', 'ageverify' ),
		'ageverify_mmtext_render',
		'pluginPage',
		'ageverify_pluginPage_section'
	);

	add_settings_field(
		'ageverify_ddtext',
		__( 'Birth Day Input Placeholder Text', 'ageverify' ),
		'ageverify_ddtext_render',
		'pluginPage',
		'ageverify_pluginPage_section'
	);

	add_settings_field(
		'ageverify_age',
		__( 'Minimum Age for Entry', 'ageverify' ),
		'ageverify_age_render',
		'pluginPage',
		'ageverify_pluginPage_section'
	);

    add_settings_field(
		'ageverify_remembertext',
		__( 'Remember Me Text', 'ageverify' ),
		'ageverify_remembertext_render',
		'pluginPage',
		'ageverify_pluginPage_section'
	);

    // customize tab
	add_settings_section(
		'ageverify_customize_section',
		'',
		'ageverify_customize_section_callback',
		'customize'
	);

	// More from Imbibe Digital tab
	add_settings_section(
		'ageverify_moreFromImbibeDigital_section',
		'',
		'ageverify_moreFromImbibeDigital_section_callback',
		'moreFromImbibeDigital'
	);

}

function ageverify_on_render() {

	$options = ageverify_get_options_with_defaults();
	?>
	<input 	type='checkbox'
			id='on'
			name='ageverify_settings[ageverify_on]'
			<?php checked( $options['ageverify_on'], 1 ); ?>
			value='1'
	>
	<label for='on' id='toggle-on'><?php _e( 'On', 'ageverify' ); ?></label>
	<hr style="margin-bottom:30px;">
	<?php

}

function ageverify_background_render() {
	?>
	<span style='font-size:18px;'><?php esc_html_e('Background Image', 'ageverify' ); ?> </span><?php esc_html_e( '(select a template)', 'ageverify' ); ?><br /><br />
	<a href="#" onClick="showTemplates();" id="img-remove" style="background-color:#82c240;"><?php esc_html_e('Template Background', 'ageverify' ); ?></a>&nbsp;&nbsp;
	<a href="https://ageverify.com/wordpress-upgrade/" target="_blank" style="background-color:#000;padding:10px;color:#fff;border-radius:3px;box-shadow:#777 2px 2px 4px;"><?php esc_html_e('Upload Your Own (Pro Only)', 'ageverify' ); ?></a><br /><br />
	<?php

}


function ageverify_template_render(  ) {

	$options = ageverify_get_options_with_defaults();
	require_once( plugin_dir_path( __FILE__ ) . 'includes/templates.php' ); ?>
	<div id="ageverify-gallery">
				<div id="galleryButtons">
					<br /><span style='font-size:17px !important'><?php esc_html_e( 'Sort Templates By: ', 'ageverify' ); ?></span><br />
					<a onClick="allGallery();" class="galleryButtons" id="btnAll"><?php esc_html_e( 'Display All', 'ageverify' ); ?></a>
					<a onClick="hideGallery();" class="galleryButtons" id="btnHide"><?php esc_html_e( 'Hide All', 'ageverify' ); ?></a>
					<a onClick="adultGallery();" class="galleryButtons" id="btnAdult"><?php esc_html_e( 'Adult', 'ageverify' ); ?></a>
					<a onClick="alcoholGallery();" class="galleryButtons" id="btnAlcohol"><?php esc_html_e( 'Alcohol', 'ageverify' ); ?></a>
					<a onClick="cannabisGallery();" class="galleryButtons" id="btnCannabis"><?php esc_html_e( 'Cannabis', 'ageverify' ); ?></a>
					<a onClick="gamingGallery();" class="galleryButtons" id="btnGaming"><?php esc_html_e( 'Gaming', 'ageverify' ); ?></a>
					<a onClick="tobaccoGallery();" class="galleryButtons" id="btnTobacco"><?php esc_html_e( 'Tobacco', 'ageverify' ); ?></a>
					<a onClick="videoGallery();" class="galleryButtons" id="btnVideo"><?php esc_html_e( 'Video Backgrounds', 'ageverify' ); ?></a>
				</div>
		<?php foreach( $templates as $template ) { ?>
			<div class="galleryItem <?php echo $template['tags']; ?>">
				<input 	type='radio'
						name='ageverify_settings[ageverify_template]'
						value='<?php echo $template['name']; ?>'
						id='<?php echo $template['name']; ?>'
						<?php checked( $options['ageverify_template'], $template['name'], true) ; ?>
				>
				<label for='<?php echo $template['name']; ?>'>
					<img src='<?php echo plugins_url() . '/ageverify/includes/' . $template['image']; ?>' alt='<?php echo $template['title']; ?>'>

                    <div class="TemplateTitle"><?php echo $template['title']; ?>
                    </div>
				</label>
			</div>
		<?php }	?>

		<hr style='margin-top:20px;margin-bottom:30px;'>
	</div>

<?php }

function ageverify_method_render(  ) {

	$options = ageverify_get_options_with_defaults();
	$methods = array(
		array(
			"name" => __( 'Button Prompt<br />(over age / under age)', 'ageverify' ),
			"code" => "ABP"
			),
		array(
			"name" => __( 'Date of Birth Input<br />(month / day / year)', 'ageverify' ),
			"code" => "MDY",
			),
            array(
			"name" => __( 'Date of Birth Input<br />(day / month / year)', 'ageverify' ),
			"code" => "DMY",
			)
		);
	foreach( $methods as $method ) { ?>
		<input 	type='radio'
				name='ageverify_settings[ageverify_method]'
				value='<?php echo $method['code']; ?>'
				id='<?php echo $method['code']; ?>'
				onclick='methodSelect();'
				<?php checked( $options['ageverify_method'], $method['code'], true) ; ?>
		>
		<label style="text-align:center;border-radius:4px;" for='<?php echo $method['code']; ?>' id='<?php echo $method['code'] . 'label'; ?>'>
			<?php echo $method['name']; ?>
		</label>

<script language='javascript'>
	
	function methodSelect(){
	var MDYmethod = document.getElementById('MDY');
	var DMYmethod = document.getElementById('DMY');
	var ABPmethod = document.getElementById('ABP');
	document.getElementById('entertext').parentElement.parentElement.style.float='left';
	document.getElementById('entertext').parentElement.parentElement.style.width='220px';
	
	if (MDYmethod.checked !== true && DMYmethod.checked !== true && ABPmethod.checked !== true) {
	ABPmethod.checked === true;
	document.getElementById('ABPlabel').style.backgroundColor = '#82c240';
    document.getElementById('yytext').parentElement.parentElement.style.display='none';
    document.getElementById('mmtext').parentElement.parentElement.style.display='none';
    document.getElementById('ddtext').parentElement.parentElement.style.display='none';
	document.getElementById('age').parentElement.parentElement.style.display='none';
	}
	
	if (MDYmethod.checked === true || DMYmethod.checked === true) {
	document.getElementById('age').parentElement.parentElement.style.display='block';
    document.getElementById('yytext').parentElement.parentElement.style.display='block';
    document.getElementById('mmtext').parentElement.parentElement.style.display='block';
    document.getElementById('ddtext').parentElement.parentElement.style.display='block';
	document.getElementById('entertext').parentElement.parentElement.style.display='none';
	document.getElementById('exittext').parentElement.parentElement.style.display='none';
	document.getElementById('ABPlabel').style.backgroundColor = '#666';
	document.getElementById('bfontsize').parentElement.parentElement.style.display='none';
	}
	if (ABPmethod.checked === true) {
	document.getElementById('age').parentElement.parentElement.style.display='none';
	document.getElementById('entertext').parentElement.parentElement.style.display='block';
    document.getElementById('exittext').parentElement.parentElement.style.display='block';
    document.getElementById('yytext').parentElement.parentElement.style.display='none';
    document.getElementById('mmtext').parentElement.parentElement.style.display='none';
    document.getElementById('ddtext').parentElement.parentElement.style.display='none';
	document.getElementById('ABPlabel').style.backgroundColor = '#82c240';
	document.getElementById('bfontsize').parentElement.parentElement.style.display='block';
    }
	}
	
	window.onload = methodSelect;
</script>


	<?php }
?>		<hr style='margin-top:20px;margin-bottom:30px;'><?php
}

function ageverify_prompttext_render() {

	$options = ageverify_get_options_with_defaults();
	?>
<span><?php esc_html_e( 'Edit Prompt Text', 'ageverify' ); ?></span><br />
	<textarea 	style='float:left;font-size:14px;font-weight:400;width:300px; height:200px;color:#000;border:1px solid #0071a1;margin-bottom:20px;font-family:monospace;'
    		type='text'
			id='prompttext'
			name='ageverify_settings[ageverify_prompttext]'
           placeholder='Welcome! Please verify<br />your age to enter.<br /><br />Are you 21 years or older?'
	><?php echo $options['ageverify_prompttext']; ?></textarea>
<div style="margin-left:340px;margin-top:-20px;"><?php esc_html_e( 'Text Preview', 'ageverify' ); ?>
<div id="prompttextpreview" style="overflow-wrap: break-word;font-size:<?php echo $options['ageverify_fontsize']; ?>px;min-height:40px;height:auto;padding-top:30px;padding-left:30px;padding-right:30px;padding-bottom:50px;width:300px;text-align:left;color:#000;background-color:#fff;font-weight:700;font-family:Open Sans Condensed;border:none;"><?php echo $options['ageverify_prompttext']; ?></div></div>
<script language='javascript'>
var AVlogoHCalc = <?php echo $options['ageverify_logoheight']; ?> + 50 + "px";
</script>

<script language='javascript'>
var prompttextcheck = document.getElementById('prompttext').innerHTML;
if (prompttextcheck === 'Welcome! Please verify<br />your age to enter.<br /><br />Are you 21 years or older?' || prompttextcheck === ''){
document.getElementById('prompttext').innerHTML = 'Welcome! Please verify<br />your age to enter.<br /><br />Are you 21 years or older?';
document.getElementById('prompttextpreview').innerHTML = 'Welcome! Please verify<br />your age to enter.<br /><br />Are you 21 years or older?';}

var promptTextValue = document.getElementById('prompttext').value;
document.getElementById('prompttext').onkeypress = function isEnterKey(evt){
var charCode = (evt.which) ? evt.which : evt.keyCode;
if (charCode === 13){
document.getElementById("prompttext").value += "<br />";
}}

document.getElementById('prompttext').onkeyup = function (){
document.getElementById('prompttextpreview').innerHTML = document.getElementById('prompttext').value;
if (document.getElementById('prompttext').value === ""){
document.getElementById('prompttextpreview').innerHTML = 'Welcome! Please verify<br />your age to enter.<br /><br />Are you 21 years or older?';
}
}

</script>

	<?php

}

function ageverify_fontsize_render() {

	$options = ageverify_get_options_with_defaults();
    ?>
			<input 	style='font-weight:bold;width:60px;color:#000;margin-bottom:20px;border-color:#0071a1;'
    		type='number'
			id='fontsize'
			name='ageverify_settings[ageverify_fontsize]'
            oninput='changeFS()'
            value='<?php echo $options['ageverify_fontsize']; ?>'

	> <span>px</span>

<script language='javascript'>
	var fontsize = document.getElementById('fontsize').value;
	if (fontsize === '0' || fontsize === '' || fontsize === 0){
		document.getElementById('fontsize').setAttribute('value', '24');}

    function changeFS(){
  document.getElementById('prompttextpreview').style.fontSize = document.getElementById('fontsize').value + 'px';
    }
</script>

	<?php

}

function ageverify_entertext_render() {

	$options = ageverify_get_options_with_defaults();

	esc_html_e( '(click the button to edit text)', 'ageverify' ); ?><br />
	<input 	style='border-radius:0px !important;font-weight:700;width:140px;height:40px;font-family:Open Sans Condensed;font-size:<?php echo $options['ageverify_bfontsize']; ?>px;color:#fff;margin-bottom:20px;text-align:center;box-shadow: #777 2px 2px 4px;background-color:#007000;border: 2px solid #007000;'
    		type='text'
			id='entertext'
			maxlength='24'
			name='ageverify_settings[ageverify_entertext]'
            value='<?php echo $options['ageverify_entertext']; ?>'

	>
<script language='javascript'>
	var entertextcheck = document.getElementById('entertext').value;
	if (entertextcheck === 'Yes' || entertextcheck === ''){
		document.getElementById('entertext').setAttribute('value', 'Yes');}
</script>
	<?php
}

function ageverify_exittext_render() {

	$options = ageverify_get_options_with_defaults();
	esc_html_e( '(click the button to edit text)', 'ageverify' ); ?><br />
	<input 	style='border-radius:0px !important;font-weight:700;box-shadow: #777 2px 2px 4px;width:140px;height:40px;font-family:Open Sans Condensed;font-size:<?php echo $options['ageverify_bfontsize']; ?>px;color:#fff;margin-bottom:20px;text-align:center;background-color:#007000;border: 2px solid #007000;'
    		type='text'
			id='exittext'
			maxlength='24'
			name='ageverify_settings[ageverify_exittext]'
            value='<?php echo $options['ageverify_exittext']; ?>'

	>
<script language='javascript'>
	var exittextcheck = document.getElementById('exittext').value;
	if (exittextcheck === 'No' || exittextcheck === ''){
		document.getElementById('exittext').setAttribute('value', 'No');}
</script>

	<?php
}

function ageverify_bfontsize_render() {

	$options = ageverify_get_options_with_defaults();
    ?>
			<input style='font-weight:bold;width:60px;color:#000;margin-bottom:20px;border-color:#0071a1;'
    		type='number'
			id='bfontsize'
			name='ageverify_settings[ageverify_bfontsize]'
            oninput='changeBFS()'
            value='<?php echo $options['ageverify_bfontsize']; ?>'

	><span>px</span>

<script language='javascript'>
	var bfontsize = document.getElementById('bfontsize').value;
	if (bfontsize === '0' || bfontsize === '' || bfontsize === 0){
		document.getElementById('bfontsize').setAttribute('value', '22');}

    function changeBFS(){
      document.getElementById('exittext').style.fontSize = document.getElementById('bfontsize').value + 'px';
      document.getElementById('entertext').style.fontSize = document.getElementById('bfontsize').value + 'px';
    }
</script>

	<?php

}


function ageverify_yytext_render() {

	$options = ageverify_get_options_with_defaults();
	esc_html_e( '(click to edit placeholder text)', 'ageverify' ); ?><br />
	<input 	style='font-family:Open Sans Condensed;font-size:20px;border-radius:0px !important;box-shadow: #777 2px 2px 4px;font-weight:700;width:90px;height:40px;color:#fff;background-color:#007000;margin-bottom:20px;text-align:center;border:1px solid #007000;'
    		type='text'
			id='yytext'
			maxlength='4'
			name='ageverify_settings[ageverify_yytext]'
            value='<?php echo $options['ageverify_yytext']; ?>'

	>
<script language='javascript'>
	var yytextcheck = document.getElementById('yytext').value;
	if (yytextcheck === 'YYYY' || yytextcheck === ''){
		document.getElementById('yytext').setAttribute('value', 'YYYY');}
</script>
	<?php

}

function ageverify_mmtext_render() {

	$options = ageverify_get_options_with_defaults();
	esc_html_e( '(click to edit placeholder text)', 'ageverify' ); ?><br />
	<input 	style='font-family:Open Sans Condensed;font-size:20px;border-radius:0px !important;box-shadow: #777 2px 2px 4px;font-weight:700;width:90px;height:40px;color:#fff;background-color:#007000;margin-bottom:20px;text-align:center;border:1px solid #007000;'
    		type='text'
			id='mmtext'
			maxlength='2'
			name='ageverify_settings[ageverify_mmtext]'
            value='<?php echo $options['ageverify_mmtext']; ?>'

	>
<script language='javascript'>
	var mmtextcheck = document.getElementById('mmtext').value;
	if (mmtextcheck === 'MM' || mmtextcheck === ''){
		document.getElementById('mmtext').setAttribute('value', 'MM');}
</script>

	<?php

}

function ageverify_ddtext_render() {

	$options = ageverify_get_options_with_defaults();
	esc_html_e( '(click to edit placeholder text)', 'ageverify' ); ?><br />
	<input 	style='font-family:Open Sans Condensed;font-size:20px;border-radius:0px !important;box-shadow: #777 2px 2px 4px;font-weight:700;height:40px;width:90px;color:#fff;background-color:#007000;margin-bottom:20px;text-align:center;border:1px solid #007000;'
    		type='text'
			id='ddtext'
			maxlength='2'
			name='ageverify_settings[ageverify_ddtext]'
            value='<?php echo $options['ageverify_ddtext']; ?>'

	>
<script language='javascript'>
	var ddtextcheck = document.getElementById('ddtext').value;
	if (ddtextcheck === 'DD' || mmtextcheck === ''){
		document.getElementById('ddtext').setAttribute('value', 'DD');}
</script>
<hr style='margin-top:10px;margin-bottom:30px;'>
	<?php

}

function ageverify_remembertext_render() {

	$options = ageverify_get_options_with_defaults();
	esc_html_e( '(click to edit text)', 'ageverify' ); ?><br />
<input 	style='font-weight:700;width:300px;border-color:#0071a1;margin-bottom:20px;font-family:Open Sans Condensed;font-size:18px;color:#000;'
    		type='text'
			id='remembertext'
			name='ageverify_settings[ageverify_remembertext]'
            value='<?php echo $options['ageverify_remembertext']; ?>'

	>
<script language='javascript'>
	var remembertextcheck = document.getElementById('remembertext').value;
	if (remembertextcheck === 'Remember Me' || remembertextcheck === ''){
		document.getElementById('remembertext').setAttribute('value', 'Remember Me');}
</script>

	<?php
}


function ageverify_age_render() {

	$options = ageverify_get_options_with_defaults();
    ?>
			<input 	style='font-weight:bold;width:60px;color:#000;margin-bottom:20px;border-color:#0071a1;'
    		type='number'
			id='age'
			name='ageverify_settings[ageverify_age]'
            value='<?php echo $options['ageverify_age']; ?>'

	><span><?php esc_html_e( 'years old', 'ageverify' ); ?></span>

<script language='javascript'>
	var age = document.getElementById('age').value;
	if (age === '0' || age === '' || age === 0){
		document.getElementById('age').setAttribute('value', '21');}
</script>
	<hr style='margin-top:10px;margin-bottom:10px;visibility: hidden !important;'>
	<?php

}


function ageverify_settings_section_callback(  ) {

}

function ageverify_customize_section_callback() { ?>
	<?php add_thickbox(); ?>
	<div id="ageverify-customize">
		<div id="ageverify-customize-header">
			<h2><?php esc_html_e( 'Custom AgeVerify Designs', 'ageverify' ); ?></h2>
			<p><?php esc_html_e( 'We build custom AgeVerify instances that meet the unique needs of your business and feature the importance of your brand. Review the features listed below and check out some of our recent custom work in the gallery.', 'ageverify' ); ?></p>
		</div>
		<div id="ageverify-custom-features">
			<h3><?php esc_html_e( 'Features', 'ageverify' ); ?></h3>
			<ul>
				<li><?php esc_html_e( 'NO SUBSCRIPTION FEES! WOO HOO!!', 'ageverify' ); ?></li>
			    <li><?php esc_html_e( 'Add Your Logo and Branding', 'ageverify' ); ?></li>
			    <li><?php esc_html_e( 'Add Custom Backgrounds Images and Videos', 'ageverify' ); ?></li>
			    <li><?php esc_html_e( 'Mailchimp Integration! Easily collect email, date of birth or any other info directly in to your Mailchimp account ***NEW FEATURE***', 'ageverify' ); ?></li>
				<li><?php esc_html_e( 'Add Geolocation Based Age Requirements', 'ageverify' ); ?></li>
			    <li><?php esc_html_e( 'Add Multi-Location Functionality', 'ageverify' ); ?></li>
			    <li><?php esc_html_e( 'Configure Prompt for Multiple Languages', 'ageverify' ); ?></li>
			    <li><?php esc_html_e( 'Add Remember Me Functionality', 'ageverify' ); ?></li>
			    <li><?php esc_html_e( 'Add a Terms of Service or User Agreement', 'ageverify' ); ?></li>
			    <li><?php esc_html_e( 'Add Social Media Icons and Links to Age Verification', 'ageverify' ); ?></li>
			    <li><?php esc_html_e( 'Use any Custom Fonts', 'ageverify' ); ?></li>
				<li><?php esc_html_e( 'Already using AgeVerify Pro? We’ll happily credit the full price of your Pro instance towards a new custom instance.', 'ageverify' ); ?></li>
			</ul>
            <div style="text-align:center;padding-top:20px;padding-bottom:20px;"><a href="https://ageverify.com/wordpress-upgrade/" target="_blank" style="padding:10px; color:#fff;background-color:green;box-shadow: #777 2px 2px 4px;text-decoration:none;font-size:18px;"><?php esc_html_e( 'Get Started', 'ageverify' ); ?></a></div>
		</div>
		<div id="ageverify-custom-examples">
			<div class="ageverify-custom-example">
				<a class="thickbox" href="<?php echo plugins_url(); ?>/ageverify/includes/custom_trychemistry.jpg">
                    <img src="<?php echo plugins_url(); ?>/ageverify/includes/custom_trychemistry.jpg">

				</a>
				<span class="caption"><a href="https://www.trychemistry.com/" target="_blank"><?php _e( 'Try Chemistry Cannabis', 'ageverify' ); ?></a></span>
			</div>

			<div class="ageverify-custom-example">
				<a class="thickbox" href="<?php echo plugins_url(); ?>/ageverify/includes/custom_cloverhill.jpg">
                    <img src="<?php echo plugins_url(); ?>/ageverify/includes/custom_cloverhill.jpg">
				</a>
				<span class="caption"><a href="http://cloverhillwines.com.au/" target="_blank"><?php _e( 'Clover Hill Wines', 'ageverify' ); ?></a></span>
			</div>

            <div class="ageverify-custom-example">
				<a class="thickbox" href="<?php echo plugins_url(); ?>/ageverify/includes/custom_tequilaespolon.jpg">
                    <img src="<?php echo plugins_url(); ?>/ageverify/includes/custom_tequilaespolon.jpg">
				</a>
				<span class="caption"><a href="https://espolontequila.com/" target="_blank"><?php _e( 'Tequila Espolon', 'ageverify' ); ?></a></span>
			</div>

            <div class="ageverify-custom-example">
				<a class="thickbox" href="<?php echo plugins_url(); ?>/ageverify/includes/custom_rouleurbrewing.jpg">
                    <img src="<?php echo plugins_url(); ?>/ageverify/includes/custom_rouleurbrewing.jpg">
				</a>
				<span class="caption"><a href="https://rouleurbrewing.com/" target="_blank"><?php _e( 'Rouleur Brewing', 'ageverify' ); ?></a></span>
			</div>



		</div>
	</div>

<?php }

// begin moreFromImbibeDigital page section


function ageverify_moreFromImbibeDigital_section_callback() { ?>
	<?php add_thickbox(); ?>
	<div id="ageverify-localsip">
		<div id="ageverify-localsip-header">
			<h2><?php esc_html_e( 'Introducing: LocalSip', 'ageverify' ); ?></h2>
			<p><?php esc_html_e( 'With LocalSip, breweries, wineries, and distilleries can easily add a bottle / tap location web service to any website in a matter of minutes. LocalSip is powered by Google Maps, is fully customized to match any website and uses the power of geo-location and data analytics to help website visitors find sales outlets, resulting in increased sales. ', 'ageverify' ); ?></p>
		</div>
		<div id="ageverify-localsip-features">
			<h3><?php esc_html_e( 'Features', 'ageverify' ); ?></h3>
			<ul>
				<li><?php esc_html_e( 'Embed your LocalSip Locator directly on any website', 'ageverify' ); ?></li>
			    <li><?php esc_html_e( 'Powered by Google Maps. Secure, accurate and reliable.', 'ageverify' ); ?></li>
			    <li><?php esc_html_e( 'Geo-location so your website visitors can find the location nearest them', 'ageverify' ); ?></li>
			    <li><?php esc_html_e( 'Display your LocalSip locator on any screen or display', 'ageverify' ); ?></li>
			    <li><?php esc_html_e( 'Installs in minutes', 'ageverify' ); ?></li>
			    <li><?php esc_html_e( 'No coding required. Send us your location list, and we will do the heavy lifting.', 'ageverify' ); ?></li>
			</ul>
            <div style="text-align:center;padding-top:20px;padding-bottom:40px;"><a href="https://localsip.co" target="_blank" style="padding:10px; color:#fff;background-color:#f1a501;box-shadow: #777 2px 2px 4px;text-decoration:none;font-size:18px;"><?php esc_html_e( 'Learn More', 'ageverify' ); ?></a></div>
            <img src="<?php echo plugins_url() . '/ageverify/includes/LocalSipLogo.png'; ?>" style='width:136px;height:auto;margin-bottom:20px;'/>
		</div>
		<div id="ageverify-localsip-examples">

			</div>



		</div>
	</div>

<?php }


// Render the Plugin options form
function ageverify_render_options_page() {
	?>

	<div class="wrap">
		<h2><?php esc_html_e('AgeVerify Configuration', 'ageverify'); ?></h2>
		<?php settings_errors(); ?>

        <?php
                $active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'pluginPage';
        ?>

        <h2 class="nav-tab-wrapper">
            <a href="?page=age-verify-options&tab=pluginPage" class="nav-tab <?php echo $active_tab == 'pluginPage' ? 'nav-tab-active' : ''; ?>"><?php _e( 'AgeVerify Settings', 'ageverify' ); ?></a>
            <a href="?page=age-verify-options&tab=customize" class="nav-tab <?php echo $active_tab == 'customize' ? 'nav-tab-active' : ''; ?>"><?php _e( 'AgeVerify Custom', 'ageverify' ); ?></a>

            <a href="?page=age-verify-options&tab=moreFromImbibeDigital" class="nav-tab <?php echo $active_tab == 'moreFromImbibeDigital' ? 'nav-tab-active' : ''; ?>"><?php _e( 'More from Imbibe Digital', 'ageverify' ); ?></a>
        </h2>

		<div id="ageverify" style="width: 75%; min-width: 350px; float: left;">
		<img src="<?php echo plugins_url() . '/ageverify/includes/AgeVerifyLogo.png'; ?>" id="AgeVerifyLogo" />
			<script type='text/javascript'>
			if(window.location.href.indexOf("moreFromImbibeDigital") > -1){
				document.getElementById("AgeVerifyLogo").style.display = 'none';
			}
			</script>
			<!-- Beginning of the Plugin Options Form -->
			<form method="post" action="options.php">
				<?php
	            if( $active_tab == 'pluginPage' ) {
	                settings_fields( 'pluginPage' );
					do_settings_sections( 'pluginPage' );
					submit_button();
	            } else if( $active_tab == 'customize' ) {
	                settings_fields( 'customize' );
	                do_settings_sections( 'customize' );

	            } else if( $active_tab == 'moreFromImbibeDigital' ) {
	                settings_fields( 'moreFromImbibeDigital' );
	                do_settings_sections( 'moreFromImbibeDigital' );

	            }

				?>
			</form>

		</div><!-- #main -->
		<?php include( plugin_dir_path( __FILE__ ) . '/includes/aside.php' ); ?>
	</div>

	<?php
}



// Sanitize and validate input. Accepts an array, return a sanitized array.
function ageverify_validate_options( $input ) {
	$safe_input = array();

	foreach ( $input as $key => $val ) {

		switch ( $key ) {

			case 'ageverify_countup':
			case 'ageverify_on':

				$safe_input[ $key ] = (bool)$val;
				break;

			case 'ageverify_ddtext':
			case 'ageverify_logoselect':
			case 'ageverify_entertext':
			case 'ageverify_exittext':
			case 'ageverify_yytext':
			case 'ageverify_mmtext':
			case 'ageverify_remembertext':
			case 'ageverify_background':

				$safe_input[ $key ] = sanitize_text_field( $val );
				break;

			case 'ageverify_fontsize':
			case 'ageverify_bfontsize':
			case 'ageverify_age':
			case 'ageverify_logoheight':

				$safe_input[ $key ] = intval( $val );
				break;

			case 'ageverify_template':

				$safe_input[ $key ] = ageverify_template_name_whitelist( $val );
				break;

			case 'ageverify_altbackground':
			case 'ageverify_altlogo':
			case 'ageverify_underageredirect':

				$safe_input[ $key ] = sanitize_url( $val );
				break;

			case 'ageverify_prompttext':

				$safe_input[ $key ] = wp_kses_post( $val );
				break;

			case 'ageverify_colors':
			case 'ageverify_colorp':

				$safe_input[ $key ] = sanitize_hex_color( $val );
				break;

			case 'ageverify_method':

				$methods = array( 'MDY', 'DMY', 'ABP' );

				if ( !in_array( $val, $methods ) ) {
					$val = 'AVP';
				}
				$safe_input[ $key ] = $val;
				break;

		}

	}
	return $safe_input;
}

function ageverify_template_name_whitelist( $template_name ) {
	require_once( plugin_dir_path( __FILE__ ) . 'includes/templates.php' );
	foreach ( $templates as $template ) {
		if ( isset( $template['name'] ) && $template['name'] == $template_name ) {
			return $template_name;
		}
	}

	return 'opaque';
}
