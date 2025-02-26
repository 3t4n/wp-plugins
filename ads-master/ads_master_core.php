<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if (!current_user_can( 'administrator' )) {
	die("You have not permission to access this page.");
}

$page_url = 'options-general.php?page=ads-master';

if(isset($_POST['btn_save']) && $_POST['btn_save']!='')
{
	check_admin_referer( 'change-setting', 'ads_master_nonce' );
	
	$ads_main_enable = sanitize_text_field($_POST['ads_main_enable']);
	$ads_exclude_ids = sanitize_text_field($_POST['ads_exclude_ids']);
	
	$ads_post_top_enable = sanitize_text_field($_POST['ads_post_top_enable']);
	$ads_post_top_desc = esc_html($_POST['ads_post_top_desc']);
	$ads_post_top_corner_enable = sanitize_text_field($_POST['ads_post_top_corner_enable']);
	$ads_post_top_corner_desc = esc_html($_POST['ads_post_top_corner_desc']);
	$ads_post_first_p_enable = sanitize_text_field($_POST['ads_post_first_p_enable']);
	$ads_post_first_p_desc = esc_html($_POST['ads_post_first_p_desc']);
	$ads_post_bottom_enable = sanitize_text_field($_POST['ads_post_bottom_enable']);
	$ads_post_bottom_desc = esc_html($_POST['ads_post_bottom_desc']);
	
	$ads_page_top_enable = sanitize_text_field($_POST['ads_page_top_enable']);
	$ads_page_top_desc = esc_html($_POST['ads_page_top_desc']);
	$ads_page_bottom_enable = sanitize_text_field($_POST['ads_page_bottom_enable']);
	$ads_page_bottom_desc = esc_html($_POST['ads_page_bottom_desc']);
	
	$ads_shortcode_enable = sanitize_text_field($_POST['ads_shortcode_enable']);
	$ads_shortcode_desc = esc_html($_POST['ads_shortcode_desc']);
	
	update_option('ads_main_enable', $ads_main_enable);
	update_option('ads_exclude_ids', $ads_exclude_ids);
	
	update_option('ads_post_top_enable', $ads_post_top_enable);
	update_option('ads_post_top_desc', $ads_post_top_desc);
	update_option('ads_post_top_corner_enable', $ads_post_top_corner_enable);
	update_option('ads_post_top_corner_desc', $ads_post_top_corner_desc);
	update_option('ads_post_first_p_enable', $ads_post_first_p_enable);
	update_option('ads_post_first_p_desc', $ads_post_first_p_desc);
	update_option('ads_post_bottom_enable', $ads_post_bottom_enable);
	update_option('ads_post_bottom_desc', $ads_post_bottom_desc);
	
	update_option('ads_page_top_enable', $ads_page_top_enable);
	update_option('ads_page_top_desc', $ads_page_top_desc);
	update_option('ads_page_bottom_enable', $ads_page_bottom_enable);
	update_option('ads_page_bottom_desc', $ads_page_bottom_desc);
	
	update_option('ads_shortcode_enable', $ads_shortcode_enable);
	update_option('ads_shortcode_desc', $ads_shortcode_desc);
	
	?><script type="text/javascript">window.location='<?=$page_url;?>';</script><?
}

$ads_main_enable = get_option('ads_main_enable');
$ads_exclude_ids = get_option('ads_exclude_ids');

$ads_post_top_enable = get_option('ads_post_top_enable');
$ads_post_top_desc = stripslashes(get_option('ads_post_top_desc'));
$ads_post_top_corner_enable = get_option('ads_post_top_corner_enable');
$ads_post_top_corner_desc = stripslashes(get_option('ads_post_top_corner_desc'));
$ads_post_first_p_enable = get_option('ads_post_first_p_enable');
$ads_post_first_p_desc = stripslashes(get_option('ads_post_first_p_desc'));
$ads_post_bottom_enable = get_option('ads_post_bottom_enable');
$ads_post_bottom_desc = stripslashes(get_option('ads_post_bottom_desc'));

