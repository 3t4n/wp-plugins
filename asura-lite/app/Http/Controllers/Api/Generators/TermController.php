<?php

namespace Asura\Http\Controllers\Api\Generators;

use Asura\Http\Controllers\Api\Controller;
use Asura\Models\Taxonomy;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TermController extends Controller {
    public function index( Request $request ) {
        if ( $remote = $this->isRemote( $request ) ) {
            return self::remoteRequest( 'get', $request, 'api.generators.terms.index', $remote );
        } else {
            $terms = Taxonomy::designset()->get();

            return JsonResource::collection( $terms );
        }
    }
}

