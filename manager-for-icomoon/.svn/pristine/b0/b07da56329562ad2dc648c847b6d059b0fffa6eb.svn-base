<?php

namespace managerForIcomoon ; 

class Settings {
    private $page_slug ;

	public function __construct(){
		add_action('admin_init', array( $this,'register_settings_and_fields'));
	}

	// Tous les paramètres et la configuration des champs utilisé dans wordpress
    public function register_settings_and_fields() {

        register_setting('managerforicomoon_options',
                         'managerforicomoon_options');
        
        // SETTINGS SECTION : Main #############################################
        add_settings_section(
            'managerforicomoon_settings_section_main', 
            __( "Main settings", 'managerforicomoon'), 
            array( $this,'html_section_callback'), 
            Core::getPluginSlug()
        );
       
        add_settings_field(
            'gutenberg_button_html', 
            __( "Editor HTML button", 'managerforicomoon'), 
            array( $this,'html_generic_yesno_callback'), 
            Core::getPluginSlug(), 
            'managerforicomoon_settings_section_main',
            array(
                'name'=>'gutenberg_button_html',
                'description' => __( "Activate the Gutenberg editor button to insert icons directly in HTML.", 'managerforicomoon'
            )
        ));
        add_settings_field(
            'gutenberg_button_shortcode', 
            __( "Editor shortcode button", 'managerforicomoon'), 
            array( $this,'html_generic_yesno_callback'), 
            Core::getPluginSlug(), 
            'managerforicomoon_settings_section_main',
            array(
                'name'=>'gutenberg_button_shortcode',
                'description' => __( "Activate the Gutenberg editor button to insert icons using a shortcode.", 'managerforicomoon'
            )
        ));
        add_settings_field(
            'shortcode', 
            __( "Shortcode", 'managerforicomoon'), 
            array( $this,'html_generic_text_callback'), 
            Core::getPluginSlug(), 
            'managerforicomoon_settings_section_main',
            array(
                'name'=>'shortcode',
                'description' => __( "Shortcode used to insert an icon", 'managerforicomoon')
        ));
        add_settings_field(
            'minify_css', 
            __( "Minify CSS", 'managerforicomoon'), 
            array( $this,'html_generic_yesno_callback'), 
            Core::getPluginSlug(), 
            'managerforicomoon_settings_section_main',
            array(
                'name'=>'minify_css',
                'description' => __( "Use a minified version of CSS", 'managerforicomoon'
            )
        ));

        add_settings_section('managerforicomoon_settings_section_icomoon', 
                            __( "Icomoon font settings", 'managerforicomoon'), 
                            '', 
                            Core::getPluginSlug());

        add_settings_field(
            'class_prefix', 
            __( "Class prefix", 'managerforicomoon'), 
            array( $this,'html_generic_text_callback'), 
            Core::getPluginSlug(), 
            'managerforicomoon_settings_section_icomoon',
            array(
                'name'=>'class_prefix',
                'description' => __( "Class prefix set in Icomoon font settings", 'managerforicomoon')
            )
        );
        add_settings_field(
            'class_postfix', 
            __( "Class postfix", 'managerforicomoon'), 
            array( $this,'html_generic_text_callback'), 
            Core::getPluginSlug(), 
            'managerforicomoon_settings_section_icomoon',
            array(
                'name'=>'class_postfix',
                'description' => __( "Class postfix set in Icomoon font settings", 'managerforicomoon')
            )
        );
        add_settings_field(
            'css_selector', 
            __( "CSS selector", 'managerforicomoon'), 
            array( $this,'html_generic_select_callback'), 
            Core::getPluginSlug(), 
            'managerforicomoon_settings_section_icomoon',
            array(
                'name'=>'css_selector',
                'description' => __( "Method used to display icon", 'managerforicomoon'),
                'options'=>array( 
                    __( "Use &lt;i>", 'managerforicomoon') => 'i',
                    __( "Use &lt;span>", 'managerforicomoon') => 'span',
                    __( "Use a class", 'managerforicomoon') => 'class'
                )
            )
        );
        add_settings_field(
            'css_class', 
            __( "CSS class", 'managerforicomoon'), 
            array( $this,'html_generic_text_callback'), 
            Core::getPluginSlug(), 
            'managerforicomoon_settings_section_icomoon',
            array(
                'name'=>'css_class',
                'description' => __( 'Only needed if using "Use a class" as CSS selector', 'managerforicomoon')
            )
        );
    }
 
	function html_section_callback($arg) {
        echo '<p>title: ' . $arg['title'] . '</p>'; 
    }
    
