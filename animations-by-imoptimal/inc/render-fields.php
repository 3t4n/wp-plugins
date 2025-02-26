<?php
if(!function_exists('imoanim_numbers_render')) {
    function imoanim_numbers_render() {

        $defaults = array(
            'imoanim_numbers_field'   => '1',
        );
        $options = wp_parse_args( get_option( 'imoanim_meta', $defaults), $defaults );
        $numbers = $options['imoanim_numbers_field'];
?>

<input type="number" name="imoanim_meta[imoanim_numbers_field]" value="<?php echo $numbers; ?>" min="1" max="100" placeholder="1">
<?php }
}

if(!function_exists('imoanim_minification_render')) {
    function imoanim_minification_render() {

        $defaults = array(
            'imoanim_minification_field'   => '0',
        );
        $options = wp_parse_args( get_option( 'imoanim_meta', $defaults), $defaults );
        $minification = $options['imoanim_minification_field'];
?>

<select name='imoanim_meta[imoanim_minification_field]' value="<?php echo $minification; ?>">
    <option value="0" <?php if($minification == 0): ?>selected<?php endif; ?>><?php esc_html_e('Use regural files (not minified)', 'imoptimal_animation'); ?></option>
    <option value="1" <?php if($minification == 1): ?>selected<?php endif; ?>><?php esc_html_e('Use minified files', 'imoptimal_animation'); ?></option>
</select>
<?php }
}

if(!function_exists('imoanim_items_render')) {
    function imoanim_items_render($args) {
        
        $field_items = 'imoanim_items_' . $args['index'];
        $defaults = array(
            $field_items   => '',
        );
        $options = wp_parse_args( get_option( 'imoanim_settings', $defaults), $defaults );
        $value = $options[$field_items];

        echo "<textarea class='imo-items' type='text' name='imoanim_settings[{$field_items}]' placeholder='#id, .class, div'>" . $value . "</textarea>";

    }
}