$ads_page_top_enable = get_option('ads_page_top_enable');
$ads_page_top_desc = stripslashes(get_option('ads_page_top_desc'));
$ads_page_bottom_enable = get_option('ads_page_bottom_enable');
$ads_page_bottom_desc = stripslashes(get_option('ads_page_bottom_desc'));

$ads_shortcode_enable = get_option('ads_shortcode_enable');
$ads_shortcode_desc = stripslashes(get_option('ads_shortcode_desc'));
?>
<div class="wrap">
<h1>Ads Master</h1>
<hr />
<div class="ads-columns-2">
    <div class="ads-column-1">
    	<div class="postbox">
        	<h2>Ads Master Setting</h2>
            <form method="post" name="frm_setting" id="frm_setting" action="<?=$page_url;?>">
            <?php
            wp_nonce_field( 'change-setting', 'ads_master_nonce' );
			?>
            <div class="ads_postbox">
            <table class="ads_table">
            <tr>
            <td colspan="2" align="right">
            <input type="submit" value="Save Setting" class="button button-primary button-large" id="btn_save" name="btn_save">
            </td>
            </tr>
            <tr><td colspan="2"><hr /></td></tr>
            <tr>
            <td colspan="2">
            <input class="ads_checkbox" type="checkbox" <?=($ads_main_enable==1)?'checked="checked"':'';?> value="1" name="ads_main_enable" id="ads_main_enable" />
            <label class="ads_label" for="ads_main_enable">Ads Master Enable</label>
            </td>
            </tr>
            
            <tr><td colspan="2"><hr /></td></tr>
            <tr>
            <td width="200"><label class="ads_label" for="ads_exclude_ids">Exclude Ads From Page or Post (id's list with comma)</label></td>
            <td>
            <input type="text" class="ads_text" name="ads_exclude_ids" id="ads_exclude_ids" value="<?php echo $ads_exclude_ids; ?>" placeholder="e.g. 12,14,15" />
            </td>
            </tr>
            
            <tr><td colspan="2"><hr /></td></tr>
            <tr>
            <td colspan="2">
            <input class="ads_checkbox" type="checkbox" <?=($ads_post_top_enable==1)?'checked="checked"':'';?> value="1" name="ads_post_top_enable" id="ads_post_top_enable" />
            <label class="ads_label" for="ads_post_top_enable">Display Ads Post Content Top</label>
            </td>
            </tr>
            <tr>
            <td width="200">Ads Code Paste Here</td>
            <td>
            <textarea class="ads_textarea" name="ads_post_top_desc" id="ads_post_top_desc"><?php echo esc_html($ads_post_top_desc); ?></textarea>
            </td>
            </tr>
            
            <tr><td colspan="2"><hr /></td></tr>
            <tr>
            <td colspan="2">
            <input class="ads_checkbox" type="checkbox" <?=($ads_post_top_corner_enable==1)?'checked="checked"':'';?> value="1" name="ads_post_top_corner_enable" id="ads_post_top_corner_enable" />
            <label class="ads_label" for="ads_post_top_corner_enable">Display Ads Post Content Top Left Corner</label>
            </td>
            </tr>
            <tr>
            <td width="200">Ads Code Paste Here</td>
            <td>
            <textarea class="ads_textarea" name="ads_post_top_corner_desc" id="ads_post_top_corner_desc"><?php echo esc_html($ads_post_top_corner_desc); ?></textarea>
            </td>
            </tr>
            
            <tr><td colspan="2"><hr /></td></tr>
            <tr>
            <td colspan="2">
            <input class="ads_checkbox" type="checkbox" <?=($ads_post_first_p_enable==1)?'checked="checked"':'';?> value="1" name="ads_post_first_p_enable" id="ads_post_first_p_enable" />
            <label class="ads_label" for="ads_post_first_p_enable">Display Ads Post After First Para</label>
            </td>
            </tr>
            <tr>
            <td width="200">Ads Code Paste Here</td>
            <td>
            <textarea class="ads_textarea" name="ads_post_first_p_desc" id="ads_post_first_p_desc"><?php echo esc_html($ads_post_first_p_desc); ?></textarea>
            </td>
            </tr>
            
            <tr><td colspan="2"><hr /></td></tr>
            <tr>
            <td colspan="2">
            <input class="ads_checkbox" type="checkbox" <?=($ads_post_bottom_enable==1)?'checked="checked"':'';?> value="1" name="ads_post_bottom_enable" id="ads_post_bottom_enable" />
            <label class="ads_label" for="ads_post_bottom_enable">Display Ads Post Content Bottom</label>
            </td>
            </tr>
            <tr>
            <td width="200">Ads Code Paste Here</td>
            <td>
            <textarea class="ads_textarea" name="ads_post_bottom_desc" id="ads_post_bottom_desc"><?php echo esc_html($ads_post_bottom_desc); ?></textarea>
            </td>
            </tr>
            
            <tr><td colspan="2"><hr /></td></tr>
            <tr>
            <td colspan="2">
            <input class="ads_checkbox" type="checkbox" <?=($ads_page_top_enable==1)?'checked="checked"':'';?> value="1" name="ads_page_top_enable" id="ads_page_top_enable" />
            <label class="ads_label" for="ads_page_top_enable">Display Ads Page Content Top</label>
            </td>
            </tr>
            <tr>
            <td width="200">Ads Code Paste Here</td>
            <td>
            <textarea class="ads_textarea" name="ads_page_top_desc" id="ads_page_top_desc"><?php echo esc_html($ads_page_top_desc); ?></textarea>
            </td>
            </tr>
            
            <tr><td colspan="2"><hr /></td></tr>
            <tr>
            <td colspan="2">
            <input class="ads_checkbox" type="checkbox" <?=($ads_page_bottom_enable==1)?'checked="checked"':'';?> value="1" name="ads_page_bottom_enable" id="ads_page_bottom_enable" />
            <label class="ads_label" for="ads_page_bottom_enable">Display Ads Page Content Bottom</label>
            </td>
            </tr>
            <tr>
            <td width="200">Ads Code Paste Here</td>
            <td>
            <textarea class="ads_textarea" name="ads_page_bottom_desc" id="ads_page_bottom_desc"><?php echo esc_html($ads_page_bottom_desc); ?></textarea>
            </td>
            </tr>
            
            <tr><td colspan="2"><hr /></td></tr>
            <tr>
            <td colspan="2">
            <input class="ads_checkbox" type="checkbox" <?=($ads_shortcode_enable==1)?'checked="checked"':'';?> value="1" name="ads_shortcode_enable" id="ads_shortcode_enable" />
            <label class="ads_label" for="ads_shortcode_enable">Display Ads Shortcode</label>
            </td>
            </tr>
            <tr>
            <td width="200">Ads Code Paste Here</td>
            <td>
            <textarea class="ads_textarea" name="ads_shortcode_desc" id="ads_shortcode_desc"><?php echo esc_html($ads_shortcode_desc); ?></textarea>
            </td>
            </tr>
            
            <tr><td colspan="2"><hr /></td></tr>
            <tr>
            <td colspan="2" align="right">
            <input type="submit" value="Save Setting" class="button button-primary button-large" id="btn_save" name="btn_save">
            </td>
            </tr>
            </table>
            </div>
            </form>
        </div>
    </div>
    <div class="ads-column-2">
    	<div class="wp-box">
            <div class="inner">
                <h2>Ads Master 1.0.0</h2>
            
                <?php /*?><h3>Changelog</h3>
                <p>See what's new in <a href="#">version 1.0.0</a></p><?php */?>
                
                <h3>Resources</h3>
                <ul>
                    <li><a target="_blank" href="http://www.bluechipinfoway.com/ads-master/">Plugin Website</a></li>
                    <li><a target="_blank" href="http://www.bluechipinfoway.com/ads-master/">Feedback</a></li>
                    <li><a target="_blank" href="http://www.bluechipinfoway.com/ads-master/">Create Your Plugin</a></li>
                </ul>
            </div>
            <div class="footer footer-blue">
                <ul class="hl">
                    <li>Created by Bluechip Infoway Team</li>
                </ul>
            </div>
        </div>
    </div>
</div>
</div>