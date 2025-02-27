<?php

if ( ! defined( 'ABSPATH' ) ) exit;

define("HBAGENCY_STANDARD",  1);
define("HBAGENCY_STICKY",   2);
define("HBAGENCY_FIXED", 4);
define("HBAGENCY_IN_PAGE", 5);
define("HBAGENCY_IN_ARTICLE", 6);
	
define("HBAGENCY_CSS_CLASSES", [ 
		'1' => "hb-ad-box",
		'2' => "hb-ad-leaderboard",
		'3' => "hb-ad-billboard",
		'4' => "hb-ad-half",
		'5' => "hb-ad-sky",
		'6' => "hb-ad-sky120",
		'11' => "hb-ad-l970",
		'12' => "hb-ad-a320x50",
		'31' => "hb-ad-a320x100",
		'37' => "hb-ad-m300x250"
	]);

define("HBAGENCY_ADSTXT_REGEXP", '/^(?<comment>[ \t]*#.*)$|^(?<manager>(?<manager_type>[a-z]+)[ \t]*=[ \t]*(?<manager_value>[a-z0-9@.-]+)[ \t]*)$|^(?<domain>[a-z-_0-9*\.]+)[ \t]*,[ \t]*(?<account>[a-z-_0-9]+)[ \t]*,[ \t]*(?<type>DIRECT|RESELLER)(?:(?!\n)(?:[ \t]*,*[ \t]*)|$)(?<cert_id>[a-z0-9]+)?(?:(?!\n)[ \t]*(?<additional_comment>#.*)|$)?[\t]*$/i');
define("HBAGENCY_PLACEMENTS_REGEXP", '/^C-\d+(-(POS|PAR|COUNT))?$/');

class HBAgency_Utils {
	
}
