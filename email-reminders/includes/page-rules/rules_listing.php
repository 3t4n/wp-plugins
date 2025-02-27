<?php /**
 * @version 1.0
 * @description Rules
 * @category  Rules Class
 * @author wpdevelop
 *
 * @web-site http://oplugins.com/
 * @email info@oplugins.com
 *
 * @modified 2020-01-23
 */

if ( ! defined( 'ABSPATH' ) ) exit;                                             // Exit if accessed directly

class OPER_Rules {

	// <editor-fold     defaultstate="collapsed"                        desc=" ///  JS | CSS files | Tpl loading  /// "  >

		// JS | CSS  ===================================================================================================

		/**
		 * Define HOOKs for loading CSS and  JavaScript files
		 */
		public function init_load_css_js_tpl() {
			// JS & CSS

			// Load only  at  Rules Settings Page
			if  ( strpos( $_SERVER['REQUEST_URI'], 'page=oper-rules' ) !== false ) {

				add_action( 'oper_enqueue_js_files', array( $this, 'js_load_files' ), 50 );
				add_action( 'oper_enqueue_css_files', array( $this, 'enqueue_css_files' ), 50 );

				add_action( 'oper_hook_settings_page_footer', array( $this, 'hook__page_footer_tmpl' ) );
			}
		}

		/** JSS */
		public function js_load_files( $where_to_load ) {

			$in_footer = true;

			if ( ( is_admin() ) && ( in_array( $where_to_load, array( 'admin', 'both' ) ) ) ) {

				//wp_enqueue_script( 'oper-live_search', oper_plugin_url( '/_out/js/live_search.js' ), array( 'oper-global-vars' ), '1.1', $in_footer );
				wp_enqueue_script( 'oper-listing_rules'
					, trailingslashit( plugins_url( '', __FILE__ ) ) . 'rules_listing.js'         /* oper_plugin_url( '/_out/js/codemirror.js' ) */
					, array( 'oper-global-vars' ), '1.1', $in_footer );

				/**
				wp_localize_script( 'oper-global-vars', 'oper_live_request_obj'
									, array(
											'contacts'  => '',
											'reminders' => ''
										)
				);
			    */
			}
		}

		/** CSS */
		public function enqueue_css_files( $where_to_load ) {

			if ( ( is_admin() ) && ( in_array( $where_to_load, array( 'admin', 'both' ) ) ) ) {

				//wp_enqueue_style( 'oper-contacts-listing', oper_plugin_url( '/includes/listing_contacts/o-contacts-listing.css' ), array(), OPER_VERSION_NUM );
				wp_enqueue_style( 'oper-listing_rules', trailingslashit( plugins_url( '', __FILE__ ) ) . 'rules_listing.css'
						, array(), OPER_VERSION_NUM );

			}
		}

	// </editor-fold>


	// <editor-fold     defaultstate="collapsed"                        desc=" ///  Templates  /// "  >

		// Templates ===================================================================================================

		/**
		 * Templates at footer of page
		 *
		 * @param $page string
		 */
		public function hook__page_footer_tmpl( $page ){

			if ( 'oper-rules'  === $page ) {
				$this->template__listing_header();
				$this->template__listing_row();
			}
		}

		private function template__listing_header() {

			// Header
			?><script type="text/html" id="tmpl-oper_rules_list_header">
				<div class="oper_listing_usual_row oper_list_header oper_selectable_head">
					<div class="oper_listing_col oper_col_id check-column"><div class="content_text"><input type="checkbox" /></div></div>
					<div class="oper_listing_col oper_col_labels"><div class="content_text"><?php 	echo esc_js( __( 'Actions', 'email-reminders' ) ); ?></div></div>
					<div class="oper_listing_col oper_col_data"><div class="content_text"><?php 	echo esc_js( __( 'Data', 'email-reminders' ) ); ?></div></div>
				</div>
			</script><?php
		}

