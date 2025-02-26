<?php
class fufi_Filling {
	// set the site url - required to create the correct link to other pages
	static $site_url;
	
	// get unit price and
	public static function enrich($fillings) {
		$qsum = 0;
		foreach ( $fillings as $filling ) {
			if ($filling->quantity != 0) {
				$filling->ppu = number_format ( round ( $filling->price / $filling->quantity, 3 ), 3 );
			} else {
				$filling->ppu = "";
			}
			
			$q = $filling->quantity;
			$qsum += $q;
			$e = $filling->evaluate;
			$f = $filling->full;
			$m = $filling->mileage;
			if (($e == TRUE) and isset ( $last_mileage )) {
				if ($f == TRUE) {
					$dm = $m - $last_mileage;
					if ($dm != 0) {
						$filling->consumption = number_format ( round ( $qsum / $dm * 100., 1 ), 1 );
					} else {
						$filling->consumption = "";
					}
					$qsum = 0;
					$last_mileage = $m;
				} else { // not full
					$filling->consumption = "";
				}
			} else {
				$filling->consumption = "";
				$qsum = 0;
				$last_mileage = $m;
			}
		}
	}
	
	// html code to display a header with all relevant column names
	const tableHeader = "<tr><th>Date</th><th>Quantity</th><th>Mileage</th><th>Q/M</th><th>Price</th><th>PPU</th><th>Station</th><th>Comment</th></tr>";
	
	// member variables
	public $id, $fdate, $quantity, $mileage, $price, $station, $comment, $ppu, $consumption;
	
	// constructor
	function __construct($id, $fdate, $quantity, $mileage, $price, $station, $comment, $full, $evaluate) {
		$this->id = $id;
		$this->fdate = $fdate;
		$this->quantity = $quantity;
		$this->mileage = $mileage;
		$this->price = $price;
		$this->station = $station;
		$this->comment = $comment;
		$this->full = $full;
		$this->evaluate = $evaluate;
		// defaults
		$this->ppu = 0;
		$this->consumption = 0;
	}
	
	// return price per unit if all relevant data is available
	function unit_price() {
		if ($this->quantity != 0) {
			return number_format ( round ( $this->price / $this->quantity, 3 ), 3 );
		} else {
			return "";
		}
	}
	
	// return html code that represents a table row with all relevant column information
	function tableRow() {
		$q = number_format ( $this->quantity, 2 );
		if (! $this->full)
			$q = "(" . $q . ")";
		$m = number_format ( $this->mileage, 0 );
		if (! $this->evaluate)
			$m = "(" . $m . ")";
		$r = "<tr>";
		$r .= "<td align=center> <a href=" . self::$site_url . "/wp-admin/post.php?post=" . $this->id . "&action=edit>" . $this->fdate . "</a></td>";
		$r .= "<td align=right> " . $q . "</td>";
		$r .= "<td align=right> " . $m . "</td>";
		$r .= "<td align=right> " . $this->consumption . "</td>";
		$r .= "<td align=right> " . number_format ( $this->price, 2 ) . "</td>";
		// $r .= "<td align=right> " . $this->unit_price () . "</td>";
		$r .= "<td align=right> " . $this->ppu . "</td>";
		$r .= "<td align=left> $this->station </td>";
		$r .= "<td align=left> $this->comment </td>";
		$r .= "</tr>";
		return $r;
	}
	
	// return data required to create a JSON object (i. e. without $id)
	function jsonRelevantData() {
		return array (
				"fdate" => $this->fdate,
				"quantity" => $this->quantity,
				"full" => $this->full,
				"mileage" => $this->mileage,
				"price" => $this->price,
				"station" => $this->station,
				"comment" => $this->comment,
				"evaluate" => $this->evaluate 
		);
	}
}
?>