<?php

use Attrace\Connector\Util\Queue;

include_once 'lib/Attr4ce_Constants.php';

class Attr4ce_Queue
{
    public function init()
    {
        //wp_schedule_event(time(), 'hourly', Attr4ce_Constants::QUEUE_HOOK);
        //set callable for invoking queue processing
        Queue::setCallable('\Attr4ce_Queue::invokeQueue');
    }

    /**
     * Callback, that is being invoked by Util\Queue
     */
    public static function invokeQueue()
    {
//        wp_schedule_single_event(time(), Attr4ce_Constants::QUEUE_HOOK);
//        spawn_cron();
    }
}
