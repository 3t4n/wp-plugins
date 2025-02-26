<?php

namespace Asura\Http\Middleware;

use Asura\Models\Api;
use Closure;
use Illuminate\Http\Request;

class Rest {
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     *
     * @return mixed
     */
    public function handle( $request, Closure $next ) {
        $api = Api::ofKey( $request->api_key )->ofSecret( $request->api_secret )->active()->first();

        if ( ! $api ) {
            return response()->json( [ 'permission' => 'Unauthorized.' ], 401 );
        }

        $route = $api->routes()->ofRoute( $request->route()[1]['as'] )->active()->first();

        if ( ! $route ) {
            return response()->json( [ 'permission' => 'Unauthorized.' ], 401 );
        }

        // return $next($request);
        $response = $next( $request );

        return $response->header( 'Content-Length', strlen( $response->getContent() ) );
    }
}
