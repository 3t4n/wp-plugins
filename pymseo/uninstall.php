<?php
// if uninstall.php is not called by WordPress, die
// Revisa https://developer.wordpress.org/plugins/plugin-basics/uninstall-methods/
if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}
// ###############################
// OPTIONS
// ###############################
// Upload File Type
// ###############################
unset($pymseoUploadFileSvg,$pymseoUploadFileJson,$pymseoUploadFileRar,$pymseoUploadFile7z);

delete_option('pymseoUploadFileSvg');
delete_option('pymseoUploadFileJson');
delete_option('pymseoUploadFileRar');
delete_option('pymseoUploadFile7z');
// ###############################
// WPO -> Metatags
// ###############################
unset($pymseoDisableEmbeds,$pymseoRemoveRDSLink,$pymseoRemoveShortlink,$pymseoRemoveWlwmanifestLink);

delete_option('pymseoDisableEmbeds');
delete_option('pymseoRemoveRDSLink');
delete_option('pymseoRemoveShortlink');
delete_option('pymseoRemoveWlwmanifestLink');

// ###############################
// Seguridad
// ###############################
// Seguridad -> Esteganografía
// ###############################
unset($pymseoRemoveWordPressVersion,$pymseoSeguridadDisableServerSignature,$pymseoSeguridadBlockAuthor,$pymseoSeguridadBlockReadmeLicense,$pymseoSeguridadBlockConfig);

delete_option('pymseoRemoveWordPressVersion');
delete_option('pymseoSeguridadDisableServerSignature');
delete_option('pymseoSeguridadBlockAuthor');
delete_option('pymseoSeguridadBlockConfig');
delete_option('pymseoSeguridadBlockReadmeLicense');
// ###############################
// Seguridad -> Esteganografía > Pagina de login
// ###############################
unset($pymseoSeguridadTextoErrorLogin,$pymseoSeguridadChangeExpireSession);

delete_option('pymseoSeguridadTextoErrorLogin');
delete_option('pymseoSeguridadChangeExpireSession');
// ###############################
// Seguridad -> Actualizar version Jquery
// ###############################
unset($pymseoSeguridadUpdateJquery,$pymseoSeguridadUpdateJqueryVersion,$pymseoSeguridadUpdateJqueryVersionSlim);

delete_option('pymseoSeguridadUpdateJquery');
delete_option('pymseoSeguridadUpdateJqueryVersion');
delete_option('pymseoSeguridadUpdateJqueryVersionSlim');

// ###############################
// Seguridad -> Otros
// ###############################
unset($pymseoSeguridadDesactivarPingbacks,$pymseoSeguridadDesactivarAutentificarseXMLRPC,$pymseoDisableXMLRPC,$pymseoRemoveRESTAPILinks);

delete_option('pymseoSeguridadDesactivarPingbacks');
delete_option('pymseoSeguridadDesactivarAutentificarseXMLRPC');
delete_option('pymseoDisableXMLRPC');
delete_option('pymseoRemoveRESTAPILinks');

// ###############################
// WPO
// ###############################
// WPO -> Performance
// ###############################
unset($pymseoRemoveQueryString,$pymseoRemoveJqueryMigrate,$pymseoMoveScriptsFooter,$pymseoWPODeferScripts,$pymseoDisableHeartbeat,$pymseoDisableEmojis,$pymseoWPOGoogleFontSwap);

delete_option('pymseoRemoveQueryString');
delete_option('pymseoRemoveJqueryMigrate');
delete_option('pymseoMoveScriptsFooter');
delete_option('pymseoWPODeferScripts');
delete_option('pymseoDisableHeartbeat');
delete_option('pymseoDisableEmojis');
delete_option('pymseoWPOGoogleFontSwap');
// ###############################
// WPO -> Minify HTML
// ###############################
unset($pymseoWPOMinifyHTML,$pymseoWPOMinifyInlineJavaScript,$pymseoWPORemoveCommentsHTML);

