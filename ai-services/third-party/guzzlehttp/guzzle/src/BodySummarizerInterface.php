<?php

namespace Felix_Arntz\AI_Services_Dependencies\GuzzleHttp;

use Felix_Arntz\AI_Services_Dependencies\Psr\Http\Message\MessageInterface;
interface BodySummarizerInterface
{
    /**
     * Returns a summarized message body.
     */
    public function summarize(MessageInterface $message) : ?string;
}
