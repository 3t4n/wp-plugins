<?php
class waruk_wcFields {
function __construct() {
			//mezők hozzáadása a termék adatlaphoz
			add_action( 'woocommerce_product_options_general_product_data', array($this, 'add_extra_fields'));
						add_action( 'woocommerce_process_product_meta', array($this, 'save_fields'));
										//Kategória átnevezése
					add_action('product_cat_add_form_fields', array($this, 'add_category_field'), 10, 2);
					add_action('product_cat_edit_form_fields', array($this, 'edit_category'), 10, 2);
					
					add_action('edited_product_cat', array($this, 'save_category'), 10, 2);
add_action('create_product_cat', array($this, 'save_category'), 10, 2);
					}
			public function add_extra_fields() {
				if (get_option('waruk_hide_default') !=1) {
				woocommerce_wp_checkbox( array( 'id' => 'arukereso_hide', 'label' => 'A termék elrejtése az Árukereső xml-ből', 'description' => 'Ha be van pipálva, ez a termék nem lesz bent az árukereső xml-ben.' ) );
				} else {
				woocommerce_wp_checkbox( array( 'id' => 'arukereso_show', 'label' => 'A termék megjelenítése az Árukereső számára', 'description' => 'Ha be van pipálva, a termék elérhető lesz az Árukereső számára.' ) );
				}
				woocommerce_wp_text_input(
        array(
            'id' => 'waruk_prod_name',
            'label' =>'Megjelenő terméknév az Árukeresőben',
            'placeholder' => 'Akkor töltsük ki, ha termékünk neve eltér az Árukeresőben megjelenő névtől.',
            'desc_tip' => 'true',
            'description' => 'Akkor használjuk, ha egyedi terméknevet szeretnénk megadni az Árukereső számára'
			)
    );
	woocommerce_wp_text_input(
        array(
            'id' => 'product_number',
            'label' =>'A gyártó által megadott termékkód',
                        'desc_tip' => 'true',
            'description' => 'A ProductNumber feltüntetése kötelező a terméklistában elektronikai, informatikai, háztartási cikkek esetében illetve azokban a kategóriákban, amelyekben termékkód alapján történik a feldolgozás.'
        )
    );
				woocommerce_wp_text_input(
        array(
            'id' => 'manufacturer',
            'label' =>'Termék gyártójának megnevezése',
            'placeholder' => 'Termék gyártójának megnevezése',
            'desc_tip' => 'true',
            'description' => 'A termék gyártójának megnevezése (ha nem szerepel a termék névben)'
        )
    );
	woocommerce_wp_text_input(
        array(
            'id' => 'ean_code',
            'label' =>'Ean kód',
            'placeholder' => 'gyártó által adott EAn kód',
            'desc_tip' => 'true',
            'description' => 'Min. 8 - max. 13 számjegyű gyártó által adott termékazonosító; egyedinek kell lennie. (European Article Number)'
        )
    );
	woocommerce_wp_text_input(
        array(
            'id' => 'warranty',
            'label' =>'Termék garancia',
            'placeholder' => 'Termékhez járó garancia',
            'desc_tip' => 'true',
            'description' => 'GaranciaHossza = hónapok száma. Pl.: 12 (1 éves garancia esetében), 24 (2 éves garancia esetében)'
        )
    );
			woocommerce_wp_text_input(
        array(
            'id' => 'shipping_time',
            'label' =>'Termék kiszállítási ideje',
            'placeholder' => 'Termék kiszállításának ideje',
            'desc_tip' => 'true',
            'description' => 'A termékhez tartozókiszállítási idő napban'
        )
    );
	woocommerce_wp_text_input(
        array(
            'id' => 'shipping_cost',
            'label' =>'Termék szállítási költsége',
            'placeholder' => 'Termék szállítási költsége',
            'desc_tip' => 'true',
            'description' => 'A termékhez tartozó szálítási költség'
        )
    );
	woocommerce_wp_text_input(
        array(
            'id' => 'woo_prod_category',
            'label' =>'Terméknek megfelelő Árukereső kategória',
            'placeholder' => 'Terméknek megfelelő Árukereső kategória',
            'desc_tip' => 'true',
            'description' => 'Amennyiben eltér weboldalunk kategória megnevezése az Árukeresőjétől, itt írhatjuk felül'
        )
    );
				}
				public function save_fields($post_id) {
				$aruk_hide =$_POST["arukereso_hide"];
												update_post_meta( $post_id, 'arukereso_hide', esc_attr( $aruk_hide ) );
												$aruk_show =$_POST["arukereso_show"];
												update_post_meta( $post_id, 'arukereso_show', esc_attr( $aruk_show ) );
												update_post_meta( $post_id, 'waruk_prod_name', esc_attr( $_POST["waruk_prod_name"] ) );
																								update_post_meta( $post_id, 'manufacturer', esc_attr( $_POST["manufacturer"] ) );
																								update_post_meta( $post_id, 'product_number', esc_attr( $_POST["product_number"] ) );
												update_post_meta( $post_id, 'ean_code', esc_attr( $_POST["ean_code"] ) );
												update_post_meta( $post_id, 'warranty', esc_attr( $_POST["warranty"] ) );
																						update_post_meta( $post_id, 'shipping_cost', esc_attr( $_POST["shipping_cost"] ) );
											update_post_meta( $post_id, 'shipping_time', esc_attr( $_POST["shipping_time"] ) );
											update_post_meta( $post_id, 'woo_prod_category', esc_attr( $_POST["woo_prod_category"] ) );
																											}
										
					public function add_category_field() {
						?>
						    <div class="form-field">
        <label for="term_meta[waruk_category]"><?php _e('Kategória neve az Árukeresőben', 'waruk'); ?></label>
        <input type="text" name="term_meta[waruk_category]" id="term_meta[waruk_category]">
        <p class="description"><?php _e('Amenyiben kategóriánk neve eltér az Árukeresőben elvárttól, itt adhatunk neki eltérő nevet. Ez csak az Árukereső számára fog megjelenni.', 'waruk'); ?></p>
    </div>
	<?php

						}
						public function edit_category ($term) {
							    $term_id = $term->term_id;

    // retrieve the existing value(s) for this meta field. This returns an array
    $term_meta = get_option("taxonomy_" . $term_id);
    ?>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="term_meta[waruk_category]"><?php _e('Kategória neve az Árukeresőben', 'waruk'); ?></label></th>
        <td>
            <input type="text" name="term_meta[waruk_category]" id="term_meta[waruk_category]" value="<?php echo (isset($term_meta['waruk_category']) ? esc_attr($term_meta['waruk_category']) : ''); ?>">
            <p class="description"><?php _e('Amenyiben kategóriánk neve eltér az Árukeresőben elvárttól, itt adhatunk neki eltérő nevet. Ez csak az Árukereső számára fog megjelenni.', 'waruk'); ?></p>
        </td>
    </tr>
	<?php
							}
							function save_category ($term_id) {
    if (isset($_POST['term_meta'])) {
        $term_meta = get_option("taxonomy_" . $term_id);
        $cat_keys = array_keys($_POST['term_meta']);
        foreach ($cat_keys as $key) {
            if (isset($_POST['term_meta'][$key])) {
                $term_meta[$key] = $_POST['term_meta'][$key];
            }
        }
        // Save the option array.
        update_option("taxonomy_" . $term_id, $term_meta);
    }
}
}
new waruk_wcFields();