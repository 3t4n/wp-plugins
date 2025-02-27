<?php

/**
 * Guide Featured Trip class.
 *
 * @category   Class
 * @package    WTWidgetsElementor
 * @author     WP Travel
 * @license    https://opensource.org/licenses/GPL-2.0 GPL-2.0-only
 * @since      1.0.0
 * php version 7.4
 */

namespace WTWE\Widgets\Travel_Guide\Single_Travel_Guide_Featured_trip;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use WTWE\Helper\WTWE_Helper;
use WP_Travel_Helpers_Trip_Dates;
use WP_Travel_Helpers_Trips;
use WP_Travel_Helpers_Pricings;
// Security Note: Blocks direct access to the plugin PHP files.
defined('ABSPATH') || exit;

/**
 * Guide Featured Trip widget class.
 *
 * @since 1.0.0
 */
if (!class_exists('WTWE_Guide_Featured_trip')) {
    class WTWE_Guide_Featured_trip extends Widget_Base
    {
        public function __construct($data = array(), $args = null)
        {
            parent::__construct($data, $args);
            $prefixed = defined( WP_DEBUG ) ? '.min' : '';
			wp_register_style( 'guide-featured-trip', plugins_url( 'assets/css/guide-featured-trip' . $prefixed . '.css', WTWE_PLUGIN_FILE ), array() );

        }

        public function get_name()
        {
            return 'wp-travel-guide-featured-trip';
        }

        public function get_title()
        {
            return esc_html__('Guide Featured Trip', 'wt-widgets-elementor');
        }

        public function get_icon()
        {
            return 'eicon-star';
        }

        public function get_categories()
        {
            return array('wp-travel-guide');
        }

        	/**
		 * Enqueue styles.
		 */
		public function get_style_depends() {
			return array( 'guide-featured-trip' );
		}

        protected function _register_controls()
        {
            $this->start_controls_section(
                'content_section',
                [
                    'label' => __('Content', 'wt-widgets-elementor'),
                    'tab' => Controls_Manager::TAB_CONTENT,
                ]
            );


            $this->add_control(
                'layout_type',
                [
                    'label' => __('Layout Type', 'wt-widgets-elementor'),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'default-layout',
                    'options' => [
                        'default-layout' => __('Default Layout', 'wt-widgets-elementor'),
                        // Add more layout options as needed
                    ],
                ]
            );

            $this->add_control(
                'card_layout',
                [
                    'label' => __('Card Layout', 'wt-widgets-elementor'),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'grid-view',
                    'options' => [
                        'grid-view' => __('Grid View', 'wt-widgets-elementor'),
                    ],
                ]
            );
            
            
            $this->end_controls_section();
        }

        protected function render()
        {
            // Check if in editor mode, exit early if so.
            if (\Elementor\Plugin::$instance->editor->is_edit_mode()) {
                return;
            }

            $settings = $this->get_settings_for_display();

            // Check if required plugin is active.
            if (is_plugin_active('wp-travel-pro/wp-travel-pro.php')) {
                // Call the rendering function
                $this->wptravel_widget_guide_featured_trip_render($settings);
            }
        }

        // Function moved outside the render method to prevent redeclaration
        private function wptravel_widget_guide_featured_trip_render(  $settings ) {
            
            $guide_data = get_user_by( 'login', get_the_title() )->data;
            
            $layout_type = isset(  $settings['layoutType'] ) ?  $settings['layoutType'] : 'default-layout' ;
            $card_layout = isset(  $settings['cardLayout'] ) ?  $settings['cardLayout'] : 'grid-view' ;
            ?>
        
            <div id="wptravel-widget-trips-list" class="wptravel-widget-wrapper wptravel-guide-featured-trips wptravel-widget-preview <?php echo $layout_type.' '.'widget-id-'.hash( 'sha256', json_encode($settings) ); ?>">
                <div class="wp-travel-itinerary-items">
                    <?php
        
                    if ( !$guide_data && empty( get_user_meta( $guide_data->ID, 'trip_list', true ) ) ) {
                        echo __( 'Guide Featured Trip widget only visible in frontend.', 'wt-widgets-elementor' );
                    } else {
                        $args = array(
                            'post_type' => 'itineraries',
                            'post__in'  => get_user_meta( $guide_data->ID, 'trip_list', true ),
                        );
        
                        $query = new \WP_Query( $args );

                        if( $query->have_posts() ) { ?>
                            <div class="wp-travel-itinerary-items wptravel-archive-wrapper  <?php echo $layout_type == 'default-layout' ? 'grid-view' : esc_attr( $card_layout ); ?>">
                            <?php while( $query->have_posts() ) {
                                $query->the_post();
                                $trip_id = get_the_ID();
                                $is_featured_trip = get_post_meta( $trip_id, 'wp_travel_featured', true );

                                if (class_exists('WP_Travel_Helpers_Trip_Dates') && method_exists('WP_Travel_Helpers_Trip_Dates', 'is_fixed_departure')) {
                                    $is_fixed_departure = WP_Travel_Helpers_Trip_Dates::is_fixed_departure($trip_id);
                                }

                                $is_fixed_departure = WP_Travel_Helpers_Trip_Dates::is_fixed_departure( $trip_id );
                                $trip_locations = get_the_terms( $trip_id, 'travel_locations' );
                                $location_name = '';
                                $location_link = '';
                                $group_size = wptravel_get_group_size( $trip_id );
                                $trip_url = get_the_permalink();
        
                                if ( $trip_locations && is_array( $trip_locations ) ) {
                                    $first_location = array_shift( $trip_locations );
                                    $location_name  = $first_location->name;
                                    $location_link  = get_term_link( $first_location->term_id, 'travel_locations' );
                                }
        
                                $args = $args_regular = array( 'trip_id' => $trip_id );
                                $trip_price = WP_Travel_Helpers_Pricings::get_price( $args );
                                $args_regular['is_regular_price'] = true;
                                $regular_price = WP_Travel_Helpers_Pricings::get_price( $args_regular );
                                $is_enable_sale = WP_Travel_Helpers_Trips::is_sale_enabled(
                                    array(
                                        'trip_id'                => $trip_id,
                                        'from_price_sale_enable' => true,
                                    )
                                );
        
                                if( $card_layout == 'grid-view' ) {
                                    /**
                                     * 
                                     */
                                    if( $layout_type == 'default-layout' ) {
                                        wptravel_get_block_template_part( 'v2/content', 'archive-itineraries' );
                                    } elseif( $layout_type == 'layout-one' ) {
                                        //for future
                                        // include( WTWE_ABSPATH . "inc/layouts/grid-layouts/layout-one.php" );
                                    } 
        
                                    /**
                                     * For future 
                                     */
                                    // wp_travel_get_template_layout( $layout_type );
                                }
        
                                if( $card_layout == 'list-view' ) {
                                    // For future
                                 
                                }
                            } ?>
                        </div>
                        <?php 
                        wp_reset_postdata();    
                        }else{
                            echo esc_html__( 'No featured trips found..', 'wt-widgets-elementor' );
                        } }?>
                    
                </div>
            </div>
            <style>
               /* For Future */
            </style>
            <?php
        
        }

        protected function _content_template()
        {
            if (is_plugin_active('wp-travel-pro/wp-travel-pro.php') && \Elementor\Plugin::$instance->editor->is_edit_mode()) {
                ?>

<div class="wp-travel-itinerary-items wptravel-archive-wrapper  grid-view">
                            	<!-- Contents Here -->
	<div class="view-box">
		<div class="view-image">
						<a href="https://localhost/wtwidgets/itinerary/magnificiant-thailands/" class="image-thumb">
				<div class="image-overlay"></div>
				<img fetchpriority="high" width="640" height="480" src="https://localhost/wtwidgets/wp-content/uploads/2024/03/IMG_20191009_160446-01-1024x768.jpeg" class="attachment-large size-large wp-post-image" alt="">			</a>
						<div class="offer">
				<span>#WT-CODE 91</span>
			</div>
					</div>

		<div class="view-content">
			<div class="left-content">
								<header>
										<h2 class="entry-title">
						<a class="heading-link" href="https://localhost/wtwidgets/itinerary/magnificiant-thailands/" rel="bookmark" title="Permalink to: Magnificiant Thailands">
							Magnificiant Thailands						</a>
					</h2>
					<div class="favourite"><a href="javascript:void(0);" data-id="46" data-event="add" title="Add" class="wp-travel-add-to-wishlists"><i class="fas fa-bookmark"></i> Add</a></div>				</header>
								<div class="trip-icons">
								<div class="wp-travel-trip-time trip-duration">
				<i class="far fa-clock"></i>				<span class="wp-travel-trip-duration">
					5 Day(s) 4 Night(s)				</span>
			</div>
							<div class="trip-location">
						<i class="fas fa-map-marker-alt"></i>						<span>
															<a href="https://localhost/wtwidgets/travel-locations/america/">America</a>
																			<i class="fas fa-angle-down"></i>
										<ul>
																							<li><a href="https://localhost/wtwidgets/travel-locations/asia/">Asia</a></li>
																							<li><a href="https://localhost/wtwidgets/travel-locations/dubai/">Dubai</a></li>
																							<li><a href="https://localhost/wtwidgets/travel-locations/europe/">Europe</a></li>
																							<li><a href="https://localhost/wtwidgets/travel-locations/france/">France</a></li>
																					</ul>
																							</span>
					</div>
					<div class="group-size">
						<i class="fas fa-users"></i>						<span>7</span>
					</div>
				</div>
				<div class="trip-desc">
					<p>Thailand is a Southeast Asian country. It’s known for tropical beaches, opulent royal palaces, ancient ruins and ornate temples displaying figures of Buddha.</p>
				</div>
			</div>
			<div class="right-content">
				<div class="footer-wrapper">
					<div class="trip-price">
									<span class="discount">
				<span>20.00%</span> Off			</span>
																<span class="price-here">
											<span class="wp-travel-trip-currency">$</span><span class="wp-travel-trip-price-figure">4,000.00</span>
										</span>
																			<del>			<span class="wp-travel-trip-currency">$</span><span class="wp-travel-regular-price-figure">5,000.00</span>
			</del>
						
					</div>
					<div class="trip-rating">
													<div class="wp-travel-average-review">
									<div class="wp-travel-average-review" title="Rated 3 out of 5">
		<a>
			<span style="width:60%">
				<strong itemprop="ratingValue" class="rating">3</strong> out of <span itemprop="bestRating">5</span>			</span>
		</a>

	</div>
																</div>
							<span class="wp-travel-review-text"> (1 Reviews)</span>
											</div>
				</div>

								
				<a class="wp-block-button__link explore-btn" href="https://localhost/wtwidgets/itinerary/magnificiant-thailands/"><span>Explore</span></a>
			</div>
		</div>
	</div>

	<!-- Contents Here -->
	<div class="view-box">
		<div class="view-image">
						<a href="https://localhost/wtwidgets/itinerary/want-to-visit-las-vegas/" class="image-thumb">
				<div class="image-overlay"></div>
				<img width="640" height="480" src="https://localhost/wtwidgets/wp-content/uploads/2024/03/wheat-hill-cloud-house-1024x768.jpg" class="attachment-large size-large wp-post-image" alt="">			</a>
						<div class="offer">
				<span>#WT-CODE Las Vegas</span>
			</div>
					</div>

		<div class="view-content">
			<div class="left-content">
								<header>
										<h2 class="entry-title">
						<a class="heading-link" href="https://localhost/wtwidgets/itinerary/want-to-visit-las-vegas/" rel="bookmark" title="Permalink to: Want to Visit Las Vegas">
							Want to Visit Las Vegas						</a>
					</h2>
					<div class="favourite"><a href="javascript:void(0);" data-id="43" data-event="add" title="Add" class="wp-travel-add-to-wishlists"><i class="fas fa-bookmark"></i> Add</a></div>				</header>
								<div class="trip-icons">
							<div class="wp-travel-trip-time trip-duration">
			<i class="far fa-calendar-alt"></i>			<span class="wp-travel-trip-duration">
				January 25, 2025			</span>
		</div>
							<div class="trip-location">
						<i class="fas fa-map-marker-alt"></i>						<span>
															<a href="https://localhost/wtwidgets/travel-locations/germany/">Germany</a>
																							</span>
					</div>
					<div class="group-size">
						<i class="fas fa-users"></i>						<span>6</span>
					</div>
				</div>
				<div class="trip-desc">
					<p>Las Vegas, officially the City of Las Vegas and often known simply as Vegas, is the 28th-most populous city in the United States,</p>
				</div>
			</div>
			<div class="right-content">
				<div class="footer-wrapper">
					<div class="trip-price">
									<span class="discount">
				<span>87.40%</span> Off			</span>
																<span class="price-here">
											<span class="wp-travel-trip-currency">$</span><span class="wp-travel-trip-price-figure">630.00</span>
										</span>
																			<del>			<span class="wp-travel-trip-currency">$</span><span class="wp-travel-regular-price-figure">5,000.00</span>
			</del>
						
					</div>
					<div class="trip-rating">
													<div class="wp-travel-average-review">
									<div class="wp-travel-average-review" title="Rated 5 out of 5">
		<a>
			<span style="width:100%">
				<strong itemprop="ratingValue" class="rating">5</strong> out of <span itemprop="bestRating">5</span>			</span>
		</a>

	</div>
																</div>
							<span class="wp-travel-review-text"> (1 Reviews)</span>
											</div>
				</div>

								
				<a class="wp-block-button__link explore-btn" href="https://localhost/wtwidgets/itinerary/want-to-visit-las-vegas/"><span>Explore</span></a>
			</div>
		</div>
	</div>

	<!-- Contents Here -->
	<div class="view-box">
		<div class="view-image">
						<a href="https://localhost/wtwidgets/itinerary/feelin-good-feel-best-at-miami/" class="image-thumb">
				<div class="image-overlay"></div>
				<img loading="lazy" width="640" height="853" src="https://localhost/wtwidgets/wp-content/uploads/2024/03/swing-hill-768x1024.jpg" class="attachment-large size-large wp-post-image" alt="">			</a>
						<div class="offer">
				<span>#WT-CODE 89</span>
			</div>
					</div>

		<div class="view-content">
			<div class="left-content">
								<header>
										<h2 class="entry-title">
						<a class="heading-link" href="https://localhost/wtwidgets/itinerary/feelin-good-feel-best-at-miami/" rel="bookmark" title="Permalink to: Feelin Good, Feel Best at Miami">
							Feelin Good, Feel Best at Miami						</a>
					</h2>
					<div class="favourite"><a href="javascript:void(0);" data-id="45" data-event="add" title="Add" class="wp-travel-add-to-wishlists"><i class="fas fa-bookmark"></i> Add</a></div>				</header>
								<div class="trip-icons">
							<div class="wp-travel-trip-time trip-duration">
			<i class="far fa-calendar-alt"></i>			<span class="wp-travel-trip-duration">
				N/A			</span>
		</div>
							<div class="trip-location">
						<i class="fas fa-map-marker-alt"></i>						<span>
															<a href="https://localhost/wtwidgets/travel-locations/america/">America</a>
																			<i class="fas fa-angle-down"></i>
										<ul>
																							<li><a href="https://localhost/wtwidgets/travel-locations/europe/">Europe</a></li>
																							<li><a href="https://localhost/wtwidgets/travel-locations/france/">France</a></li>
																							<li><a href="https://localhost/wtwidgets/travel-locations/germany/">Germany</a></li>
																							<li><a href="https://localhost/wtwidgets/travel-locations/japan/">Japan</a></li>
																							<li><a href="https://localhost/wtwidgets/travel-locations/miami/">Miami</a></li>
																					</ul>
																							</span>
					</div>
					<div class="group-size">
						<i class="fas fa-users"></i>						<span>9</span>
					</div>
				</div>
				<div class="trip-desc">
					<p>Miami (/maɪˈæmi/), officially the City of Miami, is a coastal metropolis[8] located in southeastern Florida in the United States. It is the third…</p>
				</div>
			</div>
			<div class="right-content">
				<div class="footer-wrapper">
					<div class="trip-price">
									<span class="discount">
				<span>20.00%</span> Off			</span>
																<span class="price-here">
											<span class="wp-travel-trip-currency">$</span><span class="wp-travel-trip-price-figure">400.00</span>
										</span>
																			<del>			<span class="wp-travel-trip-currency">$</span><span class="wp-travel-regular-price-figure">500.00</span>
			</del>
						
					</div>
					<div class="trip-rating">
													<div class="wp-travel-average-review">
									<div class="wp-travel-average-review" title="Rated 4 out of 5">
		<a>
			<span style="width:80%">
				<strong itemprop="ratingValue" class="rating">4</strong> out of <span itemprop="bestRating">5</span>			</span>
		</a>

	</div>
																</div>
							<span class="wp-travel-review-text"> (1 Reviews)</span>
											</div>
				</div>

								
				<a class="wp-block-button__link explore-btn" href="https://localhost/wtwidgets/itinerary/feelin-good-feel-best-at-miami/"><span>Explore</span></a>
			</div>
		</div>
	</div>

                        </div>

                <?php
            } else {
                // Fallback or default behavior
            }
        }
    }
}
