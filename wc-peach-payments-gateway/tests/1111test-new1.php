<?php class ActivationEventTest extends WP_UnitTestCase {

    const PLUGIN_BASENAME = 'var/www/html/peach-wp-plugins/wp-content/plugins/hello.php';

    public function testActivateWithSupport() {
        $this->factory()->user->create( [
            'user_email' => 'hello@world.org',
            'user_pass'  => 'reallyheavypasword',
            'user_login' => 'hello',
            'user_role'  => 4,
            'role'       => 4
        ] );

        do_action( 'activate_' . static::PLUGIN_BASENAME );

        $user = get_user_by( 'login', 'hello' );
        $this->assertEmpty( $user->caps );
        $this->assertEmpty( $user->roles );
    }
}

?>