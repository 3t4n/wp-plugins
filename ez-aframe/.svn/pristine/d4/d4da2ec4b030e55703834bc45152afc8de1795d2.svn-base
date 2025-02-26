<?php
define( "WPAFRAME_DB_VERSION", 0.1 );
require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );

class WpAframe_Project extends WP_List_Table {
    public static $table_name = "wpaframe_project";

    function __construct() {
        parent::__construct( array(
            'singular'  => 'wpaframe-project',
            'plural'    => 'wpaframe-project',
            'ajax'      => false
        ));

        $this->prepare_items();
    }

    /*
        Columns
    */

    public function get_columns() {
        $columns = array(
            'cb'                => '<input type="checkbox" />',
            'project_name'      => __( 'Name', 'aaaa' ),
            'project_created'   => __( 'Date Created' )
        );

        return $columns;
    }

    protected function get_sortable_columns()
    {
        $sortable_columns = array(
            'project_name'      => array( 'project_name', false ),
            'project_created'   => array( 'project_created', false )
        );

        return $sortable_columns;
    }

    protected function column_cb( $item )
    {
        return sprintf(
            '<input type="checkbox" name="pids[]" value="%s" />',
            intval( $item->project_id )
        );
    }

    protected function column_project_name( $item )
    {
        $nonce = wp_create_nonce($this->_args['singular']);
        $name = $item->project_name;
        $actions = array();
        $actions['edit'] = '<a href="' .
            admin_url( "admin.php?page=ez-aframe-add-new&pid=" . intval( $item->project_id ) ) .
            '"><strong>' .
            '<span class="dashicons dashicons-edit"></span> ' .
            __('Edit', 'supporthost-admin-table') .
            "</strong></a>";

        if( intval( $item->project_status ) >= 1 )
            $actions['trash'] = sprintf(
            '<a href="?page=%s&action=%s&pid=%s&paged=%s&_wpnonce=%s">' .
            '<span class="dashicons dashicons-trash"></span> ' .
            __('Trash', 'supporthost-admin-table') . '</a>',
            esc_attr( $_REQUEST['page'] ),
            'trash',
            intval( $item->project_id ),
            isset( $_REQUEST['paged'] ) ? intval( $_REQUEST['paged'] ) : 1,
            $nonce
        );
        else {
            $name = '<strike>' . $name . '</strike> <span class="dashicons dashicons-trash"></span>';
            $actions['restore'] = sprintf(
                '<a href="?page=%s&action=%s&pid=%s&paged=%s&_wpnonce=%s">' .
                '<span class="dashicons dashicons-undo"></span> ' .
                __('Restore', 'supporthost-admin-table') . '</a>',
                esc_attr( $_REQUEST['page'] ),
                'restore',
                intval( $item->project_id ),
                isset( $_REQUEST['paged'] ) ? intval( $_REQUEST['paged'] ) : 1,
                $nonce
            );
        }

        $actions['delete'] = sprintf(
            ' &nbsp; &nbsp; &nbsp; &nbsp; <a href="?page=%s&action=%s&pid=%s&paged=%s&_wpnonce=%s" title="%s"><strong>' .
            '<span class="dashicons dashicons-table-row-delete"></span> ' .
            __('Delete', 'supporthost-admin-table') . '</strong></a>',
            esc_attr( $_REQUEST['page'] ),
            'delete',
            intval( $item->project_id ),
            isset( $_REQUEST['paged'] ) ? intval( $_REQUEST['paged'] ) : 1,
            $nonce,
            "Will delete completely from database!"
        );

        return sprintf( '%1$s %2$s', $name, $this->row_actions( $actions ) );
    }

    public function column_default( $item, $column_name )
    {
        $item = json_decode( json_encode( $item ), true );
        return $item[$column_name];
    }

    /*
        Actions
    */

    protected function get_bulk_actions()
    {
        $actions = array(
            'trash_all'     => __( 'Trash', 'supporthost-admin-table' ),
            'delete_all'    => __( 'Delete', 'supporthost-admin-table' ),
            'restore_all'    => __( 'Restore', 'supporthost-admin-table' )
        );

        return $actions;
    }

