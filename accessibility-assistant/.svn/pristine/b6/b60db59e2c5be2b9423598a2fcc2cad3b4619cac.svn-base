<?php
if (!defined('ABSPATH')) exit;
$shopid = sanitize_text_field(get_option('accessibility_shopid'));
$token = get_option('accessibility_tokken');
$accessibility_url = get_option('accessibility_url');
$data = array('shopid' => $shopid,);
$content = assistant_api_call('/getShopData', $data, 'get');

$created_at = $content['data']['created_at']; // '2024-11-07 14:32:49'
$trial_day = $content['data']['trail_day'];
$created_date = new DateTime($created_at);
$current_date = new DateTime();
// Add 7 days to the created_at date to get the trial end date
$end_date = clone $created_date;
$end_date->add(new DateInterval('P7D'));
$interval = $current_date->diff($end_date);
$remaining_days = $interval->format('%r%a');
$access_by_admin = $content['data']['access_by_admin'];
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
<div class="ada-cc-usage-guide">
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
                <p> <span style="color: #bfcad8;">Pages</span> /Usage Guide</p>
            </div>
            <div class="ada-cc-bottom">
                <p class="ada-cc-dash-text">Usage Guide</p>
            </div>
        </div>
    </div>


    <!-- manage-language-accordion-start -->
    <div class="ada-cc-accordion-main">
        <!-- <div class="ada-cc-accordion-title">
            <p>Usage Guide</p>
        </div> -->
        <div class="ada-cc-accordion-inner">
            <div class="accordion">
                <button class="accordion-header">
                    <span>Overview</span>
                    <div class="icon-circle">
                        <i class="fas fa-angle-right arrow"></i> <!-- Font Awesome icon -->
                    </div>
                </button>
                <div class="accordion-body">
                    <p> Accessibility Assistant, the trending product in the market which makes any disabled (deaf, blind, mute, visually impaired, mobility impaired) person can use this application for their requirements to get done. <br> <br> By keeping in mind- the main social goal, our innovative team had worked and introduced this application in the market. The main principle is “Where Innovation meets Social Values”</p>
                </div>
            </div>


            <div class="accordion">
                <button class="accordion-header">
                    <span>Select Plan and Offers</span>
                    <div class="icon-circle">
                        <i class="fas fa-angle-right arrow"></i> <!-- Font Awesome icon -->
                    </div>
                </button>
                <div class="accordion-body">
                    <p class="ada-cc-title">Select Monthly Plan:</p> <br>
                    <p>Start by picking the monthly plan that suits your needs. Each plan offers different features and customization options. The plan you choose will determine which features you can access in the widget. Additionally, enjoy a free trial for 7-days to explore all the features and enhance your
                        store's accessibility.</p>

                    <p class="ada-cc-title">Select Yearly Plan:</p> <br>
                    <p>Choose the annual plan that best fits your needs. Each plan provides a variety of features and customization options. Your selected plan will determine the features available in the widget. Plus, take advantage of a complimentary year to explore all the features and boost your store's accessibility.</p>
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

                                                        <div class="price-heading-main">
                                                            <div class="left"><img src="<?php echo esc_url(plugin_dir_url(dirname(__FILE__)) . '/assets/icon2.png'); ?>" alt=""></div>
                                                            <div class="right">
                                                                <p class="dm-sans">7 Days Free Trial</p>
                                                                <p class="text">Professional</p>
                                                            </div>
                                                        </div>

                                                        <div class="card-header">
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
                                                        <div class="Downgrade-btn-wrapper">
                                                            <button class="ada-cc-selected-btn-white" name="btnSelelct" type="submit" disabled=""> Selected</button>
                                                        </div>
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
                                                        <div class="Downgrade-btn-wrapper">
                                                            <button class="ada-cc-selected-btn-violate" name="btnSelelct" type="submit" disabled=""> Selected</button>
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

                                                        <div class="price-heading-main">
                                                            <div class="left"><img src="<?php echo esc_url(plugin_dir_url(dirname(__FILE__)) . '/assets/icon1.png'); ?>" alt=""></div>
                                                            <div class="right">
                                                                <p class="dm-sans">7 Days Free Trial</p>
                                                                <p class="text">Basic</p>
                                                            </div>
                                                        </div>


                                                        <div class="card-header">
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
                                                        <div class="Downgrade-btn-wrapper">
                                                            <button class="ada-cc-selected-btn-violate" name="btnSelelct" type="submit" disabled=""> Selected</button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Pricing tab 2 -->
                                                <div class="pricing-tab">
                                                    <div class="pricing-card popular">

                                                        <div class="price-heading-main">
                                                            <div class="left"><img src="<?php echo esc_url(plugin_dir_url(dirname(__FILE__)) . '/assets/icon2.png'); ?>" alt=""></div>
                                                            <div class="right">
                                                                <p class="dm-sans">7 Days Free Trial</p>
                                                                <p class="text">Professional</p>
                                                            </div>
                                                        </div>

                                                        <div class="card-header">
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
                                                        <div class="Downgrade-btn-wrapper">
                                                            <button class="ada-cc-selected-btn-white" name="btnSelelct" type="submit" disabled=""> Selected</button>
                                                        </div>
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
                                                            <li><img src="<?php echo esc_url(plugin_dir_url(dirname(__FILE__)) . '/assets/pink-check.png'); ?>" alt="icon">Adjust Word & Latter Space</li>
                                                            <li><img src="<?php echo esc_url(plugin_dir_url(dirname(__FILE__)) . '/assets/pink-check.png'); ?>" alt="icon">Enable/Disable Media</li>
                                                            <li><img src="<?php echo esc_url(plugin_dir_url(dirname(__FILE__)) . '/assets/pink-check.png'); ?>" alt="icon">Line Height & Alignments</li>
                                                        </ul>
                                                        <div class="Downgrade-btn-wrapper">
                                                            <button class="ada-cc-selected-btn-violate" name="btnSelelct" type="submit" disabled=""> Selected</button>
                                                        </div>
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
                </div>
            </div>


            <div class="accordion">
                <button class="accordion-header">
                    <span>How to Enable/Disable Widget</span>
                    <div class="icon-circle">
                        <i class="fas fa-angle-right arrow"></i> <!-- Font Awesome icon -->
                    </div>
                </button>
                <div class="accordion-body">

                    <p>Customers will be provided with the option of accessing the plugin for accessing the advanced features. Through which the customer can enable/disable the functionality and access the application on his system.</p>

                    <div class="ada-cc-Widget-main">

                        <div class="ada-cc-widget-three-div">


                            <div class="ada-cc-widget-third ada-cc-widget-common">
                                <div class="ada-cc-widget-title">
                                    <p>Widget Option</p>
                                </div>
                            </div>

                            <div class="ada-cc-widget-first ada-cc-widget-common">
                                <div class="ada-cc-custom-checkbox">
                                    <input type="checkbox" id="checkbox1" />
                                    <span class="ada-cc-span" for="checkbox1"></span>
                                    <label for="text">Enable /Disable</label>
                                </div>
                            </div>

                            <div class="ada-cc-widget-second ada-cc-widget-common">
                                <div class="ada-cc-custom-checkbox">
                                    <input type="checkbox" id="checkbox1" />
                                    <span class="ada-cc-span" for="checkbox1"></span>
                                    <label for="text">Do you want to put as link?</label><br>
                                </div>
                                <div class="ada-cc-link-text">&lt;a href="#add-aacc-link"&gt;Accessibility Assisstance&lt;/a&gt; <br>
                                    <p class="ada-cc-gray-text">you can placed <span style="font-weight: bold;"> "#add-aacc-link"</span>as link</p>
                                </div>

                            </div>

                        </div>


                        <div class="ada-cc-features">
                            <div class="ada-cc-available-features">
                                <p>This feature is available in:</p>
                            </div>
                            <div class="ada-cc-plans">
                                <li class="plan">Basic Plan </li>
                                <li class="plan">Proffesional Plan</li>
                                <li class="plan">Premium Plan</li>
                            </div>
                        </div>
                    </div>


                </div>
            </div>


            <div class="accordion">
                <button class="accordion-header">
                    <span>Choose Design</span>
                    <div class="icon-circle">
                        <i class="fas fa-angle-right arrow"></i> <!-- Font Awesome icon -->
                    </div>
                </button>
                <div class="accordion-body">
                    <p>"The <span> 'Choose Design' </span>option empowers merchants to select from a variety of design styles for our widget, tailoring it to their unique preferences and needs".</p>

                    <div class="ada-cc-position-first ada-cc-position-common">
                        <label class="ada-cc-choose-text" for="choose design">Desktop Position</label><br>
                        <select name="cars" id="cars" class="ada-cc-select-button ada-cc-select-button-accordion">
                            <option value="middle">Middle Right</option>
                            <option value="mobile">Mobile Design</option>
                            <option value="custom">Custom Design</option>
                            <option value="custom">Custom Design</option>
                        </select>
                    </div>


                    <div class="ada-cc-features">
                        <div class="ada-cc-available-features">
                            <p>This feature is available in:</p>
                        </div>
                        <div class="ada-cc-plans">
                            <li class="plan">Premium Plan</li>
                        </div>
                    </div>
                </div>

            </div>


            <div class="accordion">
                <button class="accordion-header">
                    <span>Customise Position</span>
                    <div class="icon-circle">
                        <i class="fas fa-angle-right arrow"></i> <!-- Font Awesome icon -->
                    </div>
                </button>
                <div class="accordion-body">
                    <p>"The <span> 'Customize Position' </span> feature enables merchants to tailor the exact placement of our widget, ensuring it perfectly fits their site layout and design vision."</p>

                    <div class="ada-cc-position-main">
                        <div class="ada-cc-position-title">
                            <p>Position</p>
                        </div>
                        <div class="ada-cc-position-three-div">
                            <div class="ada-cc-position-first ada-cc-position-common">
                                <label class="ada-cc-choose-text" for="choose design">Desktop Position</label><br>
                                <select name="cars" id="cars" class="ada-cc-select-button ada-cc-select-button-accordion">
                                    <option value="middle">Middle Right</option>
                                    <option value="mobile">Mobile Design</option>
                                    <option value="custom">Custom Design</option>
                                    <option value="custom">Custom Design</option>
                                </select>
                            </div>

                            <div class="ada-cc-position-second ada-cc-position-common">
                                <label class="ada-cc-choose-text" for="choose design">Mobile Position</label><br>
                                <select name="cars" id="cars" class="ada-cc-select-button ada-cc-select-button-accordion">
                                    <option value="bottom">Bottom Left</option>
                                    <option value="mobile">Mobile Design</option>
                                    <option value="custom">Custom Design</option>
                                    <option value="custom">Custom Design</option>
                                </select>
                            </div>


                            <div class="ada-cc-position-third ada-cc-position-common ada-cc-position-last">
                                <label class="ada-cc-choose-text" for="choose design">Padding</label><br>
                                <div class="progress-container">
                                    <div class="progress-bar"></div>
                                    <div class="pointer"><span id="value">0</span></div>
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



                    </div>

                    <div class="ada-cc-features">
                        <div class="ada-cc-available-features">
                            <p>This feature is available in:</p>
                        </div>
                        <div class="ada-cc-plans">
                            <li class="plan">Basic Plan </li>
                            <li class="plan">Proffesional Plan</li>
                            <li class="plan">Premium Plan</li>
                        </div>
                    </div>
                </div>

            </div>


            <div class="accordion">
                <button class="accordion-header">
                    <span>Plan Specific Features</span>
                    <div class="icon-circle">
                        <i class="fas fa-angle-right arrow"></i> <!-- Font Awesome icon -->
                    </div>
                </button>
                <div class="accordion-body">



                    <div class="ada-cc-basic-features ada-cc-accordion-features">
                        <div class="ada-cc-features-main">
                            <div class="ada-cc-features-title">
                                <p>Basic Plan - Features<span style="color: #8B98A9;">/ Enable Disable Features</span> </p>
                            </div>

                            <div class="ada-cc-features-inner">

                                <div class="ada-cc-custom-checkbox ada-cc-custom-checkbox-common">
                                    <input type="checkbox" id="checkbox1" />
                                    <span class="ada-cc-span" for="checkbox1"></span>
                                    <label for="text">Keyboard Nav</label>
                                </div>

                                <div class="ada-cc-custom-checkbox ada-cc-custom-checkbox-common">
                                    <input type="checkbox" id="checkbox1" />
                                    <span class="ada-cc-span" for="checkbox1"></span>
                                    <label for="text">Cursor</label>
                                </div>

                                <div class="ada-cc-custom-checkbox ada-cc-custom-checkbox-common">
                                    <input type="checkbox" id="checkbox1" />
                                    <span class="ada-cc-span" for="checkbox1"></span>
                                    <label for="text">Saturation Modes</label>
                                </div>

                                <div class="ada-cc-custom-checkbox ada-cc-custom-checkbox-common">
                                    <input type="checkbox" id="checkbox1" />
                                    <span class="ada-cc-span" for="checkbox1"></span>
                                    <label for="text">Contrast</label>
                                </div>



                                <div class="ada-cc-custom-checkbox ada-cc-custom-checkbox-common">
                                    <input type="checkbox" id="checkbox1" />
                                    <span class="ada-cc-span" for="checkbox1"></span>
                                    <label for="text">Bigger Text</label>
                                </div>



                                <div class="ada-cc-custom-checkbox ada-cc-custom-checkbox-common">
                                    <input type="checkbox" id="checkbox1" />
                                    <span class="ada-cc-span" for="checkbox1"></span>
                                    <label for="text">Highlight Links</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="ada-cc-professional-features ada-cc-accordion-features">
                        <div class="ada-cc-features-main">
                            <div class="ada-cc-features-title">
                                <p>Professional Plan - Features<span style="color: #8B98A9;">/ Enable Disable Features</span> </p>
                            </div>

                            <div class="ada-cc-features-inner">


                                <div class="ada-cc-custom-checkbox ada-cc-custom-checkbox-common">
                                    <input type="checkbox" id="checkbox1" />
                                    <span class="ada-cc-span" for="checkbox1"></span>
                                    <label for="text">Keyboard Nav</label>
                                </div>

                                <div class="ada-cc-custom-checkbox ada-cc-custom-checkbox-common">
                                    <input type="checkbox" id="checkbox1" />
                                    <span class="ada-cc-span" for="checkbox1"></span>
                                    <label for="text">Cursor</label>
                                </div>



                                <div class="ada-cc-custom-checkbox ada-cc-custom-checkbox-common">
                                    <input type="checkbox" id="checkbox1" />
                                    <span class="ada-cc-span" for="checkbox1"></span>
                                    <label for="text">Saturation Modes</label>
                                </div>



                                <div class="ada-cc-custom-checkbox ada-cc-custom-checkbox-common">
                                    <input type="checkbox" id="checkbox1" />
                                    <span class="ada-cc-span" for="checkbox1"></span>
                                    <label for="text">Contrast</label>
                                </div>



                                <div class="ada-cc-custom-checkbox ada-cc-custom-checkbox-common">
                                    <input type="checkbox" id="checkbox1" />
                                    <span class="ada-cc-span" for="checkbox1"></span>
                                    <label for="text">Bigger Text</label>
                                </div>



                                <div class="ada-cc-custom-checkbox ada-cc-custom-checkbox-common">
                                    <input type="checkbox" id="checkbox1" />
                                    <span class="ada-cc-span" for="checkbox1"></span>
                                    <label for="text">Highlight Links</label>
                                </div>



                                <div class="ada-cc-custom-checkbox ada-cc-custom-checkbox-common">
                                    <input type="checkbox" id="checkbox1" />
                                    <span class="ada-cc-span" for="checkbox1"></span>
                                    <label for="text">Font Readability</label>
                                </div>



                                <div class="ada-cc-custom-checkbox ada-cc-custom-checkbox-common">
                                    <input type="checkbox" id="checkbox1" />
                                    <span class="ada-cc-span" for="checkbox1"></span>
                                    <label for="text">Focus Mask</label>
                                </div>



                                <div class="ada-cc-custom-checkbox ada-cc-custom-checkbox-common">
                                    <input type="checkbox" id="checkbox1" />
                                    <span class="ada-cc-span" for="checkbox1"></span>
                                    <label for="text">Title Highlighting</label>
                                </div>



                                <div class="ada-cc-custom-checkbox ada-cc-custom-checkbox-common">
                                    <input type="checkbox" id="checkbox1" />
                                    <span class="ada-cc-span" for="checkbox1"></span>
                                    <label for="text">Text Enhancer</label>
                                </div>



                                <div class="ada-cc-custom-checkbox ada-cc-custom-checkbox-common">
                                    <input type="checkbox" id="checkbox1" />
                                    <span class="ada-cc-span" for="checkbox1"></span>
                                    <label for="text">Image Alt Tooltip</label>
                                </div>

                                <div class="ada-cc-custom-checkbox ada-cc-custom-checkbox-common">
                                    <input type="checkbox" id="checkbox1" />
                                    <span class="ada-cc-span" for="checkbox1"></span>
                                    <label for="text">Stop Animation</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="ada-cc-Premium-features ada-cc-accordion-features">
                        <div class="ada-cc-features-main">
                            <div class="ada-cc-features-title">
                                <p>Premium Plan - Features <span style="color: #8B98A9;">/ Enable Disable Features</span> </p>
                            </div>

                            <div class="ada-cc-features-inner">


                                <div class="ada-cc-custom-checkbox ada-cc-custom-checkbox-common">
                                    <input type="checkbox" id="checkbox1" />
                                    <span class="ada-cc-span" for="checkbox1"></span>
                                    <label for="text">Keyboard Nav</label>
                                </div>

                                <div class="ada-cc-custom-checkbox ada-cc-custom-checkbox-common">
                                    <input type="checkbox" id="checkbox1" />
                                    <span class="ada-cc-span" for="checkbox1"></span>
                                    <label for="text">Cursor</label>
                                </div>

                                <div class="ada-cc-custom-checkbox ada-cc-custom-checkbox-common">
                                    <input type="checkbox" id="checkbox1" />
                                    <span class="ada-cc-span" for="checkbox1"></span>
                                    <label for="text">Saturation Modes</label>
                                </div>

                                <div class="ada-cc-custom-checkbox ada-cc-custom-checkbox-common">
                                    <input type="checkbox" id="checkbox1" />
                                    <span class="ada-cc-span" for="checkbox1"></span>
                                    <label for="text">Contrast</label>
                                </div>

                                <div class="ada-cc-custom-checkbox ada-cc-custom-checkbox-common">
                                    <input type="checkbox" id="checkbox1" />
                                    <span class="ada-cc-span" for="checkbox1"></span>
                                    <label for="text">Bigger Text</label>
                                </div>

                                <div class="ada-cc-custom-checkbox ada-cc-custom-checkbox-common">
                                    <input type="checkbox" id="checkbox1" />
                                    <span class="ada-cc-span" for="checkbox1"></span>
                                    <label for="text">Highlight Links</label>
                                </div>
                                <div class="ada-cc-custom-checkbox ada-cc-custom-checkbox-common">
                                    <input type="checkbox" id="checkbox1" />
                                    <span class="ada-cc-span" for="checkbox1"></span>
                                    <label for="text">Font Readability</label>
                                </div>

                                <div class="ada-cc-custom-checkbox ada-cc-custom-checkbox-common">
                                    <input type="checkbox" id="checkbox1" />
                                    <span class="ada-cc-span" for="checkbox1"></span>
                                    <label for="text">Focus Mask</label>
                                </div>

                                <div class="ada-cc-custom-checkbox ada-cc-custom-checkbox-common">
                                    <input type="checkbox" id="checkbox1" />
                                    <span class="ada-cc-span" for="checkbox1"></span>
                                    <label for="text">Title Highlighting</label>
                                </div>

                                <div class="ada-cc-custom-checkbox ada-cc-custom-checkbox-common">
                                    <input type="checkbox" id="checkbox1" />
                                    <span class="ada-cc-span" for="checkbox1"></span>
                                    <label for="text">Text Enhancer</label>
                                </div>
                                <div class="ada-cc-custom-checkbox ada-cc-custom-checkbox-common">
                                    <input type="checkbox" id="checkbox1" />
                                    <span class="ada-cc-span" for="checkbox1"></span>
                                    <label for="text">Image Alt Tooltip</label>
                                </div>

                                <div class="ada-cc-custom-checkbox ada-cc-custom-checkbox-common">
                                    <input type="checkbox" id="checkbox1" />
                                    <span class="ada-cc-span" for="checkbox1"></span>
                                    <label for="text">Stop Animation</label>
                                </div>

                                <div class="ada-cc-custom-checkbox ada-cc-custom-checkbox-common">
                                    <input type="checkbox" id="checkbox1" />
                                    <span class="ada-cc-span" for="checkbox1"></span>
                                    <label for="text">Word Spacing</label>
                                </div>
                                <div class="ada-cc-custom-checkbox ada-cc-custom-checkbox-common">
                                    <input type="checkbox" id="checkbox1" />
                                    <span class="ada-cc-span" for="checkbox1"></span>
                                    <label for="text">Letter Spacing</label>
                                </div>


                                <div class="ada-cc-custom-checkbox ada-cc-custom-checkbox-common">
                                    <input type="checkbox" id="checkbox1" />
                                    <span class="ada-cc-span" for="checkbox1"></span>
                                    <label for="text">Line Height</label>
                                </div>


                                <div class="ada-cc-custom-checkbox ada-cc-custom-checkbox-common">
                                    <input type="checkbox" id="checkbox1" />
                                    <span class="ada-cc-span" for="checkbox1"></span>
                                    <label for="text">Alignment</label>
                                </div>


                                <div class="ada-cc-custom-checkbox ada-cc-custom-checkbox-common">
                                    <input type="checkbox" id="checkbox1" />
                                    <span class="ada-cc-span" for="checkbox1"></span>
                                    <label for="text">Image/Video Hide</label>
                                </div>


                                <div class="ada-cc-custom-checkbox ada-cc-custom-checkbox-common">
                                    <input type="checkbox" id="checkbox1" />
                                    <span class="ada-cc-span" for="checkbox1"></span>
                                    <label for="text">Text Speech</label>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="accordion">
                <button class="accordion-header">
                    <span>Ease of access to change the background/font color</span>
                    <div class="icon-circle">
                        <i class="fas fa-angle-right arrow"></i> <!-- Font Awesome icon -->
                    </div>
                </button>
                <div class="accordion-body">
                    <p>Finally, access the settings to change the background and font colors. This step lets you personalize the widget's appearance, ensuring it matches your brand's style or enhances readability for users. Select your preferred colors and apply them to make the widget visually appealing and accessible.</p>
                </div>
            </div>

        </div>

    </div>



    <!-- contactus-footer-line -->

    <div class="ada-cc-contactus-footer">
        <p class="ada-cc-contactus-line">Have questions or need assistance? <a href="https://assistance.cartcoders.com?domain=accessibility-assistant.cartcoders.com" target="_blank"> Contact us</a></p>
    </div>

</div>