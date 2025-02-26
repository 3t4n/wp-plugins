
<div class="wrap zcf">
    <?=ZCForm_Static::zcform_admin_preload();?>
    <h1><?php esc_attr_e('All Forms', 'contact-form-z');?> <a class="button button-primary zcf_small_btn" href="?page=zcf-add-form"><?php esc_attr_e('Add New', 'contact-form-z');?></a></h1>
    <form class="zcf_list_forms_data">
        <?php
        $this->zcf_form_list->search_box(__( 'Find a form', 'contact-form-z' ), 'wpcf7-contact' );
        $this->zcf_form_list->display();
        ?>
    </form>
</div> 
