<?php
/**
 * Plugin Name: Funny Equations
 * Description:FUNNY EQUATIONS - This is a simple mathematical equation game. You can add this a game to your wordpress page/post by adding this shortcode: [funny_equations]
 * Plugin URI: https://oleksandrustymenko.net.ua/product/funny-equations-pro/
 * Author: Oleksandr Ustymenko
 * Version: 2.0
 * Author URI: http://oleksandrustymenko.net.ua
 *
 * Text Domain: Funny Equations
 */

/*  
	Copyright 2020 oleksandr87 (email:ustymenkooleksandrnew@gmail.com)

   This program is free software; you can redistribute it and/or modify
   it under the terms of the GNU General Public License as published by
   the Free Software Foundation; either version 2 of the License, or
   (at your option) any later version.

   This program is distributed in the hope that it will be useful,
   but WITHOUT ANY WARRANTY; without even the implied warranty of
   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
   GNU General Public License for more details.

   You should have received a copy of the GNU General Public License
   along with this program; if not, write to the Free Software
   Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if(!defined('ABSPATH')) exit;

// Register of scripts and styles that are meant to appear on the front end
add_action('wp_enqueue_scripts', 'OUFunnyEquationsScripts');
function OUFunnyEquationsScripts()
{
    wp_enqueue_script( 'jquery');
    
    wp_enqueue_style( 'OUFunnyEquations-style', plugins_url('oufunny_equations.css?v=2.0', __FILE__) );
    wp_enqueue_style( 'OUFunnyEquations-google-fonts', 'https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Concert+One&display=swap', false );
}

//menu

add_action('admin_menu', 'funny_equations_menu');

function funny_equations_menu()
{
    add_menu_page('Funny Equations', 'Funny Equations', 'manage_options', 'funny_equations_m', 'funny_equations_mpage');
}

function funny_equations_mpage()
{
    $oufunnyequations_dir_im1 = plugins_url('funny-equations/images/b1.png');
    $oufunnyequations_dir_im2 = plugins_url('funny-equations/images/b2.png');
    $oufunnyequations_dir_im3 = plugins_url('funny-equations/images/screenshot-1.png');
    
    ?>
    <div style="margin: 10px; width: 500px; background: #ffffff; border: 1px solid #c3c4c7;">
        <div>
            <img src="<?php echo $oufunnyequations_dir_im1;?>" style="width: 500px; height: auto; border: none;">
        </div>
        <div style="padding: 8px 0px 0px 0px;">
            <img src="<?php echo $oufunnyequations_dir_im2;?>" style="width: 500px; height: auto; border: none;">
        </div>
        <div style="padding: 8px 0px 0px 0px;">
            <img src="<?php echo $oufunnyequations_dir_im3;?>" style="width: 500px; height: auto; border: none;">
        </div>
    </div>

    <div style="margin: 10px; width: 500px; background: #ffffff; border: 1px solid #c3c4c7;">
    
        <div style="padding: 50px 20px; font-size: 18px; text-align:center; color: #003300; line-height: 24px;">
            <b>You can buy Pro version (paid version) for 0.24$</b>
        
            <div style="padding: 25px 0px 0px 0px;">
                <a href="https://oleksandrustymenko.net.ua/product/funny-equations-pro/" style="font-size: 58px;"><b>Buy for 0.24$ </b></a>
            </div>
        </div>
    
    </div>
    <?php
}

//Shortcode
add_shortcode('funny_equations', 'OUFunnyEquationsShortcode2');

function OUFunnyEquationsShortcode2()
{
    $oufunnyequations_dir = plugin_dir_url( __FILE__ );
    ?>
    <style>
    .oufunnyequations_window
    {
        margin: 0px auto 0px auto;
        width: 500px;
        min-height: 400px;
        overflow: hidden;
        font-family: 'Concert One', cursive;
        overflow: hidden;
        color: #e0ebeb;
        border-radius: 15px;
        background-image: url("<?php echo $oufunnyequations_dir?>images/a1.png");
    }
    </style>
    <input type="hidden" autocomplete="off" class="oufunnyequations_level1_in_timer" value="90"> <!-- set timer -->

    <!-- LEVEL: Beginner -->
    <input type="hidden" autocomplete="off" class="oufunnyequations_level1_in_detect_right_answer" value="0">
    <input type="hidden" autocomplete="off" class="oufunnyequations_level1_in_right_answer" value="">
    <input type="hidden" autocomplete="off" class="oufunnyequations_level1_in_wrong_answer1" value="">
    <input type="hidden" autocomplete="off" class="oufunnyequations_level1_in_wrong_answer2" value="">

    <div class="oufunnyequations_window">
        
        <!-- Screen -->
        <div id="oufunnyequations_screen">
            
            <div class="oufunnyequations_screen_title">
                <b>FUNNY EQUATIONS</b>
            </div>
            
            <div class="oufunnyequations_menu_window">
                <div>
                    <span onclick="oufunnyequations_button_level1(); return false;" class="oufunnyequations_link_menu">Game</span>
                </div>
                <div>
                    <span onclick="oufunnyequations_button_game_help(); return false;" class="oufunnyequations_link_menu">Help</span>
                </div>
            </div>
            
        </div>
        
        <!-- Help -->
        <div id="oufunnyequations_help">
            <div style="padding: 15px; font-size: 18px; color: #e0ebeb; text-align: justify;">
                <b>FUNNY EQUATIONS</b> - This is a simple mathematical equation game. A certain amount of time is given to solve one equation. With each new equation, time will decrease by 1 second.
            </div>
            
            <div style="text-align: center;">
                    <span onclick="oufunnyequations_button_game_help_close(); return false;" class="oufunnyequations_link_menu2">Close</span>
            </div>
        </div>
        
        <div id="oufunnyequations_game_l1">
            
            <!-- equation -->
            <div class="oufunnyequations_level1w_display_formlula">
                <b><span class="oufunnyequations_level1_numbers1 oufunnyequations_level1w_display_formlula_a">0</span></b>
                <b><span class="oufunnyequations_level1_math_symbol oufunnyequations_level1w_display_formlula_b">?</span></b>
                <b><span class="oufunnyequations_level1_numbers2 oufunnyequations_level1w_display_formlula_a">0</span></b>
            </div>
            
            <div class="oufunnyequations_level1w_display_title">
                <b>Answer</b>
            </div>
                
            <!-- choose answer -->
            <div class="oufunnyequations_level1_choose oufunnyequations_level1w_display_answer_window">
                <span onclick="oufunnyequations_lev1_a(); return false;" class="oufunnyequations_level1_answer1 oufunnyequations_level1w_display_answer_padding">?</span> 
                <span onclick="oufunnyequations_lev1_b(); return false;" class="oufunnyequations_level1_answer2 oufunnyequations_level1w_display_answer_padding">?</span> 
                <span onclick="oufunnyequations_lev1_c(); return false;" class="oufunnyequations_level1_answer3 oufunnyequations_level1w_display_answer_padding">?</span>
            </div>
            
            <!-- time out -->
            <div class="oufunnyequations_level1_time_out oufunnyequations_level1w_display_timeout">
                <b>TIME OUT</b>
            </div>
                
            <!-- wrong -->
            <div class="oufunnyequations_level1_wrong oufunnyequations_level1w_display_wrong">
                <b>WRONG</b>
            </div>
                
            <!-- right -->
            <div class="oufunnyequations_level1_right oufunnyequations_level1w_display_right">
                <b>RIGHT</b>
            </div>
                
            <div class="oufunnyequations_level1w_display_footer">
                <div class="oufunnyequations_level1w_display_footer_left">
                    <span class="oufunnyequations_level1w_display_footer_leftspan"><b>Points: </b><span class="oufunnyequations_level_points">0</span></span>
                </div>
                    
                <div class="oufunnyequations_level1w_display_footer_center">
                    <span onclick="oufunnyequations_level1_exit(); return false;" class="oufunnyequations_level1w_display_footer_center_exit"><b>EXIT</b></span>
                </div>
                    
                <div class="oufunnyequations_level1w_display_footer_right">
                    <span class="oufunnyequations_level1w_display_footer_rightspan"><b>Timer: </b><span class="oufunnyequations_level_timer">90</span></span>
                </div>
            </div>
            
        </div>
        
    </div>
    
    <script>
    //Global variable    
    var oufunnyequations_timer_level; // Variable for timer (Level: Beginner). When the level starts the first time, this timer fires.
    var oufunnyequations_timer_level_next; // Variable for timer (Level: Beginner). This timer 
    var oufunnyequations_set_timer = 90; // default timer time (seconds).
    var oufunnyequations_total_answer = 0; // total correct answers.
    var oufunnyequations_dec_choose_1 = 0; // correct answer variable #1.
    var oufunnyequations_dec_choose_2 = 0; // correct answer variable #2.
    var oufunnyequations_dec_choose_3 = 0; // correct answer variable #3.
      
    //function oufunnyequations_u_Float(x) { return !!(x % 1); }    
        
    /*
    
        LEVEL #1
    
    */
    var oufunnyequationslevel1_plus = 0; // Level: Beginner = > variable: plus.
    var oufunnyequationslevel1_minus = 0; // Level: Beginner = > variable: minus.
    var oufunnyequationslevel1_mnoz = 0; // Level: Beginner = > variable: multiplication.
    var oufunnyequationslevel1_del = 0; // Level: Beginner = > variable: division.  
    var oufunnyequationslevel1_right_answer = 0; // Level: Beginner = > correct answer (There are three possible answers in the game. This variable indicates the correct answer).
    var oufunnyequationslevel1_number1 = 0; // Level: Beginner = > variable: first digit.
    var oufunnyequationslevel1_number2 = 0; // Level: Beginner = > variable: second digit.
    //var oufunnyequationslevel1_number2det = 0;
    var oufunnyequationslevel1_number3 = 0; // Level: Beginner = > variable: third digit.
    var oufunnyequationslevel1_number4 = 0; // Level: Beginner = > variable: fourth digit.
    // Level: Beginner = > variables: oufunnyequationslevel1_check_sum, oufunnyequationslevel1_check_sum2, oufunnyequationslevel1_check_sum3
    // These variables perform mathematical functions. such as subtraction, multiplication, division or addition.
    var oufunnyequationslevel1_check_sum = 0;
    var oufunnyequationslevel1_check_sum2 = 0;
    var oufunnyequationslevel1_check_sum3 = 0;   
       
    jQuery(document).ready(function(){
        clearInterval(oufunnyequations_timer_level); // Level: Beginner = > stop the timer
        clearInterval(oufunnyequations_timer_level_next); // Level: Beginner = > stop the timer
    });
        
    function oufunnyequations_ux_Float(x) { return !!(x % 1); } 
        
    function oufunnyequations_button_level1()
    {
    	jQuery(".oufunnyequations_level1w_display_timeout").hide();
        jQuery(".oufunnyequations_level1w_display_wrong").hide();
        jQuery(".ufunnyequations_level1w_display_right").hide();
        jQuery(".oufunnyequations_level1_time_out").hide(); 
        jQuery(".oufunnyequations_level1_choose").show(); 
        jQuery("#oufunnyequations_screen").hide();
        jQuery("#oufunnyequations_game_l1").show();
        
        clearInterval(oufunnyequations_timer_level); // Level: Beginner = > stop the timer
        clearInterval(oufunnyequations_timer_level_next); // Level: Beginner = > stop the timer
        oufunnyequations_set_timer = 90; // timer reset (default: 90 seconds)
        
        // Math symbol generator
        var array_math_symbol = ["+", "-", "*", "/"];
        var math_symbol = array_math_symbol[Math.floor(Math.random()*array_math_symbol.length)];
        
        // definition of a mathematical sign
        if(1 == 1)
        {
            if(math_symbol == '+')
            {
                oufunnyequationslevel1_plus = 1; // math sign: +
            }
            else
            if(math_symbol == '-')
            {
                oufunnyequationslevel1_minus = 1; // math sign: -
            }
            else
            if(math_symbol == '*')
            {
                oufunnyequationslevel1_mnoz = 1; // math sign: *
            }
            else
            if(math_symbol == '/')
            {
                oufunnyequationslevel1_del = 1; // math sign: /
            }
        }
        
        if(2 == 2)
        {
            oufunnyequationslevel1_check_sum = 0;
            if(oufunnyequationslevel1_plus ==1)
            {
                
                oufunnyequationslevel1_number1 = Math.floor((Math.random() * 99) + 1); 
                oufunnyequationslevel1_number2 = Math.floor((Math.random() * 99) + 1); 
                
                oufunnyequationslevel1_check_sum = oufunnyequationslevel1_number1 + oufunnyequationslevel1_number2;
                
                oufunnyequationslevel1_right_answer = oufunnyequationslevel1_check_sum; 
                
                if(oufunnyequationslevel1_check_sum >= 100)
                {
                    for(i1 = 0; i1<15500; i1++)
                    {
                        oufunnyequationslevel1_number2 = Math.floor((Math.random() * 99) + 1); // random number generator from 0 to 99 (second digit)
                        oufunnyequationslevel1_check_sum = oufunnyequationslevel1_number1 + oufunnyequationslevel1_number2; // get the amount
                        
                        if(oufunnyequationslevel1_check_sum <= 99)
                        {
                            oufunnyequationslevel1_right_answer = oufunnyequationslevel1_check_sum; // get right answer
                            break;
                        }
                    }
                }
            }
            else
            if(oufunnyequationslevel1_minus == 1)
            {
                // math sign: -
                oufunnyequationslevel1_number1 = Math.floor((Math.random() * 99) + 1); // random number generator from 0 to 99 (the first digit)
                oufunnyequationslevel1_number2 = Math.floor((Math.random() * 99) + 1); // random number generator from 0 to 99 (second digit)
                
                oufunnyequationslevel1_check_sum = oufunnyequationslevel1_number1 + oufunnyequationslevel1_number2; // get the amount
                oufunnyequationslevel1_check_sum2 = oufunnyequationslevel1_number1 - oufunnyequationslevel1_number2; // subtract
                oufunnyequationslevel1_right_answer = oufunnyequationslevel1_check_sum2; // get right answer
                
                //if the sum is more than 100 or less than 0, re-run the random number generator
                if(oufunnyequationslevel1_check_sum >= 100 || oufunnyequationslevel1_check_sum2 <=0)
                {
                    for(i1 = 0; i1<15500; i1++)
                    {
                        oufunnyequationslevel1_number2 = Math.floor((Math.random() * 99) + 1); // random number generator from 0 to 99 (second digit)
                        oufunnyequationslevel1_check_sum = oufunnyequationslevel1_number1 + oufunnyequationslevel1_number2; // get the amount
                        oufunnyequationslevel1_check_sum2 = oufunnyequationslevel1_number1 - oufunnyequationslevel1_number2; // subtract
                        
                        if(oufunnyequationslevel1_check_sum <= 99 && oufunnyequationslevel1_check_sum2 >=1)
                        {
                            oufunnyequationslevel1_right_answer = oufunnyequationslevel1_check_sum2; // get right answer
                            break;
                        }
                        
                    }
                }
            }
            else
            if(oufunnyequationslevel1_mnoz == 1)
            {
                // math sign: *
                oufunnyequationslevel1_number1 = Math.floor((Math.random() * 10) + 1); // random number generator from 0 to 10 (the first digit)
                
                oufunnyequationslevel1_number2 = Math.floor((Math.random() * 9) + 1); // random number generator from 0 to 9 (second digit)
                
                oufunnyequationslevel1_check_sum = oufunnyequationslevel1_number1 * oufunnyequationslevel1_number2; // get the amount
                oufunnyequationslevel1_right_answer = oufunnyequationslevel1_check_sum; // get right answer
                
                //if the sum is more than 100, re-run the random number generator
                if(oufunnyequationslevel1_check_sum >= 100)
                {
                    for(i1 = 0; i1<15500; i1++)
                    {
                        oufunnyequationslevel1_number2 = Math.floor((Math.random() * 9) + 1); // random number generator from 0 to 9 (second digit)
                        oufunnyequationslevel1_check_sum = oufunnyequationslevel1_number1 * oufunnyequationslevel1_number2; // get the amount
                        
                        if(oufunnyequationslevel1_check_sum <= 99)
                        {
                            oufunnyequationslevel1_right_answer = oufunnyequationslevel1_check_sum; // get right answer
                            break;
                        }
                        
                    }
                }
            }
            else
            if(oufunnyequationslevel1_del == 1)
            {
                // math sign: /
                oufunnyequationslevel1_number1 = Math.floor((Math.random() * 99) + 1); // random number generator from 0 to 99 (the first digit)
                
                if(oufunnyequationslevel1_number1 % 2 != 0)
                {
                    for(var i6 = 0; i6<1500; i6++)
                    {
                        oufunnyequationslevel1_number1 = Math.floor((Math.random() * 99) + 1); // random number generator from 0 to 10 (the first digit)
                        
                        if(oufunnyequationslevel1_number1 % 2 == 0)
                        {
                            break;
                        }
                        
                    }
                }
                
                oufunnyequationslevel1_number2 = Math.floor((Math.random() * 9) + 1); // random number generator from 0 to 9 (second digit)
                oufunnyequationslevel1_check_sum2 =  oufunnyequationslevel1_number1 / oufunnyequationslevel1_number2; // get the amount
                oufunnyequationslevel1_check_sum3 = oufunnyequations_ux_Float(oufunnyequationslevel1_check_sum2); // number is integer
                
                if(oufunnyequationslevel1_check_sum3 == false)
                {
                    oufunnyequationslevel1_right_answer = oufunnyequationslevel1_check_sum2; // get right answer
                }
                if(oufunnyequationslevel1_check_sum3 == true)
                {
                    for(i1 = 0; i1<15500; i1++)
                    {
                        oufunnyequationslevel1_number2 = Math.floor((Math.random() * 9) + 1); // random number generator from 0 to 99 (the first digit)
                        oufunnyequationslevel1_check_sum2 =  oufunnyequationslevel1_number1 / oufunnyequationslevel1_number2; // get the amount
                        oufunnyequationslevel1_check_sum3 = oufunnyequations_ux_Float(oufunnyequationslevel1_check_sum2); // number is integer
                        
                        if(oufunnyequationslevel1_check_sum3 == false)
                        {
                            oufunnyequationslevel1_right_answer = oufunnyequationslevel1_check_sum2; // get right answer
                            break;
                        }
                        
                    }
                }
            }
            
            
        }
        
        oufunnyequationslevel1_number3 = Math.floor((Math.random() * 99) + 1); // random number generator from 0 to 99 (third digit)
        oufunnyequationslevel1_number4 = Math.floor((Math.random() * 99) + 1); // random number generator from 0 to 99 (fourth digit)
        
        if(5 == 5)
        {
            if(oufunnyequationslevel1_number3 == oufunnyequationslevel1_right_answer)
            {
                oufunnyequationslevel1_number3 = Math.floor((Math.random() * 99) + 1); // random number generator from 0 to 99 (third digit)
            }
            
            if(oufunnyequationslevel1_number4 == oufunnyequationslevel1_right_answer)
            {
                oufunnyequationslevel1_number4 = Math.floor((Math.random() * 99) + 1); // random number generator from 0 to 99 (fourth digit)
            }
        }
        
        // display the correct answer on one of 3 options
        var array_math_answer = ["1", "2", "3"];
        var math_answer = array_math_answer[Math.floor(Math.random()*array_math_answer.length)];
        
        // correct answer position distribution block
        if(3 == 3)
        {
            if(math_answer == 1)
            {
                jQuery(".oufunnyequations_level1_answer1").html(oufunnyequationslevel1_right_answer); // position #1
                jQuery(".oufunnyequations_level1_in_detect_right_answer").val("1"); // add position #1 to input
            }
            else
            if(math_answer == 2)
            {
                jQuery(".oufunnyequations_level1_answer2").html(oufunnyequationslevel1_right_answer); // position #2
                jQuery(".oufunnyequations_level1_in_detect_right_answer").val("2"); // add position #2 to input
            }
            else
            if(math_answer == 3)
            {
                jQuery(".oufunnyequations_level1_answer3").html(oufunnyequationslevel1_right_answer); // position #3
                jQuery(".oufunnyequations_level1_in_detect_right_answer").val("3"); // add position #3 to input
            }
        }
        
        // position selection for two incorrect answers
        var array_math_answer_2 = ["1", "2"];
        var math_answer_2 = array_math_answer_2[Math.floor(Math.random()*array_math_answer_2.length)];
        
        // positioning for two incorrect answers
        if(7==7)
        {
            if(math_answer == 1 && math_answer_2 == 1)
            {
                jQuery(".oufunnyequations_level1_answer2").html(oufunnyequationslevel1_number3); // positiom #2
                jQuery(".oufunnyequations_level1_answer3").html(oufunnyequationslevel1_number4); // positiom #3
            }
            else
            if(math_answer == 1 && math_answer_2 == 2)
            {
                jQuery(".oufunnyequations_level1_answer3").html(oufunnyequationslevel1_number3); // positiom #3
                jQuery(".oufunnyequations_level1_answer2").html(oufunnyequationslevel1_number4); // positiom #2
            }
            else
            if(math_answer == 2 && math_answer_2 == 1)
            {
                jQuery(".oufunnyequations_level1_answer1").html(oufunnyequationslevel1_number3); // positiom #1
                jQuery(".oufunnyequations_level1_answer3").html(oufunnyequationslevel1_number4); // positiom #3
            }
            else
            if(math_answer == 2 && math_answer_2 == 2)
            {
                jQuery(".oufunnyequations_level1_answer3").html(oufunnyequationslevel1_number3); // positiom #3
                jQuery(".oufunnyequations_level1_answer1").html(oufunnyequationslevel1_number4); // positiom #1
            }
            else
            if(math_answer == 3 && math_answer_2 == 1)
            {
                jQuery(".oufunnyequations_level1_answer1").html(oufunnyequationslevel1_number3); // positiom #1
                jQuery(".oufunnyequations_level1_answer2").html(oufunnyequationslevel1_number4); // positiom #2
            }
            else
            if(math_answer == 3 && math_answer_2 == 2)
            {
                jQuery(".oufunnyequations_level1_answer2").html(oufunnyequationslevel1_number3); // positiom #2
                jQuery(".oufunnyequations_level1_answer1").html(oufunnyequationslevel1_number4); // positiom #1
            }
        }
        
        /*
        
                SHOW
        
        */
        jQuery(".oufunnyequations_level1_numbers1").html(oufunnyequationslevel1_number1);
        
        if(math_symbol == '*')
        {
            math_symbol = '&#8226;';
        }
        
        jQuery(".oufunnyequations_level1w_display_formlula_b").html(math_symbol);
        jQuery(".oufunnyequations_level1_numbers2").html(oufunnyequationslevel1_number2);
        
        /*
         
                TIMER
         
        */
        oufunnyequations_timer_level = setInterval(oufunnyequations_level1_timer, 1000); // run timer
    }
    
    // function: timer (LEVEL: Beginner)
    function oufunnyequations_level1_timer()
    {
        if(oufunnyequations_set_timer >=1)
        {
            oufunnyequations_set_timer--;
            jQuery(".oufunnyequations_level_timer").html(oufunnyequations_set_timer);
        }
        else
        {
            clearInterval(oufunnyequations_timer_level);
            jQuery(".oufunnyequations_level_timer").html("0");
            
            jQuery(".oufunnyequations_level1_choose").hide(); 
            jQuery(".oufunnyequations_level1_time_out").show(); 
        }
        
    }  
       
    // ----------------------------------------------------------
        
    function oufunnyequations_level1_exit()
    {
        jQuery("#oufunnyequations_game_l1").hide();
        jQuery("#oufunnyequations_screen").show();
        clearInterval(oufunnyequations_timer_level);
        oufunnyequations_set_timer = 90;
        jQuery(".oufunnyequations_level_timer").html(oufunnyequations_set_timer);
        jQuery(".oufunnyequations_level_points").html("0");
        oufunnyequations_total_answer = 0;
        
    }
         
    function oufunnyequations_button_game_help()
    {
        jQuery("#oufunnyequations_screen").hide();
        jQuery("#oufunnyequations_help").show();
    }
        
    function oufunnyequations_button_game_help_close()
    {
        jQuery("#oufunnyequations_help").hide();
        jQuery("#oufunnyequations_screen").show();
    }
        
    function oufunnyequations_button_game_close()
    {
        jQuery("#oufunnyequations_game").hide();
        jQuery("#oufunnyequations_screen").show();
    }
        
    // function: first option answer (position: left)
    function oufunnyequations_lev1_a()
    {
        oufunnyequations_dec_choose_1 = jQuery(".oufunnyequations_level1_in_detect_right_answer").val();
        
        if(oufunnyequations_dec_choose_1 == 1)
        {
            oufunnyequations_total_answer++; 
            jQuery(".oufunnyequations_level_points").html(oufunnyequations_total_answer);
            jQuery(".oufunnyequations_level1_choose").hide();
            jQuery(".oufunnyequations_level1_right").show();
            clearInterval(oufunnyequations_timer_level);
            oufunnyequations_timer_level_next = setInterval(oufunnyequations_lev1_run_next, 1600);
        }
        else
        {
            jQuery(".oufunnyequations_level1_choose").hide();
            jQuery(".oufunnyequations_level1_wrong").show();
            clearInterval(oufunnyequations_timer_level); 
            oufunnyequations_timer_level_next = setInterval(oufunnyequations_lev1_run_next, 1600);
        }
    }
    
    // function: second option answer (position: center)
    function oufunnyequations_lev1_b()
    {
        oufunnyequations_dec_choose_2 = jQuery(".oufunnyequations_level1_in_detect_right_answer").val();
        
        if(oufunnyequations_dec_choose_2 == 2)
        {
            oufunnyequations_total_answer++; 
            jQuery(".oufunnyequations_level_points").html(oufunnyequations_total_answer);
            jQuery(".oufunnyequations_level1_choose").hide();
            jQuery(".oufunnyequations_level1_right").show();
            clearInterval(oufunnyequations_timer_level);
            oufunnyequations_timer_level_next = setInterval(oufunnyequations_lev1_run_next, 1600);
        }
        else
        {
            jQuery(".oufunnyequations_level1_choose").hide();
            jQuery(".oufunnyequations_level1_wrong").show();
            clearInterval(oufunnyequations_timer_level);
            oufunnyequations_timer_level_next = setInterval(oufunnyequations_lev1_run_next, 1600);
        }
    }
    
    // function: third option answer (position: right)
    function oufunnyequations_lev1_c()
    {
        oufunnyequations_dec_choose_3 = jQuery(".oufunnyequations_level1_in_detect_right_answer").val();
        
        if(oufunnyequations_dec_choose_3 == 3)
        {
            oufunnyequations_total_answer++; 
            jQuery(".oufunnyequations_level_points").html(oufunnyequations_total_answer);
            jQuery(".oufunnyequations_level1_choose").hide();
            jQuery(".oufunnyequations_level1_right").show();
            clearInterval(oufunnyequations_timer_level);
            oufunnyequations_timer_level_next = setInterval(oufunnyequations_lev1_run_next, 1600);
        }
        else
        {
            jQuery(".oufunnyequations_level1_choose").hide();
            jQuery(".oufunnyequations_level1_wrong").show();
            clearInterval(oufunnyequations_timer_level);
            oufunnyequations_timer_level_next = setInterval(oufunnyequations_lev1_run_next, 1600);
        }
    }
        
        
    function oufunnyequations_lev1_run_next()
    {
        var s_det_timer_next = parseInt(jQuery(".oufunnyequations_level1_in_timer").val());
        var s_det_timer_next_new = s_det_timer_next - 1;
        jQuery(".oufunnyequations_level1_in_timer").val(s_det_timer_next_new);
        
        clearInterval(oufunnyequations_timer_level_next); // Level: Beginner = > stop the timer
        jQuery(".oufunnyequations_level1_right").hide();
        jQuery(".oufunnyequations_level1_wrong").hide();
        
        if(s_det_timer_next_new >=15)
        {
            oufunnyequations_set_timer = s_det_timer_next_new; 
            jQuery(".oufunnyequations_level_timer").html(oufunnyequations_set_timer);
        }
        else
        {
            oufunnyequations_set_timer = 15;
            jQuery(".oufunnyequations_level_timer").html(oufunnyequations_set_timer);
        }
        
        jQuery(".oufunnyequations_level1_choose").show();
        clearInterval(oufunnyequations_timer_level); // Level: Beginner = > stop the timer
        clearInterval(oufunnyequations_timer_level_next); // Level: Beginner = > stop the timer
        
        jQuery(".oufunnyequations_level1_in_timer").val(oufunnyequations_set_timer); // add timer to input
        oufunnyequationslevel1_plus = 0; // rest (+)
        oufunnyequationslevel1_minus = 0; // reset (-)
        oufunnyequationslevel1_mnoz = 0; // reset (+)
        oufunnyequationslevel1_del = 0; // reset (/)
        oufunnyequationslevel1_number1 = 0; // reset the first digit
        oufunnyequationslevel1_number2 = 0; // reset second digit
        oufunnyequationslevel1_number3 = 0; // reset third digit
        oufunnyequationslevel1_number4 = 0; // reset fourth digit
        oufunnyequationslevel1_check_sum = 0; // reset equation
        oufunnyequationslevel1_check_sum2 = 0; // reset equation
        oufunnyequationslevel1_check_sum3 = 0; // reset equation
        oufunnyequationslevel1_right_answer = 0; //reset correct answer
        
        // Math symbol generator
        var array_math_symbol = ["+", "-", "*", "/"];
        var math_symbol = array_math_symbol[Math.floor(Math.random()*array_math_symbol.length)];
        
        // definition of a mathematical sign
        if(1 == 1)
        {
            if(math_symbol == '+')
            {
                oufunnyequationslevel1_plus = 1; // math sign: +
            }
            else
            if(math_symbol == '-')
            {
                oufunnyequationslevel1_minus = 1; // math sign: -
            }
            else
            if(math_symbol == '*')
            {
                oufunnyequationslevel1_mnoz = 1; // math sign: *
            }
            else
            if(math_symbol == '/')
            {
                oufunnyequationslevel1_del = 1; // math sign: /
            }
        }
        
        // In this block the equation will be created.
        if(2 == 2)
        {
            if(oufunnyequationslevel1_plus ==1)
            {
                // math sign: +
                oufunnyequationslevel1_number1 = Math.floor((Math.random() * 99) + 1); // random number generator from 0 to 99 (the first digit)
                oufunnyequationslevel1_number2 = Math.floor((Math.random() * 99) + 1); // random number generator from 0 to 99 (second digit)
                oufunnyequationslevel1_check_sum = oufunnyequationslevel1_number1 + oufunnyequationslevel1_number2; // get the amount
                oufunnyequationslevel1_right_answer = oufunnyequationslevel1_check_sum; // get right answer
                
                //if the sum is more than 100, re-run the random number generator
                if(oufunnyequationslevel1_check_sum >= 100)
                {
                    for(i1 = 0; i1<15500; i1++)
                    {
                        oufunnyequationslevel1_number2 = Math.floor((Math.random() * 99) + 1); // random number generator from 0 to 99 (second digit)
                        oufunnyequationslevel1_check_sum = oufunnyequationslevel1_number1 + oufunnyequationslevel1_number2; // get the amount
                        
                        if(oufunnyequationslevel1_check_sum <= 99)
                        {
                            oufunnyequationslevel1_right_answer = oufunnyequationslevel1_check_sum; // get right answer
                            break;
                        }
                        
                    }
                }
                
            }
            else
            if(oufunnyequationslevel1_minus == 1)
            {
                // math sign: -
                oufunnyequationslevel1_number1 = Math.floor((Math.random() * 99) + 1); // random number generator from 0 to 99 (the first digit)
                oufunnyequationslevel1_number2 = Math.floor((Math.random() * 99) + 1); // random number generator from 0 to 99 (second digit)
                
                oufunnyequationslevel1_check_sum = oufunnyequationslevel1_number1 + oufunnyequationslevel1_number2; // get the amount
                oufunnyequationslevel1_check_sum2 = oufunnyequationslevel1_number1 - oufunnyequationslevel1_number2; // subtract
                oufunnyequationslevel1_right_answer = oufunnyequationslevel1_check_sum2; // get right answer
                
                //if the sum is more than 100 or less than 0, re-run the random number generator
                if(oufunnyequationslevel1_check_sum >= 100 || oufunnyequationslevel1_check_sum2 <=0)
                {
                    for(i1 = 0; i1<15500; i1++)
                    {
                        oufunnyequationslevel1_number2 = Math.floor((Math.random() * 99) + 1); // random number generator from 0 to 99 (second digit)
                        oufunnyequationslevel1_check_sum = oufunnyequationslevel1_number1 + oufunnyequationslevel1_number2; // get the amount
                        oufunnyequationslevel1_check_sum2 = oufunnyequationslevel1_number1 - oufunnyequationslevel1_number2; // subtract
                        
                        if(oufunnyequationslevel1_check_sum <= 99 && oufunnyequationslevel1_check_sum2 >=1)
                        {
                            oufunnyequationslevel1_right_answer = oufunnyequationslevel1_check_sum2; // get right answer
                            break;
                        }
                        
                    }
                }
            }
            else
            if(oufunnyequationslevel1_mnoz == 1)
            {
                // math sign: *
                oufunnyequationslevel1_number1 = Math.floor((Math.random() * 10) + 1); // random number generator from 0 to 10 (the first digit)
                oufunnyequationslevel1_number2 = Math.floor((Math.random() * 9) + 1); // random number generator from 0 to 9 (second digit)
                
                oufunnyequationslevel1_check_sum = oufunnyequationslevel1_number1 * oufunnyequationslevel1_number2; // get the amount
                oufunnyequationslevel1_right_answer = oufunnyequationslevel1_check_sum; // get right answer
                
                //if the sum is more than 100, re-run the random number generator
                if(oufunnyequationslevel1_check_sum >= 100)
                {
                    for(i1 = 0; i1<15500; i1++)
                    {
                        oufunnyequationslevel1_number2 = Math.floor((Math.random() * 9) + 1); // random number generator from 0 to 9 (second digit)
                        oufunnyequationslevel1_check_sum = oufunnyequationslevel1_number1 * oufunnyequationslevel1_number2; // get the amount
                        
                        if(oufunnyequationslevel1_check_sum <= 99)
                        {
                            oufunnyequationslevel1_right_answer = oufunnyequationslevel1_check_sum; // get right answer
                            break;
                        }
                        
                    }
                }
            }
            else
            if(oufunnyequationslevel1_del == 1)
            {
                // math sign: /
                oufunnyequationslevel1_number1 = Math.floor((Math.random() * 99) + 1); // random number generator from 0 to 99 (the first digit)
                
                if(oufunnyequationslevel1_number1 % 2 != 0)
                {
                    for(var i6 = 0; i6<1500; i6++)
                    {
                        oufunnyequationslevel1_number1 = Math.floor((Math.random() * 99) + 1); // random number generator from 0 to 10 (the first digit)
                        
                        if(oufunnyequationslevel1_number1 % 2 == 0)
                        {
                            break;
                        }
                        
                    }
                }
                
                oufunnyequationslevel1_number2 = Math.floor((Math.random() * 9) + 1); // random number generator from 0 to 9 (second digit)
                oufunnyequationslevel1_check_sum2 =  oufunnyequationslevel1_number1 / oufunnyequationslevel1_number2; // get the amount
                oufunnyequationslevel1_check_sum3 = oufunnyequations_ux_Float(oufunnyequationslevel1_check_sum2); // number is integer
                
                if(oufunnyequationslevel1_check_sum3 == false)
                {
                    oufunnyequationslevel1_right_answer = oufunnyequationslevel1_check_sum2; // get right answer
                }
                if(oufunnyequationslevel1_check_sum3 == true)
                {
                    for(i1 = 0; i1<15500; i1++)
                    {
                        oufunnyequationslevel1_number2 = Math.floor((Math.random() * 9) + 1); // random number generator from 0 to 99 (the first digit)
                        oufunnyequationslevel1_check_sum2 =  oufunnyequationslevel1_number1 / oufunnyequationslevel1_number2; // get the amount
                        oufunnyequationslevel1_check_sum3 = oufunnyequations_ux_Float(oufunnyequationslevel1_check_sum2); // number is integer
                        
                        if(oufunnyequationslevel1_check_sum3 == false)
                        {
                            oufunnyequationslevel1_right_answer = oufunnyequationslevel1_check_sum2; // get right answer
                            break;
                        }
                        
                    }
                }
            }    
        }
        
        oufunnyequationslevel1_number3 = Math.floor((Math.random() * 99) + 1); // random number generator from 0 to 99 (third digit)
        oufunnyequationslevel1_number4 = Math.floor((Math.random() * 99) + 1); // random number generator from 0 to 99 (fourth digit)
        
        if(5 == 5)
        {
            // check the number with the correct answer
            if(oufunnyequationslevel1_number3 == oufunnyequationslevel1_right_answer)
            {
                oufunnyequationslevel1_number3 = Math.floor((Math.random() * 99) + 1); // random number generator from 0 to 99 (third digit)
            }
            
            if(oufunnyequationslevel1_number4 == oufunnyequationslevel1_right_answer)
            {
                oufunnyequationslevel1_number4 = Math.floor((Math.random() * 99) + 1); // random number generator from 0 to 99 (fourth digit)
            }
        }
        
        // display the correct answer on one of 3 options
        var array_math_answer = ["1", "2", "3"];
        var math_answer = array_math_answer[Math.floor(Math.random()*array_math_answer.length)];
        
        // correct answer position distribution block
        if(3 == 3)
        {
            if(math_answer == 1)
            {
                jQuery(".oufunnyequations_level1_answer1").html(oufunnyequationslevel1_right_answer); // position #1
                jQuery(".oufunnyequations_level1_in_detect_right_answer").val("1"); // add position #1 to input
            }
            else
            if(math_answer == 2)
            {
                jQuery(".oufunnyequations_level1_answer2").html(oufunnyequationslevel1_right_answer); // position #2
                jQuery(".oufunnyequations_level1_in_detect_right_answer").val("2"); // add position #2 to input
            }
            else
            if(math_answer == 3)
            {
                jQuery(".oufunnyequations_level1_answer3").html(oufunnyequationslevel1_right_answer); // position #3
                jQuery(".oufunnyequations_level1_in_detect_right_answer").val("3"); // add position #3 to input
            }
        }
        
        // position selection for two incorrect answers
        var array_math_answer_2 = ["1", "2"];
        var math_answer_2 = array_math_answer_2[Math.floor(Math.random()*array_math_answer_2.length)];
        
        // positioning for two incorrect answers
        if(7==7)
        {
            if(math_answer == 1 && math_answer_2 == 1)
            {
                jQuery(".oufunnyequations_level1_answer2").html(oufunnyequationslevel1_number3); // positiom #2
                jQuery(".oufunnyequations_level1_answer3").html(oufunnyequationslevel1_number4); // positiom #3
            }
            else
            if(math_answer == 1 && math_answer_2 == 2)
            {
                jQuery(".oufunnyequations_level1_answer3").html(oufunnyequationslevel1_number3); // positiom #3
                jQuery(".oufunnyequations_level1_answer2").html(oufunnyequationslevel1_number4); // positiom #2
            }
            else
            if(math_answer == 2 && math_answer_2 == 1)
            {
                jQuery(".oufunnyequations_level1_answer1").html(oufunnyequationslevel1_number3); // positiom #1
                jQuery(".oufunnyequations_level1_answer3").html(oufunnyequationslevel1_number4); // positiom #3
            }
            else
            if(math_answer == 2 && math_answer_2 == 2)
            {
                jQuery(".oufunnyequations_level1_answer3").html(oufunnyequationslevel1_number3); // positiom #3
                jQuery(".oufunnyequations_level1_answer1").html(oufunnyequationslevel1_number4); // positiom #1
            }
            else
            if(math_answer == 3 && math_answer_2 == 1)
            {
                jQuery(".oufunnyequations_level1_answer1").html(oufunnyequationslevel1_number3); // positiom #1
                jQuery(".oufunnyequations_level1_answer2").html(oufunnyequationslevel1_number4); // positiom #2
            }
            else
            if(math_answer == 3 && math_answer_2 == 2)
            {
                jQuery(".oufunnyequations_level1_answer2").html(oufunnyequationslevel1_number3); // positiom #2
                jQuery(".oufunnyequations_level1_answer1").html(oufunnyequationslevel1_number4); // positiom #1
            }
        }
        
        jQuery(".oufunnyequations_level1_numbers1").html(oufunnyequationslevel1_number1); // display first number
        
        // convert math multiplication sign and display this sign
        if(8 == 8)
        {
            if(math_symbol == '*')
            {
                jQuery(".oufunnyequations_level1_math_symbol").html("&#8226;");
            }
            else
            {
                jQuery(".oufunnyequations_level1_math_symbol").html(math_symbol);
            }
        }
        jQuery(".oufunnyequations_level1_numbers2").html(oufunnyequationslevel1_number2);
        
        
        // add answer options to input
        jQuery(".oufunnyequations_level1_in_right_answer").val(oufunnyequationslevel1_right_answer);
        jQuery(".oufunnyequations_level1_in_wrong_answer1").val(oufunnyequationslevel1_number3);
        jQuery(".oufunnyequations_level1_in_wrong_answer2").val(oufunnyequationslevel1_number4);
        
        oufunnyequations_timer_level = setInterval(oufunnyequations_level1_timer, 1000); // run timer
    }
    </script>
    <?php
}
?>
