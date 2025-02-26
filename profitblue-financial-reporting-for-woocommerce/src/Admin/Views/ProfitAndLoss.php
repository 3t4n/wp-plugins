<?php
namespace ProfitBlue\Admin;

use ProfitBlue\Enums\ProfitAndLoss;
use ProfitBlue\Admin\AdminPage;


$page = new AdminPage();
$page->set_config( ProfitAndLoss::get() );
$page->render();
