<?php
require PYMSEO_PLUGIN_DIR. '/includes/pagina_opciones_general.php';
require PYMSEO_PLUGIN_DIR. '/includes/pagina_opciones_wpo.php';
require PYMSEO_PLUGIN_DIR. '/includes/pagina_opciones_estado.php';
require PYMSEO_PLUGIN_DIR. '/includes/pagina_opciones_seguridad.php';
require PYMSEO_PLUGIN_DIR. '/includes/pagina_opciones_gdpr.php';
require PYMSEO_PLUGIN_DIR. '/includes/pagina_opciones_js.php';
require PYMSEO_PLUGIN_DIR. '/includes/pagina_opciones_ux.php';
require PYMSEO_PLUGIN_DIR. '/includes/funciones_wp.php';
if(!function_exists('wp_get_current_user')) { include(ABSPATH . "wp-includes/pluggable.php"); }

// FUNCION PAGINA DE AJUSTES
if(isset($_POST['action']) && $_POST['action'] == "form_guardar_ajustes"){
	// ojo solo en caso de que sea esta accion
	if (!current_user_can('administrator') || !wp_verify_nonce($_GET['nonce'], 'pymseo_nonce')) {
		// redirect to admin page
        $redirect = admin_url();
        wp_safe_redirect($redirect);
         // we are done
        die;
	} 
// ###############################
// HTACESS
// ###############################
	// CREAMOS UNA COPIA del HTACESS
	copy($pymseo_ruta_htaccess, $pymseo_ruta_htaccess . '.bak');

	// Necesario para acceder a la funcion de wordpress de añadir al htacess - https://developer.wordpress.org/reference/functions/insert_with_markers/
	if (!function_exists('insert_with_markers')) {
		require_once ABSPATH . 'wp-admin/includes/misc.php';
	}

	
	// VALIDATE
	// Si algun array no esta vacio, y es un array
	if( !empty($pymlineashtaccessBlockFile) && is_array($pymlineashtaccessBlockFile) ){
		$pymlineashtaccessTemp= array_merge($pymlineashtaccessTemp,$pymlineashtaccessBlockFile);
		$pymlineashtaccessTemp[]= "";
	}
	if( !empty($pymlineashtaccessBlock) && is_array($pymlineashtaccessBlock) ){
		$pymlineashtaccessTemp[] = '<IfModule mod_rewrite.c>';
		$pymlineashtaccessTemp[] = 'RewriteEngine on';
		$pymlineashtaccessTemp= array_merge($pymlineashtaccessTemp,$pymlineashtaccessBlock);
		$pymlineashtaccessTemp[]= '</IfModule>';
	}
	if( !empty($pymlineashtaccessCacheNavegador) && is_array($pymlineashtaccessCacheNavegador) ){
		$pymlineashtaccessTemp= array_merge($pymlineashtaccessTemp,$pymlineashtaccessCacheNavegador);
		$pymlineashtaccessTemp[]= "";
	}
	
	
	$pymlineashtaccess = $pymlineashtaccessTemp;
	//print_r ($pymlineashtaccess);
	insert_with_markers( $pymseo_ruta_htaccess, '###### -> pymSEO', $pymlineashtaccess ); 

	// ###############################
	// OPTIONS
	// ###############################
	// WPO -> Metatags
	// ###############################
		// -> SANITIZE
		$pymseoDisableEmbeds = sanitize_key($_POST['pymseoDisableEmbeds']);
		$pymseoRemoveRSDLink = sanitize_key($_POST['pymseoRemoveRSDLink']);
		$pymseoRemoveShortlink = sanitize_key($_POST['pymseoRemoveShortlink']);
		$pymseoRemoveWlwmanifestLink = sanitize_key($_POST['pymseoRemoveWlwmanifestLink']);
		$pymseoDisableRSSFeeds = sanitize_key($_POST['pymseoDisableRSSFeeds']);
		// -> VALIDATE
		$pymseoDisableEmbeds = ('on' == $pymseoDisableEmbeds) ? true: false;
		$pymseoRemoveRDSLink = ('on' == $pymseoRemoveRDSLink) ? true: false;
		$pymseoRemoveShortlink = ('on' == $pymseoRemoveShortlink) ? true: false;
		$pymseoRemoveWlwmanifestLink = ('on' == $pymseoRemoveWlwmanifestLink) ? true: false;
		$pymseoDisableRSSFeeds = ('on' == $pymseoDisableRSSFeeds) ? true: false;
		// -> UPDATE
		update_option('pymseoDisableEmbeds', $pymseoDisableEmbeds);
		update_option('pymseoRemoveRSDLink', $pymseoRemoveRSDLink);
		update_option('pymseoRemoveShortlink', $pymseoRemoveShortlink);
		update_option('pymseoRemoveWlwmanifestLink', $pymseoRemoveWlwmanifestLink);
		update_option('pymseoDisableRSSFeeds', $pymseoDisableRSSFeeds);
	// ###############################
	// WPO
	// ###############################
	// WPO -> Performance
	// ###############################
		// -> SANITIZE
		$pymseoRemoveQueryString = sanitize_key($_POST['pymseoRemoveQueryString']);
		$pymseoRemoveJqueryMigrate = sanitize_key($_POST['pymseoRemoveJqueryMigrate']);
		$pymseoMoveScriptsFooter = sanitize_key($_POST['pymseoMoveScriptsFooter']);
		$pymseoWPODeferScripts = sanitize_key($_POST['pymseoWPODeferScripts']);
		$pymseoDisableHeartbeat = sanitize_key($_POST['pymseoDisableHeartbeat']);
		$pymseoDisableEmojis = sanitize_key($_POST['pymseoDisableEmojis']);
		// -> VALIDATE
		$pymseoRemoveQueryString = ('on' == $pymseoRemoveQueryString) ? true: false;
		$pymseoRemoveJqueryMigrate = ('on' == $pymseoRemoveJqueryMigrate) ? true: false;
		$pymseoWPODeferScripts = ('on' == $pymseoWPODeferScripts) ? true: false;
		$pymseoMoveScriptsFooter = ('on' == $pymseoMoveScriptsFooter) ? true: false;
		$pymseoDisableHeartbeat = ('on' == $pymseoDisableHeartbeat) ? true: false;
		$pymseoDisableEmojis = ('on' == $pymseoDisableEmojis) ? true: false;
		// -> UPDATE
		update_option('pymseoRemoveQueryString', $pymseoRemoveQueryString);
		update_option('pymseoRemoveJqueryMigrate', $pymseoRemoveJqueryMigrate);
		update_option('pymseoMoveScriptsFooter', $pymseoMoveScriptsFooter);
		update_option('pymseoWPODeferScripts', $pymseoWPODeferScripts);
		update_option('pymseoDisableHeartbeat', $pymseoDisableHeartbeat);
		update_option('pymseoDisableEmojis', $pymseoDisableEmojis);	
	// ###############################
	// WPO -> Minify HTML
	// ###############################
		$pymseoWPOMinifyHTML = sanitize_key($_POST['pymseoWPOMinifyHTML']);
		$pymseoWPOMinifyInlineJavaScript = sanitize_key($_POST['pymseoWPOMinifyInlineJavaScript']);
		$pymseoWPORemoveCommentsHTML = sanitize_key($_POST['pymseoWPORemoveCommentsHTML']);
		// -> VALIDATE
		$pymseoWPOMinifyHTML = ('on' == $pymseoWPOMinifyHTML) ? true: false;
		$pymseoWPOMinifyInlineJavaScript = ('on' == $pymseoWPOMinifyInlineJavaScript) ? true: false;
		$pymseoWPORemoveCommentsHTML = ('on' == $pymseoWPORemoveCommentsHTML) ? true: false;
		// -> UPDATE
		update_option('pymseoWPOMinifyHTML', $pymseoWPOMinifyHTML);
		update_option('pymseoWPOMinifyInlineJavaScript', $pymseoWPOMinifyInlineJavaScript);
		update_option('pymseoWPORemoveCommentsHTML', $pymseoWPORemoveCommentsHTML);
	// ###############################
	// WPO -> Cache
	// ###############################
		$pymseoWPOActivarCacheNavegador = sanitize_key($_POST['pymseoWPOActivarCacheNavegador']);
		// -> VALIDATE
		$pymseoWPOActivarCacheNavegador = ('on' == $pymseoWPOActivarCacheNavegador) ? true: false;
		// -> UPDATE
		update_option('pymseoWPOActivarCacheNavegador', $pymseoWPOActivarCacheNavegador);
	// ###############################
	// WPO -> Crawl Budget
	// ###############################
		// -> SANITIZE
		$pymseoDisablePageTag = sanitize_key($_POST['pymseoDisablePageTag']);
		$pymseoDisablePageAuthor = sanitize_key($_POST['pymseoDisablePageAuthor']);
		$pymseoWPOnoIndexPage404 = sanitize_key($_POST['pymseoWPOnoIndexPage404']);
		// -> VALIDATE
		$pymseoDisablePageTag = ('on' == $pymseoDisablePageTag) ? true: false;
		$pymseoDisablePageAuthor = ('on' == $pymseoDisablePageAuthor) ? true: false;
		$pymseoWPOnoIndexPage404 = ('on' == $pymseoWPOnoIndexPage404) ? true: false;
		// -> UPDATE
		update_option('pymseoDisablePageTag', $pymseoDisablePageTag);
		update_option('pymseoDisablePageAuthor', $pymseoDisablePageAuthor);
		update_option('pymseoWPOnoIndexPage404', $pymseoWPOnoIndexPage404);
	// WPO -> Imagenes
	// ###############################
		// -> SANITIZE
		$pymseoActiveLazyLoad = sanitize_key($_POST['pymseoActiveLazyLoad']);
		$pymseoWPOActivarSubidaSvg = sanitize_key($_POST['pymseoWPOActivarSubidaSvg']);
		$pymseoWPOCompresionImagenes = intval($_POST['pymseoWPOCompresionImagenes']);
		// -> VALIDATE
		$pymseoActiveLazyLoad = ('on' == $pymseoActiveLazyLoad) ? true: false;
		$pymseoWPOActivarSubidaSvg = ('on' == $pymseoWPOActivarSubidaSvg) ? true: false;
		if( in_array($pymseoWPOCompresionImagenes, range(0, 100)) ) {
			$pymseoWPOCompresionImagenes= 82;
		} else {
			// Si no muestra un valor entre 0 y 100 ponemos el de por defecto de wordpress que es 82
			$pymseoWPOCompresionImagenes= 82;
		} 
		// -> UPDATE
		update_option('pymseoActiveLazyLoad', $pymseoActiveLazyLoad);
		update_option('pymseoWPOActivarSubidaSvg', $pymseoWPOActivarSubidaSvg);
		update_option('pymseoWPOCompresionImagenes', $pymseoWPOCompresionImagenes);	
	// WPO -> CDN
	// ###############################
	// -> SANITIZE
		$pymseoCDNEnable = sanitize_key($_POST['pymseoCDNEnable']);
		$pymseoCDNHosts = sanitize_text_field($_POST['pymseoCDNHosts']); // HAY CAMBIAR EL SANITIZE
		//$pymseoCDNHosts = esc_url_raw($_POST['pymseoCDNHosts']);
		//$pymseoCDNHosts = filter_var($_POST['pymseoCDNHosts'], FILTER_VALIDATE_URL, FILTER_FLAG_PATH_REQUIRED);
		//Esto habra que sacarlo a funciones que se encarguen de hacer estas cosas para no tener que estar repitiendo el proceso cada vez que se necesita
		//	$urls = explode(",", $_POST['pymseoCDNHosts']);
		//	$sep = '';
		//	$pymseoCDNHosts = '';
		//	foreach ($urls as $valor) {
		//		$pymseoCDNHosts .= $sep . filter_var(trim($valor), FILTER_VALIDATE_URL, FILTER_FLAG_PATH_REQUIRED);
		//	$sep = ',';
		//}
	// -> VALIDATE
		$pymseoCDNEnable = ('on' == $pymseoCDNEnable) ? true: false;
		//$pymseoCDNHosts = addslashes($pymseoCDNHosts);// ESCAPE - (only for varchar) No need for the moment
	// -> UPDATE
		update_option('pymseoCDNEnable', $pymseoCDNEnable);
		update_option('pymseoCDNHosts', $pymseoCDNHosts);
	
	// ###############################
	// SEGURIDAD
	// ###############################
	// Seguridad -> Esteganografia
	// ###############################
		// -> SANITIZE
		$pymseoRemoveWordPressVersion = sanitize_key($_POST['pymseoRemoveWordPressVersion']);
		$pymseoSeguridadDisableServerSignature = sanitize_key($_POST['pymseoSeguridadDisableServerSignature']);
		$pymseoSeguridadDisableDirectoryBrowsing = sanitize_key($_POST['pymseoSeguridadDisableDirectoryBrowsing']);
		$pymseoSeguridadBlockingAuthorScans = sanitize_key($_POST['pymseoSeguridadBlockingAuthorScans']);
		$pymseoSeguridadProtectReadmeLicense = sanitize_key($_POST['pymseoSeguridadBlockingAuthorScans']);
		$pymseoSeguridadProtectConfig = sanitize_key($_POST['pymseoSeguridadBlockingAuthorScans']);
		// -> VALIDATE
		$pymseoRemoveWordPressVersion = ('on' == $pymseoRemoveWordPressVersion) ? true: false;
		$pymseoSeguridadDisableServerSignature = ('on' == $pymseoSeguridadDisableServerSignature) ? true: false;
		$pymseoSeguridadDisableDirectoryBrowsing = ('on' == $pymseoSeguridadDisableDirectoryBrowsing) ? true: false;
		$pymseoSeguridadBlockingAuthorScans = ('on' == $pymseoSeguridadBlockingAuthorScans) ? true: false;
		$pymseoSeguridadProtectReadmeLicense = ('on' == $pymseoSeguridadProtectReadmeLicense) ? true: false;
		$pymseoSeguridadProtectConfig = ('on' == $pymseoSeguridadProtectConfig) ? true: false;
		// -> UPDATE
		update_option('pymseoRemoveWordPressVersion', $pymseoRemoveWordPressVersion);
		update_option('pymseoSeguridadDisableServerSignature', $pymseoSeguridadDisableServerSignature);
		update_option('pymseoSeguridadDisableDirectoryBrowsing', $pymseoSeguridadDisableDirectoryBrowsing);
		update_option('pymseoSeguridadBlockingAuthorScans', $pymseoSeguridadBlockingAuthorScans);
		update_option('pymseoSeguridadProtectReadmeLicense', $pymseoSeguridadProtectReadmeLicense);
		update_option('pymseoSeguridadProtectConfig', $pymseoSeguridadProtectConfig);
	
	// Seguridad -> Esteganografia > Pagina de login
	// ###############################
		// -> SANITIZE
		$pymseoSeguridadTextoErrorLogin = sanitize_text_field($_POST['pymseoSeguridadTextoErrorLogin']);
		// -> VALIDATE
		if (isset($pymseoSeguridadTextoErrorLogin)) {

			} else {
			$pymseoSeguridadTextoErrorLogin	= "Algo salio mal";
		}
		// -> UPDATE
		update_option('pymseoSeguridadTextoErrorLogin', $pymseoSeguridadTextoErrorLogin);
	###############################
	// Seguridad -> Update Jquery
	// ###############################
		// -> SANITIZE
		$pymseoSeguridadUpdateJquery = sanitize_key($_POST['pymseoSeguridadUpdateJquery']);
		$pymseoSeguridadUpdateJqueryVersion = sanitize_key($_POST['pymseoSeguridadUpdateJqueryVersion']);
		// -> VALIDATE
		$pymseoSeguridadUpdateJquery = ('on' == $pymseoSeguridadUpdateJquery) ? true: false;
		$pymseoSeguridadUpdateJqueryVersion = ('on' == $pymseoSeguridadUpdateJqueryVersion) ? true: false;
		// -> UPDATE
		update_option('pymseoSeguridadUpdateJquery', $pymseoSeguridadUpdateJquery);
		update_option('pymseoSeguridadUpdateJqueryVersion', $pymseoSeguridadUpdateJqueryVersion);
	// ###############################
	// Seguridad -> Otros
	// ###############################
		// -> SANITIZE
		$pymseoDisableXMLRPC = sanitize_key($_POST['pymseoDisableXMLRPC']);
		$pymseoSeguridadDesactivarPingbacks = sanitize_key($_POST['pymseoSeguridadDesactivarPingbacks']);
		$pymseoSeguridadDesactivarAutentificarseXMLRPC = sanitize_key($_POST['pymseoSeguridadDesactivarAutentificarseXMLRPC']);
		$pymseoRemoveRESTAPILinks = sanitize_key($_POST['pymseoRemoveRESTAPILinks']);
		// -> VALIDATE
		$pymseoDisableXMLRPC = ('on' == $pymseoDisableXMLRPC) ? true: false;
		$pymseoRemoveRESTAPILinks = ('on' == $pymseoRemoveRESTAPILinks) ? true: false;
		$pymseoSeguridadDesactivarPingbacks = ('on' == $pymseoSeguridadDesactivarPingbacks) ? true: false;
		$pymseoSeguridadDesactivarAutentificarseXMLRPC = ('on' == $pymseoSeguridadDesactivarAutentificarseXMLRPC) ? true: false;
		// -> UPDATE
		update_option('pymseoDisableXMLRPC', $pymseoDisableXMLRPC);
		update_option('pymseoRemoveRESTAPILinks', $pymseoRemoveRESTAPILinks);
		update_option('pymseoSeguridadDesactivarPingbacks', $pymseoSeguridadDesactivarPingbacks);
		update_option('pymseoSeguridadDesactivarAutentificarseXMLRPC', $pymseoSeguridadDesactivarAutentificarseXMLRPC);
	// ###############################
	// UX UI
	// ###############################
		// -> SANITIZE
		$pymseoUXSearchRedirect = sanitize_key($_POST['pymseoUXSearchRedirect']);
		$pymseoUXSearchUrlRewrite = sanitize_key($_POST['pymseoUXSearchUrlRewrite']);
		$pymseoUXRemoveSlugCategory = sanitize_key($_POST['pymseoUXRemoveSlugCategory']);
		$pymseoUXAddMetaViewport = sanitize_key($_POST['pymseoUXAddMetaViewport']);
	
		// -> VALIDATE
		$pymseoUXSearchRedirect = ('on' == $pymseoUXSearchRedirect) ? true: false;
		$pymseoUXSearchUrlRewrite = $pymseoUXSearchUrlRewrite;
		$pymseoUXRemoveSlugCategory = ('on' == $pymseoUXRemoveSlugCategory) ? true: false;
		$pymseoUXAddMetaViewport = ('on' == $pymseoUXAddMetaViewport) ? true: false;
		// -> UPDATE
		update_option('pymseoUXSearchRedirect', $pymseoUXSearchRedirect);
		update_option('pymseoUXSearchUrlRewrite', $pymseoUXSearchUrlRewrite);
		update_option('pymseoUXRemoveSlugCategory', $pymseoUXRemoveSlugCategory);
		update_option('pymseoUXAddMetaViewport', $pymseoUXAddMetaViewport);
	// ###############################
	// GDPR COOKIES
	// ###############################
		// -> SANITIZE
		$pymseoGdprEnable = sanitize_key($_POST['pymseoGdprEnable']);
		$pymseoGdprText = sanitize_text_field($_POST['pymseoGdprText']);
		$pymseoGdprTextButton = sanitize_text_field($_POST['pymseoGdprTextButton']);
		$pymseoGdprTextMoreInfo = sanitize_text_field($_POST['pymseoGdprTextMoreInfo']);
		$pymseoGdprLinkMoreInfo = sanitize_text_field($_POST['pymseoGdprLinkMoreInfo']);
		// -> VALIDATE
		$pymseoGdprEnable = ('on' == $pymseoGdprEnable) ? true: false;
		$pymseoGdprText = $pymseoGdprText;
		$pymseoGdprTextButton = $pymseoGdprTextButton;
		$pymseoGdprTextMoreInfo = $pymseoGdprTextMoreInfo;
		$pymseoGdprLinkMoreInfo = $pymseoGdprLinkMoreInfo;
		// -> UPDATE
		update_option('pymseoGdprEnable', $pymseoGdprEnable);
		update_option('pymseoGdprText', $pymseoGdprText);
		update_option('pymseoGdprTextButton', $pymseoGdprTextButton);
		update_option('pymseoGdprTextMoreInfo', $pymseoGdprTextMoreInfo);
		update_option('pymseoGdprLinkMoreInfo', $pymseoGdprLinkMoreInfo);
	// ###############################
	// JS
	// ###############################
	// -> SANITIZE
	//$pymseoJSEstadisticas = sanitize_text_field($_POST['pymseoJSEstadisticas']); // HAY UN SANITIZE MEJOR?
	// -> VALIDATE
	// -> UPDATE
	//update_option('pymseoJSEstadisticas', $pymseoJSEstadisticas);
	
	


	
	
	
	
	
	
	
	
	// MENSAJE PANTALLA
	echo ("<div id='setting-error-settings_updated' class='updated settings-error notice is-dismissible'>");
	echo ("<p><strong>Ajustes guardados.</strong></p>");
	echo ("</div>");
}











function pymseo_generate_url_with_nonce($page)
{
	// add query arguments: action, post, nonce
	$url = add_query_arg(
		[
			'nonce'  => wp_create_nonce('pymseo_nonce'),
			'page'   => $page,
		],
		''
	);
	
	return esc_url($url);
}

?>