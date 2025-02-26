<?php
if (isset($_POST['visible'])) {
    $visible = $_POST['visible'] ? 1 : 0;
    global $wpdb;
    $table_name = $wpdb->prefix . 'agenda_virtual';
    $wpdb->update($table_name, array('Data' => $visible), array('Features' => 'visible'));
}
?>
