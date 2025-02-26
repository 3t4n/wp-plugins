<?php

if ( ! defined( 'TGGH_URL' ) ) {
    exit;
}

global $tggh_random_bytes;
global $tggh_random_byte_count;
global $tggh_random_byte_index;

function tggh_next_random_byte( $pool_size = 20 ) {
    global $tggh_random_bytes;
    global $tggh_random_byte_count;
    global $tggh_random_byte_index;

    if ( $tggh_random_byte_index === $tggh_random_byte_count ) {
        $tggh_random_byte_count = $pool_size;
        $tggh_random_byte_index = 0;

        if ( function_exists( 'random_bytes' ) ) {
            $tggh_random_bytes = random_bytes( $pool_size );
        } else if ( function_exists( 'openssl_random_pseudo_bytes' ) ) {
            $tggh_random_bytes = openssl_random_pseudo_bytes( $pool_size );
        } else {
            $tggh_random_bytes = array();
            for ( $i = 0; $i < $pool_size; ++$i ) {
                $tggh_random_bytes []= chr( mt_rand( 0, 255 ) );
            }
        }
    }

    return $tggh_random_bytes[$tggh_random_byte_index++];
}

global $tggh_re_word_unsafe;

$tggh_re_word_unsafe = (
    '/(?:' .
        'a(?:n(?:al|us)|s[sn]|rs[ckq])|' .
        'b(?:ang|dsm|oob|one|utt|i?mbo?|onz|ugr|ite|ord)|' .
        'c(?:[oa][ckqn]{1,2}[oa]?|o[qn]|ovi|u[mln]t?|hu[jp]|urv|ulo|hat|lit)|' .
        'd(?:[ie]?[ckq]{2}|[iy][ckq]e)|' .
        'f(?:ag|[ei][ckq][ae]?|ist|[uickq][ckq]{1,2}|uq|o(?:tz|ll|ut)|rat)|' .
        'ga[ye]|' .
        'h(?:oo[ckq]|o[rv]n|ump|ack|ero|ij[ao])|' .
        'j(?:a?[ckq]{2}|er[ckq]|ug|eba)|' .
        'k(?:[oa][ckq][oe]|ono?|urv|a[ckq]{2})|' .
        'l(?:e(?:sb|z)|ort)|gbt|' .
        'm(?:ilf|org|op?se?|u(?:ft|sc|na)|e?rd)|' .
        'n(?:[ie]gg?[er]|ip|ud|[yi]m[pf]|a[ckq]{2}|utt?|azi)|' .
        'o(?:rg[ya]|var|rin)|' .
        'p(?:a[ckq]i|e?n?[iu]ss?|ipi|i?[zs]d|o(?:o|rn)|op[pe]|e(?:[dz]o|rv)|u[tl][aei])|' .
        'que|' .
        'r(?:ap[ei]|e[ckq]t)|' .
        's(?:[ckqr]at|ex|h[ie]?t|[lm]u?t|u[ckq]{1,2}|[ckq]{2}|ra[ct]|uli|eme|[mn]a[ckq]|a?lop?|u[ckq]e)|' .
        't(?:it|ra[nv]|wa?t|rio)|' .
        'ure|' .
        'v(?:i?ag|er?g|o[yg]e|u?lv)|' .
        'w(?:an[ckq]|hor|ich)|' .
        'z(?:mrd|rat|izi)|' .
        '666' .
    ')/i'
);

function tggh_random_int( $min, $max, $pool_size = 20 ) {
    if ( function_exists( 'random_int' ) ) {
        return random_int( $min, $max );
    } else {
        $min = ceil( $min );
        $max = floor( $max );

        return (int) (
            ( ord( tggh_next_random_byte( $pool_size ) ) / 255 ) *
            ( $max - $min ) + $min
        );
    }
}

// Format:
//
// A = alpha (uppercase)
// a = alpha (lowercase)
// B = alpha (mixed case)
// C = alphanumeric (uppercase)
// c = alphanumeric (lowercase)
// D = alphanumeric (mixed case)
// N = numeric
// M = dissimilar numeric
// P = dissimilar alpha (uppercase)
// p = dissimilar alpha (lowercase)
// Q = dissimilar alpha (mixed case)
// I = dissimilar alphanumeric (uppercase)
// i = dissimilar alphanumeric (lowercase)
// J = dissimilar alphanumeric (mixed case)
// X = hexadecimal (uppercase)
// x = hexadecimal (lowercase)
// \ = escape next character
//
// Example:
//
// ACCC-BBBB

