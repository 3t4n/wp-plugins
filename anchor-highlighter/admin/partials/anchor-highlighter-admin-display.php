<?php
/**
 *
 * admin/partials/anchor-highlighter-admin-display.php
 *
 **/


?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div class="wrap">

    <h2><?php echo esc_html( get_admin_page_title() ); ?></h2>

    <form method="post" name="highlighter_options" action="options.php">

        <?php settings_fields($this->plugin_name); ?>

        <?php
        //Grab all options

        $options = get_option($this->plugin_name);

        // is activated
        $activated = $options['activated'];

        ?>

        <?php
        settings_fields( $this->plugin_name );
        do_settings_sections( $this->plugin_name );
        ?>
        <!-- user chooses the name of the class that he wants to add to the current anchors -->
        <fieldset>
            <legend class="screen-reader-text"><span><?php _e('choose class', $this->plugin_name);?></span></legend>
            <label for="<?php echo $this->plugin_name;?>-activated">
                <input type="input" id="<?php echo $this->plugin_name;?>-activated" name="<?php echo $this->plugin_name;?>[activated]" value="<?php echo $activated ?>"/>
                <span><?php esc_attr_e( 'Choose the class that you want to add to your current anchors', $this->plugin_name ); ?></span>
            </label>
        </fieldset>

        <?php submit_button(__('Save all changes', $this->plugin_name), 'primary','submit', TRUE); ?>

    </form>

</div>