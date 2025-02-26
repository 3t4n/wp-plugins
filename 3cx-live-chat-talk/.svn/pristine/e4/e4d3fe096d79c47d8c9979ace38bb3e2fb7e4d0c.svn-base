<?php

class WP3CXC2C_Editor {

	private $clicktotalk_form;
	private $panels = array();

	public function __construct( WP3CXC2C_ClickToTalkForm $clicktotalk_form ) {
		$this->clicktotalk_form = $clicktotalk_form;
	}

	public function add_panel( $id, $title, $callback ) {
		if ( wp3cxc2c_is_name( $id ) ) {
			$this->panels[$id] = array(
				'title' => $title,
				'callback' => $callback,
			);
		}
	}

	public function display() {
		if ( empty( $this->panels ) ) {
			return;
		}

		echo '<ul id="clicktotalk-form-editor-tabs">';

		foreach ( $this->panels as $id => $panel ) {
			echo sprintf( '<li id="%1$s-tab"><a href="#%1$s">%2$s</a></li>',
				esc_attr( $id ), esc_html( $panel['title'] ) );
		}

		echo '</ul>';

		foreach ( $this->panels as $id => $panel ) {
			echo sprintf( '<div class="clicktotalk-form-editor-panel" id="%1$s">',
				esc_attr( $id ) );

			if ( is_callable( $panel['callback'] ) ) {
				$this->notice( $id, $panel );
				call_user_func( $panel['callback'], $this->clicktotalk_form );
			}

			echo '</div>';
		}
	}

	public function notice( $id, $panel ) {
		echo '<div class="config-error"></div>';
	}
}

function wp3cxc2c_editor_panel_config( $post ) {
	wp3cxc2c_editor_box_config( $post );
}

