<?php
defined( 'ABSPATH' ) or die();
global $wpdb;

$template_post_id = style_2($post_id);
$accbox_content = get_post_meta($template_post_id, 'accbox_metabox_'.$template_post_id, true);
$template_post_id;
if(is_array($accbox_content)){  
  $acc_cust_css       = $accbox_content[0]['acc_cust_css'];  
}else{
  $acc_cust_css       = ""; 
}
?>
<div class="col-lg-12">
  <div class="container">
    <div class="row">
      <section class="panel panel-default panel_style2">
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-12">
              <h3 class="acc_title"><?php if($accbox_content[0]['acc_title'][0] == 1){ echo esc_html(get_the_title()); } ?> 
              </h3>
            </div>

            <div class="col-lg-12">
              <div class="input-group">
                <span class="input-group-btn">
              <button class="btn btn-default srch_btn" type="button">
            <!-- <span class="dashicons dashicons-search"></span> -->
            <i class="fa fa-search"></i>
          </button>
            </span>
                <input type="search" id="accordion_search_bar" class="form-control" placeholder="<?php echo esc_html_e('Search',CDLZR_PLUG_ACORD_DOM); ?>">
              </div>
              <!-- /input-group -->
            </div>
            <!-- /.col-lg-6 -->
          </div>
          <div class="row">
            <div class="col-lg-12 col-xs-12">
              <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <?php 
                  if (is_array($accbox_content) && count($accbox_content) > 0){
                    $k=1;
                    foreach ($accbox_content as $key => $value) {
                       $acc_title   = esc_attr($value['mytext']);
                       $acc_desc    = $value['mydesc'];                
                       $active      = "show";
                       $openacc		= $value['openacc'];
                ?>        
                <div class="panel panel-default" id="collapse_<?php echo $k; ?>_container">
                  <div class="panel-heading" role="tab" id="heading_<?php echo $k; ?>">
                    <h4 class="panel-title">
                <a role="button" 
                   class="title_a"
                   data-toggle="collapse" 
                   data-parent="#accordion" 
                   href="#collapse_<?php echo $k; ?>" 
                   aria-expanded="true" 
                   aria-controls="collapse_<?php echo $k; ?>">
                  <i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;<?php echo esc_html($acc_title); ?>
                </a>
              </h4>
                  </div>

                  <div id="collapse_<?php echo $k; ?>" class="panel-collapse collapse <?php if($openacc == 1){ echo $active; } ?>" role="tabpanel" aria-labelledby="heading_<?php echo $k; ?>">
                    <div class="panel-body panel_body_style2">
                      <p><?php echo do_shortcode($acc_desc); ?></p>
                    </div>
                  </div>
                </div>
            <?php $k++; } } ?>               
              </div>
              <!-- <p>Information is provided by Accordion Box</p> -->
            </div>
          </div>
          <!-- Row -->
        </div>
        <!-- Col -->
    </div>
    <!-- Container -->

    <style type="text/css">
      h1 {
        font-family: 'Anton', sans-serif !important;
        color: #29AB87 !important;
      }

      .input-group {
        margin-top: 20px !important;
        margin-bottom: 10px !important;
      }

      .panel {
        margin-top: 10px !important;
        background-color: rgba(255, 255, 255, .9)!important;
        border: solid 2px #ccc !important;
      }


      #accordion_search_bar {
        border: solid 2px #ccc !important;
      }

      .btn-default {
        border: solid 1.5px #ccc !important;
      }

      .fa-search {
        font-size: 1.3em !important;
      } 
      <?php
        echo $acc_cust_css;
      ?>
    </style> 

  