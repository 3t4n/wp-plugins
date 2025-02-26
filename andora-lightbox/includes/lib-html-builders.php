<?php
/**
 * HTML builders
 *
*/
if ( !function_exists( 'abcf_lib_html_css_class' ) ){
    function abcf_lib_html_css_class($in){
        if(empty($in)){ return ''; }
        return ' class="' . $in . '" ';
    }
}

if ( !function_exists( 'abcf_lib_html_div_cls' ) ){
    function abcf_lib_div_cls( $cls ){ return '<div ' . $cls . ' >'; }
}

if ( !function_exists( 'abcf_lib_html_p_cls' ) ){
    function abcf_lib_p_cls( $cls ){ return '<p ' . $cls . ' >'; }
}

if ( !function_exists( 'abcf_lib_html_div_cls_style' ) ){
    function abcf_lib_div_cls_style( $cls, $style ){ return '<div' . $cls . $style . ' >'; }
}

if ( !function_exists( 'abcf_lib_html_css_style' ) ){
    function abcf_lib_html_css_style( $style ) {
       if(abcf_lib_html_isblank($style)) { return ''; }
       return ' style="' . $style . '" ';
   }
}
//---------------------------------------------------------------------
if ( !function_exists( 'abcf_lib_img_html_tag' ) ){
    function abcf_lib_img_html_tag($imgID, $src, $alt, $imgTitle, $imgW=0, $imgH=0, $cls='', $style='') {

        if (empty($src)) {return '';}
        $imgWH = '';
        if ($imgW > 0 && $imgH > 0) { $imgWH = ' width="' . $imgW . '" height="' . $imgH . '"'; }
        if (!empty($imgID)){ $imgID = ' id="' . $imgID . '"'; }
        if (!empty($cls)) { $cls = ' class="' . $cls . '"'; }
        if (!empty($style))  { $style = ' style="' . $style . '"'; }

        $alt = esc_attr( strip_tags( $alt ) );
        $alt = ' alt="' . $alt . '" ';
        if (!empty($imgTitle))  {
            $imgTitle = esc_attr( strip_tags( $imgTitle ) );
            $imgTitle = ' title="' . $imgTitle . '"';
            }
        $src =  ' src="' . $src . '"';

        return '<img ' . $imgID . $src . $cls . $style . $imgWH . $imgTitle . $alt . '/>';
     }
}

if ( !function_exists( 'abcf_lib_html_a_tag' ) ){

    function abcf_lib_html_a_tag($href, $lnkTxt, $target='', $cls='', $style='', $spanStyle= '', $blankTag=true) {

        if(abcf_lib_html_isblank($href)){
           if( !$blankTag ){ return $lnkTxt; }
           $href = "#";
        }

        if(!empty($spanStyle)){ $lnkTxt = '<span style="' . $spanStyle . '">' . $lnkTxt . '</span>'; }

        $href = esc_url($href);

        if($target === '1' || $target == '_blank' ){ $target = ' target="_blank"'; }
        if(empty($target)){ $target = ""; }

        if (!abcf_lib_html_isblank($cls)) { $cls = ' class="' . $cls . '"'; }
        if(!abcf_lib_html_isblank($style)){ $style = ' style="' . $style . '"'; }
        return "<a" . $cls . $style . ' href="' . $href . '"' . $target .  '>' . $lnkTxt . '</a>';
    }
}

if ( !function_exists( 'abcf_lib_html_file_url' ) ){

    function abcf_lib_html_file_url($collURL, $subFolder='', $file='') {
        if(empty($collURL)){ return '';}
        if(!empty($subFolder)){ $subFolder = trailingslashit($subFolder);}
        return untrailingslashit( trailingslashit($collURL) . $subFolder . $file );
    }
}

//===MISC=====================================================================================
if ( !function_exists( 'abcf_lib_html_isblank' ) ){
    function abcf_lib_html_isblank($in){ return (!isset($in) || trim($in)==='');}
}

if ( !function_exists( 'abcf_lib_html_div_clr' ) ){
    function abcf_lib_html_div_clr() {  return '<div class="abcfClr"></div>'; }
}




