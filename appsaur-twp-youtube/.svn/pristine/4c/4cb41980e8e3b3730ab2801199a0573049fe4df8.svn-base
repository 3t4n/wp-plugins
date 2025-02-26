<?php
	if ( ! defined( 'ABSPATH' ) ) exit;
	class atwp_main extends atwp_mth{
		function atwp_construct(){
			$data['cat']=$this->atwp_model('atwp_category_model','atwp_categories');
			$data['list']=$this->atwp_model('atwp_main_model','atwp_lst');
			$this->atwp_view('atwp_main_view',$data);
		}
		function atwp_edit(){
			$data=$this->atwp_model('atwp_main_model','atwp_edit');
			$this->atwp_view('atwp_edit_view',$data);
		}
		function atwp_save(){
			$data=$this->atwp_model('atwp_main_model','atwp_save');
			$this->atwp_view('atwp_save_view',$data);
			$this->atwp_view('atwp_edit_view',$data);
		}
		function atwp_add(){
			$data=$this->atwp_model('atwp_main_model','atwp_add');
			$this->atwp_view('atwp_edit_view',$data);

		}
		function atwp_delete(){
			$data['cat']=$this->atwp_model('atwp_main_model','atwp_categories');
			$data['edit']=$this->atwp_model('atwp_main_model','atwp_delete');
			$this->atwp_view('delete_view',$data);
			$data['list']=$this->atwp_model('atwp_main_model','atwp_lst');
			$this->atwp_view('atwp_main_view',$data);
		}


	}
?>