<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}




/**
 * Frontend Manage Subaccounts page.
 *
 * My Account -> Subaccounts -> Manage Subaccounts.
 */
function sfwc_frontend_manage_subaccounts() {
	
    // Check nonce before proceeding.
    if ( 
		wp_verify_nonce( $_POST['nonce'], 'sfwc_nonce_frontend_manage_subaccounts' ) || 
		wp_verify_nonce( $_POST['nonce'], 'sfwc_nonce_frontend_manage_subaccounts_pagination' ) || 
		wp_verify_nonce( $_POST['nonce'], 'sfwc_nonce_frontend_edit_subaccount' ) 
			
	) {

		// Sanitize Ajax posted value of selected/current page.
		if( isset( $_POST['ajax_get_current_page'] ) &&  '' !== $_POST['ajax_get_current_page'] ) {
			
			$sanitized_current_page_users = absint( sanitize_text_field( $_POST['ajax_get_current_page'] ) );
			
			// Prevent ?user_page=0.
			if ( $sanitized_current_page_users <= 0 ) {
				wp_die( esc_html__( 'Page not valid.', 'subaccounts-for-woocommerce' ) );
			}
		}
		elseif( isset( $_POST['ajax_current_page'] ) ) {
			
			$sanitized_current_page_users = absint( sanitize_text_field( $_POST['ajax_current_page'] ) );
			
			// Prevent ?user_page=0.
			if ( $sanitized_current_page_users <= 0 ) {
				wp_die( esc_html__( 'Page not valid.', 'subaccounts-for-woocommerce' ) );
			}
		}
		else {
			
			$sanitized_current_page_users = 1;
		}
		

		
		// Get Options settings.
		$sfwc_options = (array) get_option('sfwc_options');

		// Get 'Customer Display Name' from Options settings.
		$sfwc_option_display_name = ( isset( $sfwc_options['sfwc_option_display_name'] ) ) ? $sfwc_options['sfwc_option_display_name'] : 'username';
		
		// Get 'Choose who can create and add new subaccounts' from Options settings.
		$sfwc_options_subaccount_creation = ( isset( $sfwc_options['sfwc_options_subaccount_creation'] ) ) ? $sfwc_options['sfwc_options_subaccount_creation'] : 'customer';

		// Get Selected Roles option value from Options settings.
		$sfwc_option_selected_roles = ( isset( $sfwc_options['sfwc_option_selected_roles'] ) ) ? $sfwc_options['sfwc_option_selected_roles'] : array('customer', 'subscriber');

		// Get ID of currently logged-in user.
		$current_user_id = get_current_user_id();
		
		// Get user data of currently logged-in user.
		$current_user = get_userdata( $current_user_id );
		
		// Get account type of currently logged-in user.
		$user_account_level_type = get_user_meta( $current_user_id, 'sfwc_account_level_type', true );
		
		if ( $user_account_level_type == 'supervisor' ) {
		
			if ( isset( $_POST['ajax_filter_account_type'] ) && $_POST['ajax_filter_account_type'] == 'managers' ) {
				
				$filter_account_type = 'managers';
				
				$status_subaccounts = '';
				$status_managers = 'active';
				$status_all = '';
				
			} elseif ( isset( $_POST['ajax_filter_account_type'] ) && $_POST['ajax_filter_account_type'] == 'subaccounts' ) {
				
				$filter_account_type = 'subaccounts';
				
				$status_subaccounts = 'active';
				$status_managers = '';
				$status_all = '';
				
			} else {
				
				$filter_account_type = 'all';
				
				$status_subaccounts = '';
				$status_managers = '';
				$status_all = 'active';
			}
		}
		
		// Get children (array) of currently logged in user.																		
		$children_ids = get_user_meta( $current_user_id, 'sfwc_children', true ); // 3rd must be: true, otherwise will turn it into a two-dimensional array.

		/**
		 * Remove no longer existing users from the $children_ids array
		 * in case a user has been deleted (but still present within 'sfwc_children' meta of an ex parent account).
		 */
		$existing_children_ids = array();
		
		if ( ! empty ( $children_ids ) ) {
			
			if ( $user_account_level_type == 'supervisor' ) {
			
				foreach ( $children_ids as $single_id ) {
					
					// Check if user still exists.
					$user_exists = get_userdata( $single_id );
					if ( $user_exists !== false ) {
						
						// Check if user role is valid and enabled from plugin settings.
						if ( sfwc_is_user_role_valid( $single_id ) && sfwc_is_user_role_enabled( $single_id ) && get_user_meta( $single_id, 'sfwc_account_level_type', true ) == 'manager' ) {
								
							$existing_children_ids[] = $single_id;
							
							// In case currently logged in user is a Supervisor we get also subaccounts of the Manager.																		
							$children_ids_deep = get_user_meta( $single_id, 'sfwc_children', true );
							
							if ( ! empty ( $children_ids_deep ) ) {
			
								foreach ( $children_ids_deep as $single_id_deep ) {
									
									// Check if user still exists.
									$user_exists = get_userdata( $single_id_deep );
									if ( $user_exists !== false ) {
										
										// Check if user role is valid and enabled from plugin settings.
										if ( sfwc_is_user_role_valid( $single_id_deep ) && sfwc_is_user_role_enabled( $single_id_deep ) && 
											 get_user_meta( $single_id_deep, 'sfwc_account_level_type', true ) !== 'supervisor' &&
											 get_user_meta( $single_id_deep, 'sfwc_account_level_type', true ) !== 'manager' ) 
										{
											$existing_children_ids[] = $single_id_deep;
										}
									}
								}
							}
						}
					}
				}
			} elseif ( $user_account_level_type == 'manager' ) {
				
				foreach ( $children_ids as $single_id ) {
					
					// Check if user still exists.
					$user_exists = get_userdata( $single_id );
					if ( $user_exists !== false ) {
						
						// Check if user role is valid and enabled from plugin settings.
						if ( sfwc_is_user_role_valid( $single_id ) && sfwc_is_user_role_enabled( $single_id ) && 
							 get_user_meta( $single_id, 'sfwc_account_level_type', true ) !== 'supervisor' &&
							 get_user_meta( $single_id, 'sfwc_account_level_type', true ) !== 'manager' )
						{
							$existing_children_ids[] = $single_id;
						}
					}
				}
			}
		}
		
		

		$subaccounts_per_page = 10;
		
		if( $sanitized_current_page_users == 1 ){
			$offset = 0;  
		}else {
			$offset = ( $sanitized_current_page_users - 1 ) * $subaccounts_per_page;
		}

		if ( $user_account_level_type == 'supervisor' ) { // Logged in user is a Supervisor.
		
			if ( $filter_account_type == 'managers' ) {
				
				$meta_query = array(
								
								array(
									array(
									'key' => 'sfwc_account_level_type',							// Explicitly include only Managers, in case the user account type is changed afterwards.
									'value' => 'manager',										// E.g. John Doe was previously set as a Manager but has been later turned into a Supervisor by the admin.
									'compare' => '==',
									),
								),							
							);
				
			} elseif ( $filter_account_type == 'subaccounts' ) {
			
				$meta_query = array(
								
								array(
									'relation' => 'OR',
									array(
										'key' => 'sfwc_account_level_type',
										'compare' => 'NOT EXISTS',
									),
									array(
									'key' => 'sfwc_account_level_type',
									'value' => 'default',
									'compare' => '==',
									),
								),							
							);
			} else {
				
				$meta_query = array(
								
								array(
									'relation' => 'OR',
									array(
									'key' => 'sfwc_account_level_type',							// Explicitly include only Managers, in case the user account type is changed afterwards.
									'value' => 'manager',										// E.g. John Doe was previously set as a Manager but has been later turned into a Supervisor by the admin.
									'compare' => '==',
									),
									array(
										'key' => 'sfwc_account_level_type',
										'compare' => 'NOT EXISTS',
									),
									array(
									'key' => 'sfwc_account_level_type',
									'value' => 'default',
									'compare' => '==',
									),
								),							
							);	
			}
		}
		elseif( $user_account_level_type == 'manager' ) { // Logged in user is a Manager.
			
			$meta_query = array(
							'relation' => 'AND',
							array(
								'relation' => 'OR',
								array(
									'key' => 'sfwc_account_level_type',						// Explicitly exclude Managers, in case the user account type is changed afterwards.
									'value' => 'manager',									// E.g. John Doe was previously set as a subaccount but has been later turned into a Manager by the admin.
									'compare' => '!=',
								),
								array(
									'key' => 'sfwc_account_level_type',
									'compare' => 'NOT EXISTS',
								),
							),
							array(
								'relation' => 'OR',
								array(
								'key' => 'sfwc_account_level_type',							// Explicitly exclude Supervisor, in case the user account type is changed afterwards.
								'value' => 'supervisor',									// E.g. John Doe was previously set as a subaccount but has been later turned into a Supervisor by the admin.
								'compare' => '!=',
								),
								array(
								'key' => 'sfwc_account_level_type',
								'compare' => 'NOT EXISTS',
								),
								array(
								'key' => 'sfwc_account_level_type',
								'compare' => 'NOT EXISTS',
								),
							)
						);	
		}



		/* Query subaccounts of currently logged in Manager */
		$args_subaccounts = array(
			'include' => $existing_children_ids,
			'number' => $subaccounts_per_page,
			'offset' => $offset,
			'role__in' => ! empty( $existing_children_ids ) ? $sfwc_option_selected_roles : '', // IMPORTANT: 'role__in' seems to work as expected with 'include'
																								// only if $existing_children_ids is NOT empty.
																								//
																								// $existing_children_ids could happen to be empty if a user has been
																								// set as Manager, but no subaccounts have been actually assigned to him.
																								//
																								// So this conditional check is to prevent the user query returning all
																								// users with roles enabled from plugin settings, even if they are not
																								// subaccount of the logged-in Manager.
			'meta_query' => $meta_query,
			'orderby' => 'include',
		);
		
		

		// The User Query
		$user_query_subaccounts = new WP_User_Query( $args_subaccounts );
	
	
		// Check if the logged in user is a Manager or Supervisor.
		if ( is_user_logged_in() && ( $user_account_level_type == 'manager' || $user_account_level_type == 'supervisor' ) ) {
				
			// Check if the logged in user has a valid/enabled role.
			if ( sfwc_is_current_user_role_valid() && sfwc_is_current_user_role_enabled() ) {
				
				echo '<img id="sfwc-loading-icon" src="' . esc_url( WP_PLUGIN_URL ) . '/subaccounts-for-woocommerce/assets/images/loader.gif">';

				echo '<div id="frontend_manage_subaccounts_users_list" style="position:relative;">';
							
				echo '<h2 style="margin: 0 0 10px 0; float:left; clear:left;">' . esc_html__( 'Manage Subaccounts', 'subaccounts-for-woocommerce' ) . '</h2>';
				
				if ( $user_account_level_type == 'supervisor' ) {
					
					echo '<div class="sfwc_frontend_next_title" style="float:right;">';
				
					echo '<a id="sfwc_frontend_filter_all" class="sfwc_frontend_manage_subaccounts_filter ' . esc_attr( $status_all ) . '" href="#">';
					esc_html_e( 'All', 'subaccounts-for-woocommerce' );
					echo '</a>';

					echo '<a id="sfwc_frontend_filter_managers" class="sfwc_frontend_manage_subaccounts_filter ' . esc_attr( $status_managers ) . '" href="#">';
					esc_html_e( 'Managers', 'subaccounts-for-woocommerce' );
					echo '</a>';
					
					echo '<a id="sfwc_frontend_filter_subaccounts" class="sfwc_frontend_manage_subaccounts_filter ' . esc_attr( $status_subaccounts ) . '" href="#">';
					esc_html_e( 'Subaccounts', 'subaccounts-for-woocommerce' );
					echo '</a>';
					
					echo '</div>';
				
				}
			
				// User Loop
				if ( ! empty( $user_query_subaccounts->get_results() ) ) {
					
					/**
					 * Count number of pages for pagination: 
					 * Count the total number of subaccounts and divide by the number of subaccount per page.
					 */
					$total_users = $user_query_subaccounts->get_total();
					$total_user_pages = ceil( $total_users / $subaccounts_per_page );
					?>
					
					<div style="padding-top: 20px; overflow-x: auto; width: 100%;"><!-- Make table horizontally scrollable on mobile -->
						<table id="sfwc_frontend_manage_subaccounts_table" class="sfwc_table <?php echo esc_attr( isset( $filter_account_type ) ? $filter_account_type : '' ); ?>">
							<thead>
								<tr>
									<th><span class="nobr"><?php echo esc_html__( 'Account', 'subaccounts-for-woocommerce' ); ?></span></th>
									<?php if ( $user_account_level_type == 'supervisor' && ( $filter_account_type == 'all' || $filter_account_type == 'subaccounts' ) ): ?>
									<th><span class="nobr"><?php echo esc_html__( 'Parent Account', 'subaccounts-for-woocommerce' ); ?></span></th>
									<?php endif;?>
									<th><span class="nobr"><?php echo esc_html__( 'Email', 'subaccounts-for-woocommerce' ); ?></span></th>
									<th><span class="nobr"><?php echo esc_html__( 'Actions', 'subaccounts-for-woocommerce' ); ?></span></th>
								</tr>
							</thead>
							<tbody>
							
							<?php
							foreach ( $user_query_subaccounts->get_results() as $user ) {
								
								$child_account_type = get_user_meta( $user->ID, 'sfwc_account_level_type', true );
								
								if ( $child_account_type !== 'supervisor' && $child_account_type !== 'manager' ) {
									$tr_class = 'default';
								} else {
									$tr_class = 'manager';
								}
								

								echo '<tr class="' . esc_attr( $tr_class ) . '">';
								
								// Account column.
								echo '<td>';
								echo get_avatar( $user->user_email, 40 );
								if ( ( $sfwc_option_display_name == 'full_name' ) && ( $user->user_firstname || $user->user_lastname ) ) {
									echo '<span>' . esc_html( $user->user_firstname ) . ' ' . esc_html( $user->user_lastname ) . '</span>';
								} elseif ( ( $sfwc_option_display_name == 'company_name' ) && ( $user->billing_company ) ) {
									echo '<span>' . esc_html( $user->billing_company ) . '</span>';
								} else {
									echo '<span>' . esc_html( $user->user_login ) . '</span>';
								}
								echo '</td>';
								
								
								// Parent Account column.
								if ( $user_account_level_type == 'supervisor' && ( $filter_account_type == 'all' || $filter_account_type == 'subaccounts' )  ) {
									
									if ( $child_account_type !== 'manager' && $child_account_type !== 'supervisor' ) {
								
										$args_manager = array(
											'role__in' => $sfwc_option_selected_roles,
											'exclude' => $current_user_id, 
											'orderby' => 'ID',
											'order' => 'ASC',
											'meta_key' => 'sfwc_account_level_type',
											'meta_value' => 'manager',
											'meta_query' => array(
											   array(
												'key' => 'sfwc_children',
												'value' => '"'.$user->ID.'"',
												'compare' => 'LIKE',
											   ),
											),
										);


										// The User Query
										$user_query_manager = new WP_User_Query( $args_manager );


										// User Loop
										if ( ! empty( $user_query_manager->get_results() ) ) {

											foreach ( $user_query_manager->get_results() as $manager ) {
																	   
												echo '<td>';
												if ( ( $sfwc_option_display_name == 'full_name' ) && ( $manager->user_firstname || $manager->user_lastname ) ) {
													echo '<span>' . esc_html( $manager->user_firstname ) . ' ' . esc_html( $manager->user_lastname ) . '</span>';
												} elseif ( ( $sfwc_option_display_name == 'company_name' ) && ( $manager->billing_company ) ) {
													echo '<span>' . esc_html( $manager->billing_company ) . '</span>';
												} else {
													echo '<span>' . esc_html( $manager->user_login ) . '</span>';
												}
												echo '</td>';
											}
										}
									} elseif ( $child_account_type == 'manager' ) {
											   
										echo '<td>';
										if ( ( $sfwc_option_display_name == 'full_name' ) && ( $current_user->user_firstname || $current_user->user_lastname ) ) {
											echo '<span>' . esc_html( $current_user->user_firstname ) . ' ' . esc_html( $current_user->user_lastname ) . '</span>';
										} elseif ( ( $sfwc_option_display_name == 'company_name' ) && ( $current_user->billing_company ) ) {
											echo '<span>' . esc_html( $current_user->billing_company ) . '</span>';
										} else {
											echo '<span>' . esc_html( $current_user->user_login ) . '</span>';
										}
										echo '</td>';
									}
								}
									
									
								// Email column.
								echo '<td>' . esc_html( $user->user_email ) . '</td>';
								
								
								// Actions column.
								echo '<td><a href="#" class="sfwc_frontend_edit_subaccount woocommerce-button button" id="' . esc_attr( $user->ID ) . '">' . esc_html__( 'Edit', 'subaccounts-for-woocommerce' ) . '</a></td>';
									
								echo '</tr>';
								
							}
							?>
						
							</tbody>
						</table>
					</div>
						
					<?php
					// Subaccounts pagination.
					$args = array(
						'base' => esc_url( wc_get_account_endpoint_url( 'subaccounts' ) ) . '%_%',
						'format' => '?user_page=%#%',
						'total' => $total_user_pages,
						'current' => $sanitized_current_page_users,
						'show_all' => false,
						'mid_size' => 2,
						'end_size' => 2,
						'prev_next' => true,
						'prev_text' => __( '&laquo; Previous', 'subaccounts-for-woocommerce' ),
						'next_text' => __( 'Next &raquo;', 'subaccounts-for-woocommerce' ),
						'type' => 'plain',
						'add_args' => false,
						'add_fragment' => ''
					);

				   
					// Check if there are subaccounts before echoing pagination.
					if ( ! empty( $user_query_subaccounts->get_results() && $user_query_subaccounts->get_total() > $subaccounts_per_page) ) {
						 echo '<div class="pagination" id="sfwc_frontend_manage_subaccount_pagination">' . paginate_links( $args ) . '</div>';
					}
							
					echo '</div>'; // END #frontend_manage_subaccounts_users_list.
					
				} else {
					
					//In case there is no subaccount yet add a notice.
					if ( $sfwc_options_subaccount_creation == 'customer' || $sfwc_options_subaccount_creation == 'admin_customer' ) {
						
						wc_print_notice(
							esc_html__( 'There is no subaccount yet.', 'subaccounts-for-woocommerce' ) . 
							'<a class="button" href="' . esc_url( wc_get_account_endpoint_url( 'subaccounts/add-subaccount' ) ) . '">' . esc_html__( 'Add Subaccount', 'subaccounts-for-woocommerce' ) . '</a>'
						, 'notice');
						
					} elseif ( $sfwc_options_subaccount_creation == 'admin' ) {
						wc_print_notice( esc_html__( 'There is no subaccount yet. Ask the site administrator to add one for you.', 'subaccounts-for-woocommerce' ), 'notice');
					}
					else {
						wc_print_notice( esc_html__( 'There is no subaccount yet.', 'subaccounts-for-woocommerce' ), 'notice');
					}			
				}
			} else {
				wc_print_notice( esc_html__( 'Your user role is not valid or disabled.', 'subaccounts-for-woocommerce' ), 'notice' );
			}
		} else {
				wc_print_notice( esc_html__( 'Your account type is not valid.', 'subaccounts-for-woocommerce' ), 'notice' );
		}
		?>
		
		<script>
		jQuery(document).ready(function ($) {
					
			/***************
			 Ajax Pagination
			 ***************/
			 
			// Update the URL by appending the ?user_page query string.
			history.pushState( null, '', '?user_page=' + <?php echo $sanitized_current_page_users; ?> )

			$("#frontend_manage_subaccounts #sfwc-loading-icon").hide();

			var sfwc_ajax_url = "<?php echo esc_url( admin_url('admin-ajax.php') ); ?>";
			
			var filter_account_type = "<?php echo ( isset( $filter_account_type ) ) ? esc_html( $filter_account_type ) : ''; ?>";

			<?php $prev = $sanitized_current_page_users - 1; ?>
			<?php $next = $sanitized_current_page_users + 1; ?>
			
			
			
			var sfwc_nonce_frontend_manage_subaccounts_pagination = "<?php echo wp_create_nonce('sfwc_nonce_frontend_manage_subaccounts_pagination'); ?>";
				
			
			$("#sfwc_frontend_manage_subaccount_pagination a").on("click", function (e) {
				e.preventDefault();
				
				if ( $(this).hasClass( "prev" ) ) {
						var current_page = "<?php echo absint( $prev ); ?>";
				}
				else if ( $(this).hasClass( "next" ) ) {
						var current_page = "<?php echo absint( $next ); ?>";
				} 
				else {
					var current_page = $(this).text();
				}
			
				$.ajax({
					type: 'POST',
					data: {
						action: 'sfwc_frontend_manage_subaccounts',
						ajax_current_page: current_page,
						ajax_filter_account_type: filter_account_type,
						nonce: sfwc_nonce_frontend_manage_subaccounts_pagination,
					},
					url: sfwc_ajax_url,
					beforeSend: function () {
						
						// Remove previous content page.
						$("#frontend_manage_subaccounts_users_list").remove();
						
						// Show loading icon.
						$("#frontend_manage_subaccounts #sfwc-loading-icon").show();
					},
					success: function (data) {
						
						// Hide loading icon.
						$("#frontend_manage_subaccounts #sfwc-loading-icon").hide();

						// Send data.
						$('#frontend_manage_subaccounts').html(data);
					}
				});
			});

			
			
			/********************
			 Ajax Edit Subaccount
			 ********************/
			
			$("#frontend_manage_subaccounts td a.sfwc_frontend_edit_subaccount").on("click", function (e) {
				e.preventDefault();
				var sfwc_user_id = $(this).attr('id');
			
				$.ajax({
					type: 'POST',
					data: {
						action: 'sfwc_frontend_edit_subaccount',
						ajax_user_id: sfwc_user_id,
						ajax_current_page: <?php echo $sanitized_current_page_users; ?>,
						ajax_filter_account_type: filter_account_type,
						nonce: sfwc_nonce_frontend_manage_subaccounts_pagination,
					},
					url: sfwc_ajax_url,
					beforeSend: function () {
						
						// Remove previous content page.
						$("#frontend_manage_subaccounts_users_list").remove();
						
						// Show loading icon.
						$("#frontend_manage_subaccounts #sfwc-loading-icon").show();
					},
					success: function (data) {
						
						// Hide loading icon.
						$("#frontend_manage_subaccounts #sfwc-loading-icon").hide();

						// Send data.
						$('#frontend_manage_subaccounts').html(data);
					}
				});
			});
			
			
			
			/******************************************
			 Supervisor: Filter Managers or Subaccounts
			 ******************************************/
			
			$("#sfwc_frontend_filter_all").on("click", function (e) {
				e.preventDefault();
			
				$.ajax({
					type: 'POST',
					data: {
						action: 'sfwc_frontend_manage_subaccounts',
						ajax_filter_account_type: 'all',
						nonce: sfwc_nonce_frontend_manage_subaccounts_pagination,
					},
					url: sfwc_ajax_url,
					beforeSend: function () {
						
						// Remove previous content page.
						$("#frontend_manage_subaccounts_users_list").remove();
						
						// Show loading icon.
						$("#frontend_manage_subaccounts #sfwc-loading-icon").show();
					},
					success: function (data) {
						
						// Hide loading icon.
						$("#frontend_manage_subaccounts #sfwc-loading-icon").hide();

						// Send data.
						$('#frontend_manage_subaccounts').html(data);
					}
				});
			});	


			$("#sfwc_frontend_filter_managers").on("click", function (e) {
				e.preventDefault();
			
				$.ajax({
					type: 'POST',
					data: {
						action: 'sfwc_frontend_manage_subaccounts',
						ajax_filter_account_type: 'managers',
						nonce: sfwc_nonce_frontend_manage_subaccounts_pagination,
					},
					url: sfwc_ajax_url,
					beforeSend: function () {
						
						// Remove previous content page.
						$("#frontend_manage_subaccounts_users_list").remove();
						
						// Show loading icon.
						$("#frontend_manage_subaccounts #sfwc-loading-icon").show();
					},
					success: function (data) {
						
						// Hide loading icon.
						$("#frontend_manage_subaccounts #sfwc-loading-icon").hide();

						// Send data.
						$('#frontend_manage_subaccounts').html(data);
					}
				});
			});				
			
			
			$("#sfwc_frontend_filter_subaccounts").on("click", function (e) {
				e.preventDefault();
			
				$.ajax({
					type: 'POST',
					data: {
						action: 'sfwc_frontend_manage_subaccounts',
						ajax_filter_account_type: 'subaccounts',
						nonce: sfwc_nonce_frontend_manage_subaccounts_pagination,
					},
					url: sfwc_ajax_url,
					beforeSend: function () {
						
						// Remove previous content page.
						$("#frontend_manage_subaccounts_users_list").remove();
						
						// Show loading icon.
						$("#frontend_manage_subaccounts #sfwc-loading-icon").show();
					},
					success: function (data) {
						
						// Hide loading icon.
						$("#frontend_manage_subaccounts #sfwc-loading-icon").hide();

						// Send data.
						$('#frontend_manage_subaccounts').html(data);
					}
				});
			});
		});
		</script>
		
	<?php
	} else {
		echo esc_html__( 'Nonce could not be verified.', 'subaccounts-for-woocommerce' );
	}
	wp_die(); // Always die in functions echoing AJAX content.
}
add_action( 'wp_ajax_sfwc_frontend_manage_subaccounts', 'sfwc_frontend_manage_subaccounts' );




