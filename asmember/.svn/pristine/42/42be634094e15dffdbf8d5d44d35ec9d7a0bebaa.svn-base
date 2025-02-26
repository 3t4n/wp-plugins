<?php

class asmember_admin_options
{

	public function __construct()
	{
		add_action('admin_init',array($this,'asmember_options_page_output_register'));
	}
		
	function asmember_options_page_output_register()
	{
	
	
		register_setting('asmember_options_allgemein_group','asmember_options_allgemein');	
		add_settings_section('asmember_options_allgemein',__('Allgemein','asmember'),array($this,'asmember_options_allgemein_render'),'asmember_options_allgemein_group');
		add_settings_field('asmember_options_use_bootstrap',__('Bootstrap laden','asmember'),array($this,'asmember_options_allgemein_select_feld_render'),'asmember_options_allgemein_group','asmember_options_allgemein',array('id'=>'asmember_options_use_bootstrap'));
		add_settings_field('asmember_options_use_css',__('CSS laden','asmember'),array($this,'asmember_options_allgemein_select_feld_render'),'asmember_options_allgemein_group','asmember_options_allgemein',array('id'=>'asmember_options_use_css'));
		add_settings_field('asmember_options_admin_email',__('Admin-Email','asmember'),array($this,'asmember_options_text_feld_render'),'asmember_options_allgemein_group','asmember_options_allgemein',array('id'=>'asmember_options_admin_email'));	

		add_settings_section('asmember_colors',__('Farben','asmember'),array($this,'asmember_options_allgemein_render'),'asmember_options_allgemein_group');
		add_settings_field('asmember_options_colors_primary',__('Primär-Farbe','asmember'),array($this,'asmember_options_text_feld_render'),'asmember_options_allgemein_group','asmember_colors',array('id'=>'asmember_options_colors_primary'));
		
		register_setting('asmember_options_account_group','asmember_options_account',array($this,'asmember_options_handle_file_upload'));	
		add_settings_section('account_pages',__('Seiten','asmember'),array($this,'asmember_options_account_render'),'asmember_options_account_group');
		add_settings_field('asmember_options_account_pages_register',__('Register','asmember'),array($this,'asmember_select_pages_account_feld_render'),'asmember_options_account_group','account_pages',array('id'=>'asmember_options_account_pages_register'));
		add_settings_field('asmember_options_account_pages_login',__('Login','asmember'),array($this,'asmember_select_pages_account_feld_render'),'asmember_options_account_group','account_pages',array('id'=>'asmember_options_account_pages_login'));
		add_settings_field('asmember_options_account_pages_redirect_after_login',__('Redirect Login','asmember'),array($this,'asmember_select_pages_account_feld_render'),'asmember_options_account_group','account_pages',array('id'=>'asmember_options_account_pages_redirect_after_login'));
		add_settings_field('asmember_options_account_pages_redirect_blog_content',__('Redirect Blog','asmember'),array($this,'asmember_select_pages_account_feld_render'),'asmember_options_account_group','account_pages',array('id'=>'asmember_options_account_pages_redirect_blog_content'));
		add_settings_field('asmember_options_account_pages_reset_password',__('Reset Passwort','asmember'),array($this,'asmember_select_pages_account_feld_render'),'asmember_options_account_group','account_pages',array('id'=>'asmember_options_account_pages_reset_password'));
		add_settings_field('asmember_options_account_pages_agb',__('AGB','asmember'),array($this,'asmember_select_pages_account_feld_render'),'asmember_options_account_group','account_pages',array('id'=>'asmember_options_account_pages_agb'));
		add_settings_field('asmember_options_account_pages_datenschutz',__('Datenschutz','asmember'),array($this,'asmember_select_pages_account_feld_render'),'asmember_options_account_group','account_pages',array('id'=>'asmember_options_account_pages_datenschutz'));
		add_settings_field('asmember_options_account_text_check_agb',__('Text AGB','asmember'),array($this,'asmember_textarea_account_feld_render'),'asmember_options_account_group','account_pages',array('id'=>'asmember_options_account_text_check_agb'));
		add_settings_field('asmember_options_account_text_check_datenschutz',__('Text Datenschutz','asmember'),array($this,'asmember_textarea_account_feld_render'),'asmember_options_account_group','account_pages',array('id'=>'asmember_options_account_text_check_datenschutz'));
		
	
	
		add_settings_section('account','Account',array($this,'asmember_options_account_render'),'asmember_options_account_group');
		
		add_settings_field('asmember_options_account_register_modus',__('Registrierungs-Modus','asmember'),array($this,'asmember_select_register_modus_feld_render'),'asmember_options_account_group','account',array('id'=>'asmember_options_account_register_modus'));
		add_settings_field('asmember_options_account_active_modus',__('Aktivierungs-Modus','asmember'),array($this,'asmember_select_active_modus_feld_render'),'asmember_options_account_group','account',array('id'=>'asmember_options_account_active_modus'));
		
		
		add_settings_field('asmember_options_account_register_membership',__('Mitgliedschaft','asmember'),array($this,'asmember_select_register_membership_feld_render'),'asmember_options_account_group','account',array('id'=>'asmember_options_account_register_membership'));						
		add_settings_field('asmember_options_account_profil_edit_layout',__('Layout','asmember'),array($this,'asmember_select_account_profil_edit_layout_feld_render'),'asmember_options_account_group','account',array('id'=>'asmember_options_account_profil_edit_layout'));
		add_settings_field('asmember_options_account_change_admin_email',__('Admin-Email bei &Auml;nderungen','asmember'),array($this,'asmember_options_select_yesno_feld_render'),'asmember_options_account_group','account',array('id'=>'asmember_options_account_change_admin_email'));
		
		add_settings_section('account_fields_reg',__('Felder','asmember'),array($this,'asmember_options_account_render'),'asmember_options_account_group');
		add_settings_field('asmember_options_account_register_ustid',__('Ust-Id','asmember'),array($this,'asmember_options_select_yesno_feld_render'),'asmember_options_account_group','account_fields_reg',array('id'=>'asmember_options_account_register_ustid'));
		add_settings_field('asmember_options_account_register_gebdatum',__('Geburtstag','asmember'),array($this,'asmember_options_select_yesno_feld_render'),'asmember_options_account_group','account_fields_reg',array('id'=>'asmember_options_account_register_gebdatum'));
		add_settings_field('asmember_options_account_register_url',__('URL','asmember'),array($this,'asmember_options_select_yesno_feld_render'),'asmember_options_account_group','account_fields_reg',array('id'=>'asmember_options_account_register_url'));
		add_settings_field('asmember_options_account_register_firma',__('Firma','asmember'),array($this,'asmember_options_select_yesno_feld_render'),'asmember_options_account_group','account_fields_reg',array('id'=>'asmember_options_account_register_firma'));
		add_settings_field('asmember_options_account_register_position',__('Position','asmember'),array($this,'asmember_options_select_yesno_feld_render'),'asmember_options_account_group','account_fields_reg',array('id'=>'asmember_options_account_register_position'));
		add_settings_field('asmember_options_account_register_emailcheck',__('Email-Wiederholung','asmember'),array($this,'asmember_options_select_yesno_feld_render'),'asmember_options_account_group','account_fields_reg',array('id'=>'asmember_options_account_register_emailcheck'));
		
		
		add_settings_section('account_register',__('EMail Register','asmember'),array($this,'asmember_options_account_register_render'),'asmember_options_account_group');	
		add_settings_field('asmember_options_account_text_betreff_benutzer',__('Betreff User','asmember'),array($this,'asmember_options_text_feld_render'),'asmember_options_account_group','account_register',array('id'=>'asmember_options_account_text_betreff_benutzer'));
		add_settings_field('asmember_options_account_text_email_benutzer',__('Email to User','asmember'),array($this,'asmember_options_textarea_feld_render'),'asmember_options_account_group','account_register',array('id'=>'asmember_options_account_text_email_benutzer'));
		add_settings_field('asmember_options_account_attachment_benutzer',__('Anhang','asmember'),array($this,'asmember_options_account_attachment_feld_render'),'asmember_options_account_group','account_register',array('id'=>'asmember_options_account_attachment_benutzer'));
		add_settings_field('asmember_options_account_attachment_benutzer_file',__('Datei','asmember'),array($this,'asmember_options_text_feld_render'),'asmember_options_account_group','account_register',array('id'=>'asmember_options_account_attachment_benutzer_file'));
		add_settings_field('asmember_options_account_text_betreff_admin',__('Betreff Admin','asmember'),array($this,'asmember_options_text_feld_render'),'asmember_options_account_group','account_register',array('id'=>'asmember_options_account_text_betreff_admin'));
		add_settings_field('asmember_options_account_text_email_admin',__('Email to Admin','asmember'),array($this,'asmember_options_textarea_feld_render'),'asmember_options_account_group','account_register',array('id'=>'asmember_options_account_text_email_admin'));
		add_settings_field('asmember_options_account_email_from',__('EMail From','asmember'),array($this,'asmember_options_text_feld_render'),'asmember_options_account_group','account_register',array('id'=>'asmember_options_account_email_from'));
	
		add_settings_section('account_active_admin',__('EMail Aktivierung durch Admin','asmember'),array($this,'asmember_options_account_render'),'asmember_options_account_group');	
		add_settings_field('asmember_options_account_text_betreff_active_admin',__('Betreff','asmember'),array($this,'asmember_options_text_feld_render'),'asmember_options_account_group','account_active_admin',array('id'=>'asmember_options_account_text_betreff_active_admin'));
		add_settings_field('asmember_options_account_text_email_active_admin',__('Text EMail','asmember'),array($this,'asmember_options_textarea_feld_render'),'asmember_options_account_group','account_active_admin',array('id'=>'asmember_options_account_text_email_active_admin'));
		add_settings_field('asmember_options_account_email_from_active_admin',__('EMail From','asmember'),array($this,'asmember_options_text_feld_render'),'asmember_options_account_group','account_active_admin',array('id'=>'asmember_options_account_email_from_active_admin'));
	
		
		add_settings_section('account_password',__('Reset Password','asmember'),array($this,'asmember_options_account_render'),'asmember_options_account_group');	
		add_settings_field('asmember_options_account_password_reset',__('Erlaubt:','asmember'),array($this,'asmember_options_select_yesno_feld_render'),'asmember_options_account_group','account_password',array('id'=>'asmember_options_account_password_reset'));
		add_settings_field('asmember_options_account_password_betreff_email',__('Email-Betreff','asmember'),array($this,'asmember_options_text_feld_render'),'asmember_options_account_group','account_password',array('id'=>'asmember_options_account_password_betreff_email'));
		add_settings_field('asmember_options_account_password_text_email',__('Email-Text','asmember'),array($this,'asmember_options_textarea_feld_render'),'asmember_options_account_group','account_password',array('id'=>'asmember_options_account_password_text_email'));
		add_settings_field('asmember_options_account_password_from_email',__('Email-From','asmember'),array($this,'asmember_options_text_feld_render'),'asmember_options_account_group','account_password',array('id'=>'asmember_options_account_password_from_email'));
				
		add_settings_field('asmember_options_account_password_reset_frontend_form1',__('Hinweis Formular 1','asmember'),array($this,'asmember_options_textarea_feld_render'),'asmember_options_account_group','account_password',array('id'=>'asmember_options_account_password_reset_frontend_form1'));
		add_settings_field('asmember_options_account_password_reset_frontend_result1',__('Hinweis Ergebnis 1','asmember'),array($this,'asmember_options_textarea_feld_render'),'asmember_options_account_group','account_password',array('id'=>'asmember_options_account_password_reset_frontend_result1'));
		
		add_settings_field('asmember_options_account_password_reset_frontend_form2',__('Hinweis Formular 2','asmember'),array($this,'asmember_options_textarea_feld_render'),'asmember_options_account_group','account_password',array('id'=>'asmember_options_account_password_reset_frontend_form2'));
		add_settings_field('asmember_options_account_password_reset_frontend_result2',__('Hinweis Ergebnis 2','asmember'),array($this,'asmember_options_textarea_feld_render'),'asmember_options_account_group','account_password',array('id'=>'asmember_options_account_password_reset_frontend_result2'));
		
		
		add_settings_section('account_login',__('Login','asmember'),array($this,'asmember_options_account_render'),'asmember_options_account_group');			
		add_settings_field('asmember_options_account_login_form_text',__('Hinweistext Formular','asmember'),array($this,'asmember_options_textarea_feld_render'),'asmember_options_account_group','account_login',array('id'=>'asmember_options_account_login_form_text'));
				
		add_settings_section('account_spam',__('Spamschutz','asmember'),array($this,'asmember_options_account_render'),'asmember_options_account_group');			
		add_settings_field('asmember_options_account_spam_blacklist',__('Email-Blacklist','asmember'),array($this,'asmember_options_textarea_feld_render'),'asmember_options_account_group','account_spam',array('id'=>'asmember_options_account_spam_blacklist'));
		
		
		
		register_setting('asmember_options_bookings_group','asmember_options_bookings');	
		add_settings_section('bookings',__('Zahlungen','asmember'),array($this,'asmember_options_bookings_render'),'asmember_options_bookings_group');
		add_settings_field('asmember_options_bookings_paypal',__('Paypal','asmember'),array($this,'asmember_select_yesno_bookings_feld_render'),'asmember_options_bookings_group','bookings',array('id'=>'asmember_options_bookings_paypal'));
		add_settings_field('asmember_options_bookings_email_paypal',__('Paypal-Account','asmember'),array($this,'asmember_text_bookings_feld_render'),'asmember_options_bookings_group','bookings',array('id'=>'asmember_options_bookings_email_paypal'));
		add_settings_field('asmember_options_bookings_ueberweisung',__('&Uuml;berweisung','asmember'),array($this,'asmember_select_yesno_bookings_feld_render'),'asmember_options_bookings_group','bookings',array('id'=>'asmember_options_bookings_ueberweisung'));
		add_settings_field('asmember_options_bookings_ueberweisung_text',__('Hinweistext','asmember'),array($this,'asmember_textarea_bookings_feld_render'),'asmember_options_bookings_group','bookings',array('id'=>'asmember_options_bookings_ueberweisung_text'));
		
		add_settings_field('asmember_options_bookings_betreff_text',__('Betreff','asmember'),array($this,'asmember_text_bookings_feld_render'),'asmember_options_bookings_group','bookings',array('id'=>'asmember_options_bookings_betreff_text'));
		
		add_settings_section('bookings_email',__('EMail Zahlungserinnerung','asmember'),array($this,'asmember_options_bookings_render'),'asmember_options_bookings_group');	
		add_settings_field('asmember_options_bookings_email_betreff',__('Betreff','asmember'),array($this,'asmember_text_bookings_feld_render'),'asmember_options_bookings_group','bookings_email',array('id'=>'asmember_options_bookings_email_betreff'));
		add_settings_field('asmember_options_bookings_email_text',__('Text','asmember'),array($this,'asmember_textarea_bookings_feld_render'),'asmember_options_bookings_group','bookings_email',array('id'=>'asmember_options_bookings_email_text'));
		add_settings_field('asmember_options_bookings_email_from',__('From','asmember'),array($this,'asmember_text_bookings_feld_render'),'asmember_options_bookings_group','bookings_email',array('id'=>'asmember_options_bookings_email_from'));
		
		add_settings_section('bookings_email_verl',__('EMail Verl&auml;ngerung','asmember'),array($this,'asmember_options_bookings_render'),'asmember_options_bookings_group');	
		add_settings_field('asmember_options_bookings_email_verl_betreff',__('Betreff','asmember'),array($this,'asmember_text_bookings_feld_render'),'asmember_options_bookings_group','bookings_email_verl',array('id'=>'asmember_options_bookings_email_verl_betreff'));
		add_settings_field('asmember_options_bookings_email_verl_text',__('Text','asmember'),array($this,'asmember_textarea_bookings_feld_render'),'asmember_options_bookings_group','bookings_email_verl',array('id'=>'asmember_options_bookings_email_verl_text'));
		add_settings_field('asmember_options_bookings_email_verl_from',__('From','asmember'),array($this,'asmember_text_bookings_feld_render'),'asmember_options_bookings_group','bookings_email_verl',array('id'=>'asmember_options_bookings_email_verl_from'));
		
		add_settings_section('bookings_email_verl_aut',__('EMail Verl&auml;ngerung automatisch','asmember'),array($this,'asmember_options_bookings_render'),'asmember_options_bookings_group');	
		add_settings_field('asmember_options_bookings_email_verl_aut_betreff',__('Betreff','asmember'),array($this,'asmember_text_bookings_feld_render'),'asmember_options_bookings_group','bookings_email_verl_aut',array('id'=>'asmember_options_bookings_email_verl_aut_betreff'));
		add_settings_field('asmember_options_bookings_email_verl_aut_text',__('Text','asmember'),array($this,'asmember_textarea_bookings_feld_render'),'asmember_options_bookings_group','bookings_email_verl_aut',array('id'=>'asmember_options_bookings_email_verl_aut_text'));
		add_settings_field('asmember_options_bookings_email_verl_aut_from',__('From','asmember'),array($this,'asmember_text_bookings_feld_render'),'asmember_options_bookings_group','bookings_email_verl_aut',array('id'=>'asmember_options_bookings_email_verl_aut_from'));
		
				
		add_settings_section('bookings_quittung',__('Rechnung','asmember'),array($this,'asmember_options_bookings_render'),'asmember_options_bookings_group');	
		add_settings_field('asmember_options_bookings_quittung_text',__('Bescheinigung','asmember'),array($this,'asmember_textarea_bookings_feld_render'),'asmember_options_bookings_group','bookings_quittung',array('id'=>'asmember_options_bookings_quittung_text'));		
		add_settings_field('asmember_options_bookings_quittung_email_betreff',__('Betreff','asmember'),array($this,'asmember_text_bookings_feld_render'),'asmember_options_bookings_group','bookings_quittung',array('id'=>'asmember_options_bookings_quittung_email_betreff'));
		add_settings_field('asmember_options_bookings_quittung_email_text',__('Text','asmember'),array($this,'asmember_textarea_bookings_feld_render'),'asmember_options_bookings_group','bookings_quittung',array('id'=>'asmember_options_bookings_quittung_email_text'));
		add_settings_field('asmember_options_bookings_quittung_email_from',__('From','asmember'),array($this,'asmember_text_bookings_feld_render'),'asmember_options_bookings_group','bookings_quittung',array('id'=>'asmember_options_bookings_quittung_email_from'));
		
		add_settings_section('bookings_booking',__('Buchung','asmember'),array($this,'asmember_options_bookings_render'),'asmember_options_bookings_group');	
		add_settings_field('asmember_options_bookings_booking_frontend',__('Text Buchung Abschluss','asmember'),array($this,'asmember_textarea_bookings_feld_render'),'asmember_options_bookings_group','bookings_booking',array('id'=>'asmember_options_bookings_booking_frontend'));		
		add_settings_field('asmember_options_bookings_booking_frontend_sofort',__('Text Buchung Abschluss Sofort-Freischaltung','asmember'),array($this,'asmember_textarea_bookings_feld_render'),'asmember_options_bookings_group','bookings_booking',array('id'=>'asmember_options_bookings_booking_frontend_sofort'));		
		
		add_settings_field('asmember_options_bookings_booking_email_betreff',__('EMail an User - Betreff','asmember'),array($this,'asmember_text_bookings_feld_render'),'asmember_options_bookings_group','bookings_booking',array('id'=>'asmember_options_bookings_booking_email_betreff'));
		add_settings_field('asmember_options_bookings_booking_email_text',__('EMail an User - Text','asmember'),array($this,'asmember_textarea_bookings_feld_render'),'asmember_options_bookings_group','bookings_booking',array('id'=>'asmember_options_bookings_booking_email_text'));
		
		add_settings_field('asmember_options_bookings_booking_email_admin_betreff',__('EMail an Admin - Betreff','asmember'),array($this,'asmember_text_bookings_feld_render'),'asmember_options_bookings_group','bookings_booking',array('id'=>'asmember_options_bookings_booking_email_admin_betreff'));
		add_settings_field('asmember_options_bookings_booking_email_admin_text',__('EMail an Admin - Text','asmember'),array($this,'asmember_textarea_bookings_feld_render'),'asmember_options_bookings_group','bookings_booking',array('id'=>'asmember_options_bookings_booking_email_admin_text'));
		
		add_settings_field('asmember_options_bookings_booking_email_from',__('EMail-From','asmember'),array($this,'asmember_text_bookings_feld_render'),'asmember_options_bookings_group','bookings_booking',array('id'=>'asmember_options_bookings_booking_email_from'));
		
		
		add_settings_section('bookings_email_payment_aktiv',__('EMail Bestätigung Zahlung','asmember'),array($this,'asmember_options_bookings_render'),'asmember_options_bookings_group');	
		
		add_settings_field('asmember_options_bookings_email_payment_aktiv_betreff',__('EMail an User - Betreff','asmember'),array($this,'asmember_text_bookings_feld_render'),'asmember_options_bookings_group','bookings_email_payment_aktiv',array('id'=>'asmember_options_bookings_email_payment_aktiv_betreff'));
		add_settings_field('asmember_options_bookings_email_payment_aktiv_text',__('EMail an User - Text','asmember'),array($this,'asmember_textarea_bookings_feld_render'),'asmember_options_bookings_group','bookings_email_payment_aktiv',array('id'=>'asmember_options_bookings_email_payment_aktiv_text'));				
		add_settings_field('asmember_options_bookings_email_payment_aktiv_from',__('EMail-From','asmember'),array($this,'asmember_text_bookings_feld_render'),'asmember_options_bookings_group','bookings_email_payment_aktiv',array('id'=>'asmember_options_bookings_email_payment_aktiv_from'));
		
		
		
		register_setting('asmember_options_tracking_group','asmember_options_tracking');	
		add_settings_section('tracking',__('Tracking','asmember'),array($this,'asmember_options_tracking_render'),'asmember_options_tracking_group');
		add_settings_field('asmember_options_tracking_code_html',__('Tracking-Code','asmember'),array($this,'asmember_textarea_tracking_feld_render'),'asmember_options_tracking_group','tracking',array('id'=>'asmember_options_tracking_code_html'));
		
		register_setting('asmember_options_plugin_group','asmember_options_plugin');	
		add_settings_section('plugin_url',__('Plugin-Update','asmember'),array($this,'asmember_options_plugin_render'),'asmember_options_plugin_group');
		add_settings_field('asmember_options_plugin_checkurl',__('Enable Check-URL','asmember'),array($this,'asmember_select_yesno_plugin_feld_render'),'asmember_options_plugin_group','plugin_url',array('id'=>'asmember_options_plugin_checkurl'));
		
			
	}



