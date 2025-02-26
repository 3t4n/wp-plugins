<?php

require_once AEC_PATH . 'includes/kiosque-component/products/class-kiosque-div.php';
require_once AEC_PATH . 'includes/kiosque-component/products/class-kiosque-ngx.php';

class KiosqueElementFactory
{
    public static function createKiosqueElement(string $type): KiosqueElement
    {
        switch ($type) {
            case 'div':
                $kiosqueElement = new KiosqueDiv();
                break;
            case 'ngx':
                $kiosqueElement = new KiosqueNgx();
                break;
            default:
                throw new InvalidArgumentException("Invalid Kiosque element type $type");
        }

        return $kiosqueElement;
    }
}
