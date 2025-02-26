<?php
$apiKey         = get_option('adeng_api_key');
$apiKeyVerified = get_option('adeng_api_key_verified');
$affiliateId    = get_option('adeng_affiliate_id');
?>
<div class="wrap">

    <h2>Adknowledge Engage&trade; Settings</h2>

    <div id="poststuff" class="metabox-holder has-right-sidebar">

        <div id="side-info-column" class="inner-sidebar">

            <div class="postbox">
                <?php
                if (ini_get('allow_url_fopen')) {
                    echo file_get_contents(ADENG_SIDEBAR_URL);
                } elseif (function_exists('curl_init')) {
                    $ch = curl_init(ADENG_SIDEBAR_URL);
                    curl_setopt($ch, CURLOPT_HEADER, false);
                    @curl_exec($ch);
                    curl_close($ch);
                }
                ?>
            </div>

        </div>

        <div id="post-body">
            
            <div id="post-body-content">

                <div class="postbox">
                    <h3 class="hndle">API Status</h3>

                    <?php if (! $apiKey): ?>
                    <div id="apierror" class="error settings-error"><p>Please enter your API Key to use this service</p></div>
                    <?php elseif (! $apiKeyVerified): ?>

                    <?php endif; ?>

                    <?php if (isset($_GET['saved'])): ?>
                    <div class="updated settings-error"><p>Settings updated!</p></div>
                    <?php endif; ?>
                    <div id="adeng_msg"></div>

                    <table cellpadding="0" cellspacing="8">
                        <tbody>
                            <tr valign="top">
                                <th scope="row" align="left" valign="middle">Plugin Status: &nbsp;</th>
                                <td id="plg_status" valign="middle">
                                <?php
                                if (! $apiKey) {
                                    echo 'No API Key';
                                } elseif ($apiKey && ! $apiKeyVerified) {
                                    echo 'Unverified API Key';
                                } elseif ($apiKeyVerified) {
                                    echo 'Verified API Key';
                                }
                                ?>
                                </td>
                            </tr>
                            <?php if ($apiKeyVerified): ?>
                            <tr valign="top">
                                <th scope="row" align="left" valign="middle"><label for="adeng_aff">Affiliate ID:</label></th>
                                <td valign="middle"><input type="text" name="affiliate_id" id="adeng_aff" disabled="disabled" value="<?php echo get_option('adeng_affiliate_id'); ?>" /></td>
                            </tr>
                            <tr valign="top">
                                <th scope="row" align="left" valign="middle"><label for="adeng_api">API Key: &nbsp;</label></th>
                                <td valign="middle">
                                    <input type="text" name="api_key" id="adeng_api" disabled="disabled" class="regular-text" value="<?php echo get_option('adeng_api_key'); ?>" />
                                </td>
                            </tr>
                            <tr valign="top">
                                <td colspan="2" align="left" id="api_btn"><input type="button" class="button-secondary" value="Edit API Key" id="btnEdit" /></td>
                            </tr>
                            <?php else: ?>
                            <tr valign="top">
                                <th scope="row" align="left" valign="middle"><label for="adeng_aff">Affiliate ID:</label></th>
                                <td valign="middle"><input type="text" name="affiliate_id" id="adeng_aff" value="<?php echo get_option('adeng_affiliate_id'); ?>" /></td>
                            </tr>
                            <tr valign="top">
                                <th scope="row" align="left" valign="middle"><label for="cre_api">API Key: &nbsp;</label></th>
                                <td valign="middle">
                                    <input type="text" name="api_key" id="adeng_api" class="regular-text" value="<?php echo get_option('adeng_api_key'); ?>" />
                                </td>
                            </tr>
                            <tr valign="top">
                                <td colspan="2" align="left" id="api_btn"><input type="button" class="button-primary" value="Verify API Key" id="btnVerify" /></td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                
                <form action="admin-post.php" method="post">
                <div class="postbox">
                    <input type="hidden" name="action" value="adeng_update_settings" />
                    
                    <h3>Display Settings</h3>
                    
                    <ul class="inside">
                        <li><strong>Placement Settings</strong></li>
                        <?php 
                        $displayTop     = get_option('adeng_display_top', 0); 
                        $displayBottom  = get_option('adeng_display_bottom', 0); 
                        ?>
                        
                        <li>
                            <label for="display_top">
                                <input type="checkbox" name="top" value="1" id="display_top" <?php echo ($displayTop == 1) ? 'checked="checked"' : ''; ?> /> Top of Content
                            </label>
                        </li>
                        
                        <li>
                            <label for="display_bottom">
                                <input type="checkbox" name="bottom" value="1" id="display_bottom" <?php echo ($displayBottom == 1) ? 'checked="checked"' : ''; ?> /> Bottom of Content
                            </label>
                        </li>
                        
                        <li>
                            <label for="display_manual">
                                <small><strong>Tip:</strong> Show related content anywhere by using <code>&lt;?php if (function_exists('adk_engage')) adk_engage(); ?&gt;</code> in your theme.</small>
                            </label>
                        </li>
                        
                        <li><strong>Display recommendations on the following pages:</strong></li>
                        <?php $display = (array)get_option('adeng_display'); ?>
                        <li>
                            <label for="display_front">
                                <input type="checkbox" name="display[front]" value="1" id="display_front" <?php echo (in_array('front', $display)) ? 'checked="checked"' : ''; ?> /> Front Page
                            </label>
                        </li>
                        
                        <li>
                            <label for="display_home">
                                <input type="checkbox" name="display[home]" value="1" id="display_home" <?php echo (in_array('home', $display)) ? 'checked="checked"' : ''; ?> /> Main Page
                            </label>
                        </li>
                        
                        <li>
                            <label for="display_single">
                                <input type="checkbox" name="display[single]" value="1" id="display_single" <?php echo (in_array('single', $display)) ? 'checked="checked"' : ''; ?> /> Single Posts
                            </label>
                        </li>
                        
                        <li>
                            <label for="display_page">
                                <input type="checkbox" name="display[page]" value="1" id="display_page" <?php echo (in_array('page', $display)) ? 'checked="checked"' : ''; ?> /> Pages
                            </label>
                        </li>
                        
                        <li>
                            <label for="all_archives">
                                <input type="checkbox" name="" value="1" id="all_archives" /> All Archives
                            </label>
                            <ul style="margin-left: 20px;">
                                <li>
                                    <label for="display_category">
                                        <input type="checkbox" class="archive" name="display[category]" value="1" id="display_category" <?php echo (in_array('category', $display)) ? 'checked="checked"' : ''; ?> /> 
                                    </label>
                                </li>
                                
                                <li>
                                    <label for="display_tag">
                                        <input type="checkbox" class="archive" name="display[tag]" value="1" id="display_tag" <?php echo (in_array('tag', $display)) ? 'checked="checked"' : ''; ?> /> 
                                    </label>
                                </li>
                                
                                <li>
                                    <label for="display_author">
                                        <input type="checkbox" class="archive" name="display[author]" value="1" id="display_author" <?php echo (in_array('author', $display)) ? 'checked="checked"' : ''; ?> /> 
                                    </label>
                                </li>
                                
                                <li>
                                    <label for="display_date">
                                        <input type="checkbox" class="archive" name="display[date]" value="1" id="display_date" <?php echo (in_array('date', $display)) ? 'checked="checked"' : ''; ?> /> Date Archives
                                    </label>
                                </li>
                            </ul>
                        </li>
                        
                        <li>
                            <label for="display_search">
                                <input type="checkbox" name="display[search]" value="1" id="display_search" <?php echo (in_array('search', $display)) ? 'checked="checked"' : ''; ?> /> Search Results
                            </label>
                        </li>
                        
                        <li>
                            <label for="display_attachments">
                                <input type="checkbox" name="display[attachments]" value="1" id="display_attachments" <?php echo (in_array('attachments', $display)) ? 'checked="checked"' : ''; ?> /> Attachment Pages
                            </label>
                        </li>
                        
                        <li>&nbsp;</li>
                        
                        <li>
                            <a href="#" class="button toggleCss">Click to edit CSS</a><br /><br />
                            <textarea name="css" id="cre_css" rows="15" cols="50" style="width: 90%; display: none;"><?php echo get_option('adeng_inline_css'); ?></textarea>
                        </li>
                        
                        <li class="submit">
                            <input type="submit" class="button-primary" id="submit" value="Save Changes" name="Submit" />
                        </li>
                    </ul>
                </div>
                
                <div class="postbox">
                    
                    <h3>Exclusion Settings</h3>
                    <?php $excluded   = (array)get_option('adeng_exclude'); ?>
                    <div id="tabs" class="adeng_tab">
                        <ul class="adeng_tabs">
                            <li class="active"><a href="#tcategories">Categories</a></li>
                            <li><a href="#ttags">Tags</a></li>
                            <li><a href="#tusers">Users</a></li>
                        </ul>
                        <div class="adeng_body" id="tcategories">
                            <?php
                            $cats   = get_categories();
                            $len    = count($cats);
                            $col    = ceil($len / 4);
                            $i      = 0;
                            $last   = 0;
                            
                            for ($x = 0; $x < 4; $x++):
                                echo '<ul style="float: left; width: 24%;">';
                                for ($i = 0; $i <= $col; $i++):
                                    if (isset($cats[$last])) {
                                        $checked = '';
                                        if (isset($excluded['categories']) && in_array($cats[$last]->term_id, $excluded['categories'])) {
                                            $checked = 'checked="checked"';
                                        }
                                        echo '<li><label><input type="checkbox" '. $checked .' name="exclude[category][]" value="'. $cats[$last]->term_id .'" /> '. $cats[$last]->name .'</label></li>';
                                    }
                                    
                                    $last++;
                                endfor;
                                echo '</ul>';
                            endfor;
                            ?>
                            <div class="clear"></div>
                        </div>
                        <div class="adeng_body" id="ttags">
                            <?php
                            $tags   = get_tags('hide_empty=false&hierarchical=false');
                            $len    = count($tags);
                            $col    = ceil($len / 4);
                            $i      = 0;
                            $last   = 0;
                            
                            for ($x = 0; $x < 4; $x++):
                                echo '<ul style="float: left; width: 24%;">';
                                for ($i = 0; $i <= $col; $i++):
                                    if (isset($tags[$last])) {
                                        $checked = '';
                                        if (isset($excluded['tags']) && in_array($tags[$last]->term_id, $excluded['tags'])) {
                                            $checked = 'checked="checked"';
                                        }
                                        echo '<li><label><input type="checkbox" '. $checked .' name="exclude[tags][]" value="'. $tags[$last]->term_id .'" /> '. $tags[$last]->name .'</label></li>';
                                    }
                                    
                                    $last++;
                                endfor;
                                echo '</ul>';
                            endfor;
                            ?>
                            <div class="clear"></div>
                        </div>
                        <div class="adeng_body" id="tusers">
                            <?php
                            if (function_exists('get_users')) {
                                $users  = get_users('orderby=nicename');
                            } else {
                                $users = $wpdb->get_results("SELECT * FROM `". $wpdb->prefix ."users` ORDER BY `user_nicename` ASC");
                            }
                            
                            $len    = count($users);
                            $col    = ceil($len / 4);
                            $i      = 0;
                            $last   = 0;
                            
                            for ($x = 0; $x < 4; $x++):
                                echo '<ul style="float: left; width: 24%;">';
                                for ($i = 0; $i <= $col; $i++):
                                    if (isset($users[$last])) {
                                        $checked = '';
                                        if (isset($excluded['users']) && in_array($users[$last]->ID, $excluded['users'])) {
                                            $checked = 'checked="checked"';
                                        }
                                        echo '<li><label><input type="checkbox" '. $checked .' name="exclude[users][]" value="'. $users[$last]->ID .'" /> '. $users[$last]->user_nicename .'</label></li>';
                                    }
                                    
                                    $last++;
                                endfor;
                                echo '</ul>';
                            endfor;
                            ?>
                            <div class="clear"></div>
                        </div>
                    </div>
                    
                    <div class="submit">
                        <input type="submit" class="button-primary" id="submit" value="Save Changes" name="Submit" />
                    </div>
                </div>
                
                </form>
            </div>

        </div>

    </div>

