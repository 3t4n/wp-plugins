<?php
/**
 * Class DV_acf
 *
 * This class add some shortcode to WP ACF eg: [acf-if field="FieldName"]Content come here[/acf-if] and [acf-loop before="<ul>" after="</ul>" field="LoopFieldName"]<li>{SubFieldName}</li>[/acf-loop]
 */

class DV_acf
{
    public function initialize()
    {

        add_shortcode( 'acf-if', array($this,'if_shortcode'));
        add_shortcode( 'acf-loop',  array($this,'loop_shortcode'));
        add_shortcode( 'acf-nested-loop',  array($this,'nested_loop_shortcode'));
        add_shortcode( 'acf-file',  array($this,'file_shortcode'));

        if(class_exists('BB_Ultimate_Addon')) {
            add_action('acf/init', 'DV_acf::google_api_key');
        }

    }

    //Adding Google Map API key from Beaver Builder Ultimate Addon option to ACP PRO
    public static function google_api_key()
    {
        $options = get_option('_fl_builder_uabb');
        if ( !is_array($options) || empty($options['uabb-google-map-api']) ) {
            return;
        }

        acf_update_setting('google_api_key', $options['uabb-google-map-api']);
    }


    public function if_shortcode( $attributes, $content )
    {

        $array = shortcode_atts(array(
            'field' => '',
            'condition' => '',
        ), $attributes);

        if (empty($array['field']))
            return null;

        if (get_field($array['field']) || get_sub_field($array['field'])) {

            if (empty($array['condition'])) {
                return do_shortcode($content);
            } else {

                if (get_field($array['field']) == $array['condition'] || get_sub_field($array['field']) == $array['condition']) {
                    return do_shortcode($content);
                } else {
                    return null;
                }

            }
        }

        return null;
    }

    public function loop_shortcode( $attributes, $content )
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

                $item_content = do_shortcode($content);

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

    public function nested_loop_shortcode( $attributes, $content )
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

                $item_content = do_shortcode($content);

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

    /**
     * Converts bytes into human readable file size.
     *
     * @param string $bytes
     * @return string human readable file size (2,87 Мб)
     * @author Mogilev Arseny
     */
    private function FileSizeConvert($bytes)
    {
        $result = '';
        $bytes = floatval($bytes);
        $arBytes = array(
            0 => array(
                "UNIT" => "TB",
                "VALUE" => pow(1024, 4)
            ),
            1 => array(
                "UNIT" => "GB",
                "VALUE" => pow(1024, 3)
            ),
            2 => array(
                "UNIT" => "MB",
                "VALUE" => pow(1024, 2)
            ),
            3 => array(
                "UNIT" => "KB",
                "VALUE" => 1024
            ),
            4 => array(
                "UNIT" => "B",
                "VALUE" => 1
            ),
        );

        foreach($arBytes as $arItem)
        {
            if($bytes >= $arItem["VALUE"])
            {
                $result = round( $bytes / $arItem["VALUE"] );
                $result = $result." ".$arItem["UNIT"];
                break;
            }
        }
        return $result;
    }

    public function file_shortcode( $attributes )
    {

        $array = shortcode_atts( array(
            'field' => '',
            'property' => '',
        ), $attributes );

        if ( empty($array['field']) || empty($array['property']) )
            return '';

        if( get_field($array['field']) || get_sub_field($array['field']) ) {

            if (get_sub_field($array['field'])) {
                $file = get_sub_field($array['field']);
            } else {
                $file = get_field($array['field']);
            }

            if ( is_array($file) ) {
                $fileID = intval($file['ID']);
            } else {
                $fileID = intval($file);
            }

            if ( !file_exists(get_attached_file( $fileID )) )
                return null;

            $media = get_post($fileID);

            switch ($array['property'])
            {
                case "title":
                    return get_the_title($media);
                case "caption":
                    return get_the_excerpt($media);
                case "description":
                    return $media->post_content;
                case "size":
                    return $this->FileSizeConvert( filesize( get_attached_file( $fileID ) ) );
                case "url":
                    return wp_get_attachment_url( $fileID );
                case "filename":
                    return basename( get_attached_file( $fileID ) );
                case "type":
                    return $media->post_mime_type;
                default:
                    return null;
            }
        }
        else
            return null;
    }
}
