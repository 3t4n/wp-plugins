<?php
require_once dirname(dirname(__FILE__)) . '/includes/google-map/gswpgmap_map.php';

class GSWPGMAP_Page_Public
{

    private $plugin_name;
    private $version;

    public function __construct($plugin_name, $version)
    {
    	
        $this->plugin_name = $plugin_name;
        $this->version = $version;

        $this->map = new GSWPGMAP_Map(array(
			'key'=>get_option('gswpgmap_apikey', array() ),
			'container-id'=>get_option('gswpgmap_cntid', array() ),
			'coord'=>array('lat'=>get_option('gswpgmap_lat', array() ),'lng'=>get_option('gswpgmap_lng', array() )),
			'zoom'=>get_option('gswpgmap_zoom', array() ),
			'style'=>get_option('gswpgmap_style', array() ),
			'info-window-html'=>addslashes(get_option('gswpgmap_infow_html', array() )),
		));
    }

    public function enqueue_styles()
    {
        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/gswpgmap-page-public.css', array(), $this->version, 'all');
    }

    public function enqueue_scripts()
    {
		wp_enqueue_script('google-map-api', $this->map->getGoogleMapURL(), array(), '', true);
        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/gswpgmap-page-public.js', array( 'jquery' ), $this->version, false);
		
		add_action('wp_footer', function(){
				echo '<script type="text/javascript">'."\n".$this->map->getJS()."\n".'</script>';
		});
    }


}
