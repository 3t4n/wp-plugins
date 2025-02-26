
<div class="wrap zcf">
    <?=ZCForm_Static::zcform_admin_preload();?>

    <h1><?php esc_attr_e('Entries', 'contact-form-z');?> <a class="button button-primary zcf_small_btn" href="?page=zcf-add-form"><?php esc_attr_e('Add New', 'contact-form-z');?></a></h1>

    <div class="zcf_container_report">
        <form class="zcf_form_report">
            <input type="hidden" name="action" value="load_report">
            <div>
                <div class="zcf_form_report_title">
                    <label><?php esc_attr_e('Beginning of period', 'contact-form-z');?></label>
                </div>
                <div>
                    <input type="text" name="start" autocomplete="off" value="<?=(isset($_GET['start']) ? $_GET['start'] : '')?>" class="zcf_set_calendar_date">
                </div>
            </div>
            <div>
                <div class="zcf_form_report_title">
                    <label><?php esc_attr_e('End of period', 'contact-form-z');?></label>
                </div>
                <div>
                    <input type="text" name="end" autocomplete="off" value="<?=(isset($_GET['end']) ? $_GET['end'] : '')?>" class="zcf_set_calendar_date">
                </div>
            </div>
            <div>
                <div class="zcf_form_report_title">
                    <label><?php esc_attr_e('The form', 'contact-form-z');?></label>
                </div>
                <div>
                    <select name="form_id">
                        <option value="0"><?php esc_attr_e('Choose a form', 'contact-form-z');?></option>
                        <?php foreach($res_forms as $d):?>
                            <option value="<?=$d['id']?>"  <?=(isset($_GET['form_id']) && $_GET['form_id'] == $d['id'] ? 'selected' : '')?>><?=$d['title']?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>
            <div>
                <div>
                    <input type="button" class="button button-primary zcf_report_action_view" data-action="vew_report"  value="<?php esc_attr_e('Show', 'contact-form-z');?>">
                </div>
                <div>
                    <input type="button" class="button button-primary zcf_report_action_excel" data-action="create_excel"   value="<?php esc_attr_e('Generate Excel', 'contact-form-z');?>">
                </div>
            </div>
        </form>
    </div>
    <div class="zcf_report_table_block">
        <table class="zcf_report_table">
            <thead class="zcf_report_table_thead">

            </thead>
            <tbody class="zcf_report_table_tbody">

            </tbody>
        </table>
    </div>
</div>
<?php if(isset($_GET['form_id'])):?>
    <script type="text/javascript">
    	(function($){
    	  $(document).ready(function(){

    		$('.zcf_report_action_view').trigger('click');

    	  });
    	})(jQuery);
    </script>
<?php endif;?>

