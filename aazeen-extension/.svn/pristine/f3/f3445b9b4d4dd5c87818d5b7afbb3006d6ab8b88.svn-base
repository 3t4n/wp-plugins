<?php
/**
 * team Widget
 *
 * @since 1.0.0
 *
 * @package Aazeen extension
 */


if ( !class_exists( 'aazeen_callout_widget' ) ) {

	class aazeen_callout_widget extends WP_Widget {

		/**
		 * Sets up team widget instance.
		 *
		 * @since 1.0
		 */
		public function __construct() {
			$widget_ops = array(
				'classname' => 'aazeen_callout_widget aazeen_widgtes',
				'description' => __( 'You can add use this widgte in any section or page', 'aazeen-extension' ),
				'customize_selective_refresh' => true,
			);
			parent::__construct( 'aazeen_callout_widget', __( 'Aazeen - Callout widget', 'aazeen-extension' ), $widget_ops );
			$this->alt_option_name = 'aazeen_callout_widget';
			add_action('wp_enqueue_scripts', array(&$this, 'aazeen_callout_widget_style'));

			$defaults = apply_filters('aazeen_callout_widget_modify_defaults', array(
				'title1'=>'Need To Grow Your Creative Site',
				'content1'=>'You will save a lot of time. It is easy to purchase and enjoy these wonderful feelings!',
				'link_text1'=>'LEARN MORE',
				'url1'=>'https://www.themezwp.com/aazeen/',
			  'bg_color' => '#70e1e9',
				'button_one_style'=> 'regu',
				'button_two_style'=>'btn-round',
				'button1_color' => '#e91e63',
				'button2_color' => '#000',
				'padding_top_bottom'=> 1,
				'padding_right_left'=>1,
				'content_color' =>'#fff' ,
				'title_color'=> '#fff',
									));

			$this->defaults = $defaults;

		}

		function widget($args, $instance) {

			 $new_tab = isset( $instance['new_tab'] ) ? $instance['new_tab'] : false;
			 $widget_text = ! empty( $instance['content1'] ) ? $instance['content1'] : '';
			 $text = apply_filters( 'widget_text', $widget_text, $instance, $this );
			 $bg_color = isset( $instance['bg_color'] ) ? $instance['bg_color'] : '#70e1e9';
			 $button1_color = isset( $instance['button1_color'] ) ? $instance['button1_color'] : '#e91e63';
			 $button2_color = isset( $instance['button2_color'] ) ? $instance['button2_color'] : '#000';
			 $content_color = isset( $instance['content_color'] ) ? $instance['content_color'] : '#fff';

			 $padding_top_bottom = ( ! empty( $instance['padding_top_bottom'] ) ) ? absint( $instance['padding_top_bottom'] ) : 1;
			 $padding_right_left = ( ! empty( $instance['padding_right_left'] ) ) ? absint( $instance['padding_right_left'] ) : 1;
			 if ( 225 > ariColor::newColor( $button1_color )->luminance ) {
				 // Our background color is dark, so we need to create a light text color.
				 $button1_color_bg = '#fff';
			 } else {

				 // Our background color is light, so we need to create a dark text color
				 $button1_color_bg =  '#000' ;

			 }
			 $button1_color_bg = esc_attr( $button1_color_bg );
			 if ( 125 > ariColor::newColor( $button2_color )->luminance ) {
				 // Our background color is dark, so we need to create a light text color.
				 $button2_color_bg = '#fff';
			 } else {

				 // Our background color is light, so we need to create a dark text color
				 $button2_color_bg =  '#000' ;

			 }
			 $button2_color_bg = esc_attr( $button2_color_bg );

			 extract($args);
      $instance = wp_parse_args((array) $instance, $this->defaults);
 			 echo $before_widget;
 			 ?>

			 <?php $id= $this->id;
			 //Stylesheet-loaded in Customizer Only.
			if(is_customize_preview()){
				$id= $this->id;
				echo "<style> #".$id." .text-center p
				{
					color: $content_color !important;
				}
				#".$id." .btn.btn-rose.one
			 {
			 	background-color: $button1_color ;
			 	border-color:$button1_color;
			 	box-shadow:0 2px 2px 0 " . Kirki_Color::get_rgba($button1_color, .14) . ",0 3px 1px -2px " . Kirki_Color::get_rgba($button1_color, .2) . ",0 1px 5px 0 " . Kirki_Color::get_rgba($button1_color, .12) . ";
			 }
			 #".$id." .btn.btn-rose.one:hover
			 {
			 	box-shadow: 0 14px 26px -12px " . Kirki_Color::get_rgba($button1_color, .42) . ", 0 4px 23px 0 rgba(0, 0, 0, .12), 0 8px 10px -5px " . Kirki_Color::get_rgba($button1_color, .2) . ";

			 }
			 #".$id." .btn.btn-rose.one
			 {
				 color: $button1_color_bg;
			 }
			 #".$id." .btn.btn-rose.two
	 		{
	 			background-color: $button2_color ;
	 			border-color:$button2_color;
	 			box-shadow:0 2px 2px 0 " . Kirki_Color::get_rgba($button2_color, .14) . ",0 3px 1px -2px " . Kirki_Color::get_rgba($button2_color, .2) . ",0 1px 5px 0 " . Kirki_Color::get_rgba($button2_color, .12) . ";
	 		}
	 		#".$id." .btn.btn-rose.two:hover
	 		{
	 			box-shadow: 0 14px 26px -12px " . Kirki_Color::get_rgba($button2_color, .42) . ", 0 4px 23px 0 rgba(0, 0, 0, .12), 0 8px 10px -5px " . Kirki_Color::get_rgba($button2_color, .2) . ";

	 		}
			#".$id." .btn.btn-rose.two
 		 {
 			 color: $button2_color_bg;
 		 }</style>";
			}
			 ?>

			 <?php echo '<span class="so_widget_id" data-panel-id="'.$this->id.'"></span>';?>
			 <div class="callout text-center" style="Background:<?php echo $bg_color; ?>;padding:<?php echo $padding_top_bottom; ?>rem <?php echo $padding_right_left; ?>rem">
				 <?php	if (!empty($instance['title1']) || !empty($instance['content1'])): ?>
					 <?php if (!empty($instance['title1'])): ?>
						 <h2 style="color:<?php echo esc_attr($instance['title_color']); ?>;"><?php echo apply_filters('widget_title', $instance['title1']); ?></h2>
					 <?php endif;?>
					 <?php if (!empty($instance['content1'])): ?>
							 <?php echo  wpautop($text) ; ?>
						 <?php endif;?>
					 <?php endif;?>
					 <?php	if (!empty($instance['link_text1']) || !empty($instance['url1'])): ?>
						 <a class="btn btn-rose <?php echo esc_attr($instance['button_one_style']); ?> one" href="<?php echo esc_url($instance['url1']); ?>" <?php if (esc_attr($new_tab)) : ?> target="_blank" <?php endif;?>>
							 <?php echo apply_filters('widget_title', $instance['link_text1']); ?>
						 </a>
					 <?php endif;?>
					 <?php	if (!empty($instance['link_text2']) || !empty($instance['url2'])): ?>
						 <a class="btn btn-rose <?php echo esc_attr($instance['button_two_style']); ?> two" href="<?php echo esc_url($instance['url2']); ?>" <?php if (esc_attr($new_tab)) : ?> target="_blank" <?php endif;?>>
							 <?php echo apply_filters('widget_title', $instance['link_text2']); ?>
						 </a>
					 <?php endif;?>
				 </div>
<?php
        echo $after_widget;
    }

    function update($new_instance, $old_instance) {

        $instance = $old_instance;

				/*Box 1 */
        $instance['title1'] = sanitize_text_field($new_instance['title1']);
				if ( current_user_can( 'unfiltered_html' ) ) {
	        $instance['content1'] = $new_instance['content1'];
	      } else {
	        $instance['content1'] = wp_kses_post( $new_instance['content1'] );
	      }

				/*Box 1 */
				$instance['link_text1'] = sanitize_text_field( $new_instance['link_text1'] );
				$instance['url1'] = esc_url_raw( $new_instance['url1'] );

				/*Box 1 */
				$instance['link_text2'] = sanitize_text_field( $new_instance['link_text2'] );
		 	 	$instance['url2'] = esc_url_raw( $new_instance['url2'] );
				$instance['new_tab'] = isset( $new_instance['new_tab'] ) ? (bool) $new_instance['new_tab'] : false;

				// Button one style
				$instance[ 'button_one_style' ]	= wp_kses_post( $new_instance[ 'button_one_style' ] );
				$instance['button1_color'] = strip_tags($new_instance['button1_color']);

				$instance[ 'button_two_style' ]	= wp_kses_post( $new_instance[ 'button_two_style' ] );
				$instance['button2_color'] = strip_tags($new_instance['button2_color']);

				$instance['bg_color'] = strip_tags($new_instance['bg_color']);
				$instance['title_color'] = strip_tags($new_instance['title_color']);
				$instance['content_color'] = strip_tags($new_instance['content_color']);

// settings
$instance['padding_top_bottom'] = (int) $new_instance['padding_top_bottom'];
$instance['padding_right_left'] = (int) $new_instance['padding_right_left'];

        return $instance;

    }

    function form($instance) {
        $instance = wp_parse_args((array) $instance, $this->defaults);
				$new_tab = isset( $instance['new_tab'] ) ? (bool) $instance['new_tab'] : false;
				$padding_top_bottom    = isset( $instance['padding_top_bottom'] ) ? absint( $instance['padding_top_bottom'] ) : 1;
				$padding_right_left    = isset( $instance['padding_right_left'] ) ? absint( $instance['padding_right_left'] ) : 1;
			?>



<!--BLOCK 1 START-->
<div class="block_accordion">
	<h4>
		<?php _e('CONTENT', 'aazeen-extension') ?></h4>
	<div class="block_acc_wrap">
		<p>
			<label for="<?php echo $this->get_field_id('title1'); ?>"><?php _e('Title', 'aazeen-extension'); ?></label>
			<input type="text" name="<?php echo $this->get_field_name('title1'); ?>" id="<?php echo $this->get_field_id('title1'); ?>" value="<?php if( !empty($instance['title1']) ): echo $instance['title1']; endif; ?>" class="widefat">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'title_color' ); ?>" class="icon-color"><?php _e('Title Color', 'aazeen-extension') ?></label>
			<input class="widefat color-picker" id="<?php echo $this->get_field_id( 'title_color' ); ?>" name="<?php echo $this->get_field_name( 'title_color' ); ?>" value="<?php echo $instance['title_color']; ?>" type="text" />
		</p>

		<p><label for="<?php echo $this->get_field_id( 'content1' ); ?>"><?php _e( 'Content','aazeen-extension' ); ?></label>
		<textarea class="widefat" rows="8" cols="20" id="<?php echo $this->get_field_id('content1'); ?>" name="<?php echo $this->get_field_name('content1'); ?>"><?php if( !empty($instance['content1']) ):echo esc_textarea( $instance['content1'] );endif; ?></textarea></p>
	<p>
	  <label for="<?php echo $this->get_field_id( 'content_color' ); ?>" class="icon-color"><?php _e('Content Color', 'aazeen-extension') ?></label>
	  <input class="widefat color-picker" id="<?php echo $this->get_field_id( 'content_color' ); ?>" name="<?php echo $this->get_field_name( 'content_color' ); ?>" value="<?php echo $instance['content_color']; ?>" type="text" />
	</p>
</div>
</div>

<div class="block_accordion">
	<h4>
		<?php _e('Button one', 'aazeen-extension') ?></h4>
	<div class="block_acc_wrap">
		<p>
			<label for="<?php echo $this->get_field_id('link_text1'); ?>"><?php _e('button Text', 'promote'); ?></label>
			<input type="text" name="<?php echo $this->get_field_name('link_text1'); ?>" id="<?php echo $this->get_field_id('link_text1'); ?>" value="<?php if( !empty($instance['link_text1']) ): echo $instance['link_text1']; endif; ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('url1'); ?>"><?php _e('button Link', 'promote'); ?></label>
			<input type="text" name="<?php echo $this->get_field_name('url1'); ?>" id="<?php echo $this->get_field_id('url1'); ?>" value="<?php if( !empty($instance['url1']) ): echo esc_url($instance['url1']); endif; ?>" class="widefat">
		</p>
		<?php
		$styles=button_style_aazeen_extentions();
		?>
		<label for="<?php echo $this->get_field_id('button_one_style'); ?>"><?php _e('button style', 'aazeen-extension') ?></label>
		<select id="<?php echo $this->get_field_id('button_one_style'); ?>" name="<?php echo $this->get_field_name('button_one_style'); ?>" class="widefat">
		<?php
		foreach($styles as $key => $value):?>
		<option value="<?php echo $key ;?>" <?php if ( $key == $instance['button_one_style'] ) echo 'selected="selected"'; ?>> <?php echo $value ;?></option>
		<?php endforeach;?>
		</select>
		<p>
 		 <label for="<?php echo $this->get_field_id( 'button1_color' ); ?>" class="icon-color"><?php _e('button one bg Color', 'aazeen-extension') ?></label>
 		 <input class="widefat color-picker"  id="<?php echo $this->get_field_id( 'button1_color' ); ?>" name="<?php echo $this->get_field_name( 'button1_color' ); ?>" value="<?php echo $instance['button1_color']; ?>" type="text" />
 	 </p>

	</div>
</div>
<div class="block_accordion">
	<h4>
		<?php _e('Button two', 'aazeen-extension') ?></h4>
	<div class="block_acc_wrap">
		<p>
			<label for="<?php echo $this->get_field_id('link_text2'); ?>"><?php _e('button Text', 'promote'); ?></label>
			<input type="text" name="<?php echo $this->get_field_name('link_text2'); ?>" id="<?php echo $this->get_field_id('link_text2'); ?>" value="<?php if( !empty($instance['link_text2']) ): echo $instance['link_text2']; endif; ?>" >
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('url2'); ?>"><?php _e('button Link', 'promote'); ?></label>
			<input type="text" name="<?php echo $this->get_field_name('url2'); ?>" id="<?php echo $this->get_field_id('url2'); ?>" value="<?php if( !empty($instance['url2']) ): echo esc_url($instance['url2']); endif; ?>" class="widefat">
		</p>
		<label for="<?php echo $this->get_field_id('button_two_style'); ?>"><?php _e('button style', 'aazeen-extension') ?></label>
		<select id="<?php echo $this->get_field_id('button_two_style'); ?>" name="<?php echo $this->get_field_name('button_two_style'); ?>" class="widefat">
		<?php
		foreach($styles as $key => $value):?>
		<option value="<?php echo $key ;?>" <?php if ( $key == $instance['button_two_style'] ) echo 'selected="selected"'; ?>> <?php echo $value ;?></option>
		<?php endforeach;?>
		</select>
		<p>
		 <label for="<?php echo $this->get_field_id( 'button2_color' ); ?>" class="icon-color"><?php _e('button one bg Color', 'aazeen-extension') ?></label>
		 <input class="widefat color-picker"  id="<?php echo $this->get_field_id( 'button2_color' ); ?>" name="<?php echo $this->get_field_name( 'button2_color' ); ?>" value="<?php echo $instance['button2_color']; ?>" type="text" />
	 </p>

	</div>
</div>

<div class="block_accordion">
	<h4>
		<?php _e('Background', 'aazeen-extension') ?></h4>
	<div class="block_acc_wrap">
		<p>
		  <label for="<?php echo $this->get_field_id( 'bg_color' ); ?>" class="icon-color"><?php _e('Background Color', 'aazeen-extension') ?></label>
		  <input class="widefat color-picker" id="<?php echo $this->get_field_id( 'bg_color' ); ?>" name="<?php echo $this->get_field_name( 'bg_color' ); ?>" value="<?php echo $instance['bg_color']; ?>" type="text" />
		</p>
	</div>
</div>

<div class="block_accordion">
	<h4>
		<?php _e('Settings', 'aazeen-extension') ?></h4>
	<div class="block_acc_wrap">
		<p><label for="<?php echo $this->get_field_id( 'padding_top_bottom' ); ?>"><?php _e( 'Padding Top Bottom', 'aazeen-extension' ); ?></label>
		<input class="tiny-text" id="<?php echo $this->get_field_id( 'padding_top_bottom' ); ?>" name="<?php echo $this->get_field_name( 'padding_top_bottom' ); ?>" type="number" step="1" min="1" value="<?php echo $padding_top_bottom; ?>" size="3" /></p>
		<p><label for="<?php echo $this->get_field_id( 'padding_right_left' ); ?>"><?php _e( 'Padding Right Left', 'aazeen-extension' ); ?></label>
		<input class="tiny-text" id="<?php echo $this->get_field_id( 'padding_right_left' ); ?>" name="<?php echo $this->get_field_name( 'padding_right_left' ); ?>" type="number" step="1" min="1" value="<?php echo $padding_right_left; ?>" size="3" /></p>
	</div>
</div>

 <?php
	}
	//ENQUEUE CSS
	function aazeen_callout_widget_style() {
		$settings = get_option( $this->option_name );

		if ( empty( $settings ) ) {
			return;
		}

		foreach ( $settings as $instance_id => $instance ) {
			$id = $this->id_base . '-' . $instance_id;

			if ( ! is_active_widget( false, $id, $this->id_base ) ) {
				continue;
			}
			$button1_color= '#e91e63';
			$button2_color= '#000';
			$content_color='#fff';

			if ( ! empty( $instance['button1_color'] ) ) {
		$button1_color = esc_attr($instance['button1_color']);
			}
			if ( ! empty( $instance['button2_color'] ) ) {
				$button2_color = esc_attr($instance['button2_color']);
			}
			if ( ! empty( $instance['content_color'] ) ) {
				$content_color = esc_attr($instance['content_color']);
			}


		$id= $this->id;
		$inline_css='';

		/*content  Color  for text */
		$inline_css .=

			"#".$id." .text-center p
			{
				color: $content_color;
			}"
		;
	 /*  Color calculation for text */

	 /*----------- button one -----------*/

	 $inline_css .=
		" #".$id." .btn.btn-rose.one
		{
			background-color: $button1_color ;
			border-color:$button1_color;
			box-shadow:0 2px 2px 0 " . Kirki_Color::get_rgba($button1_color, .14) . ",0 3px 1px -2px " . Kirki_Color::get_rgba($button1_color, .2) . ",0 1px 5px 0 " . Kirki_Color::get_rgba($button1_color, .12) . ";
		}
		#".$id." .btn.btn-rose.one:hover
		{
			box-shadow: 0 14px 26px -12px " . Kirki_Color::get_rgba($button1_color, .42) . ", 0 4px 23px 0 rgba(0, 0, 0, .12), 0 8px 10px -5px " . Kirki_Color::get_rgba($button1_color, .2) . ";

		}"

	 ;

	 if ( 225 > ariColor::newColor( $button1_color )->luminance ) {
		 // Our background color is dark, so we need to create a light text color.
		 $button1_color_bg = '#fff';
	 } else {

		 // Our background color is light, so we need to create a dark text color
		 $button1_color_bg =  '#000' ;

	 }
	 $button1_color_bg = esc_attr( $button1_color_bg );
	 /*  Color calculation for text */
	 $inline_css .=
		 "#".$id." .btn.btn-rose.one
		 {
			 color: $button1_color_bg;
		 }"
	 ;

	 /*----------- button two -----------*/

	 $inline_css .=
		" #".$id." .btn.btn-rose.two
		{
			background-color: $button2_color ;
			border-color:$button2_color;
			box-shadow:0 2px 2px 0 " . Kirki_Color::get_rgba($button2_color, .14) . ",0 3px 1px -2px " . Kirki_Color::get_rgba($button2_color, .2) . ",0 1px 5px 0 " . Kirki_Color::get_rgba($button2_color, .12) . ";
		}
		#".$id." .btn.btn-rose.two:hover
		{
			box-shadow: 0 14px 26px -12px " . Kirki_Color::get_rgba($button2_color, .42) . ", 0 4px 23px 0 rgba(0, 0, 0, .12), 0 8px 10px -5px " . Kirki_Color::get_rgba($button2_color, .2) . ";

		}"

	 ;

	 if ( 225 > ariColor::newColor( $button2_color )->luminance ) {
		 // Our background color is dark, so we need to create a light text color.
		 $button2_color_bg = '#fff';
	 } else {

		 // Our background color is light, so we need to create a dark text color
		 $button2_color_bg =  '#000' ;

	 }
	 $button2_color_bg = esc_attr( $button2_color_bg );
	 /*  Color calculation for text */
	 $inline_css .=
		 "#".$id." .btn.btn-rose.two
		 {
			 color: $button2_color_bg;
		 }"
	 ;

	 wp_add_inline_style( 'aazeen-style', $inline_css );

	 }
		}

 }
}

// register aazeen_ex dual category posts widget
function aazeen_ex_callout_widget() {
    register_widget( 'aazeen_callout_widget' );
}
add_action( 'widgets_init', 'aazeen_ex_callout_widget' );
