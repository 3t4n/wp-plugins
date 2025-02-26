<?php
if (!defined('ABSPATH')) die('-1');
class APAW_PricingTable {
    function __construct() {
        // We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'apaw_integrateWithVC' ) );

        // Use this when creating a shortcode addon
        add_shortcode( 'es_pricing_table_module_vc', array( $this, 'render_es_pricing_table_module_vc' ) );
    }

    public function apaw_integrateWithVC() {
        // Check if Visual Composer is installed
        if ( ! defined( 'WPB_VC_VERSION' ) ) {
            // Display notice that Visual Compser is required
            add_action('admin_notices', array( $this, 'apaw_showVcVersionNotice' ));
            return;
        }
        
        vc_map( array(
            "name" => __("ES: Pricing Table", 'apaw_easysoftonic_company'),
            "description" => __("Advanced Pricing Table Addon", 'apaw_easysoftonic_company'),
            "base" => "es_pricing_table_module_vc",
            "class" => "",
            "controls" => "full",
            "icon" => plugins_url('assets/images/module-icon.png', dirname(__FILE__) ) , // or css class name which you can reffer in your css file later. Example: "apaw_easysoftonic_company_my_class"
            "category" => __('ES Modules', 'apaw_easysoftonic_company'),
			// start making fields
            "params" => array(
        
        /* Layout Classic */
        

        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Table Style', 'apaw_easysoftonic_company'),
            'param_name' => 'table_style',
            'value' => array(
                'Style 1' => 'style1',
                'Style 2' => 'style2',
                'Style 3' => 'style3',
            ),
            'group' => esc_html__('Source Settings', 'apaw_easysoftonic_company'),
        ),
		
		array(
            'type' => 'textfield',
            'heading' => __ ( 'Recommended', 'apaw_easysoftonic_company' ),
            'param_name' => 'recommended',
            'value' => '',
            'group' => esc_html__('Source Settings', 'apaw_easysoftonic_company'),
        ),
        array(
            'type' => 'textfield',
            'heading' => __ ( 'Title', 'apaw_easysoftonic_company' ),
            'param_name' => 'title',
            'value' => '',
            'group' => esc_html__('Source Settings', 'apaw_easysoftonic_company'),
            'admin_label' => true,
        ),
        array(
            'type' => 'textarea',
            'heading' => __ ( 'Description', 'apaw_easysoftonic_company' ),
            'param_name' => 'description',
            'value' => '',
            'group' => esc_html__('Source Settings', 'apaw_easysoftonic_company'),
        ),
        array(
            'type' => 'textfield',
            'heading' => __ ( 'Price', 'apaw_easysoftonic_company' ),
            'param_name' => 'price',
            'value' => '',
            'group' => esc_html__('Source Settings', 'apaw_easysoftonic_company'),
        ),
        array(
            'type' => 'textfield',
            'heading' => __ ( 'Time', 'apaw_easysoftonic_company' ),
            'param_name' => 'pricing_time',
            'value' => '',
            'group' => esc_html__('Source Settings', 'apaw_easysoftonic_company'),
        ),
        array(
            'type' => 'param_group',
            'heading' => esc_html__( 'Feature Lists', 'apaw_easysoftonic_company' ),
            'param_name' => 'feature_lists',
            'value' => '',
            'group' => esc_html__('Source Settings', 'apaw_easysoftonic_company'),
            'params' => array(
                array(
                    "type" => "textfield",
                    "heading" =>esc_html__("Item", 'apaw_easysoftonic_company'),
                    "param_name" => "feature_item",
                    'admin_label' => true,
                ),
				array(
                    "type" => "iconpicker",
                    "heading" =>esc_html__("Item Icon (Tick, Cross, etc)", 'apaw_easysoftonic_company'),
                    "param_name" => "icon_item",
                    'admin_label' => true,
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Item Active', 'apaw_easysoftonic_company'),
                    'param_name' => 'active',
                    'value' => array(
                        'No' => 'no-active',
                        'Yes' => 'active',
                    ),
                ),
            ),
        ),

        array(
            'type' => 'textfield',
            'heading' => __ ( 'Text Button', 'apaw_easysoftonic_company' ),
            'param_name' => 'text_button',
            'value' => '',
            'group' => esc_html__('Source Settings', 'apaw_easysoftonic_company'),
        ),

        array(
            'type' => 'vc_link',
            'heading' => __ ( 'Link Button', 'apaw_easysoftonic_company' ),
            'param_name' => 'link_button',
            'value' => '',
            'group' => esc_html__('Source Settings', 'apaw_easysoftonic_company'),
        ),

        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Button Styles', 'apaw_easysoftonic_company'),
            'param_name' => 'button_style',
            'value' => array(
                'Button Style 1' => 'btnstyle1',
                'Button Style 2' => 'btnstyle2',
                'Button Style 3' => 'btnstyle3',
            ),
		   'group' => esc_html__('Source Settings', 'apaw_easysoftonic_company'),
        ),

        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Recommended Styles', 'apaw_easysoftonic_company'),
            'param_name' => 'recommended_style',
            'value' => array(
                'Recommended Style 1' => 'recommendstyle1',
                'Recommended Style 2' => 'recommendstyle2',
            ),
		   'group' => esc_html__('Source Settings', 'apaw_easysoftonic_company'),
        ),

        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Price in Circle', 'apaw_easysoftonic_company'),
            'param_name' => 'price_circle_style',
            'value' => array(
                'Price Circle' => 'pricecircle',
            ),
			'dependency' => array(
                'element' => 'table_style',
                'value' => array('style2')
            ),
		   'group' => esc_html__('Source Settings', 'apaw_easysoftonic_company'),
        ),

