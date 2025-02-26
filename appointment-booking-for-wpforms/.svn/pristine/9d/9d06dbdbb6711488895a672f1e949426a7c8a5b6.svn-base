<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
class Booknow_Functions {
	public static function get_week($full = true){
		$datas = array();
		if($full){
			$datas[1] = esc_html__("Monday","booknow");
			$datas[2] = esc_html__("Tuesday","booknow");
			$datas[3] = esc_html__("Wednesday","booknow");
			$datas[4] = esc_html__("Thursday","booknow");
			$datas[5] = esc_html__("Friday","booknow");
			$datas[6] = esc_html__("Saturday","booknow");
			$datas[0] = esc_html__("Sunday","booknow");
		}else{
			$datas[1] = esc_html__("Mon","booknow");
			$datas[2] = esc_html__("Tue","booknow");
			$datas[3] = esc_html__("Wed","booknow");
			$datas[4] = esc_html__("Thurs","booknow");
			$datas[5] = esc_html__("Fri","booknow");
			$datas[6] = esc_html__("Sat","booknow");
			$datas[0] = esc_html__("Sun","booknow");
		}
         return $datas;
	}
	public static function get_month($full = true){
		$datas = array();
		if($full){
			$datas[] = esc_html__("January","booknow");
			$datas[] = esc_html__("February","booknow");
			$datas[] = esc_html__("March","booknow");
			$datas[] = esc_html__("April","booknow");
			$datas[] = esc_html__("May","booknow");
			$datas[] = esc_html__("June","booknow");
			$datas[] = esc_html__("July","booknow");
			$datas[] = esc_html__("August","booknow");
			$datas[] = esc_html__("September","booknow");
			$datas[] = esc_html__("October","booknow");
			$datas[] = esc_html__("November","booknow");
			$datas[] = esc_html__("December","booknow");
		}else{
			$datas[] = esc_html__("jan","booknow");
			$datas[] = esc_html__("feb","booknow");
			$datas[] = esc_html__("mar","booknow");
			$datas[] = esc_html__("apr","booknow");
			$datas[] = esc_html__("may","booknow");
			$datas[] = esc_html__("jun","booknow");
			$datas[] = esc_html__("jul","booknow");
			$datas[] = esc_html__("aug","booknow");
			$datas[] = esc_html__("sep","booknow");
			$datas[] = esc_html__("oct","booknow");
			$datas[] = esc_html__("nov","booknow");
			$datas[] = esc_html__("dec","booknow");
		}
         return $datas;
	}
	public static function get_time_slot($start_time = "", $end_time="", $duration = 5){
		$time_format = apply_filters("booknow_time_format","h:i");
		$add_mins  = $duration * 60;
		$datas = array();
		if( $start_time == ""){
			$start_time = "00:00";
		}
		if( $end_time == ""){
			$end_time = "23:59";
		}
		$start_time    = strtotime ($start_time); 
		$end_time      = strtotime ($end_time);
		while ($start_time <= $end_time) 
		   {
		      $datas[] = array("key"=>date ("H:i", $start_time), "value"=> date ($time_format, $start_time));
		      $start_time += $add_mins; 
		   } 
		return $datas;
	}
	public static function get_time_slot_booking($date, $duration = 60){
        $time_settings = get_option("booknow_settings");
        $time_settings = $time_settings["working_hours"];
        $day_of_the_week = date('w', strtotime($date));
        $add_mins  = $duration * 60;
        $array_of_time = array();
        if( isset($time_settings[$day_of_the_week]["start"]) ){
            $starttimes = $time_settings[$day_of_the_week]["start"]; 
            $endtimes = $time_settings[$day_of_the_week]["end"];
            foreach( $starttimes as $starttime_key => $starttime ) {
                if($starttime == "off"){
                    continue;
                }
                $array_of_time = array_merge($array_of_time,Booknow_Functions::get_time_slot($starttime,$endtimes[$starttime_key],$duration));
            }
        }
		return $array_of_time;
	}
	public static function cover_time_to_hours($minutes = ""){
		if($minutes > 59 ){

			$hour = floor($minutes / 60);
			if($hour>1){
				$hour_text = esc_html__("Hours","booknow");
			}else{
				$hour_text = esc_html__("Hour","booknow");
			}
			if($hour>1){
				$hour_text = esc_html__("Hours","booknow");
			}else{
				$hour_text = esc_html__("Hour","booknow");
			}
			$m = ($minutes - $hour * 60);
			if($m==0){
				$m ="";
			}
			return $hour." ".$hour_text.$m;
		}else{
			return $minutes." ".esc_html__("Minutes","booknow");
		}
	}
	public static function cover_price_format($price = ""){
		return Booknow_Functions::money_format($price,"USD");
	}
	public static function money_format($floatcurr, $curr = 'EUR' ){
	    $currencies['ARS'] = array(2, ',', '.');          //  Argentine Peso
	    $currencies['AMD'] = array(2, '.', ',');          //  Armenian Dram
	    $currencies['AWG'] = array(2, '.', ',');          //  Aruban Guilder
	    $currencies['AUD'] = array(2, '.', ' ');          //  Australian Dollar
	    $currencies['BSD'] = array(2, '.', ',');          //  Bahamian Dollar
	    $currencies['BHD'] = array(3, '.', ',');          //  Bahraini Dinar
	    $currencies['BDT'] = array(2, '.', ',');          //  Bangladesh, Taka
	    $currencies['BZD'] = array(2, '.', ',');          //  Belize Dollar
	    $currencies['BMD'] = array(2, '.', ',');          //  Bermudian Dollar
	    $currencies['BOB'] = array(2, '.', ',');          //  Bolivia, Boliviano
	    $currencies['BAM'] = array(2, '.', ',');          //  Bosnia and Herzegovina, Convertible Marks
	    $currencies['BWP'] = array(2, '.', ',');          //  Botswana, Pula
	    $currencies['BRL'] = array(2, ',', '.');          //  Brazilian Real
	    $currencies['BND'] = array(2, '.', ',');          //  Brunei Dollar
	    $currencies['CAD'] = array(2, '.', ',');          //  Canadian Dollar
	    $currencies['KYD'] = array(2, '.', ',');          //  Cayman Islands Dollar
	    $currencies['CLP'] = array(0,  '', '.');          //  Chilean Peso
	    $currencies['CNY'] = array(2, '.', ',');          //  China Yuan Renminbi
	    $currencies['COP'] = array(2, ',', '.');          //  Colombian Peso
	    $currencies['CRC'] = array(2, ',', '.');          //  Costa Rican Colon
	    $currencies['HRK'] = array(2, ',', '.');          //  Croatian Kuna
	    $currencies['CUC'] = array(2, '.', ',');          //  Cuban Convertible Peso
	    $currencies['CUP'] = array(2, '.', ',');          //  Cuban Peso
	    $currencies['CYP'] = array(2, '.', ',');          //  Cyprus Pound
	    $currencies['CZK'] = array(2, '.', ',');          //  Czech Koruna
	    $currencies['DKK'] = array(2, ',', '.');          //  Danish Krone
	    $currencies['DOP'] = array(2, '.', ',');          //  Dominican Peso
	    $currencies['XCD'] = array(2, '.', ',');          //  East Caribbean Dollar
	    $currencies['EGP'] = array(2, '.', ',');          //  Egyptian Pound
	    $currencies['SVC'] = array(2, '.', ',');          //  El Salvador Colon
	    $currencies['ATS'] = array(2, ',', '.');          //  Euro
	    $currencies['BEF'] = array(2, ',', '.');          //  Euro
	    $currencies['DEM'] = array(2, ',', '.');          //  Euro
	    $currencies['EEK'] = array(2, ',', '.');          //  Euro
	    $currencies['ESP'] = array(2, ',', '.');          //  Euro
	    $currencies['EUR'] = array(2, ',', '.');          //  Euro
	    $currencies['FIM'] = array(2, ',', '.');          //  Euro
	    $currencies['FRF'] = array(2, ',', '.');          //  Euro
	    $currencies['GRD'] = array(2, ',', '.');          //  Euro
	    $currencies['IEP'] = array(2, ',', '.');          //  Euro
	    $currencies['ITL'] = array(2, ',', '.');          //  Euro
	    $currencies['LUF'] = array(2, ',', '.');          //  Euro
	    $currencies['NLG'] = array(2, ',', '.');          //  Euro
	    $currencies['PTE'] = array(2, ',', '.');          //  Euro
	    $currencies['GHC'] = array(2, '.', ',');          //  Ghana, Cedi
	    $currencies['GIP'] = array(2, '.', ',');          //  Gibraltar Pound
	    $currencies['GTQ'] = array(2, '.', ',');          //  Guatemala, Quetzal
	    $currencies['HNL'] = array(2, '.', ',');          //  Honduras, Lempira
	    $currencies['HKD'] = array(2, '.', ',');          //  Hong Kong Dollar
	    $currencies['HUF'] = array(0,  '', '.');          //  Hungary, Forint
	    $currencies['ISK'] = array(0,  '', '.');          //  Iceland Krona
	    $currencies['INR'] = array(2, '.', ',');          //  Indian Rupee
	    $currencies['IDR'] = array(2, ',', '.');          //  Indonesia, Rupiah
	    $currencies['IRR'] = array(2, '.', ',');          //  Iranian Rial
	    $currencies['JMD'] = array(2, '.', ',');          //  Jamaican Dollar
	    $currencies['JPY'] = array(0,  '', ',');          //  Japan, Yen
	    $currencies['JOD'] = array(3, '.', ',');          //  Jordanian Dinar
	    $currencies['KES'] = array(2, '.', ',');          //  Kenyan Shilling
	    $currencies['KWD'] = array(3, '.', ',');          //  Kuwaiti Dinar
	    $currencies['LVL'] = array(2, '.', ',');          //  Latvian Lats
	    $currencies['LBP'] = array(0,  '', ' ');          //  Lebanese Pound
	    $currencies['LTL'] = array(2, ',', ' ');          //  Lithuanian Litas
	    $currencies['MKD'] = array(2, '.', ',');          //  Macedonia, Denar
	    $currencies['MYR'] = array(2, '.', ',');          //  Malaysian Ringgit
	    $currencies['MTL'] = array(2, '.', ',');          //  Maltese Lira
	    $currencies['MUR'] = array(0,  '', ',');          //  Mauritius Rupee
	    $currencies['MXN'] = array(2, '.', ',');          //  Mexican Peso
	    $currencies['MZM'] = array(2, ',', '.');          //  Mozambique Metical
	    $currencies['NPR'] = array(2, '.', ',');          //  Nepalese Rupee
	    $currencies['ANG'] = array(2, '.', ',');          //  Netherlands Antillian Guilder
	    $currencies['ILS'] = array(2, '.', ',');          //  New Israeli Shekel
	    $currencies['TRY'] = array(2, '.', ',');          //  New Turkish Lira
	    $currencies['NZD'] = array(2, '.', ',');          //  New Zealand Dollar
	    $currencies['NOK'] = array(2, ',', '.');          //  Norwegian Krone
	    $currencies['PKR'] = array(2, '.', ',');          //  Pakistan Rupee
	    $currencies['PEN'] = array(2, '.', ',');          //  Peru, Nuevo Sol
	    $currencies['UYU'] = array(2, ',', '.');          //  Peso Uruguayo
	    $currencies['PHP'] = array(2, '.', ',');          //  Philippine Peso
	    $currencies['PLN'] = array(2, '.', ' ');          //  Poland, Zloty
	    $currencies['GBP'] = array(2, '.', ',');          //  Pound Sterling
	    $currencies['OMR'] = array(3, '.', ',');          //  Rial Omani
	    $currencies['RON'] = array(2, ',', '.');          //  Romania, New Leu
	    $currencies['ROL'] = array(2, ',', '.');          //  Romania, Old Leu
	    $currencies['RUB'] = array(2, ',', '.');          //  Russian Ruble
	    $currencies['SAR'] = array(2, '.', ',');          //  Saudi Riyal
	    $currencies['SGD'] = array(2, '.', ',');          //  Singapore Dollar
	    $currencies['SKK'] = array(2, ',', ' ');          //  Slovak Koruna
	    $currencies['SIT'] = array(2, ',', '.');          //  Slovenia, Tolar
	    $currencies['ZAR'] = array(2, '.', ' ');          //  South Africa, Rand
	    $currencies['KRW'] = array(0,  '', ',');          //  South Korea, Won
	    $currencies['SZL'] = array(2, '.', ', ');         //  Swaziland, Lilangeni
	    $currencies['SEK'] = array(2, ',', '.');          //  Swedish Krona
	    $currencies['CHF'] = array(2, '.', '\'');         //  Swiss Franc
	    $currencies['TZS'] = array(2, '.', ',');          //  Tanzanian Shilling
	    $currencies['THB'] = array(2, '.', ',');          //  Thailand, Baht
	    $currencies['TOP'] = array(2, '.', ',');          //  Tonga, Paanga
	    $currencies['AED'] = array(2, '.', ',');          //  UAE Dirham
	    $currencies['UAH'] = array(2, ',', ' ');          //  Ukraine, Hryvnia
	    $currencies['USD'] = array(2, '.', ',');          //  US Dollar
	    $currencies['VUV'] = array(0,  '', ',');          //  Vanuatu, Vatu
	    $currencies['VEF'] = array(2, ',', '.');          //  Venezuela Bolivares Fuertes
	    $currencies['VEB'] = array(2, ',', '.');          //  Venezuela, Bolivar
	    $currencies['VND'] = array(0,  '', '.');          //  Viet Nam, Dong
	    $currencies['ZWD'] = array(2, '.', ' ');          //  Zimbabwe Dollar
	    // custom function to generate: ##,##,###.##
	    function formatinr($input)
	    {
	        $dec = "";
	        $pos = strpos($input, ".");
	        if ($pos === FALSE)
	        {
	            //no decimals
	        }
	        else
	        {
	            //decimals
	            $dec   = substr(round(substr($input, $pos), 2), 1);
	            $input = substr($input, 0, $pos);
	        }
	        $num   = substr($input, -3);    // get the last 3 digits
	        $input = substr($input, 0, -3); // omit the last 3 digits already stored in $num
	        // loop the process - further get digits 2 by 2
	        while (strlen($input) > 0)
	        {
	            $num   = substr($input, -2).",".$num;
	            $input = substr($input, 0, -2);
	        }
	        return $num.$dec;
	    }
	    if ($curr == "INR")
	    {
	        return formatinr($floatcurr);
	    }
	    else
	    {
	        return number_format($floatcurr, $currencies[$curr][0], $currencies[$curr][1], $currencies[$curr][2]);
	    }
	}
	public static function currency_list() {
		$currency_list = array(
		    "AFA" => array("name" => "Afghan Afghani", "symbol" => "؋"),
		    "ALL" => array("name" => "Albanian Lek", "symbol" => "Lek"),
		    "DZD" => array("name" => "Algerian Dinar", "symbol" => "دج"),
		    "AOA" => array("name" => "Angolan Kwanza", "symbol" => "Kz"),
		    "ARS" => array("name" => "Argentine Peso", "symbol" => "$"),
		    "AMD" => array("name" => "Armenian Dram", "symbol" => "֏"),
		    "AWG" => array("name" => "Aruban Florin", "symbol" => "ƒ"),
		    "AUD" => array("name" => "Australian Dollar", "symbol" => "$"),
		    "AZN" => array("name" => "Azerbaijani Manat", "symbol" => "m"),
		    "BSD" => array("name" => "Bahamian Dollar", "symbol" => "B$"),
		    "BHD" => array("name" => "Bahraini Dinar", "symbol" => ".د.ب"),
		    "BDT" => array("name" => "Bangladeshi Taka", "symbol" => "৳"),
		    "BBD" => array("name" => "Barbadian Dollar", "symbol" => "Bds$"),
		    "BYR" => array("name" => "Belarusian Ruble", "symbol" => "Br"),
		    "BEF" => array("name" => "Belgian Franc", "symbol" => "fr"),
		    "BZD" => array("name" => "Belize Dollar", "symbol" => "$"),
		    "BMD" => array("name" => "Bermudan Dollar", "symbol" => "$"),
		    "BTN" => array("name" => "Bhutanese Ngultrum", "symbol" => "Nu."),
		    "BTC" => array("name" => "Bitcoin", "symbol" => "฿"),
		    "BOB" => array("name" => "Bolivian Boliviano", "symbol" => "Bs."),
		    "BAM" => array("name" => "Bosnia-Herzegovina Convertible Mark", "symbol" => "KM"),
		    "BWP" => array("name" => "Botswanan Pula", "symbol" => "P"),
		    "BRL" => array("name" => "Brazilian Real", "symbol" => "R$"),
		    "GBP" => array("name" => "British Pound Sterling", "symbol" => "£"),
		    "BND" => array("name" => "Brunei Dollar", "symbol" => "B$"),
		    "BGN" => array("name" => "Bulgarian Lev", "symbol" => "Лв."),
		    "BIF" => array("name" => "Burundian Franc", "symbol" => "FBu"),
		    "KHR" => array("name" => "Cambodian Riel", "symbol" => "KHR"),
		    "CAD" => array("name" => "Canadian Dollar", "symbol" => "$"),
		    "CVE" => array("name" => "Cape Verdean Escudo", "symbol" => "$"),
		    "KYD" => array("name" => "Cayman Islands Dollar", "symbol" => "$"),
		    "XOF" => array("name" => "CFA Franc BCEAO", "symbol" => "CFA"),
		    "XAF" => array("name" => "CFA Franc BEAC", "symbol" => "FCFA"),
		    "XPF" => array("name" => "CFP Franc", "symbol" => "₣"),
		    "CLP" => array("name" => "Chilean Peso", "symbol" => "$"),
		    "CLF" => array("name" => "Chilean Unit of Account", "symbol" => "CLF"),
		    "CNY" => array("name" => "Chinese Yuan", "symbol" => "¥"),
		    "COP" => array("name" => "Colombian Peso", "symbol" => "$"),
		    "KMF" => array("name" => "Comorian Franc", "symbol" => "CF"),
		    "CDF" => array("name" => "Congolese Franc", "symbol" => "FC"),
		    "CRC" => array("name" => "Costa Rican Colón", "symbol" => "₡"),
		    "HRK" => array("name" => "Croatian Kuna", "symbol" => "kn"),
		    "CUC" => array("name" => "Cuban Convertible Peso", "symbol" => "$, CUC"),
		    "CZK" => array("name" => "Czech Republic Koruna", "symbol" => "Kč"),
		    "DKK" => array("name" => "Danish Krone", "symbol" => "Kr."),
		    "DJF" => array("name" => "Djiboutian Franc", "symbol" => "Fdj"),
		    "DOP" => array("name" => "Dominican Peso", "symbol" => "$"),
		    "XCD" => array("name" => "East Caribbean Dollar", "symbol" => "$"),
		    "EGP" => array("name" => "Egyptian Pound", "symbol" => "ج.م"),
		    "ERN" => array("name" => "Eritrean Nakfa", "symbol" => "Nfk"),
		    "EEK" => array("name" => "Estonian Kroon", "symbol" => "kr"),
		    "ETB" => array("name" => "Ethiopian Birr", "symbol" => "Nkf"),
		    "EUR" => array("name" => "Euro", "symbol" => "€"),
		    "FKP" => array("name" => "Falkland Islands Pound", "symbol" => "£"),
		    "FJD" => array("name" => "Fijian Dollar", "symbol" => "FJ$"),
		    "GMD" => array("name" => "Gambian Dalasi", "symbol" => "D"),
		    "GEL" => array("name" => "Georgian Lari", "symbol" => "ლ"),
		    "DEM" => array("name" => "German Mark", "symbol" => "DM"),
		    "GHS" => array("name" => "Ghanaian Cedi", "symbol" => "GH₵"),
		    "GIP" => array("name" => "Gibraltar Pound", "symbol" => "£"),
		    "GRD" => array("name" => "Greek Drachma", "symbol" => "₯, Δρχ, Δρ"),
		    "GTQ" => array("name" => "Guatemalan Quetzal", "symbol" => "Q"),
		    "GNF" => array("name" => "Guinean Franc", "symbol" => "FG"),
		    "GYD" => array("name" => "Guyanaese Dollar", "symbol" => "$"),
		    "HTG" => array("name" => "Haitian Gourde", "symbol" => "G"),
		    "HNL" => array("name" => "Honduran Lempira", "symbol" => "L"),
		    "HKD" => array("name" => "Hong Kong Dollar", "symbol" => "$"),
		    "HUF" => array("name" => "Hungarian Forint", "symbol" => "Ft"),
		    "ISK" => array("name" => "Icelandic Króna", "symbol" => "kr"),
		    "INR" => array("name" => "Indian Rupee", "symbol" => "₹"),
		    "IDR" => array("name" => "Indonesian Rupiah", "symbol" => "Rp"),
		    "IRR" => array("name" => "Iranian Rial", "symbol" => "﷼"),
		    "IQD" => array("name" => "Iraqi Dinar", "symbol" => "د.ع"),
		    "ILS" => array("name" => "Israeli New Sheqel", "symbol" => "₪"),
		    "ITL" => array("name" => "Italian Lira", "symbol" => "L,£"),
		    "JMD" => array("name" => "Jamaican Dollar", "symbol" => "J$"),
		    "JPY" => array("name" => "Japanese Yen", "symbol" => "¥"),
		    "JOD" => array("name" => "Jordanian Dinar", "symbol" => "ا.د"),
		    "KZT" => array("name" => "Kazakhstani Tenge", "symbol" => "лв"),
		    "KES" => array("name" => "Kenyan Shilling", "symbol" => "KSh"),
		    "KWD" => array("name" => "Kuwaiti Dinar", "symbol" => "ك.د"),
		    "KGS" => array("name" => "Kyrgystani Som", "symbol" => "лв"),
		    "LAK" => array("name" => "Laotian Kip", "symbol" => "₭"),
		    "LVL" => array("name" => "Latvian Lats", "symbol" => "Ls"),
		    "LBP" => array("name" => "Lebanese Pound", "symbol" => "£"),
		    "LSL" => array("name" => "Lesotho Loti", "symbol" => "L"),
		    "LRD" => array("name" => "Liberian Dollar", "symbol" => "$"),
		    "LYD" => array("name" => "Libyan Dinar", "symbol" => "د.ل"),
		    "LTC" => array("name" => "Litecoin", "symbol" => "Ł"),
		    "LTL" => array("name" => "Lithuanian Litas", "symbol" => "Lt"),
		    "MOP" => array("name" => "Macanese Pataca", "symbol" => "$"),
		    "MKD" => array("name" => "Macedonian Denar", "symbol" => "ден"),
		    "MGA" => array("name" => "Malagasy Ariary", "symbol" => "Ar"),
		    "MWK" => array("name" => "Malawian Kwacha", "symbol" => "MK"),
		    "MYR" => array("name" => "Malaysian Ringgit", "symbol" => "RM"),
		    "MVR" => array("name" => "Maldivian Rufiyaa", "symbol" => "Rf"),
		    "MRO" => array("name" => "Mauritanian Ouguiya", "symbol" => "MRU"),
		    "MUR" => array("name" => "Mauritian Rupee", "symbol" => "₨"),
		    "MXN" => array("name" => "Mexican Peso", "symbol" => "$"),
		    "MDL" => array("name" => "Moldovan Leu", "symbol" => "L"),
		    "MNT" => array("name" => "Mongolian Tugrik", "symbol" => "₮"),
		    "MAD" => array("name" => "Moroccan Dirham", "symbol" => "MAD"),
		    "MZM" => array("name" => "Mozambican Metical", "symbol" => "MT"),
		    "MMK" => array("name" => "Myanmar Kyat", "symbol" => "K"),
		    "NAD" => array("name" => "Namibian Dollar", "symbol" => "$"),
		    "NPR" => array("name" => "Nepalese Rupee", "symbol" => "₨"),
		    "ANG" => array("name" => "Netherlands Antillean Guilder", "symbol" => "ƒ"),
		    "TWD" => array("name" => "New Taiwan Dollar", "symbol" => "$"),
		    "NZD" => array("name" => "New Zealand Dollar", "symbol" => "$"),
		    "NIO" => array("name" => "Nicaraguan Córdoba", "symbol" => "C$"),
		    "NGN" => array("name" => "Nigerian Naira", "symbol" => "₦"),
		    "KPW" => array("name" => "North Korean Won", "symbol" => "₩"),
		    "NOK" => array("name" => "Norwegian Krone", "symbol" => "kr"),
		    "OMR" => array("name" => "Omani Rial", "symbol" => ".ع.ر"),
		    "PKR" => array("name" => "Pakistani Rupee", "symbol" => "₨"),
		    "PAB" => array("name" => "Panamanian Balboa", "symbol" => "B/."),
		    "PGK" => array("name" => "Papua New Guinean Kina", "symbol" => "K"),
		    "PYG" => array("name" => "Paraguayan Guarani", "symbol" => "₲"),
		    "PEN" => array("name" => "Peruvian Nuevo Sol", "symbol" => "S/."),
		    "PHP" => array("name" => "Philippine Peso", "symbol" => "₱"),
		    "PLN" => array("name" => "Polish Zloty", "symbol" => "zł"),
		    "QAR" => array("name" => "Qatari Rial", "symbol" => "ق.ر"),
		    "RON" => array("name" => "Romanian Leu", "symbol" => "lei"),
		    "RUB" => array("name" => "Russian Ruble", "symbol" => "₽"),
		    "RWF" => array("name" => "Rwandan Franc", "symbol" => "FRw"),
		    "SVC" => array("name" => "Salvadoran Colón", "symbol" => "₡"),
		    "WST" => array("name" => "Samoan Tala", "symbol" => "SAT"),
		    "STD" => array("name" => "São Tomé and Príncipe Dobra", "symbol" => "Db"),
		    "SAR" => array("name" => "Saudi Riyal", "symbol" => "﷼"),
		    "RSD" => array("name" => "Serbian Dinar", "symbol" => "din"),
		    "SCR" => array("name" => "Seychellois Rupee", "symbol" => "SRe"),
		    "SLL" => array("name" => "Sierra Leonean Leone", "symbol" => "Le"),
		    "SGD" => array("name" => "Singapore Dollar", "symbol" => "$"),
		    "SKK" => array("name" => "Slovak Koruna", "symbol" => "Sk"),
		    "SBD" => array("name" => "Solomon Islands Dollar", "symbol" => "Si$"),
		    "SOS" => array("name" => "Somali Shilling", "symbol" => "Sh.so."),
		    "ZAR" => array("name" => "South African Rand", "symbol" => "R"),
		    "KRW" => array("name" => "South Korean Won", "symbol" => "₩"),
		    "SSP" => array("name" => "South Sudanese Pound", "symbol" => "£"),
		    "XDR" => array("name" => "Special Drawing Rights", "symbol" => "SDR"),
		    "LKR" => array("name" => "Sri Lankan Rupee", "symbol" => "Rs"),
		    "SHP" => array("name" => "St. Helena Pound", "symbol" => "£"),
		    "SDG" => array("name" => "Sudanese Pound", "symbol" => ".س.ج"),
		    "SRD" => array("name" => "Surinamese Dollar", "symbol" => "$"),
		    "SZL" => array("name" => "Swazi Lilangeni", "symbol" => "E"),
		    "SEK" => array("name" => "Swedish Krona", "symbol" => "kr"),
		    "CHF" => array("name" => "Swiss Franc", "symbol" => "CHf"),
		    "SYP" => array("name" => "Syrian Pound", "symbol" => "LS"),
		    "TJS" => array("name" => "Tajikistani Somoni", "symbol" => "SM"),
		    "TZS" => array("name" => "Tanzanian Shilling", "symbol" => "TSh"),
		    "THB" => array("name" => "Thai Baht", "symbol" => "฿"),
		    "TOP" => array("name" => "Tongan Pa'anga", "symbol" => "$"),
		    "TTD" => array("name" => "Trinidad & Tobago Dollar", "symbol" => "$"),
		    "TND" => array("name" => "Tunisian Dinar", "symbol" => "ت.د"),
		    "TRY" => array("name" => "Turkish Lira", "symbol" => "₺"),
		    "TMT" => array("name" => "Turkmenistani Manat", "symbol" => "T"),
		    "UGX" => array("name" => "Ugandan Shilling", "symbol" => "USh"),
		    "UAH" => array("name" => "Ukrainian Hryvnia", "symbol" => "₴"),
		    "AED" => array("name" => "United Arab Emirates Dirham", "symbol" => "إ.د"),
		    "UYU" => array("name" => "Uruguayan Peso", "symbol" => "$"),
		    "USD" => array("name" => "US Dollar", "symbol" => "$"),
		    "UZS" => array("name" => "Uzbekistan Som", "symbol" => "лв"),
		    "VUV" => array("name" => "Vanuatu Vatu", "symbol" => "VT"),
		    "VEF" => array("name" => "Venezuelan BolÃvar", "symbol" => "Bs"),
		    "VND" => array("name" => "Vietnamese Dong", "symbol" => "₫"),
		    "YER" => array("name" => "Yemeni Rial", "symbol" => "﷼"),
		    "ZMK" => array("name" => "Zambian Kwacha", "symbol" => "ZK"),
		    "ZWL" => array("name" => "Zimbabwean dollar", "symbol" => "$")
		);
	return $currency_list;
	}
	public static function get_google_fonts(){
            return array(
            'ABeeZee',
            'Abel',
            'Abhaya Libre',
            'Abril Fatface',
            'Aclonica',
            'Acme',
            'Actor',
            'Adamina',
            'Advent Pro',
            'Aguafina Script',
            'Akronim',
            'Aladin',
            'Aldrich',
            'Alef',
            'Alegreya',
            'Alegreya SC',
            'Alegreya Sans',
            'Alegreya Sans SC',
            'Alex Brush',
            'Alfa Slab One',
            'Alice',
            'Alike',
            'Alike Angular',
            'Allan',
            'Allerta',
            'Allerta Stencil',
            'Allura',
            'Almendra',
            'Almendra Display',
            'Almendra SC',
            'Amarante',
            'Amaranth',
            'Amatic SC',
            'Amethysta',
            'Amiko',
            'Amiri',
            'Amita',
            'Anaheim',
            'Andada',
            'Andika',
            'Angkor',
            'Annie Use Your Telescope',
            'Anonymous Pro',
            'Antic',
            'Antic Didone',
            'Antic Slab',
            'Anton',
            'Arapey',
            'Arbutus',
            'Arbutus Slab',
            'Architects Daughter',
            'Archivo',
            'Archivo Black',
            'Archivo Narrow',
            'Aref Ruqaa',
            'Arima Madurai',
            'Arimo',
            'Arizonia',
            'Armata',
            'Arsenal',
            'Artifika',
            'Arvo',
            'Arya',
            'Asap',
            'Asap Condensed',
            'Asar',
            'Asset',
            'Assistant',
            'Astloch',
            'Asul',
            'Athiti',
            'Atma',
            'Atomic Age',
            'Aubrey',
            'Audiowide',
            'Autour One',
            'Average',
            'Average Sans',
            'Averia Gruesa Libre',
            'Averia Libre',
            'Averia Sans Libre',
            'Averia Serif Libre',
            'Bad Script',
            'Bahiana',
            'Bai Jamjuree',
            'Baloo',
            'Baloo Bhai',
            'Baloo Bhaijaan',
            'Baloo Bhaina',
            'Baloo Chettan',
            'Baloo Da',
            'Baloo Paaji',
            'Baloo Tamma',
            'Baloo Tammudu',
            'Baloo Thambi',
            'Balthazar',
            'Bangers',
            'Barlow',
            'Barlow Condensed',
            'Barlow Semi Condensed',
            'Barrio',
            'Basic',
            'Battambang',
            'Baumans',
            'Bayon',
            'Belgrano',
            'Bellefair',
            'Belleza',
            'BenchNine',
            'Bentham',
            'Berkshire Swash',
            'Bevan',
            'Bigelow Rules',
            'Bigshot One',
            'Bilbo',
            'Bilbo Swash Caps',
            'BioRhyme',
            'BioRhyme Expanded',
            'Biryani',
            'Bitter',
            'Black And White Picture',
            'Black Han Sans',
            'Black Ops One',
            'Bokor',
            'Bonbon',
            'Boogaloo',
            'Bowlby One',
            'Bowlby One SC',
            'Brawler',
            'Bree Serif',
            'Bubblegum Sans',
            'Bubbler One',
            'Buda',
            'Buenard',
            'Bungee',
            'Bungee Hairline',
            'Bungee Inline',
            'Bungee Outline',
            'Bungee Shade',
            'Butcherman',
            'Butterfly Kids',
            'Cabin',
            'Cabin Condensed',
            'Cabin Sketch',
            'Caesar Dressing',
            'Cagliostro',
            'Cairo',
            'Calligraffitti',
            'Cambay',
            'Cambo',
            'Candal',
            'Cantarell',
            'Cantata One',
            'Cantora One',
            'Capriola',
            'Cardo',
            'Carme',
            'Carrois Gothic',
            'Carrois Gothic SC',
            'Carter One',
            'Catamaran',
            'Caudex',
            'Caveat',
            'Caveat Brush',
            'Cedarville Cursive',
            'Ceviche One',
            'Chakra Petch',
            'Changa',
            'Changa One',
            'Chango',
            'Charmonman',
            'Chathura',
            'Chau Philomene One',
            'Chela One',
            'Chelsea Market',
            'Chenla',
            'Cherry Cream Soda',
            'Cherry Swash',
            'Chewy',
            'Chicle',
            'Chivo',
            'Chonburi',
            'Cinzel',
            'Cinzel Decorative',
            'Clicker Script',
            'Coda',
            'Coda Caption',
            'Codystar',
            'Coiny',
            'Combo',
            'Comfortaa',
            'Coming Soon',
            'Concert One',
            'Condiment',
            'Content',
            'Contrail One',
            'Convergence',
            'Cookie',
            'Copse',
            'Corben',
            'Cormorant',
            'Cormorant Garamond',
            'Cormorant Infant',
            'Cormorant SC',
            'Cormorant Unicase',
            'Cormorant Upright',
            'Courgette',
            'Cousine',
            'Coustard',
            'Covered By Your Grace',
            'Crafty Girls',
            'Creepster',
            'Crete Round',
            'Crimson Text',
            'Croissant One',
            'Crushed',
            'Cuprum',
            'Cute Font',
            'Cutive',
            'Cutive Mono',
            'Damion',
            'Dancing Script',
            'Dangrek',
            'David Libre',
            'Dawning of a New Day',
            'Days One',
            'Dekko',
            'Delius',
            'Delius Swash Caps',
            'Delius Unicase',
            'Della Respira',
            'Denk One',
            'Devonshire',
            'Dhurjati',
            'Didact Gothic',
            'Diplomata',
            'Diplomata SC',
            'Do Hyeon',
            'Dokdo',
            'Domine',
            'Donegal One',
            'Doppio One',
            'Dorsa',
            'Dosis',
            'Dr Sugiyama',
            'Duru Sans',
            'Dynalight',
            'EB Garamond',
            'Eagle Lake',
            'East Sea Dokdo',
            'Eater',
            'Economica',
            'Eczar',
            'El Messiri',
            'Electrolize',
            'Elsie',
            'Elsie Swash Caps',
            'Emblema One',
            'Emilys Candy',
            'Encode Sans',
            'Encode Sans Condensed',
            'Encode Sans Expanded',
            'Encode Sans Semi Condensed',
            'Encode Sans Semi Expanded',
            'Engagement',
            'Englebert',
            'Enriqueta',
            'Erica One',
            'Esteban',
            'Euphoria Script',
            'Ewert',
            'Exo',
            'Exo 2',
            'Expletus Sans',
            'Fahkwang',
            'Fanwood Text',
            'Farsan',
            'Fascinate',
            'Fascinate Inline',
            'Faster One',
            'Fasthand',
            'Fauna One',
            'Faustina',
            'Federant',
            'Federo',
            'Felipa',
            'Fenix',
            'Finger Paint',
            'Fira Mono',
            'Fira Sans',
            'Fira Sans Condensed',
            'Fira Sans Extra Condensed',
            'Fjalla One',
            'Fjord One',
            'Flamenco',
            'Flavors',
            'Fondamento',
            'Fontdiner Swanky',
            'Forum',
            'Francois One',
            'Frank Ruhl Libre',
            'Freckle Face',
            'Fredericka the Great',
            'Fredoka One',
            'Freehand',
            'Fresca',
            'Frijole',
            'Fruktur',
            'Fugaz One',
            'GFS Didot',
            'GFS Neohellenic',
            'Gabriela',
            'Gaegu',
            'Gafata',
            'Galada',
            'Galdeano',
            'Galindo',
            'Gamja Flower',
            'Gentium Basic',
            'Gentium Book Basic',
            'Geo',
            'Geostar',
            'Geostar Fill',
            'Germania One',
            'Gidugu',
            'Gilda Display',
            'Give You Glory',
            'Glass Antiqua',
            'Glegoo',
            'Gloria Hallelujah',
            'Goblin One',
            'Gochi Hand',
            'Gorditas',
            'Gothic A1',
            'Goudy Bookletter 1911',
            'Graduate',
            'Grand Hotel',
            'Gravitas One',
            'Great Vibes',
            'Griffy',
            'Gruppo',
            'Gudea',
            'Gugi',
            'Gurajada',
            'Habibi',
            'Halant',
            'Hammersmith One',
            'Hanalei',
            'Hanalei Fill',
            'Handlee',
            'Hanuman',
            'Happy Monkey',
            'Harmattan',
            'Headland One',
            'Heebo',
            'Henny Penny',
            'Herr Von Muellerhoff',
            'Hi Melody',
            'Hind',
            'Hind Guntur',
            'Hind Madurai',
            'Hind Siliguri',
            'Hind Vadodara',
            'Holtwood One SC',
            'Homemade Apple',
            'Homenaje',
            'IBM Plex Mono',
            'IBM Plex Sans',
            'IBM Plex Sans Condensed',
            'IBM Plex Serif',
            'IM Fell DW Pica',
            'IM Fell DW Pica SC',
            'IM Fell Double Pica',
            'IM Fell Double Pica SC',
            'IM Fell English',
            'IM Fell English SC',
            'IM Fell French Canon',
            'IM Fell French Canon SC',
            'IM Fell Great Primer',
            'IM Fell Great Primer SC',
            'Iceberg',
            'Iceland',
            'Imprima',
            'Inconsolata',
            'Inder',
            'Indie Flower',
            'Inika',
            'Inknut Antiqua',
            'Irish Grover',
            'Istok Web',
            'Italiana',
            'Italianno',
            'Itim',
            'Jacques Francois',
            'Jacques Francois Shadow',
            'Jaldi',
            'Jim Nightshade',
            'Jockey One',
            'Jolly Lodger',
            'Jomhuria',
            'Josefin Sans',
            'Josefin Slab',
            'Joti One',
            'Jua',
            'Judson',
            'Julee',
            'Julius Sans One',
            'Junge',
            'Jura',
            'Just Another Hand',
            'Just Me Again Down Here',
            'K2D',
            'Kadwa',
            'Kalam',
            'Kameron',
            'Kanit',
            'Kantumruy',
            'Karla',
            'Karma',
            'Katibeh',
            'Kaushan Script',
            'Kavivanar',
            'Kavoon',
            'Kdam Thmor',
            'Keania One',
            'Kelly Slab',
            'Kenia',
            'Khand',
            'Khmer',
            'Khula',
            'Kirang Haerang',
            'Kite One',
            'Knewave',
            'KoHo',
            'Kodchasan',
            'Kosugi',
            'Kosugi Maru',
            'Kotta One',
            'Koulen',
            'Kranky',
            'Kreon',
            'Kristi',
            'Krona One',
            'Krub',
            'Kumar One',
            'Kumar One Outline',
            'Kurale',
            'La Belle Aurore',
            'Laila',
            'Lakki Reddy',
            'Lalezar',
            'Lancelot',
            'Lateef',
            'Lato',
            'League Script',
            'Leckerli One',
            'Ledger',
            'Lekton',
            'Lemon',
            'Lemonada',
            'Life Savers',
            'Lilita One',
            'Lily Script One',
            'Limelight',
            'Linden Hill',
            'Lobster',
            'Lobster Two',
            'Londrina Outline',
            'Londrina Shadow',
            'Londrina Sketch',
            'Londrina Solid',
            'Lora',
            'Love Ya Like A Sister',
            'Loved by the King',
            'Lovers Quarrel',
            'Luckiest Guy',
            'Lusitana',
            'Lustria',
            'M PLUS 1p',
            'M PLUS Rounded 1c',
            'Macondo',
            'Macondo Swash Caps',
            'Mada',
            'Magra',
            'Maiden Orange',
            'Maitree',
            'Mako',
            'Mali',
            'Mallanna',
            'Mandali',
            'Manuale',
            'Marcellus',
            'Marcellus SC',
            'Marck Script',
            'Margarine',
            'Markazi Text',
            'Marko One',
            'Marmelad',
            'Martel',
            'Martel Sans',
            'Marvel',
            'Mate',
            'Mate SC',
            'Maven Pro',
            'McLaren',
            'Meddon',
            'MedievalSharp',
            'Medula One',
            'Meera Inimai',
            'Megrim',
            'Meie Script',
            'Merienda',
            'Merienda One',
            'Merriweather',
            'Merriweather Sans',
            'Metal',
            'Metal Mania',
            'Metamorphous',
            'Metrophobic',
            'Michroma',
            'Milonga',
            'Miltonian',
            'Miltonian Tattoo',
            'Mina',
            'Miniver',
            'Miriam Libre',
            'Mirza',
            'Miss Fajardose',
            'Mitr',
            'Modak',
            'Modern Antiqua',
            'Mogra',
            'Molengo',
            'Molle',
            'Monda',
            'Monofett',
            'Monoton',
            'Monsieur La Doulaise',
            'Montaga',
            'Montez',
            'Montserrat',
            'Montserrat Alternates',
            'Montserrat Subrayada',
            'Moul',
            'Moulpali',
            'Mountains of Christmas',
            'Mouse Memoirs',
            'Mr Bedfort',
            'Mr Dafoe',
            'Mr De Haviland',
            'Mrs Saint Delafield',
            'Mrs Sheppards',
            'Mukta',
            'Mukta Mahee',
            'Mukta Malar',
            'Mukta Vaani',
            'Muli',
            'Mystery Quest',
            'Manrope',
            'NTR',
            'Nanum Brush Script',
            'Nanum Gothic',
            'Nanum Gothic Coding',
            'Nanum Myeongjo',
            'Nanum Pen Script',
            'Neucha',
            'Neuton',
            'New Rocker',
            'News Cycle',
            'Niconne',
            'Niramit',
            'Nixie One',
            'Nobile',
            'Nokora',
            'Norican',
            'Nosifer',
            'Notable',
            'Nothing You Could Do',
            'Noticia Text',
            'Noto Sans',
            'Noto Sans JP',
            'Noto Sans KR',
            'Noto Serif',
            'Noto Serif JP',
            'Noto Serif KR',
            'Nova Cut',
            'Nova Flat',
            'Nova Mono',
            'Nova Oval',
            'Nova Round',
            'Nova Script',
            'Nova Slim',
            'Nova Square',
            'Numans',
            'Nunito',
            'Nunito Sans',
            'Odor Mean Chey',
            'Offside',
            'Old Standard TT',
            'Oldenburg',
            'Oleo Script',
            'Oleo Script Swash Caps',
            'Open Sans',
            'Open Sans Condensed',
            'Oranienbaum',
            'Orbitron',
            'Oregano',
            'Orienta',
            'Original Surfer',
            'Oswald',
            'Over the Rainbow',
            'Overlock',
            'Overlock SC',
            'Overpass',
            'Overpass Mono',
            'Ovo',
            'Oxygen',
            'Oxygen Mono',
            'PT Mono',
            'PT Sans',
            'PT Sans Caption',
            'PT Sans Narrow',
            'PT Serif',
            'PT Serif Caption',
            'Pacifico',
            'Padauk',
            'Palanquin',
            'Palanquin Dark',
            'Pangolin',
            'Paprika',
            'Parisienne',
            'Passero One',
            'Passion One',
            'Pathway Gothic One',
            'Patrick Hand',
            'Patrick Hand SC',
            'Pattaya',
            'Patua One',
            'Pavanam',
            'Paytone One',
            'Peddana',
            'Peralta',
            'Permanent Marker',
            'Petit Formal Script',
            'Petrona',
            'Philosopher',
            'Piedra',
            'Pinyon Script',
            'Pirata One',
            'Plaster',
            'Play',
            'Playball',
            'Playfair Display',
            'Playfair Display SC',
            'Podkova',
            'Poiret One',
            'Poller One',
            'Poly',
            'Pompiere',
            'Pontano Sans',
            'Poor Story',
            'Poppins',
            'Port Lligat Sans',
            'Port Lligat Slab',
            'Pragati Narrow',
            'Prata',
            'Preahvihear',
            'Press Start 2P',
            'Pridi',
            'Princess Sofia',
            'Prociono',
            'Prompt',
            'Prosto One',
            'Proza Libre',
            'Puritan',
            'Purple Purse',
            'Quando',
            'Quantico',
            'Quattrocento',
            'Quattrocento Sans',
            'Questrial',
            'Quicksand',
            'Quintessential',
            'Qwigley',
            'Racing Sans One',
            'Radley',
            'Rajdhani',
            'Rakkas',
            'Raleway',
            'Raleway Dots',
            'Ramabhadra',
            'Ramaraja',
            'Rambla',
            'Rammetto One',
            'Ranchers',
            'Rancho',
            'Ranga',
            'Rasa',
            'Rationale',
            'Ravi Prakash',
            'Redressed',
            'Reem Kufi',
            'Reenie Beanie',
            'Revalia',
            'Rhodium Libre',
            'Ribeye',
            'Ribeye Marrow',
            'Righteous',
            'Risque',
            'Roboto',
            'Roboto Condensed',
            'Roboto Mono',
            'Roboto Slab',
            'Rochester',
            'Rock Salt',
            'Rokkitt',
            'Romanesco',
            'Ropa Sans',
            'Rosario',
            'Rosarivo',
            'Rouge Script',
            'Rozha One',
            'Rubik',
            'Rubik Mono One',
            'Ruda',
            'Rufina',
            'Ruge Boogie',
            'Ruluko',
            'Rum Raisin',
            'Ruslan Display',
            'Russo One',
            'Ruthie',
            'Rye',
            'Sacramento',
            'Sahitya',
            'Sail',
            'Saira',
            'Saira Condensed',
            'Saira Extra Condensed',
            'Saira Semi Condensed',
            'Salsa',
            'Sanchez',
            'Sancreek',
            'Sansita',
            'Sarala',
            'Sarina',
            'Sarpanch',
            'Satisfy',
            'Sawarabi Gothic',
            'Sawarabi Mincho',
            'Scada',
            'Scheherazade',
            'Schoolbell',
            'Scope One',
            'Seaweed Script',
            'Secular One',
            'Sedgwick Ave',
            'Sedgwick Ave Display',
            'Sevillana',
            'Seymour One',
            'Shadows Into Light',
            'Shadows Into Light Two',
            'Shanti',
            'Share',
            'Share Tech',
            'Share Tech Mono',
            'Shojumaru',
            'Short Stack',
            'Shrikhand',
            'Siemreap',
            'Sigmar One',
            'Signika',
            'Signika Negative',
            'Simonetta',
            'Sintony',
            'Sirin Stencil',
            'Six Caps',
            'Skranji',
            'Slabo 13px',
            'Slabo 27px',
            'Slackey',
            'Smokum',
            'Smythe',
            'Sniglet',
            'Snippet',
            'Snowburst One',
            'Sofadi One',
            'Sofia',
            'Song Myung',
            'Sonsie One',
            'Sorts Mill Goudy',
            'Source Code Pro',
            'Source Sans Pro',
            'Source Serif Pro',
            'Space Mono',
            'Special Elite',
            'Spectral',
            'Spectral SC',
            'Spicy Rice',
            'Spinnaker',
            'Spirax',
            'Squada One',
            'Sree Krushnadevaraya',
            'Sriracha',
            'Srisakdi',
            'Stalemate',
            'Stalinist One',
            'Stardos Stencil',
            'Stint Ultra Condensed',
            'Stint Ultra Expanded',
            'Stoke',
            'Strait',
            'Stylish',
            'Sue Ellen Francisco',
            'Suez One',
            'Sumana',
            'Sunflower',
            'Sunshiney',
            'Supermercado One',
            'Sura',
            'Suranna',
            'Suravaram',
            'Suwannaphum',
            'Swanky and Moo Moo',
            'Syncopate',
            'Tajawal',
            'Tangerine',
            'Taprom',
            'Tauri',
            'Taviraj',
            'Teko',
            'Telex',
            'Tenali Ramakrishna',
            'Tenor Sans',
            'Text Me One',
            'The Girl Next Door',
            'Tienne',
            'Tillana',
            'Timmana',
            'Tinos',
            'Titan One',
            'Titillium Web',
            'Trade Winds',
            'Trirong',
            'Trocchi',
            'Trochut',
            'Trykker',
            'Tulpen One',
            'Ubuntu',
            'Ubuntu Condensed',
            'Ubuntu Mono',
            'Ultra',
            'Uncial Antiqua',
            'Underdog',
            'Unica One',
            'UnifrakturCook',
            'UnifrakturMaguntia',
            'Unkempt',
            'Unlock',
            'Unna',
            'VT323',
            'Vampiro One',
            'Varela',
            'Varela Round',
            'Vast Shadow',
            'Vesper Libre',
            'Vibur',
            'Vidaloka',
            'Viga',
            'Voces',
            'Volkhov',
            'Vollkorn',
            'Vollkorn SC',
            'Voltaire',
            'Waiting for the Sunrise',
            'Wallpoet',
            'Walter Turncoat',
            'Warnes',
            'Wellfleet',
            'Wendy One',
            'Wire One',
            'Work Sans',
            'Yanone Kaffeesatz',
            'Yantramanav',
            'Yatra One',
            'Yellowtail',
            'Yeon Sung',
            'Yeseva One',
            'Yesteryear',
            'Yrsa',
            'Zeyada',
            'Zilla Slab',
            'Zilla Slab Highlight',
            );
        }
}