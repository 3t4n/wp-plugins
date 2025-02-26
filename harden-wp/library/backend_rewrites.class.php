<?php
/**
 * Backend Rewrites
 * 
 * @author Justin Greer
 */

class harden_backend_rewrites {
	
	/**
	 * URL to use for the rewrites
	 */
	const BASEURL = HARDENPACK_BASEURL;
	
	public function genKey(){
		
	}


	public function rewriteContent(){
		
		$randomKey = get_option('hardenwp_random_key');
		
		return  '
# Harden WP Rewrite Rules For WordPress Backend
<IfModule mod_rewrite.c>
	RewriteEngine On
	RewriteRule ^login/?$ /wp-login.php?'.$randomKey.' [R,L]
	RewriteCond %{HTTP_COOKIE} !^.*wordpress_logged_in_.*$
	RewriteRule ^admin/?$ /wp-login.php?'.$randomKey.'&redirect_to=/wp-admin/ [R,L]
	RewriteRule ^admin/?$ /wp-admin/?'.$randomKey.' [R,L]
	RewriteRule ^register/?$ /wp-login.php?'.$randomKey.'&action=register [R,L]
	RewriteCond %{SCRIPT_FILENAME} !^(.*)admin-ajax\.php
	RewriteCond %{HTTP_REFERER} !^(.*)'.self::BASEURL.'/wp-admin
	RewriteCond %{HTTP_REFERER} !^(.*)'.self::BASEURL.'/wp-login\.php
	RewriteCond %{HTTP_REFERER} !^(.*)'.self::BASEURL.'/login
	RewriteCond %{HTTP_REFERER} !^(.*)'.self::BASEURL.'/admin
	RewriteCond %{HTTP_REFERER} !^(.*)'.self::BASEURL.'/register
	RewriteCond %{QUERY_STRING} !^'.$randomKey.'
	RewriteCond %{QUERY_STRING} !^action=logout
	RewriteCond %{QUERY_STRING} !^action=rp
	RewriteCond %{QUERY_STRING} !^action=register
	RewriteCond %{QUERY_STRING} !^action=postpass
	RewriteCond %{HTTP_COOKIE} !^.*wordpress_logged_in_.*$
	RewriteRule ^.*wp-admin/?|^.*wp-login\.php / [R,L]
	RewriteCond %{QUERY_STRING} ^loggedout=true
	RewriteRule ^.*$ /wp-login.php?'.$randomKey.' [R,L]
</IfModule>
';
	}

	/**
	 * Enables the Backend Rewrite Rules to be add to the .htaccess file
	 * 
	 * @return Boolean True if the the content was written to the
	 */
	public function output(){
	
		// Start the output of the 
		return $this->rewriteContent();
	}
	
}