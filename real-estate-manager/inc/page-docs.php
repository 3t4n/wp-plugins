<div class="wrap ich-settings-main-wrap">
	<h2><?php _e( 'Shortcodes', 'wcp-rem' ); ?></h2>
	<dl>
		<dt><code>[rem_register_agent]</code></dt>
		<dd><?php _e( 'It will render a form to register new agent', 'wcp-rem' ); ?></dd>
	</dl>

	<dl>
		<dt><code>[rem_create_property]</code></dt>
		<dd><?php _e( 'It will render a form to create a property.', 'wcp-rem' ); ?></dd>
	</dl>

	<dl>
		<dt><code>[rem_agent_login]</code></dt>
		<dd><?php _e( 'It will render a form to login an agent.', 'wcp-rem' ); ?></dd>
	</dl>

	<dl>
		<dt><code>[rem_my_properties]</code></dt>
		<dd><?php _e( 'It will render a list of properties of current logged in user.', 'wcp-rem' ); ?></dd>
	</dl>

	<dl>
		<dt><code>[rem_search_property]</code></dt>
		<dd><?php _e( 'It will render a form to search properties via AJAX.', 'wcp-rem' ); ?></dd>
	</dl>

	<dl>
		<dt><code>[rem_list_properties]</code></dt>
		<dd><?php _e( 'It will render a list of recent properties.', 'wcp-rem' ); ?></dd>
	</dl>

	<h2><?php _e( 'Nested Shortcodes', 'wcp-rem' ); ?></h2>
	
	<dl>
		<dt><code>[rem_create_property][rem_agent_login heading="Please login below to create property" redirect="http://rem.webcodingplace.com/create-property/"][/rem_create_property]</code></dt>
		<dd><?php _e( 'It will render form to create new property if user is logged in, otherwise it will render a login form.', 'wcp-rem' ); ?></dd>
	</dl>

	<dl>
		<dt><code>[rem_register_agent]You'e already logged in![/rem_register_agent]</code></dt>
		<dd><?php _e( 'It will render a form to register new agent if not already logged in, otherwise it will display the inner message.', 'wcp-rem' ); ?></dd>
	</dl>

	<dl>
		<dt><code>[rem_my_properties][rem_agent_login heading="Please login below to see your properties" redirect="http://rem.webcodingplace.com/create-property/"][/rem_my_properties]</code></dt>
		<dd><?php _e( 'It will display properties of logged in agent, otherwise renders a login form.', 'wcp-rem' ); ?></dd>
	</dl>

</div>