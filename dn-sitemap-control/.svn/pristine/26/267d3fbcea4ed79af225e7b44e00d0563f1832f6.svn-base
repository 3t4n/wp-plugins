<?php /*
	Plugin Name: DN Sitemap Control
	Description: Manage items to insert in sitemap. Gestire elementi da inserire nella sitemap.
	Version: 1.0.7
	Author: Digireturn
	Author URI: https://digireturn.it/
	License: GPLv2 or later	License
	URI: http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
	Text Domain: dn_sitemap
	Domain Path: /languages
*/ 
if(!defined('ABSPATH'))die('Invalid request.');

function dn_sitemap_control_option($key=null){
	switch($key){
		case 'appname':return 'Sitemap Control';
		case 'appversion':return '1.0.7';
	}
	return null;
}

add_action('admin_menu',function(){
	foreach(get_post_types(array('public'=>true),'objects') as $p)
		add_meta_box('dn_sitemap_meta_box',dn_sitemap_control_option('appname'),'dn_sitemap_meta_box',$p->name,'side','low');
	add_options_page('DN Sitemap Control',dn_sitemap_control_option('appname'),'manage_options','dn_sitemap_menage','dn_sitemap_menage');
});

function dn_sitemap_menage(){
	echo '<h1>'.__('Manage sitemap items','dn_sitemap').'</h1>';
	$tab=isset($_GET['tab'])?sanitize_text_field($_GET['tab']):'preview';
	$entity=isset($_GET['entity'])?sanitize_text_field($_GET['entity']):'post';
	$type=isset($_GET['type'])?sanitize_text_field($_GET['type']):'page';
	echo '<a href="options-general.php?page=dn_sitemap_menage&tab=preview" style="'.($tab=='preview'?'font-weight:bold':'').'">'.__('Preview','dn_sitemap').'</a>'
		.'&nbsp;|&nbsp;<a href="options-general.php?page=dn_sitemap_menage&tab=edit" style="'.($tab=='edit'?'font-weight:bold':'').'">'.__('Edit','dn_sitemap').'</a>'
		.'&nbsp;|&nbsp;<a href="options-general.php?page=dn_sitemap_menage&tab=clear" style="'.($tab=='clear'?'font-weight:bold':'').'">'.__('Delete','dn_sitemap').'</a>';
	$sm=get_dn_sitemap();
	if($tab=='clear'){
		echo '<p>'.__('Are you sure to delete it?','dn_sitemap').'</p>'
			.'<p>'.__('All data, in sitemap, will delete','dn_sitemap').'</p>'
			.'<form action="" method="post">'
			.'<p><input type="checkbox" name="dn_sitemap_action_clear_bak" value="1" checked /> '.__('Create copy of current sitemap.xml in uploads/sitemaps/sitemap-{created_date}.xml','dn_sitemap').'</p>'
			.'<p><input type="submit" name="dn_sitemap_action_clear" value="'.__('Delete sitemap','dn_sitemap').'" /></p>'
			.'</form>';
	}
	if($tab=='preview'){
		echo '<h2>'.__('Sitemap preview','dn_sitemap').'</h2>'
			.'<p><a href="'.get_option('siteurl').'/sitemap.xml" target="_new">'.__('View','dn_sitemap').' sitemap.xml</a>'
			.'&nbsp;&nbsp;'.__('or','dn_sitemap').'&nbsp;&nbsp;'
			.'<a href="options-general.php?page=dn_sitemap_menage&tab=preview&regen" style="'.($tab=='regen'?'font-weight:bold':'').'">'.__('Regenerates','dn_sitemap').' sitemap.xml</a></p>'
			.'<table class="wp-list-table widefat fixed striped pages"><thead><tr>'
			.'<th>'.__('Link','dn_sitemap').' ('.count($sm).')</th><th width="160">'.__('Last modified','dn_sitemap').'</th><th width="50">'.__('Priority','dn_sitemap').'</th><th width="20"></th>'
			.'</tr></thead><tbody id="the-list">';
		$n=-1; 
		foreach($sm as $index=>$l)if(is_array($l)&&is_string($l['link']))echo '<tr>'
			.'<td><a name="row'.(++$n).'"></a>'.$l['link'].'</td>'
			.'<td>'.$l['lastmod'].'</td>'
			.'<td>'.$l['priority'].'</td>'
			.'<td><a href="javascript:if(confirm(\''.__('Are you sure to delete it?','dn_sitemap').'\'))window.location=\'options-general.php?page=dn_sitemap_menage&tab=preview&delete='.$index.'&dnsm-verbose=1#row'.$n.'\';else void(0)" style="color:red">X</a></td>'
			.'</tr>';
		echo '</tbody></table><a name="row'.($n+1).'"></a>';
	}
	if($tab=='edit'){
		echo '<h2>'.__('Edit sitemap items','dn_sitemap').'</h2>';
		foreach(get_post_types(array('public'=>true),'objects') as $p)
			$menu.=(strlen($menu)>0?', ':'').'<a href="options-general.php?page=dn_sitemap_menage&tab=edit&entity=post&type='.$p->name.'" style="'.($type==$p->name?'font-weight:bold':'').'">'.$p->label.'</a>';
		foreach(get_taxonomies(array('public'=>true),'objects') as $p)
			$menu.=(strlen($menu)>0?', ':'').'<a href="options-general.php?page=dn_sitemap_menage&tab=edit&entity=tax&type='.$p->name.'" style="'.($type==$p->name?'font-weight:bold':'').'">'.$p->label.'</a>';
		echo $menu;
		echo '<form action="" method="post">'
			.'<input type="hidden" name="entity" value="'.$entity.'" />'
			.'<input type="hidden" name="type" value="'.$type.'" />'
			.'<input type="hidden" name="dnsm-verbose" value="1" />'
			.'<table class="wp-list-table widefat fixed striped pages"><thead><tr>'
			.'<th>'.$type.'</th><th width="100">'.__('Put in','dn_sitemap').'</th><th width="150">'.__('Priority','dn_sitemap').'</th></tr></thead><tbody id="the-list">';
		if($entity=='post'){
			$ps=new WP_Query(array(
				'post_type'=>$type,
				'post_status'=>'publish',
				'posts_per_page'=>20,
				'orderby'=>'post_title',
				'post_status' =>array('inherit','publish','draft','future'),
				'order'=>'asc',
				'paged'=>(isset($_GET['paged'])?intval($_GET['paged']):1),
			));
			foreach($ps->posts as $p){
				$index='post:'.$type.':'.$p->ID;
				echo '<tr><td><a href="post.php?post='.$p->ID.'&action=edit">'.$p->post_title.' ('.__($p->post_status).')</a></td>'
					.'<td>'.dn_sitemap_options_html_status($index,isset($sm[$index])?preg_replace('/(\d+)-(\d+)-(\d+) (\d+):(\d+):(\d+)/','$1-$2-$3T$4:$5:$6',$p->post_modified):false).'</td>'
					.'<td>'.dn_sitemap_options_html_priority($index,isset($sm[$index]['priority'])?$sm[$index]['priority']:false).'</td></tr>';
			}
			if($ps->max_num_pages>1){
				$page=intval($ps->query_vars['paged']);
				$link='options-general.php?page=dn_sitemap_menage&tab='.$tab.'&entity='.$entity.'&type='.$type.'&';
				$pagination.='<div style="text-align:center"><div class="tablenav-pages">'
				.'<p class="displaying-num">'.__('Page','dn_sitemap').' '.$page.' '.__('of','dn_sitemap').' '.$ps->max_num_pages.' ('.$ps->found_posts.' '.__('total items','dn_sitemap').')</p>'
				.'<span class="pagination-links">';
				if($page>1)$pagination.= '<a href="'.$link.'paged=1" class="tablenav-pages-navspan button" aria-hidden="true" title="'.__('First page','dn_sitemap').'">«</a>&nbsp;'
					.'<a href="'.$link.'paged='.($page-1).'" class="prev-page button" title="'.__('Previous page','dn_sitemap').'">‹</a>&nbsp;';
				if($page-3>1)$pagination.= '...&nbsp;';
				for($i=$page-3;$i<$page;$i++)if($i>0)$pagination.= '<a href="'.$link.'paged='.$i.'" class="button" title="'.__('Page','dn_sitemap').' '.$i.'">'.$i.'</a>&nbsp;';
				$pagination.= '<span class="tablenav-paging-text disabled button" title="'.__('Current page','dn_sitemap').'">'.$page.'</span>&nbsp;';
				for($i=$page+1;$i<=$page+3;$i++)if($i<=$ps->max_num_pages)$pagination.= '<a href="'.$link.'paged='.$i.'" class="tablenav-pages-navspan button" title="'.__('Page','dn_sitemap').' '.$i.'">'.$i.'</a>&nbsp;';
				if($page+3<$ps->max_num_pages)$pagination.= '...&nbsp;';
				if($page<$ps->max_num_pages)$pagination.='<a href="'.$link.'paged='.($page+1).'" class="prev-page button" title="'.__('Next page','dn_sitemap').'">›</a>&nbsp;'
					.'<a href="'.$link.'paged='.$ps->max_num_pages.'" class="tablenav-pages-navspan button" aria-hidden="true" title="'.__('Last page','dn_sitemap').'">»</a>';
				$pagination.= '</span></div></div>';
			}
		}
		if($entity=='tax'){
			foreach(get_terms(array('taxonomy'=>$type,'hide_empty'=>false)) as $t){
				$index='tax:'.$type.':'.$t->term_id;
				echo '<tr><td>'.$t->name.'</td>'
					.'<td>'.dn_sitemap_options_html_status($index,isset($sm[$index])?date('Y-m-d').'T'.date('H:i:s'):false).'</td>'
					.'<td>'.dn_sitemap_options_html_priority($index,isset($sm[$index]['priority'])?$sm[$index]['priority']:false).'</td></tr>';
			}
		}
		echo '</tbody></table>'
			.'<span onclick="jQuery(\'.dn_sitemap_updates_edit\').prop(\'checked\',true)" class="button-secondary">'.__('Select all','dn_sitemap').'</span>'
			.'<span onclick="jQuery(\'.dn_sitemap_updates_edit\').prop(\'checked\',false)" class="button-secondary">'.__('Deselect all','dn_sitemap').'</span>'
			.'<input type="submit" value="'.__('Update','dn_sitemap').'" class="button-primary" /></form>'.$pagination;
	}
}
add_action('init','dn_sitemap_save',200);
function dn_sitemap_save(){
	if(!function_exists('_z')){function _z($a=''){echo '<textarea style="width:100%;height:300px;line-height:1;font-size:12px">'.print_r($a,true).'</textarea>';}}
	load_textdomain('dn_sitemap',dirname(__FILE__).'/languages/'.'dn_sitemap'.'-'.get_locale().'.mo');
	load_plugin_textdomain('dn_sitemap',false,dirname(__FILE__).'/languages');
	if(isset($_GET['regen'])&&$_GET['page']=='dn_sitemap_menage'){dn_sitemap_generate(true);}
	if(isset($_GET['delete'])&&$_GET['page']=='dn_sitemap_menage'){
		$index=urldecode(sanitize_text_field($_GET['delete']));
		$sm=get_dn_sitemap();
		if(isset($sm[$index])){
			unset($sm[$index]);
			dn_sitemap_session_add_notify('success',__('Item deleted','dn_sitemap'));
			dn_sitemap_update($sm);
			dn_sitemap_generate(isset($_GET['dnsm-verbose'])?true:false);
		}
	}
	if(isset($_POST['dn_sitemap_action_clear'])){
		if(is_file(ABSPATH.'sitemap.xml')){
			if(isset($_POST['dn_sitemap_action_clear_bak'])){
				$date=date('YmdHis');
				if(!is_dir(ABSPATH.'wp-content/uploads/sitemaps/'))mkdir(ABSPATH.'wp-content/uploads/sitemaps/',0755,true);
				if(rename(ABSPATH.'sitemap.xml',ABSPATH.'wp-content/uploads/sitemaps/sitemap-'.$date.'.xml'))dn_sitemap_session_add_notify('success',__('sitemap moved in uploads/sitemaps','dn_sitemap'));
			}else{
				if(unlink(ABSPATH.'sitemap.xml'))dn_sitemap_session_add_notify('success',__('sitemap deleted','dn_sitemap'));
			}
		}else dn_sitemap_session_add_notify('error',__('sitemap.xml not found','dn_sitemap'));
		delete_option('dn_sitemap-list');
		wp_redirect('options-general.php?page=dn_sitemap_menage&tab=preview'); 
		exit;
	}
	if(isset($_POST['dn_sitemap_updates_list'])){
		$sm=get_dn_sitemap();
		foreach($_POST['dn_sitemap_updates_list'] as $index=>$priority){
			$index=sanitize_text_field($index);
			$priority=sanitize_text_field($priority);
			if(!isset($_POST['dn_sitemap_updates_edit'][$index])&&isset($sm[$index]))unset($sm[$index]);
			if(isset($_POST['dn_sitemap_updates_edit'][$index])){
				list($entity,$type,$id)=explode(':',$index);
				if($entity=='post')$link=get_permalink($id);
				if($entity=='tax')$link=get_term_link(intval($id),$type);
				if(is_string($link)&&strlen($link)>0)$sm[$index]=array(
					'link'=>$link,
					'lastmod'=>(isset($_POST['dn_sitemap_updates_edit'][$index])&&strlen($_POST['dn_sitemap_updates_edit'][$index])>0)?sanitize_text_field($_POST['dn_sitemap_updates_edit'][$index]):date('Y-m-d').'T'.date('H:i:s'),
					'priority'=>$priority,
				);
				else if(isset($sm[$index]))unset($sm[$index]);
			}
		}
		dn_sitemap_update($sm);
		dn_sitemap_generate(isset($_POST['dnsm-verbose'])?true:false);
	}
}

