<?php

namespace BitApps\Pi\src\Integrations\GetResponse;

use BitApps\Pi\Deps\BitApps\WPKit\Http\Client\HttpClient;
use BitApps\Pi\src\Authorization\AuthorizationFactory;

final class GetResponseService
{
    private $baseUrl;

    private $connectionId;

    /**
     * JotFormService constructor.
     *
     * @param       $httpClient
     * @param       $baseUrl
     * @param mixed $connectionId
     */
    public function __construct($baseUrl, $connectionId)
    {
        $this->baseUrl = $baseUrl;
        $this->connectionId = $connectionId;
    }

    public function addContact($getResponseFields, $listId, $data)
    {
        $checkConfigs = $this->checkConfigs([
            'connection' => $this->connectionId,
            'list'       => $listId,
            'field_map'  => $getResponseFields
        ]);

        if (isset($checkConfigs['isEmpty']) && $checkConfigs['isEmpty']) {
            return ['response' => $checkConfigs['message'], 'payload' => [], 'status_code' => 400];
        }

        $apiKeyAuthorization = AuthorizationFactory::getAuthorizationHandler(AuthorizationFactory::AUTHORIZATION_TYPES['API_KEY'], $this->connectionId);
        $apiEndpoint = $this->baseUrl . 'contacts';
        $bodyParams = $this->formatBodyParams($getResponseFields, $listId, $data);

        if (!empty($data['overrideExisting']) && $data['overrideExisting'] === 'yes') {
            $contactId = $this->isContactExists($bodyParams['email']);

            $apiEndpoint = $contactId ? $apiEndpoint . '/' . $contactId : $apiEndpoint;
        }

        if (!$contactId && $bodyParams['dayOfCycle'] === 'null') {
            unset($bodyParams['dayOfCycle']);
        }

        $http = new HttpClient();

        $response = $http->request(
            $apiEndpoint,
            'POST',
            $bodyParams,
            ['X-Auth-Token' => 'api-key ' . $apiKeyAuthorization->getAccessToken()]
        );

        return ['response' => $response, 'payload' => $bodyParams, 'status_code' => $http->getResponseCode()];
    }

    /**
     * @param array $configs ['key' => 'config']
     *
     * @return bool
     */
    private function checkConfigs(array $configs)
    {
        foreach ($configs as $key => $config) {
            if (empty($config)) {
                $message = __('No', 'bit-pi') . ' '
                . str_replace('_', ' ', $key) . ' '
                . __('is selected!', 'bit-pi');

                return ['isEmpty' => true, 'message' => $message];
            }
        }
    }

    private function formatBodyParams($getResponseFields, $listId, $data)
    {
        $staticFieldsKeys = ['email', 'name'];
        $result['campaign'] = ['campaignId' => $listId];

        if (!empty($getResponseFields)) {
            foreach ($getResponseFields as $key => $value) {
                if (empty($value)) {
                    continue;
                }

                if (\in_array($key, $staticFieldsKeys)) {
                    $result[$key] = $value;
                } else {
                    $result['customFieldValues'][] = (object) [
                        'customFieldId' => $key,
                        'value'         => \is_array($value) ? $value : (array) $value
                    ];
                }
            }
        }

        if (!empty($data['tags']) && \is_array($data['tags'])) {
            $result['tags'] = array_map(function ($tag) {
                return (object) ['tagId' => $tag];
            }, $data['tags']);
        }

        if (!empty($data['autoresponderDay'])) {
            $result['dayOfCycle'] = $data['autoresponderDay'];
        } else {
            $result['dayOfCycle'] = 'null';
        }

        return $result;
    }

    private function isContactExists($email)
    {
        if (empty($email)) {
            return false;
        }

        $apiKeyAuthorization = AuthorizationFactory::getAuthorizationHandler(
            AuthorizationFactory::AUTHORIZATION_TYPES['API_KEY'],
            $this->connectionId
        );

        $http = new HttpClient();

        $response = $http->request(
            $this->baseUrl . 'contacts?query[email]=' . $email,
            'GET',
            [],
            ['X-Auth-Token' => 'api-key ' . $apiKeyAuthorization->getAccessToken()]
        );

        if (property_exists($response[0], 'contactId')) {
            return $response[0]->contactId;
        }

        return false;
    }
}
