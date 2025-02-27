<?php

namespace BitApps\Pi\Services;

use BitApps\Pi\Deps\BitApps\WPKit\Helpers\JSON;
use BitApps\Pi\Model\Flow;
use BitApps\Pi\Model\FlowNode;
use Exception;
use Throwable;

class FlowImportExportService
{
    private $flowId;

    public function processImport($flowId, $data)
    {
        unset($data['id']);

        $this->flowId = $flowId;

        $newData = JSON::maybeDecode($this->replaceFlowIdNested($data), true);
        $nodes = [];

        if (isset($newData['nodes'])) {
            $nodes = array_map(function ($node) use ($flowId) {
                unset($node['id']);

                $node['flow_id'] = $flowId;
                $node['data'] = empty($node['data']) ? null : JSON::maybeEncode($node['data']);
                $node['variables'] = empty($node['variables']) ? null : JSON::maybeEncode($node['variables']);
                $node['field_mapping'] = empty($node['field_mapping']) ? null : JSON::maybeEncode($node['field_mapping']);
                $node['app_slug'] = $node['app_slug'] ?? null;
                $node['machine_slug'] = $node['machine_slug'] ?? null;
                $node['node_id'] = $node['node_id'] ?? null;

                return $node;
            }, $newData['nodes']);
        }

        $newData['nodes'] = $nodes;

        $flowUpdate = Flow::findOne(['id' => $flowId]);
        $flowUpdate->update($newData)->save();
        $nodesDelete = FlowNode::where('flow_id', $flowId)->delete();
        $nodesInsert = true;

        if (!empty($newData['nodes'])) {
            $nodesInsert = FlowNode::insert($newData['nodes']);
        }

        return [
            'isImported'   => $flowUpdate && \is_array($nodesDelete) && $nodesInsert,
            'importedFlow' => $newData,
            'flowUpdate'   => $flowUpdate,
        ];
    }

    public function importFlow($flowId, $data)
    {
        Flow::startTransaction();
        FlowNode::startTransaction();

        try {
            $processImport = $this->processImport($flowId, $data);

            if (!$processImport['isImported']) {
                throw new Exception('Flow import failed.');
            }

            Flow::commit();
            FlowNode::commit();

            return true;
        } catch (Throwable $th) {
            Flow::rollback();
            FlowNode::rollback();

            return false;
        }
    }

    public function downloadAsFile($data)
    {
        header('Content-Type: application/force-download');
        header('Content-Type: application/octet-stream');
        header('Content-Type: application/download');
        header('Content-Disposition: attachment; filename="flow_blueprint.json"');
        header('Content-Description: File Transfer');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Transfer-Encoding: binary ');
        flush();
        echo wp_json_encode($data);
        exit;
    }

    private function replaceFlowIdNested($data)
    {
        if (empty($data)) {
            return;
        }

        return preg_replace_callback(
            '/("|\')(\d+-\d+|\d+-\d+-\d+)("|\')/',
            fn ($matches) => $this->replaceFlowId($matches[0]),
            JSON::maybeEncode($data)
        );
    }

    private function replaceFlowId($nodeId)
    {
        return preg_replace('/\d+/', $this->flowId, $nodeId, 1);
    }
}
