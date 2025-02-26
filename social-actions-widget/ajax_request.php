<?php
require_once( dirname( __FILE__ ) . '/SocialActionRequest.class.php' );
require_once( dirname( __FILE__ ) . '/SocialActionPort.class.php' );

$objRequest = new SocialActionRequest();
$objRequest->addWord( $_POST['words'] )
		   ->setLimit( $_POST['count'] );
$objActionsArray = SocialActionPort::getResponse( $objRequest );

include_once( dirname( __FILE__ ) . '/actions.tpl.php' );