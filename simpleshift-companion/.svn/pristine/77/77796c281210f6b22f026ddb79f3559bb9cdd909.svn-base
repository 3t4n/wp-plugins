<?php


    // frontpage - featured - left
    register_sidebar(array(
        'id' => 'frontpage-featured-left',
        'name' => __('Frontpage Featured Left', 'simpleshift-companion' ),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));

    // frontpage - featured - center
    register_sidebar(array(
        'id' => 'frontpage-featured-center',
        'name' => __('Frontpage Featured Center', 'simpleshift-companion' ),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));
    
    // frontpage - featured - right
    register_sidebar(array(
        'id' => 'frontpage-featured-right',
        'name' => __('Frontpage Featured Right', 'simpleshift-companion' ),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));

       // frontpage - about
    register_sidebar(array(
        'id' => 'frontpage-about',
        'name' => __('Frontpage About', 'simpleshift-companion' ),
        'before_widget' => '<div class="col-sm-3 col-centered item">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));
    
    // frontpage - team - left
    register_sidebar(array(
        'id' => 'frontpage-team-left',
        'name' => __('Frontpage Team Left', 'simpleshift-companion' ),
        'before_widget' => '<div class="team-item" data-sr="wait 0.3s, enter right and move 50px after 1s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="team-item-title">',
        'after_title' => '</h4>'
    ));

    // frontpage - team - center left
    register_sidebar(array(
        'id' => 'frontpage-team-center-left',
        'name' => __('Frontpage Team Center Left', 'simpleshift-companion' ),
        'before_widget' => '<div class="team-item" data-sr="wait 0.3s, enter right and move 50px after 1s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="team-item-title">',
        'after_title' => '</h4>'
    ));
    
    // frontpage - team - center right
    register_sidebar(array(
        'id' => 'frontpage-team-center-right',
        'name' => __('Frontpage Team Center Right', 'simpleshift-companion' ),
        'before_widget' => '<div class="team-item" data-sr="wait 0.3s, enter right and move 50px after 1s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="team-item-title">',
        'after_title' => '</h4>'
    ));
    
    // frontpage - team - right
    register_sidebar(array(
        'id' => 'frontpage-team-right',
        'name' => __('Frontpage Team Right', 'simpleshift-companion' ),
        'before_widget' => '<div class="team-item" data-sr="wait 0.3s, enter right and move 50px after 1s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="team-item-title">',
        'after_title' => '</h4>'
    ));   
    
    // frontpage - social
    register_sidebar(array(
        'id' => 'frontpage-social-media',
        'name' => __('Frontpage Social Media', 'simpleshift-companion' ),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => ''
    ));



// #################################################
// About Row Content Widget
// #################################################

class simpleshift_about_content_widget extends WP_Widget {
    
    // Register widget
    function __construct() {
        parent::__construct(
          'simpleshift-about-content-widget', // Base ID
          __('Simpleshift - About Content Widget', 'simpleshift-companion' ), // Name
          array( 'description' => __('Display about content boxes on the frontpage', 'simpleshift-companion' ))  // Description
        );
    }
    
    // Create output function
    public function widget($args, $instance) {
		echo $args['before_widget'];
		?>
	        <a href="#">
	        	<i class="fa <?php if ( ! empty( $instance['faclass'] ) ) { echo esc_attr($instance['faclass']); } ?>"></i>
	            <?php if ( ! empty( $instance['title'] ) ) { 
	                echo $args['before_title'] . esc_html($instance['title']) . $args['after_title']; 
	            } ?>
	        	<p>
	                <?php if ( ! empty( $instance['description'] ) ) { 
	                    echo esc_html($instance['description']); 
	                } ?>
	        	</p>
	        </a>
		<?php
		echo $args['after_widget'];
    }  
    
    // Create widget form
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Title', 'simpleshift-companion' );
		$description = ! empty( $instance['description'] ) ? $instance['description'] : __( 'Description text.', 'simpleshift-companion' );
		$faclass = ! empty( $instance['faclass'] ) ? $instance['faclass'] : __( 'fa-star', 'simpleshift-companion' );
		?>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php _e( 'Title:', 'simpleshift-companion' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_html( $title ); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'description' )); ?>"><?php _e( 'Description:', 'simpleshift-companion' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'description' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'description' )); ?>" type="text" value="<?php echo esc_html( $description ); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'faclass' )); ?>"><?php _e( 'FontAwesome Class:', 'simpleshift-companion' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'faclass' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'faclass' )); ?>" type="text" value="<?php echo esc_html( $faclass ); ?>">
		</p>
		<?php 
	}
    
    // Save stuff
    public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['description'] = ( ! empty( $new_instance['description'] ) ) ? $new_instance['description'] : '';
        $instance['faclass'] = ( ! empty( $new_instance['faclass'] ) ) ? $new_instance['faclass'] : '';	
		return $instance;
	}
        
}

