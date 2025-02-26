<?php
/**
 * @package     abcapp-creator
 * @author      ABCApp Creator Team
 * @copyright   2013-2018 ABCApp Creator
 * @version     1.1.2
 */
class App_Creator_Posts extends App_Creator_Default {

    public function getDatas() {

        $posts = array();

        if(!empty($_REQUEST['cat_ids'])) {
            $cat_ids = $_REQUEST['cat_ids'];
            foreach($cat_ids as $cat_id) {
                $tmp_posts = $this->getPosts($cat_id);
                if(!empty($tmp_posts)) $posts = $posts + $tmp_posts;
            }
        }
        else {
            $posts = $this->getPosts();
        }
//        die;
        return $posts;
    }

}
