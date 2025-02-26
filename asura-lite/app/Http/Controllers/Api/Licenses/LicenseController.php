<?php

namespace Asura\Http\Controllers\Api\Licenses;

use Asura\Http\Controllers\Api\Controller;
use Asura\Models\Domain;
use Asura\Models\License;
use Asura\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LicenseController extends Controller {
    public function status( Request $request, $license ) {
        if ( $remote = $this->isRemote( $request ) ) {
            $request->merge( [ 'license' => $license ] );

            return self::remoteRequest( 'patch', $request, 'api.licenses.status', $remote );
        } else {
            $request->merge( [ 'id' => $license ] );
            $this->validate( $request, [
                'id'     => 'exists:\Asura\Models\License,id',
                'status' => 'nullable|boolean',
            ] );

            $license         = License::find( $license );
            $license->status = $request->has( $request->status ) ? (bool) $request->status : ! $license->status;
            $license->save();

            return $this->index( $request );
        }
    }

    public function index( Request $request ) {
        if ( $remote = $this->isRemote( $request ) ) {
            return self::remoteRequest( 'get', $request, 'api.licenses.index', $remote );
        } else {
            $generator = License::with( [ 'terms', 'domains', 'user' ] )
                                ->where( 'id', 'like', "%{$request->search}%" )
                                ->orWhere( 'key', 'like', "%{$request->search}%" )
                                ->orderBy( 'id', 'desc' )
                                ->paginate( $request->per_page && is_numeric( $request->per_page ) ? $request->per_page : 20 );

            return JsonResource::collection( $generator );
        }
    }

    public function destroy( Request $request, $license ) {
        if ( $remote = $this->isRemote( $request ) ) {
            $request->merge( [ 'license' => $license ] );

            return self::remoteRequest( 'delete', $request, 'api.licenses.destroy', $remote );
        } else {
            $request->merge( [ 'id' => $license ] );
            $this->validate( $request, [
                'id' => 'exists:\Asura\Models\License,id',
            ] );

            $license = License::find( $license );

            $license->delete();

            return $this->index( $request );
        }
    }

    public function store( Request $request ) {
        if ( $remote = $this->isRemote( $request ) ) {
            return self::remoteRequest( 'post', $request, 'api.licenses.store', $remote );
        } else {
            $this->validate( $request, [
                'key'           => 'required|string|unique:\Asura\Models\License,key',
                'status'        => 'required|boolean',
                'user'          => 'nullable|exists:\Asura\Models\User,ID',
                'max_activated' => 'nullable|numeric|min:1',
                'expire_at'     => 'nullable|date',
                'terms'         => 'nullable|array',
            ] );

            $license = new License();

            $license->key           = $request->key;
            $license->user_id       = $request->has( 'user' ) ? User::find( $request->user )->ID : null;
            $license->status        = (bool) $request->status;
            $license->max_activated = $request->filled( 'max_activated' ) ? $request->max_activated : null;
            $license->expire_at     = $request->filled( 'expire_at' ) ? $request->expire_at : null;
            $license->source        = "import:manual";
            $license->resetHash();

            $license->save();

            if ( $request->has( 'terms' ) ) {
                $termToSync = [];
                foreach ( $request->terms as $term ) {
                    $termToSync[ $term ] = [ 'status' => true ];
                }
                $license->terms()->sync( $termToSync );
            }

            $license->refresh();

            return JsonResource::collection( collect( [ $license ] ) );
        }
    }

    public function update( Request $request, $license ) {
        if ( $remote = $this->isRemote( $request ) ) {
            $request->merge( [ 'license' => $license ] );

            return self::remoteRequest( 'put', $request, 'api.licenses.update', $remote );
        } else {
            $request->merge( [ 'id' => $license ] );
            $this->validate( $request, [
                'id'            => 'exists:\Asura\Models\License,id',
                'key'           => "required|string|unique:\Asura\Models\License,key,{$license}",
                'status'        => 'required|boolean',
                'user'          => 'nullable|exists:\Asura\Models\User,ID',
                'max_activated' => 'nullable|numeric|min:1',
                'expire_at'     => 'nullable|date',
                'terms'         => 'nullable|array',
            ] );

            $license = License::find( $license );

            $license->key           = $request->key;
            $license->user_id       = $request->has( 'user' ) ? User::find( $request->user )->ID : null;
            $license->status        = (bool) $request->status;
            $license->max_activated = $request->filled( 'max_activated' ) ? $request->max_activated : null;
            $license->expire_at     = $request->filled( 'expire_at' ) ? $request->expire_at : null;

            if ( $license->isDirty( 'key' ) ) {
                $license->resetHash();
            }

            $license->save();

            if ( $request->has( 'terms' ) ) {
                $termToSync = [];
                foreach ( $request->terms as $term ) {
                    $termToSync[ $term ] = [ 'status' => true ];
                }
                $license->terms()->sync( $termToSync );
            }

            $license->refresh();

            return JsonResource::collection( collect( [ $license ] ) );
        }
    }

    public function domain( Request $request, $license ) {
        if ( $remote = $this->isRemote( $request ) ) {
            return response()->json( [], 501 );
        } else {
            $request->merge( [ 'id' => $license ] );
            $this->validate( $request, [
                'id'      => 'required|exists:\Asura\Models\License,id',
                'domains' => 'nullable|array',
            ] );

            $license = License::find( $license );

            foreach ( $license->domains as $domain ) {
                if ( $domain->status !== false ) {
                    Domain::find( $domain->id )->delete();
                }
            }

            if ( ! empty( $request->domains ) ) {
                foreach ( $request->domains as $domain ) {
                    $license->domains()->updateOrCreate( [
                        'domain' => $domain,
                    ], [
                        'status' => true,
                    ] );
                }
            }

            $license->refresh();

            return JsonResource::collection( $license );
        }
    }


    public function show( Request $request, $license ) {
        if ( $remote = $this->isRemote( $request ) ) {
            $request->merge( [ 'license' => $license ] );

            return self::remoteRequest( 'get', $request, 'api.licenses.show', $remote );
        } else {
            $request->merge( [ 'id' => $license ] );
            $this->validate( $request, [
                'id' => 'required|exists:\Asura\Models\License,ID',
            ] );
            $license = License::with( [ 'terms', 'domains', 'user' ] )->find( $license );

            return response()->json( $license, $license ? 200 : 404 );
        }
    }

}
