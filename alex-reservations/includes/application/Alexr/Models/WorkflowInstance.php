<?php

namespace Alexr\Models;

use Evavel\Models\Model;
use Alexr\Models\Traits\HasSettings;
use Evavel\Support\Str;

class WorkflowInstance extends Model
{
	use HasSettings;

	public static $table_name = 'workflow_instances';
	public static $table_meta = 'workflow_instance_meta';

	protected $casts = [
		'retries' => 'integer',
		'max_retries' => 'integer',
		'settings' => 'array',
		'started_at' => 'datetime',
		'next_execution_time' => 'datetime',
		'retry_after' => 'datetime',
	];

	public static function booted()
	{
		static::creating(function($instance) {
			$instance->uuid = Str::uuid('wi');
		});
	}

	public function workflow()
	{
		return $this->belongsTo(Workflow::class);
	}

	public function currentStep()
	{
		return $this->belongsTo(WorkflowStep::class, 'current_step_id');
	}

	public function executions()
	{
		return $this->hasMany(WorkflowStepExecution::class, 'instance_id');
	}

	/**
	 * Get the target model instance based on target_type
	 */
	public function target()
	{
		switch($this->target_type) {
			case 'booking':
				return Booking::find($this->target_id);
			case 'customer':
				return Customer::find($this->target_id);
			default:
				throw new \Exception("Unknown target type: {$this->target_type}");
		}
	}

	/**
	 * Check if this instance can be executed now
	 */
	public function canExecute()
	{
		if ($this->status !== 'running') {
			return false;
		}

		$now = new \DateTime();

		if ($this->retry_after && $this->retry_after > $now) {
			return false;
		}

		if ($this->next_execution_time && $this->next_execution_time > $now) {
			return false;
		}

		return true;
	}

	/**
	 * Calculate next retry time with exponential backoff
	 */
	public function calculateRetryTime()
	{
		// Backoff exponencial: 5min, 10min, 20min...
		$minutes = 5 * (2 ** $this->retries);
		$retryTime = evavel_date_now()->addMinutes($minutes);

		// Asegurarnos de devolver un string en formato Y-m-d H:i:s
		return $retryTime->format('Y-m-d H:i:s');
	}
}
