<?php

declare(strict_types=1);

/*
Copyright (C) 2020 All.In Data GmbH

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

namespace AllInData\CF7CRIntegration\Module\Admin\ContactForm7;

use AllInData\CF7CRIntegration\Helper\ContactForm7\ConfigHandler;
use AllInData\CF7CRIntegration\Helper\CleverReach\ApiHandler;
use AllInData\CF7CRIntegration\Model\CleverReach\Attribute;
use AllInData\CF7CRIntegration\Model\CleverReach\Receiver;
use AllInData\Micro\Core\Module\PluginModuleInterface;

/**
 * Class EventHandler
 * @package AllInData\CF7CRIntegration\Module\Admin
 */
class ContactForm7EventObserver implements PluginModuleInterface
{
    /**
     * @var ConfigHandler
     */
    private $configHandler;
    /**
     * @var ApiHandler
     */
    private $apiHandler;

    /**
     * ContactForm7EventObserver constructor.
     * @param ConfigHandler $configHandler
     * @param ApiHandler $apiHandler
     */
    public function __construct(ConfigHandler $configHandler, ApiHandler $apiHandler)
    {
        $this->configHandler = $configHandler;
        $this->apiHandler = $apiHandler;
    }

    /**
     * @inheritdoc
     */
    public function init()
    {
        add_action('wpcf7_mail_sent', [$this, 'onMailSentSucceeded']);
        add_action('wpcf7_mail_failed', [$this, 'onMailSentFailed']);
    }

    /**
     * @param \WPCF7_ContactForm $contactForm
     */
    public function onMailSentSucceeded(\WPCF7_ContactForm $contactForm)
    {
        $contactFormOptions = $this->configHandler->getOptions($contactForm->id());
        if (!$contactFormOptions['enabled']) {
            return;
        }

        $groupId = $contactFormOptions['group_id'] ?? 0;
        if (0 === $groupId) {
            return;
        }
        $group = $this->apiHandler->getGroupById($groupId);
        if (!$group->getId()) {
            return;
        }

        $formId = $contactFormOptions['form_id'] ?? 0;
        if (0 === $formId) {
            return;
        }
        $form = $this->apiHandler->getFormByFormId($formId);
        if (!$form->getId()) {
            return;
        }

        $submittedData = $this->getSubmittedFormData();
        if (empty($submittedData) || (!isset($submittedData['email']) && !isset($submittedData['your-email']))) {
            return;
        }
        if (!isset($submittedData['email']) && isset($submittedData['your-email'])) {
            $submittedData['email'] = $submittedData['your-email'];
        }

        $attributeSet = $this->apiHandler->getAttributes($group->getId());
        if (!is_array($attributeSet)) {
            $attributeSet = [];
        }
        $indexedAttributeSet = [];
        foreach ($attributeSet as $attribute) {
            $indexedAttributeSet[$attribute->getId()] = $attribute;
        }

        $fieldMappings = $contactFormOptions['field_mappings'];

        $globalAttributes = [];
        $groupAttributes = [];
        foreach ($fieldMappings as $key => $attributeId) {
            /** @var Attribute $attribute */
            $attribute = $indexedAttributeSet[$attributeId];
            if (!$attribute) {
                continue;
            }
            $value = $submittedData[$key];
            if ($attribute->isGlobal()) {
                $globalAttributes[$key] = $value;
                continue;
            }

            $groupAttributes[$key] = $value;
        }

        $timestamp = time();
        $receiver = new Receiver();
        $receiver->setEmail($submittedData['email']);
        $receiver->setRegistered($timestamp);
        $receiver->setActivated(0);
        $receiver->setDeactivated($timestamp);
        $receiver->setSource($submittedData['subject'] ?? __('All.In Data - Contact Form 7 CleverReach Integration',
                \AllInDataContactForm7CleverReachIntegration::load()->getTextDomain()));
        $receiver->setAttributes($groupAttributes);
        $receiver->setGlobalAttributes($globalAttributes);

        $this->apiHandler->addReceiverToGroup($group, $form, $receiver);
    }

    /**
     * @param \WPCF7_ContactForm $contactForm
     */
    public function onMailSentFailed(\WPCF7_ContactForm $contactForm)
    {
        //
        echo '';
    }

    /**
     * @return array|mixed|null
     */
    private function getSubmittedFormData()
    {
        $submittedContactForm = \WPCF7_Submission::get_instance();
        if (!$submittedContactForm) {
            return [];
        }
        return $submittedContactForm->get_posted_data();
    }
}