add_action('edit_tag_form_fields',function($term){
	echo '<tr class="form-field term-name-wrap"><th scope="row"><label for="sitemap">'.'DN Sitemap Control'.'</label></th><td>';
	$taxonomy=isset($term->taxonomy)?$term->taxonomy:null;
	$term_id=isset($term->term_id)?$term->term_id:0;
	echo dn_sitemap_options_html('term',$taxonomy,$term_id);
	echo '</td></tr>';
});

function dn_sitemap_meta_box($p){
	echo dn_sitemap_options_html('post',$p->post_type,$p->ID);
}
function dn_sitemap_options_html($entity,$type,$id){
	$sm=get_dn_sitemap();
	$index=$entity.':'.$type.':'.$id;
	$item=isset($sm[$index])?$sm[$index]:false; 
	return '<p>'.dn_sitemap_options_html_status($index,isset($item['lastmod'])?$item['lastmod']:false).' '.__('Put this element in sitemap','dn_sitemap').'</p>'
		.'<p>'.__('Priority','dn_sitemap').': '.dn_sitemap_options_html_priority($index,isset($item['priority'])?$item['priority']:0.5).'</p>';
}
function dn_sitemap_options_html_status($index,$lastmod=false){
	return '<input type="checkbox" name="dn_sitemap_updates_edit['.$index.']" value="'.$lastmod.'" '.($lastmod?'checked':'').' class="dn_sitemap_updates_edit" />';
}
function dn_sitemap_options_html_priority($index,$priority=false){
	return '<select name="dn_sitemap_updates_list['.$index.']" class="dn_sitemap_updates_list">'
	.'<option value="0.5" '.($priority&&floatval($priority)==0.5?'selected':'').'>'.__('Middle (0.5)','dn_sitemap').'</option>'
	.'<option value="0.2" '.($priority&&floatval($priority)==0.2?'selected':'').'>'.__('Low (0.2)','dn_sitemap').'</option>'
	.'<option value="0.8" '.($priority&&floatval($priority)==0.8?'selected':'').'>'.__('High (0.8)','dn_sitemap').'</option>'
	.'<option value="1"   '.($priority&&floatval($priority)==1  ?'selected':'').'>'.__('Maximum (1)','dn_sitemap').'</option>'
	.'</select>';
}
function get_dn_sitemap(){$sitemap=get_option('dn_sitemap-list');return is_array($sitemap)?$sitemap:array();}
function dn_sitemap_update($a=array()){ 
	$a=is_array($a)?$a:array();
	$ordering=array();
	$sitemap=array();
	foreach($a as $index=>$t){
		if(!preg_match('/(\d+)-(\d+)-(\d+)T(\d+):(\d+):(\d+)/i',$t['lastmod']))$t['lastmod']=date('Y-m-d').'T'.date('H:i:s');
		$t['index']=$index;
		$ordering[floatval($t['priority'])][$index]=$t;
	}
	foreach($ordering as $priority=>$ts)foreach($ts as $index=>$t)$sitemap[$index]=$t;
	update_option('dn_sitemap-list',$sitemap);
	return true;
}
function dn_sitemap_generate($verbose=false){
	$sitemap=get_dn_sitemap();
	$xml='<?xml version="1.0" encoding="UTF-8"?>'
		."\n".'<urlset '
		.'xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" '
		.'xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" '
		.'xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';
	foreach($sitemap as $p){
		if(is_string($p['link']))$xml.="\n<url>"
			."\n<loc>".esc_attr($p['link'])."</loc>"
			."\n<lastmod>".$p['lastmod']."</lastmod>"
			."\n<priority>".$p['priority']."</priority>"
			."\n</url>";
	}
	$xml.="\n".'</urlset>';
	if(file_put_contents(ABSPATH.'sitemap.xml',$xml))if($verbose)dn_sitemap_session_add_notify('success',__('sitemap.xml rigenerated','dn_sitemap'));
	else if($verbose)dn_sitemap_session_add_notify('error',__('sitemap.xml not updated for write error','dn_sitemap'));
}
function dn_sitemap_session_add_notify($k,$v=''){
	if(strlen($v)>0&&strlen($k)>0)
		$_SESSION['dn_sitemap_'.$k].=(strlen($_SESSION['dn_sitemap_'.$k])>0?'<br>':'').trim(strip_tags($v,'<br>'));
}
function dn_sitemap_session_has_notify($k){return (isset($_SESSION['dn_sitemap_'.$k])&&strlen($_SESSION['dn_sitemap_'.$k])>0)?true:false;}
function dn_sitemap_session_read_notify($k){
	if(!dn_sitemap_session_has_notify($k))return;
	$s=$_SESSION['dn_sitemap_'.$k];	unset($_SESSION['dn_sitemap_'.$k]);
	return $s;
}

add_action( 'admin_notices',function(){
	if(dn_sitemap_session_has_notify('success'))echo sprintf('<div class="notice notice-success is-dismissible"><p>%s</p></div>',dn_sitemap_session_read_notify('success'));
	if(dn_sitemap_session_has_notify('error'))echo sprintf('<div class="notice notice-error"><p>%s</p></div>',dn_sitemap_session_read_notify('error'));
});

?>