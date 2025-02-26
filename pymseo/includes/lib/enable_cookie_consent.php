<?php
//###############################
// GDPR COOKIES
//###############################
// ACTIVE Cokkies Consent
// https://cookieconsent.osano.com
// Version 3.11
function fun_pymseo_cookiesconsent_script(){
?>
<script>
<?php require PYMSEO_PLUGIN_DIR. '/js/cookieconsent/cookieconsent.min.js'; ?>
window.cookieconsent.initialise({
"palette": {
"popup": {
  "background": "#252e39"
},
"button": {
  "background": "#0C5B73"
}
},
"content": {
"message": "<?php echo get_option('pymseoGdprText') ?>",
"dismiss": "<?php echo get_option('pymseoGdprTextButton') ?>",
"link": "<?php echo get_option('pymseoGdprTextMoreInfo') ?>",
"href": "<?php echo get_option('pymseoGdprLinkMoreInfo') ?>"
}
});
</script>
	<?php
	}
	add_action( 'wp_footer', 'fun_pymseo_cookiesconsent_script');
	//$pymseoConsoleLog .= "console.log('%cFunción Javascript -> pymSEO -> Cookies Consent v3.1.1 %cCargado ','color: #104E8B;font-weight:bold','color:green;font-weight:bold');"

?>