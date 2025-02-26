<?php

namespace Bits\CodepenList;

class CodepenList
{
    /**
     * The module lookup.
     * 
     * @var array
     */
    protected $lookup = [
        'feed'  => 'Bits\CodePenList\Modules\Feed',
        'cache' => 'Bits\CodePenList\Modules\Cache',
        'editor' => 'Bits\CodePenList\Modules\Editor',
        'realize' => 'Bits\CodePenList\Modules\Realize',
    ];

    /**
     * The plugin modules.
     * 
     * @var array
     */
    protected $modules = [];

    /**
     * Initialize a new codepen list instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->fillup();
        $this->boot();
    }

    /**
     * Fillup the modules.
     *
     * @return void
     */
    protected function fillup()
    {
        foreach ($this->lookup as $key => $module) {
            $this->modules[$key] = new $module;
        }
    }

    /**
     * Register the plugin hooks.
     *
     * @return void
     */
    protected function boot()
    {
        foreach ($this->modules as $module) {
            $module->registerHooks();
        }

        add_action('widgets_init', ['Bits\CodePenList\Modules\Widget', 'register']);
        wp_oembed_add_provider('http://codepen.io/*/pen/*', 'http://codepen.io/api/oembed');
    }

    /**
     * Activate the plugin.
     *
     * @return void
     */
    public function activate()
    {
        update_option('bits_codepen_shortcode_cachetime', 42300);
    }

    /**
     * Deactivate the plugin.
     *
     * @return void
     */
    public function deactivate()
    {
        wp_cache_flush();
    }
}
