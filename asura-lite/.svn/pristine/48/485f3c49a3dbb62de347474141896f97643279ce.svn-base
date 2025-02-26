<?php

namespace Asura\Http\Controllers\Api\Licenses;

use Asura\Http\Controllers\Api\Controller;
use Asura\Models\License;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;

class DomainController extends Controller {
    public function update( Request $request, $license ) {
        if ( $remote = $this->isRemote( $request ) ) {
            $request->merge( [ 'license' => $license ] );

            return self::remoteRequest( 'put', $request, 'api.licenses.domains.update', $remote );
        } else {
            $request->merge( [ 'id' => $license ] );
            $this->validate( $request, [
                'id'      => 'exists:\Asura\Models\License,id',
                'domains' => 'nullable|array',
            ] );

            $license = License::find( $license );

            $savedDomains = [];
            if ( ! empty( $request->domains ) ) {
                $savedDomains = Arr::pluck( $request->domains, 'domain' );
                foreach ( $request->domains as $domain ) {
                    $license->domains()->updateOrCreate( [
                        'domain' => $domain['domain'],
                    ], [
                        'status' => (boolean) $domain['status'],
                    ] );
                }
            }

            foreach ( $license->domains as $domain ) {
                if ( ! in_array( $domain->domain, $savedDomains ) ) {
                    $license->domains()->where( 'domain', $domain->domain )->delete();
                }
            }

            $license->refresh();

            return JsonResource::collection( collect( [ $license ] ) );
        }
    }

    public function register( Request $request ) {
        $this->validate( $request, [
            'key'    => 'required|string|exists:\Asura\Models\License,key',
            'domain' => [
                'required',
                'string',
                function ( $attribute, $value, $fail ) use ( $request ) {
                    $host = wp_parse_url( $value, PHP_URL_HOST );
                    if ( $host === null ) {
                        return $fail( $attribute . ' should be a valid domain-host.' );
                    }
                },
            ],
        ] );

        $license = License::where( 'key', $request->key )->first();

        if ( ( bool ) $license->status === false ) {
            return new JsonResponse( [ 'disabled' => 'Your license is disabled.' ], 422 );
        }

        if ( $license->expire_at && Carbon::parse( $license->expire_at )->lessThan( Carbon::today() ) ) {
            return new JsonResponse( [ 'expired' => 'Your license is expired.' ], 422 );
        }

        $host = wp_parse_url( $request->domain, PHP_URL_HOST );

        $exist = $license->domains()->where( 'domain', $host )->first();

        if ( ! $exist ) {
            if ( $license->max_activated && ( clone $license )->domains()->count() >= $license->max_activated ) {
                return new JsonResponse( [ 'limit_reached' => 'Max activation reached.' ], 422 );
            }

            $license->domains()->create( [
                'domain' => $host,
                'status' => true,
            ] );

            $license->refresh();
        } else {
            if ( ( bool ) $exist->status === false ) {
                return new JsonResponse( [ 'disabled' => 'Your site is disabled for this license.' ], 422 );
            }
        }

        return JsonResource::collection( collect( [
            $license->makeHidden( [
                'id',
                'user_id',
                'created_at',
                'updated_at'
            ] )
        ] ) );
    }

    public function deregister( Request $request ) {
        $this->validate( $request, [
            'key'    => 'required|string|exists:\Asura\Models\License,key',
            'domain' => [
                'required',
                'string',
                function ( $attribute, $value, $fail ) use ( $request ) {
                    $host = wp_parse_url( $value, PHP_URL_HOST );
                    if ( $host === null ) {
                        return $fail( $attribute . ' should be a valid domain-host.' );
                    }
                },
            ],
        ] );

        $license = License::where( 'key', $request->key )->first();

        if ( ( bool ) $license->status === false ) {
            return new JsonResponse( [ 'disabled' => 'Your license is disabled.' ], 403 );
        }

        if ( $license->expire_at && Carbon::parse( $license->expire_at )->lessThan( Carbon::today() ) ) {
            return new JsonResponse( [ 'expired' => 'Your license is expired.' ], 422 );
        }

        $host = wp_parse_url( $request->domain, PHP_URL_HOST );

        $exist = $license->domains()->where( 'domain', $host )->first();

        if ( ! $exist ) {
            return new JsonResponse( [ 'not_exisit' => 'Your site have not registered' ], 422 );

        } else {
            if ( ( bool ) $exist->status === false ) {
                return new JsonResponse( [ 'disabled' => 'Your site is disabled for this license.' ], 422 );
            }

            $exist->delete();
        }

        return JsonResource::collection( collect( [
            $license->makeHidden( [
                'id',
                'hash',
                'user_id',
                'created_at',
                'updated_at'
            ] )
        ] ) );
    }
}