        array(
            'type' => 'checkbox',
            'heading' => esc_html__('On Hover Zoom', 'apaw_easysoftonic_company'),
            'param_name' => 'hover_zoom_style',
            'value' => array(
                'Hover Zoom' => 'hoverzoom',
            ),
			'group' => esc_html__('Source Settings', 'apaw_easysoftonic_company'),
        ),
		
		array(
            'type' => 'colorpicker',
            'heading' => __ ( 'Custom Color Title Background', 'apaw_easysoftonic_company' ),
            'param_name' => 'custom_color_title_bg',
            'value' => '#ffffff',
			'dependency' => array(
                'element' => 'table_style',
                'value' => array('style2', 'style3')
            ),
            'group' => esc_html__('Source Settings', 'apaw_easysoftonic_company'),
        ),
		
		array(
            'type' => 'colorpicker',
            'heading' => __ ( 'Custom Color Title', 'apaw_easysoftonic_company' ),
            'param_name' => 'custom_color_title',
            'value' => '#ffffff',
			'dependency' => array(
                'element' => 'table_style',
                'value' => array('style2', 'style3')
            ),
            'group' => esc_html__('Source Settings', 'apaw_easysoftonic_company'),
        ),
		
		array(
            'type' => 'colorpicker',
            'heading' => __ ( 'Custom Color Price/Time', 'apaw_easysoftonic_company' ),
            'param_name' => 'custom_color_price_time',
            'value' => '#ffffff',
			'group' => esc_html__('Source Settings', 'apaw_easysoftonic_company'),
        ),
		
		array(
            'type' => 'colorpicker',
            'heading' => __ ( 'Custom Color Background Price/Time', 'apaw_easysoftonic_company' ),
            'param_name' => 'custom_color_bg_price_time',
            'value' => '#ffffff',
			'group' => esc_html__('Source Settings', 'apaw_easysoftonic_company'),
        ),
		
		array(
            'type' => 'colorpicker',
            'heading' => __ ( 'Recommended Background Color', 'apaw_easysoftonic_company' ),
            'param_name' => 'recommended_color',
            'value' => '#ffffff',
            'group' => esc_html__('Source Settings', 'apaw_easysoftonic_company'),
        ),
		
