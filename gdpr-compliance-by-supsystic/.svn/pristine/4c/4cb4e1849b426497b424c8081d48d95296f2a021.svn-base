<?php
/**
 * Plugin Name: GDPR Compliance by Supsystic
 * Description: Be prepared for GDPR!
 * Version: 2.1.2
 * Author: supsystic.com
 * Author URI: https://supsystic.com
 **/
	/**
	 * Base config constants and functions
	 */
    require_once(dirname(__FILE__). DIRECTORY_SEPARATOR. 'config.php');
	if(defined('GDPRSUP_ADMIN_USAGE_ONLY') && GDPRSUP_ADMIN_USAGE_ONLY && !is_admin()) return;

    require_once(dirname(__FILE__). DIRECTORY_SEPARATOR. 'functions.php');
	/**
	 * Connect all required core classes
	 */
    importClassGdprsup('dbGdprsup');
	importClassGdprsup('outGdprsup');
    importClassGdprsup('installerGdprsup');
    importClassGdprsup('baseObjectGdprsup');
    importClassGdprsup('moduleGdprsup');
    importClassGdprsup('modelGdprsup');
    importClassGdprsup('viewGdprsup');
    importClassGdprsup('controllerGdprsup');
    importClassGdprsup('helperGdprsup');
    importClassGdprsup('dispatcherGdprsup');
    importClassGdprsup('fieldGdprsup');
    importClassGdprsup('tableGdprsup');
    importClassGdprsup('frameGdprsup');
	/**
	 * @deprecated since version 1.0.1
	 */
    importClassGdprsup('langGdprsup');
    importClassGdprsup('reqGdprsup');
    importClassGdprsup('uriGdprsup');
    importClassGdprsup('htmlGdprsup');
    importClassGdprsup('responseGdprsup');
    importClassGdprsup('fieldAdapterGdprsup');
    importClassGdprsup('validatorGdprsup');
    importClassGdprsup('errorsGdprsup');
    importClassGdprsup('utilsGdprsup');
    importClassGdprsup('modInstallerGdprsup');
	importClassGdprsup('installerDbUpdaterGdprsup');
	importClassGdprsup('dateGdprsup');
	/**
	 * Check plugin version - maybe we need to update database, and check global errors in request
	 */
    installerGdprsup::update();
    errorsGdprsup::init();
    /**
	 * Start application
	 */
    frameGdprsup::_()->parseRoute();
    frameGdprsup::_()->init();
    frameGdprsup::_()->exec();

	//var_dump(frameGdprsup::_()->getActivationErrors()); exit();
