<?php namespace AffiliateLinkCloaker\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @see http://getherbert.com
 */
class Cloak extends Model {

    public $timestamps = false;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'affiliate_link_cloaker_cloaks';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['safe_page_id', 'redirect_url', 'status', 'redirect_type'];

    public function post(){
        return $this->belongsTo('Herbert\Framework\Models\Post', 'safe_page_id');
    }

    public function rules(){
        return $this->hasMany('AffiliateLinkCloaker\Models\Rule');
    }

}
