<?php
// components/horoscope-body.php

// Body component for horoscopes
function horoscope_bodyv2($token, $type, $version, $active, $free, $product_id, $product_details) {

    ob_start();

    ?>
    
    <div class="horoscope-body">

        <div class="container mb-5 mt-5" style="width:100%;padding:0" id="<?php echo $type; ?>container" style="display:none">
            <div class="row" id="<?php echo $type; ?>_maincontainer">
                <div class="col-md-12 defaulttextcontainer_<?php echo $type; ?>">
                    <div style="font-size: 35px;" class="headersize_<?php echo $type; ?> theme_color_<?php echo $type; ?>" id="headtext"><strong><?php echo $product_details['consumer_title']; ?></strong></div>
                    <div class="textsize_<?php echo $type; ?> text_color_<?php echo $type; ?> mt-3"><?php echo $product_details['consumer_text1']; ?></div>
                    <div class="textsize_<?php echo $type; ?> text_color_<?php echo $type; ?> mt-3"><?php echo $product_details['consumer_text2']; ?></div>
                    <hr style="background-color:black">
                </div>
                <div class="col-md-12" id="<?php echo $type; ?>_primescreen">
                    <div class="row">
                        <div class="col-6 col-lg-3 col-lg-3 mt-3">
                            <div class="card background_gradient_<?php echo $type; ?> shadower" style="cursor:pointer" onclick="retreive_results('ram')">
                                <div class="text-center" style="margin: 10px 0 0 0; padding: 0;"> 

                                    <img style="margin-top: 10px;" src="<?php echo ASTRO_MEDIA_URL . 'images/horoscopesv2/ram.png'; ?>" alt="Ram">
                                    
                                    <div style="font-weight:bold" class="textsize_<?php echo $type; ?> font text_color_<?php echo $type; ?>">Ram</div>
                                    <div class="textsize_<?php echo $type; ?> text_color_<?php echo $type; ?> font">21 Mrt - 20 Apr</div>                                
                                </div> 
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-lg-3 mt-3">
                            <div class="card background_gradient_<?php echo $type; ?> shadower" style="cursor:pointer" onclick="retreive_results('stier')">
                                <div class="text-center" style="margin: 10px 0 0 0; padding: 0;"> 

                                    <img style="margin-top: 10px;" src="<?php echo ASTRO_MEDIA_URL . 'images/horoscopesv2/stier.png'; ?>" alt="Stier">
                                    <div style="font-weight:bold" class="textsize_<?php echo $type; ?> font text_color_<?php echo $type; ?>">Stier</div>
                                    <div class="textsize_<?php echo $type; ?> text_color_<?php echo $type; ?> font">21 Apr - 21 Mei</div> 
                                </div>
                            </div>
                        </div>

                        <div class="col-6 col-lg-3 col-lg-3 mt-3">
                            <div class="card background_gradient_<?php echo $type; ?> shadower" style="cursor:pointer" onclick="retreive_results('tweelingen')">
                                <div class="text-center" style="margin: 10px 0 0 0; padding: 0;"> 

                                    <img style="margin-top: 10px;" src="<?php echo ASTRO_MEDIA_URL . 'images/horoscopesv2/tweelingen.png'; ?>" alt="Tweelingen">

                                    <div style="font-weight:bold" class="textsize_<?php echo $type; ?> font text_color_<?php echo $type; ?>">Tweelingen</div>
                                    <div class="textsize_<?php echo $type; ?> text_color_<?php echo $type; ?> font">22 Mei - 21 Juni</div> 
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-lg-3 mt-3">
                            <div class="card background_gradient_<?php echo $type; ?> shadower" style="cursor:pointer" onclick="retreive_results('kreeft')">
                                <div class="text-center" style="margin: 10px 0 0 0; padding: 0;">

                                    <img style="margin-top: 10px;" src="<?php echo ASTRO_MEDIA_URL . 'images/horoscopesv2/kreeft.png'; ?>" alt="Kreeft">

                                    <div style="font-weight:bold" class="textsize_<?php echo $type; ?> font text_color_<?php echo $type; ?>">Kreeft</div>
                                    <div class="textsize_<?php echo $type; ?> text_color_<?php echo $type; ?> font">22 Juni - 21 Juli</div> 
                                </div>
                            </div>
                        </div>
                    
                        
                        <div class="col-6 col-lg-3 col-lg-3 mt-3">
                            <div class="card background_gradient_<?php echo $type; ?> shadower" style="cursor:pointer" onclick="retreive_results('leeuw')">
                                <div class="text-center" style="margin: 25px 0 0 0; padding: 0;"> 

                                    <img style="" src="<?php echo ASTRO_MEDIA_URL . 'images/horoscopesv2/leeuw.png'; ?>" alt="Leeuw">

                                    <div style="font-weight:bold" class="textsize_<?php echo $type; ?> font text_color_<?php echo $type; ?>">Leeuw</div>
                                    <div class="textsize_<?php echo $type; ?> text_color_<?php echo $type; ?> font">22 Juli - 22 Aug</div>                                
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-lg-3 mt-3">
                            <div class="card background_gradient_<?php echo $type; ?> shadower" style="cursor:pointer" onclick="retreive_results('maagd')">
                                <div class="text-center" style="margin: 25px 0 0 0; padding: 0;"> 

                                    <img style="" src="<?php echo ASTRO_MEDIA_URL . 'images/horoscopesv2/maagd.png'; ?>" alt="Maagd">

                                    <div style="font-weight:bold" class="textsize_<?php echo $type; ?> font text_color_<?php echo $type; ?>">Maagd</div>
                                    <div class="textsize_<?php echo $type; ?> text_color_<?php echo $type; ?> font">23 Aug - 23 Sep</div>                                
                                </div>
                            </div>
                        </div> 
                        <div class="col-6 col-lg-3 col-lg-3 mt-3">
                            <div class="card background_gradient_<?php echo $type; ?> shadower" style="cursor:pointer" onclick="retreive_results('weegschaal')">
                                <div class="text-center" style="margin: 25px 0 0 0; padding: 0;"> 

                                    <img style="" src="<?php echo ASTRO_MEDIA_URL . 'images/horoscopesv2/weegschaal.png'; ?>" alt="Weegschaal">

                                    <div style="font-weight:bold" class="textsize_<?php echo $type; ?> font text_color_<?php echo $type; ?>">Weegschaal</div>
                                    <div class="textsize_<?php echo $type; ?> text_color_<?php echo $type; ?> font">24 Sep - 23 Okt</div>                                
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-lg-3 mt-3">
                            <div class="card background_gradient_<?php echo $type; ?> shadower" style="cursor:pointer" onclick="retreive_results('schorpioen')">
                                <div class="text-center" style="margin: 25px 0 0 0; padding: 0;"> 

                                    <img style="" src="<?php echo ASTRO_MEDIA_URL . 'images/horoscopesv2/schorpioen.png'; ?>" alt="Schorpioen">

                                    <div style="font-weight:bold" class="textsize_<?php echo $type; ?> font text_color_<?php echo $type; ?>">Schorpioen</div>
                                    <div class="textsize_<?php echo $type; ?> text_color_<?php echo $type; ?> font">24 Okt - 22 Nov</div>                                
                                </div>
                            </div>
                        </div>                       
                                            
                        <div class="col-6 col-lg-3 col-lg-3 mt-3">
                            <div class="card background_gradient_<?php echo $type; ?> shadower" style="cursor:pointer" onclick="retreive_results('boogschutter')">
                                <div class="text-center" style="margin: 25px 0 0 0; padding: 0;"> 

                                    <img style="" src="<?php echo ASTRO_MEDIA_URL . 'images/horoscopesv2/boogschutter.png'; ?>" alt="Boogschutter">

                                    <div style="font-weight:bold" class="textsize_<?php echo $type; ?> font text_color_<?php echo $type; ?>">Boogschutter</div>
                                    <div class="textsize_<?php echo $type; ?> text_color_<?php echo $type; ?> font">23 Nov - 21 Dec</div>                                
                                </div>
                            </div>
                        </div>                    
                        <div class="col-6 col-lg-3 col-lg-3 mt-3">
                            <div class="card background_gradient_<?php echo $type; ?> shadower" style="cursor:pointer" onclick="retreive_results('steenbok')">
                                <div class="text-center" style="margin: 25px 0 0 0; padding: 0;"> 

                                    <img style="" src="<?php echo ASTRO_MEDIA_URL . 'images/horoscopesv2/steenbok.png'; ?>" alt="Steenbok">

                                    <div style="font-weight:bold" class="textsize_<?php echo $type; ?> font text_color_<?php echo $type; ?>">Steenbok</div>
                                    <div class="textsize_<?php echo $type; ?> text_color_<?php echo $type; ?> font">22 Dec - 20 Jan</div>                                
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-lg-3 mt-3">
                            <div class="card background_gradient_<?php echo $type; ?> shadower" style="cursor:pointer" onclick="retreive_results('waterman')">
                                <div class="text-center" style="margin: 25px 0 0 0; padding: 0;"> 

                                    <img style="" src="<?php echo ASTRO_MEDIA_URL . 'images/horoscopesv2/waterman.png'; ?>" alt="Waterman">

                                    <div style="font-weight:bold" class="textsize_<?php echo $type; ?> font text_color_<?php echo $type; ?>">Waterman</div>
                                    <div class="textsize_<?php echo $type; ?> text_color_<?php echo $type; ?> font">21 Jan - 18 Feb</div>                                
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-lg-3 mt-3">
                            <div class="card background_gradient_<?php echo $type; ?> shadower" style="cursor:pointer" onclick="retreive_results('vissen')">
                                <div class="text-center" style="margin: 25px 0 0 0; padding: 0;"> 

                                    <img style="" src="<?php echo ASTRO_MEDIA_URL . 'images/horoscopesv2/vissen.png'; ?>" alt="Vissen">

                                    <div style="font-weight:bold" class="textsize_<?php echo $type; ?> font text_color_<?php echo $type; ?>">Vissen</div>
                                    <div class="textsize_<?php echo $type; ?> text_color_<?php echo $type; ?> font">19 Feb - 20 Mrt</div>                                
                                </div>
                            </div>
                        </div>
                      
                    </div>
                </div>
            </div>

            <div id="<?php echo $type; ?>_box" style="max-height:900px;overflow-y:auto;display:none;border-radius:10px" class="row">
                <div style="border-radius:10px;">
                    <div class="theme_color_<?php echo $type; ?> text-center headersize_<?php echo $type; ?> mt-2" style="font-size:25px;!important">Je <?php echo $type; ?> is klaar!</div>
                    <div class="col-md-6 offset-4 textsize_<?php echo $type; ?> text_color_<?php echo $type; ?> mt-3">Bekijk deze nu via onderstaande knop:</div>
                    <div class="row">
                        <div class="col-md-10 text-end mt-3">
                            <button id="resultbutton_<?php echo $type; ?>" class="textsize_<?php echo $type; ?> font btn btn-info theme_color_<?php echo $type; ?>" style="width:80%;">
                                <span class="textsize_<?php echo $type; ?>" style="color:white!important;">BEKIJK DE <?php echo strtoupper($type); ?></span>
                            </button>
                        </div> 
                        <div class="col-md-2 mt-3">
                            <button type="button" onclick="location.reload();" class="btn btn-outline-dark" style="width:50%">
                            <span class="textsize_<?php echo $type; ?>"><i class="fa-solid fa-rotate-right fa2x"></i></span>
                            </button>
                        </div>                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php

    return ob_get_clean();
}
