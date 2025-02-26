<?php
class DTBS_Plugin_Widget extends WP_Widget {

	/**
	 * WordPress でウィジェットを登録
	 */
	function __construct() {

		parent::__construct(
			'dtbs_widget', // Base ID
			__( 'detabess', DTBS_SCNAME ), // Name
			array(
				'classname'                   => 'dtbs_widget',
				'description'                 => __( 'Show widget for detabess', DTBS_SCNAME ),
				'customize_selective_refresh' => true,
			)
		);
	}

	/**
	 * ウィジェットのフロントエンド表示
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args   ウィジェットの引数
	 * @param array $instance データベースの保存値
	 */
	public function widget( $args, $instance ) {

		$db_list = $target_area = array();
		$id = $instance['dtbs_def'];

		$target_area = dtbs_get_target_area();

		if ( ! empty( $target_area ) ) {

			$params = dtbs_search_data_create( $_SERVER['REQUEST_URI'] );
			if ( isset( $params['cdb'] ) ) {
				$id = $params['cdb'];
			}

			global $wpdb;
			$res = $wpdb->get_results( 'SELECT * FROM ' . $wpdb->prefix . 'dtbs_target', 'ARRAY_A' );
			if ( ! empty( $res ) ) {
				foreach ( $res as $val ) {
					$db_list[ $val['cd_target'] ] = $val['cd_id'];
				}
			}

			$now_url_path = parse_url( $_SERVER['REQUEST_URI'] );

			if ( preg_match( '/\/[a-z0-9]{1,}?\//', $now_url_path['path'] ) ) {
				foreach ( $db_list as $url_name => $cd_id ) {
					if ( preg_match( '/\/' . $url_name . '\//', $now_url_path['path'] ) ) {
						$id = $cd_id;
						break;
					}
				}
			} elseif ( ! empty( $_GET['cdb'] ) && preg_match( '/[0-9]{1,}/', $_GET['cdb'] ) && in_array( sanitize_key( $_GET['cdb'] ), $db_list ) ) {
				$id = sanitize_key( $_GET['cdb'] );
			} elseif ( is_home() || is_front_page() || is_search() ) {
				$id = isset( $db_list['page'] ) ? $db_list['post'] : $id;
			} elseif ( is_page() ) {
				$id = isset( $db_list['page'] ) ? $db_list['page'] : $id;
			} elseif ( is_post_type_archive() && ! empty( $target_area ) ) {
				foreach ( $target_area as $area => $area_name ) {
					if ( is_post_type_archive( $area ) ) {
						$id = $db_list[ $area ];
						break;
					}
				}
			} elseif ( is_single() && ! empty( $target_area ) ) {
				foreach ( $target_area as $area => $area_name ) {
					if ( is_singular( $area ) ) {
						$id = $db_list[ $area ];
						break;
					}
				}
			}

			if ( $id > 0 ) {
				$res = dtbs_create_search_area( $id, 'side' );
				if ( ! empty( $res ) ) {
					echo $args['before_widget'];
					if ( ! empty( $instance['title'] ) ) {
						echo $args['before_title'] . esc_attr( $instance['title'] ) . $args['after_title'];
					}
					echo dtbs_create_search_area( $id, 'side' );
					echo $args['after_widget'];
				}
			}
		}
	}

	/**
	 * バックエンドのウィジェットフォーム
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance データベースからの前回保存された値
	 */
	public function form( $instance ) {

		$dtbs_list = dtbs_get_list();

		$dtbs_def = ! empty( $instance['dtbs_def'] ) ? $instance['dtbs_def'] : '';
		$title = ! empty( $instance['title'] ) ? $instance['title'] : ''; ?>
	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title', DTBS_SCNAME ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
	</p>
	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'dtbs_def' ) ); ?>"><?php _e( 'default', DTBS_SCNAME ); ?></label> 
		<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'dtbs_def' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'dtbs_def' ) ); ?>">
		<option value="0"></option>
		<?php
		foreach ($dtbs_list as $list) { ?>
			<option value="<?php echo esc_attr( $list['cd_id'] ); ?>"<?php if ( $dtbs_def == $list['cd_id'] ) echo ' selected'; ?>><?php echo esc_attr( $list['cd_title'] ); ?></option>
<?php
		}
?>
	</select>
<?php
	}

	/**
	 * ウィジェットフォームの値を保存用にサニタイズ
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance 保存用に送信された値
	 * @param array $old_instance データベースからの以前保存された値
	 *
	 * @return array 保存される更新された安全な値
	 */
	public function update( $new_instance, $old_instance ) {
		$instance          = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['dtbs_def'] = ( ! empty( $new_instance['dtbs_def'] ) ) ? strip_tags( $new_instance['dtbs_def'] ) : '';
		return $instance;
	}

}

function dtbs_register_plugin_widget() {
	register_widget( 'DTBS_Plugin_Widget' );
}
add_action( 'widgets_init', 'dtbs_register_plugin_widget' );
?>
