<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;
/*
Plugin Name: Heading Color Options
Description: Change your site heading and other color which suits your site.
Version:     1.0.5
Author:      Kafle G
Author URI:  http://kafleg.com.np
License:     GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Domain Path: /languages
Text Domain: heading-color-options
*/

//Heading Color Options on Customizer
function wp_custom_color_register( $wp_customize ){
				$wp_customize->add_panel( 'wp_custom_color_section_panel', array(
					'priority' => 10,
					'capability' => 'edit_theme_options',
					'theme_supports' => '',
					'title' => __( 'Heading Color Options', 'heading-color-options' ),
					'description' => '', 
					) );

				$wp_customize->add_section( 'wp_custom_color_section', array(
					'priority' => 10,
					'capability' => 'edit_theme_options',
					'theme_supports' => '',
					'title' => __( 'H1 Color Options', 'heading-color-options' ),
					'description' => '', 
					'panel' => 'wp_custom_color_section_panel'
					) );
		
				// H1 Color Section Start
				$wp_customize->add_setting(
				       'h1_text_color',
				       array(
				           'default'     => '#3a3a3a'
				       )
				   );
				
				$wp_customize->add_control(
				       new WP_Customize_Color_Control(
				           $wp_customize,
				           'h1_color',
				           array(
				               'label'      => __( 'H1 Color Options', 'heading-color-options' ),
				               'section'    => 'wp_custom_color_section',
				               'settings'   => 'h1_text_color'
				           )
				       )
				);
				//Check box on H1
				$wp_customize->add_setting('wp_custom_color_h1_checkbox', array(
				    'default'    => ''
				));

				$wp_customize->add_control(
				    new WP_Customize_Control(
				        $wp_customize,
				        'wp_custom_color_h1_checkbox',
				        array(
				            'label'     => __('Enable H1 Color', 'heading-color-options'),
				            'section'   => 'wp_custom_color_section',
				            'settings'  => 'wp_custom_color_h1_checkbox',
				            'type'      => 'checkbox',
				        )
				    )
				);	

				// H1 Color Section end 
				// H2 Color Section start 

				$wp_customize->add_section( 'wp_custom_color_section_h2', array(
						'priority' => 10,
						'capability' => 'edit_theme_options',
						'theme_supports' => '',
						'title' => __( 'H2 Color Options', 'heading-color-options' ),
						'description' => '', 
						'panel' => 'wp_custom_color_section_panel'
						) );

				$wp_customize->add_setting(
				       'h2_text_color',
				       array(
				           'default'     => '#3a3a3a'
				       )
				   );
		
			    $wp_customize->add_control(
			       new WP_Customize_Color_Control(
			           $wp_customize,
			           'h2_color',
			           array(
			               'label'      => __( 'H2 Color Options', 'heading-color-options' ),
			               'section'    => 'wp_custom_color_section_h2',
			               'settings'   => 'h2_text_color'
			           )
			       )
			   	);
			    //Check box on H2
			   	$wp_customize->add_setting('wp_custom_color_h2_checkbox', array(
				    'default'    => '',
				));

				$wp_customize->add_control(
				    new WP_Customize_Control(
				        $wp_customize,
				        'wp_custom_color_h2_checkbox',
				        array(
				            'label'     => __('Enable H2 Color', 'heading-color-options'),
				            'section'   => 'wp_custom_color_section_h2',
				            'settings'  => 'wp_custom_color_h2_checkbox',
				            'type'      => 'checkbox',
				        )
				    )
				);	

				// H2 Color Section end 
				// H3 Color Section start

				$wp_customize->add_section( 'wp_custom_color_section_h3', array(
						'priority' => 10,
						'capability' => 'edit_theme_options',
						'theme_supports' => '',
						'title' => __( 'H3 Color Options', 'heading-color-options' ),
						'description' => '', 
						'panel' => 'wp_custom_color_section_panel'
						) ); 

			    $wp_customize->add_setting(
			          'h3_text_color',
			          array(
			              'default'     => '#3a3a3a'
			          )
			    );
	   
			    $wp_customize->add_control(
			          new WP_Customize_Color_Control(
			              $wp_customize,
			              'h3_color',
			              array(
			                  'label'      => __( 'H3 Color Options', 'heading-color-options' ),
			                  'section'    => 'wp_custom_color_section_h3',
			                  'settings'   => 'h3_text_color'
			              )
			          )
			    );
			    //Check box on H3
			       	$wp_customize->add_setting('wp_custom_color_h3_checkbox', array(
		    	    'default'    => '',
		    	));

		    	$wp_customize->add_control(
		    	    new WP_Customize_Control(
		    	        $wp_customize,
		    	        'wp_custom_color_h3_checkbox',
		    	        array(
		    	            'label'     => __('Enable H3 Color', 'heading-color-options'),
		    	            'section'   => 'wp_custom_color_section_h3',
		    	            'settings'  => 'wp_custom_color_h3_checkbox',
		    	            'type'      => 'checkbox',
		    	        )
		    	    )
		    	);	
				// H3 Color Section end 
		    	// H4 Color Section start
		    	$wp_customize->add_section( 'wp_custom_color_section_h4', array(
						'priority' => 10,
						'capability' => 'edit_theme_options',
						'theme_supports' => '',
						'title' => __( 'H4 Color Options', 'heading-color-options' ),
						'description' => '', 
						'panel' => 'wp_custom_color_section_panel'
						) ); 

		      	$wp_customize->add_setting(
		             'h4_text_color',
		             array(
		                 'default'     => '#3a3a3a'
		             )
		        );
		      
		        $wp_customize->add_control(
		             new WP_Customize_Color_Control(
		                 $wp_customize,
		                 'h4_color',
		                 array(
		                     'label'      => __( 'H4 Color Options', 'heading-color-options' ),
		                     'section'    => 'wp_custom_color_section_h4',
		                     'settings'   => 'h4_text_color'
		                 )
		             )
		         );
		        //Check box on H4
		       	$wp_customize->add_setting('wp_custom_color_h4_checkbox', array(
	    	    'default'    => '',
		    	));

		    	$wp_customize->add_control(
		    	    new WP_Customize_Control(
		    	        $wp_customize,
		    	        'wp_custom_color_h4_checkbox',
		    	        array(
		    	            'label'     => __('Enable H4 Color', 'heading-color-options'),
		    	            'section'   => 'wp_custom_color_section_h4',
		    	            'settings'  => 'wp_custom_color_h4_checkbox',
		    	            'type'      => 'checkbox',
		    	        )
		    	    )
		    	);	
		    	// H4 Color Section end
		    	// H5 Color Section start
		    	$wp_customize->add_section( 'wp_custom_color_section_h5', array(
						'priority' => 10,
						'capability' => 'edit_theme_options',
						'theme_supports' => '',
						'title' => __( 'H5 Color Options', 'heading-color-options' ),
						'description' => '', 
						'panel' => 'wp_custom_color_section_panel'
						) ); 



		        $wp_customize->add_setting(
		                'h5_text_color',
		                array(
		                    'default'     => '#3a3a3a'
		                )
		            );
	         
	            $wp_customize->add_control(
	                new WP_Customize_Color_Control(
	                    $wp_customize,
	                    'h5_color',
	                    array(
	                        'label'      => __( 'H5 Color Options', 'heading-color-options' ),
	                        'section'    => 'wp_custom_color_section_h5',
	                        'settings'   => 'h5_text_color'
	                    )
	                )
	            );
	            //Check box on H5
	            $wp_customize->add_setting('wp_custom_color_h5_checkbox', array(
	    	    'default'    => '',
		    	));

		    	$wp_customize->add_control(
		    	    new WP_Customize_Control(
		    	        $wp_customize,
		    	        'wp_custom_color_h5_checkbox',
		    	        array(
		    	            'label'     => __('Enable H5 Color', 'heading-color-options'),
		    	            'section'   => 'wp_custom_color_section_h5',
		    	            'settings'  => 'wp_custom_color_h5_checkbox',
		    	            'type'      => 'checkbox',
		    	        )
		    	    )
		    	);	
		    	// H5 Color Section end
		    	// H6 Color Section start

		    	$wp_customize->add_section( 'wp_custom_color_section_h6', array(
						'priority' => 10,
						'capability' => 'edit_theme_options',
						'theme_supports' => '',
						'title' => __( 'H6 Color Options', 'heading-color-options' ),
						'description' => '', 
						'panel' => 'wp_custom_color_section_panel'
						) ); 


	            $wp_customize->add_setting(
	                   'h6_text_color',
	                   array(
	                       'default'     => '#3a3a3a'
	                   )
	               );
	            
               $wp_customize->add_control(
                   new WP_Customize_Color_Control(
                       $wp_customize,
                       'h6_color',
                       array(
                           'label'      => __( 'H6 Color Options', 'heading-color-options' ),
                           'section'    => 'wp_custom_color_section_h6',
                           'settings'   => 'h6_text_color'
                       )
                   )
               );
               //Check box on H6
               $wp_customize->add_setting('wp_custom_color_h6_checkbox', array(
	    	    'default'    => '',
		    	));

		    	$wp_customize->add_control(
		    	    new WP_Customize_Control(
		    	        $wp_customize,
		    	        'wp_custom_color_h6_checkbox',
		    	        array(
		    	            'label'     => __('Enable H6 Color', 'heading-color-options'),
		    	            'section'   => 'wp_custom_color_section_h6',
		    	            'settings'  => 'wp_custom_color_h6_checkbox',
		    	            'type'      => 'checkbox',
		    	        )
		    	    )
		    	);	

		    	// H6 Color Section end

		    	// Paragraph Color Section start

		    	$wp_customize->add_section( 'wp_custom_color_section_paragraph', array(
						'priority' => 10,
						'capability' => 'edit_theme_options',
						'theme_supports' => '',
						'title' => __( 'Paragraph Color Options', 'heading-color-options' ),
						'description' => '', 
						'panel' => 'wp_custom_color_section_panel'
						) ); 

                $wp_customize->add_setting(
                      'paragraph_color',
                      array(
                          'default'     => '#501b59'
                      )
                  );
               
                $wp_customize->add_control(
                      new WP_Customize_Color_Control(
                          $wp_customize,
                          'paragraph_color',
                          array(
                              'label'      => __( 'Paragraph Color Options', 'heading-color-options' ),
                              'section'    => 'wp_custom_color_section_paragraph',
                              'settings'   => 'paragraph_color'
                          )
                      )
                  );
                //Check box on paragraph
                $wp_customize->add_setting('wp_custom_color_paragraph_checkbox', array(
	    	    	'default'    => '',
		    	));

		    	$wp_customize->add_control(
		    	    new WP_Customize_Control(
		    	        $wp_customize,
		    	        'wp_custom_color_paragraph_checkbox',
		    	        array(
		    	            'label'     => __('Enable Paragraph Color', 'heading-color-options'),
		    	            'section'   => 'wp_custom_color_section_paragraph',
		    	            'settings'  => 'wp_custom_color_paragraph_checkbox',
		    	            'type'      => 'checkbox',
		    	        )
		    	    )
		    	);
		    	// Hover Color Section end
		    	// Hover Color Section start

		    	$wp_customize->add_section( 'wp_custom_color_section_hover', array(
						'priority' => 10,
						'capability' => 'edit_theme_options',
						'theme_supports' => '',
						'title' => __( 'Hover Color Options', 'heading-color-options' ),
						'description' => '', 
						'panel' => 'wp_custom_color_section_panel'
						) ); 

                $wp_customize->add_setting(
                      'hover_color',
                      array(
                          'default'     => '#501b59'
                      )
                  );
               
                $wp_customize->add_control(
                      new WP_Customize_Color_Control(
                          $wp_customize,
                          'hover_color',
                          array(
                              'label'      => __( 'Hover Color', 'heading-color-options' ),
                              'section'    => 'wp_custom_color_section_hover',
                              'settings'   => 'hover_color'
                          )
                      )
                  );
                 //Check box on Hover
                $wp_customize->add_setting('wp_custom_color_hover_checkbox', array(
	    	    	'default'    => '',
		    	));

		    	$wp_customize->add_control(
		    	    new WP_Customize_Control(
		    	        $wp_customize,
		    	        'wp_custom_color_hover_checkbox',
		    	        array(
		    	            'label'     => __('Enable Hover Color', 'heading-color-options'),
		    	            'section'   => 'wp_custom_color_section_hover',
		    	            'settings'  => 'wp_custom_color_hover_checkbox',
		    	            'type'      => 'checkbox',
		    	        )
		    	    )
		    	);
		    	// Hover Color Section end
}
add_action( 'customize_register', 'wp_custom_color_register' );

