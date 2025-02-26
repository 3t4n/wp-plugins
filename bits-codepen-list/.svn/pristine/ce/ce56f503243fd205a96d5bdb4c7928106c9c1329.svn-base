<?php

namespace Bits\CodePenList\Modules;

class Realize extends BaseModule
{
    /**
     * Build the full list.
     *
     * @param  array  $args
     * @return string
     */
    public static function build($args)
    {
        ob_start();
        
        foreach ($args['response'] as $item) {
            self::buildItem($item, $args['atts']);
        }

        return sprintf('<ul class="bits-codepen-list">%s</ul>', ob_get_clean());
    }

    /**
     * Build a single list item.
     *
     * @param  SimplePieItem $item
     * @param  array  $atts
     * @return string
     */
    protected static function buildItem($item, $atts)
    {
        include bits_cpl_base_path('includes/templates/list.php');
    }

    /**
     * Register the hooks.
     * 
     * @return void
     */
    public function registerHooks()
    {
        //
    }
}