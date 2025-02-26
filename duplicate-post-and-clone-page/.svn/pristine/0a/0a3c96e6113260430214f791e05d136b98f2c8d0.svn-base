<?php
defined('ABSPATH') || exit;
require_once(DPCP_PATH . "class.dpcp-settings.php");
require_once(DPCP_PATH . "functions/functions.php");
$dpcp_settings = new DPCP_Settings();
?>
<div class="wrap">
    <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
    <?php include(DPCP_PATH . 'views/tutorial.php') ?>
    <h3>Choose what to copy for the following elements:</h3>
    <div id="metabox" class="postbox">
        <form action="options.php" method="post">
            <?php
            settings_fields('dpcp_group');
            ?>
            <table class="form-table dpcp-options-table">
                <tbody>
                    <?php
                    $dpcp_settings->settings_section("Basic Info");
                    $dpcp_settings->settings_field("Title", "title", "Same as Original", "Use \"Untitled\"");
                    $dpcp_settings->settings_field("Author", "author", "Same as Original", "Current User");
                    $dpcp_settings->settings_field("Date", "create_date", "Same as Original", "Use Current Date/Time");

                    $dpcp_settings->settings_section("Main Content");
                    $dpcp_settings->settings_field("Content", "content", "Same as Original", "Blank");
                    $dpcp_settings->settings_field("Featured Image", "featured_image", "Same as Original", "No Image");
                    $dpcp_settings->settings_field("Excerpt", "excerpt", "Same as Original", "Auto-generate From Content");

                    $dpcp_settings->settings_section("Settings & Permissions");
                    $dpcp_settings->settings_field("Status", "status", "Same as Original", "Draft");
                    $dpcp_settings->settings_field("Allow Comments", "allow_comments", "Same as Original", "Default");
                    $dpcp_settings->settings_field("Password", "password", "Same as Original", "No Password");

                    $dpcp_settings->settings_section("Organization");
                    $dpcp_settings->settings_field("Categories", "categories", "Same as Original", "Uncategorized");
                    $dpcp_settings->settings_field("Tags", "tags", "Same as Original", "No Tags");

                    $dpcp_settings->settings_section("Advanced Options");
                    $dpcp_settings->settings_field("Template", "template", "Same as Original", "Default");
                    $dpcp_settings->settings_field("Parent Page", "parent", "Same as Original", "No Parent");
                    $dpcp_settings->settings_field("Comments", "comments", "Copy Comments", "No Comments");
                    ?>
                    <tr>
                        <td colspan="100%">
                            <hr>
                            <p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Save Settings"></p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</div>