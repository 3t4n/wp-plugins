<?php
add_action( 'init', 'check_url' );


function check_url() {
    if(isset($_GET['subscribeToken'])) {
        add_filter( 'the_posts', 'subscribetoken_page' );
    }
}

function subscribetoken_page() {
    global $apiKey;
    $subscribeToken = urldecode($_GET['subscribeToken']);
    $token = openssl_decrypt(str_replace(" ","+",$subscribeToken),'aes128',$apiKey);
    $dataNewContact = unserialize($token, array('allowed_classes' => false));
    $value = get_option('es_config_contactform7_active_'.sanitize_text_field($dataNewContact['_wpcf7']));
    $values = json_decode($value);

    try {
        if( property_exists($values,'mailList') 
            && !empty($values->mailList) 
            && property_exists($values,'associatedFields') 
            && !empty($values->associatedFields) 
        ) {
            $responseCreate = createContact($dataNewContact);
            checkReponse($responseCreate, $dataNewContact, $values);

            getTemplate(dirname(__FILE__).'/html/suscription_ok.php');
        } else {
            getTemplate(dirname(__FILE__).'/html/suscription_error.php');
        }
    } catch (\Throwable $th) {
        getTemplate(dirname(__FILE__).'/html/suscription_error.php');
    }
    
    die();
}

function createContact($data) {
    $response = es_plugin_api_post_request('/v1/contacts/create',$data);
    $httpcode = $response['response']['code'];

    return [
        'response' => json_decode($response['body']), 
        'httpcode' => $httpcode
    ];
}

function checkReponse($response,$data,$values) {
    switch ($response['httpcode']) {
        //subscribe
        case 200:
            $contactNew = $response['response']->data;
            suscribe([
                'contactsIds' => [
                    $contactNew->id
                ],
                'listId' => $values->mailList->id
            ]);
            break;
        //create only with email
        case 422:
            sendEmailAdminCustomFields($response['response'],$data,$values);
            unset($data['customFields']);
            $responseCreate = createContact($data);
            checkReponse($responseCreate,$data,$values);
            break;
        //user exists
        case 400:
            if($response['response']->code == 'errorMsg_contactAlreadyExist') {
                sendEmailAdminCreated($data);
                $responseContacts = getContactByEmail($data);
                if(!empty($responseContacts->data->data[0])) {
                    $contactData = $responseContacts->data->data[0];
                    suscribe([
                        'contactsIds' => [
                            $contactData->id
                        ],
                        'listId' => $values->mailList->id
                    ]);
                }
            }
            break;
    }
}

function suscribe($data) {        
    es_plugin_api_post_request('/v1/contacts/suscribe',$data);
}

function getContactByEmail($data) {
    $parameters = [
        'email' => $data['email']
    ];

    $response = es_plugin_api_post_request('/v1/contacts/getall',$parameters);
    return json_decode($response['body']);
}

function sendEmailAdminCustomFields($response,$data,$values) {
    global $canSend;
    if($canSend) {
        $dataRequest = getDataRequest($data['request']);
        
        $adminEmail = get_option('admin_email');
        $nameSite = get_option('blogname');
        $idForm7 = sanitize_text_field($data['_wpcf7']);
        $contactForm = WPCF7_ContactForm::get_instance( $idForm7 );

        $subject = $nameSite.' - '.$contactForm->title.' - Error con los campos personalizados';
        $headers = array('Content-Type: text/html; charset=UTF-8');

        $messageCustomFields = getMessageCustomFields($dataRequest);
        $messageErrors = getMessageErrors($response,$values,$dataRequest);
        $message = $messageCustomFields.'<br/>'.$messageErrors;

        wp_mail(
            $adminEmail,
            $subject,
            $message,
            $headers
        );
        $canSend = false;
    }
}

function sendEmailAdminCreated($data) {
    global $canSend;
    if($canSend) {
        $adminEmail = get_option('admin_email');
        $nameSite = get_option('blogname');
        $idForm7 = sanitize_text_field($data['_wpcf7']);
        $contactForm = WPCF7_ContactForm::get_instance( $idForm7 );

        $subject = $nameSite.' - '.$contactForm->title.' - El contacto ya existe';
        $headers = array('Content-Type: text/html; charset=UTF-8');

        $fields = getDataRequest($data['request']);
        $message = getMessageCustomFields($fields);

        wp_mail(
            $adminEmail,
            $subject,
            $message,
            $headers
        );
        $canSend = false;
    }
    
}

function getDataRequest($data) {
    $result = [];
    foreach ($data as $key => $value) {
        if(strpos($key, '_wpcf7') === false) {
            $result[$key] = sanitize_text_field($value);
        }
    }
    return $result;
}

function getMessageCustomFields($data) {
    //fields
    $msg = '<p><strong>Campos ingresados:</strong></p><ul>';
    foreach($data as $key => $value) {
        $msg .= '<li>';
        $msg .= '<strong>'.$key.'</strong>: '.(is_array($value)?implode(",", $value):$value);
        $msg .= '</li>';
    }
    $msg .= '</ul>';

    return $msg;
}

function getMessageErrors($response,$values,$data) {
    global $lang;
    $associatedFields = $values->associatedFields;
    
    //fields
    $msg = '<p><strong>Campos con error:</strong></p><ul>';

    foreach($response->code as $key => $value) {
        $name = $key;
        $countFields = explode('.',$key);
        if(count($countFields) > 2) {
            $idField = $countFields[1];
        } else {
            $idField = str_replace('customFields.','',$key);
        }
        
        foreach ($associatedFields as $keyField => $valueField) {
            if($valueField == $idField) {
                if(count($countFields) > 2) {
                    $name = $keyField." - ".$data[$keyField][$countFields[2]];
                } else {
                    $name = $keyField;
                }
            }
        }

        $msg .= '<li>';
        $msg .= '<strong>'.$name .'</strong>: '.$lang['errorsGlobals'][$value[0]];
        $msg .= '</li>';
    }
    $msg .= '</ul>';

    return $msg;
}