</div>

<script type="text/javascript">
jQuery("#btnVerify").click(function() {
    verifyApi();
});

jQuery("#btnEdit").click(function() {
    editApi();
});

function verifyApi() {
    jQuery.post(ajaxurl, {action: 'adeng_verify_api', api_key: jQuery("#adeng_api").val(), affiliate_id: jQuery("#adeng_aff").val()}, function(resp) {
        if (typeof jQuery.parseJSON == 'undefined') {
            data = JSON.parse(resp);
        } else {
            data = jQuery.parseJSON(resp);
        }
        
        
        if (data.ack == 'OK') {
            jQuery("#adeng_api")
                .attr("disabled", true)
            jQuery("#adeng_aff")
                .attr("disabled", true);
            jQuery("#api_btn").html('<input type="button" onclick="editApi();" value="Edit API Key" class="button-secondary" />');
            jQuery("#adeng_msg")
                .addClass("updated")
                .html("<p>API Key verified!</p>");
            jQuery("#plg_status").html("Verified API Key");
            jQuery("#apierror").hide();
        } else {
            jQuery("#adeng_msg")
                .addClass("error")
                .removeClass("updated")
                .html("<p>"+ data.msg +"</p>");
            jQuery("#plg_status").html("Unverified API Key");
        }

    });
}