/**
 * Frontend Edit Subaccount page.
 *
 * My Account -> Subaccounts -> Manage Subaccounts -> Edit.
 */
function sfwc_frontend_edit_subaccount() {
	
    // Check nonce before proceeding.
    if ( wp_verify_nonce( $_POST['nonce'], 'sfwc_nonce_frontend_manage_subaccounts_pagination' ) || wp_verify_nonce( $_POST['nonce'], 'sfwc_nonce_frontend_manage_subaccounts' ) ) {
		
		// Retrieve (Ajax) user_id of customer which is currently being edited My Account -> Subaccounts -> Manage Subaccounts.
		if ( isset( $_POST['ajax_user_id'] ) ) {
			$sanitized_user_id = absint( sanitize_text_field( $_POST['ajax_user_id'] ) );  // User ID of subaccount.
		}
		
		// Prevent ?user=0.
		if ( $sanitized_user_id <= 0 ) {
			wp_die( esc_html__( 'User ID not valid.', 'subaccounts-for-woocommerce' ) );
		}
		
		if( isset( $_POST['ajax_current_page'] ) ) {
			$sanitized_current_page_users = absint( sanitize_text_field( $_POST['ajax_current_page'] ) );
		}
		
		// Prevent ?user_page=0.
		if ( $sanitized_current_page_users <= 0 ) {
			wp_die( esc_html__( 'Page not valid.', 'subaccounts-for-woocommerce' ) );
		}
		

		
		global $woocommerce;
		
		// Get options.
		$sfwc_options = (array) get_option('sfwc_options');
		
		$sfwc_options_subaccounts_inherit_shipping_address_from_manager	= ( isset( $sfwc_options['sfwc_options_subaccounts_inherit_shipping_address_from_manager'] ) ) ? 
																			$sfwc_options['sfwc_options_subaccounts_inherit_shipping_address_from_manager'] : 0;
		
		$sfwc_options_subaccounts_inherit_billing_address_from_manager 	= ( isset( $sfwc_options['sfwc_options_subaccounts_inherit_billing_address_from_manager'] ) ) ? 
																			$sfwc_options['sfwc_options_subaccounts_inherit_billing_address_from_manager'] : 0;
																			
		$sfwc_options_managers_inherit_shipping_address_from_supervisor	= ( sfwc_is_plugin_active( 'sfwc-supervisor-addon.php' ) && isset( $sfwc_options['sfwc_options_managers_inherit_shipping_address_from_supervisor'] ) ) ? 
																			$sfwc_options['sfwc_options_managers_inherit_shipping_address_from_supervisor'] : 0;
		
		$sfwc_options_managers_inherit_billing_address_from_supervisor 	= ( sfwc_is_plugin_active( 'sfwc-supervisor-addon.php' ) && isset( $sfwc_options['sfwc_options_managers_inherit_billing_address_from_supervisor'] ) ) ? 
																			$sfwc_options['sfwc_options_managers_inherit_billing_address_from_supervisor'] : 0;
																			
		
		// Get ID of currently logged-in user.
		$current_user_id = get_current_user_id();	// User ID of Manager.
		
		// Get account type of currently logged-in user.
		$parent_account_level_type = get_user_meta( $current_user_id, 'sfwc_account_level_type', true );
		
		// Get account type of user being edited.
		$subaccount_account_level_type = get_user_meta( $sanitized_user_id, 'sfwc_account_level_type', true );
		
		
		// In case loggedin customer is a Supervisor, when clicking "Back to subaccount list",
		// return to previously selected subaccount list (either "All", "Managers" or "Subaccounts").		
		if ( $parent_account_level_type == 'supervisor' ) {
		
			if ( isset( $_POST['ajax_filter_account_type'] ) && $_POST['ajax_filter_account_type'] == 'managers' ) {
				
				$filter_account_type = 'managers';
				
			} elseif ( isset( $_POST['ajax_filter_account_type'] ) && $_POST['ajax_filter_account_type'] == 'subaccounts' ) {
				
				$filter_account_type = 'subaccounts';
				
			} else {
				
				$filter_account_type = 'all';
			}
		}

		
		// Get children (array) of currently logged in user.																		
		$children_ids = get_user_meta( $current_user_id, 'sfwc_children', true ); // 3rd must be: true, otherwise will turn it into a two-dimensional array.

		/**
		 * Remove no longer existing users from the $children_ids array
		 * in case a user has been deleted (but still present within 'sfwc_children' meta of an ex parent account).
		 */
		$existing_children_ids = array();
		
		if ( ! empty ( $children_ids ) ) {
			
			if ( $parent_account_level_type == 'supervisor' ) {
			
				foreach ( $children_ids as $single_id ) {
					
					// Check if user still exists.
					$user_exists = get_userdata( $single_id );
					if ( $user_exists !== false ) {
						
						// Check if user role is valid and enabled from plugin settings.
						if ( sfwc_is_user_role_valid( $single_id ) && sfwc_is_user_role_enabled( $single_id ) && get_user_meta( $single_id, 'sfwc_account_level_type', true ) == 'manager' ) {
								
							$existing_children_ids[] = $single_id;
							
							// In case currently logged in user is a Supervisor we get also subaccounts of the Manager.																		
							$children_ids_deep = get_user_meta( $single_id, 'sfwc_children', true );
							
							if ( ! empty ( $children_ids_deep ) ) {
			
								foreach ( $children_ids_deep as $single_id_deep ) {
									
									// Check if user still exists.
									$user_exists = get_userdata( $single_id_deep );
									if ( $user_exists !== false ) {
										
										// Check if user role is valid and enabled from plugin settings.
										if ( sfwc_is_user_role_valid( $single_id_deep ) && sfwc_is_user_role_enabled( $single_id_deep ) && 
											 get_user_meta( $single_id_deep, 'sfwc_account_level_type', true ) !== 'supervisor' &&
											 get_user_meta( $single_id_deep, 'sfwc_account_level_type', true ) !== 'manager' ) 
										{
											$existing_children_ids[] = $single_id_deep;
										}
									}
								}
							}
						}
					}
				}
			} elseif ( $parent_account_level_type == 'manager' ) {
				
				foreach ( $children_ids as $single_id ) {
					
					// Check if user still exists.
					$user_exists = get_userdata( $single_id );
					if ( $user_exists !== false ) {
						
						// Check if user role is valid and enabled from plugin settings.
						if ( sfwc_is_user_role_valid( $single_id ) && sfwc_is_user_role_enabled( $single_id ) && 
							 get_user_meta( $single_id, 'sfwc_account_level_type', true ) !== 'supervisor' &&
							 get_user_meta( $single_id, 'sfwc_account_level_type', true ) !== 'manager' )
						{
							$existing_children_ids[] = $single_id;
						}
					}
				}
			}
		}
		

		

		/**
		 * Validation
		 * 
		 * - Verify that the ID of the user being edited belongs to a subaccount of the currently logged-in parent account;
		 * - Verify the account level type of the subaccount.
		 */
		if ( 
			! in_array( $sanitized_user_id, $existing_children_ids ) || 
			( $parent_account_level_type == 'supervisor' && $subaccount_account_level_type == 'supervisor' ) || 
			( $parent_account_level_type == 'manager' && ( $subaccount_account_level_type == 'supervisor' || $subaccount_account_level_type == 'manager' ) )
		) {
			wp_die( esc_html__( 'You are not allowed to edit this user.', 'subaccounts-for-woocommerce' ) );
		}
		
		
		
		// Get an instance of the WC_Customer Object from the user ID.
		$user = new WC_Customer( $sanitized_user_id );
		
		// Get account details.
		$first_name = $user->get_first_name();
		$last_name = $user->get_last_name();
		$email = $user->get_email();
		$user_login = $user->get_username();
		

		// If no Billing First Name is set, use First Name of the user as a fallback.
		$user_billing_first_name = '' !== $user->get_billing_first_name() ? $user->get_billing_first_name() : $user->get_first_name();
		
		// If no Billing Last Name is set, use Last Name of the user as a fallback.
		$user_billing_last_name = '' !== $user->get_billing_last_name() ? $user->get_billing_last_name() : $user->get_last_name();
		
		// If no Billing Email is set, use Email of the user as a fallback.
		$user_billing_email = '' !== $user->get_billing_email() ? $user->get_billing_email() : $user->get_email();
		
		// Get billing details.
		$billing_first_name	= $user_billing_first_name;
		$billing_last_name	= $user_billing_last_name;
		$billing_company	= $user->get_billing_company();
		$billing_address_1	= $user->get_billing_address_1();
		$billing_address_2	= $user->get_billing_address_2();
		$billing_city		= $user->get_billing_city();
		$billing_postcode	= $user->get_billing_postcode();
		$billing_country	= $user->get_billing_country();
		$billing_state		= $user->get_billing_state();
		$billing_phone		= $user->get_billing_phone();
		$billing_email		= $user_billing_email;
		
		// Get shipping details.
		$shipping_first_name	= $user->get_shipping_first_name();
		$shipping_last_name		= $user->get_shipping_last_name();
		$shipping_company		= $user->get_shipping_company();
		$shipping_address_1		= $user->get_shipping_address_1();
		$shipping_address_2		= $user->get_shipping_address_2();
		$shipping_city			= $user->get_shipping_city();
		$shipping_postcode		= $user->get_shipping_postcode();
		$shipping_country		= $user->get_shipping_country();
		$shipping_state			= $user->get_shipping_state();
		$shipping_phone			= $user->get_shipping_phone();
		?>

	<?php if ( is_user_logged_in() && ( $parent_account_level_type == 'supervisor' || $parent_account_level_type == 'manager' ) ) : // Check if the logged in user is a parent account. ?>
		
		<?php if ( sfwc_is_current_user_role_valid() && sfwc_is_current_user_role_enabled() ) : // Check if the logged in user has a valid/enabled role. ?>

			<img id="sfwc-loading-icon" src="<?php echo esc_url( WP_PLUGIN_URL ); ?>/subaccounts-for-woocommerce/assets/images/loader.gif">

			<div id="frontend_manage_subaccounts_edit_subaccount">
			
				<h2 style="float:left; clear:left;"><?php esc_html_e( 'Edit subaccount', 'subaccounts-for-woocommerce' ); ?></h2>
				
				<a id="sfwc_frontend_edit_subaccount_go_back" href="#" style="float:right;"><span>&#10550;</span> <?php esc_html_e( 'Back to subaccount list', 'subaccounts-for-woocommerce' ); ?></a>
					
				<form id="sfwc_form_edit_subaccount_frontend" method="post">

					<div id="accordion">
						<h3><?php esc_html_e( 'Account Details', 'subaccounts-for-woocommerce' ); ?></h3>
						<div>
						
							<div class="user_login" style="margin-bottom:20px; width:48%; float:left;">
								<label for="user_login" style="display:block; margin-bottom:0;"><?php esc_html_e( 'Username', 'subaccounts-for-woocommerce' ); ?></label>
								<input type="text" name="user_login" id="user_login" value="<?php echo esc_attr( $user_login ); ?>" disabled="disabled" style="width:100%;">
							</div>

							
							<div class="password" style="margin-bottom:20px; width:48%; float:right;">
								<label for="password" style="display:block; margin-bottom:0;"><?php esc_html_e( 'Password', 'subaccounts-for-woocommerce' ); ?></label>
								<input type="password" name="password" id="password" value="" style="width:100%;">
							</div>

							<div class="first_name" style="margin-bottom:20px; width:48%; float:left;">
								<label for="first_name" style="display:block; margin-bottom:0;"><?php esc_html_e( 'First Name', 'subaccounts-for-woocommerce' ); ?></label>
								<input type="text" name="first_name" id="first_name" value="<?php echo esc_attr( $first_name ); ?>" style="width:100%;">
							</div>

							
							<div class="last_name" style="margin-bottom:20px; width:48%; float:right;">
								<label for="last_name" style="display:block; margin-bottom:0;"><?php esc_html_e( 'Last Name', 'subaccounts-for-woocommerce' ); ?></label>
								<input type="text" name="last_name" id="last_name" value="<?php echo esc_attr( $last_name ); ?>" style="width:100%;">
							</div>


							<div class="email" style="margin-bottom:20px; width:100%; float:left;">
								<label for="email" style="display:block; margin-bottom:0;"><?php esc_html_e( 'Email', 'subaccounts-for-woocommerce' ); ?> <span style="font-weight:bold;">*</span></label>
								<input type="text" name="email" id="email" value="<?php echo esc_attr( $email ); ?>" style="width:100%;">
							</div>
							
							<?php
							/**
							 * Hook: sfwc_frontend_edit_subaccount_after_account_details_fields.
							 *
							 * Allow developers to add extra fields in the "Account Details" tab on the frontend "Edit Subaccount" page.
							 *
							 * @param int         $sanitized_user_id User ID of subaccount being edited.
							 * @since 1.5.5
							 */					  
							do_action( 'sfwc_frontend_edit_subaccount_after_account_details_fields', $sanitized_user_id );
							?>

						</div>
						
						<?php if ( ! sfwc_is_plugin_active( 'subaccounts-for-woocommerce-pro.php' ) || sfwc_is_plugin_active( 'subaccounts-for-woocommerce-pro.php' ) && $sfwc_options_subaccounts_inherit_billing_address_from_manager == 0 ) : ?>
						
							<h3><?php esc_html_e( 'Billing Address', 'subaccounts-for-woocommerce' ); ?></h3>
							<div>

							<?php

							// $load_address is just a variable set to either 'billing' or 'shipping' depending on which address to load.
							$load_address = sanitize_key( 'billing' );
							
							// $address var is set in: woocommerce -> includes -> shortcodes -> class-wc-shortcode-my-account.php.
							$address = WC()->countries->get_address_fields( get_user_meta( $sanitized_user_id, $load_address . '_country', true ), $load_address . '_' ); // User ID of subaccount.

							// Prepare values.
							foreach ( $address as $key => $field ) {

							  $value = get_user_meta( $sanitized_user_id, $key, true ); // $sanitized_user_id User ID of subaccount being edited.

							  if ( ! $value ) {
								switch ( $key ) {
								  case 'billing_email' :
								  case 'shipping_email' :
									$value = $user->get_email();
									break;
								  case 'billing_country' :
								  case 'shipping_country' :
									$value = WC()->countries->get_base_country();
									break;
								  case 'billing_state' :
								  case 'shipping_state' :
									$value = WC()->countries->get_base_state();
									break;
								}
							  }

							  $address[ $key ]['value'] = apply_filters( 'woocommerce_my_account_edit_address_field_value', $value, $key, $load_address );
							}

							// Output form fields from: woocommerce -> templates -> myaccount -> form-edit-address.php.
							foreach ( $address as $key => $field ) {
								if ( isset( $field['country_field'], $address[ $field['country_field'] ] ) ) {
									$field['country'] = wc_get_post_data_by_key( $field['country_field'], $address[ $field['country_field'] ]['value'] );
								}
								woocommerce_form_field( $key, $field, wc_get_post_data_by_key( $key, $field['value'] ) );
							}
							?>
								
							</div>
						<?php endif; ?>
						
						<?php if ( ! sfwc_is_plugin_active( 'subaccounts-for-woocommerce-pro.php' ) || sfwc_is_plugin_active( 'subaccounts-for-woocommerce-pro.php' ) && $sfwc_options_subaccounts_inherit_shipping_address_from_manager == 0 ) : ?>
							
							<h3><?php esc_html_e( 'Shipping Address', 'subaccounts-for-woocommerce' ); ?></h3>
							<div>
								
							<?php

							// $load_address is just a variable set to either 'billing' or 'shipping' depending on which address to load.
							$load_address = sanitize_key( 'shipping' );
							
							// $address var is set in: woocommerce -> includes -> shortcodes -> class-wc-shortcode-my-account.php.
							$address = WC()->countries->get_address_fields( get_user_meta( $sanitized_user_id, $load_address . '_country', true ), $load_address . '_' ); // $user_id of subaccount.

							// Prepare values.
							foreach ( $address as $key => $field ) {

							  $value = get_user_meta( $sanitized_user_id, $key, true ); // $user_id of subaccount being edited.

							  if ( ! $value ) {
								switch ( $key ) {
								  case 'billing_email' :
								  case 'shipping_email' :
									$value = $user->get_email();
									break;
								  case 'billing_country' :
								  case 'shipping_country' :
									$value = WC()->countries->get_base_country();
									break;
								  case 'billing_state' :
								  case 'shipping_state' :
									$value = WC()->countries->get_base_state();
									break;
								}
							  }

							  $address[ $key ]['value'] = apply_filters( 'woocommerce_my_account_edit_address_field_value', $value, $key, $load_address );
							}

							// Output form fields, from: woocommerce -> templates -> myaccount -> form-edit-address.php.
							foreach ( $address as $key => $field ) {
								if ( isset( $field['country_field'], $address[ $field['country_field'] ] ) ) {
									$field['country'] = wc_get_post_data_by_key( $field['country_field'], $address[ $field['country_field'] ]['value'] );
								}
								woocommerce_form_field( $key, $field, wc_get_post_data_by_key( $key, $field['value'] ) );
							}
							?>
							
							</div>
						<?php endif; ?>
						
						<?php
						/**
						 * Hook: sfwc_frontend_edit_subaccount_accordion.
						 *
						 * Allow developers to add extra accordion tabs on the forntend Edit Subaccount page.
						 *
						 * @param int         $sanitized_user_id User ID of subaccount being edited.
						 * @since 1.5.x
						 */					  
						do_action( 'sfwc_frontend_edit_subaccount_accordion', $sanitized_user_id );
						?>
					</div>
					
					<?php wp_nonce_field( 'sfwc_nonce_frontend_edit_subaccount_action', 'sfwc_nonce_frontend_edit_subaccount_form' ); ?>
					
					<input type="hidden" name="sfwc_frontend_edit_subaccount_user_id" value="<?php echo esc_attr( $sanitized_user_id ); ?>">

					<input type="submit" value="<?php esc_attr_e( 'Update Subaccount', 'subaccounts-for-woocommerce' ); ?>" style="margin-top:30px; padding:10px 40px;">
				
				</form>
			</div>

		<?php else: ?>
		
			<?php wc_print_notice( esc_html__( 'Your user role is not valid or disabled.', 'subaccounts-for-woocommerce' ), 'notice' ); ?>
		
		<?php endif; ?>
		
	<?php else: ?>
		
		<?php wc_print_notice( esc_html__( 'Your account type is not valid.', 'subaccounts-for-woocommerce' ), 'notice' ); ?>
		
	<?php endif; ?>

		<script>
		jQuery(document).ready(function ($) {
			
			// Update the URL by appending the ?user query string.
			history.pushState( null, '', '?user=' + <?php echo $sanitized_user_id; ?> );

			
			// Init jQuery UI Accordion.
			$( function() {
				$( "#accordion" ).accordion({
					heightStyle: "content"
				});
			});
			
			
			/***************
			 Ajax Pagination
			 ***************/
			
			$("#frontend_manage_subaccounts #sfwc-loading-icon").hide();

			var sfwc_ajax_url = "<?php echo esc_url( admin_url('admin-ajax.php') ); ?>";
			
			var sfwc_nonce_frontend_edit_subaccount = "<?php echo wp_create_nonce('sfwc_nonce_frontend_edit_subaccount'); ?>";
			
			var filter_account_type = "<?php echo esc_html( $filter_account_type ); ?>";
				
			
			$("#sfwc_frontend_edit_subaccount_go_back").on("click", function (e) {
				e.preventDefault();

				$.ajax({
					type: 'POST',
					data: {
						action: 'sfwc_frontend_manage_subaccounts',
						ajax_current_page: <?php echo $sanitized_current_page_users; ?>,
						ajax_filter_account_type: filter_account_type,
						nonce: sfwc_nonce_frontend_edit_subaccount,
					},
					url: sfwc_ajax_url,
					beforeSend: function () {
						
						// Remove previous content page.
						$("#frontend_manage_subaccounts_edit_subaccount").remove();
						
						// Show loading icon.
						$("#frontend_manage_subaccounts #sfwc-loading-icon").show();
					},
					success: function (data) {
						
						// Hide loading icon.
						$("#frontend_manage_subaccounts #sfwc-loading-icon").hide();

						// Send data.
						$('#frontend_manage_subaccounts').html(data);
						
						// Update the URL by appending the ?user_page query string.
						history.pushState( null, '', '?user_page=' + <?php echo $sanitized_current_page_users; ?> );
					}
				});
			});

		});
		</script>
		
	<?php
	} else {
		echo esc_html__( 'Nonce could not be verified.', 'subaccounts-for-woocommerce' );
	}
	wp_die(); // Always die in functions echoing AJAX content.
}
add_action( 'wp_ajax_sfwc_frontend_edit_subaccount', 'sfwc_frontend_edit_subaccount' );




