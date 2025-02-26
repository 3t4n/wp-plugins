<?php
/**
 * Description of E2WL_Categories
 *
 * @author User
 */
if (!class_exists('E2WL_Categories')){
    class E2WL_Categories {
        public static function get_categories($site='all') {
            if($site == 'all'){
                $result = array('categories'=>array());
                if (file_exists(E2WL()->plugin_path . 'assets/data/categories.json')) {
                    $result = json_decode(file_get_contents(E2WL()->plugin_path . 'assets/data/categories.json'), true);
                }
            }else{
                $result = array();
                if (file_exists(E2WL()->plugin_path . 'assets/data/categories.json')) {
                    $result = json_decode(file_get_contents(E2WL()->plugin_path . 'assets/data/categories.json'), true);
                    $s = E2WL_EbaySite::get_site($site);
                    if($s && isset($result["categories"][$s->siteid])){
                        $result = $result["categories"][$s->siteid];
                    }
                }
                array_unshift($result, array("id" => "0", "name" => "All categories", "level" => 1));
            }
            
            return $result;
        }
        
        public static function save_categories($site, $categories) {
            $s = E2WL_EbaySite::get_site($site);
            if($s){
                $all_categories = E2WL_Categories::get_categories('all');
                $all_categories["categories"][$s->siteid] = $categories;
                file_put_contents(E2WL()->plugin_path . 'assets/data/categories.json', json_encode($all_categories));
            }
        }
    }
}
