<?php
namespace Alexr\Models;

use Alexr\Workflows\Actions\WorkflowActionFactory;
use Evavel\Models\Model;
use Alexr\Models\Traits\HasSettings;
use Evavel\Support\Str;

class WorkflowStep extends Model
{
	use HasSettings;

	public static $table_name = 'workflow_steps';
	public static $table_meta = 'workflow_step_meta';

	protected $casts = [
		'step_order' => 'integer',
		'action_config' => 'array',
		'settings' => 'array'
	];

	public static function booted()
	{
		static::creating(function($step) {
			$step->uuid = Str::uuid('ws');
		});
	}

	public function workflow()
	{
		return $this->belongsTo(Workflow::class);
	}

	public function executions()
	{
		return $this->hasMany(WorkflowStepExecution::class, 'step_id');
	}

	/**
	 * Execute the action defined in this step
	 */
	public function executeAction($target)
	{
		$actionHandler = WorkflowActionFactory::createAction($this->action_type);
		return $actionHandler->execute($target, $this->action_config);
	}
}
