<?php

if ( ! defined('ABSPATH')) {
    exit;
}

use RankologyFno\Core\Kernel;

/**
 * Get a service.
 *
 * 
 *
 * @param string $service
 *
 * @return object
 */
function rankology_fno_get_service($service) {
    return Kernel::getContainer()->getServiceByName($service);
}

/**
 * Enable Google Suggestions
 *
 * 
 *
 * @param boolean true
 *
 * @return boolean
 */
add_filter('rankology_ui_metabox_google_suggest', '__return_true');

/**
 * Get Page Speed Mobile Score
 *
 * 
 *
 * @return string
 * @param mixed $json
 * @param mixed $mobile
 * @param mixed $is_mobile
 */
function rankology_fno_get_ps_score($json, $is_mobile = false) {
    if ( ! is_array($json)) {
        return;
    }
    if (array_key_first($json) === 'error') {
        return;
    }

    $ps_score = $json['lighthouseResult']['categories']['performance']['score'] ? ($json['lighthouseResult']['categories']['performance']['score']) * 100 : '';
    if ($is_mobile === true) {
        $i18n = __('Mobile', 'wp-rankology');
    } else {
        $i18n = __('Desktop', 'wp-rankology');
    }

    if ($ps_score >= 0 && $ps_score < 49) {
        $class_score = 'red';
    } elseif ($ps_score >= 50 && $ps_score < 90) {
        $class_score = 'yellow';
    } elseif ($ps_score >= 90 && $ps_score <= 100) {
        $class_score = 'green';
    } else {
        $class_score = 'grey';
    }

    $perf_score = '<div class="wrap-chart">
    <p>' . $i18n . '</p>
        <div class="ps-score ' . $class_score . '">
            <svg role="img" aria-hidden="true" focusable="false" width="100%" height="100%" viewBox="0 0 36 36" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <path stroke-dasharray="100, 100" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"></path>
                <path id="bar" stroke-dasharray="' . $ps_score . ', 100" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"></path>
            </svg>
            <span>' . $ps_score . '%</span>
        </div>
    </div>';

    return $perf_score;
}

/**
 * Get Core Web Vitals Score
 *
 * 
 *
 * @return string
 * @param mixed $json
 */
function rankology_fno_get_cwv_score($json) {
    if (array_key_first($json) === 'error') {
        return;
    }
    $core_web_vitals_score = false;

    if ( ! isset($json['loadingExperience']['metrics'])) {
        return $core_web_vitals_score = null;
    }

    if (
                    (isset($json['loadingExperience']['metrics']['FIRST_INPUT_DELAY_MS']['category']) && $json['loadingExperience']['metrics']['FIRST_INPUT_DELAY_MS']['category'] === 'FAST') &&
                (isset($json['loadingExperience']['metrics']['LARGEST_CONTENTFUL_PAINT_MS']['category']) && $json['loadingExperience']['metrics']['LARGEST_CONTENTFUL_PAINT_MS']['category'] === 'FAST') &&
                (isset($json['loadingExperience']['metrics']['CUMULATIVE_LAYOUT_SHIFT_SCORE']['category']) && $json['loadingExperience']['metrics']['CUMULATIVE_LAYOUT_SHIFT_SCORE']['category'] === 'FAST')) {
        $core_web_vitals_score = true;
    } elseif (
                    (isset($json['loadingExperience']['metrics']['LARGEST_CONTENTFUL_PAINT_MS']['category']) && $json['loadingExperience']['metrics']['LARGEST_CONTENTFUL_PAINT_MS']['category'] === 'FAST') &&
                    (isset($json['loadingExperience']['metrics']['CUMULATIVE_LAYOUT_SHIFT_SCORE']['category']) && $json['loadingExperience']['metrics']['CUMULATIVE_LAYOUT_SHIFT_SCORE']['category'] === 'FAST')
                ) {
        $core_web_vitals_score = true;
    }

    return $core_web_vitals_score;
}

/**
 * Get GA Dashboard widget option
 *
 * 
 *
 * @return string
 */
function rankology_google_analytics_dashboard_widget_option() {
    $rankology_google_analytics_dashboard_widget_option = get_option('rankology_google_analytics_option_name');
    if ( ! empty($rankology_google_analytics_dashboard_widget_option)) {
        foreach ($rankology_google_analytics_dashboard_widget_option as $key => $rankology_google_analytics_dashboard_widget_value) {
            $options[$key] = $rankology_google_analytics_dashboard_widget_value;
        }
        if (isset($rankology_google_analytics_dashboard_widget_option['rankology_google_analytics_dashboard_widget'])) {
            return $rankology_google_analytics_dashboard_widget_option['rankology_google_analytics_dashboard_widget'];
        }
    }
}

