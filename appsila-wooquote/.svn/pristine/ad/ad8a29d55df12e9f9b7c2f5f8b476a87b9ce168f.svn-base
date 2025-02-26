<?php
    /**
     * @desc independent files
     */
    include __DIR__ . ("/../Resources/wpScriptCSSImports.php");
    include __DIR__ . ("/../Resources/WebConfig.php"); // hardcoded values
    include __DIR__ . ("/../Resources/ConfigInternal.php"); // Hardcoded equalities
    include ('TransferInternal.php');// update, get , set Option request returns
    include ('WooQuoteHelper.php');// helps the main thread with its flows
    include __DIR__ .('/../WooQuoteSendData3.php'); //The function that sends the datas to database is included
    /**
     * @desc dependencies from independents files
     */
    include ('RequestMaker.php');//Makes Posts with own rules and shape Settings*Subscription*Coupon*label
    /**
     * @desc main files That dependent to many files
     */
    include __DIR__ . ("/../FlowsPHP/SettingSubscription.php");
?>