// Register about row content widget
function register_simpleshift_about_content_widget() {
    register_widget( 'simpleshift_about_content_widget' );
}
add_action( 'widgets_init', 'register_simpleshift_about_content_widget' );



// #################################################
// Featured Row Content Widget
// #################################################

class simpleshift_featured_content_widget extends WP_Widget {
    
    // Register widget
    function __construct() {
        parent::__construct(
          'simpleshift-featured-content-widget', // Base ID
          __('Simpleshift - Featured Content Widget', 'simpleshift-companion' ), // Name
          array( 'description' => __('Display about content boxes on the frontpage', 'simpleshift-companion' ))  // Description
        );
    }
    
    // Create output function
    public function widget($args, $instance) {
		echo $args['before_widget'];
		?>
            <div class="frontpage_featured_item">
                <i class="fa <?php if ( ! empty( $instance['faclass'] ) ) { echo esc_attr($instance['faclass']); } ?>"></i>
                <?php if ( ! empty( $instance['title'] ) ) { 
                    echo $args['before_title'] . esc_html($instance['title']) . $args['after_title']; 
                } ?>
                <?php if ( ! empty( $instance['description'] ) ) { 
                    echo esc_html($instance['description']); 
                } ?>
            </div>
		<?php
		echo $args['after_widget'];
    }  
    
    // Create widget form
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Title', 'simpleshift-companion' );
		$description = ! empty( $instance['description'] ) ? $instance['description'] : __( 'Description text.', 'simpleshift-companion' );
		$faclass = ! empty( $instance['faclass'] ) ? $instance['faclass'] : __( 'fa-star', 'simpleshift-companion' );
		?>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php _e( 'Title:', 'simpleshift-companion' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_html( $title ); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'description' )); ?>"><?php _e( 'Description:', 'simpleshift-companion' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'description' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'description' )); ?>" type="text" value="<?php echo esc_html( $description ); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'faclass' )); ?>"><?php _e( 'FontAwesome Class:', 'simpleshift-companion' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'faclass' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'faclass' )); ?>" type="text" value="<?php echo esc_html( $faclass ); ?>">
		</p>
		<?php 
	}
    
    // Save stuff
    public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['description'] = ( ! empty( $new_instance['description'] ) ) ? $new_instance['description'] : '';
        $instance['faclass'] = ( ! empty( $new_instance['faclass'] ) ) ? $new_instance['faclass'] : '';	
		return $instance;
	}
        
}

// Register about row content widget
function register_simpleshift_featured_content_widget() {
    register_widget( 'simpleshift_featured_content_widget' );
}
add_action( 'widgets_init', 'register_simpleshift_featured_content_widget' );




// #################################################
// Team Row Content Widget
// #################################################

class simpleshift_team_content_widget extends WP_Widget {
    
    // Register widget
    function __construct() {
        parent::__construct(
          'simpleshift-team-content-widget', // Base ID
          __('Simpleshift - Team Content Widget', 'simpleshift-companion' ), // Name
          array( 'description' => __('Display team content boxes on the frontpage', 'simpleshift-companion' )) // Description
        );
    }
    