		private function template__listing_row() {
			/**
			 * Fields, like     {{data.rules_id}}
												__search_request_keyword__: ""
												ru_create_date: "2020-01-30 11:31:43"
												ru_edit_date: "2020-01-30 13:31:43"
												last_check_contact_id: "0"
												last_run_date: null
												rule: Object {   email_template: "super_new"
                                                               , rule: {
																		 conditions: [
																				0: Object { if: "__system__|source", sign: "&gt;=", value: "1&quot;0&#039;0\\0" }
																				1: {…}
                                                                                ...
                                                                         ]
                                                             }
										rules_id: "17"
										status: null
			 */
			// Rows
			?><script type="text/html" id="tmpl-oper_rules_list_row">
				<#
					////////////////////////////////////////////////////////////////////////////////////////////////////
					// Next Run date/time
					////////////////////////////////////////////////////////////////////////////////////////////////////
					var next_run_text = '';

					if ( undefined != data['last_run_date'] ) {
						var dateParts = data['last_run_date'].split("-");
						var jsDate = new Date(dateParts[0], dateParts[1] - 1, dateParts[2].substr(0, 2), dateParts[2].substr(3, 2), dateParts[2].substr(6, 2), dateParts[2].substr(9, 2));

						if ( 0 === parseInt( data['expire_after'] ) ) {		// Never Expire - this option  in seconds   //FixIn: 1.0.2.2
							data['expire_after'] = 60 * 60 * 24 * 365 * 99;		// Set  expire period as 99 years
						}
					    next_run = new Date( jsDate.getTime() + ( parseInt( data['expire_after'] ) * 1000 ) );
						next_run_text =  next_run.getFullYear() + '-' +
									( (( next_run.getMonth() + 1) < 10 )   ? '0' : '') + ( next_run.getMonth() + 1)   + '-' +
									( (next_run.getDate() < 10 )    ? '0' : '') + next_run.getDate()    + ' ' +
									( (next_run.getHours() < 10 )   ? '0' : '') + next_run.getHours()   + ':' +
									( (next_run.getMinutes() < 10 ) ? '0' : '') + next_run.getMinutes() + ':' +
									( (next_run.getSeconds() < 10 ) ? '0' : '') + next_run.getSeconds();
					}

					////////////////////////////////////////////////////////////////////////////////////////////////////
					// Get  Days | Hours | Minutes | Seconds , when its expire
					////////////////////////////////////////////////////////////////////////////////////////////////////
				    data['expire_after'] = parseInt( data['expire_after'] );        // Number of seconds,  when  expire Rule
					var days_count    = Math.floor( ( data['expire_after'] ) / ( 24 * 60 * 60 ) );
					var hours_count   = Math.floor( ( data['expire_after'] - ( days_count * 24 * 60 * 60 ) ) / ( 60 * 60 ) );
					var minutes_count = Math.floor( ( data['expire_after'] - ( days_count * 24 * 60 * 60 ) - ( hours_count * 60 * 60 ) ) / ( 60 ) );
					var seconds_count = Math.floor( ( data['expire_after'] - ( days_count * 24 * 60 * 60 ) - ( hours_count * 60 * 60 ) - ( minutes_count * 60 ) )  );

					var expire_title = '';
					if ( days_count > 0 ) {
						expire_title +=  days_count;
				        if ( 1 == days_count ) {
				           expire_title += ' <?php _e( 'day', 'email-reminders' ); ?> ';
				        } else {
						   expire_title += ' <?php _e( 'days', 'email-reminders' ); ?> ';
				        }
				    }
					if ( hours_count > 0 ) {
						expire_title +=  hours_count;
				        if ( 1 == hours_count ) {
				           expire_title += ' <?php _e( 'hour', 'email-reminders' ); ?> ';
				        } else {
						   expire_title += ' <?php _e( 'hours', 'email-reminders' ); ?> ';
				        }
				    }
					if ( minutes_count > 0 ) {
						expire_title +=  minutes_count;
				        if ( 1 == minutes_count ) {
				           expire_title += ' <?php _e( 'minute', 'email-reminders' ); ?> ';
				        } else {
						   expire_title += ' <?php _e( 'minutes', 'email-reminders' ); ?> ';
				        }
				    }
					if ( seconds_count > 0 ) {
						expire_title +=  seconds_count;
				        if ( 1 == seconds_count ) {
				           expire_title += ' <?php _e( 'second', 'email-reminders' ); ?> ';
				        } else {
						   expire_title += ' <?php _e( 'seconds', 'email-reminders' ); ?> ';
				        }
				    }
					if ( '' == expire_title ) {
				       expire_title = '<?php _e( 'Never', 'email-reminders' ); ?>';
				    }
				#>
				<div id="row_id_{{{data.rules_id}}}" class="oper_listing_usual_row oper_list_row oper_row">
					<div class="oper_listing_col oper_col_id check-column"><div class="content_text"><input type="checkbox" /></div></div>
					<div class="oper_listing_col oper_col_labels">
						<# // console.log( data['rule']['status'] );
							var label_class = '';
						   	if ( undefined == data['rule']['status'] ) {

								data['last_check_contact_id'] = parseInt( data['last_check_contact_id'] );
								data['max_contact_id'] = parseInt( data['max_contact_id'] );

								if ( data['last_check_contact_id'] == data['max_contact_id'] ) {
									data['rule']['status'] = '<?php _e( 'Finished', 'email-reminders' ) ?>';
									label_class = 'rules_label__finished';

										<?php if ( ! function_exists( 'opera_cron__rule_reset_execute' ) ) {   //FixIn: 1.0.2.2 ?>
										var is_expired = ( next_run.getTime() / 1000 )  -  ( new Date( '<?php echo  current_time( 'mysql' ); ?>').getTime() / 1000 ) ;
										if ( is_expired < 0 ) {
											data['rule']['status'] = '<?php _e( 'Expired', 'email-reminders' ) ?>';
											label_class = 'rules_label__expired';
										}
										<?php } ?>
								}
								if ( data['last_check_contact_id'] < data['max_contact_id'] ) {
									data['rule']['status'] = '<?php _e( 'In Process', 'email-reminders' ) ?>';
									label_class = 'rules_label__paused';
								}
								if ( 0 == data['last_check_contact_id'] ) {
									data['rule']['status'] = '<?php _e( 'Not Started', 'email-reminders' ) ?>';
									label_class = 'rules_label__not_started';
								}

							}
						#>
						<div class="content_text">
							<span class="oper_label {{label_class}}"><?php //_e('Status', 'email-reminders'); ?>{{{data['rule']['status']}}}</span>
							<?php do_action( 'opera_show_cron_labels_in_rules_listing' ); ?>
						</div>
					</div>
					<div class="oper_listing_col oper_col_data">
						<div class="content_text">
							<div class="oper_next_rule_time">
								<?php do_action( 'opera_show_cron_data_in_rules_listing' ); ?>
								<?php if ( ! function_exists( 'opera_cron__rule_reset_execute' ) ) { //FixIn: 1.0.2.2 ?>
								<span><strong><?php _e('Expire in', 'email-reminders' ); ?></strong>: <span class="fieldvalue">{{expire_title}}</span></span>
								<span><strong><?php _e('Can start again at', 'email-reminders'); ?></strong>: <span class="fieldvalue">{{{next_run_text}}}</span></span>
								<?php } ?>
								<span><strong><?php _e('Last run', 'email-reminders'); ?></strong>: <span class="fieldvalue">{{{data['last_run_date']}}}</span></span>
								<span><strong><?php _e('Last checked contact id', 'email-reminders'); ?></strong>: <span class="fieldvalue"><strong>{{{data['last_check_contact_id']}}}</strong></span></span>
								<span class="oper_item_actions wpdevelop">
								<a href="javascript:void();"    style="margin:0;"
								   onclick="javascript:oper_rules__modify__ajx_reset( oper_get_row_id_from_element( this ) );return false;"
								   class="tooltip_top button-secondary button"
								   title="<?php _e('Reset - set last checked contact id to 0', 'email-reminders' ); ?>"
								   data-original-title="Reset"
								><i class="glyphicon glyphicon-flash -repeat"></i></a>
								</span>
							</div>
							<hr/>
							<#
							  if ( '' == data['rule']['email_template'] ) {
							     data['rule']['email_template'] = '<?php _e( 'Default', 'email-reminders' ); ?>';
							  }
							#>
							<span class="oper_label0"><?php _e( 'Create email', 'email-reminders' ); ?> <strong>{{{data['rule']['email_template']}}}</strong></span>,
							<?php _e( 'if', 'email-reminders' ); ?>
							<# <?php if (0) { ?><script type="text/javascript"><?php  /* Hack  for showing  JavaScript syntax */ } ?>

								// Conditions
								_.each( data.rule.conditions, function ( p_val_condition, p_key, p_data ) {

									#><div class="oper_rules_conditions"><#

										var tpl_class_selection = '';
										if ( 	( '' != data['__search_request_keyword__'] )
											 && ( undefined != p_val_condition[ 'value' ] )
											 && (  -1 != p_val_condition[ 'value' ].toLowerCase().indexOf( data['__search_request_keyword__'].trim().toLowerCase() )  )
										) {
											tpl_class_selection = ' fieldsearchvalue ';
										}

										p_val_condition[ 'if' ] = p_val_condition[ 'if' ].split('|');

										if ( '__system__' == p_val_condition[ 'if' ][0] ) {
											p_val_condition[ 'if' ][0] = '';
										} else {
											if ( '__default__' == p_val_condition[ 'if' ][0] ) {
												p_val_condition[ 'if' ][0] = 'default';
											}
											p_val_condition[ 'if' ][0] = ''+p_val_condition[ 'if' ][0]+' -> ';
										}
										#>
										<div class="oper_rules_condition_if">{{p_val_condition[ 'if' ][0]}}<strong>{{p_val_condition[ 'if' ][1]}}</strong></div>
										<div class="oper_rules_condition_sign">{{{p_val_condition[ 'sign' ]}}}</div>
										<div class="oper_rules_condition_value fieldvalue0 {{tpl_class_selection}}">{{{p_val_condition[ 'value' ]}}}</div>

									</div><#
								});

							<?php if (0) { ?></script><?php } ?> #>
					    </div>
					</div>
					<div class="oper_item_actions wpdevelop">
						<div  class="oper_actions_buttons">
							<a href="javascript:void();"
							   onclick="javascript:oper_rules_ajx_run( oper_get_row_id_from_element( this ) );return false;"
							   class="tooltip_top button-secondary button"
							   title="<?php _e('Run', 'email-reminders' ); ?>" data-original-title="Run"
							><i class="glyphicon glyphicon-play -circle"></i></a>
							<?php if (0) { ?>
							<a href="javascript:void();"
							   onclick="javascript:oper_rules__modify__ajx_reset( oper_get_row_id_from_element( this ) );return false;"
							   class="tooltip_top button-secondary button"
							   title="<?php _e('Reset - set last checked contact id to 0', 'email-reminders' ); ?>" data-original-title="Reset"
							><i class="glyphicon glyphicon-flash -repeat"></i></a>
							<?php } ?>
							<a href="javascript:void();"
							   onclick="javascript:oper_rules_ajx_edit( oper_get_row_id_from_element( this ) );return false;"
							   class="tooltip_top button-secondary button"
							   title="<?php _e('Edit', 'email-reminders' ); ?>" data-original-title="Edit"
							><i class="glyphicon glyphicon-edit"></i></a>
							<a href="javascript:void();"
							   onclick="javascript:oper_rules_ajx_delete( oper_get_row_id_from_element( this ) );return false;"
							   class="tooltip_top button-secondary button"
							   title="<?php _e('Delete', 'email-reminders' ); ?>" data-original-title="Move to Trash"
							><i class="glyphicon glyphicon glyphicon-trash"></i></a>
						</div>
						<div class="oper_actions_sysinfo">
							<span>ID: 		<strong>{{data['rules_id']}}</strong></span>&nbsp;&nbsp;
							<span>Created: 	<strong>{{data['ru_create_date']}}</strong></span>&nbsp;&nbsp;
						    <span>Edited: 	<strong>{{data['ru_edit_date']}}</strong></span>
						</div>
					</div>
				</div>

			</script><?php
		}

