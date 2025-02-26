<?php

// Create ticker for all elements in content except a, img, and figure tags
function add_ticker_to_eth($the_content)
{
    static $eth_in_text = array(
        '0' => 'ETH',
        '1' => 'eth',
        '2' => 'ethereum',
        '3' => 'Ethereum',
    );

    $selected_api = get_option('ethereum_price_api', 'cryptocompare');

    $selected_currencies = get_option('ethereum_price_currencies', array('USD', 'EUR'));

    $selected_currency_1 = $selected_currencies[0];
    $selected_currency_2 = $selected_currencies[1];

    if (empty($selected_currency_1) || empty($selected_currency_2)) {
        $selected_currency_1 = 'USD';
        $selected_currency_2 = 'EUR';
    }

    if ($selected_api === 'cryptocompare') {
        $url = "https://min-api.cryptocompare.com/data/price?fsym=ETH&tsyms=$selected_currency_1,$selected_currency_2";
        $json = json_decode(file_get_contents($url));
        $ethAnswerCurrency1 = $json->{$selected_currency_1};
        $ethAnswerCurrency2 = $json->{$selected_currency_2};
    } elseif ($selected_api === 'coingecko') {
        $url = "https://api.coingecko.com/api/v3/simple/price?ids=ethereum&vs_currencies=$selected_currency_1,$selected_currency_2";
        $json = json_decode(file_get_contents($url));
        $ethAnswerCurrency1 = $json->ethereum->{$selected_currency_1};
        $ethAnswerCurrency2 = $json->ethereum->{$selected_currency_2};
    }

    $pattern = '/(<a\b[^>]*>.*?<\/a>|<img\b[^>]*>|<figure\b[^>]*>.*?<\/figure>)|(?<!\w)(' . implode('|', array_map('preg_quote', $eth_in_text)) . ')(?!\w)/iu';

    $the_content = preg_replace_callback($pattern, function($matches) use ($ethAnswerCurrency1, $ethAnswerCurrency2, $selected_currency_1, $selected_currency_2) {
        if (!empty($matches[1]) || !empty($matches[0]) && substr($matches[0], 0, 1) === '[' || preg_match('/<img\b[^>]*>/', $matches[0])) {
            return $matches[0];
        } else {
            return '<span class="epc_logo"></span>' . $matches[0] . '<span class="epc_ticker">' . $ethAnswerCurrency1 . ' ' . $selected_currency_1 . ' / ' . $ethAnswerCurrency2 . ' ' . $selected_currency_2 . '</span>';
        }
    }, $the_content);

    return $the_content;
}
