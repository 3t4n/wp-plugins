<?php
    $canSend = true;
    add_action('wpcf7_mail_sent', function ($cf7) {
        if(!empty($_REQUEST['_wpcf7'])) {
            $value = get_option('es_config_contactform7_active_'.sanitize_text_field($_REQUEST['_wpcf7']));
            $values = json_decode($value);

            try {
                if( property_exists($values,'mailList') 
                    && !empty($values->mailList) 
                    && property_exists($values,'associatedFields') 
                    && !empty($values->associatedFields) 
                ) {
                    //set parameters
                    $fieldEmail = null;
                    $customFields = [];
                    foreach($values->associatedFields as $key => $field) {
                        if($field == 'emailbase') {
                            $fieldEmail = $key;
                        } else {
                            if(!empty($_REQUEST[$key]) && !empty($field)) {
                                if(is_array($_REQUEST[$key])) {
                                    $customFields[$field] = implode(',',sanitize_text_field($_REQUEST[$key]));
                                } else {
                                    $customFields[$field] = sanitize_text_field($_REQUEST[$key]);
                                }
                                
                            }
                        }
                    }

                    if(!empty($fieldEmail) && !empty($_REQUEST[$fieldEmail])) {
                        //create 
                        $dataNewContact = [
                            'email' => sanitize_text_field($_REQUEST[$fieldEmail])
                        ];
                        if(!empty($customFields)) {
                            $dataNewContact['customFields'] = $customFields;
                        }
                        $dataNewContact['_wpcf7'] = sanitize_text_field($_REQUEST['_wpcf7']);
                        $dataNewContact['request'] = $_REQUEST;

                        sendEmailDobleOptIn($dataNewContact);
                        
                    }
                }
            } catch (\Throwable $th) {
                die(print_r($th));
            }
            
        }
    });

    

    function sendEmailDobleOptIn($data) {
        $userEmail = $data['email'];
        $nameSite = get_option('blogname');

        $subject = $nameSite.' - Por favor, confirme la suscripción';
        $headers = array('Content-Type: text/html; charset=UTF-8');

        //get html email
        ob_start();
        include('emails/dobleoptin.php');
        $message = ob_get_contents();
        ob_end_clean();
        
        //generate url
        $linkSuscribe = getLinkSuscribe($data);
        $message = str_replace("%ConfirmationLink%", $linkSuscribe, $message);
        $message = str_replace("%SiteName%", $nameSite, $message);

        wp_mail(
            $userEmail,
            $subject,
            $message,
            $headers
        );
    }

    function getLinkSuscribe($data) {
        global $apiKey;

        $paramUrl = urlencode(openssl_encrypt(serialize($data),'aes128',$apiKey));

        $url = get_site_url().sprintf('/?subscribeToken=%s',$paramUrl);

        return $url;
    }

