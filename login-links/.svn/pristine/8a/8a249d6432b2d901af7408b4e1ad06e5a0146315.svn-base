<?php 

class LLUserTransientCleaner {

    /**
     * Hook into user registration and deletion to clear transients.
     */
    public static function init() {
        add_action('user_register', [__CLASS__, 'on_user_register'], 10, 1);
        add_action('delete_user', [__CLASS__, 'on_user_delete'], 10, 1);
    }

    /**
     * Clear transients when a user is registered.
     *
     * @param int $user_id ID of the newly registered user.
     */
    public static function on_user_register($user_id) {
        self::clear_user_transients();
    }

    /**
     * Clear transients when a user is deleted.
     *
     * @param int $user_id ID of the deleted user.
     */
    public static function on_user_delete($user_id) {
        self::clear_user_transients();
    }

    /**
     * Clear the user-related transients for total user count and user list.
     */
    private static function clear_user_transients() {
        delete_transient('ll_total_user_count'); // Clear the total user count transient
        delete_transient('ll_user_list'); // Clear the user list transient
    }

    /**
     * Reset the user-related transients. This function can be triggered manually
     * when you want to rebuild the user list and total user count.
     */
    public static function reset_user_transients() {
        self::clear_user_transients();
        self::rebuild_user_transients();
    }

    /**
     * Rebuild the user-related transients (user list and total user count).
     */
    private static function rebuild_user_transients() {
        $user_count = count_users();
        set_transient('ll_total_user_count', $user_count['total_users'], 3600);

        $users = get_users([
			'number' => 1000,
			'orderby' => 'ID', 
			'order' => 'ASC'
		]);
        set_transient('ll_user_list', $users, 3600);
    }
}
