<?php

/**
 * Display count down in header
 *
 * @return void
 * @author 99plugins
 **/

if ( ! function_exists( 'nncd_datetime' ) ) {
	function nncd_datetime() { ?>
		<script type="text/javascript">
			jQuery(document).ready(function($){ 
				<?php
				$date =  nncd_get_option( 'nncd_cowndownto' ); 
				
				$year	= date("Y", $date);
				$month	= date("n", $date);
				$date 	= date("d", $date);

				$format =  nncd_get_option( 'nncd_format' );
					if ( ! empty( $format ) ) {
							$format = ", format: '" . $format . "'";
					};
				?>
				$('#countdown_time').countdown({until: new Date( <?php echo $year; ?>, <?php echo $month; ?>-1, <?php echo $date; ?>) <?php echo $format ?>});
			});
		</script>
	<?php }
}

/**
 * get option image
 *
 * @return void
 * @author 99plugins
 **/

if ( ! function_exists( 'nncd_image' ) ) {
	function nncd_image(){
		$image =  nncd_get_option( 'nncd_image' );
		echo "<img src='" . esc_url( $image ) . "'>";
	}
}

/**
 * get option button
 *
 * @return void
 * @author 99plugins
 **/

if ( ! function_exists( 'nncd_button' ) ) {
	function nncd_button(){
		$button_text 				=  nncd_get_option( 'nncd_button_text' );
		$button_link 				=  nncd_get_option( 'nncd_button_link' );
		$button_icon 				=  nncd_get_option( 'nncd_button_icon' );

		if ( ! empty( $button_icon ) ) {
			$button_icon = '<i class="fa '. $button_icon .'"></i>';
		}
		
		if ( ( ! empty( $button_text ) ) && ( ! empty( $button_link ) ) ) { ?>
			<div class="button">
				<a href="<?php echo esc_url( $button_link ); ?>"><?php echo ''.$button_icon; echo esc_attr( $button_text ); ?></a>
			</div>	
		<?php }
	}
}

/**
 * get option message
 *
 * @return void
 * @author 99plugins
 **/

if ( ! function_exists( 'nncd_message' ) ) {
	function nncd_message(){
		$message 			=  nncd_get_option( 'nncd_message' );
		
		echo  '<span class="message">' . esc_attr( $message ) . '</span>';
	}
}

/**
 * get option page
 *
 * @return void
 * @author 99plugins
 **/

add_filter( 'page_template', 'nncd_page_template' );

if ( ! function_exists( 'nncd_page_template' ) ) {

	function nncd_page_template( $page_template ) {

		//get page slug
		$nncd_page_id = nncd_get_option( 'nncd_page' );
		$nncd_page_slug = get_page( $nncd_page_id );

		if ( ! empty( $nncd_page_slug ) ) {

		    if ( is_page( $nncd_page_slug->post_name ) ) {
		        $page_template = NN_COUNT_DOWN_DIR . 'templates/nncd-count-down-template.php';
		    }
		}
	    return $page_template;
	}	
}

/**
 * Display count down in cooming soon page
 *
 * @return void
 * @author 99plugins
 **/

if ( ! function_exists( 'nncd_page_datetime' ) ) {
	function nncd_page_datetime() { ?>
		<script type="text/javascript">
			jQuery(document).ready(function($){ 
				<?php
				$date =  nncd_get_option( 'nncd_page_cowndownto' ); 
				
				$year	= date("Y", $date);
				$month	= date("n", $date);
				$date 	= date("d", $date);

				?>
				$('#countdown_page_time').countdown({until: new Date( <?php echo $year; ?>, <?php echo $month; ?>-1, <?php echo $date; ?>) });
			});
		</script>
	<?php }
}

/**
 * get option page message
 *
 * @return void
 * @author 99plugins
 **/

if ( ! function_exists( 'nncd_page_message' ) ) {
	function nncd_page_message(){
		$message 			=  nncd_get_option( 'nncd_page_message' );
		
		echo  '<span class="message">' . esc_attr( $message ) . '</span>';
	}
}

/**
 * get option button page
 *
 * @return void
 * @author 99plugins
 **/
if ( ! function_exists( 'nncd_page_button' ) ) {
	function nncd_page_button(){ 
		?>
		<div class="button">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo  esc_html_e( 'Home' , 'nn-count-down' ); ?></a>
		</div>	
		<?php
	}
}

/**
 * get item video
 *
 * @return void
 * @author 99plugins
 **/
if ( ! function_exists( 'nncd_page_item_video' ) ) {
	function nncd_page_item_video(){ 
		
		$video		=  nncd_get_option( 'nncd_page_item_video' );

		$embed_code = wp_oembed_get($video, array('width'=>400));
		echo ' ' . $embed_code;
		
	}
}

/**
 * get item Slider
 *
 * @return void
 * @author 99plugins
 **/
if ( ! function_exists( 'nncd_page_item_slider' ) ) {
	function nncd_page_item_slider(){ 
		
		$contentslider		=  nncd_get_option( 'nncd_page_item_slider' );
		
		$itemslider1 = '<div class="slider-product">';
		$itemslider2 = '<div class="slider-product-nav">';

		foreach ($contentslider as $value) {
			$itemslider1 .= '<div><img src=" ' . esc_url( $value ) . ' " alt=""></div>';
			$itemslider2 .= '<div class="prod-nav"><img src=" ' . esc_url( $value ) . ' " alt=""></div>';
		}

		$itemslider1 .= '</div>';
		$itemslider2 .= '</div>';

		echo ' ' . $itemslider1;
		echo ' ' . $itemslider2;
		
	}
}

