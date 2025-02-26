<?php
if ( ! defined( 'ABSPATH' ) ) { die; } 

/**
* Group option
*/
class As_metabox_option_group extends As_metabox_option
{
	public function __construct( $field, $value = '', $option_type = '' ) {
    	parent::__construct( $field, $value, $option_type );
  	}
	
	public function as_output($option = '')	{

$datavalue = $this->value();

$item_count = 0;
if (isset($datavalue[$this->as_field['id']])) {
  if (is_array($datavalue[$this->as_field['id']])) {
    $item_count = count($datavalue[$this->as_field['id']]);
  }
}

		?>
  <div 

    data-json="<?php echo  htmlentities(json_encode($this->as_field), ENT_QUOTES, 'UTF-8'); ?>" 
    class="as_metabox_group_items hidden_format" style="display: block;width: 0;height: 0;overflow: hidden;position: absolute;left: 100000000px;"
    data-item-count="<?php echo $item_count; ?>"
    >


  </div>


<div class="as_metabox_group_option_accordion" id="<?php echo (isset($this->as_field['id'])) ? $this->as_field['id'] : null ; ?>">


<?php

$a1 = 1;
 if (isset($datavalue[$this->as_field['id']])) {
 if (is_array($datavalue[$this->as_field['id']])) {
  foreach ($datavalue[$this->as_field['id']] as $key => $value) {
?>

    <div class="as_metabox_group_items" >

     <h3><a href="#" data-get-text="as-return-selector" data-return-text="<?php echo (isset($this->as_field['tabs_title_field'])) ? sanitize_html_class($this->as_field['tabs_title_field']) : null ; ?>">

      <?php echo (isset($this->as_field['tabs_title_field'])) ? @$value[$this->as_field['tabs_title_field']] : null ; ?>

     </a></h3>
      <div class="as_metabox_group_content">

<?php

if (isset($this->as_field['group_fields'])) {
  if (isset($this->as_field['group_fields'])) {
    foreach ($this->as_field['group_fields'] as $field_key => $field_value) {
    $as_title   = (isset($field_value['title']) === true) ? $field_value['title'] : '' ;
    $as_desc  = (isset($field_value['desc'])  === true) ? $field_value['desc'] : '' ;
    $as_type  = (isset($field_value['type'])  === true) ? $field_value['type'] : '' ;
    $as_value   = @$value[$field_value['id']];
    $as_value   = (empty($as_value) === false) ? $as_value : null ;
  ?>
              <div class="as_admin_tab_content">
                <div class="as_main_single_box">
                  <div class="as_main_single_title">
                      <?php echo $this->box_title($as_title); ?>
                      <?php echo $this->box_desc($as_desc); ?>                  
                  </div>
                  <div class="as_main_single_contant_box">
                    <?php
                      $as_type_class = 'As_metabox_option_'.$as_type;
                      if (class_exists($as_type_class)) {
                        if ($as_type_class != 'As_metabox_option_group') {
                         
                          $type = new $as_type_class($field_value,  $as_value, array(

                              'option_type' => 'group',
                              'option_id'   => $this->as_field['id'],
                              'serial'      => $a1

                              )
                              
                            );
                          $type->as_output();

                        }else{
                          trigger_error("Multiple group option is not supported...");
                        }

                      }else{
                        echo apply_filters('as_not_exists_option', 'No Option Available.');
                      }
                    ?>
                  </div>
                </div>
              </div>
  <?php
    }
  }
}
$a1++;
?>
      <div class="as_meta_group_content_footer">
        <span title="Remove" class="as_meta_denger_btn" onclick="as_remove_group_option(this, 'as_metabox_group_items')"><?php echo (isset($this->as_field['remove_text'])) ? $this->as_field['remove_text'] : 'Remove' ; ?></span>
      </div>

      </div>
    </div>
<?php
  }
  }
}  
?>

</div>
 
<div class="as_metabox_group_add_new_button">
  <span class="as_group_meta_loading" style="display: none;"><i class="fa fa-refresh fa-spin" aria-hidden="true"></i></span><span class="button button button-primary button-large"><?php echo (isset($this->as_field['button_text'])) ? $this->as_field['button_text'] : 'Add New' ; ?></span>
</div>
		<?php
	}
	

  public function box_title($data){
    if (empty($data) === false) {
      echo '<h2>'.$data.'</h2>';
    }
  }
  public function box_desc($data){
    if (empty($data) === false) {
      echo '<p>'.$data.'</p>';
    }
  }

  public function sanitize_as_metadata($data) {
    return '';
  }



}
