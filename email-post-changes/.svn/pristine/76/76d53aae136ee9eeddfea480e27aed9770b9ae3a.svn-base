<?php

class Email_Post_Changes {
	var $defaults;

	var $left_post;
	var $right_post;

	var $text_diff;

	var $do_options_capability_checks = false;

	const ADMIN_PAGE = 'email_post_changes';
	const OPTION_GROUP = 'email_post_changes';
	const OPTION = 'email_post_changes';
	const META_KEY = '_epc_user_override';

	static function init() {
		static $instance = null;

		if ( $instance )
			return $instance;

		$class = __CLASS__;
		$instance = new $class;
		return $instance;
	}

	function __construct() {
		$this->defaults = apply_filters( 'email_post_changes_default_options', array(
			'enable'     => 1,
			'users'      => array(),
			'emails'     => array( get_option( 'admin_email' ) ),
			'post_types' => array( 'post', 'page' ),
			'drafts'     => 0,
		) );

		add_action( 'post_updated', array( $this, 'post_updated' ), 10, 3 );
		add_action( 'epc_new_bbpress_item', array( $this, 'post_updated' ), 10, 3 );  // Support for bbPress 2

		if ( current_user_can( 'read' ) ) {
			add_action( 'admin_menu', array( $this, 'admin_menu' ), 115 );
		}

		register_post_meta( '', self::META_KEY, [
			'type' => 'string',
			'description' => 'A per-user, per-post setting determining if the user should receive emails for changes to the post. Values look like `{(int) $user_id}:{(int) $should_receive_changes}.',
			'single' => false,
			'show_in_rest' => false,
			'revisions_enabled' => false,
		] );
	}

	function get_post_types() {
		$post_types = get_post_types( array( 'public' => true ) );
		$_post_types = array();

		foreach ( $post_types as $post_type ) {
			if ( post_type_supports( $post_type, 'revisions' ) )
				$_post_types[] = $post_type;
		}

		return $_post_types;
	}

	function get_options( $just_defaults = false ) {
		if ( $just_defaults )
			return $this->defaults;

		$options = (array) get_option( 'email_post_changes' );

		return wp_parse_args( $options, $this->defaults );
	}

	/**
	 * @param int $post_id
	 * @return array<int, bool> Keys are User IDs, values are whether that user wants to receive changes for the given post.
	 */
	function get_post_overrides( $post_id ) {
		$overrides = get_post_meta( $post_id, self::META_KEY, false );

		$return = [];
		foreach ( $overrides as $override ) {
			[ $user_id, $value ] = explode( ':', $override );
			$return[$user_id] = (bool) $value;
		}

		return $return;
	}

	/**
	 * @param int $user_id
	 * @return array<int, bool> Keys are Post IDs, values are whether the given user wants to receive changes for that post.
	 */
	function get_user_overrides( $user_id ) {
		$query = new WP_Query;

		$posts = $query->query( [
			'meta_key' => self::META_KEY,
			'meta_value' => "{$user_id}:.*",
			'meta_compare' => 'REGEXP',
			'post_type' => 'any',
			'post_status' => 'any',
			'posts_per_page' => -1,
		] );

		$return = [];
		foreach ( $posts as $post ) {
			$return[$post->ID] = $this->get_post_user_override( $post->ID, $user_id );
		}

		return $return;
	}

	function get_post_user_override( $post_id, $user_id ) {
		$overrides = $this->get_post_overrides( $post_id );
		foreach ( $overrides as $override_user_id => $override ) {
			if ( $override_user_id === $user_id ) {
				return $override;
			}
		}

		return null;
	}

	/**
	 * @param int $post_id
	 * @param int $user_id
	 * @param bool|null $override Null to delete, bool to set.
	 */
	function set_post_user_override( $post_id, $user_id, $override ) {
		$current_override = $this->get_post_user_override( $post_id, $user_id );

		if ( $current_override === $override ) {
			return;
		}

		if ( null === $override ) {
			delete_post_meta( $post_id, self::META_KEY, "{$user_id}:{ (int) $current_override }" );
			return;
		}

		if ( null === $current_override ) {
			add_post_meta( $post_id, self::META_KEY, "{$user_id}:{ $override ? 1 : 0 }", false );
		} else {
			update_post_meta( $post_id, self::META_KEY, "{$user_id}:{ $override ? 1 : 0 }", "{$user_id}:{ (int) $current_override }" );
		}
	}

