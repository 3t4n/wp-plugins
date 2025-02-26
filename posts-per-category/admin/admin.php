<?php
class Posts_Per_Category_Admin {
	var $options;
	
	function __construct() {
		$this->options = get_option( 'posts_per_category' );
		
		add_action( 'init', array( &$this, 'init' ) );
	}
	
	function init() {
		add_action( 'admin_menu', array( &$this, 'admin_menu' ) );
		add_action( 'edited_category', array( &$this, 'edited_category' ), 10, 2 );
		add_action( 'edit_category_form_fields', array( &$this, 'edit_category_form_fields' ) );
		add_filter( 'contextual_help', array( &$this, 'contextual_help' ), 10, 3 );
		
		
		if ( isset( $_POST['button_save_posts_per_category'] ) ) {
			if ( wp_verify_nonce( $_POST['options_nonce'], 'update-posts-per-category-options' ) ) {
				if ( isset( $_POST['posts_per_category'] ) && is_array( $_POST['posts_per_category'] ) ) {
					$options = array();
					
					foreach ( $_POST['posts_per_category'] as $item ) {
						if ( ! empty( $item['term_id'] ) ) {
							$term = get_term( $item['term_id'], 'category' );
							$index = 'tax_category_' . $term->term_id;
							
							// keepin' it clean
							$per_page = $item['posts_per_page'];
							if ( '' !== $per_page ) {
								if ( -1 > $per_page )
									$per_page = abs( $per_page );
								else if ( 0 == $per_page )
									$per_page = 1;
								
								$options[ $index ]['posts_per_page'] = (int) $per_page;
							}
							
							$per_rss = $item['posts_per_rss'];
							if ( '' !== $per_rss ) {
								$options[ $index ]['posts_per_rss'] = ( 0 == $per_rss ) ? 1 : (int) abs( $per_rss );
							}
						}
					}
					
					$this->update_options( $options );
				} else {
					delete_option( 'posts_per_category' );
				}
				
				wp_safe_redirect( add_query_arg( 'settings-updated', true ) );
			} else {
				wp_safe_redirect( add_query_arg( 'page', 'posts-per-category' ) );
			}
			exit;
		}
	}
	
	function admin_menu() {
		$pagehook = add_options_page( __( 'Posts Per Category', 'posts-per-category' ), __( 'Posts Per Category', 'posts-per-category' ), 'manage_options', 'posts-per-category', array( &$this, 'options_page' ) );
		add_action( 'load-' . $pagehook, array( &$this, 'load_options_page' ) );
	}
	
	function load_options_page() {
		wp_enqueue_script( 'jquery-ui-sortable' );
		wp_enqueue_script( 'posts-per-category-admin-script', plugins_url( 'js/admin.js', dirname( __FILE__ ) ), array( 'jquery' ) );
		wp_enqueue_style( 'posts-per-category-admin-style', plugins_url( 'css/admin.css', dirname( __FILE__ ) ) );
	}
	