		array(
            'type' => 'colorpicker',
            'heading' => __ ( 'Custom Color', 'apaw_easysoftonic_company' ),
            'param_name' => 'custom_color',
            'value' => '#ffffff',
            'group' => esc_html__('Source Settings', 'apaw_easysoftonic_company'),
        ),

        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Preset Color', 'apaw_easysoftonic_company'),
            'param_name' => 'preset_color',
            'value' => array(
                'Preset 1' => 'preset1',
                'Preset 2' => 'preset2',
                'Preset 3' => 'preset3',
            ),
		   'dependency' => array(
                'element' => 'table_style',
                'value' => array('style1')
            ),
            'group' => esc_html__('Source Settings', 'apaw_easysoftonic_company'),
        ),
        
        /* Extra */
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Extra class name', 'apaw_easysoftonic_company' ),
            'param_name' => 'el_class',
            'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in Custom CSS.', 'apaw_easysoftonic_company' ),
            'group'            => esc_html__('Extra', 'apaw_easysoftonic_company')
        ),
        array(
            'type' => 'animation_style',
            'heading' => esc_html__( 'Animation Style', 'apaw_easysoftonic_company' ),
            'param_name' => 'animation',
            'description' => esc_html__( 'Choose your animation style', 'apaw_easysoftonic_company' ),
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('Extra', 'apaw_easysoftonic_company'),
        ),
    )
        ) );
		
    }

    /*
    Shortcode logic how it should be rendered
    */
    public function render_es_pricing_table_module_vc( $atts, $content = null ) {
		ob_start();
      extract( shortcode_atts( array(
            'title' => '',
			'price' => '',
			'pricing_time' => '',
			'description' => '',
			'feature_lists' => '',
			'icon_item' => '',
			'text_button' => '',
			'link_button' => '',
			'el_class' => '',
			'animation' => '',
			'recommended' => '',
			'custom_color_title_bg' => '',
			'custom_color_title' => '',
			'custom_color_price_time' => '',
			'custom_color_bg_price_time' => '',
			'recommended_color' => '',
			'custom_color' => '',
			'price_circle_style' => '',
			'hover_zoom_style' => '',
			'button_style' => 'btnstyle1',
			'recommended_style' => 'recommendstyle1',
			'preset_color' => 'preset1',	
			'table_style' => 'style1',
      ), $atts ) );
$link = vc_build_link($link_button);
$a_href = '';
$a_target = '_self';
if ( strlen( $link['url'] ) > 0 ) {
    $a_href = $link['url'];
    $a_target = strlen( $link['target'] ) > 0 ? $link['target'] : '_self';
} 
//$animation_tmp = isset($animation) ? $animation : '';
//$animation_classes = $this->getCSSAnimation( $animation_tmp );
//$animation_classes = $this->getCSSAnimation( $animation );
if ( '' !== $animation && 'none' !== $animation ) {
				$animation_classes = ' wpb_animate_when_almost_visible wpb_' . $animation . ' ' . $animation;
			}

$feature_lists = (array) vc_param_group_parse_atts($feature_lists);

$pb_id = rand(1000, 100000); ?>
<style>
<?php if(!empty($custom_color)) { ?> 
.btn-<?php echo esc_attr($pb_id); ?>:hover {
<?php echo 'background:'.esc_attr($custom_color).' !important;';  ?>
}
.apaw-pricing-inner .apaw-pricing-button.btnstyle3.btnshadow-<?php echo esc_attr($pb_id); ?> a {
    box-shadow: 6px 6px 0 <?php echo esc_attr($custom_color); ?> !important;
}
.apaw-pricing-inner .apaw-pricing-button.btnstyle3.btnshadow-<?php echo esc_attr($pb_id); ?> a:hover {
    box-shadow: 6px 6px 0 #000000 !important;
}
<?php } ?>

.style3 .apaw-pricing-inner .head_bg.border-color-<?php echo esc_attr($pb_id); ?> {
    
	<?php echo 'border-color:'.esc_attr($custom_color_title_bg).' rgba(0, 0, 0, 0) rgba(0, 0, 0, 0) '.esc_attr($custom_color_title_bg).' !important;';  ?>
}

<?php if(!empty($custom_color_bg_price_time)) { ?> 
.style2 .border-color-<?php echo esc_attr($pb_id); ?>:after {
    border-top-color: <?php echo esc_attr($custom_color_bg_price_time); ?> !important;
}
<?php } ?>

<?php if(!empty($price_circle_style)) { ?> 
.style2 .apaw-pricing-circle-<?php echo esc_attr($pb_id); ?> {
    color: <?php echo esc_attr($custom_color); ?> !important;
}
<?php } ?>

</style>
<div id="apaw-<?php echo esc_attr($pb_id); ?>" class="apaw-pricing-wrapper <?php echo esc_attr($preset_color.' '.$hover_zoom_style.' '.$table_style.' '.$el_class.' '.$animation_classes); ?>">
    <div class="apaw-pricing-inner">
        <div class="apaw-pricing-header <?php echo esc_attr($recommended_style);?>">
            <?php if(!empty($recommended)) : ?>
                <div class="apaw-pricing-recommended" style="<?php if(!empty($recommended_color)) { echo 'background:'.esc_attr($recommended_color).';'; } ?>"><?php echo esc_attr($recommended); ?></div>
            <?php endif;?>
			 <?php if($table_style == 'style3') {	?>
			<div class="head_bg border-color-<?php echo esc_attr($pb_id); ?>"></div>
             <?php }  ?>
            <div class="apaw-pricing-holder">
                <?php if(!empty($title)) : ?>
                    <h3 class="apaw-pricing-title" style="<?php if(!empty($custom_color_title_bg && $custom_color_title_bg)) { echo 'background:'.esc_attr($custom_color_title_bg).';' .'color:'.esc_attr($custom_color_title).';';  } ?>"><?php echo esc_attr($title);?></h3> 
                <?php endif;?>
                <?php if(!empty($description)) : ?>
				<div class="apaw-pricing-desc">
                    <?php echo esc_attr($description); ?>
                </div>
				<?php endif;?>
            </div>
            <div class="apaw-pricing-meta border-color-<?php echo esc_attr($pb_id); ?>" style="<?php if(!empty($custom_color_bg_price_time)) { echo 'background:'.esc_attr($custom_color_bg_price_time).';'; } ?>">
                <div class="apaw-pricing-circle-<?php echo esc_attr($pb_id); ?> <?php echo esc_attr($price_circle_style); ?>">
				<span class="apaw-pricing-price" style="<?php if(!empty($custom_color_price_time)) { echo 'color:'.esc_attr($custom_color_price_time).';'; } ?>">
                    <?php echo esc_attr($price);?>  
                </span>
                <span class="apaw-pricing-time" style="<?php if(!empty($custom_color_price_time)) { echo 'color:'.esc_attr($custom_color_price_time).';'; } ?>">
                    <?php if(!empty($pricing_time)) { echo esc_attr('/ '.$pricing_time); } ?>  
                </span>
            </div>
			</div>
        </div>
        <div class="apaw-pricing-body">
            <?php if(!empty($feature_lists)) : ?>
                <ul class="apaw-pricing-content">
                    <?php foreach ($feature_lists as $key => $value) { 
                        $feature_item = isset($value['feature_item']) ? $value['feature_item'] : '';
						 $icon_item = isset($value['icon_item']) ? $value['icon_item'] : '';
                        $active = isset($value['active']) ? $value['active'] : 'no-active';
                        ?>
                        <li class="<?php echo esc_attr($active); ?>"> <i class="<?php echo esc_attr($icon_item); ?>"  style="<?php if($icon_item == 'fa-times') { echo esc_attr('color: red'); } else { echo 'color:'.esc_attr($custom_color).';'; } ?>"></i><?php echo esc_html($feature_item); ?></li>
                    <?php } ?>
                </ul>
            <?php endif;?>
            <?php if(!empty($text_button)) : ?>
                <div class="apaw-pricing-button <?php echo esc_attr($button_style); ?> btnshadow-<?php echo esc_attr($pb_id); ?>">
                    <a class="btn-<?php echo esc_attr($pb_id); ?>" href="<?php echo esc_url($a_href);?>" target="<?php echo esc_attr( $a_target ); ?>">
                        <?php echo esc_attr($text_button); ?>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

    <?php wp_reset_query();
    return ob_get_clean();
    }

    /*
    Show notice if your plugin is activated but Visual Composer is not
    */
    public function apaw_showVcVersionNotice() {
        $apaw_plugin_data = get_plugin_data(__FILE__);
        echo '
        <div class="updated">
          <p>'.sprintf(__('<strong>%s</strong> requires <strong><a href="https://codecanyon.net/item/visual-composer-page-builder-for-wordpress/242431" target="_blank">Visual Composer</a></strong> plugin to be installed and activated on your site.', 'apaw_easysoftonic_company'), $apaw_plugin_data['Name']).'</p>
        </div>';
    }
}
// Finally initialize code
new APAW_PricingTable();
    
	/*
    Show custom template For Pricing Tables
    */
