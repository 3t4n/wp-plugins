<?php
/*
 *TODO:
 */
//==Messages===========================================================
//function abcfal_msgs_error($id, $suffix='') { echo '<div class="wrap"><div class="error" id="error"><p>' . abcfal_txtbldr($id, $suffix) . '</p></div></div>'; }

//function abcfal_msgs_info($id, $suffix='') { echo '<div class="wrap"><div class="updated fade" id="message"><p>' . abcfal_txtbldr($id, $suffix) . '</p></div></div>' . "\n"; }

//function abcfal_msgs_ok() {
//    echo '<div class="wrap"><div id="abcfalOK" class="updated" style="line-height: 1px;"><img src="'  . ABCFIC_PLUGIN_URL .  'images/msgok_32x32.png"></div></div>';
//}


if ( !function_exists( 'abcf_err_2part_msg' ) ){
    function abcf_err_2part_msg( $msgL1, $msgL2=' '){

        if(!abcf_lib_html_isblank($msgL1)){ $msgL1 = '<p>' . $msgL1 . '</p>'; }
        if(!abcf_lib_html_isblank($msgL2)){ $msgL2 = '<p>' . $msgL2 . '</p>'; }

        $msg = $msgL1 . $msgL2;
        if(abcf_lib_html_isblank($msg)){ return; }

        echo ('<div class="abcfErrMsgRed">' . $msg . '</div>');
    }
}

//===DIV Builders=======================================================================
function abcfal_inputbldr_hdivider() { return "<div class=\"abcfalHDivider\">&nbsp;</div>"; }
function abcfal_inputbldr_hdivider2() { return "<div class=\"abcfalHDivider2\">&nbsp;</div>"; }
function abcfal_inputbldr_hdivider4() { return "<div class=\"abcfalHDivider2\">&nbsp;</div>"; }
function abcfal_inputbldr_hdivider501() { return "<div class=\"abcfalHDivider501\">&nbsp;</div>"; }
function abcfal_inputbldr_hdivider502() { return "<div class=\"abcfalHDivider502\">&nbsp;</div>"; }

//function abcfal_iputbldr_floats_cntr_s(){ return '<div class="abcfalFloatsCntr">'; }
//function abcfal_iputbldr_floats_cntr1_s(){ return '<div class="abcfalFloatsCntr1">'; }
//function abcfal_iputbldr_floats_cntr_e(){ return '<div class="abcfalClr"></div></div>'; }
//function abcfal_iputbldr_clr(){ return '<div class="abcfalClr"></div>'; }

//function abcfal_inputbldr_hdivider994() { return "<div class=\"abcfalHDivider4\">&nbsp;</div>"; }
function abcfal_inputbldr_hlp_wrap($in) { return '<div class="abcfalMboxHlp">' . $in . '</div>'; }
function abcfal_inputbldr_hlp_wrap12($in) { return '<div class="abcfalMboxHlp12">' . $in . '</div>'; }
function abcfal_inputbldr_hlp_wrap_b($in) { return '<div class="abcfalMboxHlpB">' . $in . '</div>'; }
function abcfal_inputbldr_hlp_wrap_b12($in) { return '<div class="abcfalMboxHlpB12">' . $in . '</div>'; }
function abcfal_inputbldr_hlp_wrap_mt($in) { return '<div class="abcfalMboxHlpMT">'  . $in . '</div>'; }
function abcfal_inputbldr_hlp_wrap_mt12($in) { return '<div class="abcfalMboxHlpMT12">'  . $in . '</div>'; }
function abcfal_inputbldr_hlp_wrap_mtb($in) { return '<div class="abcfalMboxHlpMTB">'  . $in . '</div>'; }
function abcfal_inputbldr_hlp_wrap_mtb12($in) { return '<div class="abcfalMboxHlpMTB12">'  . $in . '</div>'; }

