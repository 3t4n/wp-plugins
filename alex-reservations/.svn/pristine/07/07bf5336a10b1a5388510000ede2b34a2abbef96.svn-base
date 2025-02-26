<?php

namespace Alexr\Workflows\Actions;

class SendEmailAction implements WorkflowAction
{
	public function execute($target, array $config)
	{
		$template = $config['template'] ?? '';
		$subject = $config['subject'] ?? '';

		// Aquí iría la lógica de envío de email
		// Usando el sistema existente de notificaciones

		return ['email_sent' => true, 'template' => $template];
	}
}
