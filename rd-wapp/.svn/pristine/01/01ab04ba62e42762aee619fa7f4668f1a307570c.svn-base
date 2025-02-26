<?php

/**
 * Incluye las funciones personalizadas del plugin
 * Class rdWapp
 */
class rdWapp {

    /**
     * Activacion del plugins
     */
    public function activePlugin($data){

        //Consulto las opciones del plugins
        $options = get_option('rdwapp_options_free');

        if (isset($data['rd-form-active-plugin'])) {
            $dataForm = 1;
        } else {
            $dataForm = 0;
        }

        //Valor de activacion del plugin
        $options['active_plugin'] = $dataForm;

        //Actualizo la opcion del plugins
        $result = update_option('rdwapp_options_free', $options);

        return $result;
    }

    /**
     * Actualizo las opciones generales del plugins
     */
    public function rdWappUpdateData($data){

        //Cargo las opciones del plugins
        $options = get_option('rdwapp_options_free');

        $options = array(
            "rd_plugins_name"       => sanitize_text_field(RDWAPP_NAME_PLUGINS),
            "rd_plugins_position"   => sanitize_text_field($data['rdwapp_plugin_position_button']),
            "whatsapp" => array(
                "config" => array(
                    "color"         => sanitize_hex_color($data['rdwapp_plugin_color']),
                    "textButton"    => sanitize_text_field($data['rdwapp_plugin_button_text']),
                    "textWelcome"   => sanitize_textarea_field($data['rdwapp_plugin_message'])
                ),
                "user" => array(
                    "name"          => sanitize_text_field($data['rdwapp_agent_name']),
                    "departament"   => sanitize_text_field($data['rdwapp_agent_departament']),
                    "numberCode"    => sanitize_text_field($data['rdwapp_phone_code_whatsapp']),
                    "number"        => sanitize_text_field($data['rdwapp_agent_number']),
                    "message"       => sanitize_textarea_field($data['rdwapp_agent_message'])
                )
            ),
            "phone" => array(
                "text"              => sanitize_text_field($data['rdwapp_phone_text']),
                "numberCode"        => sanitize_text_field($data['rdwapp_phone_code_phone']),
                "number"            => sanitize_text_field($data['rdwapp_phone_number'])
            )
        );

        //Actualizo las opciones del plugins
        $result = update_option('rdwapp_options_free', $options, 'yes');

        return $result;
    }

