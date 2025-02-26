<?php

if ( ! defined('ABSPATH') ) {
	die('Please do not load this file directly!');
}

function gifeed_customposttype_image_box() {
	add_meta_box( 'gifeedprevdiv', __( 'Preview' ), 'gifeed_preview_metabox', 'ginstagramfeed', 'side', 'default' );
	add_meta_box( 'gifeeddemodiv', __( 'PRO VERSION DEMO' ), 'gifeed_demo_metabox', 'ginstagramfeed', 'side', 'default' );
}
add_action( 'do_meta_boxes', 'gifeed_customposttype_image_box' );

function gifeed_add_meta_box( $meta_box ) {

	if ( !is_array( $meta_box ) ) return false;
	
    // Create a callback function
	if ( IFLITE_PHP7 ) {
    	$callback = function( $post, $meta_box ) {
			return gifeed_create_meta_box( $post, $meta_box["args"] );
		};
	} else {
		$callback = create_function( '$post, $meta_box', 'gifeed_create_meta_box( $post, $meta_box["args"] );' );
	}
	
    add_meta_box( $meta_box['id'], $meta_box['title'], $callback, $meta_box['page'], $meta_box['context'], $meta_box['priority'], $meta_box );
	
}


/**
 * Create content for a custom Meta Box
 *
 * @param array $meta_box Meta box input data
 */
