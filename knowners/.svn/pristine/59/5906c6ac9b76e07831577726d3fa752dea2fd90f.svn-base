<?php
/*
Plugin Name: knowners
Plugin URI: http://www.fakepress.it/knowners
Description: Knowners allows you to organize your posts in an innovative way. It is thought as a large-scale widget, taking up most of your page.
Version: 1.3
Author: Salvatore Iaconesi
Author URI: http://www.artisopensource.net
License: GPL2
*/
?>
<?php
/*  Copyright 2010  Salvatore Iaconesi  (email : salvatore.iaconesi@artisopensource.net)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
?>
<?php


$knowners_db_version = "1.0";

register_activation_hook(__FILE__,'knowners_install');

add_action('init', 'knowners_init_method');
add_action('admin_menu', 'knowners_add_menus');
add_action('wp_print_styles', 'add_knowners_stylesheet');

add_action('wp_ajax_get_links_for_tag', 'get_links_for_tag');
add_action('wp_ajax_nopriv_get_links_for_tag', 'get_links_for_tag');

add_action('wp_ajax_knowners_get_JSON_for_tag', 'knowners_get_JSON_for_tag');
add_action('wp_ajax_nopriv_knowners_get_JSON_for_tag', 'knowners_get_JSON_for_tag');



function knowners_install () {
   global $wpdb;
   global $knowners_db_version;

   $table_name = $wpdb->prefix . "knowners_links";
   if($wpdb->get_var("show tables like '$table_name'") != $table_name) {
      
      $sql = "CREATE TABLE " . $table_name . " (
	  id mediumint(9) NOT NULL AUTO_INCREMENT,
	  url varchar(255) NOT NULL,
	  d text NOT NULL,
	  label varchar(255) NOT NULL,
	  UNIQUE KEY id (id)
	);";

      require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
      dbDelta($sql);

 
      add_option("knowners_db_version", $knowners_db_version);

   }
   
   $table_name = $wpdb->prefix . "knowners_tags";
   if($wpdb->get_var("show tables like '$table_name'") != $table_name) {
      
      $sql = "CREATE TABLE " . $table_name . " (
	  id mediumint(9) NOT NULL AUTO_INCREMENT,
	  tag varchar(255) NOT NULL,
	  UNIQUE KEY id (id)
	);";

      require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
      dbDelta($sql);

      add_option("knowners_db_version", $knowners_db_version);

   }   
   
   $table_name = $wpdb->prefix . "knowners_relations";
   if($wpdb->get_var("show tables like '$table_name'") != $table_name) {
      
      $sql = "CREATE TABLE " . $table_name . " (
	  id mediumint(9) NOT NULL AUTO_INCREMENT,
	  idtagfather mediumint(9) NOT NULL,
	  idtagson mediumint(9) NOT NULL,
	  UNIQUE KEY id (id)
	);";

      require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
      dbDelta($sql);

      add_option("knowners_db_version", $knowners_db_version);

   }
   
   $table_name = $wpdb->prefix . "knowners_link_placements";
   if($wpdb->get_var("show tables like '$table_name'") != $table_name) {
      
      $sql = "CREATE TABLE " . $table_name . " (
	  id mediumint(9) NOT NULL AUTO_INCREMENT,
	  idlink mediumint(9) NOT NULL,
	  idtag mediumint(9) NOT NULL,
	  UNIQUE KEY id (id)
	);";

      require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
      dbDelta($sql);

      add_option("knowners_db_version", $knowners_db_version);

   }
   
}


function knowners_add_menus(){
	add_menu_page('Knowners', 'Knowners', 'administrator', 'knowners-top-level-handle', 'knowners_toplevel_page');
	add_submenu_page('knowners-top-level-handle', 'Edit Links', 'Edit Links', 'administrator', 'knowners-links-tags', 'knowners_edit_links_page');
}


function knowners_toplevel_page(){

	echo('Welcome to <b>Knowners</b><br>');
	echo('<br>');
	echo('Please use the "Edit links" page in this Dashboard menu to configure your links in Knowners.<br>');
	echo('<br>');
	echo('This Wordpress plugin is produced by <a href="http://www.fakepress.it" target="_blank" title="FakePress" alt="FakePress">FakePress</a> and <a href="http://www.artisopensource.net" target="_blank" title="Art is Open Source" alt="Art is Open Source">Art is Open Source</a>.<br>');
	echo('<br>');
	echo('It is released under a <b>GPL2</b> license<br>');
	
}


function get_subs($idfath){
	global $wpdb;
	
	$table_name = $wpdb->prefix . "knowners_tags";
	$table_name_relations = $wpdb->prefix . "knowners_relations";	
	$table_name_links = $wpdb->prefix . "knowners_links";
	$table_name_link_placements = $wpdb->prefix . "knowners_link_placements";
	
	
	echo('		<ul class="knowners-tag-list">');
	$toptags = $wpdb->get_results("SELECT t.id as tid, t.tag as ttag FROM $table_name t, $table_name_relations tt WHERE tt.idtagfather=$idfath and tt.idtagson=t.id order by ttag asc");
	foreach ($toptags as $tag) {
		echo ("<li >");
		
		echo ( "<div id='tagli-$tag->tid' class='tagli'>");
		
		echo('			<form class="knowners-inlineform" action="" method="POST" id="form-del-' . $tag->tid . '">');
		echo('			<input type="hidden" name="cmd" value="deletetag">');
		echo('			<input type="hidden" name="idtag" value="' . $tag->tid . '">');
		echo('			</form>');
		
		echo('			<a href="javascript: removetreeo(' . $tag->tid . ')" class="linksmall">[X]</a>');
		echo( $tag->ttag . "<br>" );
		$linksrel = $wpdb->get_results("SELECT  l.label as title, l.id as lid, l.url as link, l.d as d FROM $table_name_links l, $table_name_link_placements lp WHERE lp.idtag=" . $tag->tid . " and l.id=lp.idlink order by l.label asc");
		foreach ($linksrel as $l) {
			echo("<a class='linksmall' href='$l->link' title='$l->title' alt='$l->title' target='_blank'>>></a><span class='textsmall'>[$l->title][$l->link][$l->d]</span><br>");
		}
		echo ( "</div>" );
	
		get_subs($tag->tid);
		
		
		echo( "		<div id='subtagli-$tag->tid' class='subtagpanel'>" );
		echo('			<h4>>> ' .  __('add tag below') . '</h4>');
		echo('			<form action="" method="POST">');
		echo('			<input type="hidden" name="cmd" value="addtag">');
		echo('			<input type="hidden" name="idfathertag" value="' . $tag->tid . '">');
		echo('			<input type="text" name="newtag"><input class="knowners-sbmit"  type="submit" value="' .  __('SAVE TAG') . '">');
		echo('			</form>');
		//echo('			<h4>>> ' .  __('add link in tag (use http:// for link)') . '</h4>');
		//echo('			<form action="" method="POST">');
		//echo('			<input type="hidden" name="cmd" value="addlink">');
		//echo('			<input type="hidden" name="idtag" value="' . $tag->tid . '">');
		//echo('			<span class="knowners-form-label">' .  __('Link:') . '</span><input type="text" name="link"><br>');
		//echo('			<span class="knowners-form-label">' .  __('Title:') . '</span><input type="text" name="title"><br>');
		//echo('			<span class="knowners-form-label">' .  __('Description:') . '</span><br><textarea name="d"></textarea><br>');
		//echo('			<input class="knowners-sbmit"  type="submit" value="' .  __('SAVE LINK') . '">');
		//echo('			</form>');
		echo( "		</div>" );
		echo( "<div style='clear:both;'></div>" );
		echo( "</li>" );
	}
	echo('		</ul>');
}

function knowners_edit_links_page(){


	global $wpdb;

	$table_name = $wpdb->prefix . "knowners_tags";
	$table_name_relations = $wpdb->prefix . "knowners_relations";	
	$table_name_links = $wpdb->prefix . "knowners_links";
	$table_name_link_placements = $wpdb->prefix . "knowners_link_placements";
	
	
	$msg1 = "Insert a link (separate tags with commas ',', and use 'http://' in front of links).";
	$msg2 = "These are the links present in the system.";
	$errmsg = "";
	
	if(isset($_POST["cmd"])){
		
		if ( $_POST["cmd"]=='dellink' ){
		
			$idlink = "";
			if( isset( $_POST["idlink"] ) ){
				$idlink = $wpdb->escape( strtoupper( trim( $_POST["idlink"] ) ) );
			}
			
			if($idlink<>""){
				
				deleteLink($idlink);
				
			}
		
		} else if ( $_POST["cmd"]=='addlink' ){
			
			$link = "";
			$title = "";
			$tags = "";
			$d = "";
			
			if( isset( $_POST["link"] ) ){
				$link = $wpdb->escape( trim( $_POST["link"] )  );
			}
			
			if( isset( $_POST["tags"] ) ){
				$tags = $wpdb->escape( strtoupper( trim( $_POST["tags"] ) ) );
			}
			
			if( isset( $_POST["title"] ) ){
				$title = $wpdb->escape( strtoupper( trim( $_POST["title"] ) ) );
			}
			
			if( isset( $_POST["d"] ) ){
				$d = $wpdb->escape( strtoupper( trim( $_POST["d"] ) ) );
			}
			
			
			if ( preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $link ) ){
				if( $title<>"" ){
					
					$idlink = $wpdb->get_var($wpdb->prepare("SELECT id from $table_name_links where url='$link'"));
					if($idlink==NULL){
						$query = "insert into $table_name_links(url,d,label) values('$link','$d','$title')";
						$res = $wpdb->query($query);
						$idlink = $wpdb->insert_id;
					} else {
						$errmsg = "link already exists, updating tags.";
					}
					
					if($idlink<>NULL){
						
						if($tags<>""){
							
							$ta = explode(",",$tags);
							$taids = array();
							
							for($i = 0; $i<count($ta); $i++){
								
								$tt = $wpdb->escape( strtoupper( trim( $ta[$i] ) ) );
								
								$idtag = $wpdb->get_var($wpdb->prepare("SELECT id FROM $table_name WHERE tag='$tt' "));
								if($idtag==NULL){
									$query = "insert into $table_name(tag) values( '$tt' )";
									$res = $wpdb->query($query);
									$idtag = $wpdb->insert_id;
								}
								
								if( $idtag<>-1 && $idtag<>NULL ) {
									
									$taids[ $i ] = $idtag;
									
									$query = "insert into $table_name_link_placements( idlink, idtag ) values( $idlink, $idtag )";
									$res = $wpdb->query($query);
									
								}
								
							}
							
							for($i = 0; $i<count($taids); $i++){
							
								$tagidfrom = $taids[ $i ];
								
								for($j = 0; $j<count($taids); $j++){
								
									if($i<>$j){
									
										$tagidto = $taids[ $j ];
										
										$idrel = $wpdb->get_var($wpdb->prepare("SELECT id FROM $table_name_relations WHERE ( idtagfather=$tagidfrom && idtagson=$tagidto ) OR ( idtagfather=$tagidto && idtagson=$tagidfrom ) "));
										if($idrel==NULL){
										
											$query = "INSERT INTO $table_name_relations( idtagfather, idtagson ) values( $tagidfrom, $tagidto )";
											$res = $wpdb->query($query);
										
										}
									
									}
								
								}
							
							}
							
							$errmsg = "link added";
							
						} else {
							$errmsg = "tags cannot be empty.";
						}
						
					} else {
						$errmsg = "error inserting link.";
					}
					
					
					
				} else {
					$errmsg = "title cannot be empty.";
				}
			} else {
				$errmsg = "invalid link.";			
			}
			
		}
	
	}

	echo('<div id="knowners-admin-panel">');
	echo('	<div class="knowners-admin-panel-heading">');
	echo('		<b>Knowners</b> ' . __('edit links'));
	echo('	</div>');
	
	echo('	<div class="knowners-admin-panel-errmsg">');
	echo( __($errmsg) );
	echo('	</div>');
	
	echo('	<div class="knowners-admin-panel-box">');
	echo('		<h3>' .  __('add link') . '</h3><br>');
	echo('		<span class="knowners-admin-panel-result-message">' .  __( $msg1 ) . '</span><br>');
	echo('			<form action="" method="POST">');
	echo('			<input type="hidden" name="cmd" value="addlink">');
	echo('			<span class="knowners-form-label">' .  __('Link:') . '</span><input type="text" name="link"><br>');
	echo('			<span class="knowners-form-label">' .  __('Title:') . '</span><input type="text" name="title"><br>');
	echo('			<span class="knowners-form-label">' .  __('Tags:') . '</span><input type="text" name="tags"><br>');
	echo('			<span class="knowners-form-label">' .  __('Description:') . '</span><br><textarea name="d"></textarea><br>');
	echo('			<input class="knowners-sbmit"  type="submit" value="' .  __('SAVE LINK') . '">');
	echo('			</form>');
	
	echo('</div>');
	
	echo('	<div class="knowners-admin-panel-box">');
	echo('		<h3>' .  __('manage links') . '</h3><br>');
	echo('		<span class="knowners-admin-panel-result-message">' .  __( $msg2 ) . '</span><br>');
	
	$linksrel = $wpdb->get_results("SELECT  l.label as title, l.id as lid, l.url as link, l.d as d FROM $table_name_links l ORDER BY l.label ASC");
	foreach ($linksrel as $l) {
		echo("<div class='knowners-admin-box'>");
		echo("	<a class='linksmall' href='$l->link' title='$l->title' alt='$l->title' target='_blank'>[ >> ]</a><a class='linksmall' href='javascript: deleteLink( $l->lid );' title='delete link' alt='delete link' >[ X ]</a><br><span class='textsmall'><b>[$l->title]</b></span><br>[$l->link]<br>$l->d<br>");
		echo("</div>");	
	}
	
	echo('	</div>');
	
	echo( "<form action='' method='POST' id='cmdform'><input type='hidden' name='cmd' value='dellink'><input type='hidden' name='idlink' id='idlink' value='-1'></form>" );
	
	
	
	
}


function add_knowners_stylesheet() {
        $myStyleUrl = WP_PLUGIN_URL . '/knowners/style.css';
        $myStyleFile = WP_PLUGIN_DIR . '/knowners/style.css';
        if ( file_exists($myStyleFile) ) {
            wp_register_style('knownersStyleSheet', $myStyleUrl);
            wp_enqueue_style( 'knownersStyleSheet');
        }
}


function knowners_init_method(){
	
	$plugin_dir = basename(dirname(__FILE__));
	load_plugin_textdomain( 'knowners', 'wp-content/plugins/' . $plugin_dir . '/languages',  $plugin_dir  . '/languages' );

	wp_enqueue_script(   'jit' , WP_PLUGIN_URL . '/knowners/js/jit.js');
	wp_enqueue_script('knownersjs', WP_PLUGIN_URL . '/knowners/js/scripts.js',  array('jquery','jit') );
	
		$myStyleUrl = WP_PLUGIN_URL . '/knowners/style.css';
        $myStyleFile = WP_PLUGIN_DIR . '/knowners/style.css';
        
        //$myStyleUrl2 = WP_PLUGIN_URL . '/knowners/base.css';
        //$myStyleFile2 = WP_PLUGIN_DIR . '/knowners/base.css';
        
        $myStyleUrl3 = WP_PLUGIN_URL . '/knowners/Spacetree.css';
        $myStyleFile3 = WP_PLUGIN_DIR . '/knowners/Spacetree.css';
        
        if ( file_exists($myStyleFile) ) {
            wp_register_style('knownersStyleSheet', $myStyleUrl);
            wp_enqueue_style( 'knownersStyleSheet');
        }
        
		//if ( file_exists($myStyleFile2) ) {
        //    wp_register_style('knownersStyleSheet2', $myStyleUrl2);
        //    wp_enqueue_style( 'knownersStyleSheet2');
        //}
        
		if ( file_exists($myStyleFile3) ) {
            wp_register_style('knownersStyleSheet3', $myStyleUrl3);
            wp_enqueue_style( 'knownersStyleSheet3');
        }
}


function deleteLink($lid){
	global $wpdb;
	
	$table_name = $wpdb->prefix . "knowners_tags";
	$table_name_relations = $wpdb->prefix . "knowners_relations";	
	$table_name_links = $wpdb->prefix . "knowners_links";
	$table_name_link_placements = $wpdb->prefix . "knowners_link_placements";
	
	
	$query = "DELETE FROM $table_name_link_placements WHERE idlink=$lid";
	//echo("DELETE FROM $table_name_link_placements WHERE idlink=$lid");
	$res = $wpdb->query($query);
	
	$query = "DELETE FROM $table_name_links WHERE id=$lid";
	//echo("DELETE FROM $table_name_links WHERE id=$lid");
	$res = $wpdb->query($query);
}


function deleteTree($tid){
	global $wpdb;
	
	$table_name = $wpdb->prefix . "knowners_tags";
	$table_name_relations = $wpdb->prefix . "knowners_relations";	
	$table_name_links = $wpdb->prefix . "knowners_links";
	$table_name_link_placements = $wpdb->prefix . "knowners_link_placements";
	
	$toptags = $wpdb->get_results("SELECT idtagson FROM $table_name_relations WHERE idtagfather=$tid");
	//echo("SELECT idtagson FROM $table_name_relations WHERE idtagfather=$tid");
	foreach ($toptags as $tag) {
		deleteTree($tag->idtagson);
	}
	
	$toptags = $wpdb->get_results("SELECT idlink FROM $table_name_link_placements WHERE idtag=$tid");
	//echo("SELECT idlink FROM $table_name_link_placements WHERE idtag=$tid");
	foreach ($toptags as $tag) {
		deleteLink($tag->idlink);
	}
	
	$query = "DELETE FROM $table_name_relations WHERE idtagfather=$tid";
	//echo("DELETE FROM $table_name_relations WHERE idtagfather=$tid");
	$res = $wpdb->query($query);
	
	$query = "DELETE FROM $table_name WHERE id=$tid";
	//echo("DELETE FROM $table_name WHERE id=$tid");
	$res = $wpdb->query($query);
	
}


function knowners_render_links(){

	global $wpdb;
	
	echo('<!--[if IE]><script language="javascript" type="text/javascript" src="' . WP_PLUGIN_URL . '/knowners/js/excanvas.js"></script><![endif]-->');
	
	$table_name = $wpdb->prefix . "knowners_tags";
	$table_name_relations = $wpdb->prefix . "knowners_relations";	
	$table_name_links = $wpdb->prefix . "knowners_links";
	$table_name_link_placements = $wpdb->prefix . "knowners_link_placements";


	$frequencies = array();
	$tagnames = array();

	$idtagstart = -1;
	
	if( isset( $_POST["idtagstart"] ) ){
		$idtagstart = $wpdb->escape( strtoupper( trim( $_POST["idtagstart"] ) ) );
	}
	
	
	//echo( "<div id='knowners-tagspanel'>" );
	echo( "<div id='infovis'>" );

	echo( "</div>" );
	
	echo("<div id='knowlers-details'></div>");
	
	echo("<div class='separator2'></div>");
	
	// fare json data
	$scr = "<script type='text/javascript'>";
	
	$urlo = admin_url('admin-ajax.php');
	
	$scr = $scr . "var JSONurl='" . $urlo . "'; "; 
	
		$rrr2 = array();
		$rrr2["results"] = array();
		$rrr2["already"] = array();
		$j = getJSONforTag ( "T-" , $rrr2 );
	
		$json = json_encode( $j["results"] );
			
	$scr = $scr .  'var json = "' . str_replace("\"" , "\\\"", $json) . '";';
	
	$scr = $scr . "init( json );";
	$scr = $scr . "</script>";
	
	echo($scr);
	
	echo( "<div id='knowners-linkpanel'>" );

	echo("<h3>" .   __('recent links') . "</h3>");

	get_recent_links();
	
	echo( "<div style='width: 100%; clear: both;  '> </div>" );
	
	echo("<h3>" .   __('random links') . "</h3>");

	get_random_links();
	
	echo( "</div>" );	
	

	
}

function get_links_for_tag(){
	global $wpdb;
	
	$table_name = $wpdb->prefix . "knowners_tags";
	$table_name_relations = $wpdb->prefix . "knowners_relations";	
	$table_name_links = $wpdb->prefix . "knowners_links";
	$table_name_link_placements = $wpdb->prefix . "knowners_link_placements";
		
	$idtag = "-99999";
	$idtag2 = "-99999";
	
	if( isset( $_POST["idtag"] ) ){
		$idtag = $wpdb->escape( strtoupper( trim( $_POST["idtag"] ) ) );
	}
	
	if( isset( $_POST["idtag2"] ) ){
		$idtag2 = $wpdb->escape( strtoupper( trim( $_POST["idtag2"] ) ) );
	}
	
	
	if( $idtag<>"-99999" ){
	
		$vt = explode( ", ", $idtag );
		$tn = count( $vt ) - 1;
	
		$query = "SELECT distinct l.url as url, l.id as lid, l.label as title, l.d as d, co.c as c FROM $table_name_links l, $table_name_link_placements lp, ( SELECT count(*) c, lp2.idlink idlink FROM $table_name_link_placements lp2 WHERE  lp2.idtag in ( $idtag ) GROUP BY lp2.idlink ) co  WHERE lp.idtag in ( $idtag ) and l.id=lp.idlink and co.idlink=lp.idlink and co.c=$tn ORDER BY co.c DESC";
		
		//echo($query);

		$strings = array();
		$numcolumns = 5;
		
		$links = $wpdb->get_results($query);
		foreach ($links as $l) {

			$s = "<div class='knowlers-linkbox'>";
			$s = $s . "<a class='knowlers-linkurl' href='$l->url' title='" . stripslashes( $l->title ) . "' alt='" . stripslashes( $l->title ) . "' target='_blank'>";
			$s = $s . "<b>" . stripslashes( $l->title ) . "</b><br>" . stripslashes( $l->d ) .  "";
			$s = $s . "</a>";
			$s = $s . "</div>";			
			
			$strings[] = $s;
		
		}
		
		for( $ii = 0; $ii<$numcolumns ; $ii++ ){
			echo( "<div id='depo$ii' class='depo'>");
			for( $jj=$ii; $jj<count( $strings ); $jj+= $numcolumns){
				echo( $strings[ $jj ] );
			}
			echo("</div>" );
		}
		
	}
	
		echo("<div class='knowlers-sep'>" .   __('related tags') . " </div>");
		
		echo("<div style='width: 100%; padding: 0px; margin: 0px; clear:both;'> </div>");
		
		echo("<a href='javascript:displayAllTags();' class='knowlers-frontend-tagrellinks' >[ " .   __('display all tags') . " ]</a>");
	
	if( $idtag<>"-99999" ){
		
		$query = "SELECT distinct t.id as tid, t.tag as tag FROM $table_name t, $table_name_relations r WHERE (r.idtagfather IN ( $idtag ) OR r.idtagson IN ( $idtag ) ) AND ( t.id=r.idtagfather OR t.id=r.idtagson) AND NOT t.id IN ( $idtag )";
		$reltags = $wpdb->get_results($query);
		
		$urlo = admin_url('admin-ajax.php');
		
		foreach ($reltags as $rt) {
			echo("<a href='javascript:displayTag(\"$urlo\", $rt->tid);' title='" . stripslashes( $rt->tag ) . "' class='knowlers-frontend-tagrellinks' >" . stripslashes( $rt->tag ) . "</a>");
		}	
		
	}
	die();
}


function get_recent_links(){
	global $wpdb;
	
	$table_name = $wpdb->prefix . "knowners_tags";
	$table_name_relations = $wpdb->prefix . "knowners_relations";	
	$table_name_links = $wpdb->prefix . "knowners_links";
	$table_name_link_placements = $wpdb->prefix . "knowners_link_placements";
			
	
		$query = "SELECT l.url as url, l.id as lid, l.label as title, l.d as d FROM $table_name_links l  ORDER BY l.id DESC LIMIT 0, 5";
		$links = $wpdb->get_results($query);
		foreach ($links as $l) {

			echo( "<div class='depo'>");
			echo("<div class='knowlers-linkbox'>");
			echo("<a class='knowlers-linkurl' href='$l->url' title='" . stripslashes( $l->title ) . "' alt='" . stripslashes( $l->title ) . "' target='_blank'>");
			echo("<b>" . stripslashes( $l->title ) . "</b><br>" . stripslashes( $l->d ) . "");
			echo("</a>");
			echo("</div>");
			echo("</div>");			
		
		}	
		
}


function get_random_links(){
	global $wpdb;
	
	$table_name = $wpdb->prefix . "knowners_tags";
	$table_name_relations = $wpdb->prefix . "knowners_relations";	
	$table_name_links = $wpdb->prefix . "knowners_links";
	$table_name_link_placements = $wpdb->prefix . "knowners_link_placements";
			
	
		$query = "SELECT l.url as url, l.id as lid, l.label as title, l.d as d FROM $table_name_links l  ORDER BY RAND() LIMIT 0, 5";
		$links = $wpdb->get_results($query);
		foreach ($links as $l) {

			echo( "<div class='depo'>");
			echo("<div class='knowlers-linkbox'>");
			echo("<a class='knowlers-linkurl' href='$l->url' title='" . stripslashes( $l->title ) . "' alt='" . stripslashes( $l->title ) . "' target='_blank'>");
			echo("<b>" . stripslashes( $l->title ) . "</b><br>" . stripslashes( $l->d ) . "");
			echo("</a>");
			echo("</div>");
			echo("</div>");			
		
		}	
		
}

function knowners_get_JSON_for_tag(){
	global $wpdb;
	
	if( isset( $_POST["nodeId"] ) ){
		$idtag = $wpdb->escape(  trim( $_POST["nodeId"] ) ) ;
		
		//echo("ho ricevuto sto cazz di ID=$idtag");
		$rrr2 = array();
		$rrr2["results"] = array();
		$rrr2["already"] = array();
		$json = getJSONforTag ( $idtag , $rrr2 );
		
		echo ( json_encode( $json["results"] ) );
	}
	
	die();
	
}

function getJSONforTag( $tagid , $rr){
	
	$results = $rr["results"];
	$alreadyinserted  = $rr["already"];
	
	global $wpdb;
	
	$ps = strpos($tagid,"T-");
	
	//echo("*********************<br>");
	//echo("getJSONFortag[$tagid]<br>");
	//echo("*********************<br>");
	//print_r($rr);
	//echo("*********************<br>");
	
	if( $ps===FALSE ){
		// nulla
	} else {
	
		$tagid = substr($tagid,$ps+2); 
		
		$table_name = $wpdb->prefix . "knowners_tags";
		$table_name_relations = $wpdb->prefix . "knowners_relations";	
		$table_name_links = $wpdb->prefix . "knowners_links";
		$table_name_link_placements = $wpdb->prefix . "knowners_link_placements";
		
		$query = "";
		
		if($tagid==""){
			
			$query = "SELECT a.id as id, a.tag as tag FROM $table_name a  ORDER BY tag ASC";
			
		} else {
			
			$query = "SELECT a.id as id, a.tag as tag FROM $table_name a WHERE a.id IN ( SELECT DISTINCT idtagson FROM $table_name_relations b WHERE idtagfather=$tagid ) ORDER BY tag ASC";
			
		}
		
		$toinsert = array();
		
		$rroot = array();
		$rroot["id"] = "TROOT";
		$rroot["name"] = " ";
		$rrootdata = array();
		$rrootdata["contenuto"] = " ";
		$rroot["data"] = $rrootdata;
		$rroot["adjacencies"] = array();
		$results[] = $rroot;
		
		$tags = $wpdb->get_results($query);
		foreach ($tags as $t) {
			$r = array();
			$r["id"] = "T-" . $t->id;
			$r["name"] = stripslashes( $t->tag );
			
			//echo("è la tag[" . $r["name"] . "]<br>");
			
			$rdata = array();
			
			$qdata = "SELECT l.id as id, l.label as label, l.url as url FROM $table_name_links l, $table_name_link_placements lp WHERE lp.idtag=" . $t->id . " AND l.id=lp.idlink ORDER BY l.label ASC";
			$dati = $wpdb->get_results($qdata);
			$sss = "<ul class='knowlers-links'>";
			foreach($dati as $da){
				$sss = $sss . "<li><a href='" . stripslashes($da->url) . "' title='" . stripslashes($da->label) . "' id='" . stripslashes($da->id) . "'>" . stripslashes($da->label) . "</a></li>";
			}
			$sss = $sss . "</ul>";
			
			$rdata["contenuto"] = $sss;
			//$rdata["contenuto"] = "";
			$r["data"] = $rdata;
			$radj = array();
			
			$radj[] = $rroot["id"];
			
			$query2 = "SELECT a.id as id, a.tag as tag  FROM $table_name a WHERE a.id IN ( SELECT DISTINCT idtagson FROM $table_name_relations b WHERE idtagfather=" . $t->id . " ) ORDER BY tag ASC";
			$tags2 = $wpdb->get_results($query2);
			foreach ($tags2 as $t2) {

				$uid2 = "T-" . $t2->id;
				
				$radj[] = $uid2;
				
				$toinsert[] = $uid2;
				//echo("trovato successore[" . $uid2 . "][" . $t2->tag . "]<br>");
				
			}
			
			$r["adjacencies"] = $radj;
			
			$results[] = $r;
			$alreadyinserted[] = $r["id"];
			//echo("inserisco nei risultati=" . $r["id"] . "[" . $r["name"] . "]" . "<br>");
			//echo("******RESULTSvvvvvvv**********************<br>");
			//print_r($results);
			//echo("*******ALREADYvvvvvvvvv*********************<br>");
			//print_r($alreadyinserted);
			//echo("*****************************************<br>");
			
			/*
			foreach($toinsert as $toi){
				$ti = TRUE;
				for($i=0; $i<count($alreadyinserted)&&$ti;$i++){
					if($toi==$alreadyinserted[$i]){
						$ti = FALSE;
					}
				}
				if($ti){
					//echo("inserisco successore=" . $toi . "<br>");
					$rrr2 = array();
					$rrr2["results"] = $results;
					$rrr2["already"] = $alreadyinserted;
					$rrr3 = getJSONforTag( $toi , $rrr2);
					$results = $rrr3["results"];
					$alreadyinserted = $rrr3["already"];
				} else {
					//echo("già c'è=" . $toi . "<br>");
				}
			}
			*/
			
		}//foreach ($links as $l) {
		
		
		//$json = json_encode( $results );
		
		$rrr = array();
		$rrr["results"] = $results;
		$rrr["already"] = $alreadyinserted;
		
		//echo ("**********************************************" . $json . "**********************************************");
		return $rrr;
		
	}// === FALSE
	
	
}











