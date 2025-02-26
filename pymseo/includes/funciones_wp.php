<?php
// ###############################
// FUNCIONES GLOBALES
// ###############################
function fun_pymseo_redirect_301() {
	wp_redirect( home_url() );
	die;
}
function fun_pymseo_eliminamos_las_modificaciones_htaccess() {
	$pymlineashtaccess = '# Optimizaciones eliminadas al desactivar el plugin';

	insert_with_markers( $pymseo_ruta_htaccess, '###### -> pymSEO', $pymlineashtaccess ); // https://developer.wordpress.org/reference/functions/insert_with_markers/
}


function callback($bufer)
{
	// OPTIMIZACIONES TEMAS
	$theme = wp_get_theme(); // gets the current theme
	// TEMA Baskerville
	if ( 'Baskerville' == $theme->name || 'Baskerville' == $theme->parent_theme ) {
		// Eliminar todo author
		if (get_option('pymseoDisablePageAuthor')) {
			//$bufer=preg_replace('/<div class="post-author"(.*?)<\/div>/','', $bufer);
			//$bufer=preg_replace('/<div class="post-author"(.*?)<\/div>/','<div class="post-author"></div>', $bufer);
			
		}
		// Eliminar la fecha
		if (get_option('pymseoWPORemoveDatexDays')) {
			$bufer=preg_replace('/<[p|a] class="post-date"(.*?)<\/[p|a]>/','', $bufer);
		}
		// Eliminamos Funciona con wordpress
		if (get_option('pymseoDeletePoweredWordpress')) {
			$bufer=preg_replace('/<span>(.*?)WordPress<\/a><\/span>/','', $bufer);
		}
		// Eliminamos Tema realizado por
		if (get_option('pymseoDeleteThemeLink')) {
			$bufer=preg_replace('/<span(.*?)Anders Noren<\/a>(.*?)<\/span>/','', $bufer);
		}
		
	}
	// TEMA Uncode
	if ( 'Uncode' == $theme->name || 'Uncode' == $theme->parent_theme ) {
		if (get_option('pymseoDisablePageAuthor')) {
			$bufer=preg_replace('/<div class="author-info"(.*?)<\/div>/','', $bufer);
		}
	}
	// TEMA Twenty Twenty
	if ( 'twentytwenty' == $theme->name || 'twentytwenty' == $theme->parent_theme ) {
		// Eliminamos Fecha
		if (get_option('pymseoWPORemoveDatexDays')) {
			$bufer=preg_replace('/<li class="post-date meta-wrapper"(.*?)<\/li>/','', $bufer);
		}
		// Eliminamos Author
		if (get_option('pymseoDisablePageAuthor')) {
			$bufer=preg_replace('/<li class="post-author meta-wrapper"(.*?)<\/li>/','', $bufer);
		}
		// Eliminamos Funciona con wordpress
		if (get_option('pymseoDeletePoweredWordpress')) {
			$bufer=preg_replace('/<p class="powered-by-wordpress"(.*?)<\/p>/','', $bufer);
		}
	}
	
	// Eliminamos el metaviewport actual si lo hay
	if (get_option('pymseoUXAddMetaViewport')) {
		//$bufer=preg_replace('/<meta name="viewport" content="(.*?)">/','', $bufer);
	}
	if (get_option('pymseoWPOGoogleFontSwap')) {
		// Remove existing display swaps
    	$bufer = str_replace("&#038;display=swap", "", $bufer);
		// Add font-display=swap as a querty parameter to Google fonts
		$bufer = str_replace("googleapis.com/css?family", "googleapis.com/css?display=swap&family", $bufer);
		// Fix for Web Font Loader
		$bufer = preg_replace("/(WebFontConfig\['google'\])(.+[\w])(.+};)/", '$1$2&display=swap$3', $bufer);
	}
	return $bufer;
}

if(!is_admin()) ob_start("callback");






// ###############################
// Add CSS Custom
// ###############################
add_action( 'wp_enqueue_scripts', 'fun_pymseo_custom_css', 10, 1 );
function fun_pymseo_custom_css() {
	if (get_option('pymseoGdprEnable')) {
		$pymseo_custom_css .= file_get_contents(PYMSEO_PLUGIN_DIR. '/js/cookieconsent/cookieconsent.min.css');
	}
	wp_register_style( 'pymseo-custom', false );
	wp_enqueue_style( 'pymseo-custom' );
	wp_add_inline_style( 'pymseo-custom', $pymseo_custom_css );
}
// ###############################
// FUNCIONES OPCIONES
// ###############################


if (get_option('pymseoUploadFile')) {require PYMSEO_PLUGIN_DIR. '/includes/lib/upload_file_type.php';}

if (get_option('pymseoDisableEmbeds')) {require PYMSEO_PLUGIN_DIR. '/includes/lib/disable_embeds.php';}

if (get_option('pymseoWPOMinifyHTML')) {require PYMSEO_PLUGIN_DIR. '/includes/lib/minify_html.php';}
if (get_option('pymseoWPOActivarCacheNavegador')) {require PYMSEO_PLUGIN_DIR. '/includes/lib/enable_cache_expires.php';}
if (get_option('pymseoWPODeferScripts')) {require PYMSEO_PLUGIN_DIR. '/includes/lib/enable_defer_scripts_js.php';}
if (get_option('pymseoWPORemoveDatexDays')) {require PYMSEO_PLUGIN_DIR. '/includes/lib/remove_date_x_days.php';}

