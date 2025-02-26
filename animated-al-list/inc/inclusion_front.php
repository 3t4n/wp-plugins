<?php
namespace animated_al;

defined('ABSPATH') or die("No script hack please!");

//Common settings
require_once dirname(__FILE__).'/../cfg/cfg.php';

//Common
if (!class_exists('AnimatedAl_Base'))
require_once dirname(__FILE__).'/base.class.php';

if (!class_exists('AnimatedAl_Users_Common'))
require_once dirname(__FILE__).'/userscommon.class.php';

if (!class_exists('AnimatedAl_Db'))
require_once dirname(__FILE__).'/db.class.php';

if (!class_exists('AnimatedAl_CacheDb'))
require_once dirname(__FILE__).'/cachedb.class.php';

if (!class_exists('AnimatedAl_View'))
require_once dirname(__FILE__).'/view.class.php';

if (!class_exists('AnimatedAl_Controller'))
require_once dirname(__FILE__).'/controller.class.php';

if (!class_exists('AnimatedAl_Model'))
require_once dirname(__FILE__).'/model.class.php';

if (!class_exists('AnimatedAl_Helper'))
require_once dirname(__FILE__).'/helper.php';

if (!class_exists('AnimatedAl_Widget_List'))
require_once dirname(__FILE__).'/widget_list.class.php';

//Models

if (!class_exists('Model_Main'))
require_once dirname(__FILE__).'/../front_classes/models/main.php';


//Controllers

if (!class_exists('Controller_Main'))
require_once dirname(__FILE__).'/../front_classes/controllers/main.php';


//Additional
require_once dirname(__FILE__).'/actions_front.php';
?>