	// The meat of the plugin
	function post_updated( $post_id, $post_after, $post_before ) {
		if ( defined( 'WP_IMPORTING' ) && WP_IMPORTING ) {
			return;
		}

		$options = $this->get_options();
		if ( ! $options['enable'] ) {
			return;
		}

		// Transitioning from an Auto Draft to Published shouldn't result in a notification.
		if ( $post_before->post_status === 'auto-draft' && $post_after->post_status === 'publish' ) {
			return;
		}

		// If we're purely saving a draft, and don't have the draft option enabled, skip. If we're transitioning one way or the other, send a notification.
		if ( 0 == $options['drafts'] && in_array( $post_before->post_status, array( 'draft', 'auto-draft', 'pending' ) ) && in_array( $post_after->post_status, array( 'draft', 'pending' ) ) ) {
			return;
		}

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}

		if ( !in_array( $post_before->post_type, $options['post_types'] ) ) {
			return;
		}

		$this->left_post = $post_before;
		$this->right_post = $post_after;

		// If this is a new post, set an empty title for $this->left_post so that it appears in the diff.
		$child_posts = wp_get_post_revisions( $post_id, array( 'numberposts' => 1 ) );
		if ( ( is_countable( $child_posts ) ? count( $child_posts ) : 0 ) == 0 ) {
			$this->left_post->post_title = '';
		}

		if ( !$this->left_post || !$this->right_post ) {
			return;
		}

		$html_diffs = array();
		$text_diffs = array();
		$identical = true;
		foreach ( _wp_post_revision_fields() as $field => $field_title ) {
			$left = apply_filters( "_wp_post_revision_field_$field", $this->left_post->$field, $field, $this->left_post, 'from' );
			$right = apply_filters( "_wp_post_revision_field_$field", $this->right_post->$field, $field, $this->right_post, 'to' );

			if ( !$diff = $this->wp_text_diff( $left, $right ) )
				continue;
			$html_diffs[$field_title] = $diff;

			$left  = normalize_whitespace( $left );
			$right = normalize_whitespace( $right );

			$left_lines  = explode( "\n", $left );
			$right_lines = explode( "\n", $right );

			require_once( dirname( __FILE__ ) . '/unified.php' );

			$text_diff = new Text_Diff( $left_lines, $right_lines );
			$renderer  = new Text_Diff_Renderer_unified();
			$text_diffs[$field_title] = $renderer->render($text_diff);

			$identical = false;
		}

		if ( $identical ) {
			$this->left_post = null;
			$this->right_post = null;
			return;
		}

		// Grab the meta data
		$the_author = get_the_author_meta( 'display_name', get_current_user_id() ); // The revision
		$the_title = get_the_title( $this->right_post->ID ); // New title (may be same as old title)
		$the_date = gmdate( _x( 'j F, Y \a\t G:i \U\T\C', 'time format for when a post was modified' ), strtotime( $this->right_post->post_modified_gmt . '+0000' ) ); // Modified time
		$the_permalink = esc_url( get_permalink( $this->right_post->ID ) );
		$the_edit_link = esc_url( get_edit_post_link( $this->right_post->ID ) );

		// Send email
		$charset = apply_filters( 'wp_mail_charset', get_option( 'blog_charset' ) );
		$blogname = html_entity_decode( get_option( 'blogname' ), ENT_QUOTES, $charset );
		$title = html_entity_decode( $the_title, ENT_QUOTES, $charset );

		add_action( 'phpmailer_init', array( $this, 'phpmailer_init' ) );

		$overrides = $this->get_post_overrides( $this->right_post->ID );

		$opt_ins = array_keys( array_filter( $overrides ) );
		$opt_outs = array_diff( array_keys( $overrides ), $opt_ins );

		$user_ids = array_diff( $options['users'], $opt_outs );
		$user_ids = array_merge( $user_ids, $opt_ins );

		$user_emails = array();
		foreach( $user_ids as $user_id ) {
			if ( function_exists( 'is_multisite' ) && is_multisite() ) {
				if ( is_user_member_of_blog( $user_id, get_current_blog_id() ) ) {
					$user_emails[] = get_user_option( 'user_email', $user_id );
				}
			} else {
				if ( $user_email = get_user_option( 'user_email', $user_id ) ) {
					$user_emails[] = $user_email;
				}
			}
		}

