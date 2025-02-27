<?php
if (!defined('ABSPATH')) { exit; }

class CHATBOTCOM_Store {
    // View slug
    public $view;

    // API data
    public $connections;

    // POST data
    public $accessToken = null;
    public $email = null;

    // DB data
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

    public function isConnected() {
        return !empty($this->connection['id']);
    }

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
    public function updateConnection ($email, $storyName, $type, $id, $templateId, $organizationId) {
        update_option(CHATBOTCOM_DATA_EMAIL, $email);
        update_option(CHATBOTCOM_DATA_STORY_NAME, $storyName);
        update_option(CHATBOTCOM_DATA_WIDGET_TYPE, $type);
        update_option(CHATBOTCOM_DATA_WIDGET_ID, $id);
        update_option(CHATBOTCOM_DATA_WIDGET_TEMPLATE_ID, $templateId);
        update_option(CHATBOTCOM_DATA_WIDGET_ORGANIZATION_ID, $organizationId);

        return $this->setConnection($email, $storyName, $type, $id, $templateId, $organizationId);
    }
    public function deleteConnection () {
        delete_option(CHATBOTCOM_DATA_EMAIL);
        delete_option(CHATBOTCOM_DATA_STORY_NAME);
        delete_option(CHATBOTCOM_DATA_WIDGET_TYPE);
        delete_option(CHATBOTCOM_DATA_WIDGET_ID);
        delete_option(CHATBOTCOM_DATA_WIDGET_TEMPLATE_ID);
        delete_option(CHATBOTCOM_DATA_WIDGET_ORGANIZATION_ID);

        return $this->setConnection(null, null, null, null, null, null);
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
    public function updateOptions ($disableMobile, $disableGuests) {
        update_option(CHATBOTCOM_DATA_DISABLE_MOBILE, $disableMobile);
        update_option(CHATBOTCOM_DATA_DISABLE_GUESTS, $disableGuests);

        return $this->setOptions($disableMobile, $disableGuests);
    }
    public function deleteOptions () {
        delete_option(CHATBOTCOM_DATA_DISABLE_MOBILE);
        delete_option(CHATBOTCOM_DATA_DISABLE_GUESTS);

        return $this->setOptions(false, false);
    }
    public function setAccessToken($accessToken) {
        if (empty($accessToken)) {
            return false;
        }

        $this->accessToken = $accessToken;
        return true;
    }
    public function setViewLogIn() {
        $this->view = 'log-in';
        return true;
    }
    public function setViewError() {
        $this->view = 'error';
        return true;
    }
    public function setViewNoStories() {
        $this->view = 'no-stories';
        return true;
    }
    public function setViewSetUp() {
        $this->view = 'set-up';
        return true;
    }
    public function setViewConnected() {
        $this->view = 'connected';
        return true;
    }

    public function fetchEmail () {
        $url = CHATBOTCOM_AUTH_URL . '/v2/accounts/me';
        $args = array('headers' => array('Authorization' => "Bearer " . $this->accessToken));
        $response = wp_remote_get($url, $args);
        $code = wp_remote_retrieve_response_code($response);
        $body = wp_remote_retrieve_body($response);
        $obj = json_decode($body);
        $email = CHATBOTCOM_Utils::sanitizeEmail($obj->email);

        if ($code !== 200 || !$email) {
            return false;
        }

        $this->email = $email;
        return true;
    }
    public function fetchConnections () {
        $url = CHATBOTCOM_API_URL . "/v2/integrations/wordpress/openwidget";
        $args = array('headers' => array('Authorization' => "Bearer " . $this->accessToken));
        $response = wp_remote_get($url, $args);
        $code = wp_remote_retrieve_response_code($response);
        $body = wp_remote_retrieve_body($response);

        if ($code !== 200) {
            return false;
        }

        $this->connections = json_decode($body);
        return true;
    }
    public function createConnection ($id) {
        $url = CHATBOTCOM_API_URL . "/v2/integrations/wordpress/openwidget";
        $args = array(
            'headers' => array(
                'Authorization' => "Bearer " . $this->accessToken,
                'Content-Type'  => 'application/json;charset=UTF-8'
            ),
            'body' => json_encode(array('id' => $id))
        );
        $response = wp_remote_post($url, $args);
        $code = wp_remote_retrieve_response_code($response);
        $body = wp_remote_retrieve_body($response);
        $connection = json_decode($body);

        if ($code !== 200 && $code !== 201) {
            return false;
        }

        switch ($connection->type) {
            case 'openwidget':
                $fields = ['id', 'organizationId', 'templateId']; break;
            case 'widget':
                $fields = ['id']; break;
            default:
                return false;
        }

        foreach ($fields as $field) {
            if (empty($connection->$field)) {
                return false;
            }
        }

        return $connection;
    }

    public function __construct () {
        $this->getConnection();
        $this->getOptions();
    }
}
