<?php

namespace Alexr\Enums;

class WorkflowStepExecutionStatus {
	const SUCCESS = 'success';   // Ejecución exitosa
	const FAILED = 'failed';     // Falló la ejecución
	const SKIPPED = 'skipped';   // Se saltó (ej: condición no cumplida)

	public static function listing() {
		return [
			self::SUCCESS => __eva('Success'),
			self::FAILED => __eva('Failed'),
			self::SKIPPED => __eva('Skipped')
		];
	}

	public static function label($status) {
		$list = self::listing();
		return isset($list[$status]) ? $list[$status] : ucfirst($status);
	}
}
