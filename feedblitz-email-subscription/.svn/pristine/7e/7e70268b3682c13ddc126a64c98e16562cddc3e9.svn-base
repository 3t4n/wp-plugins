<?php 
/**
* Adds Feedblits widgets widget
*/
class Feedblitswidgets_Widget extends WP_Widget {

	/**
	* Register widget with WordPress
	*/
	function __construct() {
		parent::__construct(
			'feedblitz-email-subscription', // Base ID
			esc_html__( 'Feedblits Email Subscription Form', 'feedblitz-email-subscription' ) // Name
		);
			if ( is_active_widget( false, false, $this->id_base ) && ! is_admin() ) {
			wp_enqueue_style("feedblitz-email-subscription", FEEDBLITZ_EMAIL_SUBSCRIPTION_URL . "css/feedblitz-widget.css");
		}
	}

	/**
	* Widget Fields
	*/
	private $widget_fields = array(
		array(
			'label' => 'Title',
			'id' => 'title',
			'default' => 'Feedblits Notification',
			'type' => 'text',
		),
		array(
			'label' => 'Text',
			'id' => 'text',
			'default' => 'Your email here',
			'type' => 'text',
		),
		array(
			'label' => 'Instructions',
			'id' => 'instructions',
			'default' => 'Enter your email address if you would like to be notified when a new post is posted:',
			'type' => 'textarea',
		),
		array(
			'label' => 'Feed ID',
			'id' => 'feed_id',
			'type' => 'text',
		),
		array(
			'label' => 'Publisher iD',
			'id' => 'publisher_id',
			'type' => 'text',
		),
		array(
			'label' => 'Intro Text',
			'id' => 'intro_text',
			'type' => 'text',
		),
		array(
			'label' => 'Outro Text',
			'id' => 'outro_text',
			'type' => 'text',
		),
		array(
			'label' => 'Submit',
			'id' => 'submit',
			'default' => 'Subscribe',
			'type' => 'text',
		),
	);

	/**
	* Front-end display of widget
	*/
	public function widget( $args, $instance ) {
		echo $args['before_widget'];

		// Output widget title
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}

	  	$title = apply_filters('widget_title', $instance['title']);	
	$text = $instance['text'];
    $feed_id = $instance['feed_id']?$instance['feed_id']:get_option('FEEDID') ;
	$publisher_id = $instance['publisher_id']?$instance['publisher_id']:get_option('PUBLISHER');
	$instructions = $instance['instructions'];
	$intro_text = $instance['intro_text'];
	$submit = $instance['submit']?$instance['submit']:'Subscribe';
	$outro_text = $instance['outro_text'];	
    echo $before_widget;
	
	/*	checks if feed id and publisher id are configured ,display the form if configured properly, else returns error message*/
	if ((!empty($feed_id) && !empty($publisher_id))){
?> 
<form name="feedblitzform"  method="POST" target='popupwindow' action="<?php echo FEEDBLITZ_MAILVERIFY_URL; ?>"  onsubmit="window.open('<?php echo FEEDBLITZ_MAILVERIFY_URL; ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true" _lpchecked="1">
  <p class="sub_instruct"><?php echo $instructions; ?></p>
  <p class="sub_instruct"><?php echo $intro_text; ?></p>
  <p class="feedblitz-email-subscription">
    <input style="display:none" name="EMAIL"  type="text"  value="<?php echo $text; ?>" onblur="if(this.value == '') { this.value='<?php echo $text; ?>'}" onfocus="if (this.value == '<?php echo $text; ?>') {this.value=''}">
    <input name="EMAIL_"  type="hidden"  value="">
    <input name="EMAIL_ADDRESS"  type="hidden" value="">
  </p>
  <p>
<input name="VALIDATE" type="checkbox" required> I agree to be emailed to confirm my subscription to this list</p>
 <input name="cids" type="hidden" value="1">
  <input name="FEEDID" type="hidden" value="<?php  echo $feed_id; ?>">
  <input name="PUBLISHER" type="hidden" value="<?php echo $publisher_id; ?>">
  <input type="submit" value="<?php echo $submit; ?>">
  <p class="sub_instruct"><?php echo $outro_text; ?></p>
</form>
<script>function feedblitzformi(){var x=document.getElementsByName('feedblitzform');for(i=0;i<x.length;i++){x[i].EMAIL.style.display='block'; x[i].action='https://app.feedblitz.com/f/f.Fbz?AddNewUserDirect';}} function feedblitzformis(v){v.submit();}feedblitzformi();</script>
<?php 
  
  }else{
	  echo '<span style="background-color:#FF0000;color:#fff;padding:20px 15px;font-size:12px">WARNING!,Feed ID and Publisher ID Required!</span>';	  
	  }

		
		echo $args['after_widget'];
	}

	/**
	* Back-end widget fields
	*/
	public function field_generator( $instance ) {
		$output = '';
		foreach ( $this->widget_fields as $widget_field ) {
			$widget_value = ! empty( $instance[$widget_field['id']] ) ? $instance[$widget_field['id']] : esc_html__( $widget_field['default'], 'feedblitz-email-subscription' );
			switch ( $widget_field['type'] ) {
				case 'textarea':
					$output .= '<p>';
					$output .= '<label for="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'">'.esc_attr( $widget_field['label'], 'feedblitz-email-subscription' ).':</label> ';
					$output .= '<textarea class="widefat" id="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'" name="'.esc_attr( $this->get_field_name( $widget_field['id'] ) ).'" rows="6" cols="6" value="'.esc_attr( $widget_value ).'">'.$widget_value.'</textarea>';
					$output .= '</p>';
					break;
				default:
					$output .= '<p>';
					$output .= '<label for="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'">'.esc_attr( $widget_field['label'], 'feedblitz-email-subscription' ).':</label> ';
					$output .= '<input class="widefat" id="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'" name="'.esc_attr( $this->get_field_name( $widget_field['id'] ) ).'" type="'.$widget_field['type'].'" value="'.esc_attr( $widget_value ).'">';
					$output .= '</p>';
			}
		}
		echo $output;
	}

	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'feedblitz-email-subscription' );
		
		$this->field_generator( $instance );
	}

	/**
	* Sanitize widget form values as they are saved
	*/
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		foreach ( $this->widget_fields as $widget_field ) {
			switch ( $widget_field['type'] ) {
				case 'checkbox':
					$instance[$widget_field['id']] = $_POST[$this->get_field_id( $widget_field['id'] )];
					break;
				default:
					$instance[$widget_field['id']] = ( ! empty( $new_instance[$widget_field['id']] ) ) ? strip_tags( $new_instance[$widget_field['id']] ) : '';
			}
		}
		return $instance;
	}
} // class Feedblitswidgets_Widget

// register Feedblits widgets widget
function register_feedblitswidgets_widget() {
	register_widget( 'Feedblitswidgets_Widget' );
}
add_action( 'widgets_init', 'register_feedblitswidgets_widget' );