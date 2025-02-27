<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://technifyguru.com/
 * @since      1.0.0
 *
 * @package    Tgqb
 * @subpackage Tgqb/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Tgqb
 * @subpackage Tgqb/admin
 * @author     Technify Guru <contact@technifyguru.com>
 */
class Tgqb_Styling {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Tgqb_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Tgqb_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/tgqb-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Tgqb_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Tgqb_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/tgqb-admin.js', array( 'jquery' ), $this->version, false );

	}


	// Register and define setting fields
	public function tgqb_register_styling_fields () {

		register_setting('tgqb_styling', 'tgqb_styling');

		/** 
		 * Settings fields for left quantity button 
		 */
		add_settings_section('tgqb_section_lb', 'Left Button', '', 'tgqb_styling');
        
        // Padding fields
		add_settings_field('tgqb_field_padding_lb', 'Padding', [$this, 'tgqb_render_button_padding'], 'tgqb_styling', 'tgqb_section_lb', ['button'=>'lb']);

        // Margin fields
		add_settings_field('tgqb_field_margin_lb', 'Margin', [$this, 'tgqb_render_button_margin'], 'tgqb_styling', 'tgqb_section_lb', ['button'=>'lb']);

        // Border fields
		add_settings_field('tgqb_field_border_lb', 'Border', [$this, 'tgqb_render_button_border'], 'tgqb_styling', 'tgqb_section_lb', ['button'=>'lb']);

        // Color fields
		add_settings_field('tgqb_field_color_lb', 'Button Colors', [$this, 'tgqb_render_button_color'], 'tgqb_styling', 'tgqb_section_lb', ['button'=>'lb']);


		/** 
		 * Settings fields for right quantity button 
		 *  */
		add_settings_section('tgqb_section_rb', 'Right Button', '', 'tgqb_styling');
        
        // Padding fields
		add_settings_field('tgqb_field_padding_rb', 'Padding', [$this, 'tgqb_render_button_padding'], 'tgqb_styling', 'tgqb_section_rb', ['button'=>'rb']);

        // Margin fields
		add_settings_field('tgqb_field_margin_rb', 'Margin', [$this, 'tgqb_render_button_margin'], 'tgqb_styling', 'tgqb_section_rb', ['button'=>'rb']);

        // Border fields
		add_settings_field('tgqb_field_border_rb', 'Border', [$this, 'tgqb_render_button_border'], 'tgqb_styling', 'tgqb_section_rb', ['button'=>'rb']);

        // Color fields
		add_settings_field('tgqb_field_color_rb', 'Button Colors', [$this, 'tgqb_render_button_color'], 'tgqb_styling', 'tgqb_section_rb', ['button'=>'rb']);

	}

	// Render the padding fields 
	public function tgqb_render_button_padding ($args=[]) {
		// First, we read the options collection
		$options = get_option('tgqb_styling');
		$button = $args['button'];
		?>
		<div class="tgqb-d-flex">
    		<label class="center">
    		    <div>Top</div>
    			<input type="number" name="tgqb_styling[tgqb_field_<?php echo $button; ?>_padding_top]" size="2" value="<?php echo isset($options['tgqb_field_'.$button.'_padding_top']) ? $options['tgqb_field_'.$button.'_padding_top'] : "";?>">
    		</label>
    		<label class="center">
    		    <div>Right</div>
    			<input type="number" name="tgqb_styling[tgqb_field_<?php echo $button; ?>_padding_right]" size="2" value="<?php echo isset($options['tgqb_field_'.$button.'_padding_right']) ? $options['tgqb_field_'.$button.'_padding_right'] : "";?>">
    		</label>
    		<label class="center">
    		    <div>Bottom</div>
    			<input type="number" name="tgqb_styling[tgqb_field_<?php echo $button; ?>_padding_bottom]" size="2" value="<?php echo isset($options['tgqb_field_'.$button.'_padding_bottom']) ? $options['tgqb_field_'.$button.'_padding_bottom'] : "";?>">
    		</label>
    		<label class="center">
    		    <div>Left</div>
    			<input type="number" name="tgqb_styling[tgqb_field_<?php echo $button; ?>_padding_left]" size="2" value="<?php echo isset($options['tgqb_field_'.$button.'_padding_left']) ? $options['tgqb_field_'.$button.'_padding_left'] : "";?>">
    		</label>
    	</div>
		<?php
	}

	// Render the margin fields 
	public function tgqb_render_button_margin ($args=[]) {
		// First, we read the options collection
		$options = get_option('tgqb_styling');
		$button = $args['button'];
		?>
		<div class="tgqb-d-flex">
    		<label class="center">
    		    <div>Top</div>
    			<input type="number" name="tgqb_styling[tgqb_field_<?php echo $button; ?>_margin_top]" size="2" value="<?php echo isset($options['tgqb_field_'.$button.'_margin_top']) ? $options['tgqb_field_'.$button.'_margin_top'] : "";?>">
    		</label>
    		<label class="center">
    		    <div>Right</div>
    			<input type="number" name="tgqb_styling[tgqb_field_<?php echo $button; ?>_margin_right]" size="2" value="<?php echo isset($options['tgqb_field_'.$button.'_margin_right']) ? $options['tgqb_field_'.$button.'_margin_right'] : "";?>">
    		</label>
    		<label class="center">
    		    <div>Bottom</div>
    			<input type="number" name="tgqb_styling[tgqb_field_<?php echo $button; ?>_margin_bottom]" size="2" value="<?php echo isset($options['tgqb_field_'.$button.'_margin_bottom']) ? $options['tgqb_field_'.$button.'_margin_bottom'] : "";?>">
    		</label>
    		<label class="center">
    		    <div>Left</div>
    			<input type="number" name="tgqb_styling[tgqb_field_<?php echo $button; ?>_margin_left]" size="2" value="<?php echo isset($options['tgqb_field_'.$button.'_margin_left']) ? $options['tgqb_field_'.$button.'_margin_left'] : "";?>">
    		</label>
    	</div>
		<?php
	}

	// Render the border fields 
	public function tgqb_render_button_border ($args=[]) {
		// First, we read the options collection
		$options = get_option('tgqb_styling');
		$button = $args['button'];
		$tgqb_button_border = [
		    'none'=>'None',
		    'hidden'=>'Hidden',
		    'solid'=>'Solid',
		    'dotted'=>'Dotted',
		    'dashed'=>'Dashed',
		    'double'=>'Double',
		    'grooved'=>'Grooved',
		    'ridge'=>'Ridge',
		    'inset'=>'Inset',
		    'outset'=>'Outset',
		    ];
		?>
		<select name="tgqb_styling[tgqb_field_<?php echo $button; ?>_border_style]">
		    <?php foreach ($tgqb_button_border as $val=>$border) { ?>
    		    <option value="<?php echo $val; ?>" <?php if (isset($options['tgqb_field_'.$button.'_border_style']) && $val == $options['tgqb_field_'.$button.'_border_style']) echo 'selected="selected"'; ?>>
    		        <?php echo $border; ?>
    		    </option>
		    <?php } ?>
		</select>

		<h4></h4>
        <label for="border-color-left">Color: </label>
        <input type="color" id="border-color-left" name="tgqb_styling[tgqb_field_<?php echo $button; ?>_border_color]" value="<?php echo isset($options['tgqb_field_'.$button.'_border_color']) ? $options['tgqb_field_'.$button.'_border_color'] : "";?>">

		<h4>Width</h4>
		<div class="tgqb-d-flex">
            <label class="center">
    		    <div>Top</div>
    			<input type="number" name="tgqb_styling[tgqb_field_<?php echo $button; ?>_border_top]" size="2" value="<?php echo isset($options['tgqb_field_'.$button.'_border_top']) ? $options['tgqb_field_'.$button.'_border_top'] : "";?>">
    		</label>
    		<label class="center">
    		    <div>Right</div>
    			<input type="number" name="tgqb_styling[tgqb_field_<?php echo $button; ?>_border_right]" size="2" value="<?php echo isset($options['tgqb_field_'.$button.'_border_right']) ? $options['tgqb_field_'.$button.'_border_right'] : "";?>">
    		</label>
    		<label class="center">
    		    <div>Bottom</div>
    			<input type="number" name="tgqb_styling[tgqb_field_<?php echo $button; ?>_border_bottom]" size="2" value="<?php echo isset($options['tgqb_field_'.$button.'_border_bottom']) ? $options['tgqb_field_'.$button.'_border_bottom'] : "";?>">
    		</label>
    		<label class="center">
    		    <div>Left</div>
    			<input type="number" name="tgqb_styling[tgqb_field_<?php echo $button; ?>_border_left]" size="2" value="<?php echo isset($options['tgqb_field_'.$button.'_border_left']) ? $options['tgqb_field_'.$button.'_border_left'] : "";?>">
    		</label>
    	</div>
    	
		<h4>Radius</h4>
		<div class="tgqb-d-flex">
            <label class="center">
    		    <div>Top</div>
    			<input type="number" name="tgqb_styling[tgqb_field_<?php echo $button; ?>_border_radius_top]" size="2" value="<?php echo isset($options['tgqb_field_'.$button.'_border_radius_top']) ? $options['tgqb_field_'.$button.'_border_radius_top'] : "";?>">
    		</label>
    		<label class="center">
    		    <div>Right</div>
    			<input type="number" name="tgqb_styling[tgqb_field_<?php echo $button; ?>_border_radius_right]" size="2" value="<?php echo isset($options['tgqb_field_'.$button.'_border_radius_right']) ? $options['tgqb_field_'.$button.'_border_radius_right'] : "";?>">
    		</label>
    		<label class="center">
    		    <div>Bottom</div>
    			<input type="number" name="tgqb_styling[tgqb_field_<?php echo $button; ?>_border_radius_bottom]" size="2" value="<?php echo isset($options['tgqb_field_'.$button.'_border_radius_bottom']) ? $options['tgqb_field_'.$button.'_border_radius_bottom'] : "";?>">
    		</label>
    		<label class="center">
    		    <div>Left</div>
    			<input type="number" name="tgqb_styling[tgqb_field_<?php echo $button; ?>_border_radius_left]" size="2" value="<?php echo isset($options['tgqb_field_'.$button.'_border_radius_left']) ? $options['tgqb_field_'.$button.'_border_radius_left'] : "";?>">
    		</label>
    	</div>
		<?php
	}
    
	// Render the color fields 
	public function tgqb_render_button_color ($args=[]) {
		// First, we read the options collection
		$options = get_option('tgqb_styling');
		$button = $args['button'];
		?>
		<p><strong>Normal</strong></p>
        <label for="bgcolorn">Background color</label>
        <input type="color" id="bgcolorn" name="tgqb_styling[tgqb_field_<?php echo $button; ?>_bg_color_n]" value="<?php echo isset($options['tgqb_field_'.$button.'_bg_color_n']) ? $options['tgqb_field_'.$button.'_bg_color_n'] : "";?>">
        <label for="textcolorn">Text color:</label>
        <input type="color" id="textcolorn" name="tgqb_styling[tgqb_field_<?php echo $button; ?>_text_color_n]" value="<?php echo isset($options['tgqb_field_'.$button.'_text_color_n']) ? $options['tgqb_field_'.$button.'_text_color_n'] : "";?>">

		<p><strong>Hover</strong></p>
        <label for="bgcolorh">Background color</label>
        <input type="color" id="bgcolorh" name="tgqb_styling[tgqb_field_<?php echo $button; ?>_bg_color_h]" value="<?php echo isset($options['tgqb_field_'.$button.'_bg_color_h']) ? $options['tgqb_field_'.$button.'_bg_color_h'] : "";?>">
        
        <label for="textcolorh">Text color:</label>
        <input type="color" id="textcolorh" name="tgqb_styling[tgqb_field_<?php echo $button; ?>_text_color_h]" value="<?php echo isset($options['tgqb_field_'.$button.'_text_color_h']) ? $options['tgqb_field_'.$button.'_text_color_h'] : "";?>">

		<?php
	}
	
}