// JS for live customizer preview
 
	function wp_custom_color_script() {
		wp_enqueue_script( 'custom_color_script', plugin_dir_url( __FILE__ ) . 'heading-color-options.js', array( 'customize-preview' ), '20140804', true );
	}
	add_action( 'customize_preview_init', 'wp_custom_color_script' );

	//outputs Header Color Options on frontend
	if( ! function_exists( 'wp_custom_color_add_color' ) ) :

		function wp_custom_color_add_color(){ ?>

			<style type="text/css">
				<?php if(get_theme_mod('wp_custom_color_h1_checkbox') == 'true') { ?>
					  h1 { color: <?php echo get_theme_mod( 'h1_text_color' ); ?> !important; }
				<?php	
				} ?>

				<?php if(get_theme_mod('wp_custom_color_h2_checkbox') == 'true') { ?>
			        	h2 { color: <?php echo get_theme_mod( 'h2_text_color' ); ?> !important; }
			    <?php	
				} ?>

				<?php if(get_theme_mod('wp_custom_color_h3_checkbox') == 'true') { ?>
			        	h3 { color: <?php echo get_theme_mod( 'h3_text_color' ); ?> !important; }
			    <?php	
				} ?>
				
				<?php if(get_theme_mod('wp_custom_color_h4_checkbox') == 'true') { ?>    	
			        	h4 { color: <?php echo get_theme_mod( 'h4_text_color' ); ?> !important; }

			     <?php	
				} ?>
				
				<?php if(get_theme_mod('wp_custom_color_h5_checkbox') == 'true') { ?>    	    	
			        	h5 { color: <?php echo get_theme_mod( 'h5_text_color' ); ?> !important; }
			    <?php	
				} ?>

				<?php if(get_theme_mod('wp_custom_color_h6_checkbox') == 'true') { ?> 
			        	h6 { color: <?php echo get_theme_mod( 'h6_text_color' ); ?> !important; }
			    <?php	
				} ?>

				<?php if(get_theme_mod('wp_custom_color_paragraph_checkbox') == 'true') { ?> 
			        	p { color: <?php echo get_theme_mod( 'paragraph_color' ); ?> !important; }
			    <?php	
				} ?>
			    
			    <?php if(get_theme_mod('wp_custom_color_hover_checkbox') == 'true') { ?> 
			        	a:hover { color: <?php echo get_theme_mod( 'hover_color' ); ?> !important; }
			    <?php	
				} ?>
	    	</style>

<?php }		
	endif;
	add_action( 'wp_head', 'wp_custom_color_add_color', 1000 );

