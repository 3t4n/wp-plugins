<?php

require_once AEC_PATH . 'includes/kiosque-component/interface/interface-kiosque-element.php';

class KiosqueDiv implements KiosqueElement
{

    public function createHtmlTag(array $attributes): string
    {
        $html = "<div class='kiosque-aec arc-en-ciel'><div";
        foreach ($attributes as $name => $value) {
            switch ($name) {
                case 'selector':
                    break;
                case 'action':
                case 'module':
                    $html .= "\n data-$name='$value'";
                    break;
                case 'class':
                    $html .= "\n class='$value'";
                    break;
                default:
                    $html .= "\n data-param-$name='$value'";
            }
        }
        $html .= '></div></div>';
        return $html;
    }
}