	function options_page() {
		?>
		<div class="wrap nosubsub">
			<div id="icon-posts-per-category" class="icon32"><br></div>
			<h2><?php _e( 'Posts Per Category', 'posts-per-category' ); ?></h2>
			
			<?php if ( isset( $_REQUEST['settings-updated'] ) ) : ?>
				<div class="updated fade"><p><strong><?php _e( 'Options saved.', 'posts-per-category' ); ?></strong></p></div>
			<?php endif;?>
			
			<div id="col-container">
				<div class="col-wrap">
					<?php
					$opts = ( is_array( $this->options ) ) ? $this->options : array( array() );
					$current_user = wp_get_current_user();
					$categories = get_categories( 'hide_empty=0' );
					?>
					
					<div id="poststuff" class="has-right-sidebar">
						<div id="post-body" class="metabox-holder columns-2">
							
							<div id="post-body-content">
								<form action="" method="post">
									<?php wp_nonce_field('update-posts-per-category-options', 'options_nonce', false); ?>
									<table border="0" cellpadding="0" cellspacing="0" class="widefat" id="posts-per-category">
										<thead>
											<tr>
												<th width="50%"><?php _e( 'Category', 'posts-per-category' ); ?></th>
												<th><?php _e( 'Posts on Archive Page', 'posts-per-category' ); ?></th>
												<th><?php _e( 'Posts in Feed', 'posts-per-category' ); ?></th>
												<th width="16"><a class="add-item"><img src="<?php echo plugins_url( 'images/icons/add.png', dirname( __FILE__ ) ); ?>" width="16" height="16" alt="<?php esc_attr_e( 'Add Item', 'posts-per-category' ); ?>" title="<?php esc_attr_e( 'Add Item', 'posts-per-category' ); ?>" /></a></th>
											</tr>
										</thead>
										<tbody>
											<?php
											$i = 0;
											foreach ( $opts as $index => $data ) :
												$cat_id = str_replace( 'tax_category_', '', $index );
												$posts_per_page = ( isset( $data['posts_per_page'] ) ) ? $data['posts_per_page'] : '';
												$posts_per_rss = ( isset( $data['posts_per_rss'] ) ) ? $data['posts_per_rss'] : '';
												?>
												<tr>
													<td>
														<select name="posts_per_category[<?php echo $i; ?>][term_id]">
															<option value=""></option>
															<?php
															foreach ( $categories as $cat ) {
																echo '<option value="' . $cat->term_id . '"' . selected( $cat_id, $cat->term_id, false ) . '>' . $cat->name . '</option>';
															}
															?>
														</select>
													</td>
													<td><input type="text" name="posts_per_category[<?php echo $i; ?>][posts_per_page]" value="<?php echo esc_attr( $posts_per_page ); ?>" /></td>
													<td><input type="text" name="posts_per_category[<?php echo $i; ?>][posts_per_rss]" value="<?php echo esc_attr( $posts_per_rss ); ?>" /></td>
													<td align="center" valign="middle" style="vertical-align: middle">
														<a class="remove-item"><img src="<?php echo plugins_url( 'images/icons/delete.png', dirname( __FILE__ ) ); ?>" width="15" height="16" alt="<?php esc_attr_e( 'Remove Item', 'posts-per-category' ); ?>" title="<?php esc_attr_e( 'Remove Item', 'posts-per-category' ); ?>" /></a>
													</td>
												</tr>
											<?php $i++; endforeach; ?>
										</tbody>
									</table>
									
									<p class="submit">
										<input type="submit" name="button_save_posts_per_category" class="button-primary" value="<?php esc_attr_e( 'Save Options', 'posts-per-category' ); ?>">
									</p>
								</form>
							</div><!--end div#post-body-content-->
							
							<div id="postbox-container-1" class="postbox-container">
								<?php $this->credit(); ?>
							</div>
							
						</div><!--end div#post-body-->
					</div><!--end div#post-stuff-->
						
				</div>
			</div>
		</div>
		<?php
	}
	
	function update_options( $options ) {
		$options = ( ! empty( $options ) ) ? $options : NULL ;
		update_option( 'posts_per_category', $options );
		$this->options = $options;
	}
	
	function contextual_help( $text, $screen_id, $screen ) {
		if ( 'settings_page_posts-per-category' == $screen_id ) {
			
		}
		
		return $text;
	}
	
	
	/*
	 * Edit Category Form UI
	 */
	
	function edited_category( $term_id, $tt_id ) {
		$current_options = ( is_array( $this->options ) ) ? $this->options : array();
		$index = 'tax_category_' . $term_id;
		
		// keep the option array lean; no empty values
		if ( isset( $_POST['ppc_per_page'] ) && wp_verify_nonce( $_POST['category_posts_nonce'], 'update-posts-per-category' ) ) {
			$new_options = array();
			
			$per_page = $_POST['ppc_per_page'];
			if ( '' !== $per_page ) {
				if ( -1 > $per_page )
					$per_page = abs( $per_page );
				else if ( 0 == $per_page )
					$per_page = 1;
				
				$new_options[ $index ]['posts_per_page'] = (int) $per_page;
			} else {
				unset( $current_options[ $index ]['posts_per_page'] );
			}
			
			$per_rss = $_POST['ppc_per_rss'];
			if ( '' !== $per_rss ) {
				$new_options[ $index ]['posts_per_rss'] = ( 0 == $per_rss ) ? 1 : (int) abs( $per_rss );
			} else {
				unset( $current_options[ $index ]['posts_per_rss'] );
			}
			
			if ( empty( $_POST['ppc_per_page'] ) && empty( $_POST['ppc_per_rss'] ) ) {
				unset( $current_options[ $index ] );
			}
			
			$options = array_merge( $current_options, $new_options );
			$this->update_options( $options );
		}
	}
	
