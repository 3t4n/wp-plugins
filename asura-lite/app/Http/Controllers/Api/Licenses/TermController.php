<?php

namespace Asura\Http\Controllers\Api\Licenses;

use Asura\Http\Controllers\Api\Controller;
use Asura\Models\License;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class TermController extends Controller {
    public function index( Request $request ) {

        $this->validate( $request, [
            'hash' => 'required|string|exists:\Asura\Models\License,hash',
        ] );

        $license = License::where( 'hash', $request->hash )->with( [
            'terms' => function ( $query ) {
                $query->active();
            },
        ] )->first();

        if ( ( bool ) $license->status === false ) {
            return new JsonResponse( [ 'disabled' => 'Your license is disabled.' ], 403 );
        }

        if ( $license->expire_at && Carbon::parse( $license->expire_at )->lessThan( Carbon::today() ) ) {
            return new JsonResponse( [ 'expired' => 'Your license is expired.' ], 422 );
        }

        return JsonResource::collection( collect( $license->terms->makeHidden( [
            'pivot',
            'term_id',
            'term_group'
        ] ) ) );
    }
}
