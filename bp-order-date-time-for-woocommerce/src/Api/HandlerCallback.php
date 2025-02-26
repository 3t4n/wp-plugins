<?php
/**
 * @package BP Delivery For Woocommerce
 */

namespace Bright_Delivery_for_Woocommerce\Api;

use Bright_Delivery_for_Woocommerce\Base\BaseController;
use Bright_Delivery_for_Woocommerce\Traits\MessageTrait;

class HandlerCallback extends BaseController {

    /**
     * Callback of admin_notices, for add a error notice
     *
     * @since 1.0.0
     * @access public
     * @static
     *
     * @return void
     */
    public function add_error_to_admin_notices() {
        $msg_text = 'Oops! looks like WooCommerce is disabled. Please, ';
        $msg_text .= 'enable it in order to use Bright Delibery for Woocommerce for Woocommerce';

        MessageTrait::showError( $msg_text, MessageTrait::NOTICE_ERROR );
    }

    public function add_div_bbfw_before(){

        echo "<div class='bbfw-settings'>";
    }
    public function add_div_bbfw_after(){

        echo "</div>";
    }


}
