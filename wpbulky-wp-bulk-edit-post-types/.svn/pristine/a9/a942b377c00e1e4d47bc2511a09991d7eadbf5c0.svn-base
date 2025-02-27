<?php

namespace BULKYWP\Admin;

use BULKYWP\Includes\Support;

defined( 'ABSPATH' ) || exit;

class Editor {

	protected static $instance = null;
	protected $filter_saved;
	protected $allow_html_tags;

	public function __construct() {
		add_action( 'admin_notices', [ $this, 'remove_notice' ], 1 );
		add_filter( 'admin_body_class', [ $this, 'full_screen_option' ] );
	}

	public static function instance() {
		return self::$instance == null ? self::$instance = new self() : self::$instance;
	}

	public function remove_notice() {
		if ( strpos( get_current_screen()->id, 'wpbulky_page_vi_wpbulky_edit_' ) !== false ) {
			remove_all_actions( 'admin_notices' );
		}
	}

	public function full_screen_option( $body_class ) {
		$full_screen = get_option( 'vi_wpbulky_full_screen_option' ) ? ' vi-wpbulky-full-screen ' : '';

		return $body_class . $full_screen;
	}

	public function editor() {
		global $wpbulky_post_type;
		$user_id = get_current_user_id();
		if ( ! BulkyWP_Data()->get_setting( 'save_filter' ) ) {
			delete_transient( "vi_wpbulky_{$wpbulky_post_type}_filter_data_{$user_id}" );
		}

		$columns            = BulkyWP_Data()->get_culumns_type_title();
		$this->filter_saved = get_transient( "vi_wpbulky_{$wpbulky_post_type}_filter_data_{$user_id}" );
		$users              = get_users( [ [  'capability' => 'edit_posts' ], 'fields' => [ 'ID', 'display_name' ] ] );

		$users_options = [ '' => esc_html__( 'Author', 'wpbulky-wp-bulk-edit-post-types' ) ];
		if ( ! empty( $users ) && is_array( $users ) ) {
			foreach ( $users as $user ) {
				$users_options[ $user->ID ] = $user->display_name;
			}
		}

		$full_screen_icon  = get_option( 'vi_wpbulky_full_screen_option' ) ? 'window close outline' : 'external alternate';
		$full_screen_title = get_option( 'vi_wpbulky_full_screen_option' ) ? esc_html__( 'Exit full screen', 'wpbulky-wp-bulk-edit-post-types' ) : esc_html__( 'Full screen', 'wpbulky-wp-bulk-edit-post-types' );

		?>

        <div id="vi-wpbulky-container">
            <div id="vi-wpbulky-wrapper">

                <div id="vi-wpbulky-menu-bar">
                    <div class="vi-ui menu">

                        <a class="item vi-wpbulky-open-sidebar" data-menu_tab="filter" title="<?php esc_html_e( 'Filter', 'wpbulky-wp-bulk-edit-post-types' ); ?>">
                            <i class="filter icon"> </i>
                        </a>

                        <a class="item vi-wpbulky-open-sidebar" data-menu_tab="settings" title="<?php esc_html_e( 'Settings', 'wpbulky-wp-bulk-edit-post-types' ); ?>">
                            <i class="cog icon"> </i> <!--sliders horizontal-->
                        </a>

                        <a class="item vi-wpbulky-open-sidebar" data-menu_tab="meta_field" title="<?php esc_html_e( 'Meta fields', 'wpbulky-wp-bulk-edit-post-types' ); ?>">
                            <i class="server icon"> </i>
                        </a>
                        <a class="item vi-wpbulky-open-sidebar" data-menu_tab="history" title="<?php esc_html_e( 'History', 'wpbulky-wp-bulk-edit-post-types' ); ?>">
                            <i class="history icon"> </i>
                        </a>

                        <a class="item vi-wpbulky-new-post" title="<?php esc_html_e( 'Add new', 'wpbulky-wp-bulk-edit-post-types' ); ?>">
                            <i class="plus icon"> </i>
                        </a>
                        <a class="item vi-wpbulky-save-button" title="<?php esc_html_e( 'Save', 'wpbulky-wp-bulk-edit-post-types' ); ?>">
                            <i class="save icon"> </i>
                        </a>

                        <a class="item vi-wpbulky-get-post" title="<?php esc_html_e( 'Reload this page', 'wpbulky-wp-bulk-edit-post-types' ); ?>">
                            <i class="sync alternate icon"> </i>
                        </a>

                        <a class="item vi-wpbulky-full-screen-btn" title="<?php echo esc_attr( $full_screen_title ) ?>">
                            <i class="<?php echo esc_attr( $full_screen_icon ) ?> icon"> </i>
                        </a>

                        <div class="vi-wpbulky-menu-bar-center">

                        </div>

                        <div class="vi-wpbulky-pagination">
                        </div>
                    </div>
                </div>

                <div id="vi-wpbulky-sidebar" class="vi-ui form small">
                    <div class="vi-wpbulky-sidebar-wrapper">
                        <span class="vi-wpbulky-close-sidebar"><i class="dashicons dashicons-no-alt"> </i></span>
                        <div class="vi-wpbulky-sidebar-inner">

                            <div class="vi-ui top attached tabular menu">
                                <a class="active item" data-tab="filter"><?php esc_html_e( 'Filter', 'wpbulky-wp-bulk-edit-post-types' ); ?></a>
                                <a class="item" data-tab="settings"><?php esc_html_e( 'Settings', 'wpbulky-wp-bulk-edit-post-types' ); ?></a>
                                <a class="item" data-tab="meta_field"><?php esc_html_e( 'Meta fields', 'wpbulky-wp-bulk-edit-post-types' ); ?></a>
                                <a class="item" data-tab="history"><?php esc_html_e( 'History', 'wpbulky-wp-bulk-edit-post-types' ); ?></a>
                            </div>

                            <div class="vi-ui bottom attached active tab segment" data-tab="filter">
                                <form class="" id="vi-wpbulky-posts-filter">
									<?php
									$this->filter_input_element( [
										'type'  => 'text',
										'id'    => 'id',
										'label' => esc_html__( 'ID (Use comma or minus for range)', 'wpbulky-wp-bulk-edit-post-types' ),
									] );

									$this->filter_input_element( [
										'type'     => 'text',
										'id'       => 'post_title',
										'label'    => esc_html__( 'Title', 'wpbulky-wp-bulk-edit-post-types' ),
										'behavior' => true
									] );

									$this->filter_input_element( [
										'type'     => 'text',
										'id'       => 'post_content',
										'label'    => esc_html__( 'Content', 'wpbulky-wp-bulk-edit-post-types' ),
										'behavior' => true
									] );

									$this->filter_input_element( [
										'type'     => 'text',
										'id'       => 'post_excerpt',
										'label'    => esc_html__( 'Excerpt', 'wpbulky-wp-bulk-edit-post-types' ),
										'behavior' => true
									] );

									$this->filter_input_element( [
										'type'     => 'text',
										'id'       => 'post_name',
										'label'    => esc_html__( 'Slug', 'wpbulky-wp-bulk-edit-post-types' ),
										'behavior' => true
									] );
									?>

                                    <div class="two fields">
										<?php
										$this->filter_input_element( [
											'type'  => 'date',
											'id'    => 'post_date_from',
											'label' => esc_html__( 'Post date from', 'wpbulky-wp-bulk-edit-post-types' )
										] );
										$this->filter_input_element( [
											'type'  => 'date',
											'id'    => 'post_date_to',
											'label' => esc_html__( 'Post date to', 'wpbulky-wp-bulk-edit-post-types' )
										] );
										?>
                                    </div>

                                    <div class="two fields">
										<?php
										$post_status_options = [
											''        => esc_html__( 'Post status', 'wpbulky-wp-bulk-edit-post-types' ),
											'draft'   => esc_html__( 'Draft', 'wpbulky-wp-bulk-edit-post-types' ),
											'pending' => esc_html__( 'Pending', 'wpbulky-wp-bulk-edit-post-types' ),
											'private' => esc_html__( 'Private', 'wpbulky-wp-bulk-edit-post-types' ),
											'publish' => esc_html__( 'Publish', 'wpbulky-wp-bulk-edit-post-types' ),
										];
										switch ($wpbulky_post_type){
											case 'attachment':
												$post_status_options = [];
												break;
											case 'page':
											case 'post':
												$post_status_options['future'] = esc_html__( 'Scheduled', 'wpbulky-wp-bulk-edit-post-types' );
												break;
										}
										if (!empty($post_status_options)) {
											$this->filter_input_element( [
												'type'    => 'select',
												'id'      => 'post_status',
												'options' => $post_status_options
											] );
										}
										$this->filter_input_element( [
											'type'    => 'select',
											'id'      => 'author',
											'options' => $users_options
										] );
										?>
                                    </div>

									<?php
									$taxonomies = get_object_taxonomies( $wpbulky_post_type, 'objects' );

									foreach ( $taxonomies as $taxonomy => $params ) {
										$options     = [];
										$options[''] = $params->label;

										if ( taxonomy_exists( $taxonomy ) ) {
											$terms = get_terms( [ 'taxonomy' => $taxonomy, 'hide_empty' => false ] );
											foreach ( $terms as $term ) {
												$options[ $term->slug ] = $term->name;
											}
										}

										$this->filter_input_element( [
											'type'        => 'multi-select',
											'id'          => $taxonomy,
											'options'     => $options,
											'name_prefix' => 'taxonomies',
											'operator'    => true,
										] );
									}
									?>

                                </form>

                                <div class="vi-wpbulky-sidebar-footer">
                                        <span class="vi-ui button small vi-wpbulky-apply-filter">
                                            <?php esc_html_e( 'Filter', 'wpbulky-wp-bulk-edit-post-types' ); ?>
                                        </span>
                                    <span class="vi-ui button small vi-wpbulky-clear-filter">
                                            <?php esc_html_e( 'Clear', 'wpbulky-wp-bulk-edit-post-types' ); ?>
                                        </span>
                                </div>

                            </div>

                            <div class="vi-ui bottom attached tab segment" data-tab="settings">
                                <form class="vi-wpbulky-settings-tab ">

									<?php
									$this->setting_input_element( [
										'type'  => 'get_pro_version',
										'id'    => 'save_filter',
										'label' => esc_html__( 'Settings for each user', 'wpbulky-wp-bulk-edit-post-types' ),
									] );
									$this->setting_input_element( [
										'type'         => 'multi-select',
										'id'           => 'edit_fields',
										'select_class' => 'vi-wpbulky-select-columns-to-edit vi-wpbulky-select2 search',
										'label'        => esc_html__( 'Fields to edit', 'wpbulky-wp-bulk-edit-post-types' ),
										'options'      => [ '' => esc_html__( 'All fields', 'wpbulky-wp-bulk-edit-post-types' ) ] + $columns,
										'clear_button' => true
									] );

									$this->setting_input_element( [
										'type'         => 'multi-select',
										'id'           => 'exclude_edit_fields',
										'select_class' => 'vi-wpbulky-exclude-fields-to-edit vi-wpbulky-select2 search',
										'label'        => esc_html__( 'Exclude fields to edit', 'wpbulky-wp-bulk-edit-post-types' ),
										'options'      => [ '' => esc_html__( 'No field', 'wpbulky-wp-bulk-edit-post-types' ) ] + $columns,
										'clear_button' => true
									] );

									$this->setting_input_element( [
										'type'  => 'get_pro_version',
										'id'    => 'posts_per_page',
										'min'   => 1,
										'max'   => 50,
										'label' => esc_html__( 'Posts per page', 'wpbulky-wp-bulk-edit-post-types' )
									] );

									$this->setting_input_element( [
										'type'    => 'select',
										'id'      => 'order_by',
										'label'   => esc_html__( 'Order by', 'wpbulky-wp-bulk-edit-post-types' ),
										'options' => [
											'ID'    => 'ID',
											'title' => esc_html__( 'Title', 'wpbulky-wp-bulk-edit-post-types' ),
										]
									] );

									$this->setting_input_element( [
										'type'    => 'select',
										'id'      => 'order',
										'label'   => esc_html__( 'Order', 'wpbulky-wp-bulk-edit-post-types' ),
										'options' => [ 'DESC' => 'DESC', 'ASC' => 'ASC', ]
									] );

									$this->setting_input_element( [
										'type'  => 'get_pro_version',
										'id'    => 'auto_remove_revision',
										'min'   => 0,
										'max'   => 1000,
										'label' => esc_html__( 'Time to delete revision', 'wpbulky-wp-bulk-edit-post-types' ),
										'unit'  => esc_html__( 'day(s)', 'wpbulky-wp-bulk-edit-post-types' ),
									] );

									$this->setting_input_element( [
										'type'  => 'get_pro_version',
										'id'    => 'wrap_mode',
										'label' => esc_html__( 'Wrap mode', 'wpbulky-wp-bulk-edit-post-types' ),
									] );

									$this->setting_input_element( [
										'type'  => 'get_pro_version',
										'id'    => 'save_filter',
										'label' => esc_html__( 'Save filter when reload page', 'wpbulky-wp-bulk-edit-post-types' ),
									] );

									?>

                                </form>

                                <div class="vi-wpbulky-sidebar-footer">
                                    <span class="vi-ui button small vi-wpbulky-save-settings">
                                        <?php esc_html_e( 'Save', 'wpbulky-wp-bulk-edit-post-types' ); ?>
                                    </span>
                                </div>

                            </div>

                            <div class="vi-ui bottom attached tab segment" data-tab="meta_field">
								<?php Support::get_pro_version(); ?>
                            </div>

                            <div class="vi-ui bottom attached tab segment" data-tab="history">
								<?php Support::get_pro_version(); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="vi-wpbulky-editor" class="vi-ui segment vi-wpbulky-editor-<?php echo esc_attr($wpbulky_post_type) ?>">
                    <div class="wvps-scroll">

                        <div id="vi-wpbulky-spreadsheet" class="vi-wpbulky-spreadsheet-<?php echo esc_attr($wpbulky_post_type) ?>">

                        </div>
                    </div>
                </div>

            </div>

            <!------------------- Modal ---------------------->
            <div class="vi-ui modal">
                <i class="close icon"></i>


                <div class="scrolling content vi-wpbulky-editing" style="box-sizing: border-box;height: 5000px">

                    <div>
                        <textarea id="vi-wpbulky-text-editor"></textarea>
                    </div>

                </div>

                <div class="actions vi-wpbulky-editing">
                    <div class="vi-ui button tiny vi-wpbulky-text-editor-save">
						<?php esc_html_e( 'Save', 'wpbulky-wp-bulk-edit-post-types' ); ?>
                    </div>
                    <div class="vi-ui button tiny vi-wpbulky-text-editor-save vi-wpbulky-close">
						<?php esc_html_e( 'Save & Close', 'wpbulky-wp-bulk-edit-post-types' ); ?>
                    </div>
                </div>

            </div>

            <div class=" vi-ui segment form vi-wpbulky-context-popup"></div>

            <div id="vi-hui-toast"></div>

        </div>
		<?php
	}

