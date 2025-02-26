<?php
function cfw_calorie_calculator( $atts, $content = null){

$cfw_title_font = get_option('cfw_title_font',28);
$cfw_title_color = get_option('cfw_title_color','#000');
$cfw_contback_font = get_option('cfw_contback_font','#faf8f6');
$cfw_con_title_color = get_option('cfw_con_title_color','#000');
$cfw_active_color = get_option('cfw_active_color','#4f748e');
$cfw_act_hover_color = get_option('cfw_act_hover_color','rgba(223,51,28,.4)');
$cfw_btntext_color = get_option('cfw_btntext_color','#fff');
$cfw_btnback_color = get_option('cfw_btnback_color','#000000');
$cfw_btnhover_back = get_option('cfw_btnhover_back','rgb(35, 62, 84)');
$cfw_btnhover_text = get_option('cfw_btnhover_text','#fff');
$cfw_msg_text_color = get_option('cfw_msg_text_color','#842029');
$cfw_msg_back_color = get_option('cfw_msg_back_color','#f8d7da');
$cfw_tab_act_back_color = get_option('cfw_tab_act_back_color','#f8f4ab');
$cfw_tab_act_text_color = get_option('cfw_tab_act_text_color','#000000');
$cfw_tab_act_border_color = get_option('cfw_tab_act_border_color','#83b730');
$cfw_tab_back_color = get_option('cfw_tab_back_color','#eeffcf');
$cfw_tab_text_color = get_option('cfw_tab_text_color','#000000');
$cfw_tab_border_color = get_option('cfw_tab_border_color','#cff09e');
$cfw_result_title_back_color = get_option('cfw_result_title_back_color','#a1c955');
$cfw_cat_list_back_color = get_option('cfw_cat_list_back_color','#a1c955');
$cfw_cat_list_text_color = get_option('cfw_cat_list_text_color','#000000');
$cfw_caldays_list_back_color = get_option('cfw_caldays_list_back_color','#f8f4ab');
$cfw_caldays_list_text_color = get_option('cfw_caldays_list_text_color','#000000');
$cfw_title = get_option('cfw_title','CALORIE CALCULATOR');
$cfw_about_text = get_option('cfw_about_text','About You');
$cfw_activate_text = get_option('cfw_activate_text','HOW ACTIVATE ARE YOU?');
$cfw_calc_btn_text = get_option('cfw_calc_btn_text','CALCULATE');
$wmc_weight_loss_text = get_option('wmc_weight_loss_text','Weight Loss');
$wmc_weight_gain_text = get_option('wmc_weight_gain_text','Weight Gain');

ob_start();
    ?>
    <style type="text/css">
        .main-header h2 {
            color: <?php echo esc_attr($cfw_title_color); ?>;
            font-size: <?php echo esc_attr($cfw_title_font); ?>px;
        }
        div#cfw_calc_form  {
            background: <?php echo esc_attr($cfw_contback_font); ?>;
        }
        .cfw_form h3.cfw_form_heading_1 {
            color: <?php echo esc_attr($cfw_con_title_color); ?>;
        }
        .cfw_checked_activity input[type=radio]:checked+.cfw_radio_fe, .rightSec .gender_box label > input[type="radio"]:checked + span {
            background-color: <?php echo esc_attr($cfw_active_color); ?>;
        }
        .cfw_radio_fe:hover {
            background-color: <?php echo esc_attr($cfw_act_hover_color); ?>;
        }
        .wpb_calc_btn #calculatebtn {
            background-color: <?php echo esc_attr($cfw_btnback_color); ?>;
            color: <?php echo esc_attr($cfw_btntext_color); ?>;
        }
        button#calculatebtn:hover {
            background-color: <?php echo esc_attr($cfw_btnhover_back); ?>;
            color: <?php echo esc_attr($cfw_btnhover_text); ?>;
        }
        .cfw_calc_message {
            background-color: <?php echo esc_attr($cfw_msg_back_color); ?>;
            color: <?php echo esc_attr($cfw_msg_text_color); ?>;
        }
        li.nav-tab.nav-tab-active {
            background-color: <?php echo esc_attr($cfw_tab_act_back_color); ?>;
            color: <?php echo esc_attr($cfw_tab_act_text_color); ?>;
            border-color: <?php echo esc_attr($cfw_tab_act_border_color); ?>;
        }
        li.nav-tab {
            background-color: <?php echo esc_attr($cfw_tab_back_color); ?>;
            color: <?php echo esc_attr($cfw_tab_text_color); ?>;
            border-color: <?php echo esc_attr($cfw_tab_border_color); ?>;
        }
        .restultWrapList li:first-child {
            background-color: <?php echo esc_attr($cfw_result_title_back_color); ?>;
        }
        .restultWrapList li.customStyle .left{
            background-color: <?php echo esc_attr($cfw_cat_list_back_color); ?>;
            color: <?php echo esc_attr($cfw_cat_list_text_color); ?>;
        }
        .restultWrapList li.customStyle .left:after {
            border-left-color: <?php echo esc_attr($cfw_cat_list_back_color); ?>;
        }
        .restultWrapList li.customStyle .right {
            background-color: <?php echo esc_attr($cfw_caldays_list_back_color); ?>;
            color: <?php echo esc_attr($cfw_caldays_list_text_color); ?>;
        }
    </style>
    <div class="wpb_main_calc">
    <section class="cfw-calc-header">
        <div class="cfw_header1">
            <div class="main-header">
                <h2 class="font-weight-bold"><?php echo esc_attr($cfw_title); ?></h2>
            </div>
        </div>
        <div class="cfw_containers">
            <div id="cfw_calc_form" class="cfw_calc_form">
                <form class="cfw_form">
                    <div class="containers_fluid_rows">
                        <div class="cfw_header2">
                            <h3 class="cfw_form_heading_1"><?php echo esc_attr($cfw_about_text); ?></h3>
                        </div>
                        <div class="cfw_calculator_col">
                            <div class="cfw_from_filed">
                                <label for="" class="wpb_field1"><?php echo esc_html('Gender :','calorie-calculator'); ?></label>
                                <div class="rightSec">
                                    <div class="radiCustom gender_box">
                                        <div class="cfw_gend">
                                            <label class="cfw_gender_label">
                                                <input checked="" type="radio" value="male" name="wpb_gender" id=""><span><?php echo esc_html('Men','calorie-calculator'); ?></span>
                                            </label>
                                            <label class="cfw_gender_label">
                                                <input type="radio" value="female" name="wpb_gender" id=""><span><?php echo esc_html('Women','calorie-calculator'); ?></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="cfw_from_filed">
                                <label class="wpb_field1"><?php echo esc_html('Age :','calorie-calculator'); ?></label>
                                <input type="number" name="cfw_age" placeholder="" id="cfw_age" class="wpb_conditions">
                                <span class="cfw_desc"><?php echo esc_html('(in years)','calorie-calculator'); ?></span>
                            </div>
                            <div class="cfw_from_filed">
                                <label class="wpb_field1"><?php echo esc_html('Weight :','calorie-calculator'); ?></label>
                                <input type="number" name="cfw_weight" placeholder="" id="cfw_weight" class="wpb_conditions">
                                <span class="cfw_desc"><?php echo esc_html('(in years)','calorie-calculator'); ?><?php echo esc_html('(in kgs)','calorie-calculator'); ?></span>
                            </div>
                            <div class="cfw_from_filed">
                                <label class="wpb_field1"><?php echo esc_html('Height :','calorie-calculator'); ?></label>
                                <input type="number" name="cfw_height" placeholder="" id="cfw_height" class="wpb_conditions">
                                <span class="cfw_desc"><?php echo esc_html('(in cm)','calorie-calculator'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="containers_activity_rows">
                        <div class="main-header1">
                            <h3 class="cfw_form_heading_1"><?php echo esc_attr($cfw_activate_text); ?></h3>
                        </div>
                        <div class="cfw_activity">
                            <div class="cfw_sedentary_activity cfw_checked_activity">
                                <label class="cfw_radio">
                                    <input type="radio" class="custom_class" id="cfw_activity" name="cfw_activity" value="1.2" checked>
                                    <div class="cfw_radio_fe cfw_label">
                                        <span class="cfw_radio_title"><?php echo esc_html('Sedentary','calorie-calculator'); ?></span>
                                    </div>
                                </label>
                            </div>
                            <div class="cfw_light_activity cfw_checked_activity">
                                <label class="cfw_radio">
                                    <input type="radio" class="custom_class" id="cfw_activity" name="cfw_activity" value="1.375">
                                    <div class="cfw_radio_fe">
                                        <span class="cfw_radio_title"><?php echo esc_html('Light','calorie-calculator'); ?></span>
                                    </div>
                                </label>
                            </div>
                            <div class="cfw_moderate_activity  cfw_checked_activity">
                                <label class="cfw_radio">
                                    <input type="radio" class="custom_class" id="cfw_activity" name="cfw_activity" value="1.55">
                                    <div class="cfw_radio_fe">
                                        <span class="cfw_radio_title"><?php echo esc_html('Moderate','calorie-calculator'); ?></span>
                                    </div>
                                </label>
                            </div>
                            <div class="cfw_active_activity cfw_checked_activity">
                                <label class="cfw_radio">
                                    <input type="radio" class="custom_class" id="cfw_activity" name="cfw_activity" value="1.725">
                                    <div class="cfw_radio_fe">
                                        <span class="cfw_radio_title"><?php echo esc_html('Active','calorie-calculator'); ?></span>
                                    </div>
                                </label>
                            </div>
                            <div class="cfw_veryactive_activity cfw_checked_activity">
                                <label class="cfw_radio">
                                    <input type="radio" class="custom_class" id="cfw_activity" name="cfw_activity" value="1.9">
                                    <div class="cfw_radio_fe">
                                        <span class="cfw_radio_title"><?php echo esc_html('Very Active','calorie-calculator'); ?></span>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="wpb_calc_btn">
                    <button type="button" class="wpb_btn btn-dark" id="calculatebtn"><?php echo esc_attr($cfw_calc_btn_text); ?></button>
                </div>
            </div>
        </div>
    </section>
</div>
    <div class="wpb_schedule_content">
        <div class="wpb_display_table">
            <ul class="nav-tab-wrapper woo-nav-tab-wrapper">
                <li id="calories_weight_loss" class="nav-tab nav-tab-active" data-tab="wpb-weight-loss"><?php echo esc_attr($wmc_weight_loss_text); ?></li>
                <li id="calories_weight_gain" class="nav-tab" data-tab="wpb-weight-gain"><?php echo esc_attr($wmc_weight_gain_text); ?></li>
            </ul>
        </div>
        <div id="wpb-weight-loss" class="tab-content current">
            <div class="restultWrap">
                <ul class="restultWrapList">
                    <li>
                        <div class="left"><?php echo esc_html('Category','calorie-calculator'); ?></div>
                        <div class="right"><?php echo esc_html('Calories/Day','calorie-calculator'); ?></div>
                    </li>
                    <li class="customStyle">
                        <div class="left"><?php echo esc_html('Maintain Weight','calorie-calculator'); ?></div>
                        <div class="right" id="cfw_maintain_loss_message"></div>
                    </li>
                    <li class="customStyle">
                        <div class="left"><?php echo esc_html('Mild Weight ','calorie-calculator'); ?><span class="jsWeightSec"><?php echo esc_html('Loss','calorie-calculator'); ?></span></div>
                        <div class="right" id="cfw_mild_weight_loss"></div>
                    </li>
                    <li class="customStyle">
                        <div class="left"><?php echo esc_html('Weight','calorie-calculator'); ?><span class="jsWeightSec"><?php echo esc_html('Loss','calorie-calculator'); ?></span></div>
                        <div class="right" id="cfw_weight_loss"></div>
                    </li>
                    <li class="customStyle">
                        <div class="left"><?php echo esc_html('Extreme Weight ','calorie-calculator'); ?><span class="jsWeightSec"><?php echo esc_html('Loss','calorie-calculator'); ?></span></div>
                        <div class="right" id="cfw_ext_weight_loss"></div>
                    </li>
                </ul>
            </div>
        </div>
        <div id="wpb-weight-gain" class="tab-content">
            <div class="restultWrap">
                <ul class="restultWrapList">
                    <li>
                        <div class="left"><?php echo esc_html('Category','calorie-calculator'); ?></div>
                        <div class="right"><?php echo esc_html('Calories/Day','calorie-calculator'); ?></div>
                    </li>
                    <li class="customStyle">
                        <div class="left"><?php echo esc_html('Maintain Weight','calorie-calculator'); ?></div>
                        <div class="right" id="cfw_maintain_gain_message"></div>
                    </li>
                    <li class="customStyle">
                        <div class="left"><?php echo esc_html('Mild Weight ','calorie-calculator'); ?><span class="jsWeightSec"><?php echo esc_html('Gain','calorie-calculator'); ?></span></div>
                        <div class="right" id="cfw_mild_weight_gain"></div>
                    </li>
                    <li class="customStyle">
                        <div class="left"><?php echo esc_html('Weight','calorie-calculator'); ?> <span class="jsWeightSec"><?php echo esc_html('Gain','calorie-calculator'); ?></span></div>
                        <div class="right" id="cfw_weight_gain"></div>
                    </li>
                    <li class="customStyle">
                        <div class="left"><?php echo esc_html('Extreme Weight ','calorie-calculator'); ?><span class="jsWeightSec"><?php echo esc_html('Gain','calorie-calculator'); ?></span></div>
                        <div class="right" id="cfw_ext_weight_gain"></div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="wpb_annual_result_table">
        <div class="cfw_calc_message"></div>
    </div>
    <div class="cfw_errormessage"></div>
<?php
$output= ob_get_contents();
        ob_end_clean();
        return $output;
}
add_shortcode('calorie_calculator','cfw_calorie_calculator');