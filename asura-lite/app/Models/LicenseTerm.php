<?php

namespace Asura\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class LicenseTerm extends Pivot {
    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'mysql';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'license_terms';
}