		$emails = array_unique( array_merge( $options['emails'], $user_emails ) );
		if ( $emails === [] && apply_filters( 'email_post_changes_admin_email_fallback', true ) ) {
			$emails[] = get_option( 'admin_email' );
		}
		$emails = apply_filters( 'email_post_changes_emails', $emails, $this->left_post->ID, $this->right_post->ID );

		foreach ( $emails as $email ) {
			if ( empty( $email ) || ! is_email( $email ) ) {
				continue;
			}
			do_action( 'email_post_changes_before_email_generation', $email );

			$left_title = __( 'Revision' );
			$post_type = get_post_type_object( $this->right_post->post_type );
			$post_type_label = $post_type->labels->singular_name;

			/* i18n for a post type can be tricky, let's have presets for the default post types */
			if ( $this->right_post->post_type == 'post' ) {
				$right_title = __( 'Current post' );
			} else if ( $this->right_post->post_type == 'page' ) {
				$right_title = __( 'Current page' );
			} else {
				$right_title = sprintf( _x( 'Current %s', 'post type' ), $post_type_label );
			}

			/* translators: 1=username, 2=post title, 3=edit link, 4=post type, 5=date */
			$head_sprintf = __( '%1$s made the following changes to the &#8220;%2$s&#8221; %3$s %4$s on %5$s' );

			// HTML
			$html_diff_head  = '<h2>' . sprintf( esc_html__( '%s changed' ), $post_type_label ) . "</h2>\n";
			$html_diff_head .= '<p>' . sprintf( esc_html( $head_sprintf ),
				esc_html( $the_author ),
				"<a href='$the_permalink'>" . esc_html( $the_title ) . '</a>',
				"<a href='$the_edit_link'>" . esc_html__( '[edit]' ) . '</a>',
				esc_html( $post_type_label ),
				esc_html( $the_date )
			) . "</p>\n\n";

			$html_diff_head .= "<table style='width: 100%; border-collapse: collapse; border: none;'><tr>\n";
			$html_diff_head .= "<td style='width: 50%; padding: 0; margin: 0;'>" . esc_html( sprintf( _x( '%1$s @ %2$s', 'post title @ date and time'), $left_title, $this->left_post->post_modified_gmt ) ) . "</td>\n";
			$html_diff_head .= "<td style='width: 50%; padding: 0; margin: 0;'>" . esc_html( sprintf( _x( '%1$s @ %2$s', 'post title @ date and time'), $right_title, $this->right_post->post_modified_gmt ) ) . "</td>\n";
			$html_diff_head .= "</tr></table>\n\n";

			$html_diff = '';
			foreach ( $html_diffs as $field_title => $diff ) {
				$html_diff .= '<h3>' . esc_html( $field_title ) . "</h3>\n";
				$html_diff .= "$diff\n\n";
			}

			$html_diff = rtrim( $html_diff );

			// Replace classes with inline style
			$html_diff = str_replace( '<del>', '<del style="text-decoration: none; background-color: #f99;">', $html_diff );
			$html_diff = str_replace( '<ins>', '<ins style="text-decoration: none; background-color: #9f9;">', $html_diff );
			$html_diff = str_replace( array( '</td>', '</tr>', '</tbody>' ), array( "</td>\n", "</tr>\n", "</tbody>\n" ), $html_diff );

			$html_diff = $html_diff_head . $html_diff;


			// Refactor some of the meta data for TEXT
			$length = max( strlen( $left_title ), strlen( $right_title ) );
			$left_title = str_pad( $left_title, $length + 2 );
			$right_title = str_pad( $right_title, $length + 2 );

			// TEXT
			$text_diff  = sprintf( $head_sprintf, $the_author, $the_title, '', $post_type_label, $the_date ) . "\n";
			$text_diff .= sprintf( __( "URL: %s" ),  $the_permalink) . "\n";
			$text_diff .= sprintf( __( "Edit: %s" ), $the_edit_link ) . "\n";

			foreach ( $text_diffs as $field_title => $diff ) {
				$text_diff .= "$field_title\n";
				$text_diff .= "===================================================================\n";
				$text_diff .= "--- $left_title	({$this->left_post->post_modified_gmt})\n";
				$text_diff .= "+++ $right_title	({$this->right_post->post_modified_gmt})\n";
				$text_diff .= "$diff\n\n";
			}

			$this->text_diff = $text_diff = rtrim( $text_diff );

			wp_mail(
				$email,
				/* translators: 1=blogname, 2=post type, 3=post title */
				sprintf( __( '[%1$s] %2$s changed: %3$s' ), $blogname, $post_type_label, $title ),
				$html_diff
			);

			do_action( 'email_post_changes_after_email_sent', $email );
		}