function gifeed_create_meta_box( $post, $meta_box )
{

	$gifeed_allowedtags = array(
		'a' => array( 'href' => array(), 'title' => array(), 'target' => array(), 'style' => array() ),
		'div' => array( 'class' => array() ),
		'label' => array( 'for' => array() ),
		'th' => array(), 'p' => array(), 'i' => array(), 'strong' => array(), 'span' => array(), 'br' => array(),
		);

    if ( !is_array( $meta_box ) ) return false;
    
    if ( isset( $meta_box['description'] ) && $meta_box['description'] != '' ){
    	echo '<p>'. wp_kses( $meta_box['description'], $gifeed_allowedtags ) .'</p>';
    }
	
    if ( isset( $meta_box['istabbed'] ) && $meta_box['istabbed'] != '' ){
		
		echo '<div id="gifeedtabs"><ul class="gifeedtabcon">';
		echo '<li><a class="tabulous_active gifeeddefaulttab" id="feed" href="#tabs-1" title="">Feeds Settings</a></li><li><a id="layout" href="#tabs-2" title="">Layout & Styles</a></li><li><a id="misc" href="#tabs-3" title="">Miscellaneous</a></li><li><a id="adv" href="#tabs-4" title="">Advanced</a></li>';
		
        echo '</ul><div class="tabloader"><div id="tabs_container">';
		
    }
    
	wp_nonce_field( basename( __FILE__ ), 'gifeed_meta_box_nonce' );
	echo '<table class="form-table gifeed-metabox-table">';
 
	foreach ( $meta_box['fields'] as $field ){
		// Get current post meta data
		$meta = get_post_meta( $post->ID, $field['id'], true );
		
		//sanitize output
		if ( is_array( $meta ) ) {
			
			foreach ( $meta as $k => $v ){
				$meta[$k] = esc_attr( $meta[$k] );
			}
		}
		else {
			$meta = wp_kses_post( $meta );	
		}
		
		if ( isset( $field['isfull'] ) && $field['isfull'] == 'yes' ) {
			$isfull = '';
		} else {
			$isfull = '<th><label for="'. esc_attr( $field['id'] ) .'"><strong>'. esc_html( $field['name'] ) .'<br></strong><span>'. esc_html( $field['desc'] ) .'</span></label></th>';	
		}
		echo '<tr '. ( $field['type'] != 'feedbuilder' ? 'style="display: block;"' : '' ) .' class="'. esc_attr( $field['id'] ) .' '. ( isset( $field['group'] ) && $field['group'] ? esc_attr( $field['group'] ) : '' ) .' '. ( isset( $field['isselector'] ) && $field['isselector'] ? esc_attr( $field['isselector'] ) : '' ) .' '. ( isset( $field['extragrp'] ) && $field['extragrp'] ? esc_attr( $field['extragrp'] ).'-fields' : '' ) .'">'.wp_kses( $isfull, $gifeed_allowedtags ).'';
		
		
		switch( $field['type'] ){
			
			case 'feedbuilder':

			echo '<td '.( isset( $field['needmargin'] ) && $field['needmargin'] ? 'style="padding-bottom:'.esc_attr( $field['needmargin'] ).';"' : '' ) .'>';
			echo '<div class="feed_field_left"><span style="margin-top: 5px;" class="dashicons dashicons-businessman"></span>&nbsp;&nbsp;<span style="display:inline-block;font-size:13px !important;color: #999;margin-right: 17px;}"><p>Select Your Instagram Account</p></span></div>';
			
			$all_token = gifeed_opt( 'users' );
			
			if ( ! empty( $all_token ) ) {
				
				echo '<div class="fil_available_token_cont"><fieldset>';
				
				foreach ( $all_token as $key => $val ) {

					$pp_img = ( isset( $val['profile_picture'] ) ? $val['profile_picture'] : 'https://assets.ghozylab.com/images/instagram/default-avatar.png' );

					echo '<div class="gifeed_users_each"><label class="gifeed_users_label" for="'.esc_attr( md5( $key ) ).'">
					<input class="gifeed_users" type="checkbox" value="gifeed'.esc_attr( $key ).'" id="'.esc_attr( md5( $key ) ).'"><span class="g_uname">
					'.esc_html( $val['username'] ).'</span><img class="gifeed_users_each_pp" src="'.esc_attr( $pp_img ).'"></label></div>';
					
				}
				
			  echo '</fieldset></div>';
				
			}

			echo '<div class="feed_field_right">';

			foreach ( $meta_box['fields'] as $fld ) {

				switch ( $fld['sub_type'] ) {

					case 'format':

						echo '<div class="feed_bulk_options">';

						$submeta = get_post_meta( $post->ID, $fld['id'], true );

						if ( gifeed_check_browser_version_admin( get_the_ID() ) != 'ie8' ) {

							foreach ( $fld['options'] as $key => $option ) {
								echo '<input id="'.esc_attr( $key ).'" type="radio" name="gifeed_meta['.esc_attr( $fld['id'] ).']" value="'.esc_attr( $key ).'" class="css-checkbox"';

								if ( isset( $submeta ) ) {

									if ( $submeta == $key ) {
										echo ' checked="checked"';
									}

								} else {

									if ( $fld['std'] == $key ) {
										echo ' checked="checked"';
									}

								}

								echo ' /><label data-con="'.esc_attr( $key ).'" for="'.esc_attr( $key ).'" class="css-label">'.esc_html( $option ).'</label> ';
							}

						} else {

							foreach ( $fld['options'] as $key => $option ) {
								echo '<label class="radio-label"><input type="radio" name="gifeed_meta['.esc_attr( $fld['id'] ).'][format]" value="'.esc_attr( $key ).'" class="radio"';

								if ( isset( $submeta ) ) {

									if ( $submeta == $key ) {
										echo ' checked="checked"';
									}

								} else {

									if ( $fld['std'] == $key ) {
										echo ' checked="checked"';
									}

								}

								echo ' /> '.esc_html( $option ).'</label> ';
							}

						}

						echo '</div>';

						break;

						case 'ids_tags':

							$submeta = get_post_meta( $post->ID, $fld['id'], true );

							if ( isset( $submeta ) ) {
													
								if ( is_array( $submeta ) ) {
									
									$submeta = implode( ',', $submeta );
			
								}
			
							}
			
							echo '<textarea name="gifeed_meta['.esc_attr( $fld['id'] ).']" id="'.esc_attr( $fld['id'] ).'" type="textarea" cols="45" rows="7">'.esc_textarea( $submeta ).'</textarea>';
							//echo '<input type="text" name="gifeed_meta['. $fld['id'] .']" id="'. $fld['id'] .'" value="'. esc_attr( $feedData ) .'" size="58" />';
			
							break;

				}

			}

			echo '</div>';
			
			echo '</td>';	

				break;	

			case 'text':
					
				echo '<td '.( isset( $field['needmargin'] ) && $field['needmargin'] ? 'style="padding-bottom:'.esc_attr( $field['needmargin'] ).';"' : '' ) .'>';	
				echo '<input type="text" name="gifeed_meta['. esc_attr( $field['id'] ) .']" id="'. esc_attr( $field['id'] ) .'" value="'. ($meta ? esc_attr( $meta ) : esc_attr( $field['std'] ) ) .'" size="30" /></td>';
				break;
				
				case 'codemirror':
			
			echo '<td '.( isset( $field['needmargin'] ) && $field['needmargin'] ? 'style="padding-bottom:'.esc_attr( $field['needmargin'] ).';"' : '' ) .'>';
			if ( isset( $field['nthick'] ) && $field['nthick'] ) { $isd = 'true'; $tb = '<label style="padding-top:25px;font-style:italic; font-size:12px;"><input style="margin-right: 3px;" id="tahandle" type="checkbox" /> I know what I am doing</label>'; } else {$tb = null; $isd = 'false';}
 	echo '<textarea style="width: 100% !important; vertical-align:top !important;" '.( $field['id'] == 'gifeed_meta_custom_template' ? 'name="gifeed_meta['. esc_attr( $field['id'] ) .']"' : '' ).' id="'. esc_attr( $field['id'] ) .'" type="'. esc_attr( $field['type'] ) .'" cols="45" rows="7">'.( $meta != '' ? esc_textarea( $meta ) : $field['std'] ).'</textarea>';
    echo $tb;
	
	if ( $field['id'] == 'gifeed_meta_customcss_tempt_disabled' ) {
		
		echo'<br><div style="display:inline-block;margin:15px 0px 15px 0px;" id="gifeed_generate_css_legend" class="button">Generate CSS Legend</div><div style="display:inline-block;margin: 15px 0px 15px 5px;" id="gifeed_generate_css_legend_clear" class="button">Clear</div>';
	
	}
	
	if ( $field['id'] == 'gifeed_meta_custom_template' ) {
		
		echo'<div style="margin-top: 15px;width:100%;text-align:right;"><span class="button gifeed_reset_template">Reset to Default</span></div>';
		
		echo'<div style="padding-top:10px;margin-top:30px;border-top:1px solid #ccc;"><p style="margin-bottom:21px;">'.esc_html( $field['desc'] ).'</p><h4>Template Tags :</h4><div style="margin-top:15px;margin-left:30px;"><ul style="line-height: 19px;
font-size: 13px;list-style-type: circle;"><li>{{type}} : the Instagram media type. Can be image or video</li>
		<li>{{id}} : Unique ID of the image or video</li>
		<li>{{vidw}} : contains the images or videos width, in pixels</li>
		<li>{{vidh}} : contains the images or videos height, in pixels</li>
		<li>{{link}} : URL to view the image / video on Instagram website</li>
		<li>{{source}} : URL of the image or video source. The size is inherited from the resolution option</li>
		<li>{{image}} :  URL of the image source ( media thumbnails ). The size is inherited from the resolution option</li>
		<li>{{typeicon}} : Image or video small icon on top left of each media</li>
		<li>{{mediaalt}} : Image title</li>		
		<li>{{mediattl}} : Image alt</li>
		<li>{{facebookshare}} : Default Facebook share URL</li>
		<li>{{twittersts}} : Default Twitter share URL</li>
		<li>{{googlepshare}} : Default Google+ share URL</li>	
		<li>{{likes}} : Number of likes the image or video has</li>			
		<li>{{comments}} : Number of comments the image or video has</li>			
		<li>{{timestamp}} : The time when the media published</li>	
		<li>{{caption}} : Image or Video Caption / media title</li>	
		<li>{{model}} : Full JSON object of the image. If you want to get a property of the image that isn\'t listed above you access it using dot-notation. (ex: {{model.filter}} would get the filter used.)</li>									
		</ul></div></div>';
	
	}
			?>
				  <script type="text/javascript">
				  /*<![CDATA[*/
				  
				 jQuery(document).ready(function($) { 
				 
				 	var feedCodeMirror<?php echo esc_html( $field['id'] ); ?>;

					 wp.codeEditor.initialize($('#<?php echo esc_html( $field['id'] ); ?>'), gifeed_settings);

					 /* Set readonly */
					 $('.CodeMirror-code').css('pointer-events', 'none');
					 
				  });				

				  /*]]>*/
                  </script>   
	<?php
    echo '</td>';
		
				break;

		
			case 'select':
				echo '<td '.( isset( $field['needmargin'] ) && $field['needmargin'] ? 'style="padding-bottom:'.esc_attr( $field['needmargin'] ).';"' : '' ) .'>';
				echo'<select class="gifeedmetaselect" name="gifeed_meta['. esc_attr( $field['id'] ) .']" id="'. esc_attr( $field['id'] ) .'">';
				foreach ( $field['options'] as $key => $option ){
					
					if ( $field['needkey'] ) {
						$tval = $key; 
					} else {
						$tval = $option;
						}
										
					echo '<option value="' . esc_attr( $tval ) . '"';
					if ( $meta ){ 
						if ( $meta == $tval ) echo ' selected="selected"'; 
					} else {
						if ( $field['std'] == $tval ) echo ' selected="selected"';
					}
					echo'>'. esc_html( $option ) .'</option>';
				}
				echo'</select></td>';
				
				break;

	
			case 'slider': 
			
				if ( $meta ) {
				
					if ( is_array( $meta ) ) {
					
						$metaw = $meta['lengthw'];
					
						if ( $meta['lengthunit'] == '%' ) {
						
							$slidermax = '100';
						
							} else {
						
								$slidermax = '1020';
						
								}
					
					} else {
					
						$metaw = $meta;
						$slidermax = $field['max'];
						
						}
				
				} else {
				
					$metaw = $field['std'];
					$slidermax = $field['max'];
				
				}

				echo '<td '.( isset( $field['needmargin'] ) && $field['needmargin'] ? 'style="padding-bottom:'.esc_attr( $field['needmargin'] ).';"' : '' ) .'>';
		
	?>	
				  <script type="text/javascript">
				  /*<![CDATA[*/
				  
				 jQuery(document).ready(function($) { 
				  
/* Slider init */

       var $slide_<?php echo esc_html( $field['id'] ); ?> = jQuery( '#<?php echo esc_html( $field['id'] ); ?>_slider' ).slider({
            range: 'min',
            min: <?php echo esc_html( $field['min'] ); ?>,
            max: <?php echo esc_html( $slidermax ); ?>,
			<?php if ( $field['usestep'] == '1' ) { ?>
			step: <?php echo esc_html( $field['step'] ); ?>,
			<?php } ?>
            value: '<?php echo esc_html( $metaw ); ?>',
			disabled: true,
            slide: function( event, ui ) {
                jQuery( "#<?php echo esc_html( $field['id'] ); ?>" ).val( ui.value );
            	}
        	});
			
			
		<?php if ( isset ( $field['lengthunitopt'] ) && $field['lengthunitopt'] == 'Y' ) { ?>	
			
		$( '#<?php echo esc_html( $field['id'] ); ?>_unit' ).on( 'change', function() {
			
				if ( this.value == '%' ) {
					$( "#<?php echo esc_html( $field['id'] ); ?>" ).val(0);
					$slide_<?php echo esc_html( $field['id'] ); ?>.slider("value", 0);
					$slide_<?php echo esc_html( $field['id'] ); ?>.slider("option", "max", 100);
				} else {
					$( "#<?php echo esc_html( $field['id'] ); ?>" ).val(0);
					$slide_<?php echo esc_html( $field['id'] ); ?>.slider("value", 0);
					$slide_<?php echo esc_html( $field['id'] ); ?>.slider("option", "max", 1020);	
				}
		 
			});
			
		<?php } elseif ( isset ( $field['lengthunitopt'] ) && $field['lengthunitopt'] == 'N' ) { ?>
		
					$slide_<?php echo esc_html( $field['id'] ); ?>.slider("option", "max", <?php echo esc_html( $field['max'] ); ?>);	
		
		<?php } ?>
				  
	});				

				  /*]]>*/
                  </script>   
    
    <?php echo '<span class="gifeed_metaslider"><span id="'.esc_attr( $field['id'] ).'_slider" ></span>';
	
	if ( isset ( $field['lengthunitopt'] ) ) {
		
			echo '<input style="text-align:center;margin-left:15px;" class="pixoprval" name="gifeed_meta['.esc_attr( $field['id'] ).'][lengthw]" id="'.esc_attr( $field['id'] ).'" type="text" value="'.( isset( $meta['lengthw'] ) ? esc_attr( $meta['lengthw'] ) : esc_attr( $field['std'] ) ).'" />';
			echo'<select style="width:auto;vertical-align:top;" class="gifeedmetaselect" name="gifeed_meta['. esc_attr( $field['id'] ) .'][lengthunit]" id="'. esc_attr( $field['id'] ) .'_unit">';
				foreach ( $field['options'] as $key => $option ){
					
					if ( $field['needkey'] ) {
						$tval = $key; 
					} else {
						$tval = $option;
						}
					

					echo '<option value="' . esc_attr( $key ) . '"';

						if ( isset( $meta['lengthunit'] ) ) {
							
							if ( $meta['lengthunit'] == $key ) {
							
								echo ' selected="selected"'; 
							}
						} else {
							
							if ( $key == $field['pixopr'] ) {
								
								echo ' selected="selected"';
							}
						}
			
					echo'>'. esc_html( $option ) .'</option>';
				}
				
				echo'</select>';
		
		} else {
			echo '<input style="text-align:center;margin-left:15px;" class="pixoprval" name="gifeed_meta['.esc_attr( $field['id'] ).']" id="'.esc_attr( $field['id'] ).'" type="text" value="'.( $meta != "" ? esc_attr( $meta ) : esc_attr( $field['std'] ) ).'" />';
			echo '<span id="pixopr">'.esc_html( $field['pixopr'] ).'</span>';
		
		}

				echo '</span>';
				echo '</td>';
				
			    break;
					
				
			case 'radio':
				echo '<td '.( isset( $field['needmargin'] ) && $field['needmargin'] ? 'style="padding-bottom:'.esc_attr( $field['needmargin'] ).';"' : '' ) .'>';
				
				if ( gifeed_check_browser_version_admin( get_the_ID() ) != 'ie8' ) {
					foreach ( $field['options'] as $key => $option ){
						echo '<input id="'. esc_attr( $key ) .'" type="radio" name="gifeed_meta['. esc_attr( $field['id'] ) .']" value="'. esc_attr( $key ) .'" class="css-checkbox"';
						if ( $meta ){
							if ( $meta == $key ) echo ' checked="checked"'; 
							} else {
								if ( $field['std'] == $key ) echo ' checked="checked"';
								}
								echo ' /><label for="'. esc_attr( $key ) .'" class="css-label">'. esc_html( $option ) .'</label> ';
								}
							}
							
				else {
					foreach ( $field['options'] as $key => $option ){
						echo '<label class="radio-label"><input type="radio" name="gifeed_meta['. esc_attr( $field['id'] ) .']" value="'. esc_attr( $key ) .'" class="radio"';
						if ( $meta ){
							if ( $meta == $key ) echo ' checked="checked"';
							} else {
								if ( $field['std'] == $key ) echo ' checked="checked"';
								}
								echo ' /> '. esc_html( $option ) .'</label> ';
								}
							}							
												
				echo '</td>';

				break;


			case 'checkbox':
				echo '<td '.( isset( $field['needmargin'] ) && $field['needmargin'] ? 'style="padding-bottom:'.esc_attr( $field['needmargin'] ).';"' : '' ) .'>';
			    $val = '';
                if ( $meta ) {
                    if ( $meta == 'on' ) $val = ' checked="checked"';
                } else {
                    if ( $field['std'] == 'on' ) $val = ' checked="checked"';
                }

                echo '<input type="hidden" name="gifeed_meta['. esc_attr( $field['id'] ) .']" value="off" />
                <input class="gifeedswitch" type="checkbox" id="'. esc_attr( $field['id'] ) .'" name="gifeed_meta['. esc_attr( $field['id'] ) .']" value="on"'. $val .' />';
			    echo '</td>';
			    break;
				
				
			case 'color':

			
				?>
				  <script type="text/javascript">
				  /*<![CDATA[*/
				  
				 jQuery(document).ready(function($) { 
				  
				 jQuery('#<?php echo esc_html( $field['id'] ); ?>_picker').children('div').css('backgroundColor', '<?php echo ($meta ? esc_html( $meta ) : esc_html(  $field['std'] ) ); ?>');    
				 jQuery('#<?php echo esc_html( $field['id'] ); ?>_picker').ColorPicker({
					color: '<?php echo ($meta ? esc_html( $meta ) : esc_html( $field['std'] ) ); ?>',
					onShow: function (colpkr) {
						jQuery(colpkr).fadeIn(500);
						return false;
					},
					onHide: function (colpkr) {
						jQuery(colpkr).fadeOut(500);
						return false;
					},
					onChange: function (hsb, hex, rgb) {
						//jQuery(this).css('border','1px solid red');
						jQuery('#<?php echo esc_html( $field['id'] ); ?>_picker').children('div').css('backgroundColor', '#' + hex);						
						jQuery('#<?php echo esc_html( $field['id'] ); ?>_picker').next('input').attr('value','#' + hex);
					}
				  });
				  
				  });				

				  /*]]>*/
                  </script>   
                
                <?php
			

				echo '<td '.( isset( $field['needmargin'] ) && $field['needmargin'] ? 'style="padding-bottom:'.esc_attr( $field['needmargin'] ).';"' : '' ) .'>';
				echo'<div id="'. esc_attr( $field['id'] ) .'_picker" class="colorSelector"><div></div></div>
				<input style="margin-left:10px; width:75px !important;text-align:center;" name="gifeed_meta['. esc_attr( $field['id'] ) .']" id="'. esc_attr( $field['id'] ) .'" type="text" value="'.($meta ? esc_attr( $meta ) : esc_attr( $field['std'] ) ).'" />';
                echo '</td>';
			    break;

			case 'pattern': 
			echo '<td '.( isset( $field['needmargin'] ) && $field['needmargin'] ? 'style="padding-bottom:'.esc_attr( $field['needmargin'] ).';"' : '' ) .'>';			
		?>		
    <input type="hidden" value="pattern-11.png" name="gifeed_meta[<?php echo esc_attr( $field['id'] ); ?>]" id="<?php echo esc_attr( $field['id'] ); ?>" />
    
    <div class="gifeed_pattern_box">
    <img src="<?php echo plugins_url( 'img/metabox/overlay-pattern.png', __FILE__ ); ?>" width="453" height="177"/>
    </div>   				
				<?php	
				echo '</td>';
				
				break;
				
				
			case 'typography':
			
				if ( is_array( $meta ) ) {
					
					$typo_size = $meta['size'];
					$typo_color = $meta['color'];
					$typo_font = $meta['font'];
					$typo_weight = $meta['weight'];

					}
					
					else {
						
						if ( is_array( $field['std'] ) ) {
							
							$typo_size = $field['std']['size'];
							$typo_color = $field['std']['color'];
							$typo_font = $field['std']['font'];
							$typo_weight = $field['std']['weight'];
						
						}

				}
			
			?>
			
			<script type="text/javascript">
				  /*<![CDATA[*/
				  
				 jQuery(document).ready(function($) {
				  
				 jQuery('#<?php echo esc_html( $field['id'] ); ?>_picker').children('div').css('backgroundColor', '<?php echo esc_html( $typo_color ); ?>');    
				 jQuery('#<?php echo esc_html( $field['id'] ); ?>_picker').ColorPicker({
					color: '<?php echo esc_html( $typo_color ); ?>',
					onShow: function (colpkr) {
						jQuery(colpkr).fadeIn(500);
						return false;
					},
					onHide: function (colpkr) {
						jQuery(colpkr).fadeOut(500);
						return false;
					},
					onChange: function (hsb, hex, rgb) {
						//jQuery(this).css('border','1px solid red');
						jQuery('#<?php echo esc_html( $field['id'] ); ?>_picker').children('div').css('backgroundColor', '#' + hex);						
						jQuery('#<?php echo esc_html( $field['id'] ); ?>_picker').next('input').attr('value','#' + hex);
					}
				  });
				  
				  });				

				  /*]]>*/
                  </script>   
                
                <?php
			

				echo '<td '.( isset( $field['needmargin'] ) && $field['needmargin'] ? 'style="padding-bottom:'.esc_attr( $field['needmargin'] ).';"' : '' ) .'>';
				// FONT SIZE
				echo'<select data-def="'.esc_attr( $field['std']['size'] ).'" class="gifeed-typo" id="'. esc_attr( $field['id'] ) .'_size" style="width:65px !important;" name="gifeed_meta['. esc_attr( $field['id'] ) .'][size]">';
				
				$fontsz = array();
				
				foreach (range(10, 35) as $i) {
						$fontsz[$i.'px'] = $i.'px';
						
					}
				
				foreach ( $fontsz as $key => $option ){
					
						$tval = $option;
										
					echo '<option value="' . esc_attr( $tval ) . '"';
					if ( $typo_size ){ 
						if ( $typo_size == $tval ) echo ' selected="selected"'; 
					}
					echo'>'. esc_html( $option ) .'</option>';
				}
				echo'</select>';
				
				// FONT COLOR
				echo'<div style="float: none !important;top: 9px;margin-left: 12px;" id="'. esc_attr( $field['id'] ) .'_picker" class="colorSelector"><div class="col-indicator"></div></div>
				<input data-def="'.esc_attr( $field['std']['color'] ).'" class="gifeed-typo backonly" id="'.esc_attr( $field['id'] ).'_color" style="display:none;margin-left:10px; margin-right:10px; width:75px !important;" name="gifeed_meta['. esc_attr( $field['id'] ) .'][color]" type="text" value="'.esc_attr( $typo_color ).'" />';
				
				// FONT FAMILY
				echo'<select data-def="'.esc_attr( $field['std']['font'] ).'" class="gifeed-typo" class="gifeed_font_list" id="'.esc_attr( $field['id'] ).'_font" style="width:150px !important;margin-left:10px;margin-right:12px;" name="gifeed_meta['. esc_attr( $field['id'] ) .'][font]">';
				
				
				$systemfonts = array(
							'default-font' => '--- Default Fonts ---',
							'Arial, sans-serif' => 'Arial',
							'"Avant Garde", sans-serif' => 'Avant Garde',
							'Cambria, Georgia, serif' => 'Cambria',
							'Open Sans' => 'Open Sans',
							'Copse, sans-serif' => 'Copse',
							'Garamond, "Hoefler Text", Times New Roman, Times, serif' => 'Garamond',
							'Georgia, serif' => 'Georgia',
							'"Helvetica Neue", Helvetica, sans-serif' => 'Helvetica Neue',
							'Tahoma, Geneva, sans-serif' => 'Tahoma'
						);
						
				$fontlist = $systemfonts;
				
				foreach ( $fontlist as $key => $option ){
										
					echo '<option value="' . htmlspecialchars( $key ) . '"';
					
					if ( $typo_font ){ 
						if ( $typo_font == $key ) { echo ' selected="selected"'; } 
					}
					
					echo'>'. esc_html( $option ) .'</option>';
				}
				echo'</select>';
				
				
				
				// FONT WEIGHT
				$fontweight = array(
							'bold' => 'Bold',
							'normal' => 'Normal',
						);
				
				echo'<select data-def="'.esc_attr( $field['std']['weight'] ).'" class="gifeed-typo" id="'.esc_attr( $field['id'] ).'_weight" style="width:85px !important;" name="gifeed_meta['. esc_attr( $field['id'] ) .'][weight]">';
				
				foreach ( $fontweight as $key => $option ){
										
					echo '<option value="' . esc_attr( $key ) . '"';
					if ( $typo_weight ){ 
						if ( $typo_weight == $key ) echo ' selected="selected"'; 
					}
					echo'>'. esc_html( $option ) .'</option>';
				}
				echo'</select>';
				
				echo'<div data-fontgroup="'.esc_attr( $field['id'] ).'" class="tooltips gifeed_font_preview"><span class="iscnt">Preview Font</span><span class="grayscale gifeed_font_preview_logo"></span></div>';
				


				if ( $field['id'] == 'gifeed_meta_content_meta_fontstyle' ) {
					
					echo'<br><div style="margin-top: 35px; float:right;" class="button gifeed_font_reset">Reset to Default</div>';
					
					}
				
			    echo '</td>';
			    break;
				
			case 'truncate':
				
                if ( ( isset( $meta['truncate'] ) && $meta['truncate'] == 'on' ) || ( ! isset( $meta['truncate'] ) && $field['std']['use'] == 'on' ) ) {
					$val = ' checked="checked"';
					$show = '';
				}
				else {
					$val = '';
					$show = 'display:none;';
		
                }
			
			    echo '<td '.( isset( $field['needmargin'] ) && $field['needmargin'] ? 'style="padding-bottom:'.esc_attr( $field['needmargin'] ).';"' : '' ) .'>';
                echo '<div><input type="hidden" name="gifeed_meta['. esc_attr( $field['id'] ) .'][truncate]" value="off" /><input class="gifeedswitch" type="checkbox" id="'. esc_attr( $field['id'] ) .'_truncate" name="gifeed_meta['. esc_attr( $field['id'] ) .'][truncate]" value="on" '. esc_attr( $val ) .' /></div><div id="'.esc_attr( $field['id'] ).'" style="border-top: 1px solid #ccc; padding-top: 10px; margin-top:10px;'.$show.'"><div style="margin-top:10px; margin-bottom:10px;"><strong>Max Title Length</strong> <input style="margin-right:5px !important; margin-left:3px; width:43px !important; float:none !important;" name="gifeed_meta['. esc_attr( $field['id'] ) .'][length]" id="gifeed_meta['. esc_attr( $field['id'] ) .']_length" type="text" value="' .( isset( $meta['length'] ) ? esc_attr( $meta['length'] ) : esc_attr( $field['std']['length'] ) ).'" /><span style="border-right:solid 1px #CCC;margin-left:9px; margin-right:10px !important; "></span><strong>Ending</strong> <input style="margin-left:3px; margin-right:5px !important; width:43px !important; float:none !important;" name="gifeed_meta['. esc_attr( $field['id'] ) .'][ending]" id="gifeed_meta['. esc_attr( $field['id'] ) .']_ending" type="text" value="' .( isset( $meta['ending'] ) ? esc_attr( $meta['ending'] ) : esc_attr( $field['std']['ending'] ) ).'" /></div></div></td>';
			    break;

			case 'separator':
			    echo '<td class="menuseparator">';
				
				if ( $field['id'] == 'gifeed_meta_separator_form_content_typo' ) {
						
						echo '<p class="gifeed_gfont_notes">Please validate Google Fonts API Key to be able to use all Google Fonts<br /><a href="javascript:void(0)" onclick="alert(\'Pro version only!\');">Learn more how to validate here</a></p>';
					
					}
				
			    echo '</td>';
			    break;	
					
	
/*-----------------------------------------------------------------------------------*/	
		}
		
		
/*-----------------------------------------------------------------------------------*/	
			
		
		echo '</tr>';
	}
 
	echo '</table>';
	
    if ( isset( $meta_box['istabbed'] ) && $meta_box['istabbed'] != '' ){
    	echo '</div></div><!--END CON--></div><!--END TAB-->';
    }
	
}

