<?php

namespace ExactLinks\App\Models;

class ConversionItems extends Model {

    protected $table = 'exactlinks_conversion_items';

    public function getConversionItems($slug) {

       return $this->where('slug', $slug)->get();
    }
}