	function asmember_options_get_option($str)
	{
		if(strpos($str,'account')>0) return get_option('asmember_options_account');else
		if(strpos($str,'module')>0) return get_option('asmember_options_allgemein');else
		if(strpos($str,'memberarea')>0) return get_option('asmember_options_memberarea');else
		if(strpos($str,'donate')>0) return get_option('asmember_options_donate');else	
		if(strpos($str,'payment')>0) return get_option('asmember_options_payment');else
		if(strpos($str,'members')>0) return get_option('asmember_options_members');else
		if(strpos($str,'newsfeed')>0) return get_option('asmember_options_newsfeed');else			
		if(strpos($str,'newsletter')>0) return get_option('asmember_options_newsletter');else
									return get_option('asmember_options_allgemein');						
	}
	
	function asmember_options_get_name($str)
	{
		if(strpos($str,'account')>0) return "asmember_options_account[".$str."]";else
		if(strpos($str,'module')>0)	return "asmember_options_allgemein[".$str."]";else	
		if(strpos($str,'memberarea')>0)	return "asmember_options_memberarea[".$str."]";else	
		if(strpos($str,'donate')>0)	return "asmember_options_donate[".$str."]";else	
		if(strpos($str,'payment')>0) return "asmember_options_payment[".$str."]";else
		if(strpos($str,'members')>0) return "asmember_options_members[".$str."]";else
		if(strpos($str,'newsfeed')>0) return "asmember_options_newsfeed[".$str."]";else		
		if(strpos($str,'newsletter')>0) return "asmember_options_newsletter[".$str."]";else		
									return "asmember_options_allgemein[".$str."]";
		
	}
	
	
	public function asmember_options_text_feld_render($args)
	{
				
		$option=$this->asmember_options_get_option($args['id']);	
		$name=$this->asmember_options_get_name($args['id']);
		
		
		
		$placeholder="";
		
		if($args['id']=="asmember_options_account_text_betreff_benutzer")$placeholder=__("Ihre Anmeldung auf <website>","asmember");
		if($args['id']=="asmember_options_account_text_betreff_admin")	$placeholder=__("Neue Registrierung auf <website>","asmember");
		if($args['id']=="asmember_options_account_email_from")			$placeholder=__("Von <email>","asmember");
		
		if($args['id']=="asmember_options_account_text_betreff_active_admin")	$placeholder=__("Ihre Anmeldung auf <website>","asmember");
		if($args['id']=="asmember_options_account_email_from_active_admin") $placeholder=__("Von <email>","asmember");
		
		if($args['id']=="asmember_options_account_password_betreff_email")	$placeholder=__("Ihr neues Passwort auf <website>","asmember");
		if($args['id']=="asmember_options_account_password_from_email")	$placeholder=__("Von <email>","asmember");
		
		
		if(isset($option[$args['id']]))
			if($option[$args['id']]!="")$placeholder=$option[$args['id']];
		echo "<input type=\"text\" size=\"70\" name=\"".$name."\" value=\"".$placeholder."\"></input>\n";
		
		if($args['id']=="asverein_options_payment_betreff_text")
		{
			echo "<span>%datum%, %jahr%, %id%</span>\n";
		}
	}
	
	
	function asmember_options_textarea_feld_render($args)
	{
		$option=$this->asmember_options_get_option($args['id']);	
		$name=$this->asmember_options_get_name($args['id']);
		
		$placeholder="";
		
		if($args['id']=="asmember_options_account_text_check_agb")$placeholder=__("Ich habe die AGB gelesen und aktzeptiere diese.","asmember");
		if($args['id']=="asmember_options_account_text_check_datenschutz")$placeholder=__("Ich habe die Datenschutzbestimmungen gelesen und bin mit der Verarbeitung meiner Daten einverstanden.","asmember");
		
		if($args['id']=="asmember_options_account_text_email_benutzer")$placeholder=__("Hallo %benutzer%,\n\nvielen Dank für Deine Anmeldung auf <website>.\n\nUm Deinen Account zu bestätigen, klicke folgenden Link:\n%activation_link%\n\nViele Grüße\nTeam von ","asmember");		
		if($args['id']=="asmember_options_account_text_email_admin")$placeholder=__("Eine neue Benutzerregistrierung ist eingegangen:\n\n%benutzer%\n%email%","asmember");

		if($args['id']=="asmember_options_account_text_email_active_admin")$placeholder=__("Hallo %benutzer%,\n\nIhr Accout auf <website> wurde vom Administrator geprüft und freigeschaltet.\n\nSie können sich nun mit Ihren Zugangsdaten einloggen.\n\nViele Grüße\nTeam von","asmember");

		if($args['id']=="asmember_options_account_password_reset_frontend_form1")$placeholder=__("Bitte geben Sie Ihre Email ein, um ein neues Passwort anzufordern.","asmember");
		if($args['id']=="asmember_options_account_password_reset_frontend_result1")$placeholder=__("Sie erhalten eine Email mit weiteren Informationen zum &Auml;ndern Ihres Passwortes.","asmember");
		
		if($args['id']=="asmember_options_account_password_reset_frontend_form2")$placeholder=__("Bitte geben Sie Ihr neues Passwort ein und wiederholen Sie es zur Best&auml;tigung.","asmember");
		if($args['id']=="asmember_options_account_password_reset_frontend_result2")$placeholder=__("Ihr Passwort wurde ge&auml;ndert.","asmember");
		
		if($args['id']=="asmember_options_account_password_text_email")			$placeholder=__("Hallo %user_login%,\n\nSie haben einen Password-Reset angefordert für folgendes Login: %user_login%\n\nFalls dies nicht von Ihnen gewollt ist, ignorieren Sie bitte diese Email.\n\nUm Ihr Passwort neu zu setzen, folgen Sie bitte folgendem Link:\n\n%password_reset_link%\n\nViele Grüße, Ihr Team\n","asmember");

		$cols="40";
		$rows="5";
		
		if($args['id']=="asmember_options_account_password_text_email") { $cols="120";$rows="10"; }
		if($args['id']=="asmember_options_account_text_email_admin"){ $cols="120";$rows="10"; }
		if($args['id']=="asmember_options_account_text_email_benutzer"){ $cols="120";$rows="10"; }
		if($args['id']=="asmember_options_account_text_email_active_admin"){ $cols="120";$rows="10"; }
		
		if($args['id']=="asmember_options_account_password_reset_frontend_form1"){ $cols="120";$rows="10"; }
		if($args['id']=="asmember_options_account_password_reset_frontend_result1"){ $cols="120";$rows="10"; }
		
		if($args['id']=="asmember_options_account_password_reset_frontend_form2"){ $cols="120";$rows="10"; }
		if($args['id']=="asmember_options_account_password_reset_frontend_result2"){ $cols="120";$rows="10"; }
		
		
		if($args['id']=="asmember_options_account_login_form_text")					{$cols="120";$rows="10";}
		if($args['id']=="asmember_options_account_spam_blacklist")					{$cols="120";$rows="10";}
		
		if(isset($option[$args['id']]))
			if($option[$args['id']]!="")$placeholder=$option[$args['id']];
		
		?>
		<textarea cols="<?php echo $cols;?>" rows="<?php echo $rows;?>" name="<?php echo $name;?>"><?php echo $placeholder;?></textarea>
		<?php
	}
	
	
	
