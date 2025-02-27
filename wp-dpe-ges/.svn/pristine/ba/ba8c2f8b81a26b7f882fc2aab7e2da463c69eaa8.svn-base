<?php
function wpdpeges_add_shortcode(){
    wp_enqueue_style( 'wpdpeges-css', plugin_dir_url( WPDPEGES_PLUGIN_FILE ) . 'build/style-index.css', array(), '0.1.0' );
    add_shortcode('dpe', 'wpdpeges_html_dpe');
    add_shortcode('ges', 'wpdpeges_html_ges');
    add_shortcode('dpeges', 'wpdpeges_html_dpeges');
}
add_action( 'init', 'wpdpeges_add_shortcode');
/*
*  wpdpeges_html_dpe
*
*  This function will return the html of DPE
*
*  @type	function
*  @date	14/09/2017
*  @since	1.0
*
*  @param	$atts (array) User defined attributes in shortcode tag
*  @return	(string)
*/
function wpdpeges_html_dpe( $atts ){
    $dpe = shortcode_atts( array(
        'value' => '',
        'inline' => 'false',
        'meta_key' => null,
        'not_subject' => false
    ), $atts );
    ob_start();
    // Get template
    $shortcode = true;
    if(!empty($dpe['meta_key'])){
        global $post;
        $valueDPE = get_post_meta(get_the_ID(), $dpe['meta_key'], true);
    }else {
        $valueDPE = $dpe['value'];
    }
    $valueGES = 0;
    $notSubject = ($dpe['not_subject']==="true") ? true : false;
    $displayInline = ($dpe['inline']==="true") ? true : false;
    $displayDPE = true;
    $displayGES = false;
    include apply_filters( 'wpdpeges_shortcode_template', plugin_dir_path( __FILE__ ) . 'dpeges-template.php', 'dpeges' );
    $output = ob_get_clean();
    return $output;
}
/*
*  wpdpeges_html_ges
*
*  This function will return the html of GES
*
*  @type	function
*  @date	14/09/2017
*  @since	1.0
*
*  @param	$atts (array) User defined attributes in shortcode tag
*  @return	(string)
*/
function wpdpeges_html_ges( $atts ){
    $ges = shortcode_atts( array(
        'value' => '',
        'inline' => 'false',
        'meta_key' => null,
        'not_subject' => false
    ), $atts );
    ob_start();
    // Get template
    $shortcode = true;
    $valueDPE = 0;
    if(!empty($ges['meta_key'])){
        global $post;
        $valueGES = get_post_meta(get_the_ID(), $ges['meta_key'], true);
    }else {
        $valueGES = $ges['value'];
    }
    $notSubject = ($ges['not_subject']==="true") ? true : false;
    $displayInline = ($ges['inline']==="true") ? true : false;
    $displayDPE = false;
    $displayGES = true;
    include apply_filters( 'wpdpeges_shortcode_template', plugin_dir_path( __FILE__ ) . 'dpeges-template.php', 'dpeges' );
    $output = ob_get_clean();
    return $output;
}