		remove_action( 'phpmailer_init', array( $this, 'phpmailer_init' ) );

		do_action( 'email_post_changes_email_sent' );
	}

	function phpmailer_init( &$phpmailer ) {
		$phpmailer->AltBody = $this->text_diff;

		$author_email = get_the_author_meta( 'email', $this->right_post->post_author );
		$author_name  = get_the_author_meta( 'display_name', $this->right_post->post_author );

		if ( ! empty( $author_email ) && ! empty( $author_name ) ) {
			$phpmailer->AddReplyTo(
				$author_email,
				$author_name
			);
		}
	}

	function get_post_type_label( $post_type ) {
		// 2.9
		if ( !function_exists( 'get_post_type_object' ) )
			return ucwords( str_replace( '_', ' ', $post_type ) );

		// 3.0
		$post_type_object = get_post_type_object( $post_type );
		if ( empty( $post_type_object->label ) )
			return ucwords( str_replace( '_', ' ', $post_type ) );
		return $post_type_object->label;
	}

	function restrict_options() {
		$this->do_options_capability_checks = true;
	}

	/* Admin */
	// phpcs:ignore Squiz.Scope.MethodScope.Missing
	function admin_menu() {
		$options = $this->get_options();

		$current_user_can_manage_options = current_user_can( 'manage_options' );

		if ( ! $current_user_can_manage_options && ! $options['enable'] ) {
			return;
		}

		add_action( 'load-options.php', [ $this, 'restrict_options' ] );

		register_setting( self::OPTION_GROUP, self::OPTION, [ $this, 'validate_options' ] );

		add_settings_section( self::ADMIN_PAGE, __( 'Email Post Changes' ), array( $this, 'settings_section' ), self::ADMIN_PAGE );
		if ( $current_user_can_manage_options ) {
			add_settings_field( self::ADMIN_PAGE . '_enable', __( 'Enable' ), array( $this, 'enable_setting' ), self::ADMIN_PAGE, self::ADMIN_PAGE );
		}

		if ( current_user_can( 'list_users' ) ) {
			add_settings_field( self::ADMIN_PAGE . '_users', __( 'Users to Email' ), array( $this, 'users_setting' ), self::ADMIN_PAGE, self::ADMIN_PAGE );
		} else {
			add_settings_field( self::ADMIN_PAGE . '_users', __( 'Send me Emails' ), array( $this, 'send_me_setting' ), self::ADMIN_PAGE, self::ADMIN_PAGE );
		}

		$overrides_title = __( 'Exceptions' );
		if ( $current_user_can_manage_options ) {
			$current_user = wp_get_current_user();

			add_settings_field( self::ADMIN_PAGE . '_emails', __( 'Additional Email Addresses' ), array( $this, 'emails_setting' ), self::ADMIN_PAGE, self::ADMIN_PAGE );
			add_settings_field( self::ADMIN_PAGE . '_post_types', __( 'Post Types' ), array( $this, 'post_types_setting' ), self::ADMIN_PAGE, self::ADMIN_PAGE );
			add_settings_field( self::ADMIN_PAGE . '_drafts', __( 'Drafts' ), array( $this, 'drafts_setting' ), self::ADMIN_PAGE, self::ADMIN_PAGE );
			$overrides_title = sprintf( __( 'Exceptions for %s' ), $current_user->display_name );
		}

		add_settings_field( self::ADMIN_PAGE . '_exceptions', $overrides_title, array( $this, 'overrides_setting' ), self::ADMIN_PAGE, self::ADMIN_PAGE );

		$hook = add_options_page( __( 'Email Post Changes' ), __( 'Email Post Changes' ), 'read', self::ADMIN_PAGE, array( $this, 'admin_page' ) );
		if ( ! $current_user_can_manage_options ) {
			add_filter( 'option_page_capability_' . self::ADMIN_PAGE, function() { return 'read'; } );
		}
		add_action( "admin_head-$hook", array( $this, 'admin_page_head' ) );
	}

	// Used in validate_options to array_walk the list of email addresses
	function trim_email( &$email, $key ) {
		$email = trim( $email );
	}

	function validate_options( $options ) {
		if ( !$options || !is_array( $options ) )
			return $this->defaults;

		$return = array();

		$previous_options = $this->get_options();

		if ( $this->do_options_capability_checks && ! current_user_can( 'list_users' ) ) {
			$return['users'] = $previous_options['users'];
		} else {
			// Users setting.
			if ( empty( $options['users'] ) || ! is_array( $options['users'] ) ) {
				$return['users'] = $this->defaults['users'];
			} else {
				$return['users'] = $options['users'];
			}
		}

		// Me setting. Only look at this in a form submission to options.php not in some other generic option update.
		if ( isset( $options['send_me'] ) && '1' === $options['send_me'] ) {
			// Send Me setting.
			// The logic is different here: we should only ever see the `me` setting
			// when a form is being submitted from the admin page, so 
			// `do_options_capability_checks` should always be true.
			if ( $this->do_options_capability_checks && current_user_can( 'read' ) ) {
				$current_user_id = get_current_user_id();

				if ( isset( $options['me'] ) && '1' === $options['me'] ) {
					$return['users'][] = $current_user_id;
					$return['users'] = array_unique( $return['users'] );
				} else {
					$return['users'] = array_diff( $return['users'], [ $current_user_id ] );
				}
			}
		}

		if ( $this->do_options_capability_checks && ! current_user_can( 'manage_options' ) ) {
			$return['enable'] = $previous_options['enable'];
			$return['emails'] = $previous_options['emails'];
			$return['post_types'] = $previous_options['post_types'];
			$return['drafts'] = $previous_options['drafts'];
		} else {
			// Enable setting.
			$return['enable'] = ( empty( $options['enable'] ) ) ? 0 : 1;

			// Email setting.
			if ( empty( $options['emails'] ) ) {
				if ( is_countable( $return['users'] ) ? count( $return['users'] ) : 0 ) {
					$return['emails'] = array();
				} else {
					$return['emails'] = $this->defaults['emails'];
				}
			} else {
				$_emails = is_string( $options['emails'] ) ? preg_split( '(\n|\r)', $options['emails'], -1, PREG_SPLIT_NO_EMPTY ) : array();
				$_emails = array_unique( $_emails );
				array_walk( $_emails, array( 'Email_Post_Changes', 'trim_email' ) );
				$emails = array_filter( $_emails, 'is_email' );

				$invalid_emails = array_diff( $_emails, $emails );
				if ( $invalid_emails )
					$return['invalid_emails'] = $invalid_emails;

				if ( $emails ) {
					$return['emails'] = $emails;
				} elseif ( is_countable( $return['users'] ) ? count( $return['users'] ) : 0 ) {
					$return['emails'] = array();
				} else {
					$return['emails'] = $this->defaults['emails'];
				}

				// Don't store a huge list of invalid emails addresses in the option
				if ( isset( $return['invalid_emails'] ) && count( $return['invalid_emails'] ) > 200 ) {
					$return['invalid_emails'] = array_slice( $return['invalid_emails'], 0, 200 );
					$return['invalid_emails'][] = __( 'and many more not listed here' );
				}

				// Cap to at max 200 email addresses
				if ( ( is_countable( $return['emails'] ) ? count( $return['emails'] ) : 0 ) > 200 ) {
					$return['emails'] = array_slice( $return['emails'], 0, 200 );
				}
			}

			// Post Types setting.
			if ( empty( $options['post_types'] ) || ! is_array( $options['post_types'] ) ) {
				$return['post_types'] = $this->defaults['post_types'];
			} else {
				$post_types = array_intersect( $options['post_types'], $this->get_post_types() );
				$return['post_types'] = $post_types ? $post_types : $this->defaults['post_types'];
			}

			// Drafts setting.
			$return['drafts'] = ( empty( $options['drafts'] ) ) ? 0 : 1;
		}

		do_action( 'email_post_changes_validate_options', $this->get_options(), $return );

		return $return;
	}

	function admin_page_head() {
		$options = $this->get_options();
		if ( ! empty( $options['invalid_emails'] ) && ! empty( $_REQUEST['settings-updated'] ) ) {
			add_settings_error(
				'email_post_changes',
				'email_post_changes',
				sprintf(
					/* Translators: Comma-separated list of invalid email addresses. */
					esc_html( _n( 'Invalid Email: %s', 'Invalid Emails: %s', is_countable( $options['invalid_emails'] ) ? count( $options['invalid_emails'] ) : 0 ) ),
					'<kbd>' . implode( '</kbd>, <kbd>', array_map( 'esc_html', $options['invalid_emails'] ) )
				)
			);
		}

?>
<style>
.epc-registered-user-selection {
	overflow: auto;
	max-height: 300px;
	max-width: 40em;
	border: 1px solid #ccc;
	background-color: #fafafa;
	padding: 12px;
	box-sizing: border-box;
}
.epc-registered-user-selection ul {
	margin: 0;
	padding: 0;
}
.epc-additional-emails {
	width: 40em;
}
</style>
<?php
	}

	// phpcs:ignore Squiz.Scope.MethodScope.Missing
	function admin_page() {
		$options = $this->get_options();
		?>

		<div class="wrap">
			<h1><?php esc_html_e( 'Email Post Changes' ); ?></h1>

			<form action="options.php" method="post">
				<?php settings_fields( self::OPTION_GROUP ); ?>
				<?php do_settings_sections( self::ADMIN_PAGE ); ?>
				<p class="submit">
					<input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save Changes' ); ?>" />
				</p>
			</form>
		</div>

		<?php
	}

	function settings_section() {
		if ( current_user_can( 'manage_options' ) ) {
			return;
		}

		$options = $this->get_options();

		$labels = array_map( [ $this, 'get_post_type_label' ], $options['post_types'] );
		?>
		
		<p><?php echo esc_html( wp_sprintf( __( 'This site can send you an email whenever changes to %l that you have access to are made.' ), $labels ) ); ?></p>
		<?php
	}

	function enable_setting() {
		$options = $this->get_options();
		?>

		<p><label><input type="checkbox" name="email_post_changes[enable]" value="1"<?php checked( $options['enable'], 1 ); ?> /> <?php esc_html_e( 'Send an email when a post or page changes.' ); ?></label></p>

		<?php
	}

	function users_setting() {
		$options = $this->get_options();
?>
		<div class="epc-registered-user-selection">
			<ul>
		<?php
			$users = get_users(
				array(
					'fields' => array(
						'ID',
						'display_name',
						'user_login',
						'user_email',
					),
				)
			);

		usort( $users, array( $this, 'sort_users_by_display_name' ) );

		foreach ( $users as $user ) : ?>
				<li><label><input type="checkbox" name="email_post_changes[users][]" value="<?php echo (int) $user->ID; ?>"<?php checked( in_array( $user->ID, $options['users'] ) ); ?> /> <?php echo esc_html( $user->display_name ); ?> ( <?php echo esc_html( $user->user_login ); ?> - <?php echo esc_html( $user->user_email ); ?> )</label></li>

<?php		endforeach; ?>
			</ul>
		</div>
<?php
	}

	function send_me_setting() {
		$options = $this->get_options();

		$is_active = in_array( get_current_user_id(), $options['users'], false );
?>
		<p>
			<label><input type="checkbox" name="email_post_changes[me]" value="1"<?php checked( $is_active ); ?> /> <?php esc_html_e( 'Email me changes.' ); ?></label>
			<input type="hidden" name="email_post_changes[send_me]" value="1" />
		</p>
<?php
	}

	function sort_users_by_display_name( $a, $b ) {
		return strcmp( strtolower( $a->display_name ), strtolower( $b->display_name ) );
	}

	function emails_setting() {
		$options = $this->get_options();
?>
		<textarea class="epc-additional-emails" rows="4" cols="40" name="email_post_changes[emails]"><?php echo esc_html( implode( "\n", $options['emails'] ) ); ?></textarea>
		<p class="description"><?php esc_html_e( 'One email address per line.' ); ?></p>
<?php
	}

	function post_types_setting() {
		$options = $this->get_options();
?>
		<ul>
<?php		foreach ( $this->get_post_types() as $post_type ) :
			$label = $this->get_post_type_label( $post_type );
?>
			<li><label><input type="checkbox" name="email_post_changes[post_types][]" value="<?php echo esc_attr( $post_type ); ?>"<?php checked( in_array( $post_type, $options['post_types'] ) ); ?> /> <?php echo esc_html( $label ); ?></label></li>
<?php		endforeach; ?>
		</ul>
<?php
	}

	function drafts_setting() {
		$options = $this->get_options();
?>
		<p><label><input type="checkbox" name="email_post_changes[drafts]" value="1"<?php checked( $options['drafts'], 1 ); ?> /> <?php esc_html_e( 'Email changes to drafts, not just published items.' ); ?></label></p>
<?php
	}

	function overrides_setting() {
		$options = $this->get_options();

		$is_active = in_array( get_current_user_id(), $options['users'], false );

		$labels = array_map( [ $this, 'get_post_type_label' ], $options['post_types'] );

		?>
		<p class="description"><?php echo esc_html(
			wp_sprintf(
				__( 'If you opt in your acount above to receive changes, you may exclude specific %1$l below. If you opt out above, you may include specific %1$l below.' ),
				$labels
			)
		); ?></p>
		<ul>

		<?php // TODO - real UI
		foreach ( $this->get_user_overrides( get_current_user_id() ) as $post_id => $override ) {
			if ( $override === $is_active ) {
				continue;
			}
			?>
			<li><?php echo get_the_title( $post_id ); ?></li>
			<?php
		}
	}

	function wp_text_diff( $left_string, $right_string, $args = null ) {
		$defaults = array( 'title' => '', 'title_left' => '', 'title_right' => '' );
		$args = wp_parse_args( $args, $defaults );

		$left_string  = normalize_whitespace( $left_string );
		$right_string = normalize_whitespace( $right_string );
		$left_lines  = explode( "\n", $left_string );
		$right_lines = explode( "\n", $right_string );

		$text_diff = new Text_Diff( $left_lines, $right_lines );
		$renderer  = new Email_Post_Changes_Diff();
		$diff = $renderer->render( $text_diff );

		if ( !$diff )
			return '';

		$r  = "<table style='width: 100%; border-collapse: collapse; border: none; white-space: pre-wrap; word-wrap: break-word; font-family: Consolas,Monaco,Courier,monospace;'>\n";

		if ( $args['title'] || $args['title_left'] || $args['title_right'] )
			$r .= "<thead>\n";
		if ( $args['title'] )
			$r .= "<tr class='diff-title'><th colspan='4'>" . esc_html( $args['title'] ) . "</th></tr>\n";
		if ( $args['title_left'] || $args['title_right'] ) {
			$r .= "<tr class='diff-sub-title'>\n";
			$r .= "\t<td></td><th>" . esc_html( $args['title_left'] ) . "</th>\n";
			$r .= "\t<td></td><th>" . esc_html( $args['title_right'] ) . "</th>\n";
			$r .= "</tr>\n";
		}
		if ( $args['title'] || $args['title_left'] || $args['title_right'] )
			$r .= "</thead>\n";
		$r .= "<tbody>\n$diff\n</tbody>\n";
		$r .= "</table>";
		return $r;
	}
}

