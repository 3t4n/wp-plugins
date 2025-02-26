<?php

if ( ! defined( 'TGGH_URL' ) ) {
    exit;
}

function tggh_find_merge_tags( $text ) {
    $len = strlen( $text );
    $parse = true;

    $tag_pos = 0;
    $level = 0;

    $found_tags = array();

    do {
        if ( ( $tag_pos = strpos( $text, '{', $tag_pos ) ) !== false ) {
            $params = array();

            $param_pos = -1;
            $param_len = 0;
            $tag_len = 0;

            for (
                $i = ++$tag_pos, ++$level, $tag_len = 0;
                $i < $len;
                ++$i, ++$tag_len, ++$param_len
            ) {
                $c = $text[$i];

                if ( ! $parse )    { $parse =  true; continue; }
                if ( $c === '\\' ) { $parse = false; continue; }

                if ( $c === '{' ) {
                    ++$level;
                } elseif ( $c === '}' ) {
                    if ( --$level === 0 ) {
                        if ( $param_pos > -1 && $param_len > -1 ) {
                            $params []= substr(
                                $text, $param_pos, $param_len
                            );
                        }

                        $tag_text = substr( $text, $tag_pos, $tag_len );

                        if ( empty( $params ) ) {
                            $tag = $tag_text;
                        } else {
                            $tag = array_shift( $params );
                        }

                        if ( ! isset( $found_tags[$tag] ) ) {
                            $found_tags[$tag] = array();
                        }

                        $found_tags[$tag] []= array(
                            'tag' => $tag,
                            'text' => '{' . $tag_text . '}',
                            'position' => array(
                                'from' => $tag_pos - 1,
                                'to' => $tag_pos + $tag_len,
                                'length' => $tag_len + 2
                            ),
                            'params' => $params
                        );

                        $tag_pos = $i + 1;
                        break;
                    }
                } elseif ( $c === ':' ) {
                    $params []= substr(
                        $text,
                        $param_pos > -1 ? $param_pos : $tag_pos,
                        $param_len
                    );

                    $param_pos = $i + 1;
                    $param_len = -1;
                }
            }
        }
    } while ( $tag_pos !== false );

    return $found_tags;
}

function tggh_replace_merge_tags( $text, $tags = array() ) {
    static $cache = array();

    if ( empty( $text ) || strpos( $text, '{' ) === false ) {
        return $text;
    }

    $found_tags = tggh_get( $cache, $text );
    if ( is_null( $found_tags ) ) {
        $found_tags = ( $cache[$text] = tggh_find_merge_tags( $text ) );
    }

    $pos_offset = 0;
    foreach ( $tags as $tag => $callback ) {
        foreach ( tggh_get_array( $found_tags, $tag ) as $found_tag ) {
            $pos = $found_tag['position'];
            $value = $callback( $found_tag );
            $value_len = strlen( $value );

            $text = substr_replace(
                $text, $value, $pos['from'] + $pos_offset, $pos['length']
            );

            if ( $value_len !== $pos['length'] ) {
                $pos_offset = $value_len - $pos['length'];
            }
        }
    }

    return $text;
}
