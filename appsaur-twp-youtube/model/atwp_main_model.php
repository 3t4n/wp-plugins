<?php
	if ( ! defined( 'ABSPATH' ) ) exit;
	class atwp_main_model extends atwp_mth{
		function atwp_lst(){
			global $wpdb;
			$q='';
			if(sanitize_key(@$_GET['cat'])){
				$q=" WHERE `cat` = '".str_replace('+',' ',sanitize_text_field(@$_GET['cat']))."'";
			}
			if(sanitize_key(@$_GET['cat'])=='0'){
				$q=" WHERE `cat` = ''";
			}
			$sql=$wpdb->get_results("SELECT * FROM `".$wpdb->prefix."twp_vid`".$q);
			if($sql){
				$data=$sql;
				foreach($sql as $row){
					$sql=$wpdb->get_results("SELECT * FROM `".$wpdb->prefix."twp_vid_cat` WHERE `id`='".$row->cat."'");
					$data['cat'][$row->id]=$sql[0]->title;
				}
			}
			return $data;

		}
		function atwp_add(){
			global $wpdb;
			$vid=sanitize_text_field(esc_url(@$_POST['vid'],'http','display'));
			$vid=explode('v=',$vid);
			$vid=explode('&',$vid[1]);
			if(!@$_POST['title']){
				@$_POST['title']=__('No-name');
			}
			if(!@$_POST['twidth']){
				@$_POST['twidth']='148';
			}
			if(!@$_POST['theight']){
				@$_POST['theight']='111';
			}
			if(!@$_POST['pwidth']){
				@$_POST['pwidth']='640';
			}
			if(!@$_POST['pheight']){
				@$_POST['pheight']='320';
			}
			$sql=$wpdb->query("INSERT INTO `".$wpdb->prefix."twp_vid` (`title`,`cat`,`link`,`vid`,`thumbnail`,`twidth`,`theight`,`pwidth`,`pheight`) VALUES ('','','".sanitize_text_field(esc_url(@$_POST['vid'],'http','display'))."','".$vid[0]."','0','".sanitize_key(@$_POST['twidth'])."','".sanitize_key(@$_POST['theight'])."','".sanitize_key(@$_POST['pwidth'])."','".sanitize_key(@$_POST['pheight'])."')");
			$sql=$wpdb->get_results("SELECT * FROM `".$wpdb->prefix."twp_vid` ORDER BY `id` DESC LIMIT 1");
			if($sql){
				$data['edit']=$sql;
				foreach($sql as $row){
					$sql=$wpdb->get_results("SELECT * FROM `".$wpdb->prefix."twp_vid_cat` WHERE `id`='".$row->cat."'");
					$data['cat'][$row->id]=$sql[0]->title;
				}
			}
			$sql=$wpdb->get_results("SELECT * FROM `".$wpdb->prefix."twp_vid_cat` ORDER BY `title` ASC");
			if($sql){
				$data['categories']=$sql;
			}
			return $data;
		}
		function atwp_edit(){
			global $wpdb;
			$sql=$wpdb->get_results("SELECT * FROM `".$wpdb->prefix."twp_vid` WHERE `id`='".sanitize_key(@$_GET['pid'])."'");
			if($sql){
				$data['edit']=$sql;
				$sql=$wpdb->get_results("SELECT * FROM `".$wpdb->prefix."twp_vid_cat` WHERE `id`='".$sql[0]->cat."'");
				if($sql){
					$data['cat']=$sql;
				}
			}
			$sql=$wpdb->get_results("SELECT * FROM `".$wpdb->prefix."twp_vid_cat` ORDER BY `title` ASC");
			if($sql){
				$data['categories']=$sql;
			}
			return $data;
		}
		function atwp_save(){
			global $wpdb;
			$vid=sanitize_text_field(esc_url(@$_POST['vid'],'http','display'));
			$vid=explode('v=',$vid);
			$vid=explode('&',$vid[1]);
			$wpdb->query("UPDATE `".$wpdb->prefix."twp_vid` SET `title`='".sanitize_text_field(@$_POST['title'])."', `cat`='".sanitize_text_field(@$_POST['cat'])."',`link`='".sanitize_text_field(esc_url(@$_POST['vid'],'http','display'))."',`vid`='".$vid[0]."',`thumbnail`='".sanitize_text_field(@$_POST['thumbnail'])."',`twidth`='".sanitize_text_field(@$_POST['twidth'])."',`theight`='".sanitize_text_field(@$_POST['theight'])."',`pwidth`='".sanitize_text_field(@$_POST['pwidth'])."',`pheight`='".sanitize_text_field(@$_POST['pheight'])."' WHERE `id`='".sanitize_key(@$_GET['pid'])."' LIMIT 1");
			$sql=$wpdb->get_results("SELECT * FROM `".$wpdb->prefix."twp_vid` WHERE `id`='".sanitize_key(@$_GET['pid'])."'");
			if($sql){
				$data['edit']=$sql;
				$sql=$wpdb->get_results("SELECT * FROM `".$wpdb->prefix."twp_vid_cat` WHERE `id`='".$sql[0]->cat."'");
				if($sql){
					$data['cat']=$sql;
				}
			}
			$sql=$wpdb->get_results("SELECT * FROM `".$wpdb->prefix."twp_vid_cat` ORDER BY `title` ASC");
			if($sql){
				$data['categories']=$sql;
			}
			return $data;
		}
		function atwp_delete(){
			global $wpdb;
			$sql=$wpdb->get_results("SELECT * FROM `".$wpdb->prefix."twp_vid` WHERE `id`='".sanitize_key(@$_GET['pid'])."'");
			if($sql){
				$data=$sql;
			}
			
			$sql=$wpdb->query("DELETE FROM `".$wpdb->prefix."twp_vid` WHERE `id`='".sanitize_key(@$_GET['pid'])."'");
			return $data;
		}
	}
?>