function wp3cxc2c_editor_box_config( $post, $args = '' ) {
	$args = wp_parse_args( $args, array(
		'id' => 'wp3cxc2c-config',
		'name' => 'config',
		'title' => __( 'Configuration', '3cx-clicktotalk' ),
		'use' => null,
	) );

	$id = esc_attr( $args['id'] );

	$config = wp_parse_args( $post->prop( $args['name'] ), array(
		'active' => false,
		'pbxurl' => '',
		'aspect' => 'both',
		'enablevideo' => false,
		'minimized' => false,
		'requireidentity' => 'none',
		'chatboxtitle' => 'Let\'s chat',
		'phoneboxtitle' => 'Call Us',
		'welcomemessage' => 'Hello, how can we help?',
		'welcomemessagesender' => 'Support'
	) );

?>
<div class="clicktotalk-form-editor-box-config" id="<?php echo $id; ?>">
<h2><?php echo esc_html( $args['title'] ); ?></h2>

<fieldset>
<legend>
<?php
	$desc_link = wp3cxc2c_link(
		__( 'https://www.3cx.com/setting-up-mail/', '3cx-clicktotalk' ),
		__( 'Setting Up Mail', '3cx-clicktotalk' ) );
?>
</legend>
<table class="form-table">
<tbody>
	<tr>
	<th scope="row">
		<label for="<?php echo $id; ?>-pbxurl"><?php echo esc_html( __( '3CX Click2Talk URL', '3cx-clicktotalk' ) ); ?>&nbsp;
		<img src="<?php echo wp3cxc2c_plugin_url('images/info.png');?>" alt="info" class="tcxhint" title="<?php echo esc_html(__('From Management Console / Extensions, select extension you want to associate, go to Click2Talk/Click2Meet tab, enable Click2Talk, copy URL and paste it here. (Example: https://example.3cx.eu:5001/callus#test)','3cx-clicktotalk'));?>"/></label>
	</th>
	<td>
		<input type="text" id="<?php echo $id; ?>-pbxurl" name="<?php echo $id; ?>[pbxurl]" class="large-text code" size="70" value="<?php echo esc_attr( $config['pbxurl'] ); ?>" data-config-field="<?php echo sprintf( '%s.pbxurl', esc_attr( $args['name'] ) ); ?>" />
	</td>
	</tr>
	
	<tr>
	<th scope="row">
		<label for="<?php echo $id; ?>-aspect"><?php echo esc_html( __( 'Mode', '3cx-clicktotalk' ) ); ?>
		<img src="<?php echo wp3cxc2c_plugin_url('images/info.png');?>" alt="info" class="tcxhint" title="<?php echo esc_html(__('You can choose to enable phone call, chat or both in popup dialog.','3cx-clicktotalk'));?>"/></label>
	</th>
	<td>
		<select id="<?php echo $id; ?>-aspect" name="<?php echo $id; ?>[aspect]" class="large-text code" value="<?php echo esc_attr( $config['aspect'] ); ?>" data-config-field="<?php echo sprintf( '%s.aspect', esc_attr( $args['name'] ) ); ?>">
			<option value="both"<?php if ($config['aspect']=='both') {echo " selected";}?>>Chat and Phone</option>
			<option value="chat"<?php if ($config['aspect']=='chat') {echo " selected";}?>>Chat only</option>
			<option value="phone"<?php if ($config['aspect']=='phone') {echo " selected";}?>>Phone only</option>
		</select>
	</td>
	</tr>	
	
	<tr>
	<th scope="row">
		<label for="<?php echo $id; ?>-chatboxtitle"><?php echo esc_html( __( 'Chat box window title', '3cx-clicktotalk' ) ); ?>
		<img src="<?php echo wp3cxc2c_plugin_url('images/info.png');?>" alt="info" class="tcxhint" title="<?php echo esc_html(__('This is the title of chat box panel.','3cx-clicktotalk'));?>"/></label>
	</th>
	<td>
		<input type="text" id="<?php echo $id; ?>-chatboxtitle" name="<?php echo $id; ?>[chatboxtitle]" class="large-text code" size="70" value="<?php echo esc_attr( $config['chatboxtitle'] ); ?>" data-config-field="<?php echo sprintf( '%s.chatboxtitle', esc_attr( $args['name'] ) ); ?>" />
	</td>
	</tr>	

	<tr>
	<th scope="row">
		<label for="<?php echo $id; ?>-welcomemessage"><?php echo esc_html( __( 'Welcome message', '3cx-clicktotalk' ) ); ?>
		<img src="<?php echo wp3cxc2c_plugin_url('images/info.png');?>" alt="info" class="tcxhint" title="<?php echo esc_html(__('This is welcome chat message automatically sent when session begins. ','3cx-clicktotalk'));?>"/></label>
	</th>
	<td>
		<input type="text" id="<?php echo $id; ?>-welcomemessage" name="<?php echo $id; ?>[welcomemessage]" class="large-text code" size="70" value="<?php echo esc_attr( $config['welcomemessage'] ); ?>" data-config-field="<?php echo sprintf( '%s.welcomemessage', esc_attr( $args['name'] ) ); ?>" />
	</td>
	</tr>	

	<tr>
	<th scope="row">
		<label for="<?php echo $id; ?>-welcomemessagesender"><?php echo esc_html( __( 'Sender Name', '3cx-clicktotalk' ) ); ?>
		<img src="<?php echo wp3cxc2c_plugin_url('images/info.png');?>" alt="info" class="tcxhint" title="<?php echo esc_html(__('This is the sender of welcome chat message,','3cx-clicktotalk'));?>"/></label>
	</th>
	<td>
		<input type="text" id="<?php echo $id; ?>-welcomemessagesender" name="<?php echo $id; ?>[welcomemessagesender]" class="large-text code" size="70" value="<?php echo esc_attr( $config['welcomemessagesender'] ); ?>" data-config-field="<?php echo sprintf( '%s.welcomemessagesender', esc_attr( $args['name'] ) ); ?>" />
	</td>
	</tr>	
	
	<tr>
	<th scope="row">
		<label for="<?php echo $id; ?>-phoneboxtitle"><?php echo esc_html( __( 'Phone call hover text', '3cx-clicktotalk' ) ); ?>
		<img src="<?php echo wp3cxc2c_plugin_url('images/info.png');?>" alt="info" class="tcxhint" title="<?php echo esc_html(__('This is the hint text appearing when hovering phone icon, when selected feature is phone only.','3cx-clicktotalk'));?>"/></label>
	</th>
	<td>
		<input type="text" id="<?php echo $id; ?>-phoneboxtitle" name="<?php echo $id; ?>[phoneboxtitle]" class="large-text code" size="70" value="<?php echo esc_attr( $config['phoneboxtitle'] ); ?>" data-config-field="<?php echo sprintf( '%s.phoneboxtitle', esc_attr( $args['name'] ) ); ?>" />
	</td>
	</tr>		
	
	<tr>
	<th scope="row">
		<label for="<?php echo $id; ?>-enablevideo"><?php echo esc_html( __( 'Enable video call', '3cx-clicktotalk' ) ); ?>
		<img src="<?php echo wp3cxc2c_plugin_url('images/info.png');?>" alt="info" class="tcxhint" title="<?php echo esc_html(__('When this option is enabled, video call is started instead of standard audio phone call.','3cx-clicktotalk'));?>"/></label>
	</th>
	<td>
		<input type="checkbox" id="<?php echo $id; ?>-enablevideo" name="<?php echo $id; ?>[enablevideo]" class="code" <?php if ($config['enablevideo']) echo ' checked';?> data-config-field="<?php echo sprintf( '%s.enablevideo', esc_attr( $args['name'] ) ); ?>" />
	</td>
	</tr>		
	
		<tr>
	<th scope="row">
		<label for="<?php echo $id; ?>-requireidentity"><?php echo esc_html( __( 'User identification form', '3cx-clicktotalk' ) ); ?>
		<img src="<?php echo wp3cxc2c_plugin_url('images/info.png');?>" alt="info" class="tcxhint" title="<?php echo esc_html(__('You can choose what to ask to users before initiating a chat or call session.','3cx-clicktotalk'));?>"/></label>
	</th>
	<td>
		<select id="<?php echo $id; ?>-requireidentity" name="<?php echo $id; ?>[requireidentity]" class="large-text code" value="<?php echo esc_attr( $config['requireidentity'] ); ?>" data-config-field="<?php echo sprintf( '%s.requireidentity', esc_attr( $args['name'] ) ); ?>">
			<option value="none"<?php if ($config['requireidentity']=='none') {echo " selected";}?>>None</option>
			<option value="name"<?php if ($config['requireidentity']=='name') {echo " selected";}?>>Name only</option>
			<option value="email"<?php if ($config['requireidentity']=='email') {echo " selected";}?>>Email only</option>
			<option value="both"<?php if ($config['requireidentity']=='both') {echo " selected";}?>>Name and Email</option>
		</select>
	</td>
	</tr>	
	
	<tr>
	<th scope="row">
		<label for="<?php echo $id; ?>-minimized"><?php echo esc_html( __( 'Load minimized', '3cx-clicktotalk' ) ); ?>
		<img src="<?php echo wp3cxc2c_plugin_url('images/info.png');?>" alt="info" class="tcxhint" title="<?php echo esc_html(__('When this option is enabled, chat/call form is display minimized.','3cx-clicktotalk'));?>"/></label>
	</th>
	<td>
		<input type="checkbox" id="<?php echo $id; ?>-minimized" name="<?php echo $id; ?>[minimized]" class="code" <?php if ($config['minimized']) echo ' checked';?> data-config-field="<?php echo sprintf( '%s.minimized', esc_attr( $args['name'] ) ); ?>" />
	</td>
	</tr>			
		
</tbody>
</table>
</fieldset>
</div>
<?php
}

