<?php

function vkrwps_categories_callback() {

	if ( isset($_POST['add-cat']) ) {
        $nonce = $_REQUEST['_wpnonce'];
        if (! wp_verify_nonce($nonce, 'vkrwps-addcats' ) ) {
            die('security error');
        }

        $cn = $_POST['cat-name'];

        if ( empty($cn) ) {

        	echo '<div class="msg error"><p>You must enter a name for the category</p></div>';
        
        } else {

	        global $wpdb;

			$areyouthere = $wpdb->get_results( 
			"
			SELECT id
			FROM wp_vkrwps_categories
			WHERE cat_name = '$cn'
			"
			);

			$r = count($areyouthere);

			if ( $r > 0 ) {
				echo '<div class="msg error"><p>That category name already exists, please choose another.</p></div>';

			} else { 

		        $wpdb->insert( 
		            'wp_vkrwps_categories', 
		            array( 
		                'cat_name' => $cn
		            ), 
		            array( 
		                '%s'
		            ) 
		        ); 

		        echo '<div class=msg><p>The category has been added.</p></div>';

	    	}
    	}

	} 

	if ( isset($_POST['edit-cat']) ) {
        $nonce = $_REQUEST['_wpnonce'];
        if (! wp_verify_nonce($nonce, 'vkrwps-editcats' ) ) {
            die('security error');
        }

		$cns = $_POST['cns'];
		$nn = $_POST['new-cat-name'];

		if ( $cns != 'choosecat' && !empty($nn) ) { 

			global $wpdb;

			$areyouthere = $wpdb->get_results( 
			"
			SELECT id
			FROM wp_vkrwps_categories
			WHERE cat_name = '$nn'
			"
			);

			$r = count($areyouthere);

			if ( $r > 0 ) {
				echo '<div class="msg error"><p>That category name already exists, please choose another.</p></div>';

			} else { 

		        $wpdb->update( 
		            'wp_vkrwps_categories', 
		            array( 
		                'cat_name' => $nn
		            ), 
		            array( 'id' => $cns ),
		            array( 
		                '%s'
		            ),
		            array( '%d' )
		        ); 

		        echo '<div class="msg"><p>The category name has been updated</p></div>';

	    	}

		} else { 
			echo '<div class="msg error"><p>You must choose a category and enter category name.</p></div>';
		}

	} 

	if ( isset($_POST['delete-cat']) ) {
        $nonce = $_REQUEST['_wpnonce'];
        if (! wp_verify_nonce($nonce, 'vkrwps-deletecats' ) ) {
            die('security error');
        }

        $dc = $_POST['dc'];

        if ( $dc == 'choosecat' ) { 
        	echo '<div class="msg error"><p>Please choose a category to delete</p></div>';

        } else {
        	global $wpdb;
        	$wpdb->delete( 'wp_vkrwps_categories', array( 'ID' => $dc ) );

        	echo '<div class="msg"><p>The category has been deleted.</p></div>';
        }

	} 
	
	echo '<div class="wrap cats"><h2>Product Categories</h2><div>';
	?>

	<form action="" method="post" id="vkrpsp-config">
    <table class="form-table widefat vk">
    <?php wp_nonce_field('vkrwps-addcats'); ?>

    <thead><tr><th colspan="2" style="padding-left:10px;">Add category</th></tr></thead>

    <tr>
        <td style="width:300px;">
	         <label>Add new category:</label>
	    </td>
        <td>
            <input type="text" name="cat-name" id="cat-name" class="regular-text">
        </td>
    </tr>

    </table>
    <p class="submit"><input type="submit" value="Add Category" class="button button-primary addcat" id="submit" name="add-cat"></p>
    </form>


    <form action="" method="post" id="vkrpsp-config">
    <table class="form-table widefat vk">
    <?php wp_nonce_field('vkrwps-editcats'); ?>

    <thead><tr><th colspan="2" style="padding-left:10px;">Edit category name</th></tr></thead>

    <tr>
    	<td style="width:300px;">
    		<label>Choose Category</label>
    	</td>
    	<td style="overflow:visible;">
    	<select name="cns" id="cns">
        	<option value="choosecat"></option>
			<?php
			
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
			
			?>
	    </select>
		</td>
    </tr>

    <tr>
        <td style="width:300px;">
            <label>New name:</label>
        </td>
        <td>
            <input type="text" name="new-cat-name" id="new-cat-name" class="regular-text new-cat-name">
        </td>
    </tr>

    </table>
    <p class="submit"><input type="submit" value="Edit Category Name" class="button button-primary editcat" id="submit" name="edit-cat"></p>
    </form>
	<!-- </div> -->

    <form action="" method="post" id="">
    <table class="form-table widefat vk">
    <?php wp_nonce_field('vkrwps-deletecats'); ?>

    <thead><tr><th colspan="2" style="padding-left:10px;">Delete category</th></tr></thead>

    <tr>
    	<td style="width:300px;">
    		<label>Choose Category to delete</label>
    	</td>

    	<td style="overflow:visible;">
	    	<select name="dc" id="dc">
	        	<option value="choosecat"></option>
				<?php
				
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
				
				?>
		    </select>
		</td>
    </tr>

    </table>
    <p class="submit"><input type="submit" value="Delete Category" class="button button-primary delcat" id="submit" name="delete-cat"></p>
    </form>

<?php
} 

?>
