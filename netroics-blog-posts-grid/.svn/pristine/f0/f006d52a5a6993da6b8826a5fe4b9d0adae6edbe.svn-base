<?php 
// start all dynamic css from here

function netroicstp_dynamic_css()
{ ?>


<style type="text/css">
    .feature__single h3 {
        color: <?php $title_color = get_option('title_color');
         if(!empty($title_color)){
                echo esc_attr( $title_color );
            }else{
                echo '#555';
            }
         ?>;
        font-size: <?php $title_font_size = get_option('title_font_size');
             if(!empty($title_font_size)){
                echo esc_attr( $title_font_size );
            }else{
                echo '25px';
            }
        ?>;
    }

    
.feature__single p,
.other__resources_single p {
    color: <?php $details_color = get_option('details_color');
        if(!empty($details_color)){
            echo esc_attr( $details_color );
        }else{
            echo '#555';
        }
    ?>;
    font-size: <?php echo get_option('paragraph_font_size');
        if(!empty($paragraph_font_size)){
           echo esc_attr( $paragraph_font_size );
       }else{
           echo '18px';
       }
    
    ?>;
}

.feature__single .feature_single_details {
    padding: <?php echo get_option('netroics__blog_column_padding');?>;
}


a.page-numbers {
    background-color:  <?php $netroics__pagination_color = get_option('netroics__pagination_color');
         if(!empty($netroics__pagination_color)){
            echo esc_attr( $netroics__pagination_color );
            }else{
                echo '#eee';
            }
         ?>;
         
    color: <?php $netroics__pagination_Fontcolor = get_option('netroics__pagination_Fontcolor');
         if(!empty($netroics__pagination_Fontcolor)){
                echo esc_attr( $netroics__pagination_Fontcolor );
            }else{
                echo '#fff';
            }
         ?>;
}



span.page-numbers.current {
    background-color: <?php $netroics__pagination_Hovercolor = get_option('netroics__pagination_Hovercolor');
         if(!empty($netroics__pagination_Hovercolor)){
                echo esc_attr( $netroics__pagination_Hovercolor );
            }else{
                echo '#495';
            }
         ?>;
    color: <?php $netroics__pagination_Fontcolor = get_option('netroics__pagination_Fontcolor');
         if(!empty($netroics__pagination_Fontcolor)){
                echo esc_attr( $netroics__pagination_Fontcolor);
            }else{
                echo '#fff';
            }
         ?>;
}



</style>



<?php 
}
add_action('wp_footer','netroicstp_dynamic_css', 100);
?>