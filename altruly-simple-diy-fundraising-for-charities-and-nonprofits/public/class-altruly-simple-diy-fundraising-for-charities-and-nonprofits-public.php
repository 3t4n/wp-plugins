<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://altruly.com
 * @since      1.0.0
 *
 * @package    Altruly_Simple_Diy_Fundraising_For_Charities_And_Nonprofits
 * @subpackage Altruly_Simple_Diy_Fundraising_For_Charities_And_Nonprofits/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Altruly_Simple_Diy_Fundraising_For_Charities_And_Nonprofits
 * @subpackage Altruly_Simple_Diy_Fundraising_For_Charities_And_Nonprofits/public
 * @author     Altruly, Inc. <support@altruly.com>
 */
class Altruly_Simple_Diy_Fundraising_For_Charities_And_Nonprofits_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Altruly_Simple_Diy_Fundraising_For_Charities_And_Nonprofits_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Altruly_Simple_Diy_Fundraising_For_Charities_And_Nonprofits_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/altruly-simple-diy-fundraising-for-charities-and-nonprofits-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Altruly_Simple_Diy_Fundraising_For_Charities_And_Nonprofits_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Altruly_Simple_Diy_Fundraising_For_Charities_And_Nonprofits_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/altruly-simple-diy-fundraising-for-charities-and-nonprofits-public.js', array( 'jquery' ), $this->version, false );

	}

	function altruly_connect_simple( $atts ) {
	    $args = shortcode_atts(
	        array(
	            'slug'   => '',
							'color'  => 'blue'
	        ),
	        $atts
	    );

			if($args['slug'] != ''){
				$url = 'https://altruly.com/diy/' . $args['slug'];
			}else{
				$url = 'https://altruly.com/';
			}

	    $content = '
				<h2>Host your own DIY Fundraiser on Altruly</h2>
				<p>
					DIY fundraisers are the perfect way to show your support by adding a fundraiser to just about any event - the only limit is your imagination. <a href="'. $url .'" target="_blank" rel="noopener noreferrer">Altruly</a> is a platform for people to host DIY fundraisers. Be creative and spread the word! Here are a few ideas to get you started:
				</p>
				<table>
				<tr>
					<td>
					<h3>Host a Party with a Purpose</h3>
					<p>

					</p>
					<ul>
						<li>Birthdays</li>
						<li>Housewarmings</li>
						<li>Retirement Parties</li>
						<li>Weddings</li>
						<li>Reunions</li>
						<li>Baby Showers</li>
						<li>Benefit Dinner</li>
						<li>Holiday Parties</li>
						<li>Cook-offs or Bake Sales</li>
						<li>Annual General Meetings</li>
					</ul>
					</td>
					<td>
					<h3>Sports Event Fundraising</h3>
					<p>

					</p>
					<ul>
						<li>Walk/Run</li>
						<li>Cycling races</li>
						<li>Golf tournaments</li>
						<li>Swim meets</li>
						<li>Baseball/Softball</li>
						<li>Bowling tournaments</li>
						<li>Obstacle/Mud races</li>
						<li>Hockey tournaments</li>
						<li>Football games</li>
						<li>Kids sports</li>
					</ul>
					</td>
				</tr>
				</table>

				<p>
				<a href="'. $url .'" target="_blank" rel="noopener noreferrer">Altruly</a> is free to use and they take care of all of the heavy lifting:
				</p>
				<ul>
					<li>Free colorful e-card invitations</li>
					<li>Manage RSVPs from mobile, tablet or desktop</li>
					<li>Thank-you notes</li>
					<li>Party reminders</li>
					<li>Respectfully communicate a no-gift policy to your guests</li>
					<li>Social network integration</li>
					<li>Electronic tax-receipt issuance for any donation amount</li>
					<li>Secure payment processing from any credit card</li>
					<li>Optimized for mobile, tablet and desktop</li>
					<li>Ad free</li>
				</ul>

	      <p style="text-align:center;">
	        <a href="' . $url . '"><img src="' . plugins_url( '/images/button_create-a-diy-fundraiser-'. $args['color'] .'.png', dirname(__FILE__) ) . '" /></a>
	      </p>
	    ';

	    return $content;
	}

}
