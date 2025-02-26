<?php

namespace Asura\Models;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model {
    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'mysql';

    protected $fillable = [ 'domain', 'status' ];

    public function license() {
        return $this->belongsTo( License::class );
    }

    public function scopeActive( $query ) {
        return $query->where( 'status', true );
    }

    public function scopeInactive( $query ) {
        return $query->where( 'status', false );
    }
}
