<?php
	class atwp_mth{

		// Check if file exsists

		function atwp_exists($type,$file){
			if(file_exists(__DIR__.'/'.$type.'/'.$file.'.php')){
				return true;
			}
			return 'false';
		}

		// Append file to script

		function atwp_append($type,$file,$data=''){
			global $wpdb;
			if($this->atwp_exists($type,$file)==true){
				
				require_once($type.'/'.$file.'.php');
			}
		}

		// Adding model file and assign model class

		function atwp_model($file,$mth){
			global $wpdb;
			if($this->atwp_exists('model',$file)==true){
				$this->atwp_append('model',$file);
				if(class_exists($file)==true){
					//echo 'model test 1';
					$obj=new $file;
					echo $file.' - '.$mth;
					if($mth!=''){
						if(method_exists($file,$mth)==true){
							return $obj->$mth();
						}
					}
				}
			}
		}

		// Adding view file and assign view class 

		function atwp_view($file,$data=''){
			global $wpdb;
			if($this->atwp_exists('view',$file)==true){
				$data=$data;
				$this->atwp_append('view',$file,$data);

			}
		}

		// Assign controller file 

		function atwp_path(){
			global $wpdb;
			$file=explode('-',sanitize_key(@$_GET['subpage']));
			if($file[0]==''){
				$file[0]='atwp_main';
			}else{
				$file[0]='atwp_'.$file[0];
			}
			if($file[1]==''){
				$file[1]='atwp_construct';
			}else{
				$file[1]='atwp_'.$file[1];
			}
			if($this->atwp_exists('controller',$file[0])==true){
				$this->atwp_append('controller',$file[0]);
				if(class_exists($file[0])==true){
					$obj=new $file[0];
					if($file[1]!=''){
						if(method_exists($file[0],$file[1])==true){
							$obj->$file[1]();
						}
					}else{
						if(method_exists($file[0],'atwp_construct')==true){
							echo 'controller ok';
							$obj->atwp_construct();
						}
					}
				}
			}
			
		}
		
	}
	$obj=new atwp_mth;
	$obj->atwp_path();

?>