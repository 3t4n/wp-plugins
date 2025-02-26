<?php

namespace Asura\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model {
    public $timestamps = false;
    protected $primaryKey = 'ID';
    protected $hidden = [
        'user_pass',
        'user_activation_key',
    ];

    protected $prefix;

    public function __construct( array $attributes = [] ) {
        global $wpdb;

        $connections                 = config( 'database.connections' );
        $connections['wp']           = $connections['mysql'];
        $connections['wp']['prefix'] = $wpdb->base_prefix;
        config( [ 'database.connections' => $connections ] );

        $this->connection = 'wp';

        parent::__construct( $attributes );
    }

    public function licenses() {
        return $this->hasMany( License::class );
    }

}
