<?php
namespace Brickdots\AdminTodotastic\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Corcel\Model\User;
use Corcel\Model\Post;
use Brickdots\AdminTodotastic\Models\Status;

/**
 * Todo model
 */
class Todo extends Model {
    use SoftDeletes;

    protected $table = 'bdotstd_todos';

    protected $fillable = ['description', 'entity_id', 'author_id', 'position', 'status_id'];

    /**
     * a todo has only one author
     */
    public function author() {
        return $this->belongsTo(User::class, 'author_id');
    }

    /**
     * a todo has many mentioned users
     */
    public function mentions() {
        return $this->belongsToMany(User::class, 'bdotstd_todo_mentions', 'todo_id', 'user_id')->withTimestamps();
    }

    /**
     * a todo has only one status
     */
    public function status() {
        return $this->belongsTo(Status::class, 'status_id');
    }

    /**
     * a todo attaches to a post or other entity
     */
    public function entity() {
        if ($this->entity_type === 'post') {
            return Post::find($this->entity_id);
        }
        return null;
    }
}
