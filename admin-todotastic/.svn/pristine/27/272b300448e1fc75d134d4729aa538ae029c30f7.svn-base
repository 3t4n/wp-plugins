<?php
namespace Brickdots\AdminTodotastic\view\metabox;
use Brickdots\AdminTodotastic\base\UtilsProvider;

// @codeCoverageIgnoreStart
defined('ABSPATH') or die('No script kiddies please!'); // Avoid direct file request
// @codeCoverageIgnoreEnd

/**
 * Simple widget that creates an HTML element with React rendering.
 *
 * @codeCoverageIgnore Example implementations gets deleted the most time after plugin creation!
 */
class Metabox {
    use UtilsProvider;

    /**
     * Register new metabox
     */
    public function addMetabox() {
        add_meta_box(
            'todotastic',
            'Todotastic',
            [$this, 'renderHtml'],
            ['shop_order', 'product', 'post', 'page', 'shop_coupon', 'tribe_events'],
            'side',
            'high'
        );
    }

    /**
     * Render content in the box.
     */
    public function renderHtml() {
        echo '<div id="bdotstd-metabox-component" class="wrap"></div>';
    }

    /**
     * Get the instance of this class
     */
    public static function instance() {
        return new Metabox();
    }
}
