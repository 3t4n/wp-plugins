<?php

function vkrwps_payment_options_callback() {

    if ( isset($_POST['submit']) ) {
        $nonce = $_REQUEST['_wpnonce'];
        if (! wp_verify_nonce($nonce, 'vkrwps-pos' ) ) {
            die('security error');
        }

        $po = $_POST['po'];
        $arr = array();
        foreach ($po as $podis) {
            $arr[] = $podis;
        }

        $str = implode(',', $arr);

        global $wpdb;

        $q = $wpdb->prepare( 'UPDATE wp_vkrwps_payment_options SET active = %d WHERE id NOT IN ('.$str.')', array( 0 ) );

        $wpdb->query($q);
        
        foreach ($po as $po_id) {

            $wpdb->update( 
            'wp_vkrwps_payment_options', 
            array( 
                'active' => 1
            ), 
            array( 'id' => $po_id ), 
            array( 
                '%d'
            ), 
            array( '%d' ) 
            );
        } 

        $pe = $_POST['pe'];

        $wpdb->update( 
            'wp_vkrwps_paypal', 
            array( 
                'email' => $pe
            ), 
            array( 'id' => 1 ), 
            array( 
                '%s'
            ), 
            array( '%d' ) 
        );

        echo '<div class="msg"><p>Active payment option(s) have been updated.</p></div>';

    } 

    if ( isset($_POST['delete']) ) {
        $nonce = $_REQUEST['_wpnonce'];
        if (! wp_verify_nonce($nonce, 'vkrwps-pos2' ) ) {
            die('security error');
        }

        $cid = $_POST['delcat'];

        global $wpdb;
        $wpdb->delete( 'wp_vkrwps_payment_options', array( 'ID' => $cid ) );

        echo '<div class="msg"><p>The payment option has been deleted.</p></div>';

    } 

    if ( isset($_POST['addpo']) ) {
        $nonce = $_REQUEST['_wpnonce'];
        if (! wp_verify_nonce($nonce, 'vkrwps-pos3' ) ) {
            die('security error');
        }

        $t = $_POST['title'];
        
        $d = $_POST['desc'];


        $flag = true;

        global $wpdb;

        $areyouthere = $wpdb->get_results( 
        "
        SELECT id
        FROM wp_vkrwps_payment_options
        WHERE title = '$t'
        "
        );

        $r = count($areyouthere);

        if ( $r > 0 ) {
            echo '<div class="msg error"><p>That payment option name already exists, please choose another.</p></div>';
            $flag = false;
        }

        if ( $flag ) {

            $f = $wpdb->insert( 
                'wp_vkrwps_payment_options', 
                array( 
                    'title' => $t, 
                    'description' => $d,
                    'id_name' => 'nebitno',
                    'active' => 0
                ), 
                array( 
                    '%s', 
                    '%s',
                    '%s',
                    '%d'
                ) 
            ); 

            if ($f) {
                echo '<div class="msg"><p>New payment option has been added.</p></div>';
            } else {
                echo 'problem';
            }

        } 

    } 
    
    echo '<div class="wrap payos"><h2>Payment Options</h2>';
    ?>


    <form action="" method="post" id="vkrpsp-config">
    <input type="hidden" name="MAX_FILE_SIZE" value="5242880">

    <table class="form-table widefat ep vk" style="position:relative;">
    <?php wp_nonce_field('vkrwps-pos'); ?>

    <thead><tr><th colspan="2" style="padding-left:10px;">Available payment options</th></tr></thead>
    <tr>
        <td style="width:300px;">
            <label for="shipping">Choose payment options:</label>
        </td>
        <td style="position:;left:410px;top:150px;">
            <?php
            
            global $wpdb;

            $get_pos = $wpdb->get_results( 
            "
            SELECT id, title, id_name, active, description
            FROM wp_vkrwps_payment_options
            "
            );

            foreach ($get_pos as $po) {
                $f = false;
                if ( $po->active == 1) $f = true;
                ?>

                <p><input type=checkbox id="id<?=$po->id;?>" name=po[] value="<?=$po->id;?>" <?php if ($f) echo 'checked=checked'; ?> />
                <label for="id<?=$po->id;?>"><?php echo $po->title; ?></label> <span><?php echo $po->description;  ?></span></p>

            <?php
            }
            
            ?>
        </td>
    </tr>

    <tr>
        <td style="width:300px;">
            <label for="pe">Your paypal email:</label>
        </td>
        <td style="position:;left:410px;top:350px;">
            <?php
            
            $get_pe = $wpdb->get_results( 
              "
              SELECT email
              FROM wp_vkrwps_paypal
              WHERE id=1
              "
            );
            
            foreach ($get_pe as $key => $value) {
                $pe = $value->email;
            }

            ?>
            <input type="text" name="pe" id="pe" class="regular-text" value="<?= $pe; ?>">
        </td>
    </tr>

    </table>
    <p class="submit"><input type="submit" value="Submit" class="button button-primary" id="submit" name="submit"></p>
    </form>


    <form action="" method="post" id="vkrpsp-config">

    <table class="form-table ep widefat vk" style="position:relative;">
    <?php wp_nonce_field('vkrwps-pos2'); ?>

    <thead><tr><th colspan="2" style="padding-left:10px;">Delete a payment option</th></tr></thead>

    <tr>
        <td style="width:300px;">
            <label for="shipping">Delete a payment option:</label>
        </td>
        <td style="position:;left:410px;top:550px;overflow:visible;">
            <select name="delcat" id="delcat">
                <option value="0"></option>
            <?php
                global $wpdb;

                $get_pos = $wpdb->get_results( 
                "
                SELECT id, title, id_name, active
                FROM wp_vkrwps_payment_options
                WHERE id!=1
                "
                );

                foreach ($get_pos as $po) {
                    ?>
                    <option value="<?=$po->id?>"><?=$po->title?></option>
                <?php
                }
                ?>
            </select>
        </td>
    </tr>

    </table>
    <p class="submit"><input type="submit" value="Delete" class="button button-primary delpo" id="submit" name="delete"></p>
    </form>


    <form action="" method="post" id="vkrpsp-config">

    <table class="form-table ep widefat vk" style="position:relative;">
    <?php wp_nonce_field('vkrwps-pos3'); ?>

    <thead><tr><th colspan="2" style="padding-left:10px;">Add a payment option</th></tr></thead>

    <tr>
        <td style="width:300px;">
            <label for="title">Title:</label>
        </td>
        <td>
            <input type="text" name="title" id="title" class="regular-text title">
        </td>
    </tr>

    <tr>
        <td style="width:300px;">
            <label for="shipping">Description:</label>
        </td>
        <td>
            <textarea name="desc" class="regular-text desc" id="desc" rows="6" cols="37"></textarea>
        </td>
    </tr>

    </table>
    <p class="submit"><input type="submit" value="Add" class="button button-primary addpayo" id="submit" name="addpo"></p>
    </form>
    
    </div>
<?php
} 

?>