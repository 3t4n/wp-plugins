<?php



/**

 * 

 */

class helpouts extends WP_Widget 

{

	public function __construct() {

		parent::WP_Widget(

			'helpouts', 
			
			//title of the widget in the WP dashboard
			__('Google Helpouts Listing Promotion'), 

			array('description'=>'Add a link to your Google Helpouts listing.', 'class'=>'helpoutswidget')

		);

	}

	

	/**

	 * 

	 * @param type $instance

	 */

	public function form($instance)

	{
		// these are the default widget values
		$default = array( 

			'title' => __(''),

			'codeURL'=> __(''),

			'codeGPlusID'=> __(''),
			
			'code'=> __('')

			);

		$instance = wp_parse_args( (array)$instance, $default );

		//this is the html for the fields in the wp dashboard
		echo "\r\n";

		echo "<p>";

		echo "<label for='".$this->get_field_id('title')."'>" . __('Title') . ":</label> " ;
		echo "<input type='text' class='widefat' id='".$this->get_field_id('title')."' name='".$this->get_field_name('title')."' value='" . esc_attr($instance['title'] ) . "' />" ;
		
		echo "</p>";
		echo "<p>";

		echo "<label for='".$this->get_field_id('codeURL')."'>" . __('URL address of Helpout listing.') . ":</label> " ;
		echo "<input type='text' class='widefat' id='".$this->get_field_id('codeURL')."' name='".$this->get_field_name('codeURL')."' value='" . esc_attr( $instance['codeURL'] ) . "' placeholder='URL of your listing.' />" ;
		
		echo "</p>";
		echo "<p>";		
		
		echo "<label for='".$this->get_field_id('code')."'>" . __('OR - To change image type paste below the Google Helpouts promotion code obtained through the Promote page from your listings.') . ":</br><a href='https://support.google.com/helpouts/answer/3476394?hl=en' target='_blank'>More info here.</a></label> " ;
		echo "<input type='text' class='widefat inputtrick' id='".$this->get_field_id('code')."' name='".$this->get_field_name('code')."' value='" . esc_attr( $instance['code'] ) . "' placeholder='Paste Helpouts promote code here.' />" ;
		echo "<style>.inputtrick {word-break: break-word;height: 50px;overflow: scroll;}</style>";

		echo "</p>";
		echo "<p>";

		echo "<label for='".$this->get_field_id('codeGPlusID')."'>" . __('OR - Paste your Google Plus ID </br> (not your Google+ URL) </br> This link will also go to all of your listings if you have more than one.') . ":</br><a href='/wp-content/plugins/helpouts-widget/googleid.jpg' target='_blank'>More info here.</a></label> " ;
		echo "<input type='text' class='widefat' id='".$this->get_field_id('codeGPlusID')."' name='".$this->get_field_name('codeGPlusID')."' value='" . esc_attr( $instance['codeGPlusID'] ) . "' placeholder='Google + ID' />" ;

		
		echo "</p>";

	}

		

	/**

	 * 

	 * @param type $new_instance

	 * @param type $old_instance

	 * @return type

	 */

	public function update($new_instance, $old_instance) 

	{

		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);

		$instance['codeURL'] = $new_instance['codeURL'];
		
		$instance['codeGPlusID'] = $new_instance['codeGPlusID'];	
		
		$instance['code'] = $new_instance['code'];

		return $instance;

	}

		

	/**

	 * Renders the actual widget

	 * 

	 * @global post $post

	 * @param array $args 

	 * @param type $instance

	 */

	public function widget($args, $instance) 

	{

		extract($args, EXTR_SKIP);
		
		//global WP theme-driven "before widget" code
		echo $before_widget;
		
		//code for title output
		echo '<h2 class="centertitle">';
		echo $instance['title'];
		echo '</h2>';
		echo '<style>h2.centertitle {text-align:center;}</style>';
		
		//code for URL output
		if(!isset($instance['codeURL']) || trim($instance['codeURL']) == '')
		{
		   echo "";
		}
		else {
		echo '<div class="your-class alignimgctr"><a href="';
		echo $instance['codeURL'];
		echo '" target="_blank"><img src="/wp-content/plugins/google-helpouts-listing-promotion-widget/large-helpouts.png" alt="My Google Helpout" width="180" height="150"></a></div>';
		echo '<style>div.alignimgctr {text-align:center;}</style>';
		}
		
		//code for first input
		echo '<div class="your-class"><!--Your custom html code goes here!-->';
		echo $instance['code'];
		echo '</div>';
		
		//code for Google plus ID input
		if(!isset($instance['codeGPlusID']) || trim($instance['codeGPlusID']) == '')
		{
		   echo "";
		}
		else {
		echo '<div class="your-class alignimgctr"><a href="https://helpouts.google.com/';
		echo $instance['codeGPlusID'];
		echo '" target="_blank"><img src="/wp-content/plugins/google-helpouts-listing-promotion-widget/large-helpouts.png" alt="My Google Helpout" width="180" height="150"></a></div>';
		echo '<style>div.alignimgctr {text-align:center;}</style>';
		}		
		
			
		//global WP theme-driven "after widget" code
		echo $after_widget;
	}

}



