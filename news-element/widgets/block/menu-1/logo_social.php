<?php
use News_Element\Khobish_Helper;
       
?> 
<div class="menubarwrp">
    <div class="header-flex-wrapper khbnav menubar">
        <div class="khbnavleft">
            <div class="leftwrpr">
                <?php echo Khobish_Helper::thepack_get_builder_image($settings['logo']['url'],'logotb');?>
            </div>
        </div>    
 
        <div class="khbnavcenter">
            <div class="listinr">
              
            </div> 
        </div>

        <div class="khbnavright">
            <div class="inrwrpr">
                <?php echo $this->out_social_link($settings['socials']);?> 
            </div>    
        </div>    

    </div>
</div>