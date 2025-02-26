<?php

namespace AOP\App\Admin\AdminPages;

use AOP\App\Plugin;

class SubpageEdit
{
    public const MENU_TITLE = 'Edit Page';
    public const PAGE_TITLE = 'Create new subpages';
    public const SLUG       = Plugin::_NAME . '_edit';

    public static $nonceName   = 'edit_page_nonce';
    public static $nonceAction = '_' . Plugin::PREFIX_ . 'edit_nonce_action';

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

        list($nonceName, $nonce, $slug) = self::wpNonceFieldArray();

        printf(
            '<page-create noncename="%s" nonce="%s" slug="%s"></page-create>',
            esc_attr($nonceName),
            esc_attr($nonce),
            esc_url($slug)
        );

        print('<modal></modal>');

        print('</div>');
    }
}
