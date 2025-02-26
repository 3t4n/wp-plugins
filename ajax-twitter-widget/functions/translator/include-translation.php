<?php

require_once 'Translator_de.php';
require_once 'Translator_en.php';
require_once 'Translator_fr.php';
require_once 'Translator_it.php';
require_once 'Translator_es.php';

function getTranslationArray($language) {
    switch ($language) {
        case 'en': return new Translator_en();
            break;
        case 'de': return new Translator_de();
            break;
        case 'fr': return new Translator_fr();
            break;
        case 'it': return new Translator_it();
            break;
        case 'es': return new Translator_es();
            break;
        default : return new Translator_en();
    }
}

?>
