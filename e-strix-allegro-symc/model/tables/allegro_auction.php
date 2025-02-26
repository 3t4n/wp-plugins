<?php 

class AllegroSyncAuctionWPTable extends WP_List_Table {
	
	public $auctionSettings = array();
	public $per_page = 10;
		
	public function get_columns(){
		return array(
			'auction_id' => __('Auction ID','e-strix-allegro-symc'),
			'ecommerce_id' => __('Product ID','e-strix-allegro-symc'),
			'auction_img_1_url' => __('Image','e-strix-allegro-symc'),
			'auction_title' => __('Title','e-strix-allegro-symc'),
			'auction_price' => __('Price','e-strix-allegro-symc'),
			'action'=>__('Action','e-strix-allegro-symc')
		);
	}

	function prepare_items($init_page = 0) {
		$columns = $this->get_columns();
		$hidden = array();
		$sortable = array();
		$this->_column_headers = array($columns, $hidden, $sortable);
		
		$current_page = ($init_page==0)?$this->get_pagenum():$init_page;
	  
		$modelAuctions = new EStrixAllegroSymcAuctions();
		$auctions = $modelAuctions->get_items((($current_page-1)*$this->per_page),$this->per_page);
		
		$this->set_pagination_args( array(
				'total_items' => $auctions['total_items'],
				'per_page'    => $this->per_page
			) );    
		$this->items = $this->table_format($auctions['items'],$modelAuctions,$init_page);	    
	}
	
	public function column_default($item, $column_name) {
		return $item[$column_name];
	}	
		
	public function table_format($auctions,$modelAuctions,$paged){
		$auctions_result = array();
		$columns = $this->get_columns();
		if(count($auctions) > 0):
			foreach($auctions as $auction):
				$auctions_result[$auction['id']] = array();
				foreach($columns as $column => $title_of_column):
					$value = '';
					switch($column):
						case 'auction_id': $value = $auction['auction_id']; break;
						case 'ecommerce_id': 
							if (!empty($auction['ecommerce_id'])) {
								$value = '<a href="'.admin_url('post.php?post='.$auction['ecommerce_id'].'&action=edit').'" target="_blank">'.__("Review",'e-strix-allegro-symc').'('.$auction['ecommerce_id'].')</a>' ;
							}
							break;
						case 'auction_img_1_url': 
							$value = "<img  width='150' src='" . $auction['auction_img_1_url'] . "'/>"; 
							break;
						case 'auction_title': $value = $auction['auction_title']; break;
						case 'auction_price': $value = $auction['auction_price']; break;
						case 'auction_end_time_left': $value = $auction['auction_end_time_left']; break;
						case 'auction_thumbnail_url': $value = $auction['auction_thumbnail_url']; break;
						case 'action' : 
							$value = "";							
							if (empty($auction['ecommerce_id'])) {
								$value .= '<a href="'.admin_url('admin.php?page=srtx_allegro_symc_auctions&action=synchronize&sid='.$auction['id'].'&aid='.$auction['auction_id']).'&paged='.$paged.'" title="'.__("Add product",'e-strix-allegro-symc').'">'.__("Add product",'e-strix-allegro-symc').'</a>' ;
							}
							break;
						default:
							$value = '';
							break;
					endswitch;					
					$auctions_result[$auction['id']][$column] = $value;
				endforeach;
			endforeach;
		endif;
		return $auctions_result;
	}	
}
