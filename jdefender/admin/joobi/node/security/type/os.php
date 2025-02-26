<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Security_Os_type extends WTypes {
	var $os = array(
		1 => 'Mac'
		,2 => 'Windows'
		,3 => 'Linux'
		,4 => 'SunOS'
		,5 => 'OpenSolaris'
		,10 => 'iPhone'
		,11 => 'iPod'
		,12 => 'iPad'
		,50 => 'Android'
				,155 => 'GoogleBot'
		,156 => 'Feedfetcher-Google'
		,170 => 'BingBot'
		,180 => 'BaiduSpider'
		,181 => 'jakarta'
		,182 => 'feedparser'
		,183 => 'sogou'
		,185 => 'Slurp'			,186 => 'site24x7'
		,187 => 'feedburner'
		,188 => 'kcb'
		,189 => 'Bot'
		,220 => 'Nokia'
		,221 => 'Blackberry'
		,222 => 'Mozilla'
		,239 => 'unknown'
	);
}