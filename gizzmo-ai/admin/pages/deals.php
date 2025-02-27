
    <?php
    $plugin_version = $this->version;
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Deals</title>
        <link href="<?php echo plugin_dir_url( __FILE__ ) . 'css/app.css'; ?>" rel="stylesheet">
        <link href="<?php echo plugin_dir_url( __FILE__ ) . 'css/work_area.css'; ?>" rel="stylesheet">
    </head>
    <body class="bg-gray-100">
        <header class="gizzmo_header">
            <img src="<?php echo plugin_dir_url( __FILE__ ) . 'images/gizzmo_logo.svg'; ?>" alt="Gizzmo Logo" class="gizzmo_logo">
            <div class="header-links">
                <input type="hidden" id="plugin_version" value="<?php echo $plugin_version; ?>" />
                <span id="countown24timer" title="For the next 24 hours, you’ll enjoy Free access to all premium features and tools. Explore everything Gizzmo.ai has to offer before returning to the Free plan. Upgrade anytime to keep these powerful features!" style="color: #646970;border: 1px solid #ffb02e;border-radius: 3px;padding: 5px;padding-left: 20px;padding-right: 20px;display:none"></span>
                <span style="font-size: 12px;color: #646970;"><?php echo sprintf( esc_html__('V. %s', 'gizzmo-ai'), esc_html( $plugin_version ) ); ?></span>
                <span style="font-size: 12px;color: #646970;">TOKEN: <span id="token" style="color:#5a10b9;text-decoration:underline;cursor:pointer"></span></span>
                <div class="pro-link">
                    <a target="_blank" href="https://gizzmo.ai/" id="package_name" style="color: #5a10b9;border: 1px solid #5a10b9;border-radius: 3px;padding: 5px;padding-left: 20px;padding-right: 20px;">Free</a>
                    <div id="paid_packages_submenu" class="submenu">
                        <p><?php echo esc_attr__("Package: ", 'gizzmo-ai'); ?><span id="pkg_name" style="color:#5a10b9"><?php echo esc_attr__("Free", 'gizzmo-ai'); ?></span></p>
                        <p><?php echo esc_attr__("Credits: ", 'gizzmo-ai'); ?><span id="total_credits" style="color:#5a10b9"><?php echo esc_attr__("0", 'gizzmo-ai'); ?></span></p>
                        <p><?php echo esc_attr__("Credits Used: ", 'gizzmo-ai'); ?><span id="credits_used" style="color:#5a10b9"><?php echo esc_attr__("0", 'gizzmo-ai'); ?></span></p>
                        <p><?php echo esc_attr__("Credits Left: ", 'gizzmo-ai'); ?><span id="credits_left" style="color:#5a10b9"><?php echo esc_attr__("0", 'gizzmo-ai'); ?></span></p>
                        <p><?php echo esc_attr__("Days Left: ", 'gizzmo-ai'); ?><span id="days_left" style="color:#5a10b9"><?php echo esc_attr__("0", 'gizzmo-ai'); ?></span></p>
                        <p><?php echo esc_attr__("Auto Renew: ", 'gizzmo-ai'); ?><span id="rrenew_date" style="color:#5a10b9"><?php echo esc_attr__("0", 'gizzmo-ai'); ?></span></p>
                        <a href="https://app.gizzmo.ai?p=login&upgrade=true" target="_blank" style="color: #ffffff;border: 1px solid #5a10b9;border-radius: 3px;padding: 5px;padding-left: 20px;padding-right: 20px;text-align: center;background-color: #5a10b9;"><?php echo esc_attr__("Upgrade", 'gizzmo-ai'); ?></a>
                    </div>
                </div>
                <a id="upgrade_package" href="https://app.gizzmo.ai?p=login&upgrade=true" target="_blank" style="color: #ffffff;border: 1px solid #5a10b9;border-radius: 3px;padding: 4px;padding-left: 20px;padding-right: 20px;margin-top: -1px;background-color: #5a10b9;"><?php echo esc_attr__("UPGRADE", 'gizzmo-ai'); ?></a>
                <a href="https://gizzmo.helpscoutdocs.com/" target="_blank"><?php echo esc_attr__("Support", 'gizzmo-ai'); ?></a>
                <a href="https://www.facebook.com/share/g/1VXacs5iVBauo2TM/" target="_blank"><?php echo esc_attr__("Facebook Group", 'gizzmo-ai'); ?></a>
                <a href="https://app.gizzmo.ai/?p=login" target="_blank"><?php echo esc_attr__("Your Account", 'gizzmo-ai'); ?></a>
            </div>
        </header>

        


        <div class="gizzmo_creation_container">
            <div id="tabs_holder" style="display:none" class="products_wrapper one-fourth">

                <div class="tabset">
                    <!-- Tab 1 -->
                    <input type="radio" name="tabset" id="tab1" aria-controls="deal_pages" checked>
                    <label for="tab1"><?php echo esc_attr__("Your Deal Posts", 'gizzmo-ai'); ?></label>
                    <!-- Tab 2 -->
                    <input type="radio" name="tabset" id="tab2" aria-controls="your_deals">
                    <label id="tab2_lable" for="tab2"><?php echo esc_attr__("Your Deals", 'gizzmo-ai'); ?></label>
                    <!-- Tab 3 
                    <input type="radio" name="tabset" id="tab3" aria-controls="high_commisions_deals">
                    <label for="tab3">Premium Deals</label>
                    -->
                    <div class="tab-panels" style="min-width: 585px;">
                        <section id="deal_pages" class="tab-panel">
                            <div id="property_deals_pages"></div>
                            <span id="add_another_deal_bt" style="width:85px;display: inline;font-size: 12px;border-radius: 5px;padding-top: 5px;padding-bottom: 6px;" data-account_id="" data-property_id=""   title="Click to add" onclick="add_deal_page(this)"  class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"><?php echo esc_attr__("Add Another Deal Post", 'gizzmo-ai'); ?></span>
                        </section>
                        <section id="your_deals" class="tab-panel">
                            <div id="property_deals"></div>
                            <div id="promotion-div" class="promotion-div" style="display:none">
                                <h2><?php echo esc_attr__("Can't Find the Deal You Want?", 'gizzmo-ai'); ?></h2>
                                <p><?php echo esc_attr__("It looks like you haven't installed our Chrome Extension or imported any product deals from Amazon yet.", 'gizzmo-ai'); ?></p>
                                <p><?php echo esc_attr__("Add Gizzmo's Chrome Extension to import your own product deals  into Gizzmo!", 'gizzmo-ai'); ?></p>
                                <button class="btn-download" onclick="window.open('https://chromewebstore.google.com/detail/gizzmo/gdopffidobhgcbgjaleokkldkjhkjloe', '_blank')"><?php echo esc_attr__("Add Gizzmo's Chrome Extension", 'gizzmo-ai'); ?></button>
                            </div>
                        
                        </section>
                    </div>
                
                </div>
            </div>
            <div id="panals_holder" class="three-fourths">
                <div id="deal_pages_placeholder" style="display:none" class="deals_placeholder">
                    
                    

                    <div class="action_placeholder_header">
                        <h4><?php echo esc_attr__("Create Deals Post", 'gizzmo-ai'); ?></h4>
                    </div>
                    <div id="spinner_loader" class="spinner_loader" >
                        <svg style="width: 200px;height: 200px;display: inline;" version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                        viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
                            <path fill="#5a10b9" d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
                            <animateTransform 
                                attributeName="transform" 
                                attributeType="XML" 
                                type="rotate"
                                dur="1s" 
                                from="0 50 50"
                                to="360 50 50" 
                                repeatCount="indefinite" />
                        </path>
                        </svg>
                    </div>
                    <div id="action_placeholder_msg" class="action_placeholder_msg">
                        <span><?php echo esc_attr__("You currently don't have any Deal Posts", 'gizzmo-ai'); ?> <span id="add_first_deal_bt" style="width:85px;display: inline;font-size: 12px;border-radius: 5px;padding-top: 5px;padding-bottom: 6px;" data-account_id="" data-property_id=""   title="Click to add" onclick="add_deal_page(this)"  class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"><?php echo esc_attr__("Add A Deal Post", 'gizzmo-ai'); ?></span></span>
                    </div>
                    <div id="add_deal_fields_holder" class="deals_page_fields_wrapper">
                        <div class="media_row upper-row">
                            <div class="image-placeholder">
                                <img id="selected_featured_image" src="<?php echo plugin_dir_url( __FILE__ ) . 'images/deal_page_covers/1.webp'; ?>" alt="Placeholder Image">
                            </div>
                        </div>
                        <div class="media_row lower-row">
                            <div class="row-title gizzmo_input_title" style="font-weight: 400;"><?php echo esc_attr__("Select Featured image for the deals page", 'gizzmo-ai'); ?></div>
                            <div class="image-row">
                                <div class="image-container">
                                    <img id="option_image_1" class="option_image selected" src="<?php echo plugin_dir_url( __FILE__ ) . 'images/deal_page_covers/1.webp'; ?>" alt="Image 1">
                                </div>
                                <div class="image-container">
                                    <img id="option_image_2" class="option_image" src="<?php echo plugin_dir_url( __FILE__ ) . 'images/deal_page_covers/2.webp'; ?>" alt="Image 2">
                                </div>
                                <div class="image-container">
                                    <img id="option_image_3" class="option_image" src="<?php echo plugin_dir_url( __FILE__ ) . 'images/deal_page_covers/3.webp'; ?>" alt="Image 3">
                                </div>
                                <div class="image-container">
                                    <img id="option_image_4" class="option_image" src="<?php echo plugin_dir_url( __FILE__ ) . 'images/deal_page_covers/4.webp'; ?>" alt="Image 4">
                                </div>
                                <div class="image-container">
                                    <img id="option_image_5" class="option_image" src="<?php echo plugin_dir_url( __FILE__ ) . 'images/deal_page_covers/5.webp'; ?>" alt="Image 5">
                                </div>
                            </div>
                        </div>

                        <div class="media_row lower-row">
                            
                            <input type="text" id="deal_page_title" style="margin-top: 10px;" class="deal_input" placeholder="Enter Deal Page Title">

                            <textarea id="deal_page_description" style="height:250px;margin-top: 10px;" class="deal_input" placeholder="Enter Deal Page Description"></textarea>

                            <input type="text" id="deals_affiliate_tag" style="margin-top: 10px;" class="deal_input" placeholder="Enter Affilate Tag: e.g Yoursite-20">

                            <input type="text" id="deals_category_tags" style="margin-top: 10px;" class="deal_input" placeholder="Category Tags (Comma Separated): Fashion, Sport, Tech, Fishing, Food, Etc...">

                            <div class="row-title gizzmo_input_title" style="font-weight: 300;margin-top: 10px;margin-left: 3px;"><?php echo esc_attr__("Language", 'gizzmo-ai'); ?></div>
                            <select style="height: 38px;line-height: 21px;width: 100% !important; max-width: 100%;font-size: 13px;background-color: #ffff !important;border: 1px solid #e2e8f3;" id="languge_slct" name="languge_slct" class="form-select mt-1.5 w-full rounded-lg bg-slate-150 px-2 py-2 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900">
                                <option value="Afrikaans">Afrikaans</option>
                                <option value="Arabic">Arabic</option>
                                <option value="Azerbaijani">Azerbaijani</option>
                                <option value="Bengali">Bengali</option>
                                <option value="Bulgarian">Bulgarian</option>
                                <option value="Catalan">Catalan</option>
                                <option value="Chinese (Simplified)">Chinese (Simplified)</option>
                                <option value="Chinese (Traditional)">Chinese (Traditional)</option>
                                <option value="Croatian">Croatian</option>
                                <option value="Czech">Czech</option>
                                <option value="Danish">Danish</option>
                                <option value="Dutch">Dutch</option>
                                <option value="English" selected="selected">English</option>
                                <option value="Estonian">Estonian</option>
                                <option value="Finnish">Finnish</option>
                                <option value="French">French</option>
                                <option value="German">German</option>
                                <option value="Greek">Greek</option>
                                <option value="Hebrew">Hebrew</option>
                                <option value="Hindi">Hindi</option>
                                <option value="Hungarian">Hungarian</option>
                                <option value="Icelandic">Icelandic</option>
                                <option value="Indonesian">Indonesian</option>
                                <option value="Italian">Italian</option>
                                <option value="Japanese">Japanese</option>
                                <option value="Korean">Korean</option>
                                <option value="Latvian">Latvian</option>
                                <option value="Lithuanian">Lithuanian</option>
                                <option value="Malay">Malay</option>
                                <option value="Norwegian">Norwegian</option>
                                <option value="Persian">Persian</option>
                                <option value="Polish">Polish</option>
                                <option value="Portuguese">Portuguese</option>
                                <option value="Romanian">Romanian</option>
                                <option value="Russian">Russian</option>
                                <option value="Slovak">Slovak</option>
                                <option value="Slovenian">Slovenian</option>
                                <option value="Spanish">Spanish</option>
                                <option value="Swedish">Swedish</option>
                                <option value="Thai">Thai</option>
                                <option value="Turkish">Turkish</option>
                                <option value="Ukrainian">Ukrainian</option>
                                <option value="Urdu">Urdu</option>
                                <option value="Vietnamese">Vietnamese</option>
                            </select>

                            <span id="save_deal_page_as_draft" style="width:85px;display: inline;font-size: 12px;border-radius: 5px;padding-top: 5px;padding-bottom: 6px;margin-top: 30px;"  title="Click to Save" onclick="save_deal_page_as_draft()"  class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"><?php echo esc_attr__("Save as Draft", 'gizzmo-ai'); ?></span>

                            <span id="go_back_to_deals" style="width:85px;display: inline;font-size: 12px;border-radius: 5px;padding-top: 5px;padding-bottom: 6px;margin-top: 30px;"  title="Click to Save" onclick="go_back_to_deals()"  class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"><?php echo esc_attr__("Go Back", 'gizzmo-ai'); ?></span>
                        </div>
                    </div>
                </div>
                <div id="action_placeholder" style="display:none" class="deal_action_placeholder">
                    <div id="deals_spinner_loader" class="spinner_loader" >
                        <svg style="width: 200px;height: 200px;display: inline;" version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                        viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
                            <path fill="#5a10b9" d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
                            <animateTransform 
                                attributeName="transform" 
                                attributeType="XML" 
                                type="rotate"
                                dur="1s" 
                                from="0 50 50"
                                to="360 50 50" 
                                repeatCount="indefinite" />
                        </path>
                        </svg>
                    </div>
                    <div id="deal_fields_wrapper" style="display:none">
                        <!-- Deal Details -->
                        <div class="mx-auto bg-card border border-border rounded-lg shadow-md overflow-hidden">
                        <img id="main_deal_img"  class="w-full h-48 object-contain" src="https://m.media-amazon.com/images/I/71aDTgJIkNL._AC_SX679_.jpg" style="margin-top: 15px;cursor:zoom-in"  />

                        <div class="media_row deals_lower-row">
                            <div class="image-row" id="deals_images_row">
                                
                            </div>
                        </div>

                        <input id="live_deal_form_account_id" name="live_deal_form_account_id" type="hidden" value="">
                        <input id="live_deal_form_property_id" name="live_deal_form_property_id" type="hidden" value="">
                        <input id="gizzmo_deal_post_id" name="gizzmo_deal_post_id" type="hidden" value="">
                        <input id="deal_wp_post_id" name="deal_wp_post_id" type="hidden" value="">
                        <input id="form_deal_source" name="form_deal_source" type="hidden" value="">
                        <input id="form_percent_off" name="form_percent_off" type="hidden" value="">
                        <input id="form_language" name="form_language" type="hidden" value="">
                        <input id="form_affiliate_tags" name="form_affiliate_tags" type="hidden" value="">
                        <input id="deal_asin" name="deal_asin" type="hidden" value="">

                        <div class="p-4" style="margin-top: 15px;">
                            <h2 class="text-lg font-semibold text-foreground"><input type="text" class="deal_input" id="deal_title" value="" /></h2>
                            <div class="deals_flex items-center mt-2">
                                <div>
                                    <span class="deal_title_small"><?php echo esc_attr__("List Price: ", 'gizzmo-ai'); ?><input type="text" class="deal_avg_price_input" id="list_price" value="" /></span>
                                </div>
                                <div>
                                    <span class="deal_title_small"><?php echo esc_attr__("Avg Price: ", 'gizzmo-ai'); ?><input type="text" class="deal_avg_price_input" id="avg_price" value="" /></span>
                                </div>
                                <div>
                                    <span class="deal_title_small"><?php echo esc_attr__("Discount: ", 'gizzmo-ai'); ?><input disabled type="text" class="deal_avg_price_input" id="discount_price" value="" /></span>
                                </div>
                                <div>
                                    <span class="deal_title_small"><?php echo esc_attr__("Deal Price: ", 'gizzmo-ai'); ?><input disabled type="text"  class="deal_avg_price_input" id="deal_price" value="" /></span>
                                </div>
                            </div>
                            <p class="mt-2 text-sm text-muted-foreground">
                                <span class="deal_title_small"><?php echo esc_attr__("Deal Paragraph: ", 'gizzmo-ai'); ?><b style="color:#636364;font-size:12px"><?php echo esc_attr__("*CTA Link Phrases are marked with []", 'gizzmo-ai'); ?></b></span><br>
                                <textarea class="deal_input" id="deal_description" rows="4" cols="50"></textarea>
                            </p>
                            <div class="mt-4 grid grid-cols-2 gap-4">
                                <span class="deal_title_small"><?php echo esc_attr__("Deal Promptions:", 'gizzmo-ai'); ?></span><br>
                                <label for="discount_badge" class="flex items-center">
                                    <input type="checkbox" id="discount_badge" class="form-checkbox h-5 w-5 text-primary" />
                                    <span class="ml-2 text-sm text-foreground"><?php echo esc_attr__("Discount Badge", 'gizzmo-ai'); ?></span>
                                </label>
                                <label for="best_deal_badge" class="flex items-center">
                                    <input type="checkbox" id="best_deal_badge" class="form-checkbox h-5 w-5 text-primary" />
                                    <span class="ml-2 text-sm text-foreground"><?php echo esc_attr__("Best Deal", 'gizzmo-ai'); ?></span>
                                </label>
                                <label for="limited_time_deal_badge" class="flex items-center">
                                    <input type="checkbox" id="limited_time_deal_badge" class="form-checkbox h-5 w-5 text-primary" />
                                    <span class="ml-2 text-sm text-foreground"><?php echo esc_attr__("Limited Time Deal", 'gizzmo-ai'); ?></span>
                                </label>
                                <label for="wow_deal_badge" class="flex items-center">
                                    <input type="checkbox" id="wow_deal_badge" class="form-checkbox h-5 w-5 text-primary" />
                                    <span class="ml-2 text-sm text-foreground"><?php echo esc_attr__("Wow Deal", 'gizzmo-ai'); ?></span>
                                </label>
                            </div>
                            <div class="mt-4" style="text-align:right">
                                <div  style="width:80px;float:right"  title="Click Publish this deal to the live deals page" onclick="publish_deal(this)" class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"><?php echo esc_attr__("Publish Deal", 'gizzmo-ai'); ?></div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <div id="live_deals_placeholder" style="display:none" class="deals_placeholder">
                    <div class="steps-meta">
                        <div id="selected_deal_page_wrapper" style="top: 8px;left: 5px;" class="product_review_selected">
                            <img id="selected_deal_page_img" style="border-top-left-radius: 3px;width: 62px;height: 35px;" src="" alt="Deal Post Image" class="product-thumbnail">
                            <span id="selected_deal_title" style="font-size: 14px;" class="product-name"></span>

                            <span id="save_live_deals_changes" onclick="save_live_deals_changes()" style="width: 135px;color: #fff;text-align: center;cursor: pointer;display: none;font-size: 12px;border-radius: 5px;padding-top: 5px;padding-bottom: 6px;position: absolute;right: 14px;background-color: #d63638;"><?php echo esc_attr__("Save Deals Changes", 'gizzmo-ai'); ?></span>

                        </div>
                    </div>
                    <div class="action_placeholder_header">
                        <h4><?php echo esc_attr__("Live Deals", 'gizzmo-ai'); ?></h4>
                    </div>
                    <div class="list" id="live_deals_draggable" style="display:none;padding: 10px;overflow-y: auto;width: 90%;" sortable-list="sortable-list">
                    </div>
                    <div id="live_deals_spinner_loader" class="spinner_loader" >
                        <svg style="width: 200px;height: 200px;display: inline;" version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                        viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
                            <path fill="#5a10b9" d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
                            <animateTransform 
                                attributeName="transform" 
                                attributeType="XML" 
                                type="rotate"
                                dur="1s" 
                                from="0 50 50"
                                to="360 50 50" 
                                repeatCount="indefinite" />
                        </path>
                        </svg>
                    </div>
                    <div id="live_deals_action_placeholder_msg" class="action_placeholder_msg">
                        <span><?php echo esc_attr__("You currently don't have any live deals, add some.", 'gizzmo-ai'); ?></span>
                    </div>
                </div>
                
            </div>
        </div>

        
        <div id="forms_wrapper">
            <form id="add_deal_page_form" method="post" action="<?php echo admin_url('admin-post.php'); ?>">
                <input type="hidden" name="action" value="add_deal_page_form">
                <input type="hidden" name="add_deal_page_form_submitted" value="yes">
                <?php wp_nonce_field('gizzmo_nonce_action', 'gizzmo_nonce'); ?>
                
                <input id="form_account_id" name="form_account_id" type="hidden" value="">
                <input id="form_property_id" name="form_property_id" type="hidden" value="">
                <input id="form_deal_title" name="form_deal_title" type="hidden" value="">
                <input id="form_deal_description" name="form_deal_description" type="hidden" value="">
                <input id="form_deal_affiliate_tag" name="form_deal_affiliate_tag" type="hidden" value="">
                <input id="form_deal_category_tags" name="form_deal_category_tags" type="hidden" value="">
                <input id="form_deal_language" name="form_deal_language" type="hidden" value="">
                <input id="form_deal_image" name="form_deal_image" type="hidden" value="">
            </form>

            <form id="publish_live_deals_form" method="post" action="<?php echo admin_url('admin-post.php'); ?>">
                <input type="hidden" name="action" value="publish_live_deals_form">
                <input type="hidden" name="publish_live_deals_form_submitted" value="yes">
                <?php wp_nonce_field('gizzmo_nonce_action', 'gizzmo_nonce'); ?>
                
                <input id="publish_form_account_id" name="publish_form_account_id" type="hidden" value="">
                <input id="publish_form_property_id" name="publish_form_property_id" type="hidden" value="">
                <input id="publish_form_wp_post_id" name="publish_form_wp_post_id" type="hidden" value="">
                <input id="publish_form_deals_json" name="publish_form_deals_json" type="hidden" value="">
                <input id="live_deals_position_changes" name="live_deals_position_changes" type="hidden" value="">
            </form>

        </div>
        
        <input type="hidden" id="main_account_id" name="main_account_id" value="">
        <input type="hidden" id="main_property_id" name="main_property_id" value="">
        <input type="hidden" id="main_content_type" name="main_content_type" value="Deals">
        <input type="hidden" id="main_package_name" name="main_package_name" value="">

        <!-- zoom image Pop -->
        <div id="zoomPopModel" class="modal" style="z-index: 2;">
            <div class="modal-content" style="width: 400px; max-height: 600px;">
                <span style="margin-top: -9px;padding-bottom: 9px;" class="close" onclick="closeModal('zoomPopModel')">&times;</span>
                <img id="zoom_image" src="" style="width: 100%;height: 100%;">
            </div>
        </div>

        <!-- Promotion Pop -->
        <div id="promotionPopModel" class="modal">
            <div class="modal-content" style="width: 169px;height: 113px;   ">
                <span style='font-size: 94px;position:relative;top:30px;left: 2px;width: 100%;display: block;text-align: center;'>&#127873;</span>
                <span style="font-size: 14px;position:relative;top: 81px;left: 2px;font-weight: bold;width: 100%;"><?php echo esc_attr__("24-Hour Free Access Gift", 'gizzmo-ai'); ?></span>
            </div>
        </div>

        
        <!-- Loading Modal -->
        <div id="loading_Modal" class="modal">
            <div class="modal-content" style="display: flex;width: 60px;border-radius: 60px;height: 60px;">
                <div class="left_side" style="width:100%">
                    <div class="pop-promotion-container" style="padding: 0px;">
                        <div id="main_spinner_loader" >
                            <svg style="width: 100px;height: 100px;display: inline;" version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
                                <path fill="#5a10b9" d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
                                <animateTransform 
                                    attributeName="transform" 
                                    attributeType="XML" 
                                    type="rotate"
                                    dur="1s" 
                                    from="0 50 50"
                                    to="360 50 50" 
                                    repeatCount="indefinite" />
                            </path>
                            </svg>
                        </div>
                    </div>    
                </div>
            </div>
        </div>
        

        <!-- Upgrade Package Modal -->
        <div id="upgrade_package_Modal" class="modal">
            <div class="modal-content" style="display: flex">
                <div class="left_side" style="width:50%">
                <div class="pop-promotion-container">
                    <img style="margin-bottom: 9px !important;"  src="<?php echo plugin_dir_url( __FILE__ ) . 'images/gizzmo_logo.svg'; ?>" alt="Gizzmo Logo">
                    <p style="color: #5a10b9;"><?php echo esc_attr__("Unlock Premium Features!", 'gizzmo-ai'); ?></p>
                    <p style="font-size:14px; font-weight:normal"><?php echo esc_attr__("Upgrade your package now to access Gizzmo's full suite of captivating, conversion-driven commerce articles and supercharge your website.", 'gizzmo-ai'); ?></p>
                    <a id="upgrade_package" href="https://app.gizzmo.ai?p=login&upgrade=true" target="_blank" style="cursor:pointer;color: #ffffff;border: 1px solid #5a10b9;border-radius: 3px;padding: 4px;padding-left: 50px;padding-right: 50px;top: 9px;position:relative;background-color: #5a10b9;"><?php echo esc_attr__("UPGRADE", 'gizzmo-ai'); ?></a>
                </div>    
                </div>
                <div class="right_side"  style="width:50%">
                    <a href="https://app.gizzmo.ai?p=login&upgrade=true" style="cursor:pointer;color: inherit;text-decoration: inherit;" target="_blank">
                        <div style="width:100%;height: 200px;background-size: cover;background-image:url('https://gizzmo.ai/wp-content/uploads/2023/06/How-to-write-a-product-review-by-midjourney.png');background-position: center;" >
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <!-- Add Affiliate Tag Modal -->
        <div id="addAffiliateModal" class="modal">
            <div class="modal-content" style="max-width: 350px;">
                <span class="close" onclick="closeModal('addAffiliateModal')">&times;</span>
                <form id="affiliateForm">
                    <label for="affiliateTag"><?php echo esc_attr__("Affiliate Tag:", 'gizzmo-ai'); ?></label>
                    <input type="text" id="affiliateTag" name="affiliateTag" required>
                    <button type="button" class="modal-button" onclick="addAffiliateTag()"><?php echo esc_attr__("Add", 'gizzmo-ai'); ?></button>
                </form>
            </div>
        </div>

        <!-- Delete Confirmation Modal -->
        <div id="deleteConfirmationModal" class="modal">
            <div class="modal-content" style="max-width: 350px;">
                <span class="close" onclick="closeModal('deleteConfirmationModal')">&times;</span>
                <p><?php echo esc_attr__("Are you sure you want to delete this affiliate tag?", 'gizzmo-ai'); ?></p><br>
                <button type="button" class="modal-button" onclick="confirmDelete()"><?php echo esc_attr__("Yes, Delete", 'gizzmo-ai'); ?></button>
                <button type="button" class="modal-button cancel" onclick="closeModal('deleteConfirmationModal')"><?php echo esc_attr__("Cancel", 'gizzmo-ai'); ?></button>
            </div>
        </div>

        <!-- Delete Deal Post Confirmation Modal -->
        <div id="deleteDealPostConfirmationModal" class="modal">
            <input type="hidden" id="delete_deal_post_id" name="delete_deal_post_id" value="">
            <input type="hidden" id="delete_deal_property_id" name="delete_deal_property_id" value="">
            <div class="modal-content" style="max-width: 350px;">
                <span class="close" onclick="closeModal('deleteDealPostConfirmationModal')">&times;</span>
                <p><?php echo esc_attr__("Are you sure you want to delete this Deals Post?", 'gizzmo-ai'); ?></p><br>
                <p><?php echo esc_attr__("The Post will be deleted from Gizzmo only, not from your Wordpress posts.", 'gizzmo-ai'); ?></p><br>
                <button type="button" class="modal-button" onclick="confirmdealpostDelete()"><?php echo esc_attr__("Yes, Delete", 'gizzmo-ai'); ?></button>
                <button type="button" class="modal-button cancel" onclick="closeModal('deleteDealPostConfirmationModal')"><?php echo esc_attr__("Cancel", 'gizzmo-ai'); ?></button>
            </div>
        </div>
        
        <!-- Select image for roundup item  Modal -->
        <div id="selectimageionModal" class="modal">
            <div class="modal-content" style="max-width: 800px;">
                <span class="close" onclick="closeModal('selectimageionModal')">&times;</span>
                <div class="media_row lower-row">
                    <div class="row-title gizzmo_input_title" style="font-weight: 400;margin-left: 86px;"><?php echo esc_attr__("Select main product image.", 'gizzmo-ai'); ?></div>
                    <div style="width:90%;overflow-x:auto;height: 125px;">
                        <div style="width:1200px;height:100px; text-align:left">
                            <div id="images_placeholder" class="image-row">
                                <!-- images will be here -->
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Select image for roundup item  Modal -->
        <div id="selectimageionModal_deals" class="modal">
            <div class="modal-content" style="max-width: 800px;">
                <span class="close" onclick="closeModal('selectimageionModal_deals')">&times;</span>
                <div class="media_row lower-row">
                    <div class="row-title gizzmo_input_title" style="font-weight: 400;margin-left: 86px;"><?php echo esc_attr__("Select main product image.", 'gizzmo-ai'); ?></div>
                    <div style="width:90%;overflow-x:auto;height: 125px;">
                        <div style="width:1200px;height:100px; text-align:left">
                            <div id="images_deals_placeholder" class="image-row">
                                <!-- images will be here -->
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <!-- Select image for roundup item  Modal -->
        <div id="selectfeaturedimageionModal" class="modal">
            <div class="modal-content" style="max-width: 800px;">
                <span class="close" onclick="closeModal('selectfeaturedimageionModal')">&times;</span>
                <div class="media_row lower-row">
                    <div class="row-title gizzmo_input_title" style="font-weight: 400;margin-left: 86px;"><?php echo esc_attr__("Select Featured image.", 'gizzmo-ai'); ?> <br/><span style="font-size:12px;font-style:italic;color:#333 "><?php echo esc_attr__("(These images are the selected images from your roundup list, they can be changed by changing the list image on step 1)", 'gizzmo-ai'); ?></span></div>
                    <div style="width:90%;overflow-x:auto;height: 125px;">
                        <div style="width:1200px;height:100px; text-align:left">
                            <div id="featured_images_placeholder" class="image-row">
                                <!-- images will be here -->
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <!-- Login/Sign Up Modal -->
        <div id="authModal" class="modal">
            <div class="modal-content" style="display: flex">
                <div class="left_side" style="width:50%">
                <div class="pop-promotion-container">
                    <img src="<?php echo plugin_dir_url( __FILE__ ) . 'images/gizzmo_logo.svg'; ?>" alt="Gizzmo Logo">
                    <p><?php echo esc_attr__("Supercharge Your Website with Gizzmo's Captivating, Conversion-Driven Commerce Articles", 'gizzmo-ai'); ?></p>
                    <ul class="links">
                        <li><a href="https://gizzmo.ai" target="_blank"><?php echo esc_attr__("Gizzmo.ai", 'gizzmo-ai'); ?></a></li>
                        <li><a href="https://gizzmo.helpscoutdocs.com/" target="_blank"><?php echo esc_attr__("Support", 'gizzmo-ai'); ?></a></li>
                        <li><a href="https://gizzmo.ai/pricing" target="_blank"><?php echo esc_attr__("Pricing", 'gizzmo-ai'); ?></a></li>
                    </ul>
                </div>    
                </div>
                <div class="right_side"  style="width:50%">
                    <div class="tab-header" style="display:none">
                        <button id="loginTabButton" style="width: 50%;border: 0.5px solid #5a10b9; display:none" class="active" onclick="showTab('loginTab')"><?php echo esc_attr__("Login", 'gizzmo-ai'); ?></button>
                        <button id="signupTabButton" style="width: 100%;border: 0.5px solid #5a10b9;" onclick="showTab('signupTab')"><?php echo esc_attr__("Sign Up", 'gizzmo-ai'); ?></button>
                    </div>
                    <div id="loginTab" class="tab" style="display:none">
                        <form id="loginForm">
                            <label for="loginEmail"><?php echo esc_attr__("Email:", 'gizzmo-ai'); ?></label>
                            <input type="email" id="loginEmail" name="loginEmail" required>
                            <label for="loginPassword"><?php echo esc_attr__("Password:", 'gizzmo-ai'); ?></label>
                            <input type="password" id="loginPassword" name="loginPassword" required>
                            <button type="button" class="modal-button" onclick="login()"><?php echo esc_attr__("Login", 'gizzmo-ai'); ?></button>
                        </form>
                    </div>
                    <div id="signupTab" class="tab active">
                        <form id="signupForm">
                            <label for="signupName"><?php echo esc_attr__("Full Name: ", 'gizzmo-ai'); ?><span id="name_empty" style="color:red; display:none"><?php echo esc_attr__("Write your Full Name", 'gizzmo-ai'); ?></span></label>
                            <input type="text" id="signupName" name="signupName" required>
                            <label for="signupEmail"><?php echo esc_attr__("Email: ", 'gizzmo-ai'); ?><span id="email_invalid" style="color:red; display:none"><?php echo esc_attr__("Your Email is invalid", 'gizzmo-ai'); ?></span><span id="email_empty" style="color:red; display:none"><?php echo esc_attr__("Write your Email", 'gizzmo-ai'); ?></span><span id="email_exists" style="color:red; display:none"><?php echo esc_attr__("Email is already associated with a different domain", 'gizzmo-ai'); ?> </span></span></label>
                            <input type="email" id="signupEmail" name="signupEmail" required>
                            <label for="signupPassword"><?php echo esc_attr__("Password: ", 'gizzmo-ai'); ?><span id="password_length" style="color:red; display:none"><?php echo esc_attr__("password is too short, 6 characters minimum", 'gizzmo-ai'); ?></span><span id="password_mismatch_1" style="color:red; display:none"><?php echo esc_attr__("Passwords does not match", 'gizzmo-ai'); ?></span></label>
                            <input type="password" placeholder="6 characters password minimum" id="signupPassword" name="signupPassword" required>
                            <label for="signupVerifyPassword"><?php echo esc_attr__("Verify Password: ", 'gizzmo-ai'); ?><span id="password_mismatch_2" style="color:red; display:none"><?php echo esc_attr__("Passwords does not match", 'gizzmo-ai'); ?></span></label>
                            <input type="password"  placeholder="6 characters password minimum" id="signupVerifyPassword" name="signupVerifyPassword" required>
                            <!-- New checkbox for marketing consent -->
                            <label for="marketing_consent" style="font-weight: normal;">
                                <input type="checkbox" id="marketing_consent" name="marketing_consent" checked>
                                <?php echo esc_attr__("I would like to receive email updates and marketing materials from Gizzmo.", 'gizzmo-ai'); ?>
                            </label>

                            <button type="button" class="modal-button" onclick="signup()"><?php echo esc_attr__("Sign Up", 'gizzmo-ai'); ?></button>
                        </form>
                    </div>
                    <div id="forgotTab" class="tab">
                        <form id="forgotForm">
                            <label for="forgotEmail"><?php echo esc_attr__("Write Your Email, if email is registered, you will receive a Password Reminder:", 'gizzmo-ai'); ?></label>
                            <span id="remainder_email_invalid" style="color:red; display:none"><?php echo esc_attr__("Your Email is invalid", 'gizzmo-ai'); ?></span><span id="remainder_email_empty" style="color:red; display:none"><?php echo esc_attr__("Write your Email", 'gizzmo-ai'); ?></span>
                            <input type="email" placeholder="Write Your Email" id="forgotEmail" name="forgotEmail" required>
                            <button type="button" class="modal-button" onclick="forgot_email()"><?php echo esc_attr__("Send Password Reminder", 'gizzmo-ai'); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- Locked Addon Modal -->
        <div id="lockedAddonModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal('lockedAddonModal')">&times;</span>
                <p><?php echo esc_attr__("This is a locked Addon, Upgrade to use", 'gizzmo-ai'); ?></p><br>
                <button type="button" class="modal-button cancel" onclick="closeModal('lockedAddonModal')"><?php echo esc_attr__("Cancel", 'gizzmo-ai'); ?></button>
            </div>
        </div>

        <script src="https://unpkg.com/gridjs/dist/gridjs.umd.js"></script>
    
        <script src="<?php echo plugin_dir_url( __FILE__ ) . 'js/g_gizzmo.js'; ?>"></script>
        <script src="<?php echo plugin_dir_url( __FILE__ ) . 'js/g_gizzmo_addons.js'; ?>"></script>
        <script src="<?php echo plugin_dir_url( __FILE__ ) . 'js/wp_connector.js'; ?>"></script>
        
    


        <script src="https://unpkg.com/@popperjs/core@2"></script>
        <script src="https://unpkg.com/tippy.js@6"></script>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            tippy('[x-tooltip]', {
            content(reference) {
                const id = reference.getAttribute('x-tooltip').split("'")[1];
                const template = document.querySelector(id);
                return template.innerHTML;
            },
            allowHTML: true,
            interactive: true
            });
        });
        </script>
        
    </body>
    </html>