/*-----------------------------------------------------------------------------------*/
/*	Register related Scripts and Styles
/*-----------------------------------------------------------------------------------*/

	// SELECT MEDIA METABOX
add_action( 'add_meta_boxes', 'gifeed_metabox_work' );

function gifeed_metabox_work(){
	
	    $meta_box = array(
		'id' => 'gifeed_meta_feedbuilder',
		'title' =>  __( 'Feed Builder', 'feed-instagram-lite' ),
		'description' => '',
		'page' => 'ginstagramfeed',
		'context' => 'normal',	
		'istabbed' => '',
		'priority' => 'default',
		'fields' => array(
			
			array(
                'name'     => '',
                'desc'     => '',
                'id'       => 'gifeed_meta__fake',
                'type'     => 'feedbuilder',
                'sub_type' => '',
                'isfull'   => 'yes',
                'options'  => array(),
                'std'      => array(),
            ),
					
			array(
					'name' => '',
					'desc' => '',
					'id' => 'gifeed_meta_feed_format',
					'type' => '',
					'sub_type' => 'format',
					'isfull' => 'yes',
					'needkey' => 'yes',		
					'options' => array (
										'individual'=> 'Show info from each user inside different block',
										'group'=> 'Group all in one block and use info from first user in list above',							
										),
					'std' => 'individual',
					),
			array(
				'name'  => '',
				'desc'  => '',
				'id'    => 'gifeed_meta_ids_tags',
				'type'  => '',
				'sub_type' => 'ids_tags',
				'std'   => '',
			)
				),

	);
    gifeed_add_meta_box( $meta_box );


	    $meta_box = array(
		'id' => 'gifeed_meta_settings',
		'title' =>  __( 'Settings', 'feed-instagram-lite' ),
		'description' => '',
		'page' => 'ginstagramfeed',
		'context' => 'normal',
		'istabbed' => 'yes',	
		'priority' => 'default',
		'fields' => array(


			// Feed > Settings
			array(
					'name' => __( 'Short, Order &amp; Columns', 'feed-instagram-lite' ),
					'desc' => '',
					'id' => 'gifeed_meta_separator_feed',
					'type' => 'separator',
					'group' => 'feed',
					),
					
					
			array(
					'name' => __( 'Sort By', 'feed-instagram-lite' ),
					'desc' => __( 'Select how to short images / media.', 'feed-instagram-lite' ),
					'id' => 'gifeed_meta_feed_sort',
					'type' => 'select',	
					'group' => 'feed',
					'needkey' => 'yes',		
					'options' => array (
										'none'=> 'Default',	
										'most-recent'=> 'Newest to oldest',
										'least-recent'=> 'Oldest to newest',
										'most-liked'=> 'Highest of Likes to lowest',
										'least-liked'=> 'Lowest Likes to highest',
										'most-commented'=> 'Highest of Comments to lowest',
										'least-commented'=> 'Lowest of Comments to highest',
										'random'=> 'Random order',							
										),
					'std' => 'most-recent',
					),			

			array(
					'name' => __( 'Number of Columns', 'feed-instagram-lite' ),
					'desc' => __( 'Feed columns count you can set. Default : 3', 'feed-instagram-lite' ),
					'id' => 'gifeed_meta_feed_columns',
					'type' => 'select',	
					'group' => 'feed',
					'needkey' => 'yes',
					'options' => array_replace( array(), gifeed_generate_number( '1', '10' ) ),
					'std' => '3',
					'needmargin' => '55px',
					),
					
					
			// Feed > Images	
			array(
					'name' => __( 'Images and Videos', 'feed-instagram-lite' ),
					'desc' => '',
					'id' => 'gifeed_meta_separator_feed_img',
					'type' => 'separator',
					'group' => 'feed',
					),
					
			array(
					'name' => __( 'Number of Images / Video', 'feed-instagram-lite' ),
					'desc' => __( 'Number of photos or videos to show for the first load. Another images or videos will be displayed by clicking LOAD MORE button.', 'feed-instagram-lite' ),
					'id' => 'gifeed_meta_feed_items_num',
					'type' => 'select',	
					'group' => 'feed',
					'needkey' => 'yes',		
					'options' => array_replace( array(), gifeed_generate_number( '1', '33' ) ),
					'std' => '15',
					),
					
			array(
					'name' => __( 'Images / Videos Padding', 'feed-instagram-lite' ),
					'desc' => __( 'You can easily set the padding around images or videos here. Default : 10px', 'feed-instagram-lite' ),
					'id' => 'gifeed_meta_feed_items_padding',
					'type' => 'slider',
					'std' => '10',
					'max' => '100',
					'min' => '0',
					'step' => '1',
					'lengthunitopt' => 'N',
					'usestep' => '1',
					'pixopr' => 'px',
					'group' => 'feed',
					'needkey' => 'yes',		
					'options' => array (
										'%'=> '%',	
										'px'=> 'px',),
					),					
					
					
			array(
					'name' => __( 'Image Resolution', 'feed-instagram-lite' ),
					'desc' => __( 'Size of the images to get.', 'feed-instagram-lite' ),
					'id' => 'gifeed_meta_feed_img_res',
					'type' => 'select',	
					'group' => 'feed',
					'needkey' => 'yes',		
					'options' => array (
										'thumbnail'=> 'Thumbnail - 150x150',	
										'low_resolution'=> 'Medium - 320x320 ( default )',
										'standard_resolution'=> 'Large - 612x612',					
										),
					'std' => 'low_resolution',
					),
					
					
			array(
					'name' => __( 'Video Resolution', 'feed-instagram-lite' ),
					'desc' => __( 'Resolution of the video that you can choose.', 'feed-instagram-lite' ),
					'id' => 'gifeed_meta_feed_vid_res',
					'type' => 'select',	
					'group' => 'feed',
					'needkey' => 'yes',		
					'options' => array (
										'low_bandwidth'=> 'Low Bandwidth',	
										'low_resolution'=> 'Low Resolution',
										'standard_resolution'=> 'Standard Resolution',					
										),
					'std' => 'standard_resolution',
					),
					
			array(
					'name' => __( 'Video Auto Play', 'feed-instagram-lite' ),
					'desc' => __( 'If enabled, the video will automatically start playing on Lightbox mode.', 'feed-instagram-lite' ),
					'id' => 'gifeed_meta_feed_vid_autop',
					'type' => 'checkbox',
					'group' => 'feed',		
					'std' => 'on',
					'needmargin' => '75px',
					),

					
			// Feed > Header	
			array(
					'name' => __( 'Header', 'feed-instagram-lite' ),
					'desc' => '',
					'id' => 'gifeed_meta_separator_feed_header',
					'type' => 'separator',
					'group' => 'feed',
					),
					
			array(
					'name' => __( 'Show the Header', 'feed-instagram-lite' ),
					'desc' => __( 'If enabled, the header will show on each feed(s).', 'feed-instagram-lite' ),
					'id' => 'gifeed_meta_feed_is_header',
					'type' => 'checkbox',
					'group' => 'feed',		
					'std' => 'on'
					),
					
			array(
					'name' => __( 'Header Title', 'feed-instagram-lite' ),
					'desc' => __( 'You can set your header title with username, fullname or hide ( no title ).', 'feed-instagram-lite' ),
					'id' => 'gifeed_meta_feed_header_title',
					'type' => 'radio',
					'group' => 'feed',	
					'options' => array (	
										'username'=> 'Username',
										'full_name'=> 'Fullname',
										'notitle'=> 'No Title' ),	
					'std' => 'username',
					),
					
			array(
					'name' => __( 'Show User Bio', 'feed-instagram-lite' ),
					'desc' => __( 'If enable, another user or your biography will be displayed in the header.', 'feed-instagram-lite' ),
					'id' => 'gifeed_meta_feed_header_bio',
					'type' => 'checkbox',
					'group' => 'feed',		
					'std' => 'on'
					),	
					
			array(
					'name' => __( 'Show Follower', 'feed-instagram-lite' ),
					'desc' => __( 'If enabled, another user or your follower(s) will be displayed in the header.', 'feed-instagram-lite' ),
					'id' => 'gifeed_meta_feed_header_follower',
					'type' => 'checkbox',
					'group' => 'feed',		
					'std' => 'on'
					),	
					
			array(
					'name' => __( 'Show Total Post', 'feed-instagram-lite' ),
					'desc' => __( 'If enable, another user or your post(s) will be displayed in the header.', 'feed-instagram-lite' ),
					'id' => 'gifeed_meta_feed_header_ttl_post',
					'type' => 'checkbox',
					'group' => 'feed',		
					'std' => 'on',
					'needmargin' => '75px',
					),
					
					
			// Feed > Content	
			array(
					'name' => __( 'Content', 'feed-instagram-lite' ),
					'desc' => '',
					'id' => 'gifeed_meta_separator_feed_body',
					'type' => 'separator',
					'group' => 'feed',
					),
					
			array(
					'name' => __( 'Show Title', 'feed-instagram-lite' ),
					'desc' => __( 'If enabled, the title will appear on each feed(s).', 'feed-instagram-lite' ),
					'id' => 'gifeed_meta_feed_is_title',
					'type' => 'checkbox',
					'group' => 'feed',		
					'std' => 'on'
					),
					
			array(
					'name' => __( 'Show Share Button', 'feed-instagram-lite' ),
					'desc' => __( 'If enabled, the Share Button will appear on each feed(s).', 'feed-instagram-lite' ),
					'id' => 'gifeed_meta_feed_is_social_btn',
					'type' => 'checkbox',
					'group' => 'feed',		
					'std' => 'on'
					),
					
			array(
					'name' => __( 'Show Meta', 'feed-instagram-lite' ),
					'desc' => __( 'If enabled, the total Likes, Comments and Upload Dates will appear on each feed(s).', 'feed-instagram-lite' ),
					'id' => 'gifeed_meta_feed_is_meta',
					'type' => 'checkbox',
					'group' => 'feed',		
					'std' => 'on',
					'needmargin' => '75px',
					),
					
					
			// Feed > Footer	
			array(
					'name' => __( 'Footer', 'feed-instagram-lite' ),
					'desc' => '',
					'id' => 'gifeed_meta_separator_feed_footer',
					'type' => 'separator',
					'group' => 'feed',
					),
					
			array(
					'name' => __( 'Show the Footer', 'feed-instagram-lite' ),
					'desc' => __( 'If enabled, the footer will show on each feed(s).', 'feed-instagram-lite' ),
					'id' => 'gifeed_meta_feed_is_footer',
					'type' => 'checkbox',
					'group' => 'feed',		
					'std' => 'on',
					'needmargin' => '75px',
					
					),

			// Feed Style & Layout
			array(
					'name' => __( 'Feeds Styles', 'feed-instagram-lite' ),
					'desc' => '',
					'id' => 'gifeed_meta_separator_feed_layout',
					'type' => 'separator',
					'group' => 'layout',
					),
				
					
			array(
					'name' => __( 'Use Shadow?', 'feed-instagram-lite' ),
					'desc' => __( 'If enabled, the shadow will show around the Feed.', 'feed-instagram-lite' ),
					'id' => 'gifeed_meta_style_feed_shadow',
					'type' => 'checkbox',
					'group' => 'layout',		
					'std' => 'on',
					),
					
			array(
					'name' => __( 'Content Background Color', 'feed-instagram-lite' ),
					'desc' => __( 'Set the background color for your feed content. Default: #f5f5f5', 'feed-instagram-lite' ),
					'id' => 'gifeed_meta_style_cnt_body_col',
					'type' => 'color',
					'std' => '#f5f5f5',
					'group' => 'layout',
					),
					
			array(
					'name' => __( 'Footer Background Color', 'feed-instagram-lite' ),
					'desc' => __( 'Set the background color for your feed footer. Default: #FCFCFC', 'feed-instagram-lite' ),
					'id' => 'gifeed_meta_style_cnt_footer_col',
					'type' => 'color',
					'std' => '#FCFCFC',
					'group' => 'layout',
					'needmargin' => '75px',
					),					 
				 
			// Typography				 
			array(
					'name' => __( 'Typography', 'feed-instagram-lite' ),
					'desc' => '',
					'id' => 'gifeed_meta_separator_form_content_typo',
					'type' => 'separator',
					'group' => 'layout',
					),
						
			array(
					'name' => __( 'Header Username / Fullname Font Style', 'feed-instagram-lite' ),
					'desc' => __( 'Set font style for username in header area.', 'feed-instagram-lite' ),
					'id' => 'gifeed_meta_header_username_fontstyle',
					'type' => 'typography',
					'std' => array( 'size' => '18px', 'font' => 'Open Sans', 'color' => '#666', 'weight' => 'bold' ),
					'group' => 'layout',
					),	
					
			array(
					'name' => __( 'Header User Bio Font Style', 'feed-instagram-lite' ),
					'desc' => __( 'Set font style for user Bio in header area.', 'feed-instagram-lite' ),
					'id' => 'gifeed_meta_header_userbio_fontstyle',
					'type' => 'typography',
					'std' => array( 'size' => '14px', 'font' => 'Open Sans', 'color' => '#B0B0B0', 'weight' => 'normal' ),
					'group' => 'layout',
					),
					
			array(
					'name' => __( 'Header User Meta Font Style', 'feed-instagram-lite' ),
					'desc' => __( 'Set font style for user info about followers and Posts count in header area.', 'feed-instagram-lite' ),
					'id' => 'gifeed_meta_header_usermeta_fontstyle',
					'type' => 'typography',
					'std' => array( 'size' => '12px', 'font' => 'Open Sans', 'color' => '#666', 'weight' => 'normal' ),
					'group' => 'layout',
					),		
						
					
			array(
					'name' => __( 'Content Title Font Style', 'feed-instagram-lite' ),
					'desc' => __( 'Set font style for feed title in content area.', 'feed-instagram-lite' ),
					'id' => 'gifeed_meta_content_title_fontstyle',
					'type' => 'typography',
					'group' => 'layout',
					'std' => array( 'size' => '16px', 'font' => 'Open Sans', 'color' => '#666', 'weight' => 'normal' ),
					),
					
			array(
					'name' => __( 'User Meta Font Style', 'feed-instagram-lite' ),
					'desc' => __( 'Set font style for feed user meta in content area ( Likes, Comments and Date ).', 'feed-instagram-lite' ),
					'id' => 'gifeed_meta_content_meta_fontstyle',
					'type' => 'typography',
					'group' => 'layout',
					'std' => array( 'size' => '11px', 'font' => 'Open Sans', 'color' => '#8D8D8D', 'weight' => 'normal' ),
					),
					
			array(
					'name' => __( 'Truncate Feed Title', 'feed-instagram-lite' ),
					'desc' => __( 'Truncate a string if it is longer than the specified number of characters. Truncated strings will end with a translatable ellipsis sequence (…) or specified characters.', 'feed-instagram-lite' ),
					'id' => 'gifeed_meta_content_title_truncate',
					'type' => 'truncate',
					'group' => 'layout',
					'std' => array( 'use' => 'on', 'length' => '100', 'ending' => '...' ),
					'needmargin' => '55px',
					),					
					
					
			// Lightbox Styles
			array(
					'name' => __( 'Lightbox Styles', 'feed-instagram-lite' ),
					'desc' => '',
					'id' => 'gifeed_meta_separator_lightbox',
					'type' => 'separator',
					'group' => 'layout',
					),
					
			array(
					'name' => __( 'Lightbox Overlay Color', 'feed-instagram-lite' ),
					'desc' => __( 'Set the text color for Lightbox Overlay. Default: #3b3b3b', 'feed-instagram-lite' ),
					'id' => 'gifeed_meta_style_lbox_overlay_col',
					'type' => 'color',
					'std' => '#3b3b3b',
					'group' => 'layout',
					),
					
			array(
					'name' => __( 'Lightbox Overlay Opacity', 'feed-instagram-lite' ),
					'desc' => __( 'Set the opacity for the overlay. Default : 90%', 'feed-instagram-lite' ),
					'id' => 'gifeed_meta_style_lbox_overlay_opacity',
					'type' => 'slider',
					'std' => '90',
					'max' => '100',
					'min' => '0',
					'step' => '1',
					'usestep' => '1',
					'pixopr' => '%',
					'group' => 'layout',
					),
					
			array(
					'name' => __( ' Lightbox Overlay Pattern', 'feed-instagram-lite' ),
					'desc' => __( 'Set your lightbox overlay pattern.', 'feed-instagram-lite' ),
					'id' => 'gifeed_meta_style_lbox_overlay_pattern',
					'type' => 'pattern',
					'std' => 'pattern-11.png',
					'group' => 'layout',
					'needmargin' => '35px',
				 ),
				 

			// Comment			 
			array(
					'name' => __( 'Comments', 'feed-instagram-lite' ),
					'desc' => '',
					'id' => 'gifeed_meta_separator_comment',
					'type' => 'separator',
					'group' => 'layout',
					),
					
			array(
					'name' => __( 'Show The Comments in Lightbox', 'feed-instagram-lite' ),
					'desc' => __( 'If enabled, all media comments will appear in lightbox mode.', 'feed-instagram-lite' ),
					'id' => 'gifeed_meta_comment_show_comment',
					'type' => 'checkbox',
					'group' => 'layout',		
					'std' => 'on',
					),
					
			array(
					'name' => __( 'Allow Comments for Media', 'feed-instagram-lite' ),
					'desc' => __( 'If enabled, anyone can write down the comment in lightbox mode.', 'feed-instagram-lite' ),
					'id' => 'gifeed_meta_comment_is_comment',
					'type' => 'checkbox',
					'group' => 'layout',		
					'std' => 'on',
					),
					
			array(
					'name' => __( 'Comment Area Width', 'feed-instagram-lite' ),
					'desc' => __( 'Set the width of comment area in lightbox mode. Default : 330px', 'feed-instagram-lite' ),
					'id' => 'gifeed_meta_comment_area_width',
					'type' => 'slider',
					'std' => '330',
					'max' => '550',
					'min' => '330',
					'step' => '1',
					'usestep' => '1',
					'pixopr' => 'px',
					'group' => 'layout',
					'needmargin' => '75px',
					),
				 

			// Load More Button Styles
			array(
					'name' => __( 'Load More Button', 'feed-instagram-lite' ),
					'desc' => '',
					'id' => 'gifeed_meta_separator_button_lm',
					'type' => 'separator',
					'group' => 'layout',
					),
					
			array(
					'name' => __( 'Load More Button Background Color', 'feed-instagram-lite' ),
					'desc' => __( 'Set the color for Button. Default: #0199d9', 'feed-instagram-lite' ),
					'id' => 'gifeed_meta_style_loadmore_col',
					'type' => 'color',
					'std' => '#0199d9',
					'group' => 'layout',
					),
					
			array(
					'name' => __( 'Load More Button Text Color', 'feed-instagram-lite' ),
					'desc' => __( 'Set the color for Button Text. Default: #fff', 'feed-instagram-lite' ),
					'id' => 'gifeed_meta_style_loadmore_txt_col',
					'type' => 'color',
					'std' => '#fff',
					'group' => 'layout',
					),
		
		
			// Misc		
			array(
					'name' => __( 'Custom Text / Label', 'feed-instagram-lite' ),
					'desc' => '',
					'id' => 'gifeed_meta_separator_clabel',
					'type' => 'separator',
					'group' => 'misc',
					),
					
			array(
					'name' => __( 'Load More Text on Button', 'feed-instagram-lite' ),
					'desc' => __( 'Default : Load More', 'feed-instagram-lite' ),
					'id' => 'gifeed_meta_customtext_loadmore',
					'type' => 'text',
					'group' => 'misc',		
					'std' => 'Load More',
					),
					
			array(
					'name' => __( 'If No Media Text on Button', 'feed-instagram-lite' ),
					'desc' => __( 'Default : No more media to load...', 'feed-instagram-lite' ),
					'id' => 'gifeed_meta_customtext_nomore',
					'type' => 'text',
					'group' => 'misc',		
					'std' => 'No more media to load...',
					),
					
			array(
					'name' => __( 'Read More Text on Comment', 'feed-instagram-lite' ),
					'desc' => __( 'Default : Read more...', 'feed-instagram-lite' ),
					'id' => 'gifeed_meta_customtext_readmore',
					'type' => 'text',
					'group' => 'misc',		
					'std' => 'Read more...',
					),
					
			array(
					'name' => __( 'No Comment Text', 'feed-instagram-lite' ),
					'desc' => __( 'Default : No Comment(s)...', 'feed-instagram-lite' ),
					'id' => 'gifeed_meta_customtext_nocom',
					'type' => 'text',
					'group' => 'misc',		
					'std' => 'No Comment(s)...',
					),
					
			array(
					'name' => __( 'Add Comment Text', 'feed-instagram-lite' ),
					'desc' => __( 'Default : Add a comment...', 'feed-instagram-lite' ),
					'id' => 'gifeed_meta_customtext_addcom',
					'type' => 'text',
					'group' => 'misc',		
					'std' => 'Add a comment...',
					),
					
			array(
					'name' => __( 'Link to Instagram in Lightbox mode', 'feed-instagram-lite' ),
					'desc' => __( 'Default : View in Instagram', 'feed-instagram-lite' ),
					'id' => 'gifeed_meta_customtext_linkto',
					'type' => 'text',
					'group' => 'misc',		
					'std' => 'View in Instagram',
					'needmargin' => '35px',
					),

	
			// ADVANCED
			
			array(
					'name' => __( 'SEO Images', 'feed-instagram-lite' ),
					'desc' => '',
					'id' => 'gifeed_meta_separator_seoimage',
					'type' => 'separator',
					'group' => 'adv',
					),
					
			array(
					'name' => __( 'Image ALT', 'feed-instagram-lite' ),
					'desc' => __( 'You can set the length, max-length or disable image alt.', 'feed-instagram-lite' ),
					'id' => 'gifeed_meta_alt_attr',
					'type' => 'radio',
					'group' => 'adv',	
					'options' => array (	
										'altfulllength'=> 'Full Length',	
										'altcut'=> 'Max 35 characters',
										'altdisable'=> 'Disable' ),	
					'std' => 'altfulllength',
					),	
					
			array(
					'name' => __( 'Image Title', 'feed-instagram-lite' ),
					'desc' => __( 'You can set the length, max-length or disable image title.', 'feed-instagram-lite' ),
					'id' => 'gifeed_meta_ttl_attr',
					'type' => 'radio',
					'group' => 'adv',	
					'options' => array (	
										'ttlfulllength'=> 'Full Length',	
										'ttlcut'=> 'Max 35 characters',
										'ttldisable'=> 'Disable' ),	
					'std' => 'ttlfulllength',
					),
					
			array(
					'name' => __( 'Remove Emoji Characters', 'feed-instagram-lite' ),
					'desc' => __( 'If enabled, this plugin will remove all Emoji characters to make your image Alt and Title more SEO friendly.', 'feed-instagram-lite' ),
					'id' => 'gifeed_meta_no_emoji',
					'type' => 'checkbox',
					'group' => 'adv',		
					'std' => 'on',
					'needmargin' => '75px',
					),
					
	
			array(
					'name' => __( 'Custom CSS & JS', 'feed-instagram-lite' ),
					'desc' => '',
					'id' => 'gifeed_meta_separator_customjscss',
					'type' => 'separator',
					'group' => 'adv',
					),

			array(
					'name' => __( 'Custom CSS', 'feed-instagram-lite' ),
					'desc' => __( 'Want to add any custom CSS code? Put in here, and the rest is taken care of. This overrides the default stylesheets.<br /><br />For example: body {
    background-color: #E6E6E6;
}', 'feed-instagram-lite' ),
					'id' => 'gifeed_meta_customcss',
					'type' => 'codemirror',
					'std' => '/* This is sample code */
body { background-color: #E6E6E6; }',
					'codemirrortype' => 'css',
					'group' => 'adv',
					),	
					
					
			array(
					'name' => __( 'Custom JS', 'feed-instagram-lite' ),
					'desc' => __( 'Want to add any custom JS code? Put in here, and the rest is taken care of.<br /><br />For example: alert(\'Hello World!\');', 'feed-instagram-lite' ),
					'id' => 'gifeed_meta_customjs',
					'type' => 'codemirror',
					'std' => '/* This is sample code */
alert(\'Hello World!\');',
					'codemirrortype' => 'javascript',
					'group' => 'adv',
					'needmargin' => '55px',
					),
					
			array(
					'name' => __( 'Custom Template', 'feed-instagram-lite' ),
					'desc' => '',
					'id' => 'gifeed_meta_separator_customtemplate',
					'type' => 'separator',
					'group' => 'adv',
					),
					
			array(
					'name' => __( 'Custom Template', 'feed-instagram-lite' ),
					'desc' => __( 'You can totally 100% modify the look of your feeds with your own custom template. Make sure to use template tags provided to get feeds metadata.', 'feed-instagram-lite' ),
					'id' => 'gifeed_meta_custom_template',
					'type' => 'codemirror',
					'isfull' => 'yes',
					'std' => '<div class="gifeed-card radius shadowDepth1">
  <div class="card__image border-tlr-radius"> <a id="{{id}}" data-w="{{vidw}}" data-h="{{vidh}}" data-rel="lightcase:myCollection" href="{{source}}"> <span class="fa {{typeicon}} media_type" aria-hidden="true"></span> <img id="{{id}}-img" src="{{image}}" alt="{{mediaalt}}" title="{{mediattl}}" class="border-tlr-radius gifeed-item-image"> </a> </div>
  <div class="card__content card__padding">
    <div class="card__share">
      <div class="card__social"> <a target="_blank" class="share-icon facebook" href="{{facebookshare}}"> <span class="fa fa-facebook"></span> </a> <a target="_blank" class="share-icon twitter" href="{{twittersts}}"> <span class="fa fa-twitter"></span> </a> <a target="_blank" class="share-icon googleplus" href="{{googlepshare}}"> <span class="fa fa-google-plus"></span> </a> </div>
      <a id="{{id}}-share" class="share-toggle share-icon" href="#"></a> </div>
    <div class="card__meta"> <span class="meta_tems_holder"> <span class="fa fa-thumbs-up"></span> <span class="insta-data">{{likes}}</span> </span> <span class="meta_tems_holder"> <span class="fa fa-comment"></span> <span class="insta-data recountered">{{comments}}</span> </span> <span class="meta_tems_holder"> <span class="fa fa-calendar"></span> <span class="insta-data">{{timestamp}}</span> </span> </div>
    <div class="card__article"> <a class="feed_title" target="_blank" href="{{link}}">{{caption}}</a> </div>
  </div>
  <div class="card__action">
    <div class="card__author"> <img src="{{model.user.profile_picture}}" alt="user">
      <div class="card__author-content"> <a href="{{link}}" target="_blank">{{model.user.full_name}}</a> </div>
    </div>
  </div>
</div>',
					'codemirrortype' => 'xml',
					'nthick' => 'yes',
					'group' => 'adv',
					'needmargin' => '55px',
					),
		
			)
	);

//-----------------------------------------------------------------------------------------------------------------

	
    gifeed_add_meta_box( $meta_box );
	
}

//-----------------------------------------------------------------------------------------------------------------

/**
 * Save custom Meta Box
 *
 * @param int $post_id The post ID
 */
function gifeed_save_meta_box( $post_id ) {

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
		return;
	
	if ( !isset( $_POST['gifeed_meta'] ) || !isset( $_POST['gifeed_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['gifeed_meta_box_nonce'], basename( __FILE__ ) ) )
		return;
	
	if ( 'page' == $_POST['post_type'] ) {
		if ( !current_user_can( 'edit_page', $post_id ) ) return;
	} else {
		if ( !current_user_can( 'edit_post', $post_id ) ) return;
	}
	
	$dataTemp = gifeed_sanitize_text_or_array_field( $_POST['gifeed_meta'] );
			
		// save data
		foreach( $dataTemp as $key => $val ) {
			
			delete_post_meta( $post_id, $key );
			
			// Sanitize input
			if ( is_array( $dataTemp[$key] ) ) {
				
				foreach( $dataTemp[$key] as $k => $v ) {
					$dataTemp[$key][$k] = wp_filter_nohtml_kses( $dataTemp[$key][$k] );
				}
				
			}
			else {
				$dataTemp[$key] = wp_filter_nohtml_kses( $dataTemp[$key] );
			}

			if ( $key === 'gifeed_meta_ids_tags' ) {

				$eachdata = $dataTemp[$key];
	
				if ( ! is_array( $eachdata ) ) {
	
					$_POST['gifeed_meta'][$key] = explode( ',', $eachdata );
	
				}

				$dataTemp[$key] = gifeed_sanitize_text_or_array_field( $_POST['gifeed_meta'][$key] );
	
			}
			
			add_post_meta( $post_id, $key, $dataTemp[$key], true );
			
		}

    //DEBUG only
    /* echo '<pre>'.json_encode( $_POST['gifeed_meta'], JSON_PRETTY_PRINT ).'</pre>';
    exit(); */

}
add_action( 'save_post', 'gifeed_save_meta_box' );