	function asmember_options_account_attachment_feld_render($args)
	{
		$option=$this->asmember_options_get_option($args['id']);	
		$name=$this->asmember_options_get_name($args['id']);
	
		?>
        <input type="text" name="<?php echo $name;?>" value="<?php echo $option[$args['id']];?>" size="80"/>
        <br><b>Neue Datei hochladen:</b> <input type="file" name="attachment-file"/>        
   		<?php
   		
   		if(isset($option[$args['id']]) and $option[$args['id']]!="")
   		{
			echo "<br><a href=\"".$option[$args['id']]."\" target=\"_blank\">".$option[$args['id']]."</a>\n";
		}
	}	
	
	
	
	function asmember_options_handle_file_upload($option)
	{  		
    	if ( ! function_exists( 'wp_handle_upload' ) ) { require_once( ABSPATH . 'wp-admin/includes/file.php' );}	
  	
  		if(!empty($_FILES["attachment-file"]["tmp_name"]))
  		{
  			
    		$uploadedfile = $_FILES['attachment-file'];
    		$upload_overrides = array('test_form' => false);    		
    		$urls = wp_handle_upload($uploadedfile,$upload_overrides);    		
    		$option["asmember_options_account_attachment_benutzer"] = $urls["url"];  		
    		$option["asmember_options_account_attachment_benutzer_file"] = $urls["file"];  		
  		} 		
  		return $option;  		
	}
	
	
	
	
	function asmember_select_register_modus_feld_render($args)
	{
		$options=get_option('asmember_options_account');			
		?>
		<select name="asmember_options_account[<?php echo $args['id'];?>]">		
			<option value="1"<?php if($options[$args['id']]==1)echo " selected";?>><?php echo __("nur Login","asmember");?></option>
			<option value="2"<?php if($options[$args['id']]==2)echo " selected";?>><?php echo __("Login und pers&ouml;nliche Daten","asmember");?></option> 		
		</select>	
		<?php
	}
	
	
	function asmember_select_active_modus_feld_render($args)
	{
		$options=get_option('asmember_options_account');			
		?>
		<select name="asmember_options_account[<?php echo $args['id'];?>]">		
			<option value="0"<?php if($options[$args['id']]==0)echo " selected";?>><?php echo __("Aktivierung durch User","asmember");?></option>
			<option value="1"<?php if($options[$args['id']]==1)echo " selected";?>><?php echo __("Aktivierung durch Admin","asmember");?></option>			
		</select>	
		<?php
	}
	
	

