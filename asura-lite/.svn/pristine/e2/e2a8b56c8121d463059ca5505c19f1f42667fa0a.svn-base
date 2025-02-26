<?php

namespace Asura\Models;

use Illuminate\Database\Eloquent\Model;

class Route extends Model {
    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'mysql';

    protected $fillable = [ 'group', 'route', 'status' ];

    public function api() {
        return $this->belongsTo( Api::class );
    }

    public function scopeOfRoute( $query, $val ) {
        return $query->where( 'route', $val );
    }

    public function scopeActive( $query ) {
        return $query->where( 'status', true );
    }

    public function scopeInactive( $query ) {
        return $query->where( 'status', false );
    }
}
