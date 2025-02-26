<?php
require PYMSEO_PLUGIN_DIR. '/includes/pagina_opciones_general.php';
require PYMSEO_PLUGIN_DIR. '/includes/pagina_opciones_wpo.php';
require PYMSEO_PLUGIN_DIR. '/includes/pagina_opciones_crawl_budget.php';
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
	// MODIFICACIONES HTACESS
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
		array_push($pymlineashtaccessTemp,'<IfModule mod_rewrite.c>');
		array_push($pymlineashtaccessTemp,'RewriteEngine on');
		$pymlineashtaccessTemp = array_merge($pymlineashtaccessTemp, $pymlineashtaccessBlockFile);
		array_push($pymlineashtaccessTemp,'</IfModule>');
	}
	//insert_with_markers( $pymseo_ruta_htaccess, '###### -> pymSEO', $pymlineashtaccessTemp); 

	// ###############################
	// OPTIONS
	// ###############################
	// Upload File types
	// ###############################
		// -> SANITIZE
		$pymseoUploadFile = sanitize_key($_POST['pymseoUploadFile']);
		$pymseoUploadFileSvg = sanitize_key($_POST['pymseoUploadFileSvg']);
		$pymseoUploadFileJson = sanitize_key($_POST['pymseoUploadFileJson']);
		$pymseoUploadFileRar = sanitize_key($_POST['pymseoUploadFileRar']);
		$pymseoUploadFile7z = sanitize_key($_POST['pymseoUploadFile7z']);
		// -> VALIDATE
		$pymseoUploadFile = ('on' == $pymseoUploadFile) ? true: false;
		$pymseoUploadFileSvg = ('on' == $pymseoUploadFileSvg) ? true: false;
		$pymseoUploadFileJson = ('on' == $pymseoUploadFileJson) ? true: false;
		$pymseoUploadFileRar = ('on' == $pymseoUploadFileRar) ? true: false;
		$pymseoUploadFile7z = ('on' == $pymseoUploadFile7z) ? true: false;
		// -> UPDATE
		update_option('pymseoUploadFile', $pymseoUploadFile);
		update_option('pymseoUploadFileSvg', $pymseoUploadFileSvg);
		update_option('pymseoUploadFileJson', $pymseoUploadFileJson);
		update_option('pymseoUploadFileRar', $pymseoUploadFileRar);
		update_option('pymseoUploadFile7z', $pymseoUploadFile7z);
	// ###############################
	// WPO -> Metatags
	// ###############################
		// -> SANITIZE
		$pymseoDisableEmbeds = sanitize_key($_POST['pymseoDisableEmbeds']);
		$pymseoRemoveRSDLink = sanitize_key($_POST['pymseoRemoveRSDLink']);
		$pymseoRemoveShortlink = sanitize_key($_POST['pymseoRemoveShortlink']);
		$pymseoRemoveWlwmanifestLink = sanitize_key($_POST['pymseoRemoveWlwmanifestLink']);
		// -> VALIDATE
		$pymseoDisableEmbeds = ('on' == $pymseoDisableEmbeds) ? true: false;
		$pymseoRemoveRDSLink = ('on' == $pymseoRemoveRDSLink) ? true: false;
		$pymseoRemoveShortlink = ('on' == $pymseoRemoveShortlink) ? true: false;
		$pymseoRemoveWlwmanifestLink = ('on' == $pymseoRemoveWlwmanifestLink) ? true: false;
		// -> UPDATE
		update_option('pymseoDisableEmbeds', $pymseoDisableEmbeds);
		update_option('pymseoRemoveRSDLink', $pymseoRemoveRSDLink);
		update_option('pymseoRemoveShortlink', $pymseoRemoveShortlink);
		update_option('pymseoRemoveWlwmanifestLink', $pymseoRemoveWlwmanifestLink);
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
		$pymseoWPOGoogleFontSwap = sanitize_key($_POST['pymseoWPOGoogleFontSwap']);
		// -> VALIDATE
		$pymseoRemoveQueryString = ('on' == $pymseoRemoveQueryString) ? true: false;
		$pymseoRemoveJqueryMigrate = ('on' == $pymseoRemoveJqueryMigrate) ? true: false;
		$pymseoWPODeferScripts = ('on' == $pymseoWPODeferScripts) ? true: false;
		$pymseoMoveScriptsFooter = ('on' == $pymseoMoveScriptsFooter) ? true: false;
		$pymseoDisableHeartbeat = ('on' == $pymseoDisableHeartbeat) ? true: false;
		$pymseoDisableEmojis = ('on' == $pymseoDisableEmojis) ? true: false;
		$pymseoWPOGoogleFontSwap = ('on' == $pymseoWPOGoogleFontSwap) ? true: false;
		// -> UPDATE
		update_option('pymseoRemoveQueryString', $pymseoRemoveQueryString);
		update_option('pymseoRemoveJqueryMigrate', $pymseoRemoveJqueryMigrate);
		update_option('pymseoMoveScriptsFooter', $pymseoMoveScriptsFooter);
		update_option('pymseoWPODeferScripts', $pymseoWPODeferScripts);
		update_option('pymseoDisableHeartbeat', $pymseoDisableHeartbeat);
		update_option('pymseoDisableEmojis', $pymseoDisableEmojis);
		update_option('pymseoWPOGoogleFontSwap', $pymseoWPOGoogleFontSwap);
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
		$pymseoDisablePageDate = sanitize_key($_POST['pymseoDisablePageDate']);
		$pymseoWPORemoveDatexDays = intval($_POST['pymseoWPORemoveDatexDays']);
		$pymseoWPOnoIndexPage404 = sanitize_key($_POST['pymseoWPOnoIndexPage404']);
		// -> VALIDATE
		$pymseoDisablePageTag = ('on' == $pymseoDisablePageTag) ? true: false;
		$pymseoDisablePageAuthor = ('on' == $pymseoDisablePageAuthor) ? true: false;
		$pymseoDisablePageDate = ('on' == $pymseoDisablePageDate) ? true: false;
		$pymseoWPORemoveDatexDays = ($pymseoWPORemoveDatexDays >= 0 && $pymseoWPORemoveDatexDays <= 730) ? $pymseoWPORemoveDatexDays: 0;
		$pymseoWPOnoIndexPage404 = ('on' == $pymseoWPOnoIndexPage404) ? true: false;
		// -> UPDATE
		update_option('pymseoDisablePageTag', $pymseoDisablePageTag);
		update_option('pymseoDisablePageAuthor', $pymseoDisablePageAuthor);
		update_option('pymseoDisablePageDate', $pymseoDisablePageDate);
		update_option('pymseoWPORemoveDatexDays', $pymseoWPORemoveDatexDays);
	
		update_option('pymseoWPOnoIndexPage404', $pymseoWPOnoIndexPage404);
	// WPO -> Imagenes
	// ###############################
		// -> SANITIZE
		$pymseoActiveLazyLoad = sanitize_key($_POST['pymseoActiveLazyLoad']);
		//$pymseoWPOActivarSubidaSvg = sanitize_key($_POST['pymseoWPOActivarSubidaSvg']);
		$pymseoWPOCompresionImagenes = intval($_POST['pymseoWPOCompresionImagenes']);
		// -> VALIDATE
		$pymseoActiveLazyLoad = ('on' == $pymseoActiveLazyLoad) ? true: false;
		//$pymseoWPOActivarSubidaSvg = ('on' == $pymseoWPOActivarSubidaSvg) ? true: false;
		$pymseoWPOCompresionImagenes = ($pymseoWPOCompresionImagenes >= 0 && $pymseoWPOCompresionImagenes <= 100) ? $pymseoWPOCompresionImagenes: 82;
		
		// -> UPDATE
		update_option('pymseoActiveLazyLoad', $pymseoActiveLazyLoad);
		//update_option('pymseoWPOActivarSubidaSvg', $pymseoWPOActivarSubidaSvg);
		update_option('pymseoWPOCompresionImagenes', $pymseoWPOCompresionImagenes);	
	// WPO -> CDN
	// ###############################
	// -> SANITIZE
		$pymseoCDNEnable = sanitize_key($_POST['pymseoCDNEnable']);
		$pymseoCDNHosts = esc_url($_POST['pymseoCDNHosts'], ['http', 'https']); 
		$pymseoCDNTypeFileCss = sanitize_key($_POST['pymseoCDNTypeFileCss']);
		$pymseoCDNTypeFileJs = sanitize_key($_POST['pymseoCDNTypeFileJs']);
		$pymseoCDNTypeFileImages = sanitize_key($_POST['pymseoCDNTypeFileImages']);
		$pymseoCDNTypeFileVideo = sanitize_key($_POST['pymseoCDNTypeFileVideo']);
	// -> VALIDATE
		$pymseoCDNEnable = ('on' == $pymseoCDNEnable) ? true: false;
		$pymseoCDNTypeFileCss = ('on' == $pymseoCDNTypeFileCss) ? true: false;
		$pymseoCDNTypeFileJs = ('on' == $pymseoCDNTypeFileJs) ? true: false;
		$pymseoCDNTypeFileImages = ('on' == $pymseoCDNTypeFileImages) ? true: false;
		$pymseoCDNTypeFileVideo = ('on' == $pymseoCDNTypeFileVideo) ? true: false;
	// -> UPDATE
		update_option('pymseoCDNEnable', $pymseoCDNEnable);
		update_option('pymseoCDNHosts', $pymseoCDNHosts);
		update_option('pymseoCDNTypeFileCss', $pymseoCDNTypeFileCss);
		update_option('pymseoCDNTypeFileJs', $pymseoCDNTypeFileJs);
		update_option('pymseoCDNTypeFileImages', $pymseoCDNTypeFileImages);
		update_option('pymseoCDNTypeFileVideo', $pymseoCDNTypeFileVideo);
	// ###############################
	// SEGURIDAD
	// ###############################
	// Seguridad -> Esteganografia
	// ###############################
		// -> SANITIZE
		$pymseoRemoveWordPressVersion = sanitize_key($_POST['pymseoRemoveWordPressVersion']);
		$pymseoSeguridadDisableServerSignature = sanitize_key($_POST['pymseoSeguridadDisableServerSignature']);
		$pymseoSeguridadBlockAuthor = sanitize_key($_POST['pymseoSeguridadBlockAuthor']);
		$pymseoSeguridadBlockConfig = sanitize_key($_POST['pymseoSeguridadBlockConfig']);
		$pymseoSeguridadBlockReadmeLicense = sanitize_key($_POST['pymseoSeguridadBlockReadmeLicense']);
		
		// -> VALIDATE
		$pymseoRemoveWordPressVersion = ('on' == $pymseoRemoveWordPressVersion) ? true: false;
		$pymseoSeguridadDisableServerSignature = ('on' == $pymseoSeguridadDisableServerSignature) ? true: false;
		$pymseoSeguridadBlockAuthor = ('on' == $pymseoSeguridadBlockAuthor) ? true: false;
		$pymseoSeguridadBlockConfig = ('on' == $pymseoSeguridadBlockConfig) ? true: false;
		$pymseoSeguridadBlockReadmeLicense = ('on' == $pymseoSeguridadBlockReadmeLicense) ? true: false;
		
		// -> UPDATE
		update_option('pymseoRemoveWordPressVersion', $pymseoRemoveWordPressVersion);
		update_option('pymseoSeguridadDisableServerSignature', $pymseoSeguridadDisableServerSignature);
		update_option('pymseoSeguridadBlockAuthor', $pymseoSeguridadBlockAuthor);
		update_option('pymseoSeguridadBlockConfig', $pymseoSeguridadBlockConfig);
		update_option('pymseoSeguridadBlockReadmeLicense', $pymseoSeguridadBlockReadmeLicense);
		
	// Seguridad -> Esteganografia > Pagina de login
	// ###############################
		// -> SANITIZE
		$pymseoSeguridadTextoErrorLogin = sanitize_text_field($_POST['pymseoSeguridadTextoErrorLogin']);
		$pymseoSeguridadChangeExpireSession = intval($_POST['pymseoSeguridadChangeExpireSession']);
		// -> VALIDATE
		$pymseoSeguridadTextoErrorLogin = empty($pymseoSeguridadTextoErrorLogin) ? '': $pymseoSeguridadTextoErrorLogin; 
		$pymseoSeguridadChangeExpireSession = ($pymseoSeguridadChangeExpireSession >= 0 && $pymseoSeguridadChangeExpireSession <= 14515200) ? $pymseoSeguridadChangeExpireSession: 0;
		// -> UPDATE
		update_option('pymseoSeguridadTextoErrorLogin', $pymseoSeguridadTextoErrorLogin);
		update_option('pymseoSeguridadChangeExpireSession', $pymseoSeguridadChangeExpireSession);
	###############################
	// Seguridad -> Update Jquery
	// ###############################
		// -> SANITIZE
		$pymseoSeguridadUpdateJquery = sanitize_key($_POST['pymseoSeguridadUpdateJquery']);
		$pymseoSeguridadUpdateJqueryVersion = sanitize_text_field($_POST['pymseoSeguridadUpdateJqueryVersion']);
		$pymseoSeguridadUpdateJqueryVersionSlim = sanitize_key($_POST['pymseoSeguridadUpdateJqueryVersionSlim']);
		// -> VALIDATE
		$pymseoSeguridadUpdateJquery = ('on' == $pymseoSeguridadUpdateJquery) ? true: false;
		/*
		if(preg_match("[3|4]\.s*", $pymseoSeguridadUpdateJqueryVersion)) {
			$pymseoSeguridadUpdateJqueryVersionSlim = ('on' == $pymseoSeguridadUpdateJqueryVersionSlim) ? true: false;
		}else{
			$pymseoSeguridadUpdateJqueryVersionSlim = false;
		}
	*/
		$pymseoSeguridadUpdateJqueryVersionSlim = (preg_match("/[3|4]\.s*/i", $pymseoSeguridadUpdateJqueryVersion)) ? (('on' == $pymseoSeguridadUpdateJqueryVersionSlim) ? true: false): false;
		
		//$pymseoSeguridadUpdateJqueryVersionSlim = (preg_match('[3|4]\.s*', trim($pymseoSeguridadUpdateJqueryVersion)) ? true: false;
		//$pymseoSeguridadUpdateJqueryVersionSlim = (strpos(trim($pymseoSeguridadUpdateJqueryVersion), '3.') === 0) ? true: false;

		// -> UPDATE
		update_option('pymseoSeguridadUpdateJquery', $pymseoSeguridadUpdateJquery);
		update_option('pymseoSeguridadUpdateJqueryVersion', $pymseoSeguridadUpdateJqueryVersion);
		update_option('pymseoSeguridadUpdateJqueryVersionSlim', $pymseoSeguridadUpdateJqueryVersionSlim);
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
		$pymseoUXSearchChangingNumberResultsPage = intval($_POST['pymseoUXSearchChangingNumberResultsPage']);
		$pymseoUXRemoveSlugCategory = sanitize_key($_POST['pymseoUXRemoveSlugCategory']);
		$pymseoUXAddMetaViewport = sanitize_key($_POST['pymseoUXAddMetaViewport']);
		$pymseoUXDisableRSSFeeds = sanitize_key($_POST['pymseoUXDisableRSSFeeds']);
		$pymseoUXDDelayPostsFromAppearing = intval($_POST['pymseoUXDDelayPostsFromAppearing']);
		$pymseoUXRSSAddImageFeatured = sanitize_key($_POST['pymseoUXRSSAddImageFeatured']);
		$pymseoDeletePoweredWordpress = sanitize_key($_POST['pymseoDeletePoweredWordpress']);
		$pymseoDeleteThemeLink = sanitize_key($_POST['pymseoDeleteThemeLink']);
	
		
		// -> VALIDATE
		$pymseoUXSearchRedirect = ('on' == $pymseoUXSearchRedirect) ? true: false;
		//$pymseoUXSearchUrlRewrite = $pymseoUXSearchUrlRewrite;
		if (empty($pymseoUXSearchChangingNumberResultsPage)) {
			$pymseoUXSearchChangingNumberResultsPage= get_option('posts_per_page');
		}
		$pymseoUXRemoveSlugCategory = ('on' == $pymseoUXRemoveSlugCategory) ? true: false;
		$pymseoUXAddMetaViewport = ('on' == $pymseoUXAddMetaViewport) ? true: false;
		$pymseoUXDDelayPostsFromAppearing = ($pymseoUXDDelayPostsFromAppearing >= 0 && $pymseoUXDDelayPostsFromAppearing <= 10080) ? $pymseoUXDDelayPostsFromAppearing: 0;
		$pymseoUXDisableRSSFeeds = ('on' == $pymseoUXDisableRSSFeeds) ? true: false;
		$pymseoUXRSSAddImageFeatured = ('on' == $pymseoUXRSSAddImageFeatured) ? true: false;
		$pymseoDeletePoweredWordpress = ('on' == $pymseoDeletePoweredWordpress) ? true: false;
		$pymseoDeleteThemeLink = ('on' == $pymseoDeleteThemeLink) ? true: false;
	
		// -> UPDATE
		update_option('pymseoUXSearchRedirect', $pymseoUXSearchRedirect);
		update_option('pymseoUXSearchUrlRewrite', $pymseoUXSearchUrlRewrite);
		update_option('pymseoUXSearchChangingNumberResultsPage', $pymseoUXSearchChangingNumberResultsPage);
		update_option('pymseoUXRemoveSlugCategory', $pymseoUXRemoveSlugCategory);
		update_option('pymseoUXAddMetaViewport', $pymseoUXAddMetaViewport);
		update_option('pymseoUXDisableRSSFeeds', $pymseoUXDisableRSSFeeds);
		update_option('pymseoUXDDelayPostsFromAppearing', $pymseoUXDDelayPostsFromAppearing);
		update_option('pymseoUXRSSAddImageFeatured', $pymseoUXRSSAddImageFeatured);
		update_option('pymseoDeletePoweredWordpress', $pymseoDeletePoweredWordpress);
		update_option('pymseoDeleteThemeLink', $pymseoDeleteThemeLink);
	
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