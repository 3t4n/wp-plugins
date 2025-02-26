<?php //Show block height and date in single post page
$b_fix2 =  get_option( 'blockheight_datefix' ); 
if($b_fix2!='shortd'){add_filter( 'get_the_date', 'bcbh_modify_get_the_date', 10, 3 );
  add_filter( 'get_the_time', 'bcbh_modify_get_the_date', 10, 3 );
}
function bcbh_modify_get_the_date( $value, $format, $post ) {
if ( is_single()){
$b_active =  get_option( 'blockheight_active' ); 
$b_label_text =  get_option( 'blockheight_label_text' ); 
$b_font_size =  get_option( 'blockheight_font_size' ); 
$b_color =  get_option( 'blockheight_color' ); 
$b_fix =  get_option( 'blockheight_datefix' ); 
$b_missing =  get_option( 'blockheight_missing' ); 
$post   = get_post( get_the_ID()  );
    $date = new DateTime( $post->post_date );
    if ( $format == "" )
        $format = get_option( "date_format" );
         
        $is_metaset = get_post_meta($post->ID, 'blockheight_publish', true);
        if($b_missing == 'yes' && $is_metaset ==''){
          $is_metaset = get_post_meta($post->ID, '_blockheight_modify_meta_key', true);
         }

        if($b_active=="on" && $is_metaset !=''){
          $number=  number_format(floatval($is_metaset), 0, '', ',');
          static $calls=1;
             $calls++;
            if ( $b_fix == "1" ){
                //working in 2020
                if($calls ==2){
                  return( $date->format( $format ) . '<div class="blockheight" style="color: '.$b_color.'; font-size: '.$b_font_size.'">'.$b_label_text.' '.$number.'</div>'  );
                }else{
                  return( $date->format( $format ) );
                } 
            }elseif($b_fix == "2"){

              if($calls ==2  ){
                return(  $date->format( $format ) ) ;
              }else{
                return(  $date->format( $format ) ."<div class='blockheight' style='color: ".$b_color."; font-size: ".$b_font_size."'>".$b_label_text." ".$number."</div>" ) ;
              }
            }elseif($b_fix == "shortd"){
              return(  $date->format( $format ) ."<div class='blockheight' style='color: ".$b_color."; font-size: ".$b_font_size."'>".$b_label_text." ".$number."</div>" ) ;

            }else{ //Default Auto Plain 
  
               return  $date->format( $format )  . "   &nbsp;&nbsp;&nbsp; ".$b_label_text. " ".$number;
            
            }
          }else{
            return( $date->format( $format ) );

          }
        }
} 

//Shortcode
add_shortcode('blockheight', 'bcbh_modify_get_the_date_shortcode' );
function bcbh_modify_get_the_date_shortcode( $value, $format, $post ) {
$b_active =  get_option( 'blockheight_active' ); 
$b_label_text =  get_option( 'blockheight_label_text' ); 
$b_font_size =  get_option( 'blockheight_font_size' ); 
$b_color =  get_option( 'blockheight_color' ); 
$b_fix =  get_option( 'blockheight_datefix' ); 
$b_missing =  get_option( 'blockheight_missing' ); 
$post   = get_post( get_the_ID()  );
    $date = new DateTime( $post->post_date );
    if ( $format == "" )
        $format = get_option( "date_format" );
         
        $is_metaset = get_post_meta($post->ID, 'blockheight_publish', true);
        if($b_missing == 'yes' && $is_metaset ==''){
          $is_metaset = get_post_meta($post->ID, '_blockheight_modify_meta_key', true);
         }
         $number=  number_format(floatval($is_metaset), 0, '', ',');
        if($b_active=="on" && $is_metaset !=''){
          return("<div class='blockheight' style='color: ".$b_color."; font-size: ".$b_font_size."'>".$b_label_text." ".$number."</div>" ) ;
        }
        
} 
