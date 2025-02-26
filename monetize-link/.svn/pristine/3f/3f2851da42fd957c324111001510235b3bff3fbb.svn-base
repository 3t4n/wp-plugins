<?php
namespace MonetizeLinkPlugin;

class MLP_Settings extends MLP_Base
{
	private $options;

	public function __construct()
	{
		add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
		add_action( 'admin_init', array( $this, 'page_init' ) );

	}

	public function add_plugin_page()
	{
		extract( MLP_Config::$settings );
		add_options_page(
			__( 'Settings Admin', 'monetize-link' ),
			__( 'MonetizeLink settings', 'monetize-link' ),
			$capability,
			$page,
			array( $this, 'create_admin_page' )
		);
	}

	public function create_admin_page()
	{
		do_action( 'monetizelink_assets_init' );
		$this->options = get_option( MLP_Config::OPTION, array() );
		?>
		<div class="takeads-plugin">
			<div class="takeads-plugin-logo">
				<img src="<?php echo esc_url( MLP_Assets::get_image( 'logo.svg' ) ); ?>" class="src">
			</div>
			<form method="post" action="options.php">
				<?php
				    settings_fields( MLP_Config::$settings['group'] );
				    do_settings_sections( MLP_Config::$settings['page'] );
				    submit_button();
				?>
			</form>
            <div class="takeads-plugin-info-installed" data-info="delete">
				<?php
                    if ( $this->options ) {
	                    $text = __( 'Integration script has been successfully installed on your website', 'monetize-link' );
	                    echo apply_filters( 'the_content', $text );
                    }
				?>
            </div>
            <div class="takeads-plugin-info-delete" data-info="delete">
                <?php
                    if ( $this->options ) {
	                    $text = __( 'To uninstall the integration script, click <a>here</a>', 'monetize-link' );
	                    echo apply_filters( 'the_content', mlp_plugin_set_link( 'popup', $text ) );
                    }
                ?>
            </div>
            <div class="takeads-plugin-footer">
	            <?php
	                $text = __( 'See the complete guide on the MonetizeLink plugin <a>here</a>', 'monetize-link' );
	                $link = 'https://support.admitad.com/hc/en-us/articles/11452082622993';
	                echo apply_filters( 'the_content', mlp_plugin_set_link( $link, $text ) );

	                $text = __( 'Need help? Contact us at <a>monetizelink@takeads.com</a>', 'monetize-link' );
	                $link = 'mailto:monetizelink@takeads.com';
	                echo apply_filters( 'the_content', mlp_plugin_set_link( $link, $text ) );
	            ?>
            </div>
		</div>
		<?php
	}

	public function page_init()
	{
		register_setting(
			MLP_Config::$settings['group'],
			MLP_Config::OPTION,
			array( $this, 'sanitize' )
		);

		add_settings_section(
			'setting_section_id',
			'',
			array( $this, 'print_section_info' ),
			MLP_Config::$settings['page']
		);

		add_settings_field(
			MLP_Config::$field_key,
			__( 'PlatformID', 'monetize-link' ),
			array( $this, 'platform_id_callback' ),
			MLP_Config::$settings['page'],
			'setting_section_id'
		);
	}

	public function sanitize( $input )
	{
		$new_input = array();
		$key       = MLP_Config::$field_key;

		if ( isset( $input[ $key ] ) ) {
		    $value = sanitize_text_field( $input[ $key ] );
		    if ( preg_match( '/' . MLP_Config::PATTERN . '/i', $value ) ) {
			    $new_input[ $key ] = $value;
		    } else {
			    if ( $value ) {
			        $text = __( 'Invalid PlatformID', 'monetize-link' );
				    add_settings_error( MLP_Config::OPTION, MLP_Config::$error_key, $text );
			    }
		    }
		}

		return $new_input;
	}

	public function print_section_info()
	{
		?>
		<div class="takeads-plugin-info">
            <?php
                echo '<h3>' . __( 'Specify your PlatformID from Monetize Network', 'monetize-link' ) . '</h3>';

                $text = __( 'To install MonetizeLink integration script on your WordPress pages, insert your PlatformID in the field below. <a>How to get PlatformID</a>', 'monetize-link' );
                $link = 'https://support.admitad.com/hc/en-us/articles/11452082622993#add-platform';
                echo apply_filters( 'the_content', mlp_plugin_set_link( $link, $text ) );
            ?>
		</div>
		<?php
	}

	public function platform_id_callback()
	{
		$field = MLP_Config::$field_key;
		$key   = MLP_Config::OPTION . "[{$field}]";
		$value = isset( $this->options[ $field ] ) ? esc_attr( $this->options[ $field ] ) : '';
		printf(
			'<input placeholder="%s" type="text" id="%s" name="%s" value="%s" />',
			__( 'Your PlatformID', 'monetize-link' ),
			$field,
			$key,
			$value
		);
	}

    public static function get_platform_id()
    {
	    $result  = '';
        $key     = MLP_Config::$field_key;
        $options = get_option( MLP_Config::OPTION, array() );
        if ( isset( $options[ $key ] ) && $options[ $key ] ) {
            $result = $options[ $key ];
        }
        return $result;
    }
}