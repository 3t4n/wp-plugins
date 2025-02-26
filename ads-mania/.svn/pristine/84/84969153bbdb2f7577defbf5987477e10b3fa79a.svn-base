<?php

/**
 * The public-facing functionality of the plugin.
 * 
 * @since      1.0.0
 *
 * @package    ADSMANIA
 * @subpackage adsmania/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the dashboard-specific stylesheet and JavaScript.
 *
 * @package    ADSMANIA
 * @subpackage adsmania/public
 * @author     Abu Bakr Soliman <bakrianoo@gmail.com>
 */
class ADSMANIA_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
                
                require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-adsmania-ads.php';
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided to enqueue the styles.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The ADSMANIA_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name."_front", plugin_dir_url( __FILE__ ) . 'css/front.css', array(), $this->version, 'all' );
                wp_enqueue_style( $this->plugin_name."_shortcodes", plugin_dir_url( __FILE__ ) . 'css/shortcodes.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the scripts for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for enqueue the scripts.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The ADSMANIA_LOADER will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
                 
                 wp_enqueue_script( "{$this->plugin_name}_shortcode", plugin_dir_url( __FILE__ ) . 'js/shortcodes.js', array( 'jquery' ), $this->version, false );
	}
        
        function set_intro_ads() {
        // confirm that we're not in the admin panel
	if(!is_admin())
	{
                // register a css style contains the common styles
		wp_register_style('ads_front_css', plugins_url()."/adsmania/extra/front/css/front.css");
                    
		//create a new ads object
		$obj = new ADSMANIA_ads($this->plugin_name, $this->version);
                // get the last active ads
		$ads = $obj->get_active_ads('intro',get_option('ads_sett_i_ads','ads_start_at'));
                
                // these parameters used in the while loop
                // we want these variables  to loop all active ads and check if one of those is suitable to displayed
		$limit = 1; $count = 0; $i = 0;
                
		while($count < $limit && $i < count($ads->posts)) { 
			// check if this ads can be displayed here
			if($obj->is_allowed($ads->posts[$i]->ID)) {
                                
                                // generate the right code based on ads type    
				switch(get_post_meta($ads->posts[$i]->ID,'ads_type')[0]) {
					// if this an (intro) ads
					case 'ads_intro':
						$count++; // we found a suitable advertisement
						$return = $obj->prepare_content($ads->posts[$i]->ID);
						if(isset($return['code']))
						{
							// minimize content in a single line
							$content = trim(preg_replace('/\s\s+/', ' ', $return['code']));
							// skip " and </ characters
							$content = str_replace(array('"','</'),array("'","<\/"),$content);
                                                        // set the required width and height
							$block_w = (!empty($return['w'])) ? $return['w'] : "50%";
							$block_h = (!empty($return['h'])) ? $return['h'] : "200px";
						?>
                                                    <!-- Intro Ads generated code using jquery -->
                                                    <script>
                                                    jQuery(document).ready(function(){
                                                                var div = "<div style='background-color:<?php echo get_option('ads_sett_ic_bg','#000'); ?>; width: <?php echo $block_w ?>; height: <?php echo $block_h; ?>;' id='ads_intro_block'>\
                                                                <div id='ads_intr_close'>X</div>\
                                                                <?php echo $content; ?>\
                                                                </div>\
                                                                <div style='height: "+(parseInt(jQuery( document  ).height()))+"px; width: "+jQuery( document  ).width()+"px;' id='ads_intro_div'></div>";

                                                                // the generated code will prepended at the top of <body>
                                                                jQuery('body').prepend(div);

                                                                // re-align the block into center of window
                                                                setTimeout(function(){ 
                                                                    var left = ( parseInt(jQuery( document  ).width()) - parseInt(jQuery('#ads_intro_block').width()));
                                                                    jQuery('#ads_intro_block').animate({'left' :parseInt(left/2)+"px"},'slow');
                                                                }, 300);

                                                                // show close button after X of seconds
                                                                setTimeout(function(){ jQuery('#ads_intr_close').show(); }, <?php echo (int)get_option('ads_sett_ic_close','3') * 1000; ?>);

                                                                // when click on the close button, remove the ads div
                                                                jQuery('body').on('click','#ads_intr_close',function()
                                                                { jQuery('#ads_intro_block, #ads_intro_div').remove(); });
                                                            }); 
                                                    </script> <?php }
					break;
                                            
					//if this an (hidden layer) ads
					case 'ads_hidden':
					$count++; // we found a suitable advertisement
						    ?>
                                                    <script>
                                                        jQuery(document).ready(function(){
                                                            // prepend a code into the top of <body>
                                                            jQuery('body').prepend('<a href="<?php echo get_post_meta($ads->posts[$i]->ID,'ads_link')[0]; ?>" target="<?php echo get_post_meta($ads->posts[$i]->ID,'ads_link_target')[0]; ?>" style="height: '+(parseInt(jQuery( document  ).height()) + 80)+'px; width: '+jQuery( document  ).width()+'px;" id="ads_hidden_div"></a>');
                                                            // when clicking on the close button, remove the hidden layer div
                                                            jQuery('body').on('click','#ads_hidden_div',function()
                                                            { jQuery(this).remove(); });
                                                        });
                                                    </script>
						    <?php
					break;
				}
                            }
                            $i++; }
                        }
                    }
                    
                    
        function content_ads($content) {
            // create a new ads object
            $obj = new ADSMANIA_ads($this->plugin_name, $this->version);
            // get last active ads
            $ads = $obj->get_active_ads('content',get_option('ads_sett_c_ads','rand'));
            if(count($ads->posts) > 0)
            {
                // get default tag which we will split the content based on it (paragraph or lines)
                $tag = "</p>";
                // now we will split the article content into chunks based on the tag
                $p = explode($tag, $content);
                $min = min(array(count($p), (int)get_option('ads_sett_c_max_ads',3), count($ads->posts)));
                $increment = ceil(count($p)/$min);
                $p_counter = 0;
                if($increment <= 0) $increment = 1;
                    // for loop until the minimun of (max ads), (tag count) or (count of ads)
                    for($i=0; $i<$min; $i++) {
                        // get required code for the ads
                        if(isset($ads->posts[$i]) && isset($p[$p_counter]))
                        {
                            $return = $obj->prepare_content($ads->posts[$i]->ID);

                            if(isset($return['code']) && !empty($return['code']))
                            {
                                // minimize content in a single line
                                $cont = trim(preg_replace('/\s\s+/', ' ', $return['code']));
                                // set required width and height
                                $block_w = (!empty($return['w'])) ? $return['w'] : "50%";
                                $block_h = (!empty($return['h'])) ? $return['h'] : "200px";
                                // append an ads in the end of an article chunk 
                                $p[$p_counter] .=$tag."<div style='width:{$block_w}; height:{$block_h}; margin: 0 auto; display: table;' id='ads_inside_article'>{$cont}</div>";
                                $p_counter += $increment;
                            }
                        }
                    }
                        // re-sample the whole new article again
                        $content = implode($tag, $p);
                }
                        return $content;
            }
            
            function reg_users_shortcode($atts, $content){
                if(is_user_logged_in())
                {
                    return $content;
                }
                else
                {
                    return "<div id='user_content_block'>".get_option('ads_sett_user_cont_msg','You must register to view this content')."</div>";
                }
            }
            
            function click_view_shortcode($atts, $content){
                if(isset($atts['link']) && !empty($atts['link'])) {
                    return "<a target='_blank' id='click_to_view' href='{$atts['link']}'>".get_option('ads_sett_click_cont_msg','Click here to view this content')."</a>"
                    . "<div id='ads_hidden_content'>{$content}</div>";
                }
                else
                {
                    return $content;
                }
            }
}
