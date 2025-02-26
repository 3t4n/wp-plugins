<?php

namespace Asura\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Api extends Model {
    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'mysql';

    public function user() {
        return $this->belongsTo( User::class, 'user_id' );
    }

    public function scopeOfKey( $query, $val ) {
        return $query->where( 'key', $val );
    }

    public function scopeOfSecret( $query, $val ) {
        return $query->where( 'secret', $val );
    }

    public function scopeActive( $query ) {
        return $query->where( 'status', true );
    }

    public function scopeInactive( $query ) {
        return $query->where( 'status', false );
    }

    public function delete() {
        $this->routes()->delete();

        parent::delete();
    }

    public function routes() {
        return $this->hasMany( Route::class );
    }

    public function resetKeySecret() {
        $this->key    = Str::random( 15 );
        $this->secret = Str::random( 32 );
    }
}