	function asmember_options_select_pages_feld_render($args)
	{
		$option=$this->asmember_options_get_option($args['id']);	
		$name=$this->asmember_options_get_name($args['id']);			
		
		$page_link=$option[$args['id']];
		?>
		<select name="<?php echo $name;?>">	
	
 		<option value="">
		<?php echo esc_attr( __( 'Seite w&auml;hlen' ) ); ?></option> 
 		<?php 
  			$pages = get_pages(); 
  			foreach ( $pages as $page ) {
  				$option = '<option value="' . get_page_link( $page->ID ) . '"';
  				if($page_link == get_page_link($page->ID)) $option.=' selected';
  				$option .= '>';
				$option .= $page->post_title;
				$option .= '</option>';
				echo $option;
  			}
 		?>
		</select>	
		<?php
	}
	
	
	public function asmember_options_select_yesno_feld_render($args)
	{
		$option=$this->asmember_options_get_option($args['id']);	
		$name=$this->asmember_options_get_name($args['id']);		
		if(isset($option[$args['id']]))
			$value=$option[$args['id']];else
			$value=0;
		
		
		?>
		<select name="<?php echo $name;?>">	
	 		 
 		<?php   			
  			$option = '<option value="1"';
  			if($value == 1) $option.=' selected';
  			$option .= '>';
			$option .= __("Ja","asmember");
			$option .= '</option>';
			
			$option .= '<option value="0"';
  			if($value == 0) $option.=' selected';
  			$option .= '>';
			$option .= __("Nein","asmember");
			$option .= '</option>';			
			echo $option;  			
 		?>
		</select>
		<?php
	}
	
	
	
	
	
	
	function asmember_options_allgemein_select_feld_render($args)
	{
	$options=get_option('asmember_options_allgemein');
	?>
	<select name="asmember_options_allgemein[<?php echo $args['id'];?>]">	
	 		 
 		<?php   			
  			$option = '<option value="1"';
  			if($options[$args['id']] == 1) $option.=' selected';
  			$option .= '>';
			$option .= __("Ja","asmember");
			$option .= '</option>';
			
			$option .= '<option value="0"';
  			if($options[$args['id']] == 0) $option.=' selected';
  			$option .= '>';
			$option .= __("Nein","asmember");
			$option .= '</option>';			
			echo $option;  			
 		?>
	</select>
	<?php
	}



