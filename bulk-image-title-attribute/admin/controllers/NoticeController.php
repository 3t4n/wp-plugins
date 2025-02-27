<?php
namespace Pagup\Bigta\Controllers;

use Pagup\Bigta\Core\Plugin;

require Plugin::path('vendor/persist-admin-notices-dismissal/persist-admin-notices-dismissal.php');

class NoticeController
{
    public function support() 
    {
        
        if ( ! \PAnD::is_admin_notice_active( 'bigta-rating-120' ) ) 
        {
            return;
        }

        return Plugin::view('notices/support');
    }
}