<?php
add_action( 'admin_menu', 'floatingTOC_my_admin_menu' );

function floatingTOC_my_admin_menu() {
	add_options_page( 'Table of Contents Plugin Menu', 'Table of Contents Plugin Menu', 'manage_options', 'blockTOC/admin-page.php', 'floatingTOC_admin_page', null, 6  );
}

function floatingTOC_register_settings(){
	register_setting('toc_settings_group', 'toc_settings');
}
add_action('admin_init', 'floatingTOC_register_settings');


function load_custom_wp_admin_style(){
	wp_register_script('admin_js', plugin_dir_url(__FILE__).'/adminjs.js', array(), false);
    wp_register_style( 'table_css', plugin_dir_url(__FILE__) . '/admin-toc-style.css', false);
		wp_enqueue_script('admin_js');
    wp_enqueue_style( 'table_css' );
}
add_action('admin_enqueue_scripts', 'load_custom_wp_admin_style');


//main admin page function  adds everything to the page
function floatingTOC_admin_page(){
	
	global $TOC_Options;
	$picUrl = plugin_dir_url(__FILE__) . 'media/WideTransparentOriginal.png';
	$fontawsome = plugin_dir_url(__FILE__) . 'media/fontawesome-free-5.15.4-web/js/all.js';
	ob_start();?>
	<style>
		h1 {
			padding: 1em;
			text-align: center;
			background-color: white;
		}

		h2 {
			font-size: 150%;
			font-weight: bold;
		}

		.flex-container {
			display: flex;
		}

		.flex-container aside{
			padding-top: 1em;
			padding-right: 2em;
			flex: 2 1 20em;
			
		}
		.flex-container .subset{
			padding: 1.5em;
			border: 5px ridge;
		}

		.flex-container section{
			padding: 1em;
			flex-direction: column;
			flex: 10 1 10em;
			background-color: white;
			
		}
		.submitreset{
		display: flex;
		flex-direction: row;
		justify-content: center;
		align-items: baseline;
		}
		.submit{
			padding-right: 1em;
		}

		#logo{
			padding: 1em;
			position: absolute;
			height:auto;
			width: 15%;
			
		}
	</style>


	

	<div class="wraper">
	<h1>Floating Table of Contents</h1>
		<div class="flex-container" >
			<aside>
				<h2>Settings</h2>
				<form id="settingsForm" method="post" action="options.php">
					<?php settings_fields('toc_settings_group'); ?> 

					<!-- Options Menu for Table of Contents -->

					<div class="subset">
						<h3>Enable Table of Contents</h3>
						<fieldset style="padding: 5px;">
							<p>
								<input type="checkbox" id="toc_settings[toc_enable]" name="toc_settings[toc_enable]" value="1" <?php checked(1, $TOC_Options['toc_enable']); ?> />
								<lable class="description" for="toc_settings[toc_enable]"><?php _e('Enable Table of Contents', 'blockTOC_domain'); ?> </lable>
							</p>
						</fieldset>
					</div>
					<h3>Change Table's Styling</h3>
					<fieldset style="padding: 5px;">
						<fieldset class="subset">
							<h4>Border</h4>
							<p>
							<!--Selector for border style    -->
								<?php $borderStyles = array('dotted', 'dashed', 'solid', 'double', 'groove', 'ridge', 'inset', 'outset', 'none'); ?>
								<select id="toc_settings[toc_border_style]" name="toc_settings[toc_border_style]">
									<?php foreach($borderStyles as $style) {?>
								<		<?php if($TOC_Options['toc_border_style'] == $style) {$selected = 'selected="selected"';} else {$selected = '';}?> 
	}									<option value="<?php echo esc_attr($style); ?>" <?php echo esc_attr($selected); ?>><?php echo esc_html($style); ?></option>
									<?php } ?>
								</select>
								<lable class="description" for="toc_settings[toc_border_style]"><?php _e('Border Style', 'blockTOC_domain'); ?> </lable>
							</p>
							<p>
								<input type="color" id="toc_settings[toc_border_color]" name="toc_settings[toc_border_color]" value="<?php echo esc_attr($TOC_Options['toc_border_color']);?>"/>
								<lable class="description" for="toc_settings[toc_border_color]"><?php _e('Border Color', 'blockTOC_domain'); ?> </lable>
							</p>

						</fieldset>
						<fieldset class="subset">
							<h4>Title</h4>
							<p>
								<input type="color" id="toc_settings[toc_title_color]" name="toc_settings[toc_title_color]" value="<?php echo esc_attr($TOC_Options['toc_title_color']);?>"/>
								<lable class="description" for="toc_settings[toc_title_color]"><?php _e('Title Background Color', 'blockTOC_domain'); ?> </lable>
							</p>
							<p>
								<input type="range"min="0" max="1" step="0.1" id="toc_settings[toc_title_trans]" name="toc_settings[toc_title_trans]" value="<?php echo esc_attr($TOC_Options['toc_title_trans']);?>"/>
								<lable class="description" for="toc_settings[toc_title_trans]"><?php _e('Title Background Transparancy', 'blockTOC_domain'); ?> </lable>
							</p>
							<p>
								<input type="color" id="toc_settings[toc_title_fcolor]" name="toc_settings[toc_title_fcolor]" value="<?php echo esc_attr($TOC_Options['toc_title_fcolor']);?>"/>
								<lable class="description" for="toc_settings[toc_title_fcolor]"><?php _e('Title Font Color', 'blockTOC_domain'); ?> </lable>
							</p>
						</fieldset>
						<fieldset class="subset">
							<h4>Elements</h4>
							<p>
								<input type="color" id="toc_settings[toc_background_color]" name="toc_settings[toc_background_color]" value="<?php echo esc_attr($TOC_Options['toc_background_color']);?>"/>
								<lable class="description" for="toc_settings[toc_background_color]"><?php _e('Background Color', 'blockTOC_domain'); ?> </lable>
							</p>
							<p>
								<input type="range"min="0" max="1" step="0.1" id="toc_settings[toc_background_trans]" name="toc_settings[toc_background_trans]" value="<?php echo esc_attr($TOC_Options['toc_background_trans']);?>"/>
								<lable class="description" for="toc_settings[toc_background_trans]"><?php _e('Background Transparancy', 'blockTOC_domain'); ?> </lable>
							</p>
							<p>
								<input type="color" id="toc_settings[toc_chap_bcolor]" name="toc_settings[toc_chap_bcolor]" value="<?php echo esc_attr($TOC_Options['toc_chap_bcolor']);?>"/>
								<lable class="description" for="toc_settings[toc_chap_bcolor]"><?php _e('Chapter Background Color', 'blockTOC_domain'); ?> </lable>
							</p>
							<p>
								<input type="range"min="0" max="1" step="0.1" id="toc_settings[toc_chap_trans]" name="toc_settings[toc_chap_trans]" value="<?php echo esc_attr($TOC_Options['toc_chap_trans']);?>"/>
								<lable class="description" for="toc_settings[toc_chap_trans]"><?php _e('Chapter Transparancy', 'blockTOC_domain'); ?> </lable>
							</p>
							<p>
								<input type="color" id="toc_settings[toc_chap_fcolor]" name="toc_settings[toc_chap_fcolor]" value="<?php echo esc_attr($TOC_Options['toc_chap_fcolor']);?>"/>
								<lable class="description" for="toc_settings[toc_chap_fcolor]"><?php _e('Chapter Text Color', 'blockTOC_domain'); ?> </lable>
							</p>							
						</fieldset>
						<fieldset class="subset">
							<h4>Button</h4>
							<p>
								<input type="color" id="toc_settings[toc_icon_color]" name="toc_settings[toc_icon_color]" value="<?php echo esc_attr($TOC_Options['toc_icon_color']);?>"/>
								<lable class="description" for="toc_settings[toc_icon_color]"><?php _e('Icon Color', 'blockTOC_domain'); ?> </lable>
							</p>
							<p>
								<input type="color" id="toc_settings[toc_icon_g1color]" name="toc_settings[toc_icon_g1color]" value="<?php echo esc_attr($TOC_Options['toc_icon_g1color']);?>"/>
								<lable class="description" for="toc_settings[toc_icon_g1color]"><?php _e('Button Gradient Color 1', 'blockTOC_domain'); ?> </lable>
							</p>
							<p>
								<input type="color" id="toc_settings[toc_icon_g2color]" name="toc_settings[toc_icon_g2color]" value="<?php echo esc_attr($TOC_Options['toc_icon_g2color']);?>"/>
								<lable class="description" for="toc_settings[toc_icon_g2color]"><?php _e('Button Gradient Color 2', 'blockTOC_domain'); ?> </lable>
							</p>
						</fieldset>
					</fieldset>
					<div class="submitreset">
						<p class="submit">
							<input type="submit" class="button-primary" value="<?php _e('Save Options', 'blockTOC_domain'); ?>">
						</p>
						<p class="reset">
							<input type="button" value="<?php _e('Reset', 'blockTOC_domain'); ?>" onclick="floatingTOC_resetForm()"/>
						</p>
					</div>
				</form>
			</aside>
			<section>
