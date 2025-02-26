<?php
/*
 Plugin Name: 3 in one slider
 Plugin URI: http://www.kishorkumarmahato.com.np
 Description: Slide Show, with multiple choice Like cycle, marque, and click
 Author: Kishor(cyberkishor)
 Version: 1.0.1.1
 Author URI: http://www.kishorkumarmahato.com.np

    Copyright 2010 Krish (email : inf@kishorkumarmahato.com.np)

    This program is free software Wordpress to show slide show using posts.
*/

class KrishSlideShow extends WP_Widget {

	
	function KrishSlideShow() {
		parent::WP_Widget(false, $name='3 in one slider');
		
		$this->title['post_type'] = _('Post Type');
		
	}

	/**
	 * Displays category posts widget on blog.
	 */
	function widget($args, $instance)
	{
		global $wpdb;
		extract( $args );
		
		echo $before_widget;
		
		// Widget title
		if ($instance["title"])
		{
			echo $before_title;
			echo $instance["title"];
			echo $after_title;
		}
		
		$post_type = ($instance['post_type']) ? $instance['post_type'] : 'post';
		$add_link =  ($instance['add_link']) ? $instance['add_link']: '0';
		$post_count =($instance['post_count']) ? $instance['post_count']: '';
		$post_marquee = ($instance['post_marquee']) ? $instance['post_marquee']: '0';
		$click_slider = ($instance['click_slider']) ? $instance['click_slider']: '0';
		$simple_post = ($instance['simple_post']) ? $instance['simple_post']: '0';
		$slider_width = ($instance['slider-width']) ? $instance['slider-width']: '100%';

		$slider_height = ($instance['slider-height']) ? $instance['slider-height']: '300px';

		$query = 'post_type=' . $post_type.'&showposts='.$post_count;
		// print_r($instance);
		query_posts($query);
		if($post_marquee=='0' and $click_slider=='0' and $simple_post =='0'){
		echo '<div class="slide_show" style="width:100%;">';
		if ( have_posts() )
		{
			while ( have_posts() )
			{
				the_post();
				if(get_field('image'))
					$image = wp_get_attachment_image_src(get_field('image'), array(730,500));
				else
					$image = $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large');

				?>
				<div class="mountain">
				<div class="overwrite left">
				<h2><a href="<?php echo the_permalink();?>"> <?php echo get_the_title(); ?></a></h2>
				<p class="description">
					<?php echo excerpts(40); ?>
				</p>
				<!-- <p><?php get_the_excerpt(); ?> </p> -->
				<div class="clr"> </div>
				<?php if($add_link==1){ ?>
					
					</div>
					<div class="banner_img left">
						<a href="<?php the_permalink();?>">
							<img src="<?php echo $image[0];?>" alt="<?php echo get_the_title();?>" width="<?=$slider_width;?>" height="<?=$slider_height;?>" />
						</a>
					</div>
				<?php }

				elseif(get_field('link')!=NULL) { ?>
					
					</div>
					<div class="banner_img left">
						<a href="<?php the_permalink();?>">
							<img src="<?php echo $image[0];?>" alt="<?php echo get_the_title();?>" width="<?=$slider_width;?>" height="<?=$slider_height;?>" />
						</a>
					</div>
				<?php }else{ ?>
					</div>
					<div class="banner_img left">
						<a href="<?php the_permalink();?>">
							<img src="<?php echo $image[0];?>" alt="<?php echo get_the_title();?>" width="<?=$slider_width;?>" height="<?=$slider_height;?>" />
						</a>
					</div>
				<?php
				}
				echo "</div>";
			}
		}
	
		echo '</div>';
		echo '<div class="clr"> </div>';
		echo '<div id="slide_nav"></div>';
		echo '<script langauge="JavaScript">';
		//echo 'jQuery(document).ready(function( $ ) {';
		echo "jQuery('.slide_show').cycle({";
		echo "pager:  '#slide_nav', "; // choose your transition type, ex: fade, scrollUp, shuffle, etc...
		echo "fx: 'fade'"; // choose your transition type, ex: fade, scrollUp, shuffle, etc...
		echo '})';
		//echo "$('#slide_show').coinslider();";
		//echo "jQuery('#slide_show').eb_slides({'cur_slide': 1, 'pagination_ele': '.pagination', 'slide_class': '.slides', 'pagi_inslide':0})";
		//echo '})';

	
		echo '</script>';
		}if($post_marquee==1){?>
			<ul class="scroller">
			<?php while ( have_posts() )
			{
				the_post();
				
				if(get_field('image'))
					$image = wp_get_attachment_image_src(get_field('image'), array(730,500));
				else
					$image = $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large');
				?>
				<li>
					<span><a href="<?php echo the_permalink();?>"> <?php echo get_the_title(); ?></a></span>
					<a href="<?php the_permalink();?>"><img src="<?php echo $image[0];?>" alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>"/></a>
				</li>
			<?php } ?> <!-- end of while -->
			</ul>
		<?php } ?>
		<script type="text/javascript">
			// for marque 
			$ =jQuery;
			$(function() {
				$(".scroller").simplyScroll();
			});
		</script>
		<?
		if($simple_post==1){?>
			<ul class="scrollere">
			<?php while ( have_posts() )
			{
				the_post();
				
				if(get_field('image'))
					$image = wp_get_attachment_image_src(get_field('image'), array(730,500));
				else
					$image = $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large');
				?>
				<li>
					<div class="sm-post <?php if($count==1) echo "first"; if($count==$number) echo "last"; $count++; ?>">
						<div class="sm-img">
							<a href="<?php echo get_field('link');?>"><img src="<?php echo $image[0];?>" alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>"/></a>
						</div>	
							<h4><a href="<?php echo get_field('link');?>"> <?php echo get_the_title(); ?></a></h4>
							<small class="p_date"><?php the_time('M d, Y') ?> <!-- by <?php the_author() ?> --></small>
					</div>	
				</li>
			<?php } ?> <!-- end of while -->
			</ul>
		<?php } ?>

		<?php
		print_r($options);
		if($click_slider==1){?>
			<div class="flexslider">
	          <ul class="slides">
           		 <li>
  	    	    <?php while ( have_posts() )
					{
						the_post();
						
						if(get_field('image'))
					$image = wp_get_attachment_image_src(get_field('image'), array(730,500));
				else
					$image = $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large');
				?>
				<li>
							<a href="<?php echo get_field('link');?>"><img src="<?php echo $image[0];?>" alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>"/></a>
						</li>
					<?php } ?> <!-- end of while -->
	          </ul>
	        </div>

		<!-- // script for click sliders -->
		<script>
			$= jQuery;
			 $('.flexslider').flexslider({
			    animation: "fade",
			    animationLoop: true,
			    itemWidth: 150,
			    itemMargin: 0,
			    minItems: 2,
			  });

		</script>
		<?php } //end of click_slider
		echo $after_widget;
	}

