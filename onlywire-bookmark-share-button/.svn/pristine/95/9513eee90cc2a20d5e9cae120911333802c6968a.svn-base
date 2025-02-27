<?php
/*
  Plugin Name: OnlyWire for WordPress [OFFICIAL]
  Plugin URI: http://www.onlywire.com/
  Description: Instantly post content from your website and blog to social media.
  Version: 2.0.0
  Author: OnlyWire Engineering
  Author URI: https://www.onlywire.com/
*/

define( "SITE_NAME" , "OnlyWire");
define( "SITE_URL" , "https://onlywire.com");

include ("ow_api.php");

/**
 * Post hooks
 */
register_activation_hook(__FILE__, 'ow_activate');
add_filter('plugin_action_links', 'ow_settings_link', 10, 2);

add_action('admin_menu', "ow_admin_init");
add_action('publish_post', 'ow_post', 10, 2);
//add_action('future_post', 'ow_post');

/**
 * Called when the plugin is first activated. This instantiates the options
 * entries in the WP DB that will be used by the plugin
 */
function ow_activate()
{
    add_option('ow_username');
    add_option('ow_password');
    add_option('ow_autopost', 'on');
    add_option('ow_service_logins');
}

/**
 * Initializes the settings page, and the meta box. The settings page is the main way to
 * control the plugin. The metabox appears when you're making a new post, giving you the
 * option to post to OnlyWire directly from the new post screen.
 */
function ow_admin_init()
{
    add_meta_box("onlywire-post", "OnlyWire Settings", "ow_display_metabox", "post", "normal", "high");
    add_options_page('OnlyWire Settings', 'OnlyWire Settings', 8, 'onlywireoptions', 'ow_display_settings');
}

/**
 * Adds an action link to the Plugins page
 */
function ow_settings_link($links, $plugin_file)
{
    static $plugin;

    if (!isset($plugin)) $plugin = plugin_basename(__FILE__);

    if ($plugin_file == $plugin) {
        $settings_link = '<a href="options-general.php?page=onlywireoptions">Settings</a>';
        $links = array_merge(array($settings_link), $links); // before other links
    }

    return $links;
}

/**
 * Sends this post to OnlyWire
 */
function ow_post($ID, $post)
{
    global $wpdb;

    //Get the correct post ID if revision.
    if ($post->post_type == 'revision')
    {
        $ID = $post->post_parent;
    }

    if (isset($_POST['ow_post']) && $_POST['ow_post'] == 'on') {
        // the checkbox is selected, let's post to onlywire with user credentials
        $username = get_option('ow_username');
        $password = get_option('ow_password');

        if ($username && $password) {
            $data['url'] = urlencode(get_permalink($postID));
            $data['title'] = trim(urlencode($post->post_title));
            $data['tags'] = "";
            $data['scheduled'] = urlencode(get_post_time('c', true, $post));

            if (strlen(strip_tags($post->post_content)) > 250) {
                $data['description'] = urlencode(substr(strip_tags($post->post_content), 0, 250)."...");
            } else {
                $data['description'] = urlencode(strip_tags($post->post_content));
            }


            if (get_option('ow_service_logins') != false) {
                $data['networks'] = trim(get_option('ow_service_logins'));
            }

            if(isset($data['networks']) && $data['networks'] != '') {
                createPost($username, $password, $data);
            }
        }
    }
}

/**
 * Renders the settings page
 */
