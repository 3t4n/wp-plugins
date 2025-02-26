<?php
defined( 'ABSPATH' ) or die( 'Please don&rsquo;t call the plugin directly. Thanks :)' );

class ACP_Column_rkseo_gsc_impressions extends AC\Column\Meta
	implements \ACP\Sorting\Sortable, \ACP\Export\Exportable, \ACP\Search\Searchable {

	public function __construct() {
		$this->set_type( 'column-rkseo_gsc_impressions' );
		$this->set_group( 'rankology' );
		$this->set_label( __( 'Impressions', 'wp-rankology' ) );
	}

	public function get_meta_key() {
		return '_rankology_search_console_analysis_impressions';
	}

	public function get_value( $post_id ) {
		$value = esc_html( $this->get_raw_value( $post_id ) );

        if (empty($value)) {
            $value = 0;
        }

        return $value;
	}

	public function sorting() {
		return new ACP_Sorting_Model_rkseo_gsc_impressions( $this );
	}

	public function export() {
		return new ACP_Export_Model_rkseo_gsc_impressions( $this );
	}

	public function search() {
		return new ACP\Search\Comparison\Meta\Text( $this->get_meta_key(), $this->get_meta_type() );
	}

}

/**
 * Sorting class. Adds sorting functionality to the column.
 */
class ACP_Sorting_Model_rkseo_gsc_impressions extends \ACP\Sorting\Model {

	/**
	 * (Optional) Put all the sorting logic here. You can remove this function if you want to sort by raw value only.
	 * @return array
	 */
	public function get_sorting_vars() {
		$values = array();

		foreach ( $this->strategy->get_results() as $id ) {

			$value = $this->column->get_raw_value( $id );

			$values[ $id ] = $value;
		}

		return array(
			'ids' => $this->sort( $values ),
		);

	}

}

/**
 * Export class. Adds export functionality to the column.
 */
class ACP_Export_Model_rkseo_gsc_impressions extends \ACP\Export\Model {

	public function get_value( $id ) {
		return $this->column->get_raw_value( $id );
	}

}