	public function filter_input_element( $args = [] ) {
		$args = wp_parse_args( $args, [
			'type'         => '',
			'id'           => '',
			'label'        => '',
			'behavior'     => '',
			'operator'     => '',
			'name_prefix'  => '',
			'class'        => '',
			'placeholder'  => '',
			'label_class'  => 'vi-wpbulky-filter-label',
			'input_class'  => 'vi-wpbulky-filter-input',
			'select_class' => 'vi-wpbulky-filter-select',
			'more_content' => '',
			'unit'         => ''
		] );

		if ( in_array( $args['type'], [ 'text', 'number', 'date' ] ) ) {
			$args['class'] .= 'vi-wpbulky-filter-input-scope';
		}

		if ( $args['behavior'] ) {
			$args['more_content'] = $this->behavior_ui( $args['id'] );
			$args['action_class'] = 'action';
		}

		if ( $args['operator'] ) {
			$args['more_content'] = $this->operator_ui( $args['id'] );
			$args['action_class'] = 'action';
		}

		if ( $args['unit'] ) {
			$args['more_content'] = sprintf( "<div class='vi-ui basic label'>%s</div>", esc_html( $args['unit'] ) );
		}

		if ( $args['name_prefix'] ) {
			$value = $this->filter_saved[ $args['name_prefix'] ][ $args['id'] ] ?? ( $this->filter_saved[ $args['id'] ] ?? '' );
		} else {
			$value = $this->filter_saved[ $args['id'] ] ?? '';
		}

		$this->core_elements( $args, $value );
	}