function ow_display_settings()
{
    if (get_option('ow_username') != "" && get_option('ow_password') != "") {
        $userInfo = getUser(get_option('ow_username'), get_option('ow_password'));
        $serviceLogins = getServiceLogins(get_option('ow_username'), get_option('ow_password'));
    } else {
        $userInfo = array("success", false);
        $serviceLogins = array("networks", array());
    }

    $serviceIds = explode(",", get_option('ow_service_logins'));

    wp_register_style('ow', plugins_url('settings.css',__FILE__ ));
    wp_enqueue_style('ow');

    ?>
    <script>
        function auth() {
            var ow_username = document.getElementById("ow_username").value;
            var ow_password = document.getElementById("ow_password").value;
            var url = "<?php echo site_url() ?>/wp-content/plugins/onlywire-bookmark-share-button/ow_auth.php?auth_user=" + encodeURIComponent(ow_username.trim()) + "&auth_pw=" + encodeURIComponent(ow_password.trim());
            var xmlhttp = new XMLHttpRequest();

            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    var data = JSON.parse(xmlhttp.responseText);
                    if (data.success === true) {

                        var comma_seperated_logins = [];

                        document.querySelectorAll("input[name='service_logins[]']:checked").forEach(function(el) {
                            comma_seperated_logins.push(el.value);
                        });

                        document.getElementById("ow_service_logins").setAttribute('value', comma_seperated_logins);

                        console.log(document.getElementById("ow-form"));

                        document.getElementById("ow-form").submit();
                        return true;
                    } else {
                        alert(data.error_message);
                        return false;
                    }
                }
            }

            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }

        function selectAll() {
            document.querySelectorAll("input[name='service_logins[]']").forEach(function(el) {
                el.checked = true;
            });
        }

        function selectNone() {
            document.querySelectorAll("input[name='service_logins[]']").forEach(function(el) {
                el.checked = false;
            });
        }
    </script>

      <a href="<?php echo SITE_URL; ?>" target="_blank"><div class="banner"><img src="<?php echo plugins_url('/OnlyWire-logo.svg', __FILE__); ?>"class="ow-logo"/></div></a>

    <form id="ow-form" method="POST" action="options.php" onSubmit="auth(); return false;">
        <?php wp_nonce_field('update-options'); ?> 
        <input type="hidden" name="ow_service_logins" id="ow_service_logins" value="" />
        <input type="hidden" name="action" value="update"/>
        <input type="hidden" name="page_options" value="ow_username,ow_password,ow_autopost,ow_service_logins"/> 

    <article>
        <section>
            <h1>Settings</h1>
        </section>

        <section class="ow-section flex-row">
            <a class="inverted-blue-button" href="<?php echo SITE_URL; ?>/dashboard/posts" target="_blank">OnlyWire Dashboard</a>
            <a class="inverted-blue-button" href="<?php echo SITE_URL; ?>/networks" target="_blank">Manage Networks</a>
            <a class="inverted-blue-button" href="<?php echo SITE_URL; ?>/support/contact" target="_blank">Support</a>
        </section>

        <?php if($userInfo->success) { ?>
        <section class="ow-section flex-row usage">
            <h2>Submission Usage</h2>
            <div class="progress-frame">
                <div class="progress-bar" style="width: <?php echo ($userInfo->submission_used / $userInfo->submission_limit) * 100 ?>%;"></div>
            </div>
            <span class="submission-info"><?php echo $userInfo->submission_used ?> / <?php echo $userInfo->submission_limit ?></span>
        </section>
        <?php } ?>

        <section>
            <h2>Account Information</h2>

            <?php if(!$userInfo->success) { ?>
                <div class="status-prompt">Please enter your OnlyWire Username/Password.</div>
            <?php } else if($userInfo->success && $userInfo->account_status != 1) { ?>
                <div class="status-prompt">Account Status: <?php echo $userInfo->account_status_desc; ?> (<a class="ow-link" href="<?php echo SITE_URL; ?>/user/profile" target="_blank">Update</a>)</div>
            <?php } ?>

            <div class="flex-column">
                <div class="flex-row">
                    <h4>OnlyWire Username:</h4>
                    <input id="ow_username" type="text" name="ow_username" placeholder="Username" value="<?php echo get_option('ow_username'); ?>"/>
                </div>

                <div class="flex-row">
                    <h4>OnlyWire Password:</h4>
                    <input  id="ow_password" type="password" name="ow_password" placeholder="Password" value="<?php echo get_option('ow_password'); ?>"/>
                </div>
            </div>

        </section>

        <section class="flex-row auto-post-section">
            <div class="flex-column">
              <h4 class="auto-post-heading">Auto Post All Articles:</h4>
              <small class="auto-post-copy">Post all newly created articles to the selected Networks.</small>
              <input type="submit" name="submit_1" class="blue-button" value="Save Changes"/>
            </div>

            <?php if(get_option('ow_autopost') == 'on') { ?>
                <input id="ow_autopost" type="checkbox" name="ow_autopost" checked class="auto-post-checkbox"/>
            <?php } else { ?>
                <input id="ow_autopost" type="checkbox" name="ow_autopost" class="auto-post-checkbox"/>
            <?php } ?>

        </section>

    </article>

    <article>
        <section class="flex-row networks-heading">
            <h1 class="networks-title">Networks</h1>
            <a class="inverted-orange-button" href="<?php echo SITE_URL; ?>/networks" target="_blank">Manage</a>
        </section>

        <?php if(count($serviceLogins->networks) > 0) { ?>
            <a class="select-all" href="javascript: void(0);" onclick="selectAll();">Select All</a>
            <a href="javascript: void(0);" onclick="selectNone();">Deselect All</a>

            <div class="networks-container flex-row">
                <?php foreach ($serviceLogins->networks as $network) { ?>

                    <label for="<?php echo $network->id; ?>" class="network-item flex-row">
                        <div class="flex-row profile">
                            <input 
                                class="profile-checkbox"
                                type="checkbox" 
                                id="<?php echo $network->id; ?>" 
                                name="service_logins[]"
                                value="<?php echo $network->id; ?>"
                                <?php if(in_array($network->id, $serviceIds)) { echo " checked "; } ?>
                            />  

                            <div class="flex-column">
                                <strong class="profile-network"><?php echo $network->name ?></strong>
                                <small class="profile-name"><?php echo $network->description; ?></small>
                            </div>
                        </div>

                         <?php if ($network->status != NULL) { ?>
                            <span class="incorrect-login"> 
                                Reauthentication required. <a href="<?php echo SITE_URL; ?>/networks/profiles" target="_blank" class="ow-link">Correct it</a> 
                            </span>
                        <?php } ?>

                        <img for="<?php echo $network->id; ?>" src="<?php echo $network->icon; ?>" class="network-image"/>

                    </label>

                <?php } ?> 
            </div>

            <input type="submit" name="submit_2" class="blue-button" value="Save Changes" id="submit_2"/>


        <?php } elseif (!get_option('ow_username')) { ?>
            <small class="no-networks">
                Please add your username and password above to see your networks
            </small>
        <?php } else { ?>
            <div class="no-networks">
                You do not have any networks setup. <br/>
                <a href="<?php echo SITE_URL; ?>/networks" class="button-primary" target="_blank">Add Network</a>
            </div>

        <?php } ?>
    </article>
    
    <article>
        <section>
            <h1>About Us</h1>
        </section>

        <p class="about-us-copy"><a href="<?php echo SITE_URL; ?>" target="_blank">OnlyWire</a> is a fast, secure automation tool to post content to the top Social Media Networks like Facebook, Twitter, and Google+.
        Use OnlyWire to save time, automate your website's content, and engage your followers.</p>

        <strong class="about-us-subheading">Who uses OnlyWire?</strong>
        <p class="about-us-copy no-top">Bloggers, Content Providers, SEO Professionals, Advertisers, and Corporate Marketing Managers use OnlyWire to submit millions of posts
        a day. Social Media Professionals use OnlyWire to launch, update, and analyza social media campaigns.
        <br>
        OnlyWire, LLC has offices in Chicago, IL and Folsom, CA.</p>
    </article>

    </form>
    <?php
}

