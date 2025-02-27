<?php

namespace BitApps\Pi\HTTP\Controllers;

use BitApps\Pi\Model\FlowLog;
use BitApps\Pi\Model\FlowNode;
use BitApps\Pi\Services\NodeService;
use BitApps\Pi\src\Flow\GlobalNodeVariables;
use BitApps\Pi\src\Flow\NodeExecutor;
use BitApps\Pi\src\Flow\NodeInfoProvider;
use BitApps\PiPro\Deps\BitApps\WPKit\Http\Request\Request;
use BitApps\PiPro\src\Tools\FlowToolsFactory;

class FlowNodeTestController
{
    // TODO: This feature is not complete. It is just a test controller for the node execution.
    // public function testNodeExecute(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'flow_id' => ['required', 'integer'],
    //         'node_id' => ['required', 'string', 'sanitize:text'],
    //     ]);

    //     $nodeData = FlowNode::where('node_id', $validatedData['node_id'])->first();

    //     $appSlug = $nodeData['app_slug'];

    //     $nodeVariableInstance = GlobalNodeVariables::getInstance(null, $validatedData['flow_id'], true);

    //     if ($appSlug === 'tools') {
    //         $response = FlowToolsFactory::createFlowTool((object) [
    //             'type' => $nodeData['machine_slug'],
    //             'id'   => $nodeData['node_id'],
    //         ], $nodeData, $validatedData['flow_id'])->execute();
    //     } else {
    //         $app = (new NodeExecutor())->doesActionExist($nodeData->app_slug);

    //         $response = (new $app(new NodeInfoProvider($nodeData)))->execute();
    //     }

    //     return $nodeVariableInstance->getVariables();
    //     if ($response['status'] === FlowLog::STATUS['SUCCESS']) {
    //         NodeService::saveNodeVariables($validatedData['flow_id'], $nodeOutput, $validatedData['node_id']);
    //     }
    // }
}