    /**
     * Funcion para cargar el boton del plugins en la web
     */
    public function rdWapp_loadButton($data){

        // posicion del boton en la web
        if($data['rd_plugins_position'] == "r"){
            $rdWapp_position = "right";
        }else{
            $rdWapp_position = "left";
        }

        // HTML de la estructura del boton
        $rdWappBtn = "";
        $rdWappBtn .= "<!-- Plugins Chat WhatsApp - Richard Dev (https://richard-dev.com) -->\r\n";
        $rdWappBtn .= "<div id='rdwapp' class='rdwapp-premium rdwapp-button rdwapp-bottom-" . $rdWapp_position . " rdwapp-all rdwapp-rounded  rdwapp-js-ready desktop'>";
        $rdWappBtn .= "<div class='rdwapp-container'>";
        $rdWappBtn .= "<div class='rdwapp-box'>";
        $rdWappBtn .= "<div class='rdwapp-header' style='background: " . esc_html($data['whatsapp']['config']['color']) . "'>";
        $rdWappBtn .= "<div class='rdwapp-carousel'>";
        $rdWappBtn .= "<div class='rdwapp-slide'>";
        $rdWappBtn .= "<i class='rdwapp-close' data-action='close'>×</i>";
        $rdWappBtn .= "<div class='rdwapp-description'>";
        $rdWappBtn .= "<h3>" . esc_html($data['whatsapp']['config']['textButton']) . "</h3>";
        $rdWappBtn .= "<p>" . esc_html($data['whatsapp']['config']['textWelcome']) . "</p>";
        $rdWappBtn .= "</div>";
        $rdWappBtn .= "</div>";
        $rdWappBtn .= "<div class='rdwapp-slide'>";
        $rdWappBtn .= "<div class='rdwapp-contact'>";
        $rdWappBtn .= "<div class='rdwapp-previous' data-action='previous'>";
        $rdWappBtn .= "<svg aria-hidden='true' focusable='false' data-prefix='fas' data-icon='chevron-left' role='img' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 320 512' class='svg-inline--fa fa-chevron-left fa-w-10 fa-2x'><path fill='currentColor' d='M34.52 239.03L228.87 44.69c9.37-9.37 24.57-9.37 33.94 0l22.67 22.67c9.36 9.36 9.37 24.52.04 33.9L131.49 256l154.02 154.75c9.34 9.38 9.32 24.54-.04 33.9l-22.67 22.67c-9.37 9.37-24.57 9.37-33.94 0L34.52 272.97c-9.37-9.37-9.37-24.57 0-33.94z' class=''></path></svg>";
        $rdWappBtn .= "</div>";
        $rdWappBtn .= "<div class='rdwapp-info'>";
        $rdWappBtn .= "<span class='rdwapp-name'></span>";
        $rdWappBtn .= "<span class='rdwapp-label'></span>";
        $rdWappBtn .= "</div>";
        $rdWappBtn .= "<div class='rdwapp-avatar'>";
        $rdWappBtn .= "<div class='rdwapp-avatar-container'>";
        $rdWappBtn .= "<img src=''>";
        $rdWappBtn .= "</div>";
        $rdWappBtn .= "</div>";
        $rdWappBtn .= "</div>";
        $rdWappBtn .= "</div>";
        $rdWappBtn .= "</div>";
        $rdWappBtn .= "</div>";
        $rdWappBtn .= "<div class='rdwapp-body'>";
        $rdWappBtn .= "<div class='rdwapp-carousel'>";
        $rdWappBtn .= "<div class='rdwapp-slide'>";
        $rdWappBtn .= "<a class='rdwapp-account' data-action='chat' data-timefrom='00:00' data-timeto='00:00' data-timeout='readonly' data-phone='+" . esc_html($data['whatsapp']['user']['numberCode']) . esc_html($data['whatsapp']['user']['number']) . "' data-timezone='0' data-message='" . esc_html($data['whatsapp']['user']['message']) . "' href='javascript:void(0);' target='_blank'>";
        $rdWappBtn .= "<div class='rdwapp-avatar'>";
        $rdWappBtn .= "<div class='rdwapp-avatar-container'>";
        $rdWappBtn .= "<img alt='" . esc_html($data['whatsapp']['user']['name']) . "' src='" . RDWAPP_URL . "assets/images/rdWapp-contact-boy.png'>";
        $rdWappBtn .= "</div>";
        $rdWappBtn .= "</div>";
        $rdWappBtn .= "<div class='rdwapp-info'>";
        $rdWappBtn .= "<span class='rdwapp-name'>" . esc_html($data['whatsapp']['user']['name']) . "</span>";
        $rdWappBtn .= "<span class='rdwapp-label'>" . esc_html($data['whatsapp']['user']['departament']) . "</span>";
        $rdWappBtn .= "</div>";
        $rdWappBtn .= "</a>";
        $rdWappBtn .= "</div>";
        $rdWappBtn .= "<div class='rdwapp-slide'>";
        $rdWappBtn .= "<div class='rdwapp-chat'>";
        $rdWappBtn .= "<div class='rdwapp-message'>Hola somos el equipo de soporte.. <a href='https://richard-dev.com'>richard-dev.com</a></div>";
        $rdWappBtn .= "</div>";
        $rdWappBtn .= "</div>";
        $rdWappBtn .= "</div>";
        $rdWappBtn .= "</div>";
        $rdWappBtn .= "<div class='rdwapp-footer' data-contactstimeout=''>";
        $rdWappBtn .= "<p>" . esc_html($data['phone']['text']) . " <a href='tel://+" . esc_html($data['phone']['numberCode']) . esc_html($data['phone']['number']) . "'>+" . esc_html($data['phone']['numberCode']) . esc_html($data['phone']['number']) . "</a></p>";
        $rdWappBtn .= "</div>";
        $rdWappBtn .= "<div class='rdwapp-response' data-action='response'>";
        $rdWappBtn .= "<pre></pre>";
        $rdWappBtn .= "<textarea maxlength='500' name='message' placeholder='" . esc_textarea("Escribe un mensaje") . "' aria-label='Write a response' tabindex='0'></textarea>";
        $rdWappBtn .= "<div class='rdwapp-buttons'>";
        $rdWappBtn .= "<i class='qlwf-emoji'></i>";
        $rdWappBtn .= "<a class='rdwapp-reply' data-action='open' data-message='Hello! Im testing the WhatsApp Chat plugin ' href='javascript:void(0);' target='_blank'>";
        $rdWappBtn .= "<i class='qlwf-send'></i>";
        $rdWappBtn .= "<svg width='20px' height='18px' viewBox='0 0 20 18' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'>
            <g id='Icons' stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'>
                <g id='Rounded' transform='translate(-374.000000, -1529.000000)'>
                    <g id='Content' transform='translate(100.000000, 1428.000000)'>
                        <g id='-Round-/-Content-/-send' transform='translate(272.000000, 98.000000)'>
                            <g>
                                <polygon id='Path' points='0 0 24 0 24 24 0 24'></polygon>
                                <path d='M3.4,20.4 L20.85,12.92 C21.66,12.57 21.66,11.43 20.85,11.08 L3.4,3.6 C2.74,3.31 2.01,3.8 2.01,4.51 L2,9.12 C2,9.62 2.37,10.05 2.87,10.11 L17,12 L2.87,13.88 C2.37,13.95 2,14.38 2,14.88 L2.01,19.49 C2.01,20.2 2.74,20.69 3.4,20.4 Z' id='🔹Icon-Color' fill='#ffffff'></path>
                            </g>
                        </g>
                    </g>
                </g>
            </g>
        </svg>";
        $rdWappBtn .= "</a>";
        $rdWappBtn .= "</div>";
        $rdWappBtn .= "</div>";
        $rdWappBtn .= "</div>";
        $rdWappBtn .= "<a class='rdwapp-toggle' data-action='box' data-phone='+580000000' data-timefrom='00:00' data-timeto='00:00' data-timeout='readonly' data-timezone='0' data-message='Hello! Im testing the WhatsApp Chat plugin' href='javascript:void(0);' target='_blank' style='background: " . esc_html($data['whatsapp']['config']['color']) . "'>";
        $rdWappBtn .= "<span class='rdwapp-text'>";
        $rdWappBtn .= "<svg width='25px' height='25px' style='margin: -6px 0;' aria-hidden='true' focusable='false' data-prefix='fab' data-icon='whatsapp' role='img' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 448 512' class='svg-inline--fa fa-whatsapp fa-w-14 fa-2x'><path fill='currentColor' d='M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z' class=''></path></svg>";
        $rdWappBtn .= " <span class='rdwapp-text-btn'>" . esc_html($data['whatsapp']['config']['textButton']) . "</p></span>";
        $rdWappBtn .= "</a>";
        $rdWappBtn .= "</div>";
        $rdWappBtn .= "</div>";

        return $rdWappBtn;

    }

