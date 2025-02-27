<?php
/**
* Real Estate Manager - This Class handles all hook (filters + actions) for templates
*/
class REM_Hooks
{
	
	function __construct(){
		add_action( 'rem_agent_picture', array($this, 'agent_picture'), 10, 1 );
		add_action( 'rem_property_details_icons', array($this, 'property_icons'), 20, 1 );
		add_action( 'rem_property_picture', array($this, 'property_picture'), 10, 2 );
		add_action( 'rem_property_box', array($this, 'property_box'), 10, 2 );
        add_action( 'rem_single_property_agent', array($this, 'single_property_agent_form'), 10, 1 );

        // Emails Hooks
        add_action( 'rem_new_agent_register', array($this, 'new_agent_registered' ), 10, 1 );
        add_action( 'rem_new_agent_approved', array($this, 'new_agent_approved' ), 10, 1 );
        add_action( 'rem_new_agent_rejected', array($this, 'new_agent_rejected' ), 10, 1 );		
	}

	function agent_picture($user_id){
		if(get_the_author_meta( 'rem_agent_meta_image', $user_id ) != '') {
			echo '<img src="'.esc_url_raw( get_the_author_meta( 'rem_agent_meta_image', $user_id ) ).'">';
		} else {
			echo get_avatar( $user_id , 512 );
		}		
	}

	function property_picture($id = '', $thumbnail = 'medium'){
		if ($id == '') {
			global $post;
			$id = $post->ID;
		}

	    if( has_post_thumbnail($id) ){
	    	echo get_the_post_thumbnail( $id, $thumbnail, array('class' => 'img-responsive', 'data-pid' => $id ) );
	    }
	}

	function property_box($property_id, $style = '3'){
		global $rem_ob;
		$price = $rem_ob->get_price($property_id);
		$area = get_post_meta($property_id, 'rem_property_area', true);
		$property_type = get_post_meta($property_id, 'rem_property_type', true);
		$address = get_post_meta($property_id, 'rem_property_address', true);
		$latitude = get_post_meta($property_id, 'rem_property_latitude', true);
		$longitude = get_post_meta($property_id, 'rem_property_longitude', true);
		$city = get_post_meta($property_id, 'rem_property_city', true);
		$country = get_post_meta($property_id, 'rem_property_country', true);
		$purpose = get_post_meta($property_id, 'rem_property_purpose', true);
		$status = get_post_meta($property_id, 'rem_property_status', true);
		$bathrooms = get_post_meta($property_id, 'rem_property_bathrooms', true);
		$bedrooms = get_post_meta($property_id, 'rem_property_bedrooms', true);
			include 'templates/property/style'.$style.'.php';
		}

    function new_agent_registered($new_agent){

        $rem_settings = get_option( 'rem_all_settings' );
        // Sending Email to Admin
        $site_title = get_bloginfo();
        $admin_email = get_bloginfo('admin_email');
        
        $headers[] = "From: {$site_title}<{$admin_email}>";
        $headers[] = "Content-Type: text/html";
        $headers[] = "MIME-Version: 1.0\r\n";
        $subject = __( 'New Agent Registered ', 'wcp-rem' ). $site_title;

        $message = (isset($rem_settings['email_admin_register_agent']) && $rem_settings['email_admin_register_agent'] != '') ? $rem_settings['email_admin_register_agent'] : 'New agent is registered...' ;

        $message = str_replace("%username%", $new_agent['username'], $message);
        $message = str_replace("%email%", $new_agent['useremail'], $message);


        wp_mail( $admin_email, $subject, $message, $headers );

        // Sending Email to Agent
        $subject_agent = __( 'Registration Successfull ', 'wcp-rem' ). $site_title;

        $message_for_agent = (isset($rem_settings['email_pending_agent']) && $rem_settings['email_pending_agent'] != '') ? $rem_settings['email_pending_agent'] : 'Please wait for approval' ;
        
        $message_for_agent = str_replace("%username%", $new_agent['username'], $message_for_agent);
        $message_for_agent = str_replace("%email%", $new_agent['useremail'], $message_for_agent);

        wp_mail( $new_agent['useremail'], $subject_agent, $message_for_agent, $headers );

    }

    function new_agent_approved($new_agent){

        $rem_settings = get_option( 'rem_all_settings' );
        // Sending Email to Approved Agent
        $site_title = get_bloginfo();
        $admin_email = get_bloginfo('admin_email');
        
        $headers[] = "From: {$site_title}<{$admin_email}>";
        $headers[] = "Content-Type: text/html";
        $headers[] = "MIME-Version: 1.0\r\n";
        $subject = __( 'Approved ', 'wcp-rem' ). $site_title;

        $message_for_agent = (isset($rem_settings['email_approved_agent']) && $rem_settings['email_approved_agent'] != '') ? $rem_settings['email_approved_agent'] : 'You are Approved' ;
        
        $message_for_agent = str_replace("%username%", $new_agent['username'], $message_for_agent);
        $message_for_agent = str_replace("%email%", $new_agent['useremail'], $message_for_agent);

        wp_mail( $new_agent['useremail'], $subject, $message_for_agent, $headers );

    }

    function new_agent_rejected($new_agent){

        $rem_settings = get_option( 'rem_all_settings' );
        // Sending Email to Approved Agent
        $site_title = get_bloginfo();
        $admin_email = get_bloginfo('admin_email');
        
        $headers[] = "From: {$site_title}<{$admin_email}>";
        $headers[] = "Content-Type: text/html";
        $headers[] = "MIME-Version: 1.0\r\n";
        $subject = __( 'Rejected ', 'wcp-rem' ). $site_title;

        $message_for_agent = (isset($rem_settings['email_reject_agent']) && $rem_settings['email_reject_agent'] != '') ? $rem_settings['email_reject_agent'] : 'You are Approved' ;
        
        $message_for_agent = str_replace("%username%", $new_agent['username'], $message_for_agent);
        $message_for_agent = str_replace("%email%", $new_agent['useremail'], $message_for_agent);

        wp_mail( $new_agent['useremail'], $subject, $message_for_agent, $headers );

    }

    function property_icons($property_id){
		$bathrooms = get_post_meta( $property_id, 'rem_property_bathrooms', true );
		$bedrooms = get_post_meta( $property_id, 'rem_property_bedrooms', true );
		$status = get_post_meta($property_id, 'rem_property_status', true);
		$area = get_post_meta($property_id, 'rem_property_area', true);

        $property_details = array(
            'status' => array(
                'label' => __( 'Status', 'landz' ),
                'class' => 'status',
                'value' => $status,
            ),
            'bed' => array(
                'label' => __( 'Beds', 'landz' ),
                'class' => 'bed',
                'value' => $bedrooms,
            ),
            'bath' => array(
                'label' => __( 'Baths', 'landz' ),
                'class' => 'bath',
                'value' => $bathrooms,
            ),
            'bath' => array(
                'label' => __( 'Area', 'landz' ),
                'class' => 'area',
                'value' => $area,
            ),
        );

        if(has_filter('rem_property_icons')) {
            $property_details = apply_filters('rem_property_icons', $property_details);
        }

	?>
    <dl class="detail">
        <?php
            foreach ($property_details as $key => $data) { ?>
                <?php if ($data['value'] != '') { ?>
                    <dt class="<?php echo $data['class']; ?>"><?php $data['label']; ?>:</dt><dd><span><?php echo $data['value']; ?></span></dd>
                <?php } ?>
            <?php }
        ?>
    </dl>
    <?php
    }

    function single_property_agent_form($author_id){
        include 'inc/sidebar-agent-contact.php';
    }
}
?>