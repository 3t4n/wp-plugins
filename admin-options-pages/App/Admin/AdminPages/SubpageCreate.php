<?php

namespace AOP\App\Admin\AdminPages;

use AOP\App\Plugin;

class SubpageCreate
{
    public const MENU_TITLE = 'Add New';
    public const PAGE_TITLE = 'Create new subpages';
    public const SLUG       = Plugin::_NAME . '_create';

    public static $nonceName   = 'create_page_nonce';
    public static $nonceAction = '_' . Plugin::PREFIX_ . 'create_nonce_action';

    public static function wpNonceFieldArray()
    {
        $nonceField = wp_nonce_field(static::$nonceAction, static::$nonceName, true, false);

        preg_match_all('/(?<=value="|id=")(.*?)(?=")/', $nonceField, $matches);

        return $matches[0];
    }

    public static function url()
    {
        return admin_url(add_query_arg('page', self::SLUG, 'admin.php'));
    }

    public static function isCurrentPage()
    {
        if (!isset($_GET['page'])) {
            return false;
        }

        if ($_GET['page'] !== static::SLUG) {
            return false;
        }

        return true;
    }

    public static function view()
    {
        printf('<div id="%s">', esc_attr(Plugin::PREFIX) . 'root');

        list($nonceName, $nonce, $url) = self::wpNonceFieldArray();

        printf(
            '<page-create noncename="%s" nonce="%s" slug="%s"></page-create>',
            esc_attr($nonceName),
            esc_attr($nonce),
            esc_url($url)
        );

        print('</div>');
    }
}
