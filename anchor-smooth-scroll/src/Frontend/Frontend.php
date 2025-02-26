<?php namespace SmoothScroll\Frontend;

use Premmerce\SDK\V2\FileManager\FileManager;
use SmoothScroll\SmoothScrollPlugin;
use SmoothScroll\Admin\Settings;

/**
 * Class Frontend
 *
 * @package SmoothScroll\Frontend
 */
class Frontend
{

    /**
     * @var FileManager
     */
    private $fileManager;

    /**
     * @var options
     */
    private $options;
    
    /**
     * @var frontendData
     */
    private $frontendData;

    public function __construct(FileManager $fileManager)
    {
        $this->options = get_option(Settings::OPTIONS);
        $this->fileManager = $fileManager;


        if(!isset($this->options['remove_anchor_highlight'])){
            $this->options['remove_anchor_highlight'] = 0;
        }
        $this->frontendData = '
        /* <![CDATA[ */
        var xspage_anchor_plugin_options  = {
        "menuClass":".smooth-scroll-menu",
        "offset":"'.$this->options['offset'].'",
        "scrollDuration":'.$this->options['scroll_duration'].',
        "customAnchorSelector":"'.$this->options['custom_anchor_selector'].'",
        "removeWPlinkHighlightifAnchor":'.$this->options['remove_anchor_highlight'].',
        "themeConflict":"'.$this->options['disable_theme_scroll'].'"
        }; /* ]]> */
        ';

        $this->registerActions();

    }

    private function registerActions()
    {
        add_action('wp_enqueue_scripts', array($this, 'enqueueScripts'));
        add_filter('wp_nav_menu_args', array($this, 'filterNavMenuClass'));
        add_action('init', array($this, 'registerInitActions'));


    }

    public function registerInitActions()
    {
        add_shortcode( 'anchor', array($this, 'anchorShortcode') );
    }

    /**
     * @param string $hook
     */
    public function enqueueScripts($hook)
    {

        wp_enqueue_script(
            'xpage-anchor',
            $this->fileManager->locateAsset('frontend/js/xpage_anchor_refactor1.js'),
//            $this->fileManager->locateAsset('frontend/js/xpage_anchor.js'),
            array('jquery', 'underscore'),
            SmoothScrollPlugin::VERSION,
            true
        );

        wp_add_inline_script( 'xpage-anchor', $this->frontendData, 'before' );

    }

    public function filterNavMenuClass($args)
    {

            $args['menu_class'] .= ' smooth-scroll-menu';

        return $args;

    }


    public function anchorShortcode( $atts, $content = null ) {

        $default = array(
            'id' => '',
        );
        $a = shortcode_atts( $default, $atts );
        $id = esc_attr( $a['id'] );
        $html = '<span id="' . $id . '" ';
        $html .= 'class="ass-anchor">';
        $html .= $content . '</span>';

        return $html;
    }



}