<?php
ini_set('display_errors',0); 
error_reporting(E_ALL);

global $Application_Maker, $oThis;
if (!class_exists('setCategoryManageCls')) {

    class setCategoryManageCls extends Application_Maker_setField {

        public function __construct() {
            $this->fieldtype = "setCategoryManage";
            $this->hasSaveField = true;
            $this->AbortGlobalSave = false;
            $this->classSubActions = array( 'getCategoryManageData' , 'addCategorymail' , 'updateCategorymail', 'deleteCategorymail');
        }
		
		public function buildTree($items) {
			
			$childs = array();

			foreach($items as $item)
				$childs[$item->parent][] = $item;

			foreach($items as $item) 
				if (isset($childs[$item->term_id]))
					$item->childs = $childs[$item->term_id];

			return $childs[0];
		}

		public function deleteCategorymail() {
            global $wpdb, $current_user, $meta_marker, $post_id;
			$tagcateg = 'cat_ori_mailfolders';
			$categoryMailIDs = explode(',',$_POST['categoryMailID']);
			
			foreach(@$categoryMailIDs as $categoryMailID){
				$str = "SELECT *
						FROM $wpdb->term_taxonomy tt
						INNER JOIN $wpdb->terms ts ON tt.term_id = ts.term_id
						WHERE tt.term_id = $categoryMailID";					
				$result_tmp = $wpdb->get_results($str);
				$parent_term = $result_tmp[0]->parent;
				
				$str = "SELECT term_id
						FROM $wpdb->term_taxonomy tt
						WHERE tt.parent = $categoryMailID";					
				$term_update_parent = $wpdb->get_results($str);
				
				$ret = wp_delete_term(
						$categoryMailID,     // the term
						$tagcateg,
						array()
					);
				if(!$ret){
					echo json_encode(array('status' => false, 'data_arr' =>'error'));
					return ;
				}else{
					$taxonomymeta = $wpdb->prefix."taxonomymeta";
					$post_ID = $_POST['post_ID'];
					
					$results = $wpdb->delete( $taxonomymeta, array( 'taxonomy_id' => $categoryMailID ) );
					
					delete_post_meta($post_ID , 'CategoryEmailList_'.$categoryMailID);
					
					foreach($term_update_parent as $term){
						$str = "UPDATE $wpdb->term_taxonomy
								SET parent = '$parent_term'
								WHERE term_id = '".$term->term_id."'";					
						$result_tmp = $wpdb->get_results($str);
					}
					if(!$ret){
						echo json_encode(array('status' => false, 'data_arr' =>'error'));
						return ;
					}
					
				}
			}
			echo json_encode(array('status' => true));
			return ;
		}
		
		public function updateCategorymail() {
            global $wpdb, $current_user, $meta_marker, $post_id;
			$name = $_POST['addcateg_name'];
			$parent = $_POST['parentcateg'];
			$description = $_POST['descriptcateg'];
			$tagcateg = $_POST['tagcateg'];
			$post_ID = $_POST['post_ID'];
			$categoryMailID = $_POST['categoryMailID'];
			
			$parent_term = term_exists( $tagcateg, $tagcateg ); // array is returned if taxonomy is given
			if(!$parent_term){
				register_taxonomy($tagcateg, $tagcateg);
			}
			
			$ret = wp_update_term(
					$categoryMailID,     // the term
					$tagcateg, // the taxonomy
					array(
				'name' => $name,
				'description' => $description,
				'parent' => $parent
					)
			);
			// print_r($name);echo '<br>';
			// print_r($description);echo '<br>';
			// print_r($parent);echo '<br>';
			// print_r($ret);echo '<br>';
			// exit();
			if(is_wp_error($ret)){
				$errors = $ret->get_error_messages();
				echo json_encode(array('status' => false, 'data_arr' => implode(',',$errors)));
			}else{
				echo json_encode(array('status' => true, 'data_arr' => $ret['term_id']));
			}
		}
		
		public function addCategorymail() {
            global $wpdb, $current_user, $meta_marker, $post_id;
			/* // add width post type
			$addcateg_name = $_POST['addcateg_name'];
			$tagcateg = $_POST['tagcateg'];
			$parentcateg = $_POST['parentcateg'];
			$descriptcateg = $_POST['descriptcateg'] ? $_POST['descriptcateg'] : '';
			$postID = $_POST['post_ID'];
			
			$my_post = array(
			  'post_title'    => $addcateg_name,
			  'post_content'  => $descriptcateg,
			  'post_status'   => 'publish',
			  'post_author'   => $current_user->ID,
			  'post_type'     => $tagcateg,
			  'post_parent'   => $parentcateg
			);

			// Insert the post into the database
			if(wp_insert_post( $my_post , $wp_error))
				echo true;
			else
				echo  $wp_error;
			*/

			// /*	// add width taxonomy type
			$name = $_POST['addcateg_name'];
			$parent = $_POST['parentcateg'];
			$description = $_POST['descriptcateg'];
			$tagcateg = $_POST['tagcateg'];
			$post_ID = $_POST['post_ID'];
			$parent_term = term_exists( $tagcateg, $tagcateg ); // array is returned if taxonomy is given
			if(!$parent_term){
				register_taxonomy($tagcateg, $tagcateg);
			}
			$ret = wp_insert_term(
					$name,     // the term
					$tagcateg, // the taxonomy
					array(
				'description' => $description,
				'parent' => $parent
					)
			);
			if(is_wp_error($ret)){
				$errors = $ret->get_error_messages();
				echo json_encode(array('status' => false, 'data_arr' => implode(',',$errors)));
			}else{
				$this->add_term_meta($ret['term_id'] , 'mailboxID' , $post_ID , false);
				$this->add_term_meta($ret['term_id'] , 'userID' , $current_user->ID , false);
				echo json_encode(array('status' => true, 'data_arr' => $ret['term_id']));
			}
			// */
        }
		
		public function installTableCategoryMeta(){
			global $wpdb;
			
			$charset_collate = '';	
			$taxonomymeta = $wpdb->prefix."taxonomymeta";
			
			if ( ! empty($wpdb->charset) )
				$charset_collate = "DEFAULT CHARACTER SET $wpdb->charset";
			if ( ! empty($wpdb->collate) )
				$charset_collate .= " COLLATE $wpdb->collate";
			$tables = $wpdb->get_results("show tables like '$taxonomymeta'");
			if (!count($tables)){
				echo $wpdb->query("CREATE TABLE $taxonomymeta (
					meta_id bigint(20) unsigned NOT NULL auto_increment,
					taxonomy_id bigint(20) unsigned NOT NULL default '0',
					meta_key varchar(255) default NULL,
					meta_value longtext,
					PRIMARY KEY	(meta_id),
					KEY taxonomy_id (taxonomy_id),
					KEY meta_key (meta_key)
				) $charset_collate;");
				
			}	
		}
		
		function add_term_meta($term_id, $meta_key, $meta_value, $unique = false) {
			global $wpdb, $current_user, $meta_marker, $post_id;
			// return add_metadata('taxonomy', $term_id, $meta_key, $meta_value, $unique);
			$taxonomymeta = $wpdb->prefix."taxonomymeta";
			$column = 'taxonomy_id';
			if ( $unique && $wpdb->get_var( $wpdb->prepare(
	                "SELECT COUNT(*) FROM $taxonomymeta WHERE meta_key = %s AND $column = %d",
	                $meta_key, $term_id ) ) )
	                return false;
			
			$result = $wpdb->insert($taxonomymeta, array(
	                'taxonomy_id' => $term_id,
					'meta_key' => $meta_key,
	                'meta_value' => $meta_value
	        ) );
	
	        if (!$result)
	                return false;
	
	        return (int) $wpdb->insert_id;
	
		}
		function delete_term_meta($term_id, $meta_key, $meta_value = '') {
			return delete_metadata('taxonomy', $term_id, $meta_key, $meta_value);
		}
		function get_term_meta($term_id, $key, $single = false) {
			return get_metadata('taxonomy', $term_id, $key, $single);
		}
		function update_term_meta($term_id, $meta_key, $meta_value, $prev_value = '') {
			return update_metadata('taxonomy', $term_id, $meta_key, $meta_value, $prev_value);
		}

        public function getCategoryManageData() {
            global $wpdb, $current_user, $meta_marker;
			$post_ID = $_POST['post_ID'];
			$taxonomymeta = $wpdb->prefix."taxonomymeta";
			$str = "SELECT DISTINCT tm.taxonomy_id
					FROM $taxonomymeta as tm
					INNER JOIN $taxonomymeta as tmp ON tmp.taxonomy_id = tm.taxonomy_id
					WHERE tm.meta_key IN ('mailboxID') AND tm.meta_value IN ('$post_ID')
					AND tmp.meta_key IN ('userID') AND tmp.meta_value IN ('$current_user->ID') 
					";

			$results = $wpdb->get_results($str);
			
			if(!$results){
				echo json_encode(array('status' => true, 'data_arr' => array()));
				return;
			}
			$data_arr = array();
			foreach($results as $value){
				$str = "SELECT *
						FROM $wpdb->term_taxonomy tt
						INNER JOIN $wpdb->terms ts ON tt.term_id = ts.term_id
						WHERE tt.term_id = $value->taxonomy_id";					
				$result_tmp = $wpdb->get_results($str);
				array_push($data_arr , $result_tmp[0]);
			}
			// print_r($data_arr);
			echo json_encode(array('status' => true, 'data_arr' => $this->buildTree($data_arr) , 'data_count' => count($data_arr)));
			
		}

        public function saveField($post_id, $key, $meta_marker, $data, $field) {
            global $current_user, $post_id;
            $data = $_POST[$key . $meta_marker];
           // update_post_meta($post_id,$key . $meta_marker,$data);
        }

        public function getField($oThis, $config, $post, $meta_marker) {
            global $current_user, $post_id;
            //'test'.$this->meta_marker."**".$this->add_image;
			
			$this->installTableCategoryMeta();

            $this->init($oThis, $config, $post, $meta_marker);
            // print_r($oThis);exit();
            $str = "<div class='c_field_container c_setCategoryManage' data-field_type='setCategoryManage'
                     data-fwidthCls='" . $config['fwidthCls'] . "'
                     data-field='" . $config['field'] . "'
                     data-value ='" . $config['value'] . "'
                     data-label ='" . $config['label'] . "'
                     data-meta_marker='" . $meta_marker . "'></div>";
            return $str; //'test'.$this->meta_marker."**".$this->add_image;
            return $str;
        }

    }

}

$oThis->extension_class_instances['setCategoryManage'] = new setCategoryManageCls();
//$setUploadGrid=new setUploadGridCls();
?>