/**
 * Get GA Dashboard widget role option
 *
 * @return string
 */
function rankology_advanced_security_ga_widget_role_option() {
    $service = rankology_get_service('AdvancedOption');

    if ( ! empty($service) || ! method_exists($service, 'getSecurityGaWidgetRole')) {
        $data = get_option('rankology_advanced_option_name');
        if (isset($data['rankology_advanced_security_ga_widget_role'])) {
            return $data['rankology_advanced_security_ga_widget_role'];
        }
    }

    return $service->getSecurityGaWidgetRole();
}

/**
 * Check GA Dashboard widget capability
 *
 * @return boolean
 */
function rankology_advanced_security_ga_widget_check() {
    if (empty(rankology_advanced_security_ga_widget_role_option())) {
        $rankology_ga_dashboard_widget_cap = 'edit_dashboard';
        $rankology_ga_dashboard_widget_cap = apply_filters('rankology_ga_dashboard_widget_cap', $rankology_ga_dashboard_widget_cap);

        return current_user_can($rankology_ga_dashboard_widget_cap);
    }

    global $wp_roles;

    //Get current user role
    if ( ! isset(wp_get_current_user()->roles[0])) {
        return;
    }
    $rankology_user_role = wp_get_current_user()->roles[0];

    if (array_key_exists($rankology_user_role, rankology_advanced_security_ga_widget_role_option())) {
        return true;
    }

    return;
}

/**
 * Retrocompatibility for PHP < 8.0
 */
if ( ! function_exists('str_starts_with')) {
    function str_starts_with($haystack, $needle) {
        return (string)$needle !== '' && strncmp($haystack, $needle, strlen($needle)) === 0;
    }
}

/**
* @
*/
function rankology_get_toggle_white_label_option() {
    if (method_exists(rankology_get_service('ToggleOption'), 'getToggleWhiteLabel')) {
        return rankology_get_service('ToggleOption')->getToggleWhiteLabel();
    }
}

/**
 * @
 */
function rankology_xml_sitemap_news_enable_option() {
    return rankology_fno_get_service('OptionPro')->getGoogleNewsEnable();
}

/**
 * Get LB types list
 */