	// </editor-fold>


	// <editor-fold     defaultstate="collapsed"                        desc=" ///  A J A X  /// "  >

		// A J A X =====================================================================================================

		/**
		 * Define HOOKs for start  loading Ajax
		 */
		public function init_ajax(){

			// Ajax Handlers.		Note. "locale_for_ajax" rechecked in oper-ajax.php
			add_action( 'wp_ajax_'		     . 'OPER_RULES_LISTING', array( $this, 'ajax_' . 'OPER_RULES_LISTING' ) );	    // Admin & Client (logged in usres)
			// add_action( 'wp_ajax_nopriv_' . 'OPER_RULES_LISTING', array( $this, 'ajax_' . 'OPER_RULES_LISTING' ) );	    // Client         (not logged in)
		}


		/**
		 * Ajax - Get Listing Data and Response to JS script
		 */
		public function ajax_OPER_RULES_LISTING() {

			if ( ! isset( $_POST['search_params'] ) || empty( $_POST['search_params'] ) ) { exit; }

			// Security  -----------------------------------------------------------------------------------------------    // in Ajax Post:   'nonce': oper_rules_listing.get_secure_param( 'nonce' ),
			$action_name    = 'oper_rules_listing_ajx' . '_opernonce';
			$nonce_post_key = 'nonce';
			$result_check   = check_ajax_referer( $action_name, $nonce_post_key );

			// SQL  ----------------------------------------------------------------------------------------------------    // in Ajax Post:  'search_params': oper_rules_listing.search_get_all_params()
			// Use prefix "search_params", if Ajax sent -
			//                 $_REQUEST['search_params']['page_num'], $_REQUEST['search_params']['page_items_count'],..
			$request_params = $this->clean_request_parameters( array( 'request_prefix' => 'search_params' ) );

			$data_arr       = $this->list__get_data_arr( $request_params );


			$rules_obj = new OPER_Rules_Run();
			$max_contact_id = $rules_obj->get__max_contact_id();
			$data_arr['data_arr'] = array_map( array( $this,'add_max_contact_id' ), $data_arr['data_arr'], array_fill( 0, count( $data_arr['data_arr'] ), $max_contact_id ) );


			//----------------------------------------------------------------------------------------------------------
			// Send JSON. Its will make "wp_json_encode" - so pass only array, and This function call wp_die( '', '', array( 'response' => null, ) )		Pass JS OBJ: response_data in "jQuery.post( " function on success.
			wp_send_json( array(
								'ajx_count'         => $data_arr['count'],
								'ajx_items'         => $data_arr['data_arr'],
								'ajx_search_params' => $_REQUEST['search_params']
						) );
		}

