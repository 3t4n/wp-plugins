<?php
/*
Plugin Name: 2RHYTHMS Radio
Description: Adds the 2RHYTHMS Radio widget to your website. More than 5,000 streaming stations in over 20 genres. 
Version: 2.2
*/

// Create class
class Radio_widget extends WP_Widget {

	function __construct() {
		parent::__construct(
		'wpb_widget', 
		__('2RHYTHMS Radio', 'wpb_widget_domain'), // Widget name will appear in UI
		array( 'description' => __( 'Add the 2RHYTHMS Radio widget to your website', 'wpb_widget_domain' ), )
		);// Widget description
	}//End function

	// Widget front-end
	public function widget( $args, $instance ) {
	
		$title = apply_filters( 'widget_title', $instance['title'] );
		$s_0 = $instance['s_0'] ? 'true' : 'false';
		$s_1 = $instance['s_1'] ? 'true' : 'false';
		$s_2 = $instance['s_2'] ? 'true' : 'false';
		$s_3 = $instance['s_3'] ? 'true' : 'false';
		$s_4 = $instance['s_4'] ? 'true' : 'false';
		$s_5 = $instance['s_5'] ? 'true' : 'false';
		$s_6 = $instance['s_6'] ? 'true' : 'false';
		$s_7 = $instance['s_7'] ? 'true' : 'false';
		$s_8 = $instance['s_8'] ? 'true' : 'false';
		$s_9 = $instance['s_9'] ? 'true' : 'false';
		$s_10 = $instance['s_10'] ? 'true' : 'false';
		$s_11 = $instance['s_11'] ? 'true' : 'false';
		$s_12 = $instance['s_12'] ? 'true' : 'false';
		$s_13 = $instance['s_13'] ? 'true' : 'false';
		$s_14 = $instance['s_14'] ? 'true' : 'false';
		$s_15 = $instance['s_15'] ? 'true' : 'false';
		$s_16 = $instance['s_16'] ? 'true' : 'false';
		$s_17 = $instance['s_17'] ? 'true' : 'false';
		$s_18 = $instance['s_18'] ? 'true' : 'false';
		$s_19 = $instance['s_19'] ? 'true' : 'false';
		$s_20 = $instance['s_20'] ? 'true' : 'false';
		$s_21 = $instance['s_21'] ? 'true' : 'false';
		$s_22 = $instance['s_22'] ? 'true' : 'false';
		$s_23 = $instance['s_23'] ? 'true' : 'false';
		$s_24 = $instance['s_24'] ? 'true' : 'false';

		// Before and after widget arguments are defined by themes
		echo $args['before_widget'];
		if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];
			
			// Build genre string
			$g="&g=";
			
			if ($s_0=="true"){$g.="0_";}
			if ($s_1=="true"){$g.="1_";}
			if ($s_2=="true"){$g.="2_";}
			if ($s_3=="true"){$g.="3_";}
			if ($s_4=="true"){$g.="4_";}
			if ($s_5=="true"){$g.="5_";}
			if ($s_6=="true"){$g.="6_";}
			if ($s_7=="true"){$g.="7_";}
			if ($s_8=="true"){$g.="8_";}
			if ($s_9=="true"){$g.="9_";}
			if ($s_10=="true"){$g.="10_";}
			if ($s_11=="true"){$g.="11_";}
			if ($s_12=="true"){$g.="12_";}
			if ($s_13=="true"){$g.="13_";}
			if ($s_14=="true"){$g.="14_";}
			if ($s_15=="true"){$g.="15_";}
			if ($s_16=="true"){$g.="16_";}
			if ($s_17=="true"){$g.="17_";}
			if ($s_18=="true"){$g.="18_";}
			if ($s_19=="true"){$g.="19_";}
			if ($s_20=="true"){$g.="20_";}
			if ($s_21=="true"){$g.="21_";}
			if ($s_22=="true"){$g.="22_";}
			if ($s_23=="true"){$g.="23_";}
			if ($s_24=="true"){$g.="24_";}
			