	function asmember_select_pages_account_feld_render($args)
	{
	$options=get_option('asmember_options_account');	
		
	?>
	<select name="asmember_options_account[<?php echo $args['id'];?>]">	
	
 		<option value="">
		<?php echo esc_attr( __( 'Seite w&auml;hlen' ) ); ?></option> 
 		<?php 
  			$pages = get_pages(); 
  			foreach ( $pages as $page ) {
  				$option = '<option value="' . get_page_link( $page->ID ) . '"';
  				if($options[$args['id']] == get_page_link($page->ID)) $option.=' selected';
  				$option .= '>';
				$option .= $page->post_title;
				$option .= '</option>';
				echo $option;
  			}
 		?>
	</select>


	
	<?php
	}




	function asmember_select_pages_memberarea_feld_render($args)
	{
	$options=get_option('asmember_options_memberarea');	
		
	?>
	<select name="asmember_options_memberarea[<?php echo $args['id'];?>]">	
	
 		<option value="">
		<?php echo esc_attr( __( 'Seite w&auml;hlen' ) ); ?></option> 
 		<?php 
  			$pages = get_pages(); 
  			foreach ( $pages as $page ) {
  				$option = '<option value="' . get_page_link( $page->ID ) . '"';
  				if($options[$args['id']] == get_page_link($page->ID)) $option.=' selected';
  				$option .= '>';
				$option .= $page->post_title;
				$option .= '</option>';
				echo $option;
  			}
 		?>
	</select>


	
	<?php
	}
	
	
	
	function asmember_textarea_account_feld_render($args)
	{
		$option=get_option('asmember_options_account');	
		$placeholder="";
		if($args['id']=="asmember_options_account_text_check_agb")$placeholder=__("Ich habe die AGB gelesen und aktzeptiere diese.","asmember");
		if($args['id']=="asmember_options_account_text_check_datenschutz")$placeholder=__("Ich habe die Datenschutzbestimmungen gelesen und bin mit der Verarbeitung meiner Daten einverstanden.","asmember");
		
		if($args['id']=="asmember_options_account_text_email_benutzer")$placeholder=__("Hallo %benutzer%,\n\nvielen Dank für Deine Anmeldung auf <website>.\n\nUm Deinen Account zu bestätigen, klicke folgenden Link:\n%activation_link%\n\nViele Grüße\nTeam von ","asmember");		
		if($args['id']=="asmember_options_account_text_email_admin")$placeholder=__("Eine neue Benutzerregistrierung ist eingegangen:\n\n%benutzer%\n%email%","asmember");

		
		if(isset($option[$args['id']]))				
			if($option[$args['id']]!="")$placeholder=$option[$args['id']];
		
		?>
		<textarea cols="60" rows="4" name="asmember_options_account[<?php echo $args['id'];?>]"><?php echo $placeholder;?></textarea>
		<?php
	}


	function asmember_text_account_feld_render($args)
	{
		$option=get_option('asmember_options_account');
		
		if($args['id']=="asmember_options_account_text_betreff_benutzer")$placeholder=__("Ihre Anmeldung auf <website>","asmember");
		if($args['id']=="asmember_options_account_text_betreff_admin")	$placeholder=__("Neue Registrierung auf <website>","asmember");
		if($args['id']=="asmember_options_account_email_from")			$placeholder=__("Von <email>","asmember");
				
		if($option[$args['id']]!="")$placeholder=$option[$args['id']];
			
		?>
		<input type="text" size="70" name="asmember_options_account[<?php echo $args['id'];?>]" value="<?php echo $placeholder;?>"></input>
		<?php
	}


	function asmember_text_bookings_feld_render($args)
	{
		$option=get_option('asmember_options_bookings');
		
		if($args['id']=="asmember_options_bookings_email_betreff")$placeholder=__("Zahlungserinnerung","asmember");
		if($args['id']=="asmember_options_bookings_email_from")$placeholder=__("Firma <email>","asmember");
		
		if($args['id']=="asmember_options_bookings_email_verl_betreff")$placeholder=__("Verl&auml;ngerung Ihrer Mitgliedschaft","asmember");
		if($args['id']=="asmember_options_bookings_email_verl_from")$placeholder=__("Firma <email>","asmember");
		
		if($args['id']=="asmember_options_bookings_email_verl_aut_betreff")$placeholder=__("Verl&auml;ngerung Ihrer Mitgliedschaft","asmember");
		if($args['id']=="asmember_options_bookings_email_verl_aut_from")$placeholder=__("Firma <email>","asmember");
		
		
		if($args['id']=="asmember_options_bookings_quittung_email_betreff")$placeholder=__("Ihre Rechnung %betreff%","asmember");
		if($args['id']=="asmember_options_bookings_quittung_email_from")$placeholder=__("Firma <email>","asmember");
		
		if($args['id']=="asmember_options_bookings_email_payment_aktiv_from") $placeholder=__("Firma <email>","asmember");
		
		if($args['id']=="asmember_options_bookings_booking_email_betreff")	$placeholder=__("Ihre Buchung auf <website>","asmember");
		
		if($args['id']=="asmember_options_bookings_email_payment_aktiv_betreff") $placeholder=__("Ihre Buchung auf <website>","asmember");
		
		if($args['id']=="asmember_options_bookings_booking_email_admin_betreff")	$placeholder=__("Neue Buchung auf <website>","asmember");
		if($args['id']=="asmember_options_bookings_booking_email_from")		$placeholder=__("Firma <email>","asmember");
		
		if($args['id']=="asmember_options_bookings_betreff_text") $placeholder=__("Rechnung %datum%-%id%","asmember");
		
		
		
		if($option[$args['id']]!="")$placeholder=$option[$args['id']];
			
		?>
		<input type="text" size="70" name="asmember_options_bookings[<?php echo $args['id'];?>]" value="<?php echo $placeholder;?>"></input>
		<?php
	}


	function asmember_textarea_bookings_feld_render($args)
	{
		$option=get_option('asmember_options_bookings');	
		
		$placeholder="";
		if($args['id']=="asmember_options_bookings_email_text")$placeholder=__("Hallo %vorname% %name%,\n\nwir möchten Sie an die Zahlung Ihrer Rechnung erinnern.\n\nLoggen Sie sich auf <url> ein, dort finden Sie die Details zu Ihrer Rechnung.\n\nViele Grüße\n\nIhr Firma-Team","asmember");
		if($args['id']=="asmember_options_bookings_email_verl_text")$placeholder=__("Hallo %vorname% %name%,\n\nwir möchten Sie an die Verlängerung Ihrer Mitgliedschaft erinnern.\n\nLoggen Sie sich auf <url> ein, dort finden Sie die Details zu Ihrer Mitgliedschaft.\n\nViele Grüße\n\nIhr Firma-Team","asmember");
		if($args['id']=="asmember_options_bookings_email_verl_aut_text")$placeholder=__("Hallo %vorname% %name%,\n\nIhre Mitgliedschaft wurde automatisch um den entsprechenden Zeitraum verlängert.\n\nLoggen Sie sich auf <url> ein, dort finden Sie die Details zu Ihrer Mitgliedschaft.\n\nViele Grüße\n\nIhr Firma-Team","asmember");
		
		if($args['id']=="asmember_options_bookings_ueberweisung_text")			$placeholder=__("Bitte &uuml;berweisen Sie den Betrag von %betrag% auf folgendes Konto:\n\n<Inhaber>\nIBAN:\nBIC:\nBetreff: %betreff%\n","asmember");
								
		if($args['id']=="asmember_options_bookings_quittung_email_text")		$placeholder="%quittung%";						
								
		if($args['id']=="asmember_options_bookings_booking_frontend")			$placeholder=__("Vielen Dank f&uuml;r Ihre Buchung des Paketes %titel%.\n\nNach erfolgreichem Zahlungseingang wird Ihre Buchung freigeschaltet und Sie k&ouml;nnen auf Ihre Inhalte zugreifen.\n\n%zahlungshinweis%","asmember");
		if($args['id']=="asmember_options_bookings_booking_frontend_sofort")	$placeholder=__("Vielen Dank f&uuml;r Ihre Buchung des Paketes %titel%.\n\nIhr Buchung wurde automatisch freigeschaltet und Sie haben nun Zugriff auf Ihre Inhalte.","asmember");

		if($args['id']=="asmember_options_bookings_booking_email_text")			$placeholder=__("Hallo %benutzer%,\n\nVielen Dank für Ihre Buchung des Paketes %titel%\n\n%zahlung%\n\n%daten%","asmember");
		if($args['id']=="asmember_options_bookings_booking_email_admin_text")	$placeholder=__("Es ist eine neue Buchung eingegangen:\n\nPaket %titel%\n\n%daten%","asmember");
		
		if($args['id']=="asmember_options_bookings_email_payment_aktiv_text")	$placeholder=__("Hallo %vorname% %name%,\n\nwir haben Ihre Zahlung erfolgreich verbucht.\n\nIhre Buchung wurde freigeschaltet, Sie können Ihre Produkte jetzt Downloaden.\n\nViele Grüße\n\nIhr Firma-Team","asmember");
		
		$cols="40";
		$rows="5";
		if($args['id']=="asmember_options_bookings_quittung_text") {$cols="140";$rows="15";	}
		
		if($args['id']=="asmember_options_bookings_booking_frontend") { $cols="120";$rows="10"; }
		if($args['id']=="asmember_options_bookings_booking_frontend_sofort") { $cols="120";$rows="10"; }
		if($args['id']=="asmember_options_bookings_booking_email_text") {$cols="120";$rows="10";}
		if($args['id']=="asmember_options_bookings_email_verl_text") {$cols="120";$rows="10";}
		if($args['id']=="asmember_options_bookings_email_verl_aut_text") {$cols="120";$rows="10";}
		if($args['id']=="asmember_options_bookings_booking_email_admin_text") {$cols="120";$rows="10";}	
		if($args['id']=="asmember_options_bookings_email_payment_aktiv_text"){$cols="120";$rows="10";}
		
		if($option[$args['id']]!="")$placeholder=$option[$args['id']];
		?>
		<textarea cols="<?php echo $cols;?>" rows="<?php echo $rows;?>" name="asmember_options_bookings[<?php echo $args['id'];?>]"><?php echo $placeholder;?></textarea>
		<?php
	}


