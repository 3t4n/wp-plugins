<?php
/**
* Real Estate Management - Shortcodes Class
*/
class REM_Shortcodes
{
	
	function __construct(){
		add_shortcode( 'rem_register_agent', array($this, 'register_agent') );
		add_shortcode( 'rem_search_property', array($this, 'search_property') );
		add_shortcode( 'rem_agent_login', array($this, 'login_agent') );
		add_shortcode( 'rem_create_property', array($this, 'create_property') );
		add_shortcode( 'rem_my_properties', array($this, 'my_properties') );
		add_shortcode( 'rem_list_properties', array($this, 'list_properties') );
	}

	function register_agent($attrs, $content = ''){
		if (!is_user_logged_in()) {
			global $rem_ob;
			$rem_ob->rem_enqueue_script('register-agent');
			ob_start();
				include 'templates/register-agent.php';
			return ob_get_clean();
		} else {
			return apply_filters( 'the_content', $content );
		}					
	}

	function search_property($attrs, $content = ''){
		global $rem_ob;
		$rem_ob->rem_enqueue_script('search-property');
		ob_start();
			include 'templates/search-property.php';
		return ob_get_clean();	
	}

	function login_agent($attrs, $content = ''){
		global $rem_ob;
		if (is_user_logged_in()) {
			return apply_filters( 'the_content', $content );
		} else {
			$rem_ob->rem_enqueue_script('login-agent');
			extract( shortcode_atts( array(
				'heading' => 'Login Here',
				'redirect' => '',
			), $attrs ) );
			ob_start();
				include 'templates/login.php';
			return ob_get_clean();
		}
	}

	function create_property($attrs, $content = ''){
		global $rem_ob;
		if (is_user_logged_in()) {
			extract( shortcode_atts( array(
				'style' => '',
			), $attrs ) );
	        wp_enqueue_media();
			$rem_ob->rem_enqueue_script('create-property');
			ob_start(); ?>
		<?php
			$property_purposes = $rem_ob->get_all_property_purpose();
			$property_types = $rem_ob->get_all_property_types();
			$property_status = $rem_ob->get_all_property_status();
			$property_individual_cbs = $rem_ob->get_all_property_features();
			$landz_redux_options = get_option( 'landz_redux_options' );
			$price_symbol = (isset($landz_redux_options['landz_property_symbol'])) ? $landz_redux_options['landz_property_symbol'] : '$' ;
			include 'templates/create-property.php';
			return ob_get_clean();
		} else {
			return apply_filters( 'the_content', $content );
		}		
	}

	function my_properties($attrs, $content = ''){
		global $rem_ob;
		if (is_user_logged_in()) {
			extract( shortcode_atts( array(
				'style' => '',
			), $attrs ) );
			$rem_ob->rem_enqueue_script('my-properties');
			ob_start();
			
			include 'templates/my-properties.php';
			return ob_get_clean();
		} else {
			return apply_filters( 'the_content', $content );
		}		
	}

	function list_properties($attrs, $content = ''){
		global $rem_ob;
		extract( shortcode_atts( array(
	        'order' => 'DESC',
	        'orderby' => 'title',
	        'posts' => -1,
	        'class'         => 'col-sm-3',
		), $attrs ) );

		$rem_ob->rem_enqueue_script('archive-property');
		$args = array(
			'order'       => $order,
			'orderby'     => $orderby,			
			'post_type'   => 'rem_property',
			'posts_per_page'         => $posts,
		);
		ob_start();
			$the_query = new WP_Query( $args );

			// The Loop
			if ( $the_query->have_posts() ) {
				echo '<div class="ich-settings-main-wrap">';
				echo '<div class="row">';
				while ( $the_query->have_posts() ) {
					$the_query->the_post();
					echo '<div id="property-'.get_the_id().'" class="'.join(' ', get_post_class($class)).'"">';
						do_action('rem_property_box', get_the_id());
					echo '</div>';
				}
				echo '</div>';
				echo '</div>';
				/* Restore original Post Data */
				wp_reset_postdata();
			} else {
				echo __( 'No Properties Found!', 'wcp-rem' );
			}		
		return ob_get_clean();
	}
}
?>