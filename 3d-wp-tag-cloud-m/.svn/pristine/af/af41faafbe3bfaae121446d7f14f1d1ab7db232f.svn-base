<?php 
/*
3D WP Tag Cloud: Page/Post Links CP Template
*/
?>
	<div class="section_content">
		<div style="float: left;">
			<span style="padding-bottom: 5px;">GENERAL</span>
			<div style="padding-top: 5px;">
				<label style="margin: 0 10px 0 0;" title="Legend:<br>
					<b style='font-size: 26px; line-height: 5px; position: relative; top: 10px;'>*</b> Shapes that use specific number of tags.
					<br>----------<br>See <span style='font-weight: bold; color: #dc143c;'>GUIDE & TIPS</span> > 
					<span style='font-weight: bold; color: #444;'>Shape Tips</span> for tips on selection." 
					for="<?=$this->get_field_id('ppl_shape'); ?>">
					Shape
					<br>
					<select id="<?=$this->get_field_id('ppl_shape'); ?>" name="<?=$this->get_field_name('ppl_shape'); ?>" onchange="change_limits(this.id, '', this.value, 'ppl')";>
						<option value="a" <?php if( $ppl_shape == "a" ){ echo ' selected'; } ?>>A (3D)</option>
						<option value="antenna" <?php if( $ppl_shape == "antenna" ){ echo ' selected'; } ?>>Antenna* (3D)</option>
						<option value="apple" <?php if( $ppl_shape == "apple" ){ echo ' selected'; } ?>>Apple - 1 (2D)</option>
						<option value="apple2" <?php if( $ppl_shape == "apple2" ){ echo ' selected'; } ?>>Apple - 2 (3D)</option>
						<option value="axes" <?php if( $ppl_shape == "axes" ){ echo ' selected'; } ?>>Axes (3D)</option>
						<option value="balloon" <?php if( $ppl_shape == "balloon" ){ echo ' selected'; } ?>>Balloon (3D)</option>
						<option value="balls" <?php if( $ppl_shape == "balls" ){ echo ' selected'; } ?>>Balls (3D)</option>
						<option value="beam" <?php if( $ppl_shape == "beam" ){ echo ' selected'; } ?>>Beam (1D)</option>
						<option value="blackhole" <?php if( $ppl_shape == "blackhole" ){ echo ' selected'; } ?>>Black Hole (3D)</option>
						<option value="blossom" <?php if( $ppl_shape == "blossom" ){ echo ' selected'; } ?>>Blossom (3D)</option>
						<option value="bowtie" <?php if( $ppl_shape == "bowtie" ){ echo ' selected'; } ?>>Bowtie (3D)</option>
						<option value="bulb" <?php if( $ppl_shape == "bulb" ){ echo ' selected'; } ?>>Bulb (3D)</option>
						<option value="butterfly" <?php if( $ppl_shape == "butterfly" ){ echo ' selected'; } ?>>Butterfly (3D)</option>
						<option value="candy" <?php if( $ppl_shape == "candy" ){ echo ' selected'; } ?>>Candy (3D)</option>
						<option value="capsule" <?php if( $ppl_shape == "capsule" ){ echo ' selected'; } ?>>Capsule (3D)</option>
						<option value="circles" <?php if( $ppl_shape == "circles" ){ echo ' selected'; } ?>>Circles* (3D)</option>
						<option value="crown" <?php if( $ppl_shape == "crown" ){ echo ' selected'; } ?>>Crown (3D)</option>
						<option value="cube" <?php if( $ppl_shape == "cube" ){ echo ' selected'; } ?>>Cube* (3D)</option>
						<option value="hcylinder" <?php if( $ppl_shape == "hcylinder" ){ echo ' selected'; } ?>>Cylinder, horizontal (3D)</option>
						<option value="vcylinder" <?php if( $ppl_shape == "vcylinder" ){ echo ' selected'; } ?>>Cylinder, vertical (3D)</option>
						<option value="dancers" <?php if( $ppl_shape == "dancers" ){ echo ' selected'; } ?>>Dancers (3D)</option>
						<option value="diaminity" <?php if( $ppl_shape == "diaminity" ){ echo ' selected'; } ?>>Diaminity (3D)</option>
						<option value="diamond" <?php if( $ppl_shape == "diamond" ){ echo ' selected'; } ?>>Diamond (3D)</option>
						<option value="hdna" <?php if( $ppl_shape == "hdna" ){ echo ' selected'; } ?>>DNA, horizontal (3D)</option>
						<option value="vdna" <?php if( $ppl_shape == "vdna" ){ echo ' selected'; } ?>>DNA, vertical (3D)</option>
						<option value="domes" <?php if( $ppl_shape == "domes" ){ echo ' selected'; } ?>>Domes (3D)</option>
						<option value="earing" <?php if( $ppl_shape == "earing" ){ echo ' selected'; } ?>>Earing (3D)</option>
						<option value="egg" <?php if( $ppl_shape == "egg" ){ echo ' selected'; } ?>>Egg (3D)</option>
						<option value="eggbox" <?php if( $ppl_shape == "eggbox" ){ echo ' selected'; } ?>>Egg Box (3D)</option>
						<option value="excavator" <?php if( $ppl_shape == "excavator" ){ echo ' selected'; } ?>>Excavator (2D)</option>
						<option value="fir" <?php if( $ppl_shape == "fir" ){ echo ' selected'; } ?>>Fir* (3D)</option>
						<option value="fish" <?php if( $ppl_shape[$i] == "fish" ){ echo ' selected'; } ?>>Fish - 1 (2D)</option>
						<option value="fish2" <?php if( $ppl_shape[$i] == "fish2" ){ echo ' selected'; } ?>>Fish - 2 (2D)</option>
						<option value="glass" <?php if( $ppl_shape == "glass" ){ echo ' selected'; } ?>>Glass (3D)</option>
						<option value="globe" <?php if( $ppl_shape == "globe" ){ echo ' selected'; } ?>>Globe of Rings (3D)</option>
						<option value="heart" <?php if( $ppl_shape == "heart" ){ echo ' selected'; } ?>>Heart (2D)</option>
						<option value="hexagon" <?php if( $ppl_shape == "hexagon" ){ echo ' selected'; } ?>>Hexagon (Bee Cell)* (2D)</option>
						<option value="infinity1" <?php if( $ppl_shape == "infinity1" ){ echo ' selected'; } ?>>Infinity - 1 (3D)</option>
						<option value="infinity2" <?php if( $ppl_shape == "infinity2" ){ echo ' selected'; } ?>>Infinity - 2 (3D)</option>
						<option value="insect" <?php if( $ppl_shape == "insect" ){ echo ' selected'; } ?>>Insect (3D)</option>
						<option value="knot" <?php if( $ppl_shape == "knot" ){ echo ' selected'; } ?>>Knot (3D)</option>
						<option value="lemon" <?php if( $ppl_shape == "lemon" ){ echo ' selected'; } ?>>Lemon (3D)</option>
						<option value="lissajous" <?php if( $ppl_shape == "lissajous" ){ echo ' selected'; } ?>>Lissajous (3D)</option>
						<option value="love" <?php if( $ppl_shape == "love" ){ echo ' selected'; } ?>>Love (3D)</option>
						<option value="m" <?php if( $ppl_shape == "m" ){ echo ' selected'; } ?>>M (3D)</option>
						<option value="mobius" <?php if( $ppl_shape == "mobius" ){ echo ' selected'; } ?>>Möbius Fan (3D)</option>
						<option value="monster" <?php if( $ppl_shape == "monster" ){ echo ' selected'; } ?>>Monster (3D)</option>
						<option value="n" <?php if( $ppl_shape == "n" ){ echo ' selected'; } ?>>N (3D)</option>
						<option value="o" <?php if( $ppl_shape == "o" ){ echo ' selected'; } ?>>O (3D)</option>
						<option value="owl" <?php if( $ppl_shape == "owl" ){ echo ' selected'; } ?>>Owlish (3D)</option>
						<option value="pear" <?php if( $ppl_shape == "pear" ){ echo ' selected'; } ?>>Pearish (3D)</option>
						<option value="hcones" <?php if( $ppl_shape == "hcones" ){ echo ' selected'; } ?>>Peg top around X-axis* (3D)</option>
						<option value="vcones" <?php if( $ppl_shape == "vcones" ){ echo ' selected'; } ?>>Peg top around Y-axis* (3D)</option>
						<option value="pillow" <?php if( $ppl_shape == "pillow" ){ echo ' selected'; } ?>>Pillow (3D)</option>
						<option value="rim" <?php if( $ppl_shape == "rim" ){ echo ' selected'; } ?>>Rim (3D)</option>
						<option value="hring" <?php if( $ppl_shape == "hring" ){ echo ' selected'; } ?>>Ring around X-axis (3D)</option>
						<option value="vring" <?php if( $ppl_shape == "vring" ){ echo ' selected'; } ?>>Ring around Y-axis (3D)</option>
						<option value="rings" <?php if( $ppl_shape == "rings" ){ echo ' selected'; } ?>>Rings Knotwork (3D)</option>
						<option value="roller" <?php if( $ppl_shape == "roller" ){ echo ' selected'; } ?>>Roller of rings (3D)</option>
						<option value="roundabout" <?php if( $ppl_shape == "roundabout" ){ echo ' selected'; } ?>>Roundabout (3D)</option>
						<option value="sandglass" <?php if( $ppl_shape == "sandglass" ){ echo ' selected'; } ?>>Sandglass (3D)</option>
						<option value="saturn" <?php if( $ppl_shape == "saturn" ){ echo ' selected'; } ?>>Saturn (3D)</option>
						<option value="sphere" <?php if( $ppl_shape == "sphere" ){ echo ' selected'; } ?>>Sphere (3D)</option>
						<option value="spiral" <?php if( $ppl_shape == "spiral" ){ echo ' selected'; } ?>>Spiral* (2D)</option>
						<option value="spiral3" <?php if( $ppl_shape == "spiral3" ){ echo ' selected'; } ?>>Spring (3D)</option>
						<option value="square" <?php if( $ppl_shape == "square" ){ echo ' selected'; } ?>>Square* (2D)</option>
						<option value="stairs" <?php if( $ppl_shape == "stairs" ){ echo ' selected'; } ?>>Staircase (3D)</option>
						<option value="star" <?php if( $ppl_shape == "star" ){ echo ' selected'; } ?>>Star - 1 (2D)</option>
						<option value="star2" <?php if( $ppl_shape == "star2" ){ echo ' selected'; } ?>>Star - 2 (3D)</option>
						<option value="starwars1" <?php if( $ppl_shape == "starwars1" ){ echo ' selected'; } ?>>Star Wars - 1 (3D)</option>
						<option value="starwars2" <?php if( $ppl_shape == "starwars2" ){ echo ' selected'; } ?>>Star Wars - 2 (3D)</option>
						<option value="starwars3" <?php if( $ppl_shape == "starwars3" ){ echo ' selected'; } ?>>Star Wars - 3 (3D)</option>
						<option value="starwars4" <?php if( $ppl_shape == "starwars4" ){ echo ' selected'; } ?>>Star Wars - 4 (3D)</option>
						<option value="stool" <?php if( $ppl_shape == "stool" ){ echo ' selected'; } ?>>Stool (3D)</option>
						<option value="teardrop" <?php if( $ppl_shape == "teardrop" ){ echo ' selected'; } ?>>Teardrop (2D)</option>
						<option value="tire" <?php if( $ppl_shape == "tire" ){ echo ' selected'; } ?>>Tire (3D)</option>
						<option value="torus" <?php if( $ppl_shape == "torus" ){ echo ' selected'; } ?>>Torus (3D)</option>
						<option value="tower" <?php if( $ppl_shape == "tower" ){ echo ' selected'; } ?>>Tower of rings (3D)</option>
						<option value="triangle" <?php if( $ppl_shape == "triangle" ){ echo ' selected'; } ?>>Triangle* (2D)</option>
						<option value="pyramid" <?php if( $ppl_shape == "pyramid" ){ echo ' selected'; } ?>>Triangle Pyramid* (3D)</option>
						<option value="ufo" <?php if( $ppl_shape == "ufo" ){ echo ' selected'; } ?>>UFO (3D)</option>
						<option value="v" <?php if( $ppl_shape == "v" ){ echo ' selected'; } ?>>V (3D)</option>
						<option value="w" <?php if( $ppl_shape == "w" ){ echo ' selected'; } ?>>W (3D)</option>
						<option value="wall_e" <?php if( $ppl_shape == "wall_e" ){ echo ' selected'; } ?>>Wall-E's Eyes (3D)</option>
						<option value="walnut" <?php if( $ppl_shape == "walnut" ){ echo ' selected'; } ?>>Walnut (3D)</option>
						<option value="wings" <?php if( $ppl_shape == "wings" ){ echo ' selected'; } ?>>Wings (3D)</option>
						<option value="x" <?php if( $ppl_shape == "x" ){ echo ' selected'; } ?>>X (3D)</option>
						<option value="y" <?php if( $ppl_shape == "y" ){ echo ' selected'; } ?>>Y (3D)</option>
						<option value="yinyang" <?php if( $ppl_shape == "yinyang" ){ echo ' selected'; } ?>>Yin Yangish (3D)</option>
						<option value="zs" <?php if( $ppl_shape == "zs" ){ echo ' selected'; } ?>>Z/S (3D)</option>
					</select>
				</label>
				<label style="max-width: 175px;" title="The ID of a custom HTML links container. Leaving empty will load ALL current page/post links, which may include navigation links, meta tags, comments etc." for="<?=$this->get_field_id('all_ppl_id'); ?>">
					Custom Container ID 
					<br>
					<input style="width: 115px; height: 18px; font-size: 12px; line-height: 12px; padding: 2px" id="<?=$this->get_field_id('all_ppl_id'); ?>"
					name="<?=$this->get_field_name('all_ppl_id'); ?>" type="text"
					value="<?php echo $all_ppl_id; ?>" />					
					</select>
				</label>
				<div class="thick-spacer"></div>
				<div style="float: left;" title="The target option specifies where to open tag links:<br><br><span class='green'>_blank</span> - in a new window or tab;<br><span class='green'>_parent</span> - in the parent frame;<br><span class='green'>_self</span> - in the same frame as it was clicked (default);<br><span class='green'>_top</span> - in the full body of the window.">
					Target
					<br>
					<select id="<?=$this->get_field_id('ppl_target'); ?>" name="<?=$this->get_field_name('ppl_target'); ?>">
						<option value="_blank" <?php if( $ppl_target == "_blank" ){ echo ' selected'; } ?>>_blank</option>
						<option value="_parent" <?php if( $ppl_target == "_parent" ){ echo ' selected'; } ?>>_parent</option>
						<option value="_self" <?php if( $ppl_target == "_self" ){ echo ' selected'; } ?>>_self</option>
						<option value="_top" <?php if( $ppl_target == "_top" ){ echo ' selected'; } ?>>_top</option>
					</select>
				</div>
				<div style="float: left; margin: 0 0 0 12px;" title="The minimum number of tags to show in the cloud. If the number of links available is lower than this value, the list will be repeated. Shapes marked with an asterisk (*) may use the nearest downward value.">
					Min Tags
					<br>
					<select id="<?=$this->get_field_id('ppl_min_tags'); ?>" name="<?=$this->get_field_name('ppl_min_tags'); ?>">
						<?php for($i=0; $i<201; $i++){echo '<option id="ppmint_' . $i . '" value="' . $i . '"'; if($ppl_min_tags==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>
					</select>
				</div>
				<div class="thick-spacer"></div>
				<label style="margin: 0 12px 0 0;" title="Type of highlight to use" for="<?=$this->get_field_id('ppl_outline_method'); ?>">
					Outline Method
					<br>
					<select id="<?=$this->get_field_id('ppl_outline_method'); ?>" name="<?=$this->get_field_name('ppl_outline_method'); ?>">
						<option value="outline" <?php if( $ppl_outline_method == "outline" ){ echo ' selected'; } ?>>outline</option>
						<option value="classic" <?php if( $ppl_outline_method == "classic" ){ echo ' selected'; } ?>>classic</option>
						<option value="block" <?php if( $ppl_outline_method == "block" ){ echo ' selected'; } ?>>block</option>
						<option value="color" <?php if( $ppl_outline_method == "color" ){ echo ' selected'; } ?>>color</option>
						<option value="size" <?php if( $ppl_outline_method == "size" ){ echo ' selected'; } ?>>size</option>
						<option value="none" <?php if( $ppl_outline_method == "none" ){ echo ' selected'; } ?>>none</option>
					</select>
				</label>
				<label style="margin: 0 10px 0 0; float: left;" title="The size of the pattern (0 for no dash pattern):<br>Applies for 'outline' and 'clasic' <span class='green'>Outline Method</span>." for="<?=$this->get_field_id('ppl_outline_dash'); ?>">
					Dash
					<br>
					<select id="<?=$this->get_field_id('ppl_outline_dash'); ?>" name="<?=$this->get_field_name('ppl_outline_dash'); ?>">
						<?php for($i=0; $i<61; $i++){echo '<option id="aredash_' . $i . '" value="' . $i . '"'; if($ppl_outline_dash==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>
					</select>px
				</label>
				<label style="margin: 0 10px 0 0; float: left;" title="The size of the gap between the dashes:<br>Applies for 'outline' and 'clasic' <span class='green'>Outline Method</span>." for="<?=$this->get_field_id('ppl_outline_dash_space'); ?>">
					Dash Space
					<br>
					<select id="<?=$this->get_field_id('ppl_outline_dash_space'); ?>" name="<?=$this->get_field_name('ppl_outline_dash_space'); ?>">
						<?php for($i=1; $i<61; $i++){echo '<option id="aredashspa_' . $i . '" value="' . $i . '"'; if($ppl_outline_dash_space==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>
					</select>px
				</label>
				<label style="float: left;" title="The speed of pattern move (0 for still pattern, minus changes the direction):<br>Applies for 'outline' and 'clasic' <span class='green'>Outline Method</span>." for="<?=$this->get_field_id('ppl_outline_dash_speed'); ?>">
					Dash Speed
					<br>
					<select id="<?=$this->get_field_id('ppl_outline_dash_speed'); ?>" name="<?=$this->get_field_name('ppl_outline_dash_speed'); ?>">
						<?php for($i=-20; $i<21; $i++){echo '<option id="aredashspe_' . $i . '" value="' . $i . '"'; if($ppl_outline_dash_speed==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>
					</select>
				</label>
				<div class="thick-spacer"></div>	
				<div style="float: left; margin: 0 20px 0 0;" title="When enabled, cloud moves when dragged instead of based on mouse position.">
					Drag<br>Control
					<div>
						<input class="radio" id="<?=$this->get_field_id('ppl_drag_ctrl'); ?>"
						name="<?=$this->get_field_name('ppl_drag_ctrl'); ?>" type="radio" value="true"
						<?php if( $ppl_drag_ctrl == "true" ){ echo ' checked="checked"'; } ?>>on
						
						<input class="radio" id="<?=$this->get_field_id('ppl_drag_ctrl'); ?>"
						name="<?=$this->get_field_name('ppl_drag_ctrl'); ?>" type="radio" value="false"
						<?php if( $ppl_drag_ctrl == "false" ){ echo ' checked="checked"'; } ?>>off
					</div>
				</div>
				<label style="margin: 0 20px 0 0;" title="Minimal opacity of tags at back of cloud." for="<?=$this->get_field_id('ppl_brightness'); ?>">
					Min<br>Opacity
					<br>
					<select id="<?=$this->get_field_id('ppl_brightness'); ?>" name="<?=$this->get_field_name('ppl_brightness'); ?>">
						<?php for($i=0; $i<105; $i+=5){echo '<option id="memb_' . $i . '" value="' . $i/100 . '"'; if($ppl_brightness==$i/100){echo ' selected';}; echo '>' . $i/100 . '</option>'; } ?>					
					</select>
				</label> 
				<label style="margin: 0 20px 0 0;" title="Pulsate outline to this opacity. Choose <span class='green'>1.0</span> for no pulsation." for="<?=$this->get_field_id('ppl_pulsate_to'); ?>">
					Pulsate<br>to Opacity
					<br>
					<select id="<?=$this->get_field_id('ppl_pulsate_to'); ?>" name="<?=$this->get_field_name('ppl_pulsate_to'); ?>">
						<?php for($i=0; $i<11; $i++){echo '<option id="mepus_' . $i . '" value="' . $i/10 . '"'; if($ppl_pulsate_to==$i/10){echo ' selected';}; echo '>' . $i/10 . '</option>'; } ?>
					</select>
				</label>
				<label for="<?=$this->get_field_id('ppl_lock'); ?>" title="Limits rotation of the cloud using the mouse:<br><span class='green'>x-axis</span> - limits rotation to the x-axis;<br><span class='green'>y-axis</span> - limits rotation to the y-axis;<br><span class='green'>both</span> - locks the cloud in response to the mouse. It will only move if the <span class='green'>Initial Speed</span> option gives it a starting speed.<b><br>N.B.</b> Since Z rotation can't be controlled by mouse it will be locked anyway.<br><span class='green'>none</span> - leaves the cloud unlocked.">
					Lock<br>Rotation
					<br>
					<select id="<?=$this->get_field_id('ppl_lock'); ?>" name="<?=$this->get_field_name('ppl_lock'); ?>">
						<option value="x" <?php if( $ppl_lock == "x" ){ echo ' selected'; } ?>>x-axis</option>
						<option value="y" <?php if( $ppl_lock == "y" ){ echo ' selected'; } ?>>y-axis</option>
						<option value="xy" <?php if( $ppl_lock == "xy" ){ echo ' selected'; } ?>>both</option>
						<option value="none" <?php if( $ppl_lock == "none" ){ echo ' selected'; } ?>>none</option>
					</select>
				</label>
				<div class="thick-spacer"></div>	
				<label style="width: 100%;" for="<?=$this->get_field_id('ppl_tooltip'); ?>" title="Sets your canvas tooltip. For instance if the cloud allows <span class='green'>Drag Control</span> you can suggest your site visitors to 'Drag or Click'.">
				Tooltip
				<div>
					<input style="width: 100%;" id="<?=$this->get_field_id('ppl_tooltip'); ?>"
					name="<?=$this->get_field_name('ppl_tooltip'); ?>" type="text"
					value="<?php echo $ppl_tooltip; ?>" />
				</div> 
				</label>
				<label style="float: left; width: 100%; padding: 5px 0 0;" title="URL of an image to be used for Cloud Background. The image will be centered and stretched or shrunk to canvas size." for="<?=$this->get_field_id('ppl_img_url'); ?>">
					Background Image
					<input style="width: 100%;"
					id="<?=$this->get_field_id('ppl_img_url'); ?>"
					name="<?=$this->get_field_name('ppl_img_url'); ?>" type="text"
					value="<?php echo $ppl_img_url; ?>" /> 
				</label>				
			</div>
		</div>
		<div class="divider"></div>
		<div style="float: left;">
			<span style="padding-bottom: 5px;">SIZES</span>
			<div style="padding-top: 5px;">
				<label style="width: 86px;" title="Initial size of cloud from centre to sides. This option has no effect if selected shape is <span class='green'>Beam</span>." for="<?=$this->get_field_id('ppl_radius_x'); ?>">
					Radius X 
					<br>
					<select id="<?=$this->get_field_id('ppl_radius_x'); ?>" name="<?=$this->get_field_name('ppl_radius_x'); ?>">
						<?php for($i=0; $i<1505; $i+=5){echo '<option id="merx_' . $i . '" value="' . $i/100 . '"'; if($ppl_radius_x==$i/100){echo ' selected';}; echo '>' . $i/100 . '</option>'; } ?>
					</select>
				</label>				
				<label style="width: 86px;" title="Initial size of cloud from centre to top and bottom. This option has no effect if selected shape is <span class='green'>Beam</span>." for="<?=$this->get_field_id('ppl_radius_y'); ?>" >
					Radius Y 
					<br>
					<select id="<?=$this->get_field_id('ppl_radius_y'); ?>" name="<?=$this->get_field_name('ppl_radius_y'); ?>">
						<?php for($i=0; $i<1505; $i+=5){echo '<option id="mery_' . $i . '" value="' . $i/100 . '"'; if($ppl_radius_y==$i/100){echo ' selected';}; echo '>' . $i/100 . '</option>'; } ?>
					</select>
				</label>				
				<div style="width: 86px; float: left;" title="Initial size of cloud from centre to front and back. This option has no effect if selected shape is two dimensional (2D)." id="cont_<?=$this->get_field_id('ppl_radius_z'); ?>">
					Radius Z 
					<br>
					<select id="<?=$this->get_field_id('ppl_radius_z'); ?>" name="<?=$this->get_field_name('ppl_radius_z'); ?>">
						<?php for($i=0; $i<1505; $i+=5){echo '<option id="merz_' . $i . '" value="' . $i/100 . '"'; if($ppl_radius_z==$i/100){echo ' selected';}; echo '>' . $i/100 . '</option>'; } ?>
					</select>
				</div> 
				<label style="width: 70px;" title="If greater than 0, breaks the tag into multiple lines at word boundaries when the line would be longer than this value. Lines are automatically broken at line break tags." for="<?=$this->get_field_id('ppl_split_width'); ?>">
					Split Width
					<br>
					<select id="<?=$this->get_field_id('ppl_split_width'); ?>" name="<?=$this->get_field_name('ppl_split_width'); ?>">						
						<?php for($i=50; $i<155; $i+=5){echo '<option id="mespw_' . $i . '" value="' . $i . '"'; if($ppl_split_width==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>					
					</select>px
				</label>
				<div class="thick-spacer"></div>
				<label style="margin: 0 15px 0 0;" title="Height of the tag text font" for="<?=$this->get_field_id('ppl_fontsize'); ?>">
					Font Size
					<br>
					<select id="<?=$this->get_field_id('ppl_fontsize'); ?>" name="<?=$this->get_field_name('ppl_fontsize'); ?>">
						<?php for($i=6; $i<31; $i++){echo '<option id="ppfs_' . $i . '" value="' . $i . '"'; if($ppl_fontsize==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>	
					</select>px
				</label>
				<div style="float: left; margin: 0 15px 0 0;" title="Border of the tags">
					<div>
						Border
					</div>
					<div  style="float: left;">
						<input class="radio" id="<?=$this->get_field_id('ppl_borderwidth'); ?>"
						name="<?=$this->get_field_name('ppl_borderwidth'); ?>" type="radio" value="1"
						<?php if( $ppl_borderwidth == "1" ){ echo ' checked="checked"'; } ?>>on
						<br>
						<input class="radio" id="<?=$this->get_field_id('ppl_borderwidth'); ?>"
						name="<?=$this->get_field_name('ppl_borderwidth'); ?>" type="radio" value="0"
						<?php if( $ppl_borderwidth == "0" ){ echo ' checked="checked"'; } ?>>off
					</div>
				</div>	
				<div style="float: left; margin: 0 15px 0 0; padding: 0 0 2px 2px; border: 1px dotted #aaa; border-radius: 5px;" title="X and Y offset of the tag shadow">
					Shadow Offset [x, y]
					<br>
					<select id="<?=$this->get_field_id('ppl_shadowoff_x'); ?>" name="<?=$this->get_field_name('ppl_shadowoff_x'); ?>">						
						<?php for($i=-5; $i<6; $i++){echo '<option id="ppsox_' . $i . '" value="' . $i . '"'; if($ppl_shadowoff_x==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>							
					</select><select id="<?=$this->get_field_id('ppl_shadowoff_y'); ?>" name="<?=$this->get_field_name('ppl_shadowoff_y'); ?>">						
						<?php for($i=-5; $i<6; $i++){echo '<option id="ppsoy_' . $i . '" value="' . $i . '"'; if($ppl_shadowoff_y==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>							
					</select>px
				</div>
				<label style="margin: 0 0 5px;" title="Shadow behind each Menu tag" for="<?=$this->get_field_id('ppl_shadowblur'); ?>">
					Shadow Blur
					<br>
					<select id="<?=$this->get_field_id('ppl_shadowblur'); ?>" name="<?=$this->get_field_name('ppl_shadowblur'); ?>">
						<?php for($i=0; $i<6; $i++){echo '<option id="ppshb_' . $i . '" value="' . $i . '"'; if($ppl_shadowblur==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>												
					</select>px
				</label>
				<div class="thin-spacer"></div>
				<label style="width: 86px;" title="Amount to scale images by. The value of <span class='green'>1.0</span> uses the size of avatars (96x96px)." for="<?=$this->get_field_id('ppl_image_scale'); ?>">
					Image Scale
					<br>
					<select id="<?=$this->get_field_id('ppl_image_scale'); ?>" name="<?=$this->get_field_name('ppl_image_scale'); ?>">
						<?php for($i=25; $i<1525; $i+=25){echo '<option id="autims_' . $i . '" value="' . $i/1000 . '"'; if($ppl_image_scale==$i/1000){echo ' selected';}; echo '>' . $i/1000 . '</option>'; } ?>					
					</select>
				</label>
				<label style="width: 86px;" title="Radius for image corners" for="<?=$this->get_field_id('ppl_image_radius'); ?>">
					Image Radius
					<br>
					<select id="<?=$this->get_field_id('ppl_image_radius'); ?>" name="<?=$this->get_field_name('ppl_image_radius'); ?>">
						<?php for($i=0; $i<62; $i++){echo '<option id="autimr_' . $i . '" value="' . $i . '"'; if($ppl_image_radius==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>					
					</select>px
				</label>
				<div class="thin-spacer"></div>
			</div>
		</div>
		<div class="divider"></div>
		<div style="float: left;">
			<span style="padding-bottom: 5px;">MIXED IMAGE & TEXT</span>
			<br>
			<div style="padding-top: 5px; display: inline-block;">
				<label style="margin: 0 25px 0 0;" title="What to display when tag contains images and text:<br><span class='green'>null</span> - Image if present, otherwise text;<br><span class='green'>image</span> - Image tags only;<br><span class='green'>text</span> - Text tags only;<br><span class='green'>both</span> - Image and text on tag using <span class='green'>Image Position</span>." for="<?=$this->get_field_id('ppl_image_mode'); ?>">
					<br>
					Tag Mode
					<br>
					<select id="<?=$this->get_field_id('ppl_image_mode'); ?>" name="<?=$this->get_field_name('ppl_image_mode'); ?>">
						<option value="" <?php if( $ppl_image_mode == "" ){ echo ' selected'; } ?>>null</option>
						<option value="image" <?php if( $ppl_image_mode == "image" ){ echo ' selected'; } ?>>image</option>
						<option value="text" <?php if( $ppl_image_mode == "text" ){ echo ' selected'; } ?>>text</option>
						<option value="both" <?php if( $ppl_image_mode == "both" ){ echo ' selected'; } ?>>both</option>
					</select>
				</label>
				<label style="margin: 0 25px 0 0;" title="Position of image relative to text when using an <span class='green'>Tag Mode</span> of <span class='green'>both</span>." for="<?=$this->get_field_id('ppl_image_position'); ?>">
					Image<br>Position
					<br>
					<select id="<?=$this->get_field_id('ppl_image_position'); ?>" name="<?=$this->get_field_name('ppl_image_position'); ?>">
						<option value="left" <?php if( $ppl_image_position == "left" ){ echo ' selected'; } ?>>left</option>
						<option value="right" <?php if( $ppl_image_position == "right" ){ echo ' selected'; } ?>>right</option>
						<option value="top" <?php if( $ppl_image_position == "top" ){ echo ' selected'; } ?>>top</option>
						<option value="bottom" <?php if( $ppl_image_position == "bottom" ){ echo ' selected'; } ?>>bottom</option>
					</select>
				</label>
				<label style="margin: 0 25px 0 0;" title="Distance between image and text when using an <span class='green'>Tag Mode</span> of <span class='green'>both</span>." for="<?=$this->get_field_id('ppl_image_padding'); ?>">
					Image<br>Padding
					<br>
					<select id="<?=$this->get_field_id('ppl_image_padding'); ?>" name="<?=$this->get_field_name('ppl_image_padding'); ?>">	
						<?php for($i=1; $i<6; $i++){echo '<option id="ppimpa_' . $i . '" value="' . $i . '"'; if($ppl_image_padding==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>	
					</select>px
				</label>
			</div>
			<div style="padding-top: 5px; display: inline-block;">
				<label style="margin: 0 20px 0 0;" title="Horizontal image alignment" for="<?=$this->get_field_id('ppl_image_align'); ?>">
					Horizontal<br>Image Align
					<br>
					<select id="<?=$this->get_field_id('ppl_image_align'); ?>" name="<?=$this->get_field_name('ppl_image_align'); ?>">
						<option value="left" <?php if( $ppl_image_align == "left" ){ echo ' selected'; } ?>>left</option>
						<option value="centre" <?php if( $ppl_image_align == "centre" ){ echo ' selected'; } ?>>center</option>
						<option value="right" <?php if( $ppl_image_align == "right" ){ echo ' selected'; } ?>>right</option>
					</select>
				</label>
				<label style="margin: 0 20px 0 0;" title="Vertical image alignment" for="<?=$this->get_field_id('ppl_image_valign'); ?>">
					Vertical<br>Image Align
					<br>
					<select id="<?=$this->get_field_id('ppl_image_valign'); ?>" name="<?=$this->get_field_name('ppl_image_valign'); ?>">
						<option value="top" <?php if( $ppl_image_valign == "top" ){ echo ' selected'; } ?>>top</option>
						<option value="middle" <?php if( $ppl_image_valign == "middle" ){ echo ' selected'; } ?>>middle</option>
						<option value="bottom" <?php if( $ppl_image_valign == "bottom" ){ echo ' selected'; } ?>>bottom</option>
					</select>
				</label>
				<label style="margin: 0 20px 0 0;" title="Horizontal text alignment" for="<?=$this->get_field_id('ppl_text_align'); ?>">
					Horizontal<br>Text Align
					<br>
					<select id="<?=$this->get_field_id('ppl_text_align'); ?>" name="<?=$this->get_field_name('ppl_text_align'); ?>">
						<option value="left" <?php if( $ppl_text_align == "left" ){ echo ' selected'; } ?>>left</option>
						<option value="centre" <?php if( $ppl_text_align == "centre" ){ echo ' selected'; } ?>>center</option>
						<option value="right" <?php if( $ppl_text_align == "right" ){ echo ' selected'; } ?>>right</option>
					</select>
				</label>
				<label title="Vertical text alignment" for="<?=$this->get_field_id('ppl_text_valign'); ?>">
					Vertical<br>Text Align
					<br>
					<select id="<?=$this->get_field_id('ppl_text_valign'); ?>" name="<?=$this->get_field_name('ppl_text_valign'); ?>">
						<option value="top" <?php if( $ppl_text_valign == "top" ){ echo ' selected'; } ?>>top</option>
						<option value="middle" <?php if( $ppl_text_valign == "middle" ){ echo ' selected'; } ?>>middle</option>
						<option value="bottom" <?php if( $ppl_text_valign == "bottom" ){ echo ' selected'; } ?>>bottom</option>
					</select>
				</label>				
			</div>
		</div>
		<div class="divider"></div>
		<div style="float: left; height: 67px;">
			<span style="padding-bottom: 5px;">COLORS</span>
			<div style="padding-top: 5px;">
				<label style="margin: 0 3px 0 0; height: 30px;" for="<?=$this->get_field_id('ppl_text_color'); ?>">
					Tag Color
					<br>
					<span class="hash">#</span>
					<div class="siwraper">
						<input title="Color of the tag text: Empty to use the color of the original link." 
						class="colors" id="<?=$this->get_field_id('ppl_text_color'); ?>"
						name="<?=$this->get_field_name('ppl_text_color'); ?>" type="text"
						value="<?php echo $ppl_text_color; ?>" onblur="hex_val_check(this, this.value)" />
						<?php 
							if($ppl_text_color != '') {echo '<span class="color" style="color: #' . $ppl_text_color . ';">&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;</span>';}; 
						?>
					</div>
				</label>
				<label style="margin: 0 3px 0 0;" for="<?=$this->get_field_id('ppl_bg_color'); ?>">
					Background
					<br>
					<span class="hash">#</span>
					<div class="siwraper" style="text-align: center;">
						<input title="Background color of tags: Empty for no background. The string <span class='green'>'tag'</span> means use of the original link background color."
						class="colors" id="<?=$this->get_field_id('ppl_bg_color'); ?>"
						name="<?=$this->get_field_name('ppl_bg_color'); ?>" type="text"
						value="<?php echo $ppl_bg_color; ?>" onblur="hex_val_check(this, this.value)" /> 
						<?php 
							if($ppl_bg_color != '' && $ppl_bg_color != 'tag') {echo '<span class="color" style="color: #' . $ppl_bg_color . ';">&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;</span>';}
							else {if($ppl_bg_color == 'tag'){echo '<span class="color" style="background: #fff; padding: 0 1px; letter-spacing: 0;">original color</span>';}};
						?>
					</div>
				</label>
				<label style="margin: 0 3px 0 0;" for="<?=$this->get_field_id('ppl_bg_outline'); ?>">
					Border
					<br>
					<span class="hash">#</span>
					<div class="siwraper" style="text-align: center;">
						<input title="Color of tag border: Use empty option for the same as the text color: Use <span class='green'>'tag'</span> for the original link text color."
						class="colors" id="<?=$this->get_field_id('ppl_bg_outline'); ?>"
						name="<?=$this->get_field_name('ppl_bg_outline'); ?>" type="text"
						value="<?php echo $ppl_bg_outline; ?>" onblur="hex_val_check(this, this.value)" /> 
						<?php 
							if($ppl_bg_outline != '' && $ppl_bg_outline != 'tag') {echo '<span class="color" style="color: #' . $ppl_bg_outline . ';">&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;</span>';}
							else {if($ppl_bg_outline == 'tag'){echo '<span class="color" style="background: #fff; padding: 0 1px; letter-spacing: 0;">original color</span>';}};
						?>
					</div>
				</label>
				<label style="margin: 0 3px 0 0;" for="<?=$this->get_field_id('ppl_shadow'); ?>">
					Shadow
					<br>
					<span class="hash">#</span>
					<div class="siwraper">
						<input title="Color of the shadow behind each tag: Empty for no shadow."
						class="colors" id="<?=$this->get_field_id('ppl_shadow'); ?>"
						name="<?=$this->get_field_name('ppl_shadow'); ?>" type="text"
						value="<?php echo $ppl_shadow; ?>" onblur="hex_val_check(this, this.value)" /> 
						<?php 
							if($ppl_shadow != '') {echo '<span class="color" style="color: #' . $ppl_shadow . ';">&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;</span>';}; 
						?>
					</div>
				</label>								
				<label for="<?=$this->get_field_id('ppl_outline_color'); ?>">
					Outline
					<br>
					<span class="hash">#</span>
					<div class="siwraper" style="margin: 0; text-align: center;">
						<input title="Color of the active tag highlight: This can be a color to use for all tags, or one of these options to set the color differently for each tag:<br>
						<span class='green'>'tag'</span> - uses the text color from the original tag link;<br>
						<span class='green'>'tagbg'</span> - uses the background color from the original tag link. See also the <span class='green'>'outline' Weight Mode</span> 
						for another way to set the highlight color. Empty for no outline."
						class="colors" id="<?=$this->get_field_id('ppl_outline_color'); ?>"
						name="<?=$this->get_field_name('ppl_outline_color'); ?>" type="text"
						value="<?php echo $ppl_outline_color; ?>" onblur="hex_val_check(this, this.value)" /> 
						<?php 
							if($ppl_outline_color != '' && $ppl_outline_color != 'tag' && $ppl_outline_color != 'tagbg') {echo '<span class="color" style="color: #' . $ppl_outline_color . ';">&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;</span>';}
							else {if($ppl_outline_color == 'tag'){echo '<span class="color" style="background: #fff; padding: 0 1px; letter-spacing: 0;">original color</span>';}
								else {if($ppl_outline_color == 'tagbg'){echo '<span class="color" style="background: #fff; padding: 0 1px; letter-spacing: 0;">original bg</span>';};}
							};
						?>
					</div>
				</label>
			</div>
		</div>		
		<div class="divider"></div>
		<div style="float: left;">
			<span style="padding-bottom: 5px;">FONTS</span>
			<div class="fonts" style="padding-top: 5px;">
				<label title="48 Web Safe Fonts for the tag text, grouped in 5 families:<br><span style='border: 1px solid #bbb; color: #f1f1f1;'>&#9608;</span> - Sans Serif (21);<br>
				<span style='border: 1px solid #bbb; color: #fff;'>&#9608;</span> - Serif (18);<br><span style='border: 1px solid #bbb; color: #f1f1f1;'>&#9608;</span> - Monospaced (6);<br>
				<span style='border: 1px solid #bbb; color: #fff;'>&#9608;</span> - Fantasy (2);<br><span style='border: 1px solid #bbb; color: #f1f1f1;'>&#9608;</span> - Script (1)." 
				style="float: left; margin: 0 0 5px 0;" for="<?=$this->get_field_id('all_menu_font'); ?>">
					Web Safe Font
					<br>
					<select id="<?=$this->get_field_id('ppl_text_font'); ?>" name="<?=$this->get_field_name('ppl_text_font'); ?>">
						<option style="background: #f1f1f1; font-family: Arial;" value="Arial" <?php if( $ppl_text_font == "Arial" ){ echo ' selected'; } ?>>Arial</option>
						<option style="background: #f1f1f1; font-family: Arial Black;" value="Arial Black" <?php if( $ppl_text_font == "Arial Black" ){ echo ' selected'; } ?>>Arial Black</option>
						<option style="background: #f1f1f1; font-family: Arial Narrow;" value="Arial Narrow" <?php if( $ppl_text_font == "Arial Narrow" ){ echo ' selected'; } ?>>Arial Narrow</option>
						<option style="background: #f1f1f1; font-family: Avant Garde;" value="Avant Garde" <?php if( $ppl_text_font == "Avant Garde" ){ echo ' selected'; } ?>>Avant Garde</option>
						<option style="background: #f1f1f1; font-family: Calibri;" value="Calibri" <?php if( $ppl_text_font == "Calibri" ){ echo ' selected'; } ?>>Calibri</option>
						<option style="background: #f1f1f1; font-family: Candara;" value="Candara" <?php if( $ppl_text_font == "Candara" ){ echo ' selected'; } ?>>Candara</option>
						<option style="background: #f1f1f1; font-family: Century Gothic;" value="Century Gothic" <?php if( $ppl_text_font == "Century Gothic" ){ echo ' selected'; } ?>>Century Gothic</option>
						<option style="background: #f1f1f1; font-family: Comic Sans MS;" value="Comic Sans MS" <?php if( $ppl_text_font == "Comic Sans MS" ){ echo ' selected'; } ?>>Comic Sans MS</option>
						<option style="background: #f1f1f1; font-family: Franklin Gothic Medium;" value="Franklin Gothic Medium" <?php if( $ppl_text_font == "Franklin Gothic Medium" ){ echo ' selected'; } ?>>Franklin Gothic Medium</option>
						<option style="background: #f1f1f1; font-family: Futura;" value="Futura" <?php if( $ppl_text_font == "Futura" ){ echo ' selected'; } ?>>Futura</option>
						<option style="background: #f1f1f1; font-family: Geneva;" value="Geneva" <?php if( $ppl_text_font == "Geneva" ){ echo ' selected'; } ?>>Geneva</option>
						<option style="background: #f1f1f1; font-family: Gill Sans;" value="Gill Sans" <?php if( $ppl_text_font == "Gill Sans" ){ echo ' selected'; } ?>>Gill Sans</option>
						<option style="background: #f1f1f1; font-family: Helvetica;" value="Helvetica" <?php if( $ppl_text_font == "Helvetica" ){ echo ' selected'; } ?>>Helvetica</option>
						<option style="background: #f1f1f1; font-family: Impact;" value="Impact" <?php if( $ppl_text_font == "Impact" ){ echo ' selected'; } ?>>Impact</option>
						<option style="background: #f1f1f1; font-family: Lucida Grande;" value="Lucida Grande" <?php if( $ppl_text_font == "Lucida Grande" ){ echo ' selected'; } ?>>Lucida Grande</option>
						<option style="background: #f1f1f1; font-family: Lucida Sans Unicode;" value="Lucida Sans Unicode" <?php if( $ppl_text_font == "Lucida Sans Unicode" ){ echo ' selected'; } ?>>Lucida Sans Unicode</option>
						<option style="background: #f1f1f1; font-family: Optima;" value="Optima" <?php if( $ppl_text_font == "Optima" ){ echo ' selected'; } ?>>Optima</option>
						<option style="background: #f1f1f1; font-family: Segoe UI;" value="Segoe UI" <?php if( $ppl_text_font == "Segoe UI" ){ echo ' selected'; } ?>>Segoe UI</option>
						<option style="background: #f1f1f1; font-family: Tahoma;" value="Tahoma" <?php if( $ppl_text_font == "Tahoma" ){ echo ' selected'; } ?>>Tahoma</option>
						<option style="background: #f1f1f1 font-family: Trebuchet MS;" value="Trebuchet MS" <?php if( $ppl_text_font == "Trebuchet MS" ){ echo ' selected'; } ?>>Trebuchet MS</option>
						<option style="background: #f1f1f1 font-family: Verdana;" value="Verdana" <?php if( $ppl_text_font == "Verdana" ){ echo ' selected'; } ?>>Verdana</option>
						<option style="font-family: Baskerville;" value="Baskerville" <?php if( $ppl_text_font == "Baskerville" ){ echo ' selected'; } ?>>Baskerville</option>
						<option style="font-family: Big Caslon;" value="Big Caslon" <?php if( $ppl_text_font == "Big Caslon" ){ echo ' selected'; } ?>>Big Caslon</option>
						<option style="font-family: Bodoni MT;" value="Bodoni MT" <?php if( $ppl_text_font == "Bodoni MT" ){ echo ' selected'; } ?>>Bodoni MT</option>
						<option style="font-family: Book Antiqua;" value="Book Antiqua" <?php if( $ppl_text_font == "Book Antiqua" ){ echo ' selected'; } ?>>Book Antiqua</option>
						<option style="font-family: Calisto MT;" value="Calisto MT" <?php if( $ppl_text_font == "Calisto MT" ){ echo ' selected'; } ?>>Calisto MT</option>
						<option style="font-family: Cambria;" value="Cambria" <?php if( $ppl_text_font == "Cambria" ){ echo ' selected'; } ?>>Cambria</option>
						<option style="font-family: Didot;" value="Didot" <?php if( $ppl_text_font == "Didot" ){ echo ' selected'; } ?>>Didot</option>
						<option style="font-family: Garamond;" value="Garamond" <?php if( $ppl_text_font == "Garamond" ){ echo ' selected'; } ?>>Garamond</option>
						<option style="font-family: Georgia;" value="Georgia" <?php if( $ppl_text_font == "Georgia" ){ echo ' selected'; } ?>>Georgia</option>
						<option style="font-family: Goudy Old Style;" value="Goudy Old Style" <?php if( $ppl_text_font == "Goudy Old Style" ){ echo ' selected'; } ?>>Goudy Old Style</option>
						<option style="font-family: Hoefler Text;" value="Hoefler Text" <?php if( $ppl_text_font == "Hoefler Text" ){ echo ' selected'; } ?>>Hoefler Text</option>
						<option style="font-family: Lucida Bright;" value="Lucida Bright" <?php if( $ppl_text_font == "Lucida Bright" ){ echo ' selected'; } ?>>Lucida Bright</option>
						<option style="font-family: Palatino;" value="Palatino" <?php if( $ppl_text_font == "Palatino" ){ echo ' selected'; } ?>>Palatino</option>
						<option style="font-family: Palatino Linotype;" value="Palatino Linotype" <?php if( $ppl_text_font == "Palatino Linotype" ){ echo ' selected'; } ?>>Palatino Linotype</option>
						<option style="font-family: Perpetua;" value="Perpetua" <?php if( $ppl_text_font == "Perpetua" ){ echo ' selected'; } ?>>Perpetua</option>
						<option style="font-family: Rockwell;" value="Rockwell" <?php if( $ppl_text_font == "Rockwell" ){ echo ' selected'; } ?>>Rockwell</option>
						<option style="font-family: Rockwell Extra Bold;" value="Rockwell Extra Bold" <?php if( $ppl_text_font == "Rockwell Extra Bold" ){ echo ' selected'; } ?>>Rockwell Extra Bold</option>
						<option style="font-family: Times New Roman;" value="Times New Roman" <?php if( $ppl_text_font == "Times New Roman" ){ echo ' selected'; } ?>>Times New Roman</option>
						<option style="background: #f1f1f1; font-family: Andale Mono;" value="Andale Mono" <?php if( $ppl_text_font == "Andale Mono" ){ echo ' selected'; } ?>>Andale Mono</option>
						<option style="background: #f1f1f1; font-family: Consolas;" value="Consolas" <?php if( $ppl_text_font == "Consolas" ){ echo ' selected'; } ?>>Consolas</option>
						<option style="background: #f1f1f1; font-family: Courier New;" value="Courier New" <?php if( $ppl_text_font == "Courier New" ){ echo ' selected'; } ?>>Courier New</option>
						<option style="background: #f1f1f1; font-family: Lucida Console;" value="Lucida Console" <?php if( $ppl_text_font == "Lucida Console" ){ echo ' selected'; } ?>>Lucida Console</option>
						<option style="background: #f1f1f1; font-family: Lucida Sans Typewriter;" value="Lucida Sans Typewriter" <?php if( $ppl_text_font == "Lucida Sans Typewriter" ){ echo ' selected'; } ?>>Lucida Sans Typewriter</option>
						<option style="background: #f1f1f1; font-family: Monaco;" value="Monaco" <?php if( $ppl_text_font == "Monaco" ){ echo ' selected'; } ?>>Monaco</option>
						<option style="font-family: Copperplate;" value="Copperplate" <?php if( $ppl_text_font == "Copperplate" ){ echo ' selected'; } ?>>Copperplate</option>
						<option style="font-family: Papyrus;" value="Papyrus" <?php if( $ppl_text_font == "Papyrus" ){ echo ' selected'; } ?>>Papyrus</option>
						<option style="background: #f1f1f1; font-family: Brush Script MT;" value="Brush Script MT" <?php if( $ppl_text_font == "Brush Script MT" ){ echo ' selected'; } ?>>Brush Script MT</option>
					</select>
				</label>
				<label title="<?= count($items) ?> Google Fonts for the tag text. The selected one overrides <span class='green'>Web Safe Font</span>." for="<?=$this->get_field_id('ppl_google_font'); ?>">
					<a style="color:#dc143c; font-weight: bold;" href="https://www.google.com/fonts" target="_blank" title="See how they look like.">Google Font</a>
					<br>
					<select id="<?=$this->get_field_id('ppl_google_font'); ?>" name="<?=$this->get_field_name('ppl_google_font'); ?>">
						<option value="" <?php if($ppl_google_font == ''){echo ' selected';} ?>></option>
<?php
						foreach ($items as $font){
							echo '<option value="'.$font->{'family'}.'"';			
								if ($ppl_google_font == $font->{'family'}) {echo 'selected'; };
							echo '>'.$font->{'family'}.'</option>';
						}
 ?>
					</select>
				</label>
			</div>
		</div>
		<div class="divider"></div>
		<div style="float: left;">
			<span style="padding-bottom: 5px;">SPEED & TIME</span>
			<div>
				<div style="margin: 4px 7px 0 0; float: left; padding: 0 1px 1px 1px; border: 1px dotted #aaa; border-radius: 5px;" title="Starting rotation speed around axes with values for each one, e.g. <span class='green'>[0.5,-0.3, 0.1]</span>. Values are multiplied by <span class='green'>maxSpeed</span>.">
					Initial Speed [x, y, z]
					<br>
					<select id="<?=$this->get_field_id('ppl_initial_x'); ?>" name="<?=$this->get_field_name('ppl_initial_x'); ?>">
						<?php for($i=-100; $i<101; $i++){echo '<option id="mainx_' . $i . '" value="' . $i/100 . '"'; if($ppl_initial_x==$i/100){echo ' selected';}; echo '>' . $i/100 . '</option>'; } ?>	
					</select><select id="<?=$this->get_field_id('ppl_initial_y'); ?>" name="<?=$this->get_field_name('ppl_initial_y'); ?>">
						<?php for($i=-100; $i<101; $i++){echo '<option id="mainy_' . $i . '" value="' . $i/100 . '"'; if($ppl_initial_y==$i/100){echo ' selected';}; echo '>' . $i/100 . '</option>'; } ?>
					</select><select id="<?=$this->get_field_id('ppl_initial_z'); ?>" name="<?=$this->get_field_name('ppl_initial_z'); ?>">	
					<?php for($i=-100; $i<101; $i++){echo '<option id="mainz_' . $i . '" value="' . $i/100 . '"'; if($ppl_initial_z==$i/100){echo ' selected';}; echo '>' . $i/100 . '</option>'; } ?>							
				</select>
				</div>
				<label style="padding: 5px 9px 0 0;" title="Minimal speed of rotation when mouse leaves canvas." for="<?=$this->get_field_id('ppl_min_speed'); ?>">
					Min Speed
					<br>
					<select id="<?=$this->get_field_id('ppl_min_speed'); ?>" name="<?=$this->get_field_name('ppl_min_speed'); ?>">
						<?php for($i=0; $i<55; $i+=5){echo '<option id="ppmis_' . $i . '" value="' . $i/1000 . '"'; if($ppl_min_speed==$i/1000){echo ' selected';}; echo '>' . $i/1000 . '</option>'; } ?>
					</select>
				</label>	
				<label style="padding: 5px 0 0;" title="Maximum speed of rotation: This setting is just a multiplier of speed." for="<?=$this->get_field_id('ppl_max_speed'); ?>">
					Max Speed
					<br>
					<select id="<?=$this->get_field_id('ppl_max_speed'); ?>" name="<?=$this->get_field_name('ppl_max_speed'); ?>">
						<?php for($i=5; $i<105; $i+=5){echo '<option id="ppmas_' . $i . '" value="' . $i/1000 . '"'; if($ppl_max_speed==$i/1000){echo ' selected';}; echo '>' . $i/1000 . '</option>'; } ?>
					</select>
				</label>
				<div class="thin-spacer"></div>
				<label title="If set to a number, the selected tag will move to the front in this many milliseconds before activating." for="<?=$this->get_field_id('ppl_click_to_front'); ?>">
					Click to Front
					<br>
					<select id="<?=$this->get_field_id('ppl_click_to_front'); ?>" name="<?=$this->get_field_name('ppl_click_to_front'); ?>">
						<option id="ppctf_0" value="null" <?php if( $ppl_click_to_front == "null" ){ echo ' selected'; } ?>>off</option>
						<?php for($i=500; $i<2500; $i+=500){echo '<option id="ppctf_' . $i . '" value="' . $i . '"'; if($ppl_click_to_front==$i){echo ' selected';}; echo '>' . $i . '</option>'; } ?>
					</select>msec
				</label>
			</div>
		</div>	
	</div>