	function asmember_select_yesno_bookings_feld_render($args)
	{
		$options=get_option('asmember_options_bookings');	
		
		?>
		<select name="asmember_options_bookings[<?php echo $args['id'];?>]">	
	 			
 		<?php   			  			
  				$option = '<option value="1"';
  				if($options[$args['id']] == 1) $option.=' selected';
  				$option .= '>';
  				$option .= __("Ja","asmember");
  				$option .= '</option>';
				
				$option .= '<option value="0"';
  				if($options[$args['id']] == 0) $option.=' selected';
  				$option .= '>';
  				$option .= __("Nein","asmember");
  				$option .= '</option>';								
				echo $option;  			
 		?>
		</select>
		<?php
	}



	function asmember_select_yesno_plugin_feld_render($args)
	{
		$options=get_option('asmember_options_plugin');	
		
		?>
		<select name="asmember_options_plugin[<?php echo $args['id'];?>]">	
	 			
 		<?php   			  			
  				$option = '<option value="1"';
  				if($options[$args['id']] == 1) $option.=' selected';
  				$option .= '>';
  				$option .= __("Ja","asmember");
  				$option .= '</option>';
				
				$option .= '<option value="0"';
  				if($options[$args['id']] == 0) $option.=' selected';
  				$option .= '>';
  				$option .= __("Nein","asmember");
  				$option .= '</option>';								
				echo $option;  			
 		?>
		</select>
		<?php
	}





	function asmember_select_register_membership_feld_render($args)
	{
		$options=get_option('asmember_options_account');			
		?>
		<select name="asmember_options_account[<?php echo $args['id'];?>]">	
	
			
			<option value="0"<?php if($options[$args['id']]==0)		echo " selected";?>><?php echo __("keine Mitgliedschaft bei Anmeldung","asmember");?></option> 			
			<option value="-1"<?php if($options[$args['id']]==-1)		echo " selected";?>><?php echo __("Mitgliedschaft ausw&auml;hlbar","asmember");?></option> 			
 			
 			<?php					
				global $wpdb;
				$sql="select * from ".$wpdb->prefix."posts where post_type='asmember_memberships'";
				$results=$wpdb->get_results($sql);
				foreach($results as $item)
				{
					echo "<option value=\"".$item->ID."\"";
					if($options[$args['id']]==$item->ID)echo " selected";
					echo ">".$item->post_title."</option>\n";
				}
							
			?>
		</select>	
		<?php
	}
	
	
	
	
	function asmember_select_account_profil_edit_layout_feld_render($args)
	{
		$options=get_option('asmember_options_members');		
		?>
		<select name="asmember_options_account[<?php echo $args['id'];?>]">		 			
 		<?php   			  			
  				$option = '<option value="1"';
  				if($options[$args['id']] == 1) $option.=' selected';
  				$option .= '>';
  				$option .= __("1-spaltig","asmember");
  				$option .= '</option>';				
				$option .= '<option value="2"';
  				if($options[$args['id']] == 2) $option.=' selected';
  				$option .= '>';
  				$option .= __("2-spaltig","asmember");
  				$option .= '</option>';								  				
				echo $option;  			
 		?>
		</select>
		<?php
	}
	
	
	
	
	function asdownload_select_pages_downloads_feld_render($args)
	{
		$options=get_option('asdownload_options_downloads');			
		?>
		<select name="asdownload_options_downloads[<?php echo $args['id'];?>]">	
	
 		<option value="">
		<?php echo esc_attr( __( 'Seite w&auml;hlen' ) ); ?></option> 
 		<?php 
  			$pages = get_pages(); 
  			foreach ( $pages as $page ) {
  				$option = '<option value="' . get_page_link( $page->ID ) . '"';
  				if($options[$args['id']] == get_page_link($page->ID)) $option.=' selected';
  				$option .= '>';
				$option .= $page->post_title;
				$option .= '</option>';
				echo $option;
  			}
 		?>
		</select>	
		<?php
	}

	function asdownload_select_count_col_downloads_feld_render($args)
	{
		
		$options=get_option('asdownload_options_downloads');	
		
		?>
		<select name="asdownload_options_downloads[<?php echo $args['id'];?>]">		
 		 
 		<?php 
  			for($i=1;$i<5;$i++)
  			{
  				$option = '<option value="' . $i . '"';
  				if($options[$args['id']] == $i) $option.=' selected';
  				$option .= '>';
				$option .= $i;
				$option .= '</option>';
				echo $option;
  			}
 		?>
		</select>
		<?php
	}

	function asdownload_select_count_entries_downloads_feld_render($args)
	{
		$options=get_option('asdownload_options_downloads');	
		
		?>
		<select name="asdownload_options_downloads[<?php echo $args['id'];?>]">	
	
 		<?php	 
  			for($i=1;$i<50;$i++)
  			{
  				$option = '<option value="' . $i . '"';
  				if($options[$args['id']] == $i) $option.=' selected';
  				$option .= '>';
				$option .= $i;
				$option .= '</option>';
				echo $option;
  			}
 		?>
		</select>


	
		<?php
	}

	function asdownload_select_yesno_downloads_feld_render($args)
	{
		$options=get_option('asdownload_options_downloads');	
		
		?>
		<select name="asdownload_options_downloads[<?php echo $args['id'];?>]">	
	 			
 		<?php   			  			
  				$option = '<option value="1"';
  				if($options[$args['id']] == 1) $option.=' selected';
  				$option .= '>';
  				$option .= __("Ja","asmember");
  				$option .= '</option>';
				
				$option .= '<option value="0"';
  				if($options[$args['id']] == 0) $option.=' selected';
  				$option .= '>';
  				$option .= __("Nein","asmember");
  				$option .= '</option>';
								
				echo $option;
  			
 		?>
		</select>
		<?php
	}
	
	function asdownload_select_order_downloads_feld_render($args)
	{
		$options=get_option('asdownload_options_downloads');	
		
		?>
		<select name="asdownload_options_downloads[<?php echo $args['id'];?>]">		 			
 		<?php   			  			
  				$option = '<option value="title"';
  				if($options[$args['id']] == "title") $option.=' selected';
  				$option .= '>';
  				$option .= __("Titel","asmember");
  				$option .= '</option>';
				
				$option .= '<option value="pos"';
  				if($options[$args['id']] == "pos") $option.=' selected';
  				$option .= '>';
  				$option .= __("Position","asmember");
  				$option .= '</option>';								
				echo $option;
  			
 		?>
		</select>
		<?php
	}




	function asmember_textarea_tracking_feld_render($args)
	{
		$option=get_option('asmember_options_tracking');	
		
		$placeholder="";
		
		$cols="120";
		$rows="5";
		
		if(isset($option[$args['id']]))
			if($option[$args['id']]!="")$placeholder=$option[$args['id']];
		?>
		<textarea cols="<?php echo $cols;?>" rows="<?php echo $rows;?>" name="asmember_options_tracking[<?php echo $args['id'];?>]"><?php echo $placeholder;?></textarea>
		<?php
	}
	
	
	

	function asmember_options_allgemein_render()
	{
	
	}




	function asmember_options_account_render()
	{
	
	}

	function asmember_options_account_register_render()
	{
	
	}
	

	function asmember_options_bookings_render()
	{
	
	}
	
	function asmember_options_dashboard_render()
	{
	
	}
	
	
	function asdownload_options_downloads_render()
	{
	
	}
	
	function asmember_options_tracking_render()
	{
	
	}
	
	function asmember_options_plugin_render()
	{
	
	}
	
	



