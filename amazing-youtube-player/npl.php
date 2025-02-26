<?php
/*Plugin Name: amazing youtube player
	Plugin URI: http://es.netplayed.com
	Description: Plugin to create videolists automatics or not from the youtube videos pages of the domain where it is installed.
	Version: 2.8
	Author: netplayed
	Author URI: http://es.netplayed.com
*/
/*function npl(){
	global $wpdb; 
	$table_name = $wpdb->prefix . "saludos";
	$saludo= $wpdb->get_var("SELECT saludo FROM $table_name ORDER BY RAND() LIMIT 0, 1; " );
	include('template/saludo.html');		
}*/
function npl_instala(){
	global $wpdb; 
	$table_name= $wpdb->prefix . "previewNPL";
   $sql = " CREATE TABLE $table_name(
		id mediumint( 9 ) NOT NULL ,
		autoinit int NOT NULL ,
		tipo_player varchar(50) NOT NULL,
		aspecto_player varchar(50) NOT NULL,
		nonblocking int NOT NULL ,
		listItems int NOT NULL ,
		no_anyadir int NOT NULL ,
		intro_texto text NULL,
		fin_texto text NULL,
		style_mediana text NULL,
		help int NULL,
		autopreview int NULL ,
		language varchar(50) NULL,
		PRIMARY KEY ( `id` )	
	) ;";
	$wpdb->query($sql);
	/*$sql = "INSERT INTO $table_name (saludo) VALUES ('Hola Mundo');";
	$wpdb->query($sql);*/
}
function npl_desinstala(){
	global $wpdb; 
	$table_name = $wpdb->prefix . "previewNPL";
	$sql = "DROP TABLE $table_name";
	$wpdb->query($sql);
}	
function npl_panel(){
	global $wpdb; 		
	$table_name = $wpdb->prefix . "previewNPL";	
	if(isset($_POST['envio'])){	

			if ($_POST['npl_autoiniciar']=='on') $_POST['npl_autoiniciar']=1;
			else $_POST['npl_autoiniciar']=0;
			if ($_POST['npl_help']=='on') $_POST['npl_help']=1;
			else $_POST['npl_help']=0;
			if ($_POST['npl_non_blocking']=='on') $_POST['npl_non_blocking']=1;
			else $_POST['npl_non_blocking']=0;
			if (!isset($_POST['npl_tipo_player'])) $_POST['npl_tipo_player']='mini';
			if (!isset($_POST['npl_language'])) $_POST['npl_language']='en';
			if (!isset($_POST['npl_aspecto_player'])) $_POST['npl_aspecto_player']='horizontal';
			if ($_POST['npl_no_anyadir']=='on') $_POST['npl_no_anyadir']=1;
			else $_POST['npl_no_anyadir']=0;
			if ($_POST['npl_autopreview']=='on') $_POST['npl_autopreview']=1;
			else $_POST['npl_autopreview']=0;
			$sql = "DELETE FROM $table_name WHERE id=0";
			$wpdb->query($sql);
			$npl_intro_texto=htmlentities(addslashes($_POST['npl_intro_texto']));
			$npl_fin_texto=htmlentities(addslashes($_POST['npl_fin_texto']));
			$npl_style_mediana=htmlentities(addslashes($_POST['npl_style_mediana']));
			$sql = "INSERT INTO $table_name (id,autoinit,tipo_player,aspecto_player,nonblocking,listItems,no_anyadir,intro_texto,fin_texto,style_mediana,help,language,autopreview) VALUES (0,'{$_POST['npl_autoiniciar']}','{$_POST['npl_tipo_player']}','{$_POST['npl_aspecto_player']}','{$_POST['npl_blocking']}','{$_POST['npl_listItems']}','{$_POST['npl_no_anyadir']}','{$npl_intro_texto}','{$npl_fin_texto}','{$npl_style_mediana}','{$_POST['npl_help']}','{$_POST['npl_language']}','{$_POST['npl_autopreview']}');";
			$wpdb->query($sql);
	}
	$npl_autoiniciar= $wpdb->get_var("SELECT autoinit FROM $table_name WHERE id=0" );
	$npl_help= $wpdb->get_var("SELECT help FROM $table_name WHERE id=0" );
	$npl_is_aspecto_player= $wpdb->get_var("SELECT aspecto_player FROM $table_name WHERE id=0" );
	$npl_is_tipo_player= $wpdb->get_var("SELECT tipo_player FROM $table_name WHERE id=0" );
	$npl_language= $wpdb->get_var("SELECT language FROM $table_name WHERE id=0" );
	$npl_is_blocking= $wpdb->get_var("SELECT nonblocking FROM $table_name WHERE id=0" );
	$npl_is_listItems= $wpdb->get_var("SELECT listItems FROM $table_name WHERE id=0" );
	$npl_no_anyadir= $wpdb->get_var("SELECT no_anyadir FROM $table_name WHERE id=0" );
	$npl_intro_texto= $wpdb->get_var("SELECT intro_texto FROM $table_name WHERE id=0" );
	$npl_fin_texto= $wpdb->get_var("SELECT fin_texto FROM $table_name WHERE id=0" );
	$npl_style_mediana= $wpdb->get_var("SELECT style_mediana FROM $table_name WHERE id=0" );
	$npl_autopreview= $wpdb->get_var("SELECT autopreview FROM $table_name WHERE id=0" );
	
	if (!isset($npl_autoiniciar)) $npl_autoiniciar=0;
	if (!isset($npl_autopreview)) $npl_autopreview=1;
	if (!isset($npl_help)) $npl_help=0;
	if (!isset($npl_is_aspecto_player)) $npl_is_aspecto_player='horizontal';
	if (!isset($npl_is_tipo_player)) $npl_is_tipo_player='mini';
	if (!isset($npl_language)) $npl_language='en';
	if (!isset($npl_is_non_blocking)) $npl_is_non_blocking=0;
	if (!isset($npl_is_listItems)) $npl_is_listItems=10;
	if (!isset($npl_no_anyadir)) $npl_no_anyadir=0;
	if (!isset($npl_intro_texto)) $npl_intro_texto=htmlentities(addslashes('<h2 class="entry-title">List of grouped videos</h2>'));
	if (!isset($npl_fin_texto)) $npl_fin_texto=htmlentities(addslashes('The videoslist before group the available videos of the page. So, you can enjoy all them together.'));
	if (!isset($npl_style_mediana)) $npl_style_mediana=htmlentities(addslashes('<div style="float:left;width:0px">&nbsp;</div>'));

	include('template/panel.html');			
		
}
function npl_add_menu(){	
	if (function_exists('add_options_page')) {
		//add_menu_page
		add_options_page('Amazing youtube player options', 'Amazing youtube player options', 8, basename(__FILE__), 'npl_panel');
	}
}
function parseContent($the_content) {
	
	global $wpdb;
	$table_name = $wpdb->prefix . "previewNPL";	
	$npl_autoiniciar= $wpdb->get_var("SELECT autoinit FROM $table_name WHERE id=0" );
	$npl_autopreview= $wpdb->get_var("SELECT autopreview FROM $table_name WHERE id=0" );
	$npl_help= $wpdb->get_var("SELECT help FROM $table_name WHERE id=0" );
	$npl_is_aspecto_player= $wpdb->get_var("SELECT aspecto_player FROM $table_name WHERE id=0" );
	$npl_is_tipo_player= $wpdb->get_var("SELECT tipo_player FROM $table_name WHERE id=0" );
	$npl_language= $wpdb->get_var("SELECT language FROM $table_name WHERE id=0" );
	$npl_is_blocking= $wpdb->get_var("SELECT nonblocking FROM $table_name WHERE id=0" );
	$npl_is_listItems= $wpdb->get_var("SELECT listItems FROM $table_name WHERE id=0" );
	$npl_no_anyadir= $wpdb->get_var("SELECT no_anyadir FROM $table_name WHERE id=0" );
	$npl_intro_texto= $wpdb->get_var("SELECT intro_texto FROM $table_name WHERE id=0" );
	$npl_fin_texto= $wpdb->get_var("SELECT fin_texto FROM $table_name WHERE id=0" );
$npl_style_mediana= $wpdb->get_var("SELECT style_mediana FROM $table_name WHERE id=0" );
//$npl_style_mediana=htmlentities(addslashes('<div style="float:left;width:100px">&nbsp;</div>'));
	
$language_title="List of grouped videos";
$language_footer='The videoslist before group the available videos of the page. So, you can enjoy all them together.';
$language_link='<a target="_blank" title="youtube videos player" href="http://en.netplayed.com">Videos Online</a>';
if ($npl_language=='es') $language_link='<a target="_blank" title="reproductor videos de youtube" href="http://es.netplayed.com">Videos Gratis Online</a>';

	if (!isset($npl_autoiniciar)) $npl_autoiniciar=0;
	if (!isset($npl_autopreview)) $npl_autopreview=1;
	if (!isset($npl_help)) $npl_help=0;
	if (!isset($npl_is_aspecto_player)) $npl_is_aspecto_player='horizontal';
	if (!isset($npl_is_tipo_player)) $npl_is_tipo_player='mini';
	if (!isset($npl_language)) $npl_language='en';
	if (!isset($npl_is_non_blocking)) $npl_is_non_blocking=0;
	if (!isset($npl_is_listItems)) $npl_is_listItems=10;
	if (!isset($npl_no_anyadir)) $npl_no_anyadir=0;
	if (!isset($npl_intro_texto)) $npl_intro_texto=htmlentities(addslashes('<h2 class="entry-title">'.$language_title.'</h2>'));
	if (!isset($npl_fin_texto)) $npl_fin_texto=htmlentities(addslashes($language_footer));
	$npl_blocked=0;
	$help_developer="";
 	if ($npl_is_non_blocking==0) $npl_blocked=1;	
	//echo 'NPL'.$npl_no_anyadir;
	if ($npl_help==1)
        {
	$help_developer=$language_link;
	} 
	if ($npl_no_anyadir!=1)
	{
	$table_name = $wpdb->prefix . "previewNPL";	
	$codigo='<script>var d = new Date();
		var dy = d.getFullYear();
		var dm = d.getMonth() + 1;
		var dd = d.getDate();
		var ys = new String(dy);
		var ms = new String(dm);
		var ds = new String(dd);
		if ( ms.length == 1 ) ms = "0" + ms;
		if ( ds.length == 1 ) ds = "0" + ds;
		ys = parseFloat(ys + ms + ds);
var _rand=Math.floor(Math.random()*1001);
</script><div style="width:100%!important;text-align:left;" id="npl_content"><script type="text/javascript">document.getElementById("npl_content").id="content";</script><div id="nplDiv_wordpresstitulo_wp_resumen_header_videos" style="display:none">'.stripslashes(html_entity_decode($npl_intro_texto)).'</div>'.stripslashes(html_entity_decode($npl_style_mediana)).'<!--INIT EMBEDDED NETPLAYED OBJECT-->
<div id="nplDiv_wordpress" >
'.$help_developer.'</div>
<script type="text/javascript">
var domscript = document.createElement("script");
domscript.src = "http://static.netplayed.com/js/spec/addNetplayedVideos2_min_v_"+ys+".js";
if(domscript.onreadystatechange!==undefined){
domscript.timer=setInterval(function(){
if (domscript.readyState == "loaded" || domscript.readyState == "complete")
{
var npl_config = {
target_id: "nplDiv_wordpress",
language:"'.$npl_language.'",
aspect:"'. $npl_is_aspecto_player.'",
autostart:'.$npl_autoiniciar.',
player:"'. $npl_is_tipo_player.'",
blockPlayer:'.$npl_blocked.',
limitItems:'.$npl_is_listItems.',
autoPreview:"'.$npl_autopreview.'",
idsVideos:"",
videosWeb:"."};
addingIframeNetplayedAdv.addIframeAdv(npl_config);
                        clearInterval(domscript.timer);
                    }

                    },100);

}else
{
domscript.onload = function() {
  var npl_config = {
target_id: "nplDiv_wordpress",
language:"'.$npl_language.'",
aspect:"'. $npl_is_aspecto_player.'",
autostart:'.$npl_autoiniciar.',
player:"'. $npl_is_tipo_player.'",
blockPlayer:'.$npl_blocked.',
limitItems:'.$npl_is_listItems.',
autoPreview:"'.$npl_autopreview.'",
idsVideos:"",
videosWeb:"."};
addingIframeNetplayedAdv.addIframeAdv(npl_config);
};
}


document.getElementsByTagName("head")[0].appendChild(domscript);

</script>
<!--END EMBEDDED NETPLAYED OBJECT-->'.'<div id="nplDiv_wordpresstitulo_wp_resumen_footer_videos" style="display:none">'.stripslashes(html_entity_decode($npl_fin_texto)).'</div></div>';
	echo $codigo;
}//fin de no_anyadir
}
if (function_exists('add_action')) {
	add_action('admin_menu', 'npl_add_menu'); 
}
add_action('activate_'.plugin_basename(__FILE__),'npl_instala');
add_action('deactivate_'.plugin_basename(__FILE__), 'npl_desinstala');
add_filter('get_footer', 'parseContent');
?>