define( 'TGGH_RND_ALPHA_UPPER',   'ABCDEFGHIJKLMNOPQRSTUVWXYZ' );
define( 'TGGH_RND_ALPHA_LOWER',   'abcdefghijklmnopqrstuvwxyz' );
define( 'TGGH_RND_ALPHA_MIXED',   'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz' );
define( 'TGGH_RND_ALNUM_UPPER',   '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ' );
define( 'TGGH_RND_ALNUM_LOWER',   '0123456789abcdefghijklmnopqrstuvwxyz' );
define( 'TGGH_RND_ALNUM_MIXED',   '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz' );
define( 'TGGH_RND_DIGITS',        '0123456789' );
define( 'TGGH_RND_D_DIGITS',      '23456789' );
define( 'TGGH_RND_D_ALPHA_UPPER', 'ABCDEFGHJKLMNPQRSTUVWXYZ' );
define( 'TGGH_RND_D_ALPHA_LOWER', 'abcdefghjkmnpqrstuvwxyz' );
define( 'TGGH_RND_D_ALPHA_MIXED', 'ABCDEFGHJKLMNPQRSTUVWXYZabcdefghjkmnpqrstuvwxyz' );
define( 'TGGH_RND_D_ALNUM_UPPER', '23456789ABCDEFGHJKLMNPQRSTUVWXYZ' );
define( 'TGGH_RND_D_ALNUM_LOWER', '23456789abcdefghjkmnpqrstuvwxyz' );
define( 'TGGH_RND_D_ALNUM_MIXED', '23456789ABCDEFGHJKLMNPQRSTUVWXYZabcdefghjkmnpqrstuvwxyz' );
define( 'TGGH_RND_HEX_UPPER',     '0123456789ABCDEF' );
define( 'TGGH_RND_HEX_LOWER',     '0123456789abcdef' );

define( 'TGGH_RNDC_ALPHA_UPPER',   26 );
define( 'TGGH_RNDC_ALPHA_LOWER',   26 );
define( 'TGGH_RNDC_ALPHA_MIXED',   52 );
define( 'TGGH_RNDC_ALNUM_UPPER',   36 );
define( 'TGGH_RNDC_ALNUM_LOWER',   36 );
define( 'TGGH_RNDC_ALNUM_MIXED',   62 );
define( 'TGGH_RNDC_DIGITS',        10 );
define( 'TGGH_RNDC_D_DIGITS',       8 );
define( 'TGGH_RNDC_D_ALPHA_UPPER', 24 );
define( 'TGGH_RNDC_D_ALPHA_LOWER', 23 );
define( 'TGGH_RNDC_D_ALPHA_MIXED', 47 );
define( 'TGGH_RNDC_D_ALNUM_UPPER', 32 );
define( 'TGGH_RNDC_D_ALNUM_LOWER', 31 );
define( 'TGGH_RNDC_D_ALNUM_MIXED', 55 );
define( 'TGGH_RNDC_HEX_UPPER',     16 );
define( 'TGGH_RNDC_HEX_LOWER',     16 );