function rankology_lb_types_list() {
    $rankology_lb_types = [
        'LocalBusiness' => __('Local Business (default)', 'wp-rankology'),
        'AnimalShelter' => __('Animal Shelter', 'wp-rankology'),
        'AutomotiveBusiness' => __('Automotive Business', 'wp-rankology'),
        'AutoBodyShop' => __('|-Auto Body Shop', 'wp-rankology'),
        'AutoDealer' => __('|-Auto Dealer', 'wp-rankology'),
        'AutoPartsStore' => __('|-Auto Parts Store', 'wp-rankology'),
        'AutoRental' => __('|-Auto Rental', 'wp-rankology'),
        'AutoRepair' => __('|-Auto Repair', 'wp-rankology'),
        'AutoWash' => __('|-AutoWash', 'wp-rankology'),
        'GasStation' => __('|-Gas Station', 'wp-rankology'),
        'MotorcycleDealer' => __('|-Motorcycle Dealer', 'wp-rankology'),
        'MotorcycleRepair' => __('|-Motorcycle Repair', 'wp-rankology'),
        'ChildCare' => __('Child Care', 'wp-rankology'),
        'DryCleaningOrLaundry' => __('Dry Cleaning Or Laundry', 'wp-rankology'),
        'EmergencyService' => __('Emergency Service', 'wp-rankology'),
        'FireStation' => __('|-Fire Station', 'wp-rankology'),
        'Hospital' => __('|-Hospital', 'wp-rankology'),
        'PoliceStation' => __('|-Police Station', 'wp-rankology'),
        'EmploymentAgency' => __('Employment Agency', 'wp-rankology'),
        'EntertainmentBusiness' => __('Entertainment Business', 'wp-rankology'),
        'AdultEntertainment' => __('|-Adult Entertainment', 'wp-rankology'),
        'AmusementPark' => __('|-Amusement Park', 'wp-rankology'),
        'ArtGallery' => __('|-Art Gallery', 'wp-rankology'),
        'Casino' => __('|-Casino', 'wp-rankology'),
        'ComedyClub' => __('|-Comedy Club', 'wp-rankology'),
        'MovieTheater' => __('|-Movie Theater', 'wp-rankology'),
        'NightClub' => __('|-Night Club', 'wp-rankology'),
        'FinancialService' => __('Financial Service', 'wp-rankology'),
        'AccountingService' => __('|-Accounting Service', 'wp-rankology'),
        'AutomatedTeller' => __('|-Automated Teller', 'wp-rankology'),
        'BankOrCreditUnion' => __('|-Bank Or Credit Union', 'wp-rankology'),
        'InsuranceAgency' => __('|-Insurance Agency', 'wp-rankology'),
        'FoodEstablishment' => __('Food Establishment', 'wp-rankology'),
        'Bakery' => __('|-Bakery', 'wp-rankology'),
        'BarOrPub' => __('|-Bar Or Pub', 'wp-rankology'),
        'Brewery' => __('|-Brewery', 'wp-rankology'),
        'CafeOrCoffeeShop' => __('|-Cafe Or Coffee Shop', 'wp-rankology'),
        'FastFoodRestaurant' => __('|-Fast Food Restaurant', 'wp-rankology'),
        'IceCreamShop' => __('|-Ice Cream Shop', 'wp-rankology'),
        'Restaurant' => __('|-Restaurant', 'wp-rankology'),
        'Winery' => __('|-Winery', 'wp-rankology'),
        'GovernmentOffice' => __('Government Office', 'wp-rankology'),
        'PostOffice' => __('|-PostOffice', 'wp-rankology'),
        'HealthAndBeautyBusiness' => __('Health And Beauty Business', 'wp-rankology'),
        'BeautySalon' => __('|-Beauty Salon', 'wp-rankology'),
        'DaySpa' => __('|-Day Spa', 'wp-rankology'),
        'HairSalon' => __('|-Hair Salon', 'wp-rankology'),
        'HealthClub' => __('|-Health Club', 'wp-rankology'),
        'NailSalon' => __('|-Nail Salon', 'wp-rankology'),
        'TattooParlor' => __('|-Tattoo Parlor', 'wp-rankology'),
        'HomeAndConstructionBusiness' => __('Home And Construction Business', 'wp-rankology'),
        'Electrician' => __('|-Electrician', 'wp-rankology'),
        'HVACBusiness' => __('|-HVAC Business', 'wp-rankology'),
        'HousePainter' => __('|-House Painter', 'wp-rankology'),
        'Locksmith' => __('|-Locksmith', 'wp-rankology'),
        'MovingCompany' => __('|-Moving Company', 'wp-rankology'),
        'Plumber' => __('|-Plumber', 'wp-rankology'),
        'RoofingContractor' => __('|-Roofing Contractor', 'wp-rankology'),
        'InternetCafe' => __('Internet Cafe', 'wp-rankology'),
        'MedicalBusiness' => __('Medical Business', 'wp-rankology'),
        'CommunityHealth' => __('|-Community Health', 'wp-rankology'),
        'Dentist' => __('|-Dentist', 'wp-rankology'),
        'Dermatology' => __('|-Dermatology', 'wp-rankology'),
        'DietNutrition' => __('|-Diet Nutrition', 'wp-rankology'),
        'Emergency' => __('|-Emergency', 'wp-rankology'),
        'Gynecologic' => __('|-Gynecologic', 'wp-rankology'),
        'MedicalClinic' => __('|-Medical Clinic', 'wp-rankology'),
        'Midwifery' => __('|-Midwifery', 'wp-rankology'),
        'Nursing' => __('|-Nursing', 'wp-rankology'),
        'Obstetric' => __('|-Obstetric', 'wp-rankology'),
        'Oncologic' => __('|-Oncologic', 'wp-rankology'),
        'Optician' => __('|-Optician', 'wp-rankology'),
        'Optometric' => __('|-Optometric', 'wp-rankology'),
        'Otolaryngologic' => __('|-Otolaryngologic', 'wp-rankology'),
        'Pediatric' => __('|-Pediatric', 'wp-rankology'),
        'Pharmacy' => __('|-Pharmacy', 'wp-rankology'),
        'Physician' => __('|-Physician', 'wp-rankology'),
        'Physiotherapy' => __('|-Physiotherapy', 'wp-rankology'),
        'PlasticSurgery' => __('|-Plastic Surgery', 'wp-rankology'),
        'Podiatric' => __('|-Podiatric', 'wp-rankology'),
        'PrimaryCare' => __('|-Primary Care', 'wp-rankology'),
        'Psychiatric' => __('|-Psychiatric', 'wp-rankology'),
        'PublicHealth' => __('|-Public Health', 'wp-rankology'),
        'VeterinaryCare' => __('|-Veterinary Care', 'wp-rankology'),
        'LegalService' => __('Legal Service', 'wp-rankology'),
        'Attorney' => __('|-Attorney', 'wp-rankology'),
        'Notary' => __('|-Notary', 'wp-rankology'),
        'Library' => __('Library', 'wp-rankology'),
        'LodgingBusiness' => __('Lodging Business', 'wp-rankology'),
        'BedAndBreakfast' => __('|-Bed And Breakfast', 'wp-rankology'),
        'Campground' => __('|-Campground', 'wp-rankology'),
        'Hostel' => __('|-Hostel', 'wp-rankology'),
        'Hotel' => __('|-Hotel', 'wp-rankology'),
        'Motel' => __('|-Motel', 'wp-rankology'),
        'Resort' => __('|-Resort', 'wp-rankology'),
        'ProfessionalService' => __('Professional Service', 'wp-rankology'),
        'RadioStation' => __('Radio Station', 'wp-rankology'),
        'RealEstateAgent' => __('Real Estate Agent', 'wp-rankology'),
        'RecyclingCenter' => __('Recycling Center', 'wp-rankology'),
        'SelfStorage' => __('Real Self Storage', 'wp-rankology'),
        'ShoppingCenter' => __('Shopping Center', 'wp-rankology'),
        'SportsActivityLocation' => __('Sports Activity Location', 'wp-rankology'),
        'BowlingAlley' => __('|-Bowling Alley', 'wp-rankology'),
        'ExerciseGym' => __('|-Exercise Gym', 'wp-rankology'),
        'GolfCourse' => __('|-Golf Course', 'wp-rankology'),
        'HealthClub' => __('|-Health Club', 'wp-rankology'),
        'PublicSwimmingPool' => __('|-Public Swimming Pool', 'wp-rankology'),
        'SkiResort' => __('|-Ski Resort', 'wp-rankology'),
        'SportsClub' => __('|-Sports Club', 'wp-rankology'),
        'StadiumOrArena' => __('|-Stadium Or Arena', 'wp-rankology'),
        'TennisComplex' => __('|-Tennis Complex', 'wp-rankology'),
        'Store' => __('Store', 'wp-rankology'),
        'AutoPartsStore' => __('|-Auto Parts Store', 'wp-rankology'),
        'BikeStore' => __('|-Bike Store', 'wp-rankology'),
        'BookStore' => __('|-Book Store', 'wp-rankology'),
        'ClothingStore' => __('|-Clothing Store', 'wp-rankology'),
        'ComputerStore' => __('|-Computer Store', 'wp-rankology'),
        'ConvenienceStore' => __('|-Convenience Store', 'wp-rankology'),
        'DepartmentStore' => __('|-Department Store', 'wp-rankology'),
        'ElectronicsStore' => __('|-Electronics Store', 'wp-rankology'),
        'Florist' => __('|-Florist', 'wp-rankology'),
        'FurnitureStore' => __('|-Furniture Store', 'wp-rankology'),
        'GardenStore' => __('|-Garden Store', 'wp-rankology'),
        'GroceryStore' => __('|-Grocery Store', 'wp-rankology'),
        'HardwareStore' => __('|-Hardware Store', 'wp-rankology'),
        'HobbyShop' => __('|-Hobby Shop', 'wp-rankology'),
        'HomeGoodsStore' => __('|-Home Goods Store', 'wp-rankology'),
        'JewelryStore' => __('|-Jewelry Store', 'wp-rankology'),
        'LiquorStore' => __('|-Liquor Store', 'wp-rankology'),
        'MensClothingStore' => __('|-Mens Clothing Store', 'wp-rankology'),
        'MobilePhoneStore' => __('|-Mobile Phone Store', 'wp-rankology'),
        'MovieRentalStore' => __('|-Movie Rental Store', 'wp-rankology'),
        'MusicStore' => __('|-Music Store', 'wp-rankology'),
        'OfficeEquipmentStore' => __('|-Office Equipment Store', 'wp-rankology'),
        'OutletStore' => __('|-Outlet Store', 'wp-rankology'),
        'PawnShop' => __('|-Pawn Shop', 'wp-rankology'),
        'PetStore' => __('|-Pet Store', 'wp-rankology'),
        'ShoeStore' => __('|-Shoe Store', 'wp-rankology'),
        'SportingGoodsStore' => __('|-Sporting Goods Store', 'wp-rankology'),
        'TireShop' => __('|-Tire Shop', 'wp-rankology'),
        'ToyStore' => __('|-Toy Store', 'wp-rankology'),
        'WholesaleStore' => __('|-Wholesale Store', 'wp-rankology'),
        'TelevisionStation' => __('|-Wholesale Store', 'wp-rankology'),
        'TouristInformationCenter' => __('Tourist Information Center', 'wp-rankology'),
        'TravelAgency' => __('Travel Agency', 'wp-rankology'),
    ];

    $rankology_lb_types = apply_filters('rankology_schemas_lb_types', $rankology_lb_types);

    return $rankology_lb_types;
}