    public function process_bulk_action() {
        $nonce = wp_unslash( $_REQUEST['_wpnonce'] );

        if ( ! wp_verify_nonce( $nonce, 'bulk-' . $this->_args['plural'] ) )
            return;

        if( $this->current_action() == 'trash_all' ) {
            if( isset( $_REQUEST['pids'] ) && count( $_REQUEST['pids'] ) > 0) {
                for ( $i = 0; $i <= count( $_REQUEST['pids'] ); $i++ ) {
                    self::Trash( intval( $_REQUEST['pids'][$i] ), 1 );
                }
            }
        }
        else if( $this->current_action() == 'delete_all' ) {
            if( isset( $_REQUEST['pids'] ) && count( $_REQUEST['pids'] ) > 0 ) {
                for ( $i = 0; $i <= count( $_REQUEST['pids'] ); $i++ ) {
                    self::Delete( intval( $_REQUEST['pids'][$i] ), 1 );
                }
            }
        }
        else if( $this->current_action() == 'restore_all' ) {
            if( isset( $_REQUEST['pids'] ) && count( $_REQUEST['pids'] ) > 0 ) {
                for ( $i = 0; $i <= count( $_REQUEST['pids'] ); $i++ ) {
                    self::Restore( intval( $_REQUEST['pids'][$i] ), 1 );
                }
            }
        }

    }

    public function process_action() {
        $nonce = wp_unslash( $_REQUEST['_wpnonce'] );

        if ( ! wp_verify_nonce( $nonce, $this->_args['singular'] ) ) {
            return;
        }

        if( $this->current_action() == 'delete' ) {
            if( isset( $_REQUEST['pid'] ) ) {
                self::Delete( intval( $_REQUEST['pid'] ), 1 );
            }
        }
        else if( $this->current_action() == 'trash' ) {
            if( isset( $_REQUEST['pid'] ) ) {
                self::Trash( intval( $_REQUEST['pid'] ), 1 );
            }
        }
        else if( $this->current_action() == 'restore' ) {
            if( isset( $_REQUEST['pid'] ) ) {
                self::Restore( intval( $_REQUEST['pid'] ), 1 );
            }
        }

    }

    protected function get_views(){
        $url = admin_url( "admin.php?page=ez-aframe" );
        if( !empty($_REQUEST['s'] ) )
            $url .= "&s=" . sanitize_text_field( $_REQUEST['s'] );

        $status_links = array(
            "all"       => __( '<a href="' . esc_url( $url ) . '">All</a>', 'my-plugin-slug' ),
            "published" => __( '<a href="' . esc_url( $url ) . '&status=1">Published</a>', 'my-plugin-slug' ),
            "trashed"   => __( '<a href="' . esc_url( $url ) . '&status=0">Trashed</a>', 'my-plugin-slug' )
        );
        return $status_links;
    }

    public function prepare_items() {
        global $wpdb, $_wp_column_headers;

        $columns = $this->get_columns();
        $hidden = array();
        $sortable = $this->get_sortable_columns();
        $primary  = 'Name';
        $this->_column_headers = array( $columns, $hidden, $sortable, $primary );

        $this->process_bulk_action();
        $this->process_action();

        $limit = 10;
        $datas = self::Search( array(
            "keywords" => !empty( $_REQUEST['s'] ) ? sanitize_text_field(trim( $_REQUEST['s'] )) : "",
            "start" => !empty( $_GET["paged"] ) ? ( intval( $_GET["paged"] ) - 1 ) * $limit : 0,
            "orderby" => !empty( $_GET["orderby"] ) ? sanitize_text_field(trim( $_GET["orderby"] )) : "project_id",
            "orderseq" => !empty( $_GET["order"] ) && sanitize_text_field(trim( $_GET["order"] )) == "desc" ? 0 : 1,
            "limit" => $limit,
            "status" =>  isset( $_GET["status"] ) ? intval( $_GET["status"] ) : -1,
            "select" => " project_name, project_created, project_user_id, project_id, project_status "
        ));

        $totalpages = ceil( $datas['total'] / $datas['perpage'] );

        $this->set_pagination_args( array(
            "total_items" => intval($datas['total']),
            "total_pages" => $totalpages,
            "per_page" => intval($datas['perpage'])
        ));

        $this->items = $datas['results'];
    }

