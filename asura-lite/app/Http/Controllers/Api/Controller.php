<?php

namespace Asura\Http\Controllers\Api;

use Asura\Http\Controllers\Controller as BaseController;
use Asura\Models\Remote;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class Controller extends BaseController {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        //
    }

    public static function remoteRequest( string $method, Request $request, string $name, Remote $remote ) {
        $uri = self::buildRemoteUri( $request, $name );
        $request->merge( [
            'api_key'    => $remote->key,
            'api_secret' => $remote->secret,
        ] );

        $response = Http::timeout( 60 )
                        ->baseUrl( $remote->provider )
                        ->acceptJson()
                        ->{$method}( $uri, $request->except( 'remote' ) );

        return response( $response->body(), $response->status(), $response->headers() );
    }

    protected static function buildRemoteUri( Request $request, $name ) {
        $uri        = app()->router->namedRoutes[ $name ];
        $parameters = $request->except( 'remote' );

        $uri = preg_replace_callback( '/\[([^\]]*)\]$/', function ( $matches ) use ( $uri, &$parameters ) {
            $uri = self::replaceRouteParameters( $matches[1], $parameters );

            return ( $matches[1] == $uri ) ? '' : $uri;
        }, $uri );

        $uri = self::replaceRouteParameters( $uri, $parameters );

        if ( ! empty( $parameters ) ) {
            $uri .= '?' . http_build_query( $parameters );
        }

        return $uri;
    }

    protected static function replaceRouteParameters( $route, &$parameters = [] ) {
        return preg_replace_callback( '/\{(.*?)(:.*?)?(\{[0-9,]+\})?\}/', function ( $m ) use ( &$parameters ) {
            return isset( $parameters[ $m[1] ] ) ? Arr::pull( $parameters, $m[1] ) : $m[0];
        }, $route );
    }

    protected function isRemote( Request $request ) {
        if (
            $request->exists( 'remote' )
            && $request->filled( 'remote' )
            && $request->remote !== 'local'
            && $request->remote !== 'remote'
        ) {
            $remote = Remote::find( $request->remote );

            if ( $remote ) {
                return $remote;
            }
        }

        return false;
    }

}