if ( !class_exists( 'WP_Text_Diff_Renderer_Table' ) )
	require( ABSPATH . WPINC . '/wp-diff.php' );

class Email_Post_Changes_Diff extends WP_Text_Diff_Renderer_Table {
	var $_leading_context_lines  = 2;
	var $_trailing_context_lines = 2;

	/**
	 * @ignore
	 *
	 * @param string $line HTML-escape the value.
	 * @return string
	 */
	public function addedLine( $line ) {
		return "<td style='padding: 5px; width: 1em; text-align: end;' aria-label='" . __( 'Added:' ) . "'><span aria-hidden='true'>+</span></td>"
			. "<td style='padding: 5px; width: 50%; width: calc( 50% - 1em - 10px ); background-color: #dfd;'>{$line}</td>";
	}

	/**
	 * @ignore
	 *
	 * @param string $line HTML-escape the value.
	 * @return string
	 */
	public function deletedLine( $line ) {
		return "<td style='padding: 5px; width: 1em; text-align: end;' aria-label='" . __( 'Deleted:' ) . "'><span aria-hidden='true'>-</span></td>"
			. "<td style='padding: 5px; width: 50%; width: calc( 50% - 1em - 10px ); background-color: #fdd;'>{$line}</td>";
	}

	/**
	 * @ignore
	 *
	 * @param string $line HTML-escape the value.
	 * @return string
	 */
	public function contextLine( $line ) {
		return "<td style='padding: 5px; width: 1em;' aria-label='" . __( 'Unchanged:' ) . "'><span aria-hidden='true'>&nbsp;</span></td>"
			. "<td style='padding: 5px; width: 50%; width: calc( 50% - 1em - 10px );'>{$line}</td>";
	}

	/**
	 * @ignore
	 *
	 * @return string
	 */
	public function emptyLine() {
		return '<td colspan="2" style="padding: 5px;">&nbsp;</td>';
	}
}

