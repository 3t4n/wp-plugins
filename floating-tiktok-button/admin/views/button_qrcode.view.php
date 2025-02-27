<!-- Floating TikTok Button -->
<a 
    href="https://tiktok.com/@<?php echo esc_html($option->val('tiktok_id')); ?>" class="ftb-button" target="_blank">

    <?php if ($option::check('text_position') && $option::get('text_position') === "above") { ?>

    <?php echo esc_html($option->val('button_text', "")); ?>

    <?php } ?>

        <img src="<?php echo $option->get('icon_url'); ?>" class="ftb-icon" alt="<?php echo esc_html($option->val('button_text', "")); ?>"/>
    
    <?php
    
        if ($option::check('text_position') && $option::get('text_position') === "below") { 
            
            echo esc_html($option->val('button_text', ""));
            
        }
    
    ?>

</a>

<a 
    href="https://tiktok.com/@<?php $option->val('tiktok_id'); ?>" class="ftb-button" target="_blank" style="<?php if ( $option::check('button_position') ) {
            switch ( $option::get('button_position') ) 
            {
                case $option::get('button_position') == 'bottom_right':
                    echo "left:0;right:auto;";
                    break;
                case $option::get('button_position') == 'bottom_left':
                    echo "right:0;left:auto;";
                    break;
                case $option::get('button_position') == 'top_right':
                    echo "left:0;right:auto;";
                    break;
                case $option::get('button_position') == 'top_left':
                    echo "right:0;left:auto;";
                    break;
            }
            echo esc_html($option->css('margin_left', 'margin-right', 
                $option->check('margin_left') ? $option->get('margin_left') : '0', "px"));

            echo esc_html($option->css('margin_right', 'margin-left', 
                $option->check('margin_right') ? $option->get('margin_right') : '0', "px"));
        } ?>">

    <?php if ($option::check('text_position') && $option::get('text_position') === "above") { ?>

    <?php echo esc_html($option->val('button_text', "")); ?>

    <?php } ?>
    
    <div id="qrcode" class="ftb-qrcode"></div>
    
    <?php if ($option::check('text_position') && $option::get('text_position') === "below") { 
            
            echo esc_html($option->val('button_text', ""));
            
    } 
    
    ?>

</a>


    