/**
 * Automatically flush permalinks after saving XML News sitemaps global settings
 * 
 *
 * @param string $option
 * @param string $old_value
 * @param string $value
 *
 * @return void
 */
add_action('update_option', function( $option, $old_value, $value ) {
    if ($option ==='rankology_fno_option_name') {
        set_transient('rankology_flush_rewrite_rules', 1);
    }
}, 10, 3);

/*
 * Filter Notifications manager
 * 
 * @return array
 */
$versions = get_option( 'rankology_versions' );
$actual_version = isset( $versions['free'] ) ? $versions['free'] : 0;

if (version_compare($actual_version, '6.7', '>=') || (defined('SCRIPT_DEBUG') && SCRIPT_DEBUG === true)) {
    add_filter('rankology_notifications_center_item', 'rankology_fno_notifications_list', 10, 5);
    function rankology_fno_notifications_list($args, $alerts_info, $alerts_low, $alerts_medium, $alerts_high) {

        if ('1' === rankology_fno_get_service('OptionPro')->get404Cleaning() && ! wp_next_scheduled('rankology_404_cron_cleaning')) {
            $alerts_medium++;
            $args[] = [
                'id'         => 'notice-title-tag',
                'title'      => __('You have enabled 404 cleaning BUT the scheduled task is not running.', 'wp-rankology'),
                'desc'       => __('To solve this, please disable and re-enable Rankology FNO. No data will be lost.', 'wp-rankology'),
                'impact' => [
                    'medium' => __('Medium impact', 'wp-rankology'),
                ],
                'deleteable' => false,
                'status' => true,
            ];
        }

        if ('1' !== rankology_fno_get_service('OptionPro')->getRichSnippetEnable()) {
            $alerts_high++;
            $args[] = [
                'id'     => 'notice-schemas-metabox',
                'title'  => __('Structured data types is not correctly enabled', 'wp-rankology'),
                'desc'   => __('Please enable <strong>Structured Data Types metabox for your posts, pages and custom post types</strong> option in order to use automatic and manual schemas. (SEO > General Settings > Structured Data Types (schema.org)', 'wp-rankology'),
                'impact' => [
                    'high' => __('High impact', 'wp-rankology'),
                ],
                'link' => [
                    'en'       => esc_url(admin_url('admin.php?page=rankology-fno-page#tab=tab_rankology_rich_snippets')),
                    'title'    => __('Fix this!', 'wp-rankology'),
                    'external' => false,
                ],
                'deleteable' => false,
                'status' => true,
            ];
        }

        $status = false;
        if(file_exists(ABSPATH . 'robots.txt') && '1' !== rankology_fno_get_service('NoticeOption')->getNoticeRobotsTxt()){
            $alerts_high++;
            $status = true;

            $args[] = [
                'id'     => 'notice-robots-txt',
                'title'  => __('A physical robots.txt file has been found', 'wp-rankology'),
                'desc'   => __('A robots.txt file already exists at the root of your site. We invite you to remove it so Rankology can handle it virtually.', 'wp-rankology'),
                'impact' => [
                    'high' => __('High impact', 'wp-rankology'),
                ],
                'deleteable' => true,
                'status' => $status ? $status : false,
            ];
        }

        $args['impact']['high'] = $alerts_high;
        $args['impact']['medium'] = $alerts_medium;
        $args['impact']['low'] = $alerts_low;
        $args['impact']['info'] = $alerts_info;

        return $args;
    }
}
