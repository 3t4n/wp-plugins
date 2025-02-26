<?php
//Add/Edit Counter Save
if (!empty($_POST['customize-faq-save']) && $_POST['customize-faq-save'] == 'Save') {
    $nonce = $_REQUEST['_wpnonce'];
    if (!wp_verify_nonce($nonce, 'afaq_6310_nonce_add_edit_faq')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $faqId = isset($_POST['faqid']) && count($_POST['faqid']) ? array_map('sanitize_text_field', $_POST['faqid']) : "";
        if($faqId){
            $faqId = implode(',', $faqId);
        }
        $rid = (int) sanitize_text_field( $_POST['add_edit_faq_id'] );
        $wpdb->query($wpdb->prepare("UPDATE $style_table SET templateids = %s WHERE id = %d", $faqId, $rid));
    }
}

//Rearrange FAQ Save
if (!empty($_POST['rearrange-faq-save']) && $_POST['rearrange-faq-save'] == 'Save') {
    $nonce = $_REQUEST['_wpnonce'];
    if (!wp_verify_nonce($nonce, 'afaq_6310_nonce_rearrange_faq')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $faqId = sanitize_text_field( $_POST['rearrange_faq_list'] );
        $rid = (int) sanitize_text_field( $_POST['rearrange_faq_id'] );
        $wpdb->query($wpdb->prepare("UPDATE $style_table SET templateids = %s WHERE id = %d", $faqId, $rid));
    }
}

// Category
if (!empty($_POST['customize-category-save']) && $_POST['customize-category-save'] == 'Save') {
    $nonce = $_REQUEST['_wpnonce'];
    if (!wp_verify_nonce($nonce, 'afaq_6310_nonce_add_edit_category')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $catId = isset($_POST['catid']) && count($_POST['catid']) ? array_map('sanitize_text_field', $_POST['catid']) : "";
        if($catId){
            $catId = implode(',', $catId);
        }
        $rid = (int) sanitize_text_field( $_POST['add_edit_category_id'] );
        $wpdb->query($wpdb->prepare("UPDATE $style_table SET categoryids = %s WHERE id = %d", $catId, $rid));
    }
}

//Rearrange Category Save
if (!empty($_POST['rearrange-cat-save']) && $_POST['rearrange-cat-save'] == 'Save') {
    $nonce = $_REQUEST['_wpnonce'];
    if (!wp_verify_nonce($nonce, 'afaq_6310_nonce_rearrange_category')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $catId = sanitize_text_field( $_POST['rearrange_cat_list'] );
        $rid = (int) sanitize_text_field( $_POST['rearrange_cat_id'] );
        $wpdb->query($wpdb->prepare("UPDATE $style_table SET categoryids = %s WHERE id = %d", $catId, $rid));
    }
}