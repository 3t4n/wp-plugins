
<?php

function lenormand_succeslegging(){

    require_once(dirname(__FILE__) . '/../midone.php');
    
    ob_start();

    global $wpdb;  

    $table_name = $wpdb->prefix . 'astromedia';

    $token = $wpdb->get_results("SELECT token FROM $table_name WHERE id='1'");
    $token = $token[0]->token;

    $email = $wpdb->get_results("SELECT email FROM $table_name WHERE id='1'");
    $email = $email[0]->email;
?>
    <style>

        @media (max-width: 767px) {
            #month_primescreen .col-lg-2 {
                flex-basis: 50%;
                max-width: 50%;
            }
        }
        
    </style>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <input type="hidden" id="getimagesfolderforthisplugin" value="<?php echo plugin_dir_url( __FILE__ ) . '../images/horoscopes/'; ?>">

        <?php

            global $wpdb;
            $table_name = $wpdb->prefix . 'customimages'; // Replace 'your_table_name' with the actual table name
            $product_id_to_fetch = 2; // Fetch images for product_id 6

            // Prepare and execute the query with a WHERE clause to filter by product_id
            $zodiac_images = $wpdb->get_results(
                $wpdb->prepare("SELECT * FROM $table_name WHERE token = %s AND product_id = %s", $token, $product_id_to_fetch)
            );   

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
                }
            }
        ?>

        <div class="container mb-5 mt-5" style="width:100%;padding:0" id="tarot_relatieleggingcontainer">
            <div class="row" id="tarot_relatielegging_maincontainer">
                <div class="col-md-12 defaulttextcontainer_monthhoroscope">
                    <div style="font-size: 35px;" class="headersize_tarot_relatielegging theme_color_tarot_relatielegging" id="headtext"><strong>Maandhoroscoop van <?php readfile("https://diensten-s.astro-media.nl/periode/maand.txt"); ?></strong></div>
                    <div class="text_color_monthhoroscope mt-3 textsize_monthhoroscope">Hier vind je je maandhoroscoop voor alle dierenriemtekens. Klik hieronder op jouw teken en lees wat <span class="theme_color_tarot_relatielegging textsize_monthhoroscope" style="font-weight:bold">deze dag</span> je gaat brengen. Misschien wel veel liefde of veel geluk? Als je iedere dag je horoscoop leest voordat je aan de dag gaat beginnen weet je een beetje wat jou te wachten staat.</div>
                    <div style="display:none" class="text_color_monthhoroscope mt-3 textsize_monthhoroscope">Wil je meer weten wat deze dag in petto heeft dan kan je <span style="color: #b0278c;font-weight:bold"><a href="">de uitgebreide daglegging</a></span> raadplegen. Ook een <span style="color: #b0278c;font-weight:bold"><a href="">weeklegging</a></span> is mogelijk. Je krijgt dan inzicht in wat iedere dag in de komende week gaat brengen. </div>
                    <hr style="background-color:black">
                </div>
                <div class="col-md-12" id="month_primescreen">
                    <div class="row">

                        <div onclick="window.parent.open_second('<?php echo $token;?>','month','ram', <?php echo $product_id_to_fetch; ?>,  <?php echo $active; ?>)"  style="min-width:190px;" class="col-6 col-lg-3 mt-4 text-center horoclass">
                        <?php 
                            if($active == 0){    
                        ?>
                            <img style="height:70%;width:70%;margin-top: 10px;" src="<?php echo plugin_dir_url( __FILE__ ) . '../images/horoscopes/ram.gif'; ?>" alt="ram">
                        <?php
                            }else{                                  
                        ?>  
                            <img style="height:70%;width:70%;margin-top: 10px;" src="<?php echo $ram ?>" alt="">
                        <?php 
                            } 
                        ?> 
                            <figcaption class="textsize_monthhoroscope theme_color_tarot_relatielegging caption-12px" ><strong>Ram</strong><br>
                                <span class="textsize_monthhoroscope" style="color:black">21 Mrt - 20 Apr</span>
                            </figcaption>
                        </div>

                        <div onclick="window.parent.open_second('<?php echo $token;?>','month','stier', <?php echo $product_id_to_fetch; ?>,  <?php echo $active; ?>)"  style="min-width:190px;" class="col-6 col-lg-3 mt-4 text-center horoclass">
                        <?php 
                            if($active == 0){    
                        ?>
                            <img style="height:70%;width:70%;margin-top: 10px;" src="<?php echo plugin_dir_url( __FILE__ ) . '../images/horoscopes/stier.gif'; ?>" alt="stier">
                        <?php
                            }else{                                  
                        ?>  
                            <img style="height:70%;width:70%;margin-top: 10px;" src="<?php echo $stier ?>" alt="">
                        <?php 
                            } 
                        ?> 
                            <figcaption class="textsize_monthhoroscope theme_color_tarot_relatielegging caption-12px" ><strong>Stier</strong><br>
                                <span class="textsize_monthhoroscope" style="color:black">21 Apr - 21 Mei</span>
                            </figcaption>
                        </div>

                        <div onclick="window.parent.open_second('<?php echo $token;?>','month','tweelingen', <?php echo $product_id_to_fetch; ?>,  <?php echo $active; ?>)"  style="min-width:190px;" class="col-6 col-lg-3 mt-4 text-center horoclass">
                        <?php 
                            if($active == 0){    
                        ?>
                            <img style="height:70%;width:70%;margin-top: 10px;" src="<?php echo plugin_dir_url( __FILE__ ) . '../images/horoscopes/tweelingen.gif'; ?>" alt="tweelingen">
                        <?php
                            }else{                                  
                        ?>  
                            <img style="height:70%;width:70%;margin-top: 10px;" src="<?php echo $tweelingen ?>" alt="">
                        <?php 
                            } 
                        ?> 
                            <figcaption class="textsize_monthhoroscope theme_color_tarot_relatielegging caption-12px" ><strong>Tweelingen</strong><br>
                                <span class="textsize_monthhoroscope" style="color:black">22 Mei - 21 Juni</span>
                            </figcaption>
                        </div>

                        <div onclick="window.parent.open_second('<?php echo $token;?>','month','kreeft', <?php echo $product_id_to_fetch; ?>,  <?php echo $active; ?>)"  style="min-width:190px;" class="col-6 col-lg-3 mt-4 text-center horoclass">
                        <?php 
                            if($active == 0){    
                        ?>
                            <img style="height:70%;width:70%;margin-top: 10px;" src="<?php echo plugin_dir_url( __FILE__ ) . '../images/horoscopes/kreeft.gif'; ?>" alt="kreeft">
                        <?php
                            }else{                                  
                        ?>  
                            <img style="height:70%;width:70%;margin-top: 10px;" src="<?php echo $kreeft ?>" alt="">
                        <?php 
                            } 
                        ?> 
                            <figcaption class="textsize_monthhoroscope theme_color_tarot_relatielegging caption-12px" ><strong>Kreeft</strong><br>
                                <span class="textsize_monthhoroscope" style="color:black">22 Juni - 21 Juli</span>
                            </figcaption>
                        </div>

                        <div onclick="window.parent.open_second('<?php echo $token;?>','month','leeuw', <?php echo $product_id_to_fetch; ?>,  <?php echo $active; ?>)"  style="min-width:190px;" class="col-6 col-lg-3 mt-4 text-center horoclass">
                        <?php 
                            if($active == 0){    
                        ?>
                            <img style="height:70%;width:70%;margin-top: 10px;" src="<?php echo plugin_dir_url( __FILE__ ) . '../images/horoscopes/leeuw.gif'; ?>" alt="leeuw">
                        <?php
                            }else{                                  
                        ?>  
                            <img style="height:70%;width:70%;margin-top: 10px;" src="<?php echo $leeuw ?>" alt="">
                        <?php 
                            } 
                        ?> 
                            <figcaption class="textsize_monthhoroscope theme_color_tarot_relatielegging caption-12px" ><strong>Leeuw</strong><br>
                                <span class="textsize_monthhoroscope" style="color:black">22 Juli - 22 Aug</span>
                            </figcaption>
                        </div>

                        <div onclick="window.parent.open_second('<?php echo $token;?>','month','maagd', <?php echo $product_id_to_fetch; ?>,  <?php echo $active; ?>)"  style="min-width:190px;" class="col-6 col-lg-3 mt-4 text-center horoclass">
                        <?php 
                            if($active == 0){    
                        ?>
                            <img style="height:70%;width:70%;margin-top: 10px;" src="<?php echo plugin_dir_url( __FILE__ ) . '../images/horoscopes/maagd.gif'; ?>" alt="maagd">
                        <?php
                            }else{                                  
                        ?>  
                            <img style="height:70%;width:70%;margin-top: 10px;" src="<?php echo $maagd ?>" alt="">
                        <?php 
                            } 
                        ?> 
                            <figcaption class="textsize_monthhoroscope theme_color_tarot_relatielegging caption-12px" ><strong>Maagd</strong><br>
                                <span class="textsize_monthhoroscope" style="color:black">23 Aug - 23 Sep</span>
                            </figcaption>
                        </div>

                        <div onclick="window.parent.open_second('<?php echo $token;?>','month','weegschaal', <?php echo $product_id_to_fetch; ?>,  <?php echo $active; ?>)"  style="min-width:190px;" class="col-6 col-lg-3 mt-4 text-center horoclass">
                        <?php 
                            if($active == 0){    
                        ?>
                            <img style="height:70%;width:70%;margin-top: 10px;" src="<?php echo plugin_dir_url( __FILE__ ) . '../images/horoscopes/weegschaal.gif'; ?>" alt="weegschaal">
                        <?php
                            }else{                                  
                        ?>  
                            <img style="height:70%;width:70%;margin-top: 10px;" src="<?php echo $weegschaal ?>" alt="">
                        <?php 
                            } 
                        ?>
                            <figcaption class="textsize_monthhoroscope theme_color_tarot_relatielegging caption-12px" ><strong>Weegschaal</strong><br>
                                <span class="textsize_monthhoroscope" style="color:black">24 Sep - 23 Okt</span>
                            </figcaption>
                        </div>

                        <div onclick="window.parent.open_second('<?php echo $token;?>','month','schorpioen', <?php echo $product_id_to_fetch; ?>,  <?php echo $active; ?>)"  style="min-width:190px;" class="col-6 col-lg-3 mt-4 text-center horoclass">
                        <?php 
                            if($active == 0){    
                        ?>
                            <img style="height:70%;width:70%;margin-top: 10px;" src="<?php echo plugin_dir_url( __FILE__ ) . '../images/horoscopes/schorpioen.gif'; ?>" alt="schorpioen">
                        <?php
                            }else{                                  
                        ?>  
                            <img style="height:70%;width:70%;margin-top: 10px;" src="<?php echo $schorpioen ?>" alt="">
                        <?php 
                            } 
                        ?>
                            <figcaption class="textsize_monthhoroscope theme_color_tarot_relatielegging caption-12px" ><strong>Schorpioen</strong><br>
                                <span class="textsize_monthhoroscope" style="color:black">24 Okt - 22 Nov</span>
                            </figcaption>
                        </div>

                        <div onclick="window.parent.open_second('<?php echo $token;?>','month','boogschutter', <?php echo $product_id_to_fetch; ?>,  <?php echo $active; ?>)"  style="min-width:190px;" class="col-6 col-lg-3 mt-4 text-center horoclass">
                        <?php 
                            if($active == 0){    
                        ?>
                            <img style="height:70%;width:70%;margin-top: 10px;" src="<?php echo plugin_dir_url( __FILE__ ) . '../images/horoscopes/boogschutter.gif'; ?>" alt="boogschutter">
                        <?php
                            }else{                                  
                        ?>  
                            <img style="height:70%;width:70%;margin-top: 10px;" src="<?php echo $boogschutter ?>" alt="">
                        <?php 
                            } 
                        ?>
                            <figcaption class="textsize_monthhoroscope theme_color_tarot_relatielegging caption-12px" ><strong>Boogschutter</strong><br>
                                <span class="textsize_monthhoroscope" style="color:black">23 Nov - 21 Dec</span>
                            </figcaption>
                        </div>

                        <div onclick="window.parent.open_second('<?php echo $token;?>','month','steenbok', <?php echo $product_id_to_fetch; ?>,  <?php echo $active; ?>)"  style="min-width:190px;" class="col-6 col-lg-3 mt-4 text-center horoclass">
                        <?php 
                            if($active == 0){    
                        ?>
                            <img style="height:70%;width:70%;margin-top: 10px;" src="<?php echo plugin_dir_url( __FILE__ ) . '../images/horoscopes/steenbok.gif'; ?>" alt="steenbok">
                        <?php
                            }else{                                  
                        ?>  
                            <img style="height:70%;width:70%;margin-top: 10px;" src="<?php echo $steenbok ?>" alt="">
                        <?php 
                            } 
                        ?>
                            <figcaption class="textsize_monthhoroscope theme_color_tarot_relatielegging caption-12px" ><strong>Steenbok</strong><br>
                                <span class="textsize_monthhoroscope" style="color:black">22 Dec - 20 Jan</span>
                            </figcaption>
                        </div>

                        <div onclick="window.parent.open_second('<?php echo $token;?>','month','waterman', <?php echo $product_id_to_fetch; ?>,  <?php echo $active; ?>)"  style="min-width:190px;" class="col-6 col-lg-3 mt-4 text-center horoclass">
                        <?php 
                            if($active == 0){    
                        ?>
                            <img style="height:70%;width:70%;margin-top: 10px;" src="<?php echo plugin_dir_url( __FILE__ ) . '../images/horoscopes/waterman.gif'; ?>" alt="waterman">
                        <?php
                            }else{                                  
                        ?>  
                            <img style="height:70%;width:70%;margin-top: 10px;" src="<?php echo $waterman ?>" alt="">
                        <?php 
                            } 
                        ?>
                            <figcaption class="textsize_monthhoroscope theme_color_tarot_relatielegging caption-12px" ><strong>Waterman</strong><br>
                                <span class="textsize_monthhoroscope" style="color:black"> 21 Jan - 18 Feb</span>
                            </figcaption>
                        </div>

                        <div onclick="window.parent.open_second('<?php echo $token;?>','month','vissen', <?php echo $product_id_to_fetch; ?>,  <?php echo $active; ?>)"  style="min-width:190px;" class="col-6 col-lg-3 mt-4 text-center horoclass">
                        <?php 
                            if($active == 0){    
                        ?>
                            <img style="height:70%;width:70%;margin-top: 10px;" src="<?php echo plugin_dir_url( __FILE__ ) . '../images/horoscopes/vissen.gif'; ?>" alt="vissen">
                        <?php
                            }else{                                  
                        ?>  
                            <img style="height:70%;width:70%;margin-top: 10px;" src="<?php echo $vissen ?>" alt="">
                        <?php 
                            } 
                        ?>
                            <figcaption class="textsize_monthhoroscope theme_color_tarot_relatielegging caption-12px" ><strong>Vissen</strong><br>
                                <span class="textsize_monthhoroscope" style="color:black">19 Feb - 20 Mrt</span>
                            </figcaption>
                        </div>
                    </div>
                </div>

                <div class="col-md-12" id="month_secondscreen" style="display:none;opacity:0">
                    <div class="row">

                        <div class="col-md-2 text-center" style="text-align:center; min-width:150px">
                            <img id="image_second_month" style="max-width:150px;width:75%;height:auto" src="" alt="ram">
                            <figcaption class="text-center"><strong class="theme_color_tarot_relatielegging" id="strong_second_tarot_relatielegging"></strong><br>
                                <span class="textsize_monthhoroscope theme_color_tarot_relatielegging" id="span_second_month"></span>
                            </figcaption>
                        </div>

                        <div class="col-md-10" id="flip_box_month">
                            <div id="title_second_month" class="headersize_tarot_relatielegging theme_color_tarot_relatielegging" style="font-weight:regular;font-size:30px"></div>
                            <div id="description_second_month" class="textsize_monthhoroscope text_color_monthhoroscope mt-2"></div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-md-10 offset-md-2">
                                <button class="btn textsize_monthhoroscope" id="payment-button_tarot_relatielegging" style="color:white;background-color:<?php echo $theme_color_tarot_relatielegging; ?>;width:100%">JA, IK WIL DE MAANDHOROSCHOOP BEKIJKEN</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="monthhoroscope_box" style="max-height:900px;overflow-y:auto;display:none;border-radius:10px" class="row">
                <div style="border-radius:10px;">
                    <div class="theme_color_tarot_relatielegging text-center headersize_tarot_relatielegging mt-2" style="font-size:25px;!important">Je maandhoroschoop is klaar!</div>
                    <div class="col-md-6 offset-4 textsize_monthhoroscope text_color_monthhoroscope mt-3">Bekijk deze nu via onderstaande knop:</div>
                    <div class="row">
                        <div class="col-md-10 text-end mt-4">
                            <a  href="" target="_blank" id="resultbutton_monthhoroscope" class="textsize_dayhoroscope font btn btn-outline text_color_monthhoroscope" style="width:80%;">
                                <span class="textsize_monthhoroscope" style="color:white!important;">BEKIJK DE MAANDHOROSCOOP</span>
                            </a>
                        </div> 
                        <div class="col-md-2 mt-4">
                            <button type="button" onclick="location.reload();" id="resultbutton_month" class="btn btn-outline-dark" style="width:50%">
                            <span class="textsize_monthhoroscope"><i class="fa-solid fa-rotate-right fa2x"></i></span>
                            </button>
                        </div>                    
                    </div>
                </div>
            </div>
        </div>

        <script>

            jQuery(document).ready(function() {

                var token = '<?php echo esc_js(esc_html($token)); ?>';

                getsettings(
                    jQuery, 
                    token,
                    2, 
                    'monthhoroscope', 
                    'tarot_relatieleggingcontainer', 
                    'font_month', 
                );
            });

            jQuery("#payment-button_tarot_relatielegging").click(function() {

                var token = '<?php echo esc_js(esc_html($token)); ?>';
                var email = '<?php echo esc_js(esc_html($email)); ?>';

                // Call the server to get the payment URL
                myService().getUrl().then(function(url) {
                    // Open the payment gateway in a new window
                    //var popupWindow = window.open('', '_blank', 'width=800,height=600');
            var paymentWindow = window.open('', '_blank');

                    var attribute = jQuery('#strong_second_tarot_relatielegging').html();
                    var host = window.location.href;
                    var returlurl = 'https://astromedia-business.nl/returnmonthhoroscope?t=' + token + '&attr=' + attribute + '&host=' + host;

                    jQuery.ajax({
                        type: "post",
                        crossDomain: true,
                        data: {
                            email: email,
                            token: token,
                            host: host,
                            attribute: attribute,
                            returlurl: returlurl,
                            id: 2,
                        },
                        url: 'https://astromedia-business.nl/startpayment',
                        success: function(response){
                            if(response.slice(0,6) == '000000'){
                                // Set the URL of the popup window after the response is received
                                paymentWindow.location.href = response.split('|')[1];
                                
                                // Attach an event listener to the popup window
                                window.addEventListener('message', function(event) {
                                    if (event.origin === 'https://astromedia-business.nl') {
                                        // Handle the message from the popup window
                                        var type = event.data.type;
                                            var transaction_id = event.data.transactionId;
											
											if(type == 'CANCELLED'){
                                                popupWindow.close();
                                            }

                                        if(type == 2){
                                            retreive_results_tarot_relatielegging(transaction_id);
                                        }

                                        // Check for a flag to close the popup window
                                        if (event.data.transactionId) {
                                            popupWindow.close();
                                        }
                                    }
                                });
                                
                            } else {
                                alert('Er is iets mis gegaan, excuses');
                            }
                        }
                    });
                });
            });

            function retreive_results_tarot_relatielegging(transaction_id){

                var token = '<?php echo esc_js(esc_html($token)); ?>';
                var email = '<?php echo esc_js(esc_html($email)); ?>';

                jQuery.ajax({
                    type: "post",
                    crossDomain: true,
                    data: {
                        email: email,
                        token: token,
                        transaction_id: transaction_id,
                        id: 2,
                    }, 
                    url: "https://astromedia-business.nl/retreive_results",
                    success: function(response){

                        jQuery("#flip_box_month").html(jQuery("#monthhoroscope_box").html());
                        jQuery("a", "#flip_box_month").attr("href", response);

                        jQuery("#payment-button_tarot_relatielegging").hide();
                        
                        // Scroll to the updated flip box
                        var element = document.getElementById('flip_box_month');
                    }
                });
            }

        </script>


<?php
        // return the buffer contents and delete
        return ob_get_clean();
    }    

    add_shortcode('astro_lenormand_succeslegging', 'lenormand_succeslegging');
?>