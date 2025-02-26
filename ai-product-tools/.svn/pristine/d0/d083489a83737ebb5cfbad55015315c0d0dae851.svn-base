<?php

namespace AIPT\Api;

interface AIClientInterface {
    public function generate_description(string $system_prompt, string $user_prompt, string $model = '', ?int $maximum_length = null): string;
    public static function validate_api_key(string $api_key): bool;
    public function get_available_models(): array;
} 