<?php

namespace SixStorageOnline;

final class Six_Storage_Init
{

    public static function Six_Storage_register_services()
    {
	    ( new Pages\Admin\Six_Storage_WpAdmin )->Six_Storage_WpAdmin_register();
	    ( new Base\Six_Storage_MoveInControllerSixStorage )->Six_Storage_MoveInController_register();
	    ( new Base\Six_Storage_SignInControllerSixStorage )->Six_Storage_SignInController_register();
	    ( new Base\Six_Storage_DashboardController )->Six_Storage_Dashboard_register();
	    ( new Base\Six_Storage_SignUpControllerSixStorage )->Six_Storage_Signupcontroller_register();
	    ( new Base\Six_Storage_EnquiryControllerSixStorage )->Six_Storage_EnquiryController_register();
	    ( new Base\Six_Storage_Enqueue )->Six_Storage_Enqueue_register();

	}


}
