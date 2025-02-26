<?php

namespace NativeRent\Common\SDK\State;

interface StateInterface {
	/**
	 * Getting options from the Native Rent API.
	 *
	 * @api GET /options
	 *
	 * @param  GetOptionsPayload $payload
	 *
	 * @return GetOptionsResponse
	 */
	public function getOptions( GetOptionsPayload $payload );

	/**
	 * Sending status to the Native Rent.
	 *
	 * @api POST /updateState
	 *
	 * @param  SendStatePayload $payload
	 *
	 * @return bool
	 */
	public function sendState( SendStatePayload $payload );

	/**
	 * Sending actual integration status to the Native Rent.
	 *
	 * @param  SendStatusPayload $payload
	 *
	 * @return bool
	 */
	public function sendStatus( SendStatusPayload $payload );
}
