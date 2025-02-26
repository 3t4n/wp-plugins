<?php
/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Media_Blaster
 * @subpackage Media_Blaster/includes
 * @author     Your Name <email@example.com>
 */
class Wp_Smart_Tv_addons {

    public function __construct() {
            
        // Init Settings for Pro Tools
        $this->get_addons_metabox();
	}

	public function get_addons_metabox() {   
        $prefix = 'rovidx_smart_tv_';
       
        /*
        * Addons page
        */
        
        $args = array(
            'id'           => 'rovidx_smart_tv_addon_content',
            'title'        => 'WP Smart TV Resources',
            'menu_title'   => 'Resources', // Use menu title, & not title to hide main h2.
            'object_types' => array( 'options-page' ),
            'option_key'   => 'rovidx_smart_tv_addons',
            'parent_slug'  => 'rovidx_smart_tv_options',
            'tab_group'    => 'rovidx_smart_tv_options',
            'tab_title'    => 'Resources',
            //'cmb_styles' => false, // false to disable the CMB stylesheet
        );
        
        if ( version_compare( CMB2_VERSION, '2.4.0' ) ) {
            $args['display_cb'] = array($this,'options_display_with_tabs');
        }
        
        $addons = new_cmb2_box( $args );
        
        $addons->add_field( array(
            'name'    => '<h5>WP Smart TV Add-ons</h5>',
            'desc'    => '<b>Super charge</b> your WP Smart TV system with these add-ons!',
            'id'      => $prefix . 'addon_list',
            'type'    => 'title',
            'classes' => 'add_on_box cloudy-knoxville-gradient',
            'after_row' => $this->populate_addons(),
            'before_row' => '<div><a href="#rovidx-smart-tv-addon-list">Add-ons</a> | <a href="#rovidx-smart-tv-recommended-list">Recommended Tools</a> | <a href="#rovidx-smart-tv-setup-tuts">Setup Tutorials</a></div>'
        ) );
        
        $addons->add_field( array(
            'name'    => '<h5>Recommended Tools</h5>',
            'desc'    => 'Extend WP Smart TV even further with these recommened plugins',
            'id'      => $prefix . 'recommended_list',
            'type'    => 'title',
            'classes' => 'add_on_box cloudy-knoxville-gradient',
            'after_row' => $this->build_recommend_grid()
        ) );
        
        $addons->add_field( array(
            'name'    => '<h5>Setup Tutorials</h5>',
            'desc'    => '',
            'id'      => $prefix . 'setup_tuts',
            'type'    => 'title',
            'classes' => 'add_on_box cloudy-knoxville-gradient',
            'after_row' => $this->populate_setup_tuts()
        ) );
    }
    
    private function populate_setup_tuts() {
        $url = 'https://docs.rovidx.com/wp-json/wp/v2/document?_embed';
        
        $json = file_get_contents($url);
        $obj = array_reverse(json_decode($json));
        
        
        $grid = '<div id="wpstv-grid">';
        
        foreach ($obj as $doc) {
            $grid .= $this->build_doc_grid($doc);
        }
        $grid .= '</div>';
        
        return $grid;
    }
    
    private function populate_addons() {
        $url = 'https://rovidx.com/edd-api/products/';
        $json = file_get_contents($url);
        $obj = json_decode($json);
        $out = [];
        $grid = '<div id="wpstv-grid">';
        $i = 0;
        // print_r($obj->products);
        foreach ($obj->products as $product) {
            if ($i < 4) {
                $grid .= $this->build_addon_grid($product->info);
            }
            $i++;
        }
        $grid .= '</div>';
        return $grid;
    }
    
    private function build_addon_grid($product) {
        $out = '<div id="wpstv-' . $product->slug . '" class="wpstv-addon-box">';
        $out .= '<a href="https://rovidx.com/downloads/' . $product->slug . '/?utm_source=wpstv_dash" target="_blank"><img src=' . $product->thumbnail . ' class="wpstv-addon-thumb" /></a><br>';
        //$out .= '<div><strong>' . $product->title . '</strong></div>';
        $out .= '<div><a href="https://rovidx.com/downloads/' . $product->slug . '/?utm_source=wpstv_dash" class="btn blue-gradient" target="_blank"><i class="fa fa-external-link" aria-hidden="true"></i>
 More Information...</a></div>';
        $out .= '</div>';
        return $out;
    }
    
    private function build_doc_grid($doc) {
        //print_r($doc);
        $media = $doc->_embedded->{'wp:featuredmedia'}[0]->media_details;
        $fImage = $media->sizes->medium_large->source_url;
       
        $out = '<div class="card">';
        
        //$out .= '<a href="' . $doc->link . '/?utm_source=wpstv_dash" target="_blank" class="wpstv-tut-link">';
        //$out .= '<div class="view view-cascade"><img src="' . $fImage . '" class="card-img-top" /></div>';
        // Video Section
        
        
        // Card Body
        $out .= '<div class="card-body">';
            // Title
            $out .= '<div class="card-title">' . $doc->title->rendered . '</div>';
        
            // Video
            $out .= do_shortcode('[video src="'.$doc->meta_box->tut_video.'"]');
        
            // Body
            $out .= '<div class="card-text">' . $doc->content->rendered . '</div>';

            // Button
        
        // End Card Body
        $out .= '</div>';
        
        // End Card
        $out .= '</div>';
        
        return $out;
    }
    
    private function build_recommend_grid() {
        $recommended = array(
            array(
                'icon' => plugins_url('wp-smart-tv/assets/devices.svg'),
                'title' => 'Recommended Hosting',
                'desc' => 'Need hosting for your IPTV network?  Check out our list of recommended hosts!',
                'link' => 'https://rovidx.com/recommended-hosting/'
            ),
            array(
                'icon' => plugins_url('wp-smart-tv/assets/site.svg'),
                'title' => 'Recommended Themes',
                'desc' => 'We have put together a list of great themes that work flawlessly with WP Smart TV',
                'link' => 'https://rovidx.com/recommended-themes/'
            ),
            array(
                'icon' => plugins_url('wp-smart-tv/assets/web.svg'),
                'title' => 'Recommended Plugins',
                'desc' => 'Extend WP Smart TV even further with these recommended WordPress plugins',
                'link' => 'https://rovidx.com/recommended-plugins/'
            )
        );
        
        $out = '<div id="wpstv-grid">';
        
        foreach ($recommended as $rec) {
            $out .= '<div class="wpstv-addon-box"><img src="' . $rec['icon'] . '" class="wpstv-addon-thumb" /><h3>' . $rec['title'] . '</h3><p>' . $rec['desc'] . '</p><a href="' . $rec['link'] . '" class="btn btn-dark" target="_blank">More Information...</a></div>';
        }
        $out .= '</div>';
        
        return $out;
    }
}