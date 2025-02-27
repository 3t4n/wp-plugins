=== Filename based asset cache busting ===
Contributors: benlumley, ocean90
Tags: assets, asset, css, js, version, cache, busting, cachebusting, shift refresh, force refresh, hard refresh, pagespeed
Requires at least: 3.0.1
Tested up to: 5.4
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Filename based cache busting for WordPress scripts/styles using last modified date.

== Description ==
Filename based cache busting for WordPress scripts/styles using last modified date.

Stop telling clients or users to hard refresh / shift refresh. The url to all of the css/js files on your site will change automatically whenever the files are modified. You can set proper long cache lifetimes to help get top scores on Google Pagespeed without running into cached css/javascript problems.

Based on this gist https://gist.github.com/ocean90/1966227 from Dominik Schilling, I've enhanced it by automatically replacing the asset version with the files modification time and automatically editing htaccess - making it install + forget.

Includes querystring option as a fallback - which works in more scenarios.

== Webservers ==

= Apache =

The plugin should add what it needs to your .htaccess file jsut like WP itself. But if for any reason that doesn't work for you - here's what it adds:

`
# FBACB
<IfModule mod_rewrite.c>
  RewriteEngine On
  RewriteBase /

  RewriteCond %{REQUEST_FILENAME} !-f
  RewriteCond %{REQUEST_FILENAME} !-d
  RewriteRule ^(.+)\.([0-9\.]+)\.(js|css)$ $1.$3 [L]
</IfModule>

# still fbacb
<IfModule mod_expires.c>
    ExpiresActive on
    ExpiresByType text/css                            "access plus 1 year"
    ExpiresByType application/javascript              "access plus 1 year"
</IfModule>
# END FBACB
`

= NGINX =

`
 location ~* ^(.+)\.(?:\d+)\.(min.js|min.css|js|css)($|\?.*$) {
   try_files $uri $1.$2;
 }
`

== Host specific notes ==

Some webhosts need a bit of custom config to get the filename based urls working.

= WP Engine =

To work on WP-Engine, you'll need the following redirect added via my.wpengine -> installname -> Redirect rules

`
 Source: ^(.+)\.([0-9\.]+)\.(js|css)$
 Dest: $1.$3
 Type: break (this is under advanced)
 `

= CloudWays =

Just works.

= Flywheel =

Just works.

= PHP Fallback =

If your webserver is failing to serve assets using url rewriting, the plugin attempts to serve them itsef (ie: via PHP). Obviously this is slow/less than ideal in production (it'll be much slower) - so you should configure your web server correctly to serve the files. If you see this HTTP header "FBACB-Php-Fallback: yes" on your assets, this applies to you.

Note that hosts are increasingly configured to serve css/js directly from disk and won't fall back to PHP + WordPress error handling - this fallback then won't work.