function tggh_generate_random_id( $format, $_iter = 0 ) {
    $result = '';
    $str = '';

    $parse = true;
    for ( $i = 0, $n = 0, $len = strlen( $format ); $i < $len; ++$i, $n = 0 ) {
        $f = $format[$i];

        if ( ! $parse ) {
            $result .= $f;
            $str .= $f;
            $parse = true;
            continue;
        }

        if ( $f === '\\' ) {
            $parse = false;
            continue;
        }

        switch ( $f ) {
            case 'A': $c = TGGH_RND_ALPHA_UPPER;   $n = TGGH_RNDC_ALPHA_UPPER;   break;
            case 'a': $c = TGGH_RND_ALPHA_LOWER;   $n = TGGH_RNDC_ALPHA_LOWER;   break;
            case 'B': $c = TGGH_RND_ALPHA_MIXED;   $n = TGGH_RNDC_ALPHA_MIXED;   break;
            case 'C': $c = TGGH_RND_ALNUM_UPPER;   $n = TGGH_RNDC_ALNUM_UPPER;   break;
            case 'c': $c = TGGH_RND_ALNUM_LOWER;   $n = TGGH_RNDC_ALNUM_LOWER;   break;
            case 'D': $c = TGGH_RND_ALNUM_MIXED;   $n = TGGH_RNDC_ALNUM_MIXED;   break;
            case 'N': $c = TGGH_RND_DIGITS;        $n = TGGH_RNDC_DIGITS;        break;
            case 'M': $c = TGGH_RND_D_DIGITS;      $n = TGGH_RNDC_D_DIGITS;      break;
            case 'P': $c = TGGH_RND_D_ALPHA_UPPER; $n = TGGH_RNDC_D_ALPHA_UPPER; break;
            case 'p': $c = TGGH_RND_D_ALPHA_LOWER; $n = TGGH_RNDC_D_ALPHA_LOWER; break;
            case 'Q': $c = TGGH_RND_D_ALPHA_MIXED; $n = TGGH_RNDC_D_ALPHA_MIXED; break;
            case 'I': $c = TGGH_RND_D_ALNUM_UPPER; $n = TGGH_RNDC_D_ALNUM_UPPER; break;
            case 'i': $c = TGGH_RND_D_ALNUM_LOWER; $n = TGGH_RNDC_D_ALNUM_LOWER; break;
            case 'J': $c = TGGH_RND_D_ALNUM_MIXED; $n = TGGH_RNDC_D_ALNUM_MIXED; break;
            case 'X': $c = TGGH_RND_HEX_UPPER;     $n = TGGH_RNDC_HEX_UPPER;     break;
            case 'x': $c = TGGH_RND_HEX_LOWER;     $n = TGGH_RNDC_HEX_LOWER;     break;
        }

        $c = $n > 0 ? $c[tggh_random_int( 0, $n - 1 )] : $f;

        if ( ctype_alnum( $c ) ) {
            $str .= $c;
        }

        $result .= $c;
    }

    if ( $_iter < 20 ) {
        global $tggh_re_word_unsafe;
        if ( preg_match( $tggh_re_word_unsafe, $str ) ) {
            $result = tggh_generate_random_id( $format, $_iter + 1 );
        }
    }

    return $result;
}

function tggh_count_random_id_possibilities( $format ) {
    $count = 1;
    $parse = true;

    for ( $i = 0, $len = strlen( $format ); $i < $len; ++$i ) {
        $f = $format[$i];

        if ( ! $parse )    { $parse =  true; continue; }
        if ( $f === '\\' ) { $parse = false; continue; }

        switch ( $f ) {
            case 'A': $count *= TGGH_RNDC_ALPHA_UPPER;   break;
            case 'a': $count *= TGGH_RNDC_ALPHA_LOWER;   break;
            case 'B': $count *= TGGH_RNDC_ALPHA_MIXED;   break;
            case 'C': $count *= TGGH_RNDC_ALNUM_UPPER;   break;
            case 'c': $count *= TGGH_RNDC_ALNUM_LOWER;   break;
            case 'D': $count *= TGGH_RNDC_ALNUM_MIXED;   break;
            case 'N': $count *= TGGH_RNDC_DIGITS;        break;
            case 'M': $count *= TGGH_RNDC_D_DIGITS;      break;
            case 'P': $count *= TGGH_RNDC_D_ALPHA_UPPER; break;
            case 'p': $count *= TGGH_RNDC_D_ALPHA_LOWER; break;
            case 'Q': $count *= TGGH_RNDC_D_ALPHA_MIXED; break;
            case 'I': $count *= TGGH_RNDC_D_ALNUM_UPPER; break;
            case 'i': $count *= TGGH_RNDC_D_ALNUM_LOWER; break;
            case 'J': $count *= TGGH_RNDC_D_ALNUM_MIXED; break;
            case 'X': $count *= TGGH_RNDC_HEX_UPPER;     break;
            case 'x': $count *= TGGH_RNDC_HEX_LOWER;     break;
        }
    }

    return $count;
}