/**
 * Ajax loop for frontend User Switcher dropdown.
 */
function sfwc_ajax_frontend_populate_user_switcher_dropdown_with_subaccounts() {
	
    // Get 'Options' settings
    $sfwc_options = (array) get_option('sfwc_options');

    // Get Selected Roles option value from Options settings.
    $sfwc_option_selected_roles = ( isset( $sfwc_options['sfwc_option_selected_roles'] ) ) ? $sfwc_options['sfwc_option_selected_roles'] : array('customer', 'subscriber');
	
	$page = ( isset( $_POST['ajax_page'] ) ) ? absint( $_POST['ajax_page'] ) : 1;
	
	$ajax_search = isset( $_POST['ajax_search'] ) ? sanitize_text_field( $_POST['ajax_search'] ) : false;
	?>
	<!--
	<script>
		// For debug.
		alert( <?php echo absint( $page ); ?> );
	</script>
	-->
	<?php

    // Check nonce for security
    if ( ! wp_verify_nonce( $_POST['nonce'], 'sfwc_nonce' ) ) {

		// Need to wrap the error message within option tags otherwise will not get printed inside select form
        wp_die( '<option>' . esc_html__( 'Security check failed.', 'subaccounts-for-woocommerce' ) . '</option>' );

    } else {


		// If 'Manager' radio button is selected, exclude users with 'Account Level Type' equals to 'supervisor' and 'manager'
		// but force inclusion of users where 'sfwc_account_level_type' has not been set yet (newely created users).
        $customers = sfwc_query_users_for_possible_selection_as_subaccounts( array( 'supervisor', 'manager' ), 'NOT IN', 'NOT EXISTS', 'OR', $page );

        // Get 'Customer Display Name' from Options settings
        $sfwc_options = (array) get_option('sfwc_options');
		
        // Avoid undefined $sfwc_option_display_name in case related setting has not been saved yet.
        $sfwc_option_display_name = ( isset( $sfwc_options['sfwc_option_display_name'] ) ) ? $sfwc_options['sfwc_option_display_name'] : 'username';


        // Retrieve (Ajax) user_id of currently logged-in customer.
        if ( isset( $_POST['ajax_user_id'] ) ) {
			$user_id = sanitize_text_field( $_POST['ajax_user_id'] );
        } else {
			$user_id = get_current_user_id();
		}
		
		// Get Account Level Type of currently logged in user.
		$account_level_type = get_user_meta( $user_id, 'sfwc_account_level_type', true );
		
		if ( isset( $_COOKIE[ apply_filters( 'sfwc_cookie_prefix', '' ) . 'is_supervisor'] ) ) {
			
			$cookie_value_supervisor = sanitize_text_field( $_COOKIE[ apply_filters( 'sfwc_cookie_prefix', '' ) . 'is_supervisor'] );
			
			$cookie_parts = explode( '|', $cookie_value_supervisor ); // 0 => user_login, 1 => expiration, 2 => token, 3 => hmac
			// check if the cookie has the correct number of parts, if not then we can't be sure that $cookie_parts[0] is the user name
			if ( count( $cookie_parts ) !== 4 ) {
				return '';
			}
			
			$user_session_token = $cookie_parts[2];		
			
			$is_or_was_supervisor = get_transient( 'sfwc_is_or_was_supervisor_' . $user_session_token );
		}	
		
		// Get children (array) of currently logged in user.																		
		$children_ids = get_user_meta( $user_id, 'sfwc_children', true ); // 3rd must be: true, otherwise will turn it into a two-dimensional array.

		/**
		 * Remove no longer existing users from the $children_ids array,
		 * in case a user has been deleted (but still present within 'sfwc_children' meta of an ex parent account).
		 *
		 * Also exclude users whose role is not enabled in the plugin settings.
		 */
		$existing_children_ids = array();
		
		if ( ! empty ( $children_ids ) ) {
			
			foreach ( $children_ids as $single_id ) {
				
				// Check if user still exists.
				$user_exists = get_userdata( $single_id );
				if ( $user_exists !== false ) {
					
					if ( sfwc_is_user_role_valid( $single_id ) && sfwc_is_user_role_enabled( $single_id ) && 
						 get_user_meta( $single_id, 'sfwc_account_level_type', true ) !== 'supervisor' 
						 && get_user_meta( $single_id, 'sfwc_account_level_type', true ) !== 'manager' )
					{
						$existing_children_ids[] = $single_id;
					}
				}
			}
		}
		
		
		
		/*
		 * We start by doing a query to retrieve all users.
		 * We need a total user count so that we can calculate how many pages there are.
		 */

		$count_args  = array(
			'role'      => $sfwc_option_selected_roles,
			'fields'    => 'all_with_meta',
			'number'    => 999999      
		);
		$user_count_query = new WP_User_Query( $count_args );
		$user_count = $user_count_query->get_results();

		// count the number of users found in the query
		$total_users = $user_count ? count($user_count) : 1;

		// How many users to show per page.
		$users_per_page = 30;

		// Calculate the total number of pages.
		$offset = $users_per_page * ($page - 1);
		$total_pages = ceil( $total_users / $users_per_page );
		
		
		$args = array(
			//'role__in' => $sfwc_option_selected_roles,
			'include' => $existing_children_ids,
			'orderby' => 'ID',
			'order' => 'ASC',
			'number' => $users_per_page,
			'offset' => $offset,
		);
		
		// Search users for partial match.
		if( $ajax_search ) {
			
			$args['search'] = '*'.esc_attr( $ajax_search ).'*';
			
			$args['search_columns'] = array(
					'user_login',
					'user_nicename',
					'user_email',
					'user_url',
			);
		}
		
		// The User Query
		$children = new WP_User_Query( $args );
		
		
		// Show subaccounts.
		if ( ! empty( $children->get_results() ) ) {

			foreach ( $children->get_results() as $index => $child ) {
				
				if ($index == 0) {
					$scroll_to_this = 'class="first-item-loaded"';
				} else {
					$scroll_to_this = '';
				}
				
				//Check 'Customer Display Name' in Subaccounts > Settings > Options and display it accordingly
				if ( ( $sfwc_option_display_name == 'full_name' ) && ( $child->user_firstname || $child->user_lastname ) ) {

					// Echo 'Full Name + Email' (if either First Name or Last Name has been set)
					echo '<option value="' . esc_attr( $child->ID ) . '" ' . $scroll_to_this .'>' . esc_html( $child->user_firstname ) . ' ' . esc_html( $child->user_lastname ) . ' - [' . esc_html( $child->user_email ) . ']</option>';

				} elseif ( ( $sfwc_option_display_name == 'company_name' ) && ( $child->billing_company ) ) {

					// Echo 'Company + Email' (if Company name has been set)
					echo '<option value="' . esc_attr( $child->ID ) . '" ' . $scroll_to_this .'>' . esc_html( $child->billing_company ) . ' - [' . esc_html( $child->user_email ) . ']</option>';

				} else {

					// Otherwise echo 'Username + Email'
					echo '<option value="' . esc_attr( $child->ID ) . '" ' . $scroll_to_this .'>' . esc_html( $child->user_login ) . ' - [' . esc_html( $child->user_email ) . ']</option>';
				}
			}
		}		
        wp_die(); // Always die in functions echoing AJAX content.
    }
}
add_action('wp_ajax_frontend_populate_user_switcher_dropdown_with_subaccounts', 'sfwc_ajax_frontend_populate_user_switcher_dropdown_with_subaccounts');




