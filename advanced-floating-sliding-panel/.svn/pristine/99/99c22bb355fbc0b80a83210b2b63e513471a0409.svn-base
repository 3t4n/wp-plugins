<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://codetides.com
 * @since      1.0.0
 *
 * @package    Advanced_Floating_Sliding_Panel
 * @subpackage Advanced_Floating_Sliding_Panel/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Advanced_Floating_Sliding_Panel
 * @subpackage Advanced_Floating_Sliding_Panel/public
 * @author     CodeTides <contact@codetides.com>
 */
class Advanced_Floating_Sliding_Panel_Public {

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

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function afsp_enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Advanced_Floating_Sliding_Panel_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Advanced_Floating_Sliding_Panel_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/advanced-floating-sliding-panel-public.css', array(), $this->version, 'all' );
		//wp_enqueue_style( $this->plugin_name.'-demo', plugin_dir_url( __FILE__ ) . 'css/demo.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name.'-fontawesome', plugin_dir_url( __FILE__ ) . 'css/font-awesome.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function afsp_enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Advanced_Floating_Sliding_Panel_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Advanced_Floating_Sliding_Panel_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		 
		wp_enqueue_script( $this->plugin_name.'sliding-panel', plugin_dir_url( __FILE__ ) . 'js/jquery.slidingpanel.js', array( 'jquery' ), null, true );		
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/advanced-floating-sliding-panel-public.js', array( 'jquery' ), null, true );
		
	}
	public function afsp_load()
	{
		    
			
			
			$args = array(
                'posts_per_page' => -1,
                    'post_type'     => 'ct_afsp',
                    'post_status'   => 'publish'                 
                );
			$posts = get_posts($args);			
	
        if(!$posts){
            return;
        }
			
			
			
			
			foreach($posts as $post)
        {
			$output = "";
			$output_tabs = "";
			$output_css = "";
			$output_js = "";			
			
			$impressions = get_post_meta( $post->ID, 'ct_afsp_impressions', true );
			if ( empty( $impressions ) )
					$impressions = 1;
                else
                    $impressions = $impressions + 1;
                
            update_post_meta($post->ID, 'ct_afsp_impressions', $impressions);
			
			
			
			$sliding_panel_post_meta = get_post_meta( $post->ID );
			$total_tabs = 0;
			foreach($sliding_panel_post_meta as $key => $val){
				if (strpos($key, 'ct_afsp_tab_label_') !== false) {					
					$number =  (int) filter_var($key, FILTER_SANITIZE_NUMBER_INT);
					if($number!=0)
					{
						$total_tabs++;
						$tab_title = get_post_meta( $post->ID, 'ct_afsp_tab_label_'.$number, true );						
						$tab_text = $tab_title;
						// get_post_meta( $post->ID, 'ct_afsp_tab_alignment_'.$number, true );
						if(get_post_meta( $post->ID, 'ct_afsp_tab_alignment_'.$number, true )=="left" && get_post_meta( $post->ID, 'ct_afsp_tab_icon_'.$number, true )!= ""){
							$tab_text = '<i class="'.get_post_meta( $post->ID, 'ct_afsp_tab_icon_'.$number, true ).'"></i>'.$tab_title;							
						}
						if(get_post_meta( $post->ID, 'ct_afsp_tab_alignment_'.$number, true )=="right" && get_post_meta( $post->ID, 'ct_afsp_tab_icon_'.$number, true )!= ""){
							$tab_text = $tab_title.'<i class="'.get_post_meta( $post->ID, 'ct_afsp_tab_icon_'.$number, true ).'"></i>';							
						}
						if( $tab_title=="" && get_post_meta( $post->ID, 'ct_afsp_tab_icon_'.$number, true )!= "" ){
							$tab_text = '<i style="" class="'.get_post_meta( $post->ID, 'ct_afsp_tab_icon_'.$number, true ).'"></i>';							
						}
						
					//	echo $tab_text.get_post_meta( $post->ID, 'ct_afsp_tab_alignment_'.$number, true );
						$output_tabs .= '<div class="sliding-drawer"><div class="sliding-knob"><p>'.$tab_text.'</p></div><div class="sliding-box">'.wpautop(get_post_meta( $post->ID, 'ct_afsp_tab_content_'.$number, true )).'</div></div>';
					}	
				}
			}
			
			
			$sliding_panel_position = get_post_meta( $post->ID, 'ct_afsp_position', true );
			$sliding_panel_width = get_post_meta( $post->ID, 'ct_afsp_width', true );
			$sliding_panel_height = get_post_meta( $post->ID, 'ct_afsp_height', true );
			$sliding_panel_color = get_post_meta( $post->ID, 'ct_afsp_bg_color', true );			
			
			$output_css = $this->afsp_generate_css($post->ID,$sliding_panel_position,$total_tabs);
			$output_js = $this->afsp_generate_js($post->ID);
			
			$output ='<div class="sliding-'.$sliding_panel_position.'" id="advanced-floating-sliding-panel-'.$post->ID.'">'.$output_tabs.'</div>'."\n".$output_css.$output_js;			
			echo $output;
		}	
			
			
	}	
	public function afsp_generate_js($post_id){		
		wp_enqueue_script('sliding-'.$post_id, plugin_dir_url( __FILE__ ) . 'js/sliding-panel-'.$post_id.'.js', array( 'jquery' ), null, false);		
	}
	public function afsp_generate_css($post_id,$sliding_panel_position,$total_tabs){
		
		$sliding_panel_css = "";
		$positioning_css = "";
		switch($sliding_panel_position){			
			case "left";
				$positioning_css .=  $this->afsp_generate_css_left($post_id,$total_tabs);
				return $positioning_css;
				break;			
			default:
				break;
		}
		
	//	return $sliding_panel_css;
	}	
	
	public function afsp_generate_css_left($post_id,$total_tabs){		
		if(get_post_meta( $post_id, 'ct_afsp_tab_height', true ) > 50)
			$margintop = ceil((get_post_meta( $post_id, 'ct_afsp_tab_height', true ) - 50) / 2);
		else
			$margintop = '';
		
	$sliding_panel_css .="<style type='text/css'>#advanced-floating-sliding-panel-".$post_id." .sliding-knob {
						position: absolute;
						background-color: ".get_post_meta( $post_id, 'ct_afsp_tab_bg_color', true ).";
						border-right: 1px dotted ".get_post_meta( $post_id, 'ct_afsp_bg_color', true ).";
						color: ".get_post_meta( $post_id, 'ct_afsp_tab_text_color', true ).";
						-webkit-border-radius: ".get_post_meta( $post_id, 'ct_afsp_tab_border_radious_topleft', true )."px ".get_post_meta( $post_id, 'ct_afsp_tab_border_radious_topright', true )."px ".get_post_meta( $post_id, 'ct_afsp_tab_border_radious_bottomright', true )."px ".get_post_meta( $post_id, 'ct_afsp_tab_border_radious_bottomleft', true )."px;
						-moz-border-radius: ".get_post_meta( $post_id, 'ct_afsp_tab_border_radious_topleft', true )."px ".get_post_meta( $post_id, 'ct_afsp_tab_border_radious_topright', true )."px ".get_post_meta( $post_id, 'ct_afsp_tab_border_radious_bottomright', true )."px ".get_post_meta( $post_id, 'ct_afsp_tab_border_radious_bottomleft', true )."px;
						border-radius: ".get_post_meta( $post_id, 'ct_afsp_tab_border_radious_topleft', true )."px ".get_post_meta( $post_id, 'ct_afsp_tab_border_radious_topright', true )."px ".get_post_meta( $post_id, 'ct_afsp_tab_border_radious_bottomright', true )."px ".get_post_meta( $post_id, 'ct_afsp_tab_border_radious_bottomleft', true )."px;
						font-size:".get_post_meta( $post_id, 'ct_afsp_tab_font_size', true )."px;
						font-weight:".get_post_meta( $post_id, 'ct_afsp_tab_font_weight', true ).";
						cursor:pointer;
						}

						#advanced-floating-sliding-panel-".$post_id.".sliding.sliding-open .sliding-drawer.drawer-open .sliding-knob {
						background-color: ".get_post_meta( $post_id, 'ct_afsp_tab_bg_hover_color', true ).";
						color: ".get_post_meta( $post_id, 'ct_afsp_tab_text_hover_color', true ).";
						border: none;
						z-index: 10;
						".get_post_meta( $post_id, 'ct_afsp_tab_css', true )."
						}

						#advanced-floating-sliding-panel-".$post_id." .sliding-box {
						position: absolute;
						top: 0;
						right: 0;
						bottom: 0;
						left: 0;
						overflow-y: auto;
						font-size: ".get_post_meta( $post_id, 'ct_afsp_font_size', true )."px;
						background-color: ".get_post_meta( $post_id, 'ct_afsp_bg_color', true ).";
						color: ".get_post_meta( $post_id, 'ct_afsp_text_color', true ).";
						border-top:".get_post_meta( $post_id, 'ct_afsp_border_top', true )."px ".get_post_meta( $post_id, 'ct_afsp_border_type', true )." ".get_post_meta( $post_id, 'ct_afsp_border_color', true ).";
						border-bottom:".get_post_meta( $post_id, 'ct_afsp_border_bottom', true )."px ".get_post_meta( $post_id, 'ct_afsp_border_type', true )." ".get_post_meta( $post_id, 'ct_afsp_border_color', true ).";
						border-left:".get_post_meta( $post_id, 'ct_afsp_border_left', true )."px ".get_post_meta( $post_id, 'ct_afsp_border_type', true )." ".get_post_meta( $post_id, 'ct_afsp_border_color', true ).";
						border-right:".get_post_meta( $post_id, 'ct_afsp_border_right', true )."px ".get_post_meta( $post_id, 'ct_afsp_border_type', true )." ".get_post_meta( $post_id, 'ct_afsp_border_color', true ).";
						-webkit-border-radius: ".get_post_meta( $post_id, 'ct_afsp_border_radius_size', true )."px;
						-moz-border-radius: ".get_post_meta( $post_id, 'ct_afsp_border_radius_size', true )."px;
						border-radius: ".get_post_meta( $post_id, 'ct_afsp_border_radius_size', true )."px;
						padding: ".get_post_meta( $post_id, 'ct_afsp_padding_top', true )."px ".get_post_meta( $post_id, 'ct_afsp_padding_right', true )."px ".get_post_meta( $post_id, 'ct_afsp_padding_bottom', true )."px ".get_post_meta( $post_id, 'ct_afsp_padding_left', true )."px;
						}
						#advanced-floating-sliding-panel-".$post_id." .sliding-box p{
							color: ".get_post_meta( $post_id, 'ct_afsp_text_color', true ).";	
							padding:0;
							margin:0;	
						}
						#advanced-floating-sliding-panel-".$post_id.".sliding-left {
						top: 0px;
						left: 0px;
						height: ".get_post_meta( $post_id, 'ct_afsp_height', true ).get_post_meta( $post_id, 'ct_afsp_height_unit', true ).";
						".get_post_meta( $post_id, 'ct_afsp_margin', true ).": ".get_post_meta( $post_id, 'ct_afsp_margin_value', true )."px;
						}



						#advanced-floating-sliding-panel-".$post_id.".sliding-left .sliding-knob {
						width: ".get_post_meta( $post_id, 'ct_afsp_tab_width', true )."px;
						height: ".get_post_meta( $post_id, 'ct_afsp_tab_height', true )."px;
						text-align: ".get_post_meta( $post_id, 'ct_afsp_tab_text_alignment', true ).";
						border-top:".get_post_meta( $post_id, 'ct_afsp_tab_border_top', true )."px ".get_post_meta( $post_id, 'ct_afsp_tab_border_type', true )." ".get_post_meta( $post_id, 'ct_afsp_tab_border_color', true ).";
						border-bottom:".get_post_meta( $post_id, 'ct_afsp_tab_border_bottom', true )."px ".get_post_meta( $post_id, 'ct_afsp_tab_border_type', true )." ".get_post_meta( $post_id, 'ct_afsp_tab_border_color', true ).";
						border-left:".get_post_meta( $post_id, 'ct_afsp_tab_border_left', true )."px ".get_post_meta( $post_id, 'ct_afsp_tab_border_type', true )." ".get_post_meta( $post_id, 'ct_afsp_tab_border_color', true ).";
						border-right:".get_post_meta( $post_id, 'ct_afsp_tab_border_right', true )."px ".get_post_meta( $post_id, 'ct_afsp_tab_border_type', true )." ".get_post_meta( $post_id, 'ct_afsp_tab_border_color', true ).";
						-webkit-border-radius: ".get_post_meta( $post_id, 'ct_afsp_tab_border_radius_size', true )."px;
						-moz-border-radius: ".get_post_meta( $post_id, 'ct_afsp_tab_border_radius_size', true )."px;
						border-radius: ".get_post_meta( $post_id, 'ct_afsp_tab_border_radius_size', true )."px;
						padding: ".get_post_meta( $post_id, 'ct_afsp_tab_padding_top', true )."px ".get_post_meta( $post_id, 'ct_afsp_tab_padding_right', true )."px ".get_post_meta( $post_id, 'ct_afsp_tab_padding_bottom', true )."px ".get_post_meta( $post_id, 'ct_afsp_tab_padding_left', true )."px;
						".get_post_meta( $post_id, 'ct_afsp_tab_css', true )."
						}

						#advanced-floating-sliding-panel-".$post_id.".sliding-left .sliding-knob p{
						 -moz-transform-origin: 0 50%;
						-moz-transform: rotate(-90deg) translate(-50%, 50%);
						-webkit-transform-origin: 0 50%;
						-webkit-transform: rotate(-90deg) translate(-50%, 50%);
						-o-transform-origin: 0 50%;
						-o-transform: rotate(-90deg) translate(-50%, 50%);
						-ms-transform-origin: 0 50%;
						-ms-transform: rotate(-90deg) translate(-50%, 50%);
						transform-origin: 0 50%;
						transform: rotate(-90deg) translate(-50%, 50%);
						/*transform-origin: left bottom;*/
						position: absolute;
						top: 0px;
						left:0px;
						line-height: ".get_post_meta( $post_id, 'ct_afsp_tab_width', true )."px;
						right: -50px;
						overflow: hidden;
						height:".get_post_meta( $post_id, 'ct_afsp_tab_width', true )."px;
						width:".get_post_meta( $post_id, 'ct_afsp_tab_height', true )."px;
						color: ".get_post_meta( $post_id, 'ct_afsp_tab_text_color', true ).";
						margin-top:".$margintop."px;
						}

						#advanced-floating-sliding-panel-".$post_id.".sliding-left .sliding-knob p i{
						font-family: 'FontAwesome';
						padding:0px 5px;
						font-style: normal;
						font-size:".get_post_meta( $post_id, 'ct_afsp_tab_font_size', true )."px;
						}
						";
		$sliding_panel_css .="#advanced-floating-sliding-panel-".$post_id.".sliding.sliding-open .sliding-drawer.drawer-open .sliding-knob p{							
							color: ".get_post_meta( $post_id, 'ct_afsp_tab_text_hover_color', true ).";							
							}";
							
		$tab_placement ="";		
		if(get_post_meta( $post_id, 'ct_afsp_tab_placement', true ) == 0){
			$tab_placement = "top";
			$tab_placement_val = (get_post_meta( $post_id, 'ct_afsp_tab_first_margin', true )?get_post_meta( $post_id, 'ct_afsp_tab_first_margin', true ):'0')."px;";
		}		
		$sliding_panel_css .="#advanced-floating-sliding-panel-".$post_id.".sliding-left .sliding-drawer:nth-child(1) .sliding-knob {
								  ".$tab_placement.":".$tab_placement_val."
								}";
		for($tabs=1; $tabs<=$total_tabs; $tabs++){
			if($tabs==1)
				continue;
			
			$tab_pos = ( ($tabs-1)*get_post_meta( $post_id, 'ct_afsp_tab_height', true ) ) + (get_post_meta( $post_id, 'ct_afsp_tab_first_margin', true )?get_post_meta( $post_id, 'ct_afsp_tab_first_margin', true ):'0');
			$sliding_panel_css .="#advanced-floating-sliding-panel-".$post_id.".sliding-left .sliding-drawer:nth-child(".$tabs.") .sliding-knob {
								  ".$tab_placement.": calc(".$tab_pos."px - 0px);
								}";	
		}	
$sliding_panel_css .="#advanced-floating-sliding-panel-".$post_id.".sliding-left .sliding-knob {
					right: -50px;
					/*border-radius: 0px 10px 10px 0px;
					box-shadow: 2px 2px 5px 0px #aaa;*/
				}

				#advanced-floating-sliding-panel-".$post_id.".sliding-left.sliding.sliding-open .sliding-drawer.drawer-open .sliding-knob {
					/*box-shadow: 5px 5px 10px 0px #aaa;*/
				}
					</style>";
	return $sliding_panel_css;
	}

}
