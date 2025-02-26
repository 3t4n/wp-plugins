<?php
global $wpdb;
$table = $wpdb->prefix . 'aplbcp_products_list';

$pagenum = isset($_GET['pagenum']) ? absint($_GET['pagenum']) : 1;

$limit = 20; // number of rows in page
$offset = ($pagenum - 1) * $limit;

if (isset($_POST['s'])) {
    $searchText = sanitize_text_field($_POST['s']);
    $aplbcpProductListSql = "SELECT * FROM $table WHERE product_list_name like '%$searchText%' OR product_id='$searchText' ORDER BY product_id DESC LIMIT $offset, $limit";

    $total = $wpdb->get_var("SELECT COUNT(`product_id`) FROM $table WHERE product_list_name like '%$searchText%' OR product_id='$searchText'");
    $num_of_pages = ceil($total / $limit);
} else {
    $aplbcpProductListSql = "SELECT * FROM $table ORDER BY product_id DESC LIMIT $offset, $limit";
    $total = $wpdb->get_var("SELECT COUNT(`product_id`) FROM $table");
    $num_of_pages = ceil($total / $limit);
}


$aplbcpProductListRow = $wpdb->get_results($aplbcpProductListSql);
?>

<div id="wpbody" role="main">
    <div id="wpbody-content">
        <div class="aplbcp-product-list">
            <h1 class="wp-heading-inline" style="display: inline-block;">Products List</h1>
            <a href="admin.php?page=aplbcp_addnew" class="addNewButton">Add New</a>
            <?php
            if(isset($_GET['success']) && $_GET['success']=="1")
            {
            ?>
            <div class="aplbcp-alert-success">
                Products List Added Successfully!
            </div>
            <?php
            }

            if(isset($_GET['updatedsuccess']) && $_GET['updatedsuccess']=="1")
            {
            ?>
            <div class="aplbcp-alert-success">
                Products List Updated Successfully!
            </div>
            <?php
            }

            if(isset($_GET['deletesuccess']) && $_GET['deletesuccess']=="1")
            {
            ?>
            <div class="aplbcp-alert-success">
                Products List Deleted Successfully!
            </div>
            <?php
            }            
            if(isset($_GET['success']) && $_GET['success']=="0")
            {
            ?>
            <div class="aplbcp-alert-errors">
                Something Went Wrong.
            </div>
            <?php
            }
            ?>

            <form action="" method="post">
                <p class="search-box aplbcp-product-list-search">
                    <input type="search" id="post-search-input" name="s" value="<?php if (isset($searchText)) {
                                                                                    echo esc_attr($searchText);
                                                                                } ?>">
                    <input type="submit" id="search-submit" class="button" value="Search Product List">
                </p>
            </form>
            <table class="wp-list-table widefat fixed striped table-view-list aplbcp-product-list-table">
                <tr>
                    <th style="width: 30px;">#</th>
                    <th>Product List Name</th>
                    <th>Shortcode</th>
                </tr>
                <?php
                if(isset($aplbcpProductListRow[0]))
                {
                $i = 1;
                foreach ($aplbcpProductListRow as $aplbcpProductList) {
                ?>
                    <tr>
                        <td><?php echo esc_attr($i++); ?></td>
                        <td class="">
                            <a href="admin.php?page=aplbcp-products-edit&product_id=<?php echo esc_attr($aplbcpProductList->product_id); ?>">
                                <strong>
                                    <?php echo esc_attr($aplbcpProductList->product_list_name); ?>
                                </strong>
                            </a>
                            <div class="row-actions">
                                <span class="edit">
                                    <a href="admin.php?page=aplbcp-products-edit&product_id=<?php echo esc_attr($aplbcpProductList->product_id); ?>" aria-label="Edit">
                                        Edit
                                    </a> |
                                </span>
                                <span class="trash">
                                    <a onclick="return confirm('Are you sure you want to delete?')" href="admin.php?page=aplbcp-products-delete&product_id=<?php echo esc_attr($aplbcpProductList->product_id); ?>" aria-label="Move Trash">
                                        Delete
                                    </a> |
                                </span>
                                <span class="view">
                                    <a href="admin.php?page=aplbcp-products-preview&product_id=<?php echo esc_attr($aplbcpProductList->product_id); ?>" rel="bookmark" aria-label="Preview">
                                        Preview
                                    </a>
                                </span>
                            </div>
                        </td>
                        <td>
                        <strong>
                            <?php echo "[aplbcp product_list=" . esc_attr($aplbcpProductList->product_id) . "]"; ?>
                        </strong>
                        </td>
                    </tr>
                <?php
                }
                }
                else
                {
                    echo "<tr><td colspan='3' style='text-align:center;'>No Record Found!</td></tr>";
                }
                ?>
            </table>

            <?php
            $page_links = paginate_links(array(
                'base' => add_query_arg('pagenum', '%#%'),
                'format' => '',
                'prev_text' => __('&laquo;', 'text-domain'),
                'next_text' => __('&raquo;', 'text-domain'),
                'total' => $num_of_pages,
                'current' => $pagenum
            ));

            if ($page_links) {
            ?>
                <div class="tablenav"><div class="tablenav-pages" style="margin: 1em 0"><?php echo wp_kses_post($page_links); ?></div></div>;
            <?php    
            }
            ?>
        </div>
    </div>
</div>