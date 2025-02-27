<?php /**
 * @version 1.0
 * @description Help Wizard Class
 * @category Show Help wizard steps about the initial  configuration
 * @author wpdevelop
 *
 * @web-site http://oplugins.com/
 * @email info@oplugins.com
 *
 * @modified 2020-05-20
 */

if ( ! defined( 'ABSPATH' ) ) exit;                                             // Exit if accessed directly

/** Showing our system notices in admin panel */
class OPER_Help_Wizard {

	// <editor-fold     defaultstate="collapsed"                        desc=" ///  JS | CSS files | Tpl loading  /// "  >

		// JS | CSS  ===================================================================================================

		/**
		 * Define HOOKs for loading CSS and  JavaScript files
		 */
		public function init_load_css_js() {
			// JS & CSS

			// Load only  at  Contacts Settings Page
			//if  ( strpos( $_SERVER['REQUEST_URI'], 'page=oper-contacts' ) !== false ) {
			if ( is_admin() ) {
				add_action( 'oper_enqueue_js_files', array( $this, 'js_load_files' ), 50 );
				add_action( 'oper_enqueue_css_files', array( $this, 'enqueue_css_files' ), 50 );

				add_action( 'oper_hook_settings_page_footer', array( $this, 'hook__page_footer_tmpl' ) );
				add_action( 'oper_settings_after_header', array( $this, 'show_wizard' ), 20, 3 );                   	// Its where usually defined Notices Section and show some static messages...
			}
		}

