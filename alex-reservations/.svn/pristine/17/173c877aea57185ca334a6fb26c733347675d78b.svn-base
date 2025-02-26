<?php

namespace Alexr\Workflows;

use Alexr\Enums\WorkflowInstanceStatus;
use Alexr\Enums\WorkflowStepExecutionStatus;
use Alexr\Models\WorkflowInstance;
use Alexr\Models\WorkflowStepExecution;
use Exception;

class WorkflowExecutor
{
	protected $batchSize = 50;
	protected $maxExecutionTime = 240; // 4 minutos (para cron de 5 min)

	/**
	 * Procesar un batch de automatizaciones pendientes
	 */
	public function processPendingWorkflows()
	{
		$startTime = time();

		// Buscar instancias pendientes de ejecución
		$instances = WorkflowInstance::whereIn('status', [
			WorkflowInstanceStatus::PENDING,
			WorkflowInstanceStatus::RUNNING,
			WorkflowInstanceStatus::WAITING
		])
		                             ->where(function($query) {
			                             $now = evavel_now(); // 'Y-m-d H:i:s'
			                             $query->where(function($q) use ($now) {
				                             $q->where('next_execution_time', '<=', $now)
				                               ->whereIsNull('retry_after');
			                             })
			                                   ->orWhere(function($q) use ($now) {
				                                   $q->where('retry_after', '<=', $now);
			                                   });
		                             })
		                             ->limit($this->batchSize)
		                             ->get();

		foreach ($instances as $instance) {
			// Verificar tiempo máximo de ejecución
			if (time() - $startTime >= $this->maxExecutionTime) {
				break;
			}

			try {
				$this->processInstance($instance);
			} catch (Exception $e) {
				$this->handleError($instance, $e);
			}
		}
	}

	/**
	 * Procesar una instancia específica
	 */
	protected function processInstance(WorkflowInstance $instance)
	{
		// Obtener paso actual
		$currentStep = $instance->currentStep;
		if (!$currentStep) {
			throw new Exception("No current step found for instance {$instance->id}");
		}

		try {
			// Ejecutar la acción del paso
			$result = $currentStep->executeAction($instance->target());

			// Registrar ejecución exitosa
			$this->logStepExecution(
				$instance->id,
				$currentStep->id,
				WorkflowStepExecutionStatus::SUCCESS,
				null,
				$result
			);

			// Obtener siguiente paso
			$nextStep = $instance->workflow->steps()
											->orderBy('step_order', 'ASC')
			                               ->where('step_order', '>', $currentStep->step_order)
			                               ->first();

			if ($nextStep) {
				// Actualizar instancia para siguiente paso
				$instance->update([
					'current_step_id' => $nextStep->id,
					'next_execution_time' => $this->calculateNextExecutionTime($nextStep),
					'retries' => 0,
					'last_error' => null,
					'retry_after' => null,
					'status' => $this->determineNextStatus($nextStep)
				]);
			} else {
				// No hay más pasos, marcar como completada
				$instance->update([
					'status' => WorkflowInstanceStatus::COMPLETED,
					'current_step_id' => null,
					'next_execution_time' => null
				]);
			}

		} catch (Exception $e) {
			throw $e; // Propagar al manejador de errores
		}
	}

	/**
	 * Registrar la ejecución de un paso
	 */
	protected function logStepExecution($instanceId, $stepId, $status, $error = null, $result = null)
	{
		if (!$stepId) {
			throw new Exception("Cannot log execution with null step_id for instance {$instanceId}");
		}

		$execution = new WorkflowStepExecution();
		$execution->instance_id = $instanceId;
		$execution->step_id = $stepId;
		$execution->status = $status;
		$execution->executed_at = evavel_date_now();
		$execution->error = $error;
		$execution->result = $result;
		$execution->save();
	}

	/**
	 * Manejar error en la ejecución
	 */
	protected function handleError(WorkflowInstance $instance, Exception $error)
	{
		// Registrar ejecución fallida
		$this->logStepExecution(
			$instance->id,
			$instance->current_step_id,
			WorkflowStepExecutionStatus::FAILED,
			$error->getMessage()
		);

		// Actualizar instancia
		if ($instance->retries >= $instance->max_retries) {
			// Superó máximo de reintentos
			$instance->update([
				'status' => WorkflowInstanceStatus::FAILED,
				'last_error' => $error->getMessage()
			]);
		} else {
			// Programar reintento
			$instance->update([
				'retries' => $instance->retries + 1,
				'last_error' => $error->getMessage(),
				'retry_after' => $instance->calculateRetryTime()
			]);
		}
	}

	/**
	 * Calcular próximo tiempo de ejecución basado en el paso
	 */
	protected function calculateNextExecutionTime($step)
	{
		if ($step->action_type === 'wait') {
			$waitTime = $step->action_config['wait_time'] ?? 0;
			return evavel_date_now()->addSeconds($waitTime);
		}

		return evavel_date_now(); // Ejecutar inmediatamente
	}

	/**
	 * Determinar el siguiente estado basado en el paso
	 */
	protected function determineNextStatus($step)
	{
		if ($step->action_type === 'wait') {
			return WorkflowInstanceStatus::WAITING;
		}

		return WorkflowInstanceStatus::RUNNING;
	}
}
