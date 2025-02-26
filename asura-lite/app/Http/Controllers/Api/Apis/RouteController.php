<?php

namespace Asura\Http\Controllers\Api\Apis;

use Asura\Http\Controllers\Api\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class RouteController extends Controller {
    public function index( Request $request ) {
        if ( $remote = $this->isRemote( $request ) ) {
            return response()->json( [], 501 );
        } else {
            $routes = app()->router->getRoutes();
            $ziggy  = [];
            foreach ( $routes as $route ) {
                if ( ! empty( $route['action']['as'] ) && Str::startsWith( $route['action']['as'], 'api.' ) ) {
                    $ziggy[] = [
                        'id'     => $route['action']['as'],
                        'method' => $route['method'],
                        'uri'    => $route['uri']
                    ];
                }
            }

            return JsonResource::collection( $ziggy );
        }
    }
}

