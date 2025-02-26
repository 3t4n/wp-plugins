<?php
	/*
	 * Author Box Reloaded 2.0.4.2
	 * Init function content. 
	 */
	 
	/**
	 * Definition of global values
	 */
	$this->_hook = 'authorBox';
	$this->_pluginDir = str_replace(basename( __FILE__),"",plugin_basename(__FILE__));
	$this->_file = $this->_pluginDir.'authorbox.php';
	$this->_slug = untrailingslashit( $this->_pluginDir );
	//$this->_appIcon = 'authorbox';
	//$this->_appIconFile = 'authorbox.ico';
	$this->_appLogoFile = plugin_dir_url( __FILE__ ).'/images/ipublicis-logo-32.png';
	//$this->_selfMainMenu = 'Author Box';
	$this->_menuHook = $this->PARENT_MENU_USERS;
	$this->_pageTitle = __( 'Author Box Reloaded', $this->_slug );
	$this->_menuTitle = __( 'Author Box R3', $this->_slug );
	$this->_accessLevel = 'manage_options';
	$this->_optionGroup = 'ab2-options';
	$this->_optionNames = array('ab2');
	$this->_optionCallbacks = array();
	$this->_aboutText = __("We are available for hire.", $this->_slug);
	$this->_appFeed = 'http://w3.ipublicis.com/newswire/ipublicis/feed';
	$this->_donationID = '7kit';
	$this->_wishlistID = 'A7HJYTOILQO5';
	$this->_contactURL = 'http://w3.ipublicis.com/contact-us';
	$this->_dashboardWidget = array( 	'inc' => 'iPublicis!COM',
																'url' => 'http://www.ipublicis.com/',
																'rss' => 'http://www.ipublicis.com/rss.xml', 
																'ico' => plugin_dir_url( __FILE__ ).'/images/ipublicis-logo-32.png'  );

	/**
	 * Add filters and actions
	 */
	add_action( 'wp_head', array( $this, 'authorbox_css' ) );
	register_activation_hook( $this->_file, array( $this, 'activate' ) );
	register_deactivation_hook( $this->_file, array( $this, 'deactivate' ) );
	add_filter( 'user_contactmethods', array( $this, 'add_extra_contactmethod' ), 10, 1);