    // Create output function
    public function widget($args, $instance) {
		echo $args['before_widget'];
		?>
            <img class="img-responsive img-circle center-block" src="<?php if ( ! empty( $instance['imgurl184sq'] ) ) { echo esc_url($instance['imgurl184sq']); } ?>" />
            <h4 class="team-item-title">
                <?php if ( ! empty( $instance['name'] ) ) { 
                    echo esc_html($instance['name']); 
                } ?>            	
            </h4>
            <h5 class="team-item-sub-title">
                <?php if ( ! empty( $instance['title'] ) ) { 
                    echo esc_html($instance['title']); 
                } ?> 
            </h5>
            <p class="team-social-icons">
            	<?php if (!empty( $instance['social1']) && !empty( $instance['faclass1'])) { ?>
            		<a href="<?php echo esc_url($instance['social1']); ?>"><i class="fa <?php echo esc_attr($instance['faclass1']); ?>"></i></a>
            	<?php } ?>
            	<?php if (!empty( $instance['social2']) && !empty( $instance['faclass2'])) { ?>
            		<a href="<?php echo esc_url($instance['social2']); ?>"><i class="fa <?php echo esc_attr($instance['faclass2']); ?>"></i></a>
            	<?php } ?>
            	<?php if (!empty( $instance['social3']) && !empty( $instance['faclass3'])) { ?>
            		<a href="<?php echo esc_url($instance['social3']); ?>"><i class="fa <?php echo esc_attr($instance['faclass3']); ?>"></i></a>
            	<?php } ?>
            </p>  
		<?php
		echo $args['after_widget'];
    }  
    
    // Create widget form
	public function form( $instance ) {
		$imgurl184sq = ! empty( $instance['imgurl184sq'] ) ? $instance['imgurl184sq'] : __( '', 'simpleshift-companion' );
		$name = ! empty( $instance['name'] ) ? $instance['name'] : __( '', 'simpleshift-companion' );
		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( '', 'simpleshift-companion' );
		$social1 = ! empty( $instance['social1'] ) ? $instance['social1'] : __( '', 'simpleshift-companion' );
		$faclass1 = ! empty( $instance['faclass1'] ) ? $instance['faclass1'] : __( '', 'simpleshift-companion' );
		$social2 = ! empty( $instance['social2'] ) ? $instance['social2'] : __( '', 'simpleshift-companion' );
		$faclass2 = ! empty( $instance['faclass2'] ) ? $instance['faclass2'] : __( '', 'simpleshift-companion' );
		$social3 = ! empty( $instance['social3'] ) ? $instance['social3'] : __( '', 'simpleshift-companion' );
		$faclass3 = ! empty( $instance['faclass3'] ) ? $instance['faclass3'] : __( '', 'simpleshift-companion' );
		
		
		
		?>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'imgurl184sq' )); ?>"><?php _e( 'Headshot Image (184x184px):', 'simpleshift-companion' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'imgurl184sq' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'imgurl184sq' )); ?>" type="text" value="<?php echo esc_html( $imgurl184sq ); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'name' )); ?>"><?php _e( 'Name:', 'simpleshift-companion' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'name' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'name' )); ?>" type="text" value="<?php echo esc_html( $name ); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php _e( 'Title:', 'simpleshift-companion' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_html( $title ); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'social1' )); ?>"><?php _e( 'Social Media Link #1:', 'simpleshift-companion' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'social1' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'social1' )); ?>" type="text" value="<?php echo esc_html( $social1 ); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'faclass1' )); ?>"><?php _e( 'FontAwesome Class #1:', 'simpleshift-companion' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'faclass1' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'faclass1' )); ?>" type="text" value="<?php echo esc_html( $faclass1 ); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'social2' )); ?>"><?php _e( 'Social Media Link #2:', 'simpleshift-companion' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'social2' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'social2' )); ?>" type="text" value="<?php echo esc_html( $social2 ); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'faclass2' )); ?>"><?php _e( 'FontAwesome Class #2:', 'simpleshift-companion' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'faclass2' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'faclass2' )); ?>" type="text" value="<?php echo esc_html( $faclass2 ); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'social3' )); ?>"><?php _e( 'Social Media Link #3:', 'simpleshift-companion' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'social3' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'social3' )); ?>" type="text" value="<?php echo esc_html( $social3 ); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'faclass3' )); ?>"><?php _e( 'FontAwesome Class #3:', 'simpleshift-companion' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'faclass3' )); ?>" name="<?php echo $this->get_field_name( 'faclass3' ); ?>" type="text" value="<?php echo esc_html( $faclass3 ); ?>">
		</p>


		
		<?php 
	}
    
    // Save stuff
    public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['imgurl184sq'] = ( ! empty( $new_instance['imgurl184sq'] ) ) ? $new_instance['imgurl184sq'] : '';
		$instance['name'] = ( ! empty( $new_instance['name'] ) ) ? $new_instance['name'] : '';
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? $new_instance['title'] : '';
		$instance['social1'] = ( ! empty( $new_instance['social1'] ) ) ? $new_instance['social1'] : '';
		$instance['faclass1'] = ( ! empty( $new_instance['faclass1'] ) ) ? $new_instance['faclass1'] : '';
		$instance['social2'] = ( ! empty( $new_instance['social2'] ) ) ? $new_instance['social2'] : '';
		$instance['faclass2'] = ( ! empty( $new_instance['faclass2'] ) ) ? $new_instance['faclass2'] : '';
		$instance['social3'] = ( ! empty( $new_instance['social3'] ) ) ? $new_instance['social3'] : '';
		$instance['faclass3'] = ( ! empty( $new_instance['faclass3'] ) ) ? $new_instance['faclass3'] : '';
		return $instance;
	}
        
}

