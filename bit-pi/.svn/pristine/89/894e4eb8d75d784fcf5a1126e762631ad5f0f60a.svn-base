<?php

namespace BitApps\Pi\src\Integrations\GetGist;

use BitApps\Pi\Deps\BitApps\WPKit\Http\Client\HttpClient;
use BitApps\Pi\src\Authorization\AuthorizationFactory;

final class GetGistService
{
    private $baseUrl;

    private $connectionId;

    private $http;

    private $tokenAuthorization;

    private $headers;

    /**
     * GetGistService constructor.
     *
     * @param       $httpClient
     * @param       $baseUrl
     * @param mixed $connectionId
     */
    public function __construct($baseUrl, $connectionId)
    {
        $this->baseUrl = $baseUrl;
        $this->connectionId = $connectionId;
        $this->http = new HttpClient();

        $this->tokenAuthorization = AuthorizationFactory::getAuthorizationHandler(
            AuthorizationFactory::AUTHORIZATION_TYPES['BEARER_TOKEN'],
            $this->connectionId
        );
        $this->headers = [
            'Authorization' => $this->tokenAuthorization->getAccessToken(),
            'Content-Type'  => 'application/json'
        ];
    }

    public function checkContactExists($email)
    {
        $params = http_build_query([
            'email' => $email
        ]);

        return $this->http->request(
            $this->baseUrl . '/contacts?' . $params,
            'GET',
            [],
            $this->headers
        );
    }

    /**
     * Process Data
     *
     * @param array $taskData
     * @param mixed $staticFieldsKeys
     * @param mixed $overRideExistingEmail
     *
     * @return array
     */
    public function generateFieldMap($taskData, $staticFieldsKeys)
    {
        $processedData = [];
        foreach ($taskData as $data) {
            if (\in_array($data['column'], $staticFieldsKeys)) {
                $processedData[$data['column']] = $data['value'];
            } else {
                $processedData['custom_fields'] = (object) [
                    $data['column'] => $data['value'],
                ];
            }
        }

        return $processedData;
    }

    /**
     * Create New Form
     *
     * @param array $data
     * @param mixed $configs
     * @param mixed $questions
     * @param mixed $taskData
     * @param mixed $listId
     * @param mixed $tagId
     * @param mixed $overRideExistingEmail
     *
     * @return collection
     */
    public function createContact($taskData, $tagId, $overRideExistingEmail)
    {
        $staticFieldsKeys = [
            'name',
            'email',
            'phone',
            'gender',
            'country',
            'city',
            'company_name',
            'industry',
            'job_title',
            'last_name',
            'postal_code',
            'state',
        ];

        $processedData = $this->generateFieldMap($taskData, $staticFieldsKeys);

        if (!isset($processedData['email'])) {
            return ['response' => __('Required field Email is empty', 'bit-flows'), 'payload' => $processedData, 'status_code' => 400];
        }

        // Check Override Email

        if ($overRideExistingEmail === 'true') {
            $contactExists = $this->checkContactExists($processedData['email']);
            if (isset($contactExists->contact)) {
                $processedData['user_id'] = $contactExists->contact->id;
            } else {
                return ['response' => __('Email already exists', 'bit-flows'), 'payload' => $processedData, 'status_code' => 400];
            }
        }

        if (isset($tagId) || !empty($tagId)) {
            $processedData['tags'] = $tagId;
        }

        $response = $this->http->request(
            $this->baseUrl . '/contacts',
            'POST',
            wp_json_encode($processedData),
            $this->headers
        );

        return ['response' => $response, 'payload' => $processedData, 'status_code' => $this->http->getResponseCode()];
    }
}
