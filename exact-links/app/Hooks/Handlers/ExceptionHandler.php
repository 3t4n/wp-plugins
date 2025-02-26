<?php

namespace ExactLinks\App\Hooks\Handlers;

class ExceptionHandler
{
    protected $handlers = [
        'ExactLinks\Framework\Foundation\ForbiddenException' => 'handleForbiddenException',
        'ExactLinks\Framework\Validator\ValidationException' => 'handleValidationException',
        'ExactLinks\Framework\Foundation\UnAuthorizedException' => 'handleUnAuthorizedException',
        'ExactLinks\Framework\Database\Orm\ModelNotFoundException' => 'handleModelNotFoundException',
    ];

    public function handle($e)
    {
        foreach ($this->handlers as $key => $value) {
            if ($e instanceof $key) {
                return $this->{$value}($e);
            }
        }
    }

    public function handleModelNotFoundException($e)
    {
       wp_send_json_error([
            'message' => $e->getMessage()
        ], $e->getCode() ?: 404);
    }

    public function handleUnAuthorizedException($e)
    {
        wp_send_json_error([
            'message' => $e->getMessage()
        ], $e->getCode() ?: 401);
    }

    public function handleForbiddenException($e)
    {
        wp_send_json_error([
            'message' => $e->getMessage()
        ], $e->getCode() ?: 403);
    }

    public function handleValidationException($e)
    {
        wp_send_json_error([
            'message' => $e->getMessage(),
            'errors' => $e->errors()
        ], $e->getCode() ?: 422);
    }
}
