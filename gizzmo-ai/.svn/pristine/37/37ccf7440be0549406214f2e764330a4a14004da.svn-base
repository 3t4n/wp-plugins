<?php
$plugin_version = $this->version;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products Comparison</title>
    <link href="<?php echo plugin_dir_url( __FILE__ ) . 'css/app.css'; ?>" rel="stylesheet">
    <link href="<?php echo plugin_dir_url( __FILE__ ) . 'css/work_area.css'; ?>" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <header class="gizzmo_header">
        <img src="<?php echo plugin_dir_url( __FILE__ ) . 'images/gizzmo_logo.svg'; ?>" alt="Gizzmo Logo" class="gizzmo_logo">
        <div class="header-links">
            <input type="hidden" id="plugin_version" value="<?php echo $plugin_version; ?>" />
            <span id="countown24timer" title="For the next 24 hours, you’ll enjoy Free access to all premium features and tools. Explore everything Gizzmo.ai has to offer before returning to the Free plan. Upgrade anytime to keep these powerful features!" style="color: #646970;border: 1px solid #ffb02e;border-radius: 3px;padding: 5px;padding-left: 20px;padding-right: 20px;;display:none"></span>
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
        <div class="products_wrapper one-fourth">

            <div class="tabset">
                <!-- Tab 1 -->
                <input type="radio" name="tabset" id="tab1" aria-controls="your_products" checked>
                <label for="tab1"><?php echo esc_attr__("Your Products", 'gizzmo-ai'); ?></label>
                
                <!-- Tab 2 -->
                <input type="radio" name="tabset" id="tab2" aria-controls="latest_products" >
                <label for="tab2"><?php echo esc_attr__("Latest Public Products", 'gizzmo-ai'); ?></label>

                <!-- Tab 3 -->
                <input type="radio" name="tabset" id="tab3" aria-controls="high_commisions">
                <label for="tab3"><?php echo esc_attr__("Premium Affiliates", 'gizzmo-ai'); ?></label>
                
                <div class="tab-panels" style="min-width: 585px;">
                    <section id="your_products" class="tab-panel">
                        <div id="property_products"></div>
                        <div id="promotion-div" class="promotion-div" style="display:none">
                            <h2><?php echo esc_attr__("Can't Find the Product You Want?", 'gizzmo-ai'); ?></h2>
                            <p><?php echo esc_attr__("It looks like you haven't installed our Chrome Extension or imported any products from Amazon yet.", 'gizzmo-ai'); ?></p>
                            <p><?php echo esc_attr__("Add Gizzmo's Chrome Extension to import your own products into Gizzmo!", 'gizzmo-ai'); ?></p>
                            <button class="btn-download" onclick="window.open('https://chromewebstore.google.com/detail/gizzmo/gdopffidobhgcbgjaleokkldkjhkjloe', '_blank')"><?php echo esc_attr__("Add Gizzmo's Chrome Extension", 'gizzmo-ai'); ?></button>
                            <h2 style="margin-top: 10px;font-size: 11px;color: #333;"><?php echo esc_attr__("AND CONNECT USING YOUR TOKEN", 'gizzmo-ai'); ?></h2>
                            <span style="font-size: 12px;color: #333;font-weight:bold">TOKEN: <span id="ext_token" style="color:#5a10b9;text-decoration:underline;cursor:pointer"></span></span>
                        </div>
                    
                    </section>
                    <section id="latest_products" class="tab-panel">
                        <div id="public_products"></div>
                    </section>
                    <section id="high_commisions" class="tab-panel">
                        <div class="media_placeholder">
                            <div id="promotion-div"  class="promotion-div">
                                <h2 style="margin-bottom: 0px;"><?php echo esc_attr__("Coming Soon!", 'gizzmo-ai'); ?></h2>
                            </div>
                        </div>
                    </section>
                </div>

            </div>
        </div>
        <div class="three-fourths">
            <div id="action_placeholder" class="action_placeholder">
                <div class="action_placeholder_header">
                    <h4><?php echo esc_attr__("Products Comaprison", 'gizzmo-ai'); ?></h4>
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
                    <span><?php echo esc_attr__("Select 2 products you want to compare.", 'gizzmo-ai'); ?></span>
                </div>
            </div>
            <div id="steps_wrapper" class="steps-widget steps_older">
                <div class="steps-meta">
                     
                </div>
                <ul class="steps-list">
                    <li class="active current">
                        <div id="first_step" class="label" style="border-top-left-radius: 8px;border-top-right-radius: 8px;"><button class='btn step_circle'><i></i></button>
                            <h4><b style="color:#333"><?php echo esc_attr__("STEP 1", 'gizzmo-ai'); ?></b> <?php echo esc_attr__("- Add 2 products.", 'gizzmo-ai'); ?></h4>
                        </div>
                        <div class="desc" >
                            <div class="list" id="compare_products_draggable" style="display:none;padding: 10px;max-height: 400px;overflow-y: auto;width: 90%;" sortable-list="sortable-list">
                            </div>
                            <div class="action"><button id="products_next" style="background-color: #f0f0f1;" class="btn btn-next btn_next" href="#" disabled><?php echo esc_attr__("Next", 'gizzmo-ai'); ?></button></div>
                        </div>    
                    </li>
                    <li>
                        <div class="label" style="border-top-left-radius: 8px;border-top-right-radius: 8px;"><button class='btn step_circle'><i></i></button>
                            <h4><b style="color:#333"><?php echo esc_attr__("STEP 2", 'gizzmo-ai'); ?></b> <?php echo esc_attr__("- Get and arrange comparable product features.", 'gizzmo-ai'); ?></h4>
                        </div>
                        <div class="desc"  >
                            <div class="selectedsharedfeatureslist" id="selected_shared_features_draggable" style="display:none; margin-top: 30px;padding: 10px;width: 97%;" sortable-list="sortable-list">
                                
                            </div>
                            <div id="shared_features_spinner_loader" class="shared_features_spinner_loader" >
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
                            <span id="get_products_shared_features_bt" onclick="get_products_shared_features()" style="color: rgb(255, 255, 255);border-radius: 3px;padding: 9px 20px;margin-top: -1px;background-color: rgb(90, 16, 185);display: block;cursor: pointer;position: relative;top: 38px;text-align: center;width: 50%;left: 20%;margin-bottom: 19px;"><?php echo esc_attr__("Get Comparable Features", 'gizzmo-ai'); ?></span>
                            
                            
                            <div class="action" style="min-height: 40px;"><button id="shared_features_next" style="display:none;float: right;margin-top: 30px;margin-bottom: 10px;" class="btn btn-next btn_next" href="#"><?php echo esc_attr__("Next", 'gizzmo-ai'); ?></button></div>
                        </div>    
                    </li>
                    <li>
                        <div class="label" style="border-top-left-radius: 8px;border-top-right-radius: 8px;"><button class='btn step_circle'><i></i></button>
                            <h4><b style="color:#333"><?php echo esc_attr__("STEP 3", 'gizzmo-ai'); ?></b> <?php echo esc_attr__("- SEO Keyphrase and Content Theme.", 'gizzmo-ai'); ?></h4>
                        </div>
                        <div class="desc" >

                            <div class="key_phrase_wrapper">
                                <div class="gizzmo_input_title"><?php echo esc_attr__("SEO Keyphrase:", 'gizzmo-ai'); ?> <span x-tooltip="'#seo_keyphrase_tip'"><?php echo esc_attr__("(?)", 'gizzmo-ai'); ?></span> <span class="helper_texts"><span x-tooltip="'#seo_keyphrase_tip'"><?php echo esc_attr__("(6 Words Max, Commas not allowed)", 'gizzmo-ai'); ?></span><span id="key_phrase_input_addon"></span></div>
                                <div class="gizzmo_input_holder"><input type="text" id="key_phrase_input" name="key_phrase_input" class="gizzmo_input" placeholder="Enter SEO Keyword" /></div>
                            </div>
                            <div class="gizzmo_list-container">
                                <div class="gizzmo_input_title"><?php echo esc_attr__("Choose Your Content Theme:", 'gizzmo-ai'); ?> <span x-tooltip="'#thematic_concepts'"><?php echo esc_attr__("(?)", 'gizzmo-ai'); ?></span><span id="thematic_concept_list_addon"></span></div>
                                <ul id="thematic_concept_list" class="gizzmo_list-item-list">
                                    
                                    <!-- Add more items as needed -->
                                </ul>
                            </div>
                            <div class="action"><button class="btn btn-next btn_next" href="#"><?php echo esc_attr__("Next", 'gizzmo-ai'); ?></button></div>

                        </div>
                    </li>
                    <li>
                        <div class="label"><button class='btn step_circle'><i></i></button>
                            <h4><b style="color:#333"><?php echo esc_attr__("STEP 4", 'gizzmo-ai'); ?></b> <?php echo esc_attr__("- Additional Content Settings.", 'gizzmo-ai'); ?></h4>
                        </div>
                        <div class="desc">

                        <ul class="gizzmo_list-item-list" style="margin-top: 20px;">
                                <li class="gizzmo_list-item">
                                    <input class="theme_radio" type="checkbox" id="images_embed_in_content" name="images_embed_in_content" />
                                    <label for="images_embed_in_content" class="gizzmo_list-title"><?php echo esc_attr__("Embed Amazon Product Images In Content", 'gizzmo-ai'); ?> <span id="images_embed_in_content_addon"></span></label>
                                    <div class="gizzmo_list-description"><?php echo esc_attr__("Embed Amazon product images within the content to visually enhance and support the text, providing a more engaging and informative experience for readers.", 'gizzmo-ai'); ?></div>
                                </li>
                                <li class="gizzmo_list-item">
                                    <input class="theme_radio" type="checkbox" id="internal_linking" name="internal_linking" />
                                    <label for="internal_linking" class="gizzmo_list-title"><?php echo esc_attr__("Generate Internal Links Section", 'gizzmo-ai'); ?> <span id="internal_linking_addon"></span></label>
                                    <div class="gizzmo_list-description"><?php echo esc_attr__("Gizzmo will try to match the content to existing posts created by Gizzmo and will create a section with internal links (up to 3) to related content.", 'gizzmo-ai'); ?></div>
                                </li>
                                <li class="gizzmo_list-item">
                                    <input class="theme_radio" type="checkbox" id="faqs" name="faqs" />
                                    <label for="faqs" class="gizzmo_list-title"><?php echo esc_attr__("Generate FAQs Section", 'gizzmo-ai'); ?> <span id="faqs_addon"></span></label>
                                    <div class="gizzmo_list-description"><?php echo esc_attr__("Create a list of frequently asked questions and answers to address common inquiries about the product or topic.", 'gizzmo-ai'); ?></div>
                                </li>
                                <li class="gizzmo_list-item">
                                    <input class="theme_radio" type="checkbox" id="conclusion" name="conclusion" />
                                    <label for="conclusion" class="gizzmo_list-title"><?php echo esc_attr__("Generate Conclusion Section", 'gizzmo-ai'); ?> <span id="conclusion_addon"></span></label>
                                    <div class="gizzmo_list-description"><?php echo esc_attr__("Summarize the key points and insights, providing a final assessment or recommendation about the product or topic.", 'gizzmo-ai'); ?></div>
                                </li>
                            </ul>


                            <div class="action"><button class="btn btn-next btn_next" href="#"><?php echo esc_attr__("Next", 'gizzmo-ai'); ?></button></div>
                        </div>
                    </li>
                    <li>
                    <div class="label"><button class='btn step_circle'><i></i></button>
                            <h4><b style="color:#333"><?php echo esc_attr__("STEP 5", 'gizzmo-ai'); ?></b> <?php echo esc_attr__("- Monetization and Affiliate.", 'gizzmo-ai'); ?></h4>
                        </div>
                        <div class="desc" >
                        
                            <div class="key_phrase_wrapper" style="margin-top: 10px;">
                                <div class="gizzmo_input_title"><?php echo esc_attr__("Amazon Affiliate Tags:", 'gizzmo-ai'); ?> <span x-tooltip="'#affiliate_tag_tip'"><?php echo esc_attr__("(?)", 'gizzmo-ai'); ?></span> &nbsp;&nbsp;&nbsp;<span id="affiliate_tags_addon"></span><span id="affiliate_tags_helper_section" style="padding-left:5px" class="helper_texts"><span style="padding-left:5px" class="helper_texts"></span>  </div>
                                <div class="gizzmo_list-description" style="padding-left: 2px;padding-bottom: 5px;"><?php echo esc_attr__("Gizzmo automatically generates product links with your affiliate tag embedded, saving you time and effort. Focus on creating content while Gizzmo ensures you get credit for every sale, without the hassle of managing links.", 'gizzmo-ai'); ?> <a id="amazon_affilaite_link" style="text-decoration: underline;color: #5a10b9" href="https://affiliate-program.amazon.com/home" target="_blank"><?php echo esc_attr__("Amazon Affiliate Program", 'gizzmo-ai'); ?></a></span></div>
                                <div class="gizzmo_input_holder">
                                    <select name="affiliate_tags" class="gizzmo_input" id="affiliate_tags" style="float:left;max-width: 200px;">
                                        <option value="your-site-20">your-site-20</option>
                                    </select>
                                    <span id="add_affiliate_tag"  style="color: rgb(255, 255, 255);border: 1px solid rgb(90, 16, 185);border-radius: 3px;padding: 10px 20px;margin-top: -1px;background-color: rgb(90, 16, 185);display: block;width: 17%;float: left;margin-left: 10px;cursor: pointer;"><?php echo esc_attr__("Add Affiliate Tag", 'gizzmo-ai'); ?></span>
                                </div>
                                <div class="gizzmo_input_title">
                                    <div style="width:280px">
                                        <div style="float:left">
                                            <span style="padding-left:5px;position: relative;top: -51px;left: 139px;" class="helper_texts"><span id="delete_affiliate_tag" style="text-decoration: underline;color: #333; cursor:pointer" ><?php echo esc_attr__("Delete", 'gizzmo-ai'); ?></a></span>

                                        </div>
                                        <div style="width:50%;float:right;text-align:right">
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>


                            <div class="gizzmo_list-container" style="float:left">
                                <div class="gizzmo_input_title"><?php echo esc_attr__("Monetization:", 'gizzmo-ai'); ?></div>
                                <ul class="gizzmo_list-item-list" style="margin-top: 20px;">
                                    <li class="gizzmo_list-item">
                                        <input class="theme_radio" type="checkbox" checked id="CTAs" name="CTAs" />
                                        <label for="CTAs" class="gizzmo_list-title"><?php echo esc_attr__("Buy On Amazon CTA Buttons", 'gizzmo-ai'); ?> <span style="font-size:12px; color:#5a10b9"><?php echo esc_attr__("(Encoded with your Affiliate Tag)", 'gizzmo-ai'); ?></span> <span id="CTAs_addon"></span></label>
                                        <div class="gizzmo_list-description"><?php echo esc_attr__("Gizzmo generates 'Buy on Amazon' buttons designed for high conversions. These buttons are strategically placed, offering a seamless path for users to make purchases. The appealing design enhances the likelihood of a purchase while maintaining a smooth user experience.", 'gizzmo-ai'); ?></div>
                                    </li>
                                    <li class="gizzmo_list-item">
                                        <input class="theme_radio" type="checkbox" id="carousels" name="carousels" />
                                        <label for="carousels" class="gizzmo_list-title"><?php echo esc_attr__("Related Products Carousel", 'gizzmo-ai'); ?> <span id="carousels_addon"></span></label>
                                        <div class="gizzmo_list-description"><?php echo esc_attr__("Gizzmo creates a related products carousel widget, designed for high click-through rates (CTR), and places it between the paragraphs.", 'gizzmo-ai'); ?></div>
                                    </li>
                                    <li class="gizzmo_list-item">
                                        <input class="theme_radio" type="checkbox" id="keyphrase_hyperlinks" name="keyphrase_hyperlinks" />
                                        <label for="keyphrase_hyperlinks" class="gizzmo_list-title"><?php echo esc_attr__("Automated Key Phrase Detection and Hyperlinking", 'gizzmo-ai'); ?> <span id="keyphrase_hyperlinks_addon"></span></label>
                                        <div class="gizzmo_list-description"><?php echo esc_attr__("Gizzmo automatically detects key phrases and creates hyperlinks for higher click-through action (CTA).", 'gizzmo-ai'); ?></div>
                                    </li>
                                </ul>
                            </div>
                            <div class="action"><button class="btn btn-next btn_next" href="#"><?php echo esc_attr__("Next", 'gizzmo-ai'); ?></button></div>

                        </div>
                    </li>
                    <li>
                    <div class="label"><button class='btn step_circle'><i></i></button>
                            <h4><b style="color:#333"><?php echo esc_attr__("STEP 6", 'gizzmo-ai'); ?></b> <?php echo esc_attr__("- Featured Image.", 'gizzmo-ai'); ?></h4>
                        </div>
                        <div class="desc">

                            <div class="media_placeholder">
                                <div class="media_left-side">
                                    <div class="media_row upper-row">
                                        <div class="image-placeholder">
                                            <img id="selected_featured_image" src="<?php echo plugin_dir_url( __FILE__ ) . 'images/600x400_featured.svg'; ?>" alt="Placeholder Image">
                                            <span onclick="show_prod_image_select_comparison()" style="color: rgb(255, 255, 255);border-radius: 3px;padding: 4px 20px;margin-top: -1px;background-color: rgb(90, 16, 185);display: block;cursor: pointer;position: relative;top: 38px;text-align: center;"><?php echo esc_attr__("Select Featured Image", 'gizzmo-ai'); ?></span>
                                        </div>
                                    </div>
                                    <div class="media_row lower-row" style="min-height: 50px;">
                                         
                                    </div>
                                    <div class="media_row lower-row">
                                    <div class="row-title gizzmo_input_title"  style="font-weight: 400;margin-bottom: 20px"><?php echo esc_attr__("Generate Featured AI image of :", 'gizzmo-ai'); ?> <span id="ai_image_generation_addon"></span><input placeholder="e.g a dining table with a wine glass" type="text" id="ai_image_theme" style="width:280px" /></div>
                                        
                                        <div  id="image-row"  class="image-row">
                                            
                                            <div class="image-container">
                                                <div id="ai_image_1" ai-style="cinematic" class="generate-placeholder"><?php echo esc_attr__("AI Generate", 'gizzmo-ai'); ?></div>
                                            </div>
                                            <div class="image-container">
                                                <div id="ai_image_2" ai-style="photographic" class="generate-placeholder"><?php echo esc_attr__("AI Generate", 'gizzmo-ai'); ?></div>
                                            </div>
                                            <div class="image-container">
                                                <div id="ai_image_3" ai-style="comic-book" class="generate-placeholder"><?php echo esc_attr__("AI Generate", 'gizzmo-ai'); ?></div>
                                            </div>
                                            <div class="image-container">
                                                <div id="ai_image_4" ai-style="3d-model" class="generate-placeholder"><?php echo esc_attr__("AI Generate", 'gizzmo-ai'); ?></div>
                                            </div>
                                            <div class="image-container" style="margin-right: 2px;">
                                                <div id="ai_image_5" ai-style="analog-film" class="generate-placeholder"><?php echo esc_attr__("AI Generate", 'gizzmo-ai'); ?></div>
                                            </div>
                                        </div>
                                        <div class="cover_div"></div>
                                    </div>
                                </div>
                            </div>`

                            <div class="action"><button class="btn btn-next btn_next" href="#"><?php echo esc_attr__("Next", 'gizzmo-ai'); ?></button></div>
                        </div>
                    </li>
                    <li>
                        <div class="label"><button class='btn step_circle'><i></i></button>
                        <h4><b style="color:#333"><?php echo esc_attr__("STEP 7", 'gizzmo-ai'); ?></b> <?php echo esc_attr__("- Finish.", 'gizzmo-ai'); ?></h4>
                        </div>
                        <div class="desc">
                            <div class="key_phrase_wrapper" style="margin-top: 10px;">
                                <div class="gizzmo_input_title" style="color: #080808;"><?php echo esc_attr__("Select Your Target Audience:", 'gizzmo-ai'); ?> &nbsp;&nbsp;&nbsp;  <span id="selected_audience" style="background-color: #5a10b9;color: #fff;border-radius: 5px;padding-left: 15px;padding-right: 15px;padding-top: 4px;padding-bottom: 6px;font-weight: 400;cursor:pointer;text-decoration:underline">Consumers</span><span id="selected_audience_addon"></span> </div>
                                <div class="gizzmo_list-description" style="padding-left: 2px;padding-bottom: 5px;"><?php echo esc_attr__("Selecting an audience ensures the content resonates with your readers, making it more relevant and engaging for them.", 'gizzmo-ai'); ?> </span></div>
                            </div>
                            <div class="key_phrase_wrapper" style="margin-top: 10px;">
                                <div class="gizzmo_input_title" style="color: #080808;"><?php echo esc_attr__("Select Your Content Tone:", 'gizzmo-ai'); ?> &nbsp;&nbsp;&nbsp;  <span id="selected_tone" style="background-color: #5a10b9;color: #fff;border-radius: 5px;padding-left: 15px;padding-right: 15px;padding-top: 4px;padding-bottom: 6px;font-weight: 400;cursor:pointer;text-decoration:underline">Informative</span><span id="selected_tone_addon"></span> </div>
                                <div class="gizzmo_list-description" style="padding-left: 2px;padding-bottom: 5px;"><?php echo esc_attr__("Choosing a tone sets the right mood and style for your content, making it more effective and appealing to your audience.", 'gizzmo-ai'); ?> </span></div>
                            </div>
                            <div class="key_phrase_wrapper" style="margin-top: 10px;">
                                <div class="gizzmo_input_title"><?php echo esc_attr__("Select the language for content creation:", 'gizzmo-ai'); ?></div>
                                <div class="gizzmo_input_holder">
                                <select style="width: 240px;height: 42px;line-height: 24px;" id="languge_slct" name="languge_slct" class="form-select mt-1.5 w-full rounded-lg bg-slate-150 px-2 py-2 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900">
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
                                </div>
                                <div class="action"><button class="btn btn-next btn_next" href="#" style="position: relative;top: -47px;"><?php echo esc_attr__("Save as Draft", 'gizzmo-ai'); ?></button></div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>



    <input type="hidden" id="main_account_id" name="main_account_id" value="">
    <input type="hidden" id="main_property_id" name="main_property_id" value="">
    <input type="hidden" id="main_content_type" name="main_content_type" value="Comparison">
    <input type="hidden" id="main_package_name" name="main_package_name" value="">


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
    
    <div id="audiances_model" class="modal">
        <div class="modal-content" style="display: flex;width: 500px;">
            <span class="close" onclick="closeModal('audiances_model')">&times;</span>
             
            <div class="list_holder" style="width: 447px;height: 400px;overflow-y: auto;padding-left: 10px;padding-right: 10px;padding-top: 10px;padding-bottom: 10px;margin-top: 20px;">
                <ul id="audiences_list" class="gizzmo_list-item-list">
                </ul>
            </div>
        </div>
    </div>                               
                                    
    <div id="tones_model" class="modal">
        <div class="modal-content" style="display: flex;width: 500px;">
            <span class="close" onclick="closeModal('tones_model')">&times;</span>
             
            <div class="list_holder" style="width: 447px;height: 400px;overflow-y: auto;padding-left: 10px;padding-right: 10px;padding-top: 10px;padding-bottom: 10px;margin-top: 20px;">
                <ul id="tones_list" class="gizzmo_list-item-list">
                </ul>
            </div>
        </div>
    </div>                               
    
    <template id="seo_keyphrase_tip">
      <div class="flex space-x-3 rounded-lg bg-slate-150 p-3 dark:bg-navy-500">
        <div>
          <p class="font-medium text-slate-700 dark:text-navy-100"><?php echo esc_attr__("An SEO Keyphrase is a specific word or phrase
            provided by the user that Gizzmo uses to generate content optimized for search engines. By incorporating the
            keyphrase into the content, Gizzmo helps improve the visibility and search engine ranking of the generated
            content, making it more discoverable to users.", 'gizzmo-ai'); ?></p><br>
          <p class="text-xs text-slate-500 dark:text-navy-200"><a style="text-decoration: underline;" target="_blank"
              href="https://gizzmo.ai/keyword-research-101-your-ultimate-guide-to-improve-seo/"><?php echo esc_attr__("How to choose the right focus keyword", 'gizzmo-ai'); ?></a></p>
        </div>
      </div>
    </template>
    <template id="thematic_concepts">
      <div class="flex space-x-3 rounded-lg bg-slate-150 p-3 dark:bg-navy-500">
        <div>
          <h3><b><?php echo esc_attr__("Why Choose a Theme?", 'gizzmo-ai'); ?></b></h3>
          <p class="font-medium text-slate-700 dark:text-navy-100"><?php echo esc_attr__("Selecting a theme is optional but can significantly enhance your blog post. Here's why:", 'gizzmo-ai'); ?></p><br>
          <p class="font-medium text-slate-700 dark:text-navy-100">
            <ul>
              <li>
                <b><?php echo esc_attr__("Focused Content:", 'gizzmo-ai'); ?></b> <?php echo esc_attr__("A theme like 'Family Gaming' or 'Budget Battle' narrows down your comparison, making your content more concise and targeted.", 'gizzmo-ai'); ?>
              </li>
              <li>
                <b><?php echo esc_attr__("Increased Engagement:", 'gizzmo-ai'); ?></b> <?php echo esc_attr__("Themes cater to specific interests, engaging readers who are particularly passionate about that aspect of gaming.", 'gizzmo-ai'); ?>
              </li>
              <li>
                <b><?php echo esc_attr__("Unique Angle:", 'gizzmo-ai'); ?></b> <?php echo esc_attr__("Offering a themed comparison provides a fresh perspective, setting your post apart from more general comparisons.", 'gizzmo-ai'); ?>
              </li>
            </ul>
          </p>
        </div>
      </div>
    </template>
    <template id="affiliate_tag_tip">
      <div class="flex space-x-3 rounded-lg bg-slate-150 p-3 dark:bg-navy-500">
        <div>
          <p class="font-medium text-slate-700 dark:text-navy-100"><?php echo esc_attr__("An Amazon Affiliate Tag is a unique tracking
            identifier assigned to your account as an affiliate. It allows you to earn a commission on purchases made
            through the affiliate links you provide for Amazon products.", 'gizzmo-ai'); ?></p><br>
          <p class="text-xs text-slate-500 dark:text-navy-200"><a style="text-decoration: underline;" target="_blank"
              href="https://affiliate-program.amazon.com/"><?php echo esc_attr__("Amazon Affiliate Program", 'gizzmo-ai'); ?></a></p>
        </div>
      </div>
    </template>

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



    <!-- Out of credits Modal -->
    <input type="hidden" id="available_c" name="available_c" value="">
    <div id="outofcredits_Modal" class="modal">
        <div class="modal-content" style="display: flex">
            <span class="close" onclick="closeModal('outofcredits_Modal')">&times;</span>
            <div class="left_side" style="width:50%">
            <div class="pop-promotion-container">
                <img style="margin-bottom: 9px !important;"  src="<?php echo plugin_dir_url( __FILE__ ) . 'images/gizzmo_logo.svg'; ?>" alt="Gizzmo Logo">
                <p style="color: #5a10b9;"><?php echo esc_attr__("Your credits for this month have run out!", 'gizzmo-ai'); ?></p>
                <p style="font-size:14px; font-weight:normal"><?php echo esc_attr__("Upgrade your package now to get more credits and continue creating high-quality, conversion-focused articles. Don't let your content creation pause—upgrade today!", 'gizzmo-ai'); ?></p>
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
    
    <!-- zoom image Pop -->
    <div id="zoomPopModel" class="modal">
        <div class="modal-content" style="width: 400px; max-height: 600px;">
            <span style="margin-top: -9px;padding-bottom: 9px;" class="close" onclick="closeModal('zoomPopModel')">&times;</span>
            <img id="zoom_image" src="" style="width: 100%;height: 100%;">
        </div>
    </div>

    
    <script src="https://unpkg.com/gridjs/dist/gridjs.umd.js"></script>
  
    <script src="<?php echo plugin_dir_url( __FILE__ ) . 'js/g_gizzmo.js'; ?>"></script>
    <script src="<?php echo plugin_dir_url( __FILE__ ) . 'js/g_gizzmo_addons.js'; ?>"></script>


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


        //what ever i typed in key_phrase_input will be saved in the ai_image_theme
        document.getElementById('key_phrase_input').addEventListener('input', function() {
            document.getElementById('ai_image_theme').value = this.value;
        });

      });
    </script>
    
</body>
</html>
