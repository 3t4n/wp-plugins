<?php
namespace Pagup\Vidseo\Controllers;

use Pagup\Vidseo\Core\Plugin;

class NotificationController
{
    public function support() 
    {
        return Plugin::view('notices/support');
    }
}