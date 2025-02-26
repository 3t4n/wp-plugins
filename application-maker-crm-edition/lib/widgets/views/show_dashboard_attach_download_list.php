<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="dash_appdashtitle_tax row-fluid">
    <span class="span4">LATEST ACTIVITIES:</span> <span  class="span4 dash_right" >LINK</span> <span  class="span4 dash_right" ></span>
</div>
<div class="" style=' <?php
if (isset($widg['set_list_height'])) {
    echo " height:" . $widg['set_list_height'] . "px ";
}
?>' >
         <?php
         foreach ($posts_list as $k => $p) {
             $city_tax = get_post_meta($p->ID, 'city_tax', true);
             $street_agent = get_post_meta($p->ID, 'street_agent', true);
             if ($default_name == 'AGENT' or $default_name == 'TAX AGENT') {
                 $pho = get_post_meta($p->ID, 'phone_agent', true);
             } else {
                 $pho = get_post_meta($p->ID, 'phone_office', true);
             }
             ?>
        <div class="row-fluid dash_appdashlist_taxdiv">
            <span class="span4 dash_appdashlist_tax">
                <img src="<?php echo site_url(); ?>/wp-content/plugins/application-maker-crm-edition/img/<?php
         if ($default_name == 'AGENT' or $default_name == 'TAX AGENT') {
             echo 'user3_16.png';
         } else {
             echo 'home_16.png';
         }
             ?>">
                <a data-title="Open this record" class="hasTooltip" href="post.php?post=<?php echo $p->ID ?>&action=edit" ><?php echo $p->post_title ?></a>
            </span>
            <span class="span4 dash_appdashlist_tax dash_right" >
                <a href="<?php
                 $link=''; //// TO BE DEFINED BY GUTS TEAM
                 echo $link;
             ?>" target=""_blank">LINK BOX</a></span>
            <span class="span4 dash_appdashlist_tax dash_right" >
                 <a href="<?php
                 $emaillink=''; //// TO BE DEFINED BY GUTS TEAM
                 echo $emaillink;
                 ?>" target=""_blank">EMAIL & COMPLETE <i class=" icon-ok"></i></a>
            </span>
        </div>
        <?php
    }
    ?>
</div>
<style>
    .dash_latest_list li {
        border:none;
        float: left;
        width: 100%;
        margin:0;
    }
    .dash_latest_list li hr{
        margin:10px 0;
    }
    .dash_latest_list li img{
        float:left;
    }
    .dash_latest_list li .col1{
        float:left;
        width:132px;
    }
    .dash_latest_list li .col2{
        float:left;
        width:110px;
        margin-left:7px;
    }
    .dash_latest_list li .col3{
        float:left;
        width:75px;
        margin-left: 10px;
    }
    .dash_appdashlist_taxdiv{
        border-bottom:1px solid #ccc;
    }
    .dash_appdashtitle_tax{
        height:25px;
        margin:0 0 3px 0;
        font-family: 'Open Sans Condensed', sans-serif!important;
        font-size:14px;
        font-weight: 700;
    }
    .dash_appdashtitle_tax span{
        padding: 3px 3px!important;
        margin:0 0 ;
    }
    .dash_appdashlist_tax{
        padding: 4px 2px 4px 2px!important;
        margin:0 0 ;
        font-family: 'Open Sans Condensed', sans-serif!important;
        font-size:13px;
        font-weight: bold;
    }
    .dash_appdashcalc_tax{
        text-align: right;
        padding: 4px 2px 4px 2px!important;
        margin:0 0 ;
        font-family: 'Open Sans Condensed', sans-serif!important;
        font-size:13px;
        font-weight: bold;
    }
    .dash_right{
        text-align: right;
    }
</style>