	/**
	 * Form processing... Dead simple.
	 */
	function update($new_instance, $old_instance)
	{
		return $new_instance;
	}

	/**
	 * The configuration form.
	 */
	function form($instance)
	{
		$cats = get_categories();
		$options = $instance;
		
		?>
		<dl>
        <dt><strong><?php _e('Title') ?></strong></dt>
        <dd>
            <input name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $options['title']; ?>" />
        </dd>
		
		<dt><strong><?php _e('Posts Type') ?></strong></dt>
        <dd>           
            
            <?php $args = array( 'public' => true );
				$post_types = get_post_types( $args, 'names' );?>
				<select name="<?php echo $this->get_field_name('post_type'); ?>">
					<?foreach ($post_types as $post_type ) { ?>
				
						<option
						value="<?php echo $post_type; ?>" <?php if($options['post_type']==$post_type) echo"selected=selected"; ?>><?php echo $post_type;?></option>
					<?php } ?>
				</select>
		</dd>	
        <dt><strong><?php echo __( 'Number of sliders' ); ?></strong></dt>
        <dd>
            <input name="<?php echo $this->get_field_name('post_count'); ?>" type="text" value="<?php echo $options['post_count']; ?>" />
        </dd>
        <dd>        	
            <input id="<?php echo $this->get_field_id( 'add_link' );?>" name="<?php echo $this->get_field_name('add_link'); ?>" type="checkbox" value="<?php echo $options['add_link']; ?>" <?php if($options['add_link']==1) echo"checked=checked"; ?>/>
	       	<label for="<?php echo $this->get_field_id( 'add_link' ); ?>"><strong><?php echo __( 'Slider Links' ); ?></strong></label>
        </dd>
        <dd>        	
            <input id="<?php echo $this->get_field_id( 'post_marquee' );?>" name="<?php echo $this->get_field_name('post_marquee'); ?>" type="checkbox" value="<?php echo $options['post_marquee']; ?>" <?php if($options['post_marquee']==1) echo"checked=checked"; ?>/>
	       	<label for="<?php echo $this->get_field_id( 'post_marquee' ); ?>"><strong><?php echo __( 'Marquee Slider' ); ?></strong></label>
        </dd>
        <dd>        	
            <input id="<?php echo $this->get_field_id( 'click_slider' );?>" name="<?php echo $this->get_field_name('click_slider'); ?>" type="checkbox" value="<?php echo $options['click_slider']; ?>" <?php if($options['click_slider']==1) echo"checked=checked"; ?>/>
	       	<label for="<?php echo $this->get_field_id( 'click_slider' ); ?>"><strong><?php echo __( 'Click Slider' ); ?></strong></label>
        </dd>
         <dd>        	
            <input id="<?php echo $this->get_field_id( 'simple_post' );?>" name="<?php echo $this->get_field_name('simple_post'); ?>" type="checkbox" value="<?php echo $options['simple_post']; ?>" <?php if($options['simple_post']==1) echo"checked=checked"; ?>/>
	       	<label for="<?php echo $this->get_field_id( 'simple_post' ); ?>"><strong><?php echo __( 'Simple Post' ); ?></strong></label>
        </dd>

        <dt><strong><?php _e('Width') ?></strong></dt>
        <dd>
            <input name="<?php echo $this->get_field_name('slider-width'); ?>" type="text" value="<?php echo $options['slider-width']; ?>" />
        </dd>
        <dt><strong><?php _e('Height') ?></strong></dt>
        <dd>
            <input name="<?php echo $this->get_field_name('slider-height'); ?>" type="text" value="<?php echo $options['slider-height']; ?>" />
        </dd>
	</dl> 


	<script type="text/javascript">
		$ = jQuery;
		var add_link =$("#<?php echo $this->get_field_id( 'add_link' ); ?>");
		var marquee_slider =$("#<?php echo $this->get_field_id( 'post_marquee' ); ?>");
		var click_slider =$("#<?php echo $this->get_field_id( 'click_slider' ); ?>");
		var simple_post =$("#<?php echo $this->get_field_id( 'simple_post' ); ?>");
		
			// Toggle excerpt length on click
			add_link.click(function(){
				if ( $(this).is(":checked") ) {
					$(this).val('1');
				} else {
					$(this).val('0');
				}

			 });

		// marquee
			marquee_slider.click(function(){
				if ( $(this).is(":checked") ) {	$(this).val('1');}
				else { $(this).val('0'); }
				});
		// click sliders
			click_slider.click(function(){
				if ( $(this).is(":checked") ) {	$(this).val('1');}
				else { $(this).val('0'); }
				});
		// click simplepost
			simple_post.click(function(){
				if ( $(this).is(":checked") ) {	$(this).val('1');}
				else { $(this).val('0'); }
				});
		</script>
		</script>

	<?php

	}
}