	public static function asmember_options_page_output()
	{
		//$active_tab = get_query_var('tab','allgemein');
		if(isset($_REQUEST['tab']))$active_tab=sanitize_text_field($_REQUEST['tab']);else $active_tab="allgemein";	
		?>
		<h2>Optionen</h2>
		
		<h2 class="nav-tab-wrapper">
			<a class="nav-tab nav-tab<?php if($active_tab=='allgemein')echo "-active";?>" href="admin.php?page=asmember_option&tab=allgemein"><?php echo __("Allgemein","asmember");?></a>		
			<a class="nav-tab nav-tab<?php if($active_tab=='account')echo "-active";?>" href="admin.php?page=asmember_option&tab=account"><?php echo __("Account","asmember");?></a>		
			<a class="nav-tab nav-tab<?php if($active_tab=='booking')echo "-active";?>" href="admin.php?page=asmember_option&tab=booking"><?php echo __("Booking","asmember");?></a>		
			<a class="nav-tab nav-tab<?php if($active_tab=='tracking')echo "-active";?>" href="admin.php?page=asmember_option&tab=tracking"><?php echo __("Tracking","asmember");?></a>		
			<a class="nav-tab nav-tab<?php if($active_tab=='plugin')echo "-active";?>" href="admin.php?page=asmember_option&tab=plugin"><?php echo __("Plugin-Update","asmember");?></a>		
			<a class="nav-tab nav-tab<?php if($active_tab=='db')echo "-active";?>" href="admin.php?page=asmember_option&tab=db"><?php echo __("DB","asmember");?></a>
		
		</h2>		
		
		
		<form action='options.php' method='post' enctype="multipart/form-data">
		<?php
		if($active_tab=='allgemein')
		{			
			settings_fields('asmember_options_allgemein_group');
			do_settings_sections('asmember_options_allgemein_group');
			submit_button();
			?>
			<input type="hidden" name="tab" value="allgemein">
			<?php
		}	
		
		
		if($active_tab=='account')
		{			
			settings_fields('asmember_options_account_group');
			do_settings_sections('asmember_options_account_group');
			submit_button();
			?>
			<input type="hidden" name="tab" value="account">
			<?php
		}	
		
		if($active_tab=='booking')
		{
			
			settings_fields('asmember_options_bookings_group');
			do_settings_sections('asmember_options_bookings_group');
			submit_button();
			?>
			<input type="hidden" name="tab" value="booking">
			<?php
		}	
		
		if($active_tab=='tracking')
		{
			
			settings_fields('asmember_options_tracking_group');
			do_settings_sections('asmember_options_tracking_group');
			submit_button();
			?>
			<input type="hidden" name="tab" value="tracking">
			<?php
		}	
		
		if($active_tab=='plugin')
		{
			
			settings_fields('asmember_options_plugin_group');
			do_settings_sections('asmember_options_plugin_group');
			submit_button();
			?>
			<input type="hidden" name="tab" value="plugin">
			<?php
		}	
		
		
		if($active_tab=='db')
		{	
			
			echo "<h2>";
			echo __("Datenbank-Aktualisierung","asmember");
			echo "</h2>\n";
			
			global $wpdb;
			
						    		
			$table_name = $wpdb->prefix.'asmember_login_stat';
			if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name)
			{
	    		echo $table_name." ";
	    		echo __("nicht vorhanden.","asmember");
	    		echo "<br>";    		
    	 		
    	 		$charset_collate = $wpdb->get_charset_collate();
 
     			$sql = "CREATE TABLE $table_name (
          			id bigint NOT NULL AUTO_INCREMENT,
          			datum int(11) default 0,
          			user_id int(11) default 0,          			
          			PRIMARY KEY id (id)
     				) $charset_collate;";
     			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
     			dbDelta( $sql );
     			echo $table_name." ";
     			echo __("angelegt.","asmember");
     			echo "<br>";
     			
			}else
			{
				echo $table_name." ";
				echo __("vorhanden.","asmember");
				echo "<br>";
			}
			//Felder
			$table_name = $wpdb->prefix.'asmember_login_stat';
			$sql = "show columns from ".$table_name." where Field='user'"; 
        	if($wpdb->get_var($sql) != "user")
        	{
				echo "Feld: datum_akt nicht vorhanden.<br>";				
				$sql = "ALTER TABLE ".$table_name." add user varchar(200)";				
     			$wpdb->query($sql);
     			echo __("Feld: user eingef&uuml;gt.","asmember");
     			echo "<br>";
			}else
			{
				echo __("Feld: user vorhanden.","asmember");
				echo "<br>";
			}
			
			
			$table_name = $wpdb->prefix.'asmember_login_stat';
			$sql = "show columns from ".$table_name." where Field='last_logins'"; 
        	if($wpdb->get_var($sql) != "last_logins")
        	{				
				$sql = "ALTER TABLE ".$table_name." add last_logins varchar(1024)";				
     			$wpdb->query($sql);
     			echo __("Feld: last_logins eingef&uuml;gt.","asmember");
     			echo "<br>";
			}else
			{
				echo __("Feld: last_logins vorhanden.","asmember");
				echo "<br>";
			}
			
			
			
