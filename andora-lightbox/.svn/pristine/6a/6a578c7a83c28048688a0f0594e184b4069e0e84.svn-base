<?php
function abcfal_cntbldrs_build_al($args){

    $postID = $args['id'];
    $pversion = 'abcfal_' . $args['pversion'];

    $optns = get_post_custom( $postID );
    $collID = isset( $optns['_abcfal_coll_id'] ) ? esc_attr( $optns['_abcfal_coll_id'][0] ) : '0';
    //$cntrH = isset( $optns['_abcfal_cntr_h'] ) ? esc_attr( $optns['_abcfal_cntr_h'][0] ) : '';
    $cntrW = isset( $optns['_abcfal_cntr_w'] ) ? esc_attr( $optns['_abcfal_cntr_w'][0] ) : '';
    $cntrTM = isset( $optns['_abcfal_cntr_tm'] ) ? esc_attr( $optns['_abcfal_cntr_tm'][0] ) : '';
    $cntrLM = isset( $optns['_abcfal_cntr_lm'] ) ? esc_attr( $optns['_abcfal_cntr_lm'][0] ) : '';

    $cntrWH = abcf_lib_css_wh($cntrW, '');
    $cntrMTL = abcf_lib_css_mtl($cntrTM, $cntrLM);
    $alCtnrStyle = abcf_lib_css_style_tag($cntrWH . $cntrMTL);

    //Error: No collection selected
    if( $collID == 0 ){
        return abcf_err_2part_msg( abcfal_txtbldr(12) );
    }
    $cntr = 'abcfalCntr';
    $cntrID = $cntr . '_' . $postID;
    $imgsHTML = abcfal_cntbldrs_get_data( $collID);

    $divGridCntr = '<div id="' . $cntrID . '" class="' . $cntr . ' ' . $cntrID . ' ' . $pversion . '"' . $alCtnrStyle . '>' . $imgsHTML . abcf_lib_html_div_clr() . '</div>';
    $js = abcfal_cntbldrs_gallery_js();

    return $divGridCntr . $js;
}

function abcfal_cntbldrs_get_data( $collID ){

    $collURL = abcfic_dbu_coll_url($collID);
    $dbRows = abcfal_db_images($collID);
    $imgsHTML = '';

    if ($dbRows) {
       foreach ( $dbRows as $dbRow ) {
           $imgsHTML .= abcfal_cntbldrs_data_item($collURL, $dbRow->img_id, $dbRow->filename, $dbRow->alt, $dbRow->img_title, $dbRow->thumb_w, $dbRow->thumb_h);
       }
    }
    else{
        //Count images
        $imgQty = abcfic_dbu_count_published($collID);
        if(empty($imgQty)){ return abcf_err_2part_msg( abcfal_txtbldr(13) );}

        $all = $imgQty['all'];
        $published = $imgQty['published'];

        if($all == 0){
            //Collection is empty.
            return abcf_err_2part_msg( abcfal_txtbldr(14) );
        }

        if($published == 0){
            //All images have status: Unpublished.
            return abcf_err_2part_msg(abcfal_txtbldr(15), abcfal_txtbldr(16));
        }
    }
    return $imgsHTML;
 }

function abcfal_cntbldrs_data_item($collURL, $imgID, $filename, $alt, $imgTitle, $thumb_w, $thumb_h) {

    if (empty($filename)) { return ''; }

    $cntrS = '<div class="abcfalItemCntr"><div class="abcfalImgCntr">';
    $cntrE = '</div></div>';

    $aStart = '<a class="image-popup-vertical-fit" ';
    $aEnd = '</a>';
    $imgHREF = '';

    $imgL = abcf_lib_html_file_url($collURL, '', $filename);
    $imgT = abcf_lib_html_file_url($collURL, 'thumbs', $filename);

    $imgHREF = 'href="' . $imgL . '">';
    $thumbImgTag =  abcf_lib_img_html_tag('', $imgT, $alt, $imgTitle, $thumb_w, $thumb_h );

    return $cntrS . $aStart . $imgHREF . $thumbImgTag . $aEnd . $cntrE;
 }

 function abcfal_cntbldrs_gallery_js(){
    //------------------------------------------------------
    $out = '<script type="text/javascript">jQuery(document).ready(function($) {' . "\n";
    $out .= '$(".abcfalCntr").magnificPopup({' .  "\n";
    $out .= 'delegate: "a",' .  "\n";
    $out .= 'type: "image",' .  "\n";
    $out .= 'tLoading: "Loading image #%curr%...",' .  "\n";
    $out .= 'mainClass: "mfp-img-mobile",' .  "\n";
    //$out .= 'mainClass: "mfp-fade",' .  "\n";
    $out .= 'gallery: {' .  "\n";
    $out .= 'enabled: true,' .  "\n";
    $out .= 'navigateByImgClick: false,' .  "\n";
    $out .= 'tCounter: "%curr% / %total%",' .  "\n";
    $out .= 'preload: [0,1]' .  "\n";
    $out .= '},' .  "\n";
    $out .= 'image: {' .  "\n";
    $out .= 'tError: \'<a href="%url%">The image #%curr%</a> could not be loaded.\',' .  "\n";
    $out .= '}' .  "\n";
    $out .= '});' . "\n";
    $out .= '});<';
    $out .= '/script>';

    return $out;
}
