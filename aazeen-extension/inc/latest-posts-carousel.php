<?php
/**
 * latest post single blog style  Widget
 *
 * @since 1.0.0
 *
 * @package Aazeen extension
 */



 if ( !class_exists( 'aazeen_ex_post_carousel' ) ) {

    class aazeen_ex_post_carousel extends WP_Widget {

      public function __construct() {
        parent::__construct(
          'aazeen_ex_post_carousel',
          __( 'Aazeen - Blog Post carousel', 'aazeen-extension' ),
          array(
            'description' => __( '(blog carousel style) Displays latest posts or posts from a choosen category.(Home page & sidebar) ', 'aazeen-extension' ),
          )
        );
      $this->alt_option_name = 'aazeen_ex_post_carousel';
      add_action('wp_enqueue_scripts', array(&$this, 'aazeen_ex_latest_post_carousel_style'));
      }

      /**
      * Display Widget
      *
      * @param $args
      * @param $instance
      */
      function widget($args, $instance) {
        extract($args);
        $auto_play = ( ! empty( $instance['auto_play'] ) ) ? wp_kses_post( $instance['auto_play'] ) : '';
        $slidesto_show = ( ! empty( $instance['slidesto_show'] ) ) ? absint( $instance['slidesto_show'] ) : 3;
        $number_posts = ( ! empty( $instance['number_posts'] ) ) ? absint( $instance['number_posts'] ) : 3;
        $sticky_posts = ( isset( $instance['sticky_posts'] ) ) ? $instance['sticky_posts'] : true;
        $category = ( isset( $instance['category'] ) ) ? absint( $instance['category'] ) : '';
        $bg_color = isset( $instance['bg_color'] ) ? $instance['bg_color'] : '#BCBDD4';
        $content_bgimage = isset( $instance['content_bgimage'] ) ? $instance['content_bgimage'] : '';
        $showcase_link = isset( $instance[ 'bg_position' ]) ? $instance['bg_position']  : '';


        // Latest Posts 1
        if (true == $sticky_posts ) :
        $sticky = get_option( 'sticky_posts' );
        else:
          $sticky ='';
        endif;
        $latest_bloglist_posts = new WP_Query(
          array(

            'cat'	                => $category,
            'posts_per_page'	    => $number_posts,
            'post_status'           => 'publish',
            'post__not_in' => $sticky,
            )
        );

        echo $before_widget;
        ?>
        <?php echo '<span class="so_widget_id" data-panel-id="'.$this->id.'"></span>';?>
        <div class="lates-post-carousel padding-top-2"  style="Background-color:<?php echo $bg_color; ?>;<?php if (!empty($content_bgimage)): ?> background:url(<?php echo $content_bgimage ;?>) no-repeat <?php if( 'on' == $showcase_link ) : ?> fixed <?php endif; ?> ; background-size: cover;<?php endif; ?>"  >
          <?php if ( !empty($instance['title']) || !empty($instance['sub_title']) ):?>
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

          <div class="post-wrap-carousel" >
            <div class="carousel-layout4" data-slick='{"slidesToShow":<?php echo $slidesto_show;?>,"autoplay":<?php echo $auto_play;?>}'>
              <?php if ( $latest_bloglist_posts -> have_posts() ) :
                while ( $latest_bloglist_posts -> have_posts() ) : $latest_bloglist_posts -> the_post(); ?>
                  <article class="post-carousel-warp">
                    <div class="post-thumbouter">
                        <?php if ( has_post_thumbnail() ): ?>
                      <div class="post-thumb-overlay"></div>
                      <div class="post-thumb-carousel ">
                        <?php the_post_thumbnail( 'aazeen-small',array('class' => 'object-fit-images','link_thumbnail' =>TRUE)  ); ?>
                      </div>
                        <div class="card-content-absolute">
                          <h6 class="category meta-info-cat">
                            <?php aazeen_extension_firstcategory_link(); ?>
                          </h6>
                            <?php the_title( sprintf( '<h5 class="post-title"><a class="post-title-link" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h5>' ); ?>
                        </div>
                    <?php endif; ?>
                    </div>
                    </article >
                <?php endwhile; ?>
                  <?php wp_reset_postdata(); ?>
                <?php endif; ?>
            </div>
          </div>
          </div>
  <?php
  echo $after_widget;
  }

public function update( $new_instance, $old_instance ) {
  $instance = $old_instance;
  /*section title */
  $instance[ 'title' ] = sanitize_text_field( $new_instance[ 'title' ] );
 	$instance['sub_title'] = strip_tags($new_instance['sub_title']);

  $instance[ 'category' ]	= absint( $new_instance[ 'category' ] );
  $instance[ 'number_posts' ] = (int)$new_instance[ 'number_posts' ];
  $instance[ 'sticky_posts' ] = (bool)$new_instance[ 'sticky_posts' ];
  $instance[ 'show_post_row' ]	= wp_kses_post( $new_instance[ 'show_post_row' ] );
  $instance[ 'slidesto_show' ] = (int)$new_instance[ 'slidesto_show' ];
  $instance[ 'auto_play' ]	= wp_kses_post( $new_instance[ 'auto_play' ] );

  $instance['title_color'] = strip_tags($new_instance['title_color']);
  $instance['subtitle_color'] = strip_tags($new_instance['subtitle_color']);
  $instance['bg_color'] = strip_tags($new_instance['bg_color']);
  $instance['content_bgimage'] = strip_tags($new_instance['content_bgimage']);
  $instance['bg_position'] = strip_tags($new_instance['bg_position']);

  return $instance;
}

function form($instance) {
  /* Set up some default widget settings. */
 $defaults = array(

 'category' => 'show_option_all',
 'title' => 'Latest Blog ',
 'sticky_posts' => 'true',
 'number_posts' => '5',
 'slidesto_show'=>'3',
 'auto_play'=>'true',
 'bg_color' => '#fff',
 'main_title' => 'Amazing Team',
 'title_color' => '#0a0a0a',
 'subtitle_color' => '#747474',
 'bg_position'=>'off',


 );
 $instance = wp_parse_args( (array) $instance, $defaults ); ?>

 <p>
 	<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Main Title', 'aazeen-extension'); ?></label>
 	<input type="text" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php if( !empty($instance['title']) ): echo $instance['title']; endif; ?>" class="widefat">
 </p>

 <p>
 	<label for="<?php echo $this->get_field_id('sub_title'); ?>"><?php _e('Sub Title', 'aazeen-extension'); ?></label>
 	<input type="text" name="<?php echo $this->get_field_name('sub_title'); ?>" id="<?php echo $this->get_field_id('sub_title'); ?>" value="<?php if( !empty($instance['sub_title']) ): echo $instance['sub_title']; endif; ?>" class="widefat">
 </p>
 <p>
   <label for="<?php echo $this->get_field_id( 'title_color' ); ?>"><?php _e('Title Color', 'aazeen-extension') ?></label>
   <input class="widefat color-picker" id="<?php echo $this->get_field_id( 'title_color' ); ?>" name="<?php echo $this->get_field_name( 'title_color' ); ?>" value="<?php echo $instance['title_color']; ?>" type="text" />
 </p>

 <p>
 	<label for="<?php echo $this->get_field_id( 'subtitle_color' ); ?>" class="icon-color"><?php _e('Sub Title Color', 'aazeen-extension') ?></label>
 	<input class="widefat color-picker" id="<?php echo $this->get_field_id( 'subtitle_color' ); ?>" name="<?php echo $this->get_field_name( 'subtitle_color' ); ?>" value="<?php echo $instance['subtitle_color']; ?>" type="text" />
 </p>
  <p>
    <label><?php esc_html_e( 'Select a post category', 'aazeen-extension' ); ?></label>
    <?php wp_dropdown_categories( array( 'name' => $this->get_field_name('category'), 'selected' => $instance['category'], 'show_option_all' => 'Show all posts' ) ); ?>
  </p>

  <p>
    <input type="checkbox" <?php checked( $instance['sticky_posts'], true ) ?> class="checkbox" id="<?php echo $this->get_field_id('sticky_posts'); ?>" name="<?php echo $this->get_field_name('sticky_posts'); ?>" />
    <label for="<?php echo $this->get_field_id('sticky_posts'); ?>"><?php esc_html_e( 'Hide sticky posts.', 'aazeen-extension' ); ?></label>
  </p>
  <p>
    <label for="<?php echo $this->get_field_id( 'number_posts' ); ?>"><?php esc_html_e( 'Number of posts:', 'aazeen-extension' ); ?></label>
    <input type="number" id="<?php echo $this->get_field_id( 'number_posts' ); ?>" name="<?php echo $this->get_field_name( 'number_posts' ); ?>" value="<?php echo absint( $instance['number_posts'] ); ?>" size="3"/>
  </p>
  <p>
    <label for="<?php echo $this->get_field_id( 'slidesto_show' ); ?>"><?php esc_html_e( 'slides to show', 'aazeen-extension' ); ?></label>
    <input type="number" id="<?php echo $this->get_field_id( 'slidesto_show' ); ?>" name="<?php echo $this->get_field_name( 'slidesto_show' ); ?>" value="<?php echo absint( $instance['slidesto_show'] ); ?>" size="3"/>
  </p>
  <p>
  <label for="<?php echo $this->get_field_id('auto_play'); ?>"><?php _e('Auto play', 'aazeen-extension') ?></label>
  <select id="<?php echo $this->get_field_id('auto_play'); ?>" name="<?php echo $this->get_field_name('auto_play'); ?>" class="widefat">
    <option value="true" <?php if ( 'true' == $instance['auto_play'] ) echo 'selected="selected"'; ?>><?php esc_html_e('ON', 'aazeen-extension') ?></option>
    <option value="false" <?php if ( 'false' == $instance['auto_play'] ) echo 'selected="selected"'; ?>><?php esc_html_e('OFF', 'aazeen-extension') ?></option>
  </select>
  </p>

  <div class="block_accordion">
    <h4> <?php _e('Settings', 'aazeen-extension') ?></h4>
    <div class="block_acc_wrap">
  <p>
    <label for="<?php echo $this->get_field_id( 'bg_color' ); ?>"><?php _e('Background Color', 'aazeen-extension') ?></label>
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

  <p>
  <input class="checkbox" type="checkbox" <?php checked( $instance[ 'bg_position' ], 'on'); ?> id="<?php echo $this->get_field_id( 'bg_position' ); ?>" name="<?php echo $this->get_field_name( 'bg_position' ); ?>" />
  <label for="<?php echo $this->get_field_id( 'bg_position' ); ?>"><?php _e(' Make background image fixed ', 'aazeen-extension') ?></label>
  </p>
  </div>
  </div>
  <?php
    }

       //ENQUEUE CSS
       function aazeen_ex_latest_post_carousel_style() {
         $settings = get_option( $this->option_name );

         if ( empty( $settings ) ) {
           return;
         }

         foreach ( $settings as $instance_id => $instance ) {
           $id = $this->id_base . '-' . $instance_id;

           if ( ! is_active_widget( false, $id, $this->id_base ) ) {
             continue;
           }
         $title_color=esc_html($instance['title_color']);
         $id= $this->id;
         $widget_style='';
        /*  Color calculation for text */
        $widget_style .=
         " #".$id." .separator-center::after
         {
           border-bottom-color: $title_color ;
         }"
        ;
    wp_add_inline_style( 'aazeen-style', $widget_style );
        }
         }

      }
    }


// register aazeen_ex dual category posts widget
function aazeen_ex_latest_post_carousel() {
    register_widget( 'aazeen_ex_post_carousel' );
}
add_action( 'widgets_init', 'aazeen_ex_latest_post_carousel' );
