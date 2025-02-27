<?php
class DV_acfShortCode
{
    public function initialize()
    {

        add_shortcode( 'acf-if', array($this,'add_if_shortcode'));
        add_shortcode( 'acf-loop',  array($this,'add_loop_shortcode'));

    }

    public function add_if_shortcode( $attributes, $content )
    {

        $array = shortcode_atts( array(
            'field' => '',
        ), $attributes );

        if ( empty($array['field']) )
            return '';

        if( get_field($array['field']) )
            return do_shortcode($content);
        else
            return null;
    }

    public function add_loop_shortcode( $attributes, $content )
    {

        $array = shortcode_atts( array(
            'field' => '',
            'before' => '',
            'after' => '',
        ), $attributes );

        if ( empty($array['field']) )
            return '';

        $result = '';

        if( have_rows($array['field']) ):

            if ( !empty($array['before']) )
                $result .= $array['before'];

            while ( have_rows($array['field']) ) : the_row();

                $item_content = $content;
                preg_match_all("|{(.*)}|U",
                    $item_content,
                    $out, PREG_PATTERN_ORDER);

                if ( !empty($out[0]) && !empty($out[1]) )
                    foreach ($out[1] as $key => $value) {
                        $item_content = str_replace($out[0][$key],get_sub_field($value), $item_content);
                    }

                $result .= $item_content;
            endwhile;

            if ( !empty($array['after']) )
                $result .= $array['after'];

        endif;

        if ( !empty($result) )
            $result = do_shortcode($result);

        return $result;
    }
}
