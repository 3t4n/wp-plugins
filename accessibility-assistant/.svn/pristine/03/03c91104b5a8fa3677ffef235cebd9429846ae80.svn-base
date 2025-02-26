<?php
if (!defined('ABSPATH')) exit;
$shopid = sanitize_text_field(get_option('accessibility_shopid'));
$token = get_option('accessibility_tokken');
$accessibility_url = get_option('accessibility_url');
$data = array('shopid' => $shopid,);
// print_r($data);
$content = assistant_api_call('/getShopData', $data, 'get');

if ($content['data']['trail_day'] == '1' && $content['data']['plan']) {
    $subscription_content = assistant_api_call('/wordpress/checkSubscriptionAndUpdate', $data, 'post');
    $subscription_status = $subscription_content['status'];
    // $subscription_status = 500;
    if ($subscription_status != '200') {
        require_once 'plan-list.php';
        return;
    }
}
//  print_r($subscription_content);
// echo '<pre>';
// print_r($content);
// echo '</pre>';
// echo 'plan: ' . $content['data']['plan'];

if (empty($accessibility_url)) {
    update_option('accessibility_url', sanitize_text_field($content['data']['url']));
}


if ($content) {
    $access_by_admin = $content['data']['access_by_admin'];
    //echo 'access_by_admin'.$access_by_admin;
    $trial_day = $content['data']['trail_day'];
    $current_plan = $content['data']['plan'];
    $is_installation_popup_shown = $content['data']['is_installation_popup_shown'];
    $is_plan_select_popup_shown = $content['data']['is_plan_select_popup_shown'];
    if ($is_installation_popup_shown == 0 && $is_plan_select_popup_shown == 0) {
        require_once 'installation-popup.php';
    }
    if ($is_plan_select_popup_shown == 0 && $trial_day == '1' && !empty($current_plan) && $is_installation_popup_shown == 1) {
        //echo "callled";
        require_once 'thanyou-popup.php';
    }
    if (isset($_POST['btnAdd'])) {

        // echo '<pre>';
        // print_r($_POST);

        if ( ! isset( $_POST['accessibility_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['accessibility_nonce'] ) ), 'accessibility_nonce' ) ) {
            print 'Sorry, You can not update....';
            exit;
        } else {
            $widget_enable = "off";
            $button_link_status = $keybaord_nav_switch = $cursor_switch = $desaturate_switch = $contrast_switch = $bigger_text_switch = $highlight_link_switch = $readable_fonts_switch = $reading_mask_switch = $highlight_titles_switch = $text_magnifier_switch = $image_alt_tooltip_switch = $stop_animation_switch = $word_spacing_switch = 0;
            $desktop_position = $mobile_position = $backgroundcolor = $fontcolor = $iconcolor = $bottom_padding = $choose_design = "";
            $error = array();
            $jsChecked = "off";
            if (isset($_POST['jsChecked'])) {
                $widget_enable = sanitize_text_field(wp_unslash($_POST['jsChecked']));
                if ($widget_enable == "on") {
                    $jsChecked = "on";
                }
            }

            $button_link_status = "off";
            if (isset($_POST['enable_link'])) {
                $widget_enable = sanitize_text_field(wp_unslash($_POST['enable_link']));
                if ($widget_enable == "on") {
                    $button_link_status  = "on";
                }
            }

            $keybaord_nav_switch = "off";
            if (isset($_POST['keybaord_nav_switch'])) {
                $widget_enable = sanitize_text_field(wp_unslash($_POST['keybaord_nav_switch']));
                if ($widget_enable == "on") {
                    $keybaord_nav_switch = "on";
                }
            }
            $cursor_switch = "off";
            if (isset($_POST['cursor_switch'])) {
                $widget_enable = sanitize_text_field(wp_unslash($_POST['cursor_switch']));
                if ($widget_enable == "on") {
                    $cursor_switch = "on";
                }
            }
            $desaturate_switch = "off";
            if (isset($_POST['desaturate_switch'])) {
                $widget_enable = sanitize_text_field(wp_unslash($_POST['desaturate_switch']));
                if ($widget_enable == "on") {
                    $desaturate_switch = "on";
                }
            }
            $contrast_switch = "off";
            if (isset($_POST['contrast_switch'])) {
                $widget_enable = sanitize_text_field(wp_unslash($_POST['contrast_switch']));
                if ($widget_enable == "on") {
                    $contrast_switch = "on";
                }
            }
            $bigger_text_switch = "off";
            if (isset($_POST['bigger_text_switch'])) {
                $widget_enable = sanitize_text_field(wp_unslash($_POST['bigger_text_switch']));
                if ($widget_enable == "on") {
                    $bigger_text_switch = "on";
                }
            }
            $highlight_link_switch = "off";
            if (isset($_POST['highlight_link_switch'])) {
                $widget_enable = sanitize_text_field(wp_unslash($_POST['highlight_link_switch']));
                if ($widget_enable == "on") {
                    $highlight_link_switch = "on";
                }
            }
            $readable_fonts_switch = "off";
            if (isset($_POST['readable_fonts_switch'])) {
                $widget_enable = sanitize_text_field(wp_unslash($_POST['readable_fonts_switch']));
                if ($widget_enable == "on") {
                    $readable_fonts_switch = "on";
                }
            }
            $reading_mask_switch = "off";
            if (isset($_POST['reading_mask_switch'])) {
                $widget_enable = sanitize_text_field(wp_unslash($_POST['reading_mask_switch']));
                if ($widget_enable == "on") {
                    $reading_mask_switch = "on";
                }
            }
            $highlight_titles_switch = "off";
            if (isset($_POST['highlight_titles_switch'])) {
                $widget_enable = sanitize_text_field(wp_unslash($_POST['highlight_titles_switch']));
                if ($widget_enable == "on") {
                    $highlight_titles_switch = "on";
                }
            }
            $text_magnifier_switch = "off";
            if (isset($_POST['text_magnifier_switch'])) {
                $widget_enable = sanitize_text_field(wp_unslash($_POST['text_magnifier_switch']));
                if ($widget_enable == "on") {
                    $text_magnifier_switch = "on";
                }
            }
            $image_alt_tooltip_switch = "off";
            if (isset($_POST['image_alt_tooltip_switch'])) {
                $widget_enable = sanitize_text_field(wp_unslash($_POST['image_alt_tooltip_switch']));
                if ($widget_enable == "on") {
                    $image_alt_tooltip_switch = "on";
                }
            }
            $stop_animation_switch = "off";
            if (isset($_POST['stop_animation_switch'])) {
                $widget_enable = sanitize_text_field(wp_unslash($_POST['stop_animation_switch']));
                if ($widget_enable == "on") {
                    $stop_animation_switch = "on";
                }
            }
            $word_spacing_switch = "off";
            if (isset($_POST['word_spacing_switch'])) {
                $widget_enable = sanitize_text_field(wp_unslash($_POST['word_spacing_switch']));
                if ($widget_enable == "on") {
                    $word_spacing_switch = "on";
                }
            }
            $letter_spacing_switch = "off";
            if (isset($_POST['letter_spacing_switch'])) {
                $widget_enable = sanitize_text_field(wp_unslash($_POST['letter_spacing_switch']));
                if ($widget_enable == "on") {
                    $letter_spacing_switch = "on";
                }
            }
            $line_height_switch = "off";
            if (isset($_POST['line_height_switch'])) {
                $widget_enable = sanitize_text_field(wp_unslash($_POST['line_height_switch']));
                if ($widget_enable == "on") {
                    $line_height_switch = "on";
                }
            }
            $alignment_switch = "off";
            if (isset($_POST['alignment_switch'])) {
                $widget_enable = sanitize_text_field(wp_unslash($_POST['alignment_switch']));
                if ($widget_enable == "on") {
                    $alignment_switch = "on";
                }
            }
            $image_hide_switch = "off";
            if (isset($_POST['image_hide_switch'])) {
                $widget_enable = sanitize_text_field(wp_unslash($_POST['image_hide_switch']));
                if ($widget_enable == "on") {
                    $image_hide_switch = "on";
                }
            }
            $text_speech_switch = "off";
            if (isset($_POST['text_speech_switch'])) {
                $widget_enable = sanitize_text_field(wp_unslash($_POST['text_speech_switch']));
                if ($widget_enable == "on") {
                    $text_speech_switch = "on";
                }
            }

            if (isset($_POST['desktop_position'])) {
                $desktop_position = sanitize_text_field(wp_unslash($_POST['desktop_position']));
            }

            if (isset($_POST['mobile_position'])) {
                $mobile_position = sanitize_text_field(wp_unslash($_POST['mobile_position']));
            }
            if (isset($_POST['backgroundcolor'])) {
                $backgroundcolor = sanitize_text_field(wp_unslash($_POST['backgroundcolor']));
            }
            if (isset($_POST['fontcolor'])) {
                $fontcolor = sanitize_text_field(wp_unslash($_POST['fontcolor']));
            }
            if (isset($_POST['iconcolor'])) {
                $iconcolor = sanitize_text_field(wp_unslash($_POST['iconcolor']));
            }
            if (isset($_POST['bottom_padding'])) {
                $bottom_padding = sanitize_text_field(wp_unslash($_POST['bottom_padding']));
            }

            if (isset($_POST['choose_design'])) {
                $choose_design = sanitize_text_field(wp_unslash($_POST['choose_design']));
            }


            $send_data = array(
                'shopid' => $shopid,
                'enable_link' => $button_link_status,
                'keybaord_nav_switch' => $keybaord_nav_switch,
                'cursor_switch' => $cursor_switch,
                'desaturate_switch' => $desaturate_switch,
                'contrast_switch' => $contrast_switch,
                'bigger_text_switch' => $bigger_text_switch,
                'highlight_link_switch' => $highlight_link_switch,
                'readable_fonts_switch' => $readable_fonts_switch,
                'reading_mask_switch' => $reading_mask_switch,
                'highlight_titles_switch' => $highlight_titles_switch,
                'text_magnifier_switch' => $text_magnifier_switch,
                'image_alt_tooltip_switch' => $image_alt_tooltip_switch,
                'stop_animation_switch' => $stop_animation_switch,
                'word_spacing_switch' => $word_spacing_switch,
                'letter_spacing_switch' => $letter_spacing_switch,
                'line_height_switch' => $line_height_switch,
                'alignment_switch' => $alignment_switch,
                'image_hide_switch' => $image_hide_switch,
                'text_speech_switch' => $text_speech_switch,
                'position' => $desktop_position,
                'mobile_position' => $mobile_position,
                'jsChecked' => $jsChecked,
                'backgroundcolor' => $backgroundcolor,
                'fontcolor' => $fontcolor,
                'iconcolor' => $iconcolor,
                'bottom_padding' => $bottom_padding,
                'choose_design' => $choose_design,
            );

            // echo '<pre>';
            // print_r($send_data);
            // die;
            $returnsenddata = assistant_api_call('/updateShopData', $send_data, 'post');
            // echo "<pre>";
            // print_r($returnsenddata);
            if ($returnsenddata['status'] == 200) {

                echo '<div  class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Success! </strong> </div>';
                $data = array('shopid' => $returnsenddata['data']['shopid'],);
                $content = assistant_api_call('/getShopData', $data, 'get');
            } else {
                echo '<div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Error! </strong>';
                echo esc_html($returnsenddata['messages']);
                echo '</div>';
            }
        }
    }
}
//   echo '<pre>';
//   print_r($content['data']);
//   echo '</pre>';
//   die;
?>

<?php
$created_at = $content['data']['created_at']; // '2024-11-07 14:32:49'

$trial_day = $content['data']['trail_day'];
$created_date = new DateTime($created_at);
$current_date = new DateTime();
// Add 7 days to the created_at date to get the trial end date
$end_date = clone $created_date;
$end_date->add(new DateInterval('P7D'));
$interval = $current_date->diff($end_date);
// echo '<pre>';
// print_r($interval);
$remaining_days = $interval->format('%r%a');

if (empty($current_plan)) {
    require_once 'plan-list.php';
} else {
    if ($created_at && $trial_day != 1 && $access_by_admin != '1') {
        if ($interval->days <= 7 && $interval->invert == 0) {
            echo "<p class='free-trial-note'>You are on a 7-day trial. " . esc_html($remaining_days) . " days remaining. Trial ends on " . esc_html($end_date->format('Y-m-d H:i:s')) . ".</p>";
        } else {
            echo "<p class='free-trial-note'>Your 7-day free trial has ended. Please subscribe to continue. Trial ended on " . esc_html($end_date->format('Y-m-d H:i:s')) . ".</p>";
        }
    }else{
        echo "<p class='free-trial-note'>You have admin access</p>";
    }

?>

    <div class="ada-cc-setting">
        <!-- header -->
        <div class="ada-cc-logo">
            <div class="ada-cc-icon">
                <img src="<?php echo esc_url(plugin_dir_url(dirname(__FILE__)) . '/assets/square-icon-svg-file-1.png'); ?>" alt="">
            </div>
            <div class="ada-cc-name">
                <p class="ada-cc-text">Accessibility by CartCoders</p>
            </div>
        </div>

        <div class="ada-cc-searchmain">
            <div class="ada-cc-left">
                <div class="ada-cc-top">
                    <p> <span style="color: #bfcad8;">pages</span> / Settings</p>
                </div>
                <div class="ada-cc-bottom">
                    <p class="ada-cc-dash-text">Settings</p>
                </div>
            </div>
        </div>

        <form method="post" id="accessibility_dashboard_form">
            <?php wp_nonce_field('accessibility_nonce', 'accessibility_nonce'); ?>
            <input id="shopid" type="hidden" name="shopid" class="form-control" value="<?php echo esc_attr($shopid); ?>">
            <div class="ada-cc-setting-inner-main">
                <div class="ada-cc-setting-inner-div">
                    <!-- Widget Option-div -->
                    <div class="ada-cc-Widget-main">
                        <div class="ada-cc-widget-title">
                            <p>Widget Option</p>
                        </div>

                        <div class="ada-cc-widget-three-div">
                            <div class="ada-cc-widget-first ada-cc-widget-common">
                                <div class="ada-cc-custom-checkbox">
                                    <input type="checkbox" id="widget_enable" name="jsChecked" <?php if ($content['data']['status'] == 1) {
                                                                                                    echo "checked";
                                                                                                } ?> />
                                    <span class="ada-cc-span" for="jsChecked"></span>
                                    <label for="jsChecked">Enable /Disable</label>
                                </div>
                            </div>

                            <div class="ada-cc-widget-second ada-cc-widget-common">
                                <div class="ada-cc-custom-checkbox">
                                    <input type="checkbox" name="enable_link" id="enable_link" <?php if ($content['data']['button_link_status'] == 1) {
                                                                                                    echo "checked";
                                                                                                } ?> />
                                    <span class="ada-cc-span" for="checkbox1"></span>
                                    <label for="enable_link">Do you want to put as link?</label><br>
                                </div>
                                <div class="ada-cc-link-text">&lt;a href="#add-aacc-link"&gt;Accessibility Assisstance&lt;/a&gt; <br>
                                    <p class="ada-cc-gray-text">you can placed <span style="font-weight: bold;"> "#add-aacc-link"</span>as link</p>
                                </div>

                            </div>

                            <div class="ada-cc-widget-third ada-cc-widget-common">
                                <label class="ada-cc-choose-text" for="choose design">Choose Design</label><br>
                                <select name="choose_design" id="choose_design" class="ada-cc-select-button" <?php echo ($current_plan !== 'premium') ? 'disabled' : ''; ?>>
                                    <option value="1" <?php if ($content['data']['design_view'] == 1) {
                                                            echo "selected";
                                                        } ?>>Default Design</option>
                                    <option value="2" <?php if ($content['data']['design_view'] == 2) {
                                                            echo "selected";
                                                        } ?>>Custom Design</option>
                                    <option value="3" <?php if ($content['data']['design_view'] == 3) {
                                                            echo "selected";
                                                        } ?>>Mobile View Design</option>
                                </select>
                            </div>
                        </div>

                    </div>


                    <!-- border-div -->
                    <div class="ada-cc-border-div"></div>


                    <!-- position-div -->
                    <div class="ada-cc-position-main">
                        <div class="ada-cc-position-title">
                            <p>Position</p>
                        </div>
                        <div class="ada-cc-position-three-div">
                            <div class="ada-cc-position-first ada-cc-position-common">
                                <label class="ada-cc-choose-text" for="desktop_position">Desktop Position</label><br>
                                <select name="desktop_position" id="desktop_position" class="ada-cc-select-button">
                                    <option value="1" <?php if ($content['data']['position'] == 1) {
                                                            echo "selected";
                                                        } ?>>Top Left </option>
                                    <option value="2" <?php if ($content['data']['position'] == 2) {
                                                            echo "selected";
                                                        } ?>>Top Right </option>
                                    <option value="3" <?php if ($content['data']['position'] == 3) {
                                                            echo "selected";
                                                        } ?>>Middle Left </option>
                                    <option value="4" <?php if ($content['data']['position'] == 4) {
                                                            echo "selected";
                                                        } ?>>Middle Right </option>
                                    <option value="5" <?php if ($content['data']['position'] == 5) {
                                                            echo "selected";
                                                        } ?>>Bottom Left </option>
                                    <option value="6" <?php if ($content['data']['position'] == 6) {
                                                            echo "selected";
                                                        } ?>>Bottom Right </option>
                                </select>
                            </div>

                            <div class="ada-cc-position-second ada-cc-position-common">
                                <label class="ada-cc-choose-text" for="mobile_position">Mobile Position</label><br>
                                <select name="mobile_position" id="mobile_position" class="ada-cc-select-button">
                                    <option value="1" <?php if ($content['data']['mobile_position'] == 1) {
                                                            echo "selected";
                                                        }
                                                        ?>>Top Left </option>
                                    <option value="2" <?php if ($content['data']['mobile_position'] == 2) {
                                                            echo "selected";
                                                        }
                                                        ?>>Top Right </option>
                                    <option value="3" <?php if ($content['data']['mobile_position'] == 3) {
                                                            echo "selected";
                                                        }
                                                        ?>>Middle Left </option>
                                    <option value="4" <?php if ($content['data']['mobile_position'] == 4) {
                                                            echo "selected";
                                                        }
                                                        ?>>Middle Right </option>
                                    <option value="5" <?php if ($content['data']['mobile_position'] == 5) {
                                                            echo "selected";
                                                        }
                                                        ?>>Bottom Left </option>
                                    <option value="6" <?php if ($content['data']['mobile_position'] == 6) {
                                                            echo "selected";
                                                        }
                                                        ?>>Bottom Right </option>
                                </select>
                            </div>


                            <div class="ada-cc-position-third ada-cc-position-common ada-cc-position-last">
                                <label class="ada-cc-choose-text" for="padding">Padding</label><br>
                                <div class="progress-container">

                                    <div class="progress-bar"></div>
                                    <div class="pointer"><span id="value"><?php echo esc_html($content['data']['bottom_padding']); ?></span></div>
                                    <input type="hidden" value="<?php echo esc_attr($content['data']['bottom_padding']); ?>" name="bottom_padding" class="bottom_padding_val">
                                    <div class="box-item-main">
                                        <div class="item-0">0</div>
                                        <div class="item-25">25</div>
                                        <div class="item-50">50</div>
                                        <div class="item-75">75</div>
                                        <div class="item-100">100</div>
                                    </div>
                                    <p class="ada-cc-position-text">This will be only Works on Position for "Bottom Left" and "Bottom Right"</p>
                                </div>
                            </div>
                        </div>


                        <!-- border-div -->
                        <div class="ada-cc-border-div"></div>


                        <!-- Enable/Disable Features -->
                        <div class="ada-cc-features-main">
                            <div class="ada-cc-features-title">
                                <p>Enable/Disable Features</p>
                            </div>

                            <div class="ada-cc-features-inner">


                                <div class="ada-cc-custom-checkbox ada-cc-custom-checkbox-common">
                                    <input type="checkbox" name="keybaord_nav_switch" id="keybaord_nav_switch" <?php if ($content['data']['shop_text']['keybaord_nav_switch'] == 1) {
                                                                                                                    echo "checked";
                                                                                                                } ?> />
                                    <span class="ada-cc-span" for="keybaord_nav_switch"></span>
                                    <label for="keybaord_nav_switch">Keyboard Nav</label>
                                </div>

                                <div class="ada-cc-custom-checkbox ada-cc-custom-checkbox-common">
                                    <input type="checkbox" name="cursor_switch" id="cursor_switch" <?php if ($content['data']['shop_text']['cursor_switch'] == 1) {
                                                                                                        echo "checked";
                                                                                                    } ?> />
                                    <span class="ada-cc-span" for="cursor_switch"></span>
                                    <label for="cursor_switch">Cursor</label>
                                </div>



                                <div class="ada-cc-custom-checkbox ada-cc-custom-checkbox-common">
                                    <input type="checkbox" name="desaturate_switch" id="desaturate_switch" <?php if ($content['data']['shop_text']['desaturate_switch'] == 1) {
                                                                                                                echo "checked";
                                                                                                            } ?> />
                                    <span class="ada-cc-span" for="desaturate_switch"></span>
                                    <label for="desaturate_switch">Saturation Modes</label>
                                </div>



                                <div class="ada-cc-custom-checkbox ada-cc-custom-checkbox-common">
                                    <input type="checkbox" name="contrast_switch" id="contrast_switch" <?php if ($content['data']['shop_text']['contrast_switch'] == 1) {
                                                                                                            echo "checked";
                                                                                                        } ?> />
                                    <span class="ada-cc-span" for="contrast_switch"></span>
                                    <label for="contrast_switch">Contrast</label>
                                </div>



                                <div class="ada-cc-custom-checkbox ada-cc-custom-checkbox-common">
                                    <input type="checkbox" name="bigger_text_switch" id="bigger_text_switch" <?php if ($content['data']['shop_text']['bigger_text_switch'] == 1) {
                                                                                                                    echo "checked";
                                                                                                                } ?> />
                                    <span class="ada-cc-span" for="bigger_text_switch"></span>
                                    <label for="bigger_text_switch">Bigger Text</label>
                                </div>



                                <div class="ada-cc-custom-checkbox ada-cc-custom-checkbox-common">
                                    <input type="checkbox" name="highlight_link_switch" id="highlight_link_switch" <?php if ($content['data']['shop_text']['highlight_link_switch'] == 1) {
                                                                                                                        echo "checked";
                                                                                                                    } ?> />
                                    <span class="ada-cc-span" for="highlight_link_switch"></span>
                                    <label for="highlight_link_switch">Highlight Links</label>
                                </div>



                                <div class="ada-cc-custom-checkbox ada-cc-custom-checkbox-common">
                                    <input type="checkbox" name="readable_fonts_switch" id="readable_fonts_switch" <?php if ($content['data']['shop_text']['readable_fonts_switch'] == 1) {
                                                                                                                        echo "checked";
                                                                                                                    } ?>
                                        <?php if ($current_plan == 'basic') {
                                            echo 'disabled';
                                        } ?> />
                                    <span class="ada-cc-span" for="readable_fonts_switch"></span>
                                    <label for="readable_fonts_switch">Font Readability</label>
                                </div>



                                <div class="ada-cc-custom-checkbox ada-cc-custom-checkbox-common">
                                    <input type="checkbox" name="reading_mask_switch" id="reading_mask_switch" <?php if ($content['data']['shop_text']['reading_mask_switch'] == 1) {
                                                                                                                    echo "checked";
                                                                                                                } ?> <?php if ($current_plan == 'basic') {
                                                                                                                            echo 'disabled';
                                                                                                                        } ?> />
                                    <span class="ada-cc-span" for="reading_mask_switch"></span>
                                    <label for="reading_mask_switch">Focus Mask</label>
                                </div>



                                <div class="ada-cc-custom-checkbox ada-cc-custom-checkbox-common">
                                    <input type="checkbox" name="highlight_titles_switch" id="highlight_titles_switch" <?php if ($content['data']['shop_text']['highlight_titles_switch'] == 1) {
                                                                                                                            echo "checked";
                                                                                                                        } ?> <?php if ($current_plan == 'basic') {
                                                                                                                                    echo 'disabled';
                                                                                                                                } ?> />
                                    <span class="ada-cc-span" for="highlight_titles_switch"></span>
                                    <label for="highlight_titles_switch">Title Highlighting</label>
                                </div>



                                <div class="ada-cc-custom-checkbox ada-cc-custom-checkbox-common">
                                    <input type="checkbox" name="text_magnifier_switch" id="text_magnifier_switch" <?php if ($content['data']['shop_text']['text_magnifier_switch'] == 1) {
                                                                                                                        echo "checked";
                                                                                                                    } ?> <?php if ($current_plan == 'basic') {
                                                                                                                                echo 'disabled';
                                                                                                                            } ?> />
                                    <span class="ada-cc-span" for="text_magnifier_switch"></span>
                                    <label for="text_magnifier_switch">Text Enhancer</label>
                                </div>



                                <div class="ada-cc-custom-checkbox ada-cc-custom-checkbox-common">
                                    <input type="checkbox" name="image_alt_tooltip_switch" id="image_alt_tooltip_switch" <?php if ($content['data']['shop_text']['image_alt_tooltip_switch'] == 1) {
                                                                                                                                echo "checked";
                                                                                                                            } ?> <?php if ($current_plan == 'basic') {
                                                                                                                                        echo 'disabled';
                                                                                                                                    } ?> />
                                    <span class="ada-cc-span" for="image_alt_tooltip_switch"></span>
                                    <label for="image_alt_tooltip_switch">Image Alt Tooltip</label>
                                </div>



                                <div class="ada-cc-custom-checkbox ada-cc-custom-checkbox-common">
                                    <input type="checkbox" name="stop_animation_switch" id="stop_animation_switch" <?php if ($content['data']['shop_text']['stop_animation_switch'] == 1) {
                                                                                                                        echo "checked";
                                                                                                                    } ?> <?php if ($current_plan == 'basic') {
                                                                                                                                echo 'disabled';
                                                                                                                            } ?> />
                                    <span class="ada-cc-span" for="stop_animation_switch"></span>
                                    <label for="stop_animation_switch">Stop Animation</label>
                                </div>


                                <div class="ada-cc-custom-checkbox ada-cc-custom-checkbox-common">
                                    <input type="checkbox" name="word_spacing_switch" id="word_spacing_switch" <?php if ($content['data']['shop_text']['word_spacing_switch'] == 1) {
                                                                                                                    echo "checked";
                                                                                                                } ?> <?php if ($current_plan == 'basic' || $current_plan == 'pro') {
                                                                                                                            echo 'disabled';
                                                                                                                        } ?> />
                                    <span class="ada-cc-span" for="word_spacing_switch"></span>
                                    <label for="word_spacing_switch">Word Spacing</label>
                                </div>


                                <div class="ada-cc-custom-checkbox ada-cc-custom-checkbox-common">
                                    <input type="checkbox" name="letter_spacing_switch" id="letter_spacing_switch" <?php if ($content['data']['shop_text']['letter_spacing_switch'] == 1) {
                                                                                                                        echo "checked";
                                                                                                                    } ?> <?php if ($current_plan == 'basic' || $current_plan == 'pro') {
                                                                                                                                echo 'disabled';
                                                                                                                            } ?> />
                                    <span class="ada-cc-span" for="letter_spacing_switch"></span>
                                    <label for="letter_spacing_switch">Letter Spacing</label>
                                </div>


                                <div class="ada-cc-custom-checkbox ada-cc-custom-checkbox-common">
                                    <input type="checkbox" name="line_height_switch" id="line_height_switch" <?php if ($content['data']['shop_text']['line_height_switch'] == 1) {
                                                                                                                    echo "checked";
                                                                                                                } ?> <?php if ($current_plan == 'basic' || $current_plan == 'pro') {
                                                                                                                            echo 'disabled';
                                                                                                                        } ?> />
                                    <span class="ada-cc-span" for="line_height_switch"></span>
                                    <label for="line_height_switch">Line Height</label>
                                </div>


                                <div class="ada-cc-custom-checkbox ada-cc-custom-checkbox-common">
                                    <input type="checkbox" name="alignment_switch" id="alignment_switch" <?php if ($content['data']['shop_text']['alignment_switch'] == 1) {
                                                                                                                echo "checked";
                                                                                                            } ?> <?php if ($current_plan == 'basic' || $current_plan == 'pro') {
                                                                                                                        echo 'disabled';
                                                                                                                    } ?> />
                                    <span class="ada-cc-span" for="alignment_switch"></span>
                                    <label for="alignment_switch">Alignment</label>
                                </div>


                                <div class="ada-cc-custom-checkbox ada-cc-custom-checkbox-common">
                                    <input type="checkbox" name="image_hide_switch" id="image_hide_switch" <?php if ($content['data']['shop_text']['image_hide_switch'] == 1) {
                                                                                                                echo "checked";
                                                                                                            } ?> <?php if ($current_plan == 'basic' || $current_plan == 'pro') {
                                                                                                                        echo 'disabled';
                                                                                                                    } ?> />
                                    <span class="ada-cc-span" for="image_hide_switch"></span>
                                    <label for="image_hide_switch">Image/Video Hide</label>
                                </div>


                                <div class="ada-cc-custom-checkbox ada-cc-custom-checkbox-common">
                                    <input type="checkbox" name="text_speech_switch" id="text_speech_switch" <?php if ($content['data']['shop_text']['text_speech_switch'] == 1) {
                                                                                                                    echo "checked";
                                                                                                                } ?> <?php if ($current_plan == 'basic' || $current_plan == 'pro') {
                                                                                                                            echo 'disabled';
                                                                                                                        } ?> />
                                    <span class="ada-cc-span" for="text_speech_switch"></span>
                                    <label for="text_speech_switch">Text Speech</label>
                                </div>

                            </div>

                        </div>


                        <!-- border-div -->
                        <div class="ada-cc-border-div"></div>



                        <!-- Color Schema -->


                        <div class="ada-cc-colorschema-main">
                            <div class="ada-cc-colorschema-title">
                                <p>Color Schema</p>
                            </div>

                            <div class="ada-cc-colorschema-three-div">

                                <div class="ada-cc-colorschema-first ada-cc-colorschema-common">
                                    <label class="ada-cc-choose-text" for="backgroundcolor">Controller Background</label><br>
                                    <input class="color-code clrpickertext" type="text" id="hexcolor" name="backgroundcolor" pattern="^#+([a-fA-F0-9]{6}|[a-fA0-9]{3})$" value="#<?php echo esc_attr($content['data']['shopbgcolor']); ?>"></input>
                                    <input class="color-picker clrpicker" type="color" id="colorpicker" name="backgroundcolor" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="#<?php echo esc_attr($content['data']['shopbgcolor']); ?>">
                                </div>

                                <div class="ada-cc-colorschema-second ada-cc-colorschema-common">
                                    <label class="ada-cc-choose-text" for="fontcolor">Text and Layout Font</label><br>
                                    <input class="color-code clrpickertext" type="text" id="hexcolor" name="fontcolor" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="#<?php echo esc_attr($content['data']['shoptextcolor']); ?>">
                                    <input class="color-picker clrpicker" type="color" id="colorpicker" name="fontcolor" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="#<?php echo esc_attr($content['data']['shoptextcolor']); ?>">
                                </div>

                                <div class="ada-cc-colorschema-third ada-cc-colorschema-common ada-cc-colorschema-last">
                                    <label class="ada-cc-choose-text" for="iconcolor">Accent and Logo Elements</label><br>
                                    <input class="color-code clrpickertext" type="text" id="hexcolor" name="iconcolor" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="#<?php echo esc_attr($content['data']['iconcolor']); ?>">
                                    <input class="color-picker clrpicker" type="color" id="colorpicker" name="iconcolor" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="#<?php echo esc_attr($content['data']['iconcolor']); ?>">
                                </div>

                            </div>
                        </div>

                        <!-- save button -->
                        <button class="ada-cc-save-btn btn btn-success" id="btnAdd" name="btnAdd" type="submit">Save</button>
                    </div>
                </div>
        </form>

        <!-- contactus-footer-line -->

        <div class="ada-cc-contactus-footer">
            <p class="ada-cc-contactus-line">Have questions or need assistance? <a href="https://assistance.cartcoders.com?domain=accessibility-assistant.cartcoders.com" target="_blank"> Contact us</a></p>
        </div>

    </div>

<?php  }
?>