<?php
namespace ProfitBlue\Admin;

use ProfitBlue\Enums\DataSetting;
use ProfitBlue\Admin\AdminPage;


$page = new AdminPage();
$page->set_config( DataSetting::get() );
$page->render();
