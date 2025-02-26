<?php

require_once AEC_PATH . 'includes/kiosque-component/interface/interface-kiosque-element.php';

class KiosqueNgx implements KiosqueElement
{
    public function createHtmlTag(array $attributes): string
    {
        $html = "<div class='kiosque-aec arc-en-ciel'><ngx-element";
        foreach ($attributes as $name => $value) {
            switch ($name) {
                case 'action':
                case 'module':
                    break;
                case 'selector':
                    $html .= "\n $name='$value'";
                    break;
                case 'class':
                    $html .= "\n class='$value'";
                    break;
                default:
                    $html .= "\n data-$name='$value'";
            }
        }
        $html .= "></ngx-element></div>";
        return $html;
    }
}
