<?php
if (!defined('ABSPATH')) exit;
$shopid = sanitize_text_field(get_option('accessibility_shopid'));
$token = get_option('accessibility_tokken');
$accessibility_url = get_option('accessibility_url');
$data = array('shopid' => $shopid,);
$content = assistant_api_call('/getShopData', $data, 'get');
$plugin_url = plugin_dir_url(__FILE__);


if (empty($accessibility_url)) {
    update_option('accessibility_url', sanitize_text_field($content['data']['url']));
}

if ($content) {
    $access_by_admin = $content['data']['access_by_admin'];
    $current_plan = $content['data']['plan'];
    $is_installation_popup_shown = $content['data']['is_installation_popup_shown'];
    $is_plan_select_popup_shown = $content['data']['is_plan_select_popup_shown'];
    // if ($is_installation_popup_shown == 1) {
    //     require_once 'installation-popup.php';
    // }
    if ($is_plan_select_popup_shown == 0 && $trial_day == '1' && !empty($current_plan) && $is_installation_popup_shown == 1) {
        require_once 'thanyou-popup.php';
    }

    $created_at = $content['data']['created_at']; // '2024-11-07 14:32:49'
    $trial_day = $content['data']['trail_day'];
    $created_date = new DateTime($created_at);
    $current_date = new DateTime();
    // Add 7 days to the created_at date to get the trial end date
    $end_date = clone $created_date;
    $end_date->add(new DateInterval('P7D'));
    $interval = $current_date->diff($end_date);
    $remaining_days = $interval->format('%r%a');
    if ($created_at && $trial_day != 1 && $access_by_admin != '1') {
        if ($interval->days <= 7 && $interval->invert == 0) {
            echo "<p class='free-trial-note'>You are on a 7-day trial. " . esc_html($remaining_days) . " days remaining. Trial ends on " . esc_html($end_date->format('Y-m-d H:i:s')) . ".</p>";
        } else {
            echo "<p class='free-trial-note'>Your 7-day free trial has ended. Please subscribe to continue. Trial ended on " . esc_html($end_date->format('Y-m-d H:i:s')) . ".</p>";
        }
    } else {
        echo "<p class='free-trial-note'>You have admin access</p>";
    }
}
?>

