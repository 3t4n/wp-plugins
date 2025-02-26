<?php

class WPPT_Pricing_Table_Admin {

    /**
     * @var Singleton The reference the *Singleton* instance of this class
     */
    private static $instance;

    /**
     * Returns the *Singleton* instance of this class.
     *
     * @return Singleton The *Singleton* instance.
     */
    public static function get_instance() {
        if ( null === self::$instance ) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Protected constructor to prevent creating a new instance of the
     * *Singleton* via the `new` operator from outside of this class.
     */
    public function __construct() {
        add_action( 'add_meta_boxes', array( $this, 'add_custom_meta_boxes' ), 10, 2 );
        add_action( 'admin_print_scripts', array( $this, 'get_data' ) );
        add_action( 'save_post', array( $this, 'save_post_data' ) );
        add_action( 'admin_head', function () {
            $this->pricing_templates();
        } );
    }

    public function add_custom_meta_boxes( $post_type, $post) {
        if( $post_type != 'wppt_pricing_table' ) return;
        add_meta_box(
            'wppt-shortcode',
            __( 'Shortcode', 'wppt' ),
            array( $this, 'render_shortcode' ),
            $post_type,
            'normal',
            'default'
        );
        add_meta_box(
            'wppt-table-template-list',
            __( 'Templates', 'wppt' ),
            array( $this, 'render_pricing_table_template_list' ),
            $post_type,
            'normal',
            'default'
        );
        add_meta_box(
            'wppt-table-settings',
            __( 'Pricing Table', 'wppt' ),
            array( $this, 'render_pricing_table_panel' ),
            $post_type,
            'normal',
            'default'
        );
    }
    public function render_shortcode( $post, $metabox ) {
        ?>
        <div>
            <?php _e( 'Paste this following shortcode in editor', 'wppt' ); ?>
            <input type="text" readonly value="[wppt_pricing_table id='<?php echo $post->ID; ?>']"><br>
            <?php
            _e( 'Or, place this following shortcode inside your php file inside php tags');
            ?>
            <input type="text" readonly value="do_shortcode( '[wppt_pricing_table id=<?php echo $post->ID; ?>]')"><br>
        </div>
        <?php
    }

    public function render_pricing_table_template_list( $post, $metabox ) {
        ?>
        <div class="wppt-template-list">
            <label><input type="radio" v-model="d.template" value="wppt_sonam"> <img src="<?php echo WPPT_ASSET_PATH.'/images/templates/sonam.png'?>" width="150" alt=""></label>
            <label><input type="radio" v-model="d.template" value="wppt_jinpa"> <img src="<?php echo WPPT_ASSET_PATH.'/images/templates/jinpa.png'?>" width="150" alt=""></label>
            <label><input type="radio" v-model="d.template" value="wppt_tenzin"> <img src="<?php echo WPPT_ASSET_PATH.'/images/templates/tenzin.png'?>" width="150" alt=""></label>
            <label><input type="radio" v-model="d.template" value="wppt_yama"> <img src="<?php echo WPPT_ASSET_PATH.'/images/templates/yama.png'?>" width="150" alt=""></label>
        </div>
        <?php
    }

    public function render_pricing_table_panel( $post, $metabox ) {
        ?>
        <input type="hidden" name="wppt_pricing_table_data" v-model="wppt_pricing_table_data">
        <div id="wppt-pricing-table-panel">
            <h1>Pricing table data</h1>
            <pricing_table_panel :settings_data="d.settings"></pricing_table_panel>
            <wppt_sonam v-if="d.template == 'wppt_sonam'" :tables.sync="d.tables"></wppt_sonam>
            <wppt_jinpa v-if="d.template == 'wppt_jinpa'" :tables.sync="d.tables"></wppt_jinpa>
            <wppt_tenzin v-if="d.template == 'wppt_tenzin'" :tables.sync="d.tables"></wppt_tenzin>
            <wppt_yama v-if="d.template == 'wppt_yama'" :tables.sync="d.tables"></wppt_yama>
            <?php do_action( 'wppt_after_pricing_table_panel' ); ?>
        </div>
<?php
    }

    public function get_data() {
        $wppt_pricing_table_data = get_post_meta( get_the_ID(), 'wppt_pricing_table_data', true );

        if( $wppt_pricing_table_data ) {
            $wppt_pricing_table_data = json_decode( stripslashes( base64_decode( $wppt_pricing_table_data ) ), true );
            !is_array( $wppt_pricing_table_data ) ? $wppt_pricing_table_data = array() : '';
        }

        ?>
        <script>
            var $wppt_pricing_table_data = JSON.parse('<?php echo json_encode( $wppt_pricing_table_data ? $wppt_pricing_table_data : array() ); ?>');
        </script>
        <?php
    }

    public function save_post_data( $post_id ) {
        if( isset( $_POST['wppt_pricing_table_data'] ) && is_string( $_POST['wppt_pricing_table_data'] ) ) {
            $wppt_pricing_table_data = $_POST['wppt_pricing_table_data'];
            //pri();
            $wppt_pricing_table_data = base64_encode(($wppt_pricing_table_data));
            if( $wppt_pricing_table_data ) {
                update_post_meta( $post_id, 'wppt_pricing_table_data', $wppt_pricing_table_data );
            }
            //pri($wppt_pricing_table_data);
        }
    }
    public function pricing_templates() {
        include_once 'pricing-templates.php';
    }
}

WPPT_Pricing_Table_Admin::get_instance();

