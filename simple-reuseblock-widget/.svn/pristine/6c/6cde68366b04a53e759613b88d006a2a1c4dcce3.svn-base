<?php
defined( 'ABSPATH' ) || exit;
// ini_set( 'display_errors', 1 );
// 再利用ブロックウィジェット!
if ( ! class_exists( 'SimpleReuseblockWidgetItem' ) ) {
	class SimpleReuseblockWidgetItem extends WP_Widget {
		function __construct() {
			parent::__construct(
				'srbw_reblock_widget',   // ウィジェットID!
				'再利用ブロックウィジェット',        // ウィジェット名!
				array( 'description' => '再利用ブロックの本文部分を表示することのできるウィジェットです' )   // ウィジェットの概要!
			);
		}

		function form( $instance ) {
			$title_new   = ! empty( $instance['title_new'] ) ? $instance['title_new'] : '';
			$block_id    = ! empty( $instance['block_id'] ) ? $instance['block_id'] : '';
			$showtype    = ! empty( $instance['showtype'] ) ? $instance['showtype'] : array();
			$customtype  = ! empty( $instance['customtype'] ) ? $instance['customtype'] : array();
			$postid      = ! empty( $instance['postid'] ) ? $instance['postid'] : '';
			$pageid      = ! empty( $instance['pageid'] ) ? $instance['pageid'] : '';
			$displaytype = ! empty( $instance['displaytype'] ) ? $instance['displaytype'] : '';
			$logintype   = ! empty( $instance['logintype'] ) ? $instance['logintype'] : '';
			?>
			<?php // タイトル入力フォーム! ?>
			<p>
				<span for="<?php echo esc_attr( $this->get_field_id( 'title_new' ) ); ?>">
			<?php esc_attr_e( 'ウィジェット表示名' ); ?>
				</span>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title_new' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title_new' ) ); ?>" type="text" value="<?php echo esc_attr( $title_new ); ?>" />
			</p>
			<?php // 再利用ブロック選択! ?>
			<p>
				<span for="<?php echo esc_attr( $this->get_field_id( 'block_id' ) ); ?>">
					<?php esc_attr_e( '再利用ブロックタイトル' ); ?>
				</span>
				<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'block_id' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'block_id' ) ); ?>">
					<option><?php esc_attr_e( '再利用ブロック選択' ); ?></option>
					<?php
					$args      = array(
						'posts_per_page' => -1,
						'post_type'      => 'wp_block',
						'post_status'    => 'publish',
						'order'          => 'asc',
						'no_found_rows'  => true,
					);
					$the_query = new WP_Query( $args );
					while ( $the_query->have_posts() ) {
						$the_query->the_post();
						?>
						<option value="<?php the_ID(); ?>" <?php selected( $block_id, get_the_ID() ); ?>><?php the_title(); ?></option>
						<?php
					}
					wp_reset_postdata();
					?>
				</select>
			</p>
				<?php // 表示位置選択! ?>
				<span>
					<?php esc_attr_e( 'ウィジェットの表示選択' ); ?>
				</span>
				<div>
					<?php
					$showwkeys = array(
						'ホームページ'    => 'home',
						'フロントページ'   => 'front',
						'投稿ページ'     => 'post',
						'固定ページ'     => 'page',
						'全アーカイブ'    => 'archive',
						'カテゴリアーカイブ' => 'cat',
						'タグアーカイブ'   => 'tag',
						'日付アーカイブ'   => 'date',
						'投稿者アーカイブ'  => 'autor',
						'検索結果ページ'   => 'search',
						'404ページ'    => '404',
						'1ページ目のみ'   => 'first',
					);
					foreach ( $showwkeys as $key => $value ) {
						?>
						<label>
							<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'showtype' ) . '_' . $value ); ?>" 
							name="<?php echo esc_attr( $this->get_field_name( 'showtype' ) . '[' . $key . ']' ); ?>" 
							type="checkbox" value="<?php echo esc_attr( $value ); ?>" 
							<?php checked( ! empty( $showtype[ $key ] ) ); ?>>
							<?php esc_attr_e( $key ); ?>
						</label>
					<?php } ?>
						<?php // id指定表示! ?>
					<p>
						<span>
								<?php esc_attr_e( '投稿ID指定表示' ); ?>
						</span>
						<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'postid' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'postid' ) ); ?>" type="text" value="<?php echo esc_attr( $postid ); ?>" placeholder="複数指定する際はカンマ区切りで入力してください"/>
					</p>
					<p>
						<span>
								<?php esc_attr_e( '固定ページID指定表示' ); ?>
						</span>
						<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'pageid' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'pageid' ) ); ?>" type="text" value="<?php echo esc_attr( $pageid ); ?>" placeholder="複数指定する際はカンマ区切りで入力してください"/>
					</p>
						<?php
						// カスタム投稿タイプ!
						$args           = array(
							'public'   => true,
							'_builtin' => false,
						);
						$output         = 'objects';
						$customtypelist = get_post_types( $args, $output );
						if ( isset( $customtypelist ) ) {
							?>
							<p>
							<span>
								<?php esc_attr_e( 'カスタム投稿タイプの表示選択' ); ?>
							</span><br>
							<?php
							foreach ( $customtypelist as $type ) {
								?>
								<label>
									<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'customtype' ) . '_' . $type->name ); ?>" 
									name="<?php echo esc_attr( $this->get_field_name( 'customtype' ) . '[' . $type->label . ']' ); ?>" 
									type="checkbox" value="<?php echo esc_attr( $type->name ); ?>" 
								<?php checked( ! empty( $customtype[ $type->label ] ) ); ?>>
								<?php esc_attr_e( $type->label ); ?>
								</label>
								<?php
							}
							?>
							</p>
							<?php
						}
						?>
						<hr>

					<p>
						<span>
							<?php esc_attr_e( '表示デバイス選択' ); ?>
						</span>
						<label>
							<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'displaytype' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'displaytype' ) ); ?>" type="radio" value="" <?php checked( $displaytype, '' ); ?>/><?php esc_attr_e( '全て' ); ?>
						</label>
						<label>
							<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'displaytype' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'displaytype' ) ); ?>" type="radio" value="pc" <?php checked( $displaytype, 'pc' ); ?>/><?php esc_attr_e( 'PC' ); ?>
						</label>
						<label>
							<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'displaytype' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'displaytype' ) ); ?>" type="radio" value="mobile" <?php checked( $displaytype, 'mobile' ); ?>/><?php esc_attr_e( 'mobile' ); ?>
						</label>
					</p>
						<?php // 表示ログインタイプ! ?>
					<p>
						<span>
							<?php esc_attr_e( '表示ユーザー選択' ); ?>
						</span>
						<label>
							<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'logintype' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'logintype' ) ); ?>" type="radio" value="" <?php checked( $logintype, '' ); ?>/><?php esc_attr_e( '全て' ); ?>
						</label>
						<label>
							<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'logintype' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'logintype' ) ); ?>" type="radio" value="login" <?php checked( $logintype, 'login' ); ?>/><?php esc_attr_e( 'ログインユーザー限定表示' ); ?>
						</label>
						<label>
							<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'logintype' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'logintype' ) ); ?>" type="radio" value="logout" <?php checked( $logintype, 'logout' ); ?>/><?php esc_attr_e( '非ログインユーザー限定表示' ); ?>
						</label>
					</p>
				</div>
				<?php
				// print_r(get_option( 'showtype' ));
				// var_dump( $showtype);
				// var_dump( $instance['showtype']);
				// print_r(get_option( 'sidebars_widgets' ));
		}

		function update( $new_instance, $old_instance ) {
			$instance                = $old_instance;
			$instance['title_new']   = wp_strip_all_tags( $new_instance['title_new'] );
			$instance['block_id']    = wp_strip_all_tags( $new_instance['block_id'] );
			$instance['showtype']    = array_map( 'sanitize_text_field', $new_instance['showtype'] );
			$instance['postid']      = wp_strip_all_tags( $new_instance['postid'] );
			$instance['pageid']      = wp_strip_all_tags( $new_instance['pageid'] );
			$instance['customtype']  = array_map( 'sanitize_text_field', $new_instance['customtype'] );
			$instance['displaytype'] = wp_strip_all_tags( $new_instance['displaytype'] );
			$instance['logintype']   = wp_strip_all_tags( $new_instance['logintype'] );
			// 表示制御用配列!
			$replaceid      = $this->id_base . '-' . $this->number;
			$opsrbw_widgets = get_option( 'srbw_widgets' );
			if ( ! $opsrbw_widgets ) {
				update_option(
					'srbw_widgets',
					array(
						$replaceid => array(
							'showtype'    => $instance['showtype'],
							'postid'      => $instance['postid'],
							'pageid'      => $instance['pageid'],
							'customtype'  => $instance['customtype'],
							'displaytype' => $instance['displaytype'],
							'logintype'   => $instance['logintype'],
						),
					)
				);
			} else {
				$opsrbw_widgets[ $replaceid ]['showtype']    = $instance['showtype'];
				$opsrbw_widgets[ $replaceid ]['postid']      = $instance['postid'];
				$opsrbw_widgets[ $replaceid ]['pageid']      = $instance['pageid'];
				$opsrbw_widgets[ $replaceid ]['customtype']  = $instance['customtype'];
				$opsrbw_widgets[ $replaceid ]['displaytype'] = $instance['displaytype'];
				$opsrbw_widgets[ $replaceid ]['logintype']   = $instance['logintype'];
				update_option( 'srbw_widgets', $opsrbw_widgets );
			}
			return $instance;
		}

		public function widget( $args, $instance ) {
			echo $args['before_widget'];

			// タイトル名を取得!
			$title_new = apply_filters( 'widget_title_new', $instance['title_new'] );
			if ( $title_new ) {
				echo $args['before_title'] . esc_html( $title_new ) . $args['after_title'];
			}

			// IDを取得!
			$block_id = apply_filters( 'widget_block_id', $instance['block_id'] );
			$postb    = get_post( $block_id );
			echo do_shortcode( wp_kses_post( $postb->post_content ) ); // apply_shortcodes() do_shortcodeに変わる新しい関数。将来的に切り替え!

			echo $args['after_widget'];
		}
	}

	add_action(
		'widgets_init',
		function() {
			register_widget( 'SimpleReuseblockWidgetItem' ); // ウィジェットのクラス名を記述!
		}
	);
}
