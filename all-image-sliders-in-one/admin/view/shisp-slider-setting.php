<?php
$shisp_default_slider_setting = array(
    'ease'              => 'easeInOutExpo',
    'speed'             => '1000',
    'duration'          => '5000',
    'autoplay'          => 'true',
    'transition'        => 'up',
    'navtype'           => 'controls',
    'includefooter'     => 'false'
);
$shisp_load_slider = get_post_meta( $post->ID, 'shisp-slider-postmeta', true );
$shisp_load_slider = is_array($shisp_load_slider) ? $shisp_load_slider : $shisp_default_slider_setting;
?>

<div class="wrap shisp-slider-setting-div">

    <p>
        <label for="shisp-slider-speed"><?php _e('Speed(milliseconds)','shisp-images-slider'); ?></label>
        <input type="number" step="100" max="2000" name="shisp-slider-speed" id="shisp-slider-speed" value="<?php echo intval( $shisp_load_slider['speed'] ); ?>">
    </p>

    <p>
        <label for="shisp-slider-duration"><?php _e('Duration(milliseconds)','shisp-images-slider'); ?></label>
        <input type="number" step="100" max="60000" name="shisp-slider-duration" id="shisp-slider-duration" value="<?php echo intval( $shisp_load_slider['duration'] ); ?>">
    </p>

    <p>
        <label for="shisp-slider-autoplay"><?php _e('Autoplay','shisp-images-slider'); ?></label>
        <input type="checkbox" name="shisp-slider-autoplay" id="shisp-slider-autoplay" value="1" <?php checked($shisp_load_slider['autoplay'],1); ?>>
    </p>
    
    <p>
        <label for="shisp-slider-includefooter"><?php _e('Include Footer','shisp-images-slider'); ?></label>
        <input type="checkbox" name="shisp-slider-includefooter" id="shisp-slider-includefooter" value="1" <?php checked($shisp_load_slider['includefooter'],1); ?>>
    </p>

    <p>
        <label for="shisp-slider-transition"><?php _e('Transition','shisp-images-slider'); ?></label>
        <select name="shisp-slider-transition">
            <option value="select"><?php _e('Select','shisp-images-slider'); ?></option>
            <option value="fade" <?php selected($shisp_load_slider['transition'],'fade'); ?>><?php _e('fade','shisp-images-slider'); ?></option>
            <option value="up" <?php selected($shisp_load_slider['transition'],'up'); ?>><?php _e('up','shisp-images-slider'); ?></option>
            <option value="down" <?php selected($shisp_load_slider['transition'],'down'); ?>><?php _e('down','shisp-images-slider'); ?></option>
            <option value="left" <?php selected($shisp_load_slider['transition'],'left'); ?>><?php _e('left','shisp-images-slider'); ?></option>
            <option value="right" <?php selected($shisp_load_slider['transition'],'right'); ?>><?php _e('right','shisp-images-slider'); ?></option>
        </select>
    </p>
    
    <p>
        <label for="shisp-slider-navtype"><?php _e('Nav Type','shisp-images-slider'); ?></label>
        <select name="shisp-slider-navtype">
            <option value="select"><?php _e('Select','shisp-images-slider'); ?></option>
            <option value="controls" <?php selected($shisp_load_slider['navtype'],'controls'); ?>><?php _e('controls','shisp-images-slider'); ?></option>
            <option value="list" <?php selected($shisp_load_slider['navtype'],'list'); ?>><?php _e('list','shisp-images-slider'); ?></option>
            <option value="both" <?php selected($shisp_load_slider['navtype'],'both'); ?>><?php _e('both','shisp-images-slider'); ?></option>
            <option value="none" <?php selected($shisp_load_slider['navtype'],'none'); ?>><?php _e('none','shisp-images-slider'); ?></option>
        </select>
    </p>

    <p>
        <ul class="shisp-slider-easing" style="display: inline-block;">

        <?php 
        $shisp_slider_easingList = array(
                        'easeInBack',
                        'easeInBounce',
                        'easeInCirc',
                        'easeInCubic',
                        'easeInElastic',
                        'easeInExpo',
                        'easeInOutBack',
                        'easeInOutBounce',
                        'easeInOutCirc',
                        'easeInOutCubic',
                        'easeInOutElastic',
                        'easeInOutExpo',
                        'easeInOutQuad',
                        'easeInOutQuart',
                        'easeInOutQuint',
                        'easeInOutSine',
                        'easeInQuad',
                        'easeInQuart',
                        'easeInQuint',
                        'easeInSine',
                        'easeOutBack',
                        'easeOutBounce',
                        'easeOutCirc',
                        'easeOutCubic',
                        'easeOutElastic',
                        'easeOutExpo',
                        'easeOutQuad',
                        'easeOutQuart',
                        'easeOutQuint',
                        'easeOutSine',
                        'linear',
                        'swing',
                        );
            foreach ($shisp_slider_easingList as $ease) { ?>

                <li style="display: inline-block;">
                    <input type="radio" name="shisp-slider-easing" id="shisp-slider-<?php echo strval($ease); ?>" <?php checked($ease,$shisp_load_slider['ease']); ?> value="<?php echo strval($ease); ?>">
                    <label for="shisp-slider-<?php echo strval($ease); ?>">
                        <img title="<?php echo strval($ease); ?>" src="<?php echo SHISP_IMG.strval($ease).'.png'; ?>">
                    </label>
                </li>

        <?php } ?>

        </ul>
    </p>

</div>