			// Display the output
			echo "<center><iframe src=\"http://radio.2rhythms.org/?s=1&e=true".$g."\" style=\"height: 110px; width: 210px; border: 0px;\" scrolling=\"no\></iframe></center>";
			echo $args['after_widget'];
		}//End if
		
		// Widget Backend 
		public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}else{
			$title = __( '2RHYTHMS Radio', 'wpb_widget_domain' );
		}//End if

		// Admin form
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
		Genres : Leave all boxes below unchecked to display all genres. If you only want specific genres, check those boxes.
		</p>
		<p>
		<input class="checkbox" type="checkbox" <?php checked($instance['s_0'], 'on'); ?> $c0 id="<?php echo $this->get_field_id('s_0'); ?>" name="<?php echo $this->get_field_name('s_0'); ?>" /> 
		<label for="<?php echo $this->get_field_id('s_0'); ?>">Alternative</label>
		</p>
		<p>
		<input class="checkbox" type="checkbox" <?php checked($instance['s_1'], 'on'); ?> id="<?php echo $this->get_field_id('s_1'); ?>" name="<?php echo $this->get_field_name('s_1'); ?>" /> 
		<label for="<?php echo $this->get_field_id('s_1'); ?>">Blues</label>
		</p>
		<p>
		<input class="checkbox" type="checkbox" <?php checked($instance['s_24'], 'on'); ?> id="<?php echo $this->get_field_id('s_24'); ?>" name="<?php echo $this->get_field_name('s_24'); ?>" /> 
		<label for="<?php echo $this->get_field_id('s_24'); ?>">Christian</label>
		</p>
		<p>
		<input class="checkbox" type="checkbox" <?php checked($instance['s_2'], 'on'); ?> id="<?php echo $this->get_field_id('s_2'); ?>" name="<?php echo $this->get_field_name('s_2'); ?>" /> 
		<label for="<?php echo $this->get_field_id('s_2'); ?>">Classical</label>
		</p>
		<p>
		<input class="checkbox" type="checkbox" <?php checked($instance['s_3'], 'on'); ?> id="<?php echo $this->get_field_id('s_3'); ?>" name="<?php echo $this->get_field_name('s_3'); ?>" /> 
		<label for="<?php echo $this->get_field_id('s_3'); ?>">Country</label>
		</p>
		<p>
		<input class="checkbox" type="checkbox" <?php checked($instance['s_4'], 'on'); ?> id="<?php echo $this->get_field_id('s_4'); ?>" name="<?php echo $this->get_field_name('s_4'); ?>" /> 
		<label for="<?php echo $this->get_field_id('s_4'); ?>">Decades</label>
		</p>
		<p>
		<input class="checkbox" type="checkbox" <?php checked($instance['s_5'], 'on'); ?> id="<?php echo $this->get_field_id('s_5'); ?>" name="<?php echo $this->get_field_name('s_5'); ?>" /> 
		<label for="<?php echo $this->get_field_id('s_5'); ?>">Easy Listening</label>
		</p>
		<p>
		<input class="checkbox" type="checkbox" <?php checked($instance['s_6'], 'on'); ?> id="<?php echo $this->get_field_id('s_6'); ?>" name="<?php echo $this->get_field_name('s_6'); ?>" /> 
		<label for="<?php echo $this->get_field_id('s_6'); ?>">Electronic</label>
		</p>
		<p>
		<input class="checkbox" type="checkbox" <?php checked($instance['s_7'], 'on'); ?> id="<?php echo $this->get_field_id('s_7'); ?>" name="<?php echo $this->get_field_name('s_7'); ?>" /> 
		<label for="<?php echo $this->get_field_id('s_7'); ?>">Folk</label>
		</p>
		<p>
		<input class="checkbox" type="checkbox" <?php checked($instance['s_8'], 'on'); ?> id="<?php echo $this->get_field_id('s_8'); ?>" name="<?php echo $this->get_field_name('s_8'); ?>" /> 
		<label for="<?php echo $this->get_field_id('s_8'); ?>">Inspirational</label>
		</p>
		<p>
		<input class="checkbox" type="checkbox" <?php checked($instance['s_9'], 'on'); ?> id="<?php echo $this->get_field_id('s_9'); ?>" name="<?php echo $this->get_field_name('s_9'); ?>" /> 
		<label for="<?php echo $this->get_field_id('s_9'); ?>">International</label>
		</p>
		<p>
		<input class="checkbox" type="checkbox" <?php checked($instance['s_10'], 'on'); ?> id="<?php echo $this->get_field_id('s_10'); ?>" name="<?php echo $this->get_field_name('s_10'); ?>" /> 
		<label for="<?php echo $this->get_field_id('s_10'); ?>">Jazz</label>
		</p>
		<p>
		<input class="checkbox" type="checkbox" <?php checked($instance['s_11'], 'on'); ?> id="<?php echo $this->get_field_id('s_11'); ?>" name="<?php echo $this->get_field_name('s_11'); ?>" /> 
		<label for="<?php echo $this->get_field_id('s_11'); ?>">Latin</label>
		</p>
		<p>
		<input class="checkbox" type="checkbox" <?php checked($instance['s_12'], 'on'); ?> id="<?php echo $this->get_field_id('s_12'); ?>" name="<?php echo $this->get_field_name('s_12'); ?>" /> 
		<label for="<?php echo $this->get_field_id('s_12'); ?>">Metal</label>
		</p>
		<p>
		<input class="checkbox" type="checkbox" <?php checked($instance['s_13'], 'on'); ?> id="<?php echo $this->get_field_id('s_13'); ?>" name="<?php echo $this->get_field_name('s_13'); ?>" /> 
		<label for="<?php echo $this->get_field_id('s_13'); ?>">Misc</label>
		</p>
		<p>
		<input class="checkbox" type="checkbox" <?php checked($instance['s_14'], 'on'); ?> id="<?php echo $this->get_field_id('s_14'); ?>" name="<?php echo $this->get_field_name('s_14'); ?>" /> 
		<label for="<?php echo $this->get_field_id('s_14'); ?>">New Age</label>
		</p>
		<p>
		<input class="checkbox" type="checkbox" <?php checked($instance['s_15'], 'on'); ?> id="<?php echo $this->get_field_id('s_15'); ?>" name="<?php echo $this->get_field_name('s_15'); ?>" /> 
		<label for="<?php echo $this->get_field_id('s_15'); ?>">Pop</label>
		</p>
		<p>
		<input class="checkbox" type="checkbox" <?php checked($instance['s_16'], 'on'); ?> id="<?php echo $this->get_field_id('s_16'); ?>" name="<?php echo $this->get_field_name('s_16'); ?>" /> 
		<label for="<?php echo $this->get_field_id('s_16'); ?>">Public Radio</label>
		</p>
		<p>
		<input class="checkbox" type="checkbox" <?php checked($instance['s_17'], 'on'); ?> id="<?php echo $this->get_field_id('s_17'); ?>" name="<?php echo $this->get_field_name('s_17'); ?>" /> 
		<label for="<?php echo $this->get_field_id('s_17'); ?>">Rap</label>
		</p>
		<p>
		<input class="checkbox" type="checkbox" <?php checked($instance['s_18'], 'on'); ?> id="<?php echo $this->get_field_id('s_18'); ?>" name="<?php echo $this->get_field_name('s_18'); ?>" /> 
		<label for="<?php echo $this->get_field_id('s_18'); ?>">Reggae</label>
		</p>
		<p>
		<input class="checkbox" type="checkbox" <?php checked($instance['s_19'], 'on'); ?> id="<?php echo $this->get_field_id('s_19'); ?>" name="<?php echo $this->get_field_name('s_19'); ?>" /> 
		<label for="<?php echo $this->get_field_id('s_19'); ?>">Rock</label>
		</p>
		<p>
		<input class="checkbox" type="checkbox" <?php checked($instance['s_20'], 'on'); ?> id="<?php echo $this->get_field_id('s_20'); ?>" name="<?php echo $this->get_field_name('s_20'); ?>" /> 
		<label for="<?php echo $this->get_field_id('s_20'); ?>">Seasonal</label>
		</p>
		<p>
		<input class="checkbox" type="checkbox" <?php checked($instance['s_21'], 'on'); ?> id="<?php echo $this->get_field_id('s_21'); ?>" name="<?php echo $this->get_field_name('s_21'); ?>" /> 
		<label for="<?php echo $this->get_field_id('s_21'); ?>">Soundtrack</label>
		</p>
		<p>
		<input class="checkbox" type="checkbox" <?php checked($instance['s_22'], 'on'); ?> id="<?php echo $this->get_field_id('s_22'); ?>" name="<?php echo $this->get_field_name('s_22'); ?>" /> 
		<label for="<?php echo $this->get_field_id('s_22'); ?>">Talk</label>
		</p>
		<p>
		<input class="checkbox" type="checkbox" <?php checked($instance['s_23'], 'on'); ?> id="<?php echo $this->get_field_id('s_23'); ?>" name="<?php echo $this->get_field_name('s_23'); ?>" /> 
		<label for="<?php echo $this->get_field_id('s_23'); ?>">Themes</label>
		</p>
		<?php 
	}//End function
	
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
	$instance = array();
	$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
	$instance['s_0'] = $new_instance['s_0'];
	$instance['s_1'] = $new_instance['s_1'];
	$instance['s_2'] = $new_instance['s_2'];
	$instance['s_3'] = $new_instance['s_3'];
	$instance['s_4'] = $new_instance['s_4'];
	$instance['s_5'] = $new_instance['s_5'];
	$instance['s_6'] = $new_instance['s_6'];
	$instance['s_7'] = $new_instance['s_7'];
	$instance['s_8'] = $new_instance['s_8'];
	$instance['s_9'] = $new_instance['s_9'];
	$instance['s_10'] = $new_instance['s_10'];
	$instance['s_11'] = $new_instance['s_11'];
	$instance['s_12'] = $new_instance['s_12'];
	$instance['s_13'] = $new_instance['s_13'];
	$instance['s_14'] = $new_instance['s_14'];
	$instance['s_15'] = $new_instance['s_15'];
	$instance['s_16'] = $new_instance['s_16'];
	$instance['s_17'] = $new_instance['s_17'];
	$instance['s_18'] = $new_instance['s_18'];
	$instance['s_19'] = $new_instance['s_19'];
	$instance['s_20'] = $new_instance['s_20'];
	$instance['s_21'] = $new_instance['s_21'];
	$instance['s_22'] = $new_instance['s_22'];
	$instance['s_23'] = $new_instance['s_23'];
	$instance['s_24'] = $new_instance['s_24'];
	return $instance;
	}//End function
} // End class

// Register and load the widget
function wpb_load_widget() {
	register_widget( 'Radio_widget' );
}//End function
add_action( 'widgets_init', 'wpb_load_widget' );

?>