<?php
// components/tarot-body.php

// Body component for tarots
function tarot_body(
        $token, 
        $type, 
        $product_id, 
        $product_details, 
        $drawings, 
        $drawingShape, 
        $detailDescriptions, 
        $numCardsToDraw, 
        $reading_id, 
        $name, 
        $numberOfCards, 
        $dateDescription, 
        $zodiacSigns
    ) {

    ob_start();
    ?>
    <style>

        .nopadding{
            padding:0;
        }
        #cardsRow {
            display: flex;
            justify-content: center; /* Aligns items horizontally in the center */
            align-items: center; /* Aligns items vertically in the center (if needed) */
        }
        .texter{
            font-weight:bold;
        }

    </style>
    <div class="container mb-5 mt-5" id="tarot_<?php echo $type; ?>container" style="display:none;padding:0;width:100%">

        <div class="row defaulttextcontainer_tarot_<?php echo $type; ?>">
            <div class="col-12 mb-4">
                <h2 class="headersize_tarot_<?php echo $type; ?> theme_color_tarot_<?php echo $type; ?>"><?php echo $name; ?></h2>
            </div>
            <?php
                foreach($detailDescriptions as $description){            
            ?>

                <div class="col-12 mt-4">
                    <div class="row">
                        <div class="col-12">
                            <h5 class="textsize_tarot_<?php echo $type; ?> theme_color_tarot_<?php echo $type; ?>"><?php echo $description['title']; ?></h5>
                        </div>
                        <div class="col-12">
                            <p class="textsize_tarot_<?php echo $type; ?> text_color_tarot_<?php echo $type; ?>"><?php echo $description['text']; ?></p>
                        </div>
                    </div>
                </div>

            <?php
                }           
            ?>
            <hr>
        </div>

        <div class="row mt-4" id="tarot_<?php echo $type; ?>_maincontainer">
            <div class="col-12 text-center">
                <div id="cardsRow"></div>
            </div>
        </div>
        <div class="row" style="margin-top:5vh">
            <div class="col-12">
                <div class="row mb-5">
                    <?php
                        if($zodiacSigns != NULL){

                            $zodiac_active = 1;
                    ?>
                    <div class="col-3">
                        <div class="text_color_tarot_<?php echo $type; ?>">Kies uw sterrenbeeld:</div>
                        <select name="zodiacsigns" id="zodiacsigns" class="form-control mt-2">
                            <?php
                                foreach($zodiacSigns as $sign){
                            ?>
                                <option value="<?php echo $sign['id']; ?>"><?php echo $sign['name']; ?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                    
                    <?php 
                        }else{

                            $zodiac_active = 0;
                        } 
                    
                        if($dateDescription != NULL){

                            $date_active = 1;
                    ?>
                    
                    <div class="col-5">
                        <div class="text_color_tarot_<?php echo $type; ?>">Selecteer datum:</div>
                        <div class="row">
                            <?php
                                if($dateDescription['dateFormat'] == 'dd-MM-yyyy'){

                                $day_active = 1;
                            ?>
                            <div class="col-3">
                            <select name="day" id="day" class="form-control mt-2">
                                <?php
                                    for($i = 1; $i <= 31; $i++){
                                        $formattedNumber = str_pad($i, 2, '0', STR_PAD_LEFT);
                                ?>
                                    <option value="<?php echo $formattedNumber; ?>"><?php echo $formattedNumber; ?></option>
                                <?php
                                    }
                                ?>
                            </select>
                            </div>
                            <?php
                                }else{

                                    $day_active = 0;
                                }
                            ?>
                            <div class="col-4">
                                <select name="month" id="month" class="form-control mt-2">
                                    <option value="01">Januari</option>
                                    <option value="02">Februari</option>
                                    <option value="03">Maart</option>
                                    <option value="04">April</option>
                                    <option value="05">Mei</option>
                                    <option value="06">Juni</option>
                                    <option value="07">Juli</option>
                                    <option value="09">Augustus</option>
                                    <option value="10">September</option>
                                    <option value="11">Oktober</option>
                                    <option value="12">November</option>
                                    <option value="13">December</option>
                                </select>
                            </div>
                            <div class="col-3">
                                <select name="year" id="year" class="form-control mt-2">
                                    <?php
                                        foreach($dateDescription['yearOptions'] as $year){
                                        ?>
                                            <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                                        <?php
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <?php 
                        }else{

                            $date_active = 0;
                        }
                    ?>
                </div>
                <div class="" style="padding-top:0;" id="cardbox_<?php echo $type; ?>">

                    <?php if($drawingShape == 'row' && $numCardsToDraw == 3){?>

                        <div class="row justify-content-center mb-4">
                            <div class="col-4 nopadding col-lg-2">
                                <div class="p3 d-flex flex-column align-items-center" style="height: 100%;">
                                    <div class="inner-box" id="card_0"></div>
                                    <div class="texter text_color_tarot_<?php echo $type; ?>" id="card_0_text"></div>
                                </div>
                            </div>
                            <div class="col-4 nopadding col-lg-2">
                                <div class="p3 d-flex flex-column align-items-center" style="height: 100%;">
                                    <div class="inner-box" id="card_1"></div>
                                    <div class="texter text_color_tarot_<?php echo $type; ?>" id="card_1_text"></div>
                                </div>
                            </div>
                            <div class="col-4 nopadding col-lg-2">
                                <div class="p3 d-flex flex-column align-items-center" style="height: 100%;">
                                    <div class="inner-box" id="card_2"></div>
                                    <div class="texter text_color_tarot_<?php echo $type; ?>" id="card_2_text"></div>
                                </div>
                            </div>
                        </div>

                        <?php }elseif($drawingShape == 'row' && $numCardsToDraw == 1){?>

                        <div class="row justify-content-center mb-4">
                            <div class="col-4 nopadding col-lg-2">
                                <div class="p3 d-flex flex-column align-items-center" style="height: 100%;">
                                    <div class="inner-box" id="card_0"></div>
                                    <div class="texter text_color_tarot_<?php echo $type; ?>" id="card_0_text"></div>
                                </div>
                            </div>
                        </div>

                    <?php }elseif($drawingShape == 'circle' && $numCardsToDraw == 7){?>

                        <!-- Top two boxes -->
                        <div class="row justify-content-center mt-4">
                            <div class="col-lg-3 col-6">
                                <div class="p3 d-flex flex-column align-items-center" style="height: 100%;">
                                    <div class="inner-box" id="card_0"></div>
                                    <div class="texter text_color_tarot_<?php echo $type; ?>" id="card_0_text"></div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="p3 d-flex flex-column align-items-center" style="height: 100%;">
                                    <div class="inner-box" id="card_1"></div>
                                    <div class="texter text_color_tarot_<?php echo $type; ?>" id="card_1_text"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Middle three boxes -->
                        <div class="row justify-content-center mt-4">
                            <div class="col-lg-3 col-4 nopadding">
                                <div class="p3 d-flex flex-column align-items-center" style="height: 100%;">
                                    <div class="inner-box" id="card_2"></div>
                                    <div class="texter text_color_tarot_<?php echo $type; ?>" id="card_2_text"></div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-4 nopadding">
                                <div class="p3 d-flex flex-column align-items-center" style="height: 100%;">
                                    <div class="inner-box" id="card_3"></div>
                                    <div class="texter text_color_tarot_<?php echo $type; ?>" id="card_3_text"></div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-4 nopadding">
                                <div class="p3 d-flex flex-column align-items-center" style="height: 100%;">
                                    <div class="inner-box" id="card_4"></div>
                                    <div class="texter text_color_tarot_<?php echo $type; ?>" id="card_4_text"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Bottom two boxes -->
                        <div class="row justify-content-center mt-4">
                            <div class="col-lg-3 col-6">
                                <div class="p3 d-flex flex-column align-items-center" style="height: 100%;">
                                    <div class="inner-box" id="card_5"></div>
                                    <div class="texter text_color_tarot_<?php echo $type; ?>" id="card_5_text"></div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="p3 d-flex flex-column align-items-center" style="height: 100%;">
                                    <div class="inner-box" id="card_6"></div>
                                    <div class="texter text_color_tarot_<?php echo $type; ?>" id="card_6_text"></div>
                                </div>
                            </div>
                        </div>

                    <?php }elseif($drawingShape == 'circle' && $numCardsToDraw == 4){?>

                        <!-- Top two boxes -->
                        <div class="row justify-content-center mb-4">
                            <div class="col-6 col-lg-2">
                                <div class="p3 d-flex flex-column align-items-center" style="height: 100%;">
                                    <div class="inner-box" id="card_0"></div>
                                    <div class="texter text_color_tarot_<?php echo $type; ?>" id="card_0_text"></div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-2">
                                <div class="p3 d-flex flex-column align-items-center" style="height: 100%;">
                                    <div class="inner-box" id="card_1"></div>
                                    <div class="texter text_color_tarot_<?php echo $type; ?>" id="card_1_text"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center mb-4">
                            <div class="col-6 col-lg-2">
                                <div class="p3 d-flex flex-column align-items-center" style="height: 100%;">
                                    <div class="inner-box" id="card_2"></div>
                                    <div class="texter text_color_tarot_<?php echo $type; ?>" id="card_2_text"></div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-2">
                                <div class="p3 d-flex flex-column align-items-center" style="height: 100%;">
                                    <div class="inner-box" id="card_3"></div>
                                    <div class="texter text_color_tarot_<?php echo $type; ?>" id="card_3_text"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }elseif($drawingShape == 'circle' && $numCardsToDraw == 5){?>


                        <div class="row justify-content-center mb-4">
                            <div class="col-12">
                                <div class="p3 d-flex flex-column align-items-center" style="height: 100%;">
                                    <div class="inner-box" id="card_0"></div>
                                    <div class="texter text_color_tarot_<?php echo $type; ?>" id="card_0_text"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center mb-4">
                            <div class="col-6 col-lg-5 nopadding">
                                <div class="p3 d-flex flex-column align-items-center" style="height: 100%;">
                                    <div class="inner-box" id="card_1"></div>
                                    <div class="texter text_color_tarot_<?php echo $type; ?>" id="card_1_text"></div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-5 nopadding">
                                <div class="p3 d-flex flex-column align-items-center" style="height: 100%;">
                                    <div class="inner-box" id="card_2"></div>
                                    <div class="texter text_color_tarot_<?php echo $type; ?>" id="card_2_text"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center mb-4">
                            <div class="col-4 col-lg-2 nopadding">
                                <div class="p3 d-flex flex-column align-items-center" style="height: 100%;">
                                    <div class="inner-box" id="card_3"></div>
                                    <div class="texter text_color_tarot_<?php echo $type; ?>" id="card_3_text"></div>
                                </div>
                            </div>
                            <div class="col-4 col-lg-2 nopadding">
                                <div class="p3 d-flex flex-column align-items-center" style="height: 100%;">
                                    <div class="inner-box" id="card_4"></div>
                                    <div class="texter text_color_tarot_<?php echo $type; ?>" id="card_4_text"></div>
                                </div>
                            </div>
                        </div>
                        </div>
                    <?php }elseif($drawingShape == 'v' && $numCardsToDraw == 5){?>

                        <!-- Top two boxes -->
                        <div class="row justify-content-center mb-4">
                            <div class="col-12">
                                <div class="p3 d-flex flex-column align-items-center" style="height: 100%;">
                                    <div class="inner-box" id="card_0"></div>
                                    <div class="texter text_color_tarot_<?php echo $type; ?>" id="card_0_text"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Middle three boxes -->
                        <div class="row justify-content-center mb-4">
                            <div class="col-4 col-lg-2 nopadding">
                                <div class="p3 d-flex flex-column align-items-center" style="height: 100%;">
                                    <div class="inner-box" id="card_1"></div>
                                    <div class="texter text_color_tarot_<?php echo $type; ?>" id="card_1_text"></div>
                                </div>
                            </div>
                            <div class="col-4 col-lg-2 nopadding">
                                <div class="p3 d-flex flex-column align-items-center" style="height: 100%;">
                                    <div class="inner-box" id="card_2"></div>
                                    <div class="texter text_color_tarot_<?php echo $type; ?>" id="card_2_text"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Middle three boxes -->
                        <div class="row justify-content-center mb-4">
                            <div class="col-6 col-lg-3">
                                <div class="p3 d-flex flex-column align-items-center" style="height: 100%;">
                                    <div class="inner-box" id="card_3"></div>
                                    <div class="texter text_color_tarot_<?php echo $type; ?>" id="card_3_text"></div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3">
                                <div class="p3 d-flex flex-column align-items-center" style="height: 100%;">
                                    <div class="inner-box" id="card_4"></div>
                                    <div class="texter text_color_tarot_<?php echo $type; ?>" id="card_4_text"></div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <?php }elseif($drawingShape == 'cross' && $numCardsToDraw == 4 && $name == 'Het Kruis'){?>

                            <!-- Middle three boxes -->
                            <div class="row justify-content-center mb-4">
                                <div class="col-12">
                                    <div class="p3 d-flex flex-column align-items-center" style="height: 100%;">
                                        <div class="inner-box" id="card_0"></div>
                                        <div class="texter text_color_tarot_<?php echo $type; ?>" id="card_0_text"></div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="p3 d-flex flex-column align-items-center" style="height: 100%;">
                                        <div class="inner-box" id="card_1"></div>
                                        <div class="texter text_color_tarot_<?php echo $type; ?>" id="card_1_text"></div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="p3 d-flex flex-column align-items-center" style="height: 100%;">
                                        <div class="inner-box" id="card_2"></div>
                                        <div class="texter text_color_tarot_<?php echo $type; ?>" id="card_2_text"></div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="p3 d-flex flex-column align-items-center" style="height: 100%;">
                                        <div class="inner-box" id="card_3"></div>
                                        <div class="texter text_color_tarot_<?php echo $type; ?>" id="card_3_text"></div>
                                    </div>
                                </div>
                            </div>
                            </div>

                        <?php }elseif($drawingShape == 'cross' && $numCardsToDraw == 5 && $name == 'De Ster'){?>

                            <!-- Middle three boxes -->
                            <div class="row justify-content-center mb-4">
                                <div class="col-6 col-lg-4">
                                    <div class="p3 d-flex flex-column align-items-center" style="height: 100%;">
                                        <div class="inner-box" id="card_0"></div>
                                        <div class="texter text_color_tarot_<?php echo $type; ?>" id="card_0_text"></div>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-4">
                                    <div class="p3 d-flex flex-column align-items-center" style="height: 100%;">
                                        <div class="inner-box" id="card_1"></div>
                                        <div class="texter text_color_tarot_<?php echo $type; ?>" id="card_1_text"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Middle three boxes -->
                            <div class="row justify-content-center mb-4">
                                <div class="col-12">
                                    <div class="p3 d-flex flex-column align-items-center" style="height: 100%;">
                                        <div class="inner-box" id="card_2"></div>
                                        <div class="texter text_color_tarot_<?php echo $type; ?>" id="card_2_text"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Middle three boxes -->
                            <div class="row justify-content-center mb-4">
                                <div class="col-6 col-lg-4">
                                    <div class="p3 d-flex flex-column align-items-center" style="height: 100%;">
                                        <div class="inner-box" id="card_3"></div>
                                        <div class="texter text_color_tarot_<?php echo $type; ?>" id="card_3_text"></div>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-4">
                                    <div class="p3 d-flex flex-column align-items-center" style="height: 100%;">
                                        <div class="inner-box" id="card_4"></div>
                                        <div class="texter text_color_tarot_<?php echo $type; ?>" id="card_4_text"></div>
                                    </div>
                                </div>
                            </div>
                            </div>

                        <?php }elseif($drawingShape == 'cross' && $numCardsToDraw == 5 && $name == 'Het Liefdesinzicht'){?>

                            <!-- Middle three boxes -->
                            <div class="row justify-content-center mb-4">
                                <div class="col-12">
                                    <div class="p3 d-flex flex-column align-items-center" style="height: 100%;">
                                        <div class="inner-box" id="card_0"></div>
                                        <div class="texter text_color_tarot_<?php echo $type; ?>" id="card_0_text"></div>
                                    </div>
                                </div>

                                <div class="col-lg-2 col-4 nopadding mt-4">
                                    <div class="p3 d-flex flex-column align-items-center" style="height: 100%;">
                                        <div class="inner-box" id="card_1"></div>
                                        <div class="texter text_color_tarot_<?php echo $type; ?>" id="card_1_text"></div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-4 nopadding mt-4">
                                    <div class="p3 d-flex flex-column align-items-center" style="height: 100%;">
                                        <div class="inner-box" id="card_2"></div>
                                        <div class="texter text_color_tarot_<?php echo $type; ?>" id="card_2_text"></div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-4 nopadding mt-4">
                                    <div class="p3 d-flex flex-column align-items-center" style="height: 100%;">
                                        <div class="inner-box" id="card_3"></div>
                                        <div class="texter text_color_tarot_<?php echo $type; ?>" id="card_3_text"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Middle three boxes -->
                            <div class="row justify-content-center mb-4">
                                <div class="col-12">
                                    <div class="p3 d-flex flex-column align-items-center" style="height: 100%;">
                                        <div class="inner-box" id="card_4"></div>
                                        <div class="texter text_color_tarot_<?php echo $type; ?>" id="card_4_text"></div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        <?php } ?>

                    <div class="row mt-2">
                        <div class="col-12 text-center">
                            <button disabled onclick="startpayment_reading()" type="button" id="resultbutton_<?php echo $type; ?>" class="text_color_tarot_<?php echo $type; ?> textsize_<?php echo $type; ?> font btn background_tarot_<?php echo $type; ?>" style="width:80%;border:none">
                                <span class="textsize_<?php echo $type; ?>"><b>BEKIJK DE LEGGING</b></span>
                            </button> 
                            <div class="spinner-border text-info" id="spinnerbutton_<?php echo $type; ?>" style="width:70px;height:70px;font-size:25px;display:none" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div> 
                            <button type="button" onclick="reloadpage()" style="display:none" id="reloadbutton_<?php echo $type; ?>" class="btn btn-outline-secondary">Opnieuw</button>
                        </div>
                    </div>
                </div>
                <div id="<?php echo $type; ?>_box" style="max-height:900px;overflow-y:auto;display:none;border-radius:10px" class="row"></div>
            </div>
        </div>
    </div>
    <input type="hidden" id="getimagesfolderforthisplugin<?php echo $type; ?>" value="<?php echo plugin_dir_url( __FILE__ ) . '../../images/readings/'; ?>">
    <input type="hidden" id="useridentifier" value="">
    <input type="hidden" id="reading_id" value="<?php echo $reading_id; ?>">
    <input type="hidden" id="readystate" value="1">
    <input type="hidden" id="attributes" value="">

    <script>

        var time_counter = 0;
        var reading_details = <?php echo json_encode($drawings );?>;
        var amount_of_cards = <?php echo json_encode($numCardsToDraw );?>;

        document.addEventListener("DOMContentLoaded", function() {

            for(var i=0;i<reading_details.length;i++){

                var pos = reading_details[i]['position'];
                var name = reading_details[i]['name'];

                document.getElementById('card_'+pos+'_text').innerHTML = name;
            }

            var number_of_cards = <?php echo $numberOfCards; ?>;

            var cardNames = [
                "00-Major-Fool",
                "01-Major-Magician",
                "02-Major-Priestess",
                "03-Major-Empress",
                "04-Major-Emperor",
                "05-Major-Hierophant",
                "06-Major-Lovers",
                "07-Major-Chariot",
                "08-Major-Justice",
                "09-Major-Hermit",
                "10-Major-Wheel-of-Fortune",
                "11-Major-Strenght",
                "12-Major-Hanged",
                "13-Major-Death",
                "14-Major-Temperance",
                "15-Major-Devil",
                "16-Major-Tower",
                "17-Major-Star",
                "18-Major-Moon",
                "19-Major-Sun",
                "20-Major-Judgement",
                "21-Major-World",
                "22-Minor-Discs-Ace",
                "23-Minor-Discs-02",
                "24-Minor-Discs-03",
                "25-Minor-Discs-04",
                "26-Minor-Discs-05",
                "27-Minor-Discs-06",
                "28-Minor-Discs-07",
                "29-Minor-Discs-08",
                "30-Minor-Discs-09",
                "31-Minor-Discs-10",
                "32-Minor-Discs-Page",
                "33-Minor-Discs-Knight",
                "34-Minor-Discs-Queen",
                "35-Minor-Discs-King",
                "36-Minor-Swords-Ace",
                "37-Minor-Swords-02",
                "38-Minor-Swords-03",
                "39-Minor-Swords-04",
                "40-Minor-Swords-05",
                "41-Minor-Swords-06",
                "42-Minor-Swords-07",
                "43-Minor-Swords-08",
                "44-Minor-Swords-09",
                "45-Minor-Swords-10",
                "46-Minor-Swords-Page",
                "47-Minor-Swords-Knight",
                "48-Minor-Swords-Queen",
                "49-Minor-Swords-King",
                "50-Minor-Cups-Ace",
                "51-Minor-Cups-02",
                "52-Minor-Cups-03",
                "53-Minor-Cups-04",
                "54-Minor-Cups-05",
                "55-Minor-Cups-06",
                "56-Minor-Cups-07",
                "57-Minor-Cups-08",
                "58-Minor-Cups-09",
                "59-Minor-Cups-10",
                "60-Minor-Cups-Page",
                "61-Minor-Cups-Knight",
                "62-Minor-Cups-Queen",
                "63-Minor-Cups-King",
                "64-Minor-Wands-Ace",
                "65-Minor-Wands-02",
                "66-Minor-Wands-03",
                "67-Minor-Wands-04",
                "68-Minor-Wands-05",
                "69-Minor-Wands-06",
                "70-Minor-Wands-07",
                "71-Minor-Wands-08",
                "72-Minor-Wands-09",
                "73-Minor-Wands-10",
                "74-Minor-Wands-Page",
                "75-Minor-Wands-Knight",
                "77-Minor-Wands-King",
            ];

            cardNames = shuffleArray(cardNames).slice(0, number_of_cards);;

            var cardsRow = document.getElementById('cardsRow');
            var imagesFolder = document.getElementById('getimagesfolderforthisplugin<?php echo $type; ?>').value;
           
            // Generate cards
            cardNames.forEach(function(name, index) {
                var card = document.createElement('div');
                card.className = 'card_class';
                card.dataset.cardName = name;
                cardsRow.appendChild(card);

                // Add event listener using externalized function
                card.addEventListener('click', cardClickFunction);

                var delay = index * 10; // 100ms delay between each card, adjust as needed
                setTimeout(function() {
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, delay);
            });
            console.log(time_counter)
        });        

        function cardClickFunction(event) {

            if(jQuery('#readystate').val() == 1){

                jQuery('#readystate').val(0);

                // Get the clicked card element from the event
                var card = event.currentTarget;

                if(time_counter < amount_of_cards) {

                    var details = reading_details[time_counter];
                    var targetElement = document.getElementById('card_' + details['position']);

                    card.classList.remove('card');
                    
                    // Get card's starting position relative to viewport
                    var startPos = card.getBoundingClientRect();

                    // Get card's parent (or closest positioned ancestor) position relative to viewport
                    var parentPos = card.parentElement.getBoundingClientRect();
                    
                    // Calculate correct top and left values
                    var correctTop = startPos.top - parentPos.top;
                    var correctLeft = startPos.left - parentPos.left;

                    // Temporarily make the card absolute and set it above everything
                    card.classList.add('movingCard');
                    card.style.top = correctTop + "px";
                    card.style.left = correctLeft + "px";
                    
                    // Force a repaint to make sure the card's position has been updated
                    getComputedStyle(card).top;

                    // Get card's ending position
                    var endPos = targetElement.getBoundingClientRect();

                    // Adjust the ending position based on the parent's position
                    var endCorrectTop = endPos.top - parentPos.top + 5;
                    var endCorrectLeft = endPos.left - parentPos.left + 5;

                    // Update card's position to the adjusted ending position
                    card.style.top = endCorrectTop + "px";
                    card.style.left = endCorrectLeft + "px";

                    //jQuery('.movingCard').css('transform', 'scale(2, 1.0)');

                    // Remove event listener after first click
                    card.removeEventListener('click', cardClickFunction);

                    // Fetch the reading
                    fetch_reading(time_counter, targetElement, card);

                    time_counter = time_counter + 1;
                }
            }
        }

        function fetch_reading(time_counter, targetElement, card){

            var useridentifier = jQuery('#useridentifier').val();
            var reading_id = jQuery('#reading_id').val();

            jQuery.ajax({
                type: 'post',
                url: my_ajax_object.ajax_url,
                data: {
                    action: 'fetch_readings',
                    reading_id: reading_id,
                    useridentifier: useridentifier,
                },
                success: function(response) {

                    var data = JSON.parse(response);

                    jQuery('#useridentifier').val(data.id);
                    jQuery('#readystate').val(1);

                    var imageUrl = data.userReadingDrawings[time_counter].card.image;
                    
                    card.classList.remove('movingCard');
                    card.classList.remove('card');
                    targetElement.innerHTML = '<div style="height:102%;border-radius:5px;background-size:cover;background-repeat:no-repeat;background-image:url(' + imageUrl + ')"></div>';
                    card.style.visibility = 'hidden'; // Hide the clicked card after it slides in

                    if(data.isFinished == true){
                        
                        jQuery('#resultbutton_<?php echo $type; ?>').show();
                        jQuery('#resultbutton_<?php echo $type; ?>').removeAttr('disabled');
                        jQuery('#attributes').val(useridentifier + ',' + reading_id);
                    }                    
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error("Request failed: " + textStatus + ", " + errorThrown);
                }
            });
        }

        jQuery(document).ready(function() {

            var token = '<?php echo esc_js(esc_html($token)); ?>';

            getsettings(
                jQuery, 
                token,
                <?php echo $product_id; ?>, 
                'tarot_<?php echo $type; ?>', 
                'tarot_<?php echo $type; ?>container', 
                'font_tarot_<?php echo $type; ?>', 
            );
        });
      
        function shuffleArray(array) {
            for (let i = array.length - 1; i > 0; i--) {
                const j = Math.floor(Math.random() * (i + 1));
                [array[i], array[j]] = [array[j], array[i]]; // Swap elements
            }
            return array;
        }

        function reloadpage(){

            location.reload();
        }

        function reset_horoscope(){

            location.reload();
            jQuery('#cardbox_<?php echo $type; ?>').show();
            jQuery('#<?php echo $type; ?>_box').hide();
        }

    </script>

    <?php
    // return the buffer contents and delete
    return ob_get_clean();
}
