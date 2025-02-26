<?php
namespace Brickdots\AdminTodotastic\Transformers;

use League\Fractal\TransformerAbstract;
use Brickdots\AdminTodotastic\Models\Todo;
use WP_REST_Request;

/**
 * TodoTransformer
 */
class TodoTransformer extends TransformerAbstract {

    /* WP_REST_Request $request */
    private $request;

    /**
     * @param WP_REST_Request $request
     */
    public function __construct(WP_REST_Request $request) {
        $this->request = $request;
    }

    /**
     * Transform Todo
     * @param Todo $todo
     */
	public function transform(Todo $todo) {
	    $base =  [
            'id'=>$todo->id,
            'description'=>$todo->description,
            'position'=>$todo->position,
            'status'=>[
                'text'=>$todo->status->text,
                'label'=>$todo->status->label,
                'isDone'=>$todo->status->is_marked_as_done,
            ],
	    ];

        if (!empty($this->request->get_param('with'))) {
            $load = explode(',', $this->request->get_param('with')) ?? [];
        }

        if (in_array('post', $load)) {
            $base['post'] = [
                'link' => get_edit_post_link($todo->entity_id, null)
            ];
        }

        return $base;
	}
}
