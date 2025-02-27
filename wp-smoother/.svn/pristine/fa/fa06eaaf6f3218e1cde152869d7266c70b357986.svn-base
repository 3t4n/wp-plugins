<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://harryrobinsondev.com
 * @since      1.0.0
 *
 * @package    Wp_Smoother
 * @subpackage Wp_Smoother/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap">

    <h2><?php echo esc_html( get_admin_page_title() ); ?></h2>

    <form method="post" name="cleanup_options" action="options.php">

    <?php
    //Grab all options

        $options = get_option($this->plugin_name);

        // START VARS
        $wpsmoother_activate_fade = $options['wpsmoother_activate_fade'];
        $wpsmoother_fade_home = $options['wpsmoother_fade_home'];
        $wpsmoother_activate_mouse_scroll = $options['wpsmoother_activate_mouse_scroll'];
        $wpsmoother_activate_click_scroll = $options['wpsmoother_activate_click_scroll'];
        
        //VAR VALUES
        $wpsmoother_fade_duration = $options['wpsmoother_fade_duration'];
        $wpsmoother_mouse_distance = $options['wpsmoother_mouse_distance'];
        $wpsmoother_mouse_speed = $options['wpsmoother_mouse_speed'];
        $wpsmoother_anchor_speed = $options['wpsmoother_anchor_speed'];
            
    
    

    ?>

    <?php
        settings_fields( $this->plugin_name );
        do_settings_sections( $this->plugin_name );
        
        
        /*
        <fieldset>
        <legend class="screen-reader-text"><span><?php _e('Clean WordPress head section', $this->plugin_name);?></span></legend>
        <label for="<?php echo $this->plugin_name;?>-cleanup">
            <input type="checkbox" id="<?php echo $this->plugin_name;?>-cleanup" name="<?php echo $this->plugin_name;?>[cleanup]" value="1" <?php checked( $cleanup, 1 ); ?> />
            <span><?php esc_attr_e( 'Clean up the head section', $this->plugin_name ); ?></span>
        </label>
    </fieldset>
         */
    ?>

    <!-- remove some meta and generators from the <head> -->
    <h2>Fade on Page Load</h2>    
        <fieldset>
        <legend class="screen-reader-text"><span><?php _e('Enable Fade on Page Load?', $this->plugin_name);?></span></legend>
        <label for="<?php echo $this->plugin_name;?>-wpsmoother_activate_fade">
            <input type="checkbox" id="<?php echo $this->plugin_name;?>-wpsmoother_activate_fade" name="<?php echo $this->plugin_name;?>[wpsmoother_activate_fade]" value="1" <?php checked( $wpsmoother_activate_fade, 1 ); ?> />
            <span><?php esc_attr_e( 'Enable Page Fade?', $this->plugin_name ); ?></span>
        </label>
    </fieldset>  <br/>
        <fieldset>
        <legend class="screen-reader-text"><span><?php _e('Home page only?', $this->plugin_name);?></span></legend>
        <label for="<?php echo $this->plugin_name;?>-wpsmoother_fade_home">
            <input type="checkbox" id="<?php echo $this->plugin_name;?>-wpsmoother_fade_home" name="<?php echo $this->plugin_name;?>[wpsmoother_fade_home]" value="1" <?php checked( $wpsmoother_fade_home, 1 ); ?> />
            <span><?php esc_attr_e( 'Home page only?', $this->plugin_name ); ?></span>
        </label>
    </fieldset>
    

    
        <fieldset class="<?php if(1 != $wpsmoother_activate_fade) echo 'hidden';?>">
              <p>Select your fade duration ( 1200 recommended )</p>
              <legend class="screen-reader-text"><span><?php _e('Select your fade duration ( 1200 milliseconds recommended )', $this->plugin_name);?></span></legend>
              <label><input class="small-text" min="100" pattern="[0-9]" maxlength="5" max="10000" step-typ step="100" type="number" id="<?php echo $this->plugin_name;?>-wpsmoother_fade_duration" name="<?php echo $this->plugin_name;?>[wpsmoother_fade_duration]" value="<?php if(!empty($wpsmoother_fade_duration)) echo $wpsmoother_fade_duration;?>"  /> Milliseconds
        </label>
    </fieldset>
    

    
    
    <h2>Smooth Mouse Wheel Scrolling</h2>
    <fieldset>
        <legend class="screen-reader-text"><span><?php _e('Enable Smooth Mouse Scroll?', $this->plugin_name);?></span></legend>
        <label for="<?php echo $this->plugin_name;?>-wpsmoother_activate_mouse_scroll">
            <input type="checkbox" id="<?php echo $this->plugin_name;?>-wpsmoother_activate_mouse_scroll" name="<?php echo $this->plugin_name;?>[wpsmoother_activate_mouse_scroll]" value="1" <?php checked( $wpsmoother_activate_mouse_scroll, 1 ); ?> />
            <span><?php esc_attr_e( 'Enable Smooth Mouse Scroll?', $this->plugin_name ); ?></span>
        </label>
    </fieldset>
        <fieldset class="<?php if(1 != $wpsmoother_activate_mouse_scroll) echo 'hidden';?>">
              <p>Select your mouse scroll animation distance ( 100 recommended )</p>
              <legend class="screen-reader-text"><span><?php _e('Select your mouse scroll animation distance ( 100 recommended )', $this->plugin_name);?></span></legend>
              <label><input class="small-text" min="100" max="10000" pattern="[0-9]" maxlength="5" step-typ step="100" type="number" id="<?php echo $this->plugin_name;?>-wpsmoother_mouse_distance" name="<?php echo $this->plugin_name;?>[wpsmoother_mouse_distance]" value="<?php if(!empty($wpsmoother_mouse_distance)) echo $wpsmoother_mouse_distance;?>"  />
        Pixels</label>
    </fieldset>
        <fieldset class="<?php if(1 != $wpsmoother_activate_mouse_scroll) echo 'hidden';?>">
              <p>Select your mouse scroll animation speed ( 800 recommended )</p>
              <legend class="screen-reader-text"><span><?php _e('Select your mouse scroll animation speed ( 800 recommended )', $this->plugin_name);?></span></legend>
              <label><input class="small-text" min="100" max="10000" pattern="[0-9]" maxlength="5" step-typ step="100" type="number" id="<?php echo $this->plugin_name;?>-wpsmoother_mouse_speed" name="<?php echo $this->plugin_name;?>[wpsmoother_mouse_speed]" value="<?php if(!empty($wpsmoother_mouse_speed)) echo $wpsmoother_mouse_speed;?>"  />
        Milliseconds</label>
    </fieldset>

    <h2>Smooth Click to Scroll ( anchor ) Scrolling</h2>
    <fieldset>
        <legend class="screen-reader-text"><span><?php _e('Enable Anchor Smooth Scroll?', $this->plugin_name);?></span></legend>
        <label for="<?php echo $this->plugin_name;?>-wpsmoother_activate_click_scroll">
            <input type="checkbox" id="<?php echo $this->plugin_name;?>-wpsmoother_activate_click_scroll" name="<?php echo $this->plugin_name;?>[wpsmoother_activate_click_scroll]" value="1" <?php checked( $wpsmoother_activate_click_scroll, 1 ); ?> />
            <span><?php esc_attr_e( 'Enable Anchor Smooth Scroll?', $this->plugin_name ); ?></span>
        </label>
    </fieldset>
        <fieldset class="<?php if(1 != $wpsmoother_activate_click_scroll) echo 'hidden';?>">
              <p>Select your anchor scroll animation speed ( 800 recommended )</p>
              <legend class="screen-reader-text"><span><?php _e('Select your anchor scroll animation speed ( 800 recommended )', $this->plugin_name);?></span></legend>
              <label><input class="small-text" min="100" max="10000" pattern="[0-9]" maxlength="5" step="100" type="number" id="<?php echo $this->plugin_name;?>-wpsmoother_anchor_speed" name="<?php echo $this->plugin_name;?>[wpsmoother_anchor_speed]" value="<?php if(!empty($wpsmoother_anchor_speed)) echo $wpsmoother_anchor_speed;?>"  />
        Milliseconds</label>
    </fieldset>


    <?php submit_button(__('Save all changes', $this->plugin_name), 'primary','submit', TRUE); ?>

    </form>

</div>