<div class="ada-cc-price-plan">
    <!-- header -->
    <!-- Loader element, initially hidden -->
    <div id="loader" class="loader" style="display: none;">
    </div>
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
                <p> <span style="color: #bfcad8;">Pages</span> / Plan</p>
            </div>
            <div class="ada-cc-bottom">
                <p class="ada-cc-dash-text">Plan</p>
            </div>
        </div>
    </div>


    <!-- price-plan-main-div -->


    <div class="ada-cc-priceplan-main">
        <div class="ada-cc-priceplan-inner">
            <div class="pricing-wrapper">

                <main class="main-section">
                    <div class="container">

                        <!-- Pricing table component -->
                        <div class="tab-menu-main">
                            <ul class="tabs">
                                <li class="tab-link current" data-tab="tab-1">Yearly</li>
                                <li class="tab-link" data-tab="tab-2">Monthly</li>
                            </ul>
                        </div>
                        <div id="tab-1" class="tab-content current">
                            <div class="pricing-grid">

                                <!-- Pricing tab 2 -->
                                <div class="pricing-tab">
                                    <div class="pricing-card popular">
                                        <div class="card-header">
                                            <div class="price-heading-main">
                                                <div class="left"><img src="<?php echo esc_url(plugin_dir_url(dirname(__FILE__)) . '/assets/icon2.png'); ?>" alt=""></div>
                                                <div class="right">
                                                    <p class="dm-sans">7 Days Free Trial</p>
                                                    <p class="text">Professional</p>
                                                </div>
                                            </div>


                                            <div class="price">
                                                <span class="currency">$</span>
                                                <span id="perform-price" class="price-value">59.88</span>&NonBreakingSpace;
                                                <span class="price-duration">/ Yearly</span>
                                            </div>
                                        </div>
                                        <div class="features-header">What's included</div>
                                        <ul class="features-list features-list-white">
                                            <li><img src="<?php echo esc_url(plugin_dir_url(dirname(__FILE__)) . '/assets/check-circle.png'); ?>" alt="icon">All Basic Features</li>
                                            <li><img src="<?php echo esc_url(plugin_dir_url(dirname(__FILE__)) . '/assets/check-circle.png'); ?>" alt="icon">Customise Widget Position and Padding</li>
                                            <li><img src="<?php echo esc_url(plugin_dir_url(dirname(__FILE__)) . '/assets/check-circle.png'); ?>" alt="icon">Readable Fonts, Reading Mask, and Highlight Titles</li>
                                            <li><img src="<?php echo esc_url(plugin_dir_url(dirname(__FILE__)) . '/assets/check-circle.png'); ?>" alt="icon">Text Enhancer, Image Alt Tooltip, and Stop Animation</li>
                                            <li><img src="<?php echo esc_url(plugin_dir_url(dirname(__FILE__)) . '/assets/check-circle.png'); ?>" alt="icon">Change the Color Schema of Widget</li>
                                        </ul>

                                        <?php if ($access_by_admin != '1') {
                                            if ($content['data']['plan'] == 'pro' &&  $content['data']['has_yearly'] == '1' && $trial_day == '1') { ?>
                                                <!--Selected button Start--->
                                                <button class="ada-cc-selected-btn-white" name="btnSelelct" type="submit" disabled> Selected</button>
                                                <!--Selected button End--->
                                            <?php } else { ?>
                                                <div class="Downgrade-btn-wrapper">
                                                    <!--Paypal Monthly paid button script start-->
                                                    <?php //echo $shopid; 
                                                    ?>
                                                    <div id="paypal-button-container-P-4AE28612BH0832347M5WQMEA" style="margin-top: 50px;">
                                                    </div>

                                                    <script>
                                                        document.addEventListener('DOMContentLoaded', function() {
                                                            paypal.Buttons({
                                                                style: {
                                                                    shape: 'rect',
                                                                    color: 'gold',
                                                                    layout: 'vertical',
                                                                    label: 'subscribe'
                                                                },
                                                                createSubscription: function(data, actions) {
                                                                    return actions.subscription.create({

                                                                        plan_id: 'P-4AE28612BH0832347M5WQMEA',
                                                                        custom_id: '<?php echo esc_js($shopid); ?>', // Consider making this dynamic if needed
                                                                    });
                                                                },
                                                                onApprove: function(data, actions) {
                                                                    // Make API call to the backend
                                                                    console.log('myScript.assistantUrl', myScript.assistantUrl + '/v1/paypal/subscription-created');
                                                                    return fetch(myScript.assistantUrl + '/v1/paypal/subscription-created', {
                                                                            method: 'POST',
                                                                            headers: {
                                                                                'Content-Type': 'application/json',
                                                                            },
                                                                            body: JSON.stringify({
                                                                                subscription_id: data.subscriptionID,
                                                                                custom_id: '<?php echo esc_js($shopid); ?>' // Replace with dynamic value if necessary
                                                                            })
                                                                        })
                                                                        .then(response => {
                                                                            console.log(response);
                                                                            if (!response.ok) {
                                                                                throw new Error('Network response was not ok');
                                                                            }
                                                                            return response.json();
                                                                        })
                                                                        .then(data => {
                                                                            console.log(data);
                                                                            if (data.status == 200) {
                                                                                //alert('Subscription successfully activated!');
                                                                                window.location.href = myScript.accessibilitywidget;
                                                                            } else {
                                                                                alert('Failed to activate subscription. Please try again.');
                                                                            }
                                                                        })
                                                                        .catch(error => {
                                                                            console.error('Error:', error);
                                                                            alert('An error occurred while activating the subscription. Please check the console for more details.');
                                                                        });
                                                                }
                                                            }).render('#paypal-button-container-P-4AE28612BH0832347M5WQMEA'); // Renders the PayPal button
                                                        });
                                                    </script>
                                                    <!--Paypal Monthly paid button script End-->
                                                </div>
                                        <?php }
                                        }
                                        ?>
                                    </div>
                                </div>

                                <!-- Pricing tab 3 -->
                                <div class="pricing-tab custom-pricing">
                                    <div class="pricing-card">
                                        <div class="card-header">

                                            <div class="price-heading-main">
                                                <div class="left"><img src="<?php echo esc_url(plugin_dir_url(dirname(__FILE__)) . '/assets/icon3.png'); ?>" alt=""></div>
                                                <div class="right">
                                                    <p class="dm-sans">7 Days Free Trial</p>
                                                    <p class="text">Premium</p>
                                                </div>
                                            </div>

                                            <div class="price">
                                                <span class="currency">$</span>
                                                <span id="enterprise-price" class="price-value">71.88</span>&NonBreakingSpace;
                                                <span class="price-duration">/ Yearly</span>
                                            </div>
                                        </div>
                                        <div class="features-header">What's included</div>
                                        <ul class="features-list">
                                            <li><img src="<?php echo esc_url(plugin_dir_url(dirname(__FILE__)) . '/assets/pink-check.png'); ?>" alt="icon">All Professional Features</li>
                                            <li><img src="<?php echo esc_url(plugin_dir_url(dirname(__FILE__)) . '/assets/pink-check.png'); ?>" alt="icon">Multiple Languages Support</li>
                                            <li><img src="<?php echo esc_url(plugin_dir_url(dirname(__FILE__)) . '/assets/pink-check.png'); ?>" alt="icon">Text to Speech</li>
                                            <li><img src="<?php echo esc_url(plugin_dir_url(dirname(__FILE__)) . '/assets/pink-check.png'); ?>" alt="icon">Adjust Word & Letter Space</li>
                                            <li><img src="<?php echo esc_url(plugin_dir_url(dirname(__FILE__)) . '/assets/pink-check.png'); ?>" alt="icon">Enable/Disable Media</li>
                                            <li><img src="<?php echo esc_url(plugin_dir_url(dirname(__FILE__)) . '/assets/pink-check.png'); ?>" alt="icon">Line Height & Alignments</li>
                                        </ul>
                                        <?php
                                        if ($access_by_admin != '1') {
                                            if ($content['data']['plan'] == 'premium' &&  $content['data']['has_yearly'] == '1' && $trial_day == '1') { ?>
                                                <!--Selected button Start--->
                                                <button class="ada-cc-selected-btn-violate" name="btnSelelct" type="submit" disabled> Selected</button>
                                                <!--Selected button End--->
                                            <?php } else { ?>
                                                <div class="Downgrade-btn-wrapper">
                                                    <!--Paypal Monthly paid button script start-->
                                                    <?php //echo $shopid; 
                                                    ?>
                                                    <div id="paypal-button-container-P-8H272316YF8596450M5WQMSY" style="margin-top: 50px;">
                                                    </div>

                                                    <script>
                                                        document.addEventListener('DOMContentLoaded', function() {
                                                            paypal.Buttons({
                                                                style: {
                                                                    shape: 'rect',
                                                                    color: 'gold',
                                                                    layout: 'vertical',
                                                                    label: 'subscribe'
                                                                },
                                                                createSubscription: function(data, actions) {
                                                                    return actions.subscription.create({

                                                                        plan_id: 'P-8H272316YF8596450M5WQMSY',
                                                                        custom_id: '<?php echo esc_js($shopid); ?>', // Consider making this dynamic if needed
                                                                    });
                                                                },
                                                                onApprove: function(data, actions) {
                                                                    // Make API call to the backend
                                                                    console.log('myScript.assistantUrl', myScript.assistantUrl);
                                                                    return fetch(myScript.assistantUrl + '/v1/paypal/subscription-created', {
                                                                            method: 'POST',
                                                                            headers: {
                                                                                'Content-Type': 'application/json',
                                                                            },
                                                                            body: JSON.stringify({
                                                                                subscription_id: data.subscriptionID,
                                                                                custom_id: '<?php echo esc_js($shopid); ?>' // Replace with dynamic value if necessary
                                                                            })
                                                                        })
                                                                        .then(response => {
                                                                            console.log(response);
                                                                            if (!response.ok) {
                                                                                throw new Error('Network response was not ok');
                                                                            }
                                                                            return response.json();
                                                                        })
                                                                        .then(data => {
                                                                            console.log(data);
                                                                            if (data.status == 200) {
                                                                                //alert('Subscription successfully activated!');
                                                                                window.location.href = myScript.accessibilitywidget;
                                                                            } else {
                                                                                alert('Failed to activate subscription. Please try again.');
                                                                            }
                                                                        })
                                                                        .catch(error => {
                                                                            console.error('Error:', error);
                                                                            alert('An error occurred while activating the subscription. Please check the console for more details.');
                                                                        });
                                                                }
                                                            }).render('#paypal-button-container-P-8H272316YF8596450M5WQMSY'); // Renders the PayPal button
                                                        });
                                                    </script>
                                                    <!--Paypal Monthly paid button script End-->
                                            <?php }
                                        }
                                            ?>
                                                </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div id="tab-2" class="tab-content">
                            <div class="pricing-grid">
                                <!-- Pricing tab 1 -->
                                <div class="pricing-tab custom-pricing">
                                    <div class="pricing-card">
                                        <div class="card-header">
                                            <div class="price-heading-main">
                                                <div class="left"><img src="<?php echo esc_url(plugin_dir_url(dirname(__FILE__)) . '/assets/icon1.png'); ?>" alt=""></div>
                                                <div class="right">
                                                    <p class="dm-sans">7 Days Free Trial</p>
                                                    <p class="text">Basic</p>
                                                </div>
                                            </div>

                                            <div class="price">
                                                <span class="currency">$</span>
                                                <span id="essential-price" class="price-value">3.99</span>&NonBreakingSpace;
                                                <span class="price-duration">/monthly</span>
                                            </div>
                                        </div>
                                        <div class="features-header">What's included</div>
                                        <ul class="features-list">
                                            <li><img src="<?php echo esc_url(plugin_dir_url(dirname(__FILE__)) . '/assets/pink-check.png'); ?>" alt="icon">Use Default Functionalities of Widget</li>
                                            <li><img src="<?php echo esc_url(plugin_dir_url(dirname(__FILE__)) . '/assets/pink-check.png'); ?>" alt="icon">Cannot Customise Widget</li>
                                            <li><img src="<?php echo esc_url(plugin_dir_url(dirname(__FILE__)) . '/assets/pink-check.png'); ?>" alt="icon">Enable/Disable Widget</li>
                                            <li><img src="<?php echo esc_url(plugin_dir_url(dirname(__FILE__)) . '/assets/pink-check.png'); ?>" alt="icon">Support on Email</li>
                                        </ul>

                                        <?php
                                        if ($access_by_admin != '1') {
                                            if ($content['data']['plan'] == 'basic' &&  $content['data']['has_yearly'] == '0' && $trial_day == '1') { ?>
                                                <!--Selected button Start--->
                                                <button class="ada-cc-selected-btn-violate" name="btnSelelct" type="submit" disabled> Selected</button>
                                                <!--Selected button End--->
                                            <?php } else { ?>
                                                <!--Paypal montly button start trial script Start-->

                                                <!--Paypal Monthly paid button script start-->
                                                <?php //echo $shopid; 
                                                ?>
                                                <div id="paypal-button-container-P-3C697998FV752454LM5WQJ2Y" style="margin-top: 50px;">
                                                </div>

                                                <script>
                                                    document.addEventListener('DOMContentLoaded', function() {
                                                        paypal.Buttons({
                                                            style: {
                                                                shape: 'rect',
                                                                color: 'gold',
                                                                layout: 'vertical',
                                                                label: 'subscribe'
                                                            },
                                                            createSubscription: function(data, actions) {
                                                                return actions.subscription.create({

                                                                    plan_id: 'P-3C697998FV752454LM5WQJ2Y',
                                                                    custom_id: '<?php echo esc_js($shopid); ?>', // Consider making this dynamic if needed
                                                                });
                                                            },
                                                            onApprove: function(data, actions) {
                                                                // Make API call to the backend
                                                                console.log('myScript.assistantUrl', myScript.assistantUrl);
                                                                return fetch(myScript.assistantUrl + '/v1/paypal/subscription-created', {
                                                                        method: 'POST',
                                                                        headers: {
                                                                            'Content-Type': 'application/json',
                                                                        },
                                                                        body: JSON.stringify({
                                                                            subscription_id: data.subscriptionID,
                                                                            custom_id: '<?php echo esc_js($shopid); ?>' // Replace with dynamic value if necessary
                                                                        })
                                                                    })
                                                                    .then(response => {
                                                                        console.log(response);
                                                                        if (!response.ok) {
                                                                            throw new Error('Network response was not ok');
                                                                        }
                                                                        return response.json();
                                                                    })
                                                                    .then(data => {
                                                                        console.log(data);
                                                                        if (data.status == 200) {
                                                                            //alert('Subscription successfully activated!');
                                                                            window.location.href = myScript.accessibilitywidget;
                                                                        } else {
                                                                            alert('Failed to activate subscription. Please try again.');
                                                                        }
                                                                    })
                                                                    .catch(error => {
                                                                        console.error('Error:', error);
                                                                        alert('An error occurred while activating the subscription. Please check the console for more details.');
                                                                    });
                                                            }
                                                        }).render('#paypal-button-container-P-3C697998FV752454LM5WQJ2Y'); // Renders the PayPal button
                                                    });
                                                </script>
                                                <!--Paypal Monthly paid button script End-->
                                        <?php }
                                        } ?>
                                    </div>
                                </div>

                                <!-- Pricing tab 2 -->
                                <div class="pricing-tab">
                                    <div class="pricing-card popular">
                                        <div class="card-header">
                                            <div class="price-heading-main">
                                                <div class="left"><img src="<?php echo esc_url(plugin_dir_url(dirname(__FILE__)) . '/assets/icon2.png'); ?>" alt=""></div>
                                                <div class="right">
                                                    <p class="dm-sans">7 Days Free Trial</p>
                                                    <p class="text">Professional</p>
                                                </div>
                                            </div>

                                            <div class="price">
                                                <span class="currency">$</span>
                                                <span id="perform-price" class="price-value">6.99</span>&NonBreakingSpace;
                                                <span class="price-duration">/monthly</span>
                                            </div>
                                        </div>
                                        <div class="features-header">What's included</div>
                                        <ul class="features-list features-list-white">
                                            <li><img src="<?php echo esc_url(plugin_dir_url(dirname(__FILE__)) . '/assets/check-circle.png'); ?>" alt="icon">All Basic Features</li>
                                            <li><img src="<?php echo esc_url(plugin_dir_url(dirname(__FILE__)) . '/assets/check-circle.png'); ?>" alt="icon">Customise Widget Position and Padding</li>
                                            <li><img src="<?php echo esc_url(plugin_dir_url(dirname(__FILE__)) . '/assets/check-circle.png'); ?>" alt="icon">Readable Fonts, Reading Mask, and Highlight Titles</li>
                                            <li><img src="<?php echo esc_url(plugin_dir_url(dirname(__FILE__)) . '/assets/check-circle.png'); ?>" alt="icon">Text Enhancer, Image Alt Tooltip, and Stop Animation</li>
                                            <li><img src="<?php echo esc_url(plugin_dir_url(dirname(__FILE__)) . '/assets/check-circle.png'); ?>" alt="icon">Change the Color Schema of Widget</li>
                                        </ul>

                                        <?php 
                                        if($access_by_admin != '1') {
                                        if ($content['data']['plan'] == 'pro' &&  $content['data']['has_yearly'] == '0' && $trial_day == '1') { ?>
                                            <!--Selected button Start--->
                                            <button class="ada-cc-selected-btn-white" name="btnSelelct" type="submit" disabled> Selected</button>
                                            <!--Selected button End--->
                                        <?php } else { ?>
                                            <!--Paypal button Professional script non start trial Start-->
                                            <div id="paypal-button-container-P-44L18099GC475862FM5WQLAY" style="margin-top: 50px;">

                                            </div>
                                            <script>
                                                document.addEventListener('DOMContentLoaded', function() {
                                                    paypal.Buttons({
                                                        style: {
                                                            shape: 'rect',
                                                            color: 'gold',
                                                            layout: 'vertical',
                                                            label: 'subscribe'
                                                        },
                                                        createSubscription: function(data, actions) {
                                                            return actions.subscription.create({

                                                                plan_id: 'P-44L18099GC475862FM5WQLAY',
                                                                custom_id: '<?php echo esc_js($shopid); ?>', // Consider making this dynamic if needed
                                                            });
                                                        },
                                                        onApprove: function(data, actions) {
                                                            // Make API call to the backend
                                                            return fetch(myScript.assistantUrl + '/v1/paypal/subscription-created', {
                                                                    method: 'POST',
                                                                    headers: {
                                                                        'Content-Type': 'application/json',

                                                                    },
                                                                    body: JSON.stringify({
                                                                        subscription_id: data.subscriptionID,
                                                                        custom_id: '<?php echo esc_js($shopid); ?>' // Replace with dynamic value if necessary
                                                                    })
                                                                })
                                                                .then(response => {
                                                                    console.log(response);
                                                                    if (!response.ok) {
                                                                        throw new Error('Network response was not ok');
                                                                    }
                                                                    return response.json();
                                                                })
                                                                .then(data => {
                                                                    console.log(data);
                                                                    if (data.status == 200) {
                                                                        //alert('Subscription successfully activated!');
                                                                        window.location.href = myScript.accessibilitywidget;
                                                                    } else {
                                                                        alert('Failed to activate subscription. Please try again.');
                                                                    }
                                                                })
                                                                .catch(error => {
                                                                    console.error('Error:', error);
                                                                    alert('An error occurred while activating the subscription. Please check the console for more details.');
                                                                });
                                                        }
                                                    }).render('#paypal-button-container-P-44L18099GC475862FM5WQLAY'); // Renders the PayPal button
                                                });
                                            </script>

                                            <!--Paypal button Professional script non start trial End-->
                                        <?php }
                                        }
                                        ?>
                                    </div>
                                </div>

                                <!-- Pricing tab 3 -->
                                <div class="pricing-tab custom-pricing">
                                    <div class="pricing-card">
                                        <div class="card-header">
                                            <div class="price-heading-main">
                                                <div class="left"><img src="<?php echo esc_url(plugin_dir_url(dirname(__FILE__)) . '/assets/icon3.png'); ?>" alt=""></div>
                                                <div class="right">
                                                    <p class="dm-sans">7 Days Free Trial</p>
                                                    <p class="text">Premium</p>
                                                </div>
                                            </div>

                                            <div class="price">
                                                <span class="currency">$</span>
                                                <span id="enterprise-price" class="price-value">9.99</span>&NonBreakingSpace;
                                                <span class="price-duration">/monthly</span>
                                            </div>
                                        </div>
                                        <div class="features-header">What's included</div>
                                        <ul class="features-list">
                                            <li><img src="<?php echo esc_url(plugin_dir_url(dirname(__FILE__)) . '/assets/pink-check.png'); ?>" alt="icon">All Professional Features</li>
                                            <li><img src="<?php echo esc_url(plugin_dir_url(dirname(__FILE__)) . '/assets/pink-check.png'); ?>" alt="icon">Multiple Languages Support</li>
                                            <li><img src="<?php echo esc_url(plugin_dir_url(dirname(__FILE__)) . '/assets/pink-check.png'); ?>" alt="icon">Text to Speech</li>
                                            <li><img src="<?php echo esc_url(plugin_dir_url(dirname(__FILE__)) . '/assets/pink-check.png'); ?>" alt="icon">Adjust Word & Letter Space</li>
                                            <li><img src="<?php echo esc_url(plugin_dir_url(dirname(__FILE__)) . '/assets/pink-check.png'); ?>" alt="icon">Enable/Disable Media</li>
                                            <li><img src="<?php echo esc_url(plugin_dir_url(dirname(__FILE__)) . '/assets/pink-check.png'); ?>" alt="icon">Line Height & Alignments</li>
                                        </ul>
                                        <?php 
                                        if($access_by_admin != '1') {
                                        if ($content['data']['plan'] == 'premium' &&  $content['data']['has_yearly'] == '0' && $trial_day == '1') { ?>

                                            <!--Selected button Start--->
                                            <button class="ada-cc-selected-btn-violate" name="btnSelelct" type="submit" disabled> Selected</button>
                                            <!--Selected button End--->
                                        <?php } else {
                                        ?>
                                            <!--Paypal script start non trial Start-->
                                            <div id="paypal-button-container-P-0R853006BN226840YM5WQLOI" style="margin-top: 50px;">

                                            </div>
                                            <script>
                                                document.addEventListener('DOMContentLoaded', function() {
                                                    paypal.Buttons({
                                                        style: {
                                                            shape: 'rect',
                                                            color: 'gold',
                                                            layout: 'vertical',
                                                            label: 'subscribe'
                                                        },
                                                        createSubscription: function(data, actions) {
                                                            return actions.subscription.create({

                                                                plan_id: 'P-0R853006BN226840YM5WQLOI',
                                                                custom_id: '<?php echo esc_js($shopid); ?>', // Consider making this dynamic if needed
                                                            });
                                                        },
                                                        onApprove: function(data, actions) {
                                                            // Make API call to the backend
                                                            return fetch(myScript.assistantUrl + '/v1/paypal/subscription-created', {
                                                                    method: 'POST',
                                                                    headers: {
                                                                        'Content-Type': 'application/json',

                                                                    },
                                                                    body: JSON.stringify({
                                                                        subscription_id: data.subscriptionID,
                                                                        custom_id: '<?php echo esc_js($shopid); ?>' // Replace with dynamic value if necessary
                                                                    })
                                                                })
                                                                .then(response => {
                                                                    console.log(response);
                                                                    if (!response.ok) {
                                                                        throw new Error('Network response was not ok');
                                                                    }
                                                                    return response.json();
                                                                })
                                                                .then(data => {
                                                                    console.log(data);
                                                                    if (data.status == 200) {
                                                                        //alert('Subscription successfully activated!');
                                                                        window.location.href = myScript.accessibilitywidget;
                                                                    } else {
                                                                        alert('Failed to activate subscription. Please try again.');
                                                                    }
                                                                })
                                                                .catch(error => {
                                                                    console.error('Error:', error);
                                                                    alert('An error occurred while activating the subscription. Please check the console for more details.');
                                                                });
                                                        }
                                                    }).render('#paypal-button-container-P-0R853006BN226840YM5WQLOI'); // Renders the PayPal button
                                                });
                                            </script>
                                            <!--Paypal script start non trial End-->
                                        <?php } 
                                        }
                                        ?>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <!-- End: Pricing table component -->

                    </div>
                </main>

            </div>


        </div>
    </div>

    <!-- note-css -->

    <div class="ada-cc-note-main">
        <p><span> Note:</span>Kindly note that upon opting for a subscription plan within our app, please be informed that refunds will not be applicable. This policy applies universally to all subscription plans offered, including both monthly and yearly options. We appreciate your understanding and cooperation in adhering to our policy, as we aim to ensure consistency and fairness in all aspects of our subscription services. <br>
            If you require any further information or assistance, please do not hesitate to contact us. Our support team is readily available to address any queries or concerns you may have regarding our subscription plans or any other aspect of our app.</p>
    </div>



    <!-- contactus-footer-line -->

    <div class="ada-cc-contactus-footer">
        <p class="ada-cc-contactus-line">Have questions or need assistance? <a href="https://assistance.cartcoders.com?domain=accessibility-assistant.cartcoders.com" target="_blank"> Contact us</a></p>
    </div>

</div>