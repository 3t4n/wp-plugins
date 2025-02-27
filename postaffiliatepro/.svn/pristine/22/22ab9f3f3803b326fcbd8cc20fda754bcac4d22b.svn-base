<?php
/**
 *   @copyright Copyright (c) 2024 Quality Unit s.r.o.
 *   @author Martin Svitek
 *   @package WpPostAffiliateProPlugin
 *   @since version 1.27.0
 *
 *   Licensed under GPL2
 */
class postaffiliatepro_Form_Settings_SureCart extends postaffiliatepro_Form_Base {
    public const SURECART_COMMISSION_ENABLED = 'surecart-commission-enabled';
    private const SURECART_CONFIG_PAGE = 'surecart-config-page';
    private const SURECART_COUPONS_TRACKING = 'surecart-coupons-tracking';
    private const SURECART_PRODUCT_ID = 'surecart-product-id';
    private const SURECART_DATA1 = 'surecart-data1';
    private const SURECART_DATA2 = 'surecart-data2';
    private const SURECART_DATA3 = 'surecart-data3';
    private const SURECART_DATA4 = 'surecart-data4';
    private const SURECART_DATA5 = 'surecart-data5';
    private const SURECART_CAMPAIGN = 'surecart-campaign';

    public function __construct() {
        parent::__construct(self::SURECART_CONFIG_PAGE, 'options.php');
    }

    protected function getTemplateFile() {
        return WP_PLUGIN_DIR . '/postaffiliatepro/Template/SureCartConfig.xtpl';
    }

    protected function initForm() {
        $this->addCheckbox(self::SURECART_COUPONS_TRACKING);
        $this->addSelect(self::SURECART_PRODUCT_ID, array(
            '0' => ' ',
            'product_id' => 'product ID',
            'product_name' => 'product name',
            'product_sku' => 'product SKU',
            'product_slug' => 'product slug'
        ));

        $dataOptions = array(
            '0' => ' ',
            'customer_id' => 'customer ID',
            'customer_email' => 'customer email',
            'customer_name' => 'customer name',
            'product_id' => 'product ID',
            'product_name' => 'product name',
            'product_sku' => 'product SKU',
            'product_slug' => 'product slug'
        );
        $this->addSelect(self::SURECART_DATA1, $dataOptions);
        $this->addSelect(self::SURECART_DATA2, $dataOptions);
        $this->addSelect(self::SURECART_DATA3, $dataOptions);
        $this->addSelect(self::SURECART_DATA4, $dataOptions);
        $this->addSelect(self::SURECART_DATA5, $dataOptions);

        $campaignHelper = new postaffiliatepro_Util_CampaignHelper();
        $campaignList = $campaignHelper->getCampaignsList();

        $campaigns = array(
            '0' => ' '
        );
        foreach ($campaignList as $row) {
            $campaigns[$row->get('campaignid')] = htmlspecialchars($row->get('name'));
        }
        $this->addSelect(self::SURECART_CAMPAIGN, $campaigns);

        $this->addSubmit();
    }

    public function initSettings() {
        register_setting(postaffiliatepro::INTEGRATIONS_SETTINGS_PAGE_NAME, self::SURECART_COMMISSION_ENABLED);
        register_setting(self::SURECART_CONFIG_PAGE, self::SURECART_COUPONS_TRACKING);
        register_setting(self::SURECART_CONFIG_PAGE, self::SURECART_PRODUCT_ID);
        register_setting(self::SURECART_CONFIG_PAGE, self::SURECART_DATA1);
        register_setting(self::SURECART_CONFIG_PAGE, self::SURECART_DATA2);
        register_setting(self::SURECART_CONFIG_PAGE, self::SURECART_DATA3);
        register_setting(self::SURECART_CONFIG_PAGE, self::SURECART_DATA4);
        register_setting(self::SURECART_CONFIG_PAGE, self::SURECART_DATA5);
        register_setting(self::SURECART_CONFIG_PAGE, self::SURECART_CAMPAIGN);
    }

    public function addPrimaryConfigMenu() {
        if (get_option(self::SURECART_COMMISSION_ENABLED) === 'true') {
            add_submenu_page('integrations-config-page-handle', __('SureCart', 'pap-integrations'), __('SureCart', 'pap-integrations'), 'manage_options', 'surecartintegration-settings-page', array(
                $this,
                'printConfigPage'
            ));
        }
    }

    public function printConfigPage() {
        $this->render();
    }

	public function addCssToHead() {
		if (get_option(self::SURECART_COMMISSION_ENABLED) === 'true') {
			echo "
<style>
    .paphideme {
        display: none;
    }
</style>
";
		}
	}

	public function integrateSureCartShortcodeForm($content) {
		if (get_option(self::SURECART_COMMISSION_ENABLED) !== 'true') {
			return $content;
		}
		$writeCookieCode = $this->getWriteCookieCode();
		return '<style>.paphideme {display: none;}</style>'.$content . $writeCookieCode;
	}

    public function writeCookieToHiddenField() {
	    if (is_feed()) {
		    return;
	    }
        if (get_option(self::SURECART_COMMISSION_ENABLED) !== 'true') {
			return;
        }
		echo $this->getWriteCookieCode();
    }

