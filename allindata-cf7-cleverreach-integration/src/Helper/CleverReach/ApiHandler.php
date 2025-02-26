<?php
/*
Copyright (C) 2018 All.In Data GmbH

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

namespace AllInData\CF7CRIntegration\Helper\CleverReach;

use AllInData\CF7CRIntegration\Helper\ConfigOptionHandler;
use AllInData\CF7CRIntegration\Model\CleverReach\Attribute;
use AllInData\CF7CRIntegration\Model\CleverReach\Form;
use AllInData\CF7CRIntegration\Model\CleverReach\Group;
use AllInData\CF7CRIntegration\Model\CleverReach\Receiver;
use AllInData\CF7CRIntegration\Model\CleverReach\Token;
use GuzzleHttp\Client as HttpClient;

/**
 * Class ApiHandler
 * @package AllInData\CF7CRIntegration\Helper\CleverReach
 */
class ApiHandler
{
    /**
     * @var HttpClient
     */
    private $httpClient;
    /**
     * @var ConfigOptionHandler
     */
    private $configHandler;

    /**
     * ApiHandler constructor.
     * @param HttpClient $httpClient
     * @param ConfigOptionHandler $configHandler
     */
    public function __construct(HttpClient $httpClient, ConfigOptionHandler $configHandler)
    {
        $this->httpClient = $httpClient;
        $this->configHandler = $configHandler;
    }

    /**
     * @param string $redirectUrl
     * @return string
     */
    public function getAuthenticationUrl($redirectUrl)
    {
        return sprintf(
            '%s?client_id=%s&grant=basic&response_type=code&redirect_uri=%s',
            $this->configHandler->getApiOAuthUrlAuthenticate(),
            $this->configHandler->getApiClientId(),
            $redirectUrl
        );
    }

    /**
     * @param string $code
     * @param string $redirectUrl
     * @return bool|Token
     */
    public function getApiToken($code, $redirectUrl)
    {
        try {
            $response = $this->httpClient->request('POST', $this->configHandler->getApiOAuthUrlToken(), [
                'form_params' => [
                    'client_id' => $this->configHandler->getApiClientId(),
                    'client_secret' => $this->configHandler->getApiClientSecret(),
                    'redirect_uri' => $redirectUrl,
                    'grant_type' => 'authorization_code',
                    'code' => $code
                ]
            ]);
        } catch (\GuzzleHttp\Exception\GuzzleException $e) {
            return $e->getMessage();
        }

        if ($response->getStatusCode() !== 200) {
            return $response;
        }

        $responseData = $response->getBody()->getContents();
        if (!is_string($responseData)) {
            return $response;
        }

        $responseData = json_decode($responseData, true);

        $token = new Token();
        $token->setAccessToken($responseData['access_token']);
        $token->setExpiresIn($responseData['expires_in']);
        $token->setTokenType($responseData['token_type']);
        $token->setScopes(explode(' ', $responseData['scope']));
        $token->setRefreshToken($responseData['refresh_token']);

        return $token;
    }

    /**
     * @param Group $group
     * @return Form[]|\Psr\Http\Message\ResponseInterface|string
     */
    public function getFormsByGroup(Group $group)
    {
        $token = $this->configHandler->getApiToken();
        $headers = [
            'Accept'        => 'application/json',
        ];
        $url = $this->configHandler->getApiBaseUrl() . 'groups.json/'.$group->getId().'/forms?token='.$token->getAccessToken();
        try {
            $response = $this->httpClient->request('GET', $url, $headers);
        } catch (\GuzzleHttp\Exception\GuzzleException $e) {
            return $e->getMessage();
        }

        if ($response->getStatusCode() !== 200) {
            return $response;
        }

        $responseData = $response->getBody()->getContents();
        if (!is_string($responseData)) {
            return $response;
        }

        $responseData = json_decode($responseData, true);
        $formSet = [];
        foreach ($responseData as $formData) {
            $form = new Form();
            $form->setId($formData['id'] ?? null);
            $form->setName($formData['name'] ?? null);
            $form->setCustomerTablesId($formData['customer_tables_id'] ?? null);
            $formSet[] = $form;
        }

        return $formSet;
    }

