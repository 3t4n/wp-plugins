<?php
/*
Plugin Name: Default Sort Ascend
Description: Changes the default sort order from descending to ascending
Author: Dennis Steed
Version: 0.9
*/ 


function default_sort_ascend($t) {  
     $q = $t->query_vars;
     if ( empty($q['order']) || ((strtoupper($q['order']) != 'DESC') && (strtoupper($q['order']) != 'ASC')) )
          $q['order'] = 'ASC';
     $t->query_vars = $q;
}

 add_action('pre_get_posts', 'default_sort_ascend');

?>