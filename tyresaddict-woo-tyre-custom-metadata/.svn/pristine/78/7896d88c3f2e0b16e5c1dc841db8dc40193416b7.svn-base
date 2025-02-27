<?php

/**
 * Option page of the plugin.
 *
 * @since      1.0.0
 * @package    TyresAddict
 * @subpackage TyresAddict/Finder/includes
 * @author     TyresAddict
 * @link       http://b2b.tyresaddict.com
 */

namespace TyresAddict\TCM;



class PageOptions
{
	const Slug 	= 'tyresaddict-woo-tcm-option-page';

	private $options = [];

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 */
	public function __construct() 
	{
		add_action( 'admin_menu', [ $this, 'admin_menu' ], 20 );	
        add_action( 'admin_init', [ $this, 'admin_init' ] );
	}

	function page() 
	{
		if ( !current_user_can( 'manage_options' ) )  {
			wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
		}

        $this->options = get_option( PluginOptions::OptionGroup );
        ?>
        <div class="wrap">
            <h1 class="wp-heading-inline"><?=__('Tyre Custom Metadata options', Plugin::lang) ?></h1>
            <form method="post" action="options.php" enctype="multipart/form-data">
            <?php
                settings_fields( PluginOptions::OptionGroup );
                do_settings_sections( PageOptions::Slug );
                submit_button();
            ?>
            </form>
        </div>
        <?php
	}

	function handle_check_option($option, $name)
	{
		if( isset( $option[ $name ] ) && $option[ $name ] == 'on' )		$option[ $name ] = true;
		else                                                      		$option[ $name ] = false;

		return $option;
	}

	function handle_options($option)
	{
		// tabs options
		         
		$flags = [ 	'show_spec_full', 'show_spec_size',
					'show_brand_model',
					'show_car_type', 'show_suv_type', 
					'show_season', 'show_indexes',

					// product - wheel

					'show_wheel_spec_full', 'show_wheel_spec_size',
					'show_wheel_brand_model',
					'show_wheel_type', 'show_wheel_color',
		];

		foreach( $flags as $flag )
		{
			$option = $this->handle_check_option( $option, $flag );
	    }

		// tyre & wheel category ids

		if ( isset( $option['tyre_category'] ) )
		{
			$term = get_term_by('slug', $option['tyre_category'], 'product_cat');
			$option['tyre_category_id'] = $term->term_id;
		}

		if ( isset( $option['wheel_category'] ) )
		{
			$term = get_term_by('slug', $option['wheel_category'], 'product_cat');
			$option['wheel_category_id'] = $term->term_id;
		}

    	return $option;
	}
    
	public function admin_init()
    {        
        register_setting(
            PluginOptions::OptionGroup, 	// Option group
            PluginOptions::OptionGroup, 	// Option name
            [ $this, 'handle_options' ] 	// validation & upload
        );

        add_settings_section(						// SECTION: Tyres
            'tyre_options_section_id', 		
            __( 'Tyre metadata', Plugin::lang ),
            [ $this, 'show_options_info' ], 		
            PageOptions::Slug 				
        );  

        add_settings_field(							// OPTION: Show Fields | Tyre Product
            'show_tyre_fields', 
            __( 'Show on Product page:', Plugin::lang ), 
            [ $this, 'show_tyre_fields_callback' ], 
            PageOptions::Slug, 
            'tyre_options_section_id'
        );      

        add_settings_field(							// OPTION: Tyre Category
            'tyre_category', 
            __( 'Use Tyre meta only in:', Plugin::lang ), 
            [ $this, 'tyre_category' ], 
            PageOptions::Slug, 
            'tyre_options_section_id'
        );      

        add_settings_section(						// SECTION: Wheels
            'wheel_options_section_id', 		
            __( 'Wheel metadata', Plugin::lang ),
            [ $this, 'show_options_info' ], 		
            PageOptions::Slug 				
        );  

        add_settings_field(							// OPTION: Show Fields | Wheel Product
            'show_wheel_fields_product', 
            __( 'Show on Product page:', Plugin::lang ), 
            [ $this, 'show_wheel_fields_product' ], 
            PageOptions::Slug, 
            'wheel_options_section_id'
        );      

        add_settings_field(							// OPTION: Wheel Category
            'wheel_category', 
            __( 'Use Wheel meta only in:', Plugin::lang ), 
            [ $this, 'wheel_category' ], 
            PageOptions::Slug, 
            'wheel_options_section_id'
        );      
	}
	
