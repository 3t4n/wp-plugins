<?php
  defined( 'ABSPATH' ) or die();
  global $wpdb;

  $template_post_id = style_5($post_id);
  $accbox_content = get_post_meta($template_post_id, 'accbox_metabox_'.$template_post_id, true);
  $template_post_id;
  if(is_array($accbox_content)){  
    $acc_cust_css       = $accbox_content[0]['acc_cust_css'];  
  }else{
    $acc_cust_css       = ""; 
  }
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<div id="container">      
      <?php if($accbox_content[0]['acc_title'][0] == 1){ ?>
        <div class="title">
          <h3 class="acc_title main-heading">
            <?php echo esc_html(get_the_title()); ?>
          </h3></div>
      <?php
      } ?> 
      
      <ul class="faq">
         <?php 
            if (is_array($accbox_content) && count($accbox_content) > 0){
              $k=1;
              foreach ($accbox_content as $key => $value) {
                 $acc_title   = esc_attr($value['mytext']);
                 $acc_desc    = $value['mydesc'];   
                 $myfontawe   = $value['myfontawe'];             
                 $active      = "display: list-item;";
                 $openacc		  = $value['openacc'];
          ?> 
            <li class="q"><img class="acc_style5" src="<?php echo CDLZR_ACORD_URL.'public/assets/images/arrow.png'; ?>"> <?php echo esc_html($acc_title); ?>&nbsp;<span class="float-right"><i class="<?php echo $myfontawe; ?>"></i></span></li>
            <li class="a" style="<?php if($openacc == 1){ echo esc_html($active); } ?>"><?php echo do_shortcode($acc_desc); ?></li> 
          <?php $k++; } } ?>
        </ul>
    </div>

<style type="text/css">
      
      /*Responsive CSS*/       

      ul, li { list-style: none; }

      #container {
        width: 100%;       
        overflow: auto;
      }     

      .title {
          height: 45px;
          border-radius: 4px;
          background: #6bb170;
          color: white;
          text-align: center;
          padding-top: 4px;
      }

      .faq li { padding: 20px; }

      .faq li.q {
        background: #4FC2E;
        font-weight: bold;
        font-size: 120%;
        border-bottom: 1px #ddd solid;
        cursor: pointer;
        display: -webkit-box;

      }

      .faq li.a {
        background: #3BB0D6;
        display: none;
        color:#fff;
      }

      .rotate {
        -moz-transform: rotate(90deg);
        -webkit-transform: rotate(90deg);
        transform: rotate(90deg);
      }
      @media (max-width:800px) {

      #container { width: 90%; }
      }
      img.acc_style5 {
        height: 20px;
        margin-top: 5px;
        margin-right: 5px;
    }
     <?php
        echo $acc_cust_css;
    ?>
</style>

<script type="text/javascript">
      //Accordian Action
    var action = 'click';
    var speed = "500";


    //Document.Ready
    jQuery(document).ready(function(){
      //Question handler
    jQuery('li.q').on(action, function(){
      //gets next element
      //opens .a of selected question
    jQuery(this).next().slideToggle(speed)
        //selects all other answers and slides up any open answer
        .siblings('li.a').slideUp();
      
      //Grab img from clicked question
    var img = jQuery(this).children('img');
      //Remove Rotate class from all images except the active
      jQuery('img').not(img).removeClass('rotate');
      //toggle rotate class
      img.toggleClass('rotate');

    });//End on click
    });//End Ready
</script>
