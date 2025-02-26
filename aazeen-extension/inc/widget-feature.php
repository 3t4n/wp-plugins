<?php
/**
 * feature Widget
 *
 * @since 1.0.0
 *
 * @package Aazeen extension
 */



 if ( !class_exists( 'aazeen_feature_widget' ) ) {

    class aazeen_feature_widget extends WP_Widget {

      public function __construct() {
        $widget_ops = array(
          'classname' => 'aazeen_feature_widget aazeen_widgtes',
          'description' => __( 'You can add use this widgte in any section or page', 'aazeen-extension' ),
          'customize_selective_refresh' => true,
        );
        parent::__construct( 'aazeen_feature_widget', __( 'Aazeen - Feature widget', 'aazeen-extension' ), $widget_ops );
        $this->alt_option_name = 'aazeen_feature_widget';
        // Register admin styles and scripts.
        add_action( 'admin_enqueue_scripts', array( $this, 'register_aazeen_admin_scripts' ) );
        include "default.php";
  			$this->defaults = $defaults;

      }



      /**
       * Registers and enqueues admin-specific JavaScript.
       */
      public function register_aazeen_admin_scripts() {

         wp_enqueue_script( 'aazeen_extension_iconwidgets',  plugin_dir_url( __FILE__ ) . 'simple-iconpicker.js' );
         wp_enqueue_style( 'aazeen_extension_iconwidgets',  plugin_dir_url( __FILE__ ) . 'simple-iconpicker.css' );

      }
		/**
		 * Display Widget
		 *
		 * @param $args
		 * @param $instance
		 */
		 function widget($args, $instance) {

				 $bg_color = isset( $instance['bg_color'] ) ? $instance['bg_color'] : '#BCBDD4';
				 $content_bgimage = isset( $instance['content_bgimage'] ) ? $instance['content_bgimage'] : '';
         $fixed_bg = isset( $instance['fixed_bg'] ) ? $instance['fixed_bg'] : false;
         extract($args);
 				$instance = wp_parse_args((array) $instance, $this->defaults);

				 echo $before_widget;

				 ?>

         <?php $id= $this->id; ?>
  			 <style>
  				#<?php echo $id;?> .separator-center::after{border-bottom-color:<?php echo esc_attr($instance['title_color']); ?>;}
  			 </style>

<!-- Feature Area
=====================================-->
<div id="feature" class="padding-vertical-2" style="Background-color:<?php echo $bg_color; ?>;<?php if (!empty($content_bgimage)): ?> background:url(<?php echo $content_bgimage ;?>) no-repeat <?php if ( $fixed_bg ) : ?> fixed <?php endif; ?> ; background-size: cover;<?php endif; ?>">
<?php if ( !empty($instance['main_title']) || !empty($instance['sub_title']) ):?>
 <div class="grid-container">
   <div class="section-header text-center margin-bottom-3 " >
     <?php if( !empty($instance['title']) ): ?>
       <h2 class="section-title separator-center"  style="color:<?php echo esc_attr($instance['title_color']); ?>;" >
         <?php echo apply_filters('widget_title', $instance['title']); ?>
       </h2>
     <?php endif;?>
     <?php if( !empty($instance['sub_title']) ): ?>
       <div class="section-description">
         <h4 class="subheader" style="color:<?php echo esc_attr($instance['subtitle_color']); ?>;" ><?php echo apply_filters('widget_title', $instance['sub_title']); ?></h4>
       </div>
     <?php endif;?>
   </div><!--section head end-->
 </div><!--row end-->
<?php endif; ?>

        <div class="grid-container">
          <div class="grid-x grid-padding-x grid-margin-y align-center">
          <?php	if (!empty($instance['icon1']) || !empty($instance['title1']) || !empty($instance['text1']) ): ?>
            <div class="cell small-24 medium-12 large-8">
              <div class="content-box content-box-left-icon">
									<?php if (!empty($instance['icon1'])): ?>
                <span class="icon-mobile " style="color:<?php echo esc_attr($instance['icon_color1']); ?>;"><i class="fa <?php echo esc_attr($instance['icon1']); ?> " aria-hidden="true"></i></span>
								<?php endif;?>
								<?php if (!empty($instance['title1'])): ?>
                  <h5 style="color:<?php echo esc_attr($instance['contenttitle_color']); ?>;"><?php echo apply_filters('widget_title', $instance['title1']); ?></h5>
                <?php endif;?>
                <?php if (!empty($instance['text1'])): ?>
                  <p style="color:<?php echo esc_attr($instance['content_color']); ?>;"><?php echo htmlspecialchars_decode(apply_filters('widget_title', $instance['text1'])); ?></p>
                <?php endif;?>
              </div>
            </div>
	        <?php endif; ?>

          <?php	if (!empty($instance['icon2']) || !empty($instance['title2']) || !empty($instance['text2']) ): ?>
            <div class="cell small-24 medium-12 large-8">
              <div class="content-box content-box-left-icon">
								<?php if (!empty($instance['icon2'])): ?>
                <span class="icon-mobile " style="color:<?php echo esc_attr($instance['icon_color2']); ?>;"><i class="fa <?php echo esc_attr($instance['icon2']); ?> " aria-hidden="true"></i></span>
							<?php endif;?>
							  <?php if (!empty($instance['title2'])): ?>
                  <h5 style="color:<?php echo esc_attr($instance['contenttitle_color']); ?>;"><?php echo apply_filters('widget_title', $instance['title2']); ?></h5>
                <?php endif;?>
                <?php if (!empty($instance['text2'])): ?>
                  <p style="color:<?php echo esc_attr($instance['content_color']); ?>;"><?php echo htmlspecialchars_decode(apply_filters('widget_title', $instance['text2'])); ?></p>
                <?php endif;?>
              </div>
            </div>
	        <?php endif; ?>
          <?php	if (!empty($instance['icon3']) || !empty($instance['title3']) || !empty($instance['text3']) ): ?>
            <div class="cell small-24 medium-12 large-8">
              <div class="content-box content-box-left-icon ">
								<?php if (!empty($instance['icon3'])): ?>
                <span class="icon-mobile " style="color:<?php echo esc_attr($instance['icon_color3']); ?>;"><i class="fa <?php echo esc_attr($instance['icon3']); ?> " aria-hidden="true"></i></span>
								<?php endif;?>
							  <?php if (!empty($instance['title3'])): ?>
                  <h5 style="color:<?php echo esc_attr($instance['contenttitle_color']); ?>;"><?php echo apply_filters('widget_title', $instance['title3']); ?></h5>
                <?php endif;?>
                <?php if (!empty($instance['text3'])): ?>
                  <p style="color:<?php echo esc_attr($instance['content_color']); ?>;"><?php echo htmlspecialchars_decode(apply_filters('widget_title', $instance['text3'])); ?></p>
                <?php endif;?>
              </div>
            </div>
	        <?php endif; ?>
          <?php	if (!empty($instance['icon4']) || !empty($instance['title4']) || !empty($instance['text4']) ): ?>
            <div class="cell small-24 medium-12 large-8">
              <div class="content-box content-box-left-icon ">
								<?php if (!empty($instance['icon4'])): ?>
                <span class="icon-mobile " style="color:<?php echo esc_attr($instance['icon_color4']); ?>;"><i class="fa <?php echo esc_attr($instance['icon4']); ?> " aria-hidden="true"></i></span>
							<?php endif;?>
							  <?php if (!empty($instance['title4'])): ?>
                  <h5 style="color:<?php echo esc_attr($instance['contenttitle_color']); ?>;"><?php echo apply_filters('widget_title', $instance['title4']); ?></h5>
                <?php endif;?>
                <?php if (!empty($instance['text4'])): ?>
                  <p style="color:<?php echo esc_attr($instance['content_color']); ?>;"><?php echo htmlspecialchars_decode(apply_filters('widget_title', $instance['text4'])); ?></p>
                <?php endif;?>
              </div>
            </div>
	        <?php endif; ?>
          <?php	if (!empty($instance['icon5']) || !empty($instance['title5']) || !empty($instance['text5']) ): ?>
            <div class="cell small-24 medium-12 large-8">
              <div class="content-box content-box-left-icon ">
								<?php if (!empty($instance['icon5'])): ?>
                <span class="icon-mobile " style="color:<?php echo esc_attr($instance['icon_color5']); ?>;"><i class="fa <?php echo esc_attr($instance['icon5']); ?> " aria-hidden="true"></i></span>
							<?php endif;?>
								<?php if (!empty($instance['title5'])): ?>
                  <h5 style="color:<?php echo esc_attr($instance['contenttitle_color']); ?>;"><?php echo apply_filters('widget_title', $instance['title5']); ?></h5>
                <?php endif;?>
                <?php if (!empty($instance['text5'])): ?>
                  <p style="color:<?php echo esc_attr($instance['content_color']); ?>;"><?php echo htmlspecialchars_decode(apply_filters('widget_title', $instance['text5'])); ?></p>
                <?php endif;?>
              </div>
            </div>
	        <?php endif; ?>
          <?php	if (!empty($instance['icon6']) || !empty($instance['title6']) || !empty($instance['text6']) ): ?>
            <div class="cell small-24 medium-12 large-8">
              <div class="content-box content-box-left-icon ">
								<?php if (!empty($instance['icon6'])): ?>
                <span class="icon-mobile " style="color:<?php echo esc_attr($instance['icon_color6']); ?>;"><i class="fa <?php echo esc_attr($instance['icon6']); ?> " aria-hidden="true"></i></span>
								<?php endif;?>
								<?php if (!empty($instance['title6'])): ?>
                  <h5 style="color:<?php echo esc_attr($instance['contenttitle_color']); ?>;"><?php echo apply_filters('widget_title', $instance['title6']); ?></h5>
                <?php endif;?>
                <?php if (!empty($instance['text6'])): ?>
                  <p style="color:<?php echo esc_attr($instance['content_color']); ?>;"><?php echo htmlspecialchars_decode(apply_filters('widget_title', $instance['text6'])); ?></p>
                <?php endif;?>
              </div>
            </div>
	        <?php endif; ?>

  </div>
        </div>
</div>

<?php
        echo $after_widget;


    }

    function update($new_instance, $old_instance) {

        $instance = $old_instance;

		/*section title */
				$instance['title'] = strip_tags($new_instance['title']);
				$instance['sub_title'] = strip_tags($new_instance['sub_title']);
		/*Box 1 */
        $instance['icon1'] = strip_tags( $new_instance['icon1'] );
				$instance['icon_color1'] = strip_tags($new_instance['icon_color1']);
        $instance['title1'] = strip_tags($new_instance['title1']);
				$instance['text1'] = stripslashes(wp_filter_post_kses($new_instance['text1']));

		/*Box 2 */
        $instance['icon2'] = strip_tags( $new_instance['icon2'] );
				$instance['icon_color2'] = strip_tags($new_instance['icon_color2']);
        $instance['title2'] = strip_tags($new_instance['title2']);
				$instance['text2'] = stripslashes(wp_filter_post_kses($new_instance['text2']));


		/*Box 3 */
        $instance['icon3'] = strip_tags( $new_instance['icon3'] );
				$instance['icon_color3'] = strip_tags($new_instance['icon_color3']);
        $instance['title3'] = strip_tags($new_instance['title3']);
				$instance['text3'] = stripslashes(wp_filter_post_kses($new_instance['text3']));

    /*Box 4 */
        $instance['icon4'] = strip_tags( $new_instance['icon4'] );
    		$instance['icon_color4'] = strip_tags($new_instance['icon_color4']);
        $instance['title4'] = strip_tags($new_instance['title4']);
    		$instance['text4'] = stripslashes(wp_filter_post_kses($new_instance['text4']));
    /*Box 5 */
        $instance['icon5'] = strip_tags( $new_instance['icon5'] );
        $instance['icon_color5'] = strip_tags($new_instance['icon_color5']);
        $instance['title5'] = strip_tags($new_instance['title5']);
        $instance['text5'] = stripslashes(wp_filter_post_kses($new_instance['text5']));
    /*Box 6 */
        $instance['icon6'] = strip_tags( $new_instance['icon6'] );
        $instance['icon_color6'] = strip_tags($new_instance['icon_color6']);
        $instance['title6'] = strip_tags($new_instance['title6']);
        $instance['text6'] = stripslashes(wp_filter_post_kses($new_instance['text6']));

        //* color setup *//

        $instance['title_color'] = strip_tags($new_instance['title_color']);
        $instance['subtitle_color'] = strip_tags($new_instance['subtitle_color']);
        $instance['bg_color'] = strip_tags($new_instance['bg_color']);
        $instance['content_color'] = strip_tags($new_instance['content_color']);
        $instance['contenttitle_color'] = strip_tags($new_instance['contenttitle_color']);
        $instance['content_bgimage'] = strip_tags($new_instance['content_bgimage']);
        $instance['fixed_bg'] = isset( $new_instance['fixed_bg'] ) ? (bool) $new_instance['fixed_bg'] : false;

        return $instance;

    }

    function form($instance) {
      /* Set up some default widget settings. */
      $instance = wp_parse_args((array) $instance, $this->defaults);

     $fixed_bg = isset( $instance['fixed_bg'] ) ? (bool) $instance['fixed_bg'] : false;
     ?>
	<p>
			 <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e(' Title', 'aazeen-extension'); ?></label>
			 <input type="text" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php if( !empty($instance['title']) ): echo $instance['title']; endif; ?>" class="widefat">
	 </p>

	 <p>
			 <label for="<?php echo $this->get_field_id('sub_title'); ?>"><?php _e('Sub Title', 'aazeen-extension'); ?></label>
			 <input type="text" name="<?php echo $this->get_field_name('sub_title'); ?>" id="<?php echo $this->get_field_id('sub_title'); ?>" value="<?php if( !empty($instance['sub_title']) ): echo $instance['sub_title']; endif; ?>" class="widefat">
	 </p>
   <p>
     <label for="<?php echo $this->get_field_id( 'title_color' ); ?>" class="icon-color"><?php _e('Title Color', 'aazeen-extension') ?></label>
     <input class="widefat color-picker" id="<?php echo $this->get_field_id( 'title_color' ); ?>" name="<?php echo $this->get_field_name( 'title_color' ); ?>" value="<?php echo $instance['title_color']; ?>" type="text" />
   </p>
   <p>
     <label for="<?php echo $this->get_field_id( 'subtitle_color' ); ?>" class="icon-color"><?php _e('Sub Title Color', 'aazeen-extension') ?></label>
     <input class="widefat color-picker" id="<?php echo $this->get_field_id( 'subtitle_color' ); ?>" name="<?php echo $this->get_field_name( 'subtitle_color' ); ?>" value="<?php echo $instance['subtitle_color']; ?>" type="text" />
   </p>

         <h5><?php _e('For font-awesome icon visit ', 'aazeen-extension') ?><a href="<?php echo esc_url('https://fortawesome.github.io/Font-Awesome/icons/');?>"><?php _e('font-awesome','aazeen-extension')?></a></h5>
        <!--BLOCK 1 START-->
        <div class="block_accordion">
          <h4> <?php _e('Block 1', 'aazeen-extension') ?></h4>
          <div class="block_acc_wrap">
        <p>
          <script type="text/javascript">
          /* global suffice_enhanced_select_params */
          jQuery( document ).ready( function( $ ) {

          	function getEnhancedSelectFormatStrings() {
          		var formatString = {
          			formatMatches: function( matches ) {
          				if ( 1 === matches ) {
          					return suffice_enhanced_select_params.i18n_matches_1;
          				}

          				return suffice_enhanced_select_params.i18n_matches_n.replace( '%qty%', matches );
          			},
          			formatNoMatches: function() {
          				return suffice_enhanced_select_params.i18n_no_matches;
          			},
          			formatAjaxError: function() {
          				return suffice_enhanced_select_params.i18n_ajax_error;
          			},
          			formatInputTooShort: function( input, min ) {
          				var number = min - input.length;

          				if ( 1 === number ) {
          					return suffice_enhanced_select_params.i18n_input_too_short_1;
          				}

          				return suffice_enhanced_select_params.i18n_input_too_short_n.replace( '%qty%', number );
          			},
          			formatInputTooLong: function( input, max ) {
          				var number = input.length - max;

          				if ( 1 === number ) {
          					return suffice_enhanced_select_params.i18n_input_too_long_1;
          				}

          				return suffice_enhanced_select_params.i18n_input_too_long_n.replace( '%qty%', number );
          			},
          			formatSelectionTooBig: function( limit ) {
          				if ( 1 === limit ) {
          					return suffice_enhanced_select_params.i18n_selection_too_long_1;
          				}

          				return suffice_enhanced_select_params.i18n_selection_too_long_n.replace( '%qty%', limit );
          			},
          			formatLoadMore: function() {
          				return suffice_enhanced_select_params.i18n_load_more;
          			},
          			formatSearching: function() {
          				return suffice_enhanced_select_params.i18n_searching;
          			}
          		};

          		return formatString;
          	}

          	function getEnhancedSelectFormatResult( icon ) {
          		if ( icon.id && $( icon.element ).data( 'icon' ) ) {
          			return '<i class="fa ' + $( icon.element ).data( 'icon' ) + '"></i> ' + icon.text;
          		}

          		return icon.text;
          	}

          	$( document.body ).on( 'suffice-enhanced-select-init', function() {

          			// Icon Picker
          			$( ':input.suffice-enhanced-select-icons' ).filter( ':not(.enhanced)' ).each( function() {
          				var select2_args = $.extend({
          					minimumResultsForSearch: 10,
          					allowClear:  true,
                         escapeMarkup: function (m) {return m;},
          					placeholder: $( this ).data( 'placeholder' ),
          					templateResult: getEnhancedSelectFormatResult
          				}, getEnhancedSelectFormatStrings() );

          				$( this ).select2( select2_args ).addClass( 'enhanced' );
          			});
          		})
          		.trigger( 'suffice-enhanced-select-init' );

          });


             </script>

            <?php
            $variants=aazeen_ex_font_awesome_list();
            ?>
            <div id="tg-widget-icon-picker" class="suffice-icon enhanced">
            <label for="<?php echo $this->get_field_id('icon1'); ?>"><?php _e('Icon', 'aazeen-extension') ?></label>
            <select id="<?php echo $this->get_field_id('icon1'); ?>" name="<?php echo $this->get_field_name('icon1'); ?>" class="widefat suffice-enhanced-select-icons" data-placeholder="<?php esc_attr_e( 'Choose icons&hellip;', 'suffice-toolkit' ); ?>">
              <option value=""></option>
            <?php
            foreach($variants as $key => $value):?>
            <option value="<?php echo $key ;?>" <?php if ( $key == $instance['icon1'] ) echo 'selected="selected"'; ?> data-icon="<?php echo esc_attr( $key ); ?>"> <?php echo $value ;?></option>
            <?php endforeach;?>
            </select>
          </div>


					<p>
				<label for="<?php echo $this->get_field_id( 'icon_color1' ); ?>" class="icon-color"><?php _e('Icon Color', 'aazeen-extension') ?></label>
				<input class="widefat color-picker" id="<?php echo $this->get_field_id( 'icon_color1' ); ?>" name="<?php echo $this->get_field_name( 'icon_color1' ); ?>" value="<?php echo $instance['icon_color1']; ?>" type="text" />
			</p>


        <p>
            <label for="<?php echo $this->get_field_id('title1'); ?>"><?php _e('Title', 'aazeen-extension'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('title1'); ?>" id="<?php echo $this->get_field_id('title1'); ?>" value="<?php if( !empty($instance['title1']) ): echo $instance['title1']; endif; ?>" class="widefat">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('text1'); ?>"><?php _e('Text', 'aazeen-extension'); ?></label>
            <textarea class="widefat" rows="8" cols="20" name="<?php echo $this->get_field_name('text1'); ?>" id="<?php echo $this->get_field_id('text1'); ?>"><?php if( !empty($instance['text1']) ): echo htmlspecialchars_decode($instance['text1']); endif; ?></textarea>
        </p>

    </div>
  </div>


         <!--BLOCK 2 START-->
         <div class="block_accordion">
           <h4> <?php _e('Block 2', 'aazeen-extension') ?></h4>
           <div class="block_acc_wrap">
        <div id="tg-widget-icon-picker" class="suffice-icon enhanced">
        <label for="<?php echo $this->get_field_id('icon2'); ?>"><?php _e('Icon', 'aazeen-extension') ?></label>
        <select id="<?php echo $this->get_field_id('icon2'); ?>" name="<?php echo $this->get_field_name('icon2'); ?>" class="widefat suffice-enhanced-select-icons" data-placeholder="<?php esc_attr_e( 'Choose icons&hellip;', 'suffice-toolkit' ); ?>">
          <option value=""></option>
        <?php
        foreach($variants as $key => $value):?>
        <option value="<?php echo $key ;?>" <?php if ( $key == $instance['icon2'] ) echo 'selected="selected"'; ?> data-icon="<?php echo esc_attr( $key ); ?>"> <?php echo $value ;?></option>
        <?php endforeach;?>
        </select>
      </div>

				<p>
			<label for="<?php echo $this->get_field_id( 'icon_color2' ); ?>" class="icon-color"><?php _e('Icon Color', 'aazeen-extension') ?></label>
			<input class="widefat color-picker" id="<?php echo $this->get_field_id( 'icon_color2' ); ?>" name="<?php echo $this->get_field_name( 'icon_color2' ); ?>" value="<?php echo $instance['icon_color2']; ?>" type="text" />
				</p>
	      <p>
            <label for="<?php echo $this->get_field_id('title2'); ?>"><?php _e('Title', 'aazeen-extension'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('title2'); ?>" id="<?php echo $this->get_field_id('title2'); ?>" value="<?php if( !empty($instance['title2']) ): echo $instance['title2']; endif; ?>" class="widefat">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('text2'); ?>"><?php _e('Text', 'aazeen-extension'); ?></label>
            <textarea class="widefat" rows="8" cols="20" name="<?php echo $this->get_field_name('text2'); ?>" id="<?php echo $this->get_field_id('text2'); ?>"><?php if( !empty($instance['text2']) ): echo htmlspecialchars_decode($instance['text2']); endif; ?></textarea>
        </p>

      </div>
    </div>

         <!--BLOCK 3 START-->
         <div class="block_accordion">
           <h4> <?php _e('Block 3', 'aazeen-extension') ?></h4>
           <div class="block_acc_wrap">

             <div id="tg-widget-icon-picker" class="suffice-icon enhanced">
             <label for="<?php echo $this->get_field_id('icon3'); ?>"><?php _e('Icon', 'aazeen-extension') ?></label>
             <select id="<?php echo $this->get_field_id('icon3'); ?>" name="<?php echo $this->get_field_name('icon3'); ?>" class="widefat suffice-enhanced-select-icons" data-placeholder="<?php esc_attr_e( 'Choose icons&hellip;', 'suffice-toolkit' ); ?>">
               <option value=""></option>
             <?php
             foreach($variants as $key => $value):?>
             <option value="<?php echo $key ;?>" <?php if ( $key == $instance['icon3'] ) echo 'selected="selected"'; ?> data-icon="<?php echo esc_attr( $key ); ?>"> <?php echo $value ;?></option>
             <?php endforeach;?>
             </select>
           </div>

					<p>
				<label for="<?php echo $this->get_field_id( 'icon_color3' ); ?>" class="icon-color"><?php _e('Icon Color', 'aazeen-extension') ?></label>
				<input class="widefat color-picker" id="<?php echo $this->get_field_id( 'icon_color3' ); ?>" name="<?php echo $this->get_field_name( 'icon_color3' ); ?>" value="<?php echo $instance['icon_color3']; ?>" type="text" />
					</p>

          <p>
            <label for="<?php echo $this->get_field_id('title3'); ?>"><?php _e('Title', 'aazeen-extension'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('title3'); ?>" id="<?php echo $this->get_field_id('title3'); ?>" value="<?php if( !empty($instance['title3']) ): echo $instance['title3']; endif; ?>" class="widefat">
        	</p>


        <p>
            <label for="<?php echo $this->get_field_id('text3'); ?>"><?php _e('Text', 'aazeen-extension'); ?></label>
            <textarea class="widefat" rows="8" cols="20" name="<?php echo $this->get_field_name('text3'); ?>" id="<?php echo $this->get_field_id('text3'); ?>"><?php if( !empty($instance['text3']) ): echo htmlspecialchars_decode($instance['text3']); endif; ?></textarea>
        </p>

      </div>
    </div>
      <!--BLOCK 4 START-->
      <div class="block_accordion">
        <h4> <?php _e('Block 4', 'aazeen-extension') ?></h4>
        <div class="block_acc_wrap">
          <div id="tg-widget-icon-picker" class="suffice-icon enhanced">
          <label for="<?php echo $this->get_field_id('icon4'); ?>"><?php _e('Icon', 'aazeen-extension') ?></label>
          <select id="<?php echo $this->get_field_id('icon4'); ?>" name="<?php echo $this->get_field_name('icon4'); ?>" class="widefat suffice-enhanced-select-icons" data-placeholder="<?php esc_attr_e( 'Choose icons&hellip;', 'suffice-toolkit' ); ?>">
            <option value=""></option>
          <?php
          foreach($variants as $key => $value):?>
          <option value="<?php echo $key ;?>" <?php if ( $key == $instance['icon4'] ) echo 'selected="selected"'; ?> data-icon="<?php echo esc_attr( $key ); ?>"> <?php echo $value ;?></option>
          <?php endforeach;?>
          </select>
        </div>
       <p>
     <label for="<?php echo $this->get_field_id( 'icon_color4' ); ?>" class="icon-color"><?php _e('Icon Color', 'aazeen-extension') ?></label>
     <input class="widefat color-picker" id="<?php echo $this->get_field_id( 'icon_color4' ); ?>" name="<?php echo $this->get_field_name( 'icon_color4' ); ?>" value="<?php echo $instance['icon_color4']; ?>" type="text" />
       </p>

       <p>
         <label for="<?php echo $this->get_field_id('title4'); ?>"><?php _e('Title', 'aazeen-extension'); ?></label>
         <input type="text" name="<?php echo $this->get_field_name('title4'); ?>" id="<?php echo $this->get_field_id('title4'); ?>" value="<?php if( !empty($instance['title4']) ): echo $instance['title4']; endif; ?>" class="widefat">
       </p>


     <p>
         <label for="<?php echo $this->get_field_id('text4'); ?>"><?php _e('Text', 'aazeen-extension'); ?></label>
         <textarea class="widefat" rows="8" cols="20" name="<?php echo $this->get_field_name('text4'); ?>" id="<?php echo $this->get_field_id('text4'); ?>"><?php if( !empty($instance['text4']) ): echo htmlspecialchars_decode($instance['text4']); endif; ?></textarea>
     </p>

   </div>
</div>

   <!--BLOCK 5 START-->
   <div class="block_accordion">
     <h4> <?php _e('Block 5', 'aazeen-extension') ?></h4>
     <div class="block_acc_wrap">
         <div id="tg-widget-icon-picker" class="suffice-icon enhanced">
         <label for="<?php echo $this->get_field_id('icon5'); ?>"><?php _e('Icon', 'aazeen-extension') ?></label>
         <select id="<?php echo $this->get_field_id('icon5'); ?>" name="<?php echo $this->get_field_name('icon5'); ?>" class="widefat suffice-enhanced-select-icons" data-placeholder="<?php esc_attr_e( 'Choose icons&hellip;', 'suffice-toolkit' ); ?>">
           <option value=""></option>
         <?php
         foreach($variants as $key => $value):?>
         <option value="<?php echo $key ;?>" <?php if ( $key == $instance['icon5'] ) echo 'selected="selected"'; ?> data-icon="<?php echo esc_attr( $key ); ?>"> <?php echo $value ;?></option>
         <?php endforeach;?>
         </select>
       </div>
   <p>
 <label for="<?php echo $this->get_field_id( 'icon_color5' ); ?>" class="icon-color"><?php _e('Icon Color', 'aazeen-extension') ?></label>
 <input class="widefat color-picker" id="<?php echo $this->get_field_id( 'icon_color5' ); ?>" name="<?php echo $this->get_field_name( 'icon_color5' ); ?>" value="<?php echo $instance['icon_color5']; ?>" type="text" />
   </p>

    <p>
      <label for="<?php echo $this->get_field_id('title5'); ?>"><?php _e('Title', 'aazeen-extension'); ?></label>
      <input type="text" name="<?php echo $this->get_field_name('title5'); ?>" id="<?php echo $this->get_field_id('title5'); ?>" value="<?php if( !empty($instance['title5']) ): echo $instance['title5']; endif; ?>" class="widefat">
   </p>


  <p>
      <label for="<?php echo $this->get_field_id('text5'); ?>"><?php _e('Text', 'aazeen-extension'); ?></label>
      <textarea class="widefat" rows="8" cols="20" name="<?php echo $this->get_field_name('text5'); ?>" id="<?php echo $this->get_field_id('text5'); ?>"><?php if( !empty($instance['text5']) ): echo htmlspecialchars_decode($instance['text5']); endif; ?></textarea>
  </p>

</div>
</div>

<!--BLOCK 6 START-->
<div class="block_accordion">
  <h4> <?php _e('Block 6', 'aazeen-extension') ?></h4>
  <div class="block_acc_wrap">
    <div id="tg-widget-icon-picker" class="suffice-icon enhanced">
    <label for="<?php echo $this->get_field_id('icon6'); ?>"><?php _e('Icon', 'aazeen-extension') ?></label>
    <select id="<?php echo $this->get_field_id('icon6'); ?>" name="<?php echo $this->get_field_name('icon6'); ?>" class="widefat suffice-enhanced-select-icons" data-placeholder="<?php esc_attr_e( 'Choose icons&hellip;', 'suffice-toolkit' ); ?>">
      <option value=""></option>
    <?php
    foreach($variants as $key => $value):?>
    <option value="<?php echo $key ;?>" <?php if ( $key == $instance['icon6'] ) echo 'selected="selected"'; ?> data-icon="<?php echo esc_attr( $key ); ?>"> <?php echo $value ;?></option>
    <?php endforeach;?>
    </select>
  </div>
 <p>
<label for="<?php echo $this->get_field_id( 'icon_color6' ); ?>" class="icon-color"><?php _e('Icon Color', 'aazeen-extension') ?></label>
<input class="widefat color-picker" id="<?php echo $this->get_field_id( 'icon_color6' ); ?>" name="<?php echo $this->get_field_name( 'icon_color6' ); ?>" value="<?php echo $instance['icon_color6']; ?>" type="text" />
 </p>

 <p>
   <label for="<?php echo $this->get_field_id('title6'); ?>"><?php _e('Title', 'aazeen-extension'); ?></label>
   <input type="text" name="<?php echo $this->get_field_name('title6'); ?>" id="<?php echo $this->get_field_id('title6'); ?>" value="<?php if( !empty($instance['title6']) ): echo $instance['title6']; endif; ?>" class="widefat">
 </p>


<p>
   <label for="<?php echo $this->get_field_id('text6'); ?>"><?php _e('Text', 'aazeen-extension'); ?></label>
   <textarea class="widefat" rows="8" cols="20" name="<?php echo $this->get_field_name('text6'); ?>" id="<?php echo $this->get_field_id('text6'); ?>"><?php if( !empty($instance['text6']) ): echo htmlspecialchars_decode($instance['text6']); endif; ?></textarea>
</p>

</div>
</div> <!---end accordino---->
<div class="block_accordion">
  <h4> <?php _e('Settings', 'aazeen-extension') ?></h4>
  <div class="block_acc_wrap">
<p>
  <label for="<?php echo $this->get_field_id( 'contenttitle_color' ); ?>" class="icon-color"><?php _e('Content Title Color', 'aazeen-extension') ?></label>
  <input class="widefat color-picker" id="<?php echo $this->get_field_id( 'contenttitle_color' ); ?>" name="<?php echo $this->get_field_name( 'contenttitle_color' ); ?>" value="<?php echo $instance['contenttitle_color']; ?>" type="text" />
</p>
<p>
  <label for="<?php echo $this->get_field_id( 'content_color' ); ?>" class="icon-color"><?php _e('Content Color', 'aazeen-extension') ?></label>
  <input class="widefat color-picker" id="<?php echo $this->get_field_id( 'content_color' ); ?>" name="<?php echo $this->get_field_name( 'content_color' ); ?>" value="<?php echo $instance['content_color']; ?>" type="text" />
</p>
<p>
  <label for="<?php echo $this->get_field_id( 'bg_color' ); ?>" class="icon-color"><?php _e('Background Color', 'aazeen-extension') ?></label>
  <input class="widefat color-picker" id="<?php echo $this->get_field_id( 'bg_color' ); ?>" name="<?php echo $this->get_field_name( 'bg_color' ); ?>" value="<?php echo $instance['bg_color']; ?>" type="text" />
</p>
<p>
  <div class="widget_input_wrap">
      <label for="<?php echo $this->get_field_id( 'content_bgimage' ); ?>"><?php _e('Background Image ', 'aazeen-extension') ?></label>
      <div class="media-picker-wrap">
      <?php if(!empty($instance['content_bgimage'])) { ?>
          <img style="max-width:100%; height:auto;" class="media-picker-preview" src="<?php echo esc_url($instance['content_bgimage']); ?>" />
          <i class="fa fa-times media-picker-remove"></i>
      <?php } ?>

      <input class="widefat media-picker" id="<?php echo $this->get_field_id( 'content_bgimage' ); ?>" name="<?php echo $this->get_field_name( 'content_bgimage' ); ?>" value="<?php if( !empty($instance['content_bgimage']) ): echo $instance['content_bgimage']; endif; ?>" type="hidden" />
      <a class="media-picker-button button" onclick="mediaPicker(this.id)" id="<?php echo $this->get_field_id( 'content_bgimage' ).'mpick'; ?>"><?php _e('Select Image', 'aazeen-extension') ?></a>
      </div>
  </div>
</p>
<!-- About Content TITLE DIVIDER Field -->
<p><input class="checkbox" type="checkbox"<?php checked( $fixed_bg ); ?> id="<?php echo $this->get_field_id( 'fixed_bg' ); ?>" name="<?php echo $this->get_field_name( 'fixed_bg' ); ?>" />
<label for="<?php echo $this->get_field_id( 'fixed_bg' ); ?>"><?php _e( 'background image fixed', 'aazeen-extension' ); ?></label></p>
</div>
</div>

 <?php
	}
		//ENQUEUE CSS
   }
}

// register aazeen_ex dual category posts widget
function aazeen_ex_feature_widget() {
    register_widget( 'aazeen_feature_widget' );
}
add_action( 'widgets_init', 'aazeen_ex_feature_widget' );
