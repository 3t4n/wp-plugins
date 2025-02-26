<?php

namespace Asura\Models;

use Illuminate\Database\Eloquent\Model;

class LicenseOrder extends Model {
    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'mysql';

    public function license() {
        return $this->belongsTo( License::class );
    }

    public function generator() {
        return $this->belongsTo( Generator::class );
    }

    public function remote() {
        return $this->belongsTo( Remote::class );
    }

    public function scopeOfVendor( $query, $val ) {
        return $query->where( 'vendor', $val );
    }

    public function scopeOfOrder( $query, $val ) {
        return $query->where( 'order_id', $val );
    }

    public function scopeOfProduct( $query, $val ) {
        return $query->where( 'product_id', $val );
    }
}
