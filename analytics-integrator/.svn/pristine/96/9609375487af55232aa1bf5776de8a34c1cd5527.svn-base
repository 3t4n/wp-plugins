<?php

/**
 * Analytics integrator
 *
 * @package Analytics integrator
 * @author Replay
 * @license GNU General Public License, version 3
 *
 * @wordpress-plugin
 * Plugin Name: Analytics integrator
 * Description: Integrate your favourite session recording and analytics tool with ease. This plugin allows you to integrate the most popular services: <strong>Google Analytics, Smartlook, Fullstory, Hotjar and  Mouseflow</strong>. Easy integration – <strong>just put the tracking ID and you are ready to go</strong>.
 * Version: 1.0.0
 * Requires at least: 5.0
 * Requires PHP: 5.6
 * Author: Replay
 * License: GPLv3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 */

function analytics_integrator_render_settings_page() {
	require_once plugin_dir_path( __FILE__ ) . './settings.php';
}

function analytics_integrator_register_settings_page() {
	add_options_page(
		'Analytics integrator',
		 'Analytics integrator',
		'manage_options',
		'analytics_integrator_settings',
		'analytics_integrator_render_settings_page'
	);
}

function analytics_integrator_register_settings() {
	register_setting( 'analytics-integrator-google-analytics', 'analytics-integrator-google-analytics-id' );
	register_setting( 'analytics-integrator-fullstory', 'analytics-integrator-fullstory-id' );
	register_setting( 'analytics-integrator-hotjar', 'analytics-integrator-hotjar-id' );
	register_setting( 'analytics-integrator-mouseflow', 'analytics-integrator-mouseflow-id' );
	register_setting( 'analytics-integrator-smartlook', 'analytics-integrator-smartlook-id' );
}

function analytics_integrator_insert_scripts() {
	if ( is_admin() ) {
		return;
	}

	$hotjar_id = trim( get_option( 'analytics-integrator-hotjar-id' ) );
	if ( $hotjar_id ) {
		echo '
		<script>
			(function(h,o,t,j,a,r){
				h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
				h._hjSettings={hjid:' . esc_attr($hotjar_id) . ',hjsv:5};
				a=o.getElementsByTagName("head")[0];
				r=o.createElement("script");r.async=1;
				r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
				a.appendChild(r);
			})(window,document,"//static.hotjar.com/c/hotjar-",".js?sv=");
		</script>
		';


	}

	$smartlook_id = trim( get_option( 'analytics-integrator-smartlook-id' ) );
	if ( $smartlook_id ) {
		echo "
		<script type='text/javascript'>
		  window.smartlook||(function(d) {
		    var o=smartlook=function(){ o.api.push(arguments)},h=d.getElementsByTagName('head')[0];
		    var c=d.createElement('script');o.api=new Array();c.async=true;c.type='text/javascript';
		    c.charset='utf-8';c.src='https://web-sdk.smartlook.com/recorder.js';h.appendChild(c);
		    })(document);
		    smartlook('init', '" . esc_attr($smartlook_id) . "', { region: 'eu' });
		</script>
		";
	}

	$fullstory_id = trim( get_option( 'analytics-integrator-fullstory-id' ) );
	if ( $fullstory_id ) {
		echo '
			<script>
			window["_fs_host"] = "fullstory.com";
			window["_fs_script"] = "edge.fullstory.com/s/fs.js";
			window["_fs_org"] = "' . esc_attr($fullstory_id) . '";
			window["_fs_namespace"] = "FS";
			(function(m,n,e,t,l,o,g,y){
			    if (e in m) {if(m.console && m.console.log) { m.console.log(\'FullStory namespace conflict. Please set window["_fs_namespace"].\');} return;}
			    g=m[e]=function(a,b,s){g.q?g.q.push([a,b,s]):g._api(a,b,s);};g.q=[];
			    o=n.createElement(t);o.async=1;o.crossOrigin="anonymous";o.src="https://" +_fs_script;
			    y=n.getElementsByTagName(t)[0];y.parentNode.insertBefore(o,y);
			    g.identify=function(i,v,s){g(l,{uid:i},s);if(v)g(l,v,s)};g.setUserVars=function(v,s){g(l,v,s)};g.event=function(i,v,s){g("event",{n:i,p:v},s)};
			    g.anonymize=function(){g.identify(!!0)};
			    g.shutdown=function(){g("rec",!1)};g.restart=function(){g("rec",!0)};
			    g.log = function(a,b){g("log",[a,b])};
			    g.consent=function(a){g("consent",!arguments.length||a)};
			    g.identifyAccount=function(i,v){o="account";v=v||{};v.acctId=i;g(o,v)};
			    g.clearUserCookie=function(){};
			    g.setVars=function(n, p){g("setVars",[n,p]);};
			    g._w={};y="XMLHttpRequest";g._w[y]=m[y];y="fetch";g._w[y]=m[y];
			    if(m[y])m[y]=function(){return g._w[y].apply(this,arguments)};
			    g._v="1.3.0";
			})(window,document,window["_fs_namespace"],"script","user");
			</script>
		';
	}

	$mouseflow_id = trim( get_option( 'analytics-integrator-mouseflow-id' ) );
	if ( $mouseflow_id ) {
		echo '
		<script type="text/javascript">
	        window._mfq = window._mfq || [];
	        (function() {
	           var mf = document.createElement("script");
	           mf.type = "text/javascript"; mf.defer = true;
	           mf.src = "//cdn.mouseflow.com/projects/' . esc_attr($mouseflow_id) . '.js";
				document.getElementsByTagName("head")[0].appendChild(mf);
			    })();
		</script>
  		';
	}

	$google_analytics_id = trim( get_option( 'analytics-integrator-google-analytics-id' ) );
	if ( $google_analytics_id ) {
		echo '
		<script async src="https://www.googletagmanager.com/gtag/js?id='. esc_attr($google_analytics_id) .'"></script>
		<script>
		 window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag("js", new Date());

		  gtag("config", "'. $google_analytics_id .'");
		</script>
  		';
	}
}

function analytics_integrator_add_plugin_link( $plugin_actions, $plugin_file ) {
	if ( 'analytics-integrator/analytics-integrator.php' !== $plugin_file ) {
		return $plugin_actions;
	}

	array_unshift( $plugin_actions, '<a href="/wp-admin/options-general.php?page=analytics_integrator_settings">Settings</a>' );

	return $plugin_actions;
}

add_action( 'admin_init', 'analytics_integrator_register_settings' );
add_action( 'admin_menu', 'analytics_integrator_register_settings_page' );
add_action( 'wp_head', 'analytics_integrator_insert_scripts' );
add_filter( 'plugin_action_links', 'analytics_integrator_add_plugin_link', 10, 2 );
