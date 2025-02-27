<?php

/**
 * Ticket reply.
 */

defined('ABSPATH') || exit;

class Apbd_wps_ticket_reply extends AppsBDBaseModuleLite
{
    public function initialize()
    {
        parent::initialize();
        $this->disableDefaultForm();
        $this->AddAjaxAction("add", [$this, "add"]);

        $this->AddPortalAjaxAction("add", [$this, "add"]);
    }

    public function add()
    {
        $apiResponse = new Apbd_WPS_API_Response();
        $apiResponse->SetResponse(false, $this->__('Invalid request.'));

        $hasError = false;

        if (APPSBD_IsPostBack) {
            $ticket_id = absint(APBD_PostValue('ticket_id', ''));
            $is_private = sanitize_text_field(APBD_PostValue('is_private', ''));
            $reply_text = wp_kses_html(APBD_PostValue('reply_text', ''));
            $close = sanitize_text_field(APBD_PostValue('close', ''));

            $reply_text = stripslashes($reply_text);
            $check__reply_text = sanitize_text_field($reply_text);

            $ticket_id = strval($ticket_id);
            $is_private = 'Y' === $is_private ? 'Y' : 'N';
            $close = 'Y' === $close ? 'Y' : 'N';

            if (
                (1 > strlen($ticket_id)) ||
                (1 > strlen($check__reply_text))
            ) {
                $hasError = true;
            }

            if (!$hasError) {
                $namespace = APBDWPSupportLite::getNamespaceStr();
                $apiObj = new APBDWPSTicketAPI($namespace, false);

                $apiObj->SetPayload('ticket_id', $ticket_id);
                $apiObj->SetPayload('is_private', $is_private);
                $apiObj->SetPayload('reply_text', $reply_text);

                $resObj = $apiObj->ticket_reply();
                $resStatus = isset($resObj->status) ? rest_sanitize_boolean($resObj->status) : false;

                if ($resStatus) {
                    $apiResponse->SetResponse(true, $this->__('Successfully added.'));

                    if ('Y' === $close) {
                        $apiObj = new APBDWPSTicketAPI($namespace, false);

                        $apiObj->SetPayload('propName', 'status');
                        $apiObj->SetPayload('value', 'C');
                        $apiObj->SetPayload('ticketId', $ticket_id);

                        $resObj = $apiObj->update_ticket();
                        $resStatus = isset($resObj->status) ? rest_sanitize_boolean($resObj->status) : false;

                        if ($resStatus) {
                            $apiResponse->SetResponse(true, $this->__('Successfully added & closed.'));
                        }
                    }
                } else {
                    $apiResponse->SetResponse(false, $this->__('Something went wrong.'));
                }
            } else {
                $apiResponse->SetResponse(false, $this->__('Invalid data.'));
            }
        }

        echo wp_json_encode($apiResponse);
    }
}
