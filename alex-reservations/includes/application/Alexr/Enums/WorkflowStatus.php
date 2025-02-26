<?php

namespace Alexr\Enums;

class WorkflowStatus {
	const ACTIVE = 'active';
	const INACTIVE = 'inactive';
	const ARCHIVED = 'archived';

	public static function listing() {
		return [
			self::ACTIVE => __eva('Active'),
			self::INACTIVE => __eva('Inactive'),
			self::ARCHIVED => __eva('Archived')
		];
	}

	public static function label($status) {
		$list = self::listing();
		return isset($list[$status]) ? $list[$status] : ucfirst($status);
	}
}