<!---------------------------------------------------    -->



	<script src="<?php echo esc_url($fontawsome); ?>"></script>

	<script>
	//add alpha transparancy
    function floatingTOC_addAlpha(color,  opacity) {
        // limit values so it is between 0 and 1.
        const _opacity = Math.round(Math.min(Math.max(opacity || 1, 0), 1) * 255);
        return color + _opacity.toString(16).toUpperCase();
    }
	
	//reset form and change the example back
	function floatingTOC_resetForm(){
		document.getElementById("settingsForm").reset();
		floatingTOC_loadStyleToTable();
	}


	//update and set the example table on page load to current settings.
	window.onload= function(){floatingTOC_loadStyleToTable()}
	function floatingTOC_loadStyleToTable(){
	f1("toc_settings[toc_chap_bcolor]");
	f2("toc_settings[toc_chap_trans]");
	f3("toc_settings[toc_background_color]");
	f4("toc_settings[toc_background_trans]");
	f5("toc_settings[toc_title_color]");
	f6("toc_settings[toc_title_trans]");
	f7("toc_settings[toc_title_fcolor]");
	f8("toc_settings[toc_border_style]");
	f9("toc_settings[toc_border_color]");
	f10("toc_settings[toc_chap_fcolor]");
	f11("toc_settings[toc_icon_color]");
	f12("toc_settings[toc_icon_g1color]");
	f13("toc_settings[toc_icon_g2color]");
	}

	//set the exmaple table to the color styling as the settings are changed MUST pass in element id as a string
	document.getElementById("toc_settings[toc_chap_bcolor]").onchange = function(){f1("toc_settings[toc_chap_bcolor]")} 
	function f1(valID){
	var y = document.getElementById("toc_settings[toc_chap_trans]").value;
	var x = floatingTOC_addAlpha( document.getElementById(valID).value, y);
    document.documentElement.style
        .setProperty('--chapterbackgroundcolor', x);
	}
	document.getElementById("toc_settings[toc_chap_trans]").onchange = function(){f2("toc_settings[toc_chap_trans]")} 
	function f2(valID){
	var y = document.getElementById("toc_settings[toc_chap_bcolor]").value;
	var x = floatingTOC_addAlpha(y,  document.getElementById(valID).value);
    document.documentElement.style
        .setProperty('--chapterbackgroundcolor', x);
	}
	document.getElementById("toc_settings[toc_background_color]").onchange = function(){f3("toc_settings[toc_background_color]")}
	function f3(valID){
	var y = document.getElementById("toc_settings[toc_background_trans]").value;
	var x = floatingTOC_addAlpha( document.getElementById(valID).value, y);
    document.documentElement.style
        .setProperty('--backgroundcolor', x);
	}
	document.getElementById("toc_settings[toc_background_trans]").onchange = function(){f4("toc_settings[toc_background_trans]")} 
	function f4(valID){
	var y = document.getElementById("toc_settings[toc_background_color]").value;
	var x = floatingTOC_addAlpha(y,  document.getElementById(valID).value);
    document.documentElement.style
        .setProperty('--backgroundcolor', x);
	}
	document.getElementById("toc_settings[toc_title_color]").onchange = function(){f5("toc_settings[toc_title_color]")} 
	function f5(valID){
	var y = document.getElementById("toc_settings[toc_title_trans]").value;
	var x = floatingTOC_addAlpha( document.getElementById(valID).value, y);
    document.documentElement.style
        .setProperty('--titlecolor', x);
	}
	document.getElementById("toc_settings[toc_title_trans]").onchange = function(){f6("toc_settings[toc_title_trans]")} 
	function f6(valID){
	var y = document.getElementById("toc_settings[toc_title_color]").value;
	var x = floatingTOC_addAlpha(y,  document.getElementById(valID).value);
    document.documentElement.style
        .setProperty('--titlecolor', x);
	}	
	document.getElementById("toc_settings[toc_title_fcolor]").onchange = function(){f7("toc_settings[toc_title_fcolor]")} 
	function f7(valID){
    document.documentElement.style
        .setProperty('--titlefcolor',  document.getElementById(valID).value);
	}
    document.getElementById("toc_settings[toc_border_style]").onchange = function(){f8("toc_settings[toc_border_style]")}
	function f8(valID){
    document.documentElement.style
        .setProperty('--borderstyle',  document.getElementById(valID).value);
	}	
	document.getElementById("toc_settings[toc_border_color]").onchange = function(){f9("toc_settings[toc_border_color]")} 
	function f9(valID){
    document.documentElement.style
        .setProperty('--bordercolor',  document.getElementById(valID).value);
	}
	document.getElementById("toc_settings[toc_chap_fcolor]").onchange = function(){f10("toc_settings[toc_chap_fcolor]")} 
	function f10(valID){
    document.documentElement.style
        .setProperty('--chaptertextcolor',  document.getElementById(valID).value);
	}
	document.getElementById("toc_settings[toc_icon_color]").onchange = function(){f11("toc_settings[toc_icon_color]")} 
	function f11(valID){
    document.documentElement.style
        .setProperty('--buttoniconcolor',  document.getElementById(valID).value);
	}
	document.getElementById("toc_settings[toc_icon_g1color]").onchange = function(){f12("toc_settings[toc_icon_g1color]")} 
	function f12(valID){
    document.documentElement.style
        .setProperty('--gradientcolor1',  document.getElementById(valID).value);
	}
	document.getElementById("toc_settings[toc_icon_g2color]").onchange = function(){f13("toc_settings[toc_icon_g2color]")} 
	function f13(valID){
    document.documentElement.style
        .setProperty('--gradientcolor2',  document.getElementById(valID).value);
	}
	
	</script>
   				<h2> Table Of Contents </h2>
				<h3> Style your Table to match your branding </h3> 
    
  <div class="floatingButtonWrap" style="align-self: flex-end">
    <div class="floatingButtonInner">
        <a href="#" class="floatingButton">
            <i class="fas fa-plus fa-2x"></i>
        </a>
        <div class="table-of-contents">
          <p class="toc-headline"><strong>Title of Post</strong></p>
          <ul style="padding-left: 25px;">
              <!-- Table of contents -->              
                      <li>
							<li>
                              <a href="#">Chapter 1</a>
							  </li>
							  <li>
                                  <a href="#">Chapter 2</a>   
							  </li>
                              <ul style="padding-left: 25px;">

                                      <li>
                                          <a href="#">Chapter 2a</a>
                                      </li>
									  <li>
										  <a href="#">Chapter 2b</a>
                                      </li>
                                 
                              </ul>
							  <li>
							  <a href="#">Chapter 3</a>	
							  </li>
                      </li>
              
          </ul>
        </div>
    </div>
  </div>




  <!---------------------------------------------------    -->







			</section>
		
		</div>
		<div style="padding-bottom: 25px;">
			<a href="https://www.smithsites.net">
				<img id="logo" src="<?php echo esc_url($picUrl);?>" />
			</a>
		</div>
	</div>
	<?php
	echo ob_get_clean();
}