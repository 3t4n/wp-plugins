<?php
/**
 * @author Gevorg Andreasyan
 * Plugin: GA Meta Tags
 * URL: http://andreasyan.net/
 */
?>
<?php
require_once (dirname ( __FILE__ ) . '/ga-meta-tags-header.php');
?>
<div class="postbox col-md-12">
    <h2>Google Options</h2>
    <div class="row">
        <div class="col-md-4">
            <h4>Google Universal Analytics</h4>
        </div>
        <div class="col-md-8">
            <input id="styled" name="ga_meta_tags_google_analytics" type="text" class="form-control"
                   value="<?php echo get_option('ga_meta_tags_google_analytics'); ?>" />
            &nbsp;<?=$ga_meta_google_analytics?>
            <br /><b>Example: </b>Web Property ID: UA-XXXXXXX-X
        </div>
    </div>.
    <div class="row mt_20"></div>
    <div class="row">
        <div class="col-md-4">
            <h4>Google WebMaster</h4>
        </div>
        <div class="col-md-8">
            <input id="styled" name="ga_meta_tags_google_webmaster" type="text" class="form-control"
                   value="<?php echo get_option('ga_meta_tags_google_webmaster'); ?>" />
            &nbsp;<?=$ga_meta_google_webmaster?>
            <br /><b>Example: </b>meta name="google-site-verification" content="<b>Volxdfasfasd3i3e_wATasfdsSDb0uFqvNVhLk7ZVY</b>"
        </div>
    </div>
    <div class="row mt_20"></div>
    <div class="row">
        <div class="col-md-4">
            <h4>Google Authorship Profile</h4>
        </div>
        <div class="col-md-8">
            <input id="styled" name="ga_meta_tags_google_author_profile" type="text" class="form-control"
                   value="<?php echo get_option('ga_meta_tags_google_author_profile'); ?>" />
            &nbsp;<?=$ga_meta_google_author_profile?>
            <br /><b>Example: </b>Copy your Google+ profile link and paste it here
        </div>
    </div>
    <div class="row mt_20"></div>
    <div class="row">
        <div class="col-md-4">
            <h4>Google Authorship Page</h4>
        </div>
        <div class="col-md-8">
            <input id="styled" name="ga_meta_tags_google_author_page" type="text" class="form-control"
                   value="<?php echo get_option('ga_meta_tags_google_author_page'); ?>" />
            &nbsp;<?=$ga_meta_google_author_page?>
            <br /><b>Example: </b>If you have a Google+ page for your business, add that URL here and link it on your Google+ page's about page.
        </div>
    </div>
    <div class="row mt_20"></div>
    <div class="row">
        <div class="col-md-4">
            <h4>Google Tag Manager</h4>
        </div>
        <div class="col-md-8">
            <input id="styled" name="ga_meta_tags_google_tag_manager" type="text" class="form-control"
                   value="<?php echo get_option('ga_meta_tags_google_tag_manager'); ?>" />
            &nbsp;<?=$ga_meta_google_tag?>
            <br /><b>Example: </b>GTM-XXXXXX
        </div>
    </div>
    <div class="row mt_20"></div>
    <div class="clearfix"></div>
</div>
</div>
<div class="submit">
    <input name="ga_meta_tags_update_setting" type="hidden"
           value="<?php echo wp_create_nonce('ga-meta-update-setting'); ?>" /> <input
        type="submit" name="update_google" class="button-primary"
        value="<?php _e('Update options'); ?> &raquo;" />

</div>
</form>
</div>
<?php
require_once (dirname( __FILE__ ) . '/ga-meta-tags-right.php');
require_once (dirname ( __FILE__ ) . '/ga-meta-tags-footer.php');
?>
