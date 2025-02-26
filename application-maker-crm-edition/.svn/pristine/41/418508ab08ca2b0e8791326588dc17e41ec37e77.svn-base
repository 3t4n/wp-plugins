<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div style="text-align:right;">

    <div class="dash_appdashtitle_tax row-fluid">

        <?php if ($widg['type_widget'] == 'd') { ?>
            <span class="span6  dash_left">TIPS</span> <span  class="span3 dash_right" >SEE MORE</span><span  class="span3 dash_right" >SEE VIDEO</span>
        <?php } else { ?>
            <span class="span8  dash_left">TIPS</span> <span  class="span4 dash_right" >SEE MORE</span>
        <?php } ?>

    </div>
    <div class="dash_appdashcontent" style=' <?php
        if (isset($widg['set_list_height'])) {
            //  echo " height:" . $widg['set_list_height'] . "px ";
        }
        ?>' >
             <?php
             foreach ($posts_list as $tip) {
                 ?>
            <div class="row-fluid dash_appdashlist_taxdiv dash_left">
                <?php if ($widg['type_widget'] == 'd') { ?>
                    <span class="span6 dash_appdashlist_tax">
                    <?php } else { ?>
                        <span class="span8 dash_appdashlist_tax">
                        <?php } ?>

                        <?php
                        switch ($widg['type_widget']) {
                            case 'c':
                                echo '<a href="'.$tip->tip_url.'" target="_blank" data-title="Follow the link in a new window." data-placement="right" class="hasTooltip">'.$tip->post_title.'</a>';
                                break;
                            case 'd':
                                echo '<a href="'.$tip->tip_url.'" target="_blank" data-title="Follow the link in a new window." data-placement="right" class="hasTooltip">'.$tip->post_title.'</a>';
                                break;
                            default:
                                echo $tip->post_title;
                                break;
                        }
                        ?>
                    </span>

                    <?php if ($widg['type_widget'] == 'd') { ?>
                        <span data-id="<?php echo $tip->data_id ?>" data-title="Open the Tip explanation." data-placement='left' class="cursor-pointer hasTooltip span3 dash_appdashlist_tax dash_right apm_tip_more" ><i class="icon-eye-open"></i> MORE</span>
                        <span data-videocode="<?php echo $tip->tip_video ?>" data-title="Open the Tip Video." data-placement='left' class="cursor-pointer hasTooltip span3 dash_appdashlist_tax dash_right apm_tip_video" ><i class="icon-eye-open"></i> VIDEO</span>
                    <?php } else { ?>
                        <span  data-id="<?php echo $tip->data_id ?>" data-title="Open the Tip explanation." data-placement='left' class="cursor-pointer hasTooltip span4 dash_appdashlist_tax dash_right apm_tip_more" ><i class="icon-eye-open"></i> MORE</span>
                    <?php } ?>
            </div>
        <?php } ?>
    </div>
    <?php if ($widg['type_widget'] == 'b') { ?>
        <a data-title="You can post a suggestion of Tip for the Administrator." type-widget="<?php echo $widg['type_widget'] ?>" tip-widget="<?php echo $widg['tip_widget'] ?>" widget-title="<?php echo $widg['label'] ?>" class="apm_post_tip_form tax_addtip cursor-pointer hasTooltip" data-placement='right'  href='javascript:void(0);'><i class="icon-plus" ></i> Propose a Tip</a>
    <?php } ?>


</div>