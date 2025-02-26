<?php
/**
 * Load Saved AQSS Settings
 */
$PostId = $post->ID;
$AQSS_Gallery_Settings_Key = "AQSS_Gallery_Settings_".$PostId;
$AQSS_Gallery_Settings = unserialize(get_post_meta( $PostId, $AQSS_Gallery_Settings_Key, true));

	if(isset($AQSS_Gallery_Settings['AQSS_L3_Slider_Type']))
		$AQSS_L3_Slider_Type   	= $AQSS_Gallery_Settings['AQSS_L3_Slider_Type'];
	else
		$AQSS_L3_Slider_Type   	= 1;

	if(isset($AQSS_Gallery_Settings['AQSS_L3_Slide_Title'])) 
		$AQSS_L3_Slide_Title   		    = $AQSS_Gallery_Settings['AQSS_L3_Slide_Title'];
	else
		$AQSS_L3_Slide_Title			= 1;
	
	if(isset($AQSS_Gallery_Settings['AQSS_L3_Auto_Slideshow'])) 
		$AQSS_L3_Auto_Slideshow			= $AQSS_Gallery_Settings['AQSS_L3_Auto_Slideshow'];
	else
		$AQSS_L3_Auto_Slideshow			= 1;
	
	if(isset($AQSS_Gallery_Settings['AQSS_L3_Transition']))
		$AQSS_L3_Transition   			= $AQSS_Gallery_Settings['AQSS_L3_Transition'];
	else
		$AQSS_L3_Transition   			= 1;
	
	if(isset($AQSS_Gallery_Settings['AQSS_L3_Transition_Speed']))
		$AQSS_L3_Transition_Speed   	= $AQSS_Gallery_Settings['AQSS_L3_Transition_Speed'];
	else
		$AQSS_L3_Transition_Speed   	= 5000;

	if(isset($AQSS_Gallery_Settings['AQSS_L3_Slide_To_Show']))
		$AQSS_L3_Slide_To_Show   	= $AQSS_Gallery_Settings['AQSS_L3_Slide_To_Show'];
	else
		$AQSS_L3_Slide_To_Show   	= 1;

	if(isset($AQSS_Gallery_Settings['AQSS_L3_Slide_To_Scroll']))
		$AQSS_L3_Slide_To_Scroll   	= $AQSS_Gallery_Settings['AQSS_L3_Slide_To_Scroll'];
	else
		$AQSS_L3_Slide_To_Scroll   	= 1;

	if(isset($AQSS_Gallery_Settings['AQSS_L3_Infinite_Scroll']))
		$AQSS_L3_Infinite_Scroll   	= $AQSS_Gallery_Settings['AQSS_L3_Infinite_Scroll'];
	else
		$AQSS_L3_Infinite_Scroll   	= 0;			
						
	if(isset($AQSS_Gallery_Settings['AQSS_L3_Navigation_Button']))
		$AQSS_L3_Navigation_Button   	= $AQSS_Gallery_Settings['AQSS_L3_Navigation_Button'];
	else
		$AQSS_L3_Navigation_Button   	= 1;	
	
	if(isset($AQSS_Gallery_Settings['AQSS_L3_Font_Style']))
		$AQSS_L3_Font_Style          	= $AQSS_Gallery_Settings['AQSS_L3_Font_Style'];
	else
		$AQSS_L3_Font_Style          	= "Arial";
	
	if(isset($AQSS_Gallery_Settings['AQSS_L3_Title_Color']))
		$AQSS_L3_Title_Color   			= $AQSS_Gallery_Settings['AQSS_L3_Title_Color'];
	else
		$AQSS_L3_Title_Color   			= "#00000";
	
	if(isset($AQSS_Gallery_Settings['AQSS_L3_Title_BgColor']))
		$AQSS_L3_Title_BgColor   		= $AQSS_Gallery_Settings['AQSS_L3_Title_BgColor'];
	else
		$AQSS_L3_Title_BgColor   		= "#FFFFFF";
	
	if(isset($AQSS_Gallery_Settings['AQSS_L3_Desc_Color']))
		$AQSS_L3_Desc_Color   			= $AQSS_Gallery_Settings['AQSS_L3_Desc_Color'];
	else
		$AQSS_L3_Desc_Color   			= "#FFFFFF";
	
	if(isset($AQSS_Gallery_Settings['AQSS_L3_Desc_BgColor']))
		$AQSS_L3_Desc_BgColor  			= $AQSS_Gallery_Settings['AQSS_L3_Desc_BgColor'];
	else
		$AQSS_L3_Desc_BgColor  			= "#00000";
		
