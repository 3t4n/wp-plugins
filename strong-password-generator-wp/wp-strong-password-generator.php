<?php
/*
Plugin Name: Strong Password Generator WP
Description: Strong Password Generator for WordPress is a plugin that can generate random strong passwords of length upto 256 using small letters, capitals, numbers, symbols and their combinations.
Version:     1.0.1
Author:      Astranix Technologies Pvt. Ltd.
Author URI:  https://astranix.com
License:     GPL2 or later
Text-domain: strong-password-generator-wp
*/

include_once('wp-strong-password-generator-widget.php');

function strong_password_generator_ui()
{
    return '
    <style>
        #strong-password-generator #passerror{
            color:red;
            height:20px;
        }

        #strong-password-generator #passresult{
            color:green;
           }
           
    </style>
    <div id="strong-password-generator" >
    
        <label>Password Length:</label>
        <br>
        <input type="number" value="16" min=6  max=256 id="passlength"/>
        <br>
        <br>
        <input type="checkbox" checked id="includesmall"/> <label>'.__('Include Small Letters','strong-password-generator-wp').' [abcdefghijklmnopqrstuvwxyz]</label><br>
        <input type="checkbox" checked id="includenumber"/> <label>'.__('Include Numbers', 'strong-password-generator-wp').' [0123456789]</label><br>
        <input type="checkbox" checked id="includecaps"/> <label>'.__('Include Capital Letters', 'strong-password-generator-wp').' [ABCDEFGHIJKLMNOPQRSTUVWXYZ]</label><br>
        <input type="checkbox" checked id="includespecial"/> <label>'.__('Include Special Characters', 'strong-password-generator-wp').' [~`!@#$%^&*()-_+={}[]|/\:;"<>,\'.?]</label>
        <br>
            <div id="passerror"></div>
        <br>
        <input type="submit" onclick="generate();" value="'.__('Generate', 'strong-password-generator-wp').'"/>
        <br>
        <br>
        <input type="text" id="passresult"/>
        <br>
        <br>
        <input type="submit" onclick="copytoclipboard();" value="'.__('Copy', 'strong-password-generator-wp').'"/>
    </div>
    <script>
        window.onload=generate;

        function generate()
        {
            var password="";
            var charlist="";
            var rand=0;
            var len=document.getElementById("passlength").value;
            var error=document.getElementById("passerror");
            var result=document.getElementById("passresult");
            var small=document.getElementById("includesmall");
            var number=document.getElementById("includenumber");
            var caps=document.getElementById("includecaps");
            var special=document.getElementById("includespecial");
            
            
            if(len<6 || len>256)
            {
                error.innerHTML="Password Length should be between 6 and 256";   
                resu5lt.value="";
            }
            else
            {
                if(small.checked)
                {
                    charlist+="abcdefghijklmnopqrstuvwxyz";
               
                }
                if(number.checked)
                {
                    charlist+="0123456789";
               
                }
                if(caps.checked)
                {  
                    charlist+="ABCDEFGHIJKLMNOPQRSTUVWXYZ";
                   
                }
                if(special.checked)
                {
                    charlist+="~`!@#$%^&*()-_+={}[]\\|\"\'/:;<>\,.?";
                }
                if(charlist.length==0)
                {
                    error.innerHTML="'.__('Error! Please Check at least one box', 'strong-password-generator-wp').'";
                    result.value="";
                }

                else
                {
                    for(i=0;i<len;i++)
                    {
                        rand=Math.floor(Math.random() * charlist.length);
                        password+=charlist[rand];
                    }

                       error.innerHTML="";
                       result.value=password;
                }
            }
        }
        function copytoclipboard()
        {
            var result=document.getElementById("passresult");
            result.select();
            document.execCommand("copy");
        }
    </script>
    ';
}

add_shortcode('strong-password-generator', 'strong_password_generator_ui');

function strong_password_generator_widget()
{
    register_widget('Strong_Password_Generator_Widget');
}

add_action('widgets_init', 'strong_password_generator_widget');
