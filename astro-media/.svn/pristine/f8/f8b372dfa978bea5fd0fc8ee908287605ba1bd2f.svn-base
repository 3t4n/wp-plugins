
<?php

function partnercomparisonhoroscope(){

    require_once(dirname(__FILE__) . '/../../midone.php');
    
    ob_start();

    global $wpdb;  

    $table_name = $wpdb->prefix . 'astromedia';

    $token = $wpdb->get_results("SELECT token FROM $table_name WHERE id='1'");
    $token = $token[0]->token;

    $email = $wpdb->get_results("SELECT email FROM $table_name WHERE id='1'");
    $email = $email[0]->email;

    global $wpdb;
    $table_name = $wpdb->prefix . 'customimages'; // Replace 'your_table_name' with the actual table name
    $product_id_to_fetch = 24; // Fetch images for product_id 5

    // Prepare and execute the query with a WHERE clause to filter by product_id
    $zodiac_images = $wpdb->get_results(
        $wpdb->prepare("SELECT * FROM $table_name WHERE token = %s AND product_id = %s", $token, $product_id_to_fetch)
    );  

    $product_details = get_product_details(24);
    
    $active = 0;

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
            $active = $image->active;
            $version = $image->vers;
        }
    }
?>
    <style>

        @media (max-width: 767px) {
            #partnercomparison_primescreen .col-lg-2 {
                flex-basis: 50%;
                max-width: 50%;
            }
        }

    </style>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <input type="hidden" id="getimagesfolderforthisplugin" value="<?php echo plugin_dir_url( __FILE__ ) . '../../images/horoscopes/'; ?>">

        <div class="container mb-5 mt-5" style="width:100%;padding:0" id="partnercomparisoncontainer" style="display:none">
            <div class="row" id="partnercomparison_maincontainer">
                <div class="col-md-12 defaulttextcontainer_partnercomparisonhoroscope">
                    <div style="font-size: 35px;" class="headersize_partnercomparisonhoroscope theme_color_partnercomparisonhoroscope" id="headtext"><strong><?php echo $product_details['consumer_title']; ?></strong></div>
                    <div class="text_color_partnercomparisonhoroscope mt-3 textsize_partnercomparisonhoroscope"><?php echo $product_details['consumer_text1']; ?></div>                    
                    <div class="text_color_partnercomparisonhoroscope mt-3 textsize_partnercomparisonhoroscope"><?php echo $product_details['consumer_text2']; ?></div>     
                    <hr style="background-color:black">
                </div>
                <div class="col-md-12" id="partnercomparison_primescreen">
                    <div class="">
                    <?php
                        
                        if($version == 2){
                        ?>
                            <input type="hidden" id="getimagesfolderforthisplugin" value="<?php echo plugin_dir_url( __FILE__ ) . '../../images/horoscopesv2/'; ?>">
                            <div class="row" id="partner1box">
                                <div class=" mt-4 theme_color_partnercomparisonhoroscope font">Kies het sterrenbeeld van partner 1:</div>
                                <?php
                                
                                    $zodiacs = [
                                        'ram' => $ram,
                                        'stier' => $stier,
                                        'tweelingen' => $tweelingen,
                                        'kreeft' => $kreeft,
                                        'leeuw' => $leeuw,
                                        'maagd' => $maagd,
                                        'weegschaal' => $weegschaal,
                                        'schorpioen' => $schorpioen,
                                        'boogschutter' => $boogschutter,
                                        'steenbok' => $steenbok,
                                        'waterman' => $waterman,
                                        'vissen' => $vissen,
                                    ];

                                    $zodiac_dates = [
                                        'ram' => '21 Mrt - 20 Apr',
                                        'stier' => '21 Apr - 21 Mei',
                                        'tweelingen' => '22 Mei - 21 Juni',
                                        'kreeft' => '22 Juni - 21 Juli',
                                        'leeuw' => '22 Juli - 22 Aug',
                                        'maagd' => '23 Aug - 23 Sep',
                                        'weegschaal' => '24 Sep - 23 Okt',
                                        'schorpioen' => '24 Okt - 22 Nov',
                                        'boogschutter' => '23 Nov - 21 Dec',
                                        'steenbok' => '22 Dec - 20 Jan',
                                        'waterman' => '21 Jan - 18 Feb',
                                        'vissen' => '19 Feb - 20 Mrt',
                                    ];
        
                                    // Loop through each zodiac and create the HTML
                                    foreach ($zodiacs as $zodiac_name => $image_path) {

                                        $zodiac_date = isset($zodiac_dates[$zodiac_name]) ? $zodiac_dates[$zodiac_name] : 'Unknown Date';

                                        echo '<div class="col-6 col-lg-3 mt-3">';
                                        echo '    <div class="card shadower background_gradient_partnercomparisonhoroscope" style="cursor:pointer" onclick="selectpartner1(\'' . $zodiac_name . '\')">';
                                        echo '        <div class="text-center" style="margin: 10px 0 0 0; padding: 0;">';
        
                                        if ($active == 0) {
                                            // Default image if the zodiac is not active
                                            echo '            <img style="margin-top: 10px;" src="' . plugin_dir_url( __FILE__ ) . '../../images/horoscopesv2/'.$zodiac_name.'.png" alt="' . ucfirst($zodiac_name) . '">';
                                        } else {
                                            // Specific image for the active zodiac
                                            echo '            <img style="margin-top: 10px;" src="' . $image_path . '.png" alt="' . ucfirst($zodiac_name) . '">';
                                        }
        
                                        echo '              <div style="font-weight:bold" class="textsize_partnercomparisonhoroscope font text_color_partnercomparisonhoroscope">' . ucfirst($zodiac_name) . '</div>';
                                        echo '            <div style="font-weight:bold" class="textsize_partnercomparisonhoroscope font text_color_partnercomparisonhoroscope">' . ucfirst($zodiac_date) . '</div>';
                                        echo '        </div>';
                                        echo '    </div>';
                                        echo '</div>';
                                    }
                                    
                                ?>
                            </div>
                            <div class="row" id="partner2box" style="display:none">
                                <div class=" mt-4 theme_color_partnercomparisonhoroscope font">Kies het sterrenbeeld van partner 2:</div>
                                <?php
                                
                                $zodiacs = [
                                    'ram' => $ram,
                                    'stier' => $stier,
                                    'tweelingen' => $tweelingen,
                                    'kreeft' => $kreeft,
                                    'leeuw' => $leeuw,
                                    'maagd' => $maagd,
                                    'weegschaal' => $weegschaal,
                                    'schorpioen' => $schorpioen,
                                    'boogschutter' => $boogschutter,
                                    'steenbok' => $steenbok,
                                    'waterman' => $waterman,
                                    'vissen' => $vissen,
                                ];

                                $zodiac_dates = [
                                    'ram' => '21 Mrt - 20 Apr',
                                    'stier' => '21 Apr - 21 Mei',
                                    'tweelingen' => '22 Mei - 21 Juni',
                                    'kreeft' => '22 Juni - 21 Juli',
                                    'leeuw' => '22 Juli - 22 Aug',
                                    'maagd' => '23 Aug - 23 Sep',
                                    'weegschaal' => '24 Sep - 23 Okt',
                                    'schorpioen' => '24 Okt - 22 Nov',
                                    'boogschutter' => '23 Nov - 21 Dec',
                                    'steenbok' => '22 Dec - 20 Jan',
                                    'waterman' => '21 Jan - 18 Feb',
                                    'vissen' => '19 Feb - 20 Mrt',
                                ];
    
                                // Loop through each zodiac and create the HTML
                                foreach ($zodiacs as $zodiac_name => $image_path) {

                                    $zodiac_date = isset($zodiac_dates[$zodiac_name]) ? $zodiac_dates[$zodiac_name] : 'Unknown Date';

                                    echo '<div class="col-6 col-lg-3 mt-3">';
                                    echo '    <div class="card shadower background_gradient_partnercomparisonhoroscope" style="cursor:pointer" onclick="selectpartner2(\'' . $zodiac_name . '\')">';
                                    echo '        <div class="text-center" style="margin: 10px 0 0 0; padding: 0;">';
    
                                    if ($active == 0) {
                                        // Default image if the zodiac is not active
                                        echo '            <img style="margin-top: 10px;" src="' . plugin_dir_url( __FILE__ ) . '../../images/horoscopesv2/'.$zodiac_name.'.png" alt="' . ucfirst($zodiac_name) . '">';
                                    } else {
                                        // Specific image for the active zodiac
                                        echo '            <img style="margin-top: 10px;" src="' . $image_path . '.png" alt="' . ucfirst($zodiac_name) . '">';
                                    }
    
                                    echo '              <div style="font-weight:bold" class="textsize_partnercomparisonhoroscope font text_color_partnercomparisonhoroscope">' . ucfirst($zodiac_name) . '</div>';
                                    echo '            <div style="font-weight:bold" class="textsize_partnercomparisonhoroscope font text_color_partnercomparisonhoroscope">' . ucfirst($zodiac_date) . '</div>';
                                    echo '        </div>';
                                    echo '    </div>';
                                    echo '</div>';
                                }
                                
                            ?>
                            </div>

                        <?php 
                        }elseif($version == 1){
                        ?>
                            <input type="hidden" id="getimagesfolderforthisplugin" value="<?php echo plugin_dir_url( __FILE__ ) . '../../images/horoscopes/'; ?>">
                            <div class="row" id="partner1box">
                                <div class=" mt-4 theme_color_partnercomparisonhoroscope font">Kies het sterrenbeeld van partner 1:</div>
                                <?php
                                
                                    $zodiacs = [
                                        'ram' => $ram,
                                        'stier' => $stier,
                                        'tweelingen' => $tweelingen,
                                        'kreeft' => $kreeft,
                                        'leeuw' => $leeuw,
                                        'maagd' => $maagd,
                                        'weegschaal' => $weegschaal,
                                        'schorpioen' => $schorpioen,
                                        'boogschutter' => $boogschutter,
                                        'steenbok' => $steenbok,
                                        'waterman' => $waterman,
                                        'vissen' => $vissen,
                                    ];

                                    $zodiac_dates = [
                                        'ram' => '21 Mrt - 20 Apr',
                                        'stier' => '21 Apr - 21 Mei',
                                        'tweelingen' => '22 Mei - 21 Juni',
                                        'kreeft' => '22 Juni - 21 Juli',
                                        'leeuw' => '22 Juli - 22 Aug',
                                        'maagd' => '23 Aug - 23 Sep',
                                        'weegschaal' => '24 Sep - 23 Okt',
                                        'schorpioen' => '24 Okt - 22 Nov',
                                        'boogschutter' => '23 Nov - 21 Dec',
                                        'steenbok' => '22 Dec - 20 Jan',
                                        'waterman' => '21 Jan - 18 Feb',
                                        'vissen' => '19 Feb - 20 Mrt',
                                    ];
        
                                    // Loop through each zodiac and create the HTML
                                    foreach ($zodiacs as $zodiac_name => $image_path) {

                                        $zodiac_date = isset($zodiac_dates[$zodiac_name]) ? $zodiac_dates[$zodiac_name] : 'Unknown Date';

                                        echo '<div class="col-6 col-lg-3 mt-3">';
                                        echo '    <div class="card shadower background_gradient_partnercomparisonhoroscope" style="cursor:pointer" onclick="selectpartner1(\'' . $zodiac_name . '\')">';
                                        echo '        <div class="text-center" style="margin: 10px 0 0 0; padding: 0;">';
        
                                        if ($active == 0) {
                                            // Default image if the zodiac is not active
                                            echo '            <img style="margin-top: 10px;" src="' . plugin_dir_url( __FILE__ ) . '../../images/horoscopes/'.$zodiac_name.'.gif" alt="' . ucfirst($zodiac_name) . '">';
                                        } else {
                                            // Specific image for the active zodiac
                                            echo '            <img style="margin-top: 10px;" src="' . $image_path . '.png" alt="' . ucfirst($zodiac_name) . '">';
                                        }
        
                                        echo '              <div style="font-weight:bold" class="textsize_partnercomparisonhoroscope font text_color_partnercomparisonhoroscope">' . ucfirst($zodiac_name) . '</div>';
                                        echo '            <div style="font-weight:bold" class="textsize_partnercomparisonhoroscope font text_color_partnercomparisonhoroscope">' . ucfirst($zodiac_date) . '</div>';
                                        echo '        </div>';
                                        echo '    </div>';
                                        echo '</div>';
                                    }
                                    
                                ?>
                            </div>
                            <div class="row" id="partner2box" style="display:none">
                                <div class=" mt-4 theme_color_partnercomparisonhoroscope font">Kies het sterrenbeeld van partner 2:</div>
                                <?php
                                
                                $zodiacs = [
                                    'ram' => $ram,
                                    'stier' => $stier,
                                    'tweelingen' => $tweelingen,
                                    'kreeft' => $kreeft,
                                    'leeuw' => $leeuw,
                                    'maagd' => $maagd,
                                    'weegschaal' => $weegschaal,
                                    'schorpioen' => $schorpioen,
                                    'boogschutter' => $boogschutter,
                                    'steenbok' => $steenbok,
                                    'waterman' => $waterman,
                                    'vissen' => $vissen,
                                ];

                                $zodiac_dates = [
                                    'ram' => '21 Mrt - 20 Apr',
                                    'stier' => '21 Apr - 21 Mei',
                                    'tweelingen' => '22 Mei - 21 Juni',
                                    'kreeft' => '22 Juni - 21 Juli',
                                    'leeuw' => '22 Juli - 22 Aug',
                                    'maagd' => '23 Aug - 23 Sep',
                                    'weegschaal' => '24 Sep - 23 Okt',
                                    'schorpioen' => '24 Okt - 22 Nov',
                                    'boogschutter' => '23 Nov - 21 Dec',
                                    'steenbok' => '22 Dec - 20 Jan',
                                    'waterman' => '21 Jan - 18 Feb',
                                    'vissen' => '19 Feb - 20 Mrt',
                                ];
    
                                // Loop through each zodiac and create the HTML
                                foreach ($zodiacs as $zodiac_name => $image_path) {

                                    $zodiac_date = isset($zodiac_dates[$zodiac_name]) ? $zodiac_dates[$zodiac_name] : 'Unknown Date';

                                    echo '<div class="col-6 col-lg-3 mt-3">';
                                    echo '    <div class="card shadower background_gradient_partnercomparisonhoroscope" style="cursor:pointer" onclick="selectpartner2(\'' . $zodiac_name . '\')">';
                                    echo '        <div class="text-center" style="margin: 10px 0 0 0; padding: 0;">';
    
                                    if ($active == 0) {
                                        // Default image if the zodiac is not active
                                        echo '            <img style="margin-top: 10px;" src="' . plugin_dir_url( __FILE__ ) . '../../images/horoscopes/'.$zodiac_name.'.gif" alt="' . ucfirst($zodiac_name) . '">';
                                    } else {
                                        // Specific image for the active zodiac
                                        echo '            <img style="margin-top: 10px;" src="' . $image_path . '.png" alt="' . ucfirst($zodiac_name) . '">';
                                    }
    
                                    echo '              <div style="font-weight:bold" class="textsize_partnercomparisonhoroscope font text_color_partnercomparisonhoroscope">' . ucfirst($zodiac_name) . '</div>';
                                    echo '            <div style="font-weight:bold" class="textsize_partnercomparisonhoroscope font text_color_partnercomparisonhoroscope">' . ucfirst($zodiac_date) . '</div>';
                                    echo '        </div>';
                                    echo '    </div>';
                                    echo '</div>';
                                }
                                
                            ?>
                            </div>

                        <?php 
                        }
                        ?>
                        </div>
                    </div>
                </div>
            </div>

            <div id="partnercomparisonhoroscope_box" style="max-height:900px;overflow-y:auto;display:none;border-radius:10px" class="row">
                <div style="border-radius:10px;">
                    <div class="theme_color_partnercomparisonhoroscope text-center headersize_partnercomparisonhoroscope mt-2" style="font-size:25px;!important">Je partnervergelijking is klaar!</div>
                    <div class="col-md-6 offset-4 textsize_partnercomparisonhoroscope text_color_partnercomparisonhoroscope mt-3">Bekijk deze nu via onderstaande knop:</div>
                    <div class="row">
                        <div class="col-md-10 text-end mt-3">
                            <button id="resultbutton_partnercomparisonhoroscope" class="textsize_partnercomparisonhoroscope font btn btn-outline text_color_partnercomparisonhoroscope" style="width:80%;">
                                <span class="textsize_partnercomparisonhoroscope" style="color:white!important;">BEKIJK DE PARTNERVERGELIJKING</span>
                            </button>
                        </div> 
                        <div class="col-md-2 mt-3">
                            <button type="button" onclick="location.reload();" class="btn btn-outline-dark" style="width:50%">
                            <span class="textsize_partnercomparisonhoroscope"><i class="fa-solid fa-rotate-right fa2x"></i></span>
                            </button>
                        </div>                    
                    </div>
                </div>
            </div>
        </div>

        <input type="hidden" id="partner1sign">

        <script>

            jQuery(document).ready(function() {

                var token = '<?php echo esc_js(esc_html($token)); ?>';

                getsettings(
                    jQuery, 
                    token,
                    24, 
                    'partnercomparisonhoroscope', 
                    'partnercomparisoncontainer', 
                    'font_partnercomparison', 
                );
            });

            function selectpartner1(attribute) {
                jQuery('#partner1sign').val(attribute);

                jQuery('#partner1box').fadeOut('slow', function() {
                    jQuery('#partner2box').fadeIn('slow');
                });
            }

            function selectpartner2(attribute){

                var token = '<?php echo esc_js(esc_html($token)); ?>';
                var email = '<?php echo esc_js(esc_html($email)); ?>';

                var attribute = jQuery('#partner1sign').val() + ',' + attribute;

                // Call the server to get the payment URL
                myService().getUrl().then(function(url) {
                    // Open the payment gateway in a new window
                    //var popupWindow = window.open('', '_blank', 'width=800,height=600');
                    var paymentWindow = window.open('', '_blank');

                    var host = window.location.href;
                    var returlurl = 'https://astromedia-business.nl/return?t=' + token + '&attr=' + attribute + '&host=' + host + '&pid=' + 24;

                    jQuery.ajax({
                        type: "post",
                        crossDomain: true,
                        data: {
                            email: email,
                            token: token,
                            host: host,
                            attribute: attribute,
                            returlurl: returlurl,
                            id: 24,
                        },
                        url: 'https://astromedia-business.nl/startpayment',
                        success: function(response){
                            if(response.slice(0,6) == '000000'){
                                // Set the URL of the popup window after the response is received
                                paymentWindow.location.href = response.split('|')[1];

                            } else {
                                alert('Er is iets mis gegaan, excuses');
                            }
                        }
                    });
                });
            }

            function reset_horoscope(){

                jQuery('#partnercomparison_maincontainer').show();
                jQuery('#partnercomparisonhoroscope_box').hide();
                jQuery('#partnercomparison_maincontainer').show();
                jQuery('#partner1box').show();
                jQuery('#partner2box').hide();
                
            }

        </script>


<?php
        // return the buffer contents and delete
        return ob_get_clean();
    }    

    add_shortcode('astro_partner_comparison', 'partnercomparisonhoroscope');
?>