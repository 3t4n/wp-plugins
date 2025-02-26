<?php

class Aec_Admin_Page_Settings
{
	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string $plugin_name The string used to uniquely identify this plugin.
	 */
	private $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string $version The current version of the plugin.
	 */
	private $version;

	/**
	 * The current extranet metabox properties.
	 *
	 * @since    1.3
	 * @access   protected
	 * @var      array $extranet_domain The current version of the plugin.
	 */
	private $extranet_domain;
	/**
	 * The current settings of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      array $settings The current settings of the plugin.
	 */
	private $settings;

	public static $meta_name = 'arc_extranet_domain';

	public function __construct( $plugin_name, $version, $settings )
	{
		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->settings = $settings;
	}

	/**
	 * Initialize extranet metabox
	 *
	 * @since     1.3
	 */
	public function init_extranet_domain( $domains )
	{
		$options = array_map( function ( $value ) {
			return [ 'option' => $value['kiosque_url'], 'text' => $value['kiosque_url'] ];
		}, $domains );

		$this->extranet_domain['options'] = array_filter( $options, function ( $option ) {
			return $option['option'] != "";
		} );

	}

	/**
	 * Add extranet metabox
	 *
	 * @since     1.3
	 */
	public function add_extranet_metabox()
	{
		$domains = $this->fetch_parent_domain();
		if( $domains )
		{
			$this->init_extranet_domain( $domains );
			if( count( $this->extranet_domain['options'] ) > 0 )
			{
				add_meta_box( 'extranet_domain_metabox', 'Extranet Domain', array( $this, 'extranet_box_html' ), 'page', 'side' );
			}
		}
	}

	/**
	 * Extranet metabox content
	 *
	 * @param $post
	 */
	public function extranet_box_html( $post )
	{
		$value = get_post_meta( $post->ID, self::$meta_name, true );
		wp_nonce_field( self::$meta_name . '_dononce', self::$meta_name . '_noncename' );
		?>
        <label for="extranet_domain_field"><strong>Select the domain to use</strong></label>
        <select name="<?php echo self::$meta_name ?>" id="extranet_domain_field" class="postbox">
			<?php
			foreach( $this->extranet_domain['options'] as $option )
			{
				$selected = $value == $option['option'] ? ' selected' : '';
				?>
                <option value="<?php echo $option['option']; ?>" <?php echo $selected; ?> > <?php echo $option['text']; ?> </option>
				<?php
			}
			?>
        </select>
		<?php
	}

	/**
	 * Extranet metabox save / update
	 *
	 * @param $postID
	 * @return mixed
	 */
	public function extranet_domain_on_save( $postID )
	{
		if( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) || !isset( $_POST[self::$meta_name . '_noncename'] ) || !wp_verify_nonce( $_POST[self::$meta_name . '_noncename'], self::$meta_name . '_dononce' ) || $postID != $_POST['ID'] )
		{
			return $postID;
		}

		$old = get_post_meta( $postID, self::$meta_name, true );
		$new = $_POST[self::$meta_name];

		if( $old )
		{
			if( is_null( $new ) )
			{
				$this->extranet_domain_on_delete( $postID );
			}
			else
			{
				update_post_meta( $postID, self::$meta_name, $new, $old );
			}
		}
        elseif( !is_null( $new ) )
		{
			add_post_meta( $postID, self::$meta_name, $new, true );
		}

		return $postID;
	}


	/**
	 * Extranet metabox delete
	 *
	 * @param $postID
	 * @return mixed
	 */
	public function extranet_domain_on_delete( $postID )
	{
		delete_post_meta( $postID, self::$meta_name );
		return $postID;
	}


	private function fetch_parent_domain()
	{
		$response = wp_remote_get( $this->settings['app_url'] . '/arc-en-ciel/api/private/wp-editor/v1/establishments?returnParent=true', array( 'headers' => array( 'api_key' => $this->settings['api_key'] ) ) );

		if( !is_wp_error( $response ) && !empty($response['body']) )
		{
			$body = json_decode( $response['body'], true );
			if( array_key_exists( 'message', $body ) )
			{
				return null;
			}
			else
			{
				return $body;
			}
		}
		else
		{
			return null;
		}

	}
}
