<?php

class Ampsy_Router {
	public function redirect( $url ) {
		wp_redirect( $url );
	}

	public function redirect_to_settings_page() {
		wp_redirect( $this->plugin_settings() );
		exit;
	}

	public function plugin_settings() {
		return admin_url( 'admin.php?page=ampsy_widgets' );
	}

	public function widget_url( $id ) {
		return "https://fliptu-wordpress.herokuapp.com/widgets/$id";
	}

	public function settings_url( $key ) {
		return "https://fliptu-wordpress.herokuapp.com/$key";
	}

	public function widgets_json_url( $key ) {
		return "https://fliptu-wordpress.herokuapp.com/$key.json";
	}
}

?>
