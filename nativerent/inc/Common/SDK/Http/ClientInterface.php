<?php

namespace NativeRent\Common\SDK\Http;

interface ClientInterface {
	/**
	 * Request sending.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function sendRequest( Request $request );

	/**
	 * @param  Request $request
	 *
	 * @return void
	 */
	public function sendAsyncRequest( Request $request );
}
