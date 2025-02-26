<?php

namespace Asura\Models;

use Illuminate\Database\Eloquent\Model;

class Generator extends Model {
    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'mysql';

    public function orders() {
        return $this->hasMany( LicenseOrder::class );
    }

    public function generateLicense() {
        $licenseString = '';

        for ( $i = 0; $i < $this->chunks; $i ++ ) {
            for ( $j = 0; $j < $this->chunk_length; $j ++ ) {
                $licenseString .= $this->charset[ rand( 0, strlen( $this->charset ) - 1 ) ];
            }
            if ( $i < $this->chunks - 1 ) {
                $licenseString .= $this->separator;
            }
        }

        return $this->prefix . $licenseString . $this->suffix;
    }

    public function delete() {
        $this->terms()->detach();

        parent::delete();
    }

    public function terms() {
        return $this->belongsToMany(
            Term::class,
            'asura_generator_terms',
            'generator_id',
            'term_id',
        )
                    ->withPivot(
                        'status',
                    );
    }
}
