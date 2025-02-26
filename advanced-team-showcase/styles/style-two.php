<?php

    if( !defined( 'ABSPATH' ) ){
        exit;
    }
    $output .='<div class="advanced-team-showcase-area">';
	while ( $query->have_posts() ) : $query->the_post();


	// Include All Meta Value
	include('all-meta-value.php');

	$output .='<style>';
	
	$output .='.atmswc-style-2{';
		if( $hide_box_shadow == 0 ){
	$output .='box-shadow:'.$first_param.'px '.$second_param.'px '.$third_param.'px '.$fourth_param.'px;';

		}
	$output .='background:#'.$bg_color.';';
	$output .='}';			
	$output .='.atmswc-style-2 .atmswc-style-2-pic img  {
				height:'.$img_height.'px;
			}';
	$output .='.atmswc-style-2{
				text-align:'.$txt_align.';
			}';	
	$output .='.atmswc-style-2 .atmswc-style-2-team-info .atmswc-style-2-title{
				color:#'.$title_color.';
				font-size: '.$title_fontsize.'px;
			}';	
	$output	.='.atmswc-style-2 .atmswc-style-2-popup {
				color: #'.$bio_text_color.';
				font-size: '.$bio_fontsize.'px;
			}';	

	$output .='.atmswc-style-2 .atmswc-style-2-designation{
				color: #'.$designation_color.';
				font-size:'.$bio_fontsize.'px;
			}';	
	$output .='.atmswc-style-2 .atmswc-style-2-mail{
				color: #'.$email_color.';
				font-size:'.$email_fontsize.'px;
			}';		
	$output .='.atmswc-style-2 .atmswc-style-2-web > a{
				box-shadow: none;
				color: #'.$web_color.';
				font-size:'.$web_fontsize.'px;
			}';
	$output .='.atmswc-style-2 .atmswc-style-2-telephone{
				color: #'.$telephone_color.';
				font-size:'.$telephone_fontsize.'px;
			}';	

	if( $bio_social_icon == "round" ){
		$output .='.atmswc-style-2 .atmswc-style-2-social li a{
					border-radius:50px
				}';		
	}

	$output .='.atmswc-style-2 .atmswc-style-2-social li a{
				color:#'.$bio_social_textcolor.';
				background: #'.$bio_social_backcolor.';
				margin-bottom:5px;
			}';	
	$output .='.atmswc-style-2 .atmswc-style-2-social li a:hover{
				color:#'.$bio_social_hcolor.';
				background: #'.$bio_social_backhcolor.';
			}';	


	#Popup CSS
	$output .='.atmswc-popup-left > h2 {
			color:#'.$title_color.';
			font-size: '.$title_fontsize.'px;			
		}';	

	$output .='.atmswc-popup-left .atmswc-style-2-designation {
			color: #'.$designation_color.';
			font-size:'.$bio_fontsize.'px;	
			display:block;		
		}';	
	$output .='.atmswc-popup-left .atmswc-style-2-mail a{
			color: #'.$email_color.';
			font-size:'.$email_fontsize.'px;
			display:block;			
		}';	

	$output .='.atmswc-popup-left .atmswc-style-2-web > a{
			box-shadow: none;
			color: #'.$web_color.';
			font-size:'.$web_fontsize.'px;
			display:block;			
		}';	
	$output .='.atmswc-popup-left .atmswc-style-2-telephone {
			color: #'.$telephone_color.';
			font-size:'.$telephone_fontsize.'px;	
			display:block;	
		}';	

	$output .='.atmswc-popup-right p{
			color: #'.$content_color.';
			font-size:'.$content_fontsize.'px;		
		}';

	if( $bio_social_icon == "round"  ){
		$output .='.social-popup .atmswc-style-2-social li a{
					border-radius:50px
			}';		
	}
	$output .='.social-popup .atmswc-style-2-social li a{
				color:#'.$bio_social_textcolor.';
				background: #'.$bio_social_backcolor.';
			}';	
	$output .='.social-popup .atmswc-style-2-social li a:hover{
				color:#'.$bio_social_hcolor.';
				background: #'.$bio_social_backhcolor.';
			}';																			
	$output .='</style>'; 			

    $post_thumb = get_the_post_thumbnail_url($post->ID);

	$output .='<div class="postgrids-col-lg-3 postgrids-col-md-4 postgrids-col-sm-2 postgrids-col-xs-1">';
	 	$output .='<div class="atmswc-style-2">';
			$output .='<div class="atmswc-style-2-pic">';
			$output .='<img src="'.$post_thumb.'" alt="" />';
			if( $biography_sh == 1 ){

				$output .='<div class="atmswc-style-2-popup">';
						$output .=''.$atmswc_biography.'';
						$output .='<a href="#" data-featherlight="#fl1'.$post->ID.'"><i class="fa fa-eye"></i></a>';
				$output .='</div>';
				
				# Start Popup 
				$content = apply_filters( 'the_content', get_the_content() );
		    	$output.='<div class="lightbox" id="fl1'.$post->ID.'">
			     <div class="atmswc-popup-area">
			      <div class="atmswc-popup-left">
			       <img src="'.$post_thumb.'" alt="" />
			       <h2>'.esc_attr(get_the_title()).'</h2>';
					foreach ( $sort_array as $value ) {   // show details with sorting
						if( $value =="designation"  ){
					        if( $designation_sh == 1 ){
					        	$output .=' <span class="atmswc-style-2-designation">'.$atmswc_designation.'</span>';
					        }
						}
						if( $value =="mail" ){			
					        if( $email_sh == 1 ){
					        	$output .=' <span class="atmswc-style-2-mail"><a href="mailto:'.$atmswc_email.'">'.$atmswc_email.'</a></span>';
					        }
						}
						if( $value =="web" ){			
					        if( $web_sh == 1 ){
					        	$output .=' <span class="atmswc-style-2-web"><a href="'.esc_url($atmswc_web).'">'.$atmswc_web.'</a></span>'; 
					        }
						}
						if( $value =="telephone" ){	
					        if( $telephone_sh == 1 ){
					        	$output .=' <span class="atmswc-style-2-telephone">'.$atmswc_telephone.'</span>'; 
					        }
						}			
					}

			       $output.='
			       <div class="social-popup">';
			        $output .='<ul class="atmswc-style-2-social">';

					foreach ( $sort_social as $s_s ) {    // display social profiles with sorting

						if( $s_s =="fb" ){			
							if( $atmswc_fb !='' || $atmswc_fb !=null  ){
								$output .='	 <li><a href="'.esc_url($atmswc_fb).'"><i class="fa fa-facebook"></i></a></li>';
							}
						}				
						if( $s_s =="twitter" ){					
							if( $atmswc_twitter !='' || $atmswc_twitter !=null ){
								$output .='	 <li><a href="'.esc_url($atmswc_twitter).'"><i class="fa fa-twitter"></i></a></li>';
							}
						}				
						if( $s_s =="gplus" ){					
							if( $atmswc_gplus !='' || $atmswc_gplus !=null ){
								$output .='	 <li><a href="'.esc_url($atmswc_gplus).'"><i class="fa fa-google-plus"></i></a></li>';
							}
						}				
						if( $s_s =="linkedin" ){					
							if( $atmswc_linkedin !='' || $atmswc_linkedin !=null ){
								$output .='	 <li><a href="'.esc_url($atmswc_linkedin).'"><i class="fa fa-linkedin"></i></a></li>';	
							}
						}				
						if( $s_s =="github" ){					
							if( $atmswc_github !='' || $atmswc_github !=null ){
								$output .='	 <li><a href="'.esc_url($atmswc_github).'"><i class="fa fa-github"></i></a></li>';
							}
						}				
						if( $s_s =="behance" ){					
							if( $atmswc_behance !='' || $atmswc_behance !=null ){
								$output .='	 <li><a href="'.esc_url($atmswc_behance).'"><i class="fa fa-behance"></i></a></li>';
							}
						}				
						if( $s_s =="dribbble" ){					
							if( $atmswc_dribble !='' || $atmswc_dribble !=null ){
								$output .='	 <li><a href="'.esc_url($atmswc_dribble).'"><i class="fa fa-dribbble"></i></a></li>';
							}
						}				
						if( $s_s =="youtube" ){					
							if( $atmswc_youtube !='' || $atmswc_youtube !=null ){
								$output .='	 <li><a href="'.esc_url($atmswc_youtube).'"><i class="fa fa-youtube"></i></a></li>';
							}
						}				

					}			               
			        $output .='</ul>';
			        $output.='</div>';
			        $output.=' 
			       </div>
			      <div class="atmswc-popup-right">
			       '.$content.'
			      </div>
			     </div>
			    </div>';
			    # End Popup 		
			}
			$output .='</div>';

			$output .='<div class="atmswc-style-2-team-info">
				<h3 class="atmswc-style-2-title">'.get_the_title().'</h3>';
				foreach ( $sort_array as $value ){
					if( $value =="designation" ){
						if( $designation_sh == 1 ){
							$output .='	<span class="atmswc-style-2-designation">'.esc_attr($atmswc_designation).'</span>';
						}
					}
					if( $value =="mail" ){			
						if( $email_sh == 1 ){
							$output .='	<span class="atmswc-style-2-mail">'.$atmswc_email.'</span>';
						}
					}
					if( $value =="web" ){			
						if( $web_sh == 1 ){
							$output .='	<span class="atmswc-style-2-web"><a href="'.esc_url($atmswc_web).'">'.$atmswc_web.'</a></span>';	
						}
					}
					if( $value =="telephone" ){	
						if( $telephone_sh == 1 ){
							$output .='	<span class="atmswc-style-2-telephone">'.esc_attr($atmswc_telephone).'</span>';	
						}	
					}			
				}
			$output .='<div class="atmswc-style-2-content">';

			$output .='<ul class="atmswc-style-2-social">';
	
			foreach ( $sort_social as $s_s ) {    // display social profiles with sorting

				if( $s_s =="fb" ){			
					if( $atmswc_fb !='' || $atmswc_fb !=null  ){
						$output .='	 <li><a href="'.esc_url($atmswc_fb).'"><i class="fa fa-facebook"></i></a></li>';
					}
				}				
				if( $s_s =="twitter" ){					
					if( $atmswc_twitter !='' || $atmswc_twitter !=null ){
						$output .='	 <li><a href="'.esc_url($atmswc_twitter).'"><i class="fa fa-twitter"></i></a></li>';
					}
				}				
				if( $s_s =="gplus" ){					
					if( $atmswc_gplus !='' || $atmswc_gplus !=null ){
						$output .='	 <li><a href="'.esc_url($atmswc_gplus).'"><i class="fa fa-google-plus"></i></a></li>';
					}
				}				
				if( $s_s =="linkedin" ){					
					if( $atmswc_linkedin !='' || $atmswc_linkedin !=null ){
						$output .='	 <li><a href="'.esc_url($atmswc_linkedin).'"><i class="fa fa-linkedin"></i></a></li>';	
					}
				}				
				if( $s_s =="github" ){					
					if( $atmswc_github !='' || $atmswc_github !=null ){
						$output .='	 <li><a href="'.esc_url($atmswc_github).'"><i class="fa fa-github"></i></a></li>';
					}
				}				
				if( $s_s =="behance" ){					
					if( $atmswc_behance !='' || $atmswc_behance !=null ){
						$output .='	 <li><a href="'.esc_url($atmswc_behance).'"><i class="fa fa-behance"></i></a></li>';
					}
				}				
				if( $s_s =="dribbble" ){					
					if( $atmswc_dribble !='' || $atmswc_dribble !=null ){
						$output .='	 <li><a href="'.esc_url($atmswc_dribble).'"><i class="fa fa-dribbble"></i></a></li>';
					}
				}				
				if( $s_s =="youtube" ){					
					if( $atmswc_youtube !='' || $atmswc_youtube !=null ){
						$output .='	 <li><a href="'.esc_url($atmswc_youtube).'"><i class="fa fa-youtube"></i></a></li>';
					}
				}				

			}										
			$output .='</ul>';

			$output .='</div>';
			$output .='</div>';
		$output .='</div>';
	$output .='</div>';
	endwhile;

	$output .='</div>';   // End advanced-team-showcase-area
