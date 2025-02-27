<?php 		
  if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

  if ( $biz_button_fixed == 'true' && $display_type != "link") { ?>
    <style>
        .wpbiztext-button-fixed {
            position:fixed;
            z-index: <?php echo $biz_button_fixed_zindex; ?>;
            <?php echo $biz_button_fixed_pos; ?> : <?php echo $biz_button_fixed_dispos . "px"; ?>;
            <?php echo $biz_button_fixed_side; ?> : <?php echo $biz_button_fixed_disside . "px"; ?>;
           width:<?php echo $biz_button_fixed_widthuse ; ?>;
        }
          #<?= $wpbiztext_widget_id ?> {
            display: none;  
        }
    </style>
<?php } 

  if ( $biz_button_fixed_icon != "false" && $display_type != "link") { ?>

    <style> 
      #wpbiztext-button-fixed {
        width:<?php echo $biz_button_fixed_icon . "px"; ?>;
        height:<?php echo $biz_button_fixed_icon . "px"; ?>;
        background: <?php echo "#" . $biz_button_fixed_icon_bg ; ?>;
        border-radius: 50%;
        padding:10px;
      }

      #<?= $wpbiztext_widget_id ?> {
        display: none;  
      }
      
      #wpbiztext-button-fixed svg {
        fill:<?php echo "#" . $biz_button_fixed_icon_colour ; ?>;
      }
    </style>
  <?php } ?>

<?php

  global $is_safari; 
  if ( $is_safari && $displayDev != "all" ) { ?>
    <style>
      @media screen and (min-width: 1024px){
          #<?= $wpbiztext_widget_id ?>, .wpbiztext-safari-hide {
              display: none;  
          }
          
          .<?= $wpbiztext_shortcode_div ?> {
              display: none;  
          }
      
          #wpbiztext-button-fixed {
              display:none;
      
          }
      }      
    </style>
<?php } 
    
	// Any mobile device (phones or tablets).
	if ( wp_is_mobile() || $displayDev == "all" || $is_safari ) {

    if ($biz_button_fixed != "true") {

      if ($before_widget != "short code"){echo $before_widget;}
      if ($before_widget != "short code"){echo $before_title . $title . $after_title;	}

    }
		
		if ($display_type == "link"){
		
		    echo $bizbutton;   
		
		} else {
		
      if ($biz_button_fixed == "true"){

        if ($biz_button_fixed_icon == "false"){

          // fixed button
          echo "<div id='wpbiztext-button-fixed' class='wpbiztext-button-fixed'>";
          echo $bizbutton;   
          echo "</div>";

        } else {

          // fixed icon

          echo "<a href='sms:+$biz_text_number' id='wpbiztext-button-fixed' class='wpbiztext-button-fixed'>";

          echo  "<svg viewBox='0 0 55.3 46.63'>
          <path class='st14' d='M27.65,4.17c-12.52,0-22.71,8-22.71,17.83c0,3.53,1.35,6.98,3.91,9.95l0.07,0.09L9,32.12
          c0.32,0.4,0.73,0.89,0.91,1.08c2.24,3.4,0.75,4.87-2.81,8.98c8.4,1.48,14.47-3.23,14.47-3.23c1.59,0.04,3.19,0.24,4.59,0.44h0.02
          l0.05,0.01c1.13,0.15,2.41,0.32,3.48,0.35l0.81,0c11.32,0,19.85-7.63,19.85-17.74C50.35,12.16,40.17,4.17,27.65,4.17z M16.75,24.03
          c-1.25,0-2.27-1.02-2.27-2.27c0-1.26,1.02-2.28,2.27-2.28c1.26,0,2.28,1.02,2.28,2.28C19.03,23.01,18.02,24.03,16.75,24.03z
          M27.29,25.8c-2.23,0-4.04-1.81-4.04-4.03c0-2.23,1.81-4.05,4.04-4.05c2.23,0,4.04,1.81,4.04,4.05
          C31.33,23.99,29.53,25.8,27.29,25.8z M39.37,27.36c-3.1,0-5.62-2.51-5.62-5.6c0-3.1,2.52-5.61,5.62-5.61c3.09,0,5.61,2.51,5.61,5.61
          C44.98,24.85,42.46,27.36,39.37,27.36z'>
          </svg>";

          echo "</a>";

        }
    
      } else {
    
        echo $bizbutton;   
      }

		}
		
		if ($biz_button_fixed != "true") {
		 
		  if ($before_widget != "short code") echo $after_widget; 
		 
		 }
	
	} else {
      
		//echo $before_widget;
    echo "<span class='" .$biz_noshow ."'></span>";
		//echo $after_widget; 
	
	}

?>

<script>

function ready(fn) {
    if (document.readyState != 'loading') {
        fn();
    } else if (document.addEventListener) {
        document.addEventListener('DOMContentLoaded', fn);
    } else {
        document.attachEvent('onreadystatechange', function () {
            if (document.readyState != 'loading') {
                fn();
            }
        });
    }
}

ready(function () {

    <?php if ( $biz_button_fixed == 'true') { ?>
        
        // Create Element.remove() function if not exist
        if (!('remove' in Element.prototype)) {
            Element.prototype.remove = function() {
                if (this.parentNode) {
                    this.parentNode.removeChild(this);
                }
            };
        }

        var existingSideFormNodes = document.querySelectorAll('#wpbiztext-button-fixed');
        if (existingSideFormNodes.length > 0){
            var parentNode = document.querySelector('body');
            var sideBarFormNode = existingSideFormNodes[0];
            var referenceNode = parentNode.querySelector('*');
            parentNode.insertBefore(sideBarFormNode, referenceNode);
            
            for (var i = 1; i < existingSideFormNodes.length; i++){
                existingSideFormNodes[i].remove();
            }
         }
         
   <?php } ?>
        
});
 
        
</script>






