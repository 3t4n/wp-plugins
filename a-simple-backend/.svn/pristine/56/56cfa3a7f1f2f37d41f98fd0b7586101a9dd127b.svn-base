<div class="<?php echo $this->pre; ?>-settings">
    <form class="<?php echo $this->pre; ?>-export-import-form" method="POST" action="<?php echo $this->url; ?>" enctype="multipart/form-data">
        <input type="hidden" name="action" value="<?php echo $this->url; ?>" />
        <input type="file" name="file" accept="application/json" />
    </form>
    <form method="post" action="options.php">
    <?php

    settings_fields($this->pre . 'settings_options');
    do_settings_sections($this->pre . 'settings_options');

    ?>
        <div class="<?php echo $this->pre; ?>-content">
            <div class="<?php echo $this->pre; ?>-block">
                <div class="<?php echo $this->pre; ?>-block <?php echo $this->pre; ?>-block-wide">
                    <div class="<?php echo $this->pre; ?>-block-title">Customize the dashboard message...</div>
                    <div class="<?php echo $this->pre; ?>-block-content">
                        <?php wp_editor($welcome_message, $this->pre . 'welcome_message', array('media_buttons' => false)); ?>
                    </div>
                </div><div class="<?php echo $this->pre; ?>-block <?php echo $this->pre; ?>-block-wide">
                    <div class="<?php echo $this->pre; ?>-block-title">Simplify…</div>
                    <div class="<?php echo $this->pre; ?>-block-content <?php echo $this->pre; ?>-overflow-x <?php echo $this->pre; ?>-simplify">
                        <div>
                            <input id="<?php echo $this->pre; ?>-plugins-wp-blogging" type="checkbox" name="<?php echo $this->pre; ?>plugins[blogging]" <?php if(! isset($plugins['blogging'])): ?>checked<?php endif; ?>>
                            <label for="<?php echo $this->pre; ?>-plugins-wp-blogging">Blogging</label>
                            <span class="<?php echo $this->pre; ?>-plugins-tooltip" title="Check to simplify post editor for blogging">?</span>
                        </div>
                        <div>
                            <input id="<?php echo $this->pre; ?>-plugins-wp-page" type="checkbox" name="<?php echo $this->pre; ?>plugins[page]" <?php if(! isset($plugins['page'])): ?>checked<?php endif; ?>>
                            <label for="<?php echo $this->pre; ?>-plugins-wp-page">Page</label>
                            <span class="<?php echo $this->pre; ?>-plugins-tooltip" title="Check to simplify page editor">?</span>
                        </div>
                        <div>
                            <input id="<?php echo $this->pre; ?>-plugins-wp-post" type="checkbox" name="<?php echo $this->pre; ?>plugins[post]" <?php if(! isset($plugins['post']) && isset($plugins['blogging'])): ?>checked<?php endif; ?>>
                            <label for="<?php echo $this->pre; ?>-plugins-wp-post">Post</label>
                            <span class="<?php echo $this->pre; ?>-plugins-tooltip" title="Check to simplify post editor to its most minimal form">?</span>
                        </div>
                        <?php if(in_array('acf-better-search/acf-better-search.php', $active_plugins)): ?>
                        <div>
                            <input id="<?php echo $this->pre; ?>-plugins-acf-better-search" type="checkbox" name="<?php echo $this->pre; ?>plugins[acf_better_search]" <?php if(! isset($plugins['acf_better_search'])): ?>checked<?php endif; ?>>
                            <label for="<?php echo $this->pre; ?>-plugins-acf-better-search">ACF Better Search</label>
                            <span class="<?php echo $this->pre; ?>-plugins-tooltip" title="Check to hide ACF Better Search notifications">?</span>
                        </div>
                        <?php endif; ?>
                        <?php if(in_array('better-font-awesome/better-font-awesome.php', $active_plugins)): ?>
                        <div>
                            <input id="<?php echo $this->pre; ?>-plugins-better-font-awesome" type="checkbox" name="<?php echo $this->pre; ?>plugins[better_font_awesome]" <?php if(! isset($plugins['better_font_awesome'])): ?>checked<?php endif; ?>>
                            <label for="<?php echo $this->pre; ?>-plugins-better-font-awesome">Better Font Awesome</label>
                            <span class="<?php echo $this->pre; ?>-plugins-tooltip" title="Check to hide Insert Icon button on Page/Post editor">?</span>
                        </div>
                        <?php endif; ?>
                        <?php if(in_array('bne-testimonials/bne-testimonials.php', $active_plugins)): ?>
                            <div>
                                <input id="<?php echo $this->pre; ?>-plugins-bne-testimonials" type="checkbox" name="<?php echo $this->pre; ?>plugins[bne_testimonials]" <?php if(! isset($plugins['bne_testimonials'])): ?>checked<?php endif; ?>>
                                <label for="<?php echo $this->pre; ?>-plugins-bne-testimonials">BNE Testimonials</label>
                                <span class="<?php echo $this->pre; ?>-plugins-tooltip" title="Check to remove selected elements from BNE Testimonials pages">?</span>
                            </div>
                        <?php endif; ?>
                        <?php if(in_array('bsk-pdf-manager/bsk-pdf-manager.php', $active_plugins)): ?>
                            <div>
                                <input id="<?php echo $this->pre; ?>-plugins-bsk-pdf" type="checkbox" name="<?php echo $this->pre; ?>plugins[bsk-pdf]" <?php if(! isset($plugins['bsk-pdf'])): ?>checked<?php endif; ?>>
                                <label for="<?php echo $this->pre; ?>-plugins-bsk-pdf">BSK PDF Manager</label>
                                <span class="<?php echo $this->pre; ?>-plugins-tooltip" title="Check to remove selected elements from BSK PSF pages">?</span>
                            </div>
                        <?php endif; ?>
                        <?php if(in_array('buddypress-login-redirect/bp-login-redirect.php', $active_plugins)): ?>
                        <div>
                            <input id="<?php echo $this->pre; ?>-plugins-bp-login-redirect" type="checkbox" name="<?php echo $this->pre; ?>plugins[buddypress_login_redirect]" <?php if(! isset($plugins['buddypress_login_redirect'])): ?>checked<?php endif; ?>>
                            <label for="<?php echo $this->pre; ?>-plugins-bp-login-redirect">BuddyPress Login Redirect</label>
                            <span class="<?php echo $this->pre; ?>-plugins-tooltip" title="Check to force redirect Administrator accounts to default page">?</span>
                        </div>
                        <?php endif; ?>
                        <?php if(in_array('bulletproof-security/bulletproof-security.php', $active_plugins)): ?>
                        <div>
                            <input id="<?php echo $this->pre; ?>-plugins-bps" type="checkbox" name="<?php echo $this->pre; ?>plugins[bulletproof_security]" <?php if(! isset($plugins['bulletproof_security'])): ?>checked<?php endif; ?>>
                            <label for="<?php echo $this->pre; ?>-plugins-bps">BulletProof Security</label>
                            <span class="<?php echo $this->pre; ?>-plugins-tooltip" title="Check to hide BulletProof Security notifications">?</span>
                        </div>
                        <?php endif; ?>
                        <?php if(class_exists('GD_System_Plugin_Command_Controller') || class_exists('WPaaS\\Cache')): ?>
                            <div>
                                <input id="<?php echo $this->pre; ?>-plugins-godaddy" type="checkbox" name="<?php echo $this->pre; ?>plugins[godaddy]" <?php if(! isset($plugins['godaddy'])): ?>checked<?php endif; ?>>
                                <label for="<?php echo $this->pre; ?>-plugins-godaddy">Go Daddy</label>
                                <span class="<?php echo $this->pre; ?>-plugins-tooltip" title="Uncheck to disable GoDaddy functionality">?</span>
                            </div>
                        <?php endif; ?>
                        <?php if(in_array('gravityforms/gravityforms.php', $active_plugins)): ?>
                            <div>
                                <input id="<?php echo $this->pre; ?>-plugins-gf" type="checkbox" name="<?php echo $this->pre; ?>plugins[gravity_forms]" <?php if(! isset($plugins['gravity_forms'])): ?>checked<?php endif; ?>>
                                <label for="<?php echo $this->pre; ?>-plugins-gf">Gravity Forms</label>
                                <span class="<?php echo $this->pre; ?>-plugins-tooltip" title="Check to hide Gravity Forms Add Form button on Page/Post editor and to hide form editing plus redirect to entries">?</span>
                            </div>
                        <?php endif; ?>
                        <?php if(in_array('album-gallery-premium/album-gallery-premium.php', $active_plugins) || in_array('new-album-gallery/new-album-gallery.php', $active_plugins)): ?>
                            <div>
                                <input id="<?php echo $this->pre; ?>-plugins-ag" type="checkbox" name="<?php echo $this->pre; ?>plugins[album_gallery]" <?php if(! isset($plugins['album_gallery'])): ?>checked<?php endif; ?>>
                                <label for="<?php echo $this->pre; ?>-plugins-ag">Album Gallery</label>
                                <span class="<?php echo $this->pre; ?>-plugins-tooltip" title="Check to hide Album Gallery shortcode, SEO settings and Add Images left menu">?</span>
                            </div>
                        <?php endif; ?>
                        <?php if(in_array('advanced-custom-fields-pro/acf.php', $active_plugins) || in_array('advanced-custom-fields/acf.php', $active_plugins)): ?>
                            <div>
                                <input id="<?php echo $this->pre; ?>-plugins-acf" type="checkbox" name="<?php echo $this->pre; ?>plugins[acf]" <?php if(! isset($plugins['acf'])): ?>checked<?php endif; ?>>
                                <label for="<?php echo $this->pre; ?>-plugins-acf">ACF</label>
                                <span class="<?php echo $this->pre; ?>-plugins-tooltip" title="Check to hide ACF fields on Page/Post editor">?</span>
                            </div>
                        <?php endif; ?>
                        <?php if(in_array('html5-responsive-faq/html5-responsive-faq.php', $active_plugins)): ?>
                            <div>
                                <input id="<?php echo $this->pre; ?>-plugins-faq" type="checkbox" name="<?php echo $this->pre; ?>plugins[hrf_faq]" <?php if(! isset($plugins['hrf_faq'])): ?>checked<?php endif; ?>>
                                <label for="<?php echo $this->pre; ?>-plugins-faq">HTML5 Responsive FAQs</label>
                                <span class="<?php echo $this->pre; ?>-plugins-tooltip" title="Check to simplify FAQ editor">?</span>
                            </div>
                        <?php endif; ?>
                        <?php if(class_exists('Kinsta\KinstaCache')): ?>
                            <div>
                                <input id="<?php echo $this->pre; ?>-plugins-kinsta" type="checkbox" name="<?php echo $this->pre; ?>plugins[kinsta]" <?php if(! isset($plugins['kinsta'])): ?>checked<?php endif; ?>>
                                <label for="<?php echo $this->pre; ?>-plugins-kinsta">Kinsta</label>
                                <span class="<?php echo $this->pre; ?>-plugins-tooltip" title="Uncheck to disable Kinsta functionality">?</span>
                            </div>
                        <?php endif; ?>
                        <?php if(in_array('slideshow-jquery-image-gallery/slideshow.php', $active_plugins)): ?>
                        <div>
                            <input id="<?php echo $this->pre; ?>-plugins-slideshow" type="checkbox" name="<?php echo $this->pre; ?>plugins[slideshow]" <?php if(! isset($plugins['slideshow'])): ?>checked<?php endif; ?>>
                            <label for="<?php echo $this->pre; ?>-plugins-slideshow">Slideshow</label>
                            <span class="<?php echo $this->pre; ?>-plugins-tooltip" title="Check to hide Insert Slideshow button on Page/Post editor">?</span>
                        </div>
                        <?php endif; ?>
                        <?php if(in_array('autodescription/autodescription.php', $active_plugins)): ?>
                        <div>
                            <input id="<?php echo $this->pre; ?>-plugins-seo" type="checkbox" name="<?php echo $this->pre; ?>plugins[theseoframework]" <?php if(! isset($plugins['theseoframework'])): ?>checked<?php endif; ?>>
                            <label for="<?php echo $this->pre; ?>-plugins-seo">The SEO Framework</label>
                            <span class="<?php echo $this->pre; ?>-plugins-tooltip" title="Check to show Page SEO Settings on Page/Post editor">?</span>
                        </div>
                        <?php endif; ?>
                        <?php if(in_array('woocommerce/woocommerce.php', $active_plugins)): ?>
                        <div>
                            <input id="<?php echo $this->pre; ?>-plugins-wc" type="checkbox" name="<?php echo $this->pre; ?>plugins[product]" <?php if(! isset($plugins['product'])): ?>checked<?php endif; ?>>
                            <label for="<?php echo $this->pre; ?>-plugins-wc">WooCommerce</label>
                            <span class="<?php echo $this->pre; ?>-plugins-tooltip" title="Check to simplify Add Product editor">?</span>
                        </div>
                        <?php endif; ?>
                        <?php if(class_exists('wpcyclengxc_Admin')): ?>
                            <div>
                                <input id="<?php echo $this->pre; ?>-plugins-wpcycle" type="checkbox" name="<?php echo $this->pre; ?>plugins[wpcycle]" <?php if(! isset($plugins['wpcycle'])): ?>checked<?php endif; ?>>
                                <label for="<?php echo $this->pre; ?>-plugins-wpcycle">WPCycle Cache</label>
                                <span class="<?php echo $this->pre; ?>-plugins-tooltip" title="Uncheck to disable WPCycle Cache functionality">?</span>
                            </div>
                        <?php endif; ?>
                        <?php if(in_array('wysiwyg-widgets/wysiwyg-widgets.php', $active_plugins)): ?>
                            <div>
                                <input id="<?php echo $this->pre; ?>-plugins-wc" type="checkbox" name="<?php echo $this->pre; ?>plugins[wysiwyg-widget]" <?php if(! isset($plugins['wysiwyg-widget'])): ?>checked<?php endif; ?>>
                                <label for="<?php echo $this->pre; ?>-plugins-wc">WYSIWYG Widgets / Widget Blocks</label>
                                <span class="<?php echo $this->pre; ?>-plugins-tooltip" title="Check to simplify WYSIWYG Widgets editor">?</span>
                            </div>
                        <?php endif; ?>
                        <?php if(in_array('ninja-tables/ninja-tables.php', $active_plugins)): ?>
                        <div>
                            <input id="<?php echo $this->pre; ?>-plugins-ninja-tables" type="checkbox" name="<?php echo $this->pre; ?>plugins[ninja-tables]" <?php if(! isset($plugins['ninja-tables'])): ?>checked<?php endif; ?>>
                            <label for="<?php echo $this->pre; ?>-plugins-ninja-tables">Ninja Tables</label>
                            <span class="<?php echo $this->pre; ?>-plugins-tooltip" title="Check to simplify Ninja Tables">?</span>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div><div class="<?php echo $this->pre; ?>-block">
                <div class="<?php echo $this->pre; ?>-block <?php echo $this->pre; ?>-block-wide">
                    <div class="<?php echo $this->pre; ?>-block">
                        <div class="<?php echo $this->pre; ?>-block-title">Select the user role limit...</div>
                        <div class="<?php echo $this->pre; ?>-block-content">
                            <div class="asimplebackend-form-row">
                                <div>
                                    <label for="<?php echo $this->pre; ?>-admin-mode">Available Roles</label>
                                    <select id="<?php echo $this->pre; ?>-admin-mode" name="<?php echo $this->pre; ?>admin_hidden[role]">
                                        <?php foreach($roles as $role => $opt): ?>
                                            <option value="<?php echo $role; ?>" <?php if(! strcmp($admin_hidden['role'], $role)): ?>selected<?php endif; ?>><?php echo $opt['name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="asimplebackend-form-row">
                                <div>
                                    <input id="<?php echo $this->pre; ?>-admin-password" type="checkbox" name="<?php echo $this->pre; ?>admin_hidden[password]" <?php if(! isset($admin_hidden['password'])): ?>checked<?php endif; ?>>
                                    <label for="<?php echo $this->pre; ?>-admin-password">Enable Password Reset</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="<?php echo $this->pre; ?>-block">
                        <div class="<?php echo $this->pre; ?>-block-title">Settings...</div>
                        <div class="<?php echo $this->pre; ?>-block-content">
                            <div class="<?php echo $this->pre; ?>-export-import">
                                <a href="<?php echo $this->url . "&action=export"; ?>">Backup</a>
                                <a href="">Restore</a>
                            </div>  


                              <!-- <div class="<?php //echo $this->pre; ?>-block-content cache-option">
                                <h4>Cache settings:</h4>
                                    <input id="<?php //echo $this->pre; ?>-cache-option
                                    " type="checkbox" name="<?php //echo $this->pre; ?>cache_option[cache]" <?php //if(! isset($cache_option['cache'])): ?>checked<?php //endif; ?>>
                                    <label for="<?php //echo $this->pre; ?>-cache-option">Enable cache flush Option</label>
                                </div> -->
                        </div>
                    </div>
                </div><div class="<?php echo $this->pre; ?>-block <?php echo $this->pre; ?>-block-wide">
                    <div class="<?php echo $this->pre; ?>-block">
                        <div class="<?php echo $this->pre; ?>-block-title">Edit the RSS feed for updates...</div>
                        <div class="<?php echo $this->pre; ?>-block-content">
                            <div class="<?php echo $this->pre; ?>-rss-form">
                                <div>
                                    <input id="<?php echo $this->pre; ?>-default-rss" type="radio" name="<?php echo $this->pre; ?>rss_url" value="<?php echo $default_rss; ?>" <?php if(! strcmp($default_rss, $rss)): ?>checked<?php endif; ?>/>
                                    <label for="<?php echo $this->pre; ?>-default-rss">Default RSS Feed</label>
                                </div><div>
                                    <input id="<?php echo $this->pre; ?>-custom-rss" type="radio" name="<?php echo $this->pre; ?>rss_url" value="<?php echo $rss; ?>" <?php if(strcmp($default_rss, $rss) !== 0): ?>checked<?php endif; ?>/>
                                    <input type="text" value="<?php echo $rss; ?>" placeholder="Custom RSS Feed" />
                                </div><div>
                                    <label for="<?php echo $this->pre; ?>-rss-title">Title</label>
                                    <input id="<?php echo $this->pre; ?>-rss-title" type="text" name="<?php echo $this->pre; ?>rss_title" value="<?php echo $rss_title; ?>" />
                                </div>
                            </div>
                        </div>
                    </div><div class="<?php echo $this->pre; ?>-block">
                        <div class="<?php echo $this->pre; ?>-block-title">Email Settings</div>
                        <div class="<?php echo $this->pre; ?>-block-content">
                            <div>
                                <label for="<?php echo $this->pre; ?>-email-from-address">From Address:</label>
                                <input id="<?php echo $this->pre; ?>-email-from-address" type="text" value="<?php if(isset($email['from']['address'])): ?><?php echo $email['from']['address']; ?><?php endif; ?>" placeholder="<?php echo $email_placeholder['from']['address']; ?>" />
                                <p class="description">Email addresses not matching email origin may be treated as spam</p>
                            </div>
                            <br />
                            <div>
                                <label for="<?php echo $this->pre; ?>-email-from-name">From Name:</label>
                                <input id="<?php echo $this->pre; ?>-email-from-name" type="text" value="<?php if(isset($email['from']['name'])): ?><?php echo $email['from']['name']; ?><?php endif; ?>" placeholder="<?php echo $email_placeholder['from']['name']; ?>" />
                            </div>
                        </div>
                    </div>
                </div><div class="<?php echo $this->pre; ?>-block <?php echo $this->pre; ?>-block-wide">
                    <div class="<?php echo $this->pre; ?>-block-title">Customize the media gallery...</div>
                    <div class="<?php echo $this->pre; ?>-block-content">
                        <div class="<?php echo $this->pre; ?>-form-row">
                            <div>
                                <label for="<?php echo $this->pre; ?>-media-align">Alignment:</label>
                                <select id="<?php echo $this->pre; ?>-media-align" name="<?php echo $this->pre; ?>image_default_align">
                                    <option value="left" <?php if(! strcmp($alignment, "left")): ?>selected<?php endif; ?>>Left</option>
                                    <option value="center" <?php if(! strcmp($alignment, "center")): ?>selected<?php endif; ?>>Center</option>
                                    <option value="right" <?php if(! strcmp($alignment, "right")): ?>selected<?php endif; ?>>Right</option>
                                    <option value="none" <?php if(! strcmp($alignment, "none")): ?>selected<?php endif; ?>>None</option>
                                </select>
                            </div><div>
                                <label for="<?php echo $this->pre; ?>-media-link">Link Type:</label>
                                <select id="<?php echo $this->pre; ?>-media-link" name="<?php echo $this->pre; ?>image_default_link_type">
                                    <option value="file" <?php if(! strcmp($link, "file")): ?>selected<?php endif; ?>>Media File</option>
                                    <option value="post" <?php if(! strcmp($link, "post")): ?>selected<?php endif; ?>>Attachment Page</option>
                                    <option value="custom" <?php if(! strcmp($link, "custom")): ?>selected<?php endif; ?>>Custom URL</option>
                                    <option value="none" <?php if(! strcmp($link, "none")): ?>selected<?php endif; ?>>None</option>
                                </select>
                            </div><div>
                                <label for="<?php echo $this->pre; ?>-media-size">Size:</label>
                                <select id="<?php echo $this->pre; ?>-media-size" name="<?php echo $this->pre; ?>image_default_size">
                                    <option value="thumbnail" <?php if(! strcmp($size, "thumbnail")): ?>selected<?php endif; ?>>Thumbnail – 150 × 150 </option>
                                    <option value="medium" <?php if(! strcmp($size, "medium")): ?>selected<?php endif; ?>>Medium – 300 × 169</option>
                                    <option value="large" <?php if(! strcmp($size, "large")): ?>selected<?php endif; ?>>Large – 660 × 371</option>
                                    <option value="full" <?php if(! strcmp($size, "full")): ?>selected<?php endif; ?>>Full Size – 1440 × 810</option>
                                </select>
                            </div>
                        </div>
                        <div class="<?php echo $this->pre; ?>-form-row">
                            <div>
                                <input id="<?php echo $this->pre; ?>-editor-media-button" type="checkbox" name="<?php echo $this->pre; ?>editor_hidden[gallery]" <?php if(! isset($editor_hidden['gallery'])): ?>checked<?php endif; ?>>
                                <label for="<?php echo $this->pre; ?>-editor-media-button">Create Gallery</label>
                            </div><div>
                                <input id="<?php echo $this->pre; ?>-editor-media-featured-image" type="checkbox" name="<?php echo $this->pre; ?>editor_hidden[featured_image]" <?php if(! isset($editor_hidden['featured_image'])): ?>checked<?php endif; ?>>
                                <label for="<?php echo $this->pre; ?>-editor-media-featured-image">Featured Image</label>
                            </div><div>
                                <input id="<?php echo $this->pre; ?>-editor-media-name" type="checkbox" name="<?php echo $this->pre; ?>editor_hidden[media_name]" <?php if(! isset($editor_hidden['media_name'])): ?>checked<?php endif; ?>>
                                <label for="<?php echo $this->pre; ?>-editor-media-name">Rename Add Media to Add Photo</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="<?php echo $this->pre; ?>-block <?php echo $this->pre; ?>-block-wide nav-menus-php">
                <div id="nav-menus-frame" class="<?php echo $this->pre; ?>-menu-wrap">
                    <div id="menu-settings-column" class="metabox-holder">
                        <div id="side-sortables" class="accordion-container">
                            <ul class="outer-border">
                                <li id="add-menu" class="control-section accordion-section open add-menu">
                                    <h3 class="accordion-section-title hndle" tabindex="0">Menus<span class="screen-reader-text">Press return or enter to expand</span></h3>
                                    <div class="accordion-section-content">
                                        <div class="inside">
                                            <div id="" class="posttypediv">
                                                <div id="menu-all" class="tabs-panel tabs-panel-active">
                                                    <ul class="categorychecklist form-no-clear">
                                                        <?php foreach($menu as $item): ?>
                                                            <?php
                                                            if($item[0] == '') {
                                                                continue;
                                                            }
                                                            ?>
                                                            <li>
                                                                <label class="menu-item-title">
                                                                    <input type="checkbox" class="menu-item-checkbox" name="" /><?php echo $item[0]; ?>
                                                                </label>
                                                                <input type="hidden" class="menu-item-name" value="<?php echo $item[0]; ?>" />
                                                                <input type="hidden" class="menu-item-link" value="<?php echo $item[2]; ?>" />
                                                                <input type="hidden" class="menu-item-submenu" value="<?php echo urlencode(serialize($item['submenu'])); ?>" />
                                                            </li>
                                                            <?php foreach($item['submenu'] as $sub): ?>
                                                            <li>
                                                                <label class="menu-item-title submenu-item-title">
                                                                    <input type="checkbox" class="menu-item-checkbox" name="" /><?php echo $sub[0]; ?>
                                                                </label>
                                                                <input type="hidden" class="menu-item-name" value="<?php echo $sub[0]; ?>" />
                                                                <input type="hidden" class="menu-item-link" value="<?php echo $sub[2]; ?>" />
                                                            </li>
                                                            <?php endforeach; ?>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </div>
                                                <p class="button-controls">
                                                <span class="list-controls">
                                                    <a href="#" class="select-all">Select All</a>
                                                </span>
                                                <span class="add-to-menu">
                                                    <input type="button" class="button-secondary submit-add-to-menu right" value="Add to Menu" name="add-menu-type-menu-item" id="submit-menu">
                                                    <span class="spinner"></span>
                                                </span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li id="add-custom-links" class="control-section accordion-section add-custom-links">
                                    <h3 class="accordion-section-title hndle" tabindex="0">Links<span class="screen-reader-text">Press return or enter to expand</span></h3>
                                    <div class="accordion-section-content">
                                        <div class="inside">
                                            <div class="customlinkdiv" id="customlinkdiv">
                                                <input type="hidden" value="custom" name="">
                                                <p id="menu-item-url-wrap">
                                                    <label class="howto" for="custom-menu-item-url">
                                                        <span>URL</span>
                                                        <input id="custom-menu-item-link" type="text" class="code menu-item-textbox" value="http://">
                                                    </label>
                                                </p>
                                                <p id="menu-item-name-wrap">
                                                    <label class="howto" for="custom-menu-item-name">
                                                        <span>Link Text</span>
                                                        <input id="custom-menu-item-name" type="text" class="regular-text menu-item-textbox input-with-default-title" placeholder="Menu Link">
                                                    </label>
                                                </p>
                                                <p id="menu-item-target-wrap">
                                                    <label class="howto" for="custom-menu-item-target">
                                                        <span>Link Text</span>&nbsp;
                                                        <select id="custom-menu-item-target">
                                                            <option value="_blank">New Window</option>
                                                            <option value="_self" selected>Same Window</option>
                                                        </select>
                                                    </label>
                                                </p>
                                                <p class="button-controls">
                                                <span class="add-to-menu">
                                                    <input type="button" class="button-secondary submit-add-to-menu right" value="Add to Menu" name="add-link-type-menu-item" id="submit-customlink">
                                                    <span class="spinner"></span>
                                                </span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <?php if(! empty($page)): ?>
                                <li id="add-page" class="control-section accordion-section add-menu">
                                    <h3 class="accordion-section-title hndle">Pages<span class="screen-reader-text">Press return or enter to expand</span></h3>
                                    <div class="accordion-section-content">
                                        <div class="inside">
                                            <div id="" class="posttypediv">
                                                <div id="page-all" class="tabs-panel tabs-panel-active">
                                                    <ul class="categorychecklist form-no-clear">
                                                        <?php foreach($page as $item): ?>
                                                            <li>
                                                                <label class="menu-item-title">
                                                                    <input type="checkbox" class="menu-item-checkbox" name="" /><?php echo $item -> post_title; ?>
                                                                </label>
                                                                <input type="hidden" class="menu-item-name" value="<?php echo $item -> post_title; ?>" />
                                                                <input type="hidden" class="menu-item-link" value="<?php echo $item -> ID; ?>" />
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </div>
                                                <p class="button-controls">
                                                <span class="list-controls">
                                                    <a href="#" class="select-all">Select All</a>
                                                </span>
                                                <span class="add-to-menu">
                                                    <input type="button" class="button-secondary submit-add-to-menu right" value="Add to Menu" name="add-menu-type-menu-item" id="submit-page">
                                                    <span class="spinner"></span>
                                                </span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <?php endif; ?>
                                <?php if(! empty($media)): ?>
                                <li id="add-media" class="control-section accordion-section add-menu">
                                    <h3 class="accordion-section-title hndle">Media<span class="screen-reader-text">Press return or enter to expand</span></h3>
                                    <div class="accordion-section-content">
                                        <div class="inside">
                                            <div id="" class="posttypediv">
                                                <div id="page-all" class="tabs-panel tabs-panel-active">
                                                    <ul class="categorychecklist form-no-clear">
                                                        <?php foreach($media as $item): ?>
                                                            <li>
                                                                <label class="menu-item-title">
                                                                    <input type="checkbox" class="menu-item-checkbox" name="" /><?php echo $item->post_title; ?>
                                                                </label>
                                                                <input type="hidden" class="menu-item-name" value="<?php echo $item->post_title; ?>" />
                                                                <input type="hidden" class="menu-item-link" value="<?php echo $item->ID; ?>" />
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </div>
                                                <p class="button-controls">
                                                <span class="list-controls">
                                                    <a href="#" class="select-all">Select All</a>
                                                </span>
                                                <span class="add-to-menu">
                                                    <input type="button" class="button-secondary submit-add-to-menu right" value="Add to Menu" name="add-menu-type-menu-item" id="submit-media">
                                                    <span class="spinner"></span>
                                                </span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                    <div id="menu-management-liquid">
                        <div id="menu-management">
                            <div class="menu-edit">
                                <div id="post-body">
                                    <div id="post-body-content">
                                        <h3>
                                            <span>Edit the "A Simple Backend" menu...</span>
                                            <span class="<?php echo $this->pre; ?>-menu-order">
                                                <a href="" class="<?php echo $this->pre; ?>-alpha-desc" title="Sort A-Z">ABC&darr;</a> |
                                                <a href="" class="<?php echo $this->pre; ?>-alpha-asc" title="Sort Z-A">ABC&uarr;</a>
                                            </span>
                                        </h3>
                                        <hr />
                                        <ul id="menu-to-edit" class="menu ui-sortable">
                                            <?php
                                            if(! empty($show)) {
                                                foreach ($show as $item) {
                                                    switch ($item['type']) {
                                                        case 'menu':
                                                            $this->menu($item);
                                                            break;
                                                        case 'toplink':
                                                            $this->toplink($item);
                                                            break;
                                                        case 'link':
                                                            $this->link($item);
                                                            break;
                                                        case 'page':
                                                            $this->page($item);
                                                            break;
                                                        case 'media':
                                                            $this->media($item);
                                                            break;
                                                    }
                                                }
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <input class="hide button button-primary" type="submit" value="Save Settings" />
    </form>
</div>