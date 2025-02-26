<?php
namespace AcceptDonationBKash;

use AcceptDonationBKash\ADBKP_Shortcode;
use AcceptDonationBKash\ADBKP_DonationProcessor;
use AcceptDonationBKash\ADBKP_APIHandler;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

class ADBKP_AcceptDonationBKash
{
    private $api_handler;
    private $shortcode;
    private $donation_processor;

    /**
     * Constructor.
     */
    public function __construct()
    {
        // Initialize API handler
        $this->api_handler = new ADBKP_APIHandler();

        // Initialize shortcode and donation processor
        $this->shortcode = new ADBKP_Shortcode($this->api_handler);
        $this->donation_processor = new ADBKP_DonationProcessor($this->api_handler);
    }
}