		/**
		 * Just  helper function,  for adding new property 'max_contact_id'  to  each  item in ajx_items
		 * @param array $item
		 * @param int $max_contact_id
		 *
		 * @return array
		 */
		private function add_max_contact_id ( $item , $max_contact_id ){

			$item['max_contact_id'] = $max_contact_id;

			$item = apply_filters( 'opera_add_cron_times_to_rules_arr', $item );                                        // Addon functionality

			return $item;
		}

	// </editor-fold>


	// <editor-fold     defaultstate="collapsed"                        desc=" ///  C l e a n    R E Q U E S T  /// "  >

		/**
		 * Get list of clean  validated parameters from  $_REQUEST
		 *
		 * @param array() -  Prefix for request 	-  array(   'request_prefix' => 'search_params'   )
		 *
	     *                              If Ajax, sending search request, like:    	     $_REQUEST[ 'search_params' ]['page_num']  , $_REQUEST['search_params']['page_items_count'], ....
		 *                              then we need to use prefix  -  	  			                'search_params'
	     *                              $this->clean_request_parameters( array( 'request_prefix' => 'search_params' ) );
		 *
	     *                              Note,  if $_REQUEST[ 'search_params' ] not set,  then get  DEFAULT value
		 *
		 *             		Otherwise for usual request			$this->clean_request_parameters( );  --> get  values,  like $_REQUEST['page_num']  and if not set,  get  DEFAULT value
		 *
		 * @return array(
				  *   'page_num' 			=> 1
				  * , 'page_items_count' 	=> 100
				  * , 'sort' 				=> 'rules_id'
				  * , 'sort_type' 			=> 'DESC'
				  * , 'keyword' 			=> ''
				  * , 'status' 				=> ''
				  * , 'ru_create_date'			=> ''
			* )
		 */
		public function clean_request_parameters( $params = array() ){

			$defaults = array(
			                    'request_prefix' => false
						);
			$params   = wp_parse_args( $params, $defaults );

			// Clean specific $_REQUEST params, if param is NOT set then return "default"

			$request_params = oper_get_clean_or_default_request_params(
				array(
					  'page_num'          => array( 'validate' => 'd', 					'default' => 1 )
					, 'page_items_count'  => array( 'validate' => 'd', 					'default' => 10 )
					, 'sort'              => array( 'validate' => array( 'rules_id' ),	'default' => 'rules_id' )
					, 'sort_type'         => array( 'validate' => array( 'ASC', 'DESC'),'default' => 'DESC' )
					, 'keyword'           => array( 'validate' => 's', 					'default' => '' )
					, 'status'            => array( 'validate' => 's', 					'default' => '' )
					, 'ru_create_date'       => array( 'validate' => 'date', 				'default' => '' )
				),
				$params[ 'request_prefix' ]
			);

			return $request_params;
		}

