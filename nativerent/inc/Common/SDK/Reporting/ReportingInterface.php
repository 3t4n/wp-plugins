<?php

namespace NativeRent\Common\SDK\Reporting;

interface ReportingInterface {

	/**
	 * Sending a bug report.
	 *
	 * @param SendIssuePayload $payload
	 *
	 * @return void
	 */
	public function sendIssue( SendIssuePayload $payload );
}
