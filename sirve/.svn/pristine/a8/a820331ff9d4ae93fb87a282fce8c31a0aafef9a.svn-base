<?php

/* ShortCode */
//sirve Archive page
function sirve_archive_page_shortcode( $attributes ){
    extract( shortcode_atts( array(
        'order'        => '',
        'orderby'     => '',
    ), $attributes ) );

    ob_start();
        include( SIRVE_PL_FRONTEND . 'archive-sirve.php' );
    return ob_get_clean();
}
add_shortcode( 'sirve_page', 'sirve_archive_page_shortcode');

/* ShortCode */
function sirve_shortcode( $attributes ){

    extract( shortcode_atts( array(
        'id'            => '',
        'tags'          => '',
        'event'         => '',
        'exclude_menu' => '',
        'order'         => '',
        'orderby'       => '',
        'style'       => '',
    ), $attributes ) );

    ob_start();
    
    if(!empty($id) && !empty($event) && !empty($tags)){
       ?> <p><b><?php echo esc_html__( 'Note: ', 'sirve') ?> </b> <?php echo esc_html__( 'Please insert a single attribute at a time while using a shortcode to filter the Listing. Example: [sirve id="Post ID"] OR [sirve event="Event Name"] OR [sirve tags="tag_one,tag_two,tag_three"]', 'sirve' ) ?> </p> <?php 

    }elseif(isset($id) && !empty($id)){
        
        //ID Query Sirve
        $args = array(
            'post_type' => 'sirve',
            'post_status' => 'publish',
            'p' => $id );
        $query = new WP_Query( $args );
        
        sirve_post_render($query, false, true, $style);
        wp_reset_query();
        

   }elseif(isset($event) && !empty($event)){ 
        include( SIRVE_PL_FRONTEND . 'templates/event-archive-layout.php' );
    
    }elseif(isset($tags) && !empty($tags)){
        $tags = explode(",",$tags);
        include( SIRVE_PL_FRONTEND . 'templates/tags-archive-layout.php' );
    
    }else{
        ?> <p><b><?php echo esc_html__( 'Note: ', 'sirve') ?> </b> <?php echo esc_html__( 'Please insert correct Sirve shortcode attribute.', 'sirve' ) ?> </p> <?php 
    }
    return ob_get_clean();
    
}
add_shortcode( 'sirve', 'sirve_shortcode');  