		/** JSS */
		public function js_load_files( $where_to_load ) {

			$in_footer = true;

			if ( ( is_admin() ) && ( in_array( $where_to_load, array( 'admin', 'both' ) ) ) ) {

				wp_enqueue_script( 'oper-help_wizard', trailingslashit( plugins_url( '', __FILE__ ) ) . 'help_wizard.js'         /* oper_plugin_url( '/_out/js/codemirror.js' ) */
					, array( 'oper-global-vars' ), '1.1', $in_footer );

				/**
				 * wp_enqueue_script( 'oper-help_wizard', oper_plugin_url( '/_out/js/help_wizard.js' ), array( 'oper-global-vars' ), '1.1', $in_footer );
				 */
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

				//wp_enqueue_style( 'oper-help_wizard', oper_plugin_url( '/includes/listing_contacts/o-contacts-listing.css' ), array(), OPER_VERSION_NUM );
				wp_enqueue_style( 'oper-help_wizard', trailingslashit( plugins_url( '', __FILE__ ) ) . 'help_wizard.css', array(), OPER_VERSION_NUM );
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

			//if ( 'oper-contacts'  === $page ) {
			if ( is_admin() ) {
				$this->template_nav_bar();
				$this->template_sub_nav_bar();
				$this->template__welcome();
				$this->template__contacts();
					$this->template__contacts_create();
					$this->template__contacts_csv();
					$this->template__contacts_wpbc();
				$this->template__rules();
					$this->template__rules_create();
					$this->template__rules_run();
					$this->template__rules_shortcode();
				$this->template__reminders();
					$this->template__reminders_create();
					$this->template__reminders_send();
					$this->template__reminders_shortcode();
			}
		}


		private function template_nav_bar(){

			?><script type="text/html" id="tmpl-oper_help_wizard_nav_bar">
				<h3><?php

				?><a class="oper_wizard_nav_bar_link {{{ ( 'welcome' == data.step ) ? 'nav_bar_link_active' : '' }}}"
					onclick="javascript:oper_help_wiz_request( 'welcome' );" href="javascript:void(0)"
				> <span><?php _e( 'Help', 'email-reminders' ); ?></span></a>  &gt; <?php

				?><a class="oper_wizard_nav_bar_link {{{ ( 'contacts' == data.step ) ? 'nav_bar_link_active' : '' }}}"
					onclick="javascript:oper_help_wiz_request( 'contacts|' );" href="javascript:void(0)"
				>1. <span><?php _e( 'Contacts', 'email-reminders' ); ?></span></a>  &gt; <?php

				?><a class="oper_wizard_nav_bar_link {{{ ( 'rules' == data.step ) ? 'nav_bar_link_active' : '' }}}"
					onclick="javascript:oper_help_wiz_request( 'rules|' );" href="javascript:void(0)"
				>2. <span><?php _e( 'Rules', 'email-reminders' ); ?></span></a>  &gt; <?php

				?><a class="oper_wizard_nav_bar_link {{{ ( 'reminders' == data.step ) ? 'nav_bar_link_active' : '' }}}"
					onclick="javascript:oper_help_wiz_request( 'reminders|' );" href="javascript:void(0)"
				>3. <span><?php _e( 'Reminders', 'email-reminders' ); ?></span></a><?php

				?></h3>
			</script><?php
		}

			private function template_sub_nav_bar(){

				?><script type="text/html" id="tmpl-oper_help_wizard_sub_nav_bar">
					<div class="oper-top_sub_hint_lines_content">
						<# if ( 'contacts' == data.step ) { #>
						<?php
						?><a class="oper_wizard_nav_bar_link {{{ ( 'create' == data.sub_step ) ? 'nav_bar_link_active' : '' }}}"
							onclick="javascript:oper_help_wiz_request( 'contacts|create' );" href="javascript:void(0)"
						> <span><?php _e( 'Add new contacts manually', 'email-reminders' ); ?></span></a> | <?php

						?><a class="oper_wizard_nav_bar_link {{{ ( 'csv' == data.sub_step ) ? 'nav_bar_link_active' : '' }}}"
							onclick="javascript:oper_help_wiz_request( 'contacts|csv' );" href="javascript:void(0)"
						><span><?php _e( 'Import contacts from CSV', 'email-reminders' ); ?></span></a> | <?php

						?><a class="oper_wizard_nav_bar_link {{{ ( 'wpbc' == data.sub_step ) ? 'nav_bar_link_active' : '' }}}"
							onclick="javascript:oper_help_wiz_request( 'contacts|wpbc' );" href="javascript:void(0)"
						><span><?php _e( 'Import contacts from Booking Calendar', 'email-reminders' ); ?></span></a><?php
						?>
						<# } #>
						<# if ( 'rules' == data.step ) { #>
						<?php
						?><a class="oper_wizard_nav_bar_link {{{ ( 'create' == data.sub_step ) ? 'nav_bar_link_active' : '' }}}"
							onclick="javascript:oper_help_wiz_request( 'rules|create' );" href="javascript:void(0)"
						> <span><?php _e( 'Add new rule', 'email-reminders' ); ?></span></a> | <?php

						?><a class="oper_wizard_nav_bar_link {{{ ( 'run' == data.sub_step ) ? 'nav_bar_link_active' : '' }}}"
							onclick="javascript:oper_help_wiz_request( 'rules|run' );" href="javascript:void(0)"
						><span><?php _e( 'Run rule manually', 'email-reminders' ); ?></span></a> | <?php

						?><a class="oper_wizard_nav_bar_link {{{ ( 'shortcode' == data.sub_step ) ? 'nav_bar_link_active' : '' }}}"
							onclick="javascript:oper_help_wiz_request( 'rules|shortcode' );" href="javascript:void(0)"
						><span><?php _e( 'Run rule automatically', 'email-reminders' ); ?></span></a><?php
						?>
						<# } #>
						<# if ( 'reminders' == data.step ) { #>
						<?php
						?><a class="oper_wizard_nav_bar_link {{{ ( 'create' == data.sub_step ) ? 'nav_bar_link_active' : '' }}}"
							onclick="javascript:oper_help_wiz_request( 'reminders|create' );" href="javascript:void(0)"
						> <span><?php _e( 'Reminders creation', 'email-reminders' ); ?></span></a> | <?php

						?><a class="oper_wizard_nav_bar_link {{{ ( 'send' == data.sub_step ) ? 'nav_bar_link_active' : '' }}}"
							onclick="javascript:oper_help_wiz_request( 'reminders|send' );" href="javascript:void(0)"
						><span><?php _e( 'Send reminder manually', 'email-reminders' ); ?></span></a> | <?php

						?><a class="oper_wizard_nav_bar_link {{{ ( 'shortcode' == data.sub_step ) ? 'nav_bar_link_active' : '' }}}"
							onclick="javascript:oper_help_wiz_request( 'reminders|shortcode' );" href="javascript:void(0)"
						><span><?php _e( 'Send reminders automatically', 'email-reminders' ); ?></span></a><?php
						?>
						<# } #>
					</div>
				</script><?php
			}

		private function template__welcome() {

			?><script type="text/html" id="tmpl-oper_help_wizard_welcome">
				<h2><?php _e('Welcome to Email Reminders plugin!', 'email-reminders'); ?></h2>
				<div class="oper-welcome-panel-column-container">
					<span>
						<p>
						<?php
							echo  sprintf( __( 'Reminders it\'s ready to send emails, that was created based on %sRule(s)%s from specific %sContact(s)%s.', 'email-reminders' )
													, '<strong><a href="' . esc_url( oper_get_rules_url() ) . '">', '</a></strong>'
													, '<strong><a href="' . esc_url( oper_get_contacts_url() ) . '">', '</a></strong>'	);
						?>
						</p>
						<p>
						<?php
							echo sprintf( __( 'It\'s can be emails that are sending before or after specific time to the event from %sContact%s data. Like %sfollow-up emails%s or %sfriendly reminders%s about upcoming event.', 'email-reminders' )
											, '<strong>', '</strong>'
											, '<strong>', '</strong>'
											, '<strong>', '</strong>' );
						?>
						</p>
					</span>
				</div>
				<p class="oper-about-description">
				<hr/>
				<span class="oper-text-before-button"><?php _e( 'We&#8217;ve prepared some steps for initial configuration of plugin:', 'email-reminders'); ?></span>
				<a href="javascript:void(0)" class="button button-primary"
					onclick="javascript:oper_help_wiz_request( 'contacts|' );"
				><strong><?php _e('Get Starting','email-reminders'); ?>
					&nbsp;&nbsp;<span class="wpdevelop"><i class="glyphicon glyphicon-chevron-right"></i></span>
					</strong></a>

				</p>
			</script><?php
		}

		private function template__contacts() {

			?><script type="text/html" id="tmpl-oper_help_wizard_contacts">
				<?php echo '<h2 style="margin:0;">' . __( 'Contacts', 'email-reminders' ) . '</h2>';  ?>
				<p class="oper-about-description">
				<?php
				$field_options = array();
				$field_options[] = '<p>' . sprintf( __( 'The term %scontact%s refers to the order of your product or service. It must contain all contact details and information about purchased product or service.', 'email-reminders' ), '<strong>', '</strong>' ) . '</p>';
				$field_options[] = '<p>' . sprintf( __( 'At %scontacts page%s lists all your contacts. You can easily search for specific contacts by keyword, edit contact details or delete contacts.', 'email-reminders' )
										   , '<strong><a href="' . esc_url( oper_get_contacts_url() ) . '">', '</a></strong>'
									) . '</p>';
//				$field_options[] = '<p>' . sprintf( __( 'Contact fields depend on how a particular contact was added. If you add a contact manually, the system uses fields from %scontact form%s configuration. When importing contacts from a CSV file, the system uses columns as separate fields. And during importing from the %sBooking Calendar%s plugin, the system uses the structure of booking fields from that plugin.', 'email-reminders' )
//										   , '<strong><a href="' . esc_url( oper_get_settings_url() ) . '&tab=contact-form">', '</a></strong>'
//										   , '<strong><a href="https://wordpress.org/plugins/booking/">', '</a></strong>'
//									) . '</p>';

				$field_options[] = '<p>' . sprintf( __( 'Contact fields structure depend on how a particular contact was added:', 'email-reminders' )
										   , '<strong><a href="' . esc_url( oper_get_settings_url() ) . '&tab=contact-form">', '</a></strong>'
										   , '<strong><a href="https://wordpress.org/plugins/booking/">', '</a></strong>'
									);
						$field_options[] = '<br/> - ' . sprintf( __( 'if you add a contact manually, the system uses fields from %scontact form%s configuration', 'email-reminders' )
												   , '<strong><a href="' . esc_url( oper_get_settings_url() ) . '&tab=contact-form">', '</a></strong>'
											) ;
						$field_options[] = '<br/> - ' . sprintf( __( 'when importing contacts from a CSV file, the system uses columns as separate fields', 'email-reminders' )

											) ;
						$field_options[] = '<br/> - ' . sprintf( __( 'and during importing from the %sBooking Calendar%s plugin, the system uses the structure of booking fields from that plugin', 'email-reminders' )
												   , '<strong><a href="https://wordpress.org/plugins/booking/">', '</a></strong>'

											) . '</p>';


				$field_options[] = '<p>' . sprintf( __( 'You can define specific contact fields as labels, which will be displayed separately with a specific color in the labels column on the %scontacts page%s. Labels can be defined as field names on the "Email Reminders > %sSettings General page%s" in the %scontacts section%s.', 'email-reminders' )
										   , '<strong><a href="' . esc_url( oper_get_contacts_url() ) . '">', '</a></strong>'
										   , '<strong><a href="' . esc_url( oper_get_settings_url() ) . '#oper_general_settings_contacts_metabox">', '</a></strong>'
										   , '<strong>', '</strong>'
									) . '</p>';
				$field_options[] = '<p>' . sprintf( __( '', 'email-reminders' ), '<strong>', '</strong>' ) . '</p>';
				foreach ( $field_options as $field_option) {
				    echo $field_option;
				}
				?>
				<hr/>
				<a href="javascript:void(0)" class="button button-primary"
					onclick="javascript:oper_help_wiz_request( 'welcome' );"
				><strong><span class="wpdevelop"><i class="glyphicon glyphicon-chevron-left"></i></span>&nbsp;&nbsp;
						<?php _e('Back','email-reminders'); ?>
					</strong></a>&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="javascript:void(0)" class="button button-primary"
					onclick="javascript:oper_help_wiz_request( 'contacts|create' );"
				><strong><?php _e('Next','email-reminders'); ?>
					&nbsp;&nbsp;<span class="wpdevelop"><i class="glyphicon glyphicon-chevron-right"></i></span>
					</strong></a>

				</p>
			</script><?php
		}

			private function template__contacts_create() {

				?><script type="text/html" id="tmpl-oper_help_wizard_contacts_create">
					<?php echo '<h2 style="margin:0;">' . __( 'How to add a contact manually?', 'email-reminders' ) . '</h2>';  ?>
					<p class="oper-about-description">
					<?php
					$field_options = array();
					$field_options[] = '<p>1. ' . sprintf( __( 'Configure the fields to add a new contact on Email Reminders > Settings > %sContact Form page%s.', 'email-reminders' )
														, '<strong><a href="' . esc_url( oper_get_settings_url() ) . '&tab=contact-form">', '</a></strong>'
										) . '</p>';;
					$field_options[] = '<p>2. ' . sprintf( __( 'Fill in contact details on Email Reminders > Contacts > %sAdd new page%s.', 'email-reminders' )
														, '<strong><a href="' . esc_url( oper_get_contacts_url()) . '&tab=contacts-add">', '</a></strong>'
														, '<strong>', '</strong>'
														) . '</p>';;
					$field_options[] = '<p>3. ' . sprintf( __( 'Click the "%sAdd New%s" button to create a new contact.', 'email-reminders' )
												, '<strong>', '</strong>'
												) . '</p>';;
					foreach ( $field_options as $field_option) {
						echo $field_option;
					}
					?>
					<hr/>
					<a href="javascript:void(0)" class="button button-primary"
						onclick="javascript:oper_help_wiz_request( 'contacts|' );"
					><strong><span class="wpdevelop"><i class="glyphicon glyphicon-chevron-left"></i></span>&nbsp;&nbsp;
							<?php _e('Back','email-reminders'); ?>
						</strong></a>&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="javascript:void(0)" class="button button-primary"
						onclick="javascript:oper_help_wiz_request( 'contacts|csv' );"
					><strong><?php _e('Next','email-reminders'); ?>
						&nbsp;&nbsp;<span class="wpdevelop"><i class="glyphicon glyphicon-chevron-right"></i></span>
						</strong></a>

					</p>
				</script><?php
			}

			private function template__contacts_csv() {

				?><script type="text/html" id="tmpl-oper_help_wizard_contacts_csv">
					<?php echo '<h2 style="margin:0;">' . __( 'How to import contacts from CSV file?', 'email-reminders' ) . '</h2>';  ?>
					<p class="oper-about-description">
					<?php
					$field_options = array();
					$field_options[] = '<p>1. ' . sprintf( __( 'Please enter a separator for the CSV file, usually it can be a %scomma (,)%s or a %ssemicolon (;)%s on Email Reminders > Contacts > %sImport CSV page%s.', 'email-reminders' )
												, '<strong>', '</strong>'
												, '<strong>', '</strong>'
												, '<strong><a href="' . esc_url( oper_get_contacts_url()) . '&tab=contacts-csv">', '</a></strong>'
										) . '</p>';
					$field_options[] = '<p>2. ' . sprintf( __( 'You can upload and select the CSV file (by clicking the %sUpload CSV file%s button), or simply copy / paste the contents of the CSV file into the text field on Email Reminders > Contacts > %sImport CSV page%s.', 'email-reminders' )
													, '<strong>', '</strong>'
												   , '<strong><a href="' . esc_url( oper_get_contacts_url()) . '&tab=contacts-csv">', '</a></strong>'
										) . '</p>';

					$field_options[] = '<p>3. ' . sprintf( __( 'Click the %sStart Import%s button to start the import process.', 'email-reminders' )
														, '<strong>', '</strong>'
														) . '</p>';;
															 // On the new screen, you can delete specific columns or rows in the CSV table. You can also change the column names - it will determine the name of the contact fields. Please use only standard characters for fields such as% s
					$field_options[] = '<p>4. ' . sprintf( __( 'On the new screen, you can delete specific columns or rows in the CSV table. You can also change the column names - it will determine the name of the contact fields. Please use only standard characters for fields such as %s.', 'email-reminders' )
												, '<code>A..Za..z0..9_</code>'
												) . '</p>';;
					$field_options[] = '<p>5. ' . sprintf( __( 'Click the %sSave to DB%s button for saving contacts.', 'email-reminders' )
												, '<strong>', '</strong>'
												) . '</p>';;
					foreach ( $field_options as $field_option) {
						echo $field_option;
					}
					?>
					<hr/>
					<a href="javascript:void(0)" class="button button-primary"
						onclick="javascript:oper_help_wiz_request( 'contacts|create' );"
					><strong><span class="wpdevelop"><i class="glyphicon glyphicon-chevron-left"></i></span>&nbsp;&nbsp;
							<?php _e('Back','email-reminders'); ?>
						</strong></a>&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="javascript:void(0)" class="button button-primary"
						onclick="javascript:oper_help_wiz_request( 'contacts|wpbc' );"
					><strong><?php _e('Next','email-reminders'); ?>
						&nbsp;&nbsp;<span class="wpdevelop"><i class="glyphicon glyphicon-chevron-right"></i></span>
						</strong></a>

					</p>
				</script><?php
			}

			private function template__contacts_wpbc() {

				?><script type="text/html" id="tmpl-oper_help_wizard_contacts_wpbc">
					<?php echo '<h2 style="margin:0;">' . __( 'How to import contacts from Booking Calendar plugin?', 'email-reminders' ) . '</h2>';  ?>
					<p class="oper-about-description">
					<?php
					$field_options = array();
					$field_options[] = '<p> ' . sprintf( __( 'Its possible to import all bookings from the %sBooking Calendar%s plugin.', 'email-reminders' )
												, '<strong><a href="https://wordpress.org/plugins/booking/" target="_blank">', '</a></strong>'
										)
										. '</p><p>'
										. sprintf( __( 'Please note that the bookings import is similar to importing CSV files. Because of this, you need to enter a separator for the CSV file, usually a %ssemicolon%s.', 'email-reminders' )
												, '<strong>(;) ', '</strong>'
										)
									   . '</p>';
					$field_options[] = '<p> ' . sprintf( __( '%sNote%s. For automatically import of new bookings, set checked option %sAuto import%s on Email Reminders > Contacts > %sBooking Calendar Import page%s.', 'email-reminders' )
												, '<strong>', '</strong>'
												, '<strong>', '</strong>'
												, '<strong>', '</strong>'
										)
									   . '</p><hr/>';

					$field_options[] = '<h3 style="font-size: 1.3em;font-weight: 400;"> ' . sprintf( __( 'Import all bookings from Booking Calendar plugin.', 'email-reminders' )
												, '<strong><a href="https://wordpress.org/plugins/booking/" target="_blank">', '</a></strong>'
												, '<strong>', '</strong>'
												, '<strong><a href="' . esc_url( oper_get_contacts_url()) . '&tab=contacts-csv">', '</a></strong>'
										) . '</h3>';
					$field_options[] = '<p>1. ' . sprintf( __( 'Click the %sStart Import%s button to start bookings importing on Email Reminders > Contacts > %sBooking Calendar Import page%s.', 'email-reminders' )
												, '<strong>', '</strong>'
												, '<strong>', '</strong>'
												, '<strong><a href="' . esc_url( oper_get_contacts_url()) . '&tab=contacts-csv">', '</a></strong>'
										) . '</p>';
					$field_options[] = '<p>2. ' . sprintf( __( 'On the new screen, you can delete specific columns or rows in the CSV table. You can also change the column names - it will determine the name of the contact fields. Please use only standard characters for fields such as %s.', 'email-reminders' )
												, '<code>A..Za..z0..9_</code>'
												) . '</p>';
					$field_options[] = '<p>3. ' . sprintf( __( 'Click the %sSave to DB%s button for saving contacts.', 'email-reminders' )
												, '<strong>', '</strong>'
												) . '</p>';

					foreach ( $field_options as $field_option) {
						echo $field_option;
					}
					?>
					<hr/>
					<a href="javascript:void(0)" class="button button-primary"
						onclick="javascript:oper_help_wiz_request( 'contacts|csv' );"
					><strong><span class="wpdevelop"><i class="glyphicon glyphicon-chevron-left"></i></span>&nbsp;&nbsp;
							<?php _e('Back','email-reminders'); ?>
						</strong></a>&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="javascript:void(0)" class="button button-primary"
						onclick="javascript:oper_help_wiz_request( 'rules|' );"
					><strong><?php _e('Next','email-reminders'); ?>
						&nbsp;&nbsp;<span class="wpdevelop"><i class="glyphicon glyphicon-chevron-right"></i></span>
						</strong></a>

					</p>
				</script><?php
			}

		private function template__rules() {

			?><script type="text/html" id="tmpl-oper_help_wizard_rules">
				<?php echo '<h2 style="margin:0;">' . __( 'Rules', 'email-reminders' ) . '</h2>';  ?>
				<p class="oper-about-description">
				<?php
				$field_options = array();
				$field_options[] = '<p>' . sprintf( __( 'The term %srules%s refers to the conditions for creating contact-based email reminders.', 'email-reminders' )
											, '<strong>', '</strong>' )
								   . '</p>';
				$field_options[] = '<p>' . sprintf( __( 'Why do we need rules at all? Such conditions give us great flexibility to create new email reminders depending on any fields in contacts, and not just on certain specific predefined fields.', 'email-reminders' )
										   , '<strong><a href="' . esc_url( oper_get_rules_url() ) . '">', '</a></strong>'
									) . '</p>';

				$field_options[] = '<p>' . sprintf( __( 'The %srules page%s lists all your rules. You can easily edit, delete or run certain rules.', 'email-reminders' )
										   , '<strong><a href="' . esc_url( oper_get_rules_url() ) . '">', '</a></strong>'
									) . '</p>';

				$field_options[] = '<p>'
								   			. sprintf( __( 'Typically, rules should be %srun once a day%s to create new email reminders, depending on the date(s) in contacts and current day.', 'email-reminders' )
										   		, '<strong>', '</strong>'
											) . '<br/>'
								   			. sprintf( __( 'Of course, this can be more often if the conditions depend on the time of day relative to the current day.', 'email-reminders' )
												, '<strong>', '</strong>'
											) . '<br/>'
								   			. sprintf( __( 'Or rarely, if the conditions are not dependent on dates and only on some other fields.', 'email-reminders' )
												, '<strong>', '</strong>'
											) . ' '
								   			. sprintf( __( 'In this case, the conditions may depend on how often new contacts are added to the system.', 'email-reminders' )
												, '<strong>', '</strong>'
											) . '<br/>'
								   . '</p>';



				foreach ( $field_options as $field_option) {
				    echo $field_option;
				}
				?>
				<hr/>
				<a href="javascript:void(0)" class="button button-primary"
					onclick="javascript:oper_help_wiz_request( 'contacts|' );"
				><strong><span class="wpdevelop"><i class="glyphicon glyphicon-chevron-left"></i></span>&nbsp;&nbsp;
						<?php _e('Back','email-reminders'); ?>
					</strong></a>&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="javascript:void(0)" class="button button-primary"
					onclick="javascript:oper_help_wiz_request( 'rules|create' );"
				><strong><?php _e('Next','email-reminders'); ?>
					&nbsp;&nbsp;<span class="wpdevelop"><i class="glyphicon glyphicon-chevron-right"></i></span>
					</strong></a>
				</p>
			</script><?php
		}

			private function template__rules_create() {

				?><script type="text/html" id="tmpl-oper_help_wizard_rules_create">
					<?php echo '<h2 style="margin:0;">' . __( 'How to add a rule?', 'email-reminders' ) . '</h2>';  ?>
					<p class="oper-about-description">
					<?php
					$field_options = array();
					$field_options[] = '<p>1. ' . sprintf( __( 'Click on %s"Add New Rule"%s button.', 'email-reminders' )
												, '<strong>', '</strong>'
										) . '</p>';
					$field_options[] = '<p>2. ' . sprintf( __( 'Select the email template you want to use as a email reminder for sending. You can create and customize email templates on the %semails settings%s page.', 'email-reminders' )
														, '<strong><a href="' . esc_url( oper_get_settings_url() ) . '&tab=email">', '</a></strong>'
														, '<strong>', '</strong>'
										) . '</p>';

					$field_options[] = '<p>3. '
									   . sprintf( __( 'Configure one or several conditions.', 'email-reminders' ) )
									   . '<div style="margin:0 2em;">'
											   . '<strong>' . __('Note','email-reminders') . '.</strong> '
											   . sprintf( __( 'If your condition is for a date field, then you can use a configuration that can be used in the %s function.', 'email-reminders' )
														, '<strong><a href="https://www.php.net/manual/en/datetime.formats.relative.php" target="_blank">strtotime</a></strong>'
									           )
									   		   . ' <br/><strong>' . __( 'For example', 'email-reminders' ) . ':</strong> '
									   		   . '<div style="margin:0 7em;">'
												   . sprintf( __( '%sReminder%s. 1 day before the event', 'email-reminders' ) , '<strong>', '</strong>' ) . ': <code>TODAY + 1 DAY</code>'
					                   			   . ' <br/>' . sprintf( __( '%sFollow-up email%s. 7 days after the event', 'email-reminders' ), '<strong>', '</strong>' ) . ': <code>TODAY - 7 DAYS</code>'
									   			   . ' <br/>' . sprintf( __( 'After 1.5 months', 'email-reminders' ), '<strong>', '</strong>' ) . ': <code>TODAY - 1 MONTH - 15 DAYS</code>'
									   		   . '</div>'
									   . '</div>'
									   . '</p>';
					$field_options[] = '<p>4. ' . sprintf( __( 'Click on Create Rule button.', 'email-reminders' )
										) . '</p>';

					$field_options[] = '<p><hr><strong style="font-size: 1.1em;font-weight: 400;"> ' . sprintf( __( 'What does the “starting with contact id” field mean?', 'email-reminders' )
										) . '</strong><br/>'
									   . ' ' . sprintf( __( 'This field indicates the contact ID from which the rule will be executed.', 'email-reminders' ) )
									   . ' ' . sprintf( __( 'This is useful for situations where you have thousands of contacts and you only need to handle the latest and not all together.', 'email-reminders' )  )
									   . ' ' . sprintf( __( 'Please note that the system runs the rule with iterations by 1000 contacts per iteration to distribute the load on the server. And this field is updated automatically after each run.', 'email-reminders' )  )
									   . ' ' . sprintf( __( 'This is also useful in situations where the execution was interrupted for some reason, and the next time you start with the last processed contact lists.', 'email-reminders' )  )
							   . '</p>';


					foreach ( $field_options as $field_option) {
						echo $field_option;
					}
					?>
					<hr/>
					<a href="javascript:void(0)" class="button button-primary"
						onclick="javascript:oper_help_wiz_request( 'rules|' );"
					><strong><span class="wpdevelop"><i class="glyphicon glyphicon-chevron-left"></i></span>&nbsp;&nbsp;
							<?php _e('Back','email-reminders'); ?>
						</strong></a>&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="javascript:void(0)" class="button button-primary"
						onclick="javascript:oper_help_wiz_request( 'rules|run' );"
					><strong><?php _e('Next','email-reminders'); ?>
						&nbsp;&nbsp;<span class="wpdevelop"><i class="glyphicon glyphicon-chevron-right"></i></span>
						</strong></a>

					</p>
				</script><?php
			}

			private function template__rules_run() {

				?><script type="text/html" id="tmpl-oper_help_wizard_rules_run">
					<?php echo '<h2 style="margin:0;">' . __( 'How to run rule manually?', 'email-reminders' ) . '</h2>';  ?>
					<p class="oper-about-description"><?php
					$field_options = array();
					$field_options[] = '<p>1. ' . sprintf( __( 'Click on %s"Run"%s button to execute specific rule.', 'email-reminders' )
												, '<strong>', '</strong>'
										) . '</p>';
					$field_options[] = '<p>2. ' . sprintf( __( 'System will run rule and create %semail reminders%s from %scontacts%s based on conditions of current rule.', 'email-reminders' )
												, '<strong><a href="' . esc_url( oper_get_reminders_url() ) . '">', '</a></strong>'
												, '<strong><a href="' . esc_url( oper_get_contacts_url() ) . '">', '</a></strong>'
												, '<strong>', '</strong>'
										) . '</p>';

					$field_options[] = '<h2 style="margin:0;">' . __( 'How all this work?', 'email-reminders' ) . '</h2>';
					$field_options[] = '<p> '   . sprintf( __( 'When you click the run button, the system starts processing contacts from the last time checked contact ID.', 'email-reminders' ) ) . '';
					$field_options[] = '<br/> ' . sprintf( __( 'In case you need to start processing from the beginning of contacts, you can click the Reset button (at right side near specific rule), or edit this rule and set "Rule run starting with contact id" to certain value.', 'email-reminders' ) ) . '';
					$field_options[] = '<br/> ' . sprintf( __( 'The system process of 1000 contacts per iteration, which you can see on the log screen on the Rules page.', 'email-reminders' ) ) . '</p>';

					$field_options[] = '<p> ' . sprintf( __( 'Each rule can have several statuses:', 'email-reminders' ) )
												. '<div style="margin:-1em 2em 0;">'
													. '      ' . sprintf( __( '%sNot Started%s - when the rule starts from the beginning of contacts.', 'email-reminders' ) , '<strong>', '</strong>' ) . ''
													. ' <br/>' . sprintf( __( '%sIn Process%s - the rule was executed early, but all existing contacts have not yet been processed.', 'email-reminders' ) , '<strong>', '</strong>' ) . ''
													. ' <br/>' . sprintf( __( '%sFinished%s - the rule was processed all exist contacts.', 'email-reminders' ) , '<strong>', '</strong>' ) . ''
												. '</div>'
									. '</p>';

					foreach ( $field_options as $field_option) {
						echo $field_option;
					}
					?><hr/><a href="javascript:void(0)" class="button button-primary"
						onclick="javascript:oper_help_wiz_request( 'rules|create' );"
					><strong><span class="wpdevelop"><i class="glyphicon glyphicon-chevron-left"></i></span>&nbsp;&nbsp;
							<?php _e('Back','email-reminders'); ?>
						</strong></a>&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="javascript:void(0)" class="button button-primary"
						onclick="javascript:oper_help_wiz_request( 'rules|shortcode' );"
					><strong><?php _e('Next','email-reminders'); ?>
						&nbsp;&nbsp;<span class="wpdevelop"><i class="glyphicon glyphicon-chevron-right"></i></span>
						</strong></a>
					</p>
				</script><?php
			}

			private function template__rules_shortcode() {

				?><script type="text/html" id="tmpl-oper_help_wizard_rules_shortcode">
					<?php echo '<h2 style="margin:0;">' . __( 'How to set up run rule automatically to create reminders?', 'email-reminders' ) . '</h2>';  ?>
					<p class="oper-about-description">
					<?php
					$field_options = array();
					$field_options[] = '<p>1. ' . sprintf( __( 'Insert the %sshortcode%s into the page to create reminders for the specific rule.', 'email-reminders' )
												, '<strong><a href="https://oplugins.com/faq/email-reminders-how-to-set-up-run-rule-automatically-to-create-reminders/">', '</a></strong>'
										) . '</p>';
					$field_options[] = '<p>2. ' . sprintf( __( 'When someone visits this page, the shortcode starts run rule and reminders are created.', 'email-reminders' )
												, '<strong>', '</strong>'
										) . '</p>';
					$field_options[] = '<h2 style="margin: 1.5em 0 0;">' . __( 'Shortcode configuration', 'email-reminders' ) . ':</h2>';
					$field_options[] = '<p><code> '   . '[email-reminders-rule id=4 max_count=1500 is_silent=1]' . '</code></p>';
					$field_options[] = '<div style="margin:0 7em;">';
					$field_options[] = '<p><strong>id</strong> <code style="font-size: 0.7em;">[ integer ]</code>  - '
									   						. sprintf( __( 'rule ID to execute.', 'email-reminders' ) ) . '</p>';
					$field_options[] = '<p><strong>max_count</strong> <code style="font-size: 0.7em;">[ integer ]</code>  - '
									   						. sprintf( __( 'the maximum number of contacts to process during shortcode execution that match the rule condition, starting from the last processed contact ID.', 'email-reminders' ) ) . '</p>';
					$field_options[] = '<p><strong>is_silent</strong> <code style="font-size: 0.7em;">[ 1 | 0 ]</code>  - '
									   . sprintf( __( 'show or hide text after running shortcode on page.', 'email-reminders' ) ) . '</p>';
					$field_options[] = '</div>';

					foreach ( $field_options as $field_option) {
						echo $field_option;
					}
					?>
					<hr/>
					<a href="javascript:void(0)" class="button button-primary"
						onclick="javascript:oper_help_wiz_request( 'rules|run' );"
					><strong><span class="wpdevelop"><i class="glyphicon glyphicon-chevron-left"></i></span>&nbsp;&nbsp;
							<?php _e('Back','email-reminders'); ?>
						</strong></a>&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="javascript:void(0)" class="button button-primary"
						onclick="javascript:oper_help_wiz_request( 'reminders|' );"
					><strong><?php _e('Next','email-reminders'); ?>
						&nbsp;&nbsp;<span class="wpdevelop"><i class="glyphicon glyphicon-chevron-right"></i></span>
						</strong></a>

					</p>
				</script><?php
			}

		private function template__reminders() {

			?><script type="text/html" id="tmpl-oper_help_wizard_reminders">
			<?php echo '<h2 style="margin:0;">' . __( 'Reminders', 'email-reminders' ) . '</h2>';  ?>
				<p class="oper-about-description">
				<?php
				$field_options = array();

				$field_options[] = '<p>' . sprintf( __( 'Reminders it\'s ready to send emails, that was created based on %sRule(s)%s from specific %sContact(s)%s.', 'email-reminders' )
													, '<strong><a href="' . esc_url( oper_get_rules_url() ) . '">', '</a></strong>'
													, '<strong><a href="' . esc_url( oper_get_contacts_url() ) . '">', '</a></strong>'	)
								   . '';
				$field_options[] = ' ' . sprintf( __( 'It\'s can be emails that are sending before or after specific time to the event from %sContact%s data. Like %sfollow-up emails%s or %sfriendly reminders%s about upcoming event.', 'email-reminders' )
										   		, '<strong>', '</strong>'
										   		, '<strong>', '</strong>'
										   		, '<strong>', '</strong>'
									) . '</p>';

				$field_options[] = '<h2 style="margin:0;">' . __( 'How does it all work?', 'email-reminders' ) . '</h2>';

				$field_options[] = '<p>'
								   			. sprintf( __( 'The %sreminders page%s lists all your reminders. You can easily send or delete certain reminder.', 'email-reminders' )
										   		, '<strong><a href="' . esc_url( oper_get_reminders_url() ) . '">', '</a></strong>'
											) . '<br/>'
								   			. sprintf( __( 'You can filter reminders to show only sent email reminders or emails reminders pending sending, or both.', 'email-reminders' )
										   		, '<strong>', '</strong>'
											) . '<br/>'
								   			. sprintf( __( 'Next to each email reminder, you can check the status of this reminder (sent or not sent), as well as the name of the email template that uses the specific email reminder.', 'email-reminders' )
												, '<strong>', '</strong>'
											) . '<br/><br/>'
								   			. sprintf( __( 'To be able to send a specific reminder, you need to determine the name of the email field from the contact data that is used to send emails. You can define it at the Settings page for the "Email field name" option.', 'email-reminders' )
												, '<strong>', '</strong>'
											) . ' '
								   			. sprintf( __( '', 'email-reminders' )
												, '<strong>', '</strong>'
											) . '<br/>'
								   . '</p>';

				foreach ( $field_options as $field_option) {
				    echo $field_option;
				}
				?>
				<hr/>
				<a href="javascript:void(0)" class="button button-primary"
					onclick="javascript:oper_help_wiz_request( 'rules|' );"
				><strong><span class="wpdevelop"><i class="glyphicon glyphicon-chevron-left"></i></span>&nbsp;&nbsp;
						<?php _e('Back','email-reminders'); ?>
					</strong></a>&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="javascript:void(0)" class="button button-primary"
					onclick="javascript:oper_help_wiz_request( 'reminders|create' );"
				><strong><?php _e('Next','email-reminders'); ?>
					&nbsp;&nbsp;<span class="wpdevelop"><i class="glyphicon glyphicon-chevron-right"></i></span>
					</strong></a>
				</p>
			</script><?php
		}

			private function template__reminders_create() {

				?><script type="text/html" id="tmpl-oper_help_wizard_reminders_create">
					<?php echo '<h2 style="margin:0;">' . __( 'How to create reminders manually?', 'email-reminders' ) . '</h2>';  ?>
					<p class="oper-about-description">
					<?php
					$field_options = array();


					$field_options[] = '<p>1. ' . sprintf( __( '%sCreate%s or %simport%s contact(s) at %scontacts menu page%s..', 'email-reminders' )
													, '<strong><a href="' . esc_url( oper_get_contacts_url() ) . '&tab=contacts-add">', '</a></strong>'
													, '<strong><a href="' . esc_url( oper_get_contacts_url() ) . '&tab=contacts-csv">', '</a></strong>'
													, '<strong><a href="' . esc_url( oper_get_contacts_url() ) . '">', '</a></strong>'
										) . '</p>';
					$field_options[] = '<p>2. ' . sprintf( __( 'Create %srule%s for creation new reminders at %srules menu page%s.', 'email-reminders' )
													, '<strong>', '</strong>'
													, '<strong><a href="' . esc_url( oper_get_rules_url() ) . '">', '</a></strong>'
										) . '</p>';

					$field_options[] = '<p>3. '
									   . sprintf( __( 'Execute rule - by  clicking on %s"Run"%s button near specific rule. After this you will have new reminders at current reminders menu page.', 'email-reminders' )
													, '<strong>', '</strong>'
									   ) . '</p>';
					$field_options[] = '<p>4. ' . sprintf( __( 'Now you can send one or multiple email reminders at current reminders menu page.', 'email-reminders' )
										) . '</p>';

					foreach ( $field_options as $field_option) {
						echo $field_option;
					}
					?>
					<hr/>
					<a href="javascript:void(0)" class="button button-primary"
						onclick="javascript:oper_help_wiz_request( 'reminders|' );"
					><strong><span class="wpdevelop"><i class="glyphicon glyphicon-chevron-left"></i></span>&nbsp;&nbsp;
							<?php _e('Back','email-reminders'); ?>
						</strong></a>&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="javascript:void(0)" class="button button-primary"
						onclick="javascript:oper_help_wiz_request( 'reminders|send' );"
					><strong><?php _e('Next','email-reminders'); ?>
						&nbsp;&nbsp;<span class="wpdevelop"><i class="glyphicon glyphicon-chevron-right"></i></span>
						</strong></a>

					</p>
				</script><?php
			}

			private function template__reminders_send() {

				?><script type="text/html" id="tmpl-oper_help_wizard_reminders_send">
					<?php echo '<h2 style="margin:0;">' . __( 'How to send reminder manually?', 'email-reminders' ) . '</h2>';  ?>
					<p class="oper-about-description"><?php
					$field_options = array();
					$field_options[] = '<p>- ' . sprintf( __( 'Click the %s"Send"%s button next to a specific reminder to send it on the %sreminders page%s.', 'email-reminders' )
												, '<strong>', '</strong>'
												, '<strong><a href="' . esc_url( oper_get_reminders_url() ) . '">', '</a></strong>'
										) . '</p>';
					$field_options[] = '<p>- ' . sprintf( __( 'Or %sselect several email reminders%s (by checking checkbox next to each specific reminder), and then click on %sSend button on the toolbar%s. It will send all selected reminders.', 'email-reminders' )
												, '<strong>', '</strong>'
												, '<strong>', '</strong>'
										) . '</p>';

					foreach ( $field_options as $field_option) {
						echo $field_option;
					}
					?><hr/><a href="javascript:void(0)" class="button button-primary"
						onclick="javascript:oper_help_wiz_request( 'reminders|create' );"
					><strong><span class="wpdevelop"><i class="glyphicon glyphicon-chevron-left"></i></span>&nbsp;&nbsp;
							<?php _e('Back','email-reminders'); ?>
						</strong></a>&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="javascript:void(0)" class="button button-primary"
						onclick="javascript:oper_help_wiz_request( 'reminders|shortcode' );"
					><strong><?php _e('Next','email-reminders'); ?>
						&nbsp;&nbsp;<span class="wpdevelop"><i class="glyphicon glyphicon-chevron-right"></i></span>
						</strong></a>
					</p>
				</script><?php
			}

			private function template__reminders_shortcode() {

				?><script type="text/html" id="tmpl-oper_help_wizard_reminders_shortcode">
					<?php echo '<h2 style="margin:0;">' . __( 'How to set up automatic sending of reminders?', 'email-reminders' ) . '</h2>';  ?>
					<p class="oper-about-description">
					<?php
					$field_options = array();
					$field_options[] = '<p>1. ' . sprintf( __( 'Insert the %sshortcode%s into the page to send email reminders.', 'email-reminders' )
												, '<strong><a href="https://oplugins.com/faq/email-reminders-how-to-set-up-automatic-sending-of-reminders/">', '</a></strong>'
										) . '</p>';
					$field_options[] = '<p>2. ' . sprintf( __( 'When someone visits this page, the shortcode will send email reminders.', 'email-reminders' )
												, '<strong>', '</strong>'
										) . '</p>';
					$field_options[] = '<h2 style="margin: 1.5em 0 0;">' . __( 'Shortcode configuration', 'email-reminders' ) . ':</h2>';
					$field_options[] = '<p><code> '   . '[email-reminders-send status=\'init\' max_count=20 keyword=\'United States|Canada|Mexico\']' . '</code></p>';
					$field_options[] = '<p><code> '   . '[email-reminders-send is_silent=1 max_count=30 not_keyword=\'United States|Canada|Mexico\']' . '</code></p>';
					$field_options[] = '<div style="margin:0 7em;">';
//								  'is_silent' 	=> false        // Is show any  text  in page,  after  shortcode execution
//								, 'status'      => 'init'       // 'init'   |   'sent'      <=  Status of Reminders
//								, 'max_count'   => 50           // Max number of reminders to  send, during execution  of shortcode
//								, 'start_num'   => 0            // Start from N reminders to  send - shift
//								, 'keyword'     => ''           //  ''      |   'United States'     |   'United States|Canada|Mexico'           <=  |   Work  as OR     - Find all  variants, like USA and Canada
//								, 'not_keyword' => ''           //  ''      |   'United States'     |   'United States|Canada|Mexico'           <=  |   Work  as AND    - Find variants,  that does not contain  USA and Canada

					$field_options[] = '<p><strong>is_silent</strong> <code style="font-size: 0.7em;">[ 1 | 0 ]</code>  - '
									   . sprintf( __( 'show or hide text after running shortcode on page.', 'email-reminders' ) ) . '</p>';
					$field_options[] = '<p><strong>status</strong> <code style="font-size: 0.7em;">[ string ]</code>  - '
									   						. sprintf( __( 'status of reminders: \'init\', \'sent\'; all reminders, if parameter skipped.', 'email-reminders' ) ) . '</p>';
					$field_options[] = '<p><strong>max_count</strong> <code style="font-size: 0.7em;">[ integer ]</code>  - '
									   						. sprintf( __( 'the maximum number of contacts to process during shortcode execution that match the rule condition, starting from the last processed contact ID.', 'email-reminders' ) ) . '</p>';
					$field_options[] = '<p><strong>start_num</strong> <code style="font-size: 0.7em;">[ integer ]</code>  - '
									   						. sprintf( __( 'start from N reminders to  send', 'email-reminders' ) ) . '</p>';
					$field_options[] = '<p><strong>keyword</strong> <code style="font-size: 0.7em;">[ string ]</code>  - '
									   						. sprintf( __( 'Find all  variants, like USA and Canada. For example: \'United States\'. You can use several  terms separated by | symbol,  which is work like OR : \'United States|Canada|Mexico|Brazil\'', 'email-reminders' ) ) . '</p>';
					$field_options[] = '<p><strong>not_keyword</strong> <code style="font-size: 0.7em;">[ string ]</code>  - '
									   						. sprintf( __( 'Find variants, that does not contain such keywords. Work opposite to keyword parameter', 'email-reminders' ) ) . '</p>';
					$field_options[] = '</div>';

					foreach ( $field_options as $field_option) {
						echo $field_option;
					}
					?>
					<hr/>
					<a href="javascript:void(0)" class="button button-primary"
						onclick="javascript:oper_help_wiz_request( 'reminders|send' );"
					><strong><span class="wpdevelop"><i class="glyphicon glyphicon-chevron-left"></i></span>&nbsp;&nbsp;
							<?php _e('Back','email-reminders'); ?>
						</strong></a>&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="javascript:void(0)" class="button button-primary oper_dismiss" style="float: none;font-size: 1em;padding: 0 10px !important;margin: 0;"
					><strong><?php _e('Start Using','email-reminders'); ?></strong></a>
					</p>
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
			add_action( 'wp_ajax_'		     . 'OPER_HELP_WIZ', array( $this, 'ajax_' . 'OPER_HELP_WIZ' ) );	    // Admin & Client (logged in usres)
			// add_action( 'wp_ajax_nopriv_' . 'OPER_CONTACTS_LISTING', array( $this, 'ajax_' . 'OPER_CONTACTS_LISTING' ) );	    // Client         (not logged in)
		}


		/**
		 * Ajax - Get Listing Data and Response to JS script
		 */
		public function ajax_OPER_HELP_WIZ() {

			if ( ! isset( $_POST['wizard_step'] ) || empty( $_POST['wizard_step'] ) ) { exit; }

			// Security  -----------------------------------------------------------------------------------------------    // in Ajax Post:   'nonce': oper_contacts_listing.get_secure_param( 'nonce' ),
			$action_name    = 'oper_help_wiz_ajx' . '_opernonce';
			$nonce_post_key = 'nonce';
			$result_check   = check_ajax_referer( $action_name, $nonce_post_key );

			// Clean  --------------------------------------------------------------------------------------------------
			$request_prefix = false;
			$request_params = oper_get_clean_or_default_request_params(
							array(
									'wizard_step' => array( 'validate' => 's', 'default' => 'welcome' )
							),
							$request_prefix
			);

			// Save ----------------------------------------------------------------------------------------------------
			update_oper_option( 'oper_help_wizard_step', $request_params['wizard_step'] );

			//----------------------------------------------------------------------------------------------------------
			// Send JSON. Its will make "wp_json_encode" - so pass only array, and This function call wp_die( '', '', array( 'response' => null, ) )		Pass JS OBJ: response_data in "jQuery.post( " function on success.
			wp_send_json( array(
								'ajx_step' => $request_params['wizard_step']
						) );
		}

	// </editor-fold>


	/**
	 * Show Wizard
	 *
	 * @param $page_tag                     Example: oper-settings
	 * @param $active_page_tab              Example: email
	 * @param $active_page_subtab           Example: eml-reminders
	 *
	 */
	public function show_wizard ( $page_tag, $active_page_tab, $active_page_subtab ){

		$notice_id = 'oper-panel-help-wizard';
		if ( ! oper_section_is_dismissed( $notice_id ) ) {

			?>
		    <script type="text/javascript">
				jQuery(document).ready(function(){
					// Set Nonce for Ajax
					oper_help_wiz.set_secure_param( 'nonce',   '<?php echo wp_create_nonce( 'oper_help_wiz_ajx' . '_opernonce' ) ?>' );
					oper_help_wiz.set_secure_param( 'user_id', '<?php echo get_current_user_id(); ?>' );
					oper_help_wiz.set_secure_param( 'locale',  '<?php echo get_user_locale(); ?>' );
				});
		    </script>
			<?php

			$step = get_oper_option( 'oper_help_wizard_step' );
			$step = ( empty( $step ) ) ? 'welcome' : $step;

			?>
		<div	id="<?php echo $notice_id ?>"
				class="oper-panel oper_is_dismissible oper_is_hideable "
				data-nonce="<?php echo wp_create_nonce( $nonce_name = $notice_id . '_opernonce' ); ?>"
				data-user-id="<?php echo get_current_user_id(); ?>"
				 >
			<div class="oper-welcome-panel">
				<?php
				oper_x_dismiss_button( '&times;', array( 'style' => 'font-size:1.4em;margin:-1px 0px 0 0;' ) );
				?>
				<div class="oper-top_hint_lines"></div>
				<div class="oper-top_sub_hint_lines"></div>
				<div class="oper-welcome-panel-content">
					<script type="text/javascript">
						jQuery(document).ready(function(){
							oper_help_wiz_show( '<?php echo $step ?>' );
						});
					</script>
				</div>
			</div>
		</div>
		<?php
		}
	}


}

/**
 * Just for loading CSS and  JavaScript files
 */
if ( true ) {
	$contacts_loading = new OPER_Help_Wizard;
	$contacts_loading->init_load_css_js();
	$contacts_loading->init_ajax();
}