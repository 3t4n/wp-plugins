<h2 class="plugin_heading">All <?php echo esc_attr( get_option('ssr_settings_ssr_item4') ); ?>(s)</h2>
<h3 class="arial_fonts">Tips 1: You can sort results by clicking the tab. Click twice to sort by ascending and descending order. <br>Tips 2: You can search from results by writing a value in the search box.</h3>
<h1 style="color:orange">The data shared by this plugin will be available publicly. So, this is <b>STRONGLY</b> recommended that you do not share any personal information of any person.</h1>

<?php

// Enqueue DataTables JavaScript
wp_enqueue_script(
	'datatables-js',
	'https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js', // Correct URL for DataTables JS
	array('jquery'),
	'1.13.5',
	true
);

// Enqueue DataTables CSS
wp_enqueue_style(
	'datatables-css',
	'https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css', // Correct URL for DataTables CSS
	array(),
	'1.13.5'
);


global $wpdb;
$student_count = $wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix.SSR_TABLE );
echo '<div id="dbinfo" class="arial_fonts">';
if ($student_count > 1) {
    echo esc_attr($student_count) . " " . esc_attr(get_option('ssr_settings_ssr_item4')) . "s are in Database";
} else {
    if ($student_count > 0) {
        echo esc_attr($student_count) . " " . esc_attr(get_option('ssr_settings_ssr_item4')) . " is in Database";
    } else {
        echo "No " . esc_attr(get_option('ssr_settings_ssr_item4')) . " is in Database";
    }
}
echo '</div><br><br>';

if ($student_count > 0) {
    // Create a table element that will be used by DataTables
    echo '<table id="example1" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>' . esc_html(get_option('ssr_settings_ssr_item9')) . '</th>
                    <th>' . esc_html(get_option('ssr_settings_ssr_item10')) . '</th>
                    <th>' . esc_html(get_option('ssr_settings_ssr_item11')) . '</th>
                    <th>' . esc_html(get_option('ssr_settings_ssr_item12')) . '</th>
                    <th>' . esc_html(get_option('ssr_settings_ssr_item13')) . '</th>
                    <th>' . esc_html(get_option('ssr_settings_ssr_item14')) . '</th>
                    <th>' . esc_html(get_option('ssr_settings_ssr_item15')) . '</th>
                </tr>
            </thead>
            <tbody>';

    $query = $wpdb->get_results("SELECT * FROM " . $wpdb->prefix . SSR_TABLE);
    foreach ($query as $row) {
        echo '<tr>
                <td>' . esc_html($row->rid) . '</td>
                <td>' . esc_html($row->roll) . '</td>
                <td>' . esc_html($row->stdname) . '</td>
                <td>' . esc_html($row->fathersname) . '</td>
                <td>' . esc_html($row->pyear) . '</td>
                <td>' . esc_html($row->cgpa) . '</td>
                <td>' . esc_html($row->subject) . '</td>
              </tr>';
    }

    echo '</tbody>
        </table>';
}
?>

<script>
jQuery(document).ready(function(jQuery) {
    // Initialize DataTable on the #example1 element
    jQuery('#example1').DataTable({
        // Optional: Add any specific configuration here if needed
		paging: false,
		scrollCollapse: true,
		scrollY: '50vh',
        "searching": true,
        "ordering": true,
        "info": true
    });

    // Load images when the window is fully loaded
    jQuery(window).on('load', function() {
        jQuery('#ssr_img_left_id').attr("src", "<?php echo SSR_PLUGIN_URL . '/img/arrow-left.png'; ?>");
        jQuery('#ssr_img_right_id').attr("src", "<?php echo SSR_PLUGIN_URL . '/img/arrow-right.png'; ?>");
    });
});
</script>
