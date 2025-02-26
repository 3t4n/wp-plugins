<?php


namespace MLMSoft\integrations\woocommerce\models\order;

/**
 * @obsolete file
 * @since 3.8.0
 */
if ( function_exists( '_deprecated_file' ) ) {
	_deprecated_file(
		basename( __FILE__ ),
		'3.8.0',
		'mlm-soft-integration/integrations/woocommerce/models/order/MLMSoftWCOrder.php',
        'with `MLMSoftWCOrder` class.'
	);
}

use MLMSoft\core\MLMSoftPlugin;

class MLMSoftV2WCOrder extends MLMSoftWCOrder
{
    public function sendVolumes($documentName = null)
    {
        _deprecated_function(__FUNCTION__, '3.8.0', '');
        
        /*
        $accountId = $this->getOwnedAccountId();
        if (!$accountId) {
            return;
        }
        $properties = $this->getVolumes();
        $mlmsoftPlugin = MLMSoftPlugin::getInstance();
        foreach ($properties as $key => $value) {
            $mlmsoftPlugin->api2->execPost('account/volume-change', [
                'accountId' => $accountId,
                'pointsAmount' => $value,
                'orderId' => (string)$this->get_id(),
                'volumePropertyAlias' => $key
            ]);
        }
        // */
    }
}