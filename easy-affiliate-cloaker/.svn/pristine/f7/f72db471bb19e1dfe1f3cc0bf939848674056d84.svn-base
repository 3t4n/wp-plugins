<?php namespace AffiliateLinkCloaker\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @see http://getherbert.com
 */
class Visit extends Model {
    public $timestamps = false;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'affiliate_link_cloaker_visits';

    protected $dates = [
        'created_at'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['cloak_id', 'ip_address', 'country', 'region', 'city', 'mobile', 'isp', 'organization', 'as_number', 'redirected', 'error', 'device', 'platform', 'platform_version', 'browser', 'browser_version'];

}
