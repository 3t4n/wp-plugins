<?php
use News_Element\Khobish_Helper;
?> 
<div class="xlm-center-logo">
    <div class="header-flex-wrapper khbnav">
        <div class="khbnavleft">
            <div class="leftwrpr">
                <?php echo $this->out_subs_btn($settings['sub-btn'],$settings['sub-link']);?>
            </div>
        </div>     

        <div class="khbnavcenter">
            <div class="listinr">
              <?php echo Khobish_Helper::thepack_get_builder_image($settings['logo']['url'],'logotb');?>
            </div> 
        </div>

        <div class="khbnavright">
            <div class="inrwrpr khblogosocial">
                <?php echo $this->out_social_link($settings['socials']);?>
            </div>    
        </div>    

    </div>
</div>