	public function setting_input_element( $args ) {
		$args = wp_parse_args( $args, [
			'type'         => '',
			'id'           => '',
			'default'      => '',
			'label'        => '',
			'behavior'     => '',
			'operator'     => '',
			'name_prefix'  => '',
			'class'        => '',
			'label_class'  => '',
			'input_class'  => '',
			'select_class' => '',
			'more_content' => '',
			'unit'         => '',
			'clear_button' => '',
			'placeholder'  => '',
		] );

		if ( $args['unit'] ) {
			$args['more_content'] = sprintf( "<div class='vi-ui basic label'>%s</div>", esc_html( $args['unit'] ) );
			$args['action_class'] = 'right labeled';
		}

		$data  = BulkyWP_Data()->get_settings();
		$value = $data[ $args['id'] ] ?? '';
		$this->core_elements( $args, $value );
	}

	public function core_elements( $args, $value ) {
		if ( ! $this->allow_html_tags ) {
			$this->allow_html_tags = wp_parse_args(
				[
					'input'  => [ 'class' => true, 'name' => true ],
					'select' => [ 'class' => true, 'name' => true, 'multiple' => true ],
					'option' => [ 'value' => true, 'selected' => true ],
					'div'    => [ 'value' => true, 'class' => true ]
				],
				wp_kses_allowed_html() );
		}

		?>
        <div class="field <?php echo esc_attr( $args['class'] ) ?>">
			<?php
			switch ( $args['type'] ) {
				case 'text':
				case 'number':
				case 'date':
					$min = isset( $args['min'] ) ? " min={$args['min']}" : '';
					$max = isset( $args['max'] ) ? " max={$args['max']}" : '';
					?>
                    <label class="<?php echo esc_attr( $args['label_class'] ) ?>">
						<?php echo esc_attr( $args['label'] ) ?>
                    </label>
                    <div class="vi-ui input small <?php echo esc_attr( $args['action_class'] ?? '' ); ?>">
                        <input type="<?php echo esc_attr( $args['type'] ) ?>" placeholder="<?php echo esc_attr( $args['placeholder'] ) ?>"
                               name="<?php echo esc_attr( $args['id'] ) ?>"
                               value="<?php echo esc_attr( $value ) ?>"
                               class="<?php echo esc_attr( $args['input_class'] ) ?>" <?php echo esc_attr( $min . $max ) ?>>
						<?php echo wp_kses( $args['more_content'], $this->allow_html_tags ); ?>
                    </div>
					<?php
					break;

				case 'select':
				case 'multi-select':
					$multiple = $args['type'] == 'multi-select' ? 'multiple' : '';
					$name = $args['name_prefix'] ? $args['name_prefix'] . "[{$args['id']}]" : $args['id'];
					$name = $multiple ? $name . '[]' : $name;
					?>
                    <label class="<?php echo esc_attr( $args['label_class'] ) ?>">
						<?php echo esc_attr( $args['label'] ) ?>
                    </label>
                    <div class="vi-ui input small <?php echo esc_attr( $args['action_class'] ?? '' ); ?>">
                        <select id="vi-wpbulky-<?php echo esc_attr( $args['id'] ?? '' ) ?>"
                                name="<?php echo esc_attr( $name ) ?>"
                                class="vi-wpbulky vi-ui fluid dropdown <?php echo esc_attr( $args['select_class'] ) ?>"
                                data-placeholder="" <?php echo esc_attr( $multiple ) ?> >
							<?php
							if ( ! empty( $args['options'] ) && is_array( $args['options'] ) ) {
								foreach ( $args['options'] as $key => $label ) {
									if ( $multiple && is_array( $value ) ) {
										$selected = in_array( $key, $value ) ? 'selected' : '';
									} else {
										$selected = $key == $value ? 'selected' : '';
									}
									printf( "<option value='%s' %s>%s</option>", esc_attr( $key ), esc_attr( $selected ), esc_html( $label ) );
								}
							}
							?>
                        </select>
						<?php
						if ( ! empty( $args['clear_button'] ) ) {
							?>
                            <span class="vi-wpbulky-multi-select-clear"><i class="dashicons dashicons-no-alt"> </i></span>
							<?php
						}
						?>
						<?php echo wp_kses( $args['more_content'], $this->allow_html_tags ); ?>
                    </div>
					<?php
					break;

				case 'checkbox':
					?>
                    <label class="<?php echo esc_attr( $args['label_class'] ) ?>">
						<?php echo esc_attr( $args['label'] ) ?>
                    </label>
                    <div class="vi-ui toggle checkbox small <?php echo esc_attr( $args['action_class'] ?? '' ); ?>">
                        <input type="checkbox"
                               name="<?php echo esc_attr( $args['id'] ) ?>"
                               value="1" <?php checked( $value, 1 ) ?>
                               class="<?php echo esc_attr( $args['input_class'] ) ?>">
                        <label> </label>
						<?php echo wp_kses( $args['more_content'], $this->allow_html_tags ); ?>
                    </div>
					<?php
					break;
				case 'get_pro_version':
					?>
                    <label class="<?php echo esc_attr( $args['label_class'] ) ?>">
						<?php echo esc_attr( $args['label'] ) ?>
                    </label>
                    <div class="vi-ui toggle checkbox small <?php echo esc_attr( $args['action_class'] ?? '' ); ?>">
						<?php Support::get_pro_version(); ?>
                    </div>
					<?php
					break;
			}
			?>
        </div>
		<?php

	}