/*
*  wpdpeges_html_dpeges
*
*  This function will return the html of DPE
*
*  @type	function
*  @date	15/01/2022
*  @since	1.4
*
*  @param	$atts (array) User defined attributes in shortcode tag
*  @return	(string)
*/
function wpdpeges_html_dpeges( $atts ){
    $args = shortcode_atts( array(
        'dpe_value' => '',
        'ges_value' => '',
        'inline' => 'true',
        'dpe_meta_key' => null,
        'ges_meta_key' => null,
        'not_subject' => 'false',
        'date_diagnostic' => '',
        'date_diagnostic_meta_key' => null,
        'surface_value' => null,
        'surface_meta_key' => null,
        'altitude_value' => null,
        'altitude_meta_key' => null,
        'zone_climatique_value' => null,
        'zone_climatique_meta_key' => null,
    ), $atts );
    // Test de la date du diagnostic, si > 01-07-2021 alors on retourne l'ancien shortcode
    if( !empty($args['date_diagnostic_meta_key']) ){
        $args['date_diagnostic'] = get_post_meta(get_the_ID(), $args['date_diagnostic_meta_key'], true);
    }
    if( !empty($args['date_diagnostic']) ){
        $dateTimestamp1 = strtotime('2021-07-01');
        $dateTimestamp2 = strtotime( apply_filters('wpdpeges_date_diagnostic', $args['date_diagnostic']) );
        if( apply_filters('wpdpeges_ancien_dpeges', ($dateTimestamp1 > $dateTimestamp2), $dateTimestamp1, $dateTimestamp2) ){
            return do_shortcode( '[dpe value="'.$args['dpe_value'].'" inline="'.$args['inline'].'" meta_key="'.$args['dpe_meta_key'].'" not_subject="'.$args['not_subject'].'"]' ) . do_shortcode( '[ges value="'.$args['ges_value'].'" inline="'.$args['inline'].'" meta_key="'.$args['ges_meta_key'].'" not_subject="'.$args['not_subject'].'"]' );
        }
    }
    // Sinon on continue avec le nouveau
    ob_start();
    // Récupération des valeurs selon meta_key ou valeur directe
    if(!empty($args['dpe_meta_key'])){
        global $post;
        $dpe_value = get_post_meta(get_the_ID(), $args['dpe_meta_key'], true);
    }else {
        $dpe_value = $args['dpe_value'];
    }
    if(!empty($args['ges_meta_key'])){
        $ges_value = get_post_meta(get_the_ID(), $args['ges_meta_key'], true);
    }else {
        $ges_value = $args['ges_value'];
    }
    if( $args['not_subject'] === "true" ){
        $notSubject = true;
    }elseif( $args['not_subject'] === "false" ){
        $notSubject = false;
    }elseif( !empty($args['not_subject']) ){
        $notSubject = get_post_meta(get_the_ID(), $args['not_subject'], true);
    }else{
        $notSubject = false;
    }
    $display_inline = 'true' === $args['inline'];
    if(!empty($args['surface_meta_key'])){
        $surface_value = get_post_meta(get_the_ID(), $args['surface_meta_key'], true);
    }else {
        $surface_value = $args['surface_value'];
    }
    if(!empty($args['altitude_meta_key'])){
        $altitude_value = get_post_meta(get_the_ID(), $args['altitude_meta_key'], true);
    }else {
        $altitude_value = $args['altitude_value'];
    }
    if(!empty($args['zone_climatique_meta_key'])){
        $zone_climatique_value = get_post_meta(get_the_ID(), $args['zone_climatique_meta_key'], true);
    }else {
        $zone_climatique_value = $args['zone_climatique_value'];
    }
    // Récupération des lettres selon les paramètres
    $etiquette = wpdpeges_etiquette( $dpe_value, $ges_value, $surface_value, $altitude_value, $zone_climatique_value );
    $lettre_dpe = $etiquette['lettre_dpe'];
    $lettre_ges = $etiquette['lettre_ges'];
    // Inclusion du template pour le rendu visuel
    include apply_filters( 'wpdpeges_shortcode_template', plugin_dir_path( __FILE__ ) . 'newdpeges-template.php', 'newdpeges' );
    $output = ob_get_clean();
    return $output;
}

/*
*  wpdpeges_etiquette
*
*  Cette fonction retourne la valeur en lettre pour le DPE et le GES
*
*  @type	function
*  @date	15/09/2024
*  @since	1.6
*
*  @param	$dpe (int) valeur du DPE
*  @param	$ges (int) valeur du GES
*  @param	$surface (float) surface du bien
*  @param	$altitude (int) altitude du bien
*  @param	$zone_climatique (int) zone climatique du bien
*  @return	(array)

 * Plusieurs cas :
 * 1 - Biens dont la surface de référence est supérieure strictement à 40m²
 * 1.1 - Biens situés en-dessous strictement de 800 mètres d’altitude
 * 1.2 - Biens situés au-dessus de 800 mètres d’altitude en zone climatique H1b, H1c et H2d
 * 2 - Biens dont la surface de référence est inférieure ou égale à 40m²
 * 2.1 - Biens situés en-dessous strictement de 800 mètres
 * 2.2 - Bien situés au-dessus de 800 mètres d’altitude en zone climatique H1b, H1c et H2d
 */
