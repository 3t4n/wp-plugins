<?php
/*
Plugin Name: Alquemie SEO
Plugin URI: http://www.alquemie.net
Description: Complete Search Engine Optimization for your Wordpress website and blog.  Features include a code inserter, optimized meta title, keywords and description tags, robot tag editor, follow/no follow specifications, breadcrumb generator, search engine prevent from indexing rule specifier, canonical URLs and much more.
Version: 2.01
Author: Alquemie Marketing
Author URI: http://www.alquemie.net/
License: GPL v3

Alquemie SEO Plugin
Copyright (C) 2013, Alquemie Marketing, LLC (support@alquemie.net)

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
    
*/

/* 
	Forked with permission from B2 SEO by B2 Foundry http://www.b2foundry.com/
  Copyright 2011 B2 Foundry (support@b2foundry.com)
*/
	
$_sd = plugin_dir_url(__FILE__);
$_hm = dirname(dirname(dirname(dirname(__FILE__))));
define('_WP_BASE_', $_hm);
if(preg_match('/^https/',$_sd) && !preg_match('/^https/', get_bloginfo('url')))
    $_sd = preg_replace('/^https/', 'http', $_sd);
define('AU_SEO_URL', $_sd);
define('SEO_URL_FRONT', $_sd);
define('SEO_PATH', plugin_dir_path(__FILE__));
define('SEO_BASE', plugin_basename( __FILE__ ));
define('SEO_VERSION', '2.0');
require_once 'i/__f.php';
require_once 'i/__rw.php';
$_os = _gso();
_setup();
if(is_admin()){
    require_once 'i/__c.php';
    require_once 'i/__a.php';
    require_once 'i/__m.php';		
    require_once 'i/__i.php';
    require_once 'i/__t.php';
}else{
    require_once 'i/__r.php';
    if(isset($_os['_tbc_']) && $_os['_tbc_']){
      require_once 'i/__b.php';
    }
}
?>