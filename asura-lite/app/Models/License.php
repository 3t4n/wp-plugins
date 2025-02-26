<?php

namespace Asura\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class License extends Model {
    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'mysql';

    protected $hidden = [ 'tail', 'source', ];

    public function user() {
        return $this->belongsTo( User::class, 'user_id' );
    }

    public function orders() {
        return $this->hasMany( LicenseOrder::class );
    }

    public function delete() {
        $this->terms()->detach();
        $this->domains()->delete();

        parent::delete();
    }

    public function terms() {
        return $this->belongsToMany(
            Term::class,
            'asura_license_terms',
            'license_id',
            'term_id'
        )
                    ->withPivot(
                        'status',
                    );
    }

    public function domains() {
        return $this->hasMany( Domain::class );
    }

    public function resetHash() {
        $this->tail = Str::random( 20 );
        $this->hash = Hash::make( "{$this->key}{$this->tail}" );
    }

    public function scopeActive( $query ) {
        return $query->where( 'status', true );
    }

    public function scopeInactive( $query ) {
        return $query->where( 'status', false );
    }
}
