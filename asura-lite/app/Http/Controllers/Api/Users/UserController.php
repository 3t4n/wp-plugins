<?php

namespace Asura\Http\Controllers\Api\Users;

use Asura\Http\Controllers\Api\Controller;
use Asura\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class UserController extends Controller {
    public function index( Request $request ) {
        if ( $remote = $this->isRemote( $request ) ) {
            return self::remoteRequest( 'get', $request, 'api.users.index', $remote );
        } else {
            $user = User::Where( 'ID', 'like', "%{$request->search}%" )
                        ->orWhere( 'user_login', 'like', "%{$request->search}%" )
                        ->orWhere( 'user_email', 'like', "%{$request->search}%" )
                        ->orWhere( 'user_nicename', 'like', "%{$request->search}%" )
                        ->orWhere( 'display_name', 'like', "%{$request->search}%" )
                        ->paginate( $request->per_page && is_numeric( $request->per_page ) ? $request->per_page : 20 );

            return JsonResource::collection( $user );
        }
    }

    public function find( Request $request ) {
        if ( $remote = $this->isRemote( $request ) ) {
            return self::remoteRequest( 'get', $request, 'api.users.find', $remote );
        } else {
            $this->validate( $request, [
                'column' => 'required|string|in:ID,user_login,user_email',
                'search' => 'required|string',
            ] );

            $user = User::where( $request->column, $request->search )->first();

            return response()->json( $user, $user ? 200 : 404 );
        }
    }

    public function show( Request $request, $user ) {
        if ( $remote = $this->isRemote( $request ) ) {
            $request->merge( [ 'user' => $user ] );

            return self::remoteRequest( 'get', $request, 'api.users.show', $remote );
        } else {
            $request->merge( [ 'id' => $user ] );
            $this->validate( $request, [
                'id' => 'required|exists:\Asura\Models\User,ID',
            ] );
            $user = User::find( $user );

            return response()->json( $user, $user ? 200 : 404 );
        }
    }

    public function store( Request $request ) {
        if ( $remote = $this->isRemote( $request ) ) {
            return self::remoteRequest( 'post', $request, 'api.users.store', $remote );
        } else {
            $this->validate( $request, [
                'user_login'    => 'required|string|unique:App\Models\User,user_login',
                'user_email'    => 'required|string|unique:App\Models\User,user_email',
                'user_nicename' => 'nullable|string',
                'display_name'  => 'nullable|string',
                'user_url'      => 'nullable|string',
                'user_status'   => 'required|numeric',
            ] );

            $userId = wp_insert_user( [
                'user_login'    => $request->user_login,
                'user_email'    => $request->user_email,
                'user_status'   => $request->user_status,
                'user_pass'     => Str::random( 10 ),
                'user_nicename' => $request->user_nicename ?: '',
                'display_name'  => $request->display_name ?: '',
                'user_url'      => $request->user_url ?: 'https://thelostasura.com',
            ] );

            if ( ! is_wp_error( $userId ) ) {
                return response()->json( [ 'wp_error' => $userId->get_error_message() ], 422 );
            }

            wp_new_user_notification( $userId, null, 'both' );

            return response()->json( User::find( $userId ) );
        }
    }
}