    /**
     * Funcion que calcula la fecha actual.
     */
    public function rd_consultDate(){
        return date_i18n('d/m/Y H:i:s');
    }

    /**
     *
     * Funcion Que muestra los paises seleccionados
     */
    public function rdWapp_country(){
        return $array = [
            '44'    => 'UK (+44)',
            '1'     => 'USA (+1)',
            '213'   => 'Algeria (+213)',
            '376'   => 'Andorra (+376)',
            '244'   => 'Angola (+244)',
            '1264'  => 'Anguilla (+1264)',
            '1268'  => 'Antigua & Barbuda (+1268)',
            '54'    => 'Argentina (+54)',
            '374'   => 'Armenia (+374)',
            '297'   => 'Aruba (+297)',
            '61'    => 'Australia (+61)',
            '43'    => 'Austria (+43)',
            '994'   => 'Azerbaijan (+994)',
            '1242'  => 'Bahamas (+1242)',
            '973'   => 'Bahrain (+973)',
            '880'   => 'Bangladesh (+880)',
            '1246'  => 'Barbados (+1246)',
            '375'   => 'Belarus (+375)',
            '32'    => 'Belgium (+32)',
            '501'   => 'Belize (+501)',
            '229'   => 'Benin (+229)',
            '1441'  => 'Bermuda (+1441)',
            '975'   => 'Bhutan (+975)',
            '591'   => 'Bolivia (+591)',
            '387'   => 'Bosnia Herzegovina (+387)',
            '267'   => 'Botswana (+267)',
            '55'    => 'Brazil (+55)',
            '673'   => 'Brunei (+673)',
            '359'   => 'Bulgaria (+359)',
            '226'   => 'Burkina Faso (+226)',
            '257'   => 'Burundi (+257)',
            '855'   => 'Cambodia (+855)',
            '237'   => 'Cameroon (+237)',
            '238'   => 'Cape Verde Islands (+238)',
            '1345'  => 'Cayman Islands (+1345)',
            '236'   => 'Central African Republic (+236)',
            '56'    => 'Chile (+56)',
            '86'    => 'China (+86)',
            '57'    => 'Colombia (+57)',
            '269'   => 'Comoros (+269)',
            '242'   => 'Congo (+242)',
            '682'   => 'Cook Islands (+682)',
            '506'   => 'Costa Rica (+506)',
            '385'   => 'Croatia (+385)',
            '53'    => 'Cuba (+53)',
            '90392' => 'Cyprus North (+90392)',
            '357'   => 'Cyprus South (+357)',
            '42'    => 'Czech Republic (+42)',
            '45'    => 'Denmark (+45)',
            '253'   => 'Djibouti (+253)',
            '1809'  => 'Dominican Republic (+1809)',
            '593'   => 'Ecuador (+593)',
            '20'    => 'Egypt (+20)',
            '503'   => 'El Salvador (+503)',
            '240'   => 'Equatorial Guinea (+240)',
            '291'   => 'Eritrea (+291)',
            '372'   => 'Estonia (+372)',
            '251'   => 'Ethiopia (+251)',
            '500'   => 'Falkland Islands (+500)',
            '298'   => 'Faroe Islands (+298)',
            '679'   => 'Fiji (+679)',
            '358'   => 'Finland (+358)',
            '33'    => 'France (+33)',
            '594'   => 'French Guiana (+594)',
            '689'   => 'French Polynesia (+689)',
            '241'   => 'Gabon (+241)',
            '220'   => 'Gambia (+220)',
            '7880'  => 'Georgia (+7880)',
            '49'    => 'Germany (+49)',
            '233'   => 'Ghana (+233)',
            '350'   => 'Gibraltar (+350)',
            '30'    => 'Greece (+30)',
            '299'   => 'Greenland (+299)',
            '1473'  => 'Grenada (+1473)',
            '590'   => 'Guadeloupe (+590)',
            '671'   => 'Guam (+671)',
            '502'   => 'Guatemala (+502)',
            '224'   => 'Guinea (+224)',
            '245'   => 'Guinea - Bissau (+245)',
            '592'   => 'Guyana (+592)',
            '509'   => 'Haiti (+509)',
            '504'   => 'Honduras (+504)',
            '852'   => 'Hong Kong (+852)',
            '36'    => 'Hungary (+36)',
            '354'   => 'Iceland (+354)',
            '91'    => 'India (+91)',
            '62'    => 'Indonesia (+62)',
            '98'    => 'Iran (+98)',
            '964'   => 'Iraq (+964)',
            '353'   => 'Ireland (+353)',
            '972'   => 'Israel (+972)',
            '39'    => 'Italy (+39)',
            '1876'  => 'Jamaica (+1876)',
            '81'    => 'Japan (+81)',
            '962'   => 'Jordan (+962)',
            '7'     => 'Kazakhstan (+7)',
            '254'   => 'Kenya (+254)',
            '686'   => 'Kiribati (+686)',
            '850'   => 'Korea North (+850)',
            '82'    => 'Korea South (+82)',
            '965'   => 'Kuwait (+965)',
            '996'   => 'Kyrgyzstan (+996)',
            '856'   => 'Laos (+856)',
            '371'   => 'Latvia (+371)',
            '961'   => 'Lebanon (+961)',
            '266'   => 'Lesotho (+266)',
            '231'   => 'Liberia (+231)',
            '218'   => 'Libya (+218)',
            '417'   => 'Liechtenstein (+417)',
            '370'   => 'Lithuania (+370)',
            '352'   => 'Luxembourg (+352)',
            '853'   => 'Macao (+853)',
            '389'   => 'Macedonia (+389)',
            '261'   => 'Madagascar (+261)',
            '265'   => 'Malawi (+265)',
            '60'    => 'Malaysia (+60)',
            '960'   => 'Maldives (+960)',
            '223'   => 'Mali (+223)',
            '356'   => 'Malta (+356)',
            '692'   => 'Marshall Islands (+692)',
            '596'   => 'Martinique (+596)',
            '222'   => 'Mauritania (+222)',
            '269'   => 'Mayotte (+269)',
            '52'    => 'Mexico (+52)',
            '691'   => 'Micronesia (+691)',
            '373'   => 'Moldova (+373)',
            '377'   => 'Monaco (+377)',
            '976'   => 'Mongolia (+976)',
            '1664'  => 'Montserrat (+1664)',
            '212'   => 'Morocco (+212)',
            '258'   => 'Mozambique (+258)',
            '95'    => 'Myanmar (+95)',
            '264'   => 'Namibia (+264)',
            '674'   => 'Nauru (+674)',
            '977'   => 'Nepal (+977)',
            '31'    => 'Netherlands (+31)',
            '687'   => 'New Caledonia (+687)',
            '64'    => 'New Zealand (+64)',
            '505'   => 'Nicaragua (+505)',
            '227'   => 'Niger (+227)',
            '234'   => 'Nigeria (+234)',
            '683'   => 'Niue (+683)',
            '672'   => 'Norfolk Islands (+672)',
            '670'   => 'Northern Marianas (+670)',
            '47'    => 'Norway (+47)',
            '968'   => 'Oman (+968)',
            '680'   => 'Palau (+680)',
            '507'   => 'Panama (+507)',
            '675'   => 'Papua New Guinea (+675)',
            '595'   => 'Paraguay (+595)',
            '51'    => 'Peru (+51)',
            '63'    => 'Philippines (+63)',
            '48'    => 'Poland (+48)',
            '351'   => 'Portugal (+351)',
            '1787'  => 'Puerto Rico (+1787)',
            '974'   => 'Qatar (+974)',
            '262'   => 'Reunion (+262)',
            '40'    => 'Romania (+40)',
            '7'     => 'Russia (+7)',
            '250'   => 'Rwanda (+250)',
            '378'   => 'San Marino (+378)',
            '239'   => 'Sao Tome & Principe (+239)',
            '966'   => 'Saudi Arabia (+966)',
            '221'   => 'Senegal (+221)',
            '381'   => 'Serbia (+381)',
            '248'   => 'Seychelles (+248)',
            '232'   => 'Sierra Leone (+232)',
            '65'    => 'Singapore (+65)',
            '421'   => 'Slovak Republic (+421)',
            '386'   => 'Slovenia (+386)',
            '677'   => 'Solomon Islands (+677)',
            '252'   => 'Somalia (+252)',
            '27'    => 'South Africa (+27)',
            '34'    => 'Spain (+34)',
            '94'    => 'Sri Lanka (+94)',
            '290'   => 'St. Helena (+290)',
            '1869'  => 'St. Kitts (+1869)',
            '1758'  => 'St. Lucia (+1758)',
            '249'   => 'Sudan (+249)',
            '597'   => 'Suriname (+597)',
            '268'   => 'Swaziland (+268)',
            '46'    => 'Sweden (+46)',
            '41'    => 'Switzerland (+41)',
            '963'   => 'Syria (+963)',
            '886'   => 'Taiwan (+886)',
            '66'    => 'Thailand (+66)',
            '228'   => 'Togo (+228)',
            '676'   => 'Tonga (+676)',
            '1868'  => 'Trinidad & Tobago (+1868)',
            '216'   => 'Tunisia (+216)',
            '90'    => 'Turkey (+90)',
            '993'   => 'Turkmenistan (+993)',
            '1649'  => 'Turks & Caicos Islands (+1649)',
            '688'   => 'Tuvalu (+688)',
            '256'   => 'Uganda (+256)',
            '380'   => 'Ukraine (+380)',
            '971'   => 'United Arab Emirates (+971)',
            '598'   => 'Uruguay (+598)',
            '678'   => 'Vanuatu (+678)',
            '379'   => 'Vatican City (+379)',
            '58'    => 'Venezuela (+58)',
            '84'    => 'Vietnam (+84)',
            '1284'    => 'Virgin Islands - British (+1284)',
            '1340'    => 'Virgin Islands - US (+1340)',
            '681'   => 'Wallis & Futuna (+681)',
            '969'   => 'Yemen (North)(+969)',
            '967'   => 'Yemen (South)(+967)',
            '260'   => 'Zambia (+260)',
            '263'   => 'Zimbabwe (+263)',
        ];
    }

}

?>