	// </editor-fold>


	// <editor-fold     defaultstate="collapsed"                        desc=" ///  S Q L  /// "  >
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// S Q L
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	// L I S T I N G  ==================================================================================================
	//
	/**
	 * Get array of rules    and    total number of items in all  pages.
	 *
	 * @param array $request_params     = Array(
										            [page_num] => 1
										            [page_items_count] => 10
										            [sort] => rules_id
										            [sort_type] => DESC
										            [status] =>
										            [keyword] => TODAY
										            [ru_create_date] =>
										        )
	 *
	 * @return array                    = Array(
												[count] => 14
									            [data_arr] => Array (
														            [0] => Array (
																						[rules_id] => 14
																	                    [last_check_contact_id] => 0
																	                    [status] =>
																	                    [last_run_date] =>
																	                    [rule] => Array (
																	                            [email_template] => super_new
																	                            [conditions] => Array (
																	                                    [0] => Array (
																	                                            [if] => __system__|source
																	                                            [sign] => >=
																	                                            [value] => 1"0'0\0
																	                                        )
																                                        ), ...
																	                            )
								                                                        [ru_create_date] => 2020-01-25 10:36:55
								                                                        ...
													                ), ...
	 */
	public function list__get_data_arr( $request_params ){

		// Get SQL
		$sql = $this->list__get_sql( $request_params  );

		// Run SQL
		$sql_res = $this->list__run_sql__get_items( $sql );

		// Get array of rules
		$items_arr = $this->list__get_arr_from_sql_results( $sql_res['results'] );

		return array(
			'count'    => $sql_res['count'],
			'data_arr' => $items_arr
		);
	}

