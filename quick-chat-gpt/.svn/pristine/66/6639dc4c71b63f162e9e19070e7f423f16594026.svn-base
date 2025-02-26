<?php
class QuickChatGPT {
    private $api_keys = array();

    public function __construct() {
        add_action( 'admin_menu', array( $this, 'create_menu' ) );
        add_action( 'admin_init', array( $this, 'register_settings' ) );
    }

    public function create_menu() {
        add_menu_page( 'Quick Chat GPT', 'Quick Chat GPT', 'manage_options', 'quick-chat-gpt', array( $this, 'settings_page' ), 'dashicons-admin-generic', 110 );
    }
 
    public function settings_page() {
        ?>
        <div class="wrap">
            <h1>Quick Chat GPT Settings</h1>
            <form method="post" action="options.php">
                <?php
                    settings_fields( 'quick_chat_gpt_options_group' );
                    do_settings_sections( 'quick-chat-gpt' );
                    submit_button();
                ?>
            </form>
        </div>
        <?php
    }

    public function register_settings() {
        register_setting( 'quick_chat_gpt_options_group', 'quick_chat_gpt_options', array( $this, 'options_sanitize' ) );
        add_settings_section( 'quick_chat_gpt_section', 'API Key and Position', '', 'quick-chat-gpt' );
        add_settings_field( 'api_key', 'API Key', array( $this, 'api_key_callback' ), 'quick-chat-gpt', 'quick_chat_gpt_section' );
        add_settings_field( 'position', 'Position', array( $this, 'position_callback' ), 'quick-chat-gpt', 'quick_chat_gpt_section' );
		add_settings_field( 'model_name', 'Model Name', array( $this, 'model_name_callback' ), 'quick-chat-gpt', 'quick_chat_gpt_section' );
		add_settings_field( 'temperature', 'Temperature', array( $this, 'temperature_callback' ), 'quick-chat-gpt', 'quick_chat_gpt_section' );
		add_settings_field( 'max_length', 'Maximum Length', array( $this, 'max_length_callback' ), 'quick-chat-gpt', 'quick_chat_gpt_section' );


    }
	public function options_sanitize( $input ) {
		$new_input = array();
		if( isset( $input['api_key'] ) )
			$new_input['api_key'] = esc_attr( $input['api_key'] );

		if( isset( $input['position'] ) )
			$new_input['position'] = esc_attr( $input['position'] );

		if( isset( $input['model_name'] ) )
			$new_input['model_name'] = esc_attr( $input['model_name'] );

		if( isset( $input['temperature'] ) )
			$new_input['temperature'] = esc_attr( $input['temperature'] );

		if( isset( $input['max_length'] ) )
			$new_input['max_length'] = esc_attr( $input['max_length'] );

		return $new_input;
	}

    public function api_key_callback() {
        $options = get_option( 'quick_chat_gpt_options' );
        ?>
        <input type="text" name="quick_chat_gpt_options[api_key]" value="<?php echo isset($options['api_key']) ? esc_attr( $options['api_key']) : ''; ?>" />
        <?php
    }
    
    public function position_callback() {
        $options = get_option( 'quick_chat_gpt_options' );
        ?>
        <select name="quick_chat_gpt_options[position]">
            <option value="left" <?php selected( isset($options['position']) ? esc_attr( $options['position']) : '' , 'left' ); ?>>Left</option>
            <option value="right" disabled <?php selected( isset($options['position']) ? esc_attr( $options['position']) : '', 'right' ); ?>>Right</option>
        </select>
        <?php
    }
	public function model_name_callback() {
	$options = get_option( 'quick_chat_gpt_options' );
	?>
	<select name="quick_chat_gpt_options[model_name]">
		<?php 
			$models = array("text-davinci-003", "babbage", "ada", "davinci", "text-davinci-001", "curie-instruct-beta", "code-cushman-001", "code-davinci-002", "text-ada-001", "text-davinci-002", "text-curie-001", "davinci-instruct-beta", "text-babbage-001", "curie");

			foreach($models as $model){
				echo '<option value="'.esc_attr($model).'" '.selected( isset($options['model_name']) ? esc_attr( $options['model_name']) : '', esc_attr($model) ).'>'.esc_attr($model).'</option>';
			}
		?>
	</select>
	<?php
	}
	public function temperature_callback() {
		$options = get_option( 'quick_chat_gpt_options' );
		?>
		<input type="text" min="0" max="1" name="quick_chat_gpt_options[temperature]" value="<?php echo isset($options['temperature']) ? esc_attr( $options['temperature']) : ''; ?>" />
		<p class="description">Minimum value is 0 and Maximum value is 1</p>
		<?php
	}
public function max_length_callback() {
        $options = get_option( 'quick_chat_gpt_options' );
        ?>
        <input type="text" min="100" max="3600" name="quick_chat_gpt_options[max_length]" value="<?php echo isset($options['max_length']) ? esc_attr( $options['max_length']) : ''; ?>" />
        <p class="description">Minimum value is 100 and Maximum value is 4000</p>
		<?php
    }

}

$quick_chat_gpt = new QuickChatGPT();