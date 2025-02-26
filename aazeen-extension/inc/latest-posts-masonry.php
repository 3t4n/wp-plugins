<?php
/**
 * latest post single blog style  Widget
 *
 * @since 1.0.0
 *
 * @package Aazeen extension
 */



 if ( !class_exists( 'aazeen_post_masonry' ) ) {

    class aazeen_post_masonry extends WP_Widget {

      public function __construct() {
        parent::__construct(
          'aazeen_post_masonry',
          __( 'Aazeen - Blog Masonry Style', 'aazeen-extension' ),
          array(
            'description' => __( '(blog masonry style) Displays latest posts or posts from a choosen category.(Home page & sidebar) ', 'aazeen-extension' ),
            'customize_selective_refresh' => true,
          )
        );
        $this->alt_option_name = 'aazeen_post_masonry';
      }

      /**
      * Display Widget
      *
      * @param $args
      * @param $instance
      */
      function widget($args, $instance) {
        extract($args);

        $show_post_row = ( ! empty( $instance['show_post_row'] ) ) ? wp_kses_post( $instance['show_post_row'] ) : 'large-12';
        $number_posts = ( ! empty( $instance['number_posts'] ) ) ? absint( $instance['number_posts'] ) : 3;
        $sticky_posts = ( isset( $instance['sticky_posts'] ) ) ? $instance['sticky_posts'] : true;
        $hide_posts_cat = ( isset( $instance['hide_posts_cat'] ) ) ? $instance['hide_posts_cat'] : true;
        $hide_autor_date = ( isset( $instance['hide_autor_date'] ) ) ? $instance['hide_autor_date'] : true;
        $category = ( isset( $instance['category'] ) ) ? absint( $instance['category'] ) : '';
        $bg_color = isset( $instance['bg_color'] ) ? $instance['bg_color'] : '#E8EBF2';
        $content_bgimage = isset( $instance['content_bgimage'] ) ? $instance['content_bgimage'] : '';
        $fixed_bg = isset( $instance['fixed_bg'] ) ? $instance['fixed_bg'] : false;

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
            'ignore_sticky_posts' => 1,
            )
        );

        echo $before_widget;
        ?>
      <?php $id= $this->id; ?>
 			 <style>
 				#<?php echo $id;?> .separator-center::after{border-bottom-color:<?php echo esc_attr($instance['title_color']); ?>;}
 			 </style>

          <div id="post-cardmission" class="lates-post-cardmission padding-vertical-2" style="Background-color:<?php echo $bg_color; ?>;<?php if (!empty($content_bgimage)): ?> background:url(<?php echo $content_bgimage ;?>) no-repeat <?php if ( $fixed_bg ) : ?> fixed <?php endif; ?> ; background-size: cover;<?php endif; ?>">
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

        <div class="grid-container">
          <div class="post-wrap-layout-2" >
            <div class="grid-x grid-padding-x  ">
              <?php if ( $latest_bloglist_posts -> have_posts() ) :
                while ( $latest_bloglist_posts -> have_posts() ) : $latest_bloglist_posts -> the_post(); ?>
                <div class="cell <?php echo $show_post_row;?> medium-12 small-24 ">
                  <div class="card card-blog">
                    <?php if ( has_post_thumbnail() ): ?>
                      <div class="card-image">
                        <div class="post-thumb-overlay"></div>
                        <?php the_post_thumbnail( 'aazeen-small',array('class' => 'img','link_thumbnail' =>TRUE)  ); ?>
                        <div class="card-title">
                          <?php if ( 'large-22' == $instance['show_post_row'] ): ?>
                          <?php the_title( sprintf( '<h3 class="post-title is-font-size-1"><a class="post-title-link" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
                        <?php else:?>
                          <?php the_title( sprintf( '<h3 class="post-title is-font-size-4"><a class="post-title-link" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
                        <?php endif;?>
                        </div>
                      </div>
                     <?php endif; ?>
                    <div class="card-content">
                      <?php if (! has_post_thumbnail() ) { ?>
                        <div class="card-title no-thumb">
                          <?php if ( 'large-22' == $instance['show_post_row'] ): ?>
                          <?php the_title( sprintf( '<h3 class="post-title is-font-size-1"><a class="post-title-link" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
                        <?php else:?>
                          <?php the_title( sprintf( '<h3 class="post-title is-font-size-4"><a class="post-title-link" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
                        <?php endif;?>
                        </div>
                      <?php } ?>
                      <?php if (true !== $hide_posts_cat ) :?>
                      <h6 class="category text-info"><?php aazeen_extensioncategory_widgtesmission(); ?></h6>
                      <?php endif;?>
                      <div class="card-description">
                        <?php the_excerpt(); ?>
                        </div>
                      <?php if (true !== $hide_autor_date ) :?>
                      <div class="card-footer">
                        <div class="author">
                          <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" title="<?php echo esc_attr(get_the_author()); ?>">
                            <?php echo get_avatar(get_the_author_meta('ID'), '40'); ?>
                            <span><?php echo get_the_author();?></span>
                          </a>
                          </div>
                          <div class="stats">
                            <i class="fa fa-clock-o"></i> <?php echo aazeen_extension_time_ago(); ?>
                          </div>
                        </div>
                        <?php endif;?>
                      </div>
                    </div>
                  </div>
                <?php endwhile; ?>
                  <?php wp_reset_postdata(); ?>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
  <?php
  echo $after_widget;
  }

public function update( $new_instance, $old_instance ) {
  $instance = $old_instance;
  $instance['title'] = sanitize_text_field($new_instance['title']);
  $instance['sub_title'] = sanitize_text_field($new_instance['sub_title']);
  $instance[ 'category' ]	= absint( $new_instance[ 'category' ] );
  $instance[ 'number_posts' ] = (int)$new_instance[ 'number_posts' ];
  $instance[ 'sticky_posts' ] = (bool)$new_instance[ 'sticky_posts' ];
  $instance[ 'hide_posts_cat' ] = (bool)$new_instance[ 'hide_posts_cat' ];
  $instance[ 'hide_autor_date' ] = (bool)$new_instance[ 'hide_autor_date' ];
  $instance[ 'show_post_row' ]	= wp_kses_post( $new_instance[ 'show_post_row' ] );
  $instance['title_color'] = sanitize_hex_color($new_instance['title_color']);
  $instance['subtitle_color'] = sanitize_hex_color($new_instance['subtitle_color']);
  $instance['bg_color'] = sanitize_hex_color($new_instance['bg_color']);
  $instance['content_bgimage'] = strip_tags($new_instance['content_bgimage']);


  $instance['new_tab'] = isset( $new_instance['new_tab'] ) ? (bool) $new_instance['new_tab'] : false;
  $instance['fixed_bg'] = isset( $new_instance['fixed_bg'] ) ? (bool) $new_instance['fixed_bg'] : false;

  return $instance;
}

function form($instance) {
  /* Set up some default widget settings. */
 $defaults = array(

 'category' => 'show_option_all',
 'title' => 'Latest Blog ',
 'sticky_posts' => 'true',
 'number_posts' => '5',
 'show_post_row'=>'large-12',
 'hide_posts_cat' => 'true',
 'hide_autor_date' => 'true',
 'title_color' => '#0a0a0a',
 'subtitle_color' => '#747474',
 'bg_color' => '#E8EBF2',


 );
 $instance = wp_parse_args( (array) $instance, $defaults );
 $fixed_bg = isset( $instance['fixed_bg'] ) ? (bool) $instance['fixed_bg'] : false;
 ?>

 <p>
      <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Main Title', 'aazeen-extension'); ?></label>
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
  <p>
    <label><?php esc_html_e( 'Select a post category', 'aazeen-extension' ); ?></label>
    <?php wp_dropdown_categories( array( 'name' => $this->get_field_name('category'), 'selected' => $instance['category'], 'show_option_all' => 'Show all posts' ) ); ?>
  </p>

  <p>
    <input type="checkbox" <?php checked( $instance['sticky_posts'], true ) ?> class="checkbox" id="<?php echo $this->get_field_id('sticky_posts'); ?>" name="<?php echo $this->get_field_name('sticky_posts'); ?>" />
    <label for="<?php echo $this->get_field_id('sticky_posts'); ?>"><?php esc_html_e( 'Hide sticky posts.', 'aazeen-extension' ); ?></label>
  </p>
  <p>
    <input type="checkbox" <?php checked( $instance['hide_posts_cat'], true ) ?> class="checkbox" id="<?php echo $this->get_field_id('hide_posts_cat'); ?>" name="<?php echo $this->get_field_name('hide_posts_cat'); ?>" />
    <label for="<?php echo $this->get_field_id('hide_posts_cat'); ?>"><?php esc_html_e( 'Hide Categories', 'aazeen-extension' ); ?></label>
  </p>
  <p>
    <input type="checkbox" <?php checked( $instance['hide_autor_date'], true ) ?> class="checkbox" id="<?php echo $this->get_field_id('hide_autor_date'); ?>" name="<?php echo $this->get_field_name('hide_autor_date'); ?>" />
    <label for="<?php echo $this->get_field_id('hide_autor_date'); ?>"><?php esc_html_e( 'Hide author/date', 'aazeen-extension' ); ?></label>
  </p>
  <p>
    <label for="<?php echo $this->get_field_id( 'number_posts' ); ?>"><?php esc_html_e( 'Number of posts:', 'aazeen-extension' ); ?></label>
    <input type="number" id="<?php echo $this->get_field_id( 'number_posts' ); ?>" name="<?php echo $this->get_field_name( 'number_posts' ); ?>" value="<?php echo absint( $instance['number_posts'] ); ?>" size="3"/>
  </p>
  <p>
  <label for="<?php echo $this->get_field_id('show_post_row'); ?>"><?php _e('Show post in row', 'aazeen-extension') ?></label>
  <select id="<?php echo $this->get_field_id('show_post_row'); ?>" name="<?php echo $this->get_field_name('show_post_row'); ?>" class="widefat">
    <option value="large-22" <?php if ( 'large-22' == $instance['show_post_row'] ) echo 'selected="selected"'; ?>><?php esc_html_e('one', 'aazeen-extension') ?></option>
    <option value="large-12" <?php if ( 'large-12' == $instance['show_post_row'] ) echo 'selected="selected"'; ?>><?php esc_html_e('two', 'aazeen-extension') ?></option>
    <option value="large-8" <?php if ( 'large-8' == $instance['show_post_row'] ) echo 'selected="selected"'; ?>><?php esc_html_e('three', 'aazeen-extension') ?></option>
    <option value="large-6" <?php if ( 'large-6' == $instance['show_post_row'] ) echo 'selected="selected"'; ?>><?php esc_html_e('four', 'aazeen-extension') ?></option>
  </select>
  </p>
  <div class="block_accordion">
    <h4> <?php _e('Settings', 'aazeen-extension') ?></h4>
    <div class="block_acc_wrap">

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
 }
  }


// register aazeen dual category posts widget
function aazeen_latest_post_masonry() {
    register_widget( 'aazeen_post_masonry' );
}
add_action( 'widgets_init', 'aazeen_latest_post_masonry' );