function knowners_render_posts(){

	global $wpdb;
	
	echo('<!--[if IE]><script language="javascript" type="text/javascript" src="' . WP_PLUGIN_URL . '/knowners/js/excanvas.js"></script><![endif]-->');
	

	$frequencies = array();
	$tagnames = array();

	
	
	//echo( "<div id='knowners-tagspanel'>" );
	echo( "<div id='infovis'>" );

	echo( "</div>" );
	
	echo("<div id='knowlers-details'></div>");
	
	echo("<div class='separator2'></div>");
	
	// fare json data
	$scr = "<script type='text/javascript'>";
	
	$urlo = admin_url('admin-ajax.php');
	
	$scr = $scr . "var JSONurl='" . $urlo . "'; "; 
	
		$rrr2 = array();
		$rrr2["results"] = array();
		$rrr2["already"] = array();
		$j = getJSONforPostTag( "" , $rrr2 );
		
		//print_r( $j["results"]  );
	
		$json = json_encode( $j["results"] );
			
	$scr = $scr .  "var json = '" . str_replace("'" , " ", $json) . "';";
	
	//$scr = $scr .  'var json = ' . $json . ';';
	
	$scr = $scr . "init( json );";
	$scr = $scr . "</script>";
	
	echo($scr);
	
}
















