<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * WC_8Pay_Rates class.
 *
 */
class WC_8Pay_Rates {
  //A list of supported fiat currencies
  const FIAT_SYMBOLS = [
		"1000sats" ,
		"1inch" ,
		"aave" ,
		"ada" ,
		"aed" ,
		"afn" ,
		"agix" ,
		"akt" ,
		"algo" ,
		"all" ,
		"amd" ,
		"amp" ,
		"ang" ,
		"aoa" ,
		"ape" ,
		"apt" ,
		"ar" ,
		"arb" ,
		"ars" ,
		"atom" ,
		"ats" ,
		"aud" ,
		"avax" ,
		"awg" ,
		"axs" ,
		"azm" ,
		"azn" ,
		"bake" ,
		"bam" ,
		"bat" ,
		"bbd" ,
		"bch" ,
		"bdt" ,
		"bef" ,
		"bgn" ,
		"bhd" ,
		"bif" ,
		"bmd" ,
		"bnb" ,
		"bnd" ,
		"bob" ,
		"brl" ,
		"bsd" ,
		"bsv" ,
		"bsw" ,
		"btc" ,
		"btcb" ,
		"btg" ,
		"btn" ,
		"btt" ,
		"busd" ,
		"bwp" ,
		"byn" ,
		"byr" ,
		"bzd" ,
		"cad" ,
		"cake" ,
		"cdf" ,
		"celo" ,
		"cfx" ,
		"chf" ,
		"chz" ,
		"clp" ,
		"cnh" ,
		"cny" ,
		"comp" ,
		"cop" ,
		"crc" ,
		"cro" ,
		"crv" ,
		"cspr" ,
		"cuc" ,
		"cup" ,
		"cve" ,
		"cvx" ,
		"cyp" ,
		"czk" ,
		"dai" ,
		"dash" ,
		"dcr" ,
		"dem" ,
		"dfi" ,
		"djf" ,
		"dkk" ,
		"doge" ,
		"dop" ,
		"dot" ,
		"dydx" ,
		"dzd" ,
		"eek" ,
		"egld" ,
		"egp" ,
		"enj" ,
		"eos" ,
		"ern" ,
		"esp" ,
		"etb" ,
		"etc" ,
		"eth" ,
		"eur" ,
		"fei" ,
		"fil" ,
		"fim" ,
		"fjd" ,
		"fkp" ,
		"flow" ,
		"flr" ,
		"frax" ,
		"frf" ,
		"ftm" ,
		"ftt" ,
		"fxs" ,
		"gala" ,
		"gbp" ,
		"gel" ,
		"ggp" ,
		"ghc" ,
		"ghs" ,
		"gip" ,
		"gmd" ,
		"gmx" ,
		"gnf" ,
		"gno" ,
		"grd" ,
		"grt" ,
		"gt" ,
		"gtq" ,
		"gusd" ,
		"gyd" ,
		"hbar" ,
		"hkd" ,
		"hnl" ,
		"hnt" ,
		"hot" ,
		"hrk" ,
		"ht" ,
		"htg" ,
		"huf" ,
		"icp" ,
		"idr" ,
		"iep" ,
		"ils" ,
		"imp" ,
		"imx" ,
		"inj" ,
		"inr" ,
		"iqd" ,
		"irr" ,
		"isk" ,
		"itl" ,
		"jep" ,
		"jmd" ,
		"jod" ,
		"jpy" ,
		"kas" ,
		"kava" ,
		"kcs" ,
		"kda" ,
		"kes" ,
		"kgs" ,
		"khr" ,
		"klay" ,
		"kmf" ,
		"knc" ,
		"kpw" ,
		"krw" ,
		"ksm" ,
		"kwd" ,
		"kyd" ,
		"kzt" ,
		"lak" ,
		"lbp" ,
		"ldo" ,
		"leo" ,
		"link" ,
		"lkr" ,
		"lrc" ,
		"lrd" ,
		"lsl" ,
		"ltc" ,
		"ltl" ,
		"luf" ,
		"luna" ,
		"lunc" ,
		"lvl" ,
		"lyd" ,
		"mad" ,
		"mana" ,
		"matic" ,
		"mbx" ,
		"mdl" ,
		"mga" ,
		"mgf" ,
		"mina" ,
		"mkd" ,
		"mkr" ,
		"mmk" ,
		"mnt" ,
		"mop" ,
		"mro" ,
		"mru" ,
		"mtl" ,
		"mur" ,
		"mvr" ,
		"mwk" ,
		"mxn" ,
		"mxv" ,
		"myr" ,
		"mzm" ,
		"mzn" ,
		"nad" ,
		"near" ,
		"neo" ,
		"nexo" ,
		"nft" ,
		"ngn" ,
		"nio" ,
		"nlg" ,
		"nok" ,
		"npr" ,
		"nzd" ,
		"okb" ,
		"omr" ,
		"one" ,
		"op" ,
		"ordi" ,
		"pab" ,
		"paxg" ,
		"pen" ,
		"pepe" ,
		"pgk" ,
		"php" ,
		"pkr" ,
		"pln" ,
		"pte" ,
		"pyg" ,
		"qar" ,
		"qnt" ,
		"qtum" ,
		"rol" ,
		"ron" ,
		"rpl" ,
		"rsd" ,
		"rub" ,
		"rune" ,
		"rvn" ,
		"rwf" ,
		"sand" ,
		"sar" ,
		"sbd" ,
		"scr" ,
		"sdd" ,
		"sdg" ,
		"sek" ,
		"sgd" ,
		"shib" ,
		"shp" ,
		"sit" ,
		"skk" ,
		"sle" ,
		"sll" ,
		"snx" ,
		"sol" ,
		"sos" ,
		"spl" ,
		"srd" ,
		"srg" ,
		"std" ,
		"stn" ,
		"stx" ,
		"sui" ,
		"svc" ,
		"syp" ,
		"szl" ,
		"thb" ,
		"theta" ,
		"tjs" ,
		"tmm" ,
		"tmt" ,
		"tnd" ,
		"ton" ,
		"top" ,
		"trl" ,
		"trx" ,
		"try" ,
		"ttd" ,
		"tusd" ,
		"tvd" ,
		"twd" ,
		"twt" ,
		"tzs" ,
		"uah" ,
		"ugx" ,
		"uni" ,
		"usd" ,
		"usdc" ,
		"usdd" ,
		"usdp" ,
		"usdt" ,
		"uyu" ,
		"uzs" ,
		"val" ,
		"veb" ,
		"ved" ,
		"vef" ,
		"ves" ,
		"vet" ,
		"vnd" ,
		"vuv" ,
		"waves" ,
		"wemix" ,
		"woo" ,
		"wst" ,
		"xaf" ,
		"xag" ,
		"xau" ,
		"xaut" ,
		"xbt" ,
		"xcd" ,
		"xch" ,
		"xdc" ,
		"xdr" ,
		"xec" ,
		"xem" ,
		"xlm" ,
		"xmr" ,
		"xof" ,
		"xpd" ,
		"xpf" ,
		"xpt" ,
		"xrp" ,
		"xtz" ,
		"yer" ,
		"zar" ,
		"zec" ,
		"zil" ,
		"zmk" ,
		"zmw" ,
		"zwd" ,
		"zwg" ,
		"zwl" ,
	];