if(!function_exists('imoanim_animation_type_render')) {
    function imoanim_animation_type_render($args) {
        
        $field_type = 'imoanim_animation_type_' . $args['index'];
        $defaults = array(
            $field_type   => 'bounce',
        );
        $options = wp_parse_args( get_option( 'imoanim_settings', $defaults), $defaults );
        $value = $options[$field_type];

        $attention_seekers = array('bounce', 'flash', 'pulse', 'rubberBand', 'shake', 'swing', 'tada', 'wobble', 'jello', 'heartBeat');
        $bouncing_entrances = array('bounceIn', 'bounceInDown', 'bounceInLeft', 'bounceInRight', 'bounceInUp');
        $bouncing_exits = array('bounceOut', 'bounceOutDown', 'bounceOutLeft', 'bounceOutRight', 'bounceOutUp');
        $fading_entrances = array('fadeIn', 'fadeInDown', 'fadeInDownBig', 'fadeInLeft', 'fadeInLeftBig', 'fadeInRight', 'fadeInRightBig', 'fadeInUp', 'fadeInUpBig');
        $fading_exits = array('fadeOut', 'fadeOutDown', 'fadeOutDownBig', 'fadeOutLeft', 'fadeOutLeftBig', 'fadeOutRight', 'fadeOutRightBig', 'fadeOutUp', 'fadeOutUpBig' );
        $flippers = array('flip', 'flipInX', 'flipInY', 'flipOutX', 'flipOutY');
        $lightspeed = array('lightSpeedIn', 'lightSpeedOut');
        $rotating_entrances = array('rotateIn', 'rotateInDownLeft', 'rotateInDownRight', 'rotateInUpLeft', 'rotateInUpRight');
        $rotating_exits = array('rotateOut', 'rotateOutDownLeft', 'rotateOutDownRight', 'rotateOutUpLeft', 'rotateOutUpRight');
        $sliding_entrances = array('slideInUp', 'slideInDown', 'slideInLeft', 'slideInRight');
        $sliding_exits = array('slideOutUp', 'slideOutDown', 'slideOutLeft', 'slideOutRight');
        $zoom_entrances = array('zoomIn', 'zoomInDown', 'zoomInLeft', 'zoomInRight', 'zoomInUp');
        $zoom_exits = array('zoomOut', 'zoomOutDown', 'zoomOutLeft', 'zoomOutRight', 'zoomOutUp');
        $specials = array('hinge', 'jackInTheBox', 'rollIn', 'rollOut');

        echo "<div class='flexing'>
    <select class='imo-animation-type {$args['index']}' name='imoanim_settings[{$field_type}]' value=" . $value . ">

    <optgroup label='Attention Seekers'>";
        foreach ($attention_seekers as $animation) {
            $selected = ($value == $animation) ? 'selected="selected"' : '';
            echo "<option value='$animation' $selected>$animation</option>";
        }
        echo "</optgroup>
    <optgroup label='Bouncing Entrances'>";
        foreach ($bouncing_entrances as $animation) {
            $selected = ($value == $animation) ? 'selected="selected"' : '';
            echo "<option value='$animation' $selected>$animation</option>";
        }
        echo "</optgroup>
    <optgroup label='Bouncing Exits'>";
        foreach ($bouncing_exits as $animation) {
            $selected = ($value == $animation) ? 'selected="selected"' : '';
            echo "<option value='$animation' $selected>$animation</option>";
        }
        echo "</optgroup>
    <optgroup label='Fading Entrances'>";
        foreach ($fading_entrances as $animation) {
            $selected = ($value == $animation) ? 'selected="selected"' : '';
            echo "<option value='$animation' $selected>$animation</option>";
        }
        echo "</optgroup>        
    <optgroup label='Fading Exits'>";
        foreach ($fading_exits as $animation) {
            $selected = ($value == $animation) ? 'selected="selected"' : '';
            echo "<option value='$animation' $selected>$animation</option>";
        }
        echo "</optgroup>    
    <optgroup label='Flippers'>";
        foreach ($flippers as $animation) {
            $selected = ($value == $animation) ? 'selected="selected"' : '';
            echo "<option value='$animation' $selected>$animation</option>";
        }
        echo "</optgroup> 
    <optgroup label='Lightspeed'>";
        foreach ($lightspeed as $animation) {
            $selected = ($value == $animation) ? 'selected="selected"' : '';
            echo "<option value='$animation' $selected>$animation</option>";
        }
        echo "</optgroup>    
    <optgroup label='Rotating Entrances'>";
        foreach ($rotating_entrances as $animation) {
            $selected = ($value == $animation) ? 'selected="selected"' : '';
            echo "<option value='$animation' $selected>$animation</option>";
        }
        echo "</optgroup>    
    <optgroup label='Rotating Exits'>";
        foreach ($rotating_exits as $animation) {
            $selected = ($value == $animation) ? 'selected="selected"' : '';
            echo "<option value='$animation' $selected>$animation</option>";
        }
        echo "</optgroup> 
    <optgroup label='Sliding Entrances'>";
        foreach ($sliding_entrances as $animation) {
            $selected = ($value == $animation) ? 'selected="selected"' : '';
            echo "<option value='$animation' $selected>$animation</option>";
        }
        echo "</optgroup>
    <optgroup label='Sliding Exits'>";
        foreach ($sliding_exits as $animation) {
            $selected = ($value == $animation) ? 'selected="selected"' : '';
            echo "<option value='$animation' $selected>$animation</option>";
        }
        echo "</optgroup>
    <optgroup label='Zoom Entrances'>";
        foreach ($zoom_entrances as $animation) {
            $selected = ($value == $animation) ? 'selected="selected"' : '';
            echo "<option value='$animation' $selected>$animation</option>";
        }
        echo "</optgroup>   
    <optgroup label='Zoom Exits'>";
        foreach ($zoom_exits as $animation) {
            $selected = ($value == $animation) ? 'selected="selected"' : '';
            echo "<option value='$animation' $selected>$animation</option>";
        }
        echo "</optgroup>  
    <optgroup label='Specials'>";
        foreach ($specials as $animation) {
            $selected = ($value == $animation) ? 'selected="selected"' : '';
            echo "<option value='$animation' $selected>$animation</option>";
        }
        echo "</optgroup>  
    </select>

    <div class='imo-preview'>
        <div class='imo-example-area {$args['index']}'>
           <div class='example-block'></div>
        </div>
        <span class='preview-button'>Preview</span>
    </div>

    </div>";
    }
}