		/**
		 * Get arr of SQL commands from request params
		 *
		 * @param array $params     = array (
													    'page_num' 			=> INT
													  , 'page_items_count' 	=> 10												// INT
												    //, 'sort'        		=> 'rules_id'										// STRING
													  , 'sort_type'        	=> 'DESC'											// 'ASC' | 'DESC'
													//, 'keyword' 			=> '^OPL'											// STRING
													//, 'status'			=> ''												// ''
													//, 'ru_create_date'		=> ''												// '' | '> 2019-09-16 08:56'
		                                )
		 *
		 * @return array            = array (
									            [sql_start_count]   =>  SELECT COUNT(*) as count
									            [sql_start_select]  =>  SELECT *
									            [sql_from]          =>  FROM wp_o_er_rules  as rules
									            [where]             =>  WHERE ( 1 = 1 )
									            [order]             =>  ORDER BY rules_id DESC
									            [limit]             =>  LIMIT 0, 100
		                                )
		 */
		private function list__get_sql( $params = array() ){

			global $wpdb;

			/**
			 * Good Practice: https://blog.ircmaxell.com/2017/10/disclosure-wordpress-wpdb-sql-injection-technical.html
			 * fixed in WordPress 4.8.3
			 *
				$where = "WHERE foo = %s";
				$args[] = 1;
				$args[] = 2;
				$query = $wpdb->prepare("SELECT * FROM something $where LIMIT %d, %d", $args);
			 *
			 */

			$defaults = array(
				'page_num'         => 1,
				'page_items_count' => 10,
				'sort'             => 'rules_id',
				'sort_type'        => 'DESC',
				'keyword'          => '',
				'status'           => '',
				'ru_create_date'      => ''
			);
			$params   = wp_parse_args( $params, $defaults );

			$db_names = oper_get_db_names();

		    ////////////////////////////////////////////////////////////////////////
		    // S Q L
		    ////////////////////////////////////////////////////////////////////////

			$sql_args = array();

		    $sql_start_select = " SELECT * ";
		    $sql_start_count  = " SELECT COUNT(*) as count";
		    $sql = " FROM {$wpdb->prefix}{$db_names['rules']}  as rules";

			$sql_where = " WHERE ( 1 = 1 )";

			// K E Y W O R D
			if ( ! empty( $params['keyword'] ) ) {
				$sql_where .= " AND  (  ";

							$sql_where .= "( rules.rule LIKE %s ) ";
							$sql_args[] = '%' . $wpdb->esc_like( $params['keyword'] ) . '%';

							if ( is_numeric( $params['keyword'] ) ) {
								$sql_where .= " OR ( rules.rules_id = %d ) ";
								$sql_args[] =  intval( $params['keyword'] );
							}
							//$sql_where .= " OR ( rules.note LIKE %s ) ";
							//$sql_args[] = '%' . $wpdb->esc_like( $params['keyword'] ) . '%';

				$sql_where .= "  )";
			}

			// Status
			if ( ! empty( $params['status'] ) ) {
				$sql_where .= " AND  ( rules.status = %s ) ";
				$sql_args[] = $params['status'];
			}

			// Creation Date
			if ( ! empty( $params['ru_create_date'] ) ) {
				$params['ru_create_date1'] = gmdate( 'Y-m-d H:i:s', strtotime( '-1 second', strtotime( $params['ru_create_date'] ) ) );
				$params['ru_create_date2'] = gmdate( 'Y-m-d H:i:s', strtotime( '+1 day', 	 strtotime( $params['ru_create_date'] ) ) );

				$sql_where .= " AND  ( rules.ru_create_date > %s ) AND  ( rules.ru_create_date < %s )";

				$sql_args[] = $params['ru_create_date1'];
				$sql_args[] = $params['ru_create_date2'];
			}


			$sql_args_count = $sql_args;		// For SELECT COUNT(*) as count we do not need other parameters

			$sql_order = " ORDER BY " . esc_sql( $params['sort'] ) . ( ( 'DESC' == $params['sort_type'] ) ? " DESC " : " ASC " );

		    $sql_limit = " LIMIT %d, %d ";
		    $sql_args[] = ( $params['page_num'] - 1 ) * $params['page_items_count'];
		    $sql_args[] = $params['page_items_count'];

		    $return_res = array(
		        'select' => array(
								  'sql' => $sql_start_select
								, 'sql_from'   => $sql
								, 'where' => $sql_where
								, 'order' => $sql_order
								, 'limit' => $sql_limit
								, 'sql_args' => $sql_args
						 ),
		        'count' => array(
		                  'sql'  => $sql_start_count
		                , 'sql_from'   => $sql
		                , 'where' => $sql_where
						, 'sql_args' => $sql_args_count
						)
			);

			return $return_res;
		}