	const FIAT_CONVERSION_TOLERANCE = 0.1;

	/**
	 * Convert fiat to token
	 *
	 * @param string  $currency_symbol
	 * @param float  $currency_amount
	 * @param string  $token_symbol
	 *
	 * @return float
	 */
	public static function convert_fiat_amount( $currency_symbol, $currency_amount, $chain, $token_symbol ) {

    //Just for staging envs we use the main-net addresses as Gecko-terminal supports addresses only.
    $chain = $chain == 'sandbox' || $chain == 'private' ? $chain = 'bsc' : $chain;
    $token_symbol = $token_symbol == '8PAY' ? '8PAY v2' : $token_symbol;

		$token = WC_8Pay_Token::get( $chain, $token_symbol );

		if ( $currency_symbol == 'USD' && $token['is_stable_coin'] ) {
			return $currency_amount;
		} else if ( $currency_symbol == 'BTC' && $token_symbol == 'BTCB' ) {
			return $currency_amount;
		} else if ( in_array(  strtolower($currency_symbol), self::FIAT_SYMBOLS ) ) {
			$rate = self::get_rate( $chain , $token, $currency_symbol );
		} else {
			throw new Exception( 'Invalid currency' );
		}

		$full_amount = strval( number_format( $currency_amount / $rate, $token['decimals'], '.', '' ) );
		$parts = explode( '.', $full_amount );
		$decimals = $parts[1] ? count( str_split( $parts[1] ) ) : 0;
		if ( !$decimals ) {
			return $full_amount;
		}

		$i = 1;
		while ($i < $decimals) {
			$shorted_amount = substr( $full_amount, 0, count( str_split( $parts[0] ) ) + 1 + $i++ );
			$shorted_amount_value = $shorted_amount * $rate;
			$diff_percentage = ( $currency_amount - $shorted_amount_value ) / $currency_amount * 100;
			if ( $diff_percentage <= self::FIAT_CONVERSION_TOLERANCE ) {
				return $shorted_amount;
			}
		}
		return $full_amount;
	}