function wpdpeges_etiquette( $dpe, $ges, $surface = 40, $altitude = 100, $zone_climatique = '' ){
    //echo $surface . ', ' . $altitude . ', ' . $zone_climatique;
    $lettre_dpe = '';
    $lettre_ges = '';
    // Initialisation des valeurs des seuils selon la surface et l'altitude
    list($dpe_inf40_inf_800, $dpe_inf40_sup_800) = wpdpeges_init();
    // La surface n'a pas a dépasser 40m2 car au dela on garde les valeurs de 40m2
    $surface = is_numeric($surface) ? $surface : 40;
    $surface = min( 40, floatval($surface) );
    // zone climatique concernées
    $zones_climatiques = array( 'H1b', 'H1c', 'H2d' );
    $en_zones_climatiques = apply_filters('wpdpeges_en_zones_climatiques', in_array( $zone_climatique, $zones_climatiques ), $zone_climatique, $zones_climatiques );
    // Calcul des seuils selon la surface et l'altitude
    $seuils = array();
    for($j=0; $j<12; $j++):
        if( $surface < 8 ):
            $seuil_value = $dpe_inf40_inf_800[8][$j];
        else:
            if( $altitude >= 800 && $en_zones_climatiques ):
                $val = ($j<2) ? ceil( $surface ) : $dpe_inf40_sup_800[ ceil( $surface ) ][$j-2];
                $seuil_value = $dpe_inf40_sup_800[ floor( $surface ) ][$j] - ( $dpe_inf40_sup_800[ floor( $surface ) ][$j] - $val ) * ( $surface - floor( $surface ) );
            else:
                $seuil_value = $dpe_inf40_inf_800[ floor( $surface ) ][$j] - ( $dpe_inf40_inf_800[ floor( $surface ) ][$j] - $dpe_inf40_inf_800[ ceil( $surface ) ][$j] ) * ( $surface - floor( $surface ) );
            endif;
        endif;
        $seuils[] = $seuil_value;
    endfor;
    //echo '<pre>', print_r($seuils,1) . '</pre>';
    if( !empty($dpe) && is_numeric($dpe) ):
        // Déttermine la lettre du dpe selon la valeur de dpe et ges
        if( $dpe < $seuils[0] && $ges < $seuils[1] ):
            $lettre_dpe = "A";
        elseif( $dpe < $seuils[2] && $ges < $seuils[3] ):
            $lettre_dpe = "B";
        elseif( $dpe < $seuils[4] && $ges < $seuils[5] ):
            $lettre_dpe = "C";
        elseif( $dpe < $seuils[6] && $ges < $seuils[7] ):
            $lettre_dpe = "D";
        elseif( $dpe < $seuils[8] && $ges < $seuils[9] ):
            $lettre_dpe = "E";
        elseif( $dpe < $seuils[10] && $ges < $seuils[11] ):
            $lettre_dpe = "F";
        elseif( $dpe > $seuils[10] || $ges > $seuils[11] ):
            $lettre_dpe = "G";
        endif;
    else:
        // CAS ou la lettre est passée directement en paramètre
        $lettre_dpe = $dpe;
    endif;
    if( !empty($ges) && is_numeric($ges) ):
        // Détermine la lettre du ges selon la valeur
        if( $ges < $seuils[1] ):
            $lettre_ges = "A";
        elseif( $ges < $seuils[3] ):
            $lettre_ges = "B";
        elseif( $ges < $seuils[5] ):
            $lettre_ges = "C";
        elseif( $ges < $seuils[7] ):
            $lettre_ges = "D";
        elseif( $ges < $seuils[9] ):
            $lettre_ges = "E";
        elseif( $ges < $seuils[11] ):
            $lettre_ges = "F";
        elseif( $ges > $seuils[11] ):
            $lettre_ges = "G";
        endif;
    else:
        // CAS ou la lettre est passée directement en paramètre
        $lettre_ges = $ges;
        // Si la lettre GES est > à la lettre DPE alors on change la lettre DPE
        $comparer_lettre = ['' => 0, 'A' => 1, 'B' => 2, 'C' => 3, 'D' => 4, 'E' => 5, 'F' => 6, 'G' => 7];
        if( $comparer_lettre[$lettre_ges] > $comparer_lettre[$lettre_dpe] ){
            $lettre_dpe = $lettre_ges;
        }
    endif;
    // Retourne les lettres
    return array( 'lettre_dpe' => $lettre_dpe, 'lettre_ges' => $lettre_ges );
}

