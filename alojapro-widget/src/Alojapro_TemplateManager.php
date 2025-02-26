<?php

/**
 * Class Alojapro_TemplateManager
 * Source: https://gist.github.com/compermisos/1356936/a38cd13476a3a7b8f461b0474360546fc6842182
 */
class Alojapro_TemplateManager {
    /**
     * a Simple PHP Template Motor
     * Perfect for "embended code"
     * remplase the tag whith form [@tag] by value
     * @package Alojapro_TemplateManager
     */

    /**
     * the absolute name of the template
     * @access private
     * @var string
     */
    protected $file;
    /**
     * save the relations of "tags/values"
     * @access private
     * @var array
     */
    protected $values = array();
    /**
     * Constructor sets up {@link $file}
     */
    public function __construct($file) {
        $this->file = $file;
    }
    /**
     * set in {@link $values} the relations "keys/values"
     * @param string|integer $key the key to declare (remplaced in template a [@tag]
     * @param string|integer $value the value to set
     */
    public function set($key, $value) {
        $this->values[$key] = $value;
    }
    /**
     * Take {@link $values} data
     * and change the tags in {@link $file}
     * and return the result
     * @return string
     */
    public function output() {
        if (!file_exists($this->file)) {
            return 'Error loading template file (' .$this->file. ').' . "\r\n";
        }
        $output = file_get_contents($this->file);
        foreach ($this->values as $key => $value) {
            $tag = '[@' . $key . ']';
            $output = str_replace($tag, $value, $output);
        }
        return $output;
    }
}