	public function behavior_ui( $id ) {
		$behaviors = [
			'like'  => esc_html__( 'Like', 'wpbulky-wp-bulk-edit-post-types' ),
			'exact' => esc_html__( 'Exact', 'wpbulky-wp-bulk-edit-post-types' ),
			'not'   => esc_html__( 'Not', 'wpbulky-wp-bulk-edit-post-types' ),
			'begin' => esc_html__( 'Begin', 'wpbulky-wp-bulk-edit-post-types' ),
			'end'   => esc_html__( 'End', 'wpbulky-wp-bulk-edit-post-types' ),
			'empty' => esc_html__( 'Empty', 'wpbulky-wp-bulk-edit-post-types' ),
		];

		$saved_behavior = $this->filter_saved['behavior'][ $id ] ?? '';
		ob_start();
		?>
        <select class="vi-ui compact selection dropdown" name="behavior[<?php echo esc_attr( $id ) ?>]">
			<?php
			foreach ( $behaviors as $behavior => $show ) {
				printf( '<option value="%s" %s>%s</option>', esc_attr( $behavior ), selected( $behavior, $saved_behavior, false ), esc_html( $show ) );
			}
			?>
        </select>
		<?php
		return ob_get_clean();
	}

	public function operator_ui( $id ) {
		$operators      = [
			'or'     => esc_html__( 'Or', 'wpbulky-wp-bulk-edit-post-types' ),
			'and'    => esc_html__( 'And', 'wpbulky-wp-bulk-edit-post-types' ),
			'not_in' => esc_html__( 'Not in', 'wpbulky-wp-bulk-edit-post-types' ),
		];
		$saved_operator = $this->filter_saved['operator'][ $id ] ?? '';
		ob_start();
		?>
        <select class="vi-ui compact selection dropdown" name="operator[<?php echo esc_attr( $id ) ?>]">
			<?php
			foreach ( $operators as $operator => $show ) {
				printf( '<option value="%s" %s>%s</option>',
					esc_attr( $operator ), selected( $operator, $saved_operator, false ), esc_html( $show ) );
			}
			?>
        </select>
		<?php
		return ob_get_clean();
	}
}