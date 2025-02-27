<?php
namespace DaReactions\Pages;
use Closure;
use DaReactions\Options;
/**
 * Class SettingsPage
 * @package DaReactions\Pages
 */
class SettingsPage {
	/**
	 * @var string $current_tab
	 * Current tab identifier
	 *
	 * @since 3.1.1
	 */
	protected $current_tab = '';
	/**
	 * @var array $navigation
	 * List of tabs
	 */
	protected $navigation;
	/**
	 * @var Options $options
	 * The Options instance to manage page settings
	 *
	 * @since 1.0.0
	 */
	protected $options;
	/**
	 * @var string $options_group
	 * The name of the group for saved options
	 *
	 * @since 1.0.0
	 */
	protected $options_group;
	/**
	 * @var string $options_page
	 * The slug of the settings page in wich the options are managed
	 *
	 * @since 1.0.0
	 */
	protected $options_page;
	/**
	 * Page constructor.
	 *
	 * @param string $options_group
	 * @param string $section
	 *
	 * @since 1.0.0
	 */
	public function __construct( string $options_group, string $section ) {
		$this->options_group = $options_group . '_' . $section;
		$this->options_page  = $options_group . '_' . $section . '_page';
		$this->options       = Options::getInstance( $section );
	}
	/**
	 * Renders the main form for this page
	 *
	 * @since 1.0.0
	 */
	public function displayPage() {
		?>
        <form action="<?php echo 'options.php' ?>" method='post'>
	        <?php
	        settings_fields( $this->options_group );
	        $this->displayNavigationTabs();
	        do_settings_sections( $this->options_page );
	        submit_button();
	        ?>
        </form>
		<?php
		$this->displayLoaderOverlay();
	}
	public function displayLoaderOverlay() {
		?>
        <div class="da-spinner-wrapper">
            <div class="da-spinner"></div>
        </div><?php
	}
	public function displayNavigationTabs() {
		echo wp_kses( $this->getNavigationTabs(), 'post' );
	}
	/**
	 * Render function for navigation tabs
	 *
	 * @since 3.1.1
	 */
	public function getNavigationTabs() {
		if ( ! isset( $this->navigation ) || count( $this->navigation ) < 2 ) {
			return '';
		}
		$page = $this->options_group . '_settings';
		$op   = '<h2 class="nav-tab-wrapper">';
		foreach ( $this->navigation as $key => $nav ) {
			$url          = admin_url( "admin.php?page=$page&tab=$key" );
			$active_class = $this->current_tab === $key ? ' nav-tab-active' : '';
			$op           .= '<a href="' . $url . '" class="nav-tab' . $active_class . '">' . $nav['title'] . '</a >';
		}
		$op .= '</h2>';
		return $op;
	}
	/**
	 * Return generic checkbox render function
	 *
	 * @param $field_id
	 * @param $message
	 * @param array $attributes
	 *
	 * @return Closure
	 */
	public function makeCheckboxRenderer( $field_id, $message, array $attributes = array() ) {
		return function() use ( $field_id, $message, $attributes ) {
			$field_name  = $this->options->getFieldName( $field_id );
			$saved_value = $this->options->getOption( $field_id );
			$checked     = isset( $saved_value ) && $saved_value === 'on';
			?>
            <p>
                <input
                        type="hidden"
                        name="<?php echo esc_attr( $field_name ) ?>"
                        value="off"/>
                <input id="id_<?php echo esc_attr( $field_name ) ?>" type="checkbox"
                       name="<?php echo esc_attr( $field_name ) ?>"
	                <?php checked( $checked, 1 ) ?>
	                <?php
	                foreach ( $attributes as $key => $value ) {
		                echo esc_attr( $key ) . '="' . esc_attr( $value ) . '"';
	                }
	                ?>
                       value="on"/>
                <label for="id_<?php echo esc_attr( $field_name ) ?>"><?php echo esc_html( $message ) ?></label>
            </p>
			<?php
		};
	}
	/**
	 * Return generic section render function
	 *
	 * @param $message
	 *
	 * @return Closure
	 *
	 * @since 3.1.1
	 */
	public function makeSectionRenderer( $message ) {
		return static function() use ( $message ) {
			echo '<p>' . esc_html( $message ) . '</p>';
			echo '<hr>';
		};
	}
	/**
	 * Return generic select field render function
	 *
	 * @param $field_id
	 * @param $default
	 * @param $options
	 * @param array $attributes
	 *
	 * @return Closure
	 */
	public function makeSelectRenderer( $field_id, $default, $options, array $attributes = array() ) {
		return function() use ( $field_id, $default, $options, $attributes ) {
			$field_name  = $this->options->getFieldName( $field_id );
			$saved_value = $this->options->getOption( $field_id, $default );
			?>
            <p>
            <select
                    name="<?php echo esc_attr( $field_name ) ?>"
	            <?php
	            foreach ( $attributes as $key => $value ) {
		            echo esc_attr( $key ) . '="' . esc_attr( $value ) . '"';
	            } ?> >
	            <?php foreach ( $options as $value => $label ) { ?>
                    <option
                            value="<?php echo esc_attr( $value ) ?>" <?php echo( $saved_value === $value ? 'selected' : '' ) ?>>
	                    <?php echo esc_html( $label ) ?>
                    </option>
	            <?php } ?>
            </select>
			<?php
		};
	}
	/**
	 * Return generic input field render function
	 *
	 * @param $field_id
	 * @param $default
	 * @param array $attributes
	 *
	 * @return Closure
	 */
	public function makeTextfieldRenderer( $field_id, $default, $attributes = array() ) {
		return function() use ( $field_id, $default, $attributes ) {
			$field_name  = $this->options->getFieldName( $field_id );
			$saved_value = $this->options->getOption( $field_id, $default );
			?>
            <p>
                <input
                        id="id_<?php echo esc_attr( $field_name ) ?>"
	                <?php
	                foreach ( $attributes as $key => $value ) {
		                echo esc_attr( $key ) . '="' . esc_attr( $value ) . '"';
	                }
	                ?>
                        name="<?php echo esc_attr( $field_name ) ?>"
                        value="<?php echo esc_attr( $saved_value ) ?>"/>
            </p>
			<?php
		};
	}
}
