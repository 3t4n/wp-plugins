<?php

namespace Alexr\Enums;

class WorkflowInstanceStatus {
	const PENDING = 'pending';     // Creada pero no iniciada
	const RUNNING = 'running';     // En ejecución
	const WAITING = 'waiting';     // Esperando (ej: delay de 7 días)
	const COMPLETED = 'completed'; // Completada exitosamente
	const FAILED = 'failed';       // Falló y superó máx reintentos
	const CANCELLED = 'cancelled'; // Cancelada manualmente

	public static function listing() {
		return [
			self::PENDING => __eva('Pending'),
			self::RUNNING => __eva('Running'),
			self::WAITING => __eva('Waiting'),
			self::COMPLETED => __eva('Completed'),
			self::FAILED => __eva('Failed'),
			self::CANCELLED => __eva('Cancelled')
		];
	}

	public static function label($status) {
		$list = self::listing();
		return isset($list[$status]) ? $list[$status] : ucfirst($status);
	}

	public static function active_statuses() {
		return [
			self::PENDING,
			self::RUNNING,
			self::WAITING
		];
	}

	public static function final_statuses() {
		return [
			self::COMPLETED,
			self::FAILED,
			self::CANCELLED
		];
	}
}
