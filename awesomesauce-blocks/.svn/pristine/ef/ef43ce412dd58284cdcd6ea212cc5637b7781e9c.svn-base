<?php

namespace Awesomesauce\Blocks\Data\QrCode;

use Awesomesauce\Admin\BlockSettings;

if (!defined('ABSPATH')) {
    exit;
}

class Css extends BlockSettings {

    private $code_size;

    public function init() {
        $this->code_size = $this->script_setting('code_size', 'QR code size', 'size_inputs', array(
            'desktop' => array(
                '300',
                'px'
            ),
            'tablet'  => array(
                '200',
                'px'
            ),
            'mobile'  => array(
                '150',
                'px'
            )
        ), array('px'));

        $this->admin_preview_manager('device_style', 'code_size', '.awesomesauce_code', 'width', 'block');
    }

    public function getCss() {
        $css['desktop'] = array(
            '.awesomesauce_wrapper' => array(
                array(
                    '.awesomesauce_code' => array(
                        'width' => $this->code_size['desktop'],
                        array(
                            '.awesomesauce_code_img' => array(
                                'width' => '100%'
                            )
                        )
                    ),
                )
            )
        );

        $css['tablet'] = array(
            '.awesomesauce_wrapper' => array(
                array(
                    '.awesomesauce_code' => array(
                        'width' => $this->code_size['tablet'],
                    ),
                )
            )
        );

        $css['mobile'] = array(
            '.awesomesauce_wrapper' => array(
                array(
                    '.awesomesauce_code' => array(
                        'width' => $this->code_size['mobile'],
                    ),
                )
            )
        );

        return $css;
    }
}