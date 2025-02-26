<?php

/**
 * Description of E2WL_Country
 *
 * @author Andrey
 */
if (!class_exists('E2WL_Country')) {

    class E2WL_Country {

        public function get_countries() {
            $result = json_decode(file_get_contents(E2WL()->plugin_path . 'assets/data/countries.json'), true);
            $result = $result["countries"];
            array_unshift($result, array('c' => '', 'n' => 'N/A'));
            return $result;
        }

    }

}