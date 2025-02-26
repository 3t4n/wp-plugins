<?php

class Translator {

    protected $translationArray;

    public function __construct($translationArray = array()) {
        $this->translationArray = $translationArray;
    }

    public function __get($name) {
        $function = 'get' . ucfirst($name);
        return $this->$function();
    }

    /*
     * @returns the translation array in JSON format
     */

    private function getTranslationArray() {
        return json_encode($this->translationArray);
    }

}

?>
