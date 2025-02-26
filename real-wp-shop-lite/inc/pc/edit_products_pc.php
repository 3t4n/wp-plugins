<?php

function vkrwps_edit_products_callback() {

    if ( isset($_POST['submit']) ) { 
        $nonce = $_REQUEST['_wpnonce'];
        if (! wp_verify_nonce($nonce, 'vkrwps-editprods' ) ) {
            die('security error');
        }

        $pid = $_POST['pid'];


        $pn = $_POST['pn'];
        $pn = stripslashes($pn);

        $sku = $_POST['sku'];

        $pc = $_POST['pc'];

        $cn = $_POST['cn'];

        $pd = $_POST['pd'];

        $ld = $_POST['ld'];

        $pp = $_POST['pp'];

        $pw = $_POST['pw'];

        $in_stock = $_POST['in_stock'];

        global $wpdb;

        $flag = true;

        $areyouthere2 = $wpdb->get_results( 
        "
        SELECT sku
        FROM wp_vkrwps_products
        WHERE sku = '$sku' AND id != $pid
        "
        );

        $r2 = count($areyouthere2);

        if ( $r2 > 0 ) {
            echo '<div class="msg error"><p>That sku already exists, please choose another.</p></div>';
            $flag = false;
        }

        // $pp = number_format($pp, 2);

        if ( $flag ) {

            $wpdb->update( 
            'wp_vkrwps_products', 
            array( 
                'cat_id' => $cn,  
                'name' => $pn,  
                'description' => $pd,
                'long_description' => $ld,
                'price' => $pp,
                'shipping' => 0,
                'weight' => $pw,
                'sku' => $sku,
                'in_stock' => $in_stock
            ), 
            array( 'id' => $pid ), 
            array( 
                '%s',
                '%s',
                '%s',
                '%s',
                '%s',
                '%f',
                '%f'   
            ), 
            array( '%d' ) 
            );

            if (isset($_FILES['upload']) && (!empty($_FILES['upload']['name']))) {

                    $dir = WP_CONTENT_DIR . '/rwpsliteuploads/';

                    $new_img_name = $pid.'.jpg';
                
                    $allowed = array ('image/pjpeg', 'image/jpeg', 'image/JPG', 'image/X-PNG', 'image/PNG', 'image/png', 'image/x-png');
                    if (in_array($_FILES['upload']['type'], $allowed)) {
                    
                        if (move_uploaded_file ($_FILES['upload']['tmp_name'], "$dir{$new_img_name}")) {
                        } 

                    } else if ( $_FILES['upload']['error'] == 2 ) {
                        
                        echo '<div class="msg error"><p>Max file size of 5mb exceeded.</p></div>';

                    } else { 
                        echo '<div class="msg error"><p>Please upload a JPEG or PNG image.</p></div>';
                    }

            } 

            echo '<div class=msg><p>The product information has been updated.</p></div>';

        } 

    }

    echo '<div class=wrap><h2>Edit Products</h2><div class=getpid>'.$pid.'</div>';
    ?>

    <form action="" method="post" id="vkrpsp-config" enctype="multipart/form-data">
    <input type="hidden" name="MAX_FILE_SIZE" value="5242880">

    <table class="form-table ep widefat vk" style="position:relative;">
    <?php wp_nonce_field('vkrwps-editprods'); ?>

    <tr>
        <td style="width:300px;color:white;">status:</td>
        <td class="pl"></td>
    </tr>

    <tr class="dropsearch">
        <td style="width:300px;">
            <label>Choose a product to modify:</label>
        </td>
        <td style="padding-top:0;">
        <select name="pv" id="pv" class="dropsearch" style="width:300px;">
            <option value="noval"></option>
            <?php
            
            global $wpdb;

            $get_prods = $wpdb->get_results( 
            "
            SELECT id, name
            FROM wp_vkrwps_products
            "
            );

            foreach ($get_prods as $prod) {
                echo '<option value='.$prod->id.'>'.$prod->name.'</option>';
            }
            
            ?>
        </select>
        </td>
    </tr>

    <tr>
        <td style="width:300px;">
            <label>Product ID:</label>
        </td>
        <td class="pid">
            <input readonly name="pid" id="pid" class="regular-text">
        </td>
    </tr>

    <tr>
        <td style="width:300px;">
            <label>Product Name:</label>
        </td>
        <td>
            <input type="text" name="pn" id="pn" class="regular-text">
        </td>
    </tr>

    <tr>
        <td style="width:300px;">
            <label>Product SKU:</label>
        </td>
        <td>
            <input type="text" name="sku" id="sku" class="regular-text">
        </td>
    </tr>

    <tr>
        <td style="width:300px;">
            <label>Product Category:</label>
        </td>
        <td style="overflow:visible;">
            <?php
            
            echo '<select class=pc style="width:300px;"" name=cn>';

            echo '<option value="noval"></option>';

            global $wpdb;

            $get_cats = $wpdb->get_results( 
            "
            SELECT id, cat_name
            FROM wp_vkrwps_categories
            "
            );

            foreach ($get_cats as $key => $value) {
                echo '<option value='.$value->id.'>'.$value->cat_name.'</option>';
            }

            echo '</select>';
            
            ?>
        </td>
    </tr>

    <tr>
        <td style="width:300px;vertical-align:top;">
            <label>Short Description:</label>
        </td>
        <td>
            <?php $settings = array( 'textarea_rows' => 6 ); ?>
            <?php wp_editor('', 'pd', $settings); ?>
        </td>
    </tr>

    <tr>
        <td style="width:300px;vertical-align:top;">
            <label>Long Description:</label>

            <br>
            <span class="longdescnote">
                This is done much better in the PRO version.
                <br>
                <a href="https://www.youtube.com/watch?v=PrHsWsYpOFs" target="_blank">Check out the video comparing the two!</a>
            </span>
        </td>
        <td>
            <?php $settings = array( 'textarea_rows' => 20 ); ?>
            <?php wp_editor('', 'ld', $settings); ?>
        </td>
    </tr>

    <tr>
        <td style="width:300px;">
            <label>Product Price:</label>
        </td>
        <td>
            <input type="text" name="pp" id="pp" class="regular-text">
        </td>
    </tr>

    <tr>
        <td style="width:300px;">
            <label>Product Weight:</label>
        </td>
        <td>
            <input type="text" name="pw" id="pw" class="regular-text">
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
            <label>Product Image:</label>
        </td>
        <td class="pil img"></td>
    </tr>

    <tr>
        <td style="width:300px;">
            <label>Upload new image (max file size: 5mb):</label>
        </td>
        
        <td>
            <div class="img">
                <img id="uploadPreview" style="width: 100px; height: 100px;" />
            </div>

            <input type="file" id="uploadImage" name="upload" onchange="PreviewImage();">

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
    <p class="submit"><input type="submit" value="Edit Product" class="button button-primary" id="submit" name="submit"></p>
    </form>
    </div> <!-- end .wrap -->
<?php
} 

?>