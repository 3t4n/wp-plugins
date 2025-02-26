<?php

namespace alpha_cache;

class HtAccess {
	const start_marker = '# START ALPHACACHE';
	const fin_marker = '# END ALPHACACHE';

	private static function getHtaccessPath(): string {
		return ABSPATH . '.htaccess';
	}

	public static function isHtaccessWritable(): bool {
		if (!file_exists(self::getHtaccessPath())) {
			return false;
		}
    $fp = @fopen(self::getHtaccessPath(), "a+");
    if ($fp !== false) {
      fclose($fp);
    }
    return $fp !== false;
	}

  private static function ht_clean(string $ht): string {
		$start = strpos($ht, self::start_marker);
		$out = '';
		if ($start !== false) {
			$out .= substr($ht, 0, $start);
		}

		$fin = strpos($ht, self::fin_marker . PHP_EOL);
		if ($fin !== false) {
			$out .= substr($ht, $fin + strlen(self::fin_marker . PHP_EOL));
		}

		return empty($out) ? $ht : $out;
	}

  public static function ht_update(bool $isACOn, bool $speedExpire, bool $speedDeflate) {
		//update and check .htaccess
		$ht = file_get_contents(self::getHtaccessPath());

		//find host name
		$host = get_option('siteurl');
		if (preg_match('@^https?://(.+)$@is', $host, $m)) {
			$host = $m[1];
		} else {
			$host = $_SERVER['HTTP_HOST'];
		}

		$code = '';

		if ($isACOn) {

			$relative_url = str_replace("\\", '/', substr(dirname(__FILE__), strlen($_SERVER['DOCUMENT_ROOT']) + 1));
			$abs_url = str_replace("\\", '/', ABSPATH) . $relative_url;

			$code .= '
<IfModule mod_rewrite.c>
RewriteEngine On
RewriteBase /
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{HTTP_USER_AGENT} !(facebookexternalhit|WhatsApp|Mediatoolkitbot)
RewriteCond %{REQUEST_METHOD} !POST
RewriteCond %{HTTP:Cookie} !(wordpress_logged_in|wp_woocommerce_session|safirmobilswitcher=mobil)
RewriteCond %{HTTP:Profile} !^[a-z0-9\"]+ [NC]
RewriteCond ' . $abs_url . '/router.php -f
RewriteRule .? /' . $relative_url . '/router.php [L]
</IfModule>';
			if ($speedExpire) {
				$code .= '
<ifModule mod_headers.c>
<FilesMatch "\.(html|htm)$">
Header set Cache-Control "max-age=43200"
</FilesMatch>
<FilesMatch "\.(js|css|txt)$">
Header set Cache-Control "max-age=604800"
</FilesMatch>
<FilesMatch "\.(flv|swf|ico|gif|jpg|jpeg|png)$">
Header set Cache-Control "max-age=2592000"
</FilesMatch>
<FilesMatch "\.(pl|php|cgi|spl|scgi|fcgi)$">
Header unset Cache-Control
</FilesMatch>
</IfModule>
<ifModule mod_expires.c>
ExpiresActive On
ExpiresDefault "access plus 5 seconds"
ExpiresByType image/x-icon "access plus 30 days"
ExpiresByType image/jpeg "access plus 30 days"
ExpiresByType image/png "access plus 30 days"
ExpiresByType image/gif "access plus 30 days"
ExpiresByType image/webp "access plus 30 days"
ExpiresByType application/x-shockwave-flash "access plus 30 days"
ExpiresByType text/css "access plus 30 days"
ExpiresByType text/javascript "access plus 30 days"
ExpiresByType application/javascript "access plus 30 days"
ExpiresByType application/x-javascript "access plus 30 days"
ExpiresByType text/html "access plus 12 hours"
ExpiresByType application/xhtml+xml "access plus 5 minutes"
ExpiresByType application/xml "access plus 5 minutes"
</ifModule>';
			}
			if ($speedDeflate) {
				$code .= '
<IfModule mod_deflate.c>
AddType x-font/woff .woff
AddOutputFilterByType DEFLATE image/svg+xml
AddOutputFilterByType DEFLATE text/plain
AddOutputFilterByType DEFLATE text/html
AddOutputFilterByType DEFLATE text/xml
AddOutputFilterByType DEFLATE text/css
AddOutputFilterByType DEFLATE text/javascript
AddOutputFilterByType DEFLATE application/xml
AddOutputFilterByType DEFLATE application/xhtml+xml
AddOutputFilterByType DEFLATE application/rss+xml
AddOutputFilterByType DEFLATE application/javascript
AddOutputFilterByType DEFLATE application/x-javascript
AddOutputFilterByType DEFLATE application/x-font-ttf
AddOutputFilterByType DEFLATE application/vnd.ms-fontobject
AddOutputFilterByType DEFLATE font/opentype font/ttf font/eot font/otf
<IfModule mod_setenvif.c>
BrowserMatch ^Mozilla/4 gzip-only-text/html
BrowserMatch ^Mozilla/4\.0[678] no-gzip
BrowserMatch \bMSIE !no-gzip !gzip-only-text/html
</IfModule>
</IfModule>';
			}
		}

		if (!empty($code)) {
			$code = self::start_marker
				. $code . PHP_EOL
				. self::fin_marker . PHP_EOL;
		}

    // if code is not in .htaccess
		if (strpos($ht, self::start_marker) === false) {
			if (!empty($code))
				//insert the code
				file_put_contents(self::getHtaccessPath(), $code . $ht);
		} else {
			if (empty($code)) {
				//remove code
				$ht = self::ht_clean($ht);
				file_put_contents(self::getHtaccessPath(), $ht);
			} else {
				if (strpos($ht, $code) === false) {
					//codes differ - update
					$ht = self::ht_clean($ht);
					file_put_contents(self::getHtaccessPath(), $code . $ht);
				}
			}

		}

  }

}
