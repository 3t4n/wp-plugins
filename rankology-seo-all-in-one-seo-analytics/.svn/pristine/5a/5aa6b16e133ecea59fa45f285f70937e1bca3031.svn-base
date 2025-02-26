<?php
// Get IP Method
$ip_method = \RANKOLOGY_STATS\IP::getIPMethod();

// Add TickBox
add_thickbox();
?>
<!-- Show Help $_SERVER -->
<style>
    #TB_window {
        direction: ltr;
    }
</style>
<div id="list-of-php-server" style="display:none;">
    <table style="direction: ltr;">
        <tr>
            <td width="330" style="border-bottom: 1px solid #ccc;padding-top:10px;padding-bottom:10px;">
                <b><?php esc_html_e('$_SERVER', 'rankology-stats'); ?></b></td>
            <td style="border-bottom: 1px solid #ccc;padding-top:10px;padding-bottom:10px;"><b><?php esc_html_e('Value', 'rankology-stats'); ?></b></td>
        </tr>
        <?php
        foreach ($_SERVER as $key => $value) {
            // Check Value is Array
            if (is_array($value)) {
                $value = json_encode($value);
            }
            ?>
            <tr>
                <td width="330" style="padding-top:10px;padding-bottom:10px;">
                    <b><?php echo esc_attr($key); ?></b>
                </td>
                <td style="padding-top:10px;padding-bottom:10px;"><?php echo esc_attr(($value == "" ? "-" : substr(str_replace(array("\n", "\r"), '', trim($value)), 0, 200)) . (strlen($value) > 200 ? '..' : '')); ?></td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>
<div class="postbox">
    <table class="form-table">
        <tbody>
        <tr valign="top">
            <th scope="row" colspan="2" style="padding-bottom: 10px; font-weight: normal;line-height: 25px;">
                <?php esc_html_e('Your IP address detects by SeeIP.org service:', 'rankology-stats'); ?>
                <strong id="user_real_ip">
                    <script type="application/javascript">
                        jQuery(document).ready(function () {
                            jQuery.ajax({
                                url: "https://ip.seeip.org/json",
                                dataType: 'json',
                                beforeSend: function () {
                                    jQuery("#user_real_ip").html('Loading...');
                                },
                                error: function (jqXHR) {
                                    if (jqXHR.status == 0) {
                                        jQuery("#user_real_ip").html("<?php esc_html_e('Please check your internet connection and try again.', 'rankology-stats'); ?>");
                                    }
                                },
                                success: function (json) {
                                    jQuery("#user_real_ip").html(json['ip']);
                                }
                            });
                        });
                    </script>
                </strong>
            </th>
        </tr>

        <tr>
            <td colspan="3">
                <p><?php esc_html_e('The items below return the IP address that is different on each server. Is the best way that you choose.', 'rankology-stats'); ?></p>
            </td>
        </tr>

        <?php
        foreach (\RANKOLOGY_STATS\IP::$ip_methods_server as $method) {
            ?>
            <tr valign="top">
                <th scope="row" colspan="2" style="padding-top: 8px;padding-bottom: 8px;">
                    <table>
                        <tr>
                            <td style="width: 10px; padding: 0px;">
                                <input type="radio" name="ip_method" style="vertical-align: -3px;" value="<?php echo esc_attr($method); ?>"<?php if ($ip_method == $method) {
                                    echo " checked=\"checked\"";
                                } ?>>
                            </td>
                            <td style="width: 250px;"> <?php printf(__('Use %1$s', 'rankology-stats'), esc_attr($method)); ?></td>
                            <td><code><?php
                                    if (isset($_SERVER[$method]) and !empty($_SERVER[$method])) {
                                        echo esc_attr(wp_unslash($_SERVER[$method]));
                                    } else {
                                        esc_html_e('No available data.', 'rankology-stats');
                                    } ?>
                                </code>
                                <?php
                                if (isset($_SERVER[$method]) and !empty($_SERVER[$method]) and \RANKOLOGY_STATS\IP::check_sanitize_ip($_SERVER[$method]) === false) {
                                    echo ' &nbsp;&nbsp;<a href="" style="color: #d04f4f;" target="_blank" title="' . __('Your value required to sanitize user IP', 'rankology-stats') . '"><span class="dashicons dashicons-warning"></span></a>';
                                }
                                ?>
                            </td>
                        </tr>
                    </table>
                </th>
            </tr>
            <?php
        }
        ?>

        <!-- Custom Header -->
        <tr valign="top">
            <th scope="row" colspan="2" style="padding-top: 0px;padding-bottom: 0px;">
                <table>
                    <tr>
                        <td style="width: 10px; padding: 0px;">
                            <input type="radio" name="ip_method" style="vertical-align: -3px;" value="CUSTOM_HEADER" <?php if (!in_array($ip_method, \RANKOLOGY_STATS\IP::$ip_methods_server)) {
                                echo " checked=\"checked\"";
                            } ?>>
                        </td>
                        <td style="width: 250px;"> <?php echo __('Use Custom Header', 'rankology-stats'); ?></td>
                        <td style="padding-left: 0px;">
                            <input type="text" name="user_custom_header_ip_method" autocomplete="off" style="padding: 5px; width: 250px;height: 35px;" value="<?php if (!in_array($ip_method, \RANKOLOGY_STATS\IP::$ip_methods_server)) {
                                echo esc_attr($ip_method);
                            } ?>">

                            <p class="description">
                                <?php if (!in_array($ip_method, \RANKOLOGY_STATS\IP::$ip_methods_server)) {
                                    echo '<code>';
                                    if (isset($_SERVER[$ip_method]) and !empty($_SERVER[$ip_method])) {
                                        echo sanitize_text_field(wp_unslash($_SERVER[$ip_method]));
                                    } else {
                                        esc_html_e('No available data.', 'rankology-stats');
                                    }
                                }
                                echo '</code>';
                                if (!in_array($ip_method, \RANKOLOGY_STATS\IP::$ip_methods_server) and isset($_SERVER[$ip_method]) and !empty($_SERVER[$ip_method]) and \RANKOLOGY_STATS\IP::check_sanitize_ip($_SERVER[$ip_method]) === false) {
                                    echo ' &nbsp;&nbsp;<a href="" style="color: #d04f4f;" target="_blank" title="' . __('Your value required to sanitize user IP', 'rankology-stats') . '"><span class="dashicons dashicons-warning"></span></a>';
                                }
                                ?></p>
                            <p class="description"><?php esc_html_e('Fill out this field if your server uses the custom key in <code>$_SERVER</code> for getting the IP.', 'rankology-stats'); ?></p>
                            <p class="description"><?php esc_html_e('e.g. <code>HTTP_CF_CONNECTING_IP</code> in CloudFlare.', 'rankology-stats'); ?></p>
                            <p class="description">
                                <a href="#TB_inline?&width=850&height=600&inlineId=list-of-php-server" class="thickbox"><?php esc_html_e('Show all <code>$_SERVER</code> in your server.', 'rankology-stats'); ?></a>
                            </p>
                        </td>
                    </tr>
                </table>
            </th>
        </tr>

        </tbody>
    </table>
</div>

<?php submit_button(__('Update', 'rankology-stats'), 'primary', 'submit', '', array('OnClick' => "var rknsCurrentTab = getElementById('rkns_current_tab'); rknsCurrentTab.value='ip-configuration-settings'")); ?>
