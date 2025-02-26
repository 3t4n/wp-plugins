<?php

/* taken from: http://www.craftitonline.com/2011/10/closured-iterator-the-secret-while-twig-tag/ */

class APBridge_WhileIterator implements Iterator {
    public function __construct($valid, $current) {
        $this->validClosure = $valid;
        $this->currentClosure = $current;
    }
    public function valid() {
        return call_user_func($this->validClosure);
    }
    public function current() {
        return call_user_func($this->currentClosure);
    }
    public function next() {}
    public function rewind() {}
    public function key() {}
}
