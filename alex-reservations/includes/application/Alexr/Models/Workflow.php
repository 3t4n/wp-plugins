<?php
namespace Alexr\Models;

use Evavel\Models\Model;
use Alexr\Models\Traits\HasSettings;
use Evavel\Support\Str;

/*
Hazme ahora las clases que necesito para el trigger y para correr el cron cada 5 minutos para ir corriendo las automatizaciones.

En el resumen tienes el pseudocodigo, pero revisalo por si acaso.

*/

class Workflow extends Model
{
	use HasSettings;

	public static $table_name = 'workflows';
	public static $table_meta = 'workflow_meta';
	public static $pivot_tenant_field = 'restaurant_id';

	protected $casts = [
		'active' => 'boolean',
		'trigger_config' => 'array',
		'settings' => 'array'
	];

	public static function booted()
	{
		static::creating(function($workflow) {
			$workflow->uuid = Str::uuid('wf');
		});
	}

	public function restaurant()
	{
		return $this->belongsTo(Restaurant::class);
	}

	public function steps()
	{
		return $this->hasMany(WorkflowStep::class);
	}

	public function instances()
	{
		return $this->hasMany(WorkflowInstance::class);
	}
}
