<?php

// Sirve Coustom css
function sirve_coustom_css(){
    $pageWidth = sirve_generate_css( 'max-width', esc_attr(get_option('sirve_archive_page_width')) , 'px', '!important');


    $buttonTextColor1 = sirve_generate_css( 'color', esc_attr(get_option('sirve_button_1_text_color')) , '', '!important');
    $buttonTextHoverColor1 = sirve_generate_css( 'color', esc_attr(get_option('sirve_button_1_text_hover_color')) , '!important');
    $buttonBgColor1 = sirve_generate_css( 'background', esc_attr(get_option('sirve_button_1_bg_color')) , '', '!important');
    $buttonBgHoverColor1 = sirve_generate_css( 'background', esc_attr(get_option('sirve_button_1_bg_hover_color')) , '', '!important');
    $buttonBorderColor1 = sirve_generate_css( 'border', (!empty(get_option('sirve_button_1_boder_color'))) ?  '1px solid '.esc_attr(get_option('sirve_button_1_boder_color')) : '' , '', '!important');

    $buttonTextColor2 = sirve_generate_css( 'color', esc_attr(get_option('sirve_button_2_text_color')) , '', '!important');
    $buttonTextHoverColor2 = sirve_generate_css( 'color', esc_attr(get_option('sirve_button_2_text_hover_color')) , '!important');
    $buttonBgColor2 = sirve_generate_css( 'background', esc_attr(get_option('sirve_button_2_bg_color')) , '', '!important');
    $buttonBgHoverColor2 = sirve_generate_css( 'background', esc_attr(get_option('sirve_button_2_bg_hover_color')) , '', '!important');
    $buttonBorderColor2 = sirve_generate_css( 'border', (!empty(get_option('sirve_button_2_boder_color'))) ?  '1px solid '.esc_attr(get_option('sirve_button_2_boder_color')) : '' , '', '!important');

    $all_style ="
        .sirve__container {{$pageWidth}}
        .sirve__button-live {{$buttonTextColor1} {$buttonBgColor1} {$buttonBorderColor1}}
        .sirve__button-live:hover {{$buttonBgHoverColor1} {$buttonTextHoverColor1} {$buttonBorderColor1}}

        .sirve__button-visit {{$buttonTextColor2} {$buttonBgColor2} {$buttonBorderColor2}}
        .sirve__button-visit:hover {{$buttonBgHoverColor2} {$buttonTextHoverColor2} {$buttonBorderColor2}}
    ";

    $all_style .= get_option('sirve_coustom_css');
    
    return $all_style;
}

// Sirve Generate Css
function sirve_generate_css( $css_attr, $parameter, $unit = '', $important = '' ){

    $value = !empty( $parameter ) ? $parameter : '';
    if( !empty( $value ) ){
        $css_attr .= ":{$value}{$unit}";
        return $css_attr." {$important};";
    }else{
        return false;
    }
}


function trimData($data){
    if($data == null)
        return null;
 
    if(is_array($data)){
        return array_map('trimData', $data);
    }else return trim($data);
 }
 