/**
 * Code for the meta box.
 * the post of this goes to the function ow_post()
 */
function ow_display_metabox($post)
{
    $ow_post_type = $post->post_status;

    $networks = getServiceLogins(get_option('ow_username'), get_option('ow_password'));
    $userInfo = getUser(get_option('ow_username'), get_option('ow_password'));

    $serviceLogins = get_option('ow_service_logins');
    
    if ($userInfo != "") {
        if ($userInfo->account_status != 1) {
            ?>
            <div>
                OnlyWire Account Status: <?php echo $userInfo->account_status_desc; ?> (<a href="<?php echo SITE_URL; ?>/user/profile" target="_blank">Update</a>)
            </div>
            <?php
        } else {
            if (count($networks->networks) > 0) {
                if(!isset($serviceLogins) || $serviceLogins == '') {
                    ?>
                    <div class="no-networks"> 
                        You do not have any networks selected. Please select the networks you want to post to in settings. <br/>
                    </div>
                    <?php
                
                //Check to see if it's a revision ("auto-draft" or "draft" return type is a new post)
                } else if (($ow_post_type != 'auto-draft') && ($ow_post_type != 'draft')) { ?>
                    <label for="ow_post">
                        <input type="checkbox" id="ow_post" name="ow_post" /> Post this revision to OnlyWire	
                    </label>

                <?php } else { ?>	    
                    <label for="ow_post">
                        <input type="checkbox" <?php echo get_option('ow_autopost') == 'on' ? 'checked' : ''; ?> id="ow_post" name="ow_post" /> Post this to OnlyWire	
                    </label>
                <?php }
            }
            else {
                ?>
                <div class="no-networks"> 
                    You do not have any networks setup. <br/>
                    <a href="<?php echo SITE_URL; ?>/networks" class="button-primary" target="_blank">Add Network</a>
                </div>
                <?php
            }
        }
    } else { ?>
        <div>Unable to load user. Please check your credentials.</div>
        
    <?php }
}
?>
