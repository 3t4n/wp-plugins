<?php
if ( ! class_exists( 'ARSCP_Options' ) ) {
	class ARSCP_Options {

		private $settings_api;


		function __construct() {
			require_once ARSCP_AMP_Revolution::get()-> plugin_path . 'lib/settingsApi.php';
			$this->settings_api = new WeDevs_Settings_API;
			add_action( 'admin_init', array( $this, 'admin_init' ) );
			add_action( 'admin_menu', array( $this, 'admin_menu' ) );
		}


		function admin_init() {
			//set the settings
			$this->settings_api->set_sections( $this->get_settings_sections() );
			$this->settings_api->set_fields( $this->get_settings_fields() );
			//initialize settings
			$this->settings_api->admin_init();
		}

		function admin_menu() {
			add_menu_page( 'AMP Revolution', 'AMP Revolution', 'delete_posts', 'amp-revolution', array(
				$this,
				'plugin_page'
			) );
		}

		function get_settings_sections() {
			$sections = array(
				array(
					'id'    => 'personalizator',
					'title' => __( 'Personalization', 'wedevs' )
				),
				array(
					'id'    => 'optimizator',
					'title' => __( 'Optimization', 'wedevs' )
				),
				array(
					'id'    => 'integrator',
					'title' => __( 'Integration', 'wedevs' )
				),
				array(
					'id'    => 'customcss',
					'title' => __( 'Custom CSS', 'wedevs' )
				)

			,
			);

			return $sections;
		}

		/**
		 * Returns all the settings fields
		 *
		 * @return array settings fields
		 */
		function get_settings_fields() {
			$settings_fields = array(
				'personalizator' => array(
					//Below title Add Options
					array(
						'name'          => 'logo',
						'label'         => __( 'Logo', 'wedevs' ),
						'desc'          => __( 'Recomended 272 * 88 px', 'wedevs' ),
						'type'          => 'file',
						'default'       => '',
						'ARSCP_Options' => array(
							'button_label' => 'Choose Image'
						)
					),
					array(
						'name'              => 'logoHeight',
						'label'             => __( 'Height', 'wedevs' ),
						'desc'              => __( 'Logo height', 'wedevs' ),
						'placeholder'       => __( '1', 'wedevs' ),
						'min'               => 0,
						'max'               => 1000,
						'step'              => '1',
						'type'              => 'number',
						'default'           => '4',
						'sanitize_callback' => 'floatval'
					),
					array(
						'name'              => 'logoWidth',
						'label'             => __( 'Width', 'wedevs' ),
						'desc'              => __( 'Logo width', 'wedevs' ),
						'placeholder'       => __( '1', 'wedevs' ),
						'min'               => 0,
						'max'               => 1000,
						'step'              => '1',
						'type'              => 'number',
						'default'           => '4',
						'sanitize_callback' => 'floatval'
					),


					array(
						'name' => 'coloresTitle',
						'desc' => __( '<p><b>Color Scheme</b></p>', 'wedevs' ),
						'type' => 'html'
					),
					array(
						'name'    => 'headerBackColor',
						'label'   => __( 'Header', 'wedevs' ),
						'desc'    => __( 'Header Background', 'wedevs' ),
						'type'    => 'color',
						'default' => ''
					),
					array(
						'name'    => 'menuBackColor',
						'label'   => __( 'Menu', 'wedevs' ),
						'desc'    => __( 'Menu Background', 'wedevs' ),
						'type'    => 'color',
						'default' => ''
					),
					array(
						'name'    => 'menuTextColor',
						'label'   => __( 'Menu Text', 'wedevs' ),
						'desc'    => __( 'Menu Text Color', 'wedevs' ),
						'type'    => 'color',
						'default' => ''
					),
					array(
						'name'    => 'footerBackColor',
						'label'   => __( 'Footer', 'wedevs' ),
						'desc'    => __( 'Footer Background Color', 'wedevs' ),
						'type'    => 'color',
						'default' => ''
					),
					array(
						'name'    => 'footerTextColor',
						'label'   => __( 'Footer Text', 'wedevs' ),
						'desc'    => __( 'Footer Text Color', 'wedevs' ),
						'type'    => 'color',
						'default' => ''
					),
					array(
						'name'    => 'titleColor',
						'label'   => __( 'Title', 'wedevs' ),
						'desc'    => __( 'H1,H2,H3... Color', 'wedevs' ),
						'type'    => 'color',
						'default' => ''
					),
					array(
						'name'    => 'textColor',
						'label'   => __( 'Text', 'wedevs' ),
						'desc'    => __( 'Post Text Color', 'wedevs' ),
						'type'    => 'color',
						'default' => ''
					),
					array(
						'name'    => 'metaColor',
						'label'   => __( 'Meta', 'wedevs' ),
						'desc'    => __( 'Autuor,Date,etc Color', 'wedevs' ),
						'type'    => 'color',
						'default' => ''
					),
					array(
						'name'    => 'linkColor',
						'label'   => __( 'Links', 'wedevs' ),
						'desc'    => __( 'Links Color', 'wedevs' ),
						'type'    => 'color',
						'default' => ''
					),

					array(
						'name' => 'estructuraTitle',
						'desc' => __( '<p><b>Page Structure</b></p>', 'wedevs' ),
						'type' => 'html'
					),
					array(
						'name'  => 'showRelated',
						'label' => __( 'Show Related Posts', 'wedevs' ),
						'desc'  => __( '', 'wedevs' ),
						'type'  => 'checkbox'
					),
					array(
						'name'              => 'amountRelated',
						'label'             => __( 'Amount', 'wedevs' ),
						'desc'              => __( 'Number of Related Posts ', 'wedevs' ),
						'placeholder'       => __( '1', 'wedevs' ),
						'min'               => 0,
						'max'               => 4,
						'step'              => '1',
						'type'              => 'number',
						'default'           => '4',
						'sanitize_callback' => 'floatval'
					),
					array(
						'name'              => 'relatedTitle',
						'label'             => __( 'Related Posts Title', 'wedevs' ),
						'desc'              => __( 'Ej.: You may also like', 'wedevs' ),
						'placeholder'       => __( '', 'wedevs' ),
						'type'              => 'text',
						'default'           => '',
						'sanitize_callback' => 'sanitize_text_field'
					),

					array(
						'name'  => 'showCommentForm',
						'label' => __( 'Show Comments Form', 'wedevs' ),
						'desc'  => __( 'It only works if your site has SSL enabled. DO NOT activate in case you do not have it!', 'wedevs' ),
						'type'  => 'checkbox'
					),
					array(
						'name'              => 'commentsHeader',
						'label'             => __( 'Last Comments Title', 'wedevs' ),
						'desc'              => __( 'Ej.: Last Comments', 'wedevs' ),
						'placeholder'       => __( '', 'wedevs' ),
						'type'              => 'text',
						'default'           => '',
						'sanitize_callback' => 'sanitize_text_field'
					),

					array(
						'name'              => 'maxComments',
						'label'             => __( 'Amount', 'wedevs' ),
						'desc'              => __( 'Number of Comments to Show ', 'wedevs' ),
						'placeholder'       => __( '1', 'wedevs' ),
						'min'               => 0,
						'max'               => 300,
						'step'              => '1',
						'type'              => 'number',
						'default'           => '4',
						'sanitize_callback' => 'floatval'
					),
					array(
						'name'              => 'commentsFormHeader',
						'label'             => __( 'Comments Form title', 'wedevs' ),
						'desc'              => __( 'Ej.: Leave a Comment', 'wedevs' ),
						'placeholder'       => __( '', 'wedevs' ),
						'type'              => 'text',
						'default'           => '',
						'sanitize_callback' => 'sanitize_text_field'
					),
					array(
						'name'              => 'commentButton',
						'label'             => __( 'Comment Button Text', 'wedevs' ),
						'desc'              => __( 'Ej.: Post Comment', 'wedevs' ),
						'placeholder'       => __( '', 'wedevs' ),
						'type'              => 'text',
						'default'           => '',
						'sanitize_callback' => 'sanitize_text_field'
					),
					array(
						'name'              => 'commentsSuccess',
						'label'             => __( 'Comments Success Text', 'wedevs' ),
						'desc'              => __( 'Ej.: Comment posted successfully', 'wedevs' ),
						'placeholder'       => __( '', 'wedevs' ),
						'type'              => 'text',
						'default'           => '',
						'sanitize_callback' => 'sanitize_text_field'
					),
					array(
						'name'              => 'commentsFailure',
						'label'             => __( 'Comments Failure Text', 'wedevs' ),
						'desc'              => __( 'Ej.: Error posting comment', 'wedevs' ),
						'placeholder'       => __( '', 'wedevs' ),
						'type'              => 'text',
						'default'           => '',
						'sanitize_callback' => 'sanitize_text_field'
					),
					array(
						'name'              => 'sesionStatus',
						'label'             => __( 'User Status text', 'wedevs' ),
						'desc'              => __( 'Ej.: Logged In', 'wedevs' ),
						'placeholder'       => __( '', 'wedevs' ),
						'type'              => 'text',
						'default'           => '',
						'sanitize_callback' => 'sanitize_text_field'
					),
					array(
						'name'              => 'commentClosed',
						'label'             => __( 'Comment Closed Text', 'wedevs' ),
						'desc'              => __( 'Ej.: Comments are Closed', 'wedevs' ),
						'placeholder'       => __( '', 'wedevs' ),
						'type'              => 'text',
						'default'           => '',
						'sanitize_callback' => 'sanitize_text_field'
					),
					array(
						'name'              => 'privacyComment',
						'label'             => __( 'Privacy Comments Text', 'wedevs' ),
						'desc'              => __( 'Ej.: Your email address will not be published. Required fields are marked', 'wedevs' ),
						'placeholder'       => __( '', 'wedevs' ),
						'type'              => 'text',
						'default'           => '',
						'sanitize_callback' => 'sanitize_text_field'
					),
					array(
						'name'              => 'commentPlaceHolder',
						'label'             => __( 'Coment Placeholder Text', 'wedevs' ),
						'desc'              => __( 'Ej.: Your comment...', 'wedevs' ),
						'placeholder'       => __( '', 'wedevs' ),
						'type'              => 'text',
						'default'           => '',
						'sanitize_callback' => 'sanitize_text_field'
					),
					array(
						'name'              => 'namePlaceholder',
						'label'             => __( 'Name Placeholder Text', 'wedevs' ),
						'desc'              => __( 'Ej.: Your name', 'wedevs' ),
						'placeholder'       => __( '', 'wedevs' ),
						'type'              => 'text',
						'default'           => '',
						'sanitize_callback' => 'sanitize_text_field'
					),


				),

				'integrator' => array(
					array(
						'name'  => 'useAnalytics',
						'label' => __( 'Use Google Analytics', 'wedevs' ),
						'desc'  => __( 'Load required scripts for Google Analytics', 'wedevs' ),
						'type'  => 'checkbox'
					),
					array(
						'name'              => 'analitycsCode',
						'label'             => __( 'Analytics Code', 'wedevs' ),
						'desc'              => __( 'Just the ID', 'wedevs' ),
						'placeholder'       => __( 'UA-XXXXX-Y', 'wedevs' ),
						'type'              => 'text',
						'default'           => '',
						'sanitize_callback' => 'sanitize_text_field'
					)

				),

				'optimizator' => array(

					array(
						'name'  => 'disableGf',
						'label' => __( 'Disable Google Fonts', 'wedevs' ),
						'desc'  => __( 'Disable Google Fonts for Better Page Speed', 'wedevs' ),
						'type'  => 'checkbox'
					)

				),

				//End Of Article Add Options
				'customcss'   => array(
					array(
						'name'        => 'extracss',
						'label'       => __( 'Extra CSS', 'wedevs' ),
						'desc'        => __( 'Yor CSS goes here', 'wedevs' ),
						'placeholder' => __( '.custom-styles{...}', 'wedevs' ),
						'type'        => 'textarea'
					)

				)


			);

			return $settings_fields;
		}

		//TODO : Aplicar MVC y Darle Personalidad
		function plugin_page() {
			echo '<div class="wrap">
                <h1>AMP REVOLUTION</h1>
 
           
                <div class="settingsForms">
   
                <p>
                Here you can customize the integration of AMP in your web
                </p>

';
			$this->settings_api->show_navigation();
			$this->settings_api->show_forms();
			echo '</div>
<div class="autorInfo">
<a href="https://www.savagecodes.com"><img src="https://www.savagecodes.com/wp-content/uploads/2015/06/logo.png"/></a>
<br/>
<p>
Thanks for using our plugin. Here are some useful links
</p>

<p>
<ul>
<li><a href="https://www.savagecodes.com">Support Fourms</a> Coming Soon ...</li>
</ul>
</p>

<p>Check out our other plugins and services for WordPress</p>

<p>
<ul>
<li><a href="https://www.savagecodes.com">Ads Revolution For AMP (Plugin)</a> Coming Soon ...</li>
<li><a href="https://www.savagecodes.com/servicio-integracion-amp-wordpress/">AMP Integration Service for WordPress</a></li>
<li><a href="https://www.savagecodes.com/managed-vps-hosting/">Managed WordPress VPS Hosting</a></li>
</ul>
</p>

<p>Any suggestions are always welcome</p>
<p><a href="mailto:wordpress@savagecodes.com">Send FeedBack</a></p>
</div>
</div>
<style>
.settingsForms{
border-right: 1px solid rgba(128, 128, 128, 0.38);
width:70%;
float:left;
}

.autorInfo{
width:27.5%;
float:right;
}
.autorInfo img {

margin-left:auto;
margin-right:auto;
display:block;
}
</style>
';
		}

		/**
		 * Get all the pages
		 *
		 * @return array page names with key value pairs
		 */
		function get_pages() {
			$pages         = get_pages();
			$pages_options = array();
			if ( $pages ) {
				foreach ( $pages as $page ) {
					$pages_options[ $page->ID ] = $page->post_title;
				}
			}

			return $pages_options;
		}

		public function get_option_data( $option, $section, $default = '' ) {

			$options = get_option( $section );

			if ( isset( $options[ $option ] ) ) {
				return $options[ $option ];
			}

			return $default;
		}

	}
}