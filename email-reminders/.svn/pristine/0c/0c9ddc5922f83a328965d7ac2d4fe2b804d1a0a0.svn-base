<?php /**
 * @version 1.0
 * @description Contacts
 * @category  Contacts Class
 * @author wpdevelop
 *
 * @web-site http://oplugins.com/
 * @email info@oplugins.com
 *
 * @modified 2020-01-23
 */

if ( ! defined( 'ABSPATH' ) ) exit;                                             // Exit if accessed directly

class OPER_Contacts {

    /* Static Variables */
    static $data_separator = array(
									'r_separator'     => '~'
								  , 'f_separator'     => '^'
                         );


	// <editor-fold     defaultstate="collapsed"                        desc=" ///  JS | CSS files | Tpl loading  /// "  >

		// JS | CSS  ===================================================================================================

		/**
		 * Define HOOKs for loading CSS and  JavaScript files
		 */
		public function init_load_css_js_tpl() {
			// JS & CSS

			// Load only  at  Contacts Settings Page
			if  ( strpos( $_SERVER['REQUEST_URI'], 'page=oper-contacts' ) !== false ) {

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
				wp_enqueue_script( 'oper-listing_contacts'
					, trailingslashit( plugins_url( '', __FILE__ ) ) . 'contacts_listing.js'         /* oper_plugin_url( '/_out/js/codemirror.js' ) */
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
				wp_enqueue_style( 'oper-listing_contacts', trailingslashit( plugins_url( '', __FILE__ ) ) . 'contacts_listing.css'
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

			if ( 'oper-contacts'  === $page ) {
				$this->template__listing_header();
				$this->template__listing_row();
				$this->template__content_data();
			}
		}


		private function template__listing_header() {

			// Header
			?><script type="text/html" id="tmpl-oper_contacts_list_header">
				<div class="oper_listing_usual_row oper_list_header oper_selectable_head">
					<div class="oper_listing_col oper_col_id check-column"><div class="content_text"><input type="checkbox" /></div></div>
					<div class="oper_listing_col oper_col_labels"><div class="content_text"><?php 	echo esc_js( __( 'Labels', 'email-reminders' ) ); ?></div></div>
					<div class="oper_listing_col oper_col_data"><div class="content_text"><?php 	echo esc_js( __( 'Data', 'email-reminders' ) ); ?></div></div>
				</div>
			</script><?php
		}


		private function template__listing_row() {

			// Rows
			?><script type="text/html" id="tmpl-oper_contacts_list_row">
				<div id="row_id_{{{data.contact_id}}}" class="oper_listing_usual_row oper_list_row oper_row">
					<div class="oper_listing_col oper_col_id check-column"><div class="content_text"><input type="checkbox" /></div></div>
					<div class="oper_listing_col oper_col_labels">
						<div class="content_text">
							<?php
							$labels = get_oper_option( 'oper_contacts_labels' );
							$labels = explode( "\n",$labels );
							$labels = array_map( 'trim',$labels );

							// Check for Labels and colors
							foreach ($labels as $label) {

								if ( false !== strpos(':',$label) ){
									list( $label, $color, $text_color ) = explode( ':', $label );
								} else{
									$color = $text_color = '';
								}


								//FixIn: 2.0.6.1
								if ( ! empty( $label ) ) {
									?><span class="oper_label" style="color:<?php echo $text_color; ?>;background-color:<?php echo $color; ?>;">{{data.<?php echo $label;  ?>}}</span><?php
								}
							}

							// Predefined internal Labels
						 	?><span class="oper_label">{{data._product_name}}</span><#
							if ( 	( undefined != data._paid )
								 && (  -1 != data._paid.toLowerCase().indexOf( 'refund' )  )
							) {
								#><span class="oper_label contact_label__refund"><?php _e('Refund','email-reminders'); ?></span><#
							}
						#>
						</div>
					</div>
					<div class="oper_listing_col oper_col_data">
						<div class="content_text">
						<?php if ( 0 ) { ?>
							<div class="oper_next_contact_time">
								<?php do_action( 'opera_show_cron_data_in_contacts_listing' ); ?>
								<span><strong><?php _e( 'Source', 'email-reminders' ); ?></strong>: <span class="fieldvalue"><strong>{{data['source']}}</strong></span></span>
								<span><strong><?php _e( 'Contact ID', 'email-reminders' ); ?></strong>: <span class="fieldvalue"><strong>{{data['contact_id']}}</strong></span></span>
								<span class="oper_item_actions wpdevelop">
									<a href="javascript:void();"    style="margin:0;"
									   onclick="javascript:oper_contacts__modify__ajx_reset( oper_get_row_id_from_element( this ) );return false;"
									   class="tooltip_top button-secondary button"
									   title="<?php _e('Set last checked contact id to 0', 'email-reminders' ); ?>"
									   data-original-title="Reset"
									><i class="glyphicon glyphicon-flash -repeat"></i></a>
								</span>
							</div>
							<hr/>
						<?php } ?>
						<# <?php if (0) { ?><script type="text/javascript"><?php  /* Hack  for showing  JavaScript syntax */ } ?>

							// Content Data Template
							var my_content_data 	 = wp.template( 'oper_content_data' );

							_.each( data, function ( p_val, p_key, p_data ) {

								// Skip these fields
								if (
									 ! _.contains(  [
														'__search_request_keyword__'
														, 'contact_id', 'source'
														, 'create_date','edit_date'
													]
													,  p_key
												)
								){
									#>{{{
											my_content_data( {"key": p_key, "value": p_val, "keyword": data['__search_request_keyword__'] } )
									}}}<#
								}

							});
						<?php if (0) { ?></script><?php } ?> #>
					    </div>
					</div>
					<div class="oper_item_actions wpdevelop">
						<div  class="oper_actions_buttons">
							<a href="javascript:void();"
							   onclick="javascript:oper_contacts_ajx_edit( oper_get_row_id_from_element( this ) );return false;"
							   class="tooltip_top button-secondary button"
							   title="" data-original-title="Edit"
							><i class="glyphicon glyphicon-edit"></i></a>
							<a href="javascript:void();"
							   onclick="javascript:oper_contacts_ajx_delete( oper_get_row_id_from_element( this ) );return false;"
							   class="tooltip_top button-secondary button"
							   title="" data-original-title="Move to Trash"
							><i class="glyphicon glyphicon glyphicon-trash"></i></a>
						</div>
						<div class="oper_actions_sysinfo">
							<span><?php _e( 'Contact ID', 'email-reminders' ); ?>: <strong>{{data['contact_id']}}</strong></span>&nbsp;&nbsp;
							<span><?php _e( 'Source', 'email-reminders' ); ?>: <strong>{{data['source']}}</strong></span>&nbsp;&nbsp;
							<span><?php _e( 'Created', 'email-reminders' ); ?>: <strong>{{data['create_date']}}</strong></span>&nbsp;&nbsp;
						    <span><?php _e( 'Edited', 'email-reminders' ); ?>: <strong>{{data['edit_date']}}</strong></span>
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
						 && (  -1 != data.value.toLowerCase().indexOf( 'refund' )  )
					) {
						#> _refund<#
					}
					#>">{{data.value}}</span>
					<span class="fieldvalue_input fieldvalue_input_{{data.key}}" style="display: none;">
						<input class="oper-put-in" type="text" readonly="readonly" value="{{data.value}}" onfocus="this.select()" />
					</span>
				</script><?php          //FixIn: 2.0.2.2
			}


	// </editor-fold>


	// <editor-fold     defaultstate="collapsed"                        desc=" ///  A J A X  /// "  >

		// A J A X =====================================================================================================

		/**
		 * Define HOOKs for start  loading Ajax
		 */
		public function init_ajax(){

			// Ajax Handlers.		Note. "locale_for_ajax" rechecked in oper-ajax.php
			add_action( 'wp_ajax_'		     . 'OPER_CONTACTS_LISTING', array( $this, 'ajax_' . 'OPER_CONTACTS_LISTING' ) );	    // Admin & Client (logged in usres)
			// add_action( 'wp_ajax_nopriv_' . 'OPER_CONTACTS_LISTING', array( $this, 'ajax_' . 'OPER_CONTACTS_LISTING' ) );	    // Client         (not logged in)
		}


		/**
		 * Ajax - Get Listing Data and Response to JS script
		 */
		public function ajax_OPER_CONTACTS_LISTING() {

			if ( ! isset( $_POST['search_params'] ) || empty( $_POST['search_params'] ) ) { exit; }

			// Security  -----------------------------------------------------------------------------------------------    // in Ajax Post:   'nonce': oper_contacts_listing.get_secure_param( 'nonce' ),
			$action_name    = 'oper_contacts_listing_ajx' . '_opernonce';
			$nonce_post_key = 'nonce';
			$result_check   = check_ajax_referer( $action_name, $nonce_post_key );

			// SQL  ----------------------------------------------------------------------------------------------------    // in Ajax Post:  'search_params': oper_contacts_listing.search_get_all_params()
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
				  * , 'sort' 				=> 'contacts_id'
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
					, 'sort'              => array( 'validate' => array( 'contact_id' ),	'default' => 'contact_id' )
					, 'sort_type'         => array( 'validate' => array( 'ASC', 'DESC'),'default' => 'DESC' )
					, 'keyword'           => array( 'validate' => 's', 					'default' => '' )
					, 'source'            => array( 'validate' => 's', 					'default' => '' )
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


	/**
	 * Get array of contacts    and    total number of items in all  pages.
	 *
	 * @param array $request_params     = Array(
										            [page_num] => 1
										            [page_items_count] => 10
										            [sort] => contacts_id
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
																						[contacts_id] => 14
																	                    [last_check_contact_id] => 0
																	                    [status] =>
																	                    [last_run_date] =>
																	                    [contact] => Array (
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

		// Get array of contacts
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
												[page_num] => 1
												[page_items_count] => 10
												[sort] => contact_id
												[sort_type] => DESC
												[keyword] =>
												[source] =>
												[create_date] =>
										)
		 *
		 * @return array            = array (
													[select] => Array (
															[sql] =>  SELECT *
															[sql_from] =>  FROM wp_o_er_contacts as contacts
															[where] =>  WHERE ( 1 = 1 )
															[order] =>  ORDER BY contact_id DESC
															[limit] =>  LIMIT %d, %d
															[sql_args] => Array (
																	[0] => 0
																	[1] => 10
																)
														)
													[count] => Array (
															[sql] =>  SELECT COUNT(*) as count
															[sql_from] =>  FROM wp_o_er_contacts as contacts
															[where] =>  WHERE ( 1 = 1 )
															[sql_args] => Array ( )

														)

												)
		 */
		private function list__get_sql( $params = array() ){


			global $wpdb;

			/**
			 * Good Practice: https://blog.ircmaxell.com/2017/10/disclosure-wordpress-wpdb-sql-injection-technical.html
			 * fixed in WordPress 4.8.3
			 *
				$where = "WHERE foo = %s";
				$args = [$_GET['data']];
				$args[] = 1;
				$args[] = 2;
				$query = $wpdb->prepare("SELECT * FROM something $where LIMIT %d, %d", $args);
			 *
			 */

			$defaults = array(
				'page_num'         => 1,
				'page_items_count' => 10,
				'sort'             => 'contact_id',
				'sort_type'        => 'DESC',
				'keyword'          => '',
				'source'           => '',
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
			$sql = " FROM {$wpdb->prefix}{$db_names['contacts']} as contacts";

			$sql_where = " WHERE ( 1 = 1 )";

			// K E Y W O R D
			if ( ! empty( $params['keyword'] ) ) {
				$sql_where .= " AND  (  ";

							$sql_where .= "( contacts.data LIKE %s ) ";
							$sql_args[] = '%' . $wpdb->esc_like( $params['keyword'] ) . '%';

							if ( is_numeric( $params['keyword'] ) ) {
								$sql_where .= " OR ( contacts.contact_id = %d ) ";
								$sql_args[] =  intval( $params['keyword'] );
							}

							$sql_where .= " OR ( contacts.note LIKE %s ) ";
							$sql_args[] = '%' . $wpdb->esc_like( $params['keyword'] ) . '%';

				$sql_where .= "  )";
			}

			if ( ! empty( $params['source'] ) ) {
				$sql_where .= " AND  ( contacts.source = %s ) ";
				$sql_args[] = $params['source'];
			}

			if ( ! empty( $params['create_date'] ) ) {
				$params['create_date1'] = gmdate( 'Y-m-d H:i:s', strtotime( '-1 second', strtotime( $params['create_date'] ) ) );
				$params['create_date2'] = gmdate( 'Y-m-d H:i:s', strtotime( '+1 day', 	 strtotime( $params['create_date'] ) ) );

				$sql_where .= " AND  ( contacts.create_date > %s ) AND  ( contacts.create_date < %s )";

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
										[select] => Array (
												[sql] =>  SELECT *
												[sql_from] =>  FROM wp_o_er_contacts as contacts
												[where] =>  WHERE ( 1 = 1 )
												[order] =>  ORDER BY contact_id DESC
												[limit] =>  LIMIT %d, %d
												[sql_args] => Array (
														[0] => 0
														[1] => 10
													)
											)
										[count] => Array (
												[sql] =>  SELECT COUNT(*) as count
												[sql_from] =>  FROM wp_o_er_contacts as contacts
												[where] =>  WHERE ( 1 = 1 )
												[sql_args] => Array ( )

											)

									)
		 *
		 * @return array  Array(
									[count] => 31
									[results] => Array (
											[0] => stdClass Object (
													[contact_id] => 31
													[data] => booking_id^31~booking_resource^Apartment#1~status^Pending~check_in^2020-06-10 00:00:00~check_out^2020-06-12 00:00:00~dates^2020-06-10 00:00:00 , 2020-06-12 00:00:00~modification_date^2020-05-06 12:04:56~cost^100.00~pay_status^158876669721.9~name^Jo 99~secondname^Smith~email^smith@server.com~phone^738759384~visitors^1~children^~details^test  booking~term_and_condition^I Accept term and conditions~address^Baker street~city^London~postcode^89~country^GB~coupon^coup~user^r00t~selected_short_timedates_hint^10/06/2020, 12/06/2020~cost_hint^$100.00~trash^~remark^
													[note] =>
													[source] => xls
													[create_date] => 2020-05-10 08:06:01
													[edit_date] => 2020-05-10 11:06:01
												), ...
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

if(0) {
	// Search  for : 1%,75~date_:														      1    %  ,75~date  _
	// SELECT *  FROM wp_o_er_contacts  as contacts WHERE ( 1 = 1 ) AND  ( contacts.data LIKE '{xxx}1\\{xxx},75~date\\_{xxx}' )  ORDER BY contact_id DESC  LIMIT 0, 100


	//SELECT book_name, INSTR(book_name,'an') FROM book_mast WHERE INSTR(book_name,'an')>0;
	// LOCATE( '_date^', data ) as date_start_num, LOCATE( '~', data, LOCATE( '_date^', data ) ) as date_end_num

	// SLOW DOWN :(

	//	$sql_prepared .= "CREATE OR REPLACE VIEW real_date AS
	//					  SELECT contact_id  as real_date_id,
	//							 CONVERT(
	//									SUBSTR( data
	//											, (  LOCATE( '_date^', data ) + 6 )
	//											, (  LOCATE( '~', data, LOCATE( '_date^', data ) ) - LOCATE( '_date^', data )  - 6 )
	//									)
	//									, DATE
	//							 ) as real_date
	//					 FROM wp_o_er_contacts;";
	//	$wpdb->query( $sql_prepared );

	//	$sql_prepared = "SELECT *
	//	 			 FROM wp_o_er_contacts  as contacts
	//	 			 RIGHT JOIN real_date
	//	 			 ON contacts.contact_id = real_date.real_date_id
	//	 			 WHERE ( 1 = 1 )
	//	 			 ORDER BY contacts.contact_id;";
}

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
								                    [contacts_id] => 14
						                            [last_check_contact_id] => 0
						                            [status] =>
						                            [last_run_date] =>
						                            [contact] => a:2:{s:14:"email_template";s:9:"super_new";s:10:"conditions";a:2:{i:0;a:3:{s:2:"if";s:17:"__system__|source";s:4:"sign";s:5:">=";s:5:"value";s:17:"1"0'0\0";}i:1;a:3:{s:2:"if";s:17:"__default__|_date";s:4:"sign";s:1:"=";s:5:"value";s:5:"TODAY";}}}
						                            [ru_create_date] => 2020-01-25 10:36:55
						                            [ru_edit_date] => 2020-01-25 12:36:55
							                ), ...
		 *
		 * @return array        - array (
								            [11726] => Array (
																[contacts_id] => 14
											                    [last_check_contact_id] => 0
											                    [status] =>
											                    [last_run_date] =>
											                    [contact] => Array (
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

					if ('data' == $field_key ) {

						$parsed_field_data = $this->parse_fields_data( $field_value );        // Parse contact data and get array from saved string

						// Parsed ['data'] can ovveride some fields,  like 'contact_id'
						$item_arr = array_merge (  $item_arr, $parsed_field_data  );

					} else {
						$item_arr[ $field_key ] = $field_value;
					}
				}
				$data_arr[ /*$item_arr['contact_id']*/ ] = $item_arr;
			}

			return $data_arr;
		}


			/**
			 * Parse contact "data field" and get array from saved string
			 *
			 * @param string $data  - "id^2~booking_type^Standard~status^Approved~dates^2019-09-18 00:00:00 - 2019-09-20 00:00:00 , 2019-09-18 00:00:00 (Standard-1)  - 2019-09-20 00:00:00 (Standard-1)~modification_date^2019-09-05 10:50:04~cost^100.00~pay_status^156766972609.7~selected_short_timedates_hint^09/18/2019 - 09/20/2019~nights_number_hint^2~cost_hint^$75.00~name^John test~secondname^Smith~email^user@beta.com~phone^~visitors^4~children^~details^~term_and_condition^~user^Support A~oper_other_action^~rangetime^~other_email^~visitorsselector^~visitors_fee^~visitors_fee_hint^~trash^~remark^Approved by:John Smith (user@beta.com) [2019-09-11 09:30] Declined by:John Smith (user@beta.com) [2019-09-11 09:30]"
			 * @param array  $attr  - array( 'r_separator' => '~', 'f_separator' => '^' )
			 *
			 * @return array        - Array (
												[id] => 2
												[booking_type] => Standard
												[status] => Approved
												... )
			 */
			public function parse_fields_data( $data , $attr = array() ){

				$defaults = array(
									'r_separator'     => self::$data_separator['r_separator']
								  , 'f_separator'     => self::$data_separator['f_separator']
							);
				$attr   = wp_parse_args( $attr, $defaults );

				$data_arr = array();

				if ( ! empty( $data ) ) {

					$data = explode( $attr['r_separator'] ,  $data );                   // ~
					/**  Array (
									[0] => id^2
									[1] => booking_type^Standard
									[2] => status^Approved
									[3] => dates^2019-09-18 00:00:00 - 2019-09-20 00:00:00 , 2019-09-18 00:00:00 (Standard-1)  - 2019-09-20 00:00:00 (Standard-1)
									[4] => modification_date^2019-09-05 10:50:04
									[5] => cost^100.00
									[6] => pay_status^156766972609.7
									[7] => selected_short_timedates_hint^09/18/2019 - 09/20/2019
									[8] => nights_number_hint^2
									[9] => cost_hint^$75.00
									[10] => name^John test
									[11] => secondname^Smith
									[12] => email^user@beta.com
									[13] => phone^
									[14] => visitors^4
									[15] => children^
									[16] => details^
									[17] => term_and_condition^
									[18] => user^Support A
									[19] => oper_other_action^
									[20] => rangetime^
									[21] => other_email^
									[22] => visitorsselector^
									[23] => visitors_fee^
									[24] => visitors_fee_hint^
									[25] => trash^
									[26] => remark^Approved by:John Smith (user@beta.com) [2019-09-11 09:30] Declined by:John Smith (user@beta.com) [2019-09-11 09:30]
						 )
					 */

					foreach ( $data as $data_rows ) {

						$data_rows = explode( $attr['f_separator'] ,  $data_rows );     // ^
						/**  Array (
								[0] => id
								[1] => 2
							)
						 */


						if ( in_array( $data_rows[0], array( 'contact_id', 'source', 'create_date', 'edit_date', 'status'
						 									, 'status', 'run_date', 'advanced', 'action', 'email_template', 'contact_id', 'rules_id', 're_create_date', 're_edit_date'
						 									) ) ) {
							$data_rows[0] .= '_data';
						}
						$data_arr[ $data_rows[0] ] = $data_rows[1];
					}
				}
				/**  Array (
						[id] => 2
						[booking_type] => Standard
						[status] => Approved
						[dates] => 2019-09-18 00:00:00 - 2019-09-20 00:00:00 , 2019-09-18 00:00:00 (Standard-1)  - 2019-09-20 00:00:00 (Standard-1)
						[modification_date] => 2019-09-05 10:50:04
						[cost] => 100.00
						[pay_status] => 156766972609.7
						[selected_short_timedates_hint] => 09/18/2019 - 09/20/2019
						[nights_number_hint] => 2
						[cost_hint] => $75.00
						[name] => John test
						[secondname] => Smith
						[email] => user@beta.com
						[phone] =>
						[visitors] => 4
						[children] =>
						[details] =>
						[term_and_condition] =>
						[user] => Support A
						[oper_other_action] =>
						[rangetime] =>
						[other_email] =>
						[visitorsselector] =>
						[visitors_fee] =>
						[visitors_fee_hint] =>
						[trash] =>
						[remark] => Approved by:John Smith (user@beta.com) [2019-09-11 09:30] Declined by:John Smith (user@beta.com) [2019-09-11 09:30]
					)
				 */
				return $data_arr;
			}


	// </editor-fold>

}


/**
 * Just for loading CSS and  JavaScript files
 */
if ( true ) {
	$contacts_loading = new OPER_Contacts;
	$contacts_loading->init_load_css_js_tpl();
	$contacts_loading->init_ajax();
}




////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// API Hooks
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * Search specific contact(s) by Keyword
 *
 * @param string   	$keyword								'email@serv.com'
 * @param array 	$search_params		default array()		 array( 'source' => 'csv' )
 *
 * @return array(
				[data_arr] => Array (
									[0] => Array(
											[contact_id] => 2772
											[product_name] => Personal
											[date_placed] => 2019-10-16
											[order] => XXA3443ASDDA-232423-423423
											[email] => email@serv.com
											[_license_key] => 74826576578436
											[full_product_name] => Personal (single site)
											 ....
										)
					)
				[count] => 1
 *              
 */
 function oper_search_contact_by_keyword( $keyword , $search_params = array() ){

	 $contacts_listing = new OPER_Contacts;

	 $request_params = array(
		 'page_num'         => 1,
		 'page_items_count' => 99999,
		 'sort'             => 'contact_id',
		 'sort_type'        => 'DESC',
		 'keyword'          => '',
		 'source'           => '',
		 'create_date'      => ''
	 );

	 $request_params = wp_parse_args( $search_params, $request_params );

	 $request_params['keyword'] = oper_clean_string_for_form( $keyword );

	 $contacts_arr = $contacts_listing->list__get_data_arr( $request_params );

	 return $contacts_arr;
 }
 add_filter( 'oper_search_contact_by_keyword' , 'oper_search_contact_by_keyword' ,10, 2 );

/**
 * DevApi:   apply_filters( 'oper_search_contact_by_keyword',  ' d1ca3d0b476c ', array( 'source' => 'csv' )  );
 */

