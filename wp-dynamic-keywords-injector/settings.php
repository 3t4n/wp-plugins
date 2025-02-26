<style type="text/css">
    
/*Style for sidebar*/
div#srx_wpdki_plug_sidebar {
    width: 330px;
    padding-left: 20px;
    float: right;
}
div#srx_wpdki_plug_sidebar h1 {
    font-weight: normal;
    border-bottom: 1px solid #336799;
    padding-bottom: 10px;
    margin: 0;
    color: #336799;
    font-size: 18px;
    margin-top: 6px;
}
/*Style for sidebar end*/

.srx-wpdki-container {width: 100%;max-width: 1300px;}
.srx-wpdki-set td,th{padding: 0.5em;}
.srxheading{margin-bottom: 13px !important;padding: 7px;border-left: 5px solid #00a0d2;}
.switch {position: relative;display: inline-block;width: 65px;height: 22px;}
.switch input {display:none;}
.slider {position: absolute;cursor: pointer;top: 0;left: 0;right: 0;bottom: 0;background-color: #ca2222;webkit-transition: .4s;transition: .4s;}
.slider:before {position: absolute;content: "";height: 15px;width: 15px;left: 4px;bottom: 4px;background-color: white;-webkit-transition: .4s;transition: .4s;}
input:checked + .slider {background-color: #2ab934;}
input:focus + .slider {box-shadow: 0 0 1px #2196F3;}
input:checked + .slider:before {-webkit-transform: translateX(42px);-ms-transform: translateX(42px);transform: translateX(42px);}
.on{display: none;}
.on, .off{color: white;position: absolute;transform: translate(-50%,-50%);top: 50%;left: 50%;font-size: 10px;font-family: Verdana,sans-serif;}
input:checked+ .slider .on{display: block;}
input:checked + .slider .off{display: none;}
.slider.round {border-radius: 34px;}
.slider.round:before {border-radius: 50%;}
.srx-plugin-content h4{margin-bottom: 10px;margin-top: 25px;font-size: 16px;}
.srx-wpdki-container ul li {list-style: inside;}
.srx-wpdki-set table tbody tr td:nth-child(1) {padding-right: 140px;font-size: 14px;width: 250px;}
.srx-wpdki-set table tbody small {display: block;font-size: 10px;line-height: 10px;color: green;}
</style>
<div class="srx-wpdki-container">
    <h1>WP Dynamic Keyword Injector</h1>
    <hr>
    <div class="srx-wpdki-sidebar-content" id="srx_wpdki_plug_sidebar">
        <?php include( plugin_dir_path( __FILE__ ) . '/sidebar.php' ); ?>
    </div>
    <div>
        <form class="srx-wpdki-set" method="POST">
            <h3 class="srxheading">Settings</h3>
            <table>
                <tbody>
                    <tr>
                        <td>
                            <label for="srx-canonical-check">
                                Update Canonical Links
                            </label>
                            <small>"ON" this option to control Canonical Links.</small>
                        </td>
                        <td>
                            <label class="switch">
                                <input type="checkbox" id="srx-canonical-check" name="srx_canonical_check"      
                                <?php if(get_option("srx_canonical_check") == 1){echo 'checked';} ?>
                                >
                                <div class="slider round">
                                    <span class="on">ON</span>
                                    <span class="off">OFF</span>
                                </div>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="srx-internal-check">Update Internal Links</label>
                            <small>"ON" this option to control internal Links in all over page.</small>
                        </td>
                        <td>
                            <label class="switch">
                                <input type="checkbox" id="srx-internal-check" name="srx_internal_check"    <?php if(get_option( "srx_internal_check") == 1){echo 'checked';}?>
                                >
                                <div class="slider round">
                                    <span class="on">ON</span>
                                    <span class="off">OFF</span>
                                </div>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="srx-metaval-check">Update Meta Tag Values</label>
                            <small>"ON" this option to control meta Description and other meta values.</small>
                        </td>
                        <td>
                            <label class="switch">
                                <input type="checkbox" id="srx-metaval-check" name="srx_metaval_check"  <?php if(get_option("srx_metaval_check") == 1) {echo 'checked';} ?>
                                >
                                <div class="slider round">
                                    <span class="on">ON</span>
                                    <span class="off">OFF</span>
                                </div>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="srx-metatitle-check">Update Title</label>
                            <small>"ON" this option to Override SEO plugin's or default page title by adding "?title=" perameter in Url.</small>
                        </td>
                        <td>    
                            <label class="switch">
                                <input type="checkbox" id="srx-metatitle-check" name="srx-metatitle-check" 
                                    <?php if(get_option("srx-metatitle-check") == 1){echo 'checked';}?>
                                >
                                <div class="slider round">
                                    <span class="on">ON</span>
                                    <span class="off">OFF</span>
                                </div>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="srx-whitelist-kwd">Enable Whitelist Keywords:</label>
                            <small>"ON" this option to control Replace Keywords in Title and Page Title. </small>
                        </td>
                        <td>    
                            <label class="switch">
                                <input type="checkbox" id="srx-whitelist-kwd" name="srx-whitelist-kwd"  
                                    <?php if(get_option("srx-whitelist-kwd") == 1){echo 'checked';}?>
                                >
                                <div class="slider round">
                                    <span class="on">ON</span>
                                    <span class="off">OFF</span>
                                </div>
                            </label>
                        </td>
                    </tr>
                    <?php
                        if ( get_option("srx-whitelist-kwd") == 1 ) {
                    ?> 
                            <tr>
                                <td>
                                    <label for="srx-whitelist-kwd-box">Write Whitelist Keywords:</label>
                                </td>
                                <td>    
                                    <textarea rows="4" cols="50" name="srx-whitelist-kwd-box"><?php echo esc_html(get_option("srx-whitelist-kwd-box")); ?></textarea>
                                    <?php if (get_option("srx-whitelist-kwd-box") == '') { ?>
                                        <p style="color:red;margin:0;font-size:12px;">Please write comma separated Title & Page Title keywords!</p>
                                    <?php } ?>
                                </td>
                            </tr>
                    <?php 
                        }
                    ?>
                    <tr><td>
                        <button type="submit" name="srx_wpdki_upsettings" class="button button-primary">Update Settings</button>
                        <?php wp_nonce_field('wpdki_free_setting_submit','wpdki_free_setting_nonce_field'); ?>
                    </td></tr>

                </tbody>
            </table>
        </form>
    </div>
    <br>
    <div class="srx-plugin-content">
        <h3 class="srxheading">Usage</h3>
        <p><b>WP Dynamic Keywords Injector</b> inserts the keyword from <b>browser's address bar</b>, if not given in URL then the <b>spintax</b> will be placed and if both not found then the <b>default keyword</b> will be placed. Also this plugin will change the <b>title tag</b> and <b>page title</b> if they are given in <b>browser’s address bar</b>.</p>

        <p>These all query string parameters can be used with combinations as well. The sample link is given below.<br>
        http://example.tld/sample-page/?dyn_keyword=your_desired_keywords&page_title=your_desired_page_title&title=your_desired_meta_title</p>
        <ol>
            <li><b>dyn_keyword=</b> param used to inject keywords from URL</li>
            <li><b>page_title=</b> param used to inject page title from URL</li>
            <li><b>title=</b> param used to inject meta title from URL</li>
        </ol>
        <h3 class="srxheading">New Updates</h3>
        <h4 style="color: green;">- Compatibility</h4>
        <p>Shortcode <b>[seerox_wpdki_dyn_keywords default="Default text"]</b> Compatible with:</p>
        <ul>
            <li>Yoast SEO Plugin</li>
            <li>All in One SEO Pack Plugin</li>
        </ul>
        <hr>
        <h4>- Whitelist Keywords</h4>
        <p><b>WPDKI</b> brings a new feature, <b>Whitelisting Keywords functionality</b> for Title and Page Title. In this feature admin can control to show <b>Replace Keywords</b> in Title and Page Title. If this functionality is turned <b>on</b> Plugin will allow to display only Keywords which are <b>whitelisted</b> by admin. If this functionality is turned <b>off</b> then those keywords will show in Title and Page Title which you put in Page URL as parameter.If this functionality is turned <b>on</b> and no keyword is define in Whitelist Keyword box then <b>Default</b> Title and Page Title will Display.</p>
        <h4>- Search Keyword</h4>
        <span><b>WPDKI</b> providing you ability to define search keyword "<b>search_keyword</b>" in Page URL as parameter which you can then use in <b>meta title</b>, <b>page/post title</b> and <b>content</b> as "<b>SEARCH_KEYWORD</b>". An example is given below for your better understanding.<br></span>
        <p>http://example.tld/sample-page/?<b>search_keyword</b>=Search+Keyword
        This keyword can be use in title, page_title and in default value of dyn_keyword shortcode like.<br>
        http://example.tld/sample-page/?title=Its+<b>SEARCH_KEYWORD</b>+title&page_title=<b>SEARCH_KEYWORD</b>+Heading&<b>search_keyword</b>=Search+Keyword</p>
        <p>[seerox_wpdki_dyn_keywords default="This <b>SEARCH_KEYWORD</b> is Draft."]</p>
        <h4>- More Controls</h4>
        <span>Now you can Turn <b>On/Off</b> keywords replacement on given below features.</span>
        <ul>
            <li>Canonical Links</li>
            <li>Internal Links</li>
            <li>Meta Tag Values</li>
            <li>Page Title Meta value</li>
            <li>Whitelist Keywords for Title and Page Title.</li>
        </ul>
    </div>
</div>