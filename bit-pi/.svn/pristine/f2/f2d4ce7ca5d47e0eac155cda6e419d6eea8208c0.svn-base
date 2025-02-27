<?php

namespace BitApps\Pi\src\Authorization;

use BitApps\Pi\src\Authorization\ApiKey\ApiKeyAuthorization;
use BitApps\Pi\src\Authorization\Basic\BasicAuthorization;
use BitApps\Pi\src\Authorization\Bearer\BearerTokenAuthorization;
use BitApps\Pi\src\Authorization\OAuth2\OAuth2Authorization;
use BitApps\Pi\src\Flow\NodeExecutor;
use Exception;

class AuthorizationFactory
{
    public const AUTHORIZATION_TYPES = [
        'BASIC_AUTH'   => 'basic_auth',
        'API_KEY'      => 'api_key',
        'BEARER_TOKEN' => 'bearer_token',
        'OAUTH2'       => 'oauth2',
        'CUSTOM'       => 'custom',
    ];

    /**
     * Retrieves the appropriate authorization handler based on the specified auth type .
     *
     * This method selects and instantiates the correct authorization handler class depending on
     * the provided authorization type. If the type is 'CUSTOM', it attempts to locate a custom
     * authorization class based on the provided app slug.
     *
     * @param string $type         The type of authorization. Must match one of the keys in `AuthorizationFactory::AUTHORIZATION_TYPES`.
     * @param int    $connectionId The ID of the connection used for the get connection config data.
     * @param string $appSlug      (Optional) The application slug, required only for custom authorization types.
     *
     * @throws Exception Throws an exception if the authorization type is invalid or if the custom authorization class is not found.
     *
     * @return object An instance of the appropriate authorization handler.
     */
    public static function getAuthorizationHandler($type, $connectionId, $appSlug = '')
    {
        switch ($type) {
            case AuthorizationFactory::AUTHORIZATION_TYPES['BASIC_AUTH']:
                return new BasicAuthorization($connectionId);

            case AuthorizationFactory::AUTHORIZATION_TYPES['API_KEY']:
                return new ApiKeyAuthorization($connectionId);

            case AuthorizationFactory::AUTHORIZATION_TYPES['BEARER_TOKEN']:
                return new BearerTokenAuthorization($connectionId);

            case AuthorizationFactory::AUTHORIZATION_TYPES['OAUTH2']:
                return new OAuth2Authorization($connectionId);

            case AuthorizationFactory::AUTHORIZATION_TYPES['CUSTOM']:
                $class = self::authorizationClassExists($appSlug);

                if ($class) {
                    return new $class($connectionId);
                }

                throw new Exception('Authorization class not found');

            default:
                throw new Exception('Invalid authorization type');
        }
    }

    /**
     * Checks if a custom authorization class exists for the specified app slug.
     *
     * This method searches for a custom authorization class in both the free and pro plugin namespaces
     * based on the app slug provided. The app slug is converted to PascalCase before searching.
     *
     * @param string $appSlug The application slug to look for, in lower-case or snake-case format.
     *
     * @return string|false Returns the fully qualified class name if the class exists, or `false` if no class is found.
     */
    public static function authorizationClassExists($appSlug)
    {
        $appSlug = ucfirst($appSlug);

        $freePluginAuthorizationClass = NodeExecutor::BASE_INTEGRATION_NAMESPACE . "{$appSlug}\\{$appSlug}Authorization";

        if (class_exists($freePluginAuthorizationClass)) {
            return $freePluginAuthorizationClass;
        }

        $proPluginAuthorizationClass = NodeExecutor::BASE_INTEGRATION_NAMESPACE_PRO . "{$appSlug}\\{$appSlug}Authorization";

        if (class_exists($proPluginAuthorizationClass)) {
            return $proPluginAuthorizationClass;
        }

        return false;
    }
}