if(!function_exists('imoanim_animation_duration_render')) {
    function imoanim_animation_duration_render($args) {
        
        $field_duration = 'imoanim_animation_duration_' . $args['index'];
        $defaults = array(
            $field_duration   => '0.5',
        );
        $options = wp_parse_args( get_option( 'imoanim_settings', $defaults), $defaults );
        $value = $options[$field_duration];
        $duration = array();
        $sec = 's';

        for($i=0.5; $i<=5; $i += 0.1) {
            $duration[] = $i . $sec;  
        }

        echo "<select class='imo-animation-duration' name='imoanim_settings[{$field_duration}]' value=' . $value . '>";
        foreach ($duration as $selection) {
            $selected = ($value == $selection) ? 'selected="selected"' : '';
            echo "<option value='$selection' $selected>$selection</option>";
        }
        echo "</select>";
    }
}

if(!function_exists('imoanim_animation_repetition_render')) {
    function imoanim_animation_repetition_render($args) {
        
        $field_repetition = 'imoanim_animation_repetition_' . $args['index'];
        $defaults = array(
            $field_repetition   => '1',
        );
        $options = wp_parse_args( get_option( 'imoanim_settings', $defaults), $defaults );
        $value = $options[$field_repetition];
        $repetition = array();

        for($i=1; $i<=5; $i++) {
            $repetition[] = $i;  
        }
        array_push($repetition, 'infinite');

        echo "<select class='imo-animation-repetition' name='imoanim_settings[{$field_repetition}]' value=' . $value . '>";
        foreach ($repetition as $selection) {
            $selected = ($value == $selection) ? 'selected="selected"' : '';
            echo "<option value='$selection' $selected>$selection</option>";
        }
        echo "</select>";
    }
}

if(!function_exists('imoanim_animation_timing_render')) {
    function imoanim_animation_timing_render($args) {
        
        $field_timing = 'imoanim_timing_' . $args['index'];
        $defaults = array(
            $field_timing   => 'linear',
        );
        $options = wp_parse_args( get_option( 'imoanim_settings', $defaults), $defaults );
        $value = $options[$field_timing];
        $timing = array('linear', 'ease', 'ease-in', 'ease-out', 'ease-in-out');

        echo "<select class='imo-animation-timing' name='imoanim_settings[{$field_timing}]' value=' . $value . '>";
        foreach ($timing as $selection) {
            $selected = ($value == $selection) ? 'selected="selected"' : '';
            echo "<option value='$selection' $selected>$selection</option>";
        }
        echo "</select>";
    }
}

if(!function_exists('imoanim_animation_delay_render')) {
    function imoanim_animation_delay_render($args) {
        
        $field_delay = 'imoanim_delay_' . $args['index'];
        $defaults = array(
            $field_delay   => '0',
        );
        $options = wp_parse_args( get_option( 'imoanim_settings', $defaults), $defaults );
        $value = $options[$field_delay];
        $delay = array();
        $sec = 's';

        for($i=0; $i<=5; $i+=0.1) {
            $delay[] = $i . $sec; 
        }

        echo "<select class='imo-animation-delay' name='imoanim_settings[{$field_delay}]' value=' . $value . '>";
        foreach ($delay as $selection) {
            $selected = ($value == $selection) ? 'selected="selected"' : '';
            echo "<option value='$selection' $selected>$selection</option>";
        }
        echo "</select>";
    }
}

if(!function_exists('imoanim_reanimation_render')) {
    function imoanim_reanimation_render($args) {
        
        $field_reanimation = 'imoanim_reanimation_' . $args['index'];
        $defaults = array(
            $field_reanimation   => '0',
        );
        $options = wp_parse_args( get_option( 'imoanim_settings', $defaults), $defaults );
        $value = $options[$field_reanimation];

        echo "<select name='imoanim_settings[{$field_reanimation}]' value=" . $value . ">
    <option value='0' " . (($value == 0)? "selected='selected'":"") . ">" . esc_html__('False (Do not re-animate)', 'imoptimal_animation') . "</option>
    <option value='1' " . (($value == 1)? "selected='selected'":"") . ">" . esc_html__('Re-animate when items enter viewport', 'imoptimal_animation') . "</option>
    <option value='2' " . (($value == 2)? "selected='selected'":"") . ">" . esc_html__('Animate items on hover/touch', 'imoptimal_animation') . "</option>
</select>";
    }
}?>
