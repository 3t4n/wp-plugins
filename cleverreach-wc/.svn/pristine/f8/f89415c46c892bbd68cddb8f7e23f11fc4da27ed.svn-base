<?php

namespace CleverReach\WooCommerce\IntegrationCore\BusinessLogic\Receiver\Tasks\Composite\Components;

class BlacklistedEmailsResolver extends ReceiverSyncSubTask
{
    const CLASS_NAME = __CLASS__;
    const BATCH_SIZE = 250;
    const INITIAL_PROGRESS_PERCENT = 5;

    /**
     * Resolves blacklisted emails.
     *
     * @throws \CleverReach\WooCommerce\IntegrationCore\BusinessLogic\Authorization\Exceptions\FailedToRefreshAccessToken
     * @throws \CleverReach\WooCommerce\IntegrationCore\BusinessLogic\Authorization\Exceptions\FailedToRetrieveAuthInfoException
     * @throws \CleverReach\WooCommerce\IntegrationCore\Infrastructure\Http\Exceptions\HttpCommunicationException
     * @throws \CleverReach\WooCommerce\IntegrationCore\Infrastructure\Http\Exceptions\HttpRequestException
     */
    public function execute()
    {
        /** @var \CleverReach\WooCommerce\IntegrationCore\BusinessLogic\Receiver\Tasks\Composite\Context\ExecutionContext $context */
        $context = $this->getExecutionContext();
        $allReceiverEmailsToSync = $context->receiverEmails;
        $numberOfEmailsForSync = count($allReceiverEmailsToSync);

        while (count($allReceiverEmailsToSync) > 0) {
            $receiverEmails = $this->transformReceiverEmails($this->getBatchEmails($allReceiverEmailsToSync));
            $this->reportAlive();
            $blacklistedEmails = $this->getReceiverProxy()->getBlacklisted($context->groupId, $receiverEmails);
            $context->blacklistedEmails =
                !empty($blacklistedEmails) ? array_merge($context->blacklistedEmails, $this->removeSuffix($blacklistedEmails)) : $context->blacklistedEmails;
            $this->removeFinishedBatchEmails($allReceiverEmailsToSync);
            $this->reportProgressForBatch($allReceiverEmailsToSync, $numberOfEmailsForSync);
        }

        $this->reportProgress(100);
    }

    /**
     * Removes suffix from blacklisted emails
     *
     * @param string[] $emails
     *
     * @return string[]
     */
    protected function removeSuffix(array $emails)
    {
        $suffix = strtolower($this->getGroupService()->getBlacklistedEmailsSuffix());

        return array_map(function ($email) use ($suffix) {
            if (substr($email, -strlen($suffix)) === $suffix) {
                return substr($email, 0, -strlen($suffix));
            }
            return $email;
        }, $emails);
    }

    /**
     * Transforms receiver emails
     *
     * @param string[] $receiverEmails
     *
     * @return string[]
     */
    private function transformReceiverEmails(array $receiverEmails)
    {
        $transformedEmails = array();
        $suffix = $this->getGroupService()->getBlacklistedEmailsSuffix();

        foreach ($receiverEmails as $receiverEmail => $services) {
            $transformedEmails[] = $receiverEmail . $suffix;
        }

        return $transformedEmails;
    }

    /**
     * @param string[] $allReceiverEmailsToSync
     *
     * @return string[]
     */
    private function getBatchEmails(array $allReceiverEmailsToSync)
    {
        return array_slice($allReceiverEmailsToSync, 0, self::BATCH_SIZE);
    }

    /**
     * @param string[] $allReceiverEmailsToSync
     *
     * @return void
     */
    private function removeFinishedBatchEmails(array &$allReceiverEmailsToSync)
    {
        $allReceiverEmailsToSync = array_slice(
            $allReceiverEmailsToSync,
            self::BATCH_SIZE
        );
    }

    /**
     * @param string[] $allReceiverEmailsToSync
     * @param int $numberOfOrdersForSync
     *
     * @return void
     */
    private function reportProgressForBatch(array $allReceiverEmailsToSync, $numberOfOrdersForSync)
    {
        $numberSynchronizedOrders =
            $numberOfOrdersForSync - count($allReceiverEmailsToSync);

        $progressStep = $numberSynchronizedOrders *
            (100 - self::INITIAL_PROGRESS_PERCENT) / $numberOfOrdersForSync;

        $currentSyncProgress = self::INITIAL_PROGRESS_PERCENT + $progressStep;

        $this->reportProgress($currentSyncProgress);
    }
}
