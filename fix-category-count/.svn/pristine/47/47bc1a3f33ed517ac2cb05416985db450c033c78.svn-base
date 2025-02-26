<?php

class Fix_Category_Count
{	
    public $post_type = NULL;
    private $count = 0;
    private $taxonomies;

    public function post_type($post_type) {
        $this->post_type = sanitize_text_field($post_type);
    }
    
    public function process(){
		global $wpdb;
		$this->taxonomies = $this->get_this_taxonomies();
		if($this->fix_categories_count()){
			return TRUE;
		}
    }
    
    private function get_this_taxonomies(){
	    return get_object_taxonomies($this->post_type);
    }
    
    private function fix_categories_count(){
	    global $wpdb;
	    $t = $this->taxonomies;
	    foreach($this->taxonomies AS $tax){
		    if($tax!='post_tag'){
				set_time_limit(0);
			    $category_ids = $wpdb->get_results("SELECT * FROM `{$wpdb->prefix}term_taxonomy` WHERE taxonomy = '$tax'", ARRAY_A);
			    foreach($category_ids as $c) {
					$cat_row = $wpdb->get_results("SELECT * FROM `{$wpdb->prefix}term_relationships` WHERE `term_taxonomy_id`='".$c['term_taxonomy_id']."'", ARRAY_A);
					$count=0;
					foreach($cat_row AS $row){
						$wpdb->get_results("SELECT * FROM `{$wpdb->prefix}posts` where `post_status`='publish' and `post_type`='".$this->post_type."' and `ID`='".$row['object_id']."'", ARRAY_A);
						if($wpdb->num_rows>0) {
							$count=$count+1;
						}
					}
					$this->update_category_correct_count($c['term_taxonomy_id'], $count);
				}
			}
		}
		return TRUE;
    }
        
	private function update_category_correct_count($tax_id, $count){
		global $wpdb;
		$row = $wpdb->get_row("SELECT * FROM `{$wpdb->prefix}term_taxonomy` WHERE `term_taxonomy_id`='".$tax_id."'", ARRAY_A);	
		$wpdb->update('wp_term_taxonomy', array('count'=>$count), array('term_taxonomy_id'=>$row['term_id']));
		return TRUE;
	}
}