<?php

namespace BitApps\Pi\src\Integrations\Brevo;

use BitApps\Pi\Helpers\Utility;
use BitApps\Pi\src\Authorization\AuthorizationFactory;
use BitApps\Pi\src\Flow\NodeInfoProvider;
use BitApps\Pi\src\Interfaces\ActionInterface;

class BrevoAction implements ActionInterface
{
    public const BASE_URL = 'https://api.brevo.com/v3';

    private NodeInfoProvider $nodeInfoProvider;

    private BrevoContact $brevoContact;

    public function __construct(NodeInfoProvider $nodeInfoProvider)
    {
        $this->nodeInfoProvider = $nodeInfoProvider;
    }

    public function execute(): array
    {
        $executedNodeAction = $this->executeBrevoAction();

        return Utility::formatResponseData(
            $executedNodeAction['status_code'],
            $executedNodeAction['payload'],
            $executedNodeAction['response']
        );
    }

    private function executeBrevoAction()
    {
        $machineSlug = $this->nodeInfoProvider->getMachineSlug();

        $connectionId = $this->nodeInfoProvider->getFieldMapConfigs('connection-id.value');

        $listId = $this->nodeInfoProvider->getFieldMapConfigs('list-id.value');

        $dataArr = $this->nodeInfoProvider->getFieldMapRepeaters('contact-row.value', false, true, 'brevoField', 'value');

        $tokenAuthorization = AuthorizationFactory::getAuthorizationHandler(
            AuthorizationFactory::AUTHORIZATION_TYPES['API_KEY'],
            $connectionId
        );

        $apiKey = $tokenAuthorization->getAccessToken();

        $header = [
            'accept'       => 'application/json',
            'api-key'      => $apiKey,
            'content-type' => 'application/json'
        ];

        $this->brevoContact = new BrevoContact(static::BASE_URL, $header);

        if ($machineSlug === 'createContact') {
            $dataArr = $this->formattedData($dataArr, $listId);

            return $this->brevoContact->createNewContact($dataArr);
        }
    }

    private function formattedData($data = [], $listId)
    {
        $newData = [];
        if (\is_array($listId)) {
            $arrLists = array_map(function ($val) {
                return (int) $val;
            }, $listId);
        } else {
            $arrLists = [(int) $listId];
        }

        $attributes = [];
        foreach ($data as $key => $value) {
            if ($key === 'Email') {
                $newData['email'] = $value;

                continue;
            }
            $attributes[$key] = $value;
        }

        $newData['attributes'] = (object) $attributes;
        $newData['listIds'] = $arrLists;

        return $newData;
    }
}
