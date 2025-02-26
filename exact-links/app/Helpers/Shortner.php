<?php

namespace ExactLinks\App\Helpers;

class Shortner
{
    public $dictionary = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

    public function __construct()
    {
        $this->dictionary = str_split($this->dictionary);
    }

    public function getSlug()
    {    
        $settings =  get_option('exactlinks_settings');
        $result = [];
        $base = count($this->dictionary);
        
        for ($i = 0; $i < $settings['slugCharacter']; $i++) {
            $result[] = $this->dictionary[rand(0, $base - 1)];
        }
        
        $result = array_reverse($result);

        return join("", $result);
    }

}