	/**
	 * Get token rate by currency
	 *
	 * @param string  $token_symbol
	 * @param string  $currency_symbol
	 *
	 * @return float
	 */
	public static function get_rate( $chain , $token, $currency_symbol ) {
 
    $token_usd_price = self::get_usd_token_price($chain , $token);

    $url = 'https://cdn.jsdelivr.net/npm/@fawazahmed0/currency-api@latest/v1/currencies/usd.json';
		$response = wp_remote_get( $url );
		$body     = wp_remote_retrieve_body( $response );
    $body_decoded = json_decode($body);
    
    $currency_rate = $body_decoded -> usd -> {strtolower($currency_symbol)};

		return $token_usd_price*$currency_rate;
	}

  
  
  /**
	 * Get USD token rate by token address
	 *
	 * @param WC_8Pay_Token  $token
   * @param string  $chain
	 *
	 * @return float
	 */
  public static function get_usd_token_price($chain , $token){
    //gecko-terminal chain mapping
    $chain = $chain == 'ethereum' ? 'eth':$chain;
    $chain = $chain == 'polygon' ? 'polygon_pos':$chain;
    
    
    //Fetch token_price by address
    $url = 'https://api.geckoterminal.com/api/v2/simple/networks/' .  $chain . '/token_price/' . $token['address'];
    $response = wp_remote_get( $url );
    $body     = wp_remote_retrieve_body( $response );
    $body_decoded = json_decode($body);
    
    //gecko-terminal is not EIP-55 compliant.
    $token_address = strtolower( $token['address']);
    $main_pool_address = array_key_exists('main_pool_address',  $token) ? strtolower( $token['main_pool_address']) : '';

    if ( isset($body_decoded->errors)) {
        throw new Exception( 'Error fetching rate: ' . $body_decoded->errors[0]->title );
    }


    if (isset($body_decoded->data->attributes->token_prices->{$token_address})) {
        $token_usd_price = $body_decoded->data->attributes->token_prices->{$token_address};
    } else {
      // Fallback to dex-pools price query
      $url = "https://api.geckoterminal.com/api/v2/networks/$chain/pools/$main_pool_address";

      $response = wp_remote_get( $url );
      $body     = wp_remote_retrieve_body( $response );
      $body_decoded = json_decode($body);

      if (isset($body_decoded->data->attributes->base_token_price_usd)) {
        $token_usd_price = $body_decoded->data->attributes->base_token_price_usd;
      }else{
        throw new Exception( 'Error fetching rate.' );
      }
    }

    return $token_usd_price;
  }
}

new WC_8Pay_Rates();
