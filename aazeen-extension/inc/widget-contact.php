<?php
/**
 * Contact Widget
 *
 * @since 1.0.0
 *
 * @package Aazeen extension
 */
 if ( !class_exists( 'aazeen_contact_widget' ) ) {

    class aazeen_contact_widget extends WP_Widget {

  		public function __construct() {
        $widget_ops = array(
          'classname' => 'aazeen_contact_widget aazeen_widgtes',
          'description' => __( 'You can add use this widgte in any section or page', 'aazeen-extension' ),
          'customize_selective_refresh' => true,
        );
        parent::__construct( 'aazeen_contact_widget', __( 'Aazeen - Contact widget', 'aazeen-extension' ), $widget_ops );
        $this->alt_option_name = 'aazeen_contact_widget';
        include "default.php";
        $this->defaults = $defaults_contact_widget;

  		}


 		/**
 		 * Display Widget
 		 *
 		 * @param $args
 		 * @param $instance
 		 */
 		 function widget($args, $instance) {

         $bg_color = isset( $instance['bg_color'] ) ? $instance['bg_color'] : 'gradient_12';
         $tex_color = isset( $instance['tex_color'] ) ? $instance['tex_color'] : '#fff';
         $icon_color = isset( $instance['icon_color'] ) ? $instance['icon_color'] : '#fff';
         $contactbody_color = isset( $instance['contactbody_color'] ) ? $instance['contactbody_color'] : '#fff';
         $contactbody_headcolor = isset( $instance['contactbody_headcolor'] ) ? $instance['contactbody_headcolor'] : '#21c2f8';
         $content_bgimage = isset( $instance['content_bgimage'] ) ? $instance['content_bgimage'] : '';
         $fixed_bg = isset( $instance['fixed_bg'] ) ? $instance['fixed_bg'] : false;
         $widget_text = ! empty( $instance['form_sort'] ) ? $instance['form_sort'] : '';
         $text = apply_filters( 'widget_text', $widget_text, $instance, $this );
         extract($args);
         $instance = wp_parse_args((array) $instance, $this->defaults);

 				 echo $before_widget;
 				 ?>
         <?php $id= $this->id;
         /*=============================================>>>>>
         = Color calculation =
         ===============================================>>>>>*/

         if ( 225 > ariColor::newColor( $contactbody_headcolor )->luminance ) {
         // Our background color is dark, so we need to create a light text color.
         $head_text_color = Kirki_Color::adjust_brightness( $contactbody_headcolor, 225 );
         } else {

         // Our background color is light, so we need to create a dark text color
         $head_text_color = Kirki_Color::adjust_brightness( $contactbody_headcolor, -225 );

         }
         $head_text_color = esc_attr( $head_text_color );

         if ( 225 > ariColor::newColor( $contactbody_color )->luminance ) {
         // Our background color is dark, so we need to create a light text color.
         $body_text_color  = Kirki_Color::adjust_brightness( $contactbody_color, 225 );
         } else {

         // Our background color is light, so we need to create a dark text color
         $body_text_color = Kirki_Color::adjust_brightness( $contactbody_color, -225 );

         }
         $body_text_color = esc_attr( $body_text_color );

         /*  Color calculation for text */

         //Stylesheet-loaded in Customizer Only.
          echo "<style> #".$id." .contact-body h1,
            #".$id." .contact-body h1 small,
            #".$id." .contact-body h5,
            #".$id." .contact-body p
          {
            color: $tex_color !important;
          }
          #".$id." .card.card-contact
          {
            background-color: $contactbody_color ;
          }
          #".$id." .card-contact .card-header
          {
            background: $contactbody_headcolor ;
          }
          #".$id." .card-contact .card-body label input:focus

         {
           border-bottom-color: $contactbody_headcolor ;
         }
         #".$id." .card-contact .card-header .card-title,
         .card-contact .card-header small
         {
          color: $head_text_color ;
         }
         #".$id." .card-contact .card-body label,
         #".$id." .card-contact .card-body label input
         {
          color: $body_text_color ;
         }
         #".$id." .card-contact .card-header
       {
         box-shadow: 0 5px 20px 0 rgba(0,0,0,.2),0 13px 24px -11px ". Kirki_Color::get_rgba($contactbody_headcolor, .6) ." ;
       }
          </style>"
         ;

           ?>
  			 <style>
          #<?php echo $id;?> .contact-body i{color:<?php echo esc_attr($icon_color); ?>;}
  			 </style>
         <?php echo '<span class="so_widget_id" data-panel-id="'.$this->id.'"></span>';?>
        <div class="contact-aazeen padding-vertical-2 <?php echo $bg_color; ?>"  style="<?php if (!empty($content_bgimage)): ?> background:url(<?php echo $content_bgimage ;?>) no-repeat <?php if ( $fixed_bg ) : ?> fixed <?php endif; ?> ; background-size: cover;background-position: 50%;<?php endif; ?>">
          <div class="grid-container">
            <div class="grid-x grid-padding-x">
          <div class="large-12 small-24 cell contact-body">
            <div class="grid-x grid-padding-x grid-margin-y">
              <!-- title start -->
              <div class="small-24 cell">
                <?php if ( !empty($instance['main_title']) || !empty($instance['sub_title']) ):?>
                  <h1 >
                    <?php if( !empty($instance['main_title']) ): ?>
                      <small class="color-light" > <?php echo apply_filters('widget_title', $instance['main_title']); ?></br></small>
                    <?php endif;?>
                  </h1>
                <p>
                  <?php echo esc_attr($instance['sub_title']); ?>
                </p>
                <?php endif;?>
              </div>
              <?php if ( !empty($instance['address_t']) || !empty($instance['address']) ):?>
                <div class="small-24 cell ">
                  <i class="fa fa-map-o " aria-hidden="true" ></i>
                  <?php if( !empty($instance['address_t']) ): ?>
                    <h5  ><strong><?php echo $instance['address_t']; ?></strong></h5>
                  <?php endif;?>
                  <?php if( !empty($instance['address']) ): ?>
                      <p ><?php echo $instance['address']; ?></p>
                  <?php endif;?>
                </div>
              <?php endif;?>

              <!-- title end -->
              <!-- contact info start -->
              <div class="contact-text small-24 cell ">
                <div class="grid-x grid-padding-x grid-margin-y">
                <?php if ( !empty($instance['Phone_t']) || !empty($instance['Phone']) ):?>
                  <div class="large-12 small-12 cell">
                    <i class="fa fa-phone-square " aria-hidden="true" ></i>
                    <?php if( !empty($instance['Phone_t']) ): ?> <h5 ><strong><?php echo $instance['Phone_t']; ?></strong></h5>  <?php endif;?>
                    <?php if( !empty($instance['Phone']) ): ?><p ><?php echo $instance['Phone']; ?></p><?php endif;?>
                  </div>
                <?php endif;?>

                <?php if ( !empty($instance['email_t']) || !empty($instance['email']) ):?>
                  <div class="large-12 small-12 cell">
                    <i class="fa fa-address-book-o " aria-hidden="true" ></i>
                    <?php if( !empty($instance['email_t']) ): ?> <h5 ><strong><?php echo $instance['email_t']; ?></strong></h5>  <?php endif;?>
                    <?php if( !empty($instance['email']) ): ?><p ><?php echo $instance['email']; ?></p><?php endif;?>
                  </div>
                <?php endif;?>
              </div>
              </div>
              <!-- contact info end -->

            </div><!-- row left end -->
          </div><!-- col left end -->
          <div class="large-12 small-24 cell">
            <div class="card card-contact">
          <div class="card-header card-header-raised card-header-primary text-center">
              <h4 class="card-title">
                <?php if( !empty($instance['form_title']) ): ?>  <?php echo $instance['form_title']; ?></br>  <?php endif;?>
              </h4>
              <?php if( !empty($instance['form_sub']) ): ?> <small ><?php echo $instance['form_sub']; ?></small><?php endif;?>
          </div>
          <div class="card-body">
            <?php echo  wpautop( $text ) ; ?>
          </div><!-- div contact end -->
          </div>
          </div><!-- col end -->
        </div><!-- row end -->
        </div>
        </div>
  <?php
    echo $after_widget;
  }
  function update($new_instance, $old_instance) {
    $instance = $old_instance;

      /*section title */
      $instance['main_title'] = strip_tags($new_instance['main_title']);
      $instance['sub_title'] = strip_tags($new_instance['sub_title']);

      /*address*/
      $instance['address_t'] = strip_tags( $new_instance['address_t'] );
      $instance['address'] = stripslashes(wp_filter_post_kses($new_instance['address']));
      /*Phone*/
      $instance['Phone_t'] = strip_tags( $new_instance['Phone_t'] );
      $instance['Phone'] = strip_tags( $new_instance['Phone'] );
      /*email*/
      $instance['email_t'] = strip_tags( $new_instance['email_t'] );
      $instance['email'] = strip_tags( $new_instance['email'] );

      /*contact form */
      $instance['form_title'] = strip_tags($new_instance['form_title']);
      $instance['form_sub'] = strip_tags($new_instance['form_sub']);
      if ( current_user_can( 'unfiltered_html' ) ) {
        $instance['form_sort'] = $new_instance['form_sort'];
      } else {
        $instance['form_sort'] = wp_kses_post( $new_instance['form_sort'] );
      }
      $instance['background_style'] = wp_kses_post( $new_instance['background_style'] );

      $instance['bg_color'] = strip_tags($new_instance['bg_color']);
      $instance['content_bgimage'] = strip_tags($new_instance['content_bgimage']);

      $instance['fixed_bg'] = isset( $new_instance['fixed_bg'] ) ? (bool) $new_instance['fixed_bg'] : false;
      //color
      $instance['tex_color'] = sanitize_hex_color($new_instance['tex_color']);
      $instance['icon_color'] = sanitize_hex_color($new_instance['icon_color']);

      $instance['contactbody_color'] = sanitize_hex_color($new_instance['contactbody_color']);
      $instance['contactbody_headcolor'] = sanitize_hex_color($new_instance['contactbody_headcolor']);


      return $instance;

  }

  function form($instance) {
    /* Set up some default widget settings. */
    $instance = wp_parse_args((array) $instance, $this->defaults);
    $fixed_bg = isset( $instance['fixed_bg'] ) ? (bool) $instance['fixed_bg'] : false;

    ?>

<div class="block_accordion">
  <h4> <?php _e('Content', 'aazeen-extension') ?></h4>

  <!--Title START-->
  <div class="block_acc_wrap">
<p>
     <label for="<?php echo $this->get_field_id('main_title'); ?>"><?php _e('Main Title', 'aazeen-extension'); ?></label><br/>
     <input type="text" name="<?php echo $this->get_field_name('main_title'); ?>" id="<?php echo $this->get_field_id('main_title'); ?>" value="<?php if( !empty($instance['main_title']) ): echo $instance['main_title']; endif; ?>" class="widefat">
 </p>

 <p>
     <label for="<?php echo $this->get_field_id('sub_title'); ?>"><?php _e('Sub Title', 'aazeen-extension'); ?></label><br/>
     <input type="text" name="<?php echo $this->get_field_name('sub_title'); ?>" id="<?php echo $this->get_field_id('sub_title'); ?>" value="<?php if( !empty($instance['sub_title']) ): echo $instance['sub_title']; endif; ?>" class="widefat">
 </p>


</div>
</div>
<!--Title END-->

<!--Address-email-phone START-->
<div class="block_accordion">
  <h4> <?php _e('Address-email-phone', 'aazeen-extension') ?></h4>

  <!--Title START-->
  <div class="block_acc_wrap">
    <p>
      <label for="<?php echo $this->get_field_id('address_t'); ?>"><?php _e('Address', 'aazeen-extension'); ?></label><br/>
      <input type="text" name="<?php echo $this->get_field_name('address_t'); ?>" id="<?php echo $this->get_field_id('address_t'); ?>" value="<?php if( !empty($instance['address_t']) ): echo $instance['address_t']; endif; ?>" class="widefat">
    </p>

    <p>
      <label for="<?php echo $this->get_field_id('address'); ?>"><?php _e('Address details', 'aazeen-extension'); ?></label><br/>
      <textarea class="widefat" rows="8" cols="20" name="<?php echo $this->get_field_name('address'); ?>" id="<?php echo $this->get_field_id('address'); ?>"><?php if( !empty($instance['address']) ): echo htmlspecialchars_decode($instance['address']); endif; ?></textarea>
    </p>

    <p>
      <label for="<?php echo $this->get_field_id('Phone_t'); ?>"><?php _e('Phone', 'aazeen-extension'); ?></label><br/>
      <input type="text" name="<?php echo $this->get_field_name('Phone_t'); ?>" id="<?php echo $this->get_field_id('Phone_t'); ?>" value="<?php if( !empty($instance['Phone_t']) ): echo $instance['Phone_t']; endif; ?>" class="widefat">
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('Phone'); ?>"><?php _e('Phone Number', 'aazeen-extension'); ?></label><br/>
      <input type="text" name="<?php echo $this->get_field_name('Phone'); ?>" id="<?php echo $this->get_field_id('Phone'); ?>" value="<?php if( !empty($instance['Phone']) ): echo $instance['Phone']; endif; ?>" class="widefat">
    </p>


    <p>
      <label for="<?php echo $this->get_field_id('email_t'); ?>"><?php _e('Email', 'aazeen-extension'); ?></label><br/>
      <input type="text" name="<?php echo $this->get_field_name('email_t'); ?>" id="<?php echo $this->get_field_id('email_t'); ?>" value="<?php if( !empty($instance['email_t']) ): echo $instance['email_t']; endif; ?>" class="widefat">
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('email'); ?>"><?php _e('Email Address', 'aazeen-extension'); ?></label><br/>
      <input type="text" name="<?php echo $this->get_field_name('email'); ?>" id="<?php echo $this->get_field_id('email'); ?>" value="<?php if( !empty($instance['email']) ): echo $instance['email']; endif; ?>" class="widefat">
    </p>

  </div>
</div>
<!--Address-email-phone END-->

<!--Address-email-phone START-->

    <div class="block_accordion">
      <h4> <?php _e('Contact Form', 'aazeen-extension') ?></h4>
      <!--Title START-->
      <div class="block_acc_wrap">
    <p>
      <label for="<?php echo $this->get_field_id('form_title'); ?>"><?php _e('Form Title', 'aazeen-extension'); ?></label><br/>
      <input type="text" name="<?php echo $this->get_field_name('form_title'); ?>" id="<?php echo $this->get_field_id('form_title'); ?>" value="<?php if( !empty($instance['form_title']) ): echo $instance['form_title']; endif; ?>" class="widefat">
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('form_sub'); ?>"><?php _e('Form Sub Title', 'aazeen-extension'); ?></label><br/>
      <input type="text" name="<?php echo $this->get_field_name('form_sub'); ?>" id="<?php echo $this->get_field_id('form_sub'); ?>" value="<?php if( !empty($instance['form_sub']) ): echo $instance['form_sub']; endif; ?>" class="widefat">
    </p>
    <h5><?php _e('Please Install Contact form 7 plugins ', 'aazeen-extension') ?><a href="<?php echo esc_url('https://wordpress.org/plugins/contact-form-7/');?>"><?php _e('contact-form-7','aazeen-extension')?></a></h5>


    <p><label for="<?php echo $this->get_field_id( 'form_sort' ); ?>"><?php _e( 'Put contact-form-7 shortcode:','aazeen-extension' ); ?></label>
    <textarea class="widefat" rows="8" cols="20" id="<?php echo $this->get_field_id('form_sort'); ?>" name="<?php echo $this->get_field_name('form_sort'); ?>"><?php if( !empty($instance['form_sort']) ):echo esc_textarea( $instance['form_sort'] );endif; ?></textarea></p>

  </div>
<!--Address-email-phone END-->
</div>
<div class="block_accordion">
  <h4> <?php _e('Settings', 'aazeen-extension') ?></h4>
  <div class="block_acc_wrap">
    <p>
  <label for="<?php echo $this->get_field_id( 'tex_color' ); ?>" class="icon-color"><?php _e('Text Color', 'aazeen-extension') ?></label>
  <input class="widefat color-picker" id="<?php echo $this->get_field_id( 'tex_color' ); ?>" name="<?php echo $this->get_field_name( 'tex_color' ); ?>" value="<?php echo $instance['tex_color']; ?>" type="text" />
    </p>

    <p>
 		 <label for="<?php echo $this->get_field_id( 'icon_color' ); ?>" class="icon-color"><?php _e('Icon Color', 'aazeen-extension') ?></label>
 		 <input class="widefat color-picker" id="<?php echo $this->get_field_id( 'icon_color' ); ?>" name="<?php echo $this->get_field_name( 'icon_color' ); ?>" value="<?php echo $instance['icon_color']; ?>" type="text" />
 	 </p>
   <p>
     <label for="<?php echo $this->get_field_id( 'contactbody_color' ); ?>" class="icon-color"><?php _e('Contact Form Background color', 'aazeen-extension') ?></label>
     <input class="widefat color-picker" id="<?php echo $this->get_field_id( 'contactbody_color' ); ?>" name="<?php echo $this->get_field_name( 'contactbody_color' ); ?>" value="<?php echo $instance['contactbody_color']; ?>" type="text" />
   </p>
   <p>
     <label for="<?php echo $this->get_field_id( 'contactbody_headcolor' ); ?>" class="icon-color"><?php _e('Contact Form head Color', 'aazeen-extension') ?></label>
     <input class="widefat color-picker" id="<?php echo $this->get_field_id( 'contactbody_textcolor' ); ?>" name="<?php echo $this->get_field_name( 'contactbody_headcolor' ); ?>" value="<?php echo $instance['contactbody_headcolor']; ?>" type="text" />
   </p>

</div>
</div>
<div class="block_accordion">
  <h4> <?php _e('background Settings', 'aazeen-extension') ?></h4>
  <div class="block_acc_wrap">
    <p>
    <?php
    $styles=background_style_aazeen_extentions();
    ?>
    <label for="<?php echo $this->get_field_id('background_style'); ?>"><?php _e('background style', 'aazeen-extension') ?></label>
    <select id="<?php echo $this->get_field_id('background_style'); ?>" name="<?php echo $this->get_field_name('background_style'); ?>" class="widefat">
    <?php
    foreach($styles as $key => $value):?>
    <option value="<?php echo $key ;?>" <?php if ( $key == $instance['background_style'] ) echo 'selected="selected"'; ?>> <?php echo $value ;?></option>
    <?php endforeach;?>
    </select>
    <script type="text/javascript">
    jQuery(document).ready(function($){
        $("#<?php echo $this->get_field_id('background_style'); ?>").change(function(){
            $(this).find("option:selected").each(function(){
                var optionValue = $(this).attr("value");
                if(optionValue){
                    $(".box").not("." + optionValue).hide();
                    $("." + optionValue).show();
                } else{
                    $(".box").hide();
                }
            });
        }).change();
    });
    </script>

</p>
    <p class="box gradient">
      <div id="tg-widget-icon-picker" class="box gradient suffice-icon enhanced">
      <label for="<?php echo $this->get_field_id('bg_color'); ?>"><?php _e('Background Color', 'aazeen-extension') ?></label>
      <select id="<?php echo $this->get_field_id('bg_color'); ?>" name="<?php echo $this->get_field_name('bg_color'); ?>" class="widefat suffice-enhanced-select-gra" data-placeholder="<?php esc_attr_e( 'Choose gradient color&hellip;', 'suffice-toolkit' ); ?>">
        <option value=""></option>
        <?php  $array = array();
                for ($x = 1; $x <= 20; $x++) {
                    ?>
        <option value="<?php echo 'gradient_'.$x ?>" class="<?php echo 'gradient_'.$x ?>" data-icon="<?php echo esc_attr( 'gradient_'.$x ); ?>" <?php echo selected($instance['bg_color'], 'gradient_'.$x); ?> > <?php _e('gradient-'.$x, 'aazeen-extension') ?></option>
        <?php
                } ?>
      </select>
    </div>
    </p>
    <p class="box image">
      <div class="box image widget_input_wrap">
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
    <p class="box image"><input class="box image checkbox" type="checkbox"<?php checked( $fixed_bg ); ?> id="<?php echo $this->get_field_id( 'fixed_bg' ); ?>" name="<?php echo $this->get_field_name( 'fixed_bg' ); ?>" />
    <label for="<?php echo $this->get_field_id( 'fixed_bg' ); ?>"><?php _e( 'background image fixed', 'aazeen-extension' ); ?></label></p>

  </div>
  </div>
  <?php
          }
            //ENQUEUE CSS
            }

           }



          // register aazeen_ex dual category posts widget
          function aazeen_ex_contact_widget() {
              register_widget( 'aazeen_contact_widget' );
          }
          add_action( 'widgets_init', 'aazeen_ex_contact_widget' );
