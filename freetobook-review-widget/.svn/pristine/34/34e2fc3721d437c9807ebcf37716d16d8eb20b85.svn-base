<?php

/**
 * Plugin Name:     Freetobook review widget (legacy)
 * Plugin URI:      https://en.freetobook.com/developers/wordpress.php
 * Description:     Freetobook Review Widget for wordpress (legacy)
 * Version:         1.1
 * Author:          freetobook.com
 * Author URI:      https://en.freetobook.com
 * License:         GPL v2
 */

 
if (!class_exists("FreetobookReviewWidget")) 
{
    class FreetobookReviewWidget extends WP_Widget
	{
		private $widget_key;
  
        function __construct() 
		{ 
			/* list of possible styles */
			$this->styles=array('mini'=>'mini reviews',
								'reviews'=>'reviews',
								'combined'=>'combined',
								'narrow'=>'narrow search',
								'search'=>'search',
								'thin'=>'thin search'
								);								
			/* unique identifier for property */
			$this->widget_key=get_option('ftb_review_widget_key');
		
			/* Widget settings. */
			$widget_ops = array( 'classname' => 'FreetobookReviewWidget', 
								'description' => 'Add freetobook reviews to your wordpress site' );
	
			/* Widget control settings. */
			$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'freetobook_reviews' );   
			parent::__construct('freetobook_reviews','Freetobook Review Widget',$widget_ops,$control_ops); 
			
        }

		function add_settings_menu()
		{
			add_submenu_page('options-general.php', 'Review Widget Options', 
								'Freetobook Review Widget', 'activate_plugins', __FILE__, array(&$this, 'admin_page'));			
		}


		 function add_settings_link($links, $file) 
		 {
			static $this_plugin;
			if (!$this_plugin) $this_plugin = plugin_basename(__FILE__);
		 
			if ($file == $this_plugin)
			{
				$settings_link = '<a href="options-general.php?page=freetobook-review-widget/freetobook-review-widget.php">' . 
				                   __("Settings", "freetobook_reviews").'</a>';
			 array_unshift($links, $settings_link);
			}
			return $links;
		 }
		 
		 
		 function admin_page()
		 {
			 //must check that the user has the required capability 
			if (!current_user_can('manage_options')) {
			  wp_die( __('You do not have sufficient permissions to access this page.') );
			}

             $updated = $this->update_widget_settings($updateErrors);

				
			$this->widget_key=get_option('ftb_review_widget_key');
			
			 			 			 		 			 
			 			 
			$html='<div class="wrap">';
			
			$html.='<div id="icon-options-general" class="icon32"><br /></div><h2>Freetobook Review Widget Settings</h2>';

			if ($updated === true) {
			    $html.='<h3>Changes saved</h3>';
            }

			if (!empty($updateErrors)) {
                $html.='<h3>Error: ' . implode(', ', $updateErrors) . '</h3>';
            }

			$html.='
			<br />
			<br />
			<form method="post" action="options-general.php?page=freetobook-review-widget/freetobook-review-widget.php">';
	
			if ( function_exists('wp_nonce_field') )
				$html.=wp_nonce_field('freetobook_review_update','ftb_nonce',true,false);

			$html.='
			<table>
				<tr> 
					<td style="width:130px">Review Widget Key</td> 
					<td><input type="text" size="20" name="ftb-review-widget-key" value="' . esc_attr($this->widget_key) . '" ></td>
				</tr>

									
				
			</table>
				<p class="submit">
					<input type="submit" name="Submit" class="button-primary" value="' . 
					__('Save Changes', 'FreetobookReviewWidget') . '" /></p>
			</form>



			</div>
			';
			$html.='';
			echo  $html; 
		 }
		 
		 
	   function add_widget_stylesheet() 
	   {

		
	   }

	   function update_widget_settings(&$updateErrors = array())
       {
           $update = false;
           $updateErrors = array();

           if (!empty($_POST['ftb-review-widget-key'])) {
               $reviewWidgetKey = sanitize_text_field($_POST['ftb-review-widget-key']);
               if (preg_match('/^[a-z0-9]+$/i', $reviewWidgetKey) === 1) {
                   check_admin_referer('freetobook_review_update', 'ftb_nonce');
                   update_option('ftb_review_widget_key', $reviewWidgetKey);
                   $update = true;
               } else {
                   $updateErrors[] = "Invalid review widget key.";
               }
           }

           return $update;
       }

		
    function add_widget_scripts()
    {
        if (!is_admin()) {
            // instruction to only load if it is not the admin area
            // register your script location, dependencies and version
            wp_register_script(
                'freetobook-reviews-js',
                'https://static.freetobook.com/widgets/js/'. $this->widget_key .'.js' ,
                array(),
                '1.0'
            );

           // enqueue the script
           wp_enqueue_script('freetobook-reviews-js');
        } else {
           wp_enqueue_script(array('jquery', 'jquery-ui-core','jquery-ui-slider'));

           wp_register_script(
               'freetobook-reviews-js',
               plugins_url('/ftb_admin.js', __FILE__),
               array(),
               '1.0'
           );

           wp_enqueue_script('freetobook-reviews-js');
           $params = array('base_url' => plugin_dir_url(__FILE__));
           wp_localize_script('freetobook-reviews-js','freetobook_reviews_params',$params);
        }
    }

    function add_admin_widget_stylesheet()
    {
        wp_enqueue_style('jquery-ui-slider', plugins_url('/css/ui-lightness/jquery-ui-slider.min.css', __FILE__));
    }

    function load_widgets()
    {
        register_widget( 'FreetobookReviewWidget' );
    }

		 function get_widget_html($instance)
		 {
			 $html='';

			if (empty($instance['style']) ) return '';
			$width=(!empty($instance['width']))?$instance['width']:250;
			
			switch ($instance['style']) 
			{
				case 'mini'	:
					$html='<div class="ftb_widget ftb_review-mini" style="width:' . $width . 'px"></div>';
					break;
				case 'reviews':
					$html='<div class="ftb_widget ftb_review_w" style="width:' . $width . 'px"></div>';
					break;				
				case 'combined':
					$html='<div class="ftb_widget ftb_combined" style="width:' . $width . 'px"></div>';
					break;
				case 'narrow':
					$html='<div class="ftb_widget ftb_narrow" style="width:' . $width . 'px"></div>';
					break;
				case 'search':
					$html='<div class="ftb_widget ftb_search" style="width:' . $width . 'px"></div>';
					break;
				case 'thin':
					$html='<div class="ftb_widget ftb_thin" style="width:' . $width . 'px"></div>';
					break;			
			}


			 return $html; 
		 }
		 
		 
		 function widget($args,$instance) 
		 {
			extract($args);
			echo $before_widget;
			echo $this->get_widget_html($instance);
			echo $after_widget; 
		 }

		function form($instance)  
		{
			$style  = isset( $instance['style'] ) ? esc_attr( $instance['style'] ) : 'mini';
			$width = isset( $instance['width'] ) ? absint( $instance['width'] ) : 150;
			?>
            <br>
            <div class="ftb_review_widget_preview" id="ftb_review_widget_preview_<?php echo $this->number ?>" style="background-repeat:no-repeat;
            background-size:contain;float:right;
            width:170px;height:120px;
            background-position:center center;
            background-image:url(<?php echo plugins_url('/images/previews/' . $style .'.png', __FILE__) ?>)"></div>
            <strong>Style</strong><br>
            <br>
            <?php
			foreach ($this->styles as $type=>$name)
			{
				$checked=($style==$type)?' checked="checked" ':'';
				echo '<input class="ftbr_style_radio" type="radio" ';
				echo 'name="' . $this->get_field_name( 'style' ) . '" value="' . $type . '"  ' . $checked .  ' >' . $name . '<br>';
			}
			?>
			<br>
            <br>
            <div style="text-align:center;width:220px;margin:0 auto;">
            Width:<input readonly type="text" size="3"
            		id="ftb_review_width_<?php echo $this->number?>" 
            		name="<?php echo $this->get_field_name( 'width' ) ?>" 
                    value="<?php echo  $width ?>"
                    style="margin-right:50px"
                    >

            <div style="width:200px" id="ftb_review_slider_<?php echo $this->number?>" class="ftb_slider"></div>

			</div>
            <br><br>
            <?php
			
		// outputs the options form on admin
		}
				 
		function update($new_instance, $old_instance) 
		{
			// processes widget options to be saved
			$instance = $old_instance;
			$instance['style'] = strip_tags($new_instance['style']);
			$instance['width'] = $new_instance['width'];
	
			return $instance;			
		}
 
		 
    }
 
} 


if (class_exists("FreetobookReviewWidget")) 
{
    $ftb_review_widget = new FreetobookReviewWidget();
}


if (isset($ftb_review_widget)) 
{
	add_filter('plugin_action_links', array(&$ftb_review_widget, 'add_settings_link'), 10, 2 );
	add_action('admin_menu',array(&$ftb_review_widget,'add_settings_menu'));
	add_action('widgets_init',array(&$ftb_review_widget,'load_widgets'));
    add_action('admin_print_styles', array(&$ftb_review_widget,'add_admin_widget_stylesheet'));

	add_action('init', array(&$ftb_review_widget,'add_widget_scripts'));
}
