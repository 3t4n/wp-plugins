<?php
namespace AcceptDonationBKash;

use AcceptDonationBKash\ADBKP_AcceptDonationBKash;

class ADBKP_Plugin {
    /**
     * Initialize and run the plugin.
     */
    public function run() {
        // Check if the main class exists before instantiating
        if ( class_exists( 'AcceptDonationBKash\ADBKP_AcceptDonationBKash' ) ) {
            $bkash = new ADBKP_AcceptDonationBKash();
        }
    }
}
