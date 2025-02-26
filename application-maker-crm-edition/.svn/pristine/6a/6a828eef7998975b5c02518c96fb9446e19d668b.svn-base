<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="dash_appdashtitle_tax row-fluid">
    <span class="span5">LATEST ACTIVITIES:</span> <span  class="span4 dash_right" >OFFICE PHONE</span> <span  class="span3 dash_right" >RETURNS</span>
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
                 $paid = '';
             } else {
                 $paid = get_post_meta($p->ID, 'office_paid', true);
                 $pho = get_post_meta($p->ID, 'phone_office', true);
             }
             ?>
        <div class="row-fluid dash_appdashlist_taxdiv">
            <span class="span5 dash_appdashlist_tax">
                <img src="<?php echo site_url(); ?>/wp-content/plugins/application-maker-crm-edition/img/<?php
         if ($default_name == 'AGENT' or $default_name == 'TAX AGENT') {
             echo 'user3_16.png';
         } else {
             echo 'home_16.png';
         }
             ?>">
                <a data-title="Open this record" class="hasTooltip" href="post.php?post=<?php echo $p->ID ?>&action=edit" ><?php echo $p->post_title ?></a>
            </span>
            <span class="span4 dash_appdashlist_tax dash_right" ><?php
                 if ($city_tax !== '' or $street_agent !== '') {
                     echo '(';
                     if ($city_tax !== '') {
                         echo $city_tax;
                         echo ', ';
                     }
                     echo $street_agent;
                     echo ')';
                 }
                 echo $pho;
             ?></span>
            <span class="span3 dash_appdashlist_tax dash_right" ><?php
            if ($paid == '1') {
                echo "PAID";
            } else {
                echo "NOT PAID";

            }
             ?></span>
        </div>
        <?php
    }
    ?>
    <div  class="dash_appdashcalc_tax" >YOUR TOTAL RETURNS: NOT PAID PAID</div>
</div>
<style>

</style>
