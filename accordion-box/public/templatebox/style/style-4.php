<?php
defined( 'ABSPATH' ) or die();
global $wpdb;

$template_post_id = style_4($post_id);
$accbox_content = get_post_meta($template_post_id, 'accbox_metabox_'.$template_post_id, true);
$template_post_id;
if(is_array($accbox_content)){  
  $acc_cust_css       = $accbox_content[0]['acc_cust_css'];  
}else{
  $acc_cust_css       = ""; 
}
?>

<div class="container-fluid inner-container" >           
    <div class="col-md-12">
    <h3 class="acc_title main-heading"><?php if($accbox_content[0]['acc_title'][0] == 1){ echo esc_html(get_the_title()); } ?> 
    </h3>
       <div class="about-page-content testimonial-page">
            <div class="faq-content">
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
                      <div class="panel panel-default">
                        <div class="panel-heading" role="tab">
                          <h4 class="panel-title">
                            <a class="" role="button" data-toggle="collapse" data-parent="#accordion" href="#faq_<?php echo $k; ?>">
                              <span><?php echo esc_html($acc_title); ?></span>
                            </a>
                          </h4>
                        </div>
                        <div id="faq_<?php echo $k; ?>" class="panel-collapse collapse <?php if($openacc == 1){ echo $active; } ?>" role="tabpanel" aria-labelledby="heading_<?php echo $k; ?>">
                          <div class="panel-body">
                            <p><?php echo do_shortcode($acc_desc); ?></p> 
                        </div>
                        </div>
                      </div>
                    <?php $k++; } } ?>      
                </div>
            </div>
        </div>
    </div>    
</div>

<style type="text/css">
    .faq-content #accordion .panel-title > a.accordion-toggle::before, .faq-content #accordion a[data-toggle="collapse"]::before  {
    content:"−";
    float: left;
    font-family: 'Glyphicons Halflings';
    margin-right :1em;
    margin-left:10px;
    color:#fff;
    font-size:13px;
    font-weight:300;
    display:inline-block;
    width:20px;
    height:20px;
    line-height:20px;
    
    border-radius:50%;
    text-align:center;
    font-size:10px;
    background:#ff9900;
}
.faq-content #accordion .panel-title > a.accordion-toggle.collapsed::before, .faq-content  #accordion a.collapsed[data-toggle="collapse"]::before  {
    content:"+";
    color:#fff;
    font-size:10px;
    font-weight:300;
    background:#333;
}

.faq-content{float:left; width:100%;}
.faq-content .panel-heading{padding-left:0px; border-radius:0px !important;}
.faq-content .panel-heading a{text-decoration:none;}
.faq-content .panel{border-radius:0px !important;}
.faq-content .panel-default{}
.faq-content .panel-heading{background:#f3f3f3 !important; color:#666666;}
.faq-content .panel-body{font-size:14px; color:#666666;}
.faq-saelect{background:#f3f3f3; padding:15px; border-bottom:2px solid #666666; float:left; width:100%; margin-bottom:20px; margin-top:-10px;}
.faq-saelect span{font-size:16px; color:#333; margin-right:20px;}
.faq-saelect select{border:1px solid #dcdcdc; color:#999999; width:300px; height:40px;}
.faq-content .panel{border-top:none !important; border-right:none !important; border-left:none !important;}
.faq-content .panel-body{border:1px solid #f3f3f3;}
<?php
    echo $acc_cust_css;
?>
</style>