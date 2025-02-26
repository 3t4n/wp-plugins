<?php
/*
Plugin Name: MasoomShahid
Plugin URI: http://www.pluginha.com
Version: 1.1
Author: Morteza
Description: نمایش تصادفی بیش از هزاران پیامک به مناسبت شهادت ائمه معوصومین علیه السلام.
License: GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
License:
 ==============================================================================
 Copyright 2014-2015 pluginha  (email : mortezanano@gmail.com)

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
 Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/
defined('ABSPATH') or die('&lt;h3&gt;Access denied!');
define('ShahadatMasoom_ver','1.0');
define('ShahadatMasoom_dir',dirname(__FILE__));
define ('ShahadatMasoom_uri', get_option('siteurl').'/wp-content/plugins/MasoomShahid');

function random_prophet_sh_display($args) {
	extract($args);
   echo $before_widget;
   echo $before_title . "پیامک شهدات پیامبر اکرم (ص)" . $after_title;
   echo $after_widget;

       $quotes = file ("wp-content/plugins/MasoomShahid/text/prophet_sh.txt");
    $num = rand (0, (intval(count($quotes))-1));

	echo "<p id='quotes'>$quotes[$num]</p>";

	wp_register_style( 'style', plugins_url('style.css', __FILE__) );
	wp_enqueue_style( 'style' );
    
}

wp_register_sidebar_widget(
    'random_prophet_sh_1',        
    'پیامک شهدات پیامبر اکرم (ص)',           
    'random_prophet_sh_display',   
    array(                   
        'description' => 'نمایش پیامک های تصادفی به مناسبت شهادت پیامبر اکرم صلوات الله علیه و اله و سلم'
    )
);

function random_prophet_sh_w() {

       $quotes = file ("wp-content/plugins/MasoomShahid/text/prophet_sh.txt");
    $num = rand (0, (intval(count($quotes))-1));

	echo "<div class='block'><p id='quote2'>$quotes[$num]</p></div>";

	wp_register_style( 'style', plugins_url('style.css', __FILE__) );
	wp_enqueue_style( 'style' );
    
}

add_shortcode('payambar_akram','random_prophet_sh_w');

function random_prophet_sh_tm() {

       $quotes = file ("wp-content/plugins/MasoomShahid/text/prophet_sh.txt");
    $num = rand (0, (intval(count($quotes))-1));

echo "<p id='quotes'>$quotes[$num]</p>";

	wp_register_style( 'style', plugins_url('style.css', __FILE__) );
	wp_enqueue_style( 'style' );
    
}



function random_imam_ali_sh_display($args) {

   extract($args);
   echo $before_widget;
   echo $before_title . "پیامک های شهادت امام علی (ع)" . $after_title;
   echo $after_widget;

       $quotes = file ("wp-content/plugins/MasoomShahid/text/imam_ali_sh.txt");
    $num = rand (0, (intval(count($quotes))-1));
	
	echo "<p id='quotes'>$quotes[$num]</p>";
wp_register_style( 'style', plugins_url('style.css', __FILE__) );
	wp_enqueue_style( 'style' );
    
}

wp_register_sidebar_widget(
    'random_imam_ali_sh_1',         
    'پیامک های شهادت امام علی (ع)',          
    'random_imam_ali_sh_display',   
    array(                  
        'description' => 'نمایش پیامک های تصادفی به مناسبت شهادت امیر المومنین علی علیه السلام'
    )
);



function random_imam_ali_sh_sh() {


       $quotes = file ("wp-content/plugins/MasoomShahid/text/imam_ali_sh.txt");
    $num = rand (0, (intval(count($quotes))-1));
		echo "<div class='block'><p id='quote2'>$quotes[$num]</p></div>";

wp_register_style( 'style', plugins_url('style.css', __FILE__) );
	wp_enqueue_style( 'style' );
    
}
add_shortcode('imam_ali','random_imam_ali_sh_sh');




function random_imam_ali_sh_sh_tm() {


       $quotes = file ("wp-content/plugins/MasoomShahid/text/imam_ali_sh.txt");
    $num = rand (0, (intval(count($quotes))-1));
		echo "<p id='quotes'>$quotes[$num]</p>";

wp_register_style( 'style', plugins_url('style.css', __FILE__) );
	wp_enqueue_style( 'style' );
    
}


function random_kosar_sh_display($args) {

		
   extract($args);
   echo $before_widget;
   echo $before_title . "پیامک شهادت حضرت فاطمه زهراء (س)" . $after_title;
   echo $after_widget;

       $quotes = file ("wp-content/plugins/MasoomShahid/text/kosar_sh.txt");
    $num = rand (0, (intval(count($quotes))-1));
	
	echo "<p id='quotes'>$quotes[$num]</p>";

wp_register_style( 'style', plugins_url('style.css', __FILE__) );
	wp_enqueue_style( 'style' );
    
}
wp_register_sidebar_widget(
    ' random_kosar_sh_1',        
    'پیامک شهادت حضرت فاطمه زهراء (س)',        
    'random_kosar_sh_display',  
    array(                  
        'description' => 'نمایش پیامک های تصادفی به مناسبت شهادت حضرت فاطمه زهراء سلام الله علیها'
    )
);

function random_kosar_sh() {

       $quotes = file ("wp-content/plugins/MasoomShahid/text/kosar_sh.txt");
    $num = rand (0, (intval(count($quotes))-1));
	
	echo "<div class='block'><p id='quote2'>$quotes[$num]</p></div>";

wp_register_style( 'style', plugins_url('style.css', __FILE__) );
	wp_enqueue_style( 'style' );
    
}
add_shortcode('kosar','random_kosar_sh');


function random_kosar_sh_tm() {

       $quotes = file ("wp-content/plugins/MasoomShahid/text/kosar_sh.txt");
    $num = rand (0, (intval(count($quotes))-1));
	
	echo "<p id='quotes'>$quotes[$num]</p>";

wp_register_style( 'style', plugins_url('style.css', __FILE__) );
	wp_enqueue_style( 'style' );
    
}



function random_imam_hasan_sh_display($args) {

			
   extract($args);
   echo $before_widget;
   echo $before_title . "پیامک شهادت امام حسن (ع)" . $after_title;
   echo $after_widget;

       $quotes = file ("wp-content/plugins/MasoomShahid/text/imam_hasan_sh.txt");
    $num = rand (0, (intval(count($quotes))-1));
	
	echo "<p id='quotes'>$quotes[$num]</p>";

wp_register_style( 'style', plugins_url('style.css', __FILE__) );
	wp_enqueue_style( 'style' );
    
}
wp_register_sidebar_widget(
    'random_imam_hasan_sh_1',         
    'پیامک شهادت امام حسن (ع)',          
    'random_imam_hasan_sh_display',  
    array(                  
        'description' => 'نمایش پیامک های تصادفی به مناسبت شهادت  امام حسن علیه السلام'
    )
);


function random_imam_hasan_sh() {



       $quotes = file ("wp-content/plugins/MasoomShahid/text/imam_hasan_sh.txt");
    $num = rand (0, (intval(count($quotes))-1));
	
echo "<div class='block'><p id='quote2'>$quotes[$num]</p></div>";

wp_register_style( 'style', plugins_url('style.css', __FILE__) );
	wp_enqueue_style( 'style' );
    
	}


add_shortcode('imam_hasan','random_imam_hasan_s');



function random_imam_hasan_sh_tm() {



       $quotes = file ("wp-content/plugins/MasoomShahid/text/imam_hasan_sh.txt");
    $num = rand (0, (intval(count($quotes))-1));
	
echo "<p id='quotes'>$quotes[$num]</p>";

wp_register_style( 'style', plugins_url('style.css', __FILE__) );
	wp_enqueue_style( 'style' );
    
	}

	
	
function random_imam_hussain_sh_display($args) {

			
   extract($args);
   echo $before_widget;
   echo $before_title . "پیامک شهادت امام حسین (ع)" . $after_title;
   echo $after_widget;

       $quotes = file ("wp-content/plugins/MasoomShahid/text/imam_hussain_sh.txt");
    $num = rand (0, (intval(count($quotes))-1));
	
	echo "<p id='quotes'>$quotes[$num]</p>";

wp_register_style( 'style', plugins_url('style.css', __FILE__) );
	wp_enqueue_style( 'style' );
}
wp_register_sidebar_widget(
    'random_imam_hussain_sh_1',         
    'پیامک شهادت امام حسین (ع)',        
    'random_imam_hussain_sh_display',   
    array(                   
        'description' => 'نمایش پیامک های تصادفی به مناسبت شهادت امام حسین (ع)'
    )
);

function random_imam_hussain_sh() {



       $quotes = file ("wp-content/plugins/MasoomShahid/text/imam_hussain_sh.txt");
    $num = rand (0, (intval(count($quotes))-1));
	
echo "<div class='block'><p id='quote2'>$quotes[$num]</p></div>";

wp_register_style( 'style', plugins_url('style.css', __FILE__) );
	wp_enqueue_style( 'style' );
}

add_shortcode('imam_hossain','random_imam_hussain_sh');


function random_imam_hussain_sh_tm() {



       $quotes = file ("wp-content/plugins/MasoomShahid/text/imam_hussain_sh.txt");
    $num = rand (0, (intval(count($quotes))-1));
	
echo "<p id='quotes'>$quotes[$num]</p>";

wp_register_style( 'style', plugins_url('style.css', __FILE__) );
	wp_enqueue_style( 'style' );
}


function random_imam_sajjad_sh_display($args) {		
   extract($args);
   echo $before_widget;
   echo $before_title . "پیامک شهادت امام سجاد (ع)" . $after_title;
   echo $after_widget;
   // random sms file here
       $quotes = file ("wp-content/plugins/MasoomShahid/text/imam_sajjad_sh.txt");
    $num = rand (0, (intval(count($quotes))-1));
	
	echo "<p id='quotes'>$quotes[$num]</p>"; 

wp_register_style( 'style', plugins_url('style.css', __FILE__) );
	wp_enqueue_style( 'style' );	
}
wp_register_sidebar_widget(
    'random_imam_sajjad_sh_1',        
    'پیامک شهادت امام سجاد (ع)',          
    'random_imam_sajjad_sh_display',   
    array(                  
        'description' => 'یش پیامک های تصادفی به مناسبت شهادت امام سجاد (ع)'
    )
);



function random_imam_sajjad_sh_w() {		

   // random sms file here
       $quotes = file ("wp-content/plugins/MasoomShahid/text/Immam_Sajjad_sh.txt");
    $num = rand (0, (intval(count($quotes))-1));
	
	echo "<div class='block'><p id='quote2'>$quotes[$num]</p></div>";

wp_register_style( 'style', plugins_url('style.css', __FILE__) );
	wp_enqueue_style( 'style' );	
}

add_shortcode('imam_sajjad','random_imam_sajjad_sh_w');


function random_imam_sajjad_sh_tm() {		

   // random sms file here
       $quotes = file ("wp-content/plugins/MasoomShahid/text/Immam_Sajjad_sh.txt");
    $num = rand (0, (intval(count($quotes))-1));
	
	echo "<p id='quotes'>$quotes[$num]</p>";

wp_register_style( 'style', plugins_url('style.css', __FILE__) );
	wp_enqueue_style( 'style' );	
}


function random_imam_baqer_sh_display($args) {		
   extract($args);
   echo $before_widget;
   echo $before_title . "پیامک شهادت امام محمد باقر(ع)" . $after_title;
   echo $after_widget;

       $quotes = file ("wp-content/plugins/MasoomShahid/text/imam_baqer_sh.txt");
    $num = rand (0, (intval(count($quotes))-1));
	echo "<p id='quotes'>$quotes[$num]</p>";
	
wp_register_style( 'style', plugins_url('style.css', __FILE__) );
	wp_enqueue_style( 'style' );
}
wp_register_sidebar_widget(
    'random_imam_baqer_sh_1',         
    'پیامک شهادت امام محمد باقر(ع)',         
    'random_imam_baqer_sh_display',   
    array(                  
        'description' => 'نمایش پیامک های تصادفی به مناسبت شهادت امام محمد  باقر (ع)'
    )
);


function random_imam_baqer_sh() {		
       $quotes = file ("wp-content/plugins/MasoomShahid/text/imam_baqer_sh.txt");
    $num = rand (0, (intval(count($quotes))-1));
	echo "<p id='quotes'>$quotes[$num]</p>";
	
wp_register_style( 'style', plugins_url('style.css', __FILE__) );
	wp_enqueue_style( 'style' );
}
add_shortcode('imam_bagher','random_imam_baqer_sh');


function random_imam_baqer_sh_tm() {		
       $quotes = file ("wp-content/plugins/MasoomShahid/text/imam_baqer_sh.txt");
    $num = rand (0, (intval(count($quotes))-1));
	echo "<div class='block'><p id='quote2'>$quotes[$num]</p></div>";
	
wp_register_style( 'style', plugins_url('style.css', __FILE__) );
	wp_enqueue_style( 'style' );
}

function random_imam_sadeq_sh_display($args) {	
   extract($args);
   echo $before_widget;
   echo $before_title . "پیامک شهادت امام صادق(ع)" . $after_title;
   echo $after_widget;

       $quotes = file ("wp-content/plugins/MasoomShahid/text/imam_sadeq_sh.txt");
    $num = rand (0, (intval(count($quotes))-1));
	echo "<p id='quotes'>$quotes[$num]</p>"; 
	
wp_register_style( 'style', plugins_url('style.css', __FILE__) );
	wp_enqueue_style( 'style' );
}
wp_register_sidebar_widget(
    'random_imam_sadeq_sh_1',        
    'پیامک شهادت امام صادق(ع)',        
    'random_imam_sadeq_sh_display',   
    array(                 
        'description' => 'نمایش پیامک های تصادفی به مناسبت شهادت امام صادق(ع)'
    )
);

function random_imam_sadeq_sh() {	


       $quotes = file ("wp-content/plugins/MasoomShahid/text/imam_sadeq_sh.txt");
    $num = rand (0, (intval(count($quotes))-1));
echo "<div class='block'><p id='quote2'>$quotes[$num]</p></div>";

	
wp_register_style( 'style', plugins_url('style.css', __FILE__) );
	wp_enqueue_style( 'style' );
}
add_shortcode('imam_sadegh','random_imam_sadeq_sh');


function random_imam_sadeq_sh_tm() {	


       $quotes = file ("wp-content/plugins/MasoomShahid/text/imam_sadeq_sh.txt");
    $num = rand (0, (intval(count($quotes))-1));
echo "<p id='quotes'>$quotes[$num]</p>"; 

	
wp_register_style( 'style', plugins_url('style.css', __FILE__) );
	wp_enqueue_style( 'style' );
}


function random_imam_kazem_sh_display($args) {		
   extract($args);
   echo $before_widget;
   echo $before_title . "پیامک شهادت امام کاظم (ع)" . $after_title;
   echo $after_widget;

       $quotes = file ("wp-content/plugins/MasoomShahid/text/imam_kazem_sh.txt");
    $num = rand (0, (intval(count($quotes))-1));
	
	echo "<p id='quotes'>$quotes[$num]</p>";
	
wp_register_style( 'style', plugins_url('style.css', __FILE__) );
	wp_enqueue_style( 'style' );
}
wp_register_sidebar_widget(
    'random_imam_kazem_sh_1',         
    'پیامک شهادت امام کاظم (ع)',           
    'random_imam_kazem_sh_display',  
    array(                  
        'description' => 'نمایش پیامک های تصادفی به مناسبت شهادت امام کاظم علیه السلام'
    )
);

function random_imam_kazem_sh() {		
       $quotes = file ("wp-content/plugins/MasoomShahid/text/imam_kazem_sh.txt");
    $num = rand (0, (intval(count($quotes))-1));
	
echo "<div class='block'><p id='quote2'>$quotes[$num]</p></div>";

	
wp_register_style( 'style', plugins_url('style.css', __FILE__) );
	wp_enqueue_style( 'style' );
}
add_shortcode('imam_kazem','random_imam_kazem_sh');



function random_imam_kazem_sh_tm() {		
       $quotes = file ("wp-content/plugins/MasoomShahid/text/imam_kazem_sh.txt");
    $num = rand (0, (intval(count($quotes))-1));
	
echo "<p id='quotes'>$quotes[$num]</p>";

	
wp_register_style( 'style', plugins_url('style.css', __FILE__) );
	wp_enqueue_style( 'style' );
}

function random_imam_reza_sh_display($args) {		
   extract($args);
   echo $before_widget;
   echo $before_title . "پیامک شهادت امام رضا (ع)" . $after_title;
   echo $after_widget;

       $quotes = file ("wp-content/plugins/MasoomShahid/text/imam_reza_sh.txt");
    $num = rand (0, (intval(count($quotes))-1));
	
	echo "<p id='quotes'>$quotes[$num]</p>";  

wp_register_style( 'style', plugins_url('style.css', __FILE__) );
	wp_enqueue_style( 'style' );	
}

wp_register_sidebar_widget(
    'random_imam_reza_sh_1',        
    'پیامک شهادت امام رضا (ع)',         
    'random_imam_reza_sh_display',  
    array(                  // options
        'description' => 'نمایش پیامک های تصادفی به مناسبت شهادت امام رضا علیه السلام'
    )
);

function random_imam_reza_sh() {		

       $quotes = file ("wp-content/plugins/MasoomShahid/text/imam_reza_sh.txt");
    $num = rand (0, (intval(count($quotes))-1));
	
echo "<div class='block'><p id='quote2'>$quotes[$num]</p></div>";


wp_register_style( 'style', plugins_url('style.css', __FILE__) );
	wp_enqueue_style( 'style' );	
}

add_shortcode('imam_reza','random_imam_reza_sh');


function random_imam_reza_sh_tm() {		

       $quotes = file ("wp-content/plugins/MasoomShahid/text/imam_reza_sh.txt");
    $num = rand (0, (intval(count($quotes))-1));
	
	echo "<p id='quotes'>$quotes[$num]</p>";  


wp_register_style( 'style', plugins_url('style.css', __FILE__) );
	wp_enqueue_style( 'style' );	
}

function random_imam_javad_sh_display($args) {		
   extract($args);
   echo $before_widget;
   echo $before_title . "پیامک شهادت امام جواد (ع)" . $after_title;
   echo $after_widget;

       $quotes = file ("wp-content/plugins/MasoomShahid/text/imam_javad_sh.txt");
    $num = rand (0, (intval(count($quotes))-1));
	
	echo "<p id='quotes'>$quotes[$num]</p>";   
	
wp_register_style( 'style', plugins_url('style.css', __FILE__) );
	wp_enqueue_style( 'style' );
}
wp_register_sidebar_widget(
    'random_imam_javad_sh_1',         
    'پیامک شهادت امام جواد (ع)',           
    'random_imam_javad_sh_display',  
    array(                  
        'description' => 'نمایش پیامک های تصادفی به مناسبت شهادت امام جواد علیه السلام'
    )
);


function random_imam_javad_sh() {		
       $quotes = file ("wp-content/plugins/MasoomShahid/text/imam_javad_sh.txt");
    $num = rand (0, (intval(count($quotes))-1));
	
echo "<div class='block'><p id='quote2'>$quotes[$num]</p></div>";

	
wp_register_style( 'style', plugins_url('style.css', __FILE__) );
	wp_enqueue_style( 'style' );
}
add_shortcode('imam_javad',' random_imam_javad_sh');


function random_imam_javad_sh_tm() {		
       $quotes = file ("wp-content/plugins/MasoomShahid/text/imam_javad_sh.txt");
    $num = rand (0, (intval(count($quotes))-1));
	
echo "<p id='quotes'>$quotes[$num]</p>";  

	
wp_register_style( 'style', plugins_url('style.css', __FILE__) );
	wp_enqueue_style( 'style' );
}

function random_imam_hadi_sh_display($args) {
		
   extract($args);
   echo $before_widget;
   echo $before_title . "پیامک شهادت امام هادی(ع)" . $after_title;
   echo $after_widget;

       $quotes = file ("wp-content/plugins/MasoomShahid/text/imam_hadi_sh.txt");
    $num = rand (0, (intval(count($quotes))-1));
	
	echo "<p id='quotes'>$quotes[$num]</p>"; 
	
wp_register_style( 'style', plugins_url('style.css', __FILE__) );
	wp_enqueue_style( 'style' );
}
wp_register_sidebar_widget(
    'random_imam_hadi_sh_1',         
    'پیامک شهادت امام هادی(ع)',          
    'random_imam_hadi_sh_display',   
    array(                  
        'description' => 'نمایش پیامک های تصادفی به مناسبت شهادت امام هادی علیه السلام'
    )
);

function random_imam_hadi_sh() {
	

       $quotes = file ("wp-content/plugins/MasoomShahid/text/imam_hadi_sh.txt");
    $num = rand (0, (intval(count($quotes))-1));
	
echo "<div class='block'><p id='quote2'>$quotes[$num]</p></div>";

	
wp_register_style( 'style', plugins_url('style.css', __FILE__) );
	wp_enqueue_style( 'style' );
}
add_shortcode('imam_hadi','random_imam_hadi_sh');


function random_imam_hadi_sh_tm() {
	

       $quotes = file ("wp-content/plugins/MasoomShahid/text/imam_hadi_sh.txt");
    $num = rand (0, (intval(count($quotes))-1));
	
echo "<p id='quotes'>$quotes[$num]</p>"; 

	
wp_register_style( 'style', plugins_url('style.css', __FILE__) );
	wp_enqueue_style( 'style' );
}

function random_imam_askari_sh_display($args) {		
   extract($args);
   echo $before_widget;
   echo $before_title . "پیامک شهادت امام عسکری (ع)" . $after_title;
   echo $after_widget;

       $quotes = file ("wp-content/plugins/MasoomShahid/text/imam_askari_sh.txt");
    $num = rand (0, (intval(count($quotes))-1));
	
	echo "<p id='quotes'>$quotes[$num]</p>";   
	
wp_register_style( 'style', plugins_url('style.css', __FILE__) );
	wp_enqueue_style( 'style' );
}
wp_register_sidebar_widget(
    'random_imam_askari_sh_1',         
    'پیامک شهادت امام عسکری (ع)',           
    'random_imam_askari_sh_display',   
    array(                 
        'description' => 'نمایش پیامک های تصادفی به مناسبت شهادت امام عسکری wr علیه السلام'
    )
);

function random_imam_askari_sh() {		
       $quotes = file ("wp-content/plugins/MasoomShahid/text/imam_askari_sh.txt");
    $num = rand (0, (intval(count($quotes))-1));
	
echo "<div class='block'><p id='quote2'>$quotes[$num]</p></div>";

wp_register_style( 'style', plugins_url('style.css', __FILE__) );
	wp_enqueue_style( 'style' );
}
add_shortcode('imam_askari','random_imam_askari_sh');

function random_imam_askari_sh_tm() {		
       $quotes = file ("wp-content/plugins/MasoomShahid/text/imam_askari_sh.txt");
    $num = rand (0, (intval(count($quotes))-1));
	
echo "<p id='quotes'>$quotes[$num]</p>";   

wp_register_style( 'style', plugins_url('style.css', __FILE__) );
	wp_enqueue_style( 'style' );
}
add_action( 'wp_enqueue_scripts', 'random_prophet_sh_styles' );

function random_prophet_sh_styles() {
	wp_register_style( 'random_prophet_sh', plugins_url( 'MasoomShahid/style.css' ) );
	wp_enqueue_style( 'random_prophet_sh' );
}	
?>