    public static function get_url_query( $noS = false ) {

        $url = '?page=ez-aframe';
        if( !empty( $_REQUEST['paged'] ) )
            $url .= "&paged=" . intval( $_REQUEST['paged'] );
        if( !empty( $_REQUEST['status'] ) )
            $url .= "&status=" . intval($_REQUEST['status']);
        if( !$noS && !empty( $_REQUEST['s'] ) )
            $url .= "&s=" . sanitize_text_field($_REQUEST['s']);
        return $url;
    }

    /*
        Static and database function
    */

    public static function Insert( $data ) {
        global $wpdb;

        if( !isset( $data ) )
            $data = array();

        $data = array(
            "project_name" => !empty( $data['project_name'] ) ? $data['project_name'] : "No Title",
            "project_content" => !empty( $data['project_content'] ) ? $data['project_content'] : "",
            "project_description" => !empty( $data['project_description'] ) ? $data['project_description'] : "",
            "project_user_id" => intval( $data['project_user_id'] ) > 0 ? intval( $data['project_user_id'] ) : 1,
            "project_created" => date( 'Y-m-d H:i:s' ),
            "project_update" => date( 'Y-m-d H:i:s' ),
        );

        return $wpdb->insert( self::GetTableName(), $data );
    }

    public static function Update( $id, $data, $by = 0 ) {
        global $wpdb;

        if(!isset( $data ) || intval( $id ) <= 0 || intval( $by ) <= 0) {
            return false;
        }

        $sData = array();
        if( isset( $data['project_name'] ) )
            $sData['project_name'] = $data['project_name'];
        if( isset( $data['project_content'] ) )
            $sData['project_content'] = $data['project_content'];
        if( isset( $data['project_description'] ) )
            $sData['project_description'] = $data['project_description'];
        if( isset( $data['project_status'] ) )
            $sData['project_status'] = $data['project_status'];

        if( count( $sData ) > 0) {
            $where = array();
            $where["project_id"] = intval( $id );
            if(intval( $by ) != 1)
                $where["project_user_id"] = intval( $by );

            $where["project_id"] = intval( $id );
            $sData['project_update'] = date('Y-m-d H:i:s');
            return $wpdb->update( self::GetTableName(), $sData, $where );
        }

        return false;
    }

    public static function Trash($id, $by = 0) {
        return self::Update( $id, array(
            "project_status" => 0
        ), $by );
    }

    public static function Restore($id, $by = 0) {
        return self::Update( $id, array(
            "project_status" => 1
        ), $by );
    }

    public static function Delete($id, $by = 0) {
        global $wpdb;

        $where = array();
        $where["project_id"] = intval($id);
        if(intval($by) != 1)
            $where["project_user_id"] = intval($by);

        return $wpdb->delete( self::GetTableName(), $where );
    }

    public static function GetProject( $project_id, $select = "*" ) {
        global $wpdb;

        if( intval( $project_id ) > 0 ) {
            return $wpdb->get_row( $wpdb->prepare('SELECT ' . $select . ' FROM ' . self::GetTableName() . ' WHERE project_id=' . intval( $project_id ) ) );
        }
        else {
            return null;
        }
    }