function getJSONforPostTag( $tagid , $rr){
	
	$results = $rr["results"];
	$alreadyinserted  = $rr["already"];
	
	
		$toinsert = array();
		
		$rroot = array();
		$rroot["id"] = "TROOT";
		$rroot["name"] = " ";
		$rrootdata = array();
		$rrootdata["contenuto"] = " ";
		$rroot["data"] = $rrootdata;
		$rroot["adjacencies"] = array();
		//$results[] = $rroot;
		
		$tags = get_tags();
		
		//echo("ora mi becco le tag-->" . count($tags) . "-->");
	
		if(isset($tags) && is_array($tags) && count($tags)>0){	
		
		//echo("ecco un abella tag list");
	
		foreach ($tags as $t) {
		
			//echo("beccate sta tag[" . $t->name . "]<br>");
			
			$r = array();
			$r["id"] = $t->term_id;
			$r["name"] = $t->name;
			
			$rdata = array();
			
			//QUI
			$dati = get_posts('tag=' . $t->slug );
			$radj = array();
			//$radj[] = $rroot["id"];
			
			if(isset($dati) && is_array($dati) && count($dati)>0){
				$sss = "<ul class='knowlers-links'>";
				foreach($dati as $da){
				
					//echo("il post-->" . $da->post_title . "<br>");
				
					$sss = $sss . "<li><a href='" . get_permalink($da->ID) . "' title='" . str_replace("'"," ",  $da->post_title ) . "' id='" . $da->ID . "'>" . ($da->post_title) . "</a></li>";
				
					$reltags = get_the_tags($da->ID);
					if(isset($reltags) && is_array($reltags) && count($reltags)>0){
						foreach($reltags as $reta){
							
							
							$uid2 = $reta->term_id;
							
							if(!in_array($uid2,$radj)){
				
								$radj[] = $uid2;
				
								$toinsert[] = $uid2;
							}//if(!in_array($uid2,$radj)){
							
						}//foreach($reltags as $reta){ 
					}//if(isset($reltags) && is_array($reltags) && count($reltags)>0){
				
				}
				$sss = $sss . "</ul>";
			}
			
			$rdata["contenuto"] = $sss;
			//$rdata["contenuto"] = "";
			$r["data"] = $rdata;
			
			$r["adjacencies"] = $radj;
			
			$results[] = $r;
			$alreadyinserted[] = $r["id"];
			
		}//foreach ($links as $l) {
		
		
		}//if 
		
		
		$rrr = array();
		$rrr["results"] = $results;
		$rrr["already"] = $alreadyinserted;
		
		//echo ("**********************************************" . $json . "**********************************************");
		return $rrr;
		
	
	
}










?>