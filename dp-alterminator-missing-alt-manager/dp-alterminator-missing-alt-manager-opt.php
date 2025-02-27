<?php
add_action( 'admin_menu', 'dp_alterminator_menu' );
     
function dp_alterminator_menu() {
    add_options_page( 'DP ALTerminator - Missing ALT manager', 'DP ALTerminator', 'manage_options', 'dp-alterminator-missing-alt-manager.php', 'dp_alterminator_options' );
}
    
function dp_alterminator_register_settings() {
add_option( 'dp_alterminator_w'); if (get_option('dp_alterminator_w') == "") {update_option('dp_alterminator_w','%%DP_TITLE%%');}
	register_setting( 'dp_alterminator_settings', 'dp_alterminator_w' ); 
    

} 
add_action( 'admin_init', 'dp_alterminator_register_settings' );
	
function dp_alterminator_options() {
    if ( !current_user_can( 'manage_options' ) )  {
        wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
    }
?>
<div class="wrap">
	<div class="dp_how">
		<h2 style="font-size:36px; text-align:center;">DP Alterminator - Missing ALT manager</h2>
		<h2>About</h2>
		<p>DP ALTerminator will add missing ALT tags to your content images. The presence and the "quality" of the ALT tag is a powerful SEO ranking factor. You should always add ALT tags manually. If, for some reasons, you can't do that, then this plugin is what you need.</p>
		</div>
		
		<div class="dp_opt">
		<h1>How to use</h1>
		<p>When active, this plugin will work everywhere, everytime. You can customize it's behaviour editing the settings below.</p>
		</div>
	
	
	<div class="dp_opt">
		<form method="post" action="options.php">
<?php settings_fields( 'dp_alterminator_settings' ); ?>
	  <?php do_settings_sections( 'dp_alterminator_settings' ); ?>
		<h1 style="text-align:center; font-size:34px;">Settings</h1>
        <p>You can use plain text and this shortcodes in your pattern (they will automatically be converted into the desired element)</p>
        <ul>
        <li><strong class="dp_list">%%DP_TITLE%%</strong> Adds the title of the current page</li>
        <li><strong class="dp_list">%%DP_URL%%</strong> Adds the URL of the current page</li>
        <li><strong class="dp_list">%%DP_DATE%%</strong> Adds the post date</li>
        <li><strong class="dp_list">%%DP_DATE_GMT%%</strong> Adds the post date (GMT time)</li>
        <li><strong class="dp_list">%%DP_EXCERPT%%</strong> Adds the excerpt, if present</li>
        <li></li>
        </ul>
		<p>Missing ALT tags should be replaced with: <input class="dp_text" type="text" name="dp_alterminator_w" value="<?php echo get_option('dp_alterminator_w'); ?>"  />
		</p>
		
		<div class="dpx" style="margin-top:30px; font-size:20px; text-align:center; margin:0 auto;">Now save everything, and let me do my dirty job :)<br /><?php submit_button(); ?></div>
		
		</div>
	</form>
	
</div>
<style>
	.dp_high {color:#3EA30B; font-size:15px; font-weight:bold;}
	.dp_how {background-color:#FFF; padding:15px; margin:0 auto; border:1px solid #bdbdbd;}
	.dp_opt {background-color:#FFF; padding:15px; margin:0 auto; margin-top: 20px; border:1px solid #bdbdbd; }
	.dp_radio {margin:10px 0 10px 20px !important;}
	.dp_text {margin-left:15px; width:700px; padding:6px; line-height:25px; font-size:16px;}
	.dpx .submit {text-align:center; margin:0 auto;}
    .dp_list {margin-right:20px;}
</style>

<?php
			}
?>