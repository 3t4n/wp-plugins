<?php

namespace BitApps\Pi\HTTP\Controllers;

use BitApps\Pi\Deps\BitApps\WPKit\Http\Response;
use BitApps\Pi\HTTP\Requests\RefreshTokenRequest;
use BitApps\Pi\src\Authorization\AuthorizationFactory;

final class AuthorizationController
{
    public function refreshToken(RefreshTokenRequest $request)
    {
        $validatedData = $request->validated();

        $appSlug = $validatedData['appSlug'] ?? '';

        $isCustomAuthClassExists = AuthorizationFactory::authorizationClassExists($appSlug);

        if ($isCustomAuthClassExists) {
            $authDetails = AuthorizationFactory::getAuthorizationHandler(AuthorizationFactory::AUTHORIZATION_TYPES['CUSTOM'], $request['connectionId'], $appSlug)->getAuthDetails();

            if (isset($authDetails['error'])) {
                return Response::error($authDetails);
            }

            return Response::success($authDetails);
        }

        $authDetails = AuthorizationFactory::getAuthorizationHandler(AuthorizationFactory::AUTHORIZATION_TYPES['OAUTH2'], $request['connectionId'])
            ->setRefreshTokenUrl($validatedData['refreshTokenUrl'])
            ->getAuthDetails();

        if (isset($authDetails['error'])) {
            return Response::error($authDetails);
        }

        return Response::success($authDetails);
    }
}
