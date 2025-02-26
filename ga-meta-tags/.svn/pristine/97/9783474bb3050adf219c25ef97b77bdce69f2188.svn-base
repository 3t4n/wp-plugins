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
            <h2>Main Options</h2>
            <div class="row">
                <div class="col-md-4">
                    <h4>Meta Description</h4>
                </div>
                <div class="col-md-8">
                    <input id="styled" name="ga_meta_tags_description" type="text" class="form-control"
                           value="<?php echo get_option('ga_meta_tags_description'); ?>" />
                    &nbsp;<?=$ga_meta_desc?>
                    <br /><b>Example: </b>Descripton for your website
                </div>
            </div>.
            <div class="row mt_20"></div>
            <div class="row">
                <div class="col-md-4">
                    <h4>Meta Keywords</h4>
                </div>
                <div class="col-md-8">
                    <input id="styled" name="ga_meta_tags_keyword" type="text" class="form-control"
                           value="<?php echo get_option('ga_meta_tags_keyword'); ?>" />
                    &nbsp;<?=$ga_meta_key?>
                    <br /><b>Example: </b>key1, key2, key3
                </div>
            </div>
            <div class="row mt_20"></div>
            <div class="row">
                <div class="col-md-4">
                    <h4>Meta Robots</h4>
                </div>
                <div class="col-md-8">
                    <input id="styled" name="ga_meta_tags_robots" type="text" class="form-control"
                           value="<?php echo get_option('ga_meta_tags_robots'); ?>" />
                    &nbsp;<?=$ga_meta_rob?>
                    <br /><b>Example: </b>index, follow
                </div>
            </div>
            <div class="row mt_20"></div>
            <div class="row">
                <div class="col-md-4">
                    <h4>Meta Revisit</h4>
                </div>
                <div class="col-md-8">
                    <input id="styled" name="ga_meta_tags_revisit" type="text" class="form-control"
                           value="<?php echo get_option('ga_meta_tags_revisit'); ?>" />
                    &nbsp;<?=$ga_meta_rev?>
                    <br /><b>Example: </b>7 days
                </div>
            </div>
            <div class="row mt_20"></div>
            <div class="row">
                <div class="col-md-4">
                    <h4>Meta Generator</h4>
                </div>
                <div class="col-md-8">
                    <input id="styled" name="ga_meta_tags_generator" type="text" class="form-control"
                           value="<?php echo get_option('ga_meta_tags_generator'); ?>" />
                    &nbsp;<?=$ga_meta_gen?>
                    <br /><b>Example: </b>WordPress 4.5.2
                </div>
            </div>
            <div class="row mt_20"></div>
            <div class="row">
                <div class="col-md-4">
                    <h4>Meta Author</h4>
                </div>
                <div class="col-md-8">
                    <input id="styled" name="ga_meta_tags_author" type="text" class="form-control"
                           value="<?php echo get_option('ga_meta_tags_author'); ?>" />
                    &nbsp;<?=$ga_meta_aut?>
                    <br /><b>Example: </b>John Smith
                </div>
            </div>
            <div class="row mt_20"></div>
            <div class="row">
                <div class="col-md-4">
                    <h4>Meta Contact</h4>
                </div>
                <div class="col-md-8">
                    <input id="styled" name="ga_meta_tags_contact" type="text" class="form-control"
                           value="<?php echo get_option('ga_meta_tags_contact'); ?>" />
                    &nbsp;<?=$ga_meta_con?>
                    <br /><b>Example: </b>email@address.com
                </div>
            </div>
            <div class="row mt_20"></div>
            <div class="row">
                <div class="col-md-4">
                    <h4>Meta Copyright</h4>
                </div>
                <div class="col-md-8">
                    <input id="styled" name="ga_meta_tags_copyright" type="text" class="form-control"
                           value="<?php echo get_option('ga_meta_tags_copyright'); ?>" />
                    &nbsp;<?=$ga_meta_cop?>
                    <br /><b>Example: </b>Copy 2016, Gevorg Andreasyan
                </div>
            </div>
            <div class="row mt_20"></div>
            <div class="row">
                <div class="col-md-4">
                    <h4>Meta Language</h4>
                </div>
                <div class="col-md-8">
                    <input id="styled" name="ga_meta_tags_language" type="text" class="form-control"
                           value="<?php echo get_option('ga_meta_tags_language'); ?>" />
                    &nbsp;<?=$ga_meta_lng?>
                    <br /><b>Example: </b>English
                </div>
            </div>
            <div class="row mt_20"></div>
            <div class="clearfix"></div>            
        </div>
    </div>
    <div class="submit">
        <input name="ga_meta_tags_update_setting" type="hidden"
               value="<?php echo wp_create_nonce('ga-meta-update-setting'); ?>" /> <input
            type="submit" name="update_home" class="button-primary"
            value="<?php _e('Update options'); ?> &raquo;" />

    </div>
    </form>
</div>
<?php
require_once (dirname( __FILE__ ) . '/ga-meta-tags-right.php');
require_once (dirname ( __FILE__ ) . '/ga-meta-tags-footer.php');
?>