		/**
		 * Run SQL
		 *
		 * @param array $sql = Array(
							            [select] => Array(
							                    [sql] =>  SELECT *
							                    [sql_from] =>  FROM wp_o_er_rules  as rules
							                    [where] =>  WHERE ( 1 = 1 ) AND  (  ( rules.rule LIKE %s )   )
							                    [order] =>  ORDER BY rules_id DESC
							                    [limit] =>  LIMIT %d, %d
							                    [sql_args] => Array(
							                            [0] => %TODAY%
							                            [1] => 0
							                            [2] => 10
							                        )
							                )
							            [count] => Array(
							                    [sql] =>  SELECT COUNT(*) as count
							                    [sql_from] =>  FROM wp_o_er_rules  as rules
							                    [where] =>  WHERE ( 1 = 1 ) AND  (  ( rules.rule LIKE %s )   )
							                    [sql_args] => Array(
							                            [0] => %TODAY%
							                        )
							                )
							        )
		 *
		 * @return array  Array(
										[count] => 14
							            [results] => Array (
											                    [0] => stdClass Object (
											                            [rules_id] => 14
											                            [last_check_contact_id] => 0
											                            [status] =>
											                            [last_run_date] =>
											                            [rule] => a:2:{s:14:"email_template";s:9:"super_new";s:10:"conditions";a:2:{i:0;a:3:{s:2:"if";s:17:"__system__|source";s:4:"sign";s:5:">=";s:5:"value";s:17:"1"0'0\0";}i:1;a:3:{s:2:"if";s:17:"__default__|_date";s:4:"sign";s:1:"=";s:5:"value";s:5:"TODAY";}}}
											                            [ru_create_date] => 2020-01-25 10:36:55
											                            [ru_edit_date] => 2020-01-25 12:36:55
											                        )
																...
		 */
		private function list__run_sql__get_items( $sql ){

			global $wpdb;

			// Items at this specific PAGE  ////////////////////////////////////////////////////////////////////////////
		    $sql_prepared = $wpdb->prepare(
											  $sql['select']['sql']
											. $sql['select']['sql_from']
											. $sql['select']['where']
											. $sql['select']['order']
											. $sql['select']['limit']
										, $sql['select']['sql_args']
		                        );
		    $listing_res = $wpdb->get_results($sql_prepared);

		    // Total Number of items with this WHERE ///////////////////////////////////////////////////////////////////
			$sql_for_listing_count =  $sql['count']['sql']
									. $sql['count']['sql_from']
									. $sql['count']['where'];

			if ( false === strpos(  $sql_for_listing_count, '%' ) ) {

				$sql_prepared = $sql_for_listing_count;

			} else {
				$sql_prepared = $wpdb->prepare(
											  $sql_for_listing_count
											, $sql['count']['sql_args']
									);
			}
		    $listing_count = $wpdb->get_results( $sql_prepared );
		    $listing_count = ( ( count( $listing_count ) > 0 ) ? $listing_count[0]->count : 0 );

			return array(
				  'count'   => $listing_count
				, 'results' => $listing_res
			);
		}

