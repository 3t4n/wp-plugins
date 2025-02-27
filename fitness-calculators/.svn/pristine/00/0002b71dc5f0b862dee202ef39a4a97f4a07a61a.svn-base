<?php
/*
 * settings of plugin and calculator forms
*/

class FcpSettings {

	function __construct()
	{
		add_action( 'admin_menu', array( $this, 'fcp_admin_menu' ), 9 );
		add_action( 'admin_enqueue_scripts', array($this,'fcp_enqueue_color_picker') );
	}


	function fcp_enqueue_color_picker( $hook_suffix ) {
	    wp_enqueue_style( 'wp-color-picker' );
	    wp_enqueue_script( 'wp-color-picker');
	    wp_enqueue_script( 'wp-color-picker-script-handle', plugins_url('wp-color-picker-script.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
	}


	function fcp_admin_menu() {
	    add_menu_page(
	        __( 'Fitness Calc', 'fitness-calculators' ),
	        __( 'Fitness Calc', 'fitness-calculators' ),
	        'manage_options',
	        'fcp_dashboard',
	        array( $this, 'fcp_dashboard_func' ),
	        'dashicons-chart-bar'
	    );
	}

	public function fcp_dashboard_func()
	{
	?>
	<style>
		.card-fcp {
			position: relative;
			margin-top: 20px;
			padding: 0.7em 2em 1em;
			width: 100%;
			border: 1px solid #c3c4c7;
			box-shadow: 0 1px 1px rgba(0,0,0,.04);
			background: #fff;
			box-sizing: border-box;
		}
		.card-fcp code.selected {
			background-color: #ACCEF7;
		}
	</style>
	<script type="text/javascript">
		function copyToClipboard(element) {
			var $temp = jQuery("<input>");
			jQuery("body").append($temp);
			$temp.val(jQuery(element).text()).select();
			jQuery(element).addClass('selected');
			document.execCommand("copy");
			setTimeout(() => {
				jQuery(element).removeClass('selected');
			}, 3000);
			$temp.remove();
		}
		(function( $ ) {
 			$(function() {
		        $('.color-field').wpColorPicker();
		    });

		})( jQuery );
	</script>
		<div class="wrap">
			<h1><?php echo esc_html__('Fitness Calculator','fitness-calculators');?></h1>
				<div id="welcome-panel">
					<div class="welcome-panel-content">
						<div class="wrap">
							<nav class="nav-tab-wrapper woo-nav-tab-wrapper">
								<?php
								$tab = '';
								if(isset($_GET['tab']))
								{
									$tab = $_GET['tab'];
								}
								?>
								<a href="<?php echo esc_url( admin_url( 'admin.php?page=fcp_dashboard&tab=general' ) ); ?>"
									class="nav-tab <?php if($tab == 'general' || $tab == '') { ?> nav-tab-active <?php } ?>">
									<?php echo esc_html__( 'General', 'fitness-calculators' );?>
								</a>

								<a href="<?php echo esc_url( admin_url( 'admin.php?page=fcp_dashboard&tab=water' ) ); ?>" class="nav-tab <?php if($tab == 'water') { ?> nav-tab-active <?php } ?> "><?php echo esc_html__( 'Water Intake', 'fitness-calculators' );?></a>

								<a href="<?php echo esc_url( admin_url( 'admin.php?page=fcp_dashboard&tab=protein' ) ); ?>" class="nav-tab <?php if($tab == 'protein') { ?> nav-tab-active <?php } ?>"><?php echo esc_html__( 'Protien Intake', 'fitness-calculators' );?></a>

								<a href="<?php echo esc_url( admin_url( 'admin.php?page=fcp_dashboard&tab=bmi' ) ); ?>" class="nav-tab <?php if($tab == 'bmi') { ?> nav-tab-active <?php } ?>"><?php echo esc_html__( 'BMI', 'fitness-calculators' );?></a>

								<a href="<?php echo esc_url( admin_url( 'admin.php?page=fcp_dashboard&tab=bfc' ) ); ?>" class="nav-tab <?php if($tab == 'bfc') { ?> nav-tab-active <?php } ?>"><?php echo esc_html__( 'Body Fat', 'fitness-calculators' );?></a>

								<a href="<?php echo esc_url( admin_url( 'admin.php?page=fcp_dashboard&tab=cc' ) ); ?>" class="nav-tab <?php if($tab == 'cc') { ?> nav-tab-active <?php } ?>"><?php echo esc_html__( 'Carb', 'fitness-calculators' );?></a>
							</nav>

							<?php if($tab == 'general' || $tab =='') { ?>
							<br>
							<h2><?php echo esc_html__( 'Welcome !', 'fitness-calculators' );?></h2>
							<p> <?php echo esc_html__( 'Thank you for using Fitness Calculator plugin. <br>This plugin is equipped with many calculators that are related to health. Every calculator has its own settings that you need to save before using it for your website.', 'fitness-calculators' );?> </p>
							<br>
							</br>
							<?php } ?>
							<?php
							if($tab == 'water')
							{

								if(isset($_POST['fcw']) &&  isset ($_POST['water_nonce']))
								{
									if(!wp_verify_nonce( $_POST['water_nonce'], 'fcp_dashboard' )) {
										return false;
									}

									foreach ($_POST['fcw'] as $key => $value) {
										$this->fc_set_option($key,sanitize_text_field($value));
									}
								}

								?>
								<div class="card-fcp" id="recaptcha" >
								<h2 class="title"><?php echo esc_html__( 'Settings for Water Intake calculator', 'fitness-calculators' );?></h2>
								<div class="inside">
								<form method="post" >
								<table class="form-table">
								<tbody>
								<tr>
									<th scope="row">
										<label for="fcw_heading"><?php echo esc_html__( 'Calculator heading', 'fitness-calculators' );?></label>
									</th>
									<td>
										<?php wp_nonce_field('fcp_dashboard', 'water_nonce'); ?>
										<input type="text" aria-required="true" 
										value="<?php if($this->fc_get_option('fcw_heading')!=false) 
												{ echo esc_html($this->fc_get_option('fcw_heading')); }
										?>"
										 id="fcw_heading" 
										 name="fcw[fcw_heading]" 
										 class="regular-text code" 
										 placeholder="Water Intake calculator">
									</td>
								</tr>
								<tr>
									<th scope="row"><label for="secret"><?php echo esc_html__( 'Select theme color', 'fitness-calculators' );?></label></th>
									<td>
										<input type="text" value="<?php if(trim($this->fc_get_option('fcw_theme_color'))!=false) { echo esc_html_e($this->fc_get_option('fcw_theme_color')); }?>" name="fcw[fcw_theme_color]" class="color-field" >
									</td>
								</tr>
								</tbody>
								</table>

								<p class="submit"><input type="submit" class="button button-primary" value="<?php echo esc_html__( 'Save', 'fitness-calculators' );?>" name="submit"></p>
								</form>
								</div>
								</div>
								<div class="card-fcp" id="recaptcha">
								<h2 class="title"><?php echo esc_html__( 'Shortcode', 'fitness-calculators' );?></h2>
									<div class="inside">
									 <code id="fcp-water">[fcp-water-intake-calculator]</code>
									 <button onclick="copyToClipboard('#fcp-water')">Copy</button>
									 <br><br>
									 <h2 class="title"><?php echo esc_html__( 'Formula', 'fitness-calculators' );?></h2>
									 <a href="<?php echo esc_url(plugins_url('/docs/Water_intake_formula.docx', dirname(__FILE__)));?>">
									 	Formula for Water intake Calculator</a>
									 <br><br>
									 <h2><?php echo esc_html__( 'Output will look like', 'fitness-calculators' );?></h2>
									 <img src="<?php echo esc_url(plugins_url('/images/FCP_water_intake_calculator.png', dirname(__FILE__)));?>">
									</div>
								</div>
						<?php } ?>
						<?php
							if($tab == 'protein')
							{

								if(isset($_POST['fcp']) &&  isset ($_POST['protein_nonce']))
								{
									if(!wp_verify_nonce( $_POST['protein_nonce'], 'fcp_dashboard' )) {
										return false;
									}

									foreach ($_POST['fcp'] as $key => $value) {
										$this->fc_set_option($key,sanitize_text_field($value));
									}
								}

								?>
								<div class="card-fcp" id="recaptcha" >
								<h2 class="title"><?php echo esc_html__( 'Settings for Protein Intake calculator', 'fitness-calculators' );?></h2>
								<div class="inside">
								<form method="post" >
								<table class="form-table">
								<tbody>
								<tr>
									<th scope="row">
										<label for="fcw_heading"><?php echo esc_html__( 'Calculator heading', 'fitness-calculators' );?></label>
									</th>
									<td>
										<?php wp_nonce_field('fcp_dashboard', 'protein_nonce'); ?>
										<input 
										type="text" 
										aria-required="true" 
										value="<?php if(trim($this->fc_get_option('fcp_heading'))!=false) { echo esc_html__($this->fc_get_option('fcp_heading')); }?>" 
										id="fcp_heading" 
										name="fcp[fcp_heading]" 
										class="regular-text code" 
										placeholder="Protein Intake calculator">
									</td>
								</tr>
								<tr>
									<th scope="row"><label for="secret"><?php echo esc_html__( 'Select theme color', 'fitness-calculators' );?></label></th>
									<td>
										<input type="text" value="<?php if(trim($this->fc_get_option('fcp_theme_color'))!=false) { echo esc_html__($this->fc_get_option('fcp_theme_color')); }?>" name="fcp[fcp_theme_color]" class="color-field" >
									</td>
								</tr>
								</tbody>
								</table>

								<p class="submit"><input type="submit" class="button button-primary" value="Save" name="submit"></p>
								</form>
								</div>
								</div>
								<div class="card-fcp" id="recaptcha" >
								<h2 class="title"><?php echo esc_html__( 'Shortcode', 'fitness-calculators' );?></h2>
									<div class="inside">
									 <code id="fcp-protein">[fcp-protein-intake-calculator]</code>
									 <button onclick="copyToClipboard('#fcp-protein')">Copy</button>
									 <br><br>
									 <h2 class="title"><?php echo esc_html__( 'Formula', 'fitness-calculators' );?></h2>
									 <a href="<?php echo esc_html__(plugins_url('/docs/Protein_Intake_Formula.docx', dirname(__FILE__)));?>">Formula for Protein intake Calculator</a>
									 <br><br>
									 <h2><?php echo esc_html__( 'Output will look like', 'fitness-calculators' );?></h2>
									 <img src="<?php echo esc_html__(plugins_url('/images/FCP_proteinn_intake_calculator.png', dirname(__FILE__)));?>">
									</div>
								</div>
						<?php } ?>
						<?php
							if($tab == 'bmi')
							{


								if(isset($_POST['fcbmi']) &&  isset ($_POST['bmi_nonce']))
								{
									if(!wp_verify_nonce( $_POST['bmi_nonce'], 'fcp_dashboard' )) {
										return false;
									}

									foreach ($_POST['fcbmi'] as $key => $value) {
										$this->fc_set_option($key,sanitize_text_field($value));
									}
								}

								?>
								<div class="card-fcp" id="recaptcha" >
								<h2 class="title"><?php echo esc_html__( 'Settings for BMI calculator', 'fitness-calculators' );?></h2>
								<div class="inside">
								<form method="post" >
								<table class="form-table">
								<tbody>
								<tr>
									<th scope="row">
										<label for="fcw_heading"><?php echo esc_html__( 'Calculator heading', 'fitness-calculators' );?></label>
									</th>
									<td>
										<?php wp_nonce_field('fcp_dashboard', 'bmi_nonce'); ?>
										<input type="text" 
											aria-required="true" 
											value="<?php if(trim($this->fc_get_option('fcbmi_heading'))!=false) { echo esc_html__($this->fc_get_option('fcbmi_heading')); }?>" 
											id="fcbmi_heading" 
											name="fcbmi[fcbmi_heading]" 
											class="regular-text code" 
											placeholder="BMI calculator">
									</td>
								</tr>
								<tr>
									<th scope="row"><label for="secret"><?php echo esc_html__( 'Select theme color', 'fitness-calculators' );?></label></th>
									<td>
										<input type="text" value="<?php if(trim($this->fc_get_option('fcbmi_theme_color'))!=false) { echo esc_html__($this->fc_get_option('fcbmi_theme_color')); }?>" name="fcbmi[fcbmi_theme_color]" class="color-field" >
									</td>
								</tr>
								</tbody>
								</table>

								<p class="submit"><input type="submit" class="button button-primary" value="<?php echo esc_html__( 'Save', 'fitness-calculators' );?>" name="submit"></p>
								</form>
								</div>
								</div>
								<div class="card-fcp" id="recaptcha" >
								<h2 class="title"><?php echo esc_html__( 'Shortcode', 'fitness-calculators' );?></h2>
									<div class="inside">
									 <code id="fcp-bmi">[fcp-bmi-calculator]</code>
									 <button onclick="copyToClipboard('#fcp-bmi')">Copy</button>
									 <br><br>
									 <h2><?php echo esc_html__( 'Output will look like', 'fitness-calculators' );?></h2>
									 <img src="<?php echo esc_html__(plugins_url('/images/FCP_bmi_calculator.png', dirname(__FILE__)));?>">
									</div>
								</div>
						<?php } ?>
						<?php
							if($tab == 'bfc')
							{

								if(isset($_POST['fcbfc']) &&  isset ($_POST['fcbfc_nonce']))
								{
									if(!wp_verify_nonce( $_POST['fcbfc_nonce'], 'fcp_dashboard' )) {
										return false;
									}
									foreach ($_POST['fcbfc'] as $key => $value) {
										$this->fc_set_option($key,sanitize_text_field($value));
									}
								}

								?>
								<div class="card-fcp" id="recaptcha" >
								<h2 class="title"><?php echo esc_html__( 'Settings for Body Fat calculator', 'fitness-calculators' );?></h2>
								<div class="inside">
								<form method="post" >
								<table class="form-table">
								<tbody>
								<tr>
									<th scope="row">
										<label for="fcw_heading"><?php echo esc_html__( 'Calculator heading', 'fitness-calculators' );?></label>
									</th>
									<td>
										<?php wp_nonce_field('fcp_dashboard', 'fcbfc_nonce'); ?>
										<input 
										type="text" 
										aria-required="true" 
										value="<?php if(trim($this->fc_get_option('fcbfc_heading'))!=false) { echo esc_html__($this->fc_get_option('fcbfc_heading')); }?>" id="fcbfc_heading" 
										name="fcbfc[fcbfc_heading]" 
										class="regular-text code" placeholder="Body Fat calculator">
									</td>
								</tr>
								<tr>
									<th scope="row"><label for="secret"><?php echo esc_html__( 'Select theme color', 'fitness-calculators' );?></label></th>
									<td>
										<input type="text" value="<?php if(trim($this->fc_get_option('fcbfc_theme_color'))!=false) { echo esc_html__($this->fc_get_option('fcbfc_theme_color')); }?>" name="fcbfc[fcbfc_theme_color]" class="color-field" >
									</td>
								</tr>
								</tbody>
								</table>

								<p class="submit"><input type="submit" class="button button-primary" value="<?php echo esc_html__( 'Save', 'fitness-calculators' );?>" name="submit"></p>
								</form>
								</div>
								</div>
								<div class="card-fcp" id="recaptcha" >
								<h2 class="title"><?php echo esc_html__( 'Shortcode', 'fitness-calculators' );?></h2>
									<div class="inside">
									 <code id="fcp-bfc">[fcp-bfc-calculator]</code>
									 <button onclick="copyToClipboard('#fcp-bfc')">Copy</button>
									 <br><br>
									 <h2><?php echo esc_html__( 'Output will look like', 'fitness-calculators' );?></h2>
									 <img src="<?php echo esc_html__(plugins_url('/images/FCP_bmp_calculator.png', dirname(__FILE__)));?>">
									</div>
								</div>
						<?php } ?>

						<?php
							if($tab == 'cc')
							{

								if(isset($_POST['fccc']) &&  isset ($_POST['fccc_nonce']))
								{
									if(!wp_verify_nonce( $_POST['fccc_nonce'], 'fcp_dashboard' )) {
										return false;
									}
									foreach ($_POST['fccc'] as $key => $value) {
										$this->fc_set_option($key,sanitize_text_field($value));
									}
								}

								?>
								<div class="card-fcp" id="recaptcha" >
								<h2 class="title"><?php echo esc_html__( 'Settings for Carb calculator', 'fitness-calculators' );?></h2>
								<div class="inside">
								<form method="post" >
								<table class="form-table">
								<tbody>
								<tr>
									<th scope="row">
										<label for="fcw_heading"><?php echo esc_html__( 'Calculator heading', 'fitness-calculators' );?></label>
									</th>
									<td>
										<?php wp_nonce_field('fcp_dashboard', 'fccc_nonce'); ?>
										<input type="text" aria-required="true" value="<?php if(trim($this->fc_get_option('fccc_heading'))!=false) { echo esc_html__($this->fc_get_option('fccc_heading')); }?>" id="fccc_heading" name="fccc[fccc_heading]" class="regular-text code" placeholder="Carb calculator">
									</td>
								</tr>
								<tr>
									<th scope="row"><label for="secret"><?php echo esc_html__( 'Select theme color', 'fitness-calculators' );?></label></th>
									<td>
										<input type="text" value="<?php if(trim($this->fc_get_option('fccc_theme_color'))!=false) { echo esc_html__($this->fc_get_option('fccc_theme_color')); }?>" name="fccc[fccc_theme_color]" class="color-field" >
									</td>
								</tr>
								</tbody>
								</table>

								<p class="submit"><input type="submit" class="button button-primary" value="<?php echo esc_html__( 'Save', 'fitness-calculators' );?>" name="submit"></p>
								</form>
								</div>
								</div>
								<div class="card-fcp" id="recaptcha" >
								<h2 class="title"><?php echo esc_html__( 'Shortcode', 'fitness-calculators' );?></h2>
									<div class="inside">
									 <code id="fcp-cc">[fcp-cc-calculator]</code>
									 <button onclick="copyToClipboard('#fcp-cc')">Copy</button>
									 <h2><?php echo esc_html__( 'Formula', 'fitness-calculators' );?></h2>
									 <a href="<?php echo esc_html__(plugins_url('/docs/Carb-intake-formula.docx', dirname(__FILE__)));?>">Formula for Carb Calculator</a>
									 <br><br>
									 <br><br>
									 <h2><?php echo esc_html__( 'Output will look like', 'fitness-calculators' );?></h2>
									 <img src="<?php echo esc_html__(plugins_url('/images/FCP-carb-calculator.png', dirname(__FILE__)));?>">
									</div>
								</div>
						<?php } ?>

						</div>
					</div>
				</div>
			</div>
		<?php
	}


	function fc_set_option($option_name,$new_value)
	{
		if ( get_option( $option_name ) !== false ) {
		    update_option( $option_name, $new_value );
		} else {
		    $autoload = 'no';
		    add_option( $option_name, $new_value, "", $autoload );
		}
	}

	public function fc_get_option($option_name)
	{
		if( get_option( $option_name ) !== false ){
		    return esc_html(get_option( $option_name ));
		}
		else
		{
			return '';
		}
	}


 }

 ?>
