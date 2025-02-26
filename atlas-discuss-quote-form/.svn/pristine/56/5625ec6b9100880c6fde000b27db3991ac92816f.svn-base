<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
if (! function_exists('atlas_discuss_form_shortcode')) {
	// Add Shortcode
	function atlas_discuss_form_shortcode( $atts ) {

		// Attributes
		$atts = shortcode_atts(array('id' => '1'),$atts);
		$output = '';
			if (isset($atts['id'])) {
				$postIds = $atts['id'];
			}
			$args = array ('p' => $postIds,'post_type' => array( 'atlas_discuss_form' ));
			// The Query
			$query = new WP_Query( $args );	
			// The Loop
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();
					
$output .= '<section class="container discuss">';
    $output .= '<form class="form adf" method="post" enctype="multipart/form-data">';
        $output .= '<div class="row">';
                $output .= '<div class="input-field col s6">';
                    $output .= '<i class="material-icons prefix">account_circle</i>';
                    $output .= '<input id="icon_prefix" type="text" class="validate" name="adf_fname">';
                    $output .= '<label for="icon_prefix">First Name</label>';
               $output .= ' </div>';
                $output .= '<div class="input-field col s6">';
                    $output .= '<i class="material-icons prefix">account_circle</i>';
                   $output .= ' <input id="icon_telephone" type="text" class="validate" name="adf_lname">';
                    $output .= '<label for="icon_telephone">Last Name</label>';
                $output .= '</div>';
                $output .= '<div class="input-field col s6">';
                    $output .= '<i class="material-icons prefix">perm_identity</i>';
                   $output .= ' <input id="perm_identity" type="text" class="validate" name="adf_title">';
                    $output .= '<label for="perm_identity">Title/Role</label>';
                $output .= '</div>';
                $output .= '<div class="input-field col s6">';
                    $output .= '<i class="material-icons prefix">email</i>';
                    $output .= '<input id="email" type="text" class="validate"  name="adf_email">';
                    $output .= '<label for="email">Email Address</label>';
               $output .= ' </div>';
                $output .= '<div class="input-field col s6">';
                    $output .= '<i class="material-icons prefix">phone</i>';
                    $output .= '<input id="icon_prefix" type="tel" class="validate" name="adf_phone">';
                    $output .= '<label for="icon_prefix">Phone Number</label>';
                $output .= '</div>';
                $output .= '<div class="input-field col s6">';
                    $output .= '<i class="material-icons prefix">find_in_page</i>';
                    $output .= '<input id="find_in_page" type="text" class="validate" name="adf_url">';
                    $output .= '<label for="find_in_page">Company / Url</label>';
                $output .= '</div>';
                $output .= '<div class="row1">';
                    $output .= '<h5> project scope</h5>';
                    $output .= '<p>Please select from the services below. The estimated budget range will adjust accordingly.</p>';
                    $output .= '<div class="col s6">';
                        $output .= '<ul class="collapsible badget-list" data-collapsible="accordion">';

                            $custom_text = get_post_meta($postIds, 'adf_build', true);  
                            $counter = 1;
                            if($custom_text)
                            {
                                $output .= '<li data-feature="adf_build" class="adf_build">';
                                    $output .= '<div class="collapsible-header"><i class="material-icons">filter_drama</i>'.get_post_meta($postIds, 'adf_field1', true).' <span class="arrow"> <i class="material-icons">add</i></span></div>';
                                    $output .= '<div class="collapsible-body">';
                                        foreach ($custom_text as $key => $val) {
                                            $output .= '<div class="input-field ">';
                                            $output .= '<input type="checkbox" id="id-'.$counter.'" value="'.$val['title'].'" name="projectType[]" data-max="'.$val['maxvalue'].'" data-min="'.$val['minvalue'].'" class="validate">';
                                            $output .= '<label for="id-'.$counter.'">'.$val['title'].'</label>';
                                            $output .= ' </div>';
                                            $counter++;
                                        }
                                    $output .= '</div>';
                                $output .= '</li>';
                            }

                            $custom_text = get_post_meta($postIds, 'adf_theme', true);  
                            
                            if($custom_text)
                            {
                                $output .= '<li data-feature="adf_theme" class="adf_theme">';
                                    $output .= '<div class="collapsible-header"><i class="material-icons">filter_drama</i>'.get_post_meta($postIds, 'adf_field2', true).' <span class="arrow"> <i class="material-icons">add</i></span></div>';
                                    $output .= '<div class="collapsible-body">';
                                        foreach ($custom_text as $key => $val) {
                                            $output .= '<div class="input-field ">';
                                            $output .= '<input type="checkbox" id="id-'.$counter.'" value="'.$val['title'].'" name="projectType[]" data-max="'.$val['maxvalue'].'" data-min="'.$val['minvalue'].'" class="validate">';
                                            $output .= '<label for="id-'.$counter.'">'.$val['title'].'</label>';
                                            $output .= ' </div>';
                                            $counter++;
                                        }
                                    $output .= '</div>';
                                $output .= '</li>';
                            }

                            $custom_text = get_post_meta($postIds, 'adf_on_go', true);  
                            
                            if($custom_text)
                            {
                                $output .= '<li data-feature="adf_on_go" class="adf_on_go">';
                                    $output .= '<div class="collapsible-header"><i class="material-icons">filter_drama</i>'.get_post_meta($postIds, 'adf_field3', true).' <span class="arrow"> <i class="material-icons">add</i></span></div>';
                                    $output .= '<div class="collapsible-body">';
                                        foreach ($custom_text as $key => $val) {
                                            $output .= '<div class="input-field ">';
                                            $output .= '<input type="checkbox" id="id-'.$counter.'" value="'.$val['title'].'" name="projectType[]" data-max="'.$val['maxvalue'].'" data-min="'.$val['minvalue'].'" class="validate">';
                                            $output .= '<label for="id-'.$counter.'">'.$val['title'].'</label>';
                                            $output .= ' </div>';
                                            $counter++;
                                        }
                                    $output .= '</div>';
                                $output .= '</li>';
                            }
                                                       
                            
                        $output .= '</ul>';
                    $output .= '</div>';
                    /*if(get_post_meta($postIds, 'adf_branding', true) || get_post_meta($postIds, 'adf_web', true) || get_post_meta($postIds, 'adf_tddigital', true))
                    {*/
                        $output .= '<div class="col s6">';
                            $output .= '<div class="diagram-estimation">';
                                $output .= '<div class="data-min" style="display: none; " data-minval=""></div>';
                                $output .= '<div class="data-max" style="display: none; " data-maxval=""></div>';
                                $output .= '<div id="canvas-holder" class="active">';
                                    $output .= '<div class="range-estimation">';
                                        $output .= '<input type="text" class="" name="amount" id="amount" readonly="" value="" >';
                                    $output .= '</div>';
                                    $output .= '<canvas height="300" width="300" id="chart-area"></canvas>';
                                $output .= '</div>';
                            $output .= '</div>';
                        $output .= '</div>';
                    //}    

                $output .= '</div>';
                $output .= '<div class="input-field col s12">';
                    $output .= '<textarea id="message"  placeholder="Describe the project" rows="14" data-min-rows="3" name="adf_description" class="valid"></textarea>';
                $output .= '</div>';
                $output .= '<div class="file-field input-field col s12 open">';
                    $output .= '<i class="material-icons prefix browser">open_in_browser</i>';
                    $output .= '<input id="open_in_browser" type="file" class="validate adf_upload_url" name="adf_upload_url" >';
                    $output .= '<label for="open_in_browser">Upload a file or RFP  <span> <i class="material-icons add">add</i></span> </label>';
                    $output .= '<div class="file-path-wrapper" style="float: left; position: absolute; top: 6px; left: 230px;"> <input class="file-path " type="text" disabled placeholder="Upload one files" style="border: medium none;"></div>';
                  
                $output .= '</div>';
                $output .= '<div class="input-field col s6">';
                    $output .= '<i class="material-icons prefix">live_help</i>';
                    $output .= '<input id="live_help" type="text" class="validate" name="adf_here_us">';
                    $output .= '<label for="live_help">How did you hear about us?</label>';
                $output .= '</div>';
                $output .= '<div class="input-field col s6">';
                    $output .= '<i class="material-icons prefix">search</i>';
                    $output .= '<input id="search" type="text" class="validate" name="adf_sicial_media">';
                    $output .= '<label for="search">Which of our social media influenced you the most?</label>';
                $output .= '</div>';
                
                $output .= '<div class="input-field col s12">';
                    $output .= '<i class="material-icons prefix">visibility</i>';
                    $days = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');             
                    $indx = array_rand($days);
                    $output .= '<input id="visibility" type="text" class="validate"  data-id="'.$indx.'">';                    
                    $output .= '<label for="visibility">Human test: What day comes after '.$days[$indx].'?</label>';
                $output .= '</div>';
                
                $output .= '<div class="input-field col s12 submit_button">    ';
                
                $output .= '<button id="discuss-button'.$postIds.'" data-id="'.$postIds.'" class="discuss-button btn green" type="submit">Send Project Outline</button>';  

                $output .= '</div></div>';
    $output .= '</form>';
    
$output .= '</section>';

}
			}else{
				$output .= 'Please check your shortcode or re-copy and past';
			}
		
			$output .= wp_reset_query();
			$output .= wp_reset_postdata();
			
			return $output;

	}
	add_shortcode( 'atlas-discuss-form-demo', 'atlas_discuss_form_shortcode' );
}    
?>