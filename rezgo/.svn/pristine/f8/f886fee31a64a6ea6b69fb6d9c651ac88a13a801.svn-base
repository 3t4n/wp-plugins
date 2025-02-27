<?php 
	// This script handles the multi time, price change requests made via ajax by calendar_day.php
	
	require('rezgo/include/page_header.php');

	// start a new instance of RezgoSite
	$site = new RezgoSite('secure');

	if ($_REQUEST['rezgoAction'] == 'book_time') {

		$uid = sanitize_text_field($_REQUEST['uid']);
		$date = sanitize_text_field($_REQUEST['date']);
		$book_time = urlencode(sanitize_text_field($_REQUEST['book_time']));

		$option = $site->getTours('t=uid&q='.$uid.'&d='.$date.'&book_time='.$book_time, 0);
		$prices = $option->prices;
		$min_guests = (int)$option->min_guests ?? 0;

		// currency format details 
		$currency_symbol = (string)$option->currency_symbol;
		$currency_decimals = (int)$option->currency_decimals;
		$currency_separator = (string)$option->currency_separator;
		
		function formatCurrency($num, $currency_symbol=null, $currency_decimals=null, $currency_separator=null) {
			// displays negative symbol in front of prices
			if (strpos((string)$num, "-") !== false) {
				$num = str_replace("-", "", $num);
				$pre = '- ';
			}
			return str_replace(" ", "&nbsp;", $pre.$currency_symbol.number_format((float)$num, $currency_decimals, '.', $currency_separator));
		}

		$prices_obj = [];
		foreach ($prices->price as $price) {
			if ($price->id == 1) { $price_name = 'adult'; }
			elseif ($price->id == 2) { $price_name = 'child'; }
			elseif ($price->id == 3) { $price_name = 'senior'; }
			elseif ($price->id == 4) { $price_name = 'price4'; }
			elseif ($price->id == 5) { $price_name = 'price5'; }
			elseif ($price->id == 6) { $price_name = 'price6'; }
			elseif ($price->id == 7) { $price_name = 'price7'; }
			elseif ($price->id == 8) { $price_name = 'price8'; }
			elseif ($price->id == 9) { $price_name = 'price9'; }

			$prices_obj[(int)$price->id] = (object)[];
			
			$prices_obj[(int)$price->id]->name = (string)$price_name;
			$prices_obj[(int)$price->id]->price = (float)$price->retail;
			$prices_obj[(int)$price->id]->formatted_price = formatCurrency($price->retail, $currency_symbol, $currency_decimals, $currency_separator);
		}
		$prices_obj['min_guests'] = $min_guests; 

		$response = json_encode($prices_obj, JSON_PRETTY_PRINT);
	}

	if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
		// ajax response if we requested this page correctly
		echo $response;		
	} else {
		die ('Something went wrong.');
	}