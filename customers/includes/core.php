<?php
/* Core */
	function template($out){
		
		print_r($template);
		
		
		global $wpdb;
		//Have shortcode [CUSTOMERS] ?
		$findcustomers=$wpdb->get_var("SELECT count(*) FROM ".$wpdb->prefix."posts WHERE ID=".get_the_ID()." AND post_content LIKE '%[CUSTOMERS]%' AND post_status IN ('publish', 'draft')");
		//So ?
		if($findcustomers>0){
			//Oh yes we have ! let's go !
			$out=ereg_replace('\[CUSTOMERS\]','',$out);

			//Start with requests
			if(!$_GET["p"]){
				$sql = $wpdb->prepare("SELECT * FROM  `".$wpdb->prefix ."customers` LEFT JOIN ".$wpdb->prefix ."pays ON rowid=cupays ORDER BY en,cuname");
				$customers=$wpdb->get_results($sql);
				$sql = $wpdb->prepare("SELECT DISTINCT code, en FROM  `".$wpdb->prefix ."customers` LEFT JOIN ".$wpdb->prefix ."pays ON rowid=cupays ORDER BY en");
				$countries=$wpdb->get_results($sql);
				
			}else{
	
				$sql = $wpdb->prepare("SELECT * FROM  `".$wpdb->prefix ."customers` LEFT JOIN ".$wpdb->prefix ."pays ON rowid=cupays WHERE code ='".mysql_real_escape_string($_GET["p"])."' ORDER BY en,cuname");
				$customers=$wpdb->get_results($sql);
				$sql = $wpdb->prepare("SELECT DISTINCT code, en FROM  `".$wpdb->prefix ."customers` LEFT JOIN ".$wpdb->prefix ."pays ON rowid=cupays ORDER BY en");
				$countries=$wpdb->get_results($sql);
				$sql = $wpdb->prepare("SELECT code, en FROM  ".$wpdb->prefix ."pays WHERE code ='".mysql_real_escape_string($_GET["p"])."'");
				$country=$wpdb->get_results($sql);
				
			}

			// End Requests

			//what is your favorite template ?
			include_once(CTS_TPL.'/'.CTS_TPF.'.php');

		}
		//Even we haven't shortcode, we return post
		return $out;
	}


?>