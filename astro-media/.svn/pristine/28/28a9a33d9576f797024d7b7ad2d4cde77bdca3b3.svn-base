<?php
// components/horoscope-body.php

// Body component for horoscopes
function horoscope_bodyv1($token, $type, $version, $active, $free, $zodiac_images, $product_id, $product_details) {

    ob_start();

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

    <input type="hidden" id="getimagesfolderforthisplugin" value="<?php echo plugin_dir_url( __FILE__ ) . '../../../images//horoscopes/'; ?>">
    
    <div class="horoscope-body">
        <div class="container mb-5 mt-5" style="width:100%;padding:0" style="display:none" id="<?php echo $type; ?>container">
            <div class="row" id="<?php echo $type; ?>_maincontainer">
                <div class="col-md-12 defaulttextcontainer_<?php echo $type; ?>">
                    <div style="font-size: 35px;" class="headersize_<?php echo $type; ?> theme_color_<?php echo $type; ?>" id="headtext"><strong><?php echo $product_details['consumer_title']; ?></strong></div>
                    <div class="textsize_<?php echo $type; ?> text_color_<?php echo $type; ?> mt-3"><strong><?php echo $product_details['consumer_text1']; ?></div>
                    <div class="textsize_<?php echo $type; ?> text_color_<?php echo $type; ?> mt-3"><?php echo $product_details['consumer_text2']; ?></div>
                    <hr style="background-color:black">
                </div>
                <div class="col-md-12" id="<?php echo $type; ?>_primescreen">
                    <div class="row">
                        <div   onclick="retreive_results('ram')" class="col-6 col-lg-3 mt-4 text-center horoclass">
                            <?php 
                                if($active == 0){    
                            ?>
                                <img style="margin-top: 10px;" src="<?php echo plugin_dir_url( __FILE__ ) . '../../../images//horoscopes/ram.gif'; ?>" alt="ram">
                            <?php
                                }else{                                  
                            ?>  
                                <img style="margin-top: 10px;" src="<?php echo $ram ?>" alt="">
                            <?php 
                                } 
                            ?>                         
                            <figcaption class="textsize_<?php echo $type; ?> theme_color_<?php echo $type; ?> caption-12px" ><strong>Ram </strong><br>
                                <span class="textsize_<?php echo $type; ?> text_color_<?php echo $type; ?>" style="color:black">21 Mrt - 20 Apr</span>
                            </figcaption>
                        </div>

                        <div  onclick="retreive_results('stier')" class="col-6 col-lg-3 mt-4 text-center horoclass">
                            <?php 
                                if($active == 0){    
                            ?>
                                <img style="margin-top: 10px;" src="<?php echo plugin_dir_url( __FILE__ ) . '../../../images//horoscopes/stier.gif'; ?>" alt="stier">
                            <?php
                                }else{                                  
                            ?>  
                                <img style="margin-top: 10px;" src="<?php echo $stier ?>" alt="">
                            <?php 
                                } 
                            ?>   
                            <figcaption class="textsize_<?php echo $type; ?> theme_color_<?php echo $type; ?> caption-12px" ><strong>Stier</strong><br>
                                <span class="textsize_<?php echo $type; ?> text_color_<?php echo $type; ?>" style="color:black">21 Apr - 21 Mei</span>
                            </figcaption>
                        </div>

                        <div  onclick="retreive_results('tweelingen')" class="col-6 col-lg-3 mt-4 text-center horoclass">
                            <?php 
                                if($active == 0){    
                            ?>
                                <img style="margin-top: 10px;" src="<?php echo plugin_dir_url( __FILE__ ) . '../../../images//horoscopes/tweelingen.gif'; ?>" alt="tweelingen">
                            <?php
                                }else{                                  
                            ?>  
                                <img style="margin-top: 10px;" src="<?php echo $tweelingen ?>" alt="">
                            <?php 
                                } 
                            ?> 
                            <figcaption class="textsize_<?php echo $type; ?> theme_color_<?php echo $type; ?> caption-12px" ><strong>Tweelingen</strong><br>
                                <span class="textsize_<?php echo $type; ?> text_color_<?php echo $type; ?>" style="color:black">22 Mei - 21 Juni</span>
                            </figcaption>
                        </div>

                        <div  onclick="retreive_results('kreeft')" class="col-6 col-lg-3 mt-4 text-center horoclass">
                            <?php 
                                if($active == 0){    
                            ?>
                                <img style="margin-top: 10px;" src="<?php echo plugin_dir_url( __FILE__ ) . '../../../images//horoscopes/kreeft.gif'; ?>" alt="kreeft">
                            <?php
                                }else{                                  
                            ?>  
                                <img style="margin-top: 10px;" src="<?php echo $kreeft ?>" alt="">
                            <?php 
                                } 
                            ?> 
                            <figcaption class="textsize_<?php echo $type; ?> theme_color_<?php echo $type; ?> caption-12px" ><strong>Kreeft</strong><br>
                                <span class="textsize_<?php echo $type; ?> text_color_<?php echo $type; ?>" style="color:black">22 Juni - 21 Juli</span>
                            </figcaption>
                        </div>

                        <div  onclick="retreive_results('leeuw')" class="col-6 col-lg-3 mt-4 text-center horoclass">
                            <?php 
                                if($active == 0){    
                            ?>
                                <img style="margin-top: 10px;" src="<?php echo plugin_dir_url( __FILE__ ) . '../../../images//horoscopes/leeuw.gif'; ?>" alt="leeuw">
                            <?php
                                }else{                                  
                            ?>  
                                <img style="margin-top: 10px;" src="<?php echo $leeuw ?>" alt="">
                            <?php 
                                } 
                            ?> 
                            <figcaption class="textsize_<?php echo $type; ?> theme_color_<?php echo $type; ?> caption-12px" ><strong>Leeuw</strong><br>
                                <span class="textsize_<?php echo $type; ?> text_color_<?php echo $type; ?>" style="color:black">22 Juli - 22 Aug</span>
                            </figcaption>
                        </div>

                        <div  onclick="retreive_results('maagd')" class="col-6 col-lg-3 mt-4 text-center horoclass">
                            <?php 
                                if($active == 0){    
                            ?>
                                <img style="margin-top: 10px;" src="<?php echo plugin_dir_url( __FILE__ ) . '../../../images//horoscopes/maagd.gif'; ?>" alt="maagd">
                            <?php
                                }else{                                  
                            ?>  
                                <img style="margin-top: 10px;" src="<?php echo $maagd ?>" alt="">
                            <?php 
                                } 
                            ?> 
                            <figcaption class="textsize_<?php echo $type; ?> theme_color_<?php echo $type; ?> caption-12px" ><strong>Maagd</strong><br>
                                <span class="textsize_<?php echo $type; ?> text_color_<?php echo $type; ?>" style="color:black">23 Aug - 23 Sep</span>
                            </figcaption>
                        </div>

                        <div  onclick="retreive_results('weegschaal')" class="col-6 col-lg-3 mt-4 text-center horoclass">
                            <?php 
                                if($active == 0){    
                            ?>
                                <img style="margin-top: 10px;" src="<?php echo plugin_dir_url( __FILE__ ) . '../../../images//horoscopes/weegschaal.gif'; ?>" alt="weegschaal">
                            <?php
                                }else{                                  
                            ?>  
                                <img style="margin-top: 10px;" src="<?php echo $weegschaal ?>" alt="">
                            <?php 
                                } 
                            ?>
                            <figcaption class="textsize_<?php echo $type; ?> theme_color_<?php echo $type; ?> caption-12px" ><strong>Weegschaal</strong><br>
                                <span class="textsize_<?php echo $type; ?> text_color_<?php echo $type; ?>" style="color:black">24 Sep - 23 Okt</span>
                            </figcaption>
                        </div>

                        <div  onclick="retreive_results('schorpioen')" class="col-6 col-lg-3 mt-4 text-center horoclass">
                            <?php 
                                if($active == 0){    
                            ?>
                                <img style="margin-top: 10px;" src="<?php echo plugin_dir_url( __FILE__ ) . '../../../images//horoscopes/schorpioen.gif'; ?>" alt="schorpioen">
                            <?php
                                }else{                                  
                            ?>  
                                <img style="margin-top: 10px;" src="<?php echo $schorpioen ?>" alt="">
                            <?php 
                                } 
                            ?>
                            <figcaption class="textsize_<?php echo $type; ?> theme_color_<?php echo $type; ?> caption-12px" ><strong>Schorpioen</strong><br>
                                <span class="textsize_<?php echo $type; ?> text_color_<?php echo $type; ?>" style="color:black">24 Okt - 22 Nov</span>
                            </figcaption>
                        </div>

                        <div  onclick="retreive_results('boogschutter')" class="col-6 col-lg-3 mt-4 text-center horoclass">
                            <?php 
                                if($active == 0){    
                            ?>
                                <img style="margin-top: 10px;" src="<?php echo plugin_dir_url( __FILE__ ) . '../../../images//horoscopes/boogschutter.gif'; ?>" alt="boogschutter">
                            <?php
                                }else{                                  
                            ?>  
                                <img style="margin-top: 10px;" src="<?php echo $boogschutter ?>" alt="">
                            <?php 
                                } 
                            ?>
                            <figcaption class="textsize_<?php echo $type; ?> theme_color_<?php echo $type; ?> caption-12px" ><strong>Boogschutter</strong><br>
                                <span class="textsize_<?php echo $type; ?> text_color_<?php echo $type; ?>" style="color:black">23 Nov - 21 Dec</span>
                            </figcaption>
                        </div>

                        <div  onclick="retreive_results('steenbok')" class="col-6 col-lg-3 mt-4 text-center horoclass">
                            <?php 
                                if($active == 0){    
                            ?>
                                <img style="margin-top: 10px;" src="<?php echo plugin_dir_url( __FILE__ ) . '../../../images//horoscopes/steenbok.gif'; ?>" alt="steenbok">
                            <?php
                                }else{                                  
                            ?>  
                                <img style="margin-top: 10px;" src="<?php echo $steenbok ?>" alt="">
                            <?php 
                                } 
                            ?>
                            <figcaption class="textsize_<?php echo $type; ?> theme_color_<?php echo $type; ?> caption-12px" ><strong>Steenbok</strong><br>
                                <span class="textsize_<?php echo $type; ?> text_color_<?php echo $type; ?>" style="color:black">22 Dec - 20 Jan</span>
                            </figcaption>
                        </div>

                        <div  onclick="retreive_results('waterman')" class="col-6 col-lg-3 mt-4 text-center horoclass">
                            <?php 
                                if($active == 0){    
                            ?>
                                <img style="margin-top: 10px;" src="<?php echo plugin_dir_url( __FILE__ ) . '../../../images//horoscopes/waterman.gif'; ?>" alt="waterman">
                            <?php
                                }else{                                  
                            ?>  
                                <img style="margin-top: 10px;" src="<?php echo $waterman ?>" alt="">
                            <?php 
                                } 
                            ?>
                            <figcaption class="textsize_<?php echo $type; ?> theme_color_<?php echo $type; ?> caption-12px" ><strong>Waterman</strong><br>
                                <span class="textsize_<?php echo $type; ?> text_color_<?php echo $type; ?>" style="color:black">21 Jan - 18 Feb</span>
                            </figcaption>
                        </div>

                        <div  onclick="retreive_results('vissen')" class="col-6 col-lg-3 mt-4 text-center horoclass">
                            <?php 
                                if($active == 0){    
                            ?>
                                <img style="margin-top: 10px;" src="<?php echo plugin_dir_url( __FILE__ ) . '../../../images//horoscopes/vissen.gif'; ?>" alt="vissen">
                            <?php
                                }else{                                  
                            ?>  
                                <img style="margin-top: 10px;" src="<?php echo $vissen ?>" alt="">
                            <?php 
                                } 
                            ?>
                            <figcaption class="textsize_<?php echo $type; ?> theme_color_<?php echo $type; ?> caption-12px" ><strong>Vissen</strong><br>
                                <span class="textsize_<?php echo $type; ?> text_color_<?php echo $type; ?>" style="color:black">19 Feb - 20 Mrt</span>
                            </figcaption>
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
                            <button target="_blank" id="resultbutton_<?php echo $type; ?>" class="textsize_<?php echo $type; ?> font btn btn-info theme_color_<?php echo $type; ?>" style="width:80%;">
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

        <input type="hidden" id="selected_zodiac">

        <script>

            function start(){

                attribute = document.getElementById('selected_zodiac').value;

                retreive_results(attribute)
            }

        </script>

    </div>
    <?php

    return ob_get_clean();
}
