
<?php

function chinesebelt(){

    require_once(dirname(__FILE__) . '/../../midone.php');
    
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
            #chinesebelt_primescreen .col-lg-2 {
                flex-basis: 50%;
                max-width: 50%;
            }
        }

        .accordion-content {
            display: none; /* Hide content by default */
            padding: 10px;
        }

        .accordion-header {
            cursor: pointer;
            
            background-color: white;
            border: none;
        }

        .accordion-header.active {
            background-color: white;
        }

        .chineseitem{

            cursor:pointer;
        }

        .chineseitem:hover{

            background-color: #f1f1f1;
        }
        
    </style>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <input type="hidden" id="getimagesfolderforthisplugin" value="<?php echo plugin_dir_url( __FILE__ ) . '../../images/horoscopes/'; ?>">

        <?php

            global $wpdb;
            $table_name = $wpdb->prefix . 'customimages'; // set custom images table name
            $product_id_to_fetch = 31; // Fetch images for product_id 7

            // Prepare and execute the query with a WHERE clause to filter by product_id
            $zodiac_images = $wpdb->get_results(
                $wpdb->prepare("SELECT * FROM $table_name WHERE token = %s AND product_id = %s", $token, $product_id_to_fetch)
            );   

            $product_details = get_product_details(31);

            $active = 0;

            if ($zodiac_images) {
                foreach ($zodiac_images as $image) {
                    // Access the columns using object notation
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
                    $active = $image->active;
                }
            }
        ?>

        <div class="container mb-5 mt-5" style="width:100%;padding:0" id="chinesebeltcontainer" style="display:none">
            <div class="row" id="chinesebelt_maincontainer">
                <div class="col-md-12">
                    <div class="defaulttextcontainer_chinesebelt">
                        <div style="font-size: 35px;" class="headersize_chinesebelthoroscope theme_color_chinesebelt" id="headtext"><strong><?php echo $product_details['consumer_title']; ?></strong></div>
                        <div class="text_color_chinesebelt mt-3 textsize_chinesebelthoroscope"><?php echo $product_details['consumer_text1']; ?></div>
                        <div id="leadingtext" class="textsize_chinesebelthoroscope font_birth mt-3 text_color_chinesebelt"><?php echo $product_details['consumer_text2']; ?></div> 
                    </div>
                    <div class="accordion" style="margin-top:20px;">
                        <div class="accordion-header mt-3 theme_color_chinesebelt"><b>Als je je Chinese teken niet weet, dan kun je dat eerst laten berekenen door hier te klikken.</b></div>
                        <div class="accordion-content text_color_chinesebelt mt-3 textsize_chinesebelthoroscope">
                            <div id="container">
                                <h3 class="text_color_chinesebelt">Wat is je Chinese teken?</h3>
                                <p class="text_color_chinesebelt">Geef je geboortedatum:</p>
                                
                                <div class="row">
                                    <div class="col-12 col-lg-1 mt-2" style="padding-right:0">
                                        <select name="formd" class="form-control" style="background-position-x: calc( 100% - 10px );background-position-y: 50%;">
                                            <option  value="01" selected>1</option>
                                            <option  value="02">2</option>
                                            <option  value="03">3</option>
                                            <option  value="04">4</option>
                                            <option  value="05">5</option>
                                            <option  value="06">6</option>
                                            <option  value="07">7</option>
                                            <option  value="08">8</option>
                                            <option  value="09">9</option>
                                            <option  value="10">10</option>
                                            <option  value="11">11</option>
                                            <option  value="12">12</option>
                                            <option  value="13">13</option>
                                            <option  value="14">14</option>
                                            <option  value="15">15</option>
                                            <option  value="16">16</option>
                                            <option  value="17">17</option>
                                            <option  value="18">18</option>
                                            <option  value="19">19</option>
                                            <option  value="20">20</option>
                                            <option  value="21">21</option>
                                            <option  value="22">22</option>
                                            <option  value="23">23</option>
                                            <option  value="24">24</option>
                                            <option  value="25">25</option>
                                            <option  value="26">26</option>
                                            <option  value="27">27</option>
                                            <option  value="28">28</option>
                                            <option  value="29">29</option>
                                            <option  value="30">30</option>
                                            <option  value="31">31</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-lg-2 mt-2" style="padding-right:0">
                                        <select name="formm" class="form-control" style="background-position-x: calc( 100% - 10px );background-position-y: 50%;">
                                            <option  value="01" selected>januari</option>
                                            <option  value="02">februari</option>
                                            <option  value="03">maart</option>
                                            <option  value="04">april</option>
                                            <option  value="05">mei</option>
                                            <option  value="06">juni</option>
                                            <option  value="07">juli</option>
                                            <option  value="08">augustus</option>
                                            <option  value="09">september</option>
                                            <option  value="10">oktober</option>
                                            <option  value="11">november</option>
                                            <option  value="12">december</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-lg-2 mt-2" style="padding-right:0">
                                        <select name="formj" class="form-control" style="width:100%;background-position-x: calc( 100% - 10px );background-position-y: 50%;">
                                            <?php 

                                                $bj = Date('Y');
                                                $stop = 1900;

                                                while($bj > $stop) {

                                                echo "<option  value=\"$bj\">";
                                                echo $bj;
                                                echo "</option>";

                                                $bj = $bj - 1;

                                                };

                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-12 col-lg-2 mt-2" style="padding-right:0">
                                        <button onclick="calcsign()" class="btn background_chinesebelt">BEREKEN</button>
                                    </div> 
                                </div>

                                <div class="mt-3">
                                    <input id="formteken" type="text" size="10" class="formGroep" placeholder="Jouw jaardier is..." style="width:230px;border-radius:10px;">
                                </div>

                                <div id="fout">
                                    
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <hr style="background-color:black">
                </div>
                <div class="col-md-12" id="chinesebelt_primescreen">
                    <div class="row">
                        <?php

                            $zodiacs = [
                                'rat' => $rat,
                                'os' => $os,
                                'tijger' => $tijger,
                                'konijn' => $konijn,
                                'draak' => $draak,
                                'slang' => $slang,
                                'paard' => $paard,
                                'geit' => $geit,
                                'aap' => $aap,
                                'haan' => $haan,
                                'hond' => $hond,
                                'varken' => $varken,
                            ];

                            // Loop through each zodiac and create the HTML
                            foreach ($zodiacs as $zodiac_name => $image_path) {
                                echo '<div class="col-6 col-lg-3 mt-3">';
                                echo '    <div class="card shadower background_gradient_chinesebelt" style="cursor:pointer" onclick="get_results(\'' . $zodiac_name . '\')">';
                                echo '        <div class="text-center" style="margin: 10px 0 0 0; padding: 0;">';

                                if ($active == 0) {
                                    // Default image if the zodiac is not active
                                    echo '            <img style="margin-top: 10px;" src="' . plugin_dir_url( __FILE__ ) . '../../images/horoscopes/'.$zodiac_name.'.png" alt="' . ucfirst($zodiac_name) . '">';
                                } else {
                                    // Specific image for the active zodiac
                                    echo '            <img style="margin-top: 10px;" src="' . $image_path . '.png" alt="' . ucfirst($zodiac_name) . '">';
                                }

                                echo '            <div style="font-weight:bold" class="textsize_chinesebelt font text_color_chinesebelt">' . ucfirst($zodiac_name) . '</div>';
                                echo '        </div>';
                                echo '    </div>';
                                echo '</div>';
                            }

                        ?>
                    </div>
                </div>
                <div class="col-12 text-center" id="chinesebelt_loader" style="display:none">
                    <div style="font-size:60px;width:150px;height:150px;" class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>

            <div id="chinesebelt_box" style="max-height:500px;overflow-y:auto;display:none;border-radius:10px;margin-top:20px;margin-bottom:20px;" class="row">
                <div style="border-radius:10px;">
                    <div class="theme_color_chinesebelt text-center headersize_chinesebelthoroscope mt-2" style="font-size:25px;!important;text-weight:bold">Je chinese dierenriem horoscoop is klaar!</div>
                    <div class="col-md-6 offset-4 textsize_chinesebelthoroscope text_color_chinesebelt mt-3">Bekijk deze nu via onderstaande knop:</div>
                    <div class="row">
                        <div class="col-md-10 text-end mt-4">
                            <button id="resultbutton_chinesebelt" class="textsize_chinesebelthoroscope2023 font btn btn-info text_color_chinesebelt" style="width:80%;">
                                <span class="textsize_chinesebelthoroscope" style="color:white!important;">BEKIJK DE CHINESE DIERENRIEM HOROSCOOP</span>
                            </button>
                        </div> 
                        <div class="col-md-2 mt-4">
                            <button type="button" onclick="location.reload();" class="btn btn-outline-dark" style="width:50%">
                            <span class="textsize_chinesebelthoroscope"><i class="fa-solid fa-rotate-right fa2x"></i></span>
                            </button>
                        </div>                    
                    </div>
                </div>
            </div>
        </div>

        <script>

            
            function reset_chinesebelt(){

                jQuery('#chinesebelt_box').hide();
                jQuery('#chinesebelt_box').css('opacity', '0');
                jQuery('#chinesebelt_box').css('display', 'none');
                jQuery('#chinesebelt_primescreen').show();
            }

            function calcsign(){

                var Results = new Array;
                Results[0] = "19000131Rat";
                Results[1] = "19010219Os";
                Results[2] = "19020208Tijger";
                Results[3] = "19030129Konijn";
                Results[4] = "19040216Draak";
                Results[5] = "19050204Slang";
                Results[6] = "19060125Paard";
                Results[7] = "19070213Geit";
                Results[8] = "19080202Aap";
                Results[9] = "19090122Haan)";

                Results[10] = "19100210Hond";
                Results[11] = "19110130Varken";
                Results[12] = "19120218Rat";
                Results[13] = "19130206Os";
                Results[14] = "19140126Tijger";
                Results[15] = "19150214Konijn";
                Results[16] = "19160203Draak";
                Results[17] = "19170123Slang";
                Results[18] = "19180211Paard";
                Results[19] = "19190201Geit";

                Results[20] = "19200220Aap";
                Results[21] = "19210208Haan";
                Results[22] = "19220128Hond";
                Results[23] = "19230216Varken";
                Results[24] = "19240205Rat";
                Results[25] = "19250125Os";
                Results[26] = "19260213Tijger";
                Results[27] = "19270202Konijn";
                Results[28] = "19280123Draak";
                Results[29] = "19290210Slang";

                Results[30] = "19300130Paard";
                Results[31] = "19310217Geit";
                Results[32] = "19320206Aap";
                Results[33] = "19330126Haan ";
                Results[34] = "19340214Hond";
                Results[35] = "19350204Varken";
                Results[36] = "19360124Rat";
                Results[37] = "19370211Os ";
                Results[38] = "19380131Tijger";
                Results[39] = "19390219Konijn";

                Results[40] = "19400208Draak";
                Results[41] = "19410127Slang";
                Results[42] = "19420215Paard)";
                Results[43] = "19430205Geit";
                Results[44] = "19440125Aap";
                Results[45] = "19450213Haan";
                Results[46] = "19460202Hond";
                Results[47] = "19470122Varken";
                Results[48] = "19480210Rat";
                Results[49] = "19490129Os";

                Results[50] = "19500217Tijger";
                Results[51] = "19510206Konijn";
                Results[52] = "19520127Draak";
                Results[53] = "19530214Slang";
                Results[54] = "19540203Paard";
                Results[55] = "19550124Geit";
                Results[56] = "19560212Aap";
                Results[57] = "19570131Haan";
                Results[58] = "19580218Hond";
                Results[59] = "19590208Varken";

                Results[60] = "19600128Rat";
                Results[61] = "19610215Os";
                Results[62] = "19620205Tijger";
                Results[63] = "19630125Konijn";
                Results[64] = "19640213Draak";
                Results[65] = "19650202Slang";
                Results[66] = "19660121Paard";
                Results[67] = "19670209Geit";
                Results[68] = "19680130Aap";
                Results[69] = "19690217Haan";

                Results[70] = "19700206Hond";
                Results[71] = "19710127Varken";
                Results[72] = "19720215Rat";
                Results[73] = "19730203Os";
                Results[74] = "19740123Tijger";
                Results[75] = "19750211Konijn";
                Results[76] = "19760131Draak";
                Results[77] = "19770218Slang";
                Results[78] = "19780207Paard";
                Results[79] = "19790128Geit";

                Results[80] = "19800216Aap";
                Results[81] = "19810205Haan";
                Results[82] = "19820125Hond";
                Results[83] = "19830213Varken";
                Results[84] = "19840202Rat";
                Results[85] = "19850220Os";
                Results[86] = "19860209Tijger";
                Results[87] = "19870129Konijn";
                Results[88] = "19880217Draak";
                Results[89] = "19890206Slang";

                Results[90] = "19900127Paard";
                Results[91] = "19910215Geit";
                Results[92] = "19920204Aap";
                Results[93] = "19930123Haan";
                Results[94] = "19940210Hond";
                Results[95] = "19950131Varken";
                Results[96] = "19960219Rat";
                Results[97] = "19970208Os";
                Results[98] = "19980128Tijger";
                Results[99] = "19990216Konijn";

                Results[100] = "20000205Draak";
                Results[101] = "20010124Slang";
                Results[102] = "20020212Paard";
                Results[103] = "20030201Geit";
                Results[104] = "20040122Aap";
                Results[105] = "20050209Haan";
                Results[106] = "20060129Hond";
                Results[107] = "20070218Varken";
                Results[108] = "20080207Rat";
                Results[109] = "20090126Os";
                Results[110] = "20100214Tijger";
                Results[111] = "20110203Konijn";
                Results[112] = "20120123Draak";
                Results[113] = "20130210Slang ";
                Results[114] = "20140131Paard";
                Results[115] = "20150219Geit";
                Results[116] = "20160208Aap";
                Results[117] = "20170128Haan";
                Results[118] = "20180216Hond";
                Results[119] = "20190205Varken";
                Results[120] = "20200125Rat";
                Results[121] = "20210212Os";
                Results[122] = "20220201Tijger";
                Results[123] = "20230122Konijn";
                Results[124] = "20240210Draak";
                Results[125] = "20250129Slang ";
                Results[126] = "20260217Paard";
                Results[127] = "20270206Geit";
                Results[128] = "20280126Aap";
                Results[129] = "20290213Haan";
                Results[130] = "20300203Hond";
                Results[131] = "20310123Varken";
                Results[132] = "20320212Geboortedatum ongeldig";

                Results[133] = "99999999";

                var day = jQuery("select[name=formd]").val();
                var month = jQuery("select[name=formm]").val();
                var year = jQuery("select[name=formj]").val();
                var gebdat = year + month + day;

                if ((gebdat < 19000131) || (gebdat > 20320212)) {
                    document.getElementById('fout').innerHTML = "Geboortedatum tussen 31-01-1900 en 12-02-2032"; 
                } else {
                    for (var i = 0; i < Results.length; i++) {
                        var Ogrens = parseInt(Results[i].substring(0,8));
                        var Bgrens = parseInt(Results[i+1].substring(0,8));
                        if (gebdat >= Ogrens && gebdat < Bgrens) {
                            document.getElementById('formteken').value = Results[i].substring(8,99);
                            break;
                        }
                    }
                }
            }

            jQuery(document).ready(function() {

                jQuery('.accordion-header').click(function() {
                    // Get the associated content
                    var content = jQuery(this).next('.accordion-content');

                    // Toggle the clicked accordion and hide the others
                    jQuery('.accordion-content').not(content).slideUp();
                    content.slideToggle();

                    // Toggle 'active' class for headers
                    jQuery('.accordion-header').not(this).removeClass('active');
                    jQuery(this).toggleClass('active');
                });

                var token = '<?php echo esc_js(esc_html($token)); ?>';

                getsettings(
                    jQuery, 
                    token,
                    31, 
                    'chinesebelt', 
                    'chinesebeltcontainer', 
                    'font_chinesebelt', 
                );
            });

            // Click event handler for the button
            jQuery("#resultbutton_chinesebelt").on('click', function() {
                var newWindow = window.open();
                if (newWindow && responseContent) {
                    // Write the stored response HTML to the new window
                    newWindow.document.write(responseContent);
                } else {
                    // Handle the case where the new window couldn't be opened or responseContent is empty
                    alert("Unable to open a new window or no content available.");
                }
            });

            function reset_horoscope(){

                jQuery('#chinesebelt_primescreen').show();
                jQuery('#chinesebelt_box').hide();
            }

            function get_results(attribute) {

                var resultWindow = window.open('', '_blank');

                var token = '<?php echo esc_js(esc_html($token)); ?>';
                var email = '<?php echo esc_js(esc_html($email)); ?>';

                jQuery.ajax({
                    type: "post",
                    crossDomain: true,
                    data: {
                        email: email,
                        token: token,
                        attribute: attribute,
                        id: 31,
                        domain: window.location.hostname,
                    }, 
                    url: "https://astromedia-business.nl/retreive_results_chineseriem",
                    success: function(response){

                        resultWindow.document.open();
                        resultWindow.document.write(response);
                    }
                });
            }

        </script>


<?php
        // return the buffer contents and delete
        return ob_get_clean();
    }    

    add_shortcode('astro_chinese_belt_horoscope', 'chinesebelt');
?>