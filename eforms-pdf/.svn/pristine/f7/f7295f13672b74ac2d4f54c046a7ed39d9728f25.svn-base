<?php
class Rednumber_Marketing_CRM_Frontend_PDF_Eform{
	private static $add_on ="pdf"; 
	private static $form ="eform";
	private $datas_submits= array();  
	function __construct(){
		add_action( 'crm_marketing_sync_'.self::$form."_".self::$add_on,array($this,"sync"));
		add_filter("crm_marketing_pdf_default_".self::$form,array($this,"crm_marketing_pdf_default"));
		add_action("add_colunms_pdf_template",array($this,"add_row"));
	}
	//add hook do_action("add_colunms_pdf_template",$this)  line 6320 file includes/form/class-ipt-fsqm-form-elements-data.php
	function add_row($form){
		?>
		<tr style="<?php echo $form->email_styling['tr']; ?>">
			<th style="<?php echo $form->email_styling['th']; ?>" scope="row"><?php _e( 'PDF', 'ipt_fsqm' ); ?></th>
			<td style="<?php echo $form->email_styling['td']; ?>">
				<?php 
				foreach( $form->data->freetype  as $vl ){
					if( $vl["type"] == "pdf_template") {
						foreach( $vl["value"] as $link ){
						?>
						<a href="<?php echo esc_url($link) ?>" download=""><?php esc_html_e("Download PDF","ipt_fsqm") ?></a>
						<?php
						}
					}
				}
				?>
			</td>
		</tr>
	<?php
	}
	function crm_marketing_pdf_default($name){
		return "form-id";
	}
	function sync($form_id){
		$datas = Rednumber_Marketing_CRM_Database::get_datas(self::$form,self::$add_on,$form_id);
		if( is_array($datas) && count($datas) > 0 ){ 
			esc_html_e("Feature will update soon","crm-marketing");
		}
	}
}
new Rednumber_Marketing_CRM_Frontend_PDF_Eform;