		/**
		 * Get data Array from  SQL result
		 *
		 * @param $sql_results  - array  (
								            [11726] => stdClass Object (
								                    [rules_id] => 14
						                            [last_check_contact_id] => 0
						                            [status] =>
						                            [last_run_date] =>
						                            [rule] => a:2:{s:14:"email_template";s:9:"super_new";s:10:"conditions";a:2:{i:0;a:3:{s:2:"if";s:17:"__system__|source";s:4:"sign";s:5:">=";s:5:"value";s:17:"1"0'0\0";}i:1;a:3:{s:2:"if";s:17:"__default__|_date";s:4:"sign";s:1:"=";s:5:"value";s:5:"TODAY";}}}
						                            [ru_create_date] => 2020-01-25 10:36:55
						                            [ru_edit_date] => 2020-01-25 12:36:55
							                ), ...
		 *
		 * @return array        - array (
								            [11726] => Array (
																[rules_id] => 14
											                    [last_check_contact_id] => 0
											                    [status] =>
											                    [last_run_date] =>
											                    [rule] => Array (
											                            [email_template] => super_new
											                            [conditions] => Array (
											                                    [0] => Array (
											                                            [if] => __system__|source
											                                            [sign] => >=
											                                            [value] => 1"0'0\0
											                                        )
										                                        ), ...
											                            )
		                                                        [ru_create_date] => 2020-01-25 10:36:55
		                                                        ...
							                ), ...
		 */
		public function list__get_arr_from_sql_results( $sql_results ) {

			$data_arr = array();
			foreach ( $sql_results as $sql_item_obj ) {

				$item_arr = array();

				foreach ( $sql_item_obj as $field_key => $field_value ) {

					if ( 	  ( 'rule' == $field_key )
						 ||   ( 'advanced' == $field_key )
					) {

						$item_arr[ $field_key ] = maybe_unserialize( $field_value );

					} else {
						$item_arr[ $field_key ] = $field_value;
					}
				}
				$data_arr[ /*$item_arr['rules_id']*/ ] = $item_arr;
			}

			return $data_arr;
		}

	// </editor-fold>

}

/**
 * Just for loading CSS and  JavaScript files
 */
if ( true ) {
	$rules_loading = new OPER_Rules;
	$rules_loading->init_load_css_js_tpl();
	$rules_loading->init_ajax();
}