delete_option('pymseoWPOMinifyHTML');
delete_option('pymseoWPOMinifyInlineJavaScript');
delete_option('pymseoWPORemoveCommentsHTML');
// ###############################
// WPO -> Cache
// ###############################
unset($pymseoWPOActivarCacheNavegador);

delete_option('pymseoWPOActivarCacheNavegador');
// ###############################
// WPO -> Crawl Budget
// ###############################
unset($pymseoDisablePageTag,$pymseoDisablePageAuthor,$pymseoDisablePageDate,$pymseoWPORemoveDatexDays,$pymseoWPOnoIndexPage404);

delete_option('pymseoDisablePageTag');
delete_option('pymseoDisablePageAuthor');
delete_option('pymseoDisablePageDate');
delete_option('pymseoWPORemoveDatexDays');
delete_option('pymseoWPOnoIndexPage404');
// ###############################
// WPO -> Imagenes
// ###############################
unset($pymseoActiveLazyLoad,$pymseoWPOCompresionImagenes);

delete_option('pymseoActiveLazyLoad');
delete_option('pymseoWPOCompresionImagenes');
// ###############################
// WPO -> CDN
// ###############################
unset($pymseoCDNEnable,$pymseoCDNHosts,$pymseoCDNTypeFileCss,$pymseoCDNTypeFileJs,$pymseoCDNTypeFileImages,$pymseoCDNTypeFileVideo);

delete_option('pymseoCDNEnable');
delete_option('pymseoCDNHosts');
delete_option('pymseoCDNTypeFileCss');
delete_option('pymseoCDNTypeFileJs');
delete_option('pymseoCDNTypeFileImages');
delete_option('pymseoCDNTypeFileVideo');
// ###############################
// UX UI
// ###############################
// UX UI -> Buscador
// ###############################
unset($pymseoUXSearchRedirect,$pymseoUXSearchUrlRewrite,$pymseoUXAddMetaViewport,$pymseoUXSearchChangingNumberResultsPage);

delete_option('pymseoUXSearchChangingNumberResultsPage');
delete_option('pymseoUXSearchRedirect');
delete_option('pymseoUXSearchUrlRewrite');
delete_option('pymseoUXAddMetaViewport');

// ###############################
// UX UI -> Others
// ###############################
unset($pymseoDeletePoweredWordpress,$pymseoDeleteThemeLink);

delete_option('pymseoDeletePoweredWordpress');
delete_option('pymseoDeleteThemeLink');

// ###############################
// UX UI -> Categorias
// ###############################
unset($pymseoUXRemoveSlugCategory);

delete_option('pymseoUXRemoveSlugCategory');
// ###############################
// UX UI -> Categorias
// ###############################
unset($pymseoUXDDelayPostsFromAppearing,$pymseoUXDisableRSSFeeds);

delete_option('pymseoUXDDelayPostsFromAppearing');
delete_option('pymseoUXDisableRSSFeeds');
// ###############################
// GDPR COOKIES
// ###############################
unset($pymseoGdprEnable,$pymseoGdprTextButton,$pymseoGdprText,$pymseoGdprTextMoreInfo,$pymseoGdprLinkMoreInfo);

delete_option('pymseoGdprEnable');
delete_option('pymseoGdprTextButton');
delete_option('pymseoGdprText');
delete_option('pymseoGdprTextMoreInfo');
delete_option('pymseoGdprLinkMoreInfo');

// ###############################
// JS
// ###############################
unset($pymseoJSEstadisticas);

delete_option('pymseoJSEstadisticas');



// ###############################
// DESACTIVAMOS LAS MODIFICACIONES DEL HTACCESS
// ###############################
register_deactivation_hook( __FILE__, 'fun_pymseo_eliminamos_las_modificaciones_htaccess' );


// ###############################
// VARIABLES ANTIGUAS
// ###############################
unset($pymseoDisableRSSFeeds);

delete_option('pymseoDisableRSSFeeds');
?>