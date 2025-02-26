<?php 

if( ! class_exists( 'WP_List_Table' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

class InformersListTable extends WP_List_Table {


	function get_columns(){
		$columns = array(
			'cb' => '<input type="checkbox" />',
			'id' => 'ID',
			'title' => __('Title', 'ftinformers'),
			'lang' => __('Language', 'ftinformers'),
			'catTitle' => __('Category', 'ftinformers'),
			'styleTitle' => __('Style', 'ftinformers'),
			'size' => __('Size', 'ftinformers'),
			'shortCode' => __('Short code', 'ftinformers'),
			'phpCode' => __('Php code', 'ftinformers'),
		);
		return $columns;
	}

	function prepare_items() {
		
		echo '<style type="text/css">';
		echo '.wp-list-table .column-id { width: 2.2em; }';
		echo '.wp-list-table .column-lang { width: 70px; }';
		echo '.wp-list-table .column-styleTitle { width: 70px; }';
		echo '.wp-list-table .column-size { width: 100px; }';
		echo '.wp-list-table .column-shortCode { width: 120px; }';
		echo '</style>';
		
		$columns = $this->get_columns();
		$hidden = array();
		$this->_column_headers = array($columns, $hidden);
		
		$per_page=10;
		$current_page = $this->get_pagenum();
		
		
		if( isset( $_GET['ftInformerLang'] ) && $_GET['ftInformerLang'] != '0' ){
			$total_items = FtiModel::count( ' lang = %s ', array( $_GET['ftInformerLang'] ) );
			$this->items = FtiModel::forPage( $current_page, $per_page, ' lang = %s ', array( $_GET['ftInformerLang'] ) );
		}else{
			$total_items = FtiModel::count();
			$this->items = FtiModel::forPage( $current_page, $per_page );
		}
		

		$this->set_pagination_args( array(
			'total_items' => $total_items,                 
			'per_page'    => $per_page              
		) );
		
	}

	function column_default( $item, $column_name ) {
		return $item->{$column_name};
	}
	function column_cb($item) {
		return sprintf(
			'<input type="checkbox" name="informers[]" value="%s" />', $item->id
		);    
	}
	function column_size($item) {
		if( $item->width == 0 ){
			$width = '100%';
		}else{
			$width = $item->width . 'px';
		}
		return $width . ' x ' . $item->height . 'px';
	}
	function column_title($item){
		
		$editUrl = admin_url('admin.php?page=ft-informers&action=add&id=' . $item->id);
		$deleteUrl = admin_url('admin.php?page=ft-informers&action=delete&informers=' . $item->id );
		
		echo '
<strong>' . $item->title . '</strong>
<div class="row-actions">
	<span class="edit">
		<a aria-label="'.__('Edit', 'ftinformers').'" href="'.$editUrl.'">'.__('Edit', 'ftinformers').'</a> | 
	</span>
	<span class="trash">
		<a aria-label="'.__('Delete', 'ftinformers').'" class="submitdelete" href="'.$deleteUrl.'">'.__('Delete', 'ftinformers').'</a>
	</span>
</div>';
		
	}
	function column_shortCode($item){
		echo '[ft_widget id="'.$item->id.'"]';
	}
	function column_phpCode($item){
		echo 'echo FtInformers::getInformer('.$item->id.');';
	}
	function get_bulk_actions() {
		$actions = array(
			'delete'    => __('Delete', 'ftinformers')
		);
		return $actions;
	}
	
	function no_items() {
		_e( 'No widgets found, dude.', 'ftinformers' );
	}
	

	protected function langs_dropdown() {
?>
		<label for="filter-by-subscriber-type" class="screen-reader-text"><?php _e( 'Filter by language', 'ftinformers' ); ?></label>
		<select name="ftInformerLang" id="filter-by-ft-lang">
			<?php $ftInformerLang = isset( $_GET['ftInformerLang'] ) ? $_GET['ftInformerLang'] : 0; ?>
			<option <?php selected( $ftInformerLang, 0 ); ?> value="0"><?php _e( 'All languages', 'ftinformers' ); ?></option>
			<?php
				$langs = FtiHelper::get('ftLangs');
		
				foreach( $langs as $lang => $data ){ ?>
					<option <?php selected( $ftInformerLang, $lang ); ?> value="<?php echo $lang;?>"><?php _e( ucfirst($lang) . ' language', 'ftinformers'); ?></option>
			<?php
				}
			?>
		</select>
<?php
	}

	protected function extra_tablenav( $which ) {
?>
		<div class="alignleft actions">
<?php
		if ( 'top' == $which && !is_singular() ) {

			$this->langs_dropdown();
			submit_button( __( 'Filter', 'ftinformers' ), 'button', 'filter_action', false, array( 'id' => 'filter-submit' ) );
		}
?>
		</div>
<?php
	}
	function display_tablenav( $which ) 
	{
		?>
		<div class="tablenav <?php echo esc_attr( $which ); ?>">

			<div class="alignleft actions">
				<?php $this->bulk_actions(); ?>
			</div>
			<?php
			$this->extra_tablenav( $which );
			$this->pagination( $which );
			?>
			<br class="clear" />
		</div>
		<?php
	}
	function getTableContents(){
		
		ob_start();
		
		echo "<form method='get' >";
		$this->prepare_items(); 
		echo '<input type="hidden" name="page" value="ft-informers" />';
		$this->display(); 
		echo '</form>';
		
		$contents = ob_get_contents();
		ob_end_clean();
		return $contents;
		
	}

}