<?php  if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * @var OrdemioIntegration $this
 */
$currentState = null;
if (isset($_REQUEST['state'])) {
    $currentState = sanitize_text_field($_REQUEST['state']);
}
$pluginUrl = 'admin.php?page=ordemio-settings';
$states = [
    'register' => 'installation_create_account',
    'auth' => 'auth',
    'create_assistant' => 'installation_create_assistant',
    'choice_assistant' => 'installation_choice_assistant',
    'training' => 'installation_training_data',
    'settings' => 'settings',
];
if ($_GET['assistant']) {
    update_option(OrdemioIntegration::OPTION_ASSISTANT, sanitize_text_field($_GET['assistant']));
    update_option(OrdemioIntegration::OPTION_INSTALL_COMPLETE, 'Y');
}
$isInstallComplete = get_option(OrdemioIntegration::OPTION_INSTALL_COMPLETE);
if ($isInstallComplete !== 'Y') {

    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
        // Auth user
        if (isset($_POST['auth_user'])) {
            $hasError = false;
            if (!isset($_POST['email']) || !is_email($_POST['email'])) {
                $hasError = true;
                $authError = 'Incorrect email';
                update_option('ordemio_error', $authError);
            }
            if (!isset($_POST['password']) || strlen(sanitize_text_field($_POST['password'])) < 5) {
                $hasError = true;
                $authError = 'Incorrect password. Password must be at least 5 characters long.';
                update_option('ordemio_error', $authError);
            }
            if (!$hasError) {
                $response = $this->api->auth(sanitize_email($_POST['email']), sanitize_text_field($_POST['password']));
                if ($response['account_id']) {
                    update_option(OrdemioIntegration::OPTION_ACCOUNT, $response['account_id']);
                    update_option(OrdemioIntegration::OPTION_EXIST_ACCOUNT, 'Y');
                    update_option(OrdemioIntegration::OPTION_TOKEN, $response['token']);
                    update_option(OrdemioIntegration::OPTION_REFRESH_TOKEN, $response['refresh_token']);
                } else {
                    $authError = $response['error'];
                    update_option('ordemio_error', $authError);
                }
            }
        }
        // Register user
        if (isset($_POST['register_user'])) {
            $hasError = false;
            if (!isset($_POST['email']) || !is_email($_POST['email'])) {
                $hasError = true;
                $registerError = 'Incorrect email';
                update_option('ordemio_error', $registerError);
            }
            if (!isset($_POST['password']) || strlen($_POST['password']) < 5) {
                $hasError = true;
                $registerError = 'Incorrect password. Password must be at least 5 characters long.';
                update_option('ordemio_error', $registerError);
            }
            if (!$hasError) {
                $response = $this->api->register(
                    sanitize_email($_POST['email']),
                    sanitize_text_field($_POST['password']),
                    get_bloginfo('name')
                );

                if ($response['account_id']) {

                    update_option(OrdemioIntegration::OPTION_ACCOUNT, $response['account_id']);
                    update_option(OrdemioIntegration::OPTION_TOKEN, $response['token']);
                    update_option(OrdemioIntegration::OPTION_REFRESH_TOKEN, $response['refresh_token']);
                } else {
                    $registerError = $response['error'];
                    update_option('ordemio_error', $registerError);
                }
            }
        }

        // Create Assistant
        if (isset($_POST['create_assistant'])) {

            $hasError = false;
            if (!isset($_POST['url']) || !strlen($_POST['url'])) {
                $hasError = true;
                $createAssistantError = 'Incorrect website url';
                update_option(OrdemioIntegration::OPTION_ERROR, $createAssistantError);
            }
            if (!isset($_POST['name']) || !strlen($_POST['name'])) {
                $hasError = true;
                $createAssistantError = 'Incorrect Assistant name';
                update_option(OrdemioIntegration::OPTION_ERROR, $createAssistantError);
            }
            if (!$hasError) {
                $this->api->setAuth(get_option(OrdemioIntegration::OPTION_TOKEN), get_option(OrdemioIntegration::OPTION_REFRESH_TOKEN));
                $response = $this->api->create_assistant(
                    sanitize_text_field($_POST['name']),
                    sanitize_text_field($_POST['url'])
                );
                if ($response['assistant_id']) {
                    update_option(OrdemioIntegration::OPTION_ASSISTANT_NAME, $response['appearance']['display_name']);
                    update_option(OrdemioIntegration::OPTION_ASSISTANT, $response['assistant_id']);
                    update_option(OrdemioIntegration::OPTION_SOURCE, $response['source_id']);
                } else {
                    $createAssistantError = $response['error'];
                    update_option(OrdemioIntegration::OPTION_ERROR, $createAssistantError);
                }
            }
        }
    }

    $account = get_option(OrdemioIntegration::OPTION_ACCOUNT);
    $assistant = get_option(OrdemioIntegration::OPTION_ASSISTANT);
    if (!strlen($account)) {
        if (isset($_GET['state']) && $_GET['state'] == 'installation_auth') {
            $currentState = $states['auth'];
        } else {
            $currentState = $states['register'];
        }
    }
    if (strlen($account) > 0 && (!$assistant || strlen($assistant) == 0)) {
        if (get_option(OrdemioIntegration::OPTION_EXIST_ACCOUNT) == 'Y') {
            $currentState = $states['choice_assistant'];
        } else {
            $currentState = $states['create_assistant'];
        }
    }
    if (strlen($account) && strlen($assistant)) {
        $currentState = $states['training'];
        $this->api->setAuth(get_option(OrdemioIntegration::OPTION_TOKEN), get_option(OrdemioIntegration::OPTION_REFRESH_TOKEN));
        update_option(OrdemioIntegration::OPTION_INSTALL_COMPLETE, 'Y');
    }
} else {
    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['show_front']) && $_POST['show_front'] == '1') {
            update_option(OrdemioIntegration::OPTION_SHOW_FRONT, 'Y');
        } else {
            update_option(OrdemioIntegration::OPTION_SHOW_FRONT, '');
        }
    }
    $currentState = $states['settings'];
}
switch ($currentState) {
    case $states['create_assistant']: // create assistant
        include 'setup-form.php'; break;
    case $states['choice_assistant']: // create assistant
        include 'choice-assistant.php'; break;
    case $states['training']: // Training
        add_action('admin_print_footer_scripts', [$this, 'check_status_script']);
        include 'check-training.php'; break;
    case $states['settings']:
        include 'settings.php'; break;
    case $states['auth']: // auth
        include 'auth.php'; break;
    default: include 'registration-form.php'; break; // register
}
