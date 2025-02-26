<?php

namespace Asura\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class WordPressAdmin {
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     *
     * @return mixed
     */
    public function handle( $request, Closure $next ) {
        if ( ! is_user_logged_in() ) {
            return redirect( wp_login_url( $request->fullUrl() ) );
        }

        if ( ! current_user_can( 'manage_options' ) ) {
            return response( 'Unauthorized.', 401 );
        }

        return $next( $request );
    }
}
