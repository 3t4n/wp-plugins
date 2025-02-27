<?php
use News_Element\Khobish_Helper;
?>
<div class="ne-heading-2 <?php echo esc_attr($settings['tmpl']);?>">
    <?php 
    if($settings['link']['url']){
        echo '<'.$settings['ftag'].' class="ne-label ne-margin-0"><a ' . Khobish_Helper::render_link($settings['link']) . '>' . $settings['heading'] . '</a></'.$settings['ftag'].'>';
    } else {
        echo Khobish_Helper::render_html($settings['heading'],$settings['ftag'],'ne-label ne-margin-0');
    }
    ?>
</div>
 