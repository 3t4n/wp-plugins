<?php

namespace APG\Core;

use APG\Core\Licenses;

/**
 * Class Addonmanager
 * @package APG\Core
 */
class Addonmanager {

    /**
     * @var
     */
    private $addons;

    /**
     * @var
     */
    private $verify_error_message;

    /**
     * @var
     */
    private $extensions;

    /**
     * Construct the manager
     *
     * @param $extensions
     */
    public function __construct( $extensions ) {
        $apg_licenses     = new Licenses( $extensions );
        $this->licenses   = $apg_licenses->get_licenses();
        $this->extensions = $extensions;
    }

    /**
     * Get a list of add-ons with the status
     *
     * @return array
     */
    public function get_addons() {
        $addons = array();

//        $addons['apg_ga'] = array(
//            'icon'        => 'dashicons-dashboard',
//            'title'       => 'Google Analytics',
//            'url'         => 'https://codebrothers.eu/product/apg-google-analytics/?utm_source=WordPress&utm_medium=banner&utm_campaign=Add-On',
//            'description' => __('Integrate your Google Analytics property with your photo albums. Track your users behaviour as events to Google Analytics.', 'apg'),
//            'status'      => false,
//            'license'     => null,
//        );
	    $addons['apg_premium'] = array(
            'icon'        => 'dashicons-share',
            'title'       => 'Awesome Photo Gallery Premium',
            'url'         => 'https://codebrothers.eu/awesome-photo-gallery-premium/?utm_source=WordPress&utm_medium=referral&utm_campaign=apg_settings',
            'description' => __('Get a lot of extra features, 1-year premium support and updates. Click the button to find out more!', 'apg'),
            'status'      => false,
            'license'     => null,
        );

        $addons = $this->set_active_addons( $addons );

        return $addons;
    }

    /**
     * Set the addons active
     *
     * @param $addons
     *
     * @return array
     */
    private function set_active_addons( $addons ) {
        foreach( $this->licenses as $code => $license ) {
            if( isset( $addons[ $code ] ) && $license['status'] === 'active' ) {
                $addons[ $code ]['status'] = true;
            }
        }

        return $addons;
    }

}
