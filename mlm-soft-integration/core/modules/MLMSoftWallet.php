<?php

namespace MLMSoft\core\modules;

use MLMSoft\core\MLMSoftPlugin;

class MLMSoftWallet
{
    /**
     * @var MLMSoftPlugin
     */
    private $mlmsoftPlugin;

    public function __construct()
    {
        $this->mlmsoftPlugin = MLMSoftPlugin::getInstance();
    }

    public function getAllWallets()
    {
        /**
         * @obsolete 
         * @since 3.8.0
         */
        // return $this->mlmsoftPlugin->api2->execGet('wallet/get-list');
        _deprecated_function(__FUNCTION__, '3.8.0', 'methods API v.3');
    }

    public function getWalletsBalance($accountId)
    {
        return $this->mlmsoftPlugin->api3->get("account/$accountId/wallet");
    }

    /**
     * @param integer $accountId
     * @param float $amount
     * @param string $walletAlias
     * @param integer $walletOperationTypeId
     * @param string $comment
     * @return bool
     * @throws \HttpException
     */
    public function addWalletOperation($accountId, $amount, $walletAlias, $walletOperationTypeId, $comment = '')
    {
        return $this->mlmsoftPlugin->api3->post("account/$accountId/wallet/$walletAlias/transaction", [
            'operationTypeId' => $walletOperationTypeId,
            'amount' => $amount,
            'comment' => $comment
        ]);
    }
}
