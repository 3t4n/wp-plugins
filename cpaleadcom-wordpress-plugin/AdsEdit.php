<?php
    $banner = getBanner($_GET['id']);
    $ads_banners = getBanners();
?>

<script type="text/javascript" src="<?php echo plugin_dir_url(__FILE__) ?>3rd/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo plugin_dir_url(__FILE__) ?>3rd/ace/ace.js" type="text/javascript" charset="utf-8"></script>
<link href="<?php echo plugin_dir_url(__FILE__) ?>3rd/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
<link href="<?php echo plugin_dir_url(__FILE__) ?>css/style.css" rel="stylesheet"/>

<div class="container-fluid padded">

    <div class="row-fluid">
        <div class="span12">
            <div class="box">
                <div class="box-header">
                    <span class="title">Edit banner</span>
                    <?php if($pub_id > 0) { ?>
                        <span class="title_right">Publisher ID: <b><i class="glyphicon glyphicon-user"></i> <?php echo $pub_id; ?></b> <a href="admin.php?page=set_pub_id">[Change]</a></span>
                    <?php } ?>
                </div>
                <div class="box-content padded jumbotron">

                    <?php if($banner->id > 0 ) { ?>

                        <?php if($banner->type < 5 || $banner->type > 6) { ?>
                            <?php if($banner->ads_tool == 1 && $banner->type != 7 && $banner->type != 8) { ?>
                                <h5>Edit banner size:</h5>
                            <?php } ?>
                            <div class="custom_banner_area">
                                <?php if($banner->ads_tool == 1) { ?>
                                    <form action="<?php echo BANNERS_URL; ?>?preview=1&wp=1&pub_id=<?php echo $pub_id; ?>&token=<?php echo $token; ?>" method="POST" target="_newtab" style="display: inline;" id="preview_form">
                                        <input type="hidden" name="type" id="type" value="<?php echo $banner->type; ?>">
                                        <input type="hidden" name="id" id="id" value="<?php echo $_GET['id']; ?>">
                                        <input type="hidden" name="preview_html" id="preview_html">
                                        <input type="hidden" name="preview_css" id="preview_css">
                                        <input type="hidden" name="preview_target" id="preview_target">
                                        <input type="hidden" name="preview_skip_button" id="preview_skip_button">
                                        <input type="hidden" name="preview_timer" id="preview_timer">
                                        <input type="hidden" name="preview_locker_name" id="preview_locker_name">
                                        <input type="hidden" name="preview_overlay_value" id="preview_overlay_value">
                                        <input type="hidden" name="preview_overlay" id="preview_overlay" value="<?php echo $banner->overlay; ?>">
                                        <input type="hidden" name="preview_instructions_before" id="preview_instructions_before" value="<?php echo $banner->instructions_before; ?>">
                                        <input type="hidden" name="preview_instructions_after" id="preview_instructions_after" value="<?php echo $banner->instructions_after; ?>">
                                        <input type="hidden" name="preview_window_width" id="preview_window_width">
                                        <input type="hidden" name="preview_window_height" id="preview_window_height">

                                        <?php if($banner->ads_tool == 1) { ?>
                                            <?php if($banner->type != 8) { ?>
                                                <?php if($banner->type == 7) { ?>
                                                    <input type="text" class="form-control" placeholder="Width size" name="width" id="width" style="width: 437px" value="<?= $banner->width; ?>">
                                                    <input type="hidden" name="w_type" id="w_type" value="<?= $banner->w_type; ?>">
                                                    <input type="hidden" name="height" id="height" value="<?= $banner->height; ?>">
                                                    <input type="hidden" name="h_type" id="h_type" value="<?= $banner->h_type; ?>">
                                                <?php } else { ?>
                                                    <input type="text" class="form-control" placeholder="Width size" name="width" id="width" style="max-width: 104px" value="<?php echo $banner->width; ?>">
                                                    <select class="form-control" id="w_type" name="w_type" style="max-width: 104px">
                                                        <option value="px" <?php if($banner->w_type == 'px') echo 'selected'; ?>>px</option>
                                                        <?php if($banner->type != 5) { ?><option value="pe" <?php if($banner->w_type == '%') echo 'selected'; ?>>%</option><?php } ?>
                                                    </select>
                                                    <input type="text" class="form-control" placeholder="Height size" name="height" id="height" style="max-width: 104px"  value="<?php echo $banner->height; ?>">
                                                    <select class="form-control" id="h_type" name="h_type" style="max-width: 104px">
                                                        <option value="px" <?php if($banner->h_type == 'px') echo 'selected'; ?>>px</option>
                                                        <?php if($banner->type != 5) { ?><option value="pe" <?php if($banner->h_type == '%') echo 'selected'; ?>>%</option><?php } ?>
                                                    </select>
                                                <?php } ?>
                                                <button class="btn btn-sm btn-green" style="margin-bottom: 10px;" onclick="view_preview();">View Preview</button>
                                            <?php } ?>
                                        <?php } ?>
                                    </form>
                                <?php } ?>
                                <br>
                                <form action="<?php echo API_URL; ?>?q=edit" method="POST" style="display: inline;" id="edit_form">
                                    <input type="hidden" name="pub_id" value="<?php echo $pub_id; ?>">
                                    <input type="hidden" name="token" value="<?php echo $token; ?>">
                                    <input type="hidden" name="return_url_success" value="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=manage_ads&message=saved">
                                    <input type="hidden" name="return_url_error" value="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=manage_ads">
                                    <input type="hidden" name="b_type" id="b_type" value="<?php echo $banner->type; ?>">
                                    <input type="hidden" name="id" id="id" value="<?php echo $_GET['id']; ?>">
                                    <input type="hidden" name="overlay" id="overlay" value="<?php echo $banner->overlay; ?>">
                                    <input type="hidden" name="b_width" id="b_width" value="<?php echo $banner->width; ?>">
                                    <input type="hidden" name="b_height" id="b_height" value="<?php echo $banner->height; ?>">
                                    <input type="hidden" name="b_w_type" id="b_w_type" value="<?php echo $banner->w_type; ?>">
                                    <input type="hidden" name="b_h_type" id="b_h_type" value="<?php echo $banner->h_type; ?>">

                                    <?php if($banner->type == 3) { ?>
                                        <h5>Open this Ad in</h5>
                                        <select class="form-control" id="target" name="target" required="" style="width: 544px !important; max-width: 100% !important">
                                            <option value="1" <?php if($banner->target == '1') echo 'selected'; ?>>Open ad in current tab and open destination page in new tab</option>
                                            <option value="2" <?php if($banner->target == '2') echo 'selected'; ?>>Open ad in new tab and open destination page in current window</option>
                                            <option value="3" <?php if($banner->target == '3') echo 'selected'; ?>>Open current page in new tab and open ad on current page (best for videos)</option>
                                        </select>

                                        <h5>Class for click event</h5>
                                        <input type="text" class="form-control" placeholder="class-name" name="class" id="class" style="width: 100%; max-width: 544px" required="" value="<?php echo $banner->class; ?>">

                                        <?php } if($banner->type == 4) { ?>
                                            <h5>Skip button</h5>
                                            <select class="form-control" id="skip_button" name="skip_button" required="" style="width: 100% !important; max-width: 544px !important">
                                                <option value="1" <?php if($banner->skip_button == '1') echo 'selected'; ?>>Add skip button</option>
                                                <option value="0" <?php if($banner->skip_button == '0') echo 'selected'; ?>>Remove skip button</option>
                                            </select>

                                            <div id="interstitial_timer" <?php if($banner->skip_button != '1' && $banner->overlay == '0') echo 'style="display: none"'; ?>>
                                                <h5>Skip button timer</h5>
                                                <input type="text" class="form-control" placeholder="Seconds for enable skip button" name="timer" id="timer" style="width: 100%; max-width: 544px" value="<?php echo $banner->timer; ?>">
                                            </div>

                                            <h5>If visitor is using mobile device, display</h5>
                                            <select class="form-control" id="m_template" name="m_template" required="" style="width: 100% !important; max-width: 544px !important">
                                                <option value="0" <?php if($banner->mobile_template == 0) echo 'selected'; ?>>This Design</option>
                                                <?php foreach ($ads_banners as $ads_banner) { 
                                                    if($ads_banner->type == 4) { ?>
                                                        <option value="<?php echo $ads_banner->id; ?>" <?php if($ads_banner->id == $banner->mobile_template) echo 'selected'; ?>><?php echo $ads_banner->name; ?></option>
                                                    <?php } ?>
                                                <?php } ?>
                                            </select>

                                            <h5>Class for click event</h5>
                                            <input type="text" class="form-control" placeholder="class-name" name="class" id="class" style="width: 100%; max-width: 544px" required="" value="<?php echo $banner->class; ?>">
                                        
                                        <?php } if($banner->type == 7) { ?>

                                            <div id="locker">
                                                <h5>Run Locker</h5>
                                                <select class="form-control" id="target" name="target" required="" style="width: 544px">
                                                    <option value="0" <?php if($banner->target == 0) echo 'selected'; ?>>When page is load</option>
                                                    <option value="1" <?php if($banner->target == 1) echo 'selected'; ?>>OnClick event</option>
                                                </select>

                                                <?php if($banner->click_event == null) { ?>
                                                    <div id="locker1" <?php if($banner->target == 0) echo 'style="display: none"'; ?>>
                                                        <h5>CSS class for click event</h5>
                                                        <input type="text" class="form-control" placeholder="class-name" name="class" id="class" style="width: 100%; max-width: 544px" value="<?= $banner->class; ?>">
                                                        <label style="margin-top: 10px"><input type="checkbox" id="reveal_link" name="reveal_link" style="margin-top:-2px" <?php if($banner->skip_button == 1) echo 'checked'; ?>> Reveal link instead of closing locker</label>
                                                    </div>
                                                <?php } else { ?>
                                                    <div id="locker11" <?php if($banner->target == 1) echo 'style="display: none"'; ?>>
                                                        <h5>Delay Locker</h5>
                                                        <small style="display: block">Amount of seconds the locker will be delayed after page load. Use <i>0</i> to disable the delay.</small>
                                                        <input type="text" class="form-control" placeholder="Seconds to run locker" name="timer" id="timer" style="width: 100%; max-width: 544px" value="<?php echo $banner->timer; ?>">
                                                    </div>

                                                    <div id="locker1" <?php if($banner->target == 0) echo 'style="display: none"'; ?>>
                                                        <small>For OnClick event you will need to add <i>onclick="run_locker()"</i> code to run locker.</small>
                                                    </div>

                                                    <h5>Unlock Event</h5>
                                                    <select class="form-control" id="event" name="event" required="" style="width: 544px">
                                                        <?php if($banner->target == 0) { ?><option value="1" <?php if($banner->click_event == 1) { ?>selected<?php } ?>>Close Locker</option><?php } ?>
                                                        <option value="2" <?php if($banner->click_event == 2) { ?>selected<?php } ?>>Reveal Link</option>
                                                        <option value="3" <?php if($banner->click_event == 3) { ?>selected<?php } ?>>Open URL</option>
                                                    </select>

                                                    <div id="locker12" <?php if($banner->click_event == 1) echo 'style="display: none"'; ?>>
                                                        <h5>Locker Link</h5>
                                                        <input type="text" class="form-control" name="locker_link" id="locker_link" style="width: 100%; max-width: 544px" placeholder="https://www.cpalead.com/" value="<?php echo $banner->url; ?>">
                                                    </div>
                                                <?php } ?>

                                                <h5>Locker Title</h5>
                                                <input type="text" class="form-control" name="locker_name" id="locker_name" style="width: 100%; max-width: 544px" required="" value="<?php echo $banner->locker_name; ?>">

                                                <h5>Overlay Opacity (From 0 to 99)</h5>
                                                <input type="text" class="form-control" name="overlay_value" id="overlay_value" style="width: 100%; max-width: 544px" required="" value="<?php if($banner->overlay_value == null) echo '80'; else echo $banner->overlay_value; ?>">
                                                        
                                                <h5>Instructions before click on offer</h5>
                                                <input type="text" class="form-control" name="instructions_before" id="instructions_before" style="width: 100%; max-width: 544px" required="" value="<?php echo $banner->instructions_before; ?>">

                                                <h5>Instructions after click on offer</h5>
                                                <input type="text" class="form-control" name="instructions_after" id="instructions_after" style="width: 100%; max-width: 544px" required="" value="<?php echo $banner->instructions_after; ?>">

                                                <h5>Completing Offers</h5>
                                                <label><input type="checkbox" class="form-control" name="require_more_offers" id="require_more_offers" style="margin-top: -2px" <?php if($banner->require_more_offers == 1) { ?>checked<?php } ?>> Require 2 Offers to be Completed</label>
                                            </div>

                                        <?php } if($banner->type == 8) { ?>

                                                <h5>Page Header</h5>
                                                <input type="text" class="form-control" name="header_title" id="header_title" style="width: 100%; max-width: 544px" required="" value="<?= $banner->heading; ?>">

                                                <h5>App Wall Instruction Text</h5>
                                                <input type="text" class="form-control" name="app_wall_instructions" id="app_wall_instructions" style="width: 100%; max-width: 544px" required="" value="<?= $banner->app_wall_text; ?>">

                                                <h5>Offer Wall Instruction Text</h5>
                                                <input type="text" class="form-control" name="offer_wall_instructions" id="offer_wall_instructions" style="width: 100%; max-width: 544px" required="" value="<?= $banner->offer_wall_text; ?>">

                                                <h5>Offer Title Length</h5>
                                                <input type="text" class="form-control" name="title_length" id="title_length" style="width: 100%; max-width: 544px" required="" placeholder="Number of characters for title" value="<?= $banner->title_length; ?>">

                                                <h5>If visitor is using mobile device, display</h5>
                                                <select class="form-control" id="m_template" name="m_template" required="" style="width: 544px">
                                                    <option value="0" <?php if($banner->mobile_template == 0) echo 'selected'; ?>>This Design</option>
                                                    <?php foreach ($ads_banners as $ads_banner) { 
                                                        if($ads_banner->type == 8) { ?>
                                                            <option value="<?php echo $ads_banner->id; ?>" <?php if($ads_banner->id == $banner->mobile_template) echo 'selected'; ?>><?php echo $ads_banner->name; ?></option>
                                                        <?php } ?>
                                                    <?php } ?>
                                                </select>

                                                <h5>Points Setup</h5>
                                                <p style="margin:0">Name of {currency}</p>
                                                <input type="text" class="form-control" placeholder="Points" name="currency" id="currency" style="width: 100%; max-width: 544px" required="" value="<?= $banner->currency_name; ?>" onkeyup="update_currency();">

                                                <p style="margin:0">Points Ratio</p>
                                                <input type="text" class="form-control" placeholder="Points Ratio" name="ratio" id="ratio" style="width: 100%; max-width: 544px;margin: 0;" required="" value="<?= $banner->currency_ratio; ?>" onkeyup="update_currency();">
                                                <small style="display: block;margin-bottom: 10px;" class="point-explain">For every <b>$1.00 USD</b> your earn, your users earn <b><?= $banner->currency_ratio; ?> <?= $banner->currency_name; ?></b>.</small>

                                                <p style="margin:0">Credit Method</p>
                                                <select class="form-control" id="credit_method" name="credit_method" style="width: 100%; max-width: 544px">
                                                    <option value="0" <?php if($banner->credit_method == '0') echo 'selected'; ?>>Manual</option>
                                                    <option value="1" <?php if($banner->credit_method == '1') echo 'selected'; ?>>Automatic</option>
                                                </select>

                                                <div id="credit_method_div" <?php if($banner->credit_method == '0') echo 'style="display: none"'; ?>>
                                                    
                                                    <p style="margin:0">Postback URL</p>
                                                    <input type="text" class="form-control" placeholder="Postback URL" name="postback_url" id="postback_url" style="width: 100%; max-width: 544px" value="<?= $banner->postback_url; ?>">

                                                    <p style="margin:0">Postback Password</p>
                                                    <input type="text" class="form-control" placeholder="Postback Password" name="postback_password" id="postback_password" style="width: 100%; max-width: 544px;margin: 0;" value="<?= $banner->postback_password; ?>">
                                                    <small style="display: block;margin-bottom: 10px;">A Postback Password is optional. Automatic method requires a Postback to be setup, see our <a href="https://www.cpalead.com/documentation/postback/" target="_blank">Postback Documentation</a> for more information.</small>

                                                </div>

                                                <p style="margin:0">Prompt Visitor for Email/subID?</p>
                                                <select class="form-control" id="prompt" name="prompt" style="width: 100%; max-width: 544px">
                                                    <option value="0" <?php if($banner->prompt_subid == '0') echo 'selected'; ?>>No</option>
                                                    <option value="1" <?php if($banner->prompt_subid == '1') echo 'selected'; ?>>Yes</option>
                                                </select>

                                                <div id="prompt_div" <?php if($banner->prompt_subid == '0') echo 'style="display: none"'; ?>>
                                                    
                                                    <p style="margin:0">Prompt Question</p>
                                                    <input type="text" class="form-control" placeholder="Enter your email address to continue" name="prompt_content" id="prompt_content" style="width: 100%; max-width: 544px" value="<?= $banner->prompt_question; ?>">

                                                </div>

                                        <?php } ?>

                                        <h5>Ad Name</h5>
                                        <input type="text" class="form-control" placeholder="Enter banner name" name="name" id="name" style="width: 100%; max-width: 437px" required="" value="<?php echo $banner->name; ?>">

                                        <button class="btn btn-sm btn-green" style="margin-bottom: 10px" onclick="preparing_save();">Save</button>
                                        <br>
                                        <?php if($banner->ads_tool == 1) { ?>
                                            <div class="span6">
                                                <p>Custom HTML code</p>
                                                <div id="html_editor"></div>
                                                <textarea id="html" name="html" style="display: none;"><?php echo stripslashes($banner->custom_html); ?></textarea>
                                            </div>
                                            <div class="span5">
                                                <p>Custom CSS code</p>
                                                <div id="css_editor"></div>
                                                <textarea id="css" name="css" style="display: none;"><?php echo stripslashes($banner->custom_css); ?></textarea>
                                            </div>
                                        <?php } ?>
                                    </form>
                                </div>
                            <?php } else { ?>

                                <?php if($banner->type == '5') { ?>

                                    <form action="<?php echo API_URL; ?>?q=edit" method="POST" style="display: inline;">
                                        <h5>Superlink Name</h5>
                                        <input type="hidden" name="pub_id" value="<?php echo $pub_id; ?>">
                                        <input type="hidden" name="token" value="<?php echo $token; ?>">
                                        <input type="hidden" name="return_url_success" value="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=manage_ads&message=saved">
                                        <input type="hidden" name="return_url_error" value="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=manage_ads">
                                        <input type="hidden" name="b_type" id="b_type" value="<?php echo $banner->type; ?>">
                                        <input type="hidden" name="id" id="id" value="<?php echo $_GET['id']; ?>">
                                        <input type="text" class="form-control" placeholder="Enter Superlink Name" name="name" id="name" style="width: 100%; max-width: 437px" required="" value="<?= $banner->name; ?>">

                                        <button class="btn btn-sm btn-green" style="margin-bottom: 10px">Save Superlink</button>
                                    </form>

                                <?php } else if($banner->type == '6') { ?>
                                        
                                    <form action="<?php echo API_URL; ?>?q=edit" method="POST" style="display: inline;">
                                        <input type="hidden" name="pub_id" value="<?php echo $pub_id; ?>">
                                        <input type="hidden" name="token" value="<?php echo $token; ?>">
                                        <input type="hidden" name="return_url_success" value="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=manage_ads&message=saved">
                                        <input type="hidden" name="return_url_error" value="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=manage_ads">
                                        <input type="hidden" name="b_type" id="b_type" value="<?php echo $banner->type; ?>">
                                        <input type="hidden" name="id" id="id" value="<?php echo $_GET['id']; ?>">
                                        <h5>Display PushUp Ads on</h5>
                                        <select class="form-control" id="on_desktop" name="on_desktop" required="" style="width: 544px">
                                            <option value="1" <?php if($banner->target == '1') echo 'selected'; ?>>Desktop and Mobile Devices</option>
                                            <option value="0" <?php if($banner->target == '0') echo 'selected'; ?>>Only Mobile Devices</option>
                                        </select>

                                        <div id="interstitial_timer">
                                            <h5>Delay PushUp</h5>
                                            <input type="text" class="form-control" placeholder="Seconds for running ad" name="timer" id="timer" style="width: 100%; max-width: 544px" value="<?= $banner->timer; ?>">
                                            <p><small>Amount of seconds the push up ad will be delayed after page load. Use <i>0</i> to disable the delay.</small></p>
                                        </div>

                                        <h5>PushUp Ad Name</h5>
                                        <input type="text" class="form-control" placeholder="Enter ad name" name="name" id="name" style="width: 100%; max-width: 437px" required="" value="<?= $banner->name; ?>">

                                        <button class="btn btn-sm btn-green" style="margin-bottom: 10px">Save</button>
                                    </form>

                                <?php } ?>
                            <?php } ?>
                        <?php } else { ?>
                            <h5>You can not edit this banner.</h5>
                        <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    jQuery(document).ready(function() {
        jQuery("#locker #target").change(function() {
            var val = jQuery(this).val();
            jQuery("#locker #target_type").val(val);
            if(val == 0) {
                jQuery('#locker #locker1').hide();       
            } else if(val == 1) {
                jQuery('#locker #locker1').show();
            }
        });

        jQuery("#locker #target").change(function() {
            var val = jQuery(this).val();
           jQuery("#locker #target_type").val(val);
            if(val == 0) {
                jQuery('#locker #locker1').hide();
                jQuery("#event").prepend("<option value='1'>Close Locker</option>");
            } else if(val == 1) {
                jQuery('#event option[value="1"]').remove();
                jQuery('#locker #locker1').show();
                jQuery('#locker #locker12').show();
            }
        });

        jQuery("#locker #event").change(function() {
            var val = jQuery(this).val();
            jQuery("#locker #event_type").val(val);
            if(val == 1) {
                jQuery('#locker #locker12').hide();
            } else if(val == 2 || val == 3) {
                jQuery('#locker #locker12').show();
            }
        });

        jQuery("#credit_method").change(function() {
            var val = jQuery(this).val();
            if(val == 0) {
                jQuery('#credit_method_div').hide();
            } else if(val == 1) {
                jQuery('#credit_method_div').show();
            }
        });

        jQuery("#prompt").change(function() {
            var val = jQuery(this).val();
            if(val == 0) {
                jQuery('#prompt_div').hide();
            } else if(val == 1) {
                jQuery('#prompt_div').show();
            }
        });
    });

    var html_code = jQuery("#html").val();
    var html_editor = ace.edit("html_editor");
    html_editor.getSession().setMode("ace/mode/html");
    html_editor.getSession().setUseWorker(false);
    html_editor.setValue(html_code);
    
    var css_code = jQuery("#css").val();
    var css_editor = ace.edit("css_editor");
    css_editor.getSession().setMode("ace/mode/css");
    css_editor.getSession().setUseWorker(false);
    css_editor.setValue(css_code);

    function view_preview() {
        event.preventDefault();
        var html = jQuery("#html").val();
        jQuery("#preview_html").val(html);
        var css = jQuery("#css").val();
        jQuery("#preview_css").val(css);
        <?php if($banner->type == 3 || $banner->type == 4) { ?>
            var preview_target = jQuery("#target").val();
            jQuery("#preview_target").val(preview_target);
            var preview_window_width = jQuery("#target_width").val();
            jQuery("#preview_window_width").val(preview_window_width);
            var preview_window_height = jQuery("#target_height").val();
            jQuery("#preview_window_height").val(preview_window_height);
        <?php } if($banner->type == 4) { ?>
            var preview_timer = jQuery("#timer").val();
            jQuery("#preview_timer").val(preview_timer);
            var preview_overlay = jQuery("#overlay").val();
            jQuery("#preview_overlayr").val(preview_overlay);
        <?php } ?>
        <?php if($banner->type == 7) { ?>

            var preview_timer = jQuery("#timer").val();
            jQuery("#preview_timer").val(preview_timer);

            var preview_target = jQuery("#target").val();
            jQuery("#preview_target").val(preview_target);

            var preview_event = jQuery("#event").val();
            jQuery("#preview_event").val(preview_event);

            var preview_locker_link = jQuery("#locker_link").val();
            jQuery("#preview_locker_link").val(preview_locker_link);

            var preview_locker_name = jQuery("#locker_name").val();
            jQuery("#preview_locker_name").val(preview_locker_name);

            var preview_overlay_value = jQuery("#overlay_value").val();
            jQuery("#preview_overlay_value").val(preview_overlay_value);

            var preview_instructions_before = jQuery("#instructions_before").val();
            jQuery("#preview_instructions_before").val(preview_instructions_before);

            var preview_instructions_after = jQuery("#instructions_after").val();
            jQuery("#preview_instructions_after").val(preview_instructions_after);
        <?php } ?>
        jQuery("#preview_form").submit();
    }

    function update_currency() {
        jQuery(".point-explain").html("For every <b>$1.00 USD</b> your earn, your users earn <b>"+jQuery("#ratio").val()+" "+jQuery("#currency").val()+"</b>.");
    }

    function preparing_save() {
        var width = jQuery("#width").val();
        jQuery("#b_width").val(width);
        var height = jQuery("#height").val();
        jQuery("#b_height").val(height);
        var w_type = jQuery("#w_type").val();
        jQuery("#b_w_type").val(w_type);
        var h_type = jQuery("#h_type").val();
        jQuery("#b_h_type").val(h_type);
        var html_editor = ace.edit("html_editor");
        var html = html_editor.getValue();
        jQuery("#html").val(html);
        var css_editor = ace.edit("css_editor");
        var css = css_editor.getValue();
        jQuery("#css").val(css);
    }

    jQuery("#target").on("change",function() {
        if (this.value != '3') {
            jQuery('#pop_under_window_size').hide(0);
        } else {
            jQuery('#pop_under_window_size').show(0);
        }
    });

    jQuery("#skip_button").on("change",function() {
        if (this.value != '1') {
            jQuery('#interstitial_timer').hide(0);
        } else {
            jQuery('#interstitial_timer').show(0);
        }
    });
</script>