if (get_option('pymseoRemoveJqueryMigrate')) { require PYMSEO_PLUGIN_DIR. '/includes/lib/remove_jquery_migrate.php';}
if (get_option('pymseoRemoveShortlink')) {require PYMSEO_PLUGIN_DIR. '/includes/lib/remove_short_link.php';}

if (get_option('pymseoCDNEnable')) {require PYMSEO_PLUGIN_DIR. '/includes/lib/enable_cdn.php';}

if (get_option('pymseoMoveScriptsFooter')) {require PYMSEO_PLUGIN_DIR. '/includes/lib/move_scripts_to_footer.php';}
if (get_option('pymseoRemoveRSDLink')) {require PYMSEO_PLUGIN_DIR. '/includes/lib/remove_rsd_link.php';}
if (get_option('pymseoRemoveWlwmanifestLink')) {require PYMSEO_PLUGIN_DIR. '/includes/lib/remove_wlwmanifest_link.php';}
if (get_option('pymseoGdprEnable')) {require PYMSEO_PLUGIN_DIR. '/includes/lib/enable_cookie_consent.php';}
if (get_option('pymseoDisablePageAuthor')) {require PYMSEO_PLUGIN_DIR. '/includes/lib/disable_author_page.php';}
if (get_option('pymseoDisablePageTag')) {require PYMSEO_PLUGIN_DIR. '/includes/lib/disable_tag_page.php';}
if (get_option('pymseoDisablePageDate')) {require PYMSEO_PLUGIN_DIR. '/includes/lib/disable_date_page.php';}

if (get_option('pymseoRemoveWordPressVersion')) {require PYMSEO_PLUGIN_DIR. '/includes/lib/remove_wordpress_version.php';}
if (get_option('pymseoSeguridadChangeExpireSession')) {require PYMSEO_PLUGIN_DIR. '/includes/lib/change_expire_session.php';}
if (get_option('pymseoSeguridadDisableServerSignature')) {require PYMSEO_PLUGIN_DIR. '/includes/lib/disable_server_signature.php';}
if (get_option('pymseoSeguridadTextoErrorLogin')) {require PYMSEO_PLUGIN_DIR. '/includes/lib/change_wordpress_login_error_message.php';}
if (get_option('pymseoSeguridadUpdateJquery')) {require PYMSEO_PLUGIN_DIR. '/includes/lib/update_jquery.php';}
if (get_option('pymseoSeguridadDesactivarPingbacks')) {require PYMSEO_PLUGIN_DIR. '/includes/lib/disable_pingbacks.php';}
if (get_option('pymseoRemoveRESTAPILinks')) {require PYMSEO_PLUGIN_DIR. '/includes/lib/remove_rest_api_links.php';}
if (get_option('pymseoDisableXMLRPC')) {require PYMSEO_PLUGIN_DIR. '/includes/lib/disable_xml_rpc_ping.php';}
//if (get_option('pymseoSeguridadDesactivarAutentificarseXMLRPC')) {require PYMSEO_PLUGIN_DIR. '/includes/lib/disable_xml_rpc_login.php';}
if (get_option('pymseoSeguridadBlockConfig')) {require PYMSEO_PLUGIN_DIR. '/includes/lib/block_file_config.php';}
if (get_option('pymseoSeguridadBlockReadmeLicense')) {require PYMSEO_PLUGIN_DIR. '/includes/lib/block_file_readme_license.php';}
if (get_option('pymseoSeguridadBlockAuthor')) {require PYMSEO_PLUGIN_DIR. '/includes/lib/block_file_author.php';}

if (get_option('pymseoUXSearchUrlRewrite')) {require PYMSEO_PLUGIN_DIR. '/includes/lib/change_search_url_rewrite.php';}
if (get_option('pymseoUXSearchChangingNumberResultsPage')>10) { require PYMSEO_PLUGIN_DIR. '/includes/lib/change_number_of_search_results.php';}
if (get_option('pymseoUXSearchRedirect')) {require PYMSEO_PLUGIN_DIR. '/includes/lib/redirect_when_search_only_returns_one_match.php';}
if (get_option('pymseoUXRemoveSlugCategory')) {require PYMSEO_PLUGIN_DIR. '/includes/lib/remove_category_url.php';}
if (get_option('pymseoUXAddMetaViewport')) {require PYMSEO_PLUGIN_DIR. '/includes/lib/add_metaviewport.php';}

if (get_option('pymseoRemoveQueryString')) {require PYMSEO_PLUGIN_DIR. '/includes/lib/remove_querystring.php';}
if (get_option('pymseoActiveLazyLoad')) {require PYMSEO_PLUGIN_DIR. '/includes/lib/enable_lazyload.php';}
if (get_option('pymseoDisableEmojis')) {require PYMSEO_PLUGIN_DIR. '/includes/lib/disable_emojis.php';}
if (get_option('pymseoDisableHeartbeat')) {require PYMSEO_PLUGIN_DIR. '/includes/lib/disable_heartbeat.php';}

if (get_option('pymseoUXDisableRSSFeeds')) {
	require PYMSEO_PLUGIN_DIR. '/includes/lib/disable_rss.php';
}else{
	if (get_option('pymseoUXRSSAddImageFeatured')) { require PYMSEO_PLUGIN_DIR. '/includes/lib/add_featured_image_in_rss_feed_publications.php'; }
	if (get_option('pymseoUXDDelayPostsFromAppearing')) { require PYMSEO_PLUGIN_DIR. '/includes/lib/delay_posts_rss_feed.php'; }
}


?>