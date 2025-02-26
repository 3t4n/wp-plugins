<?php

namespace Alexr\Workflows;

use Alexr\Models\Workflow;
use Alexr\Models\WorkflowInstance;
use Alexr\Models\WorkflowStepExecution;
use Alexr\Enums\WorkflowInstanceStatus;
use Alexr\Enums\WorkflowStepExecutionStatus;
use Exception;

class WorkflowTrigger
{
	/**
	 * Inicia una automatización cuando ocurre un trigger
	 */
	public static function trigger($triggerType, $targetType, $targetId, array $context = [])
	{
		// Buscar workflows activos para este trigger
		$workflows = Workflow::where('trigger_type', $triggerType)
		                     ->where('active', true)
		                     ->get();

		foreach ($workflows as $workflow) {
			try {
				// Crear nueva instancia
				$instance = new WorkflowInstance();
				$instance->workflow_id = $workflow->id;
				$instance->target_type = $targetType;
				$instance->target_id = $targetId;
				$instance->status = WorkflowInstanceStatus::PENDING;
				$instance->current_step_id = $workflow->steps->first()->id;  // Primer paso
				$instance->started_at = evavel_date_now();
				$instance->next_execution_time = evavel_date_now(); // Ejecutar inmediatamente
				$instance->retries = 0;
				$instance->max_retries = 3;
				$instance->settings = ['context' => $context]; // Guardar contexto adicional
				$instance->save();

			} catch (Exception $e) {
				// Log error pero continuar con otros workflows
				error_log("Error iniciando workflow {$workflow->id}: " . $e->getMessage());
				continue;
			}
		}
	}
}

// Cuando ocurre un trigger (ej: no-show)
/*
WorkflowTrigger::trigger(
	'booking_no_show',
	'booking',
	$booking->id,
	['reason' => $reason]
);

// En el cron job (cada 5 minutos)
$executor = new WorkflowExecutor();
$executor->processPendingWorkflows();
*/