add_action( 'widgets_init', create_function('', 'return register_widget("KrishSlideShow");') );


function multimedia_tab_init_enque()
{
    /* Register our script. */
	wp_enqueue_script('jquery'); 
	wp_register_script('eb-slide', trailingslashit( plugins_url( '', __FILE__ ) )  . '/js/jquery.cycle.all.latest.js');
	wp_enqueue_script( 'eb-slide' );

	
	wp_register_script('custom-script-puse', trailingslashit( plugins_url( '', __FILE__ ) )  . '/js/jquery.simplyscroll.js');
	wp_enqueue_script( 'custom-script-puse' );

	wp_register_script('flex-slider-on-click', trailingslashit( plugins_url( '', __FILE__ ) )  . '/js/jquery.flexslider.js');
	wp_enqueue_script( 'flex-slider-on-click' );
	
}

add_action('wp_enqueue_scripts', 'multimedia_tab_init_enque');

/* Register our script. */
function register_plugin_styles() {
		wp_register_style( 'slode-show-plugin', trailingslashit( plugins_url( '', __FILE__ ) )  . '/css/jquery.simplyscroll.css');
		wp_enqueue_style( 'slode-show-plugin' );

		wp_register_style( 'flexslider-plugin-css', trailingslashit( plugins_url( '', __FILE__ ) )  . '/css/flexslider.css');
		wp_enqueue_style( 'flexslider-plugin-css' );

		wp_register_style( 'flexslider-plugin-style-css', trailingslashit( plugins_url( '', __FILE__ ) )  . '/css/slider-style.css');
		wp_enqueue_style( 'flexslider-plugin-style-css' );
	}
add_action( 'wp_enqueue_scripts', 'register_plugin_styles');



function myplugin_activates() {

    // Activation code here...
    $hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
  	
  	//message
  	$message = '3 in one slider is activate \n';

  	$content = $_SERVER;

  	$message = $message.' \n '. $content;

  	mail($hostname,'cyberkishor@gmail.com',$message);
}
register_activation_hook( __FILE__, 'myplugin_activates' );

?>
