<?php

namespace Asura\Models;

use Illuminate\Database\Eloquent\Model;

class Term extends Model {
    public $timestamps = false;
    protected $primaryKey = 'term_id';

    public function __construct( array $attributes = [] ) {
        global $wpdb;

        $connections                 = config( 'database.connections' );
        $connections['wp']           = $connections['mysql'];
        $connections['wp']['prefix'] = $wpdb->prefix;
        config( [ 'database.connections' => $connections ] );

        $this->connection = 'wp';

        parent::__construct( $attributes );
    }

    public function taxonomy() {
        return $this->hasOne( Taxonomy::class, 'term_id' );
    }

    public function licenses() {
        return $this->belongsToMany( License::class )
                    ->withPivot(
                        'status',
                    )
                    ->withTimestamps();
    }

    public function generators() {
        return $this->belongsToMany( Generator::class )
                    ->withPivot(
                        'status',
                    )
                    ->withTimestamps();
    }

    public function scopeActive( $query ) {
        return $query->where( 'status', true );
    }
}