/**
 * Ajax loop for frontend Subaccount Orders dropdown.
 */
function sfwc_ajax_frontend_populate_subaccount_orders_dropdown_with_subaccounts() {
	
    // Get 'Options' settings
    $sfwc_options = (array) get_option('sfwc_options');
	
	// Get 'Subaccount Mode' option value from Options settings.
	$sfwc_option_subaccount_mode = ( isset( $sfwc_options['sfwc_option_subaccount_mode'] ) ) ? $sfwc_options['sfwc_option_subaccount_mode'] : 'sub_user';

    // Get Selected Roles option value from Options settings.
    $sfwc_option_selected_roles = ( isset( $sfwc_options['sfwc_option_selected_roles'] ) ) ? $sfwc_options['sfwc_option_selected_roles'] : array('customer', 'subscriber');
	
	$page = ( isset( $_POST['ajax_page'] ) ) ? absint( $_POST['ajax_page'] ) : 1;
	
	$ajax_search = isset( $_POST['ajax_search'] ) ? sanitize_text_field( $_POST['ajax_search'] ) : false;
	?>
	<!--
	<script>
		// For debug.
		alert( <?php echo absint( $page ); ?> );
	</script>
	-->
	<?php

    // Check nonce for security
    if ( ! wp_verify_nonce( $_POST['nonce'], 'sfwc_nonce' ) ) {

		// Need to wrap the error message within option tags otherwise will not get printed inside select form
        wp_die( '<option>' . esc_html__( 'Security check failed.', 'subaccounts-for-woocommerce' ) . '</option>' );

    } else {


		// If 'Manager' radio button is selected, exclude users with 'Account Level Type' equals to 'supervisor' and 'manager'
		// but force inclusion of users where 'sfwc_account_level_type' has not been set yet (newely created users).
        $customers = sfwc_query_users_for_possible_selection_as_subaccounts( array( 'supervisor', 'manager' ), 'NOT IN', 'NOT EXISTS', 'OR', $page );

        // Get 'Customer Display Name' from Options settings
        $sfwc_options = (array) get_option('sfwc_options');
		
        // Avoid undefined $sfwc_option_display_name in case related setting has not been saved yet.
        $sfwc_option_display_name = ( isset( $sfwc_options['sfwc_option_display_name'] ) ) ? $sfwc_options['sfwc_option_display_name'] : 'username';


        // Retrieve (Ajax) user_id of currently logged-in customer.
        if ( isset( $_POST['ajax_user_id'] ) ) {
			$user_id = sanitize_text_field( $_POST['ajax_user_id'] );
        } else {
			$user_id = get_current_user_id();
		}
	
		// Get children (array) of currently logged in user.																		
		$children_ids = get_user_meta( $user_id, 'sfwc_children', true ); // 3rd must be: true, otherwise will turn it into a two-dimensional array.

		/**
		 * Remove no longer existing users from the $children_ids array,
		 * in case a user has been deleted (but still present within 'sfwc_children' meta of an ex parent account).
		 *
		 * Also exclude users whose role is not enabled in the plugin settings.
		 */
		$existing_children_ids = array();
		
		if ( ! empty ( $children_ids ) ) {
			
			foreach ( $children_ids as $single_id ) {
				
				// Check if user still exists.
				$user_exists = get_userdata( $single_id );
				if ( $user_exists !== false ) {
					
					if ( sfwc_is_user_role_valid( $single_id ) && sfwc_is_user_role_enabled( $single_id ) && 
						 get_user_meta( $single_id, 'sfwc_account_level_type', true ) !== 'supervisor' 
						 && get_user_meta( $single_id, 'sfwc_account_level_type', true ) !== 'manager' )
					{
						
						$existing_children_ids[] = $single_id;
					}
				}
			}
		}
		
		// If Multi-User Mode is enabled include the user ID of the parent account among the users to show.
		if ( $sfwc_option_subaccount_mode == 'multi_user' ) { // is_wc_endpoint_url( 'orders' ) not working within Ajax functions.
			array_unshift( $existing_children_ids, $user_id );
		}
		
		
		
		/*
		 * We start by doing a query to retrieve all users.
		 * We need a total user count so that we can calculate how many pages there are.
		 */

		$count_args  = array(
			'role'      => $sfwc_option_selected_roles,
			'fields'    => 'all_with_meta',
			'number'    => 999999      
		);
		$user_count_query = new WP_User_Query( $count_args );
		$user_count = $user_count_query->get_results();

		// count the number of users found in the query
		$total_users = $user_count ? count($user_count) : 1;

		// How many users to show per page.
		$users_per_page = 30;

		// Calculate the total number of pages.
		$offset = $users_per_page * ($page - 1);
		$total_pages = ceil( $total_users / $users_per_page );
		
		
		
		$args = array(
			//'role__in' => $sfwc_option_selected_roles,
			'include' => $existing_children_ids,
			'orderby' => 'ID',
			'order' => 'ASC',
			'number' => $users_per_page,
			'offset' => $offset,
		);
		
		
		// Search users for partial match.
		if( $ajax_search ) {
			
			$args['search'] = '*'.esc_attr( $ajax_search ).'*';
			
			$args['search_columns'] = array(
					'user_login',
					'user_nicename',
					'user_email',
					'user_url',
			);
		}
		// The User Query
		$children = new WP_User_Query( $args );						
		
		if ( ! empty( $children->get_results() ) ) {

			foreach ( $children->get_results() as $index => $child ) {
				
				if ($index == 0) {
					$scroll_to_this = 'class="first-item-loaded"';
				} else {
					$scroll_to_this = '';
				}

				//Check 'Customer Display Name' in Subaccounts > Settings > Options and display it accordingly
				if ( ( $sfwc_option_display_name == 'full_name' ) && ( $child->user_firstname || $child->user_lastname ) ) {

					// Echo 'Full Name + Email' (if either First Name or Last Name has been set)
					echo '<option value="' . esc_attr( $child->ID ) . '" ' . $scroll_to_this .'>' . esc_html( $child->user_firstname ) . ' ' . esc_html( $child->user_lastname ) . ' - [' . esc_html( $child->user_email ) . ']</option>';

				} elseif ( ( $sfwc_option_display_name == 'company_name' ) && ( $child->billing_company ) ) {

					// Echo 'Company + Email' (if Company name has been set)
					echo '<option value="' . esc_attr( $child->ID ) . '" ' . $scroll_to_this .'>' . esc_html( $child->billing_company ) . ' - [' . esc_html( $child->user_email ) . ']</option>';

				} else {

					// Otherwise echo 'Username + Email'
					echo '<option value="' . esc_attr( $child->ID ) . '" ' . $scroll_to_this .'>' . esc_html( $child->user_login ) . ' - [' . esc_html( $child->user_email ) . ']</option>';
				}
			}
		}		
        wp_die(); // Always die in functions echoing AJAX content.
    }
}
add_action('wp_ajax_frontend_populate_subaccount_orders_dropdown_with_subaccounts', 'sfwc_ajax_frontend_populate_subaccount_orders_dropdown_with_subaccounts');