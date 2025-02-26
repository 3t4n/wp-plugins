<?php
require_once AEC_PATH . 'includes/kiosque-component/factory/class-kiosque-element-factory.php';
require_once AEC_PATH . 'includes/kiosque-component/class-kiosque-component.php';
require_once AEC_PATH . 'includes/kiosque-options.php';

class KiosqueComponentLoader
{
    function getKiosqueComponentLoader(): ?KiosqueComponent
    {
        static $loader = null;
        if ($loader === null) {
            $factory = KiosqueElementFactory::createKiosqueElement(KiosqueElementType);
            $loader = new KiosqueComponent($factory);
        }
        
        return $loader;
    }
}
