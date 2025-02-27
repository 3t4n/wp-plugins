<?php

/*
  Create Admin Menu and Page
*/
 add_action('admin_menu', 'caspers_flyin_cta_menu'); //adds menu field under Appearance
 function caspers_flyin_cta_menu() { 
	add_theme_page('Call to Action Slider Settings', 'Fly-in CTA', 'manage_options', 'caspers-flyin-cta', 'caspers_flyin_cta_admin_page');
 }
 
function caspers_flyin_cta_admin_page() { //structures the admin page ?>
	<div class="wrap">
        <h2>Fly-in Call-to-Action Options</h2>
        <form method="post" action="options.php">
            <?php settings_fields( 'caspers-flyin-cta-settings-group' ); ?>
            <?php do_settings_sections( 'caspers-flyin-cta-settings-group' ); ?>
            <table class="form-table">
                <!-- cta-enable -->
                <tr valign="top">
                <th scope="row">Enable Fly-in CTA</th>
				<td>
                	<input type="checkbox" name="cpcta-enabled" <?php if( get_option('cpcta-enabled') ){ echo 'checked="checked"'; } ?> />
                	<?php 
						if( get_option('cpcta-enabled') ) {
							echo "Uncheck to turn off.";		
						} else {
							echo "Check to activate.";
						}
					?>
                </td>
                </tr>
                
                <!---------------------->
                <!-- content controls -->
                <!---------------------->
                <tr valign="top">
                    <th scope="row">Fly-in CTA Top Text</th>
                    <td><input type="text" name="cpcta-top-bar-text" value="<?php echo esc_attr( get_option('cpcta-top-bar-text') ); ?>" style="width: 100%;" autofocus/></td>
                </tr>
                
                <tr valign="top">
                    <th scope="row">Fly-in CTA Body Content</th>
                    <td>
                        <?php 
                                $settings = array(
                                    'media_buttons'		=>	true,
									'wpautop'			=>	false,
                                );
                                wp_editor(get_option('cpcta-slider-body-content'), 'cpcta-slider-body-content', $settings);
                        ?>
                    </td>
                </tr>
                
                <!------------------->
                <!-- color styling -->
                <!------------------->
                <tr>
                <th scope="row">Top Bar Font Color</th>
                	<?php 
						if(get_option('cpcta-top-bar-font-color')){
							$cpcta_top_font_color = esc_attr( get_option('cpcta-top-bar-font-color') );
						} else {
							$cpcta_top_font_color = "#FFFFFF";
						}
					?>
                <td><input type="color" name="cpcta-top-bar-font-color" value="<?php echo $cpcta_top_font_color; ?>" style="width: 25%;"/></td>
                </tr>
                
                <tr>
                <th scope="row">Top Bar Background Color</th>
                	<?php 
						if(get_option('cpcta-top-bar-bkg-color')){
							$cpcta_top_bkg_color = esc_attr( get_option('cpcta-top-bar-bkg-color') );
						} else {
							$cpcta_top_bkg_color = "#000000";
						}
					?>
                <td><input type="color" name="cpcta-top-bar-bkg-color" value="<?php echo $cpcta_top_bkg_color; ?>" style="width: 25%;"/></td>
                </tr>
                <tr>
                <th scope="row">Body Content Font Color</th>
					<?php 
						if(get_option('cpcta-body-content-font-color')){
							$cpcta_body_font_color = esc_attr( get_option('cpcta-body-content-font-color') );
						} else {
							$cpcta_body_font_color = "#000000";
						}
					?>
                <td><input type="color" name="cpcta-body-content-font-color" value="<?php echo $cpcta_body_font_color; ?>" style="width: 25%;"/></td>
                </tr>
                
                <tr>
					<th scope="row">Body Content Background Color</th>
					<?php 
						if(get_option('cpcta-body-content-bkg-color')){
							$cpcta_body_bkg_color = esc_attr( get_option('cpcta-body-content-bkg-color') );
						} else {
							$cpcta_body_bkg_color = "#FFFFFF";
						}
					?>
					<td><input type="color" name="cpcta-body-content-bkg-color" value="<?php echo $cpcta_body_bkg_color; ?>" style="width: 25%;"/></td>
                </tr>
                
                <!--<tr>
                    //As of version 1.5, this field is not being used.
					<th scope="row">Close Button Color</th>
					<?php 
						if(get_option('cpcta-close-btn-color')){
							$cpcta_close_btn_color = esc_attr( get_option('cpcta-close-btn-color') );
						} else {
							$cpcta_close_btn_color = "#505050";
						}
					?>
					<td><input type="color" name="cpcta-close-btn-color" value="<?php echo $cpcta_close_btn_color; ?>" style="width: 25%;"/></td>
                </tr>-->
                
                <!------------------------->
                <!-- auto popup controls -->
                <!------------------------->
                <tr valign="top">
                    <th scope="row">Enable Auto Fly In</th>
                    <td>
                        <input type="checkbox" name="cpcta-enable-autopop" id="cpcta-enable-autopop" <?php if( get_option('cpcta-enable-autopop') ){ echo 'checked="checked"'; } ?> />
                    </td>
                </tr>
                
                <tr valign="top" id="cpcta-autopop-timer" class="<?php if( get_option('cpcta-enable-autopop') !== 'on' ) { echo "cj_hidden"; } ?>">
                    <th scope="row">How long before the fly in automatically flies in?</th>
                    <td>
                        <?php $popup_timer = get_option('cpcta-autopop-timer'); ?>
                        <input type="number" name="cpcta-autopop-timer" min="500" max="10000" step="100" 
                            value="<?php if( $popup_timer ) { echo $popup_timer; } else { echo "3000"; }?>"> milliseconds (1000 = 1 second)
                    </td>
                </tr>
                
                <!-------------------------->
                <!-- positioning controls -->
                <!-------------------------->
                <tr valign="top">
                    <th scope="row">Type of Slider</th>
                        <?php 
                            if(get_option('cpcta-slider-type')){
                                $cpcta_slider_type = esc_attr( get_option('cpcta-slider-type') );
                            } else {
                                $cpcta_slider_type = "vertical";
                            }
                        ?>
                    <td>
                        <select name="cpcta-slider-type" id="cpcta-slider-type">
                            <option value="vertical" <?php if( $cpcta_slider_type == 'vertical' ){echo "selected";}?>>Slide in from bottom</option>
                            <option value="horizontal" <?php if( $cpcta_slider_type == 'horizontal' ){echo "selected";}?>>Slide in from the side</option>
                        </select>
                    </td>
                </tr>
                
                <tr valign="top" class="cpcta-hori-slider-position <?php if( $cpcta_slider_type !== 'horizontal' ) { echo "cj_hidden"; } ?>">
                    <th scope="row">Position the slide-out CTA on which side of the screen?</th>
                    <td>
                        <select name="cpcta-hori-slider-position" id="cpcta-hori-slider-position">
                            <option value="right" <?php if(get_option('cpcta-hori-slider-position')=='right'){echo "selected"; }?>>Right</option>
                            <option value="left" <?php if(get_option('cpcta-hori-slider-position')=='left'){echo "selected"; }?>>Left</option>
                        </select>
                    </td>
                </tr>
                
                <tr valign="top" class="cpcta-vert-slider-position <?php if( $cpcta_slider_type !== 'vertical' ) { echo "cj_hidden"; } ?>">
                    <th scope="row">Position the slide-out CTA on which side of the screen?</th>
                    <td>
                        <select name="cpcta-vert-slider-position" id="cpcta-vert-slider-position">
                            <option value="center" <?php if(get_option('cpcta-vert-slider-position')=='center'){echo "selected"; }?>>Center</option>
                            <option value="right" <?php if(get_option('cpcta-vert-slider-position')=='right'){echo "selected"; }?>>Right</option>
                            <option value="left" <?php if(get_option('cpcta-vert-slider-position')=='left'){echo "selected"; }?>>Left</option>
                        </select>
                    </td>
                </tr>
                
                <tr valign="top" id="cpcta-hori-slider-topbar-angle" class="<?php if( $cpcta_slider_type !== 'horizontal' ) { echo "cj_hidden"; } ?>">
                	<th>Angle of the Top Bar</th>
                	<td>
                		<select name="cpcta-hori-slider-topbar-angle">
                			<option value="horizontal" <?php if( get_option('cpcta-hori-slider-topbar-angle') == 'horizontal' ) { echo "selected"; } ?>>Horizontal (parallel to the edge of the screen)</option>
                			<option value="vertical" <?php if( get_option('cpcta-hori-slider-topbar-angle') == 'vertical' ) { echo "selected"; } ?>>Vertical (sticking directly out into the page)</option>
                		</select>
                	</td>
                </tr>
                
                <!-------------------->
                <!-- page filtering -->
                <!-------------------->
                <tr valign="top">
                    <th scope="row">Display on which pages?</th>
                    <td>
                        <select name="cpcta-display-on" id="cpcta-display-on">
                            <option value="all" <?php if(get_option('cpcta-display-on')=='all'){echo 'selected';}?>>Everywhere</option>
                            <option value="home" <?php if(get_option('cpcta-display-on')=='home'){echo 'selected';}?>>Only on homepage</option>
                            <option value="pages" <?php if(get_option('cpcta-display-on')=='pages'){echo 'selected';}?>>Only on interior pages</option>
                            <option value="posts" <?php if(get_option('cpcta-display-on')=='posts'){echo 'selected';}?>>Only on posts</option>
							<?php 
                                //check for custom post types...
                                $args = array(
                                     'public'   => true,
                                     '_builtin' => false
                                );
                                $output = 'objects'; // names or objects, note names is the default
                                $operator = 'and'; // 'and' or 'or'
                                $post_types = get_post_types( $args, $output, $operator ); 
                                
                                foreach ($post_types as $post_type) { ?>
                                	<?php $value = "cpt-" . strtolower( $post_type->name ); ?>
                                    <option value="<?php echo $value; ?>" 
									<?php if(get_option('cpcta-display-on')== $value ){ echo 'selected'; } ?>
                                    >Only on <?php echo strtolower( $post_type->{'labels'}->{'name'} ) ?></option>												
                                <?php 
                                } //end foreach
                            ?>
                            <option value="specific-page" <?php if(get_option('cpcta-display-on')=='specific-page'){echo 'selected';}?>>Only on a specific page...</option>
                            <option value="specific-post" <?php if(get_option('cpcta-display-on')=='specific-post'){echo 'selected';}?>>Only on a specific post...</option>
                        </select>
                    </td>
                </tr>
                
                <tr valign="top" class="specific-page <?php if( get_option('cpcta-display-on')!=='specific-page') { echo "cj_hidden"; } ?>">
                    <th scope="row">Show on which page?</th>
                    <td><?php 
                        $args = array(
                            'name'		=>	'cpcta-display-page',
                            'selected'	=>	get_option('cpcta-display-page'),
                            'post_type'	=> 	'page',
                        );
                        wp_dropdown_pages( $args ); ?>
                    </td>
                </tr>
                
               				 <?php 
							 /*
                                //check for custom post types...
                                $args = array(
                                     'public'   => true,
                                     '_builtin' => false
                                );
                                $output = 'objects'; // names or objects, note names is the default
                                $operator = 'and'; // 'and' or 'or'
                                $post_types = get_post_types( $args, $output, $operator ); 
                                
								$json = json_encode($post_types);
								print_r($post_types);
								
                                foreach ($post_types as $post_type) { ?>
                                	<?php $value = "cpt-" . strtolower( $post_type->name ); ?>
                                    <?php  echo $value; ?>
                                    <option value="<?php echo $value; ?>" 
									<?php if(get_option('cpcta-display-on')== $value ){ echo 'selected'; } ?>
                                    >Only on <?php echo strtolower( $post_type->{'labels'}->{'name'} ) ?></option>												
                                <?php 
                                } //end foreach
							*/
                            ?>
                
                <tr valign="top" class="specific-post <?php if( get_option('cpcta-display-on')!=='specific-post') { echo "cj_hidden"; } ?>">
                    <th scope="row">Show on which post?</th>
                    <td>
                        <select name="cpcta-display-post"> 
                            <?php global $post; $args = array( 'numberposts' => -1); $posts = get_posts($args); foreach( $posts as $post ) : setup_postdata($post); ?>
                            <option value="<? echo $post->ID; ?>" <?php if(get_option('cpcta-display-post')==$post->ID){echo 'selected';}?>><?php the_title(); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                
                <!--------------------------->
                <!-- misc styling options --->
                <!--------------------------->
                <?php
                // WIDTH: use percentage for bottom-flyin | use pixels for side-flyin
                    $cpcta_width_message = "Set Width of Fly In";
                ?>
                <tr id="cpcta-width-pixel" valign="top" class="<?php if( $cpcta_slider_type == 'vertical' ) { echo 'cj_hidden'; } ?>">
                    <th scope="row"><?php echo $cpcta_width_message ?></th>
                    <td>
                        <input name="cpcta-width-pixel" type="number" min="50" max="500"
                            value="<?php if( get_option('cpcta-width-pixel') ) { echo get_option('cpcta-width-pixel'); }
                                else { echo "100"; } ?>"> px
                    </td>
                </tr>
                
                <tr id="cpcta-width-percent" valign="top" class="<?php if( $cpcta_slider_type == 'horizontal' ) { echo 'cj_hidden'; } ?>">
                    <th scope="row"><?php echo $cpcta_width_message ?></th>
                    <td>
                        <input name="cpcta-width-percent" type="number" min="1" max="100"
                            value="<?php if( get_option('cpcta-width-percent') ) { echo get_option('cpcta-width-percent'); }
                                else { echo "40"; } ?>"> %
                    </td>
                </tr>
                
                <tr id="cpcta-zindex" valign="top">
                	<th scope="row">Z-Index</th>
                    <td>
                    	<input type="number" name="cpcta-zindex" min="1" value="<?php if(get_option('cpcta-zindex')) { echo get_option('cpcta-zindex'); } else { echo "99999"; } ?>"/>
                        Increase this if it is getting hidden behind other items on the page, such as a sticky header.
                    </td>
                </tr>
                
                <tr valign="top">
                	<th scope="row">Hide on Mobile</th>
                    <td>
                        <input type="checkbox" name="cpcta-mobile-hidden" id="cpcta-mobile-hidden" 
							<?php if( get_option('cpcta-mobile-hidden') ){ echo 'checked="checked"'; } ?> />
                        <?php 
                            if( get_option('cpcta-mobile-hidden') == 'on' ) {
                                echo "Uncheck to show on smaller screens.";		
                            } else {
                                echo "Check to hide on smaller screens.";
                            }
                        ?>
                    </td>
                </tr>

                <tr id="cpcta-mobile-width" valign="top" class="<?php if( get_option('cpcta-mobile-hidden') !== 'on' ) { echo 'cj_hidden'; } ?>">
                <th scope="row">Max Screen Size to Hide</th>
                <td>
                	<input type="number" min="320" max="1024" name="cpcta-mobile-width" 
                    	value="<?php if(get_option('cpcta-mobile-width')) { echo get_option('cpcta-mobile-width'); } else { echo "768"; } ?>" />px wide
                </td>
                </tr>
            </table>
            
            <?php submit_button(); ?>
        
        </form>
    </div>
    <?php } //end admin_page() 