<?php

/**
 * 
 * @param type $args
 */
function awt_get_testimonials($args=array()){
    global $wpdb;
    
    $defaults = array(
        'count'  => 1,
        'order'  => 'rand',
    );
    
    $args = wp_parse_args($args, $defaults);
    
    $qry['A']  = " SELECT * FROM {$wpdb->posts} WHERE ";
    $qry['A'] .= " post_type='awt_testimonial' AND post_status='publish' ";
    
    switch(strtolower($args['order'])){
        default:
        case 'rand':
            $qry['A'] .= " ORDER BY RAND()";
            break;
        case 'asc':
            $qry['A'] .= " ORDER BY ID ASC";
            break;
        case 'desc':
            $qry['A'] .= " ORDER BY ID DESC";
            break;
    }
   
    $qry['A'] .= " LIMIT 0,{$args['count']}";
    
    return $wpdb->get_results($qry['A']);
}