<?php

namespace Devurai\AcceptbluePaymentPro\DTOs\AcceptBlueCaptureResponse;

interface ABCaptureResponse
{
    public function getVersion(): string;
    public function getStatus(): string;
    public function getStatusCode(): string;
    public function getErrorMessage(): string;
    public function getErrorCode(): string;
    public function getErrorDetails(): string;
    public function getAuthAmount(): int;
    public function getAuthCode(): string;

}