<?php
if (!class_exists(WP_List_Table)) {
    require_once(ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
}

class animated_Accordion_edit_Table extends WP_List_Table {

    function __construct() {



        //Set parent defaults
        parent::__construct(
                array(
                    'ajax' => true
                )
        );
    }

//$animated_AccordionsListTable = new animated_Accordions_edit_Table();
    function column_default($item, $column_name) {
        switch ($column_name) {
            case 'id':
            case 'name':
            case 'title':
                return $item[$column_name];
            default: return print_r($item, true);
        }
    }

    function get_columns() {
        $columns = array(
            'cb' => '<input type="checkbox" />',
            'title' => 'Title',
            'name' => 'Animated Accordion Name',
        );
        return $columns;
    }

    function process_bulk_action() {
        global $wpdb;
        $table_name_animated_Accordion_content = $wpdb->prefix . 'animated_Accordion_panels';
        $ata_id = $_GET['ata_id'];
        if ('delete' === $this->current_action()) {
            $ids = isset($_REQUEST['id']) ? $_REQUEST['id'] : array();
            if (is_array($ids))
                $ids = implode(',', $ids);

            if (!empty($ids)) {
                $wpdb->query("DELETE FROM $table_name_animated_Accordion_content WHERE id IN($ids)");
                //wp_redirect('?page=add-new-panels');
            }
        }
    }

    function prepare_items() {
        global $wpdb;
        $table_name_animated_Accordion_content = $wpdb->prefix . 'animated_Accordion_panels';
        $columns = $this->get_columns();
        $hidden = array();
        $sortable = array();
        $id = $_GET['id'];
        $this->process_bulk_action();
        $this->_column_headers = array($columns, $hidden, $sortable);
        $per_page = 5;
        $paged = isset($_REQUEST['paged']) ? max(0, intval($_REQUEST['paged'] - 1) * 5) : 0;
        $current_page = $this->get_pagenum();
        $total_items = $wpdb->get_var("SELECT COUNT(id) FROM $table_name_animated_Accordion_content WHERE id_ata_id=$id");
        $this->set_pagination_args(array(
            'total_items' => $total_items,
            'per_page' => $per_page,
            'total_pages' => ceil($total_items / $per_page)
        ));

        $this->items = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name_animated_Accordion_content WHERE id_ata_id=$id LIMIT %d OFFSET %d", $per_page, $paged), ARRAY_A);
    }

    function prepare_items_after_delete() {
        global $wpdb;
        $table_name_animated_Accordion_content = $wpdb->prefix . 'animated_Accordion_panels';
        $columns = $this->get_columns();
        $hidden = array();
        $sortable = array();
        $id = $_GET['id'];
        $ata_id = $_GET['ata_id'];
        $this->process_bulk_action();
        $this->_column_headers = array($columns, $hidden, $sortable);
        $per_page = 5;
        $paged = isset($_REQUEST['paged']) ? max(0, intval($_REQUEST['paged'] - 1) * 5) : 0;
        $current_page = $this->get_pagenum();
        $total_items = $wpdb->get_var("SELECT COUNT(id) FROM $table_name_animated_Accordion_content WHERE id_ata_id=$ata_id");
        $this->set_pagination_args(array(
            'total_items' => $total_items,
            'per_page' => $per_page,
            'total_pages' => ceil($total_items / $per_page)
        ));

        $this->items = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name_animated_Accordion_content  LIMIT %d OFFSET %d", $per_page, $paged), ARRAY_A);
    }

    /* function get_bulk_actions() {
      $actions = array(
      'delete' => 'Delete'
      );
      return $actions;
      }
     */

    function column_cb($item) {
        return sprintf('<input type="checkbox" name="id[]" value="%s" />', $item['id']);
    }

    function column_title($item) {

        $actions = array(
            'edit' => sprintf('<a href="?page=%s&action=%s&id=%s&ata_id=%s">Edit</a>', 'edit-panel', 'edit', $item['id'], $item['id_ata_id']),
            'delete' => sprintf('<a href="?page=%s&action=%s&id=%s&ata_id=%s">Delete</a>', $_REQUEST['page'], 'delete', $item['id'], $item['id_ata_id']),
        );

        return sprintf('%1$s %2$s', $item['title'], $this->row_actions($actions, true));
    }

}

//function animated_Accordions_panlel_show() {

global $wpdb;
$animated_AccordionsListTable = new animated_Accordion_edit_Table();
echo '<div class="wrap"><h2 style="float:left;">Animated Accordion Panels</h2>';
echo '<button class="btn btn-primary" style="margin-top: 10px;"><a href="?page=animated-accordion" style="color:#fff;">Back To Accordions</a></button>';
$animated_AccordionsListTable->prepare_items();


$message = '';
if ('delete' === $animated_AccordionsListTable->current_action()) {
    $message = '<div class="updated below-h2" id="message"><p>' . sprintf('Items deleted: %d', count($_REQUEST['id'])) . '</p></div>';
    $animated_AccordionsListTable->prepare_items_after_delete();
}
echo $message;
?>
<form  method="GET" >
    <input type="hidden" name="page" value="<?php echo $_REQUEST['page'] ?>"/>
<?php $animated_AccordionsListTable->display(); ?>
</form>
<?php
echo '</div>';
//}
