<?php

// load widget
add_action( 'widgets_init', 'aude_latestposts_widget' );

// Register widget
function aude_latestposts_widget() {
	register_widget( 'aude_latestpost_widget' );
}


// Widget class
class aude_latestpost_widget extends WP_Widget {

// Widget setup
	
	function aude_latestpost_widget() {
	
		/* Widget settings. */
		$widget_tws = array( 'classname' => 'aude_latestpost_widget', 'description' => __('A widget for add recent posts with image thumbnails', 'aude_theme') );

		/* Widget control settings. */
		$control_tws = array( 'width' => 200, 'height' => 250, 'id_base' => 'aude_latestpost_widget' );

		/* Create the widget. */
		parent::__construct( 'aude_latestpost_widget', __('Audemedia ++ Latest Posts','aude_theme'), $widget_tws, $control_tws );
	}

/* ---------------------------------------------------------------------*/
/* Display widget
/* -------------------------------------------------------------------- */
	
	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters('widget_title', $instance['posttitle'] );
		$postnumber = $instance['postnumber'];
		
	
echo $before_widget;

		if ( $title )
		echo $before_title . $title . $after_title;	
?>	
<div class="row">
<div class="small-12 columns">
<ul class="portfoliowidget small-block-grid-1">
<?php
$latestpostsloop = array( 
    'post_type' =>  'post',
    'posts_per_page' =>  $postnumber,
    'order' =>  'DESC',
    'orderby' =>  'date',
    'meta_key'    => '_thumbnail_id',
    );

$wp_query = new WP_Query($latestpostsloop); 
while ( $wp_query->have_posts() ) : $wp_query->the_post(); 
?>
<li>
<div class="latestpostimg">
<?php if ( has_post_thumbnail() ) { ?>
  <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
  <?php } ?>
</div>

<div class="latestpostinfo">
<div class="latestposttitle"><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></div>
<div class="latestpostdate"><?php the_time('j.m.Y') ?></div>
</div>
<li>
 <?php
endwhile;
wp_reset_query();  
?> 
</ul>
</div>
</div>
		          
    <?php 

    echo $after_widget;		
	}

/* ---------------------------------------------------------------------*/
/* Update Widget
/* -------------------------------------------------------------------- */	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['posttitle'] = strip_tags( $new_instance['posttitle'] );
		$instance['postnumber'] = strip_tags( $new_instance['postnumber'] );
		
		/* No need to strip tags for.. */

		return $instance;
	}
	
/* ---------------------------------------------------------------------*/
/* Widget setting
/* -------------------------------------------------------------------- */
 
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array(
		'posttitle' => '',
		'postnumber' => '5',
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'posttitle' ); ?>"><?php _e('Header Title:', 'aude_theme') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'posttitle' ); ?>" name="<?php echo $this->get_field_name( 'posttitle' ); ?>" value="<?php echo esc_attr($instance['posttitle']); ?>" />
		</p>

		<p>
			<label style="display:block;" for="<?php echo $this->get_field_id( 'postnumber' ); ?>"><?php _e('Number of latestposts to Display:', 'aude_theme') ?></label>
	
	  <select id="<?php echo $this->get_field_id('postnumber'); ?>" name="<?php echo $this->get_field_name('postnumber'); ?>" type="text">
        <option value="1" <?php selected($instance['postnumber'], '1'); ?>>1</option>
        <option value="2" <?php selected($instance['postnumber'], '2'); ?>>2</option>
        <option value="3" <?php selected($instance['postnumber'], '3'); ?>>3</option>
        <option value="4" <?php selected($instance['postnumber'], '4'); ?>>4</option>
        <option value="5" <?php selected($instance['postnumber'], '5'); ?>>5</option>
        <option value="6" <?php selected($instance['postnumber'], '6'); ?>>6</option>
        <option value="7" <?php selected($instance['postnumber'], '7'); ?>>7</option>
        <option value="8" <?php selected($instance['postnumber'], '8'); ?>>8</option>
        <option value="9" <?php selected($instance['postnumber'], '9'); ?>>9</option>
    </select>	 
		</p>
		
	<?php
	}
}


?>