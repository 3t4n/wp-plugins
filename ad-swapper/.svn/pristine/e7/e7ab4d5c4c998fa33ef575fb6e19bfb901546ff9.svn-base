<?php

// *****************************************************************************
// VALIDATA.APP / INCLUDES / CSS-VALIDATORS.PHP
// (C) 2015 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_validationFunctions ;

// =============================================================================
// css_colour_string__typesHex6_namesTransparent__questionEmptyOK()
// =============================================================================

function css_colour_string__typesHex6_namesTransparent__questionEmptyOK(
    $value                      ,
    $question_empty_ok = TRUE
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_validationFunctions\
    // css_colour_string__typesHex6_namesTransparent__questionEmptyOK(
    //      $value                      ,
    //      $question_empty_ok = TRUE
    //      )
    // - - - - - - - - - - - - - - - - -
    // The CSS colour string can be either:-
    //      o   6 digit HEX string - with leading # (eg; "#0066CC").  Or;
    //      o   "transparent"
    //
    // RETURNS
    //      On SUCCESS
    //          TRUE
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    $types = array( 'hex6' , 'names' ) ;
    $names = array( 'transparent' ) ;

    // -------------------------------------------------------------------------

    return css_colour_string__types_names_questionEmptyOK(
                $value                  ,
                $types                  ,
                $names                  ,
                $question_empty_ok
                ) ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// css_colour_string__types_names_questionEmptyOK()
// =============================================================================

function css_colour_string__types_names_questionEmptyOK(
    $value                      ,
    $types = array()            ,
    $names = array()            ,
    $question_empty_ok = TRUE
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_validationFunctions\
    // css_colour_string__types_names_questionEmptyOK(
    //      $value                      ,
    //      $types = array()            ,
    //      $names = array()            ,
    //      $question_empty_ok = TRUE
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - -
    // Acc. to:-
    //      http://www.w3schools.com/cssref/css_colors_legal.asp
    //
    //      "Colors in CSS can be specified by the following methods:
    //
    //          Hexadecimal colors
    //          RGB colors
    //          RGBA colors
    //          HSL colors
    //          HSLA colors
    //          Predefined/Cross-browser color names"
    //
    // This routine supports:-
    //          Hexadecimal colors, and;
    //          "transparent"
    //
    // only (at the moment).
    //
    // $types should be a (numerically indexed) array, containing one or more
    // of the following (strings):-
    //          o   "hex"       (3 or 6 digit HEX string - with leading #)
    //          o   "hex3"      (     3 digit HEX string - with leading #)
    //          o   "hex6"      (     6 digit HEX string - with leading #)
    //          o   "rgb"
    //          o   "rgba"
    //          o   "hsl"
    //          o   "hsla"
    //          o   "names"
    //
    // $names should be a (numerically indexed) array, containing one or more
    // pre-defined CSS colour name.  See:-
    //      http://www.w3schools.com/cssref/css_colornames.asp
    //
    // The following "names" are also allowed:-
    //      "transparent"
    //      "initial"
    //      "inherit"
    //
    // RETURNS
    //      On SUCCESS
    //          TRUE
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    if ( ! is_array( $types ) ) {

        return <<<EOT
Bad "types" parameter (array expected)
EOT;

    }

    // -------------------------------------------------------------------------

    if ( ! is_array( $names ) ) {

        return <<<EOT
Bad "names" parameter (array expected)
EOT;

    }

    // -------------------------------------------------------------------------

    if ( $question_empty_ok ) {

        $explanation = <<<EOT
CSS colour expected (though field may also be left blank)
EOT;

    } else {

        $explanation = <<<EOT
CSS colour expected
EOT;

    }

    // -------------------------------------------------------------------------

    if ( ! is_string( $value ) ) {
        return $explanation ;
    }

    // -------------------------------------------------------------------------

    if (    $question_empty_ok
            &&
            trim( $value ) === ''
        ) {
        return TRUE ;
    }

    // -------------------------------------------------------------------------
    // NAMES
    // -------------------------------------------------------------------------

    if ( in_array( 'names' , $types , TRUE ) ) {

        // ---------------------------------------------------------------------

        $css_colour_names = array(
            'transparent'               ,
            'initial'                   ,
            'inherit'                   ,
            'aliceblue'                 ,
            'antiquewhite'              ,
            'aqua'                      ,
            'aquamarine'                ,
            'azure'                     ,
            'beige'                     ,
            'bisque'                    ,
            'black'                     ,
            'blanchedalmond'            ,
            'blue'                      ,
            'blueviolet'                ,
            'brown'                     ,
            'burlywood'                 ,
            'cadetblue'                 ,
            'chartreuse'                ,
            'chocolate'                 ,
            'coral'                     ,
            'cornflowerblue'            ,
            'cornsilk'                  ,
            'crimson'                   ,
            'cyan'                      ,
            'darkblue'                  ,
            'darkcyan'                  ,
            'darkgoldenrod'             ,
            'darkgray'                  ,
            'darkgreen'                 ,
            'darkkhaki'                 ,
            'darkmagenta'               ,
            'darkolivegreen'            ,
            'darkorange'                ,
            'darkorchid'                ,
            'darkred'                   ,
            'darksalmon'                ,
            'darkseagreen'              ,
            'darkslateblue'             ,
            'darkslategray'             ,
            'darkturquoise'             ,
            'darkviolet'                ,
            'deeppink'                  ,
            'deepskyblue'               ,
            'dimgray'                   ,
            'dodgerblue'                ,
            'firebrick'                 ,
            'floralwhite'               ,
            'forestgreen'               ,
            'fuchsia'                   ,
            'gainsboro'                 ,
            'ghostwhite'                ,
            'gold'                      ,
            'goldenrod'                 ,
            'gray'                      ,
            'green'                     ,
            'greenyellow'               ,
            'honeydew'                  ,
            'hotpink'                   ,
            'indianred'                 ,
            'indigo'                    ,
            'ivory'                     ,
            'khaki'                     ,
            'lavender'                  ,
            'lavenderblush'             ,
            'lawngreen'                 ,
            'lemonchiffon'              ,
            'lightblue'                 ,
            'lightcoral'                ,
            'lightcyan'                 ,
            'lightgoldenrodyellow'      ,
            'lightgreen'                ,
            'lightgrey'                 ,
            'lightpink'                 ,
            'lightsalmon'               ,
            'lightseagreen'             ,
            'lightskyblue'              ,
            'lightslategray'            ,
            'lightsteelblue'            ,
            'lightyellow'               ,
            'lime'                      ,
            'limegreen'                 ,
            'linen'                     ,
            'magenta'                   ,
            'maroon'                    ,
            'mediumaquamarine'          ,
            'mediumblue'                ,
            'mediumorchid'              ,
            'mediumpurple'              ,
            'mediumseagreen'            ,
            'mediumslateblue'           ,
            'mediumspringgreen'         ,
            'mediumturquoise'           ,
            'mediumvioletred'           ,
            'midnightblue'              ,
            'mintcream'                 ,
            'mistyrose'                 ,
            'moccasin'                  ,
            'navajowhite'               ,
            'navy'                      ,
            'oldlace'                   ,
            'olive'                     ,
            'olivedrab'                 ,
            'orange'                    ,
            'orangered'                 ,
            'orchid'                    ,
            'palegoldenrod'             ,
            'palegreen'                 ,
            'paleturquoise'             ,
            'palevioletred'             ,
            'papayawhip'                ,
            'peachpuff'                 ,
            'peru'                      ,
            'pink'                      ,
            'plum'                      ,
            'powderblue'                ,
            'purple'                    ,
            'red'                       ,
            'rosybrown'                 ,
            'royalblue'                 ,
            'saddlebrown'               ,
            'salmon'                    ,
            'sandybrown'                ,
            'seagreen'                  ,
            'seashell'                  ,
            'sienna'                    ,
            'silver'                    ,
            'skyblue'                   ,
            'slateblue'                 ,
            'slategray'                 ,
            'snow'                      ,
            'springgreen'               ,
            'steelblue'                 ,
            'tan'                       ,
            'teal'                      ,
            'thistle'                   ,
            'tomato'                    ,
            'turquoise'                 ,
            'violet'                    ,
            'wheat'                     ,
            'white'                     ,
            'whitesmoke'                ,
            'yellow'                    ,
            'yellowgreen'
            ) ;

        // ---------------------------------------------------------------------

        foreach ( $names as $this_name ) {

            // -----------------------------------------------------------------

            if ( ! in_array( $this_name , $css_colour_names ) ) {

                $safe_name = htmlentities( $this_name ) ;

                return <<<EOT
Unrecognised/unsupported colour name ("{$safe_name}")
EOT;

            }

            // -----------------------------------------------------------------

            if ( $value === $this_name ) {
                return TRUE ;
            }

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------
    // 3 DIGIT HEX string...
    // -------------------------------------------------------------------------

    if ( in_array( 'hex3' , $types , TRUE ) ) {

        // ---------------------------------------------------------------------

        if (    strlen( $value ) === 4
                &&
                $value[0] === '#'
                &&
                ctype_xdigit( substr( $value , 1 ) )
            ) {
            return TRUE ;
        }

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------
    // 6 DIGIT HEX string...
    // -------------------------------------------------------------------------

    if ( in_array( 'hex6' , $types , TRUE ) ) {

        // ---------------------------------------------------------------------

        if (    strlen( $value ) === 7
                &&
                $value[0] === '#'
                &&
                ctype_xdigit( substr( $value , 1 ) )
            ) {
            return TRUE ;
        }

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------
    // 3 or 6 DIGIT HEX string...
    // -------------------------------------------------------------------------

    if ( in_array( 'hex' , $types , TRUE ) ) {

        // ---------------------------------------------------------------------

        if (    in_array( strlen( $value ) , array( 4 , 7 ) , TRUE )
                &&
                $value[0] === '#'
                &&
                ctype_xdigit( substr( $value , 1 ) )
            ) {
            return TRUE ;
        }

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------
    // FAILURE!
    // -------------------------------------------------------------------------

    return $explanation ;

    // -------------------------------------------------------------------------
    // That's that!
    // -------------------------------------------------------------------------

}

// =============================================================================
// That's that!
// =============================================================================

