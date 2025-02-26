<?php

namespace Alexr\Workflows\Actions;

class WaitAction
{
	public function execute($target, array $config)
	{
		// Esta acción no hace nada, solo sirve para que el workflow espere
		return ['wait_time' => $config['wait_time'] ?? 0];
	}
}
