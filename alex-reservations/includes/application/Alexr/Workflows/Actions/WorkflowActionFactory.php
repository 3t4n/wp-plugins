<?php

namespace Alexr\Workflows\Actions;

class WorkflowActionFactory
{
	public static function createAction($actionType)
	{
		$handlers = [
			'add_tags' => new AddTagsAction(),
			'remove_tags' => new RemoveTagsAction(),
			'send_email' => new SendEmailAction(),
			'wait' => new WaitAction(),
			// Agregar más handlers según se necesiten
		];

		if (isset($handlers[$actionType])) {
			return $handlers[$actionType];
		}

		throw new \Exception("Unknown action type: {$actionType}");
	}
}
