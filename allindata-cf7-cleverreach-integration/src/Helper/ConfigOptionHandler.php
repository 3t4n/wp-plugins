<?php

declare(strict_types=1);

/*
Copyright (C) 2020 All.In Data GmbH

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

namespace AllInData\CF7CRIntegration\Helper;

use AllInData\CF7CRIntegration\Model\CleverReach\Token;

/**
 * Class ConfigOptionHandler
 * @package AllInData\CF7CRIntegration\Helper
 */
class ConfigOptionHandler
{
    const KEY_API_TOKEN = 'aid-cf7cr-api-token';
    const KEY_API_TOKEN_EXPIRY = 'aid-cf7cr-api-token-expiry';
    const KEY_API_CLIENT_ID = 'aid-cf7cr-api-client-id';
    const KEY_API_CLIENT_SECRET = 'aid-cf7cr-api-client-secret';

    /**
     * @var string|null
     */
    private $baseUrl;
    /**
     * @var string|null
     */
    private $oauthUrlToken;
    /**
     * @var string|null
     */
    private $oauthUrlAuthorize;

    /**
     * ConfigOptionHandler constructor.
     * @param string|null $baseUrl
     * @param string|null $oauthUrlToken
     * @param string|null $oauthUrlAuthorize
     */
    public function __construct(?string $baseUrl, ?string $oauthUrlToken, ?string $oauthUrlAuthorize)
    {
        $this->baseUrl = $baseUrl;
        $this->oauthUrlToken = $oauthUrlToken;
        $this->oauthUrlAuthorize = $oauthUrlAuthorize;
    }

    /**
     * @return Token
     */
    public function getApiToken()
    {
        $tokenData = $this->getOption(self::KEY_API_TOKEN);
        if (!$tokenData) {
            return new Token();
        }

        $tokenEntity = unserialize($tokenData);
        if (!($tokenEntity instanceof Token)) {
            return new Token();
        }

        return $tokenEntity;
    }

    /**
     * @param Token $apiToken
     * @return $this
     */
    public function setApiToken(Token $apiToken)
    {
        $this->saveOption(self::KEY_API_TOKEN, serialize($apiToken));
        return $this;
    }

    /**
     * @return string|null
     */
    public function getApiTokenExpiry()
    {
        return $this->getOption(self::KEY_API_TOKEN_EXPIRY);
    }

    /**
     * @param string|null $apiTokenExpiry
     * @return $this
     */
    public function setApiTokenExpiry($apiTokenExpiry)
    {
        $this->saveOption(self::KEY_API_TOKEN_EXPIRY, $apiTokenExpiry);
        return $this;
    }

    /**
     * @return string|null
     */
    public function getApiClientSecret()
    {
        return $this->getOption(self::KEY_API_CLIENT_SECRET);
    }

    /**
     * @param string|null $apiClientSecret
     * @return $this
     */
    public function setApiClientSecret($apiClientSecret)
    {
        $this->saveOption(self::KEY_API_CLIENT_SECRET, $apiClientSecret);
        return $this;
    }

    /**
     * @return string|null
     */
    public function getApiClientId()
    {
        return $this->getOption(self::KEY_API_CLIENT_ID);
    }

    /**
     * @param string|null $apiClientId
     * @return $this
     */
    public function setApiClientId($apiClientId)
    {
        $this->saveOption(self::KEY_API_CLIENT_ID, $apiClientId);
        return $this;
    }

    /**
     * @return string|null
     */
    public function getApiBaseUrl()
    {
        return $this->baseUrl;
    }

    /**
     * @return string|null
     */
    public function getApiOAuthUrlToken()
    {
        return $this->oauthUrlToken;
    }

    /**
     * @return string|null
     */
    public function getApiOAuthUrlAuthenticate()
    {
        return $this->oauthUrlAuthorize;
    }

    /**
     * @param string $key
     * @param null|mixed $defaultValue
     * @return mixed|null
     */
    private function getOption($key, $defaultValue = null)
    {
        return get_option($key, $defaultValue);
    }

    /**
     * @param string $key
     * @param null|mixed $value
     * @return bool
     */
    private function saveOption($key, $value)
    {
        return update_option($key, $value);
    }
}
