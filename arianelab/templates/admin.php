
 <div class="wrap" id="arianelabcontent">
  
    <h2>ArianeLab Plugin v<?php echo $this->version; ?></h2>
    
    <p class="update-message notice inline notice-warning notice-alt">
<?php

echo __(
    "You need to have a <a target=\"_blank\" href=\"https://www.arianelab.com/\">ArianeLab</a> account to use this plugin. 
    This plugin inserts the neccessary code into your Wordpress site automatically without you having to touch anything. 
    In order to use the plugin, you need to enter your ArianeLab Subdomain (Your Subdomain can be found in the <i>Base</i> section 
    after you <a target=\"_blank\" href=\"https://console.arianelab.com/base/own\">login</a> into your ArianeLab account.)",
    $this->_text_domain
);
?>
    </p>
    
    <form method="post" action="options.php">

<?php 
$types = get_option('arianelab_tag_type'); 
if (empty($types)) {
    $types = [];
}
?>

<?php settings_fields('al_arianelab_options'); ?>
    
        <div id="col-container" class="wp-clearfix">

            <div class="col-wrap">

                <div class="card" id="card_token">

                    <table class="form-table">
                        <tr>
                            <th scope="row">
                            <?php echo __("Your site token", $this->_text_domain); ?>
                            </th>
                            <td>
                                <input type="text" 
                                    style="width: 200px;" 
                                    name="arianelab_site_token" 
                                    value="<?php echo get_option('arianelab_site_token'); ?>" />
                            </td>
                        </tr>
                    </table>

                    <h2 style="margin-top: 40px;">
<?php 
echo __("Make sure site token matches the value in site settings page.", $this->_text_domain); 
?>
                    </h2>
        
                    <img src="<?php echo plugins_url($this->name . '/assets/screenshot-1.jpg'); ?>" 
                         alt="Screenshot"
                         class="screenshot" />

                    <p style="margin-top:10px">
<?php 
echo __("Just copy the site value ex: demo from ArianeLab dashboard and enter it above.", $this->_text_domain); 
?>
                    </p>

                </div>

            </div>

            <div class="col-wrap">

                <div class="card" id="card_visit">
                    <h2>
                        <label for="arianelab_tag_visit">
                            <input type="checkbox" 
                                name="arianelab_tag_type[]" 
                                id="arianelab_tag_visit" 
                                class="arianelab_tag"
                                <?php checked(in_array('visit', $types)); ?>
                                value="visit" />
                            <?php echo __("Visit tag", $this->_text_domain); ?>
                        </label>
                    </h2>

                    <div id="arianelab_tag_visit_cfg" class="cfg card-body">
                        <div class="update-message notice inline notice-warning notice-alt" 
                             style="margin-top:10px">
                            <h2>
<?php 
echo __("The visit tag DOES NOT include the subscription Tag.", $this->_text_domain); 
?>
                            </h2>

                        </div>

                    </div>

                </div>

                <div class="card" id="card_sub">
                    <h2>
                        <label for="arianelab_tag_collect">
                            <input type="checkbox" 
                                   name="arianelab_tag_type[]" 
                                   id="arianelab_tag_collect" 
                                   class="arianelab_tag"
                                   <?php checked(in_array('sub', $types)); ?>
                                   value="sub" />
<?php echo __("WPN subscription tag", $this->_text_domain); ?>
                        </label>
                    </h2>

                    <div id="arianelab_tag_collect_cfg" class="cfg card-body">

                        <table class="form-table">
                            <tr>
                                <th scope="row">
<?php echo __("Your ArianeLab Subdomain", $this->_text_domain); ?>
                                </th>
                                <td>
                                    <input type="text" 
                                        style="width: 200px;" 
                                        name="arianelab_subdomain" 
                                        value="<?php echo get_option('arianelab_subdomain'); ?>" />
                                </td>
                            </tr>
                        </table>
                        <h2 style="margin-top: 40px;">
<?php echo __("Make sure subdomain matches the value in settings page.", $this->_text_domain); ?>
                        </h2>

                        <img src="<?php echo plugins_url($this->name . '/assets/screenshot-2.jpg'); ?>" 
                             alt="Screenshot"
                             class="screenshot" />

                        <p style="margin-top:10px">
<?php echo __("Just copy the subdomain value ex: demo from ArianeLab dashboard and enter it above.", $this->_text_domain); ?>
                        </p>

                        <div class="update-message notice inline notice-success notice-alt" style="margin-top:10px">
                            <h2>
<?php echo __("The subscription tag include the visit Tag.", $this->_text_domain); ?>
                            </h2>
                        </div>

                    </div>

                </div>

                <div class="card" id="card_diff">
                    <h2>
                        <label for="arianelab_tag_diff">
                            <input type="checkbox" 
                                name="arianelab_tag_type[]" 
                                id="arianelab_tag_diff" 
                                class="arianelab_tag"
                                <?php checked(in_array('diff', $types)); ?>
                                value="diff" />
<?php echo __("Notification center tag", $this->_text_domain); ?>
                        </label>
                    </h2>

                    <div class="update-message notice inline notice-success notice-alt" style="margin-top:10px">
                        <h2>
<?php echo __("The Notification center tag include the visit Tag.", $this->_text_domain); ?>
                        </h2>
                    </div>

                </div>

            </div>

        </div>

        <p class="submit">
            <input type="submit" 
                   class="button-primary" 
                   value="<?php _e('Save Changes') ?>" />
        </p>

    </form>

    <br /><br />
    
    <p style="margin-top:20px">
<?php 
echo __("ArianeLab : Specialist of the push channels and the recommendation of messages, managed by our artificial intelligence and targeting algorithms in partnership with the Polytechnique research center.", $this->_text_domain);
?>
        <br /><br />
<?php 
echo __("To enable it for your WordPress site, signup for Free at ", $this->_text_domain); ?>
<a target="_blank" href="https://console.arianelab.com/">https://console.arianelab.com/</a>. 
<?php
echo __("Or get in touch with us at ", $this->_text_domain); 
?>
        <a href="mailto:contact@arianelab.com">contact@arianelab.com</a>
    </p>

</div>
