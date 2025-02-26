<?php

namespace Asura\Http\Controllers\Admin;

use Asura\Http\Controllers\Controller;

class LicenseController extends Controller {
    public function __invoke() {
        return view( 'admin.pages.license.index' );
    }
}
