<?php
namespace Brickdots\AdminTodotastic\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Status model
 */
class Status extends Model {
    protected $table = 'bdotstd_todo_statuses';

    /**
     * one status has many todos
     */
    public function todo() {
        return $this->hasMany('Brickdots\AdminTodotastic\Models\Todo', 'todo_id');
    }
}
