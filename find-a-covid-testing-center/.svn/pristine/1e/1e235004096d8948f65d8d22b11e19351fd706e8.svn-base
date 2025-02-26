<?php
/**
* Remote Site Search ShortCode Class
*
*	@since 0.1
*
*/
add_action("admin_menu", "ctc_search_submenu");
	
    function ctc_search_submenu() {
        add_submenu_page(
            'options-general.php',
            'Find A Covid Test Center Search - Shortcodes',
            'Covid Search Shortcodes',
            'administrator',
            'ctc-search-options',
            'ctc_search_settings_page' );
    }	
 			

	function ctc_search_settings_page() { ?>
  <h1>Find A Covid Test Center Shortcodes</h1>
<h4>
	List of available shortcodes to display the search form or search button.
</h4>
<hr>
<h2>Shortcodes</h2>

<p>
	With this plugin you use a shortcode to connect your users to a database of Covid Testing Centers, users can enter their City and State or Zip Code.

</p>

<ul>
	<li><b>Live Site Search:</b></li>
	<code>[ctc_live_search]</code><li>
	</li>
</ul>

<ul>
	<li><b>Default:</b><li>
	<code>[ctc_search]</code><li>
	</li>
</ul>
<ul>
	<li><b>Search Bar No Border:</b><li>
	<code>[ctc_search_nb]</code><li>
	</li>
</ul>
<ul>
	<li><b>Search Bar With Link:</b><li>
	<code>[ctc_search_wl]</code><li>
	</li>
</ul>
<ul>
	<li><b>Display Search Bar Only:</b><li>
	<code>[ctc_search_bar_only]</code><li>
	</li>
</ul>
<ul>
	<li><b>Display Search Button:</b><li>
	<code>[ctc_search_button]</code><li>
	</li>
</ul>
<ul>
	<li><b>Display Search Button Without Link:</b><li>
	<code>[ctc_search_button_nl]</code><li>
	</li>
</ul>
<br>

<h2>Privacy & External Services</h2>
<p>
	
This service links to CovidTestingCenters.com. Please familiarize yourself with our <a href="https://covidtestingcenters.com/privacy" target="_blank">Privacy Policy</a> and the <a href="https://covidtestingcenters.com#disclaimer" target="_blank">Disclaimer</a> as this plugin links to our website.
</p>
<p>
    This plugin was developed by and connects to CovidTestingCenters.com. The only information that is passed from this website to CovidTestingCenters.com, is City, State or Zip Code the user enters to find a testing location.</p><p> We do NOT collect any personally identifiable information, we also do NOT collect or store any medical information.
</p>
Pricacy Policy <a href="https://covidtestingcenters.com/privacy" target="_blank">https://covidtestingcenters.com/privacy</a>| 

Disclaimer <a href="https://covidtestingcenters.com#disclaimer" target="_blank">https://covidtestingcenters.com/#disclaimer</a> | <a href="https://covidtestingcenters.com" target="_blank">CovidTestingCenters.com</a>
<br>



<?php }
//Default

		function covid_search_function()
		{
			$content = '<hr><div>';
			$content .= '<form method="GET" autofill="none" target="_blank" action="https://covidtestingcenters.com/">';
			$content .= '<div class="ctc_title" style="margin-bottom:10px;"><h4>Find A Covid Testing Center Near You</h4></div>';
			$content .= '<div class="input-group"><center><input type="text" class="form-control" id="s" name="s" placeholder="Enter Your City, State Or Zip Code" style="
	font-size: 17px;border: 1px solid grey;float: left;width: 70%;height:50px;background: #f1f1f1;"></input>';
			$content .= '<input class="btn input-group-btn" type="submit" value="Search" id="submit" style="width:80%;float: left;width: 30%;height:50px;border-radius:2px;text-align: center;background: #2196F3;color: white;font-decoration:none;font-size: 17px;
	  border: 1px solid grey;border-left: none; /* Prevent double borders */cursor: pointer;"></input></center></div>';
			$content .= '</form></div><hr>';

			return $content;
		}
		add_shortcode('ctc_search','covid_search_function');



	// No border With Link

		function covid_search_with_attribution_function()
		{
			$content = '<div>';
			$content .= '<form method="GET" autofill="none" target="_blank" action="https://covidtestingcenters.com/">';
			$content .= '<div class="ctc_title" style="margin-bottom:10px;"><h4>Find A Covid Testing Center Near You</h4></div>';
			$content .= '<div class="input-group"><center><input type="text" class="form-control" id="s" name="s" placeholder="Enter Your City, State Or Zip Code" style="
	font-size: 17px;border: 1px solid grey;float: left;width: 70%;height:50px;background: #f1f1f1;"></input>';
			$content .= '<input class="btn input-group-btn" type="submit" value="Search" id="submit" style="width:80%;float: left;width: 30%;height:50px;border-radius:2px;text-align: center;background: #2196F3;color: white;font-decoration:none;font-size: 17px;
	  border: 1px solid grey;border-left: none; /* Prevent double borders */cursor: pointer;"></input></center></div>';
			$content .= '<div class="ctc_link" style="margin-top:10px;"><a href="https://covidtestingcenters.com"> A Service Of Covid Testing Centers</a></center></div>';

			$content .= '</form></div>';

			return $content;
		}
		add_shortcode('ctc_search_nb','covid_search_with_attribution_function');






	//search bar only


		function covid_search_bar_only_function()
		{
			$content = '<center><div>';
			$content .= '<form method="GET" autofill="none" target="_blank" action="https://covidtestingcenters.com/">';
			$content .= '<div class="ctc_title" style="margin-bottom:10px;"><center><h4>Find A Covid Testing Center Near You</h4></center></div>';
			$content .= '<center><div class="input-group"><input type="text" class="form-control" id="s" name="s" placeholder="Enter Your City, State Or Zip Code" style="
	font-size: 17px;border: 1px solid grey;float: left;width: 70%;height:50px;background: #f1f1f1;"></input>';
			$content .= '<input class="btn input-group-btn" type="submit" value="Search" id="submit" style="width:80%;float: left;width: 30%;height:50px;border-radius:2px;text-align: center;background: #2196F3;color: white;font-decoration:none;font-size: 17px;
	  border: 1px solid grey;border-left: none; /* Prevent double borders */cursor: pointer;"></input></div></center>';

			$content .= '</form></div></center>';

			return $content;
		}
		add_shortcode('ctc_search_bar_only','covid_search_bar_only_function');


	//border with link

		function covid_search_no_border_function()
		{
			$content = '<hr><div>';
			$content .= '<form method="GET" autofill="none" target="_blank" action="https://covidtestingcenters.com/">';
			$content .= '<div class="ctc_title" style="margin-bottom:10px;"><h4>Find A Covid Testing Center Near You</h4></div>';
			$content .= '<div class="input-group"><center><input type="text" class="form-control" id="s" name="s" placeholder="Enter Your City, State Or Zip Code" style="
	font-size: 17px;border: 1px solid grey;float: left;width: 70%;height:50px;background: #f1f1f1;"></input>';
			$content .= '<input class="btn input-group-btn" type="submit" value="Search" id="submit" style="width:80%;float: left;width: 30%;height:50px;border-radius:2px;text-align: center;background: #2196F3;color: white;font-decoration:none;font-size: 17px;
	  border: 1px solid grey;border-left: none; /* Prevent double borders */cursor: pointer;"></input></center></div>';
			$content .= '<div class="ctc_link" style="margin-top:10px;"><a href="https://covidtestingcenters.com"> A Service Of Covid Testing Centers</a></div>';
			$content .= '</form></div><hr>';

			return $content;
		}
		add_shortcode('ctc_search_wl','covid_search_no_border_function');



	//search button

		function covid_search_button_function()
		{
			$content = '<div class="ctc-wrap" >';
			$content .= '<center><a class="ctc-btn-wrap" class target="_blank" href="https://covidtestingcenters.com/#s=" ><button class="btn" style="margin:15px; background:lightblue;color:black;font-weight:bold;a:hover:"background:red;">Find COVID Test Center</button></a></div>';		
			$content .= '<div class="ctc_link" style="margin-top:10px;"><center><a href="https://covidtestingcenters.com"> A Service Of Covid Testing Centers</a></center></div>';

			return $content;
		}
		add_shortcode('ctc_search_button','covid_search_button_function');


		//search button no link

		function covid_search_button_nl_function()
		{
			$content = '<div class="ctc-wrap" >';
			$content .= '<center><a class="ctc-btn-wrap" class target="_blank" href="https://covidtestingcenters.com/#s=" ><button class="btn" style="margin:15px; background:lightblue;color:black;font-weight:bold;a:hover:"background:red;">Find COVID Test Center</button></a></div>';		

			return $content;
		}
		add_shortcode('ctc_search_button_nl','covid_search_button_nl_function');



	class wpRemoteSiteSearchShortcode{

	  /**
		* Instance of wpRemoteSiteSearchShortcode
		*/
		public static function instance()
		{
			static $instance = null;
			if ($instance === null) {
				$instance = new wpRemoteSiteSearchShortcode();
			}
			return $instance;
		}

		private function __construct(){

			add_shortcode('ctc_live_search', array($this,'shortcode'));
		}

   /**
	* Live Shortcode function
	*	
	*   @param  {[array]} $atts   [values given in shortcode]
	*	@since   0.1
	*
	*/

	public function shortcode( $atts ) {

		wp_enqueue_script( 'rs-script');
		wp_enqueue_script( 'rs-trigger-script');
		wp_enqueue_style( 'rs-style');

		$defaults = array(
			'title'				=> __( 'Enter Your City and State To Find A Covid Testing Center', 'wp-remote-site-search' ), // title for searcbox
			'placeholder'		=> __( 'Enter Your City and State OR Zip Code', 'wp-remote-site-search' ), // placeholder
			'remote_url'		=> 'https://covidtestingcenters.com', 
			'category_id'		=> '', //category id
			'max_results'		=> 10,// return a certain number of search results
			'html_input'		=> '', //html input to add after results
			'type'				=> 'testing-location', //post type
			'sub_categories'	=> ''  //results from sub categories

			);
		$atts = shortcode_atts( $defaults, $atts );
		if ($atts['type'] == '') {
			$type = sprintf('testing_location?'); //default posts
		}
		else{
			$type = sprintf('%s?', trim( $atts['type'] ));//custom post type
		}
		if ($atts['category_id'] == '') {
			$category_id = null;
		}
		else{
			$category_id = sprintf('%s', trim( $atts['category_id'] ));//custom post type
		}
		$html_input = html_entity_decode( $atts['html_input'] );//append html after all results
		$title = $atts['title'];
		$placeholder = $atts['placeholder'];
		$remote_url = $atts['remote_url'];
		$max_results = $atts['max_results'];
		$sub_categories = $atts['sub_categories'];


		/**
		 * Filter #html_input
		 * @var String
		 */
		$html_input = apply_filters( 'wp_remote_site_search_html_input', $html_input );

		/**
		 * Filter $category_id
		 * @var String, Comma separated list of category ids
		 */
		$category_id = apply_filters( 'wp_remote_site_search_category_id', $category_id );

		/**
		 * Filter $type
		 * @var type of post
		 */
		$type = apply_filters( 'wp_remote_site_search_type', $type );

		/**
		 * Filter $title
		 * @var String
		 */
		$title = apply_filters( 'wp_remote_site_search_title', $title );

		/**
		 * Filter $placeholder
		 * @var String
		 */
		$placeholder = apply_filters( 'wp_remote_site_search_placeholder', $placeholder );

		/**
		 * Filter $remote_url
		 * @var String 
		 */
		$remote_url = apply_filters( 'wp_remote_site_search_remote_url', $remote_url );


		/**
		 * Filter $max_results
		 * @var String Number
		 */
		$max_results = apply_filters( 'wp_remote_site_search_max_results', $max_results );

		/**
		 * Filter $sub_categories
		 * @var String true 
		 */
		$sub_categories = apply_filters( 'wp_remote_site_search_sub_categories', $sub_categories );	

		/**
		 * Filter $sub_categories
		 * @var String true 
		 */
		$sub_categories = apply_filters( 'wp_remote_site_search_sub_categories', $sub_categories );		
		ob_start();
		?>
		<!-- search box wrapper -->
		<div id="search-wrapper" class="search-wrapper wrapper" data-number=<?php echo esc_attr($atts['max_results']); ?> >

			<!-- search input box -->
			<div id="input-wrapper">
				<label><?php echo esc_attr( $atts['title'] );?></label>
				<input autocomplete="off" itemprop="query-input" type="text" data-object-type="<?php echo esc_attr( $type );?>" id="search-input" placeholder="<?php echo esc_attr( $atts['placeholder'] );?>" data-remote-url=<?php echo esc_attr($atts['remote_url']);?> data-cat="<?php echo esc_attr($category_id);?>" data-sub-cat="<?php echo esc_attr($atts['sub_categories']);?>">
				<a class="ctc_top_link" href="https://covidtestingcenters.com/?utm_source=trdpty&utm_medium=Wpsearcg&utm_campaign=wp_live_search" target="_blank">A Service Of Covid Testing Centers</a>
			</div>
				<div id="search-loading" class="search-loading"><div class="search-loader"></div>
			</div>
			<!-- results count -->
			<div class="error-results-wrap"></div>
			<div class="search-results-wrap">
				<span id="search-results"></span>
			</div>
			<!-- append searched results -->
			<ul itemprop="target" id="result-list"></ul>
			<!-- append html input results -->
			<div class="after-wrapper">
				<?php echo html_entity_decode( $html_input );?>
			</div>
			
		</div>

		<?php
		return ob_get_clean();
	}
}

$remote_site_search_shortcode = wpRemoteSiteSearchShortcode::instance();