function editApi() {
    jQuery("#adeng_api").attr("disabled", false);
    jQuery("#adeng_aff").attr("disabled", false);
    
    jQuery("#api_btn")
        .html('<input type="button" onclick="verifyApi();" value="Verify API Key" class="button-primary" />');
        
    jQuery("#adeng_api")
        .focus()
        .select();
}

jQuery("#tabs").tabs();

jQuery(".toggleCss").click(function(e) {
    e.preventDefault();
    jQuery("#cre_css").slideToggle();
});

jQuery("#all_archives").click(function() {
    if (jQuery(this).is(":checked")) {
        jQuery(".archive").attr("checked", true);
    } else {
        jQuery(".archive").attr("checked", false);
    }
});

jQuery(".archive").click(function() {
    if (! jQuery(this).is(":checked")) {
        jQuery("#all_archives").attr("checked", false);
    } else {
        var num = jQuery(".archive").length;
        var sel = 0;
        
        jQuery(".archive").each(function() {
            if (jQuery(this).is(":checked")) {
                sel++;
            }
        });
        
        if (sel == num) {
            jQuery("#all_archives").attr("checked", true);
        }
    }
});

var num = jQuery(".archive").length;
var sel = 0;

jQuery(".archive").each(function() {
    if (jQuery(this).is(":checked")) {
        sel++;
    }
});

if (sel == num) {
    jQuery("#all_archives").attr("checked", true);
}
</script>