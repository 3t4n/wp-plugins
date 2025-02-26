<?php

namespace Alexr\Workflows\Actions;

use Alexr\Models\Customer;

class RemoveTagsAction implements WorkflowAction
{
	public function execute($target, array $config)
	{
		$tags = $config['tags'] ?? [];
		if ($target instanceof Customer) {
			$target->tags()->detach($tags);
		}

		return ['removed_tags' => $tags];
	}
}
