<?php
global $wpdb;
if(isset($_GET['type']) && $_GET['type'] == 'delete'){
    $chartId = intval($_GET['chartId']);
    $charts = new Charts();
    $charts->delete_chart($chartId);   
//    wp_redirect( get_admin_url().'admin.php?page=osnic_charts&msg=success' );
    echo "<script type='text/javascript'>window.location = '".get_admin_url()."admin.php?page=osnic_charts&msg=success' </script>";
}

if($_GET['msg'] == 'success'){
    ?>
    <div class="updated" >
        <p><?php _e( 'Chart has been deleted successfully', 'osnic_charts' ); ?></p>
    </div>
<?php
}

$chartsObj = new Charts();
$mycharts = $chartsObj->getCharts();

$pagenum = isset( $_GET['pagenum'] ) ? absint( $_GET['pagenum'] ) : 1;
$limit = 10;
echo '<div class="wrap chart_list_view">';

?>

<h3>Charts Library</h3>
<table id="osMychartstbl" class="widefat fixed">
    <tr>
        <th class="manage-column column-title check-column">Id</th>
        <th class="manage-column column-title column-columnname">Title</th>
        <th class="manage-column column-title column-columnname">Chart Type</th>
        <th class="manage-column column-title column-columnname">ShortCode</th>
        <th class="manage-column column-title column-columnname">Actions</th>
    </tr>
    <?php
    if($mycharts)
    {
    foreach($mycharts as $chart){
            $editUrl = admin_url('admin.php?page=osnic_add_charts&chartId='.$chart->id.'&type=edit');
     ?>
    <tr>
        <td><?php echo $chart->id; ?></td>
        <td><?php echo $chart->title ?></td>
        <td><?php echo $chart->type ?></td>
        <td><b><?php  echo '[osnic_charts id="'.$chart->id.'"]'; ?></b></td>
        <td><a href="<?php echo $editUrl; ?>">Edit</a> | <a href='admin.php?page=osnic_charts&chartId=<?php echo $chart->id; ?>&type=delete' onclick="return confirm_box()">Delete</a></td>
    </tr>
    <?php }
    }
    else
    {?>
    <tr>
        <td colspan="5" class="empty_recordset"><strong>No records found</strong></td>
    </tr>
    <?php } ?>
</table>
<script type="text/javascript">
    function confirm_box() {
      return confirm("Are you sure you want to delete");
    }
</script>
<?php

$total = $wpdb->get_var( "SELECT COUNT(`id`) FROM os_charts" );
$num_of_pages = ceil( $total / $limit );
$page_links = paginate_links( array(
	'base' => add_query_arg( 'pagenum', '%#%' ),
	'format' => '',
	'prev_text' => __( '&laquo;', 'aag' ),
	'next_text' => __( '&raquo;', 'aag' ),
	'total' => $num_of_pages,
	'current' => $pagenum
) );

if ( $page_links ) {
	echo '<div class="tablenav"><div class="tablenav-pages" style="margin: 1em 0">' . $page_links . '</div></div>';
}

echo '</div>';
?>
