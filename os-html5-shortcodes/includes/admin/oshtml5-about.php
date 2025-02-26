<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Post types
 *
 * DM Page Creation
 *
 * @class 		oshtml5About
 * @version		1.3
 * @category	Class
 * @author 		Offshorent Solutions Pvt Ltd. | Jinesh.P.V
 */
 
if ( ! class_exists( 'oshtml5About' ) ) :

	class oshtml5About { 
	
		/**
		 * Constructor
		 */
		
		public function __construct() { 
			
			add_action( 'admin_menu', array( $this, 'oshtml5_admin_menu' ) );
		}

		/**
		 * Creating a admin setting menu for design maker
		 */
		 
		public function oshtml5_admin_menu() {
			
			add_submenu_page( 'edit.php?post_type=os-html5', __( 'About Offshorent', OSHTML5_TEXT_DOMAIN ), __( 'About', OSHTML5_TEXT_DOMAIN ), 'manage_options', 'oshtml5-about-developer', array( $this, 'about_oshtml5_developer' ) );
		}

		/**
		* about_oshtml5_developer for ourteam blog
		*
		* @since  1.3
		*/
	
		public function about_oshtml5_developer() {
	
			ob_start();
			?>
			<div class="wrap">
				<div id="dashboard-widgets">
					<h2><?php _e( "About Offshorent", "OSHTML5_TEXT_DOMAIN" );?></h2> 
					<div class="postbox-container">
						<div class="meta-box-sortables ui-sortable">
							<h2><?php _e( "We build your team. We build your trust..", "OSHTML5_TEXT_DOMAIN"  );?></h2>
							<img src="<?php echo OSHTML5_PLUGIN_URL;?>/images/about.jpg" alt="" width="524">
							<p><?php _e( "We are experts at building web and mobile products. And more importantly, we are committed to building your trust. We are a leading offshore outsourcing center that works primarily with digital agencies and software development firms. Offshorent was founded by U.S. based consultants specializing in software development and who built a reputation for identifying the very best off-shore outsourcing talent. We are now applying what we learned over the past ten years with a mission to become the world’s most trusted off-shore outsourcing provider.", "OSHTML5_TEXT_DOMAIN"  );?></p>
							<ul class="offshorent">
								<li><a href="http://offshorent.com/services" target="_blank"><?php _e( "Services", "OSHTML5_TEXT_DOMAIN"  );?></a></li>
								<li><a href="http://offshorent.com/our-work" target="_blank"><?php _e( "Our Works", "OSHTML5_TEXT_DOMAIN"  );?></a></li>
								<li><a href="http://offshorent.com/clients-speak" target="_blank"><?php _e( "Testimonials", "OSHTML5_TEXT_DOMAIN"  );?></a></li>
								<li><a href="http://offshorent.com/our-team" target="_blank"><?php _e( "Our Team", "OSHTML5_TEXT_DOMAIN"  );?></a></li>
								<li><a href="http://offshorent.com/process" target="_blank"><?php _e( "Process", "OSHTML5_TEXT_DOMAIN"  );?></a></li>
								<li><a href="http://offshorent.com/life-offshorent" target="_blank"><?php _e( "Life @ Offshorent", "OSHTML5_TEXT_DOMAIN"  );?></a></li>
								<li><a href="https://www.facebook.com/Offshorent" target="_blank"><?php _e( "Facebook Page", "OSHTML5_TEXT_DOMAIN"  );?></a></li>
								<li><a href="http://offshorent.com/blog" target="_blank"><?php _e( "Blog", "OSHTML5_TEXT_DOMAIN"  );?></a></li>
							</ul>
							<div class="clear"></div>
						</div>
						<div class="clear"></div>	
					</div>
					<div class="postbox-container">
						<div class="meta-box-sortables ui-sortable">
							<h2><?php _e( "Contact Us", "OSHTML5_TEXT_DOMAIN"  );?></h2>
							<p><?php _e( "Email:" , "OSHTML5_TEXT_DOMAIN"  );?><a href="mailto:<?php _e( "info@offshorent.com", "OSHTML5_TEXT_DOMAIN"   );?>"><?php _e( "info@offshorent.com", "OSHTML5_TEXT_DOMAIN"  );?></a></p>
							<p><?php _e( "Project Support:" , "OSHTML5_TEXT_DOMAIN"  );?><a href="mailto:<?php _e( "project-support@offshorent.com", "OSHTML5_TEXT_DOMAIN"  );?>"><?php _e( "project-support@offshorent.com", "OSHTML5_TEXT_DOMAIN"  );?></a></p>
							<p><?php _e( "Phone - US Office:" , "OSHTML5_TEXT_DOMAIN"  );?><?php _e( "+1(484) 313 – 4264", "OSHTML5_TEXT_DOMAIN"  );?></p>					
							<p><?php _e( "Phone - India:" , "OSHTML5_TEXT_DOMAIN"  );?><?php _e( "+91 484 – 2624225", "OSHTML5_TEXT_DOMAIN" );?></p>
							<div class="location-col">
								<b><?php _e( "Philadelphia / USA", "OSHTML5_TEXT_DOMAIN" );?></b>
								<p><?php _e( "1150 1st Ave #501,<br> King Of Prussia,PA 19406<br> Tel: (484) 313 &ndash; 4264 <br>Email ", "OSHTML5_TEXT_DOMAIN" );?><a href="mailto:<?php _e( "philly@offshorent.com", "OSHTML5_TEXT_DOMAIN" );?>"><?php _e( "philly@offshorent.com", "OSHTML5_TEXT_DOMAIN" );?></a></p>
							</div>
							<div class="location-col">
								<b><?php _e( "Chicago / USA", "OSHTML5_TEXT_DOMAIN" );?></b>
								<p><?php _e( "233 South Wacker Drive, Suite 8400,<br> Chicago, IL 60606<br> Tel: (312) 380 &ndash; 0775 <br>Email: ", "OSHTML5_TEXT_DOMAIN" );?><a href="mailto:chicago@offshorent.com"><?php _e( "chicago@offshorent.com", "OSHTML5_TEXT_DOMAIN" );?></a></p>
							</div>
							<div class="location-col">
								<b><?php _e( "California / USA", "OSHTML5_TEXT_DOMAIN" );?></b>
								<p><?php _e( "17311 Virtuoso. #102 Irvine,<br> CA 92620 <br>Tel: +1 949 391 1012 <br>Email: ", "OSHTML5_TEXT_DOMAIN" );?><a href="mailto:<?php _e( "california@offshorent.com", "OSHTML5_TEXT_DOMAIN" );?>"><?php _e( "california@offshorent.com", "OSHTML5_TEXT_DOMAIN" );?></a></p>
							</div>
							<div class="location-col">
								<b><?php _e( "Sydney / AUSTRALIA", "OSHTML5_TEXT_DOMAIN" );?></b>
								<p><?php _e( "Suite 59, 38 Ricketty St, Mascot,<br> New South Wales &ndash; 2020,<br> Sydney, Australia,<br> Tel: 02 8011 3413 <br>Email: ", "OSHTML5_TEXT_DOMAIN" );?><a href="mailto:<?php _e( "sydney@offshorent.com", "OSHTML5_TEXT_DOMAIN" );?>"><?php _e( "sydney@offshorent.com", "OSHTML5_TEXT_DOMAIN" );?></a></p>
							</div>
							<div class="location-col">
								<b><?php _e( "Cochin / INDIA", "OSHTML5_TEXT_DOMAIN" );?></b>
								<p><?php _e( "Palm Lands, 3rd Floor,<br> Temple Road, Bank Jn,<br> Aluva &ndash; 01, Cochin, Kerala <br>Tel: +91 484 &ndash; 2624225 <br>Email: ", "OSHTML5_TEXT_DOMAIN" );?><a href="mailto:<?php _e( "aluva@offshorent.com", "OSHTML5_TEXT_DOMAIN" );?>"><?php _e( "aluva@offshorent.com", "OSHTML5_TEXT_DOMAIN" );?></a></p>
							</div>	
						</div>
						<div class="clear"></div>
					</div>
				</div>
				<div class="social">
					<img src="<?php echo OSHTML5_PLUGIN_URL;?>/images/social.png" usemap="#av92444" width="173" height="32" alt="click map" border="0" />
					<map id="av92444" name="av92444">
						<!-- Region 1 -->
						<area shape="rect" alt="Facebook" title="Facebook" coords="1,2,29,30" href="https://www.facebook.com/Offshorent" target="_blank" />
						<!-- Region 2 -->
						<area shape="rect" alt="Twitter" title="Twitter" coords="36,1,64,31" href="https://twitter.com/Offshorent" target="_blank" />
						<!-- Region 3 -->
						<area shape="rect" alt="Google" title="Google" coords="73,3,98,29" href="https://plus.google.com/+Offshorent/posts" target="_blank" />
						<!-- Region 4 -->
						<area shape="rect" alt="Linkedin" title="Linkedin" coords="110,1,136,30" href="https://www.linkedin.com/company/offshorent" target="_blank" />
						<!-- Region 5 -->
						<area shape="rect" alt="Youtube" title="Youtube" coords="145,3,169,31" href="http://www.youtube.com/user/Offshorent" target="_blank" />
						<area shape="default" nohref alt="" />
					</map>
				</div>			
			</div>
			<?php
		}
	}
	
endif;

/**
 * Returns the main instance of oshtml5About to prevent the need to use globals.
 *
 * @since  2.0
 * @return oshtml5About
 */
 
return new oshtml5About();
?>
