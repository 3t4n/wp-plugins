<?php
/**
 * CSS builders
 *
*/
//====WxH============================================
if ( !function_exists( 'abcf_lib_css_wh' ) ){
    function abcf_lib_css_wh($w, $h, $maxW=false, $maxH=false){
        return abcf_lib_css_w($w, $maxW) . abcf_lib_css_h($h, $maxH);
    }
}
if ( !function_exists( 'abcf_lib_css_w' ) ){

    function abcf_lib_css_w($value, $max=false){
        if(abcf_lib_html_isblank($value)) { return''; }
        $value = abcf_lib_css_valid_size( $value );
        $property = 'width:';
        if($max){ $property = 'max-width:'; }
        return $property . $value . ';';
    }
}

if ( !function_exists( 'abcf_lib_css_h' ) ){
    function abcf_lib_css_h($value, $max){
        if(abcf_lib_html_isblank($value)) { return''; }
        $value = abcf_lib_css_valid_size( $value );
        $property = 'height:';
        if($max){ $property = 'max-height:'; }
        return $property . $value . ';';
    }
}

if ( !function_exists( 'abcf_lib_css_valid_size' ) ){
    //Input validator - CSS size.
    function abcf_lib_css_valid_size( $in, $default='' ) {

        if(abcf_lib_html_isblank($in)) { return $default; }
        if( $in == '0' ) { return '0'; }

        $w = '';
        $units = '';
        $suffix = substr($in, -1, 1);

        switch ($suffix){
        case 'x':
            $w = rtrim($in, 'px');
            $units = 'px';
            break;
        case '%':
            $w = rtrim($in, '%');
            $units = '%';
            break;
       case 'm':
            $w = rtrim($in, 'em');
            $units = 'em';
            break;
        default:
            $w = $in;
            $units = 'px';
            break;
        }

        if( !is_numeric($w) ) { return $default; }
        if( $w == '0' ) { return '0'; }
        return $w . $units;
    }
}


//=======MARGINS============================================
if ( !function_exists( 'abcf_lib_css_mtl' ) ){
    function abcf_lib_css_mtl($t, $l){ return abcf_lib_css_mt($t) . abcf_lib_css_ml($l); }
}

if ( !function_exists( 'abcf_lib_css_mtlr' ) ){

    function abcf_lib_css_mtlr($t, $l, $r){ return abcf_lib_css_mt($t) . abcf_lib_css_ml($l) . abcf_lib_css_mr($r);}
}

if ( !function_exists( 'abcf_lib_css_mt' ) ){

    function abcf_lib_css_mt($in){
        if(abcf_lib_html_isblank($in)) { return''; }
        return 'margin-top:'. $in . abcf_lib_css_px($in) . ';';
    }
}

if ( !function_exists( 'abcf_lib_css_mr' ) ){

    function abcf_lib_css_mr($in){
        if(abcf_lib_html_isblank($in)) { return''; }
        return 'margin-right:'. abcf_lib_css_valid_size($in) . ';';
    }
}

if ( !function_exists( 'abcf_lib_css_ml' ) ){

    function abcf_lib_css_ml($in){
        if(abcf_lib_html_isblank($in)) { return''; }
        return 'margin-left:'. $in . abcf_lib_css_px($in) . ';';
    }
}

//=======PADDING============================================
function abcfal_lib_css_ptl($t, $l){ return abcfal_lib_css_pt($t) . abcfal_lib_css_pl($l); }

function abcfal_lib_css_pl($in){
    if(abcf_lib_html_isblank($in)) { return''; }
    $s = 'padding-left:';
    if(substr($in,0,1) == '-'){ $s = 'margin-left:'; }

    return $s . $in . abcf_lib_css_px($in) . ';';
}

function abcfal_lib_css_pt($in){
    if(abcf_lib_html_isblank($in)) { return''; }
    $s = 'padding-top:';
    if(substr($in,0,1) == '-'){ $s = 'margin-top:'; }

    return $s . $in . abcf_lib_css_px($in) . ';';
}
//===STYLE================================================
function abcfal_lib_css_style_wh($w, $h, $maxW=false, $percentW=false, $maxH=false, $percentH=false ) {

    return abcf_lib_css_style_tag(abcfal_lib_css_wh($w, $h, $maxW, $percentW, $maxH, $percentH));

}

function abcfal_lib_cssbldr_style_margin_tl($t, $l) { return abcf_lib_css_style_tag(abcfal_lib_css_mtl($t, $l));}

//===HELPERS================================================
if ( !function_exists( 'abcf_lib_css_class_tag' ) ){
    function abcf_lib_css_class_tag( $cls ){
        if(abcf_lib_html_isblank($cls)) {return '';}
        return ' class="' . $cls . '"';
    }
}
if ( !function_exists( 'abcf_lib_css_style_tag' ) ){
    function abcf_lib_css_style_tag($style) {
       if(abcf_lib_html_isblank($style)) {return '';}
       return ' style="' . $style . '" ';
   }
}

if ( !function_exists( 'abcf_lib_css_px' ) ){
    function abcf_lib_css_px($in){
        $px = 'px';
        if($in == '0'){ $px = '';}
        return $px;
    }
}