    /**
     * @param int $formId
     * @return Form|\Psr\Http\Message\ResponseInterface|string
     */
    public function getFormByFormId($formId)
    {
        $token = $this->configHandler->getApiToken();
        $headers = [
            'Accept'        => 'application/json',
        ];
        $url = $this->configHandler->getApiBaseUrl() . 'forms.json/'.$formId.'?token='.$token->getAccessToken();
        try {
            $response = $this->httpClient->request('GET', $url, $headers);
        } catch (\GuzzleHttp\Exception\GuzzleException $e) {
            return $e->getMessage();
        }

        if ($response->getStatusCode() !== 200) {
            return $response;
        }

        $responseData = $response->getBody()->getContents();
        if (!is_string($responseData)) {
            return $response;
        }

        $formData = json_decode($responseData, true);
        $form = new Form();
        $form->setId($formData['id'] ?? null);
        $form->setName($formData['name'] ?? null);
        $form->setCustomerTablesId($formData['customer_tables_id'] ?? null);

        return $form;
    }

    /**
     * @return Group[]|\Psr\Http\Message\ResponseInterface|string
     */
    public function getGroups()
    {
        $token = $this->configHandler->getApiToken();
        $headers = [
            'Accept'        => 'application/json',
        ];
        $url = $this->configHandler->getApiBaseUrl() . 'groups.json?token='.$token->getAccessToken();
        try {
            $response = $this->httpClient->request('GET', $url, $headers);
        } catch (\GuzzleHttp\Exception\GuzzleException $e) {
            return $e->getMessage();
        }

        if ($response->getStatusCode() !== 200) {
            return $response;
        }

        $responseData = $response->getBody()->getContents();
        if (!is_string($responseData)) {
            return $response;
        }

        $responseData = json_decode($responseData, true);
        $groupSet = [];
        foreach ($responseData as $groupData) {
            $group = new Group();
            $group->setId($groupData['id'] ?? null);
            $group->setName($groupData['name'] ?? null);
            $group->setLocked($groupData['locked'] ?? false);
            $group->setBackup($groupData['backup'] ?? true);
            $group->setReceiverInfo($groupData['receiver_info'] ?? null);
            $group->setStamp($groupData['stamp'] ?? 0);
            $group->setLastMailing($groupData['last_mailing'] ?? 0);
            $group->setLastChanged($groupData['last_changed'] ?? 0);
            $groupSet[] = $group;
        }

        return $groupSet;
    }

    /**
     * @param int $groupId
     * @return Group|\Psr\Http\Message\ResponseInterface|string
     */
    public function getGroupById($groupId)
    {
        $token = $this->configHandler->getApiToken();
        $headers = [
            'Accept'        => 'application/json',
        ];
        $url = $this->configHandler->getApiBaseUrl() . 'groups.json/'.$groupId.'?token='.$token->getAccessToken();
        try {
            $response = $this->httpClient->request('GET', $url, $headers);
        } catch (\GuzzleHttp\Exception\GuzzleException $e) {
            return $e->getMessage();
        }

        if ($response->getStatusCode() !== 200) {
            return $response;
        }

        $responseData = $response->getBody()->getContents();
        if (!is_string($responseData)) {
            return $response;
        }

        $groupData = json_decode($responseData, true);
        $group = new Group();
        $group->setId($groupData['id'] ?? null);
        $group->setName($groupData['name'] ?? null);
        $group->setLocked($groupData['locked'] ?? false);
        $group->setBackup($groupData['backup'] ?? true);
        $group->setReceiverInfo($groupData['receiver_info'] ?? null);
        $group->setStamp($groupData['stamp'] ?? 0);
        $group->setLastMailing($groupData['last_mailing'] ?? 0);
        $group->setLastChanged($groupData['last_changed'] ?? 0);

        return $group;
    }

