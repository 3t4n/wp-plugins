<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/*
Plugin Name: Calorie Deficit Calculator
Plugin URI: https://calculator-online.net/calorie-deficit-calculator/
Description: Calorie Deficit Calculator plugin that enables you to estimate your weight loss and maintenance calories. Do not fret as the tool instantly tells you how much calorie deficit you need to achieve your weight goals.
Version: 1.0.0
Author: Eclix Tech
Author URI: https://eclixtech.com/
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

// COCDC = calculator-online.net Calorie Deficit Calculator

if (!defined('COCDC_PLUGIN_DIR')) {
    define('COCDC_PLUGIN_DIR', plugin_dir_url(__FILE__));
}


if (!function_exists('cocdc_code_html')) {
    function cocdc_code_html()
    {
        ob_start(); // Start output buffering
        ?>
        <div>
            <div id="cl_online_calorie_deficit">
                <p id="cl_online_head" class="text_center">Calorie Deficit Calculator</p>
                <div id="cl_online_inner_div">
                    <div class="input-field">
                        <div class="col col_f imperial">
                            Imperial</div>
                        <div class="col metric">
                            Metric</div>
                    </div>
                    <p class="error"></p>
                    <div class="row">
                        <div class="col_6 ps_2">
                            <label for="gender">Gender</label>
                            <select name="gender" class="col_12 gender"  id="gender">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div class="col_6 pe_2">
                            <label for="age">Age</label> <br>
                            <input type="number" id="age" placeholder="24" class="age">
                        </div>
                    </div>
                    <div class="row">
                        <label for="ft_cm" class="ht_text">Height</label>
                    </div>
                    <div class="row">
                        <input type="number" name="ft_cm" id="ft_cm" value="145" class="col_12 ft_cm" placeholder="cm"> 
                        <select name="ft_in" id="ft_in" class="col_12 ft_in">
                            <option value="55">4ft 7in</option>
                            <option value="56">4ft 8in</option>
                            <option value="57">4ft 9in</option>
                            <option value="58">4ft 10in</option>
                            <option value="59">4ft 11in</option>
                            <option value="60">5ft 0in</option>
                            <option value="61">5ft 1in</option>
                            <option value="62">5ft 2in</option>
                            <option value="63">5ft 3in</option>
                            <option value="64">5ft 4in</option>
                            <option value="65">5ft 5in</option>
                            <option value="66">5ft 6in</option>
                            <option value="67">5ft 7in</option>
                            <option value="68">5ft 8in</option>
                            <option value="69">5ft 9in</option>
                            <option value="70">5ft 10in</option>
                            <option value="71">5ft 11in</option>
                            <option value="72">6ft 0in</option>
                            <option value="73">6ft 1in</option>
                            <option value="74">6ft 2in</option>
                            <option value="75">6ft 3in</option>
                            <option value="76">6ft 4in</option>
                            <option value="77">6ft 5in</option>
                            <option value="78">6ft 6in</option>
                            <option value="79">6ft 7in</option>
                            <option value="80">6ft 8in</option>
                            <option value="81">6ft 9in</option>
                            <option value="82">6ft 10in</option>
                            <option value="83">6ft 11in</option>
                            <option value="84">7ft 0in</option>
                        </select>
                    </div>
                    <div class="row">
                        <label for="activity">Activity Level</label>
                    </div>
                    <select class="row activity" name="activity" id="activity">
                        <option value="1.2">No sport/exercise</option>
                        <option value="1.375">Light activity (sport 1-3 times per week)</option>
                        <option value="1.55" selected="">Moderate activity (sport 3-5 times per week)</option>
                        <option value="1.725">High activity (everyday exercise)</option>
                        <option value="1.9">Extreme activity (professional athlete)</option>
                    </select>
                    <div class="row">
                        <div class="col_6 ps_2">
                            <label for="cr_weight" class="cw_text">Current Weight (lbs)</label> <br>
                            <input type="number" id="lbs_weight" class="lbs_weight" placeholder="lbs">
                        </div>
                        <div class="col_6 pe_2">
                            <label for="tr_weight" class="trw_text">Target Weight (lbs)</label> <br>
                            <input type="number" id="tr_weight" placeholder="lbs" class="tr_weight">
                        </div>
                    </div>
                    <div class="row button">
                        <button onclick="calculateSum(this)">Calculate</button>
                    </div>
                    <div id="result" class="result"></div>
                </div>
                <p id="cl_online_bottom">Provided by Calculator-online.net</p>
            </div>
        </div>
        <?php
        $plugin_html = ob_get_clean();

        return $plugin_html;
    }
    add_shortcode('cocdc-calorie-deficit', 'cocdc_code_html');
}

if (!function_exists('cocdc_plugin_scripts')) {
    function cocdc_plugin_scripts()
    {
        wp_enqueue_style('calorie-css', COCDC_PLUGIN_DIR . 'css/style.css');
        wp_enqueue_script('calorie-js', COCDC_PLUGIN_DIR . 'js/main.js', array('jquery'), '1.0.0', true);
    }
    add_action('wp_enqueue_scripts', 'cocdc_plugin_scripts');
}

?>
