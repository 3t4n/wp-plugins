 <?php
//Info Box Elements
if(!class_exists("Asb_service_box")){
	class Asb_service_box{
		function __construct(){
			add_action( 'init', array($this, 'init_asb_service_box') );
			add_shortcode( 'asb_service_box',array($this,'asb_service_box_shortcode'));
			add_action( 'wp_enqueue_scripts', array( $this, 'asb_service_box_scripts' ), 1 );
		}
		function asb_service_box_scripts() {
			wp_register_style( 'asb-service-box-style', ASB_PLUGIN_URL . 'vc_elements/css/main/asb-service-box-style.css', false, '1.0.0' );
		}
		function asb_service_box_shortcode($atts,$content = null){
			extract( shortcode_atts( array(
					  'info_box_layout' =>'single_layout',
					  'main_style' =>'style_1',
					  'title' => 'OTK Service Box',
					  'title_color_o' =>'solid',
					  'title_color1' =>'#1e73be',
					  'title_color2' =>'#2fcbce',
					  'title_hover_style' =>'horizontal',
					  'title_color' =>'#ffffff',
					  'title_size' => '24px',
					  'title_line' =>'1.4',
					  'title_use_theme_fonts'=>'custom-font-family',
						'title_font_family'=>'',
						'title_font_weight'=>'600',
					  'title_btm_space' =>'',
					  'title_top_space' =>'',			  

					  'image_icon' => 'icon',
					  'type_img' => '',
					  'type'=> 'fontawesome',
					  'icon_fontawesome'=> 'fa fa-adjust',
					  'icon_openiconic'=> 'vc-oi vc-oi-dial',
					  'icon_typicons'=> 'typcn typcn-adjust-brightness',
					  'icon_entypo'=> 'entypo-icon entypo-icon-note',		  
					  'icon_linecons'=> 'vc_li vc_li-heart',
					  'icon_monosocial'=> 'vc-mono vc-mono-fivehundredpx',
					  'icon_size' =>'small',
					  'icon_color' => '#0099CB',
					  'icon_hvr_color' =>'#ffffff',
					  'icon_bg_color' =>'#ffffff',
					  'icon_bg_hvr_color' =>'#0099CB',
					  'icon_border_color' =>'#121212',
					  'icon_hvr_bdr_color' =>'#ffffff',
					  'desc_color' =>'#fff',
					  'desc_size' =>'14px',
					  'desc_use_theme_fonts'=>'custom-font-family',
					  'desc_family'=>'',
					  'desc_font_weight'=>'400',
					
					  'desc_line' =>'22px',
					  'button_check' => '',
					  'btn_bg' =>'#121212',
					  'btn_size' => '16px',
					  'btn_color' =>'#fff',
					  'btn_border_color' => '#fff',
					  'vertical_center' =>'',
					  'text_align' =>'center',
					  
 
					  'front_color' =>'#FFF',
					  'front_img' =>'',
					  'back_img' =>'',
					  'back_color' =>'#5aa1e3',
					  'box_bg_color' => '#ff004b',
					  'box_hover_color' =>'#0099cc',
					  'animation_effects'=>'no-animation',
					  'animation_delay'=>'50',
					  'box_shadow' => '1px 1px 3px 3px rgba(0, 0, 0, 0.15)',
					  'hvr_box_shadow' =>'0 22px 43px rgba(0, 0, 0, 0.15)',
					  'head_bg_color' =>'#ffffff',
					  'padding_top' =>'',
					  'padding_boottom' =>'',
					  'remove_padding' =>'',
					  'remove_cl_padding' =>'',
					  'el_class' =>'',
					  
					'alignment'=>'text-center',
					
					 "style" => 'style-1',
					'btn_hover_style'=>'hover-left',
					'btn_padding'=>'15px 30px',
					"btn_text" => 'OTK Service Box',
					'btn_hover_text'=>'',
					"btn_icon" => 'fontawesome',
				  'btn_icon_fontawesome'=>'fa fa-arrow-right',
					  'btn_icon_openiconic'=> 'vc-oi vc-oi-dial',
					  'btn_icon_typicons'=> 'typcn typcn-adjust-brightness',
					  'btn_icon_entypo'=> 'entypo-icon entypo-icon-note',		  
					  'btn_icon_linecons'=> 'vc_li vc_li-heart',
					  'btn_icon_monosocial'=> 'vc-mono vc-mono-fivehundredpx',
					'btn_use_theme_fonts'=>'custom-font-family',
					'btn_font_family'=>'',
					'btn_font_weight'=>'400',
					
					"before_after" => 'after',
					"btn_url" => '',
					'btn_align' =>'text-left',
					'select_bg_option'=>'normal',
					'normal_bg_color'=>'#252525',
					
					'select_bg_hover_option'=>'normal',
					
					'normal_bg_hover_color'=>'#ff214f',
					'normal_bg_hover_color1'=>'#d3d3d3',
					
					
					'font_size'=>'20px',
					'line_height'=>'25px',
					'text_color'=>'#8a8a8a',
					'text_hover_color'=>'#252525',
					'border_color'=>'#252525',
					'border_hover_color'=>'#252525',
					'border_radius'=>'30px',
					
					'full_width_btn'=>'',
					'transition_hover'=>'',
					
					), $atts ) );
					  
					wp_enqueue_style( 'asb-service-box-style');
					$rand_no=rand(1000000, 1500000);
					
					
					$data_class=$data_attr=$a_href=$a_title=$a_target=$a_rel=$style_content=$icons_before=$icons_after=$button_text=$button_hover_text=$gradient_color=$gradient_hover_color='';
					
					$data_class=' button-'.esc_attr($rand_no).' ';
					$data_class .=' button-'.esc_attr($style).' ';
					
					if($full_width_btn=='yes'){
						$data_class .=' full-button ';
					}
					if($transition_hover=='yes'){
						$data_class .=' trnasition_hover ';
					}
					
					if($btn_use_theme_fonts=='custom-font-family'){
					$btn_font_family='font-family:'.$btn_font_family.';font-weight:'.$btn_font_weight.';';
				}else{
					$btn_font_family='';
				}
				
					
					if($select_bg_option=='normal'){
						$bg_color = $normal_bg_color;
					}else{
						$bg_color = '';
					}
					
					
					$bg_hover_color='';
					
					
					
						$btn_url = ( '||' === $btn_url ) ? '' : $btn_url;
						$btn_url_a= vc_build_link( $btn_url);
						
						$a_href = $btn_url_a['url'];
						$a_title = $btn_url_a['title'];
						$a_target = $btn_url_a['target'];
						$a_rel = $btn_url_a['rel'];
						if ( ! empty( $a_rel ) ) {
							$a_rel = ' rel="' . esc_attr( trim( $a_rel ) ) . '"';
						}
					
					if(!empty($btn_icon)){
				  vc_icon_element_fonts_enqueue( $btn_icon );
				  $btn_icon_class = isset( ${'btn_icon_' . $btn_icon} ) ? esc_attr( ${'btn_icon_' . $btn_icon} ) : 'fa fa-arrow-right';
				  
				  if($before_after=='before'){
				   $icons_before = '<i class="btn-icon button-'.esc_attr($before_after).' '.esc_attr($btn_icon_class).'"></i>';
				  }else{
				   $icons_after = '<i class="btn-icon button-'.esc_attr($before_after).' '.esc_attr($btn_icon_class).'"></i>';
				  }
				 }
					if($style=='style-1'){
						$button_text =$icons_before.$btn_text . $icons_after;
						$style_content='<div class="button_line"></div>';
					}
					if($style=='style-2' || $style=='style-5' || $style=='style-8' || $style=='style-10'){
						$button_text =$icons_before . $btn_text . $icons_after;
					}
					if($style=='style-3'){
						$button_text =$btn_text.'<svg class="arrow" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="48" height="9" viewBox="0 0 48 9"><path d="M48.000,4.243 L43.757,8.485 L43.757,5.000 L0.000,5.000 L0.000,4.000 L43.757,4.000 L43.757,0.000 L48.000,4.243 Z" class="cls-1"></path></svg><svg class="arrow-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="48" height="9" viewBox="0 0 48 9"><path d="M48.000,4.243 L43.757,8.485 L43.757,5.000 L0.000,5.000 L0.000,4.000 L43.757,4.000 L43.757,0.000 L48.000,4.243 Z" class="cls-1"></path></svg>';
					}
					if($style=='style-4'){
						$button_text =$icons_before.$btn_text . $icons_after;
						if(!empty($btn_hover_text)){
							$button_hover_text =' data-hover="'.esc_attr($btn_hover_text).'" ';
						}else{
							$button_hover_text =' data-hover="'.esc_attr($btn_text).'" ';
						}
					}
					if($style=='style-6'){
						$button_text =$btn_text;
					}
					if($style=='style-7'){
						$button_text =$btn_text.'<span class="btn-arrow"></span>';
					}
					if($style=='style-9'){
						$button_text =$btn_text.'<span class="btn-arrow"><i class="fa-show fa fa-chevron-right" aria-hidden="true"></i><i class="fa-hide fa fa-chevron-right" aria-hidden="true"></i></span>';
					}
					if($style=='style-11'){
						$button_text ='<span>'.$icons_before . $btn_text . $icons_after.'</span>';
						if(!empty($btn_hover_text)){
							$button_hover_text =' data-hover="'.esc_attr($btn_hover_text).'" ';
						}else{
							$button_hover_text =' data-hover="'.esc_attr($btn_text).'" ';
						}
						$data_class .=' '.esc_attr($btn_hover_style).' ';
					}
					if($style=='style-12' || $style=='style-15' || $style=='style-16'){
						$button_text ='<span>'.$icons_before . $btn_text . $icons_after.'</span>';
					}
					if($style=='style-13'){
						$button_text ='<span>'.$icons_before . $btn_text . $icons_after.'</span>';
						$data_class .=' '.esc_attr($btn_hover_style).' ';
					}
					if($style=='style-14'){
						$button_text ='<span>'.$icons_before . $btn_text . $icons_after.'</span>';
						if(!empty($btn_hover_text)){
							$button_hover_text =' data-hover="'.esc_attr($btn_hover_text).'" ';
						}else{
							$button_hover_text =' data-hover="'.esc_attr($btn_text).'" ';
						}
					}
					if($style=='style-18' || $style=='style-19' || $style=='style-20' || $style=='style-21' || $style=='style-22'){
						$button_text =$icons_before .'<span>'. esc_html($btn_text) .'</span>'. $icons_after;
					}
					
					if($style=='style-23'){
						$button_text ='<span><div class="align-center">'. $icons_before . $btn_text . $icons_after .'</div></span>';
						if(!empty($btn_hover_text)){
							$button_text .='<span><div class="align-center">'. $icons_before . $btn_hover_text . $icons_after .'</div></span>';
						}else{
							$button_text .='<span><div class="align-center">'. $icons_before . $btn_text . $icons_after .'</div></span>';
						}
						$data_class .=' '.esc_attr($btn_hover_style).' ';
					}
					

					$the_button ='<div class="'.esc_attr($btn_align).' ts-button">';
						$the_button .='<div class="pt_plus_button '.$data_class.'" '.$data_attr.' >';
							$the_button .='<a class="button-link-wrap" href="'.esc_url( $a_href ).'" title="'.esc_attr( $a_title ).'" target="'.esc_attr( $a_target ).'" '.$a_rel.' '.$button_hover_text.'>';
								$the_button .=$button_text;
								$the_button .=$style_content;
							$the_button .='</a>';
						$the_button .='</div>';
					$the_button .='</div>';		
					
					
					
					$hover_attr = '';
					
					
					$service_title = $description= $service_img = $service_btn = $service_center= $service_align = $service_space = $pd=$pd0 =$imge_content=$the_service_main_css=$title_css=$output='';

					if($title_use_theme_fonts=='custom-font-family'){
					$title_font_family='font-family:'.$title_font_family.';font-weight:'.$title_font_weight.';';
				}else{
					$title_font_family='';
				}	


						$title_css = ' style="';							
							$title_css .= 'color: '.esc_attr($title_color).';';
							if($title_size != "") {
								$title_css .= 'font-size: '.esc_attr($title_size).';';
							}
							if($title_line != "") {
								$title_css .= 'line-height: '.esc_attr($title_line).';';
							}
							
							$title_css .= $title_font_family;
						$title_css .= '"';
					if($title !=''){
						if (!empty($a_href)){
							$service_title= '<a href="'.esc_url( $a_href ).'" title="'.esc_attr( $a_title ).'" target="'.esc_attr( $a_target ).'" '.$a_rel.' ><div class="service-title " '.$title_css.'> '.esc_html($title).' </div></a>';
						}else{
							$service_title= '<div class="service-title " '.$title_css.'> '.esc_html($title).' </div>';
						}
					}
				 
						
					
					if($remove_padding == 'true'){
						$service_space ='remove-padding';				
					}
					
					if($desc_use_theme_fonts=='custom-font-family'){
						$desc_font_family='font-family:'.$desc_family.';font-weight:'.$desc_font_weight.';';
					}else{
						$desc_font_family='';
					}
				 
				 
					$desc_css = ' style="';
						if($desc_color != "") {
							$desc_css .='color:'.esc_attr($desc_color).';';
						}	
						if($desc_size != "") {
							$desc_css .='font-size: '.esc_attr($desc_size).';';
						}
						if($desc_line != "") {
							$desc_css .='line-height: '.esc_attr($desc_line).';';
						}
												
							$desc_css .= $desc_font_family ;
					$desc_css .= '"';	
					if($content !=''){
						$content = wpb_js_remove_wpautop($content, true);
						$content = str_replace('mh-service__content', ' ', $content);
						 $description='<div class="service-desc" '.$desc_css.'> '.$content.' </div>';
					}
					
					if($main_style == 'style_6'){
					   $imge_content ="image-height";
					}
					
					if($main_style == 'style_8'){
						
						$icon_css = ' style="';
						if($icon_color != "") {
						$icon_css .= 'color: '.esc_attr($icon_color).';';
						}
						if($icon_bg_color != "") {
						$icon_css .= 'background-color: '.esc_attr($icon_bg_color).';';
						}
						if($icon_border_color != "") {
						$icon_css .= 'border-color: '.esc_attr($icon_border_color).';';
						}
						
						$icon_css .= '"'; 
					}	
					
						if($icon_size == 'small'){
							$service_icon_size = 'service-icon-small';
						}
						if($icon_size == 'medium'){
							$service_icon_size = 'service-icon-medium';
						}
						if($icon_size == 'large'){
							$service_icon_size = 'service-icon-large';
						}
						
					if($image_icon == 'icon'){
						
						
						$icon_css = ' style="';
						if($icon_color != "") {
						$icon_css .= 'color: '.esc_attr($icon_color).';';
						}
						if($icon_bg_color != "") {
						$icon_css .= 'background-color: '.esc_attr($icon_bg_color).' !Important;';
						}
						if($icon_border_color != "") {
						$icon_css .= 'border-color: '.esc_attr($icon_border_color).' !Important;';
						}
						
						$icon_css .= '"'; 
						vc_icon_element_fonts_enqueue( $type );
						$type12= $type; 
						$icon_class = isset( ${'icon_' . $type} ) ? esc_attr( ${'icon_' . $type} ) : 'fa fa-adjust';
						if($main_style == 'style_8'){
							$service_img = '<i class=" '.esc_attr($icon_class).' service-icon '.esc_attr($service_icon_size).'" ></i>';
						}else{	
							$service_img = '<i class=" '.esc_attr($icon_class).' service-icon '.esc_attr($service_icon_size).'" '.$icon_css.'></i>';
						}
					}
						
					if($button_check == 'true'){

						$service_btn = $the_button;
					}
					
					if($vertical_center == 'true'){
						$service_center = 'vertical-center';
					}
						
					if($text_align == 'left'){
						$service_align = 'text-left';
					}
					if($text_align == 'center'){
						$service_align = 'text-center';
					}
					if($text_align == 'right'){
						$service_align = 'text-right';
					} 
					
					if( $image_icon == 'svg' ){
							
							$type_imgs = wp_get_attachment_image_src($type_img, 'full');
						    $service_img = $type_imgs[0];
							 
					}
						
					if($main_style == 'style_5'){
						if($flip_style == 'horizontal'){
							$service_flip= "flip-horizontal";
						}
						if($flip_style == 'vertical'){
							$service_flip= "flip-vertical";
						}
						
						$service_flip_height = ' style="';
						if($flip_height != "") {
						$service_flip_height .= 'min-height: '.esc_attr($flip_height).';';
						}		
						$service_flip_height .= '"'; 
						$flip_front_img = wp_get_attachment_image_src("$front_img ", "full");
							$flip_front_img = $flip_front_img[0];
						$flip_back_img = wp_get_attachment_image_src("$back_img", "full");
							$flip_back_img = $flip_back_img[0];
						
						
						$service_front_css = ' style="';
						if($front_color != "") {
						$service_front_css .= 'background-color: '.esc_attr($front_color).';';
						}
						if($front_img != "") {
						$service_front_css .= 'background: url('.esc_attr($flip_front_img ).');';
						}	
						if($flip_height != "") {
						$service_front_css .= 'min-height: '.esc_attr($flip_height).';';
						}
						$service_front_css .= '"'; 
						
						$service_back_css = ' style="';
						if($back_color != "") {
						$service_back_css .= 'background-color: '.esc_attr($back_color).';';
						}
						if($flip_back_img!= "") {
						$service_back_css .= 'background: url('.esc_attr($flip_back_img).');';
						}	
						if($flip_height != "") {
						$service_back_css .= 'min-height: '.esc_attr($flip_height).';';
						}
						$service_back_css .= '"'; 
					}	
					
					if($main_style != 'style_5' ){
						$pd = 'pd-15';
					}
					if($main_style == 'style_8'  ){
						$pd = '';
						}
					
					if($remove_cl_padding == 'true'){
						$pd0 = 'pd-0';
					}
					if($main_style != 'style_8'  ){
					$the_service_main_css = ' style="';						
						if($main_style != 'style_5'){
						if($box_bg_color!= "") {
						$the_service_main_css .= 'background-color: '.esc_attr($box_bg_color).';';
						}
						}
						if($padding_top != "") {
							$the_service_main_css .='padding-top:'.esc_attr($padding_top).';';
						}	
						if($padding_boottom != "") {
							$the_service_main_css .='padding-bottom: '.esc_attr($padding_boottom).';';
						}
						
					$the_service_main_css .= '"';
					}
					
						$header_css = ' style="';
						if($head_bg_color!= "") {
						$header_css .= 'background-color: '.esc_attr($head_bg_color).';';
						}
					$header_css .= '"';
					
					$style8_css = ' style="';
					if($box_bg_color!= "") {
						$style8_css .= 'background-color: '.esc_attr($box_bg_color).';';
						}
					$style8_css .= '"';
					
					
					if($main_style != 'style_8'){
						$box_hover = ' data-box-hover="'.esc_attr($hvr_box_shadow).'"';
						$box_hadow  = ' data-box-hvr="'.esc_attr($box_shadow).'"';
					}else{
						$box_hover = '';
						$box_hvr = '';
						$box_hadow ='';
					}
					
					
					$hover_attr = ' data-icon_hvr_color="'.esc_attr($icon_hvr_color).'"';
					$hover_attr .= ' data-icon_bg_hvr_color="'.esc_attr($icon_bg_hvr_color).'"';
					$hover_attr .= ' data-icon_hvr_bdr_color="'.esc_attr($icon_hvr_bdr_color).'"';
				
						$uid=uniqid('info_box');
					

					
						$isotope ='';
						$data_slider ='';
					
					if ($info_box_layout == 'single_layout'){	
						$output = '<div class="service-box-inner content_hover_effect "  ' . $hover_attr . '>';	
						if($main_style == 'style_1' || $main_style == 'style_2' ){
							$output .= '<div class="service-box-bg-box '.esc_attr($pd).' '.esc_attr($pd0).'" '.$the_service_main_css.'>';
								$output .= '<div class="service-media text-left '.esc_attr($service_center).' ">';	
								
								if( $image_icon == 'svg' ){
									
									$output .= '<div class="m-r-16"> <img src="'. $service_img .'"> </div>';
									
								} else {
									
									$output .=  '<div class="m-l-16 ">'.$service_img.'</div>';
								}
								 
									$output .= '<div class="service-content ">';
										$output .= $service_title;
										$output .= $description;
										$output .= $service_btn;
									$output .= '</div>';
									$output .= '<a class="all-link"></a>';
								$output .= '</div>';
							$output .= '</div>';	
						}
						
						if($main_style == 'style_41' ){
							$output .= '<div class="service-box-bg-box '.esc_attr($pd).' '.esc_attr($pd0).'" '.$the_service_main_css.'>';
								$output .= '<div class="service-media text-left '.esc_attr($service_center).' ">';	
								
								if( $image_icon == 'svg' ){
									
									$output .= '<div class="m-l-16"> <img src="'. $service_img .'"> </div>';
									
								} else {
									
									$output .=  '<div class="m-l-16">'.$service_img.'</div>';
								}
								 
									$output .= '<div class="service-content ">';
										$output .= $service_title;
										$output .= $description;
										$output .= $service_btn;
									$output .= '</div>';
									$output .= '<a class="all-link"></a>';
								$output .= '</div>';
							$output .= '</div>';	
						}
						
						if($main_style == 'style_3'){
							$output .= '<div class="service-box-bg-box '.esc_attr($pd).' '.esc_attr($pd0).'" '.$the_service_main_css.'>';
								$output .= '<div class="service-media text-left '.esc_attr($service_center).' ">';	
								
								if( $image_icon == 'svg' ){
									
									$output .= '<div class="m-r-16"><div class="m-r-17s"> <img src="'. $service_img .'"> </div></div>';
									
								} else {
									
									$output .=  '<div class="m-l-16 "><div class="m-r-17s">'.$service_img.'</div></div>';
								}
								 
									$output .= '<div class="service-content ">';
										$output .= $service_title;
										$output .= $description;
										$output .= $service_btn;
									$output .= '</div>';
									$output .= '<a class="all-link"></a>';
								$output .= '</div>';
							$output .= '</div>';	
						}
						
						if($main_style == 'style_4'){
							$output .= '<div class="service-box-bg-box '.esc_attr($pd).' '.esc_attr($pd0).'" '.$the_service_main_css.'>';
								$output .= '<div class="service-media text-left '.esc_attr($service_center).' ">';	
								
								if( $image_icon == 'svg' ){
									
									$output .= '<div class="m-r-16"><div class="m-r-17s"> <img src="'. $service_img .'"> </div></div>';
									
								} else {
									
									$output .=  '<div class="m-l-16 "><div class="m-r-17s">'.$service_img.'</div></div>';
								}
								 
									$output .= '<div class="service-content ">';
										$output .= $service_title;
										$output .= $description;
										$output .= $service_btn;
									$output .= '</div>';
									$output .= '<a class="all-link"></a>';
								$output .= '</div>';
							$output .= '</div>';	
						}
						if($main_style == 'style_5'){
							$output .= '<div class="service-box-bg-box '.esc_attr($pd).' '.esc_attr($pd0).'" '.$the_service_main_css.'>';
								$output .= '<div class="service-flipbox '.esc_attr($service_flip).' height-full" '.$service_flip_height.'>';
									$output .= '<div class="service-flipbox-holder height-full text-center perspective bezier-1"	>';
										$output .= '<div class="service-flipbox-front bezier-1 no-backface origin-center" '.$service_front_css.'>';
											$output .= '<div class="service-flipbox-content width-full">';
												$output .= $service_img;
												$output .= '<div class="service-content">';
													$output .= $service_title;
												$output .= '</div>';
											$output .= '</div>';
										$output .= '</div>';	
										$output .= '<div class="service-flipbox-back fold-back-horizontal no-backface bezier-1 origin-center" '.$service_back_css.'>';
											$output .= '<div class="service-flipbox-content width-full">';
												$output .= $description;
												$output .= $service_btn;
											$output .= '</div>';
										$output .= '</div>';	
									$output .= '</div>';				
								$output .= '</div>';
							$output .= '</div>';
						}
						if($main_style == 'style_6'){
							$output .= '<div class="service-box-bg-box '.esc_attr($pd).' '.esc_attr($pd0).'" '.$the_service_main_css.'>';
								$output .= '<div class=" text-left '.esc_attr($service_center).' ">';			
									$output .= '<div class="top-content"> '.$service_img.' </div>';
									$output .= '<div class="bottom-content">';
										$output .= $service_title;
										$output .= $description;
										$output .= $service_btn;
									$output .= '</div>';
								$output .= '</div>';
							$output .= '</div>';
						}
						
						if($main_style == 'style_8'){
							$output .= '<div class="service-box-bg-box '.esc_attr($pd).' '.esc_attr($pd0).'" '.$the_service_main_css.'>';
								$output .= '<div class="about-post  '.esc_attr($service_center).' " '.$style8_css.'>';	
									$output .= '<div class="about-post-content" '.$header_css.'>';
										if($service_img != ''){		
											$output .='<a href="#" class="demo icon-middle " '.$icon_css.'>';
											$output .= '<div class="service-bg-7"> '.$service_img.' </div>';
											$output .= '</a>';
										}
										$output .= $service_title;
									$output .= '</div>';	
									$output .= '<div class="hover-about">';	
										 
										$output .= '<div classs="about-hover-show">';
											$output .= $description;
											$output .= $service_btn;	
										$output .= '</div>';	
									$output .= '</div>';
									
								$output .= '</div>';
							$output .= '</div>';
						}
						
						if($main_style == 'style_11'){
							$output .= '<div class="service-box-bg-box '.esc_attr($pd).' '.esc_attr($pd0).'" '.$the_service_main_css.'>';	
								$output .= '<div class="service-box style-11 text-center">';	
									$output .= '<div class="service-box-all">';
										$output .= '<div class="service-box-wrapper ">';
											$output .= '<div class="service-box-conetnt">';
												$output .= '<div class="service-box-icon-img">';
													$output .= $service_img;
												$output .= '</div>';	
												$output .= $service_title;	
												$output .= '<div class="service-box-title-hide" '.$title_css.'> '.esc_html($title).' </div>';	
											
												$output .= $description;
											$output .= '</div>';
										$output .= '</div>';
									$output .= '</div>';
									$output .= '<div class="service-box-full color" '.$style8_css.'>';
									$output .= '</div>';
								$output .= '</div>';
							$output .= '</div>';	
						}
						$output .= '</div>';
					}
					
					
					$service_box ='<div class="pt_plus_service_box '.esc_attr($isotope).'  '.esc_attr($el_class).'  '.esc_attr($uid).' service-box-'.esc_attr($main_style).' '.esc_attr($service_space).'"  data-id="'.esc_attr($uid).'" '.$box_hover.' '.$box_hadow.' '.$hover_attr.' '.$data_slider.' >';
						$service_box .= '<div class="post-inner-loop">';
							$service_box .= $output;
						$service_box .='</div>';
					$service_box .='</div>';
				
				$css_rule='';
				$css_rule .= '<style >';
				
				
				$css_rule .='.'.esc_js($uid).'.pt_plus_service_box.service-box-style_1 .service-box-inner .service-title,.'.esc_js($uid).'.pt_plus_service_box.service-box-style_2 .service-box-inner .service-title,.'.esc_js($uid).'.pt_plus_service_box.service-box-style_3 .service-box-inner .service-title,.'.esc_js($uid).'.pt_plus_service_box.service-box-style_6 .service-box-inner .service-title{margin-bottom : '.esc_js($title_btm_space).'; }';

				//$css_rule .='.'.esc_js($uid).'.pt_plus_service_box.service-box-style_8 .service-box-inner .service-sub-space{margin-bottom : '.esc_js($sub_btm_space).' ; }';

				$css_rule .='.'.esc_js($uid).'.pt_plus_service_box.service-box-style_3 .service-box-inner .service-title,.'.esc_js($uid).'.pt_plus_service_box.service-box-style_5 .service-box-inner .service-title,.'.esc_js($uid).'.pt_plus_service_box.service-box-style_6 .service-box-inner .service-sub-space{margin-top : '.esc_js($title_top_space).'; }';
			if($main_style != 'style_5' && $main_style !=  'style_8'){
				$css_rule .= '.pt_plus_service_box .service-box-inner:hover .service-box-bg-box{-webkit-box-shadow: '.esc_js($hvr_box_shadow).';-moz-box-shadow: '.esc_js($hvr_box_shadow).';box-shadow: '.esc_js($hvr_box_shadow).';}';
			}
				$css_rule .= '.'.esc_js($uid).' .service-desc,.'.esc_js($uid).' .service-desc p{color: '.esc_js($desc_color).';font-size: '.esc_js($desc_size).';font-family: '.esc_js($desc_family).';line-height: '.esc_js($desc_line).';} .'.esc_js($uid).'.pt_plus_service_box.service-box-style_8 .about-post:hover .hover-about{background: '.esc_js($box_hover_color).';}.'.esc_js($uid).'.pt_plus_service_box.service-box-style_8 .about-post:hover .icon-middle{background: '.esc_js($icon_bg_hvr_color).' !important; color:'.esc_js($icon_hvr_color).' !important; border-color: '.esc_js($icon_hvr_bdr_color).' !important; }';
				
				if($button_check == 'true'){
					$css_rule .= include ASB_PLUGIN_PATH.'vc_elements/vc_param/button_css.php';
				}
			
				$css_rule .= '</style>';
	
				return $css_rule.$service_box;
		}
		function init_asb_service_box(){
			if(function_exists("vc_map"))
			{
			//require(ASB_PLUGIN_PATH.'vc_elements/vc_param/vc_arrays.php');
				vc_map( array(
					  "name" => __( "OTK Service Box", "otk_service" ),
					  "base" => "asb_service_box",
					  "icon" => 'tp-service-box',
					  "category" => __( "OTK Service Box", "otk_service"),
					  "description" => esc_html__('Stunning Sections with Style', 'otk_service'),
					  "params" => array(
						array(
						  "type"        => "dropdown",
						  'heading' =>  esc_html__('OTK Service Box Style', 'otk_service'),
						  "param_name"  => "main_style",
						  "admin_label" => true,
						  "value"       => array(
						__( 'Style 1', 'otk_service' ) => 'style_1',
						__( 'Style 2', 'otk_service' ) => 'style_2',
						__( 'Style 3', 'otk_service' ) => 'style_3',
						__( 'Style 4', 'otk_service' ) => 'style_4',
						__( 'Style 5', 'otk_service' ) => 'style_41',
						  ),
						  "std" => 'style_1',
						  "description" => '',
						   ),
						 array(
						  "type" => "textfield",
						  'heading' =>  esc_html__('Title Of OTK Service Box', 'otk_service'),
						  "param_name" => "title",
						//  "dependency" => Array('element' => "service_box_layout", 'value' => 'single_layout'),
						  "value" => '', 
						  'admin_label' => true,
						  "description" => ""
						),
						array(
							'type'				=> 'otk_service_heading_param',
							'text'				=> esc_html__('Title Options', 'otk_service'),
							'param_name'		=> 'title_option',
							'edit_field_class'	=> 'otk_service-heading-param-style vc_col-sm-12',
							'group' => 'Styles',
						),
						
						
						array(
						  "type" => "colorpicker",
						  'heading' => esc_html__('Box background Color', 'otk_service'),
						  "param_name" => "box_bg_color",
						  "value" => '#ffffff',
						  // "edit_field_class" => "vc_col-xs-6",
						  'group' => 'Styles',
                          //'dependency' => array('element' => 'title_color_o','value' => 'solid'),
						  "description" => ""
						),
						
						 array(
						  "type" => "colorpicker",
						  'heading' => esc_html__('Description Font Color', 'otk_service'),
						  "param_name" => "desc_color",
						  "value" => '#ffffff',
						  // "edit_field_class" => "vc_col-xs-6",
						  'group' => 'Styles',
                          //'dependency' => array('element' => 'title_color_o','value' => 'solid'),
						  "description" => ""
						),
			
						 array(
						  "type" => "colorpicker",
						  'heading' => esc_html__('Title Font Color', 'otk_service'),
						  "param_name" => "title_color",
						  "value" => '#ffffff',
						  // "edit_field_class" => "vc_col-xs-6",
						  'group' => 'Styles',
                          'dependency' => array('element' => 'title_color_o','value' => 'solid'),
						  "description" => ""
						),
						array(
						  "type" => "textfield",
						  'heading' =>  esc_html__('Font Size', 'otk_service'),
						  "param_name" => "title_size",
						  "value" => '24px',
						  "description" => '',
						   "edit_field_class" => "vc_col-xs-6",
						   'group' => 'Styles',
						),
						array(
							"type" => "textfield",
							'heading' => esc_html__('Line Height', 'pt_asb'),
							"param_name" => "title_line",
							'value' => '1.4',
						   "description" => "",
						   "edit_field_class" => "vc_col-xs-6",
						   'group' => 'Styles',
					   ),
						array(
							'type' => 'google_fonts',
							'heading' =>  esc_html__('Font Family', 'pt_asb'),
							'param_name' => 'title_font_family',
							'value' => "",
							'edit_field_class' => 'vc_col-xs-12',
							'description' => '',
							'group' => esc_attr__('Styles', 'pt_asb'),	
							'dependency' => array(
									'element' => 'title_use_theme_fonts',
									'value' => 'custom-font-family',
								),
						),
						
						
						
						array(
						  "type" => "dropdown",
						  'heading' =>  esc_html__('Select Icon type ', 'pt_asb'),
						  "param_name" => "image_icon",
						  "value" => array(
								__( 'None', 'pt_asb' ) => '',
								__( 'Icon', 'pt_asb' ) => 'icon',
								__( 'Image/Svg', 'pt_asb' ) => 'svg',
							),
							'group' => __( 'Icon Option', 'pt_asb' ),
						  "std" => "icon",
						//  "dependency" => Array('element' => "service_box_layout", 'value' => 'single_layout'),
						),
						array(
							'type' => 'attach_image',
							'heading' => esc_html__('Icon Image/Svg', 'pt_asb'),
							'param_name' => 'type_img',
							'value' => '',
							'admin_label' => true,
							'dependency' => array(
								'element' => 'image_icon',
								'value' => 'svg',
							),
							'group' => __( 'Icon Option', 'pt_asb' ),
							'description' => '',
						),

						array(
							'type' => 'dropdown',
							'heading' => esc_html__('Icon Library', 'pt_asb'),
							'value' => array(
								__( 'Font Awesome', 'pt_asb' ) => 'fontawesome',
								__( 'Open Iconic', 'pt_asb' ) => 'openiconic',
								__( 'Typicons', 'pt_asb' ) => 'typicons',
								__( 'Entypo', 'pt_asb' ) => 'entypo',
								__( 'Linecons', 'pt_asb' ) => 'linecons',
								__( 'Mono Social', 'pt_asb' ) => 'monosocial',
							),
							'param_name' => 'type',
							'dependency' => array(
								'element' => 'image_icon',
								'value' => 'icon',
							),
							'group' => __( 'Icon Option', 'pt_asb' ),
							'description' => '',
						),
						array(
							'type' => 'iconpicker',
							'heading' =>  esc_html__('Icon', 'pt_asb'),
							'param_name' => 'icon_fontawesome',
							'value' => 'fa fa-adjust', 
							'settings' => array(
								'emptyIcon' => false,
								'iconsPerPage' => 100,
							),
							'dependency' => array(
								'element' => 'type',
								'value' => 'fontawesome',
							),
							'group' => __( 'Icon Option', 'pt_asb' ),
							'description' => '',
						),
						array(
							'type' => 'iconpicker',
							'heading' =>  esc_html__('Icon', 'pt_asb'),
							'param_name' => 'icon_openiconic',
							'value' => 'vc-oi vc-oi-dial', 
							'settings' => array(
								'emptyIcon' => false,
								'type' => 'openiconic',
								'iconsPerPage' => 100,
							),
							'dependency' => array(
								'element' => 'type',
								'value' => 'openiconic',
							),
							'group' => __( 'Icon Option', 'pt_asb' ),
							'description' => '',
						),
						array(
							'type' => 'iconpicker',
							'heading' =>  esc_html__('Icon', 'pt_asb'),
							'param_name' => 'icon_typicons',
							'value' => 'typcn typcn-adjust-brightness',
							'settings' => array(
								'emptyIcon' => false, 
								'type' => 'typicons',
								'iconsPerPage' => 100,
							),
							'dependency' => array(
								'element' => 'type',
								'value' => 'typicons',
							),
							'group' => __( 'Icon Option', 'pt_asb' ),
							'description' => '',
						),
						array(
							'type' => 'iconpicker',
							'heading' =>  esc_html__('Icon', 'pt_asb'),
							'param_name' => 'icon_entypo',
							'value' => 'entypo-icon entypo-icon-note', // default value to backend editor admin_label
							'settings' => array(
								'emptyIcon' => false, // default true, display an "EMPTY" icon?
								'type' => 'entypo',
								'iconsPerPage' => 100, // default 100, how many icons per/page to display
							),
							'group' => __( 'Icon Option', 'pt_asb' ),
							'dependency' => array(
								'element' => 'type',
								'value' => 'entypo',
							),
						),
						array(
							'type' => 'iconpicker',
							'heading' =>  esc_html__('Icon', 'pt_asb'),
							'param_name' => 'icon_linecons',
							'value' => 'vc_li vc_li-heart', // default value to backend editor admin_label
							'settings' => array(
								'emptyIcon' => false, // default true, display an "EMPTY" icon?
								'type' => 'linecons',
								'iconsPerPage' => 100, // default 100, how many icons per/page to display
							),
							'group' => __( 'Icon Option', 'pt_asb' ),
							'dependency' => array(
								'element' => 'type',
								'value' => 'linecons',
							),
							'description' => '',
						),
						array(
							'type' => 'iconpicker',
							'heading' =>  esc_html__('Icon', 'pt_asb'),
							'param_name' => 'icon_monosocial',
							'value' => 'vc-mono vc-mono-fivehundredpx', // default value to backend editor admin_label
							'settings' => array(
								'emptyIcon' => false, // default true, display an "EMPTY" icon?
								'type' => 'monosocial',
								'iconsPerPage' => 100, // default 100, how many icons per/page to display
							),
							'group' => __( 'Icon Option', 'pt_asb' ),
							'dependency' => array(
								'element' => 'type',
								'value' => 'monosocial',
							),
							'description' => '',
						),
						array(
							"type" => "dropdown",
							'heading' =>  esc_html__('Icon Styles', 'pt_asb'),
							"param_name" => "icon_style", 
							"value" => "",
							"description" => "",
							"value"       => array(
								__( 'None', 'pt_asb' ) => '',
								__( 'Square', 'pt_asb' ) => 'square',
								__( 'Rounded', 'pt_asb' ) => 'rounded',
								__( 'Hexagon', 'pt_asb' ) => 'hexagon',
								__( 'Pentagon', 'pt_asb' ) => 'pentagon',
								__( 'Square Rotate', 'pt_asb' ) => 'square-rotate',
							),
							'group' => __( 'Icon Option', 'pt_asb' ),
							 "std" => "square",
							  "std" => "square",'dependency' => array(
								'element' => 'image_icon',
								'value' => 'icon',
							),
						   "admin_label" => false,					
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__('Icon Size', 'pt_asb'),
							'param_name' => 'icon_size',
							'value' => array( 'Small' => 'small',
											  'Medium' => 'medium',
											  'Large' => 'large',
							) ,		
							'group' => __( 'Icon Option', 'pt_asb' ),
							"std" => "small",
							'description' => "",
							'dependency' => array(
								'element' => 'image_icon',
								'value' => 'icon',
							),
							),
						array(
							'type' => 'colorpicker',
							'heading' =>  esc_html__('Icon Color', 'pt_asb'),
							'param_name' => 'icon_color',
							'value' => '#0099CB',
							'description' => "",
							'dependency' => array(
								'element' => 'image_icon',
								'value' => 'icon',
							),
							"edit_field_class" =>'vc_col-xs-6',
							'group' => __( 'Icon Option', 'pt_asb' ),
							),
								
						array(
							'type' => 'colorpicker',
							'heading' =>  esc_html__('Icon Hover Color', 'pt_asb'),
							'param_name' => 'icon_hvr_color',
							'value' => '#ffffff',
							'description' => "",
							'dependency' => array(
								'element' => 'image_icon',
								'value' => 'icon',
							),
							'dependency' => array(
								'element' => 'main_style',
								'value' => 'style_8',
							),
							"edit_field_class" =>'vc_col-xs-6',
							'group' => __( 'Icon Option', 'pt_asb' ),
							),	
						array(
							'type' => 'colorpicker',
							'heading' =>  esc_html__('Icon Background Color', 'pt_asb'),
							'param_name' => 'icon_bg_color',
							'value' => '#ffffff',
							'dependency' => array(
								'element' => 'image_icon',
								'value' => 'icon',
							),
							
							'group' => __( 'Icon Option', 'pt_asb' ),
							'description' => "",
						),
						array(
							'type' => 'colorpicker',
							'heading' =>  esc_html__('Icon Background Hover Color', 'pt_asb'),
							'param_name' => 'icon_bg_hvr_color',
							'value' => '#0099CB',
							'description' => "",
							'dependency' => array(
								'element' => 'image_icon',
								'value' => 'icon',
							),
							'dependency' => array(
								'element' => 'main_style',
								'value' => 'style_8',
							),
							"edit_field_class" =>'vc_col-xs-6',
							'group' => __( 'Icon Option', 'pt_asb' ),
							),	
						array(
							'type' => 'colorpicker',
							'heading' =>  esc_html__('Icon Border Color', 'pt_asb'),
							'param_name' => 'icon_border_color',
							'value' => '#121212',
							'description' => "",
							'dependency' => array(
								'element' => 'image_icon',
								'value' => 'icon',
							),
							'group' => __( 'Icon Option', 'pt_asb' ),
						),
						array(
							'type' => 'colorpicker',
							'heading' => esc_html__('Icon Hover Border Color', 'pt_asb'),
							'param_name' => 'icon_hvr_bdr_color',
							'value' => '#ffffff',
							'description' => "",
							'dependency' => array(
								'element' => 'image_icon',
								'value' => 'icon',
							),
							'dependency' => array(
								'element' => 'main_style',
								'value' => 'style_8',
							),
							"edit_field_class" =>'vc_col-xs-6',
							'group' => __( 'Icon Option', 'pt_asb' ),
						),
						array(
							"type" => "textarea_html",
							'heading' =>  esc_html__('Description Of OTK Service Box', 'pt_asb'),
							"param_name" => "content", 
							"value" => "",
							"description" => "",
							// "dependency" => Array('element' => "service_box_layout", 'value' => 'single_layout'),
						),
						
						array(
							'param_name'  => 'button_check',
							'heading'     => '',
							'description' => __( 'checkbox false no Button...', 'pt_asb' ),
							'type'        => 'checkbox',
							'value'       => array(
							  'Button' => 'true'
							),
							"group" => esc_attr__('Button', 'pt_asb'),
							"dependency" => array(
								 "element" => "main_style",
								 "value" => array("style_1","style_2","style_3","style_5","style_41"),
								)
						 ),
						
						
						array(
							'type' => 'vc_link',
							'heading' =>  esc_html__('Button URL', 'pt_asb'),
							'param_name' => 'btn_url',
							"group" => esc_attr__('Button', 'pt_asb'),
							'description' => '',
							//"dependency" => Array('element' => "service_box_layout", 'value' => 'single_layout'),
						),
						array(
							'type'        => 'radio_select_image',
							'heading' =>  esc_html__('Button Style', 'pt_asb'), 
							'param_name'  => 'style',
							'simple_mode' => false,
							'value'  => 'style-2',
							"group" => esc_attr__('Button', 'pt_asb'),
							"dependency" => array(
								 "element" => "button_check",
								 "value" => array("true"),
							),
							'options'     => array(
							 'style-2' => array(
							  'tooltip' => esc_attr__('Style 2','pt_asb'),
							  'src' => ASB_PLUGIN_URL. 'vc_elements/images/button/button-2.png'
							 ),
							 'style-8' => array(
							  'tooltip' => esc_attr__('Style 8','pt_asb'),
							  'src' => ASB_PLUGIN_URL. 'vc_elements/images/button/button-8.png'
							 ),
							 'style-9' => array(
							  'tooltip' => esc_attr__('Style 9','pt_asb'),
							  'src' => ASB_PLUGIN_URL. 'vc_elements/images/button/button-9.png'
							 ),
							 'style-10' => array(
							  'tooltip' => esc_attr__('Style 10','pt_asb'),
							  'src' => ASB_PLUGIN_URL. 'vc_elements/images/button/button-10.png'
							 ),
							 'style-11' => array(
							  'tooltip' => esc_attr__('Style 11','pt_asb'),
							  'src' => ASB_PLUGIN_URL. 'vc_elements/images/button/button-11.png'
							 ),
							 'style-21' => array(
							  'tooltip' => esc_attr__('Style 21','pt_asb'),
							  'src' => ASB_PLUGIN_URL. 'vc_elements/images/button/button-21.png'
							 ),
							 'style-22' => array(
							  'tooltip' => esc_attr__('Style 22','pt_asb'),
							  'src' => ASB_PLUGIN_URL. 'vc_elements/images/button/button-22.png'
							 ),
							),
						),
						array(
							"type" => "dropdown",
							"heading" => __("Hover Style", "pt_asb"),
							"param_name" => "btn_hover_style",
							"value" => array(
								__("On Left", "pt_asb") => "hover-left",
								__("On Right", "pt_asb") => "hover-right",
								__("On Top", "pt_asb") => "hover-top",
								__("On Bottom", "pt_asb") => "hover-bottom"
							),
							"description" => "",
							"std" => 'hover-left',
							"group" => esc_attr__('Button', 'pt_asb'),
							'dependency' => array(
								'element' => 'style',
								'value' => array(
									'style-11',
								)
							)
						),
						array(
							"type" => "textfield",
							'heading' =>  esc_html__('Button Text', 'pt_asb'), 
							"param_name" => "btn_text",
							"value" => 'OTK Service Box',
							'description' => '',
							"group" => esc_attr__('Button', 'pt_asb'),
							 'dependency' => array(
								'element' => 'style',
								'value' => array(
									'style-2','style-8','style-9','style-10','style-11','style-21','style-22'
								)
							),
						),
						
						array(
							"type" => "textfield",
							'heading' =>  esc_html__('Button Hover Text', 'pt_asb'),
							"param_name" => "btn_hover_text",
							"value" => '',
							'description' => '',
							"group" => esc_attr__('Button', 'pt_asb'),
							'dependency' => array(
								'element' => 'style',
								'value' => array(
									'style-11',
								)
							)
						),
						
						array(
							'type' => 'dropdown',
							'heading' =>  esc_html__('Icon Library', 'pt_asb'),
							'value' => array(
								__('Select Icon', 'pt_asb') => '',
								__('Font Awesome', 'pt_asb') => 'fontawesome',
								__('Open Iconic', 'pt_asb') => 'openiconic',
								__('Typicons', 'pt_asb') => 'typicons',
								__('Linecons', 'pt_asb') => 'linecons',
								__('Entypo', 'pt_asb') => 'entypo',
								__('Mono Social', 'pt_asb') => 'monosocial'
							),
							'std' => 'fontawesome',
							"group" => esc_attr__('Button', 'pt_asb'),
							'param_name' => 'btn_icon',
							// "dependency" => Array('element' => "service_box_layout", 'value' => 'single_layout'),
							'description' => '',
							'dependency' => array(
								'element' => 'style',
								'value' => array(
									'style-2',
									'style-8',
									'style-11',
									'style-21',
									'style-22',
								)
							)
						),
						array(
							'type' => 'iconpicker',
							'heading' =>  esc_html__('Icon', 'pt_asb'),
							'param_name' => 'btn_icon_fontawesome',
							'value' => 'fa fa-arrow-right', // default value to backend editor admin_label
							'settings' => array(
								'emptyIcon' => false,
								'iconsPerPage' => 4000
							),
							'dependency' => array(
								'element' => 'btn_icon',
								'value' => 'fontawesome'
							),
							"group" => esc_attr__('Button', 'pt_asb'),
							'description' => '',
						),
						array(
							'type' => 'iconpicker',
							'heading' =>  esc_html__('Icon', 'pt_asb'),
							'param_name' => 'btn_icon_openiconic',
							'value' => 'vc-oi vc-oi-dial',
							'settings' => array(
								'emptyIcon' => false,
								'type' => 'openiconic',
								'iconsPerPage' => 4000
							),
							'dependency' => array(
								'element' => 'btn_icon',
								'value' => 'openiconic'
							),
							"group" => esc_attr__('Button', 'pt_asb'),
							'description' => '',
						),
						array(
							'type' => 'iconpicker',
							'heading' =>  esc_html__('Icon', 'pt_asb'),
							'param_name' => 'btn_icon_typicons',
							'value' => 'typcn typcn-adjust-brightness',
							'settings' => array(
								'emptyIcon' => false,
								'type' => 'typicons',
								'iconsPerPage' => 4000
							),
							'dependency' => array(
								'element' => 'btn_icon',
								'value' => 'typicons'
							),
							"group" => esc_attr__('Button', 'pt_asb'),
							'description' => '',
						),
						array(
							'type' => 'iconpicker',
							'heading' => esc_html__('Icon', 'pt_asb'),
							'param_name' => 'btn_icon_entypo',
							'value' => 'entypo-icon entypo-icon-note',
							'settings' => array(
								'emptyIcon' => false,
								'type' => 'entypo',
								'iconsPerPage' => 4000
							),
							"group" => esc_attr__('Button', 'pt_asb'),
							'dependency' => array(
								'element' => 'btn_icon',
								'value' => 'entypo'
							)
							
						),
						array(
							'type' => 'iconpicker',
							'heading' =>  esc_html__('Icon', 'pt_asb'),
							'param_name' => 'btn_icon_linecons',
							'value' => 'vc_li vc_li-heart',
							'settings' => array(
								'emptyIcon' => false,
								'type' => 'linecons',
								'iconsPerPage' => 4000
							),
							"group" => esc_attr__('Button', 'pt_asb'),
							'dependency' => array(
								'element' => 'btn_icon',
								'value' => 'linecons'
							),
							
							'description' => '',
						),
						array(
							'type' => 'iconpicker',
							'heading' =>  esc_html__('Icon', 'pt_asb'),
							'param_name' => 'btn_icon_monosocial',
							'value' => 'vc-mono vc-mono-fivehundredpx',
							'settings' => array(
								'emptyIcon' => false,
								'type' => 'monosocial',
								'iconsPerPage' => 4000
							),
							"group" => esc_attr__('Button', 'pt_asb'),
							'dependency' => array(
								'element' => 'btn_icon',
								'value' => 'monosocial'
							),
							
							'description' => '',
						),
						array(
							"type" => "dropdown",
							'heading' =>  esc_html__('Icon Position', 'pt_asb'),
							"param_name" => "before_after",
							"value" => array(
								__("After Icon", "pt_asb") => "after",
								__("Before Icon", "pt_asb") => "before"
							),
							"description" => "",
							"std" => 'after',
							"group" => esc_attr__('Button', 'pt_asb'),
							'dependency' => array(
								'element' => 'style',
								'value' => array(
									'style-2',
									'style-8',
									'style-10',
									'style-11',
									'style-21',
									'style-22',
								)
							)
						),
						array(
							'type' => 'pt_asb_heading_param',
							'text' => esc_html__('Button Text Style', 'pt_asb'),
							'param_name' => 'text_style',
							"dependency" => array(
								 "element" => "button_check",
								 "value" => array("true"),
							),
							'edit_field_class' => 'pt_asb-heading-param-style vc_col-sm-12',
							
							"group" => esc_attr__('Button Style', 'pt_asb')
						),
						array(
							"type" => "textfield",
							'heading' =>  esc_html__('Font Size', 'pt_asb'),
							"param_name" => "font_size",
							"value" => '20px',
							'description' => '',
							"edit_field_class" => "vc_col-xs-6",
							"group" => esc_attr__('Button Style', 'pt_asb'),
							"dependency" => array(
								 "element" => "button_check",
								 "value" => array("true"),
							),
						),
						array(
							"type" => "textfield",
							'heading' =>  esc_html__('Line Height', 'pt_asb'),
							"param_name" => "line_height",
							"value" => '25px',
							'description' => '',
							"edit_field_class" => "vc_col-xs-6",
							"dependency" => array(
								 "element" => "button_check",
								 "value" => array("true"),
							),
							"group" => esc_attr__('Button Style', 'pt_asb')
						),
						array(
							"type" => "textfield",
							'heading' =>  esc_html__('Inner Padding ', 'pt_asb'),
							"param_name" => "btn_padding",
							"value" => '15px 30px',
							"edit_field_class" => "vc_col-xs-6",
							"group" => esc_attr__('Button Style', 'pt_asb'),
							"dependency" => array(
								 "element" => "button_check",
								 "value" => array("true"),
							),
							'description' => '',
						),
						array(
							'type' => 'colorpicker',
							'heading' =>  esc_html__('Color', 'pt_asb'),
							'param_name' => 'text_color',
							"value" => '#8a8a8a',
							"description" => "",
							'group' => esc_attr__('Button Style', 'pt_asb'),
							"dependency" => array(
								 "element" => "button_check",
								 "value" => array("true"),
							),
							"edit_field_class" => "vc_col-xs-6"
						),
						array(
							'type' => 'colorpicker',
							'heading' =>  esc_html__('Hover Color', 'pt_asb'),
							'param_name' => 'text_hover_color',
							"value" => '#252525',
							"description" => "",
							"dependency" => array(
								 "element" => "button_check",
								 "value" => array("true"),
							),
							'group' => esc_attr__('Button Style', 'pt_asb'),
							"edit_field_class" => "vc_col-xs-6"
						),
						array(
								'type' => 'dropdown',
								'heading' => esc_html__('Button Custom font family', 'pt_asb'),
								'param_name' => 'btn_use_theme_fonts',
								 "value" => array(
									esc_html__("Custom font family", 'pt_asb') => "custom-font-family",
									esc_html__("Google fonts", 'pt_asb') => "google-fonts",
								),
								'std' =>  'custom-font-family',
								'group' => esc_attr__('Button Style', 'pt_asb'),
								"dependency" => array(
								 "element" => "button_check",
								 "value" => array("true"),
							),
						),
						array(
							'type' => 'google_fonts',
							'heading' =>  esc_html__('Font Family', 'pt_asb'),
							'param_name' => 'goog_btn_font_family',
							'value' => "",
							'edit_field_class' => 'vc_col-xs-12',
							'description' => '',
							'group' => esc_attr__('Button Style', 'pt_asb'),	
							'dependency' => array(
									'element' => 'btn_use_theme_fonts',
									'value' => 'google-fonts',
								),
						),
						array(
							'type' => 'textfield',
							'heading' =>  esc_html__('Font Family', 'pt_asb'),
							'param_name' => 'btn_font_family',
							'value' => "",
							'edit_field_class' => 'vc_col-xs-6',
							'description' => '',
							'group' => esc_attr__('Button Style', 'pt_asb'),	
							'dependency' => array(
									'element' => 'btn_use_theme_fonts',
									'value' => 'custom-font-family',
								),
						),
						array(
							'type' => 'textfield',
							'heading' =>  esc_html__('Font Weight', 'pt_asb'),
							'param_name' => 'btn_font_weight',
							'value' => __('400','pt_asb'),
							'edit_field_class' => 'vc_col-xs-6',
							'description' => '',
							'group' => esc_attr__('Button Style', 'pt_asb'),	
							'dependency' => array(
									'element' => 'btn_use_theme_fonts',
									'value' => 'custom-font-family',
								),
						),
						
						array(
							'type' => 'pt_asb_heading_param',
							'text' => esc_html__('Border Style', 'pt_asb'),
							'param_name' => 'border_style',
							'edit_field_class' => 'pt_asb-heading-param-style vc_col-sm-12',
							"group" => esc_attr__('Button Style', 'pt_asb'),
							'dependency' => array(
								'element' => 'style',
								'value' => array(
									'style-8',
									'style-10',
									'style-11',
									'style-21',
									'style-22',
								)
							)
						),
						array(
							'type' => 'colorpicker',
							'heading' =>  esc_html__('Border Color', 'pt_asb'),
							'param_name' => 'border_color',
							"value" => '#252525',
							"description" => "",
							'group' => esc_attr__('Button Style', 'pt_asb'),
							"edit_field_class" => "vc_col-xs-4",
							'dependency' => array(
								'element' => 'style',
								'value' => array(
									'style-8',
									'style-10',
									'style-11',
									'style-21',
									'style-22',
								)
							)
						),
						array(
							'type' => 'colorpicker',
							'heading' =>  esc_html__('Border Hover Color', 'pt_asb'),
							'param_name' => 'border_hover_color',
							"value" => '#252525',
							"description" => "",
							'group' => esc_attr__('Button Style', 'pt_asb'),
							"edit_field_class" => "vc_col-xs-4",
							'dependency' => array(
								'element' => 'style',
								'value' => array(
									'style-8',
									'style-10',
									'style-11',
									'style-21',
									'style-22',
								)
							)
						),
						array(
							"type" => "textfield",
							'heading' =>  esc_html__('Border Radius', 'pt_asb'),
							"param_name" => "border_radius",
							"value" => "30px",
							"description" => "",
							'group' => esc_attr__('Button Style', 'pt_asb'),
							"edit_field_class" => "vc_col-xs-4",
							'dependency' => array(
								'element' => 'style',
								'value' => array(
									'style-10',
									'style-11',
									'style-21',
									'style-22'
								)
							)
						),
						array(
							'type' => 'pt_asb_heading_param',
							'text' => esc_html__('Background Style', 'pt_asb'),
							'param_name' => 'background_style_heading',
							'edit_field_class' => 'pt_asb-heading-param-style vc_col-sm-12',
							"group" => esc_attr__('Button Style', 'pt_asb'),
							'dependency' => array(
								'element' => 'style',
								'value' => array(
									'style-8',
									'style-10',
									'style-11',
									'style-21',
									'style-22',
									'style-23'
								)
							)
						),
						array(
							"type" => "dropdown",
							"heading" => __("Select Background Option", "pt_asb"),
							"param_name" => "select_bg_option",
							"value" => array(
								__("Normal color", "pt_asb") => "normal",
								__("Gradient color", "pt_asb") => "gradient",
								__("Bg Image ", "pt_asb") => "image"
							),
							"description" => "",
							"std" => 'normal',
							'group' => esc_attr__('Button Style', 'pt_asb'),
							'dependency' => array(
								'element' => 'style',
								'value' => array(
									'style-8',
									'style-10',
									'style-11',
									'style-22',
								)
							)
						),
						array(
							'type' => 'colorpicker',
							'heading' => __('Color', 'pt_asb'),
							'param_name' => 'normal_bg_color',
							
							"description" => "",
							'group' => esc_attr__('Button Style', 'pt_asb'),
							"value" => '#252525',
							'dependency' => array(
								'element' => 'select_bg_option',
								'value' => 'normal'
							)
						),
						
						array(
							"type" => "dropdown",
							"heading" => __("Hover Background Option", "pt_asb"),
							"param_name" => "select_bg_hover_option",
							"value" => array(
								__("Normal color", "pt_asb") => "normal",
								__("Gradient color", "pt_asb") => "gradient",
								__("Bg Image ", "pt_asb") => "image"
							),
							"description" => "",
							"std" => 'normal',
							'group' => esc_attr__('Button Style', 'pt_asb'),
							'dependency' => array(
								'element' => 'style',
								'value' => array(
									'style-8',
									'style-10',
									'style-11',
									'style-21',
									'style-22',
								)
							)
						),
						array(
							'type' => 'colorpicker',
							'heading' => __('Hover Bg color', 'pt_asb'),
							'param_name' => 'normal_bg_hover_color',
							"description" => "",
							'group' => esc_attr__('Button Style', 'pt_asb'),
							"value" => '#ff214f',
							'dependency' => array(
								'element' => 'select_bg_hover_option',
								'value' => 'normal'
							),
						),
						array(
							'type' => 'checkbox',
							'heading' => __('Full Width Button', 'pt_asb'),
							'param_name' => 'full_width_btn',
							'value' => array(
								__('Yes', 'pt_asb') => 'yes'
							),
							'description' => '',
							'std' => '',
							"group" => esc_attr__('Button', 'pt_asb'),
							'dependency' => array(
								'element' => 'style',
								'value' => array(
									'style-8',
									'style-10',
									'style-11',
									'style-21',
									'style-22',
								)
							)
						),
						array(
							'type' => 'dropdown',
							'heading' =>  esc_html__('Alignment', 'pt_asb'), 
							'param_name' => 'btn_align',
							'value' => array(
								__('Left', 'pt_asb') => 'text-left',
								__('Center', 'pt_asb') => 'text-center',
								__('Right', 'pt_asb') => 'text-right'
							),
							'std' => 'text-left',
							"dependency" => array(
								 "element" => "button_check",
								 "value" => array("true"),
							),
							"group" => esc_attr__('Button', 'pt_asb'),
							"description" => ""
						)
						
						
						
						 
						 
						
					 )	
				   ) );
			}
		}
	}
	new Asb_service_box;

	if(class_exists('WPBakeryShortCode') && !class_exists('WPBakeryShortCode_asb_service_box'))
	{
		class WPBakeryShortCode_asb_service_box extends WPBakeryShortCode {
		   protected function contentInline( $atts, $content = null ) {
			 
		 }
		}
	}
}