			$table_name = $wpdb->prefix.'asmember_user';
			if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name)
			{  		
    	 		
    	 		$charset_collate = $wpdb->get_charset_collate();
 
     			$sql = "CREATE TABLE $table_name (
          			id bigint NOT NULL AUTO_INCREMENT,
          			user_id int(11) default 0,
          			user_name varchar(100),
          			membership_id int(11) default 0,
          			membership varchar(100),
          			datum_erstell int(11) default 0,
          			datum_bis int(11) default 0,
          			status tinyint(4) default 0,
          			payment varchar(20),
          			betrag float(2) default 0,
          			betrag_mwst float(2) default 0,
          			betrag_netto float(2) default 0,
          			betreff varchar(30),
          			paypal_token varchar(50),
          			pid int(11) default 0,          			          			
          			PRIMARY KEY id (id)
     				) $charset_collate;";
     			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
     			dbDelta( $sql );
     			echo $table_name." ";
     			echo __("angelegt.","asmember");
     			echo "<br>";
     			
			}else
			{
				echo $table_name." ";
				echo __("vorhanden.","asmember");
				echo "<br>";
			}
			
			
			//Felder
			$table_name = $wpdb->prefix.'asmember_user';
			$sql = "show columns from ".$table_name." where Field='pdf_file'"; 
        	if($wpdb->get_var($sql) != "pdf_file")
        	{				
				$sql = "ALTER TABLE ".$table_name." add pdf_file varchar(255)";				
     			$wpdb->query($sql);
     			echo __("Feld: pdf_file eingef&uuml;gt.","asmember");
     			echo "<br>";
			}else
			{
				echo __("Feld: pdf_file vorhanden.","asmember");
				echo "<br>";
			}
			
			$table_name = $wpdb->prefix.'asmember_user';
			$sql = "show columns from ".$table_name." where Field='pdf_file_url'"; 
        	if($wpdb->get_var($sql) != "pdf_file_url")
        	{
				$sql = "ALTER TABLE ".$table_name." add pdf_file_url varchar(255)";				
     			$wpdb->query($sql);
     			echo __("Feld: pdf_file_url eingef&uuml;gt.","asmember");echo "<br>";
			}else
			{
				echo __("Feld: pdf_file_url vorhanden.","asmember");echo "<br>";
			}
			
			$table_name = $wpdb->prefix.'asmember_user';
			$sql = "show columns from ".$table_name." where Field='quittung'"; 
        	if($wpdb->get_var($sql) != "quittung")
        	{
				$sql = "ALTER TABLE ".$table_name." add quittung text";				
     			$wpdb->query($sql);
     			echo __("Feld: quittung eingef&uuml;gt.","asmember");echo "<br>";
			}else
			{
				echo __("Feld: quittung vorhanden.","asmember");echo "<br>";
			}
			
			
			
			
			//Felder
			$table_name = $wpdb->prefix.'asmember_user';
			$sql = "show columns from ".$table_name." where Field='datum_akt'"; 
        	if($wpdb->get_var($sql) != "datum_akt")
        	{
				echo "Feld: datum_akt nicht vorhanden.<br>";				
				$sql = "ALTER TABLE ".$table_name." add datum_akt int(11) default 0";				
     			$wpdb->query($sql);
     			echo "Feld: datum_akt eingef&uuml;gt.<br>";
			}else
			{
				echo "Feld: datum_akt vorhanden.<br>";
			}
        	
			//Felder
			$table_name = $wpdb->prefix.'asmember_user';
			$sql = "show columns from ".$table_name." where Field='verl_id'"; 
        	if($wpdb->get_var($sql) != "verl_id")
        	{
				echo "Feld: verl_id nicht vorhanden.<br>";				
				$sql = "ALTER TABLE ".$table_name." add verl_id int(11) default 0";				
     			$wpdb->query($sql);
     			echo "Feld: verl_id eingef&uuml;gt.<br>";
			}else
			{
				echo "Feld: verl_id vorhanden.<br>";
			}
			
			
			//Felder
			$table_name = $wpdb->prefix.'asmember_user';
			$sql = "show columns from ".$table_name." where Field='renew'"; 
        	if($wpdb->get_var($sql) != "renew")
        	{
				echo "Feld: renew nicht vorhanden.<br>";				
				$sql = "ALTER TABLE ".$table_name." add renew int(11) default 0";				
     			$wpdb->query($sql);
     			echo "Feld: renew eingef&uuml;gt.<br>";
			}else
			{
				echo "Feld: renew vorhanden.<br>";
			}
			
			
			//Felder
			$table_name = $wpdb->prefix.'asmember_user';
			$sql = "show columns from ".$table_name." where Field='datum_renew'"; 
        	if($wpdb->get_var($sql) != "datum_renew")
        	{
				echo "Feld: datum_renew nicht vorhanden.<br>";				
				$sql = "ALTER TABLE ".$table_name." add datum_renew int(11) default 0";				
     			$wpdb->query($sql);
     			echo "Feld: datum_renew eingef&uuml;gt.<br>";
			}else
			{
				echo "Feld: datum_renew vorhanden.<br>";
			}
			
			
			
			//Felder
			$table_name = $wpdb->prefix.'asmember_user';
			$sql = "show columns from ".$table_name." where Field='datum_renew_end'"; 
        	if($wpdb->get_var($sql) != "datum_renew_end")
        	{
				echo "Feld: datum_renew_end nicht vorhanden.<br>";				
				$sql = "ALTER TABLE ".$table_name." add datum_renew_end int(11) default 0";				
     			$wpdb->query($sql);
     			echo "Feld: datum_renew_end eingef&uuml;gt.<br>";
			}else
			{
				echo "Feld: datum_renew_end vorhanden.<br>";
			}
			
			//Felder
			$table_name = $wpdb->prefix.'asmember_user';
			$sql = "show columns from ".$table_name." where Field='last_email'"; 
        	if($wpdb->get_var($sql) != "last_email")
        	{
				echo "Feld: last_email nicht vorhanden.<br>";				
				$sql = "ALTER TABLE ".$table_name." add last_email_verl int(11) default 0";				
     			$wpdb->query($sql);
     			echo "Feld: last_email eingef&uuml;gt.<br>";
			}else
			{
				echo "Feld: last_email vorhanden.<br>";
			}
			
			
			//Felder
			$table_name = $wpdb->prefix.'asmember_user';
			$sql = "show columns from ".$table_name." where Field='last_email_verl'"; 
        	if($wpdb->get_var($sql) != "last_email_verl")
        	{
				echo "Feld: last_email_verl nicht vorhanden.<br>";				
				$sql = "ALTER TABLE ".$table_name." add last_email_verl int(11) default 0";				
     			$wpdb->query($sql);
     			echo "Feld: last_email_verl eingef&uuml;gt.<br>";
			}else
			{
				echo "Feld: last_email_verl vorhanden.<br>";
			}
			
			
			
			//Felder
			$table_name = $wpdb->prefix.'asmember_user';
			$sql = "show columns from ".$table_name." where Field='check_url'"; 
        	if($wpdb->get_var($sql) != "check_url")
        	{
				echo "Feld: check_url nicht vorhanden.<br>";				
				$sql = "ALTER TABLE ".$table_name." add check_url varchar(255)";				
     			$wpdb->query($sql);
     			echo "Feld: check_url eingef&uuml;gt.<br>";
			}else
			{
				echo "Feld: check_url vorhanden.<br>";
			}
			
			
			
			
			/*
			
			
			$table_name = $wpdb->prefix.'asmember_payment';
			if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name)
			{
	    		
    	 		$charset_collate = $wpdb->get_charset_collate();
 
     			$sql = "CREATE TABLE $table_name (
          			id bigint NOT NULL AUTO_INCREMENT,
          			user_id int(11) default 0,
          			user_name varchar(100),
          			datum_zahlung int(11) default 0,
          			datum_erstell int(11) default 0,
          			datum_bis int(11) default 0,
          			status tinyint(4) default 0,
          			jahr int(11) default 0,
          			betreff varchar(255),
          			last_email int(11) default 0,          			
          			membership_id int(11) default 0,
          			membership varchar(100),
          			asmember_user_id int(11) default 0,
          			payment varchar(20),
          			betrag float default 0,
          			betrag_mwst float default 0,
          			betrag_netto float default 0,
          			betrag_mwst_satz int(11) default 0,
          			paypal_token varchar(50),
          			datum_akt int(11) default 0,
          			quittung text,          			
          			PRIMARY KEY id (id)
     				) $charset_collate;";
     			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
     			dbDelta( $sql );
     			echo $table_name." ";
     			echo __("angelegt.","asmember");echo "<br>";
     			
			}else
			{
				echo $table_name." ";
				echo __("vorhanden.","asmember");echo "<br>";
			}
			
			
			//Felder
			$table_name = $wpdb->prefix.'asmember_payment';
			$sql = "show columns from ".$table_name." where Field='pdf_file'"; 
        	if($wpdb->get_var($sql) != "pdf_file")
        	{				
				$sql = "ALTER TABLE ".$table_name." add pdf_file varchar(200)";				
     			$wpdb->query($sql);
     			echo __("Feld: pdf_file eingef&uuml;gt.","asmember");echo "<br>";
			}else
			{
				echo __("Feld: pdf_file vorhanden.","asmember");echo "<br>";
			}
			
			
			//Felder
			$table_name = $wpdb->prefix.'asmember_payment';
			$sql = "show columns from ".$table_name." where Field='bid'"; 
        	if($wpdb->get_var($sql) != "bid")
        	{				
				$sql = "ALTER TABLE ".$table_name." add bid varchar(30)";				
     			$wpdb->query($sql);
     			echo __("Feld: bid eingef&uuml;gt.","asmember");echo "<br>";
			}else
			{
				echo __("Feld: bid vorhanden.","asmember");echo "<br>";
			}
			
			*/
			
			$table_name = $wpdb->prefix.'asmember_payment_partner';
			if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name)
			{    			
    	 		
    	 		$charset_collate = $wpdb->get_charset_collate();
 
     			$sql = "CREATE TABLE $table_name (
          			id bigint NOT NULL AUTO_INCREMENT,
          			pid int(11) default 0,
          			booking_id int(11) default 0,
          			payment_id int(11) default 0,
          			datum_erstell int(11) default 0,
          			status tinyint(4) default 0,
          			betreff varchar(255),
          			membership_id int(11) default 0,
          			membership varchar(100),
          			betrag float default 0,
          			betrag_mwst float default 0,
          			betrag_netto float default 0,
          			betrag_mwst_satz int(11) default 0,
          			quittung text,          			
          			PRIMARY KEY id (id)
     				) $charset_collate;";
     			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
     			dbDelta( $sql );
     			echo $table_name." ";
     			echo __("angelegt.","asmember");echo "<br>";
     			
			}else
			{
				echo $table_name." ";
				echo __("vorhanden.","asmember");echo "<br>";
			}
			
			
			$table_name = $wpdb->prefix.'asmember_courses_downloads';
			if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name)
			{	    		
    	 		$charset_collate = $wpdb->get_charset_collate();
 
     			$sql = "CREATE TABLE $table_name (
          			id bigint NOT NULL AUTO_INCREMENT,
          			post_id int(11) default 0,
          			titel varchar(255),
          			filename varchar(255),
          			pfad varchar(255),
          			url varchar(255), 
          			pos int(11) default 0,         			
          			PRIMARY KEY id (id)
     				) $charset_collate;";
     			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
     			dbDelta( $sql );
     			echo $table_name." ";
     			echo __("angelegt.","asmember");echo "<br>";
     			
			}else
			{
				echo $table_name." ";
				echo __("vorhanden.","asmember");echo "<br>";
			}
			
			
			$table_name = $wpdb->prefix.'asmember_newsletter_send';
			if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name)
			{
	    		echo $table_name." nicht vorhanden.<br>";
	    		
	    		$charset_collate = $wpdb->get_charset_collate();
 
     			$sql = "CREATE TABLE $table_name (
          			id bigint NOT NULL AUTO_INCREMENT,
          			newsletter_id int(11) default 0,
          			user_id int(11) default 0,
          			address_id int(11) default 0,
          			datum_send int(11) default 0,
          			status tinyint(4) default 0,
          			email varchar(255),          			
          			PRIMARY KEY id (id)
     				) $charset_collate;";
     			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
     			dbDelta( $sql );
     			
     			$sql="alter table ".$table_name." add unique index id_email (newsletter_id,email)";
     			$wpdb->query($sql);
     			
     			echo $table_name." angelegt.<br>";
     			
			}else
			{
				echo $table_name." vorhanden.<br>";
			}
			
					
			
			
		}	
		
		?>
		
		
		
		</form>
		<?php
	}
}

$asmember_admin_options_obj = new asmember_admin_options();		