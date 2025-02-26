<?php
namespace glamour\other;

class Glamour_Prefixer {
    public static $instance = null;
    private $_prop = '';
    private $_value = '';
    private $_important = '';

    private $_props = array(
        'box-sizing' => array(
            '-webkit-'
        ),
    );

    public static function instance() {
        if ( is_null( self::$instance ) ) {
            self::$instance = new self();
        }
        
		return self::$instance;
    }

    public function prefix_it($prop, $value, $important) {
        $this->_prop = $prop;
        $this->_value = $value;
        $this->_important = $important;

        $return_value = '';

        if($this->is_prop_prefix()){
            $return_value = $this->build_prop_prefix();
        } else if($this->is_value_prefix()){
            if($this->_value == 'flex'){
                $return_value .= $this->_prop . ':-webkit-box' . $this->_important . ';';
                $return_value .= $this->_prop . ': -ms-flexbox' . $this->_important . ';';
                $return_value .= $this->_prop . ': ' . $this->_value . $this->_important . ';';
            } else {
                $return_value = $this->_prop . ': ' . $this->_value . $this->_important . ';';
            }
        } else {
            $return_value = $this->_prop . ': ' . $this->_value . $this->_important . ';';
        }

        return $return_value;
    }

    private function is_value_prefix() {
        if($this->_prop == 'display' && $this->_value == 'flex'){
            return true;
        }

        return false;
    }

    private function is_prop_prefix() {
        if(isset($this->_props[$this->_prop])){
            return true;
        }

        return false;
    }


    private function build_prop_prefix(){
        $return_value = '';

        if(isset($this->_props[$this->_prop]) && !empty($this->_props[$this->_prop])){
            foreach($this->_props[$this->_prop] as $prefix){
                $return_value .= $prefix . $this->_prop . ': ' . $this->_value . $this->_important . ';';
            }
        }

        $return_value .= $this->_prop . ': ' . $this->_value . $this->_important . ';';

        return $return_value;
    }
}