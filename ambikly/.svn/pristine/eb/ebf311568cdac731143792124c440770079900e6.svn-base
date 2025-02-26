<?php

namespace Ambikly;
class Message
{
    public static function Error($message, $redirect = '')
    {
        return [
            'message' => $message,
            'type' => 'error',
            'redirect' => $redirect,
        ];
    }

    public static function ValidationError($message, $validationErrors = [])
    {
        return [
            'message' => $message,
            'type' => 'error',
            'validationErrors' => $validationErrors
        ];
    }

    public static function Success($message, $redirect = '')
    {
        return [
            'message' => $message,
            'type' => 'success',
            'redirect' => $redirect
        ];
    }
}