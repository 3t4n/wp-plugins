<div class="wrap">
    <?php screen_icon(); ?>
    <h2>WP Headmaster Settings</h2>

    <h2 class="nav-tab-wrapper">
        <a href="#wphm_analytics" class="nav-tab" id="wphm_ga_tab">Analytics</a>
        <a href="#wphm_inline" class="nav-tab" id="wphm_icons_tab">Icons</a>
        <a href="#wphm_fonts" class="nav-tab" id="wphm_fonts_tab">Fonts</a>
        <a href="#wphm_scripts" class="nav-tab" id="wphm_scripts_tab">Scripts</a>
        <a href="#wphm_meta" class="nav-tab" id="wphm_meta_tab">Meta Tags</a>
    </h2>

    <form method="post" action="options.php">  
        <?php
            settings_fields( 'headmaster_myoption_group' );
            do_settings_sections('headmaster_myoption_group');
        ?> 
        <?php echo '<input type="hidden" id="page_id" name="page" value="' . $_REQUEST['page'] . '"/>'; ?>

        <div id="wphm_analytics" class="group">
            <div class="metabox-holder">
                <div class="postbox">
                    <div id="" style="display: block;">                      
                         <h3>Google Analytics</h3>
                            <table class="form-table">
                                <tbody>
                                    <tr valign="top">
                                        <th scope="row">
                                            <div class="inside">
                                                Unique Tracking ID
                                            </div>
                                        </th>
                                        <td>
                                           <input type="text" name="ga_profile" value="<?php echo get_option('ga_profile'); ?>" placeholder="UA-XXXXXXXX-X" /><br />
                                           <span class="description">To add Google Analytics tracking to your website, please enter your unique GA tracking code.</span>

                                        </td>
                                    </tr>

                                    <tr valign="top">
                                        <th scope="row">
                                            <div class="inside">
                                                Code Choice
                                            </div>
                                        </th>
                                        <td>
                                           <input name="wp_headmaster_ga_choice" type="radio" value="0" <?php checked( '0', get_option( 'wp_headmaster_ga_choice' ) ); ?> /> Universal Tracking Code (analytics.js)<br />
                                           <input name="wp_headmaster_ga_choice" type="radio" value="1" <?php checked( '1', get_option( 'wp_headmaster_ga_choice' ) ); ?> /> Classic Tracking Code (ga.js)

                                        </td>
                                    </tr>

                                </tbody>
                            </table>       
                    </div>                 
                </div>
            </div>
        </div>

    
        <div id="wphm_inline" class="group">
            <div class="metabox-holder">
                <div class="postbox">
                    <div id="" class="" style="display: block;">            
                        <h3>Favicon</h3>
                            <table class="form-table">
                                <tbody>
                                    <tr valign="top">
                                    <th scope="row">
                                        <div class="inside">
                                            Upload a Favicon:
                                        </div>
                                    </th>
                                        <td>
                                            <?php   
                                                $ico_check_two = get_option('wp_headmaster_favicon');
                                                if ($ico_check_two !="") { ?>
                                            <img src="<?php echo get_option('wp_headmaster_favicon'); ?>" style="height:16px; width:16px;"><br />
                                            <?php } ?>
                                            <input type="text" name="wp_headmaster_favicon" id="upload_image" value="<?php echo get_option('wp_headmaster_favicon'); ?>" class="regular-text" /><input type='button' class="button-primary" value="Upload/Select .ico" id="upload_image_button"/><br />
                                            <span class="description">Please upload your .ico graphic saved at 32px x 32px (Retina resolution).</span><br />
                                            <span class="description"><a href="http://convertico.com/" target="_blank">Convertico.com</a> - Free online tool for converting PNGs into .ICOs.</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                    </div>                 
                </div>
            </div>
            <div class="metabox-holder">
                <div class="postbox">
                    <div id="" class="" style="display: block;">            
                        <h3>Apple Touch Icon</h3>
                            <table class="form-table">
                                <tbody>
                                    <tr valign="top">
                                        <th scope="row">
                                            <div class="inside">
                                                Upload an Apple Touch Icon:
                                            </div>
                                        </th>
                                        <td>
                                            <?php   
                                                $touchicon_check_two = get_option('wp_headmaster_touch_icon');
                                                if ($touchicon_check_two !="") { ?>
                                                    <div class="touchiconpreview" style="background:url(<?php echo get_option('wp_headmaster_touch_icon'); ?>) no-repeat; background-size: 72px;">
                                                        <?php echo '<img src="' . plugins_url( 'images/apple-reflected-shine.png' , __FILE__ ) . '" class="appleshine" > '; ?>
                                                    </div>
                                            <?php } ?>
                                            <input type="text" name="wp_headmaster_touch_icon" id="wp_headmaster_touch_icon" value="<?php echo get_option('wp_headmaster_touch_icon'); ?>" class="regular-text" /><input type='button' class="button-primary" value="Upload/Select Icon" id="uploadtouchicon"/><br />
                                            <span class="description">Upload a 144x144px PNG graphic for full retina compatibility on all Apple devices.</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                    </div>                 
                </div>
            </div>
        </div>

        <div id="wphm_fonts" class="group">
             <div class="metabox-holder">
                <div class="postbox">
                    <div id="" class="" style="display: block;">               
                        <h3>Google Fonts</h3>
                            <table class="form-table">
                                <tbody>
                                    <tr valign="top">
                                        <th scope="row">
                                            <div class="inside">
                                                Google Fonts:
                                            </div>
                                        </th>
                                        <td>
                                            <code>&#60;link href&#61;&#34;http://fonts.googleapis.com/css?family&#61;</code><input type="text" name="wp_headmaster_google_font" placeholder="Roboto|Roboto+Slab" value="<?php echo get_option('wp_headmaster_google_font'); ?>" /><code>&#34; rel&#61;&#34;stylesheet&#34; type&#61;&#34;text/css&#34;></code><br />                
                                            <span class="description">
                                            To run your chosen <a href="http://www.google.com/fonts/" target="_blank">Google Fonts</a>, please complete the field above, by including the families and weights that you wish to use.</span><br />
                                            <span class="description">You can run multiple fonts by seperating them with pipes. i.e  'Libre+Baskerville|Roboto+Slab:400,700'</span>
                                        </td>
                                    </tr>
                                    
                                </tbody>
                            </table>   
                    </div>                 
                </div>
            </div>
            <div class="metabox-holder">
                <div class="postbox">
                    <div id="" style="display: block;">                      
                         <h3>Typekit</h3>
                            <table class="form-table">
                                <tbody>
                                    <tr valign="top">
                                        <th scope="row">
                                            <div class="inside">
                                                Typekit:
                                            </div>
                                        </th>
                                        <td>
                                            <code>
                                                &lt;script type="text/javascript" src="//use.typekit.net/<input type="text" name="wp_headmaster_typekit" placeholder="XXXXXXX" value="<?php echo get_option('wp_headmaster_typekit'); ?>" />.js"&gt;&lt;/script&gt;
                                            </code>
                                            <br />
                                            <code>
                                                &lt;script type="text/javascript"&gt;try{Typekit.load();}catch(e){}&lt;/script&gt;
                                            </code>
                                            <br />             
                                            <span class="description">
                                                To embed your Adobe <a href="https://typekit.com" target="_blank">Typekit</a> Kit, simply add your Kit's ID into the field above.
                                            </span>
                                        </td>
                                    </tr>
                                    
                                </tbody>
                            </table>   
                    </div>                 
                </div>
            </div>
            <div class="metabox-holder">
                <div class="postbox">
                    <div id="" style="display: block;">                      
                         <h3>Adobe&reg; Edge Web Fonts</h3>
                            <table class="form-table">
                                <tbody>
                                    <tr valign="top">
                                        <th scope="row">
                                            <div class="inside">
                                                Adobe&reg; Edge Web Fonts
                                            </div>
                                        </th>
                                        <td>
                                            <code>
                                                &lt;script src="//use.edgefonts.net/</code><input type="text" name="wp_headmaster_edgewebfonts" placeholder="yesteryear;aubrey;arvo" value="<?php echo get_option('wp_headmaster_edgewebfonts'); ?>" /><code>.js"&gt;&lt;/script&gt;</code>
                                            </code>
                                            <br />             
                                            <span class="description">
                                                To run your chose <a href="http://edgewebfonts.adobe.com" target="_blank">Adobe Edge Web Fonts</a>, please enter the families and weights above. Multiple fonts and weights can be seperated with a semi-colon.
                                            </span>
                                        </td>
                                    </tr>
                                    
                                </tbody>
                            </table>   
                    </div>                 
                </div>
            </div>
        </div>


        <div id="wphm_scripts" class="group">
            <div class="metabox-holder">
                <div class="postbox">
                    <div id="" class="" style="display: block;">               
                        <h3>jQuery</h3>
                            <table class="form-table">
                                <tbody>
                                     <tr valign="top">
                                        <th scope="row" rowspan="3">
                                            <div class="inside">
                                                I would like WP Headmaster to:
                                            </div>
                                        </th>
                                        <td>
                                            <input name="wp_headmaster_jquery_choice" type="radio" value="0" <?php checked( '0', get_option( 'wp_headmaster_jquery_choice' ) ); ?> /> <strong>Have no influence</strong><br />
                                            <span class="description">WP Headmaster will not influence the use of jQuery on your site.</span>
                                        </td>
                                    </tr>
                                    <tr valign="top">
                                    
                                        
                                        <td>
                                            <input name="wp_headmaster_jquery_choice" type="radio" value="1" <?php checked( '1', get_option( 'wp_headmaster_jquery_choice' ) ); ?> /> <strong>Load Wordpress' jQuery (<span class="jqueryversion"></span>)</strong><br />
                                            <span class="description">Wordpress comes preloaded with jQuery <span class="jqueryversion"></span>. Deregister all other jQuery calls and <a href="http://www.creare.co.uk/how-to-enqueue-scripts-stylesheets-to-wordpress-via-a-plugin" target="_blank">enqueue</a> this copy.</span>
                                        <script></script>
                                        </td>
                                    </tr>
                                    <tr valign="top">
                                    
                                        <td>
                                            <input name="wp_headmaster_jquery_choice" type="radio" value="2" <?php checked( '2', get_option( 'wp_headmaster_jquery_choice' ) ); ?> /> <strong>Use Google's API to run jQuery version:</strong> <select name="wp_headmaster_jquery_google_version" id="wp_headmaster_jquery_google_version">
                                                <option <?php if(get_option('wp_headmaster_jquery_google_version')=="2.1.0") echo "selected"; ?> value="2.1.0">2.1.0</option><option <?php if(get_option('wp_headmaster_jquery_google_version')=="2.0.3") echo "selected"; ?> value="2.0.3">2.0.3</option><option <?php if(get_option('wp_headmaster_jquery_google_version')=="2.0.2") echo "selected"; ?> value="2.0.2">2.0.2</option><option <?php if(get_option('wp_headmaster_jquery_google_version')=="2.0.1") echo "selected"; ?> value="2.0.1">2.0.1</option><option <?php if(get_option('wp_headmaster_jquery_google_version')=="2.0.0") echo "selected"; ?> value="2.0.0">2.0.0</option><option <?php if(get_option('wp_headmaster_jquery_google_version')=="1.10.2") echo "selected"; ?> value="1.10.2">1.10.2</option><option <?php if(get_option('wp_headmaster_jquery_google_version')=="1.10.1") echo "selected"; ?> value="1.10.1">1.10.1</option><option <?php if(get_option('wp_headmaster_jquery_google_version')=="1.10.0") echo "selected"; ?> value="1.10.0">1.10.0</option><option <?php if(get_option('wp_headmaster_jquery_google_version')=="1.9.1") echo "selected"; ?> value="1.9.1">1.9.1</option><option <?php if(get_option('wp_headmaster_jquery_google_version')=="1.9.0") echo "selected"; ?> value="1.9.0">1.9.0</option><option <?php if(get_option('wp_headmaster_jquery_google_version')=="1.8.3") echo "selected"; ?> value="1.8.3">1.8.3</option><option <?php if(get_option('wp_headmaster_jquery_google_version')=="1.8.2") echo "selected"; ?> value="1.8.2">1.8.2</option><option <?php if(get_option('wp_headmaster_jquery_google_version')=="1.8.1") echo "selected"; ?> value="1.8.1">1.8.1</option><option <?php if(get_option('wp_headmaster_jquery_google_version')=="1.8.0") echo "selected"; ?> value="1.8.0">1.8.0</option><option <?php if(get_option('wp_headmaster_jquery_google_version')=="1.7.2") echo "selected"; ?> value="1.7.2">1.7.2</option><option <?php if(get_option('wp_headmaster_jquery_google_version')=="1.7.1") echo "selected"; ?> value="1.7.1">1.7.1</option><option <?php if(get_option('wp_headmaster_jquery_google_version')=="1.7.0") echo "selected"; ?> value="1.7.0">1.7.0</option><option <?php if(get_option('wp_headmaster_jquery_google_version')=="1.6.4") echo "selected"; ?> value="1.6.4">1.6.4</option><option <?php if(get_option('wp_headmaster_jquery_google_version')=="1.6.3") echo "selected"; ?> value="1.6.3">1.6.3</option><option <?php if(get_option('wp_headmaster_jquery_google_version')=="1.6.2") echo "selected"; ?> value="1.6.2">1.6.2</option><option <?php if(get_option('wp_headmaster_jquery_google_version')=="1.6.1") echo "selected"; ?> value="1.6.1">1.6.1</option><option <?php if(get_option('wp_headmaster_jquery_google_version')=="1.6.0") echo "selected"; ?> value="1.6.0">1.6.0</option><option <?php if(get_option('wp_headmaster_jquery_google_version')=="1.5.2") echo "selected"; ?> value="1.5.2">1.5.2</option><option <?php if(get_option('wp_headmaster_jquery_google_version')=="1.5.1") echo "selected"; ?> value="1.5.1">1.5.1</option><option <?php if(get_option('wp_headmaster_jquery_google_version')=="1.5.0") echo "selected"; ?> value="1.5.0">1.5.0</option><option <?php if(get_option('wp_headmaster_jquery_google_version')=="1.4.4") echo "selected"; ?> value="1.4.4">1.4.4</option><option <?php if(get_option('wp_headmaster_jquery_google_version')=="1.4.3") echo "selected"; ?> value="1.4.3">1.4.3</option><option <?php if(get_option('wp_headmaster_jquery_google_version')=="1.4.2") echo "selected"; ?> value="1.4.2">1.4.2</option><option <?php if(get_option('wp_headmaster_jquery_google_version')=="1.4.1") echo "selected"; ?> value="1.4.1">1.4.1</option><option <?php if(get_option('wp_headmaster_jquery_google_version')=="1.4.0") echo "selected"; ?> value="1.4.0">1.4.0</option>
                                            </select><br />
                                            <span class="description">Select this choice to deregister the built-in jQuery and externally load a single version (of your choice), from the Google API.</span>  
                                        </td>
                                    </tr>
                                </tbody>
                            </table>   
                    </div>                 
                </div>
            </div>

            <div class="metabox-holder">
                <div class="postbox">
                    <div id="" class="" style="display: block;">               
                        <h3>Script Library</h3>
                            <table class="form-table">
                                <tbody>
                                    <tr valign="top">
                                        <th scope="row" rowspan="2">
                                            <div class="inside">
                                                Click to enable the following:
                                            </div>
                                        </th>
                                        <td>
                                            <label for="wp_headmaster_respondjs">
                                            <input type="checkbox" class="checkbox" id="wp_headmaster_respondjs" name="wp_headmaster_respondjs" value="1" <?php checked( '1', get_option( 'wp_headmaster_respondjs' ) ); ?>> <strong>Respond.js</strong></label><br />
                                            <span class="description"><a href="https://github.com/scottjehl/Respond" target="_blank">Respond.js</a> is a fast &amp; lightweight polyfill for min/max-width CSS3 Media Queries. The file is minified and sourced locally from WP Headmaster (5KB).</span>
                                        </td>
                                    </tr>
                                    <tr valign="top">
                                    
                                        <td>
                                            <label for="wphm_modernizr">
                                            <input type="checkbox" class="checkbox" id="wphm_modernizr" name="wphm_modernizr" value="1" <?php checked( '1', get_option( 'wphm_modernizr' ) ); ?>> <strong>Modernizr</strong></label><br />
                                            <span class="description"><a href="http://modernizr.com/" target="_blank">Modernizr</a> is a feature detection library for HTML5/CSS3. The file is sourced locally from WP Headmaster and is the full minified version (15KB).</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>   
                    </div>                 
                </div>
            </div>
            <div class="metabox-holder">
                <div class="postbox">
                    <div id="" class="" style="display: block;">               
                        <h3>JavaScript</h3>
                            <table class="form-table">
                                <tbody>
                                    <tr valign="top">
                                    <th scope="row">
                                        <div class="inside">
                                            Inline JavaScript:
                                        </div>
                                    </th>
                                        <td>
                                            <span class="description">To add inline JavaScript to your theme's head (sitewide), simply include it within the field below:</span><br /><br />
                                            <code>&lt;script&gt;</code><br />
                                            <textarea name="inline_styles" rows="6" cols="50" id="moderation_keys" class="large-text code"><?php echo get_option('inline_styles'); ?></textarea>
                                            <code>&lt;/script&gt;</code>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>   
                    </div>                 
                </div>
            </div>
           
        </div>
        <div id="wphm_meta" class="group">
            <div class="metabox-holder">
                <div class="postbox">
                    <div id="" class="" style="display: block;">               
                        <h3>Author Meta Tag</h3>
                            <table class="form-table">
                                <tbody>
                                    <tr valign="top">
                                        <th scope="row">
                                            <div class="inside">
                                                Author
                                            </div>
                                        </th>
                                        <td>
                                            <label for="wp_headmaster_meta_author_auto">
                                                <input type="checkbox" class="checkbox" id="wp_headmaster_meta_author_auto" name="wp_headmaster_meta_author_auto" value="1" <?php checked( '1', get_option( 'wp_headmaster_meta_author_auto' ) ); ?>> <strong>Enable</strong>
                                                <code><?php global $current_user; get_currentuserinfo(); ?><?php echo "&lt;meta name=\"author\" content=\"" . $current_user->display_name . "\" /&gt; "; ?></code>
                                            </label>
                                            <br />
                                            <span class="description">Utilise the Meta Author Tag by showing the user(s) who originally published and last edited each pages and posts.</span>
                                        </td>
                                    </tr>
                                    
                                </tbody>
                            </table>   
                    </div>                 
                </div>
            </div>
            <div class="metabox-holder">
                <div class="postbox">
                    <div id="" class="" style="display: block;">               
                        <h3>Format Detection Meta Tag</h3>
                            <table class="form-table">
                                <tbody>
                                    <tr valign="top">
                                        <th scope="row">
                                            <div class="inside">
                                                Format Detection
                                            </div>
                                        </th>
                                        <td>
                                            <label for="wp_headmaster_format_detection">
                                            <input type="checkbox" class="checkbox" id="wp_headmaster_format_detection" name="wp_headmaster_format_detection" value="1" <?php checked( '1', get_option( 'wp_headmaster_format_detection' ) ); ?>> <strong>Enable</strong> <code><?php echo "&lt;meta name=\"format-detection\" content=\"telephone=no\" /&gt;"; ?></code></label><br />
                                            <span class="description">This useful Meta Tag for Apple iOS disables automatic phone number detection in Safari.</span>
                                        </td>
                                    </tr>
                                    
                                </tbody>
                            </table>   
                    </div>                 
                </div>
            </div>
        </div>

 <?php submit_button('Save all WP Headmaster Settings'); ?>
    </form>
</div>

<?php
require('creare-footer.php');  