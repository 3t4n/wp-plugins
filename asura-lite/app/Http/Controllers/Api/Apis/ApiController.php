<?php

namespace Asura\Http\Controllers\Api\Apis;

use Asura\Http\Controllers\Api\Controller;
use Asura\Models\Api;
use Asura\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ApiController extends Controller {
    public function reset( Request $request, $api ) {
        if ( $remote = $this->isRemote( $request ) ) {
            return response()->json( [], 501 );
        } else {
            $request->merge( [ 'id' => $api ] );
            $this->validate( $request, [
                'id' => 'exists:\Asura\Models\Api,id',
            ] );

            $api = Api::find( $api );

            $api->resetKeySecret();
            $api->save();

            return $this->index( $request );
        }
    }

    public function index( Request $request ) {
        if ( $remote = $this->isRemote( $request ) ) {
            return response()->json( [], 501 );
        } else {
            $apis = Api::with( [ 'user', 'routes' ] )
                       ->where( 'id', 'like', "%{$request->search}%" )
                       ->orWhere( 'label', 'like', "%{$request->search}%" )
                       ->paginate( $request->per_page && is_numeric( $request->per_page ) ? $request->per_page : 20 );

            return JsonResource::collection( $apis );
        }
    }

    public function status( Request $request, $api ) {
        if ( $remote = $this->isRemote( $request ) ) {
            return response()->json( [], 501 );
        } else {
            $request->merge( [ 'id' => $api ] );
            $this->validate( $request, [
                'id' => 'exists:\Asura\Models\Api,id',
            ] );

            $api = Api::find( $api );

            $api->status = ! $api->status;
            $api->save();

            return $this->index( $request );
        }
    }

    public function destroy( Request $request, $api ) {
        if ( $remote = $this->isRemote( $request ) ) {
            return response()->json( [], 501 );
        } else {
            $request->merge( [ 'id' => $api ] );
            $this->validate( $request, [
                'id' => 'exists:\Asura\Models\Api,id',
            ] );

            $api = Api::find( $api );

            $api->delete();

            return $this->index( $request );
        }
    }

    public function store( Request $request ) {
        if ( $remote = $this->isRemote( $request ) ) {
            return response()->json( [], 501 );
        } else {
            $this->validate( $request, [
                'label'      => 'required|string',
                'status'     => 'required|boolean',
                'permission' => 'required|in:global,custom',
                'user'       => 'nullable|exists:\Asura\Models\User,ID',
                'routes'     => 'nullable|array',
            ] );

            $api = new Api();

            $api->label      = $request->label;
            $api->status     = (bool) $request->status;
            $api->permission = $request->permission;

            $api->user_id = $request->has( 'user' ) ? User::find( $request->user )->ID : null;

            $api->resetKeySecret();

            $api->save();

            if ( ! empty( $request->routes ) ) {
                foreach ( $request->routes as $route ) {
                    $api->routes()->updateOrCreate( [
                        'route' => $route,
                    ], [
                        'status' => true,
                    ] );
                }
            }

            $api->refresh();

            return JsonResource::collection( collect( [ $api ] ) );
        }
    }

    public function update( Request $request, $api ) {
        if ( $remote = $this->isRemote( $request ) ) {
            return response()->json( [], 501 );
        } else {
            $request->merge( [ 'id' => $api ] );
            $this->validate( $request, [
                'id'         => 'required|exists:\Asura\Models\Api,id',
                'label'      => 'required|string',
                'status'     => 'required|boolean',
                'permission' => 'required|in:global,custom',
                'user'       => 'nullable|exists:\Asura\Models\User,ID',
                'routes'     => 'nullable|array',
            ] );

            $api = Api::find( $api );

            $api->label      = $request->label;
            $api->status     = (bool) $request->status;
            $api->permission = $request->permission;

            $api->user_id = $request->has( 'user' ) ? User::find( $request->user )->ID : null;

            $api->save();

            $savedRoutes = [];
            if ( ! empty( $request->routes ) ) {
                $savedRoutes = $request->routes;
                foreach ( $request->routes as $route ) {
                    $api->routes()->updateOrCreate( [
                        'route' => $route,
                    ], [
                        'status' => true,
                    ] );
                }
            }

            foreach ( $api->routes as $route ) {
                if ( ! in_array( $route->route, $savedRoutes ) ) {
                    $api->routes()->where( 'route', $route->route )->delete();
                }
            }

            $api->refresh();

            return JsonResource::collection( collect( [ $api ] ) );
        }
    }
}
