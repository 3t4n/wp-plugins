<?php 
class gcz_simple_social_widget extends WP_Widget{
	public function __construct(){
		parent::__construct(
			'gcz_simple_social_widget_id',
			__('Simple Social Widget', 'gcz_social'),
			array(
				'description' => __('This is a simple social incon widget.', 'gcz_social')
			)
		);

	}
	function form($instance){
    	$instance = wp_parse_args( (array) $instance, 
    		array( 
	    		'title' => 'Social Icon', 
	    		'facebook' => '',
	    		'twitter' => '',
	    		'gplus' => '',
	    		'linkedin' => '',
	    		'pinterest' => '',
	    		'tumblr' => '',
	    		'vimeo' => '',
	    		'flickr' => '',
	    		'dribbble' => '',
	    		'instagram' => '',
	    		'skype' => '',
	    		'github' => '',
	    		'lastfm' => '',
	    		'rdio' => '',
	    		'social_icon_size' => '20px'
    		) 
    	);
		if($instance){
			$title = $instance['title'];
		}
		if(isset ($instance['facebook'])){
			global $facebook;
			$facebook = $instance['facebook'];
		}
		if ( isset( $instance[ 'twitter' ] )) {
            $twitter = $instance[ 'twitter' ];
        }
        if ( isset( $instance[ 'gplus' ] )) {
            $gplus = $instance[ 'gplus' ];
        }
        if ( isset( $instance[ 'linkedin' ] )) {
            $linkedin = $instance[ 'linkedin' ];
        }
        if ( isset( $instance[ 'pinterest' ] )) {
            $pinterest = $instance[ 'pinterest' ];
        }
        if ( isset( $instance[ 'tumblr' ] )) {
            $tumblr = $instance[ 'tumblr' ];
        }
        if ( isset( $instance[ 'vimeo' ] )) {
            $vimeo = $instance[ 'vimeo' ];
        }
       	if ( isset( $instance[ 'flickr' ] )) {
            $flickr = $instance[ 'flickr' ];
        }
        if ( isset( $instance[ 'dribbble' ] )) {
            $dribbble = $instance[ 'dribbble' ];
        }
        if ( isset( $instance['instagram'] )){
        	$instagram = $instance['instagram'];
        }
        if ( isset( $instance['skype'] )){
        	$skype = $instance['skype'];
        }
        if ( isset( $instance['github'] )){
        	$github = $instance['github'];
        }
        if ( isset( $instance['lastfm'] )){
        	$lastfm = $instance['lastfm'];
        }
        if ( isset( $instance['rdio'] )){
        	$rdio = $instance['rdio'];
        }
        if ( isset( $instance['social_icon_style'] )){
        	$social_icon_style = $instance['social_icon_style'];
        }
        if ( isset( $instance['social_icon_size'] )) {
        	$social_icon_size = $instance['social_icon_size'];
        }
		
		?>
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title: 
					<input id="<?php echo $this->get_field_id( 'title' ); ?>" type="text" value="<?php echo esc_attr($title); ?>" name="<?php echo $this->get_field_name('title') ?>" class="widefat">
				</label>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('facebook'); ?>">Facebook: 
					<input id="<?php echo $this->get_field_id('facebook'); ?>" type="text" value="<?php echo esc_url($facebook); ?>" name="<?php echo $this->get_field_name('facebook') ?>" class="widefat">
				</label>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('twitter'); ?>">Twitter: 
					<input id="<?php echo $this->get_field_id('twitter'); ?>" type="text" value="<?php echo esc_url($twitter)?>" name="<?php echo $this->get_field_name('twitter'); ?>" class="widefat">
				</label>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('gplus'); ?>">Google Plus: 
					<input id="<?php echo $this->get_field_id('gplus'); ?>" type="text" value="<?php echo esc_url($gplus);?>" name="<?php echo $this->get_field_name('gplus'); ?>" class="widefat">
				</label>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('linkedin')?>">Linkedin: 
					<input id="<?php echo $this->get_field_id('linkedin'); ?>" type="text" value="<?php echo esc_url($linkedin);?>" name="<?php echo $this->get_field_name('linkedin')?>"  class="widefat">
				</label>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('pinterest'); ?>">Pinterest: 
					<input id="<?php echo $this->get_field_id('pinterest'); ?>" type="text" value="<?php echo esc_url($pinterest); ?>" name="<?php echo $this->get_field_name('pinterest');?>" class="widefat">
				</label>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('tumblr'); ?>">Tumblr: 
					<input id="<?php echo $this->get_field_id('tumblr'); ?>" type="text" value="<?php echo esc_url($tumblr);?>" name="<?php echo $this->get_field_name('tumblr'); ?>"  class="widefat">
				</label>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('vimeo'); ?>">Vimeo: 
					<input id="<?php echo $this->get_field_id('vimeo'); ?>" type="text" value="<?php echo esc_url($vimeo);?>" name="<?php echo $this->get_field_name('vimeo'); ?>"  class="widefat">
				</label>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('flickr'); ?>">Flickr: 
					<input id="<?php echo $this->get_field_id('flickr'); ?>" type="text" value="<?php echo esc_url($flickr);?>" name="<?php echo $this->get_field_name('flickr'); ?>"  class="widefat">
				</label>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('dribbble'); ?>">Dribbble: 
					<input id="<?php echo $this->get_field_id('dribbble'); ?>" type="text" value="<?php echo esc_url($dribbble);?>" name="<?php echo $this->get_field_name('dribbble'); ?>"  class="widefat">
				</label>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('instagram'); ?>">Instagram: 
					<input id="<?php echo $this->get_field_id('instagram'); ?>" type="text" value="<?php echo esc_url($instagram);?>" name="<?php echo $this->get_field_name('instagram'); ?>"  class="widefat">
				</label>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('skype'); ?>">Skype: 
					<input id="<?php echo $this->get_field_id('skype'); ?>" type="text" value="<?php echo esc_url($skype);?>" name="<?php echo $this->get_field_name('skype'); ?>"  class="widefat">
				</label>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('github'); ?>">Github: 
					<input id="<?php echo $this->get_field_id('github'); ?>" type="text" value="<?php echo esc_url($github);?>" name="<?php echo $this->get_field_name('github'); ?>"  class="widefat">
				</label>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('lastfm'); ?>">Lastfm: 
					<input id="<?php echo $this->get_field_id('lastfm'); ?>" type="text" value="<?php echo esc_url($lastfm);?>" name="<?php echo $this->get_field_name('lastfm'); ?>"  class="widefat">
				</label>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('rdio'); ?>">Rdio: 
					<input id="<?php echo $this->get_field_id('rdio'); ?>" type="text" value="<?php echo esc_url($rdio);?>" name="<?php echo $this->get_field_name('rdio'); ?>"  class="widefat">
				</label>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('social_icon_size'); ?>">Social Icon Size: 
					<input id="<?php echo $this->get_field_id('social_icon_size'); ?>" type="text" value="<?php echo esc_html($social_icon_size);?>" name="<?php echo $this->get_field_name('social_icon_size'); ?>"  class="widefat">
				</label>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('social_icon_style'); ?>">Select Social Icon Style:</label>
				<select class="widefat" name="<?php echo $this->get_field_name('social_icon_style');?>" id="<?php echo $this->get_field_id('social_icon_style'); ?>">
					<option <?php if(isset($social_icon_style)){ selected( $social_icon_style, 'style_one' ); }?> value="style_one">Social Icon One</option>
					<option <?php if(isset($social_icon_style)){ selected( $social_icon_style, 'style_two' ); }?> value="style_two">Social Icon Two</option>
					<option <?php if(isset($social_icon_style)){ selected( $social_icon_style, 'style_three' ); }?> value="style_three">Social Icon Image</option>
				</select>
			</p>
	
		<?php

	}
	function update($new_instance, $old_instance){
		    $instance = $old_instance;
		    $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
		    $instance[ 'facebook' ] = strip_tags( $new_instance[ 'facebook' ] );
		    $instance[ 'twitter' ] = strip_tags( $new_instance[ 'twitter' ] );
		    $instance[ 'gplus' ] = strip_tags( $new_instance[ 'gplus' ] );
			$instance[ 'linkedin' ] = strip_tags( $new_instance[ 'linkedin' ] );
			$instance[ 'pinterest' ] = strip_tags( $new_instance[ 'pinterest' ] );
			$instance[ 'tumblr' ] = strip_tags( $new_instance[ 'tumblr' ] );
			$instance[ 'vimeo' ] = strip_tags( $new_instance[ 'vimeo' ] );
			$instance[ 'flickr' ] = strip_tags( $new_instance[ 'flickr' ] );
			$instance[ 'dribbble' ] = strip_tags( $new_instance[ 'dribbble' ] );
			$instance[ 'instagram' ] = strip_tags( $new_instance[ 'instagram' ] );
			$instance[ 'skype' ] = strip_tags( $new_instance[ 'skype' ] );
			$instance[ 'github' ] = strip_tags( $new_instance[ 'github' ] );
			$instance[ 'lastfm' ] = strip_tags( $new_instance[ 'lastfm' ] );
			$instance[ 'rdio' ] = strip_tags( $new_instance[ 'rdio' ] );
			$instance[ 'social_icon_style' ] = strip_tags( $new_instance[ 'social_icon_style' ] );
			$instance[ 'social_icon_size' ] = strip_tags( $new_instance[ 'social_icon_size' ] );

		    return $instance;

	}
	function widget($args, $instance){
		extract( $args );
		if(isset($instance['title'])){
			$title = $instance['title'];
		}
		
		if(isset($instance['social_icon_style'])){
			$social_icon_style = $instance['social_icon_style'];
		}
		if(isset($instance['social_icon_size'])){
			$social_icon_size = $instance['social_icon_size'];
		}
		
		echo $args['before_widget'];
		echo $args['before_title'].$title.$args['after_title'];
		
		?>
		<style>
			.social-icon-widget ul > li > a [class^="icons-"]{
				font-size: <?php if(!empty($social_icon_size)){echo $social_icon_size;} ?>;
			}
		</style>
		<div class="social-icon-widget">
			<ul>
				<?php 
					
					if ($social_icon_style == 'style_one') {
						$social_icon_one = array('facebook', 'twitter', 'gplus', 'linkedin','pinterest','tumblr','vimeo','flickr','dribbble','instagram','skype','github','lastfm','rdio');
						foreach ($social_icon_one as $social_icon_one_value) {
							if (!empty($instance[''.$social_icon_one_value.''])) {
								echo '<li><a target="_blank" href="'.esc_url($instance[''.$social_icon_one_value.'']).'"><i class="icons-'.$social_icon_one_value.'-circled"></i></a></li>';
							}
						}
					}
					if ($social_icon_style == 'style_two') {
						$social_icon_two = array('facebook', 'twitter', 'gplus', 'linkedin','pinterest','tumblr','vimeo','flickr','dribbble','instagram','skype','github','lastfm','rdio');
						foreach ($social_icon_two as $social_icon_two_value) {
							if (!empty($instance[''.$social_icon_two_value.''])) {
								echo '<li><a target="_blank" href="'.esc_url($instance[''.$social_icon_two_value.'']).'"><i class="icons-'.$social_icon_two_value.'"></i></a></li>';
							}
						}
					}
					if ($social_icon_style == 'style_three') {
						$social_icon_img =  array(
							'facebook', 'twitter', 'gplus','linkedin','pinterest','tumblr','vimeo','flickr','dribbble','instagram','skype','github','lastfm','rdio'
						);
						foreach ($social_icon_img as  $social_icon_img_value) {
							if (!empty($instance[''.$social_icon_img_value.''])) {
								echo '<li><a target="_blank" href="'.esc_url($instance[''.$social_icon_img_value.'']).'"> <img src="' . plugins_url( 'icon/style_3/'.$social_icon_img_value.'.png', __FILE__ ) . '" alt=""> </a></li>';
							}
							
						}
					}
				?>
			</ul>
		</div>
		<?php
			echo $args['after_widget'];
	}
}
?>