/**
* data content layout 1
*
* @return void
* @author 99plugins
*/

if ( ! function_exists( 'nncd_page_layout1' ) ) {
	function nncd_page_layout1 (){
		$item1_image 			=  nncd_get_option( 'nncd_item_1_image' );
		
		echo  '<div class="img-product"><img src="' . esc_url( $item1_image ) . '"></div>';
	}
}

/**
* data content layout 2
*
* @return void
* @author 99plugins
*/

if ( ! function_exists( 'nncd_page_layout2' ) ) {
	function nncd_page_layout2 (){
		//variabel for data content
		$content_layout = '<div class="row">';

		for ($i=1; $i < 4; $i++) {
			//get image
			$item_image 		=  nncd_get_option( 'nncd_item_' . $i . '_image' ); 
			$item_name 			=  nncd_get_option( 'nncd_item_' . $i . '_name' ); 
			$item_description	=  nncd_get_option( 'nncd_item_' . $i . '_description' );

			$content_layout .= '<div class="col-md-4">
                    				<div class="product">
                        				<div class="wrap-img">
                            				<img src="' . esc_url( $item_image ) . '">
                       					 </div>
                        				<h3>' . esc_attr( $item_name ) . '</h3>
                        				<h5>' . esc_attr( $item_description ) . '</h5>
                    				</div>
                				</div>  '; 
			
		}

		//close div variable data content
		$content_layout .= '</div>';
		echo  ' ' . $content_layout ;
	}
}

/**
* data content layout 3
*
* @return void
* @author 99plugins
*/

if ( ! function_exists( 'nncd_page_layout3' ) ) {
	function nncd_page_layout3 (){
		//variabel for data content
		$content_layout = '<div class="row">';

		for ($i=1; $i < 4; $i++) {
			//get image
			$item_image 		=  nncd_get_option( 'nncd_item_' . $i . '_image' ); 
			$item_name 			=  nncd_get_option( 'nncd_item_' . $i . '_name' ); 
			$item_description	=  nncd_get_option( 'nncd_item_' . $i . '_description' );

			$content_layout .= '<div class="col-md-4">
                    				 <span class="link-list">
                        				<h4>' . esc_attr( $item_name ) . '</h4>
                        				<p>' . esc_attr( $item_description ) . '</p>
                    				</span>
                				</div>  '; 
			
		}

		//close div variable data content
		$content_layout .= '</div>';
		echo  ' ' . $content_layout ;
	}
}

/**
* data content layout 4
*
* @return void
* @author 99plugins
*/

if ( ! function_exists( 'nncd_page_layout4' ) ) {
	function nncd_page_layout4 (){
		//variabel for data content
		$content_layout = '<div class="wrap-list">';

		for ($i=1; $i < 4; $i++) {
			//get image
			$item_icon		=  nncd_get_option( 'nncd_item_' . $i . '_icon' ); 
			$item_name		=  nncd_get_option( 'nncd_item_' . $i . '_name' ); 
			

			$content_layout .= '<span class="link-list">
                        			<i class="fa ' . esc_attr( $item_icon ) . ' fa-2x"></i>
                        			<h5>' . esc_attr( $item_name ) . '</h5>
                    			</span>'; 
			
		}

		//close div variable data content
		$content_layout .= '</div>';
		echo  ' ' . $content_layout ;
	}
}

/**
* content layout 1
*
* @return void
* @author 99plugins
*/

if ( ! function_exists( 'nncd_page_content_layout1' ) ) {
	function nncd_page_content_layout1 (){
	?>
		<div id="countdown_page_time"></div>
		
		<?php nncd_page_message(); ?>
		<?php nncd_page_button(); ?>
		<?php nncd_page_layout1(); ?>

	<?php	
	}
}

/**
* content layout 2
*
* @return void
* @author 99plugins
*/

if ( ! function_exists( 'nncd_page_content_layout2' ) ) {
	function nncd_page_content_layout2 (){
	?>
		<div id="countdown_page_time"></div>
		
		<?php nncd_page_layout2(); ?>

		<?php nncd_page_message(); ?>
		<?php nncd_page_button(); ?>

	<?php	
	}
}

/**
* content layout 3
*
* @return void
* @author 99plugins
*/

if ( ! function_exists( 'nncd_page_content_layout3' ) ) {
	function nncd_page_content_layout3 (){
	?>
		<div class="row">
			<div class="col-md-5">
				<div class="video-wrap">
					<?php nncd_page_item_video(); ?>
				</div>
			</div>
			 <div class="col-md-7">
			 	<div class="content">
					<div id="countdown_page_time"></div>
					<?php nncd_page_message(); ?>
			 	</div>
			 </div>
		</div>
		
		<hr>
		
		<?php nncd_page_layout3(); ?>
		<?php nncd_page_button(); ?>

	<?php	
	}
}

/**
* content layout 4
*
* @return void
* @author 99plugins
*/

if ( ! function_exists( 'nncd_page_content_layout4' ) ) {
	function nncd_page_content_layout4 (){
	?>
		<div class="row">
			<div class="col-md-6">
				<div id="countdown_page_time"></div>
				<?php nncd_page_message(); ?>
				<?php nncd_page_layout4(); ?>
				<?php nncd_page_button(); ?>
			</div>
			 <div class="col-md-6">
			 	<?php nncd_page_item_slider(); ?>
			 </div>
		</div>
	<?php	
	}
} ?>