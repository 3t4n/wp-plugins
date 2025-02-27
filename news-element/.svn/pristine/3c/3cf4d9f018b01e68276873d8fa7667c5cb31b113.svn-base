<?php
use News_Element\Khobish_Helper;
       
?> 
<div class="xlm-topbar">
    <div class="header-flex-wrapper khbnav">
        <div class="khbnavleft">
            <div class="leftwrpr">
                <?php echo $this->out_menu_link($settings['links']);?>
            </div>
        </div>    

        <div class="khbnavcenter">
            <div class="listinr khbdate">

                <?php 
                  $offset= (int)$settings['gmt']['size']*60*60; //converting 4 hours to seconds.
                  $dateFormat="l, d M, Y "; //set the date format h:i:sa
                  $timeNdate=gmdate($dateFormat, time()+$offset); //get GMT date - 4
                  echo $timeNdate;
                ?>

            </div> 
        </div>

        <div class="khbnavright">
            <div class="inrwrpr">
                <?php echo $this->out_social_link($settings['socials']);?> 
            </div>    
        </div>    

    </div>
</div>