/*
*  wpdpeges_init
*
* Cette fonction retourne 2 tableaux avec les seuils de l'etiquette selon la surface et l'altitude du bien
* 1 tableau pour les biens dont la surface est inférieure à 40m² et l'altitude inférieure à 800m
* 1 tableau pour les biens dont la surface est inférieure à 40m² et l'altitude supérieure à 800m
*
*  @type	function
*  @date	15/09/2024
*  @since	1.6
*
*  @return	(array)
*/
function wpdpeges_init(){
    $dpe_inf40_inf_800 = array(
        8 => array( 146, 11, 186, 16, 386, 44, 505, 68, 622, 90, 739, 122 ),
        9  => array( 134,11,174, 16, 355, 42, 464, 65, 574, 87, 685, 118 ),
        10 => array( 124, 10, 164, 15, 329, 40, 428, 62, 533, 84, 640, 115 ),
        11 => array( 117, 10, 157, 15, 311, 39, 403, 61, 503, 82, 607, 113 ),
        12 => array( 112, 9, 152, 14, 296, 38, 381, 59, 478, 81, 578, 111 ),
        13 => array( 108, 9, 148, 14, 283, 37, 363, 58, 456, 79, 554, 110 ),
        14 => array( 104, 9, 144, 14, 273, 37, 348, 58, 437, 78, 532, 108 ),
        15 => array( 100, 8, 140, 13, 263, 36, 333, 56, 421, 76, 514, 107 ),
        16 => array( 97, 8, 137, 13, 255, 35, 325, 55, 412, 76, 504, 106 ),
        17 => array( 95, 8, 135, 13, 248, 35, 318, 55, 404, 75, 496, 105 ),
        18 => array( 92, 8, 132, 13, 241, 34, 311, 54, 397, 75, 489, 105 ),
        19 => array( 90, 8, 130, 13, 235, 34, 305, 54, 390, 74, 482, 105 ),
        20 => array( 88, 8, 128, 13, 230, 34, 300, 54, 385, 74, 476, 104 ),
        21 => array( 87, 8, 127, 13, 225, 33, 295, 53, 380, 74, 471, 104 ),
        22 => array( 85, 7, 125, 12, 221, 33, 291, 53, 375, 73, 466, 103 ),
        23 => array( 84, 7, 124, 12, 217, 33, 287, 53, 371, 73, 462, 103 ),
        24 => array( 82, 7, 122, 12, 214, 33, 284, 53, 367, 73, 458, 103 ),
        25 => array( 81, 7, 121, 12, 210, 32, 280, 52, 363, 73, 454, 103 ),
        26 => array( 80, 7, 120, 12, 207, 32, 277, 52, 360, 72, 451, 103 ),
        27 => array( 79, 7, 119, 12, 204, 32, 274, 52, 357, 72, 447, 102 ),
        28 => array( 78, 7, 118, 12, 202, 32, 272, 52, 354, 72, 444, 102 ),
        29 => array( 77, 7, 117, 12, 199, 32, 269, 52, 351, 72, 442, 102 ),
        30 => array( 76, 7, 116, 12, 197, 32, 267, 52, 349, 72, 439, 102 ),
        31 => array( 76, 7, 116, 12, 195, 31, 265, 51, 346, 72, 437, 102 ),
        32 => array( 75, 7, 115, 12, 193, 31, 263, 51, 344, 71, 434, 101 ),
        33 => array( 74, 7, 114, 12, 191, 31, 261, 51, 342, 71, 432, 101 ),
        34 => array( 74, 7, 114, 12, 189, 31, 259, 51, 340, 71, 430, 101 ),
        35 => array( 73, 7, 113, 12, 188, 31, 258, 51, 338, 71, 428, 101 ),
        36 => array( 72, 7, 112, 12, 186, 31, 256, 52, 337, 71, 427, 101 ),
        37 => array( 72, 7, 112, 12, 185, 31, 255, 53, 335, 71, 425, 101 ),
        38 => array( 71, 7, 111, 12, 183, 31, 253, 54, 333, 71, 423, 101 ),
        39 => array( 71, 7, 111, 12, 182, 31, 252, 55, 332, 71, 422, 101 ),
        40 => array( 70, 6, 110, 11, 180, 30, 250, 55, 330, 70, 420, 100 )
    );
    $dpe_inf40_sup_800 = array(
        8 => array( 146, 11, 186, 16, 386, 44, 505, 68, 682, 100, 819, 132 ),
        9  => array( 134,11,174, 16, 355, 42, 464, 65, 634, 97, 765, 128 ),
        10 => array( 124, 10, 164, 15, 329, 40, 428, 62, 593, 94, 720, 125 ),
        11 => array( 117, 10, 157, 15, 311, 39, 403, 61, 563, 92, 687, 123 ),
        12 => array( 112, 9, 152, 14, 296, 38, 381, 59, 538, 91, 658, 121 ),
        13 => array( 108, 9, 148, 14, 283, 37, 363, 58, 516, 89, 634, 120 ),
        14 => array( 104, 9, 144, 14, 273, 37, 348, 58, 497, 88, 612, 118 ),
        15 => array( 100, 8, 140, 13, 263, 36, 333, 56, 481, 86, 594, 117 ),
        16 => array( 97, 8, 137, 13, 255, 35, 325, 55, 472, 86, 584, 116 ),
        17 => array( 95, 8, 135, 13, 248, 35, 318, 55, 464, 85, 576, 115 ),
        18 => array( 92, 8, 132, 13, 241, 34, 311, 54, 457, 85, 569, 115 ),
        19 => array( 90, 8, 130, 13, 235, 34, 305, 54, 450, 84, 562, 115 ),
        20 => array( 88, 8, 128, 13, 230, 34, 300, 54, 445, 84, 556, 114 ),
        21 => array( 87, 8, 127, 13, 225, 33, 295, 53, 440, 84, 551, 114 ),
        22 => array( 85, 7, 125, 12, 221, 33, 291, 53, 435, 83, 546, 113 ),
        23 => array( 84, 7, 124, 12, 217, 33, 287, 53, 431, 83, 542, 113 ),
        24 => array( 82, 7, 122, 12, 214, 33, 284, 53, 427, 83, 538, 113 ),
        25 => array( 81, 7, 121, 12, 210, 32, 280, 52, 423, 83, 534, 113 ),
        26 => array( 80, 7, 120, 12, 207, 32, 277, 52, 420, 82, 531, 113 ),
        27 => array( 79, 7, 119, 12, 204, 32, 274, 52, 417, 82, 527, 112 ),
        28 => array( 78, 7, 118, 12, 202, 32, 272, 52, 414, 82, 524, 112 ),
        29 => array( 77, 7, 117, 12, 199, 32, 269, 52, 411, 82, 522, 112 ),
        30 => array( 76, 7, 116, 12, 197, 32, 267, 52, 409, 82, 519, 112 ),
        31 => array( 76, 7, 116, 12, 195, 31, 265, 51, 406, 82, 517, 112 ),
        32 => array( 75, 7, 115, 12, 193, 31, 263, 51, 404, 81, 514, 111 ),
        33 => array( 74, 7, 114, 12, 191, 31, 261, 51, 402, 81, 512, 111 ),
        34 => array( 74, 7, 114, 12, 189, 31, 259, 51, 400, 81, 510, 111 ),
        35 => array( 73, 7, 113, 12, 188, 31, 258, 51, 398, 81, 508, 111 ),
        36 => array( 72, 7, 112, 12, 186, 31, 256, 52, 397, 81, 507, 111 ),
        37 => array( 72, 7, 112, 12, 185, 31, 255, 53, 395, 81, 505, 111 ),
        38 => array( 71, 7, 111, 12, 183, 31, 253, 54, 393, 81, 503, 111 ),
        39 => array( 71, 7, 111, 12, 182, 31, 252, 55, 392, 81, 502, 111 ),
        40 => array( 70, 6, 110, 11, 180, 30, 250, 55, 390, 80, 500, 110 )
    );
    return array( $dpe_inf40_inf_800, $dpe_inf40_sup_800 );
}