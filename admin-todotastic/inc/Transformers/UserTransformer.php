<?php
namespace Brickdots\AdminTodotastic\Transformers;

use League\Fractal\TransformerAbstract;
use WP_User;

/**
 * CommentTansformer
 */
class UserTransformer extends TransformerAbstract {

    /**
     * Transform User
     * @param WP_User $user
     */
	public function transform(WP_User $user) {
	    return [
            'id'=>$user->ID,
            'email'=>$user->user_email,
            'display'=>$user->display_name,
            'username'=>$user->user_login
	    ];
	}
}