    public function trackInitialPurchase($purchase, $isRecurringFallback = false) {
        if (get_option(self::SURECART_COMMISSION_ENABLED) !== 'true') {
            return;
        }
        if (!class_exists('SureCart\Models\Purchase') || !($purchase instanceof \SureCart\Models\Purchase)) {
            postaffiliatepro_Base::_log('SureCart is not active or the tracking function received incorrect object. Tracking is stopped.');
            return;
        }
        $orderInstance = new \SureCart\Models\Order();
        $orderObject = $orderInstance::find($purchase->initial_order);
        $checkoutInstance = new \SureCart\Models\Checkout();
        $checkout = $checkoutInstance::find($orderObject->checkout);
        $cookie = trim($checkout->metadata->papvisitorid ?? '');
        $ip = $checkout->ip_address ?? '';
        $query = 'AccountId=' . postaffiliatepro::getAccountName() . '&visitorId=' . substr($cookie, -32);
        $campaignId = get_option(self::SURECART_CAMPAIGN);
        if ($campaignId && $campaignId !== '0') {
            $query .= '&CampaignID=' . $campaignId;
        }
        $totalCost = $checkout->net_paid_amount ?? 0;
		$totalCost /= 100;
        $productId = $this->getExtraData($purchase, 'productID');
        $coupon = '';
        if ($checkout->discount && get_option(self::SURECART_COUPONS_TRACKING) === 'true') {
            $discountInstance = new \SureCart\Models\Discount();
            $discount = $discountInstance::find($checkout->discount);
            $couponInstance = new \SureCart\Models\Promotion();
            $coupon = $couponInstance::find($discount->promotion)->code;
        }
        $orderId = $purchase->subscription ?? $purchase->id;
        if ($isRecurringFallback) {
            $orderId = $purchase->id;
        }
        $query .= "&TotalCost=$totalCost&OrderID=$orderId&ProductID=$productId";
        $query .= "&Currency=$checkout->currency&ip=$ip&Coupon=$coupon";
        for ($d = 1; $d <=5; $d++) {
            $query .= "&Data$d=" . urlencode($this->getExtraData($purchase, $d));
        }
        self::_log('Sending a tracking request with these details: ' . print_r($query, true));
        self::sendRequest(postaffiliatepro::parseSaleScriptPath(), $query);
    }

    public function trackSubscriptionRenewed($subscription) {
        if (get_option(self::SURECART_COMMISSION_ENABLED) !== 'true') {
            return;
        }
        if (!class_exists('SureCart\Models\Subscription') || !($subscription instanceof \SureCart\Models\Subscription)) {
            postaffiliatepro_Base::_log('SureCart is not active or the tracking function received incorrect object. Tracking is stopped.');
            return;
        }
        postaffiliatepro_Base::_log('Tracking renewal of subscription: ' . $subscription->id);
        $session = $this->getApiSession();
        if ($session === null || $session === '0') {
            $session = new Pap_Api_Session($this->getApiSessionUrl());
        }

        if (!$this->fireRecurringCommissions($session, $subscription->id, $subscription->subtotal_amount / 100, $subscription->currency)) {
            self::_log(__('Recurring commission for order ID ') . $subscription->id . ' failed, trying to create a regular commission.');
            $purchase = new \SureCart\Models\Purchase();
            $purchase = $purchase::find($subscription->purchase);
            $this->trackInitialPurchase($purchase, true);
        }
    }

    private function getExtraData($purchase, $field) {
        if ($field === 'productID') {
            $data = get_option(self::SURECART_PRODUCT_ID);
        } else {
            $data = get_option(constant('self::SURECART_DATA'.$field));
        }
        if ($data === '0') {
            return '';
        }
        $dataArray = explode('_', $data);
        if ($dataArray[0] === 'customer') {
            $customerInstance = new \SureCart\Models\Customer();
            return urlencode($customerInstance::find($purchase->customer)->{$dataArray[1]});
        }
        $productInstance = new \SureCart\Models\Product();
        return urlencode($productInstance::find($purchase->product)->{$dataArray[1]});
    }

	private function getWriteCookieCode() {
		return '<script type="text/javascript">
	window.papSureCartTrackingIdAdded = false;
    try {
        let papsurecartinput = document.querySelectorAll("sc-input[name=\'papvisitorid\']");
        if (papsurecartinput.length) {
            let papInterval = setInterval(function() {
				if (!window.papSureCartTrackingIdAdded && papsurecartinput[0].shadowRoot && papsurecartinput[0].shadowRoot.querySelectorAll(\'input[name="papvisitorid"]\').length) {
					if (typeof PostAffTracker !== "undefined") {
			            papsurecartinput[0].shadowRoot.querySelectorAll(\'input[name="papvisitorid"]\')[0].value = PostAffTracker.getVisitorId();
			        } else {
			            papsurecartinput[0].shadowRoot.querySelectorAll(\'input[name="papvisitorid"]\')[0].value = window.localStorage.getItem("PAPVisitorId") || (document.cookie.match(/PAPVisitorId=([^;]+)/) ? document.cookie.match(/PAPVisitorId=([^;]+)/)[1] : "");
			        }
                    window.papSureCartTrackingIdAdded = true;
					clearInterval(papInterval);
				}
			}, 500);
        }
    } catch (e) {
    	console.error("Error while trying to write PAP visitor ID to SureCart input field: " + e);
    }
</script>';
	}
}

$integration = new postaffiliatepro_Form_Settings_SureCart();
add_action('admin_init', array(
    $integration,
    'initSettings'
), 99);
add_action('admin_menu', array(
    $integration,
    'addPrimaryConfigMenu'
), 48);

add_action('wp_head', array(
	$integration,
	'addCssToHead'
), 99);

add_filter('surecart/shortcode/render', array(
	$integration,
	'integrateSureCartShortcodeForm'
), 100);

add_action('wp_footer', array(
    $integration,
    'writeCookieToHiddenField'
), 100);

add_action('surecart/purchase_created', array(
    $integration,
    'trackInitialPurchase'
));
add_action('surecart/subscription_renewed', array(
    $integration,
    'trackSubscriptionRenewed'
));