	public function show_options_info()
    {
    }

    public function show_field( $name, $title )
    {
    	$field = [ 	'name' 		=> PluginOptions::OptionGroup . '[' . $name . ']',
			    	'checked' 	=> ( !isset( $this->options[ $name ] ) || !$this->options[ $name ] ) ? '' : 'checked',
			    	'label'		=> __( $title, Plugin::lang ) 
			    	];

        echo '<label><input type="checkbox" name="' . $field['name'] . '" ' . $field['checked'] . '/>' .
				$field['label'] .
			'</label><br>';
    }
	
	public function show_tyre_fields_callback()
    {
    	$this->show_field( 'show_spec_full', 	__( 'Full tyre specification', Plugin::lang ) );
    	$this->show_field( 'show_spec_size', 	__( 'Separate fields of tyre size (width/profile/diameter)', Plugin::lang ) );

    	echo '<br>';
    	
    	$this->show_field( 'show_brand_model', 	__( 'Tyre brand and model name', Plugin::lang ) );
    	$this->show_field( 'show_indexes', 		__( 'Tyre indexes', Plugin::lang ) );
    	$this->show_field( 'show_season', 		__( 'Season', Plugin::lang ) );
    	$this->show_field( 'show_car_type', 	__( 'Car type', Plugin::lang ) );
    	$this->show_field( 'show_suv_type', 	__( 'SUV sub-type', Plugin::lang ) );
	}

	public function show_wheel_fields_product()
    {
    	$this->show_field( 'show_wheel_spec_full', 		__( 'Full wheel specification', Plugin::lang ) );
    	$this->show_field( 'show_wheel_spec_size', 		__( 'Separate fields of wheel spec (width x diameter, PCD, ET..)', Plugin::lang ) );

    	echo '<br>';

    	$this->show_field( 'show_wheel_brand_model', 	__( 'Wheel brand and model name', Plugin::lang ) );
    	$this->show_field( 'show_wheel_type', 			__( 'Wheel type', Plugin::lang ) );
    	$this->show_field( 'show_wheel_color', 			__( 'Color', Plugin::lang ) );
    }

    public function show_select( $param_name, $selection, $help = '', $defaults = [] )
    {
    	$options = [];

    	if ( count($defaults) > 0 )
    	{
	    	foreach( $defaults as $default )
	    	{
	        	$default['selected'] = '';
	        
		        if ( PluginOptions::value( $param_name ) == $default['value'] )
	    	    	$default['selected'] = 'selected';

	    		$options[] = $default;
	    	}
    	}

    	foreach( $selection as $value => $name )
    	{
	    	$options[] = [ 	'name' 		=> $name,
				    		'selected' 	=> ( PluginOptions::value( $param_name ) == $value ) ? 'selected' : '',
				    		'value'		=> $value 
				    	];
		}

        echo '<select id="' . $param_name . '_id" name="' . PluginOptions::OptionGroup . '[' . $param_name . ']">'; 

	 	foreach( $options as $option ) 
	 	{
			echo '<option ' . $option['selected'] . ' value="' . $option['value'] . '">' . $option['name'] . '</option>';
	 	}

		echo '</select>';
    }

	public function wheel_category()
	{    
		$categories = Woo::top_product_categories();

    	$this->show_select( 'wheel_category', $categories, '', [ 
    		[ 'name' => __( 'All categories', Plugin::lang ), 'value' => '' ], 
    		[ 'name' => __( 'No categories | Disable', Plugin::lang ), 'value' => 'no-disable' ], 
    	] );
    }

	public function tyre_category()
	{    
		$categories = Woo::top_product_categories();

    	$this->show_select( 'tyre_category', $categories, '', [
    		[ 'name' => __( 'All categories', Plugin::lang ), 'value' => '' ],
    		[ 'name' => __( 'No categories | Disable', Plugin::lang ), 'value' => 'no-disable' ], 
    	] );
    }

	public function admin_menu() 
	{
		add_options_page(	__( 'Tyre Custom Metadata options', Plugin::lang ), 
								__( 'Tyre Metadata', Plugin::lang ), 
								'manage_options', 
								Plugin::name, 
								[ $this, 'page' ]);
	}

}




