<?php
namespace Brickdots\AdminTodotastic\view\dashboard;

use Brickdots\AdminTodotastic\base\UtilsProvider;

// @codeCoverageIgnoreStart
defined('ABSPATH') or die('No script kiddies please!'); // Avoid direct file request
// @codeCoverageIgnoreEnd

/**
 * Simple widget that creates an HTML element with React rendering.
 *
 * @codeCoverageIgnore Example implementations gets deleted the most time after plugin creation!
 */
class Board {
    use UtilsProvider;

    /**
     * Register new metabox
     */
    public function addMetabox() {
        wp_add_dashboard_widget('bdotstd_todo_dashboard_widget', 'Your Todotastic', [$this, 'renderHtml']);
    }

    /**
     * Render content in the box.
     */
    public function renderHtml() {
        echo '<div id="bdotstd-dashboard-list-component"></div>';
        //echo 'abc';
    }

    /**
     * Get the instance of this class
     */
    public static function instance() {
        return new Board();
    }
}