//===INPUTS=======================================================================
function abcfal_inputbldr_input_cbo($fldID, $fldName, $values, $selected, $lblID=0, $hlpID=0, $size='', $isInt=true, $cls='', $style='',  $clsCntr='', $clsLbl='', $lblSuffix = '', $clsHlpUnder='') {

    $optns = abcfal_inputbldr_input_options( $fldID, $fldName, $lblID, $hlpID, $size, $cls, $style, $clsCntr, $clsLbl, $lblSuffix, $clsHlpUnder='', $values, $selected );
    extract( $optns );

    return  $fldCntrDivS . $fldLblDiv . '<select id="' . $fldID . '" type="text"' . $cls .
            $style . ' name="' . $fldName . '" >' . $options . '</select>' . $hlpUnder . '</div>';
}

function abcfal_inputbldr_input_txt($fldID, $fldName, $fldValue, $lblID=0, $hlpID=0, $size='', $cls='', $style='', $clsCntr='', $clsLbl='', $lblSuffix = ''){

    $optns = abcfal_inputbldr_input_options( $fldID, $fldName, $lblID, $hlpID, $size, $cls, $style, $clsCntr, $clsLbl, $lblSuffix );
    extract( $optns );
    return  $fldCntrDivS . $fldLblDiv . '<input id="' . $fldID . '" type="text"' . $cls .
            $style . 'name="' . $fldName . '" value="' . $fldValue . '" />' . $hlpUnder . '</div>';
}

function abcfal_inputbldr_input_txt_readonly($fldID, $fldName, $fldValue, $lblID=0, $hlpID=0, $size='', $cls='', $style='', $clsCntr='', $clsLbl='', $lblSuffix = ''){

    $divs = '';
    $optns = abcfal_inputbldr_input_options( $fldID, $fldName, $lblID, $hlpID, $size, $cls, $style, $clsCntr, $clsLbl, $lblSuffix );
    extract( $optns );
    return  $fldCntrDivS . $fldLblDiv . '<input id="' . $fldID . '" type="text"' . $cls .
            $style . 'name="' . $fldName . '" value="' . $fldValue . '" readonly />' . $hlpUnder . '</div>';

    //return $divs . $lbl . '</div><input id="' .$fldID . '" type="text" ' . $cls . $style . 'name="' . $fldName . '" value="' . $fldValue . '" readonly />' . $hlp . '</div>';
}
//===LABELS=======================================================================
function abcfal_inputbldr_lbl($fldID, $lblTxtID, $lblSuffix) {
    $out = '';
    $lblTxt = abcfal_inputbldr_lbl_txt($lblTxtID, $lblSuffix);
    if( !abcf_lib_html_isblank($fldID)){$fldID = ' for="' . $fldID . '" ';}
    if( !abcf_lib_html_isblank($lblTxt)) { $out = '<label' . $fldID . '>' . $lblTxt . '</label>';}
    //if($lblID > 0) { $out = '<label for="' . $fldID . '">' . abcfal_inputbldr_lbl_txt($lbl, $lblSuffix) . '</label>';}
    return $out;
}
function abcfal_inputbldr_hlp_top( $hlpID ) {
    $out = '';
    if($hlpID > 0) { $out = '<div class="abcfalHlpTop">' . abcfal_txtbldr($hlpID) . '</div>';}
    return $out;
}

function abcfal_inputbldr_hlp_under( $hlpID, $clsHlpUnder='' ) {
    $out = '';
    $clsSpan = !empty($clsHlpUnder) ? $clsHlpUnder : 'abcfalFldHlpUnder';

    if($hlpID > 0) { $out = '<span class="' . $clsSpan .'">' . abcfal_txtbldr($hlpID) . '</span>';}
    return $out;
}

function abcfal_inputbldr_section_header( $hlpID, $noHlp = false ) {
    $out = '';
    $suffix = '';
    if($noHlp) { $suffix = 'NoHlp'; }
    if($hlpID > 0) { $out = '<div class="abcfalSecHdr' . $suffix . '">' . abcfal_txtbldr($hlpID) . '</div>';}
    return $out;
}

