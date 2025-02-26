<?php

namespace Alexr\Workflows\Templates;

use Alexr\Models\Workflow;
use Alexr\Models\WorkflowStep;

class NoShowWorkflowCreator
{
	public static function create($restaurant_id)
	{
		// Crear el workflow
		$workflow = new Workflow();
		$workflow->restaurant_id = $restaurant_id;
		$workflow->name = "No-show Follow-up";
		$workflow->trigger_type = "booking_no_show";
		$workflow->trigger_config = [];
		$workflow->active = true;
		$workflow->save();

		// Paso 1: Añadir tags al cliente
		$step1 = new WorkflowStep();
		$step1->workflow_id = $workflow->id;
		$step1->step_order = 1;
		$step1->action_type = "add_tags";
		$step1->action_config = [
			"tags" => ["no-show", "follow-up-required"]
		];
		$step1->save();

		// Paso 2: Enviar email inicial
		$step2 = new WorkflowStep();
		$step2->workflow_id = $workflow->id;
		$step2->step_order = 2;
		$step2->action_type = "send_email";
		$step2->action_config = [
			"template" => "no_show_initial",
			"subject" => "We missed you today",
			"include_booking" => true
		];
		$step2->save();

		// Paso 3: Esperar 7 días
		$step3 = new WorkflowStep();
		$step3->workflow_id = $workflow->id;
		$step3->step_order = 3;
		$step3->action_type = "wait";
		$step3->action_config = [
			"wait_time" => 7 * 24 * 3600 // 7 días en segundos
		];
		$step3->save();

		// Paso 4: Quitar tags
		$step4 = new WorkflowStep();
		$step4->workflow_id = $workflow->id;
		$step4->step_order = 4;
		$step4->action_type = "remove_tags";
		$step4->action_config = [
			"tags" => ["no-show", "follow-up-required"]
		];
		$step4->save();

		// Paso 5: Enviar email de follow-up
		$step5 = new WorkflowStep();
		$step5->workflow_id = $workflow->id;
		$step5->step_order = 5;
		$step5->action_type = "send_email";
		$step5->action_config = [
			"template" => "no_show_followup",
			"subject" => "We'd love to see you again",
			"include_booking" => true,
			"include_new_reservation_link" => true
		];
		$step5->save();

		return $workflow;
	}
}

// Crear el workflow para el restaurante
//$workflow = NoShowWorkflowCreator::create($restaurant_id);