// Sirve paginaton
function sirve_pagination($query, $currentPage, $catagoryName, $eventName = '', $tagsName = array(), $className = "sirve-pagination"){
    //Tags Name Json
    $tagsNameJson = json_encode($tagsName);    
    //Page Number
    $sirve_par_pages = 0;
    if(!empty(get_option('sirve_par_pages'))){
        $sirve_par_pages = get_option('sirve_par_pages');
    }else{
        $sirve_par_pages = 15;
    }

    $total_page = (int) ceil($query->found_posts/$sirve_par_pages);

    sirve_post_render($query, false);?>
    <div class="sirve__col-lg-12">
        <div class="sirve-pagination-style <?php  echo  esc_attr( $className ) ?>">

            <?php 
            $paginatonNumber = $currentPage-1;
            if($paginatonNumber < 0){
                $paginatonNumber = 0;
            }

            if(!$currentPage == 0): ?>
                <a class="sirve-pagination-link-left" data-sirvekey="<?php echo esc_attr( $catagoryName ); ?>" data-page="<?php echo esc_attr( $paginatonNumber ); ?>" <?php echo (isset($eventName) && !empty($eventName)) ? esc_attr( "data-sirveevent={$eventName}" ) : ''?> <?php echo (isset($eventName) && !empty($eventName)) ? esc_attr( "data-sirveevent={$eventName}" ) : ''?> <?php echo (isset($tagsName) && count($tagsName) != 0) ? esc_attr( "data-sirvetags={$tagsNameJson}" ) : '';?>>
                    <svg width="10" height="8" viewBox="0 0 10 8" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M4.01812 7.10044L4.9204 6.18279L2.60521 3.92026L4.88186 1.61895L3.96421 0.716667L0.799279 3.93551L4.01812 7.10044ZM9.21825 6.14649L6.91706 3.88384L9.17971 1.58265L8.26206 0.680371L5.09713 3.89921L8.31597 7.06414L9.21825 6.14649Z" fill="CurrentColor"></path></svg>    
                    <?php echo esc_html__( 'Previous', 'sirve' ) ?>
                </a>
            <?php endif;

            if($currentPage > 2):
                for($k = 0; $k < 1; $k++):?>
                    <a data-sirvekey="<?php echo esc_attr( $catagoryName ); ?>" data-page="<?php echo esc_attr( $k ); ?>" >
                        <?php echo esc_attr( $k+1 ); ?>
                    </a>
            <?php endfor ?>
                <a class="sirve-pointer"><?php echo esc_html__( '...', 'htlistius' ) ?></a>
            <?php endif;

            $more = true;
            for($i = $paginatonNumber; $i < $total_page; $i++): 
                $j = $i + 1;

                if( $i > $currentPage + 2 && $total_page-1 > $i ){
                    
                    if($more){
                        ?><a class='sirve-pointer'><?php echo esc_html__( '...', 'sirve' ) ?></a><?php
                        $more = false;
                    }
                    continue;
                }

                if($total_page == 1){
                    break;
                }?>
                    <a  <?php if($currentPage == $i): ?> class="active" <?php endif; ?> data-sirvekey="<?php echo esc_attr( $catagoryName ); ?>" data-page="<?php echo esc_attr( $i ); ?>" <?php echo (isset($eventName) && !empty($eventName)) ? esc_attr( "data-sirveevent={$eventName}" ) : ''?> <?php echo (isset($eventName) && !empty($eventName)) ? esc_attr( "data-sirveevent={$eventName}" ) : ''?> <?php echo (isset($tagsName) && count($tagsName) != 0) ? esc_attr( "data-sirvetags={$tagsNameJson}" ) : '';?> ><?php echo esc_attr( $j ); ?></a>
                
            <?php endfor; $more = true;
            if(!($total_page-1 == $currentPage)): ?>
                <a class="sirve-pagination-link-right" data-sirvekey="<?php echo esc_attr( $catagoryName ); ?>" data-page="<?php echo esc_attr( $currentPage+1 ); ?>" <?php echo (isset($eventName) && !empty($eventName)) ? esc_attr( "data-sirveevent={$eventName}" ) : ''?> <?php echo (isset($eventName) && !empty($eventName)) ? esc_attr( "data-sirveevent={$eventName}" ) : ''?> <?php echo (isset($tagsName) && count($tagsName) != 0) ? esc_attr( "data-sirvetags={$tagsNameJson}" ) : '';?> >
                    <?php echo esc_html__( 'Next', 'sirve' )  ?>
                    <svg width="10" height="8" viewBox="0 0 10 8" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.008 0.908L5.098 1.818L7.394 4.1L5.098 6.382L6.008 7.292L9.2 4.1L6.008 0.908ZM0.8 1.818L3.082 4.1L0.8 6.382L1.71 7.292L4.902 4.1L1.71 0.908L0.8 1.818Z" fill="CurrentColor"></path></svg>
                </a>
            <?php endif; ?>
        </div>  
    </div>
<?php
    //Category Footer Content Dispaly
    sirve_category_footer_content();
}

function sirve_category_footer_content(){
    $sirve_queried_object =  get_queried_object();
    
    if(isset($sirve_queried_object->taxonomy) && $sirve_queried_object->taxonomy == 'sirve_category' || isset($sirve_queried_object->taxonomy) && $sirve_queried_object->taxonomy == 'sirve_tag'){
        $footer_content = get_term_meta( $sirve_queried_object->term_id, 'footer_content', true);?> 

         <div class="sirve-footer-content"><?php echo wp_kses_post($footer_content) ?></div> 
    <?php }
}


/*
** Sirve Event filter Category and slug
*/

function event_and_tags_sirve_menu_filter( $event_name, $tags_name, $exclude_menu = "" ){

    $exclude_menu = explode(",",$exclude_menu);
    $sirveCatoragorys = get_terms( 'sirve_category');
    $sirveCatogry = array();
    foreach($sirveCatoragorys as $catagory){
        $sirveCatogry[] = $catagory->slug;
    }

    //Start category
    $args_tax_query = array(
        'relation' => 'AND',
        array(
            'taxonomy' => 'sirve_category',
            'field'    => 'slug',
            'terms'    => $sirveCatogry
        )
    );

    //Event
    if($event_name != ""){
        $args_tax_query[] = array(
            'taxonomy' => 'sirve_event',
            'field'    => 'slug',
            'terms'    => $event_name,
        );

    }
    //Tag
    if($tags_name != ""){
        $args_tax_query[] = array(
            'taxonomy' => 'sirve_tag',
            'field'    => 'slug',
            'terms'    => $tags_name,
        );
    }

    $args = array(
        'post_type'     => 'sirve',
        'post_status' 	=> 'publish',
        'posts_per_page' => -1,
        'tax_query' => $args_tax_query,
        
    );
    
    $query = new WP_Query( $args );

    $filter_catagory = array();
    $__catagory = array();
    if ($query->have_posts()){
        $i = 0;
        while ($query->have_posts()){
            $query->the_post();

            $mix_catagory = get_the_terms( get_the_ID(), 'sirve_category');

            foreach($mix_catagory as $catagory){
                if(!in_array($catagory->slug, $__catagory))
                {
                    $__catagory[$i] =  $catagory->slug;
                    if(!in_array($catagory->slug, $exclude_menu)){
                        $filter_catagory[$i]['name'] = $catagory->name;
                        $filter_catagory[$i]['slug'] = $catagory->slug;
                        $i++;
                    }
                } 
            }         
        }
    }
    wp_reset_query(); 

    return $filter_catagory;
}