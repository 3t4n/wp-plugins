<?php

if ($apTwigBridge) {
    $twigBridge = new APBridge_Twig();
    echo $twigBridge->render($apTwigBridge->getPageType());
}