// Register widget
function register_simpleshift_team_content_widget() {
    register_widget( 'simpleshift_team_content_widget' );
}
add_action( 'widgets_init', 'register_simpleshift_team_content_widget' );



// #################################################
// Social Media Row Content Widget
// #################################################

class simpleshift_social_content_widget extends WP_Widget {
    
    // Register widget
    function __construct() {
        parent::__construct(
          'simpleshift-social-content-widget', // Base ID
          __('Simpleshift - Social Media Content Widget', 'simpleshift-companion' ), // Name
          array( 'description' => __('Display social content boxes on the frontpage', 'simpleshift-companion' ))  // Description
        );
    }
    
    // Create output function
    public function widget($args, $instance) {
		echo $args['before_widget'];
		?>
			<div data-sr="wait 0.2s, scale up 25%">
	            <a href="<?php if ( ! empty( $instance['url'] ) ) { echo esc_url($instance['url']); } ?>">
	            	<i class="fa <?php if ( ! empty( $instance['faclass'] ) ) { echo esc_attr($instance['faclass']); } ?>"></i><br>
	            	<span class="social-item-title h5">
		                <?php if ( ! empty( $instance['title'] ) ) { 
		                    echo esc_html($instance['title']); 
		                } ?> 	
	            	</span><br>
	            	<span class="social-item-sub-title h5">
		                <?php if ( ! empty( $instance['sub-title'] ) ) { 
		                    echo esc_html($instance['sub-title']); 
		                } ?>
	            	</span>
	            </a>  
            </div>
		<?php
		echo $args['after_widget'];
    }  
    
    // Create widget form
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'New title', 'simpleshift-companion' );
		$sub_title = ! empty( $instance['sub-title'] ) ? $instance['sub-title'] : __( '', 'simpleshift-companion' );
		$faclass = ! empty( $instance['faclass'] ) ? $instance['faclass'] : __( 'fa-star', 'simpleshift-companion' );
		$url = ! empty( $instance['url'] ) ? $instance['url'] : __( '', 'simpleshift-companion' );
		?>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php _e( 'Title:', 'simpleshift-companion' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_html( $title ); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'sub-title' )); ?>"><?php _e( 'Sub-title:', 'simpleshift-companion' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'sub-title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'sub-title' )); ?>" type="text" value="<?php echo esc_html( $sub_title ); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'faclass' )); ?>"><?php _e( 'FontAwesome Class:', 'simpleshift-companion' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'faclass' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'faclass' )); ?>" type="text" value="<?php echo esc_html( $faclass ); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'url' )); ?>"><?php _e( 'URL:', 'simpleshift-companion' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'url' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'url' )); ?>" type="text" value="<?php echo esc_html( $url ); ?>">
		</p>
		<?php 
	}
    
    // Save stuff
    public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['sub-title'] = ( ! empty( $new_instance['sub-title'] ) ) ? $new_instance['sub-title'] : '';
        $instance['faclass'] = ( ! empty( $new_instance['faclass'] ) ) ? $new_instance['faclass'] : '';	
	    $instance['url'] = ( ! empty( $new_instance['url'] ) ) ? $new_instance['url'] : '';
		return $instance;
	}
        
}

// Register widget
function register_simpleshift_social_content_widget() {
    register_widget( 'simpleshift_social_content_widget' );
}
add_action( 'widgets_init', 'register_simpleshift_social_content_widget' );