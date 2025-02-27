<?php
if (!defined('ABSPATH')) { exit; }

class CHATBOTCOM_Public_Store {
    public $connection = [
        'email' => null,
        'storyName' => null,
        'type' => null,
        'id' => null,
        'templateId' => null,
        'organizationId' => null
    ];
    public $options = [
        'disableMobile' => false,
        'disableGuests' => false
    ];

    public function setConnection ($email, $storyName, $type, $id, $templateId, $organizationId) {
        $this->connection = [
            'email' => $email,
            'storyName' => $storyName,
            'type' => $type,
            'id' => $id,
            'templateId' => $templateId,
            'organizationId' => $organizationId
        ];

        return true;
    }
    public function getConnection () {
        $email = get_option(CHATBOTCOM_DATA_EMAIL) ?: null;
        $storyName = get_option(CHATBOTCOM_DATA_STORY_NAME) ?: null;
        $type = get_option(CHATBOTCOM_DATA_WIDGET_TYPE) ?: null;
        $id = get_option(CHATBOTCOM_DATA_WIDGET_ID) ?: null;
        $templateId = get_option(CHATBOTCOM_DATA_WIDGET_TEMPLATE_ID) ?: null;
        $organizationId = get_option(CHATBOTCOM_DATA_WIDGET_ORGANIZATION_ID) ?: null;

        // Backward compatibility
        $type = $id && !$type ? 'widget' : $type;
        // Backward compatibility

        return $this->setConnection(
            $email,
            $storyName,
            $type,
            $id,
            $templateId,
            $organizationId
        );
    }
    public function setOptions($disableMobile, $disableGuests) {
        $this->options = [
            'disableMobile' => $disableMobile,
            'disableGuests' => $disableGuests
        ];

        return true;
    }
    public function getOptions () {
        $disableMobile = get_option(CHATBOTCOM_DATA_DISABLE_MOBILE) ?: false;
        $disableGuests = get_option(CHATBOTCOM_DATA_DISABLE_GUESTS) ?: false;

        return $this->setOptions(
            $disableMobile,
            $disableGuests
        );
    }

    public function __construct () {
        $this->getConnection();
        $this->getOptions();
    }
}
