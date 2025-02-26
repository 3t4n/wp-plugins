<?php

    create_tables_for_astromedia_horoscope();

    function _custom_menu_page(){

        ob_start();
?>

    <style>
        .package-box {
            margin: 10px;
            box-sizing: border-box;
            border:1px solid lightgrey;
            border-radius: 5px;
            cursor:pointer;
            padding:10px;
        }

        .nav-link{
            color:black!important;
            border:1px solid lightgrey;
        }

        .nav-link:hover{
            color:black;
            background-color:#c4ebeb;
        }
        .tablinks:hover{
            background-color:#c4ebeb!important;
        }
        .tablinks.active{
            background-color:#c4ebeb!important;
        }
        .tablinks{
            color: #0d0e0d!important;
        }
        .form-row {
            display: flex;
            justify-content: space-between; /* Adjusts spacing between form elements */
        }

        .form-outline {
            margin-right: 10px; /* Adds some space between the form elements */
            flex-grow: 1; /* Allows each form element to grow and fill the space */
        }
    </style>
    
    <div class="container" style="background-color:#EDF9F9">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="border-radius:5px;max-width:100%">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="<?php echo plugins_url( '../images/headimage.png', __FILE__ ); ?>" alt="">
                            </div>
                            <div class="col-md-6 text-end">
                                <p>Versie: 2.5.1</p>
                            </div>
                            <hr>
                            <?php 

                                $email = '';
                                $user_id = '';

                                if(isset($_COOKIE['astro'])) {

                                    $cookie = sanitize_text_field( $_COOKIE['astro'] );

                                }else{

                                    $cookie = '';
                                }
 
                                if($cookie == ''){

                            ?>
                            <div class="col-md-10 mt-5">
                                <h3><strong>Welkom bij Astro Media,</strong></h3>
                                <div class="mt-3">Klik op de blauwe button hiernaast of ga naar <a target="_blank" href="https://astromedia-business.nl/register">https://astromedia-business.nl/register</a> om een account aan te maken waarmee je horoscopen kan toevoegen aan je website. <b>Je ontvangt 25% commissie over iedere verkoop.</b></div>
                                <div class="mt-3">Heb je al een account? Beheer dan heel gemakkelijk je horoscopen door de shortcodes in je website te plaatsen. Verkopen, statistieken en commissie kun je inzien door in te loggen via <a href="https://astromedia-business.nl/login">https://astromedia-business.nl/login</a>.  </div>
                                <div class="mt-3">Heb je problemen met inloggen of een andere vraag? Stuur ons dan een e-mail op <a href="mailto:info@astro-media.nl">info@astro-media.nl.</a> </div>
                            </div>
                            <div class="col-md-2 mt-5">
                                <a target="_blank" href="https://astromedia-business.nl/register" target="_blank" class="btn btn-info" style="color:white">Account aanmaken</a>
                            </div>
                            <hr class="mt-3">
                            <div class="col-md-12 mt-5">
                                <form action="" method="post">
                                    <input type="hidden" value="<?php echo esc_url( $_SERVER['SERVER_NAME']); ?>" name="domain">
                                    <!-- Email input -->
                                    <div class="form-row">
                                        <!-- Email input -->
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="username">E-mailadres</label>
                                            <input type="email" id="username" name="email" class="form-control" />
                                        </div>

                                        <!-- Password input -->
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="password">Wachtwoord</label>
                                            <input type="password" id="password" name="password" class="form-control" />
                                        </div>
                                    </div>

                                    <!-- 2 column grid layout for inline styling -->
                                    <div class="row mb-4">
                                        <div class="col">
                                        <!-- Checkbox -->
                                            <div style="display:none">
                                                <input style="display:inline-block;margin-top:2px" class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                                                <label style="display:inline-block" class="form-check-label" for="form2Example31"> Onthoud mij </label>
                                            </div>
                                        </div>

                                        <div class="col text-end">
                                        <!-- Simple link -->
                                            <a target="_blank" href="https://astromedia-business.nl/password/reset">Wachtwoord vergeten?</a>
                                        </div>
                                    </div>

                                    <!-- Submit button -->
                                    <button type="submit" class="btn btn-primary btn-block mb-4">Inloggen</button>
                                </form>
                            </div>
                            
                            <?php
                                }else{

                                    $post_fields = array(
                                        'apikey' => $cookie,
                                        'domain' => sanitize_url( $_SERVER['HTTP_HOST'] ),
                                    );

                                    $host = 'https://astromedia-business.nl/api/endpoint/v1/getservices';
                                    
                                    $response = wp_remote_post($host, array(
                                        'headers' => array('Content-Type' => 'application/x-www-form-urlencoded'),
                                        'body' => $post_fields,
                                        'timeout' => 30,
                                        'sslverify' => false,
                                    ));
                                    
                                    if (is_wp_error($response)) {
                                        $error_message = $response->get_error_message();
                                    } else {
                                        $result = wp_remote_retrieve_body($response);
                                    }

                                    $result = json_decode($result, true);

                                    $user_id = $result['user']['id'];
                                    $email = $result['user']['email'];
                                    $token = $result['user']['api_key']; 
                                    $premium = $result['premium'];
                                    $premium_data = $result['premium_data'];
                                    $premium_days_leftover = $result['daysleftover'];

                                    $products = $result['products'];

                                    $settings = $result['settings'];

                                    global $wpdb;
                                    $table_name = $wpdb->prefix . 'customimages'; // Replace 'your_table_name' with the actual table name

                                    //set default values
                                    $active = 0;
                                    $ram = '';
                                    $stier = '';
                                    $tweelingen = '';
                                    $kreeft = '';
                                    $leeuw = '';
                                    $maagd = '';
                                    $weegschaal = '';
                                    $schorpioen = '';
                                    $boogschutter = '';
                                    $steenbok = '';
                                    $waterman = '';
                                    $vissen = '';

                                    $rat = '';
                                    $os = '';
                                    $tijger = '';
                                    $konijn = '';
                                    $draak = '';
                                    $slang = '';
                                    $paard = '';
                                    $geit = '';
                                    $aap = '';
                                    $haan = '';
                                    $hond = '';
                                    $varken = '';

                                    // Prepare and execute the query
                                    $zodiac_images = $wpdb->get_results("SELECT * FROM $table_name");

                                    // Process the results
                                    if ($zodiac_images) {
                                        foreach ($zodiac_images as $image) {
                                            // Access the columns using object notation
                                            $ram = $image->ram;
                                            $stier = $image->stier;
                                            $tweelingen = $image->tweelingen;
                                            $kreeft = $image->kreeft;
                                            $leeuw = $image->leeuw;
                                            $maagd = $image->maagd;
                                            $weegschaal = $image->weegschaal;
                                            $schorpioen = $image->schorpioen;
                                            $boogschutter = $image->boogschutter;
                                            $steenbok = $image->steenbok;
                                            $waterman = $image->waterman;
                                            $vissen = $image->vissen;

                                            $rat = $image->rat;
                                            $os = $image->os;
                                            $tijger = $image->tijger;
                                            $konijn = $image->konijn;
                                            $draak = $image->draak;
                                            $slang = $image->slang;
                                            $paard = $image->paard;
                                            $geit = $image->geit;
                                            $aap = $image->aap;
                                            $haan = $image->haan;
                                            $hond = $image->hond;
                                            $varken = $image->varken;
                                        }

                                        $active = $image->active;
                                    }                                    
                            ?>
                                <div class="col-md-12 mt-5">
                                    <h3><strong>Welkom <?php echo esc_html($result['user']['name']); ?>,</strong></h3>
                                    <div class="mt-3">Activeer de horoscopen welke je wilt tonen op je website door het schuifje aan te zetten. Voeg voor elke horoscoop de shortcode toe in een shortcode-element in je website waarna je direct kunt starten met verkopen! <b>Je ontvangt 25% commissie over iedere verkoop. </b></div>
                                    <div class="mt-3">Wil je statistieken, verkopen en je commissie inzien? Log dan in via <a target="_blank" href="https://astromedia-business.nl/login">https://astromedia-business.nl/login</a></div>
                                    <div class="mt-3">Heb je een vraag? Stuur deze gerust naar <a href="mailto:info@astro-media.nl">info@astro-media.nl.</a></div>
                                </div>

                                                          

                                <div class="col-md-12 mt-5">
                                    
                                    <div class="tab" style="border-radius:5px">
                                        <button class="tablinks tabButton" onclick="opentabcontent(event, 'voorspellende_horoscopen', this, 'Voorspellende horoscopen')"><strong> Voorspellende horoscopen</strong></button>
                                        <button class="tablinks tabButton" onclick="opentabcontent(event, 'liefdes_en_relatie_horoscopen', this, 'Liefdes- en relatiehoroscopen')"><strong> Liefdes- en relatiehoroscopen</strong></button>
                                        <button class="tablinks tabButton" onclick="opentabcontent(event, 'geboorte_horoscopen', this, 'Geboortehoroscopen')"><strong> Geboortehoroscopen</strong></button>
                                        <button class="tablinks tabButton" onclick="opentabcontent(event, 'gratis_horoscopen', this, 'Diversen (gratis!)')"><strong> Diversen (gratis!)</strong></button>
                                        <!--<button class="" disabled onclick="opentabcontent(event, 'numerologie', this, 'Numerologie')"><strong> Numerologie</strong></button>-->
                                        <button class="tablinks tabButton" onclick="opentabcontent(event, 'toretleggingen_voorspellingen', this, 'Tarotleggingen voorspellingen')"><strong> Tarotleggingen voorspellingen</strong></button>
                                        <button class="tablinks tabButton" onclick="opentabcontent(event, 'tarotleggingen_liefde_en_relatie', this, 'Tarotleggingen liefde en relaties')"><strong> Tarotleggingen liefde en relaties</strong></button>
                                        <button class="tablinks tabButton" onclick="opentabcontent(event, 'tarotleggingen_inzichten', this, 'Tarotleggingen inzichten')"><strong> Tarotleggingen inzichten</strong></button>
                                        <!--<button class="" disabled onclick="opentabcontent(event, 'lenomard_leggingen', this, 'Lenormand leggingen')"><strong> Lenormand leggingen</strong></button>-->
                                        <!--<button class="" disabled onclick="opentabcontent(event, 'engelen_kaartleggingen', this, 'Engelen kaartleggingen')"><strong> Engelen kaartleggingen</strong></button>-->
                                        <!--<button class="" disabled onclick="opentabcontent(event, 'zigeuner_kaartleggingen', this, 'Zigeuner kaartleggingen')"><strong> Zigeuner kaartleggingen</strong></button>-->
                                    </div>

                                    <div id="individual_items" class="tabcontent">
                                        <div class="row" id="">
                                            <div class="col-12">
                                                <div class="mt-3">
                                                    <h3><strong id="menuitem_title"></strong></h3>
                                                </div>
                                                <hr>
                                                <div class="row">

                                                    <div class="col-lg-3 col-12 menuitems" id="voorspellende_horoscopen_section">
                                                        <ul class="nav flex-column">
                                                            <li id="link_1" class="nav-item nav_item" style="cursor:pointer">
                                                                <a class="nav-link" onclick="openHoroscope(event, 1)">Daghoroscoop</a>
                                                            </li>
                                                            <li id="link_2" class="nav-item nav_item" style="cursor:pointer">
                                                                <a class="nav-link" onclick="openHoroscope(event, 2)">Maandhoroscoop</a>
                                                            </li>
                                                            <li id="link_17" class="nav-item nav_item" style="cursor:pointer">
                                                                <a class="nav-link" onclick="openHoroscope(event, 17)">Jaarhoroscoop 2024</a>
                                                            </li>
                                                            <li id="link_69" class="nav-item nav_item" style="cursor:pointer">
                                                                <a class="nav-link" onclick="openHoroscope(event, 69)">Uitgebreide jaarhoroscoop 2024</a>
                                                            </li>
                                                            <li id="link_19" class="nav-item nav_item" style="cursor:pointer">
                                                                <a class="nav-link" onclick="openHoroscope(event, 19)">Liefdesjaarhoroscoop 2024</a>
                                                            </li>
                                                            <li id="link_20" class="nav-item nav_item" style="cursor:pointer">
                                                                <a class="nav-link" onclick="openHoroscope(event, 67)">Chinese jaarhoroscoop 2024</a>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <div class="col-lg-3 col-12 menuitems" id="liefdes_en_relatie_horoscopen_section">
                                                        <ul class="nav flex-column">
                                                            <li id="link_3" class="nav-item nav_item" style="cursor:pointer">
                                                                <a class="nav-link" onclick="openHoroscope(event, 3)">Relatiehoroscoop</a>
                                                            </li>
                                                            <li id="link_21" class="nav-item nav_item" style="cursor:pointer">
                                                                <a class="nav-link" onclick="openHoroscope(event, 21)">Chinese relatiehoroscoop</a>
                                                            </li>
                                                            <li id="link_23" class="nav-item nav_item" style="cursor:pointer">
                                                                <a class="nav-link" onclick="openHoroscope(event, 23)">Ouder-kindrelatie horoscoop</a>
                                                            </li>
                                                            <li id="link_22" class="nav-item nav_item" style="cursor:pointer">
                                                                <a class="nav-link" onclick="openHoroscope(event, 22)">Liefdestest</a>
                                                            </li>
                                                            <li id="link_25" class="nav-item nav_item" style="cursor:pointer">
                                                                <a class="nav-link" onclick="openHoroscope(event, 25)">Verover je (stille) liefde</a>
                                                            </li>
                                                            <li id="link_24" class="nav-item nav_item" style="cursor:pointer">
                                                                <a class="nav-link" onclick="openHoroscope(event, 24)">Partnervergelijking</a>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <div class="col-lg-3 col-12 menuitems" id="geboorte_horoscopen_section">
                                                        <ul class="nav flex-column">
                                                            <li id="link_68" class="nav-item nav_item" style="cursor:pointer">
                                                                <a class="nav-link" onclick="openHoroscope(event, 68)">Geboortehoroscoop</a>
                                                            </li>
                                                            <li id="link_4" class="nav-item nav_item" style="cursor:pointer">
                                                                <a class="nav-link" onclick="openHoroscope(event, 4)">Uitgebreide geboortehoroscoop</a>
                                                            </li>
                                                            <li id="link_26" class="nav-item nav_item" style="cursor:pointer">
                                                                <a class="nav-link" onclick="openHoroscope(event, 26)">Kinderhoroscoop</a>
                                                            </li>
                                                            <li id="link_27" class="nav-item nav_item" style="cursor:pointer;">
                                                                <a class="nav-link" onclick="openHoroscope(event, 27)">Uitgebreide kinderhoroscoop</a>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <div class="col-lg-3 col-12 menuitems" id="gratis_horoscopen_section">
                                                        <ul class="nav flex-column">
                                                            <li id="link_30" class="nav-item nav_item" style="cursor:pointer;">
                                                                <a class="nav-link" onclick="openHoroscope(event, 30)">Ascendanten</a>
                                                            </li>
                                                            <li id="link_28" class="nav-item nav_item" style="cursor:pointer;">
                                                                <a class="nav-link" onclick="openHoroscope(event, 28)">Sterrenbeelden</a>
                                                            </li>
                                                            <li id="link_29" class="nav-item nav_item" style="cursor:pointer;">
                                                                <a class="nav-link" onclick="openHoroscope(event, 29)">Kindersterrenbeelden</a>
                                                            </li>
                                                            <li id="link_31" class="nav-item nav_item" style="cursor:pointer;">
                                                                <a class="nav-link" onclick="openHoroscope(event, 31)">Chinese dierenriem</a>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <div class="col-lg-3 col-12 menuitems" id="numerologie_section">
                                                        <ul class="nav flex-column">
                                                            <li id="link_32" class="nav-item nav_item" style="cursor:pointer">
                                                                <a class="nav-link" onclick="openHoroscope(event, 32)">Geboortegetal</a>
                                                            </li>
                                                            <li id="link_33" class="nav-item nav_item" style="cursor:pointer">
                                                                <a class="nav-link" onclick="openHoroscope(event, 33)">Jaargetal</a>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <div class="col-lg-3 col-12 menuitems" id="tarotleggingen_liefde_en_relatie_section">
                                                        <ul class="nav flex-column">
                                                            <li id="link_65" class="nav-item nav_item" style="cursor:pointer;">
                                                                <a class="nav-link" onclick="openHoroscope(event, 65)">Dagkaart liefde (gratis)</a>
                                                            </li>
                                                            <li id="link_11" class="nav-item nav_item" style="cursor:pointer">
                                                                <a class="nav-link" onclick="openHoroscope(event, 11)">De liefdeslegging</a>
                                                            </li>
                                                            <li id="link_9" class="nav-item nav_item" style="cursor:pointer">
                                                                <a class="nav-link" onclick="openHoroscope(event, 9)">De liefdesvraag</a>
                                                            </li>
                                                            <li id="link_7" class="nav-item nav_item" style="cursor:pointer">
                                                                <a class="nav-link" onclick="openHoroscope(event, 7)">De relatielegging</a>
                                                            </li>
                                                            <li id="link_8" class="nav-item nav_item" style="cursor:pointer">
                                                                <a class="nav-link" onclick="openHoroscope(event, 8)">Het liefdesinzicht</a>
                                                            </li>                                                           
                                                            <li id="link_10" class="nav-item nav_item" style="cursor:pointer">
                                                                <a class="nav-link" onclick="openHoroscope(event, 10)">Weeklegging liefde</a>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <div class="col-lg-3 col-12 menuitems" id="toretleggingen_voorspellingen_section">
                                                        <ul class="nav flex-column">
                                                            <li id="link_34" class="nav-item nav_item" style="cursor:pointer;">
                                                                <a class="nav-link" onclick="openHoroscope(event, 34)">Dagkaart (gratis!)</a>
                                                            </li>
                                                            <li id="link_36" class="nav-item nav_item" style="cursor:pointer;">
                                                                <a class="nav-link" onclick="openHoroscope(event, 36)">De uitgebreide daglegging</a>
                                                            </li>
                                                            <li id="link_39" class="nav-item nav_item" style="cursor:pointer;">
                                                                <a class="nav-link" onclick="openHoroscope(event, 39)">De jaarlegging</a>
                                                            </li>
                                                            <li id="link_38" class="nav-item nav_item" style="cursor:pointer;">
                                                                <a class="nav-link" onclick="openHoroscope(event, 38)">De maandlegging</a>
                                                            </li>
                                                            <li id="link_37" class="nav-item nav_item" style="cursor:pointer">
                                                                <a class="nav-link" onclick="openHoroscope(event, 37)">De weeklegging</a>
                                                            </li>
                                                            <li id="link_35" class="nav-item nav_item" style="cursor:pointer">
                                                                <a class="nav-link" onclick="openHoroscope(event, 35)">Het kruis</a>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <div class="col-lg-3 col-12 menuitems" id="tarotleggingen_inzichten_section">
                                                        <ul class="nav flex-column">
                                                            <li id="link_40" class="nav-item nav_item" style="cursor:pointer">
                                                                <a class="nav-link" onclick="openHoroscope(event, 40)">De blinde vlek</a>
                                                            </li>
                                                            <li id="link_41" class="nav-item nav_item" style="cursor:pointer">
                                                                <a class="nav-link" onclick="openHoroscope(event, 41)">De poort</a>
                                                            </li>
                                                            <li id="link_43" class="nav-item nav_item" style="cursor:pointer">
                                                                <a class="nav-link" onclick="openHoroscope(event, 43)">De probleemlegging</a>
                                                            </li>
                                                            <li id="link_42" class="nav-item nav_item" style="cursor:pointer">
                                                                <a class="nav-link" onclick="openHoroscope(event, 42)">De ster</a>
                                                            </li>
                                                            <li id="link_45" class="nav-item nav_item" style="cursor:pointer">
                                                                <a class="nav-link" onclick="openHoroscope(event, 45)">De weg naar jezelf</a>
                                                            </li>
                                                            <li id="link_44" class="nav-item nav_item" style="cursor:pointer">
                                                                <a class="nav-link" onclick="openHoroscope(event, 44)">Het gevoelsleven</a>
                                                            </li>
                                                            <li id="link_46" class="nav-item nav_item" style="cursor:pointer">
                                                                <a class="nav-link" onclick="openHoroscope(event, 46)">Inzicht-evenwicht-harmonie</a>
                                                            </li>
                                                            <li id="link_47" class="nav-item nav_item" style="cursor:pointer">
                                                                <a class="nav-link" onclick="openHoroscope(event, 47)">Verleden-heden-toekomst</a>
                                                            </li>
                                                            <li id="link_48" class="nav-item nav_item" style="cursor:pointer;display:none">
                                                                <a class="nav-link" onclick="openHoroscope(event, 48)">Verleden-heden-toekomst (Crowley)</a>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <div class="col-lg-3 col-12 menuitems" id="lenomard_leggingen_section">
                                                        <ul class="nav flex-column">
                                                            <li id="link_50" class="nav-item nav_item" style="cursor:pointer">
                                                                <a class="nav-link" onclick="openHoroscope(event, 50)">Dagkaart trekken</a>
                                                            </li>
                                                            <li id="link_12" class="nav-item nav_item" style="cursor:pointer">
                                                                <a class="nav-link" onclick="openHoroscope(event, 12)">De relatielegging </a>
                                                            </li>
                                                            <li id="link_51" class="nav-item nav_item" style="cursor:pointer">
                                                                <a class="nav-link" onclick="openHoroscope(event, 51)">Jouw perspectief-legging</a>
                                                            </li>
                                                            <li id="link_14" class="nav-item nav_item" style="cursor:pointer">
                                                                <a class="nav-link" onclick="openHoroscope(event, 14)">De maandlegging</a>
                                                            </li>
                                                            <li id="link_15" class="nav-item nav_item" style="cursor:pointer;">
                                                                <a class="nav-link" onclick="openHoroscope(event, 15)">De succeslegging</a>
                                                            </li>
                                                            <li id="link_13" class="nav-item nav_item" style="cursor:pointer">
                                                                <a class="nav-link" onclick="openHoroscope(event, 13)">De weeklegging</a>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <div class="col-lg-3 col-12 menuitems" id="engelen_kaartleggingen_section">
                                                        <ul class="nav flex-column">
                                                            <li id="link_52" class="nav-item nav_item" style="cursor:pointer">
                                                                <a class="nav-link" onclick="openHoroscope(event, 52)">De advieslegging</a>
                                                            </li>
                                                            <li id="link_53" class="nav-item nav_item" style="cursor:pointer">
                                                                <a class="nav-link" onclick="openHoroscope(event, 53)">De levenslegging </a>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <div class="col-lg-3 col-12 menuitems" id="zigeuner_kaartleggingen_section">
                                                        <ul class="nav flex-column">
                                                            <li id="link_54" class="nav-item nav_item" style="cursor:pointer">
                                                                <a class="nav-link" onclick="openHoroscope(event, 54)">Dagkaart trekken</a>
                                                            </li>
                                                            <li id="link_16" class="nav-item nav_item" style="cursor:pointer">
                                                                <a class="nav-link" onclick="openHoroscope(event, 16)">De weeklegging </a>
                                                            </li>
                                                            <li id="link_55" class="nav-item nav_item" style="cursor:pointer">
                                                                <a class="nav-link" onclick="openHoroscope(event, 55)">De regressielegging</a>
                                                            </li>
                                                            <li id="link_56" class="nav-item nav_item" style="cursor:pointer">
                                                                <a class="nav-link" onclick="openHoroscope(event, 56)">De shuvani-reading</a>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <div class="col-lg-3 col-12 menuitems" id="orakels_section">
                                                        <ul class="nav flex-column">
                                                            <li id="link_57" class="nav-item nav_item" style="cursor:pointer">
                                                                <a class="nav-link" onclick="openHoroscope(event, 57)">Domino van de dag</a>
                                                            </li>
                                                            <li id="link_58" class="nav-item nav_item" style="cursor:pointer">
                                                                <a class="nav-link" onclick="openHoroscope(event, 58)">De domino weeklegging </a>
                                                            </li>
                                                            <li id="link_59" class="nav-item nav_item" style="cursor:pointer">
                                                                <a class="nav-link" onclick="openHoroscope(event, 59)">Het Drie Runen Orakel</a>
                                                            </li>
                                                            <li id="link_60" class="nav-item nav_item" style="cursor:pointer">
                                                                <a class="nav-link" onclick="openHoroscope(event, 60)">AstroMirakel De muur</a>
                                                            </li>
                                                            <li id="link_61" class="nav-item nav_item" style="cursor:pointer">
                                                                <a class="nav-link" onclick="openHoroscope(event, 61)">AstroMirakel De opening</a>
                                                            </li>
                                                            <li id="link_62" class="nav-item nav_item" style="cursor:pointer">
                                                                <a class="nav-link" onclick="openHoroscope(event, 62)">AstroMirakel De partnerlegging</a>
                                                            </li>
                                                            <li id="link_63" class="nav-item nav_item" style="cursor:pointer">
                                                                <a class="nav-link" onclick="openHoroscope(event, 63)">Liefdes- en relatie maankaartlegging</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    
                                                    <div class="col-lg-9 col-12" id="contentbox" style="border:1px solid lightgrey;display:none">
                                                        <div id="maincontainer">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h3><strong id="title"></strong></h3>
                                                                            <div class="mt-2" id="description"></div>
                                                                            <hr>
                                                                            <div class="flex flex-col sm:flex-row">
                                                                                <div class="mr-auto">
                                                                                    <div><strong>Shortcode: </strong><span id="shortcode1"></span></div>
                                                                                    <div id="shortcodev2box" style="display:none"><strong>Shortcode: </strong><span id="shortcode2"></span></div>
                                                                            
                                                                                    <hr>
                                                                                    <div class="mt-3">
                                                                                        <div><strong>Activeren / Deactiveren</strong></div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="flex mt-2">
                                                                                    <div class="switch__container">
                                                                                        <div id="activate_deactivate"></div>                                    
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="card">
                                                                        <div class="card-body">

                                                                            <div class="row mb-3" style="display:none" id="addpre">
                                                                                <button onclick="openpremium2()" style="color:white;" class="btn btn-primary btn-sm">Premium toevoegen</button>
                                                                            </div>

                                                                            <div class="row mb-3">
                                                                                <div class="col-8">
                                                                                    <div class="col-form-label">Standaard teksten</div>
                                                                                </div>
                                                                                <div class="d-flex justify-content-end col-4">
                                                                                    <div id="defaulttext"></div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row mb-3">
                                                                                <div class="col-8">
                                                                                    <div class="col-form-label">Thema kleur</div>
                                                                                </div>
                                                                                <div class="d-flex justify-content-end col-4">
                                                                                    <div id="themecolor"></div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row mb-3">
                                                                                <div class="col-8">
                                                                                    <div class="col-form-label">Tekst kleur</div>
                                                                                </div>
                                                                                <div class="d-flex justify-content-end col-4">
                                                                                    <div id="textcolor"></div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row mb-3">
                                                                                <div class="col-8">
                                                                                    <div class="col-form-label">Tekst grootte</div>
                                                                                </div>
                                                                                <div class="d-flex justify-content-end col-4">
                                                                                    <div id="fontsize"></div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row mb-3">
                                                                                <div class="col-4">
                                                                                    <div class="col-form-label">Lettertype</div>
                                                                                </div>
                                                                                <div class="d-flex justify-content-end col-8">
                                                                                    <div id="fonttype"></div>
                                                                                </div>
                                                                            </div>

                                                                            <hr>
                                                                            <div class="row">
                                                                                <div class="d-flex justify-content-end col-12">
                                                                                    <div id="premium_button"></div>
                                                                                </div>
                                                                            </div>                                       
                                                                        </div>
                                                                    </div>
                                                                </div>
                
                                                                <div class="col-md-12 imagebox" id="horoscope_starsigns" style="display:none;margin-top:10px;">
                                                                    <div class="row">
                                                                        <div class="col-lg-2 col-12">
                                                                            <select onchange="switchcustomimages()" name="custom_image_selector" id="custom_image_selector">
                                                                                <option value="0">Standaard plaatjes</option>
                                                                                <option value="1">Zelf plaatjes kiezen</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-lg-6 col-12">
                                                                            <select style="display:none" name="horoscope_version" id="horoscope_version">
                                                                                <option value="1">Layout versie 1</option>
                                                                                <option value="2">Layout versie 2</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="card" id="v2" style="max-width:100%!important;padding:0;">
                                                                        <div class="card-body" id="display_images">  
                                                                            <div class="col-md-12" id="horoscopen_default_images_box">
                                                                                <div class="row">
                                                                                    <div class="col-lg-2 col-6 text-center"> 
                                                                                        <img style="max-height:60px;width:auto" class="ram_image" src="" alt="">
                                                                                        <div style="font-size:12px;">Ram</div>
                                                                                    </div>
                                                                                    <div class="col-lg-2 col-6 text-center"> 
                                                                                    <img style="max-height:60px;width:auto" class="stier_image" src="" alt="">
                                                                                        <div style="font-size:12px;">Stier</div>
                                                                                    </div>
                                                                                    <div class="col-lg-2 col-6 text-center"> 
                                                                                    <img style="max-height:60px;width:auto" class="tweelingen_image" src="" alt="">
                                                                                        <div style="font-size:12px;">Tweelingen</div>
                                                                                    </div>
                                                                                    <div class="col-lg-2 col-6 text-center"> 
                                                                                        <img style="max-height:60px;width:auto" class="kreeft_image" src="" alt="">
                                                                                        <div style="font-size:12px;">Kreeft</div>
                                                                                    </div>
                                                                                    <div class="col-lg-2 col-6 text-center"> 
                                                                                        <img style="max-height:60px;width:auto" class="leeuw_image" src="" alt="">
                                                                                        <div style="font-size:12px;">leeuw</div>
                                                                                    </div>
                                                                                    <div class="col-lg-2 col-6 text-center"> 
                                                                                        <img style="max-height:60px;width:auto" class="maagd_image" src="" alt="">
                                                                                        <div style="font-size:12px;">Maagd</div>
                                                                                    </div>
                                                                                </div>
                                                                        
                                                                                <div class="row mt-3">
                                                                                    <div class="col-lg-2 col-6 text-center"> 
                                                                                        <img style="max-height:60px;width:auto" class="weegschaal_image" src="" alt="">
                                                                                        <div style="font-size:12px;">Weegschaal</div>
                                                                                    </div>
                                                                                    <div class="col-lg-2 col-6 text-center"> 
                                                                                        <img style="max-height:60px;width:auto" class="schorpioen_image" src="" alt="">
                                                                                        <div style="font-size:12px;">Schorpioen</div>
                                                                                    </div>
                                                                                    <div class="col-lg-2 col-6 text-center"> 
                                                                                        <img style="max-height:60px;width:auto" class="boogschutter_image" src="" alt="">
                                                                                        <div style="font-size:12px;">Boogschutter</div>
                                                                                    </div>
                                                                                    <div class="col-lg-2 col-6 text-center"> 
                                                                                        <img style="max-height:60px;width:auto" class="steenbok_image" src="" alt="">
                                                                                        <div style="font-size:12px;">Steenbok</div>
                                                                                    </div>
                                                                                    <div class="col-lg-2 col-6 text-center"> 
                                                                                        <img style="max-height:60px;width:auto" class="waterman_image" src="" alt="">
                                                                                        <div style="font-size:12px;">Waterman</div>
                                                                                    </div>
                                                                                    <div class="col-lg-2 col-6 text-center"> 
                                                                                        <img style="max-height:60px;width:auto" class="vissen_image" src="" alt="">
                                                                                        <div style="font-size:12px;">Vissen</div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="" style="padding:0">
                                                                                    <div class="col-6 mt-3" style="padding:0">
                                                                                        <div class="col-12 mt-3" style="padding:0">
                                                                                            <button style="width:150px;" type="submit" onclick="savecustom(0)" class="btn btn-sm btn-primary">
                                                                                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="display: none;"></span>
                                                                                                <span class="custom_save_text">Instellingen opslaan</span>
                                                                                            </button>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-6" style="padding:0">
                                                                                        <div style="display:none;padding:0" class="saved_custom_images col-12 mt-3 text-center">
                                                                                            <div class="alert alert-success" style="padding:3px;" role="alert">
                                                                                                Instellingen opgeslagen
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12" id="horoscopen_custom_images_box">
                                                                                <div class="row image-preview-container">
                                                                                    <div class="col-md-12">
                                                                                        <div class="image-preview"></div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row" style="padding:30px;">
                                                                                    <div class="col-md-2 card text-center">                                                                    
                                                                                        
                                                                                        <img class="ram_custom"  src="" alt="">
                                                                                        
                                                                                        <div style="font-size:12px;margin-top:5px;margin-bottom:5px;"><b>Ram</b></div>
                                                                                        <input type="button" onclick="openmedia('ram')" id="upload-button" class="button" value="Upload Image" target="_blank"/>
                                                                                        <input type="hidden" id="image-id" name="image-id" />
                                                                                    </div>
                                                                                    <div class="col-md-2 card text-center">
                                                                                        
                                                                                        <img class="stier_custom"  src="" alt="">
                                                                                        
                                                                                        <div style="font-size:12px;margin-top:5px;margin-bottom:5px;"><b>Stier</b></div>
                                                                                        <input type="button" onclick="openmedia('stier')" id="upload-button" class="button" value="Upload Image" target="_blank"/>
                                                                                        <input type="hidden" id="image-id" name="image-id" />
                                                                                    </div>
                                                                                    <div class="col-md-2 card text-center">
                                                                                        
                                                                                            <img class="tweelingen_custom"  src="" alt="">
                                                                                        
                                                                                        <div style="font-size:12px;margin-top:5px;margin-bottom:5px;"><b>Tweelingen</b></div>
                                                                                        <input type="button" onclick="openmedia('tweelingen')" id="upload-button" class="button" value="Upload Image" target="_blank"/>
                                                                                        <input type="hidden" id="image-id" name="image-id" />
                                                                                    </div>
                                                                                    
                                                                                    <div class="col-md-2 card text-center">
                                                                                        
                                                                                            <img class="kreeft_custom"  src="" alt="">
                                                                                        
                                                                                        <div style="font-size:12px;margin-top:5px;margin-bottom:5px;"><b>Kreeft</b></div>
                                                                                        <input type="button" onclick="openmedia('kreeft')" id="upload-button" class="button" value="Upload Image" target="_blank"/>
                                                                                        <input type="hidden" id="image-id" name="image-id" />
                                                                                    </div>
                                                                                    <div class="col-md-2 card text-center">
                                                                                        
                                                                                            <img class="leeuw_custom"  src="" alt="">
                                                                                                                                            
                                                                                        <div style="font-size:12px;margin-top:5px;margin-bottom:5px;"><b>Leeuw</b></div>
                                                                                        <input type="button" onclick="openmedia('leeuw')" id="upload-button" class="button" value="Upload Image" target="_blank"/>
                                                                                        <input type="hidden" id="image-id" name="image-id" />
                                                                                    </div>
                                                                                    <div class="col-md-2 card text-center">
                                                                                        
                                                                                            <img class="maagd_custom"  src="" alt="">
                                                                                        
                                                                                        <div style="font-size:12px;margin-top:5px;margin-bottom:5px;"><b>Maagd</b></div>
                                                                                        <input type="button" onclick="openmedia('maagd')" id="upload-button" class="button" value="Upload Image" target="_blank"/>
                                                                                        <input type="hidden" id="image-id" name="image-id" />
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row" style="padding:30px;padding-bottom:5px;">                                                                
                                                                                    <div class="col-md-2 card text-center">
                                                                                        
                                                                                            <img class="weegschaal_custom"  src="" alt="">
                                                                                        
                                                                                        <div style="font-size:12px;margin-top:5px;margin-bottom:5px;"><b>Weegschaal</b></div>
                                                                                        <input type="button" onclick="openmedia('weegschaal')" id="upload-button" class="button" value="Upload Image" target="_blank"/>
                                                                                        <input type="hidden" id="image-id" name="image-id" />
                                                                                    </div>
                                                                                    <div class="col-md-2 card text-center">
                                                                                        
                                                                                            <img class="schorpioen_custom"  src="" alt="">
                                                                                    
                                                                                        <div style="font-size:12px;margin-top:5px;margin-bottom:5px;"><b>Schorpioen</b></div>
                                                                                        <input type="button" onclick="openmedia('schorpioen')" id="upload-button" class="button" value="Upload Image" target="_blank"/>
                                                                                        <input type="hidden" id="image-id" name="image-id" />
                                                                                    </div>
                                                                                    <div class="col-md-2 card text-center">
                                                                                        
                                                                                            <img class="boogschutter_custom"  src="" alt="">
                                                                                        
                                                                                        <div style="font-size:12px;margin-top:5px;margin-bottom:5px;"><b>Boogschutter</b></div>
                                                                                        <input type="button" onclick="openmedia('boogschutter')" id="upload-button" class="button" value="Upload Image" target="_blank"/>
                                                                                        <input type="hidden" id="image-id" name="image-id" />
                                                                                    </div>
                                                                                    <div class="col-md-2 card text-center">
                                                                                        
                                                                                            <img class="steenbok_custom"  src="" alt="">
                                                                                        
                                                                                        <div style="font-size:12px;margin-top:5px;margin-bottom:5px;"><b>Steenbok</b></div>
                                                                                        <input type="button" onclick="openmedia('steenbok')" id="upload-button" class="button" value="Upload Image" target="_blank"/>
                                                                                        <input type="hidden" id="image-id" name="image-id" />
                                                                                    </div>
                                                                                    <div class="col-md-2 card text-center">
                                                                                        
                                                                                            <img class="waterman_custom"  src="" alt="">
                                                                                    
                                                                                        <div style="font-size:12px;margin-top:5px;margin-bottom:5px;"><b>Waterman</b></div>
                                                                                        <input type="button" onclick="openmedia('waterman')" id="upload-button" class="button" value="Upload Image" target="_blank"/>
                                                                                        <input type="hidden" id="image-id" name="image-id" />
                                                                                    </div>
                                                                                    <div class="col-md-2 card text-center">
                                                                                        
                                                                                            <img class="vissen_custom"  src="" alt="">

                                                                                        <div style="font-size:12px;margin-top:5px;margin-bottom:5px;"><b>Vissen</b></div>
                                                                                        <input type="button" onclick="openmedia('vissen')" id="upload-button" class="button" value="Upload Image" target="_blank"/>
                                                                                        <input type="hidden" id="image-id" name="image-id" />
                                                                                    </div>
                                                                                    
                                                                                    <div class="" style="padding:0">
                                                                                        <div class="col-6 mt-3" style="padding:0">
                                                                                            <div class="col-12 mt-3" style="padding:0">
                                                                                                <button style="width:150px;" type="submit" onclick="savecustom(0)" class="btn btn-sm btn-primary">
                                                                                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="display: none;"></span>
                                                                                                    <span class="custom_save_text">Instellingen opslaan</span>
                                                                                                </button>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-6" style="padding:0">
                                                                                            <div style="display:none;padding:0" class="saved_custom_images col-12 mt-3 text-center">
                                                                                                <div class="alert alert-success" style="padding:3px;" role="alert">
                                                                                                    Instellingen opgeslagen
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                        
                                                                <div class="col-md-12 imagebox" id="horoscope_chinese" style="display:none">
                                                                    <div class="row">
                                                                        <div class="col-lg-2 col-12">
                                                                            <select onchange="switchcustomimages_chinese()" name="custom_image_selector" id="custom_image_selector_chinese">
                                                                                <option value="0">Standaard plaatjes</option>
                                                                                <option value="1">Zelf plaatjes kiezen</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-lg-6 col-12">
                                                                            <select style="display:none" name="horoscope_version_chinese" id="horoscope_version_chinese">
                                                                                <option value="1">Jaarhoroscoop versie 1</option>
                                                                                <option value="2">Jaarhoroscoop versie 2</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="card" id="v2" style="max-width:100%!important;padding:0;">
                                                                        <div class="card-body" id="display_images_chinese">  
                                                                            <div class="col-md-12" id="horoscopen_default_images_box_chinese">
                                                                                <div class="row">
                                                                                    <div class="col-lg-2 col-6 text-center"> 
                                                                                        <img style="max-height:60px;width:auto" class="rat_image" src="" alt="">
                                                                                        <div style="font-size:12px;">Rat</div>
                                                                                    </div>
                                                                                    <div class="col-lg-2 col-6 text-center"> 
                                                                                    <img style="max-height:60px;width:auto" class="os_image" src="" alt="">
                                                                                        <div style="font-size:12px;">Os</div>
                                                                                    </div>
                                                                                    <div class="col-lg-2 col-6 text-center"> 
                                                                                    <img style="max-height:60px;width:auto" class="tijger_image" src="" alt="">
                                                                                        <div style="font-size:12px;">Tijger</div>
                                                                                    </div>
                                                                                    <div class="col-lg-2 col-6 text-center"> 
                                                                                        <img style="max-height:60px;width:auto" class="konijn_image" src="" alt="">
                                                                                        <div style="font-size:12px;">Konijn</div>
                                                                                    </div>
                                                                                    <div class="col-lg-2 col-6 text-center"> 
                                                                                        <img style="max-height:60px;width:auto" class="draak_image" src="" alt="">
                                                                                        <div style="font-size:12px;">Draak</div>
                                                                                    </div>
                                                                                    <div class="col-lg-2 col-6 text-center"> 
                                                                                        <img style="max-height:60px;width:auto" class="slang_image" src="" alt="">
                                                                                        <div style="font-size:12px;">Slang</div>
                                                                                    </div>
                                                                                </div>
                                                                        
                                                                                <div class="row mt-3">
                                                                                    <div class="col-lg-2 col-6 text-center"> 
                                                                                        <img style="max-height:60px;width:auto" class="paard_image" src="" alt="">
                                                                                        <div style="font-size:12px;">Paard</div>
                                                                                    </div>
                                                                                    <div class="col-lg-2 col-6 text-center"> 
                                                                                        <img style="max-height:60px;width:auto" class="geit_image" src="" alt="">
                                                                                        <div style="font-size:12px;">Geit</div>
                                                                                    </div>
                                                                                    <div class="col-lg-2 col-6 text-center"> 
                                                                                        <img style="max-height:60px;width:auto" class="aap_image" src="" alt="">
                                                                                        <div style="font-size:12px;">Aap</div>
                                                                                    </div>
                                                                                    <div class="col-lg-2 col-6 text-center"> 
                                                                                        <img style="max-height:60px;width:auto" class="haan_image" src="" alt="">
                                                                                        <div style="font-size:12px;">Haan</div>
                                                                                    </div>
                                                                                    <div class="col-lg-2 col-6 text-center"> 
                                                                                        <img style="max-height:60px;width:auto" class="hond_image" src="" alt="">
                                                                                        <div style="font-size:12px;">Hond</div>
                                                                                    </div>
                                                                                    <div class="col-lg-2 col-6 text-center"> 
                                                                                        <img style="max-height:60px;width:auto" class="varken_image" src="" alt="">
                                                                                        <div style="font-size:12px;">Varken</div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="" style="padding:0">
                                                                                    <div class="col-6 mt-3" style="padding:0">
                                                                                        <div class="col-12 mt-3" style="padding:0">
                                                                                            <button style="width:150px;" type="submit" onclick="savecustom(1)" class="btn btn-sm btn-primary">
                                                                                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="display: none;"></span>
                                                                                                <span class="custom_save_text">Instellingen opslaan</span>
                                                                                            </button>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-6" style="padding:0">
                                                                                        <div style="display:none;padding:0" class="saved_custom_images col-12 mt-3 text-center">
                                                                                            <div class="alert alert-success" style="padding:3px;" role="alert">
                                                                                                Instellingen opgeslagen
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12" id="horoscopen_custom_images_box_chinese">
                                                                                <div class="row image-preview-container">
                                                                                    <div class="col-md-12">
                                                                                        <div class="image-preview"></div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row" style="padding:30px;">
                                                                                    <div class="col-md-2 card text-center">                                                                    
                                                                                        
                                                                                        <img class="rat_custom"  src="" alt="">
                                                                                        
                                                                                        <div style="font-size:12px;margin-top:5px;margin-bottom:5px;"><b>Rat</b></div>
                                                                                        <input type="button" onclick="openmedia('rat')" id="upload-button" class="button" value="Upload Image" target="_blank"/>
                                                                                        <input type="hidden" id="image-id" name="image-id" />
                                                                                    </div>
                                                                                    <div class="col-md-2 card text-center">
                                                                                        
                                                                                        <img class="os_custom"  src="" alt="">
                                                                                        
                                                                                        <div style="font-size:12px;margin-top:5px;margin-bottom:5px;"><b>Os</b></div>
                                                                                        <input type="button" onclick="openmedia('os')" id="upload-button" class="button" value="Upload Image" target="_blank"/>
                                                                                        <input type="hidden" id="image-id" name="image-id" />
                                                                                    </div>
                                                                                    <div class="col-md-2 card text-center">
                                                                                        
                                                                                            <img class="tijger_custom"  src="" alt="">
                                                                                        
                                                                                        <div style="font-size:12px;margin-top:5px;margin-bottom:5px;"><b>Tijger</b></div>
                                                                                        <input type="button" onclick="openmedia('tijger')" id="upload-button" class="button" value="Upload Image" target="_blank"/>
                                                                                        <input type="hidden" id="image-id" name="image-id" />
                                                                                    </div>
                                                                                    
                                                                                    <div class="col-md-2 card text-center">
                                                                                        
                                                                                            <img class="konijn_custom"  src="" alt="">
                                                                                        
                                                                                        <div style="font-size:12px;margin-top:5px;margin-bottom:5px;"><b>Konijn</b></div>
                                                                                        <input type="button" onclick="openmedia('konijn')" id="upload-button" class="button" value="Upload Image" target="_blank"/>
                                                                                        <input type="hidden" id="image-id" name="image-id" />
                                                                                    </div>
                                                                                    <div class="col-md-2 card text-center">
                                                                                        
                                                                                            <img class="draak_custom"  src="" alt="">
                                                                                                                                            
                                                                                        <div style="font-size:12px;margin-top:5px;margin-bottom:5px;"><b>Draak</b></div>
                                                                                        <input type="button" onclick="openmedia('draak')" id="upload-button" class="button" value="Upload Image" target="_blank"/>
                                                                                        <input type="hidden" id="image-id" name="image-id" />
                                                                                    </div>
                                                                                    <div class="col-md-2 card text-center">
                                                                                        
                                                                                            <img class="slang_custom"  src="" alt="">
                                                                                        
                                                                                        <div style="font-size:12px;margin-top:5px;margin-bottom:5px;"><b>Slang</b></div>
                                                                                        <input type="button" onclick="openmedia('slang')" id="upload-button" class="button" value="Upload Image" target="_blank"/>
                                                                                        <input type="hidden" id="image-id" name="image-id" />
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row" style="padding:30px;padding-bottom:5px;">                                                                
                                                                                    <div class="col-md-2 card text-center">
                                                                                        
                                                                                            <img class="paard_custom"  src="" alt="">
                                                                                        
                                                                                        <div style="font-size:12px;margin-top:5px;margin-bottom:5px;"><b>Paard</b></div>
                                                                                        <input type="button" onclick="openmedia('paard')" id="upload-button" class="button" value="Upload Image" target="_blank"/>
                                                                                        <input type="hidden" id="image-id" name="image-id" />
                                                                                    </div>
                                                                                    <div class="col-md-2 card text-center">
                                                                                        
                                                                                            <img class="geit_custom"  src="" alt="">
                                                                                    
                                                                                        <div style="font-size:12px;margin-top:5px;margin-bottom:5px;"><b>Geit</b></div>
                                                                                        <input type="button" onclick="openmedia('geit')" id="upload-button" class="button" value="Upload Image" target="_blank"/>
                                                                                        <input type="hidden" id="image-id" name="image-id" />
                                                                                    </div>
                                                                                    <div class="col-md-2 card text-center">
                                                                                        
                                                                                            <img class="aap_custom"  src="" alt="">
                                                                                        
                                                                                        <div style="font-size:12px;margin-top:5px;margin-bottom:5px;"><b>Aap</b></div>
                                                                                        <input type="button" onclick="openmedia('aap')" id="upload-button" class="button" value="Upload Image" target="_blank"/>
                                                                                        <input type="hidden" id="image-id" name="image-id" />
                                                                                    </div>
                                                                                    <div class="col-md-2 card text-center">
                                                                                        
                                                                                            <img class="haan_custom"  src="" alt="">
                                                                                        
                                                                                        <div style="font-size:12px;margin-top:5px;margin-bottom:5px;"><b>Haan</b></div>
                                                                                        <input type="button" onclick="openmedia('haan')" id="upload-button" class="button" value="Upload Image" target="_blank"/>
                                                                                        <input type="hidden" id="image-id" name="image-id" />
                                                                                    </div>
                                                                                    <div class="col-md-2 card text-center">
                                                                                        
                                                                                            <img class="hond_custom"  src="" alt="">
                                                                                    
                                                                                        <div style="font-size:12px;margin-top:5px;margin-bottom:5px;"><b>Hond</b></div>
                                                                                        <input type="button" onclick="openmedia('hond')" id="upload-button" class="button" value="Upload Image" target="_blank"/>
                                                                                        <input type="hidden" id="image-id" name="image-id" />
                                                                                    </div>
                                                                                    <div class="col-md-2 card text-center">
                                                                                        
                                                                                            <img class="varken_custom"  src="" alt="">

                                                                                        <div style="font-size:12px;margin-top:5px;margin-bottom:5px;"><b>Varken</b></div>
                                                                                        <input type="button" onclick="openmedia('varken')" id="upload-button" class="button" value="Upload Image" target="_blank"/>
                                                                                        <input type="hidden" id="image-id" name="image-id" />
                                                                                    </div>
                                                                                    
                                                                                    <div class="" style="padding:0">
                                                                                        <div class="col-6 mt-3" style="padding:0">
                                                                                            <div class="col-12 mt-3" style="padding:0">
                                                                                                <button style="width:150px;" type="submit" onclick="savecustom(1)" class="btn btn-sm btn-primary">
                                                                                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="display: none;"></span>
                                                                                                    <span class="custom_save_text">Instellingen opslaan</span>
                                                                                                </button>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-6" style="padding:0">
                                                                                            <div style="display:none;padding:0" class="saved_custom_images col-12 mt-3 text-center">
                                                                                                <div class="alert alert-success" style="padding:3px;" role="alert">
                                                                                                    Instellingen opgeslagen
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" id="current_id">
                                </div>
                                <div class="col-12 mt-5">

                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="card mb-4 ">
                                                <div class="card-body text-center">
                                                    <?php
                                                        if($premium == 1 || $premium == 'trial'){
                                                    ?>
                                                        <img src="<?php echo plugins_url( '../images/premium.png', __FILE__ ); ?>" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                                                    <?php
                                                    }else{                                                        
                                                    ?>
                                                        <img src="<?php echo plugins_url( '../images/logo.png', __FILE__ ); ?>" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                                                    <?php
                                                    }
                                                    ?>

                                                    <h5 class="my-3"><?php echo esc_html($result['user']['name']); ?></h5>

                                                    <p class="text-muted mb-1">WordPress beheerder</p>
                                                    <p class="text-muted mb-4">AstroMedia partner</p>

                                                    <div class="d-flex justify-content-center mb-2">
                                                        <button type="button" class="btn btn-primary">Profiel</button>
                                                        <button type="button" onclick="logout()" class="btn btn-outline-primary ms-1">Uitloggen</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div style="max-width:100%" class="card  mb-4">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <p class="mb-0">Naam</p>
                                                        </div>
                                                        <div class="col-sm-9">
                                                            <p class="text-muted mb-0"><?php echo esc_html($result['user']['name']); ?></p>
                                                        </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                        <div class="col-sm-3">
                                                            <p class="mb-0">E-mailadres</p>
                                                        </div>
                                                        <div class="col-sm-9">
                                                            <p class="text-muted mb-0"><?php echo esc_html($result['user']['name']); ?></p>
                                                        </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                <p class="mb-0">Registratie datum</p>
                                                            </div>
                                                            <div class="col-sm-9">
                                                                <?php
                                                                
                                                                $created_at = $result['user']['created_at'];
                                                                $date = new DateTime($created_at);

                                                                // Set the locale to Dutch
                                                                setlocale(LC_TIME, 'nl_NL.UTF-8');

                                                                // Format the date and time in Dutch
                                                                $formatted_date = strftime('%A %e %B %Y, %H:%M', $date->getTimestamp());
                                                                ?>
                                                                <p class="text-muted mb-0"><?php echo $formatted_date; ?></p>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                <p class="mb-0">Premium</p>
                                                            </div>
                                                            <div class="col-sm-9">
                                                                <?php
                                                                    if($premium == 0){
                                                                ?>
                                                                        
                                                                        <div><button onclick="start_trial()" class="btn btn-primary">Probeer premium voor 7 dagen gratis</button></div>
                                                                <?php
                                                                    }elseif($premium == 'trial_ended'){
                                                                ?>
                                                                        <p class="text-muted mb-0">7 dagen proefperiode geëindigd</p>
                                                                        <br>
                                                                        <div><button onclick="openpremium2()" class="btn btn-primary">Premium ontdekken</button></div>
                                                                <?php
                                                                    }else{
                                                                ?>
                                                                        <p class="text-muted mb-0"><b>Geactiveerd</b> voor <?php echo esc_html($premium_days_leftover); ?> dag(en) resterend</p>
                                                                <?php
                                                                    }
                                                                ?>
                                                                
                                                            </div>
                                                        </div>
                                                        
                                                        <?php 
                                                            if($premium == 1){
                                                        ?>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-sm-3">
                                                                    <p class="mb-0">Geactiveerde premium pakketten</p>
                                                                </div>
                                                                <div class="col-sm-9">
                                                                    <table style="width:100%">
                                                                        <tr style="border-bottom:1px solid lightgrey">
                                                                            <th><p class="text-muted mb-0">Pakket</p></th>
                                                                            <th><p class="text-muted mb-0">Domein</p></th>
                                                                            <th><p class="text-muted mb-0">Aankoopdatum</p></th>
                                                                            <th><p class="text-muted mb-0">Geldig tot</p></th>
                                                                        </tr>
                                                                        <?php 
                                                                        
                                                                            foreach($premium_data as $pd){

                                                                                $current_domain = $_SERVER['SERVER_NAME'];

                                                                                if($current_domain == $pd['domain']){
                                                                        ?>

                                                                            <tr>
                                                                                <td><p><?php echo esc_html($pd['package_name']); ?></p></td>
                                                                                <td><p><?php echo esc_html($pd['domain']); ?></p></td>
                                                                                <td><p><?php echo esc_html($pd['payment_date']); ?></p></td>
                                                                                <td><p><?php echo esc_html($pd['expire_date']); ?></p></td>
                                                                            </tr>

                                                                        <?php
                                                                                }
                                                                            }
                                                                        ?>
                                                                    </table> 
                                                                    <p>*Het aantal resterende dagen worden bij elkaar opgeteld bij meerdere premium pakketten, mits deze zijn aangeschaft voor hetzelfde domein.</p>
                                                                    <button onclick="openpremium2()" class="btn btn-premium">Premium verlengen </button>
                                                                </div>
                                                            </div>
                                                        <?php 
                                                            }
                                                        ?>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-12">                                                
                                    <div style="max-width:100%" class="card mb-4 mb-md-0">
                                        <h4><b>Verkoopcijfers</b></h4>
                                        <div class="card" style="max-width:100%">
                                            <div class="table-responsive">
                                                <table id="salestable" class="hover" style="width:100%">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th>Type</th>
                                                            <th>Bedrag</th>
                                                            <th>Transactie ID</th>
                                                            <th>Status</th>	
                                                            <th>Uitbetaald</th>
                                                            <th>Datum</th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="card" style="max-width:100%">
                                        <h4><b>Premium</b></h4>
                                        <div class="row" id="premiumPane">
                                        </div>
                                    </div>
                                </div>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </div>

   

   <script>   

        var settings = <?php echo json_encode($settings); ?>;
        var user_id = <?php echo $user_id; ?>;
        var premium = '<?php echo $premium; ?>';
        var products = <?php echo json_encode($products); ?>;
        var zodiac_images = <?php echo json_encode($zodiac_images); ?>;


        function openHoroscope(event, product_id){

            $('#contentbox').show();

            $('.nav_item').css('background-color', 'white')
            $('#link_'+product_id).css('background-color', '#c4ebeb')

            $('#current_id').val(product_id);

            var product = products.find(p => p.id === product_id);

            var product_type = product.type;

            $('#shortcode1').html(product.shortcode);
            $('#title').html(product.title);
            $('#description').html(product.description);

            var activate_deactivate_html = activate_deactivate(product_id);
            $('#activate_deactivate').html(activate_deactivate_html);

            var defaulttexthtml = defaulttext(product_id);
            $('#defaulttext').html(defaulttexthtml)

            var themecolorhtml = themecolor(product_id);
            $('#themecolor').html(themecolorhtml)

            var textcolorhtml = textcolor(product_id);
            $('#textcolor').html(textcolorhtml)

            var fontsizehtml = fontsize(product_id);
            $('#fontsize').html(fontsizehtml)

            var fonttypehtml = fonttype(product_id);
            $('#fonttype').html(fonttypehtml)

            var premium_buttonhtml = premium_button(product_id);
            $('#premium_button').html(premium_buttonhtml)

            var custom_images = <?php echo json_encode($zodiac_images); ?>;

            ///////////////////////

            if(
                product_id == 5 || 
                product_id == 17 ||
                product_id == 6 ||
                product_id == 20 ||
                product_id == 19 ||
                product_id == 2 ||
                product_id == 1 ||
                product_id == 29 ||
                product_id == 30 ||
                product_id == 28 ||
                product_id == 23 ||
                product_id == 24
                ){

                $('#horoscope_version').show();
            }

            // List of all product types
            const productTypes = [
                'horoscope_starsigns',
                'horoscope_input',
                'tarot_riderwaite',
                'horoscope_chinese',
                'lenormand',
                'zigeuner',
                'numerology_input',
                'tarot_crowley',
                'tarot_lenormand',
                'tarot_angel',
                'orakel_domino',
                'orakel_runes',
                'orakel_tarot'
            ];

            // Hide all elements initially
            productTypes.forEach(type => {
                $(`#${type}`).hide();
            });

            // Show the one that matches product_type
            if (productTypes.includes(product_type)) {
                $(`#${product_type}`).show();
            }

            ///////////////////////////////////////////
            var images = zodiac_images.find(p => p.product_id == product_id);
            
            if(images){

                if(images.vers == 2){

                    $('#horoscope_version').val(1).trigger('change');
                    $('#horoscope_version').val(2).trigger('change');

                }else{
                    $('#horoscope_version').val(2).trigger('change');
                    $('#horoscope_version').val(1).trigger('change');
                }

                if(images.active == 1){

                    $('#horoscopen_default_images_box').hide();
                    $('#horoscopen_custom_images_box').show();
                    $('#custom_image_selector').val(1)

                    $('#horoscopen_default_images_box_chinese').hide();
                    $('#horoscopen_custom_images_box_chinese').show();
                    $('#custom_image_selector_chinese').val(1)

                }else{

                    $('#horoscopen_default_images_box').show();
                    $('#horoscopen_custom_images_box').hide();
                    $('#custom_image_selector').val(0)

                    $('#horoscopen_default_images_box_chinese').show();
                    $('#horoscopen_custom_images_box_chinese').hide();
                    $('#custom_image_selector_chinese').val(0)
                }
            }else{

                $('#horoscopen_default_images_box').show();
                $('#horoscopen_custom_images_box').hide();
                $('#custom_image_selector').val(0)

                $('#horoscopen_default_images_box_chinese').show();
                $('#horoscopen_custom_images_box_chinese').hide();
                $('#custom_image_selector_chinese').val(0)
            }

            if(premium == 0){

                document.getElementById('defaulttext_switch-shadow_'+product_id).disabled = true;
                document.getElementById('theme_color_'+product_id).disabled = true;
                document.getElementById('text_color_'+product_id).disabled = true;
                document.getElementById('fontsize_'+product_id).disabled = true;
                document.getElementById('font_'+product_id).disabled = true;
                document.getElementById('addpre').style.display = 'block';
            }else{

                document.getElementById('defaulttext_switch-shadow_'+product_id).disabled = false;
                document.getElementById('theme_color_'+product_id).disabled = false;
                document.getElementById('text_color_'+product_id).disabled = false;
                document.getElementById('fontsize_'+product_id).disabled = false;
                document.getElementById('font_'+product_id).disabled = false;
                document.getElementById('addpre').style.display = 'none';
            }
                

            setcustomimages(product_id);
        }

        function setcustomimages(product_id){

            const defaultImage = '<?php echo plugin_dir_url(__FILE__) . "../images/placeholder.png"; ?>';
            const zodiacNames = [
                'ram', 'stier', 'tweelingen', 'kreeft', 'leeuw', 'maagd', 
                'weegschaal', 'schorpioen', 'boogschutter', 'steenbok', 'waterman', 'vissen',
                'rat', 'os', 'tijger', 'konijn', 'draak', 'slang', 
                'paard', 'geit', 'aap', 'haan', 'hond', 'varken'
            ];

            const foundItem = zodiac_images.find(item => item.product_id == product_id);

            if (foundItem) {
                zodiacNames.forEach(name => {
                    let image = foundItem[name] || defaultImage;
                    $(`.${name}_custom`).attr('src', image);
                });
            }
        }

        function fonttype(product_id) {

            let itemtofilter = 'font';
            let fonts = [
                { className: 'roboto', name: 'Roboto' },
                { className: 'lato', name: 'Lato' },
                { className: 'rubik', name: 'Rubik' },
                { className: 'noto-sans', name: 'Noto Sans' },
                { className: 'droid-sans', name: 'Droid Sans' },
                { className: 'pt-sans', name: 'PT Sans' },
                { className: 'ubuntu', name: 'Ubuntu' },
                { className: 'raleway', name: 'Raleway' },
                { className: 'source-sans-pro', name: 'Source Sans Pro' },
                { className: 'montserrat', name: 'Montserrat' },
                { className: 'open-sans', name: 'Open Sans' }
            ];

            let result = settings.filter(item => 
                item.user_id == user_id && 
                item.product_id == product_id && 
                item.item == itemtofilter
            );

            let fontSetting = result.length > 0 ? result[0].setting : '2';

            let htmlContent = '<select class="form-control" id="font_' + product_id + '">';

            for (let i = 0; i < fonts.length; i++) {
                let isSelected = fontSetting === (i + 1).toString() ? 'selected' : '';
                htmlContent += `<option class="${fonts[i].className}" value="${i + 1}" ${isSelected}>${fonts[i].name} - This is an example text</option>`;
            }

            htmlContent += '</select>';

            return htmlContent;
        }


        function premium_button(product_id){

            let htmlContent;

            if (premium === 0) {
                htmlContent = `
                <div class="col-12">
                    <button onclick="openpremium2()" class="btn btn-premium">Premium ontdekken</button>
                </div>
                `;

            } else {
                htmlContent = `
               
                <div class="col-12">
                    <button type="submit" onclick="saveoptions('${product_id}')" class="btn btn-sm btn-primary">Instellingen opslaan</button>
                </div>
                <div style="display:none" id="saved_${product_id}" class="col-12 mt-2">
                    <div>Instellingen opgeslagen</div>
                </div>
             
                `;

                document.getElementById('defaulttext').style.disabled = false;
            }

            return htmlContent;
        }

        function fontsize(product_id){

            let itemtofilter = 'font_size';

            let result = settings.filter(item => 
                item.user_id === user_id && 
                item.product_id === product_id && 
                item.item === itemtofilter
            );

            let fontSizeSetting = result.length > 0 ? result[0].setting : '2';

            let htmlContent = `
          
                <select class="form-control" id="fontsize_${product_id}">
                    <option value="1" ${fontSizeSetting === '1' ? 'selected' : ''}>Klein</option>
                    <option value="2" ${fontSizeSetting === '2' ? 'selected' : ''}>Normaal</option>
                    <option value="3" ${fontSizeSetting === '3' ? 'selected' : ''}>Groter</option>
                    <option value="4" ${fontSizeSetting === '4' ? 'selected' : ''}>Grootst</option>
                </select>
          
            `;

            return htmlContent;
        }

        function textcolor(product_id){

            let itemtofilter = 'text_color';

            let result = settings.filter(item => 
                item.user_id == user_id && 
                item.product_id == product_id && 
                item.item == itemtofilter
            );

            let text_color = result.length > 0 ? result[0].setting : '#00000';

            let htmlContent = `<input type="color" value="${text_color}" class="form-control form-control-color" id="text_color_${product_id}">`;

            return htmlContent
        }

        function themecolor(product_id){

            let itemtofilter = 'theme_color';

            let result = settings.filter(item => 
                item.user_id == user_id && 
                item.product_id == product_id && 
                item.item == itemtofilter
            );

            let theme_color = result.length > 0 ? result[0].setting : '#00000';

            let htmlContent = `<input type="color" value="${theme_color}" class="form-control form-control-color" id="theme_color_${product_id}">`;

            return htmlContent;
        }

        function defaulttext(product_id){

            let itemtofilter = 'defaulttext';
            let result = settings.filter(item => 
                item.user_id == user_id && 
                item.product_id == product_id && 
                item.item == itemtofilter
            );

            let default_text = result.length > 0 ? result[0].setting : '1';

            let htmlResult = `
                <div class="col-sm-8">
                    <div style="margin-top:7px;">
            `;

            if (default_text == '1') {
                htmlResult += `
                    <input id="defaulttext_switch-shadow_${product_id}" class="switch switch--shadow" type="checkbox" checked>
                    <label for="defaulttext_switch-shadow_${product_id}"></label>
                `;
            } else {
                htmlResult += `
                    <input id="defaulttext_switch-shadow_${product_id}" class="switch switch--shadow" type="checkbox">
                    <label for="defaulttext_switch-shadow_${product_id}"></label>
                `;
            }

            htmlResult += `
                    </div>
                </div>
            `;

            return htmlResult;
        }

        function activate_deactivate(product_id){

            let itemtofilter = 'activated';
            let result = settings.filter(item => 
                item.user_id == user_id && 
                item.product_id == product_id && 
                item.item == itemtofilter
            );

            let activation_setting = result.length > 0 ? result[0].setting : 0;

            let locked = 0;

            if (product_id == 1) {
                locked = 1;
                if (premium == 1) {
                    locked = 0;
                }
            }

            let htmlResult = '';

            if (locked == 0) {
                if (activation_setting == 0) {
                    htmlResult += `
                        <input onchange="activator(${product_id})" id="switch-shadow_${product_id}" class="switch switch--shadow" type="checkbox">
                        <label for="switch-shadow_${product_id}"></label>
                    `;
                } else {
                    htmlResult += `
                        <input onchange="activator(${product_id})" id="switch-shadow_${product_id}" class="switch switch--shadow" type="checkbox" checked>
                        <label for="switch-shadow_${product_id}"></label>
                    `;
                }
            } else {
                htmlResult += `
                    <div>Get premium to unlock this feature</div>
                `;
            }

            return htmlResult;
        }

        jQuery(document).ready(function($) {
            // Listen for the change event of the select element
            $('#horoscope_version').change(function() {
                // Get the selected option value
                var selectedHoroscope = $(this).val();

                var custom_images = <?php echo json_encode($zodiac_images); ?>;

                if(selectedHoroscope == 2){

                    var targetProductId = "51";

                    var ram_image = '<?php echo plugin_dir_url( __FILE__ ) . '../images/horoscopesv2/ram.png'; ?>';
                    var stier_image = '<?php echo plugin_dir_url( __FILE__ ) . '../images/horoscopesv2/stier.png'; ?>';
                    var tweelingen_image = '<?php echo plugin_dir_url( __FILE__ ) . '../images/horoscopesv2/tweelingen.png'; ?>';
                    var kreeft_image = '<?php echo plugin_dir_url( __FILE__ ) . '../images/horoscopesv2/kreeft.png'; ?>';
                    var leeuw_image = '<?php echo plugin_dir_url( __FILE__ ) . '../images/horoscopesv2/leeuw.png'; ?>';
                    var maagd_image = '<?php echo plugin_dir_url( __FILE__ ) . '../images/horoscopesv2/maagd.png'; ?>';
                    var weegschaal_image = '<?php echo plugin_dir_url( __FILE__ ) . '../images/horoscopesv2/weegschaal.png'; ?>';
                    var schorpioen_image = '<?php echo plugin_dir_url( __FILE__ ) . '../images/horoscopesv2/schorpioen.png'; ?>';
                    var boogschutter_image = '<?php echo plugin_dir_url( __FILE__ ) . '../images/horoscopesv2/boogschutter.png'; ?>';
                    var steenbok_image = '<?php echo plugin_dir_url( __FILE__ ) . '../images/horoscopesv2/steenbok.png'; ?>';
                    var waterman_image = '<?php echo plugin_dir_url( __FILE__ ) . '../images/horoscopesv2/waterman.png'; ?>';
                    var vissen_image = '<?php echo plugin_dir_url( __FILE__ ) . '../images/horoscopesv2/vissen.png'; ?>';

                    // Update image sources based on the selected option
                    $('.ram_image').attr('src', ram_image);
                    $('.stier_image').attr('src', stier_image);
                    $('.tweelingen_image').attr('src', tweelingen_image);
                    $('.kreeft_image').attr('src', kreeft_image);
                    $('.leeuw_image').attr('src', leeuw_image);
                    $('.maagd_image').attr('src', maagd_image);
                    $('.weegschaal_image').attr('src', weegschaal_image);
                    $('.schorpioen_image').attr('src', schorpioen_image);
                    $('.boogschutter_image').attr('src', boogschutter_image);
                    $('.steenbok_image').attr('src', steenbok_image);
                    $('.waterman_image').attr('src', waterman_image);
                    $('.vissen_image').attr('src', vissen_image);


                }else if( selectedHoroscope == 1 ){

                    var targetProductId = "5";

                    var foundItem = custom_images.find(function(item) {
                        return item.product_id === targetProductId;
                    });

                    if(foundItem){

                        var ram_custom = foundItem.ram;
                        if (!ram_custom) {
                            ram_custom = '<?php echo plugin_dir_url(__FILE__) . "../images/placeholder.png"; ?>';
                        }

                        var stier_custom = foundItem.stier;
                        if (!stier_custom) {
                            stier_custom = '<?php echo plugin_dir_url(__FILE__) . "../images/placeholder.png"; ?>';
                        }

                        var tweelingen_custom = foundItem.tweelingen;
                        if (!tweelingen_custom) {
                            tweelingen_custom = '<?php echo plugin_dir_url(__FILE__) . "../images/placeholder.png"; ?>';
                        }

                        var kreeft_custom = foundItem.kreeft;
                        if (!kreeft_custom) {
                            kreeft_custom = '<?php echo plugin_dir_url(__FILE__) . "../images/placeholder.png"; ?>';
                        }

                        var leeuw_custom = foundItem.leeuw;
                        if (!leeuw_custom) {
                            leeuw_custom = '<?php echo plugin_dir_url(__FILE__) . "../images/placeholder.png"; ?>';
                        }

                        var maagd_custom = foundItem.maagd;
                        if (!maagd_custom) {
                            maagd_custom = '<?php echo plugin_dir_url(__FILE__) . "../images/placeholder.png"; ?>';
                        }

                        var weegschaal_custom = foundItem.weegschaal;
                        if (!weegschaal_custom) {
                            weegschaal_custom = '<?php echo plugin_dir_url(__FILE__) . "../images/placeholder.png"; ?>';
                        }

                        var schorpioen_custom = foundItem.schorpioen;
                        if (!schorpioen_custom) {
                            schorpioen_custom = '<?php echo plugin_dir_url(__FILE__) . "../images/placeholder.png"; ?>';
                        }

                        var boogschutter_custom = foundItem.boogschutter;
                        if (!boogschutter_custom) {
                            boogschutter_custom = '<?php echo plugin_dir_url(__FILE__) . "../images/placeholder.png"; ?>';
                        }

                        var steenbok_custom = foundItem.steenbok;
                        if (!steenbok_custom) {
                            steenbok_custom = '<?php echo plugin_dir_url(__FILE__) . "../images/placeholder.png"; ?>';
                        }

                        var waterman_custom = foundItem.waterman;
                        if (!waterman_custom) {
                            waterman_custom = '<?php echo plugin_dir_url(__FILE__) . "../images/placeholder.png"; ?>';
                        }

                        var vissen_custom = foundItem.vissen;
                        if (!vissen_custom) {
                            vissen_custom = '<?php echo plugin_dir_url(__FILE__) . "../images/placeholder.png"; ?>';
                        }
                    }

                    $('#pd_id').val('5')

                    var ram_image = '<?php echo plugin_dir_url( __FILE__ ) . '../images/horoscopes/ram.gif'; ?>';
                    var stier_image = '<?php echo plugin_dir_url( __FILE__ ) . '../images/horoscopes/stier.gif'; ?>';
                    var tweelingen_image = '<?php echo plugin_dir_url( __FILE__ ) . '../images/horoscopes/tweelingen.gif'; ?>';
                    var kreeft_image = '<?php echo plugin_dir_url( __FILE__ ) . '../images/horoscopes/kreeft.gif'; ?>';
                    var leeuw_image = '<?php echo plugin_dir_url( __FILE__ ) . '../images/horoscopes/leeuw.gif'; ?>';
                    var maagd_image = '<?php echo plugin_dir_url( __FILE__ ) . '../images/horoscopes/maagd.gif'; ?>';
                    var weegschaal_image = '<?php echo plugin_dir_url( __FILE__ ) . '../images/horoscopes/weegschaal.gif'; ?>';
                    var schorpioen_image = '<?php echo plugin_dir_url( __FILE__ ) . '../images/horoscopes/schorpioen.gif'; ?>';
                    var boogschutter_image = '<?php echo plugin_dir_url( __FILE__ ) . '../images/horoscopes/boogschutter.gif'; ?>';
                    var steenbok_image = '<?php echo plugin_dir_url( __FILE__ ) . '../images/horoscopes/steenbok.gif'; ?>';
                    var waterman_image = '<?php echo plugin_dir_url( __FILE__ ) . '../images/horoscopes/waterman.gif'; ?>';
                    var vissen_image = '<?php echo plugin_dir_url( __FILE__ ) . '../images/horoscopes/vissen.gif'; ?>';

                    // Update image sources based on the selected option
                    $('.ram_custom').attr('src', ram_custom);
                    $('.stier_custom').attr('src', stier_custom);
                    $('.tweelingen_custom').attr('src', tweelingen_custom);
                    $('.kreeft_custom').attr('src', kreeft_custom);
                    $('.leeuw_custom').attr('src', leeuw_custom);
                    $('.maagd_custom').attr('src', maagd_custom);
                    $('.weegschaal_custom').attr('src', weegschaal_custom);
                    $('.schorpioen_custom').attr('src', schorpioen_custom);
                    $('.boogschutter_custom').attr('src', boogschutter_custom);
                    $('.steenbok_custom').attr('src', steenbok_custom);
                    $('.waterman_custom').attr('src', waterman_custom);
                    $('.vissen_custom').attr('src', vissen_custom);
                }

                // Update image sources based on the selected option
                $('.ram_image').attr('src', ram_image);
                $('.stier_image').attr('src', stier_image);
                $('.tweelingen_image').attr('src', tweelingen_image);
                $('.kreeft_image').attr('src', kreeft_image);
                $('.leeuw_image').attr('src', leeuw_image);
                $('.maagd_image').attr('src', maagd_image);
                $('.weegschaal_image').attr('src', weegschaal_image);
                $('.schorpioen_image').attr('src', schorpioen_image);
                $('.boogschutter_image').attr('src', boogschutter_image);
                $('.steenbok_image').attr('src', steenbok_image);
                $('.waterman_image').attr('src', waterman_image);
                $('.vissen_image').attr('src', vissen_image);

            });
        });

        function saveit(){

            document.getElementById('savedsettings').style.display = 'block';
        }

        var cookie = '<?php echo esc_html($cookie); ?>';
        var user_id = '<?php echo esc_html($user_id); ?>';
        var email = '<?php echo esc_html($email); ?>';

        var $ = jQuery.noConflict();

        function savecustom(chinese){

            $('.spinner-border').show();
            $('.custom_save_text').hide();            

            var product_id = $('#current_id').val();

            if(chinese == 1){

                var selectedValue = $("#custom_image_selector_chinese").val();
            }else{

                var selectedValue = $("#custom_image_selector").val();
            }

            var version = $('#horoscope_version').val();
            
            jQuery.ajax({
                type: 'POST',
                url: ajaxurl,
                data: {
                    active: selectedValue,
                    token: cookie,
                    product_id: product_id,
                    version: version,
                    action: 'activate_customimages',
                },
                success: function(response) {

                    $('.saved_custom_images').show();
                    $('.spinner-border').hide();
                    $('.custom_save_text').show();

                    setTimeout(function() {
                        $('.saved_custom_images').hide();
                    }, 5000);
                }
            });
        }

        jQuery(document).ready(function() {   

            jQuery('#salestable').DataTable({
                "ajax": {
                    "url": "https://astromedia-business.nl/getsales",
                    "dataSrc": "data",
                    "type": "post",
                    "data": {
                            user_id: user_id,
                            email: email,
                            token: cookie,
                        }, 
                },
                lengthMenu: [5, 10, 20, 50, 100, 200, 500],
            });
        });
        
        jQuery.ajax({
            type: "post",
            crossDomain: true,
            data: {
                user_id: user_id,
                email: email,
                token: cookie,
            },
            url: "https://astromedia-business.nl/getpackages",
            success: function(packages) {

                function createPackageFeature(text) {
                    const feature = document.createElement("div");
                    feature.classList.add("package-feature");
                    feature.textContent = text;
                    return feature;
                }

                function generatePackageCards() {
                    packages.forEach(package => {
                        const packageBox = document.createElement("div");
                        packageBox.classList.add("col-lg-3");
                        packageBox.classList.add("col-12");
                        packageBox.id = "package-box-" + package.id;
                        packageBox.addEventListener('click', () => choosepackage(package.id));

                        // Create a new div that will contain all the elements of a package
                        const packageContentBox = document.createElement("div");
                        packageContentBox.classList.add("package-box");

                        const mostPopularText = document.createElement("div");
                        mostPopularText.classList.add("most-popular-text");
                        if (package.id === 2) {
                            mostPopularText.textContent = "Meest gekozen!";
                        } else {
                            mostPopularText.textContent = "\u00A0";
                        }
                        mostPopularText.style.textAlign = "center";
                        
                        const packageHeader = document.createElement("div");
                        packageHeader.classList.add("package-header");
                        packageHeader.appendChild(mostPopularText);

                        const packageNameBar = document.createElement("div");
                        packageNameBar.classList.add("package-name-bar");
                        packageNameBar.textContent = package.name;
                        packageNameBar.style.borderRadius = "5px";

                        const discountFigure = document.createElement("div");
                        discountFigure.classList.add("discount-figure");
                        if (package.id === 2) {
                            discountFigure.textContent = "€30,- korting";
                        } else if (package.id === 3) {
                            discountFigure.textContent = "€120,- korting";
                        } else if (package.id === 4) {
                            discountFigure.textContent = "€260,- korting";
                        } else {
                            discountFigure.textContent = "\u00A0";
                        }
                        discountFigure.style.textAlign = "center";
                        discountFigure.style.fontWeight = "bold";
                        discountFigure.style.fontSize = "small";

                        const packageImageContainer = document.createElement("div");
                        packageImageContainer.classList.add("package-image-container");

                        packageImageContainer.style.height = "100px";

                        packageHeader.appendChild(packageImageContainer);
                        packageHeader.appendChild(packageNameBar);
                        packageHeader.appendChild(discountFigure);

                        const packageInfo = document.createElement("div");
                        packageInfo.classList.add("package-info");
                        packageInfo.innerHTML = `
                            <div class="mt-5">Prijs: <b>&euro;${pricenotation_general(package.price)}</b></div>
                            <div>Korting: <b>${package.discount}%</b></div>
                            <div>Aantal dagen: <b>${package.duration}</b></div>
                        `;

                        const packageFeatures = document.createElement("div");

                        if(package.id == 1){
                            packageFeatures.appendChild(createPackageFeature("Daghoroscopen (gratis)"));
                            packageFeatures.appendChild(createPackageFeature("Tekstkleur instellen"));
                            packageFeatures.appendChild(createPackageFeature("Themakleur instellen"));
                            packageFeatures.appendChild(createPackageFeature("Tekstgrootte instellen"));
                            packageFeatures.appendChild(createPackageFeature("E-mail support"));
                        }else if(package.id == 2){
                            packageFeatures.appendChild(createPackageFeature("Daghoroscopen (gratis)"));
                            packageFeatures.appendChild(createPackageFeature("Tekstkleur instellen"));
                            packageFeatures.appendChild(createPackageFeature("Themakleur instellen"));
                            packageFeatures.appendChild(createPackageFeature("Tekstgrootte instellen"));
                            packageFeatures.appendChild(createPackageFeature("E-mail support"));
                            packageFeatures.appendChild(createPackageFeature("Korting"));
                        }else if(package.id == 3){
                            packageFeatures.appendChild(createPackageFeature("Daghoroscopen (gratis)"));
                            packageFeatures.appendChild(createPackageFeature("Tekstkleur instellen"));
                            packageFeatures.appendChild(createPackageFeature("Themakleur instellen"));
                            packageFeatures.appendChild(createPackageFeature("Tekstgrootte instellen"));
                            packageFeatures.appendChild(createPackageFeature("E-mail support"));
                            packageFeatures.appendChild(createPackageFeature("Extra Korting"));
                        }else if(package.id == 4){
                            packageFeatures.appendChild(createPackageFeature("Daghoroscopen (gratis)"));
                            packageFeatures.appendChild(createPackageFeature("Tekstkleur instellen"));
                            packageFeatures.appendChild(createPackageFeature("Themakleur instellen"));
                            packageFeatures.appendChild(createPackageFeature("Tekstgrootte instellen"));
                            packageFeatures.appendChild(createPackageFeature("Live e-mail support"));
                            packageFeatures.appendChild(createPackageFeature("Live 24-uur support"));
                            packageFeatures.appendChild(createPackageFeature("Extra + korting"));
                        }

                        var container = document.getElementById('premiumPane');

                        // Append all child elements to the packageContentBox instead of packageBox
                        packageContentBox.appendChild(packageHeader);
                        packageContentBox.appendChild(packageInfo);
                        packageContentBox.appendChild(packageFeatures);

                        // Now append the packageContentBox to the packageBox
                        packageBox.appendChild(packageContentBox);

                        var container = document.getElementById('premiumPane');
                        container.appendChild(packageBox);
                    });
                }

                function choosepackage(packageId) {
                    
                    // Call the server to get the payment URL
                    domain = window.location.hostname;

                    var package_id = packageId;

                    // Open the payment gateway in a new window
                    var popupWindow = window.open('', '_blank');

                    if(user_id != '' && cookie != '' && package_id != '' ){

                        jQuery.ajax({
                            type: "post",
                            crossDomain: true,
                            data: {
                                email: email,
                                token: cookie,
                                domain: domain,
                                user_id: user_id,
                                id: package_id,
                            },
                            url: "https://astromedia-business.nl/startpayment_premium_ajax",
                            success: function(response){

                                // Set the URL of the popup window after the response is received
                                popupWindow.location.href = response;
                                
                                // Attach an event listener to the popup window
                                window.addEventListener("message", function (event) {
                                    if (event.origin === "https://astromedia-business.nl") {
                                        // Handle the message from the popup window
                                        var type = event.data.type;
                                        var transaction_id = event.data.transactionId;
                                        
                                        if(type == 'CANCELLED'){
                                            popupWindow.close();
                                        }

                                        // Check for a flag to close the popup window
                                        if (event.data.transactionId) {
                                            popupWindow.close();
                                        }
                                    }
                                }); 
                            }
                        });
                    }else{

                        alert('Er is iets mis gegaan, excuses');
                    }
                }

                function pricenotation_general(price) {
                    // Replace this with your actual pricenotation_general function
                    return price;
                }

                // Call the generatePackageCards function to create the package cards
                generatePackageCards();
            }
        });

        function saveoptions(id){

            var text_color = document.getElementById('text_color_'+id).value;
            var theme_color = document.getElementById('theme_color_'+id).value;
            var font = document.getElementById('font_'+id).value;
            var fontsize = document.getElementById('fontsize_'+id).value;
            var defaulttext = document.getElementById('defaulttext_switch-shadow_'+id);
            var domain = window.location.hostname;

            if(defaulttext.checked) {
                var defaulttext_enabled = 1;
            } else {
                var defaulttext_enabled = 0;
            }

            jQuery.ajax({
                type: "post",
                crossDomain: true,
                data: {
                    user_id: user_id,
                    email: email,
                    token: cookie,
                    id: id,
                    domain: domain,
                    items: {defaulttext: defaulttext_enabled,text_color: text_color, theme_color: theme_color, font: font, fontsize: fontsize}
                }, 
                url: "https://astromedia-business.nl/saveoptions",
                success: function(response){
                    
                    document.getElementById('saved_'+id).style.display = 'block';
                }
            });
        }

        function activator(id){

            if(document.getElementById('switch-shadow_'+id).checked == true){

                var switcher = 1;
            }else{

                var switcher = 0;
            }

            jQuery.ajax({
                type: "post",
                crossDomain: true,
                data: {
                    user_id: user_id,
                    email: email,
                    token: cookie,
                    id: id,
                    switcher: switcher,
                    domain: window.location.hostname,
                }, 
                url: "https://astromedia-business.nl/activator",
                success: function(response){
                    
                    
                }
            });
        }
        

        function logout(){

            jQuery.ajax({
                type: 'POST',
                url: ajaxurl,
                data: {
                    action: 'logout_auto',
                },
                success: function(response) {
                }
            });

            document.cookie = "astro=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/midoneplugin/wp-admin;";
            document.cookie = "astro=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/wp-admin;";

            location.reload(); 
        }

        document.getElementById('wpwrap').style.backgroundColor = '#EDF9F9';

        function opentabcontent(evt, itemname, clickedButton, title) {
            // Hide all tab contents
            $('.tabcontent').hide();

            $('.menuitems').hide();            

            $('.tabButton').removeClass('active');

            $(clickedButton).addClass('active');

            // If the clicked item belongs to the 'individual_items' group
            if($('#individual_items #' + itemname + '_section').length) {
                // Show the main container
                $('#individual_items').show();

                // Hide all sections inside
                $('#individual_items .section').hide();

                $('#menuitem_title').html(title)

                // Show only the clicked section
                $('#' + itemname + '_section').show();
            } else {
                // For premium and profile, just show the main tab content
                $('#' + itemname).show();
            }

            // If there's any additional logic you want to run (like update_images)
            update_images(itemname);
        }

        function update_images(cityName){

            ram_custom = '<?php echo plugin_dir_url(__FILE__) . "../images/placeholder.png"; ?>';
            stier_custom = '<?php echo plugin_dir_url(__FILE__) . "../images/placeholder.png"; ?>';
            tweelingen_custom = '<?php echo plugin_dir_url(__FILE__) . "../images/placeholder.png"; ?>';
            kreeft_custom = '<?php echo plugin_dir_url(__FILE__) . "../images/placeholder.png"; ?>';
            leeuw_custom = '<?php echo plugin_dir_url(__FILE__) . "../images/placeholder.png"; ?>';
            maagd_custom = '<?php echo plugin_dir_url(__FILE__) . "../images/placeholder.png"; ?>';
            weegschaal_custom = '<?php echo plugin_dir_url(__FILE__) . "../images/placeholder.png"; ?>';
            schorpioen_custom = '<?php echo plugin_dir_url(__FILE__) . "../images/placeholder.png"; ?>';
            boogschutter_custom = '<?php echo plugin_dir_url(__FILE__) . "../images/placeholder.png"; ?>';
            steenbok_custom = '<?php echo plugin_dir_url(__FILE__) . "../images/placeholder.png"; ?>';
            waterman_custom = '<?php echo plugin_dir_url(__FILE__) . "../images/placeholder.png"; ?>';
            vissen_custom = '<?php echo plugin_dir_url(__FILE__) . "../images/placeholder.png"; ?>';

            var custom_images = <?php echo json_encode($zodiac_images); ?>;
                
            if(cityName == 'daghoroscoop'){

                var targetProductId = "1";
            }

            if(cityName == 'maandhoroscoop'){

                var targetProductId = "2";
            }

            if(cityName == 'relatiehoroscoop'){

                var targetProductId = "3";
            }

            if(cityName == 'geboortehoroscoop'){

                var targetProductId = "4";
            }
            
            if(cityName == 'jaarhoroscoop'){

                var targetProductId = "5";
            }

            if(cityName == 'liefdesjaarhoroscoop'){

                var targetProductId = "6";
            }

            if(cityName == 'chinesejaarhoroscoop'){

                var targetProductId = "7";
            }

            var foundItem = custom_images.find(function(item) {
                return item.product_id === targetProductId;
            });

            var active_status = 0;

            if(foundItem){

                active_status = foundItem.active;

                var ram_custom = foundItem.ram;
                if (!ram_custom) {
                    ram_custom = '<?php echo plugin_dir_url(__FILE__) . "../images/placeholder.png"; ?>';
                }

                var stier_custom = foundItem.stier;
                if (!stier_custom) {
                    stier_custom = '<?php echo plugin_dir_url(__FILE__) . "../images/placeholder.png"; ?>';
                }

                var tweelingen_custom = foundItem.tweelingen;
                if (!tweelingen_custom) {
                    tweelingen_custom = '<?php echo plugin_dir_url(__FILE__) . "../images/placeholder.png"; ?>';
                }
                var kreeft_custom = foundItem.kreeft;
                if (!kreeft_custom) {
                    kreeft_custom = '<?php echo plugin_dir_url(__FILE__) . "../images/placeholder.png"; ?>';
                }
                var leeuw_custom = foundItem.leeuw;
                if (!leeuw_custom) {
                    leeuw_custom = '<?php echo plugin_dir_url(__FILE__) . "../images/placeholder.png"; ?>';
                }
                var maagd_custom = foundItem.maagd;
                if (!maagd_custom) {
                    maagd_custom = '<?php echo plugin_dir_url(__FILE__) . "../images/placeholder.png"; ?>';
                }

                var weegschaal_custom = foundItem.weegschaal;
                if (!weegschaal_custom) {
                    weegschaal_custom = '<?php echo plugin_dir_url(__FILE__) . "../images/placeholder.png"; ?>';
                }

                var schorpioen_custom = foundItem.schorpioen;
                if (!schorpioen_custom) {
                    schorpioen_custom = '<?php echo plugin_dir_url(__FILE__) . "../images/placeholder.png"; ?>';
                }
                var boogschutter_custom = foundItem.boogschutter;
                if (!boogschutter_custom) {
                    boogschutter_custom = '<?php echo plugin_dir_url(__FILE__) . "../images/placeholder.png"; ?>';
                }

                var steenbok_custom = foundItem.steenbok;
                if (!steenbok_custom) {
                    steenbok_custom = '<?php echo plugin_dir_url(__FILE__) . "../images/placeholder.png"; ?>';
                }
                var waterman_custom = foundItem.waterman;
                if (!waterman_custom) {
                    waterman_custom = '<?php echo plugin_dir_url(__FILE__) . "../images/placeholder.png"; ?>';
                }
                var vissen_custom = foundItem.vissen;
                if (!vissen_custom) {
                    vissen_custom = '<?php echo plugin_dir_url(__FILE__) . "../images/placeholder.png"; ?>';
                }

            }

            // regular starsigns
            var signs1 = [
                'ram', 'stier', 'tweelingen', 'kreeft', 'leeuw', 'maagd', 
                'weegschaal', 'schorpioen', 'boogschutter', 'steenbok', 'waterman', 'vissen',
            ];

            let images1 = {};
            signs1.forEach(sign => {
                images1[sign] = `<?php echo plugin_dir_url(__FILE__) . '../images/horoscopes/${sign}.gif'; ?>`;
                $(`.${sign}_custom`).attr('src', images1[sign]);
                $(`.${sign}_image`).attr('src', images1[sign]);
            });

            //chinese starsigns
            var signs2 = [
                'rat', 'os', 'tijger', 'konijn', 'draak', 'slang', 
                'paard', 'geit', 'aap', 'haan', 'hond', 'varken'
            ];

            let images2 = {};
            signs2.forEach(sign => {
                images2[sign] = `<?php echo plugin_dir_url(__FILE__) . '../images/horoscopes/${sign}.png'; ?>`;
                $(`.${sign}_custom`).attr('src', images2[sign]);
                $(`.${sign}_image`).attr('src', images2[sign]);
            });
        }

        jQuery(document).ready(function() {
            jQuery(document).on('click', function(event) {
                if (event.target.id === 'openpremium') {
                    // Your code here
                    opentabcontent(event, 'premium', this, 'Premium')
                }
            });
        });

        function openpremium2(){

            opentabcontent(event, 'premium', this, 'Premium')
        }

        function openmedia(attribute){
            // Image upload button click event

            product_id = $('#current_id').val();
            
            var customUploader = wp.media({
                title: 'Select Image',
                button: {
                    text: 'Upload Image'
                },
                multiple: false // Allow only one image to be selected
            })
            .on('select', function() {
                var attachment = customUploader.state().get('selection').first().toJSON();
                
                // Display the image preview
                $('.'+attribute+'_custom').attr("src",attachment.url);

                console.log(attachment.url, attribute, product_id)

                jQuery.ajax({
                    type: 'POST',
                    url: ajaxurl,
                    data: {
                        attribute: attribute,
                        url: attachment.url,                
                        token: cookie,
                        product_id: product_id,
                        action: 'update_custom_images',
                    },
                    success: function(response) {

                        
                    }
                });
                
                // Set the selected image ID
                $('#image-id').val(attachment.id);
            })
            .open();
        };

        function switchcustomimages(){

            var switchdfgh = $('#custom_image_selector').val();

            if(switchdfgh == 1){

                $('#horoscopen_default_images_box').hide();
                $('#horoscopen_custom_images_box').show();

            }else{

                $('#horoscopen_default_images_box').show();
                $('#horoscopen_custom_images_box').hide();
            }
        }


        function switchcustomimages_chinese(){

            var switchdfgh = $('#custom_image_selector_chinese').val();

            if(switchdfgh == 1){

                $('#horoscopen_default_images_box_chinese').hide();
                $('#horoscopen_custom_images_box_chinese').show();

            }else{

                $('#horoscopen_default_images_box_chinese').show();
                $('#horoscopen_custom_images_box_chinese').hide();
            }
        }

        function start_trial(){

            jQuery.ajax({
                type: "post",
                crossDomain: true,
                data: {
                    user_id: user_id,
                    email: email,
                    token: cookie,
                    domain: window.location.hostname,
                }, 
                url: "https://astromedia-business.nl/api/endpoint/v1/starttrial",
                success: function(response){
                    
                    location.reload();
                }
            });
        }

        
   </script>

   <?php

}
?>