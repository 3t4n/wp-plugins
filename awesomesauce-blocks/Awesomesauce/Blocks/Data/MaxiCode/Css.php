<?php

namespace Awesomesauce\Blocks\Data\MaxiCode;

use Awesomesauce\Admin\BlockSettings;

if (!defined('ABSPATH')) {
    exit;
}

class Css extends BlockSettings {

    private $code_size;

    public function init() {
        $this->code_size = $this->script_setting('code_size', 'MaxiCode size', 'size_inputs', array(
            'desktop' => array(
                '350',
                'px'
            ),
            'tablet'  => array(
                '300',
                'px'
            ),
            'mobile'  => array(
                '200',
                'px'
            )
        ), array('px'));

        $this->admin_preview_manager('device_style', 'code_size', '.awesomesauce_canvas', 'width', 'block');
    }

    public function getCss() {
        $css['desktop'] = array(
            '.awesomesauce_wrapper' => array(
                array(
                    '.awesomesauce_canvas' => array(
                        'width'  => $this->code_size['desktop'],
                    ),
                )
            )
        );

        $css['tablet'] = array(
            '.awesomesauce_wrapper' => array(
                array(
                    '.awesomesauce_canvas' => array(
                        'width' => $this->code_size['tablet'],
                    ),
                )
            )
        );

        $css['mobile'] = array(
            '.awesomesauce_wrapper' => array(
                array(
                    '.awesomesauce_canvas' => array(
                        'width' => $this->code_size['mobile'],
                    ),
                )
            )
        );

        return $css;
    }
}