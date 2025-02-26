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

namespace AllInData\CF7CRIntegration\Block\Admin\ContactForm7;

use AllInData\CF7CRIntegration\Helper\CleverReach\ApiHandler;
use AllInData\CF7CRIntegration\Model\CleverReach\Attribute;
use AllInData\CF7CRIntegration\Model\CleverReach\Form;
use AllInData\CF7CRIntegration\Model\CleverReach\Group;
use AllInData\CF7CRIntegration\Helper\ContactForm7\ConfigHandler as ContactFormConfigHandler;
use AllInData\CF7CRIntegration\Helper\ConfigOptionHandler;
use AllInData\Micro\Core\Block\AbstractBlock;

/**
 * Class CleverReachSettingsBlock
 * @package AllInData\CF7CRIntegration\Block\Admin\ContactForm7
 */
class CleverReachSettingsBlock extends AbstractBlock
{
    const BLOCK_SLUG = \AllInDataContactForm7CleverReachIntegration::SLUG . '-settings-form';

    /**
     * @var ConfigOptionHandler
     */
    private $adminConfigHandler;
    /**
     * @var ContactFormConfigHandler
     */
    private $contactFormConfigHandler;
    /**
     * @var ApiHandler
     */
    private $apiHandler;
    /**
     * @var array
     */
    private $contactFormOptions = [];

    /**
     * CleverReachSettingsBlock constructor.
     * @param ConfigOptionHandler $adminConfigHandler
     * @param ContactFormConfigHandler $contactFormConfigHandler
     * @param ApiHandler $apiHandler
     */
    public function __construct(
        ConfigOptionHandler $adminConfigHandler,
        ContactFormConfigHandler $contactFormConfigHandler,
        ApiHandler $apiHandler
    ) {
        $this->adminConfigHandler = $adminConfigHandler;
        $this->contactFormConfigHandler = $contactFormConfigHandler;
        $this->apiHandler = $apiHandler;
    }

    /***
     * @return string
     */
    public function getSlug()
    {
        return self::BLOCK_SLUG;
    }

    /**
     * @return \WPCF7_ContactForm|bool
     */
    public function getContactForm()
    {
        $form = \WPCF7_ContactForm::get_current();
        if (!$form) {
            return false;
        }

        return $form;
    }

    /**
     * @return bool
     */
    public function isCleverReachIntegrationEnabled()
    {
        $contactForm = $this->getContactForm();
        $options = $this->loadOptions($contactForm);
        return !!($options['enabled'] ?? false);
    }

    /**
     * @return Group[]
     */
    public function getGroupSelection()
    {
        $groupSet = $this->apiHandler->getGroups();
        if (!is_array($groupSet)) {
            return [];
        }
        return $this->apiHandler->getGroups();
    }

    /**
     * @param Group $group
     * @return bool
     */
    public function isGroupSelected(Group $group)
    {
        $contactForm = $this->getContactForm();
        $options = $this->loadOptions($contactForm);
        return $group->getId() == ($options['group_id'] ?? 0);
    }

    /**
     * @return Group|null
     */
    public function getActiveGroup()
    {
        $groupSet = $this->getGroupSelection();
        foreach ($groupSet as $group) {
            if ($this->isGroupSelected($group)) {
                return $group;
            }
        }
        return null;
    }

    /**
     * @return Form[]
     */
    public function getFormSelection()
    {
        $activeGroup = $this->getActiveGroup();
        if (!$activeGroup) {
            return [];
        }
        return $this->apiHandler->getFormsByGroup($activeGroup);
    }

    /**
     * @param Form $form
     * @return bool
     */
    public function isFormSelected(Form $form)
    {
        $contactForm = $this->getContactForm();
        $options = $this->loadOptions($contactForm);
        return $form->getId() == ($options['form_id'] ?? 0);
    }

    /**
     * @return Attribute[]
     */
    public function getGroupAttributeSelection()
    {
        $attributeSet = $this->apiHandler->getAttributes();

        $attribute = new Attribute();
        $attribute->setId(1);
        $attribute->setGroupId(null);
        $attribute->setName(__('Email', \AllInDataContactForm7CleverReachIntegration::load()->getTextDomain()));
        $attribute->setDescription(__('Email', \AllInDataContactForm7CleverReachIntegration::load()->getTextDomain()));
        $attribute->setPreviewValue(null);
        $attribute->setDefaultValue(null);
        $attribute->setType('email');
        $attribute->setTag(null);
        $attribute->setIsGlobal(true);
        $attributeSet[] = $attribute;

        return $attributeSet;
    }

    /**
     * @param int $fieldId
     * @param Attribute $attribute
     * @return bool
     */
    public function isAttributeSelected($fieldId, Attribute $attribute)
    {
        $contactForm = $this->getContactForm();
        $options = $this->loadOptions($contactForm);
        if (!isset($options['field_mappings'])) {
            return false;
        }

        return $attribute->getId() == ($options['field_mappings'][$fieldId] ?? 0);
    }

    /**
     * @return string[]
     */
    public function getContactForm7FieldSelection()
    {
        $contactForm = $this->getContactForm();
        $fieldSet = [];
        foreach ($contactForm->scan_form_tags() as $tag) {
            /** @var \WPCF7_FormTag $tag */
            if (empty($tag['name']) || in_array($tag['basetype'], ['submit', 'button'])) {
                continue;
            }
            $fieldSet[$tag['name']] = $tag['name'];
        }
        return $fieldSet;
    }

    /**
     * @param \WPCF7_ContactForm $contactForm
     * @return array
     */
    private function loadOptions(\WPCF7_ContactForm $contactForm)
    {
        if (!empty($this->contactFormOptions)) {
            return $this->contactFormOptions;
        }
        $this->contactFormOptions = $this->contactFormConfigHandler->getOptions($contactForm->id());
        return $this->contactFormOptions;
    }
}
