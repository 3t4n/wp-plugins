<?php

namespace BitApps\Pi\src\Authorization;

use BitApps\Pi\Deps\BitApps\WPKit\Http\Client\HttpClient;
use BitApps\Pi\Model\Connection;

abstract class AbstractBaseAuthorization
{
    protected $connectionId;

    protected $http;

    public function __construct($connectionId)
    {
        $this->connectionId = $connectionId;
        $this->http = new HttpClient();
    }

    abstract public function getAccessToken();

    public function getConnectionId():int
    {
        return (int) $this->connectionId;
    }

    public function getConnection()
    {
        return Connection::select(['id', 'auth_details', 'encrypt_keys', 'auth_type'])->findOne(['id' => $this->connectionId]);
    }

    public function updateConnection($connection, $newTokenDetails):array
    {
        $save = $connection->update([
            'auth_details' => $newTokenDetails
        ])->save();

        if (!$save) {
            return [
                'error'   => true,
                'message' => 'connection update failed',
            ];
        }

        return $newTokenDetails;
    }

    public function isTokenExpired($generatedAt, $expiresIn):bool
    {
        if (!isset($generatedAt, $expiresIn) || $expiresIn <= 0) {
            return false;
        }

        return (\intval($generatedAt) + $expiresIn - 30) < time();
    }
}
