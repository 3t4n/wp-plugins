<?php
	if ( ! defined( 'ABSPATH' ) ) exit;
	class atwp_category extends atwp_mth{

		// Construct method

		function construct(){
			$data['cat']=$this->atwp_model('atwp_category_model','atwp_categories');
			$data['list']=$this->atwp_model('atwp_main_model','atwp_lst');
			$this->atwp_view('main_view',$data);
		}

		// Edit category method

		function edit(){
			$data['edit']=$this->atwp_model('atwp_category_model','atwp_edit');
			$this->atwp_view('edit_category_view',$data);
		}

		// Saving category method

		function save(){
			$data['edit']=$this->atwp_model('atwp_category_model','atwp_save');
			$this->atwp_view('save_category_view',$data);
			$this->atwp_view('edit_category_view',$data);
		}

		// Adding category form method

		function add(){
			$this->atwp_view('add_category_view');
		}

		// Adding category method

		function add_category(){
			$data['edit']=$this->atwp_model('atwp_category_model','add_category');
			$this->atwp_view('edit_category_view',$data);
		}

		// Delete category method

		function delete(){
			$this->atwp_model('atwp_category_model','atwp_delete');
			echo "<script>location.assign('?page=twp-youtube');</script>";
		}

		// Setup movies and thumbnail size

		function setup(){
			$this->atwp_model('atwp_category_model','atwp_setup');
			echo "<script>location.assign('?page=twp-youtube');</script>";
		}
	}
?>