?>
<input type="hidden" id="aqss_action" name="aqss_action" value="aqss-save-settings">
<table class="form-table slider-table">
	<tbody>
		<!-- ****** Choose Slider Type ******-->
		<tr id="L3">
			<td colspan="2">
				<label><?php echo 'Choose Slider Type'; ?></label>
				<div class="slider-radio">
					<?php if(!isset($AQSS_L3_Slider_Type)) $AQSS_L3_Slider_Type = 1; ?>
					<div class="slider_type"><input type="radio" class="customeclhide" name="aqss-l3-slider-type" id="aqss-l3-slider-type"  value="1"  <?php if($AQSS_L3_Slider_Type == "1" ) { echo "checked"; } ?>> <?php echo 'Single'; ?> &nbsp;&nbsp;</div>
					<div class="slider_type"><input type="radio" class="customeclshow" name="aqss-l3-slider-type" id="aqss-l3-slider-type" value="2" <?php if($AQSS_L3_Slider_Type == "2" ) { echo "checked"; } ?>> <?php echo'Multiple'; ?> &nbsp;&nbsp;	</div>	
					<div class="slider_type"><input type="radio" class="customeclshow" name="aqss-l3-slider-type" id="aqss-l3-slider-type" value="3" <?php if($AQSS_L3_Slider_Type == "3" ) { echo "checked"; } ?>> <?php echo'Responsive Slick Slider'; ?> &nbsp;&nbsp;</div>	
					<div class="slider_type"><input type="radio" class="customeclhide" name="aqss-l3-slider-type" id="aqss-l3-slider-type" value="4" <?php if($AQSS_L3_Slider_Type == "4" ) { echo "checked"; } ?>> <?php echo 'Variable Width Slick Slider'; ?> &nbsp;&nbsp;	</div>				
					<div class="slider_type"><input type="radio" class="customeclhide" name="aqss-l3-slider-type" id="aqss-l3-slider-type" value="5" <?php if($AQSS_L3_Slider_Type == "5" ) { echo "checked"; } ?>> <?php echo 'Adaptive Height Slider'; ?> &nbsp;&nbsp;</div>	
					<div class="slider_type"><input type="radio" class="customeclshow" name="aqss-l3-slider-type" id="aqss-l3-slider-type" value="6" <?php if($AQSS_L3_Slider_Type == "6" ) { echo "checked"; } ?>> <?php echo 'Center Mode'; ?> &nbsp;&nbsp;</div>		
					<div class="slider_type"><input type="radio" class="customeclshow" name="aqss-l3-slider-type" id="aqss-l3-slider-type" value="7" <?php if($AQSS_L3_Slider_Type == "7" ) { echo "checked"; } ?>> <?php echo 'Lazy Load Slider'; ?> &nbsp;&nbsp;</div>	
					<div class="slider_type"><input type="radio" class="customeclhide" name="aqss-l3-slider-type" id="aqss-l3-slider-type" value="8" <?php if($AQSS_L3_Slider_Type == "8" ) { echo "checked"; } ?>> <?php echo 'Fade Mode'; ?> &nbsp;&nbsp;</div>	
					<div class="slider_type"><input type="radio" class="customeclhide" name="aqss-l3-slider-type" id="aqss-l3-slider-type" value="9" <?php if($AQSS_L3_Slider_Type == "9" ) { echo "checked"; } ?>> <?php echo 'Right To Left Slider'; ?> &nbsp;&nbsp;	</div>	
						
					<p class="description">
						<?php echo 'Select slider type'; ?>.
						
					</p>
				</div>
			</td>
		</tr>
		<?php 
		if(($AQSS_L3_Slider_Type==2) || ($AQSS_L3_Slider_Type==3) || ($AQSS_L3_Slider_Type==4) || ($AQSS_L3_Slider_Type==5) || ($AQSS_L3_Slider_Type ==6) || ($AQSS_L3_Slider_Type==7) || ($AQSS_L3_Slider_Type == 9)) {  ?>
		
		<tr id="L3">
			<!-- ****** Slide To Show ******-->	
			<td>
				<label><?php echo 'Slide To Show'; ?></label>

				<?php if(!isset($AQSS_L3_Slide_To_Show)) $AQSS_L3_Slide_To_Show = 1; ?>
				<input type="text" name="aqss-l3-slide-to-show" id="aqss-l3-slide-to-show" value="<?php echo $AQSS_L3_Slide_To_Show; ?>">
				<p class="description">
					<?php echo 'Set how many slide to show per page. Default is 1 to show only 1 slide at a time i.e full width'; ?>.
				</p>
			</td>
			<!-- ****** Slide To Scroll ******-->
			<td>
				<label><?php echo 'Slide To Scroll'; ?></label>
				<?php if(!isset($AQSS_L3_Slide_To_Scroll)) $AQSS_L3_Slide_To_Scroll = 1; ?>
				<input type="text" name="aqss-l3-slide-to-scroll" id="aqss-l3-slide-to-scroll" value="<?php echo $AQSS_L3_Slide_To_Scroll; ?>">
				<p class="description">
					<?php echo 'Set how many slide to scroll at a time. Default is 1 to scroll only 1 slide at a time i.e full width'; ?>.
				</p>
			</td>
			
		</tr>
	<?php } ?>
		
		<tr id="L3">
			<!-- ****** Auto Play Slide Show ******-->
			<td>
				<label><?php echo 'Auto Play Slide Show'; ?></label>
				<?php if(!isset($AQSS_L3_Auto_Slideshow)) $AQSS_L3_Auto_Slideshow = 0; ?>
				<input type="radio" name="aqss-l3-auto-slide" id="aqss-l3-auto-slide" value="0" <?php if($AQSS_L3_Auto_Slideshow == 0 ) { echo "checked"; } ?>> <?php echo 'Yes'; ?> &nbsp;&nbsp;
				
				<input type="radio" name="aqss-l3-auto-slide" id="aqss-l3-auto-slide" value="1" <?php if($AQSS_L3_Auto_Slideshow == 1 ) { echo "checked"; } ?>> <?php echo 'No'; ?>
				<p class="description">
					<?php echo 'Select Yes/No option to auto slide enable or disable into slider'; ?>.
				</p>
			</td>
			<!-- ****** Infinite Scroll ******-->
			<td>
				<label><?php echo 'Infinite Scroll'; ?></label>
				<?php if(!isset($AQSS_L3_Infinite_Scroll)) $AQSS_L3_Infinite_Scroll = 0; ?>
				<input type="radio" name="aqss-l3-infinite-scroll" id="aqss-l3-infinite-scroll" value="1" <?php if($AQSS_L3_Infinite_Scroll == 1 ) { echo "checked"; } ?>> <?php echo 'Yes'; ?> &nbsp;&nbsp;
				
				<input type="radio" name="aqss-l3-infinite-scroll" id="aqss-l3-infinite-scroll" value="0" <?php if($AQSS_L3_Infinite_Scroll == 0 ) { echo "checked"; } ?>> <?php echo 'No'; ?>
				<p class="description">
				
					<?php echo 'Select Yes option to scroll slider infinite'; ?>.
				</p>
			</td>
		</tr>
		<tr id="L3">
			<!-- ****** Display Slider Title and Description ******-->
			<td>
				<label><?php echo'Display Slider Title and Description'; ?></label>
				<?php if(!isset($AQSS_L3_Slide_Title)) $AQSS_L3_Slide_Title = 1; ?>
				<input type="radio" name="aqss-l3-slide-title" id="aqss-l3-slide-title" value="1" <?php if($AQSS_L3_Slide_Title == 1 ) { echo "checked"; } ?>> Yes &nbsp;&nbsp;
				<input type="radio" name="aqss-l3-slide-title" id="aqss-l3-slide-title" value="0" <?php if($AQSS_L3_Slide_Title == 0 ) { echo "checked"; } ?>> No
				<p class="description">
					<?php echo 'Select Yes/No option to show/hide slide title above slider'; ?>.
				</p>
			</td>
			<!-- ****** Show Navigation Bullets ******-->
			<td>
				<label><?php echo 'Show Navigation Bullets'; ?></label>
				<?php if(!isset($AQSS_L3_Navigation_Button)) $AQSS_L3_Navigation_Button = 1; ?>
				<input type="radio" name="aqss-l3-navigation-button" id="aqss-l3-navigation-button" value="1" <?php if($AQSS_L3_Navigation_Button == 1 ) { echo "checked"; } ?>> <i class="fa fa-check fa-2x"></i> &nbsp;&nbsp;
				<input type="radio" name="aqss-l3-navigation-button" id="aqss-l3-navigation-button" value="0" <?php if($AQSS_L3_Navigation_Button == 0 ) { echo "checked"; } ?>> <i class="fa fa-times fa-2x"></i>
				<p class="description">
					<?php echo 'Select Yes/No option to show or hide slider navigation buttons under image slider'; ?>.
				</p>
			</td>
		</tr>
				
		
		<tr id="L3">
			<!-- ****** Autoplay Transition Speed ******-->	
			<td>
				<label><?php echo 'Autoplay Transition Speed'; ?></label>
				<?php if(!isset($AQSS_L3_Transition_Speed)) $AQSS_L3_Transition_Speed = 5000; ?>
				<input type="text" name="aqss-l3-transition-speed" id="aqss-l3-transition-speed" value="<?php echo $AQSS_L3_Transition_Speed; ?>">
				<p class="description">
					<?php echo 'Set your desired transition speed of slides. Default width is 5000px'; ?>.
				</p>
			</td>
			<!-- ****** Font Style ******-->
			<td>
				<label><?php echo "Font Style"; ?></label>
				<?php if(!isset($AQSS_L3_Font_Style)) $AQSS_L3_Font_Style = "Arial";?>	
				<select name="aqss-l3-font-style" id="aqss-l3-font-style" class="standard-dropdown" >
					<optgroup label="Default Fonts">
						<option value="Arial"           <?php if($AQSS_L3_Font_Style == 'Arial' ) { echo "selected"; } ?>>Arial</option>
						<option value="Arial Black"    <?php if($AQSS_L3_Font_Style == 'Arial Black' ) { echo "selected"; } ?>>Arial Black</option>
						<option value="Courier New"     <?php if($AQSS_L3_Font_Style == 'Courier New' ) { echo "selected"; } ?>>Courier New</option>
						<option value="Georgia"         <?php if($AQSS_L3_Font_Style == 'Georgia' ) { echo "selected"; } ?>>Georgia</option>
						<option value="Grande"          <?php if($AQSS_L3_Font_Style == 'Grande' ) { echo "selected"; } ?>>Grande</option>
						<option value="Helvetica" 	<?php if($AQSS_L3_Font_Style == 'Helvetica' ) { echo "selected"; } ?>>Helvetica Neue</option>
						<option value="Impact"         <?php if($AQSS_L3_Font_Style == 'Impact' ) { echo "selected"; } ?>>Impact</option>
						<option value="Lucida"         <?php if($AQSS_L3_Font_Style == 'Lucida' ) { echo "selected"; } ?>>Lucida</option>
						<option value="Lucida Grande"         <?php if($AQSS_L3_Font_Style == 'Lucida Grande' ) { echo "selected"; } ?>>Lucida Grande</option>
						<option value="_OpenSansBold"   <?php if($AQSS_L3_Font_Style == '_OpenSansBold' ) { echo "selected"; } ?>>OpenSansBold</option>
						<option value="Palatino Linotype"       <?php if($AQSS_L3_Font_Style == 'Palatino Linotype' ) { echo "selected"; } ?>>Palatino</option>
						<option value="Sans"           <?php if($AQSS_L3_Font_Style == 'Sans' ) { echo "selected"; } ?>>Sans</option>
						<option value="sans-serif"           <?php if($AQSS_L3_Font_Style == 'sans-serif' ) { echo "selected"; } ?>>Sans-Serif</option>
						<option value="Tahoma"         <?php if($AQSS_L3_Font_Style == 'Tahoma' ) { echo "selected"; } ?>>Tahoma</option>
						<option value="Times New Roman"          <?php if($AQSS_L3_Font_Style == 'Times New Roman' ) { echo "selected"; } ?>>Times New Roman</option>
						<option value="Trebuchet"      <?php if($AQSS_L3_Font_Style == 'Trebuchet' ) { echo "selected"; } ?>>Trebuchet</option>
						<option value="Verdana"        <?php if($AQSS_L3_Font_Style == 'Verdana' ) { echo "selected"; } ?>>Verdana</option>
					</optgroup>
				</select>
				<p class="description"><?php echo "Choose a caption font style."; ?></p>
			</td>
		</tr>
		
		<tr id="L3">
			<!-- ****** Slide Title Color ******-->
			<td>
				<label><?php echo 'Slide Title Color'; ?></label>
				<?php if(!isset($AQSS_L3_Title_Color)) $AQSS_L3_Title_Color = "#000000"; ?>
				<input class="jscolor colortc" id="aqss-l3-title-color" name="aqss-l3-title-color" value="<?php echo $AQSS_L3_Title_Color; ?>">
				<p class="description">
					<?php echo 'Select a color to set slide title color'; ?>.
				</p>
			</td>
			<!-- ****** Slide Title Background Color ******-->
			<td>
				<label><?php echo 'Slide Title Background Color'; ?></label>
				<?php if(!isset($AQSS_L3_Title_BgColor)) $AQSS_L3_Title_BgColor = "#FFFFFF"; ?>
				<input class="jscolor colortb" id="aqss-l3-title-bgcolor" name="aqss-l3-title-bgcolor" value="<?php echo $AQSS_L3_Title_BgColor; ?>">
				<p class="description">
					<?php echo 'Select a color to set slide title background color'; ?>.
				</p>
			</td>
		</tr>
		
		<tr id="L3">
			<!-- ****** Slide Description Color ******-->
			<td>
				<label><?php echo 'Slide Description Color'; ?></label>
				<?php if(!isset($AQSS_L3_Desc_Color)) $AQSS_L3_Desc_Color = "#FFFFFF"; ?>
				<input class="jscolor colordc" id="aqss-l3-desc-color" name="aqss-l3-desc-color" value="<?php echo $AQSS_L3_Desc_Color; ?>">

				<p class="description">
					<?php echo 'Select a color to set slide description color'; ?>.
				</p>
			</td>
			<!-- ****** Slide Description Background Color ******-->
			<td>
				<label><?php echo 'Slide Description Background Color'; ?></label>
				<?php if(!isset($AQSS_L3_Desc_BgColor)) $AQSS_L3_Desc_BgColor = "#000000"; ?>
				<input class="jscolor colordb" id="aqss-l3-desc-bgcolor" name="aqss-l3-desc-bgcolor" value="<?php echo $AQSS_L3_Desc_BgColor; ?>">
				<p class="description">
					<?php echo 'Select a color to set slide description background color'; ?>.
				</p>
			</td>
		</tr>
	</tbody>
</table>