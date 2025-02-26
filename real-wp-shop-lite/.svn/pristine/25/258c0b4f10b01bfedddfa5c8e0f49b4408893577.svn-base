<?php

function vkrwps_add_products_callback() {

    if ( isset($_POST['submit']) ) { 
        $nonce = $_REQUEST['_wpnonce'];
        if (! wp_verify_nonce($nonce, 'vkrwps-addprods' ) ) {
            die('security error');
        }

        $pn = $_POST['prod-name'];
        $pn = stripslashes($pn);
        $pn = trim($pn);

        $pd = $_POST['pd'];

        $ld = $_POST['content'];

        $p = $_POST['price'];


        $pw = $_POST['pw'];

        $gc = $_POST['gc'];

        global $wpdb;
        $cid = $wpdb->get_results( 
        "
        SELECT id
        FROM wp_vkrwps_categories
        WHERE cat_name='$gc'
        "
        );

        foreach ($cid as $key => $value) {
            $cid = $value->id;
        }


        $sku = $_POST['sku'];
        
        $in_stock = $_POST['in_stock'];
        if (empty($in_stock)) $in_stock = 'yes';

        $s = '';

        $flag = true;

        global $wpdb;

        $areyouthere = $wpdb->get_results( 
        "
        SELECT id
        FROM wp_vkrwps_products
        WHERE name = '$pn'
        "
        );

        $r = count($areyouthere);

        $areyouthere2 = $wpdb->get_results( 
        "
        SELECT sku
        FROM wp_vkrwps_products
        WHERE sku = '$sku'
        "
        );

        $r2 = count($areyouthere2);

        if ( $r > 0 ) {

            echo '<div class="msg error"><p>That product name already exists, please choose another.</p></div>';
            $flag = false;

        } else if ( $r2 > 0 ) {
            echo '<div class="msg error"><p>That sku already exists, please choose another.</p></div>';
            $flag = false;

        } else if ( $_FILES['upload']['error'] > 0 && $_FILES['upload']['error'] != 4 ) {
            echo '<div class="msg error"><p>Problem uploading image:</p>';
            switch ($_FILES['upload']['error']) {
                case 1:
                    print '<p>The file exceeds the upload_max_filesize setting in php.ini.</p>';
                    break;
                case 2:
                    print '<p>The file exceeds the maximum allowed file size of 5mb.</p>';
                    break;
                case 3:
                    print '<p>The file was only partially uploaded.</p>';
                    break;
                case 6:
                    print '<p>No temporary folder was available.</p>';
                    break;
                case 7:
                    print '<p>Unable to write to the disk.</p>';
                    break;
                case 8:
                    print '<p>File upload stopped.</p>';
                    break;
                default:
                    print '<p>A system error occurred.</p>';
                    break;
            } 
            echo '</div>'; 
            $flag = false;

        } else {

            if ( empty($pn) || empty($p) || ($gc == 'choosecat') || empty($sku) ) {
                echo '<div class="msg error"><p>You must enter product name, sku and price and choose a category</p></div>';
                $flag = false;
            }

            if ($flag) {
                if ($_FILES['upload']['size'] > 0 && $_FILES['upload']['error'] == 0 ) {
                
                    $allowed = array ('image/pjpeg', 'image/jpeg', 'image/JPG', 'image/X-PNG', 'image/PNG', 'image/png', 'image/x-png');
                    if ( ! in_array($_FILES['upload']['type'], $allowed)) {
                    
                        echo '<div class="msg error"><p>Please upload a JPEG or PNG image.</p></div>';    
                        $flag = false;  
                    }
                }
            }

        } 

        $p = number_format($p, 2, '.', '');

        if ($flag) {
            $wpdb->insert( 
                'wp_vkrwps_products', 
                array( 
                    'name' => $pn, 
                    'cat_id' => $cid,
                    'description' => $pd,
                    'long_description' => $ld,
                    'price' => $p,
                    'shipping' => 0,
                    'weight' => $pw,
                    'sku' => $sku,
                    'in_stock' => $in_stock
                ), 
                array( 
                    '%s', 
                    '%d',
                    '%s',
                    '%s',
                    '%f',
                    '%d',
                    '%f',
                    '%s',
                    '%s'
                ) 
            ); 

        } 

        $last_id = $wpdb->insert_id;

        $dir = WP_CONTENT_DIR . '/rwpsliteuploads/';

        $new_img_name = $last_id.'.jpg';

        move_uploaded_file ($_FILES['upload']['tmp_name'], "$dir{$new_img_name}");

        if ( $flag ) echo '<div class=msg><p>The product has been added!</p></div>';

    } 
    
    echo '<div class=wrap><h2>Add Products</h2>';
    ?>

    <form action="" method="post" id="vkrpsp-config" enctype="multipart/form-data">
    <input type="hidden" name="MAX_FILE_SIZE" value="5242880">

    <table class="form-table widefat vk">
    <?php wp_nonce_field('vkrwps-addprods'); ?>

    <thead><tr><th colspan="2" style="padding-left:10px;">New Product Info</th></tr></thead>

    <tr>
        <td style="width:300px;">
            <label for="prod-name">Product name: *</label>
        </td>
        <td>
            <input type="text" name="prod-name" id="prod-name" class="regular-text mand" value="<?php if (isset($_POST['prod-name'])) echo stripslashes($_POST['prod-name']); ?>">
        </td>
    </tr>

    <tr>
        <td style="width:300px;">
            <label>Product SKU: *</label>
        </td>
        <td>
            <input type="text" name="sku" id="sku" class="regular-text mand" value="<?php if (isset($_POST['sku'])) echo $_POST['sku']; ?>">
        </td>
    </tr>

    <tr>
        <td style="width:300px;vertical-align:top;">
            <label for="prod-desc">Short description:</label>
        </td>
        <td>
            <?php $settings = array( 'textarea_rows' => 6 ); ?>
            <?php wp_editor('', 'pd', $settings); ?>
        </td>
    </tr>

    <tr class="rte">
        <td style="width:300px;vertical-align:top;">
            <label for="prod-name">Long Description:</label>

            <br>
            <span class="longdescnote">
                This is done much better in the PRO version.
                <br>
                <a href="https://www.youtube.com/watch?v=PrHsWsYpOFs" target="_blank">Check out the video comparing the two!</a>
            </span>
        </td>
        <td><?php wp_editor(stripslashes($ld), 'content'); ?></td>
    </tr>

    <tr>
        <td style="width:300px;">
            <label for="price">Price: *</label>
        </td>
        <td>
            <input type="text" name="price" id="price" class="regular-text mand" value="<?php if (isset($_POST['prod-name'])) echo $_POST['price']; ?>">
        </td>
    </tr>

    <tr>
        <td style="width:300px;">
            <label for="shipping">Weight:</label>
        </td>
        <td>
            <input type="text" name="pw" id="shipping" class="regular-text" value="<?php if (isset($_POST['pw'])) echo $_POST['pw']; ?>"> 
        </td>
    </tr>

    <tr>
        <td style="width:300px;overflow:visible;">
            <label for="shipping">Choose category: *</label>
        </td>
        <td style="overflow:visible;">
        <select name="gc" id="gc" class="mand">
            <option value="choosecat"></option>
            <?php
            
            global $wpdb;

            $get_cats = $wpdb->get_results( 
            "
            SELECT id, cat_name
            FROM wp_vkrwps_categories
            "
            );

            foreach ($get_cats as $key => $value) {?>
                <option value="<?=$value->cat_name?>" <?php if ( $_POST['gc'] == $value->cat_name ) echo "selected=selected"; ?>><?=$value->cat_name;?></option>
            <?php
            }
            
            ?>
        </select>
        </td>
    </tr>

    <tr>
        <td td style="width:300px;">
             <label>In stock?:</label>
        </td>
        <td>
            <input type="radio" name="in_stock" id="instockyes" value="yes" <?php if ($in_stock == 'yes') echo 'checked=checked'; ?>>
            <label for="instockyes">Yes</label>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" name="in_stock" id="instockno" value="no" <?php if ($in_Stock == 'no') echo 'checked=checked'; ?>>
            <label for="instockno">No</label>
        </td>
    </tr>

    <tr>

        <td style="width:300px;">
            <label for="upload">Upload image (max file size: 5mb):</label>
        </td>

        <td>
            <div class="img">
                <img id="uploadPreview" style="width: 100px; height: 100px;" />
            </div>

            <input type="file" id="uploadImage" name="upload" class="button button-primarry" onchange="PreviewImage();">

            <script type="text/javascript">

                function PreviewImage() {
                    var oFReader = new FileReader();
                    oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

                    oFReader.onload = function (oFREvent) {
                        document.getElementById("uploadPreview").src = oFREvent.target.result;
                    };
                };

            </script>
        </td>
        
    </tr>

    </table>
    <p class="submit"><input type="submit" value="Add Product" class="button button-primary addprod" id="submit" name="submit"></p>
    </form>
    </div>
<?php
} 

?>
