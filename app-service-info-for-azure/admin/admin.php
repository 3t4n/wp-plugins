<?php
/*
  Copyright 2016 Haig Didizian

  This file is part of App Service Info for Azure.

  App Service Info for Azure is free software: you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation, either version 2 of the License, or
  (at your option) any later version.

  App Service Info for Azure is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with App Service Info for Azure.  If not, see <http://www.gnu.org/licenses/>.
*/  
  
/*
 * For reference, the status.xml file loads the following information:
 *
 * SimpleXMLElement Object
 * (
 *     [id] => 640de0c121f432597706ba3c50c132be211a1234
 *     [author] => John Doe
 *     [deployer] => Bitbucket
 *     [authorEmail] => john@example.com
 *     [message] => my commit message
 * 
 *     [progress] => SimpleXMLElement Object
 *         (
 *         )
 * 
 *     [status] => Success
 *     [statusText] => SimpleXMLElement Object
 *         (
 *         )
 * 
 *     [lastSuccessEndTime] => 2016-09-01T15:15:56.7740733Z
 *     [receivedTime] => 2016-09-01T15:15:47.9334918Z
 *     [startTime] => 2016-09-01T15:15:48.0903974Z
 *     [endTime] => 2016-09-01T15:15:56.7740733Z
 *     [complete] => True
 *     [is_temp] => False
 *     [is_readonly] => False
 * )
**/

require(dirname(__FILE__) . '/../classes/app-service-deployment-info.php');

// if enabled, the plugin attempts to use wincache (installed by default in
// App Service) to cache the deployment information so that each admin page load
// doesn't trigger an additional file system read. Use with care -- it is possible
// that a deployment won't reset the cache, which would defeat the purpose of the plugin.
// That's why the default, for now, is to turn caching off.
if ( ! defined( 'APPSVC_USE_CACHE' ) ) {
    define("APPSVC_USE_CACHE", false);
}
if ( ! defined( 'APPSVC_DEPLOYMENT_INFO' ) ) {
    define("APPSVC_DEPLOYMENT_INFO_CACHE_KEY", "APPSVC_DEPLOYMENT_INFO");
}

// NOTE: the following two values are specific to the Azure App Service environment
// and can not (to my knowledge) be overridden by the end-user. Modify with care.
if ( ! defined( 'APPSVC_ACTIVE_DEPLOYMENT_DIR' ) ) {
    define("APPSVC_ACTIVE_DEPLOYMENT_DIR", "D:\home\site\deployments");
}

if ( ! defined( 'APPSVC_ACTIVE_DEPLOYMENT_FILE_NAME' ) ) {
    define("APPSVC_ACTIVE_DEPLOYMENT_FILE_NAME", "active");
}

// checks a server variable to make sure we're running 
// on Azure App Service
function appsvc_is_azure() {
  return array_key_exists('APP_POOL_ID', $_SERVER);
}

// azure app service has wincache installed
// use that to cache the deployment info, if enabled
function appsvc_has_wincache() {
  return function_exists('wincache_ucache_exists');
}

// retrieves the XML deployment information for the current 
// deployment from cache, or disk
// NOTE: this assumes the cache is cleared on server restart --
// it is not cleared explicitly
function assi_get_deployment_info() {
  if ( APPSVC_USE_CACHE && appsvc_has_wincache() && wincache_ucache_exists(APPSVC_DEPLOYMENT_INFO_CACHE_KEY) ) {
    $info = wincache_ucache_get(APPSVC_DEPLOYMENT_INFO_CACHE_KEY);
    
    if ($info != NULL) {  
      return $info;
    }
  }
  
  $deployment_id = trim(file_get_contents(APPSVC_ACTIVE_DEPLOYMENT_DIR . "/" . APPSVC_ACTIVE_DEPLOYMENT_FILE_NAME));
  
  $xml = simplexml_load_file(APPSVC_ACTIVE_DEPLOYMENT_DIR . "/$deployment_id/status.xml");
  
  // convert to a simple object (the XML object can't be serialized to wincache)
  $obj = new AppServiceDeploymentInfo($xml);
  
  if ( APPSVC_USE_CACHE && appsvc_has_wincache() ) {
    wincache_ucache_set(APPSVC_DEPLOYMENT_INFO_CACHE_KEY, $obj);
  }
  
  return $obj;
}

// gets deployment info from azure app service, or
// an err message if this is not azure app service
function appsvc_get_deployment_info() {
  if ( appsvc_is_azure() ) {
    return assi_get_deployment_info();
  } else {
    return "Unknown";
  }  
}

// append our deployment information into the footer
function appsvc_admin_footer_function($str) {
	$info = appsvc_get_deployment_info();
  
	if ( is_a($info, 'AppServiceDeploymentInfo' ) ) { 
    $time_str = strftime('%c %Z', $info->endTime);
    
    $info_html = <<<INFO
      <div id="appsvc-more-info-box" style="display: none"> 
        <h4>Azure App Service Deployment Info</h4>
        <dl>
          <dt>Deployment Data</dt>
          <dd>$time_str</dd>
          <dt>Deployment ID</dt>
          <dd>{$info->id}</dd>
          <dt>Author</dt>
          <dd>{$info->author}</dd>
          <dt>Message</dt>
          <dd>{$info->message}</dd>
        </dl>
      </div>
      $time_str
      <img id="appsvc-more-info-icon" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABmJLR0QAAAAAAAD5Q7t/AAAACXBIWXMAARCQAAEQkAGJrNK4AAAAB3RJTUUH4AkBEwgSSjxSXwAAASlJREFUOMuFk7FKA0EQhr/bysPOWlJrFxhBLEzhC1jmChHsLWxiJ0J8AR/DKwWtBVNo80NAfIB4pbXmwMZmTtZlLxlYFuaff3Z2Zv6CxMwMSZjZBjB091xS22GxhZjoNjazBbAEXvws3TdOYimSV5+BQ1bbTNKo4xRRBX3kG+AM2E6TABRezhi4y5Cnkq7NbB94TbAKqLsvLIBBJsE3MPEK9hKskTQovNvLDPkdeACOgZ2efpQhGlVsX8ATcCVpd0VDh6EH2ATOJf2smQgBmPdgb96fkxX8eZDUAh8Z8N7vox5yI6kNPsbLTMCn3wIeM/jEzNYu0i2wBZzmtvFPC76WI2CWBF70kTs9BKDTQZekAprcn4Eq1sE/NUYyrSUNgBI48FO6r05i+QWQNnlEjJt73wAAAABJRU5ErkJggg=="/>
INFO;
	} else {
	  // if not XML, assume string or something 
	  // that casts to a string
	  $info_html = $info;
	}
	
	$new_str = $str . <<<HTML
	  <div class="appsvc-footer">
	    <strong>App Service Deployment:</strong> 
      $info_html 
	  </div>
HTML;

  wp_enqueue_style('appsvc-style', plugins_url('../css/style.css', __FILE__));
  wp_enqueue_script('appsvc-script', plugins_url('../js/main.js', __FILE__));

  return $new_str;
}

add_filter('admin_footer_text', 'appsvc_admin_footer_function');

?>