    /**
     * @param Group $group
     * @param Form $form
     * @param Receiver $receiver
     * @return \Psr\Http\Message\ResponseInterface|string|bool|null
     */
    public function addReceiverToGroup(Group $group, Form $form, Receiver $receiver)
    {
        $token = $this->configHandler->getApiToken();
        $headers = [
            'Accept'        => 'application/json',
        ];

        /*
         * Add receiver to group
         */
        $url = $this->configHandler->getApiBaseUrl() . 'groups.json/'.$group->getId().'/receivers?token='.$token->getAccessToken();
        try {
            $response = $this->httpClient->request('POST', $url, [
                'headers' => $headers,
                'json' => $receiver->toArray()
            ]);
        } catch (\GuzzleHttp\Exception\GuzzleException $e) {
            return $e->getMessage();
        }

        if ($response->getStatusCode() !== 200) {
            return false;
        }


        /*
         * Send subscription to new receiver
         */
        $url = $this->configHandler->getApiBaseUrl() . 'forms.json/'.$form->getId().'/send/activate?token='.$token->getAccessToken();
        try {
            $response = $this->httpClient->request('POST', $url, [
                'headers' => $headers,
                'json' => [
                    'email' => $receiver->getEmail(),
                    'doidata' => [
                        "user_ip" => "1.2.3.4",
                        "referer" => "http://www.wayne-enterprises.com",
                        "user_agent" => "Brucilla/1.0 (HerOS/Linux)"
                    ]
                ]
            ]);
        } catch (\GuzzleHttp\Exception\GuzzleException $e) {
            return $e->getMessage();
        }

        if ($response->getStatusCode() !== 200) {
            return false;
        }

        return true;
    }

    /**
     * @param int $groupId
     * @return Attribute[]|\Psr\Http\Message\ResponseInterface|string
     */
    public function getAttributes($groupId = 0)
    {
        $token = $this->configHandler->getApiToken();
        $headers = [
            'Accept'        => 'application/json',
        ];
        if ($groupId) {
            $groupAttributesUrl = $this->configHandler->getApiBaseUrl() . 'groups.json/'.$groupId.'/attributes?token='.$token->getAccessToken();
        }
        $globalAttributesUrl = $this->configHandler->getApiBaseUrl() . 'attributes.json?token='.$token->getAccessToken();

        try {
            $responseGlobal = $this->httpClient->request('GET', $globalAttributesUrl, $headers);
            if ($groupId) {
                $responseGroup = $this->httpClient->request('GET', $groupAttributesUrl, $headers);
            }
        } catch (\GuzzleHttp\Exception\GuzzleException $e) {
            return $e->getMessage();
        }

        if ($responseGlobal->getStatusCode() !== 200) {
            return $responseGlobal;
        }
        if ($groupId && $responseGroup->getStatusCode() !== 200) {
            return $responseGroup;
        }

        $responseGlobalData = $responseGlobal->getBody()->getContents();
        if (!is_string($responseGlobalData)) {
            return $responseGlobal;
        }
        $responseGlobalData = json_decode($responseGlobalData, true);
        foreach ($responseGlobalData as $idx => $data) {
            $responseGlobalData[$idx]['global'] = true;
        }

        if ($groupId) {
            $responseGroupData = $responseGroup->getBody()->getContents();
            if (!is_string($responseGroupData)) {
                return $responseGroup;
            }
            $responseGroupData = json_decode($responseGroupData, true);
        } else {
            $responseGroupData = [];
        }
        foreach ($responseGroupData as $idx => $data) {
            $responseGlobalData[$idx]['global'] = false;
        }

        $responseData = array_merge($responseGlobalData, $responseGroupData);
        sort($responseData);
        $attributeSet = [];
        foreach ($responseGlobalData as $data) {
            $attribute = new Attribute();
            $attribute->setId($data['id'] ?? null);
            $attribute->setGroupId($data['group_id'] ?? 0);
            $attribute->setName($data['name'] ?? null);
            $attribute->setDescription($data['description'] ?? null);
            $attribute->setPreviewValue($data['preview_value'] ?? null);
            $attribute->setDefaultValue($data['default_value'] ?? null);
            $attribute->setType($data['type'] ?? null);
            $attribute->setTag($data['tag'] ?? null);
            $attribute->setIsGlobal($data['global'] ?? false);
            $attributeSet[] = $attribute;
        }

        return $attributeSet;
    }
}