function abcfal_inputbldr_hlp_data( $hlpID, $data, $fontSize = '11' ) {
    $out = '';
    if($hlpID > 0) { $out = '<span class="abcfalFldHlpData' . $fontSize . '">' . abcfal_txtbldr($hlpID) . $data .'</span>';}
    return $out;
}

//===HELPERS=====================================================================
function abcfal_inputbldr_id( $fldID ){

    if(!abcf_lib_html_isblank($fldID)){ return ' id="' . $fldID . '"'; }
    return '';
}

function abcfal_inputbldr_name( $fldName ){

    if(!abcf_lib_html_isblank($fldName)){ return ' name="' . $fldName . '"'; }
    return '';
}

function abcfal_inputbldr_input_options( $fldID, $fldName, $lblID, $hlpID, $size, $cls, $style, $clsCntr, $clsLbl, $lblSuffix, $clsHlpUnder='', $values='', $selected='') {

    if(abcf_lib_html_isblank($size)) { $size = '30%'; }
    $w = abcf_lib_css_w($size);
    $style = abcf_lib_html_css_style( $w . $style );

    if(empty($fldName)) { $fldName = $fldID; }
    $hlpUnder = abcfal_inputbldr_hlp_under($hlpID, $clsHlpUnder);
    $cls = abcf_lib_html_css_class($cls);
    $lbl = abcfal_inputbldr_lbl($fldID, $lblID, $lblSuffix );
    $fldCntrDivS = abcfal_inputbldr_fld_cntr_div($clsCntr);
    $fldLblDiv = abcfal_inputbldr_fld_lbl_div($clsLbl, $lbl);
    $cboOptions = abcfal_inputbldr_cbo_get_options($values, $selected);

    $out = array(
        'cls'       => $cls,
        'style'     => $style,
        'fldCntrDivS'      => $fldCntrDivS,
        'fldLblDiv'       => $fldLblDiv,
        'hlpUnder'       => $hlpUnder,
        'fldName'   => $fldName,
        'options'   => $cboOptions
    );
    return $out;
}
function abcfal_inputbldr_lbl_txt( $lblID, $lblSuffix ){

    $lbl = '';
    if(is_int($lblID)){ $lbl = abcfal_txtbldr($lblID, $lblSuffix); }
    return $lbl;
}

function abcfal_inputbldr_input_size( $size ) {

    $defaultW='30';
    $defaultUnits='%';
    if(empty($size)) { return array($defaultW, $defaultUnits); }

    $w = '';
    $units = substr($size, -1, 1);
    if( $units == '%' ) { $w = rtrim($size, '%'); }
    if( $units == 'x' ) {
        $w = rtrim($size, 'px');
        $units = 'px';
     }

    if(empty($w)) {return array($defaultW, $defaultUnits);}
    return array($w, $units);
}

function abcfal_inputbldr_fld_lbl_div($clsLbl, $lbl) {

    $divLbl = '';
    if(!empty($lbl)){
        $clsLbl = !empty($clsLbl) ? $clsLbl : 'abcfalFldLbl';
        $divLbl = '<div class="' . $clsLbl .'">' . $lbl . '</div>';
    }
    return $divLbl;
}

function abcfal_inputbldr_fld_cntr_div($clsCntr) {

    $clsCntr = !empty($clsCntr) ? $clsCntr : 'abcfalFldCntr';
    return '<div class="' . $clsCntr . '">';
}


function abcfal_inputbldr_cbo_get_options($values, $selected_value) {
    $out = '';
    if(empty($values)){return $out;}
    $selected = "";
    foreach($values as $key => $fldValue){
        //return ('key= ' . $key . ' sw= ' . $selected_value);
        $selected = abcfal_inputbldr_cbo_set_selected($key, $selected_value);
        $out .= "<option $selected value=\"$key\">$fldValue</option>\n";
    }
    return $out;
}

function abcfal_inputbldr_cbo_set_selected($key, $selected_value) {
    $out = "";
    if(!abcf_lib_html_isblank($selected_value)) { if($key == $selected_value) {$out = " selected=\"selected\" "; } }
    return $out;
}