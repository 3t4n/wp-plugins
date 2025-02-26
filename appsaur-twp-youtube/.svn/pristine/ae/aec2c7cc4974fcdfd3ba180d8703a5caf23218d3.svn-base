<?php
	if ( ! defined( 'ABSPATH' ) ) exit;
	class atwp_category_model{
		function atwp_add_category(){
			global $wpdb;
			if(!@$_POST['title']){
				@$_POST['title']='No-title';
			}
			if(!@$_POST['twidth']){
				@$_POST['twidth']='148px';
			}
			if(!@$_POST['twidth']){
				@$_POST['twidth']='111px';
			}
			if(!@$_POST['pwidth']){
				@$_POST['pwidth']='148px';
			}
			if(!@$_POST['pheight']){
				@$_POST['pheight']='111px';
			}
			$wpdb->query("INSERT INTO `".$wpdb->prefix."twp_vid_cat` (`title`,`twidth`,`theight`,`pwidth`,`pheight`,`playlist`) VALUES ('".sanitize_text_field(@$_POST['title'])."','".sanitize_text_field(@$_POST['twidth'])."','".sanitize_text_field(@$_POST['theight'])."','".sanitize_text_field(@$_POST['pwidth'])."','".sanitize_text_field(@$_POST['pheight'])."','".sanitize_text_field(@$_POST['playlist'])."')");
			$sql=$wpdb->get_results("SELECT * FROM `".$wpdb->prefix."twp_vid_cat` ORDER BY `id` DESC LIMIT 1");
			if($sql){
				$data=$sql;
			}

			return $data;
		}
		function atwp_categories(){
			global $wpdb;
			$sql=$wpdb->get_results("SELECT * FROM `".$wpdb->prefix."twp_vid_cat` ORDER BY `title` ASC");
			if($sql){
				$data=$sql;
			}
			return $data;
		}
		function atwp_delete(){
			global $wpdb;
			$wpdb->query("UPDATE `".$wpdb->prefix."twp_vid` SET `cat`='0' WHERE `cat`='".sanitize_key(@$_GET['cat'])."'");
			$wpdb->query("DELETE FROM `".$wpdb->prefix."twp_vid_cat` WHERE `id`='".sanitize_key(@$_GET['cat'])."'");
		}
		function atwp_edit(){
			global $wpdb;
			$sql=$wpdb->get_results("SELECT * FROM `".$wpdb->prefix."twp_vid_cat` WHERE `id`='".sanitize_key(@$_GET['cat'])."'");
			if($sql){

				$data=$sql;
			}
			return $data;
		}
		function atwp_save(){
			global $wpdb;
			if(!@$_POST['title']){
				@$_POST['title']=__('No-name');
			}
			if(!@$_POST['twidth']){
				@$_POST['twidth']='148px';
			}
			if(!@$_POST['twidth']){
				@$_POST['twidth']='111px';
			}
			if(!@$_POST['pwidth']){
				@$_POST['pwidth']='148px';
			}
			if(!@$_POST['pheight']){
				@$_POST['pheight']='111px';
			}
			$wpdb->query("UPDATE `".$wpdb->prefix."twp_vid_cat` SET `title`='".sanitize_text_field(@$_POST['title'])."',`twidth`='".sanitize_text_field(@$_POST['twidth'])."',`theight`='".sanitize_text_field(@$_POST['theight'])."',`pwidth`='".sanitize_text_field(@$_POST['pwidth'])."',`pheight`='".sanitize_text_field(@$_POST['pheight'])."',`playlist`='".sanitize_text_field(@$_POST['playlist'])."' WHERE `id`='".sanitize_key(@$_GET['cat'])."'");
			$sql=$wpdb->get_results("SELECT * FROM `".$wpdb->prefix."twp_vid_cat` WHERE `id`='".sanitize_key(@$_GET['cat'])."'");
			if($sql){
				$data=$sql;
			}
			return $data;
		}
		function atwp_setup(){
			global $wpdb;
			$sql=$wpdb->get_results("SELECT * FROM `".$wpdb->prefix."twp_vid_cat` WHERE `id`='".sanitize_key(@$_GET['cat'])."' LIMIT 1");
			if($sql){
				foreach($sql as $row){
					$wpdb->query("UPDATE `".$wpdb->prefix."twp_vid` SET `twidth`='".$row->twidth."', `theight`='".$row->theight."', `pwidth`='".$row->pwidth."', `pheight`='".$row->pheight."'  WHERE `cat`='".$row->id."' ");
				}
			}
			
		}

	}
?>