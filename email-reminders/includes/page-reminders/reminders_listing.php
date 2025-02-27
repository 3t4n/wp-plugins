<?php /**
 * @version 1.0
 * @description Reminders
 * @category  Reminders Class
 * @author wpdevelop
 *
 * @web-site http://oplugins.com/
 * @email info@oplugins.com
 *
 * @modified 2020-01-23
 */

if ( ! defined( 'ABSPATH' ) ) exit;                                             // Exit if accessed directly

class OPER_Reminders {

	// <editor-fold     defaultstate="collapsed"                        desc=" ///  JS | CSS files | Tpl loading  /// "  >

		// JS | CSS  ===================================================================================================

		/**
		 * Define HOOKs for loading CSS and  JavaScript files
		 */
		public function init_load_css_js_tpl() {
			// JS & CSS

			// Load only  at  Reminders Settings Page
			if  ( strpos( $_SERVER['REQUEST_URI'], 'page=oper-reminders' ) !== false ) {

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

				wp_enqueue_script( 'oper-listing_reminders' , trailingslashit( plugins_url( '', __FILE__ ) ) . 'reminders_listing.js'         /* oper_plugin_url( '/_out/js/codemirror.js' ) */
					, array( 'oper-global-vars' ), '1.1', $in_footer );

				do_action( 'opera_js_load_files_rules' );

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

				wp_enqueue_style( 'oper-listing_reminders', trailingslashit( plugins_url( '', __FILE__ ) ) . 'reminders_listing.css'
						, array(), OPER_VERSION_NUM );

				do_action( 'opera_enqueue_css_files_rules' );

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

			if ( 'oper-reminders'  === $page ) {
				$this->template__listing_header();
				$this->template__listing_row();
				$this->template__content_data();
			}
		}

		private function template__listing_header() {

			// Header
			?><script type="text/html" id="tmpl-oper_reminders_list_header">
				<div class="oper_listing_usual_row oper_list_header oper_selectable_head">
					<div class="oper_listing_col oper_col_id check-column"><div class="content_text"><input type="checkbox" /></div></div>
					<div class="oper_listing_col oper_col_labels"><div class="content_text"><?php 	echo esc_js( __( 'Actions', 'email-reminders' ) ); ?></div></div>
					<div class="oper_listing_col oper_col_data"><div class="content_text"><?php 	echo esc_js( __( 'Data', 'email-reminders' ) ); ?></div></div>
				</div>
			</script><?php
		}

		private function template__listing_row() {
			/**
			 * Fields, like     {{data.reminder_id}}
												__search_request_keyword__: ""
												re_create_date: "2020-01-30 11:31:43"
												re_edit_date: "2020-01-30 13:31:43"
												last_check_contact_id: "0"
												last_run_date: null
												reminder: Object {   email_template: "super_new"
                                                               , reminder: {
																		 conditions: [
																				0: Object { if: "__system__|source", sign: "&gt;=", value: "1&quot;0&#039;0\\0" }
																				1: {…}
                                                                                ...
                                                                         ]
                                                             }
										reminder_id: "17"
										status: null
			 */
			// Rows
			?><script type="text/html" id="tmpl-oper_reminders_list_row">
				<div id="row_id_{{{data.reminder_id}}}" class="oper_listing_usual_row oper_list_row oper_row">
					<div class="oper_listing_col oper_col_id check-column"><div class="content_text"><input type="checkbox" /></div></div>
					<div class="oper_listing_col oper_col_labels">
						<div class="content_text">
							<span class="oper_label {{{('sent'==data['status'])?'reminders_label__sent':'reminders_label__init'}}}">{{{
								('sent'==data['status'])?data['status']:'<?php _e( 'not sent', 'email-reminders' ); ?>'
							}}}</span>
							<span class="oper_label reminders_label__email_template">{{{
								data['email_template']?data['email_template']:'<?php _e('Default', 'email-reminders'); ?>'
							}}}</span>
						</div>
					</div>
					<div class="oper_listing_col oper_col_data">
						<div class="content_text">
							<#
							var my_content_data 	 = wp.template( 'oper_content_data' );                          // Content Data Template
							#>
							<div class="oper_reminders_top_data_line">
								<?php do_action('opera_show_cron_times_in_reminders_listing_template'); ?>
								<?php /* ?>
								{{{ my_content_data( {"key": '<?php _e('Status', 'email-reminders'); ?>', "value": data['status'], "keyword": data['__search_request_keyword__'] } ) }}}
								{{{ my_content_data( {"key": '<?php _e('Email', 'email-reminders'); ?>', "value": data['email_template'], "keyword": data['__search_request_keyword__'] } ) }}}
 								<?php */ ?>
								{{{ my_content_data( {"key": '<?php _e('Sent Date', 'email-reminders'); ?>', "value": data['run_date'], "keyword": data['__search_request_keyword__'] } ) }}}
								<?php /* {{{ my_content_data( {"key": '<?php _e('Action', 'email-reminders'); ?>', "value": data['action'], "keyword": data['__search_request_keyword__'] } ) }}} */ ?>
							</div>
							<hr/>
							<# <?php if (0) { ?><script type="text/javascript"><?php  /* Hack  for showing  JavaScript syntax */ } ?>

								_.each( data, function ( p_val, p_key, p_data ) {

									// Skip these fields
									if (
										 ! _.contains(  [
															'__search_request_keyword__',
															'reminder_id',
															'status',
															'run_date',
															'action',
															'email_template',
															'contact_id',
															'rules_id'
															, 're_create_date','re_edit_date'
															, 'create_date','edit_date'
															, 'advanced'
														]
														,  p_key
										 			)
									){
										#>{{{
												my_content_data( {"key": p_key, "value": p_val, "keyword": data['__search_request_keyword__'] } )
										}}}<#
									}
								});
								<?php // Set  Create | Edit dates fields at  the bottom  of data view  ?>
								#>{{{ my_content_data( {"key": 'create_date', "value": data['create_date'], "keyword": data['__search_request_keyword__'] } ) }}}<#
								#>{{{ my_content_data( {"key": 'edit_date', "value": data['edit_date'], "keyword": data['__search_request_keyword__'] } ) }}}<#

							<?php if (0) { ?></script><?php } ?> #>

					    </div>
					</div>
					<div class="oper_item_actions wpdevelop">
						<div  class="oper_actions_buttons">
							<a href="javascript:void();"
							   onclick="javascript:oper_reminders__ajx__send( oper_get_row_id_from_element( this ) );return false;"
							   class="tooltip_top button-secondary button"
							   title="" data-original-title="Run"
							><i class="glyphicon glyphicon-send"></i></a>
							<a href="javascript:void();"
							   onclick="javascript:oper_reminders__modify__ajx_delete( oper_get_row_id_from_element( this ) );return false;"
							   class="tooltip_top button-secondary button"
							   title="" data-original-title="Move to Trash"
							><i class="glyphicon glyphicon glyphicon-trash"></i></a>
						</div>
						<div class="oper_actions_sysinfo">
							<span><?php _e('Reminder', 'email-reminders'); ?> ID: <strong>{{data['reminder_id']}}</strong></span>&nbsp;&nbsp;&nbsp;
							<span><?php _e('Contact', 'email-reminders'); ?> ID: <strong>{{data['contact_id']}}</strong></span>&nbsp;&nbsp;
						    <span><?php _e('Rule', 'email-reminders'); ?> ID: <strong>{{data['rules_id']}}</strong></span>&nbsp;&nbsp;
							<span><?php _e('Created', 'email-reminders'); ?>: <strong>{{data['re_create_date']}}</strong></span>&nbsp;&nbsp;
						    <span><?php _e('Edited', 'email-reminders'); ?>: <strong>{{data['re_edit_date']}}</strong></span>

						</div>
					</div>
				</div>

			</script><?php
		}

			private function template__content_data(){

				// Content Data
				?><script type="text/html" id="tmpl-oper_content_data">
					<strong>{{data.key}}</strong>:<span class="fieldvalue {{data.key}}<#
					if ( 	( data.keyword != '' )
						 && ( undefined != data.value )
						 && (  -1 != data.value.toLowerCase().indexOf( data.keyword.trim().toLowerCase() )  )
					) {
						#> fieldsearchvalue<#
					}
					if ( 	( undefined != data.value )
						 && ( -1 != data.value.toLowerCase().indexOf( 'refund' ) )
					) {
						#> _refund<#
					}
					#>">{{data.value}}</span>&nbsp;&nbsp;
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
			add_action( 'wp_ajax_'		     . 'OPER_REMINDERS_LISTING', array( $this, 'ajax_' . 'OPER_REMINDERS_LISTING' ) );	    // Admin & Client (logged in usres)
			// add_action( 'wp_ajax_nopriv_' . 'OPER_REMINDERS_LISTING', array( $this, 'ajax_' . 'OPER_REMINDERS_LISTING' ) );	    // Client         (not logged in)
		}


		/**
		 * Ajax - Get Listing Data and Response to JS script
		 */
		public function ajax_OPER_REMINDERS_LISTING() {

			if ( ! isset( $_POST['search_params'] ) || empty( $_POST['search_params'] ) ) { exit; }

			// Security  -----------------------------------------------------------------------------------------------    // in Ajax Post:   'nonce': oper_reminders_listing.get_secure_param( 'nonce' ),
			$action_name    = 'oper_reminders_listing_ajx' . '_opernonce';
			$nonce_post_key = 'nonce';
			$result_check   = check_ajax_referer( $action_name, $nonce_post_key );

			// SQL  ----------------------------------------------------------------------------------------------------    // in Ajax Post:  'search_params': oper_reminders_listing.search_get_all_params()
			// Use prefix "search_params", if Ajax sent -
			//                 $_REQUEST['search_params']['page_num'], $_REQUEST['search_params']['page_items_count'],..
			$request_params = $this->clean_request_parameters( array( 'request_prefix' => 'search_params' ) );

			$data_arr       = $this->list__get_data_arr( $request_params );

			//----------------------------------------------------------------------------------------------------------
			// Send JSON. Its will make "wp_json_encode" - so pass only array, and This function call wp_die( '', '', array( 'response' => null, ) )		Pass JS OBJ: response_data in "jQuery.post( " function on success.
			wp_send_json( array(
								'ajx_count'         => $data_arr['count'],
								'ajx_items'         => $data_arr['data_arr'],
								'ajx_search_params' => $_REQUEST['search_params']
						) );
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
				  * , 'sort' 				=> 'reminder_id'
				  * , 'sort_type' 			=> 'DESC'
				  * , 'keyword' 			=> ''
				  * , 'status' 				=> ''
				  * , 'create_date'			=> ''
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
					, 'sort'              => array( 'validate' => array( 'reminder_id' ),	'default' => 'reminder_id' )
					, 'sort_type'         => array( 'validate' => array( 'ASC', 'DESC'),'default' => 'DESC' )
					, 'keyword'           => array( 'validate' => 's', 					'default' => '' )
					, 'status'            => array( 'validate' => 's', 					'default' => 'init' )           // Default Value of parameter at page loading
					, 'create_date'       => array( 'validate' => 'date', 				'default' => '' )
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
	 * Get array of reminders    and    total number of items in all  pages.
	 *
	 * @param array $request_params     = Array(
										            [page_num] => 1
										            [page_items_count] => 10
										            [sort] => reminder_id
										            [sort_type] => DESC
										            [status] =>
										            [keyword] => TODAY
										            [create_date] =>
										        )
	 *
	 * @return array                    = Array(
												[count] => 14
									            [data_arr] => Array (
														            [0] => Array (
																						[reminder_id] => 14
																	                    [last_check_contact_id] => 0
																	                    [status] =>
																	                    [last_run_date] =>
																	                    [reminder] => Array (
																	                            [email_template] => super_new
																	                            [conditions] => Array (
																	                                    [0] => Array (
																	                                            [if] => __system__|source
																	                                            [sign] => >=
																	                                            [value] => 1"0'0\0
																	                                        )
																                                        ), ...
																	                            )
								                                                        [create_date] => 2020-01-25 10:36:55
								                                                        ...
													                ), ...
	 */
	public function list__get_data_arr( $request_params ){

		// Get SQL
		$sql = $this->list__get_sql( $request_params  );

		// Run SQL
		$sql_res = $this->list__run_sql__get_items( $sql );

		// Get array of reminders
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
												    //, 'sort'        		=> 'reminder_id'										// STRING
													  , 'sort_type'        	=> 'DESC'											// 'ASC' | 'DESC'
													//, 'keyword' 			=> '^OPL'											// STRING
													//, 'status'			=> ''												// ''
													//, 'create_date'		=> ''												// '' | '> 2019-09-16 08:56'
		                                )
		 *
		 * @return array            = array (
									            [sql_start_count]   =>  SELECT COUNT(*) as count
									            [sql_start_select]  =>  SELECT *
									            [sql_from]          =>  FROM wp_o_er_reminders  as reminders
									            [where]             =>  WHERE ( 1 = 1 )
									            [order]             =>  ORDER BY reminder_id DESC
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
				'sort'             => 'reminder_id',
				'sort_type'        => 'DESC',
				'keyword'          => '',
				'status'           => '',
				'create_date'      => ''
			);
			$params   = wp_parse_args( $params, $defaults );

			$db_names = oper_get_db_names();

		    ////////////////////////////////////////////////////////////////////////
		    // S Q L
		    ////////////////////////////////////////////////////////////////////////

			$sql_args = array();

		    $sql_start_select = " SELECT * ";
		    $sql_start_count  = " SELECT COUNT(*) as count";
		    $sql = " FROM {$wpdb->prefix}{$db_names['reminders']}  as reminders"

		         . " INNER JOIN {$wpdb->prefix}{$db_names['contacts']} as contacts
                     ON    contacts.contact_id = reminders.contact_id " ;
		    
		    
			$sql_where = " WHERE ( 1 = 1 )";

			// K E Y W O R D
			if ( ! empty( $params['keyword'] ) ) {
				$sql_where .= " AND  (  ";

							$sql_where .= "( contacts.data LIKE %s ) ";
							$sql_args[] = '%' . $wpdb->esc_like( $params['keyword'] ) . '%';

							if ( is_numeric( $params['keyword'] ) ) {
								$sql_where .= " OR ( contacts.contact_id = %d ) ";
								$sql_args[] =  intval( $params['keyword'] );

								$sql_where .= " OR ( reminders.reminder_id = %d ) ";
								$sql_args[] =  intval( $params['keyword'] );

								$sql_where .= " OR ( reminders.rules_id = %d ) ";
								$sql_args[] =  intval( $params['keyword'] );
							}

							$sql_where .= " OR ( contacts.note LIKE %s ) ";
							$sql_args[] = '%' . $wpdb->esc_like( $params['keyword'] ) . '%';

							$sql_where .= " OR ( reminders.email_template LIKE %s ) ";
							$sql_args[] = '%' . $wpdb->esc_like( $params['keyword'] ) . '%';

							$sql_where .= " OR ( reminders.status LIKE %s ) ";
							$sql_args[] = '%' . $wpdb->esc_like( $params['keyword'] ) . '%';

				$sql_where .= "  )";
			}

			// Status
			if ( ! empty( $params['status'] ) ) {
				$sql_where .= " AND  ( reminders.status = %s ) ";
				$sql_args[] = $params['status'];
			}

			// Creation Date
			if ( ! empty( $params['create_date'] ) ) {
				$params['create_date1'] = gmdate( 'Y-m-d H:i:s', strtotime( '-1 second', strtotime( $params['create_date'] ) ) );
				$params['create_date2'] = gmdate( 'Y-m-d H:i:s', strtotime( '+1 day', 	 strtotime( $params['create_date'] ) ) );

				$sql_where .= " AND  ( reminders.create_date > %s ) AND  ( reminders.create_date < %s )";

				$sql_args[] = $params['create_date1'];
				$sql_args[] = $params['create_date2'];
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
							                    [sql_from] =>  FROM wp_o_er_reminders  as reminders
							                    [where] =>  WHERE ( 1 = 1 ) AND  (  ( reminders.reminder LIKE %s )   )
							                    [order] =>  ORDER BY reminder_id DESC
							                    [limit] =>  LIMIT %d, %d
							                    [sql_args] => Array(
							                            [0] => %TODAY%
							                            [1] => 0
							                            [2] => 10
							                        )
							                )
							            [count] => Array(
							                    [sql] =>  SELECT COUNT(*) as count
							                    [sql_from] =>  FROM wp_o_er_reminders  as reminders
							                    [where] =>  WHERE ( 1 = 1 ) AND  (  ( reminders.reminder LIKE %s )   )
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
											                            [reminder_id] => 14
											                            [last_check_contact_id] => 0
											                            [status] =>
											                            [last_run_date] =>
											                            [reminder] => a:2:{s:14:"email_template";s:9:"super_new";s:10:"conditions";a:2:{i:0;a:3:{s:2:"if";s:17:"__system__|source";s:4:"sign";s:5:">=";s:5:"value";s:17:"1"0'0\0";}i:1;a:3:{s:2:"if";s:17:"__default__|_date";s:4:"sign";s:1:"=";s:5:"value";s:5:"TODAY";}}}
											                            [create_date] => 2020-01-25 10:36:55
											                            [edit_date] => 2020-01-25 12:36:55
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
								                    [reminder_id] => 14
						                            [last_check_contact_id] => 0
						                            [status] =>
						                            [last_run_date] =>
						                            [reminder] => a:2:{s:14:"email_template";s:9:"super_new";s:10:"conditions";a:2:{i:0;a:3:{s:2:"if";s:17:"__system__|source";s:4:"sign";s:5:">=";s:5:"value";s:17:"1"0'0\0";}i:1;a:3:{s:2:"if";s:17:"__default__|_date";s:4:"sign";s:1:"=";s:5:"value";s:5:"TODAY";}}}
						                            [create_date] => 2020-01-25 10:36:55
						                            [edit_date] => 2020-01-25 12:36:55
							                ), ...
		 *
		 * @return array        - array (
								            [11726] => Array (
																[reminder_id] => 14
											                    [last_check_contact_id] => 0
											                    [status] =>
											                    [last_run_date] =>
											                    [reminder] => Array (
											                            [email_template] => super_new
											                            [conditions] => Array (
											                                    [0] => Array (
											                                            [if] => __system__|source
											                                            [sign] => >=
											                                            [value] => 1"0'0\0
											                                        )
										                                        ), ...
											                            )
		                                                        [create_date] => 2020-01-25 10:36:55
		                                                        ...
							                ), ...
		 */
		public function list__get_arr_from_sql_results( $sql_results ) {

			/**
 				Array (
						[0] => stdClass Object
							(
								[reminder_id] => 11
								[status] => sent
								[run_date] => 2020-03-13 00:00:00
								[action] => none
								[email_template] => super_new
								[contact_id] => 14528
								[rules_id] => 44
								[create_date] => 2020-02-20 15:14:54			<== ORDER CREATE DATE
								[edit_date] => 2020-02-20 15:14:54				<== ORDER EDIT 	 DATE
								[data] => _store^O~_purchase_product^BS~_paid^$111,75~_subscription_date^~_subscription_cost^~_subscription_check^~_date^22.11.2019~_payment_type^paypal~_country_city^Australia, New South Wales~_address^Newcastle~_order_num^xxxxx~_c_email^tools@server.au~_c_name^David~_license_to^aaaa~_license_key^zzz~_product_name^BS (single)
								[note] =>
								[source] => csv
							), ...
			 */

			//$contacts_parsing = new OPER_Contacts_Listing;
			$contacts_parsing = new OPER_Contacts;

			$data_arr = array();
			foreach ( $sql_results as $sql_item_obj ) {

				$item_arr = array();

				foreach ( $sql_item_obj as $field_key => $field_value ) {

					if ( 'reminder' == $field_key ) {

						$item_arr[ $field_key ] = maybe_unserialize( $field_value );

					} else if ('advanced' == $field_key ) {

						$item_arr[ $field_key ] = maybe_unserialize( $field_value );

					} else if ('data' == $field_key ) {

						$parsed_field_data = $contacts_parsing->parse_fields_data( $field_value );        // Parse contact data and get array from saved string
						// Parsed ['data'] can ovveride some fields,  like 'contact_id'
						$item_arr = array_merge (  $item_arr, $parsed_field_data  );

					} else {
						$item_arr[ $field_key ] = $field_value;
					}
				}
				$data_arr[ /*$item_arr['reminder_id']*/ ] = $item_arr;
			}

			return $data_arr;
		}

	// </editor-fold>

}

/**
 * Just for loading CSS and  JavaScript files
 */
if ( true ) {
	$reminders_loading = new OPER_Reminders;
	$reminders_loading->init_load_css_js_tpl();
	$reminders_loading->init_ajax();
}