<?php

namespace DaReactions;

use Exception;
class Api {
    private $baseUrl = 'da/v1/reactions';

    public function __construct() {
    }

    public function allowAll() {
        return true;
    }

    /**
     * @throws Exception
     */
    public function listReactions() {
        return rest_ensure_response( Data::getAllContentReactions() );
    }

    public function getMainReactionForContent( $data ) {
        return rest_ensure_response( Data::getMainReactionForContent( $data['resource_id'], $data['resource_type'] ) );
    }

    public function getReactionsForContent( $data ) {
        return rest_ensure_response( array_map( static function ( $r ) {
            return [
                'ID'         => $r->ID,
                'label'      => $r->label,
                'file_name'  => $r->file_name,
                'created_at' => $r->created_at,
                'color'      => $r->color,
                'active'     => (bool) $r->active,
                'sort_order' => $r->sort_order,
                'total'      => $r->total,
                'percentage' => $r->percentage,
            ];
        }, Data::getReactionsForContent( $data['resource_id'], $data['resource_type'] ) ) );
    }

    /**
     */
    public function getReactionsAndUsersForContent( $data ) {
        return rest_ensure_response( Data::getReactionsAndUsersForContent(
            $data['resource_id'],
            $data['resource_type'],
            ( isset( $data['reaction_id'] ) ? $data['reaction_id'] : 0 ),
            ( isset( $data['page_size'] ) ? $data['page_size'] : 10 ),
            ( isset( $data['page_num'] ) ? $data['page_num'] : 1 )
        ) );
    }

}
