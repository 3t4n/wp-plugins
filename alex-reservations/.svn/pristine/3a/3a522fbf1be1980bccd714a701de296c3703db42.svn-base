<?php
namespace Alexr\Models;

use Evavel\Models\Model;
use Alexr\Models\Traits\HasSettings;
use Evavel\Support\Str;

class WorkflowStepExecution extends Model
{
	use HasSettings;

	public static $table_name = 'workflow_step_executions';
	public static $table_meta = 'workflow_step_execution_meta';

	protected $casts = [
		'result' => 'array',
		'settings' => 'array',
		'executed_at' => 'datetime'
	];

	public static function booted()
	{
		static::creating(function($execution) {
			$execution->uuid = Str::uuid('we');
		});
	}

	public function instance()
	{
		return $this->belongsTo(WorkflowInstance::class);
	}

	public function step()
	{
		return $this->belongsTo(WorkflowStep::class);
	}
}
