<?php

namespace Alexr\Workflows\Actions;

use Alexr\Models\Customer;

class AddTagsAction implements WorkflowAction
{
	public function execute($target, array $config)
	{
		$tags = $config['tags'] ?? [];
		if ($target instanceof Customer) {
			$target->tags()->attach($tags);
		}
		return ['added_tags' => $tags];
	}
}