    function html_generic_yesno_callback($option) {
        $name = $option['name'];
        $value = Options::get($name);
        ?>
        <input type="radio" name="managerforicomoon_options[<?php echo $name; ?>]" value="yes" checked="checked"/> <?php _e( "yes", 'managerforicomoon'); ?>
        <input type="radio" name="managerforicomoon_options[<?php echo $name; ?>]" value="no" <?php if($value=='no'){ echo ' checked="checked"';}?> /> <?php _e( "no", 'managerforicomoon'); ?>
        <?php if(isset($option['description'])) : ?>
            <p class="description"><?php echo $option['description'].' '.$this->html_default_value_txt($name) ; ?></p>
        <?php	endif;	
    }
    function html_generic_text_callback($option) {
        $name = $option['name'];
        $value = Options::get($name);
        ?>
        <input type="text" name="managerforicomoon_options[<?php echo $name; ?>]" value="<?php echo $value; ?>"/>
        <?php if(isset($option['description'])) : ?>
            <p class="description"><?php echo $option['description'].' '.$this->html_default_value_txt($name) ; ?></p>
        <?php	endif; 
    }
    function html_generic_color_callback($option) {
        $name = $option['name'];
        $value = Options::get($name);
        ?>
        <input type="text" name="managerforicomoon_options[<?php echo $name; ?>]" class="managerforicomoon-color" value="<?php echo $value; ?>"/>
        <?php if(isset($option['description'])) : ?>
            <p class="description"><?php echo $option['description'].' '.$this->html_default_value_txt($name) ; ?></p>
        <?php	endif; 
    }
    function html_generic_longtext_callback($option) {
        $name = $option['name'];
        $value = Options::get($name);
        ?>
        <textarea name="managerforicomoon_options[<?php echo $name; ?>]"><?php echo $value; ?></textarea>
        <?php if(isset($option['description'])) : ?>
            <p class="description"><?php echo $option['description'].' '.$this->html_default_value_txt($name) ; ?></p>
        <?php	endif; 
    }
    function html_generic_integer_callback($option) {
        $name = $option['name'];
        $value = Options::get($name);
        ?>
        <input type="text" name="managerforicomoon_options[<?php echo $name; ?>]" value="<?php echo $value; ?>"/>
        <?php if(isset($option['description'])) : ?>
            <p class="description"><?php echo $option['description'].' '.$this->html_default_value_txt($name) ; ?></p>
        <?php	endif; 
    }
    function html_generic_select_callback($option) {
        $name = $option['name'];
        $value = Options::get($name);
        ?>
        <select name="managerforicomoon_options[<?php echo $name; ?>]">
            <?php foreach($option['options'] as $option_txt => $option_value) :?>
                <option value="<?php echo $option_value ;?>"<?php if($value==$option_value){ echo ' selected="selected"';}?>>
					<?php echo $option_txt; ?>
				</option>
            <?php endforeach; ?>    
        </select>
		<?php if(isset($option['description'])) : ?>
            <p class="description"><?php echo $option['description'].' '.$this->html_default_value_txt($name) ; ?></p>
        <?php	endif;	
		
    }
    
    function html_generic_hidden_callback($option) {
        $name = $option['name'];
        $value = Options::get($name);
        ?>
        <input type="hidden" name="managerforicomoon_options[<?php echo $name; ?>]" value="<?php echo $value; ?>"/>
        <?php
    }

    function html_content_type_callback($option) {
        $name = $option['name'];
        $value = Options::get($name);
        ?>
        <input type="radio" name="managerforicomoon_options[<?php echo $name; ?>]" value="all" checked="checked"/> <?php _e( "All", 'managerforicomoon'); ?>
        <input type="radio" name="managerforicomoon_options[<?php echo $name; ?>]" value="pages" <?php if($value=='pages'){ echo ' checked="checked"';}?> /> <?php _e( "Pages", 'managerforicomoon'); ?>
        <input type="radio" name="managerforicomoon_options[<?php echo $name; ?>]" value="posts" <?php if($value=='posts'){ echo ' checked="checked"';}?> /> <?php _e( "Posts", 'managerforicomoon'); ?>
        <?php if(isset($option['description'])) : ?>
            <p class="description"><?php echo $option['description'].' '.$this->html_default_value_txt($name) ; ?></p>
        <?php	endif;	
    }
    
    function html_default_value_txt($option){
        if(Options::$plugin_options_default[$option]){
            return "(".__( "default value:", 'managerforicomoon').' '.Options::$plugin_options_default[$option].")" ;
        }
    }



    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize( $input ){
        $new_input = array();
        if( isset( $input['id_number'] ) )
            $new_input['id_number'] = absint( $input['id_number'] );

        if( isset( $input['title'] ) )
            $new_input['title'] = sanitize_text_field( $input['title'] );

        return $new_input;
    }
}
