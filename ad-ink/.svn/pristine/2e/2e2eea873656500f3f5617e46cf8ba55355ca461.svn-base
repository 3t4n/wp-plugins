<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://ad.ink
 * @since      1.0.0
 *
 * @package    Ad_Ink
 * @subpackage Ad_Ink/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div id="ad-ink-admin">
    <div class="font-sans text-base leading-normal text-gray-600 bg-white" style="min-height: calc(100vh <?php echo $this->user ? '- 97px' : ''; ?>); margin-left: -20px">
        <?php require_once(plugin_dir_path(dirname(__FILE__)) . "partials/ad-ink-admin-header.php"); ?>
        <div class="px-8 py-8">
            <input id="api-url" type="hidden" value="<?php echo esc_url($this->api->getUrl()); ?>" />
            <input id="api-token" type="hidden" value="<?php echo esc_attr($this->api->getToken()); ?>" />
            <input id="tag-id" type="hidden" value="<?php echo esc_attr($this->website['id']); ?>" />
            <?php require_once(plugin_dir_path(dirname(__FILE__)) . "partials/ad-ink-admin-alerts.php"); ?>
            <?php
            switch ($this->page) {
                case "auth":
                    require_once(plugin_dir_path(dirname(__FILE__)) . "partials/auth/ad-ink-admin-auth.php");
                    break;
                case "report":
                    require_once(plugin_dir_path(dirname(__FILE__)) . "partials/report/ad-ink-admin-report.php");
                    break;
                case "account":
                    require_once(plugin_dir_path(dirname(__FILE__)) . "partials/account/ad-ink-admin-account.php");
                    break;
                case "affiliation":
                    require_once(plugin_dir_path(dirname(__FILE__)) . "partials/affiliation/ad-ink-admin-affiliation.php");
                    break;
                case "none":
                    break;
                case "tag":
                default:
                    require_once(plugin_dir_path(dirname(__FILE__)) . "partials/tag/ad-ink-admin-tag.php");
            }
            ?>
        </div>
    </div>
</div>