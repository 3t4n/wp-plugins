<?php

/**
 * Front-end class
 */
class cookieLawFront 
{
    private $options = null;

    /**
     * Constructor, initializes options
     */
    function __construct(){
      add_action('wp_enqueue_scripts' , array($this, 'addScript'));
    }


    public function add_footer(){
      ?>
      <?php
        $o= get_option('eu_law_options',array());
        $text_to_show=$o['kirim_text_to_show'];
        $fixed_position=$o['fixed_position'];
        if($fixed_position==0){
          $container_style="top:0px;";
          ?>
          <style>body.add-eu-law{ padding-top:<?php echo $o['line-height'];?>px;}</style>
          <?php
        }
        else
        {
          $container_style="bottom:0px;";
          ?>
          <style>body.add-eu-law{ padding-bottom:<?php echo $o['line-height'];?>px;}</style>
          <?php
        }
        $terms_page_link="#";
        if ($o['kirim_terms_page']!=0){
          $terms_page_link=get_the_permalink($o['kirim_terms_page']);
        }
        $learn_button_text=$o['learn-button-text'];
        $agree_button_text=$o['agree-button-text'];
        $style="color:".$o['font-color'].";".
        "background-color:".$o['background-color'].";".
        "font-size:".$o['font-size']."px;".
        "width:".$o['width'].";".
        "line-height:".$o['line-height']."px;";

        $text_style="max-width:".$o['text-width']."px;";

        $style_learn_more="color:".$o['learn-button-color'].";".
         "padding-top:".$o['learn-button-padding-top']."px;".
         "padding-bottom:".$o['learn-button-padding-top']."px;".
         "padding-left:".$o['learn-button-padding-left']."px;".
         "padding-right:".$o['learn-button-padding-left']."px;".
         "border:".$o['learn-button-border']."px solid ".$o['learn-button-border-color'].";".
         "border-radius:".$o['learn-button-border-radius']."px;".
         "background-color:".$o['learn-button-background-color'].";";

         $agree_full_height=$o['agree-button-full-height'];
         if($agree_full_height==1){
             $agree_display="inline-block";
         }
         else
         {
            $agree_display="inline";
         }
          $style_agree="color:".$o['agree-button-color'].";".
         "padding-top:".$o['agree-button-padding-top']."px;".
         "padding-bottom:".$o['agree-button-padding-top']."px;".
         "padding-left:".$o['agree-button-padding-left']."px;".
         "padding-right:".$o['agree-button-padding-left']."px;".
         "border:".$o['agree-button-border']."px solid ".$o['agree-button-border-color'].";".
         "border-radius:".$o['agree-button-border-radius']."px;".
         "display:".$agree_display.";".
         "background-color:".$o['agree-button-background-color'].";";

         $learn_button_position=$o['learn-button-position'];
        ?>
        <style>
          .eu-law-widget{
            <?php echo $style;?>
          }
          .eu-law-widget .learn-more-cookie-law-btn{
            <?php echo $style_learn_more;?>
          }
          .eu-law-widget .got-it-cookie-law-btn{
            <?php echo $style_agree;?>
          }
          @media (max-width: <?php echo $o['responsive-breakpoint'];?>px){
            .eu-law-t {
                 display: block; 
                
            }
            .eu-law-widget{
              line-height: normal;
              padding: 10px;
            }
            .eu-law-text{
              display: block;
              padding:10px;
                margin: 0 auto;
            }
            .eu-law-links {
              display: block;
              text-align: center;
          }
          .eu-law-widget .got-it-cookie-law-btn{
            display: inline-block;
          }
          }
        </style>
        <div class="eu-law-container" style="<?php echo $container_style;?>">
      <div class="eu-law-widget">
        <div class="eu-law-t">
        <div class="eu-law-text" style="<?php echo $text_style;?>">
          <?php echo $text_to_show;?>
          <?php
          if($learn_button_position==0){
            ?><a href="<?php echo $terms_page_link;?>" class="learn-more-cookie-law-btn"><?php echo $learn_button_text?></a>
            <?php }?>
        </div>    
        <div class="eu-law-links">
          <?php
          if($learn_button_position==1){
            ?><a href="<?php echo $terms_page_link;?>" class="learn-more-cookie-law-btn"><?php echo $learn_button_text?></a>
            <?php }?>
          <a href="javascript:void(0);" class="my-btn got-it-cookie-law-btn" onclick="agree_cookie_law();"><?php echo $agree_button_text;?></a>
        </div>
        </div>
      </div>
        </div>
      <?php
    }

    /**
     * Add all scripts required on the front-end
     */
    public function addScript(){
    
       add_action('wp_footer'          , array($this, 'add_footer')); 
        wp_register_style('widget-euLaw-css', plugins_url( 'includes/front/main.css',__FILE__));
        wp_enqueue_style( 'widget-euLaw-css'); 

        wp_register_script('widget-euLaw-js', plugins_url( 'includes/front/main.js',__FILE__),array('jquery'));
        wp_enqueue_script ('widget-euLaw-js');



  }


 }
 ?>