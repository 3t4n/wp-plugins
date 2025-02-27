<?php

namespace WebsiteChatButtonKommoIntegration\UseCase;

if (!defined('ABSPATH')) {
    exit();
}

use KommoFlashFunctionsDb;

class SaveSecretsUseCase
{
    public function handle(string $clientId, string $clientSecret): bool
    {
        $data = [
            'client_id' => $clientId,
            'client_secret' => $clientSecret,
        ];

        return (bool)KommoFlashFunctionsDb::update(
            ['option_value' => wp_json_encode($data)],
            ['option_name' => 'account_sign_secrets'],
        );
    }
}
