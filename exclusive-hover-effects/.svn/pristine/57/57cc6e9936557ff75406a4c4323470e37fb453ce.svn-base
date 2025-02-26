<?php


// Register Shortcode
function ex_effects_custom_post_type_shortcode($atts){
	extract( shortcode_atts( array(
	
		'category' => '',	
		'style' => '',	
		'google_font' => '',	
		'title_color' => '',	
		'link_open' => '',	
		'text' => '',	
		
		
		
	), $atts) );
	
	
	    $q = new WP_Query(
        array('posts_per_page' => -1, 'post_type' => 'exclusiveffects', 'exclusiveffects_cat' => $category)
        );
		
	
				$output = '<div class="portfolios-sections grid" style="text-align: center;">';
		
	
		while($q->have_posts()) : $q->the_post();
		$id = get_the_ID();	
		
	

	$infos = vp_metabox('infosmeta.hover_info', false);	

	$width = vp_metabox('effectsmeta.effects.0.width', false);
	$height = vp_metabox('effectsmeta.effects.0.height', false);
	$letf_right = vp_metabox('effectsmeta.effects.0.letf_right', false);
	$letf_right_each = vp_metabox('effectsmeta.effects.0.letf_right_each', false);
	$top_bottom_each = vp_metabox('effectsmeta.effects.0.top_bottom_each', false);

			$i = 0;
foreach ($infos as $info) {	

     		if ($style==style1) {
			
		$output .= '    <div class="hover_item" style="">
                 		<!-- Begin hover_item -->
                    <div class="hover_effect_twenty_six">
                        <img src="'.$info['port_image'].'" style="width: 300px;height:300px;" alt=""/>
                        <div class="hover_effect_twenty_six_content">
                            <h2>'.$info['title'].'</h2>
                            <p>'.$info['Description'].'</p>
							<a href="'.$info['button_link'].'">'.$info['button_text'].'</a>
                        </div>
                    </div>
                </div> <!-- end hover_item -->';
		}	

		if ($style==style2) {
		

	
		
		$output .= '
		<div class="circles-items" style="margin-left: '.$letf_right.'px">
		
		<div class="img-box-exclusive-pri2010-circles" style="background-image:url('.$info['port_image'].');width: 300px;height:300px;margin-left: 10px;border-radius:50%;">
		
			<div class="blr-exclusive-pri2010-circles"> 
				<h3>'.$info['title'].'</h3>
					<p>'.$info['Description'].'</p>
				<a href="'.$info['button_link'].'">'.$info['button_text'].'</a>
			</div>
		</div>
		</div> ';
		}		
		
		if ($style==style3) {
		
	
		$output .= '<div class="img-box-exclusive-pri2010-circles" style="background-image:url('.$info['port_image'].');width: 300px;height:300px;">
		
			<div class="blr-exclusive-pri2010-circles"> 
				<h3>'.$info['title'].'</h3>
				
				<p>'.$info['Description'].'</p>
				<a href="'.$info['button_link'].'">'.$info['button_text'].'</a>
			</div>
		</div>';
		}		
		
		if ($style==style4) {
		
		$output .= '		<div class="img-box-exclusive-pri2010-style5" style="background-image:url('.$info['port_image'].');width: 300px;height:300px;"> 
			<div class="blr-exclusive-pri2010-style5"> 
				<h3>'.$info['title'].'</h3>
				<p>'.$info['Description'].'</p>
				<a href="'.$info['button_link'].'">'.$info['button_text'].'</a>
			</div>
		</div>';
		}
			
		if ($style==style5) {
		
		
		$output .= '<div class="img-box-exclusive-pri2010-style5-circles" style="background-image:url('.$info['port_image'].');border-radius:50%;width: 300px;height:300px;"> 
			<div class="blr-exclusive-pri2010-style5-circles"> 
				<h3>'.$info['title'].'</h3>
				<p>'.$info['Description'].'</p>
				<a href="'.$info['button_link'].'">'.$info['button_text'].'</a>
			</div>
		</div>';
		}	
					

					

					
	if ($style==style6) {
		
		
		$output .= '    <!-- HOVER EFFECT -->
                <div class="hover_item"> <!-- Begin hover_item -->
               
                    <div class="hover_effect_twenty_two" style="background-image:url('.$info['port_image'].');width: 300px;height:300px;">
                        <img src="'.$info['port_image'].'" alt="">
                        <div class="hover_effect_twenty_two_content">
                        <h2>'.$info['title'].'</h2>
                            <p>'.$info['Description'].'</p>
							<a href="'.$info['button_link'].'">'.$info['button_text'].'</a>
                        </div>
                    </div>
                </div> <!-- end hover_item -->';
		}	
					
		if ($style==style7) {
		
		
		$output .= '                <!-- HOVER EFFECT -->
                <div class="hover_item"> <!-- Begin hover_item -->
                    <div class="hover_effect_twenty_one" style="background-image:url('.$info['port_image'].');width: 300px;height:300px;">
                    <img src="'.$info['port_image'].'" alt="">
                        <div class="hover_effect_twenty_one_content">
                            <h2>'.$info['title'].'</h2>
                            <p>'.$info['Description'].'</p>
							<a href="'.$info['button_link'].'">'.$info['button_text'].'</a>
                        </div>
                    </div>
                </div> <!-- end hover_item -->';
		}	
					
		if ($style==style8) {
		
		
		$output .= '    <!-- HOVER EFFECT -->
                <div class="hover_item"> <!-- Begin hover_item -->
                    <div class="hover_effect_twenty" style="background-image:url('.$info['port_image'].');width: 300px;height:300px;">
                      <img src="'.$info['port_image'].'" alt="">
                        <div class="hover_effect_twenty_content">
                            <h2>'.$info['title'].'</h2>
                            <p>'.$info['Description'].'</p>
							<a href="'.$info['button_link'].'">'.$info['button_text'].'</a>
                        </div>
                    </div>
                </div> <!-- end hover_item -->';
		}	
					
		if ($style==style9) {
		
		
		$output .= '<div class="img-box-exclusive-pri2010-style5-circles" style="background-image:url('.$info['port_image'].');border-radius:50%;width: 300px;height:300px;"> 
			<div class="blr-exclusive-pri2010-style5-circles"> 
				<h3>'.$info['title'].'</h3>
				<p>'.$info['Description'].'</p>
				<a href="'.$info['button_link'].'">'.$info['button_text'].'</a>
			</div>
		</div>';
		}	
					
					
		if ($style==style10) {
		
		
		$output .= '                <!-- HOVER EFFECT -->
                <div class="hover_item"> <!-- Begin hover_item -->
          
                    <div class="hover_effect_one" style="background-image:url('.$info['port_image'].');width: 300px;height:300px;"> <!-- Begin hover_effect -->
                        <img src="'.$info['port_image'].'" alt="">
                        <div class="hover_hidden_conent_one">
                            <h3>'.$info['title'].'</h3>
                            <span>'.$info['Description'].'</span>
                          <a href="'.$info['button_link'].'">'.$info['button_text'].'</a>
                        </div>
						  
                    </div> <!-- end hover_effect -->
                </div> <!-- end hover_item -->
                ';
		}	
					
					
					
		if ($style==style11) {
		
		
		$output .= '                 <!-- HOVER EFFECT -->
                <div class="hover_item"> <!-- Begin hover_item -->
            
                    <div class="hover_effect_eleven_box"> <!-- begin hover effect box -->
                        <div class="hover_effect_eleven" style="background-image:url('.$info['port_image'].');width: 300px;height:300px;"> <!-- Begin hover_effect_nine effect_nine -->
                        <img src="'.$info['port_image'].'" alt="">
                            <div class="hover_effect_eleven_content">
                                <h2>'.$info['title'].'</h2>
                                <p>'.$info['Description'].'</p>
								<a href="'.$info['button_link'].'">'.$info['button_text'].'</a>
                            </div>
                        </div> <!-- end hover_effect_nine effect_nine -->
                    </div>  <!-- end hover effect box -->
                </div> <!-- end hover_item -->
                ';
		}					
					
		if ($style==style12) {
		
		
		$output .= ' 						<div  class="b-link-fade b-animate-go  thickbox" style="">
							<img src="'.$info['port_image'].'" style="width: 300px;height:300px;" />
							<div class="b-wrapper">
								<h2 style="padding-left:0px;padding-right:0px;" class="b-animate h b-from-left">'.$info['title'].'</h2>
								<p style="padding-left:0px;padding-right:0px;" class="b-animate p b-from-right">
								'.$info['Description'].'
								</p>
								<p style="padding-left:0px;padding-right:0px;" class="b-animate p b-from-bottom"><a href="'.$info['button_link'].'">'.$info['button_text'].'</a>
								</p>
							</div>
						</div>

                ';
		}	
		
			

			
		if ($style==style13) {
		
		
		$output .= ' 		<div  class="b-link-flow b-animate-go  thickbox"  style="">
							<img src="'.$info['port_image'].'" style="width: 300px;height:300px;" />
							<div class="b-wrapper">
								<h2 style="padding-left:0px;padding-right:0px;" class="b-animate h b-from-left">'.$info['title'].'</h2>
								<p style="padding-left:0px;padding-right:0px;" class="b-animate p b-from-right">
								'.$info['Description'].'
								</p>
								<p style="padding-left:0px;padding-right:0px;" class="b-animate p b-from-bottom"><a href="'.$info['button_link'].'">'.$info['button_text'].'</a>
								</p>
							</div>
						</div>

                ';
		}				

			
		if ($style==style14) {
		
		
		$output .= ' 		<div class="b-link-stroke b-animate-go  thickbox"  style="">
							<img src="'.$info['port_image'].'"  style="width: 300px;height:300px;"  />
							<div class="b-wrapper">
								<h2 style="padding-left:0px;padding-right:0px;" class="b-animate h b-from-left">'.$info['title'].'</h2>
								<p style="padding-left:0px;padding-right:0px;" class="b-animate p b-from-right">
								'.$info['Description'].'
								</p>
								<p style="padding-left:0px;padding-right:0px;" class="b-animate p b-from-bottom"><a href="'.$info['button_link'].'">'.$info['button_text'].'</a>
								</p>
							</div>
						</div>

                ';
		}
			
			
			
		if ($style==style15) {
		
		
		$output .= ' 			<div  class="b-link-box b-animate-go  thickbox" style="">
							<img src="'.$info['port_image'].'" style="width: 300px;height:300px;" />
							<div class="b-wrapper">
								<h2 style="padding-left:0px;padding-right:0px;" class="b-animate h b-from-left">'.$info['title'].'</h2>
								<p style="padding-left:0px;padding-right:0px;" class="b-animate p b-from-right">
								'.$info['Description'].'
								</p>
								<p style="padding-left:0px;padding-right:0px;" class="b-animate p b-from-bottom"><a href="'.$info['button_link'].'">'.$info['button_text'].'</a>
								</p>
							</div>
						</div>

                ';
		}	
		
				/*	
			
		if ($style==style16) {
		
		
		$output .= ' 		<div  class="b-link-stripe b-animate-go  thickbox" style="">
							<img src="'.$info['port_image'].'" style="width: 300px;height:300px;" />
							<div class="b-wrapper">
								<h2 style="padding-left:0px;padding-right:0px;" class="b-animate h b-from-left">'.$info['title'].'</h2>
								<p style="padding-left:0px;padding-right:0px;" class="b-animate p b-from-right">
								'.$info['Description'].'
								</p>
								<p style="padding-left:0px;padding-right:0px;" class="b-animate p b-from-bottom"><a href="'.$info['button_link'].'">'.$info['button_text'].'</a>
								</p>
							</div>
						</div>

                ';
		}	
		
		
			
		if ($style==style17) {
		
		
		$output .= ' 		<div  class="b-link-apart-horisontal b-animate-go  thickbox" style="">
							<img src="'.$info['port_image'].'" style="width: 300px;height:300px;" />
							<div class="b-wrapper">
								<h2 style="padding-left:0px;padding-right:0px;" class="b-animate h b-from-left">'.$info['title'].'</h2>
								<p style="padding-left:0px;padding-right:0px;" class="b-animate p b-from-right">
								'.$info['Description'].'
								</p>
								<p style="padding-left:0px;padding-right:0px;" class="b-animate p b-from-bottom"><a href="'.$info['button_link'].'">'.$info['button_text'].'</a>
								</p>
							</div>
						</div>

                ';
		}	
			
			
							
			
		if ($style==style18) {
		
		
		$output .= '<div class="b-link-apart-vertical b-animate-go  thickbox" style="">
							<img src="'.$info['port_image'].'" style="width: 300px;height:300px;"/>
							<div class="b-wrapper">
								<h2 style="padding-left:0px;padding-right:0px;" class="b-animate h b-from-left">'.$info['title'].'</h2>
								<p style="padding-left:0px;padding-right:0px;" class="b-animate p b-from-right">
								'.$info['Description'].'
								</p>
								<p style="padding-left:0px;padding-right:0px;" class="b-animate p b-from-bottom"><a href="'.$info['button_link'].'">'.$info['button_text'].'</a>
								</p>
							</div>
						</div>

                ';
		}	
						
							
			
		if ($style==style19) {
		
		
		$output .= ' 		<div class="b-link-diagonal b-animate-go  thickbox" style="">
							<img src="'.$info['port_image'].'" style="width: 300px;height:300px;" />
							<div class="b-wrapper">
								<h2 style="padding-left:0px;padding-right:0px;" class="b-animate h b-from-left">'.$info['title'].'</h2>
								<p style="padding-left:0px;padding-right:0px;" class="b-animate p b-from-right">
								'.$info['Description'].'
								</p>
								<p style="padding-left:0px;padding-right:0px;" class="b-animate p b-from-bottom"><a href="'.$info['button_link'].'">'.$info['button_text'].'</a>
								</p>
							</div>
						</div>

                ';
		}	
			
								
							
			
		if ($style==style20) {
		
		
		$output .= ' 						<div class="b-link-apart-horisontal b-animate-go  thickbox  b-opacity-80"  style="">
							<img src="'.$info['port_image'].'" style="width: 300px;height:300px;"/>
							<div class="b-wrapper">
								<h2 style="padding-left:0px;padding-right:0px;" class="b-animate h b-from-left">'.$info['title'].'</h2>
								<p style="padding-left:0px;padding-right:0px;" class="b-animate p b-from-right">
								'.$info['Description'].'
								</p>
								<p style="padding-left:0px;padding-right:0px;" class="b-animate p b-from-bottom"><a href="'.$info['button_link'].'">'.$info['button_text'].'</a>
								</p>
							</div>
						</div>

                ';
		}	
			
					
								
							
			
		if ($style==style21) {
		
		
		$output .= ' <div class="b-link-fade b-animate-go  thickbox border-radius-10  "  style="">
							<img src="'.$info['port_image'].'" style="width: 300px;height:300px;" />
							<div class="b-wrapper">
								<h2 style="padding-left:0px;padding-right:0px;" class="b-animate h b-from-left">'.$info['title'].'</h2>
								<p style="padding-left:0px;padding-right:0px;" class="b-animate p b-from-right">
								'.$info['Description'].'
								</p>
								<p style="padding-left:0px;padding-right:0px;" class="b-animate p b-from-bottom"><a href="'.$info['button_link'].'">'.$info['button_text'].'</a>
								</p>
							</div>
						</div>

                ';
		}	
			
								
								
							
			
		if ($style==style22) {
		
		
		$output .= ' 			<div class="b-link-fade b-animate-go  thickbox"  style="">
							<img src="'.$info['port_image'].'" style="width: 300px;height:300px;" />
							<div class="b-wrapper">
								<h2 style="padding-left:0px;padding-right:0px;" class="b-animate h b-from-left">'.$info['title'].'</h2>
								<p style="padding-left:0px;padding-right:0px;" class="b-animate p b-from-right">
								'.$info['Description'].'
								</p>
								<p style="padding-left:0px;padding-right:0px;" class="b-animate p b-from-bottom"><a href="'.$info['button_link'].'">'.$info['button_text'].'</a>
								</p>
							</div>
						</div>

                ';
		}	
			
								
								
							
			
		if ($style==style23) {
		
		
		$output .= ' 	<div class="b-link-twist b-animate-go  thickbox   "  style="">
							<img src="'.$info['port_image'].'" style="width: 300px;height:300px;"/>
							<div class="b-wrapper">
								<h2 style="padding-left:0px;padding-right:0px;" class="b-animate h b-from-left">'.$info['title'].'</h2>
								<p style="padding-left:0px;padding-right:0px;" class="b-animate p b-from-right">
								'.$info['Description'].'
								</p>
								<p style="padding-left:0px;padding-right:0px;" class="b-animate p b-from-bottom"><a href="'.$info['button_link'].'">'.$info['button_text'].'</a>
								</p>
							</div>
						</div>

                ';
		}	
			
								
								
							
			
		if ($style==style24) {
		
		
		$output .= ' <div class="b-link-fade b-inverse-effect b-animate-go  thickbox   " 
		style="">
							<img src="'.$info['port_image'].'" style="width: 300px;height:300px;" />
							<div class="b-wrapper">
								<h2 style="padding-left:0px;padding-right:0px;" class="b-animate h b-from-left">'.$info['title'].'</h2>
								<p style="padding-left:0px;padding-right:0px;" class="b-animate p b-from-right">
								'.$info['Description'].'
								</p>
								<p style="padding-left:0px;padding-right:0px;" class="b-animate p b-from-bottom"><a href="'.$info['button_link'].'">'.$info['button_text'].'</a>
								</p>
							</div>
						</div>

                ';
		}	
											
								
							
			
		if ($style==style25) {
		
		
		$output .= '<figure style="width: 300px;height:300px;" style="width: 300px;height:300px;"class="effect-lily" >
						<img src="'.$info['port_image'].'" alt="img12"/>
						<figcaption>
							<div>
								<h2>'.$info['title'].'</h2>
								<p>'.$info['Description'].'</p>
							</div>
			<a href="'.$info['button_link'].'">'.$info['button_text'].'</a>
						</figcaption>			
					</figure>
                ';
		}	
				
		if ($style==style26) {
		
		
		$output .= ' 					<figure style="width: 300px;height:300px;" class="effect-sadie">
						<img src="'.$info['port_image'].'" alt="img02"/>
						<figcaption>
							<h2>'.$info['title'].'</h2>
							<p>'.$info['Description'].'</p>
						<a href="'.$info['button_link'].'">'.$info['button_text'].'</a>
						</figcaption>			
					</figure>

                ';}	
			
							
		if ($style==style27) {
		
		
		$output .= ' 					<figure style="width: 300px;height:300px;" class="effect-layla">
						<img src="'.$info['port_image'].'" alt="img02"/>
						<figcaption>
							<h2>'.$info['title'].'</h2>
							<p>'.$info['Description'].'</p>
						<a href="'.$info['button_link'].'">'.$info['button_text'].'</a>
						</figcaption>			
					</figure>

                ';}	
			
			
						
							
		if ($style==style28) {
		
		
		$output .= ' 					<figure style="width: 300px;height:300px;" class="effect-zoe">
						<img src="'.$info['port_image'].'" alt="img02"/>
						<figcaption>
							<h2 style="color:#000;">'.$info['title'].'</h2>
							<p>'.$info['Description'].'</p>
						<a href="'.$info['button_link'].'">'.$info['button_text'].'</a>
						</figcaption>			
					</figure>

                ';}	
			
					if ($style==style29) {
		
		
		$output .= ' 					<figure style="width: 300px;height:300px;" class="effect-oscar">
						<img src="'.$info['port_image'].'" alt="img02"/>
						<figcaption>
							<h2>'.$info['title'].'</h2>
							<p>'.$info['Description'].'</p>
							<a href="'.$info['button_link'].'">'.$info['button_text'].'</a>
						</figcaption>			
					</figure>

                ';}	
			
					
					if ($style==style30) {
		
		
		$output .= ' 					<figure style="width: 300px;height:300px;" class="effect-marley">
						<img src="'.$info['port_image'].'" alt="img02"/>
						<figcaption>
							<h2>'.$info['title'].'</h2>
							<p>'.$info['Description'].'</p>
						<a href="'.$info['button_link'].'">'.$info['button_text'].'</a>
						</figcaption>			
					</figure>

                ';}	
				
									
					if ($style==style31) {
		
		
		$output .= ' 					<figure style="width: 300px;height:300px;" class="effect-ruby">
						<img src="'.$info['port_image'].'" alt="img02"/>
						<figcaption>
							<h2>'.$info['title'].'</h2>
							<p>'.$info['Description'].'</p>
						<a href="'.$info['button_link'].'">'.$info['button_text'].'</a>
						</figcaption>			
					</figure>

                ';}	
				
				
										
					if ($style==style32) {
		
		
		$output .= ' 					<figure style="width: 300px;height:300px;" class="effect-roxy">
						<img src="'.$info['port_image'].'" alt="img02"/>
						<figcaption>
							<h2>'.$info['title'].'</h2>
							<p>'.$info['Description'].'</p>
							<a href="'.$info['button_link'].'">'.$info['button_text'].'</a>
						</figcaption>			
					</figure>

                ';}	
				
					
										
					if ($style==style33) {
		
		
		$output .= ' 					<figure style="width: 300px;height:300px;" class="effect-bubba">
						<img src="'.$info['port_image'].'" alt="img02"/>
						<figcaption>
							<h2>'.$info['title'].'</h2>
							<p>'.$info['Description'].'</p>
							<a href="'.$info['button_link'].'">'.$info['button_text'].'</a>
						</figcaption>			
					</figure>

                ';}	
				
								
										
					if ($style==style34) {
		
		
		$output .= ' 					<figure style="width: 300px;height:300px;" class="effect-romeo">
						<img src="'.$info['port_image'].'" alt="img02"/>
						<figcaption>
							<h2>'.$info['title'].'</h2>
							<p>'.$info['Description'].'</p>
							<a href="'.$info['button_link'].'">'.$info['button_text'].'</a>
						</figcaption>			
					</figure>

                ';}	
				
												
					if ($style==style35) {
		
		
		$output .= ' 					<figure style="width: 300px;height:300px;" class="effect-dexter">
						<img src="'.$info['port_image'].'" alt="img02"/>
						<figcaption>
							<h2>'.$info['title'].'</h2>
							<p>'.$info['Description'].'</p>
							<a href="'.$info['button_link'].'">'.$info['button_text'].'</a>
						</figcaption>			
					</figure>

                ';}	

									
					if ($style==style36) {
		
		
		$output .= ' 					<figure style="width: 300px;height:300px;" class="effect-sarah">
						<img src="'.$info['port_image'].'" alt="img02"/>
						<figcaption>
							<h2>'.$info['title'].'</h2>
							<p>'.$info['Description'].'</p>
						<a href="'.$info['button_link'].'">'.$info['button_text'].'</a>
						</figcaption>			
					</figure>

                ';}
				
											
					if ($style==style37) {
		
		
		$output .= ' 					<figure style="width: 300px;height:300px;" class="effect-chico">
						<img src="'.$info['port_image'].'" alt="img02"/>
						<figcaption>
							<h2>'.$info['title'].'</h2>
							<p>'.$info['Description'].'</p>
							<a href="'.$info['button_link'].'">'.$info['button_text'].'</a>
						</figcaption>			
					</figure>

                ';}
				
					
											
					if ($style==style38) {
		
		
		$output .= ' 					<figure style="width: 300px;height:300px;" class="effect-milo">
						<img src="'.$info['port_image'].'" alt="img02"/>
						<figcaption>
							<h2>'.$info['title'].'</h2>
							<p>'.$info['Description'].'</p>
							<a href="'.$info['button_link'].'">'.$info['button_text'].'</a>
						</figcaption>			
					</figure>

                ';}  
				
				*/
				
				
				
			$i++;
	}

	
	endwhile;
	$output .='</div>';
	wp_reset_query();
	return $output;
}

add_shortcode('ex_effects', 'ex_effects_custom_post_type_shortcode');

?>