add_action( 'vc_load_default_templates_action','apaw_pricing_temp_for_vc' ); // Hook in
 
function apaw_pricing_temp_for_vc() {
  $data = array(); // Create new array
  $data['name'] = __( 'Pricing Table Template', 'apaw_easysoftonic_company' ); // Assign name for your custom template
  $data['weight'] = 0; // Weight of your template in the template list
  $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'assets/images/module-icon.png', __FILE__ ) ); // Always use preg replace to be sure that "space" will not break logic. Thumbnail should have this dimensions: 114x154px
  $data['custom_class'] = 'apaw_pricing_for_vc_custom_template'; // CSS class name
  $data['content']  = <<<CONTENT
  [vc_row][vc_column width="1/3"][vc_empty_space height="40px" woodmart_hide_large="0" woodmart_hide_medium="0" woodmart_hide_small="0" woodmart_hide_extra_small="0"][es_pricing_table_module_vc title="Basic Plan" description="The argument in favor of using to filler text goes something." price="$29" pricing_time="monthly" feature_lists="%5B%7B%22feature_item%22%3A%2224%2F7%20system%20monitoring%22%2C%22icon_item%22%3A%22fas%20fa-check%22%2C%22active%22%3A%22no-active%22%7D%2C%7B%22feature_item%22%3A%22Security%20management%22%2C%22icon_item%22%3A%22fas%20fa-check%22%2C%22active%22%3A%22active%22%7D%2C%7B%22feature_item%22%3A%22Secure%20finance%20backup%22%2C%22icon_item%22%3A%22fas%20fa-check%22%2C%22active%22%3A%22no-active%22%7D%2C%7B%22feature_item%22%3A%22Secure%20finance%20backup%22%2C%22icon_item%22%3A%22fas%20fa-times%22%2C%22active%22%3A%22active%22%7D%5D" text_button="Get a free trial" link_button="url:%23" hover_zoom_style="hoverzoom" preset_color="preset3"][/vc_column][vc_column width="1/3"][es_pricing_table_module_vc recommended="Recommended" title="Extended Plan" description="The argument in favor of using to filler text goes something." price="$59" pricing_time="monthly" feature_lists="%5B%7B%22feature_item%22%3A%2224%2F7%20system%20monitoring%22%2C%22icon_item%22%3A%22fas%20fa-check%22%2C%22active%22%3A%22no-active%22%7D%2C%7B%22feature_item%22%3A%22Security%20management%22%2C%22icon_item%22%3A%22fas%20fa-check%22%2C%22active%22%3A%22active%22%7D%2C%7B%22feature_item%22%3A%22Secure%20finance%20backup%22%2C%22icon_item%22%3A%22fas%20fa-check%22%2C%22active%22%3A%22no-active%22%7D%2C%7B%22feature_item%22%3A%22Secure%20finance%20backup%22%2C%22icon_item%22%3A%22fas%20fa-times%22%2C%22active%22%3A%22active%22%7D%5D" text_button="Get a free trial" link_button="url:%23" preset_color="preset3"][/vc_column][vc_column width="1/3"][vc_empty_space height="40px" woodmart_hide_large="0" woodmart_hide_medium="0" woodmart_hide_small="0" woodmart_hide_extra_small="0"][es_pricing_table_module_vc recommended="New" title="Basic Plan" description="The argument in favor of using to filler text goes something." price="$29" pricing_time="monthly" feature_lists="%5B%7B%22feature_item%22%3A%2224%2F7%20system%20monitoring%22%2C%22icon_item%22%3A%22fas%20fa-check%22%2C%22active%22%3A%22no-active%22%7D%2C%7B%22feature_item%22%3A%22Security%20management%22%2C%22icon_item%22%3A%22fas%20fa-check%22%2C%22active%22%3A%22active%22%7D%2C%7B%22feature_item%22%3A%22Secure%20finance%20backup%22%2C%22icon_item%22%3A%22fas%20fa-check%22%2C%22active%22%3A%22no-active%22%7D%2C%7B%22feature_item%22%3A%22Secure%20finance%20backup%22%2C%22icon_item%22%3A%22fas%20fa-check%22%2C%22active%22%3A%22active%22%7D%5D" text_button="Get a free trial" link_button="url:%23" recommended_style="recommendstyle2" preset_color="preset3"][/vc_column][/vc_row][vc_row][vc_column width="1/3"][es_pricing_table_module_vc table_style="style2" title="Basic Plan" price="$29" pricing_time="monthly" feature_lists="%5B%7B%22feature_item%22%3A%2224%2F7%20system%20monitoring%22%2C%22icon_item%22%3A%22fas%20fa-check%22%2C%22active%22%3A%22no-active%22%7D%2C%7B%22feature_item%22%3A%22Security%20management%22%2C%22icon_item%22%3A%22fas%20fa-check%22%2C%22active%22%3A%22active%22%7D%2C%7B%22feature_item%22%3A%22Secure%20finance%20backup%22%2C%22icon_item%22%3A%22fas%20fa-check%22%2C%22active%22%3A%22no-active%22%7D%2C%7B%22feature_item%22%3A%22Secure%20finance%20backup%22%2C%22icon_item%22%3A%22fas%20fa-times%22%2C%22active%22%3A%22active%22%7D%5D" text_button="Get a free trial" link_button="url:%23" custom_color_title_bg="#c10707" custom_color_bg_price_time="#e23131" custom_color="#e23131"][/vc_column][vc_column width="1/3"][es_pricing_table_module_vc table_style="style2" recommended="New" title="Extended Plan" price="$59" pricing_time="monthly" feature_lists="%5B%7B%22feature_item%22%3A%2224%2F7%20system%20monitoring%22%2C%22icon_item%22%3A%22fas%20fa-check%22%2C%22active%22%3A%22no-active%22%7D%2C%7B%22feature_item%22%3A%22Security%20management%22%2C%22icon_item%22%3A%22fas%20fa-check%22%2C%22active%22%3A%22active%22%7D%2C%7B%22feature_item%22%3A%22Secure%20finance%20backup%22%2C%22icon_item%22%3A%22fas%20fa-check%22%2C%22active%22%3A%22no-active%22%7D%2C%7B%22feature_item%22%3A%22Secure%20finance%20backup%22%2C%22icon_item%22%3A%22fas%20fa-times%22%2C%22active%22%3A%22active%22%7D%5D" text_button="Get a free trial" link_button="url:%23" recommended_style="recommendstyle2" custom_color_title_bg="#000000" custom_color_bg_price_time="#424242" custom_color="#424242"][/vc_column][vc_column width="1/3"][es_pricing_table_module_vc table_style="style2" title="Basic Plan" price="$29" pricing_time="monthly" feature_lists="%5B%7B%22feature_item%22%3A%2224%2F7%20system%20monitoring%22%2C%22icon_item%22%3A%22fas%20fa-check%22%2C%22active%22%3A%22no-active%22%7D%2C%7B%22feature_item%22%3A%22Security%20management%22%2C%22icon_item%22%3A%22fas%20fa-check%22%2C%22active%22%3A%22active%22%7D%2C%7B%22feature_item%22%3A%22Secure%20finance%20backup%22%2C%22icon_item%22%3A%22fas%20fa-check%22%2C%22active%22%3A%22no-active%22%7D%2C%7B%22feature_item%22%3A%22Secure%20finance%20backup%22%2C%22icon_item%22%3A%22fas%20fa-check%22%2C%22active%22%3A%22active%22%7D%5D" text_button="Get a free trial" link_button="url:%23" custom_color_title_bg="#048df9" custom_color_bg_price_time="#49a7f3" custom_color="#49a7f3"][/vc_column][/vc_row][vc_row][vc_column width="1/3"][es_pricing_table_module_vc table_style="style2" title="Basic Plan" price="$29" pricing_time="monthly" feature_lists="%5B%7B%22feature_item%22%3A%2224%2F7%20system%20monitoring%22%2C%22icon_item%22%3A%22fas%20fa-check%22%2C%22active%22%3A%22no-active%22%7D%2C%7B%22feature_item%22%3A%22Security%20management%22%2C%22icon_item%22%3A%22fas%20fa-check%22%2C%22active%22%3A%22active%22%7D%2C%7B%22feature_item%22%3A%22Secure%20finance%20backup%22%2C%22icon_item%22%3A%22fas%20fa-check%22%2C%22active%22%3A%22no-active%22%7D%2C%7B%22feature_item%22%3A%22Secure%20finance%20backup%22%2C%22icon_item%22%3A%22fas%20fa-times%22%2C%22active%22%3A%22active%22%7D%5D" text_button="Get a free trial" link_button="url:%23" price_circle_style="pricecircle" custom_color_title_bg="#c10707" custom_color_bg_price_time="#e23131" custom_color="#e23131"][/vc_column][vc_column width="1/3"][es_pricing_table_module_vc table_style="style2" title="Extended Plan" price="$59" pricing_time="monthly" feature_lists="%5B%7B%22feature_item%22%3A%2224%2F7%20system%20monitoring%22%2C%22icon_item%22%3A%22fas%20fa-check%22%2C%22active%22%3A%22no-active%22%7D%2C%7B%22feature_item%22%3A%22Security%20management%22%2C%22icon_item%22%3A%22fas%20fa-check%22%2C%22active%22%3A%22active%22%7D%2C%7B%22feature_item%22%3A%22Secure%20finance%20backup%22%2C%22icon_item%22%3A%22fas%20fa-check%22%2C%22active%22%3A%22no-active%22%7D%2C%7B%22feature_item%22%3A%22Secure%20finance%20backup%22%2C%22icon_item%22%3A%22fas%20fa-times%22%2C%22active%22%3A%22active%22%7D%5D" text_button="Get a free trial" link_button="url:%23" price_circle_style="pricecircle" custom_color_title_bg="#000000" custom_color_bg_price_time="#424242" custom_color="#424242"][/vc_column][vc_column width="1/3"][es_pricing_table_module_vc table_style="style2" title="Basic Plan" price="$29" pricing_time="monthly" feature_lists="%5B%7B%22feature_item%22%3A%2224%2F7%20system%20monitoring%22%2C%22icon_item%22%3A%22fas%20fa-check%22%2C%22active%22%3A%22no-active%22%7D%2C%7B%22feature_item%22%3A%22Security%20management%22%2C%22icon_item%22%3A%22fas%20fa-check%22%2C%22active%22%3A%22active%22%7D%2C%7B%22feature_item%22%3A%22Secure%20finance%20backup%22%2C%22icon_item%22%3A%22fas%20fa-check%22%2C%22active%22%3A%22no-active%22%7D%2C%7B%22feature_item%22%3A%22Secure%20finance%20backup%22%2C%22icon_item%22%3A%22fas%20fa-check%22%2C%22active%22%3A%22active%22%7D%5D" text_button="Get a free trial" link_button="url:%23" price_circle_style="pricecircle" custom_color_title_bg="#048df9" custom_color_bg_price_time="#49a7f3" custom_color="#49a7f3"][/vc_column][/vc_row][vc_row][vc_column width="1/3"][es_pricing_table_module_vc table_style="style3" title="Basic Plan" price="$29" pricing_time="monthly" feature_lists="%5B%7B%22feature_item%22%3A%2224%2F7%20system%20monitoring%22%2C%22icon_item%22%3A%22fas%20fa-check%22%2C%22active%22%3A%22no-active%22%7D%2C%7B%22feature_item%22%3A%22Security%20management%22%2C%22icon_item%22%3A%22fas%20fa-check%22%2C%22active%22%3A%22active%22%7D%2C%7B%22feature_item%22%3A%22Secure%20finance%20backup%22%2C%22icon_item%22%3A%22fas%20fa-check%22%2C%22active%22%3A%22no-active%22%7D%2C%7B%22feature_item%22%3A%22Secure%20finance%20backup%22%2C%22icon_item%22%3A%22fas%20fa-times%22%2C%22active%22%3A%22active%22%7D%5D" text_button="Order Now" link_button="url:%23" button_style="btnstyle2" custom_color_title_bg="#2ecc71" custom_color_price_time="#2ecc71" custom_color_bg_price_time="#f6f6f6" custom_color="#2ecc71"][/vc_column][vc_column width="1/3"][es_pricing_table_module_vc table_style="style3" title="Extended Plan" price="$59" pricing_time="monthly" feature_lists="%5B%7B%22feature_item%22%3A%2224%2F7%20system%20monitoring%22%2C%22icon_item%22%3A%22fas%20fa-check%22%2C%22active%22%3A%22no-active%22%7D%2C%7B%22feature_item%22%3A%22Security%20management%22%2C%22icon_item%22%3A%22fas%20fa-check%22%2C%22active%22%3A%22active%22%7D%2C%7B%22feature_item%22%3A%22Secure%20finance%20backup%22%2C%22icon_item%22%3A%22fas%20fa-check%22%2C%22active%22%3A%22no-active%22%7D%2C%7B%22feature_item%22%3A%22Secure%20finance%20backup%22%2C%22icon_item%22%3A%22fas%20fa-times%22%2C%22active%22%3A%22active%22%7D%5D" text_button="Order Now" link_button="url:%23" button_style="btnstyle2" custom_color_title_bg="#630084" custom_color_price_time="#630084" custom_color_bg_price_time="#f6f6f6" custom_color="#630084"][/vc_column][vc_column width="1/3"][es_pricing_table_module_vc table_style="style3" title="Basic Plan" price="$29" pricing_time="monthly" feature_lists="%5B%7B%22feature_item%22%3A%2224%2F7%20system%20monitoring%22%2C%22icon_item%22%3A%22fas%20fa-check%22%2C%22active%22%3A%22no-active%22%7D%2C%7B%22feature_item%22%3A%22Security%20management%22%2C%22icon_item%22%3A%22fas%20fa-check%22%2C%22active%22%3A%22active%22%7D%2C%7B%22feature_item%22%3A%22Secure%20finance%20backup%22%2C%22icon_item%22%3A%22fas%20fa-check%22%2C%22active%22%3A%22no-active%22%7D%2C%7B%22feature_item%22%3A%22Secure%20finance%20backup%22%2C%22icon_item%22%3A%22fas%20fa-check%22%2C%22active%22%3A%22active%22%7D%5D" text_button="Order Now" link_button="url:%23" button_style="btnstyle2" custom_color_title_bg="#ff5722" custom_color_price_time="#ff5722" custom_color_bg_price_time="#f6f6f6" custom_color="#ff5722"][/vc_column][/vc_row]
CONTENT;
  
  vc_add_default_templates( $data );
}