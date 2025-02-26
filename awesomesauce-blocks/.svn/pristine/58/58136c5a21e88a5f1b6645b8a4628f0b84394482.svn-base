<?php

namespace Awesomesauce;

if (!defined('ABSPATH')) {
    exit;
}

class Sanitization {

    static function allowed_html($limited = false) {
        $tags = array(
            'address'        => array(),
            'a'              => array(
                'href'     => true,
                'rel'      => true,
                'rev'      => true,
                'name'     => true,
                'target'   => true,
                'download' => array(
                    'valueless' => 'y',
                ),
            ),
            'abbr'           => array(),
            'acronym'        => array(),
            'area'           => array(
                'alt'    => true,
                'coords' => true,
                'href'   => true,
                'nohref' => true,
                'shape'  => true,
                'target' => true,
            ),
            'article'        => array(
                'align' => true,
            ),
            'aside'          => array(
                'align' => true,
            ),
            'audio'          => array(
                'autoplay' => true,
                'controls' => true,
                'loop'     => true,
                'muted'    => true,
                'preload'  => true,
                'src'      => true,
            ),
            'b'              => array(),
            'bdi'            => array(),
            'bdo'            => array(),
            'big'            => array(),
            'blockquote'     => array(
                'cite' => true,
            ),
            'br'             => array(),
            'button'         => array(
                'disabled' => true,
                'name'     => true,
                'type'     => true,
                'value'    => true,
            ),
            'caption'        => array(
                'align' => true,
            ),
            'canvas'         => array(
                'width'  => true,
                'height' => true,
            ),
            'cite'           => array(),
            'code'           => array(),
            'col'            => array(
                'align'   => true,
                'char'    => true,
                'charoff' => true,
                'span'    => true,
                'valign'  => true,
                'width'   => true,
            ),
            'colgroup'       => array(
                'align'   => true,
                'char'    => true,
                'charoff' => true,
                'span'    => true,
                'valign'  => true,
                'width'   => true,
            ),
            'del'            => array(
                'datetime' => true,
            ),
            'dd'             => array(),
            'dfn'            => array(),
            'details'        => array(
                'align' => true,
                'open'  => true,
            ),
            'div'            => array(
                'align' => true,
                'style' => array(
                    '--bg' => true,
                )
            ),
            'dl'             => array(),
            'dt'             => array(),
            'em'             => array(),
            'fieldset'       => array(),
            'figure'         => array(
                'align' => true,
            ),
            'figcaption'     => array(
                'align' => true,
            ),
            'font'           => array(
                'color' => true,
                'face'  => true,
                'size'  => true,
            ),
            'footer'         => array(
                'align' => true,
            ),
            'h1'             => array(
                'align' => true,
            ),
            'h2'             => array(
                'align' => true,
            ),
            'h3'             => array(
                'align' => true,
            ),
            'h4'             => array(
                'align' => true,
            ),
            'h5'             => array(
                'align' => true,
            ),
            'h6'             => array(
                'align' => true,
            ),
            'header'         => array(
                'align' => true,
            ),
            'hgroup'         => array(
                'align' => true,
            ),
            'hr'             => array(
                'align'   => true,
                'noshade' => true,
                'size'    => true,
                'width'   => true,
            ),
            'i'              => array(),
            'img'            => array(
                'alt'      => true,
                'align'    => true,
                'border'   => true,
                'height'   => true,
                'hspace'   => true,
                'loading'  => true,
                'longdesc' => true,
                'vspace'   => true,
                'src'      => true,
                'usemap'   => true,
                'width'    => true,
            ),
            'ins'            => array(
                'datetime' => true,
                'cite'     => true,
            ),
            'kbd'            => array(),
            'label'          => array(
                'for' => true,
            ),
            'legend'         => array(
                'align' => true,
            ),
            'li'             => array(
                'align' => true,
                'value' => true,
            ),
            'main'           => array(
                'align' => true,
            ),
            'map'            => array(
                'name' => true,
            ),
            'mark'           => array(),
            'menu'           => array(
                'type' => true,
            ),
            'nav'            => array(
                'align' => true,
            ),
            'object'         => array(
                'data' => array(
                    'required'       => true,
                    'value_callback' => '_wp_kses_allow_pdf_objects',
                ),
                'type' => array(
                    'required' => true,
                    'values'   => array('application/pdf'),
                ),
            ),
            'p'              => array(
                'align' => true,
            ),
            'pre'            => array(
                'width' => true,
            ),
            'q'              => array(
                'cite' => true,
            ),
            'rb'             => array(),
            'rp'             => array(),
            'rt'             => array(),
            'rtc'            => array(),
            'ruby'           => array(),
            's'              => array(),
            'samp'           => array(),
            'span'           => array(
                'align' => true,
            ),
            'section'        => array(
                'align' => true,
            ),
            'small'          => array(),
            'strike'         => array(),
            'strong'         => array(),
            'sub'            => array(),
            'summary'        => array(
                'align' => true,
            ),
            'sup'            => array(),
            'table'          => array(
                'align'       => true,
                'bgcolor'     => true,
                'border'      => true,
                'cellpadding' => true,
                'cellspacing' => true,
                'rules'       => true,
                'summary'     => true,
                'width'       => true,
            ),
            'tbody'          => array(
                'align'   => true,
                'char'    => true,
                'charoff' => true,
                'valign'  => true,
            ),
            'td'             => array(
                'abbr'    => true,
                'align'   => true,
                'axis'    => true,
                'bgcolor' => true,
                'char'    => true,
                'charoff' => true,
                'colspan' => true,
                'headers' => true,
                'height'  => true,
                'nowrap'  => true,
                'rowspan' => true,
                'scope'   => true,
                'valign'  => true,
                'width'   => true,
            ),
            'textarea'       => array(
                'cols'         => true,
                'rows'         => true,
                'disabled'     => true,
                'name'         => true,
                'readonly'     => true,
                'autocomplete' => true,
                'placeholder'  => true,
            ),
            'tfoot'          => array(
                'align'   => true,
                'char'    => true,
                'charoff' => true,
                'valign'  => true,
            ),
            'th'             => array(
                'abbr'    => true,
                'align'   => true,
                'axis'    => true,
                'bgcolor' => true,
                'char'    => true,
                'charoff' => true,
                'colspan' => true,
                'headers' => true,
                'height'  => true,
                'nowrap'  => true,
                'rowspan' => true,
                'scope'   => true,
                'valign'  => true,
                'width'   => true,
            ),
            'thead'          => array(
                'align'   => true,
                'char'    => true,
                'charoff' => true,
                'valign'  => true,
            ),
            'title'          => array(),
            'tr'             => array(
                'align'   => true,
                'bgcolor' => true,
                'char'    => true,
                'charoff' => true,
                'valign'  => true,
            ),
            'track'          => array(
                'default' => true,
                'kind'    => true,
                'label'   => true,
                'src'     => true,
                'srclang' => true,
            ),
            'tt'             => array(),
            'u'              => array(),
            'ul'             => array(
                'type' => true,
            ),
            'ol'             => array(
                'start'    => true,
                'type'     => true,
                'reversed' => true,
            ),
            'var'            => array(),
            'video'          => array(
                'autoplay'    => true,
                'controls'    => true,
                'height'      => true,
                'loop'        => true,
                'muted'       => true,
                'playsinline' => true,
                'poster'      => true,
                'preload'     => true,
                'src'         => true,
                'width'       => true,
            ),
            //'script'     => array(),
            'input'          => array(
                'id'           => true,
                'name'         => true,
                'value'        => true,
                'type'         => true,
                'autocomplete' => true,
                'style'        => true,
                'list'         => true,
                'placeholder'  => true,
                'min'          => true,
                'max'          => true,
                'step'         => true,
            ),
            'select'         => array(
                'id'              => true,
                'name'            => true,
                'aria-labelledby' => true,
                'autocomplete'    => true,
                'multiple'        => true,
                'size'            => true,
            ),
            'option'         => array(
                'value'    => true,
                'selected' => true,
                'disabled' => true,
            ),
            'datalist'       => array(),
            'style'          => array(),
            'link'           => array(
                'rel'  => true,
                'href' => true,
            ),
            'picture'        => array(),
            'source'         => array(
                'srcset' => true,
                'type'   => true,
                'media'  => true,
            ),

            //SVG tags
            'svg'            => array(
                'display'      => true,
                'xmlns'        => true,
                'width'        => true,
                'height'       => true,
                'viewbox'      => true,
                'fill'         => true,
                'stroke'       => true,
                'stroke-width' => true,
            ),
            'defs'           => array(),
            'feturbulence'   => array(
                'type'          => true,
                'baseFrequency' => true,
                'stitchTiles'   => true,
            ),
            'fegaussianblur' => array(
                'in'           => true,
                'stdDeviation' => true,
                'result'       => true,
            ),
            'fecolormatrix'  => array(
                'in'     => true,
                'type'   => true,
                'mode'   => true,
                'values' => true,
                'result' => true,
            ),
            'feblend'        => array(
                'in'  => true,
                'in2' => true,
            ),
            'filter'         => array(),
            'g'              => array(
                'fill'         => true,
                'stroke'       => true,
                'stroke-width' => true,
                'transform'    => true,
            ),
            'path'           => array(
                'd'            => true,
                'fill'         => true,
                'stroke'       => true,
                'stroke-width' => true,
                'transform'    => true,
            ),
            'circle'         => array(
                'cx'                => true,
                'cy'                => true,
                'r'                 => true,
                'fill'              => true,
                'stroke'            => true,
                'stroke-width'      => true,
                'stroke-miterlimit' => true,
                'opacity'           => true,
            ),
            'symbol'         => array(
                'version'     => true,
                'xmlns'       => true,
                'xmlns:xlink' => true,
                'x'           => true,
                'y'           => true,
                'width'       => true,
                'height'      => true,
                'viewbox'     => true,
                'style'       => true,
                'xml:space'   => true,
            ),
            'rect'           => array(
                'x'            => true,
                'y'            => true,
                'width'        => true,
                'height'       => true,
                'rx'           => true,
                'ry'           => true,
                'fill'         => true,
                'stroke'       => true,
                'stroke-width' => true,
            ),
            'line'           => array(
                'x1'           => true,
                'y1'           => true,
                'x2'           => true,
                'y2'           => true,
                'stroke'       => true,
                'stroke-width' => true,
            ),
            'polygon'        => array(
                'points'       => true,
                'fill'         => true,
                'stroke'       => true,
                'stroke-width' => true,
            ),
            'polyline'       => array(
                'points'       => true,
                'fill'         => true,
                'stroke'       => true,
                'stroke-width' => true,
            ),
            'text'           => array(
                'x'                 => true,
                'y'                 => true,
                'dx'                => true,
                'dy'                => true,
                'font-family'       => true,
                'font-size'         => true,
                'fill'              => true,
                'stroke'            => true,
                'stroke-width'      => true,
                'text-anchor'       => true,
                'dominant-baseline' => true,
            ),
            'tspan'          => array(
                'x'            => true,
                'y'            => true,
                'dx'           => true,
                'dy'           => true,
                'font-family'  => true,
                'font-size'    => true,
                'fill'         => true,
                'stroke'       => true,
                'stroke-width' => true,
                'text-anchor'  => true,
            ),
            'desc'           => array(),
            'use'            => array(
                'xlink:href' => true
            ),
        );

        if ($limited) {
            $tags = array(
                'br'     => array(),
                'a'      => array(
                    'href'     => true,
                    'rel'      => true,
                    'rev'      => true,
                    'name'     => true,
                    'target'   => true,
                    'download' => array(
                        'valueless' => 'y',
                    ),
                ),
                'span'   => array(
                    'align' => true,
                ),
                'sub'    => array(),
                'sup'    => array(),
                'em'     => array(),
                'i'      => array(),
                'var'    => array(),
                'cite'   => array(),
                'b'      => array(),
                'strong' => array(),
                'small'  => array(),
                'bdo'    => array(),
                'u'      => array(),
            );
        }

        $tags = array_map(function ($value) {
            $global_attributes = array(
                'aria-describedby' => true,
                'aria-details'     => true,
                'aria-label'       => true,
                'aria-labelledby'  => true,
                'aria-live'        => true,
                'aria-hidden'      => true,
                'contenteditable'  => true,
                'class'            => true,
                'data-*'           => true,
                'dir'              => true,
                'id'               => true,
                'lang'             => true,
                'style'            => true,
                //'script'     => true,
                'tabindex'         => true,
                'title'            => true,
                'role'             => true,
                'xml:lang'         => true,
            );

            return array_merge($value, $global_attributes);
        }, $tags);

        return $tags;
    }

    static function allowed_css() {
        add_filter('safe_style_css', function ($styles) {
            //SVG -> symbol tag code
            $styles[] = 'enable-background';

            return $styles;
        });
    }
}