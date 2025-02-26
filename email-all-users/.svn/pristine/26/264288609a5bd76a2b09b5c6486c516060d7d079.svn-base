<?php
/*
Plugin Name: Email All Users
Plugin URI: https://zodor.se/productions/iphone-apps/email-all-users/
Description: Create a mailto hyperlink to all registered users allowing mass email
Author: Zodor Productions
Author URI: https://zodor.se/
Version: 1.5
License: GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: wporg
Domain Path: /languages

*/
/* Start Adding Functions Below this Line */
  
// Register and load the widget

function wpb_load_widget() {
    register_widget( 'wpb_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );
 
// Creating the widget 
class wpb_widget extends WP_Widget {
 
function __construct() {
parent::__construct(
 
// Base ID of your widget
'wpb_widget', 
 
// Widget name will appear in UI
__('Send Mail To All Users', 'wpb_widget_domain'), 
 
// Widget description
array( 'description' => __( 'Creates mailto link to all registered users who is allowing mass mail', 'wpb_widget_domain' ), ) 
);
}
 
// Creating widget front-end
 
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
$link_title = apply_filters( 'widget_title', $instance['link_title'] );
$link_separator = apply_filters( 'widget_title', $instance['link_separator'] );

// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
	echo $args['before_title'] . $title . $args['after_title'];
 
// This is where you run the code and display the output

	// START

    $mailusersListTable = get_users();

    ?>
    <div class="wrap">
        
        <div id="icon-users" class="icon32"><br/></div>
        <?php
	    if (is_user_logged_in())
	       echo '<a href="mailto:';
	    else
	       echo '<a href="/community/?wpforo=signin"';
	    $first = 0;

	    if (is_user_logged_in()) {
	       for( $i = 1; $i < count($mailusersListTable); $i++) {
                if (isset($mailusersListTable[$i])) {
                    if (isset($mailusersListTable[$i]->email_users_accept_mass_emails)) {
                        if ($mailusersListTable[$i]->email_users_accept_mass_emails == "true") {
	                   		if ($first > 0) echo ";";
	                     	echo $mailusersListTable[$i]->data->user_email;
	                      	$first = 1;
	                   	}
                    } else {
                       	if ($first > 0) echo ";";
                    	echo $mailusersListTable[$i]->data->user_email;
                    	$first = 1;
	               	}
		   		}
            }
        }
        echo '">';
	    if (is_user_logged_in()) {
	       if ( ! empty( $link_title ) )
	          echo "<span style='color:yellow'>Outlook:</span> " . $link_title;
	       else 
 	          echo "<span style='color:yellow'>Outlook:</span> Mail to all users";
	    } else {
	       echo "You are not logged in!";
	    }
 	    echo '</a>';

		 if (is_user_logged_in())
		 echo '<a href="mailto:';
	  else
		 echo '<a href="/community/?wpforo=signin"';
	  $first = 0;

	  if (is_user_logged_in()) {
		 for( $i = 1; $i < count($mailusersListTable); $i++) {
			  if (isset($mailusersListTable[$i])) {
				  if (isset($mailusersListTable[$i]->email_users_accept_mass_emails)) {
					  if ($mailusersListTable[$i]->email_users_accept_mass_emails == "true") {
							 if ($first > 0) echo $link_separator;
						   echo $mailusersListTable[$i]->data->user_email;
							$first = 1;
						 }
				  } else {
						 if ($first > 0) echo $link_separator;
					  echo $mailusersListTable[$i]->data->user_email;
					  $first = 1;
					 }
				 }
		  }
	  }
	  echo '"><br />';
	  if (is_user_logged_in()) {
		 if ( ! empty( $link_title ) )
			echo "<span style='color:yellow'>Gmail/Other:</span> " . $link_title;
		 else 
			 echo "<span style='color:yellow'>Gmail/Other:</span> Mail to all users";
	  } else {
		 echo "You are not logged in!";
	  }
	   echo '</a>';
	  ?>
    </div>

	<?php
	// END
	echo $args['after_widget']; 
}
         
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) )
{
	$title = $instance[ 'title' ];
}
else 
{
	$title = __( 'Email All Users', 'wpb_widget_domain' );
}

if ( isset( $instance[ 'link_title' ] ) ) 
{
	$link_title = $instance[ 'link_title' ];
}
else
{
	$link_title = __( 'Mailinglist', 'wpb_widget_domain' );
}

if ( isset( $instance[ 'link_separator' ] ) )
{
	$link_separator = $instance[ 'link_separator' ];
}
else
{
	$link_separator = __( ',', 'wpb_widget_domain' );
}
	
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />

<label for="<?php echo $this->get_field_id( 'link_title' ); ?>"><?php _e( 'Linktitle:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'link_title' ); ?>" name="<?php echo $this->get_field_name( 'link_title' ); ?>" type="text" value="<?php echo esc_attr( $link_title ); ?>" />

<label for="<?php echo $this->get_field_id( 'link_separator' ); ?>"><?php _e( 'Separator:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'link_separator' ); ?>" name="<?php echo $this->get_field_name( 'link_separator' ); ?>" type="text" value="<?php echo esc_attr( $link_separator ); ?>" />

</p>
<?php 
}
     
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
	$instance = array();
	$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
	$instance['link_title'] = wp_kses_post( $new_instance['link_title'] );
	$instance['link_separator'] = wp_kses_post( $new_instance['link_separator'] );
//	$instance['link_title'] = ( ! empty( $new_instance['link_title'] ) ) ? strip_tags( $new_instance['link_title'] ) : '';
	return $instance;
}
} // Class wpb_widget ends here

/* Stop Adding Functions Below this Line */
?>