	function edit_category_form_fields( $term ) {
		$index = 'tax_category_' . $term->term_id;
		
		$posts_per_page = ( isset( $this->options[ $index ]['posts_per_page'] ) ) ? intval( $this->options[ $index ]['posts_per_page'] ) : '';
		$posts_per_rss = ( isset( $this->options[ $index ]['posts_per_rss'] ) ) ? intval( $this->options[ $index ]['posts_per_rss'] ) : '';
		?>
		<tr class="form-field">
			<th valign="top" scope="row"><label for="posts-per-page"><?php _e( 'Posts on Archive Page', 'posts-per-category' ); ?></label></th>
			<td>
				<?php wp_nonce_field('update-posts-per-category', 'category_posts_nonce', false); ?>
				<input type="text" name="ppc_per_page" id="posts-per-page" value="<?php echo esc_attr( $posts_per_page ); ?>" class="small-text" style="width: 5em" />
			</td>
		</tr>
		<tr class="form-field">
			<th valign="top" scope="row"><label for="posts-per-rss"><?php _e( 'Posts in Feed', 'posts-per-category' ); ?></label></th>
			<td><input type="text" name="ppc_per_rss" id="posts-per-rss" value="<?php echo esc_attr( $posts_per_rss ); ?>" class="small-text" style="width: 5em" /></td>
		</tr>
		<?php
	}
	
	
	/*
	 * Plugin Credit
	 */
	
	function credit() {
		$current_user = wp_get_current_user();
		?>
		<div class="bscard">
			<h3>
				<a href="http://www.smartpassiveincome.com/" target="_blank">
					<img src="<?php echo plugins_url( 'images/smartpassiveincome.png', dirname( __FILE__ ) ); ?>" width="50" height="50" alt="Smart Passive Income" />
					<span><?php _e( 'Sponsored by', 'posts-per-category' ); ?> <strong>Smart Passive Income</strong></span>
				</a>
			</h3>
			<div class="inside">
				<p>
					<?php _e( 'This plugin is brought to you courtesy of Pat Flynn at Smart Passive Income.', 'posts-per-category' ); ?>
				</p>
				<ul class="bscard-social">
					<li class="bscard-social-twitter"><a href="http://twitter.com/PatFlynn" target="_blank">@PatFlynn</a></li>
					<li class="bscard-social-facebook"><a href="http://www.facebook.com/smartpassiveincome" target="_blank">Facebook</a></li>
				</ul>
			</div>
		</div>
		<br class="clear" />
		
		<div class="bscard">
			<h3>
				<a href="http://www.blazersix.com/">
					<img src="<?php echo plugins_url( 'images/blazersix.png', dirname( __FILE__ ) ); ?>" width="50" height="50" alt="Blazer Six" />
					<span><?php _e( 'Created by', 'posts-per-category' ); ?> <strong>Blazer Six, Inc.</strong></span>
				</a>
			</h3>
			<div class="inside">
				<ul class="bscard-social">
					<li class="bscard-social-twitter"><a href="http://twitter.com/BlazerSix" target="_blank">@BlazerSix</a></li>
					<li class="bscard-social-facebook"><a href="https://www.facebook.com/pages/Blazer-Six/241713012554129" target="_blank">Facebook</a></li>
				</ul>
				
				<p class="bscard-newsletter-toggle">
					<a href="#"><?php echo _e( "Or subscribe to our newsletter to keep up with what we're doing.", 'posts-per-category' ); ?></a>
				</p>
				
				<form action="http://blazersix.createsend.com/t/y/s/bdijuj/" method="post" target="_blank" id="bscard-newsletter" class="bscard-form bscard-newsletter hide-if-js">
					<input type="hidden" name="cm-f-hkyuhj" value="Posts Per Category" />
					<p class="bscard-field">
						<label for="bscard-newsletter-name" class="bscard-label"><?php _e( 'Name:', 'posts-per-category' ); ?></label>
						<input type="text" name="cm-name" id="bscard-newsletter-name" value="<?php echo ( $current_user->display_name != 'admin' ) ? esc_attr( $current_user->display_name ) : ''; ?>" />
					</p>
					<p class="bscard-field">
						<label for="bscard-newsletter-email" class="bscard-label"><?php _e( 'Email:', 'posts-per-category' ); ?></label>
						<input type="text" name="cm-bdijuj-bdijuj" id="bscard-newsletter-email" value="<?php echo esc_attr( $current_user->user_email ); ?>" />										
					</p>
					<p class="bscard-submit">
						<input type="submit" value="<?php esc_attr_e( 'Subscribe', 'posts-per-category' ); ?>" class="button" />
					</p>
				</form>
			</div>
		</div>
		<br class="clear" />
		<?php
	}
}
$posts_per_category_admin = new Posts_Per_Category_Admin();
?>