    public static function Search( $args ) {
        global $wpdb;

        $args = wp_parse_args( $args, array (
            "keywords" => "",
            "orderby" => "project_id",
            "user_id" => 0,
            "datefrom" => "",
            "datefrom_ops" => ">",
            "dateto" => "",
            "dateto_ops" => "<",
            "start" => 0,
            "limit" => 20,
            "status" => -1,
            "select" => "*",
            "orderseq" => 1,      // 0 = DESC, 1 = ASC
        ));

        $keyword = !empty( $args['keywords'] ) ? ' project_name LIKE "%' . esc_sql( $args['keywords'] ) . '%" ' : "";
        $user = intval( $args['user_id'] ) > 0 ? ' project_user_id = ' . intval( $args['user_id'] ) : "";
        $status = intval( $args['status'] ) > -1 ? ' project_status = ' . intval( $args['status'] ) : "";

        // datetime gune date('Y-m-d H:i:s')..
        $datefilter = !empty( $args['datefrom'] ) ? ' project_created ' . ( !empty($args['datefrom_ops'] ) ? esc_sql( $args['datefrom_ops'] ) : ">" ) . esc_sql( $args['datefrom'] ) . ' ' : "";
        if( !empty( $datefilter ) ) $datefilter .= ( !empty( $args['datefrom'] ) ? " AND" : "" )
            . !empty( $args['dateto'] ) ?
            ' project_created ' . ( !empty( $args['dateto_ops'] ) ? esc_sql( $args['dateto_ops'] ) : ">" ) . esc_sql( $args['dateto'] ) . ' '
            : "";

        $orderBy = !empty( $args['orderby'] ) ? ' ORDER BY ' . esc_sql( $args['orderby'] ) . ' ' . ( intval( $args['orderseq'] ) > 0 ? 'ASC' : 'DESC' ) : "";
        $limit = ' LIMIT ' . ( intval( $args['limit'] ) > 0 ? intval( $args['limit'] ) : 20 );
        $offset = intval( $args['start'] ) > 0 ? ' OFFSET ' . intval( $args['start'] ) : "";

        $sql = 'SELECT ' . $args['select'] . ' FROM ' . self::GetTableName() . ' ';
        $countSql = 'SELECT COUNT(*) FROM ' . self::GetTableName() . ' ';

        if( !empty( $keyword ) || !empty( $user ) || !empty( $datefilter ) || !empty( $status ) ) {
            $where = trim( $keyword );
            $where .= ( !empty( trim( $user ) ) && !empty( trim( $where ) ) ? " AND " : "" ) . trim( $user );
            $where .= ( !empty( trim( $datefilter ) ) && !empty( trim( $where ) ) ? " AND " : "" ) . trim( $datefilter );
            $where .= ( !empty( trim( $status ) ) && !empty( trim( $where ) ) ? " AND " : "" ) . trim( $status );

            $sql .= ' WHERE ' . $where;
            $countSql .= ' WHERE ' . $where;
        }

        $rowcount = $wpdb->get_var( $wpdb->prepare( $countSql ) );

        $sql .= $orderBy . $limit . $offset;

        $results = $wpdb->get_results( $wpdb->prepare( $sql ) );
        return array(
            "results" => $results,
            "total" => $rowcount,
            "perpage" => ( intval( $args['limit'] ) > 0 ? intval( $args['limit'] ) : 20 )
        );
    }

    public static function UpdateDbCheck() {
        if ( intval( get_site_option( 'wpaframe_db_version', 0 ) ) < WPAFRAME_DB_VERSION ) {
            self::CreateTable();
        }
    }

    public static function GetTableName() {
        global $wpdb;
        return $wpdb->prefix . self::$table_name;
    }

    public static function CreateTable() {
        global $wpdb;
        $table_name = self::GetTableName();

        $sql = "CREATE TABLE " . $table_name . " (
      project_id bigint(20) NOT NULL AUTO_INCREMENT,
      project_user_id bigint(20) DEFAULT 1 NOT NULL,
      project_name tinytext NOT NULL,
      project_description TEXT NOT NULL,
      project_content MEDIUMTEXT NOT NULL,
      project_status int(2) DEFAULT 1,
      project_created datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
      project_update datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
      PRIMARY KEY  (project_id)
    );";

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );

        update_option( "wpaframe_db_version", WPAFRAME_DB_VERSION );
    }
}
