<?php
if ( !defined( 'ABSPATH' ) ) {
    exit;
}
if ( !class_exists( 'Food_Online_Settings' ) ):
    function Food_Online_Add_Tab( $settings )
    {
        class Food_Online_Settings extends WC_Settings_Page
        {
            public function __construct( )
            {
                $this->id    = 'fdoe';
                $this->label = __( 'Food Online', 'food-online-for-woocommerce' );
                add_filter( 'woocommerce_settings_tabs_array', array(
                     $this,
                    'add_settings_page'
                ), 20 );
                add_action( 'woocommerce_settings_' . $this->id, array(
                     $this,
                    'output'
                ) );
                add_action( 'woocommerce_settings_save_' . $this->id, array(
                     $this,
                    'save'
                ) );
                add_action( 'woocommerce_sections_' . $this->id, array(
                     $this,
                    'output_sections'
                ) );
				 add_action( 'woocommerce_admin_field_layout', array(
                     $this,
                    'fdoeorder_admin_field_layout'
                ) );
				 add_action( 'woocommerce_admin_field_ava_schedule', array(
                     $this,
                    'fdoeorder_admin_field_ava_schedule'
                ) );
				 add_action( 'woocommerce_admin_field_fixedordertime', array(
                     $this,
                    'fdoeorder_admin_field_fixedordertime'
                ) );


				add_action('admin_notices', array( $this, 'premium_admin_notice'));

				add_action('admin_enqueue_scripts', array($this, 'enqueue_cat_sorting_style'));
            }
			   function premium_admin_notice(){

    if ( isset ($_GET['tab']) && $_GET['tab'] == 'fdoe' ) {
		if( mt_rand (1,4) == 1):
		echo '<div class="notice notice-success is-dismissible">

<div class="fdoe_premium">
	<table>
		<tbody>
			<tr>
				<td width="70%">
					<p style="font-size:1.3em"><strong><i>Food Online Premium </i></strong>provides more features</p>
					<ul class="fa-ul" id="fdoe_premium_ad">
						<li><span class="fa-li"><i class="fas fa-check" style="color:green"></i></span> Delivery or Pick-Up selector at Menu page or at default WooCommerce shop page</li>
						<li><span class="fa-li"><i class="fas fa-check" style="color:green"></i></span> <strong>New!</strong> Eat at Restaurant Mode</li>
						<li><span class="fa-li"><i class="fas fa-check" style="color:green"></i></span> <strong>New!</strong> Time Picker for Delivery & Pick Up Orders</li>
						<li><span class="fa-li"><i class="fas fa-check" style="color:green"></i></span> <strong>New!</strong> Availability Schedule for categories & tags with the Timepicker</li>
						<li><span class="fa-li"><i class="fas fa-check" style="color:green"></i></span> Choose to show more content in product popups</li>
						<li> <span class="fa-li"><i class="fas fa-check" style="color:green"></i></span> Delivery address & Post Code validation with Google Maps & Minimum order value for delivery</li>
						<li><span class="fa-li"><i class="fas fa-check" style="color:green"></i></span> Let user choose delivery location from Map when address geolocation fail</li>
						<li><span class="fa-li"><i class="fas fa-check" style="color:green"></i></span> Decide which categories to show & order of them in Menu</li>
						<li><span class="fa-li"><i class="fas fa-check" style="color:green"></i></span> Up-Sell products reminder at checkout</li>
						<li> and more...</li>
						<li> Or if you just like our free plugin, give us a <a target="_blank" rel="noopener noreferrer" href=" https://wordpress.org/support/plugin/food-online-for-woocommerce/reviews?rate=5#new-post"><span id="fdoe_star_rating"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></span> five star rating</a></li>
					</ul>
				</td>
				<td>
					<a target="_blank" rel="noopener noreferrer" href="https://foodonlineplugin.com" class=" button_premium">
						<p style="font-size:1.2em">Upgrade To Premium </p>
						<p>Learn More <i class="fas fa-arrow-right"></i></p>
					</a>
				</td>
			</tr>
		</tbody>
	</table>
</div>

         </div>';
		 elseif( mt_rand (1,2) == 1):

 echo '
<div class="notice notice-error is-dismissible">
	<div class="fdoe_premium">
		<table>
			<tbody>
				<tr>
					<td width="100%">
						<p style="font-size:1.3em"><strong><i>New Plugin! </i></strong>Check My Address</p>
						<ul class="fa-ul" id="fdoe_premium_ad">
							<li><span class="fa-li"><i class="fas fa-check" style="color:#dc3232"></i></span> Let customers check if your store make deliveries to their address </li>
							<li><span class="fa-li"><i class="fas fa-check" style="color:#dc3232"></i></span> Add to any page with shortcode [checkmyaddress]</li>
							<li><span class="fa-li"><i class="fas fa-check" style="color:#dc3232"></i></span> Choose if to show shipping rate</li>
							<li><span class="fa-li"><i class="fas fa-check" style="color:#dc3232"></i></span> Compatible with Shipping Zones by Drawing methods</li>
							<a target="_blank" rel="noopener noreferrer" href="https://checkmyaddressplugin.com/" class=" ">
								<p style="display: inline-block;
    padding: 12px 20px;
    border-radius: 8px;
    border: 0;
    font-weight: bold;
    letter-spacing: 0.0625em;
    text-decoration: none;
    background: #dc3232;
    color: #fff;
    text-align: center;">Go to Plugin!</p>
									<p></p>
							</a>
						</ul>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
';
else:
echo '
<div class="notice notice-error is-dismissible">
	<div class="fdoe_premium">
		<table>
			<tbody>
				<tr>
					<td width="100%">
						<p style="font-size:1.3em"><strong><i>New Plugin! </i></strong>Check My PostCode</p>
						<ul class="fa-ul" id="fdoe_premium_ad">
							<li><span class="fa-li"><i class="fas fa-check" style="color:#dc3232"></i></span> Let customers check if your store make deliveries to their postcode zone </li>
							<li><span class="fa-li"><i class="fas fa-check" style="color:#dc3232"></i></span> Add to any page with shortcode [checkmypostcode]</li>
							<li><span class="fa-li"><i class="fas fa-check" style="color:#dc3232"></i></span> Choose if to show shipping rate</li>
							<li><span class="fa-li"><i class="fas fa-check" style="color:#dc3232"></i></span> Compatible with Shipping Zones by Drawing methods</li>
							<a target="_blank" rel="noopener noreferrer" href="https://checkmypostcodeplugin.com/" class=" ">
								<p style="display: inline-block;
    padding: 12px 20px;
    border-radius: 8px;
    border: 0;
    font-weight: bold;
    letter-spacing: 0.0625em;
    text-decoration: none;
    background: #dc3232;
    color: #fff;
    text-align: center;">Go to Plugin!</p>
									<p></p>
							</a>
						</ul>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
';




		endif;
		if( mt_rand (1,6) == 1):
        echo '<div class="notice notice-info is-dismissible">

<div class="fdoe_premium">
	<table>
		<tbody>
			<tr>
				<td width="100%">
					<p style="font-size:1.3em"><strong><i> Shipping Zones by Drawing Plugin </i></strong>let you draw your own shipping zones</p>
					<ul class="fa-ul" id="fdoe_premium_ad">
						<li><span class="fa-li"><i class="fas fa-check" style="color:#00a0d2"></i></span> Draw your own shipping zones for WooCommerce into a map</li>
						<li><span class="fa-li"><i class="fas fa-check" style="color:#00a0d2"></i></span> Define a shipping cost for every zone</li>
						<li><span class="fa-li"><i class="fas fa-check" style="color:#00a0d2"></i></span> Compatible with Food Online</li>
						<a target="_blank" rel="noopener noreferrer" href="https://wordpress.org/plugins/shipping-zones-by-drawing-for-woocommerce/" class=" ">
							<p style="display: inline-block;
    padding: 12px 20px;
    border-radius: 8px;
    border: 0;
    font-weight: bold;
    letter-spacing: 0.0625em;
    text-decoration: none;
    background: #00a0d2;
    color: #fff;
    text-align: center;">Get it for free!</p>
								<p></p>
						</a>
					</ul>
				</td>
			</tr>
		</tbody>
	</table>
</div>


         </div>';
		 endif;

    }

}
            public function get_sections( )
            {
                $sections = array(
                     '' => __( 'Main Settings', 'food-online-for-woocommerce' ),
					  'menu_styling' => __( 'Menu Layout & Styling', 'food-online-for-woocommerce' ),
                      'cat_sorting' => __( 'Menu Category Sorting', 'food-online-for-woocommerce' ),
                      'order_time' => __( 'Order Time Management', 'food-online-for-woocommerce' ),
					  'time_picker' => __( 'Time Picker', 'food-online-for-woocommerce' ),
					   'ava_schedule' => __( 'Availability Schedule', 'food-online-for-woocommerce' ),
					  'delivery' => __( 'Delivery Features', 'food-online-for-woocommerce' ),
					  'advanced' => __( 'Advanced', 'food-online-for-woocommerce' )
                );
                return apply_filters( 'woocommerce_get_sections_' . $this->id, $sections );
            }

            public function save( )
            {
                global $current_section;
                $settings = $this->get_settings( $current_section );
                WC_Admin_Settings::save_fields( $settings );
            }
            public function output( )
            {
                global $current_section;
                $settings = $this->get_settings( $current_section );
                WC_Admin_Settings::output_fields( $settings );
            }
            public function get_settings( $current_section = '' )
            {
                if ( 'order_time' == $current_section ){
                    include (plugin_dir_path( __DIR__ ) . 'includes/start-args.php');
                    $settings = apply_filters( 'fdoe_section1_settings', $settings_args_third);
				}else if ( 'time_picker' == $current_section ){
                    include (plugin_dir_path( __DIR__ ) . 'includes/start-args.php');
                    $settings = apply_filters( 'fdoe_section1_settings', $settings_args_timepicker);
				}
				else if ( 'delivery' == $current_section ){
                     include (plugin_dir_path( __DIR__ ) . 'includes/start-args.php');
                    $settings = apply_filters( 'fdoe_section1_settings', $settings_args_delivery);

				}
				else if ( 'menu_styling' == $current_section ){
                    include (plugin_dir_path( __DIR__ ) . 'includes/start-args.php');
                    $settings = apply_filters( 'fdoe_section1_settings', $settings_args_menu_styling);

				}else if ( 'advanced' == $current_section ){
                     include (plugin_dir_path( __DIR__ ) . 'includes/start-args.php');
                    $settings = apply_filters( 'fdoe_section1_settings', $settings_args_advanced);
                }
				else if ( 'cat_sorting' == $current_section ) {
                    $settings = apply_filters( 'fdoe_section2_settings', array(
                         array(
                            'name' => __( 'Menu Category Sorting', 'food-online-for-woocommerce' ),
                            'type' => 'title',
                            'desc' => __( 'This setting is only for the shop page of WooCommerce. ', 'food-online-for-woocommerce' ),
                            'id' => 'fdoe_category_order',


                        ),
                        array(
                             'type' => 'layout',
                            'id' => 'layout'
                        ),
                        array(
                             'type' => 'sectionend',
                            'id' => 'fdoe_category_order'
                        )
                    ) );
                }else if ( 'ava_schedule' == $current_section ) {
                    $settings = apply_filters( 'fdoe_section3_settings', array(
                         array(
                            'name' => __( 'Availability Schedules', 'food-online-for-woocommerce' ),
                            'type' => 'title',
                            'desc' => __( 'Add schedules for different applications and certain product categories and tags', 'food-online-for-woocommerce' ),
							'desc_tip' => true,
                            'id' => 'fdoe_ava_schedule'
                        ),
                        array(
                             'type' => 'ava_schedule',
                            'id' => 'ava_schedule'
                        ),
                        array(
                             'type' => 'sectionend',
                            'id' => 'fdoe_ava_schedule'
                        )
                    ) );

				}else {
                     include (plugin_dir_path( __DIR__ ) . 'includes/start-args.php');
                    $settings = apply_filters( 'fdoe_section1_settings', $settings_args);


                }
                return apply_filters( 'woocommerce_get_settings_' . $this->id, $settings, $current_section );
            }
				public function fdoeorder_admin_field_ava_schedule( $value )
            {

$option = json_decode(get_option('fdoe_ava_schedule'),true);
$terms = get_terms( 'product_tag' );



		wp_localize_script(
			'fdoe-admin-availability-script',
			'fdoeAvailibilityLocalizeScript',
			array(
				'tags'		=> 				$terms,
				'categories' =>				Food_Online::get_all_categories('all',1),
				'classes'                   => $option,
				'default_shipping_class'    => array(
					'term_id'     => 0,
					'name'        => '',
					'description' => '',
				),


			)
		);
		wp_enqueue_script( 'fdoe-admin-availability-script' );


		$settings_columns =

			array(

				'wc-shipping-class-time_from'        => __( 'From', 'food-online-for-woocommerce' ),
				'wc-shipping-class-time_to' => __( 'To', 'food-online-for-woocommerce' ),
				'wc-shipping-class-application'        => __( 'Application', 'food-online-for-woocommerce' ),
				'wc-shipping-class-mode'        => __( 'Mode', 'food-online-for-woocommerce' ),

				'wc-shipping-class-weekday'       => __( 'Weekday', 'food-online-for-woocommerce' ),
				'wc-shipping-class-date'       => __( 'Single Date', 'food-online-for-woocommerce' ),
				'wc-shipping-class-cats'       => __( 'Product Categories', 'food-online-for-woocommerce' ),
				'wc-shipping-class-tags'       => __( 'Product Tags', 'food-online-for-woocommerce' ),

		);

		include_once FDOE_PLUGINDIRPATH. 'includes/views/html-ava.php';



            }
			public function fdoeorder_admin_field_fixedordertime( $value )
            {

			$option = json_decode(get_option('fdoe_ordertime_per_cats'),true);
			$terms = get_terms( 'product_tag' );



		wp_localize_script(
			'fdoe-admin-ordertime-script',
			'fdoeOrdertimeLocalizeScript',
			array(
				'tags'		=> 				$terms,
				'categories' =>				Food_Online::get_all_categories('all',1),
				'classes'                   => $option,
				'default_shipping_class'    => array(
					'term_id'     => 0,
					'name'        => '',
					'description' => '',
				),


			)
		);
		wp_enqueue_script( 'fdoe-admin-ordertime-script' );


		$settings_columns =

			array(

				'wc-shipping-class-cats'       => __( 'Product Categories', 'food-online-for-woocommerce' ),
				'wc-shipping-class-rate'       => __( 'Preperation Time', 'food-online-for-woocommerce' ),



		);

		include_once FDOE_PLUGINDIRPATH. 'includes/views/html-ordertime.php';



            }
			public function fdoeorder_admin_field_layout( $value )
            {
                ob_start();


                $fdoe_category_order =  array();
                echo '<div class="wrap">';

                $pre_defiend_columns = Food_Online::get_all_categories();
                $cats = $pre_defiend_columns;
                $pages2 = array();
                 $cats_name = array();
                foreach($cats as $cat  ){
                        $cates =  $cat->cat_ID;
                        $cats_name[] = $cat->name;
                        $pages2[] = $cates;
					}

                    echo '<div class="fdoe_cat_sort_wrapper flex-container">';
					echo '<div class="left_container">';
                    echo '<h3 class="left_container-heading"> '. __('Selectable Product Categories', 'food-online-for-woocommerce' ). '<span class="fdoe_premium_link"><a target="_blank" class="fdoe_premium_link_ref" href="https://foodonlineplugin.com/">Premium</a></span></h3>';

                     echo '<h4 class="left_container-heading">'. __('Drag them to the Menu box', 'food-online-for-woocommerce' ). '</h4>';
                    echo '<ul class="left_items"  id="left">';
                    if ( is_array( $pre_defiend_columns )){
							foreach ( $pre_defiend_columns as $page2 ) {
                            if ( is_array($fdoe_category_order)) {
                                if ( !in_array( $page2->cat_ID,  $fdoe_category_order ) ) {
                                    echo '<li class="admin_column" id="' . $page2->cat_ID . '">';
                            echo $page2 -> name;
                                    echo '</li>';
                                }
                            }
                        }
                    }
                    echo '</ul>';
                    echo '</div>';
                    //end left container
                    echo '<div class="right_container" >';
                    echo '<h3 class="right_container-heading"> '. __('Menu', 'food-online-for-woocommerce' ). '<span class="fdoe_premium_link"><a target="_blank" class="fdoe_premium_link_ref" href="https://foodonlineplugin.com/">Premium</a></span></h3>';
                    echo '<h4 class="right_container-heading">'. __('Sort your product categories as you would like them in the menu', 'food-online-for-woocommerce'). '</h4>';
                    echo '<ul  class="right_items" id="right">';
                   if ( !empty( $fdoe_category_order ) && is_array($fdoe_category_order)) {
                        foreach ( $fdoe_category_order as $key ) {
                                if ( in_array($key, $pages2 ) && is_array( $pre_defiend_columns )) {
                                echo '<li class="admin_column" id="' . $key. '"  >';
                               $cat_name_ = get_the_category_by_ID((int)$key);
                             if ( $cat_name_ != null) {
                            echo $cat_name_ ;
                              }
                            echo '</li>';
                        }
                        }
                    }
                    echo '</ul>';
                    echo '</div>';

                    echo '</div>';
                    echo '</div>';

                echo ob_get_clean();

            }
			function enqueue_cat_sorting_style(){
				 if (isset($_GET['tab']) && $_GET['tab'] == 'fdoe' && isset($_GET['section']) && $_GET['section'] == 'cat_sorting') {

                    wp_enqueue_style('fdoe_admin_style-cat-sort', FDOE_PLUGINDIRURL . '/assets/css/admin-style-cat-sort.css', array(), FOOD_ONLINE_VERSION);

                }
			}






        }
         $settings[] = new Food_Online_Settings();
        return $settings;
    }
    add_filter( 'woocommerce_get_settings_pages', 'Food_Online_Add_Tab', 15 );
endif;
