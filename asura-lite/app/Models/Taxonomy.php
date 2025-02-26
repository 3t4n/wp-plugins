<?php

namespace Asura\Models;

use Illuminate\Database\Eloquent\Model;

class Taxonomy extends Model {
    public $timestamps = false;
    protected $table = 'term_taxonomy';
    protected $primaryKey = 'term_taxonomy_id';
    protected $with = [ 'term' ];

    public function __construct( array $attributes = [] ) {
        global $wpdb;

        $connections                 = config( 'database.connections' );
        $connections['wp']           = $connections['mysql'];
        $connections['wp']['prefix'] = $wpdb->prefix;
        config( [ 'database.connections' => $connections ] );

        $this->connection = 'wp';

        parent::__construct( $attributes );
    }

    public function term() {
        return $this->belongsTo( Term::class, 'term_id' );
    }

    public function scopeDesignset( $query ) {
        return $query->where( 'taxonomy', 'designset' );
    }

}
