<?php
// Add settings page
function ethereum_price_settings_page()
{
    add_submenu_page(
        'tools.php',            // Parent menu slug
        'Ethereum Price',       // Page title
        'Ethereum Price',       // Menu title
        'manage_options',       // Capability required to access the page
        'ethereum-price',       // Page slug
        'ethereum_price_settings_callback' // Callback function to render the settings page
    );
}

add_action('admin_menu', 'ethereum_price_settings_page');

// Callback
function ethereum_price_settings_callback()
{
    // Retrieve the selected options from the options table
    $selected_option = get_option('ethereum_price_option', 'tooltip');
    $selected_api = get_option('ethereum_price_api', 'cryptocompare');
    $selected_currencies = get_option('ethereum_price_currencies', array('USD', 'EUR'));

    // Define the API descriptions
    $api_descriptions = array(
        'cryptocompare' => 'CryptoCompare is a popular cryptocurrency data provider.',
        'coingecko' => 'CoinGecko is another widely used cryptocurrency data platform.'
    );

    // Save the submitted form values
    if (isset($_POST['submit'])) {
        $selected_option = $_POST['ethereum_price_option'];
        $selected_api = $_POST['ethereum_price_api'];
        $selected_currencies = array($_POST['ethereum_price_currency_1'], $_POST['ethereum_price_currency_2']);

        update_option('ethereum_price_option', $selected_option);
        update_option('ethereum_price_api', $selected_api);
        update_option('ethereum_price_currencies', $selected_currencies);
    }

    // Define the available currency options
    $currency_options = array(
        'USD' => 'United States Dollar (USD)',
        'EUR' => 'Euro (EUR)',
        'GBP' => 'British Pound (GBP)',
        'JPY' => 'Japanese Yen (JPY)',
        'CAD' => 'Canadian Dollar (CAD)',
        'AUD' => 'Australian Dollar (AUD)',
        'CHF' => 'Swiss Franc (CHF)',
        'CNY' => 'Chinese Yuan (CNY)',
        'INR' => 'Indian Rupee (INR)',
        'BRL' => 'Brazilian Real (BRL)',
        'RSD' => 'Serbian Dinar (DIN)'
    );

    // Display the settings form
    ?>
    <div class="wrap">
        <h1>Ethereum Price Settings</h1>
        <form method="post" action="">
            <table class="form-table">
                <tr>
                    <th scope="row">Display Mode:</th>
                    <td>
                        <select id="ethereum_price_option" name="ethereum_price_option">
                            <option value="tooltip" <?php selected($selected_option, 'tooltip'); ?>>Tooltip</option>
                            <option value="ticker" <?php selected($selected_option, 'ticker'); ?>>Ticker</option>
                        </select>
                    </td>
                    <td id="ethereum_price_preview">
                        <?php
                        $sample_content = 'Ethereum is a decentralized global software platform powered by blockchain technology. It is most commonly known for its native cryptocurrency, ether (ETH). ';
                        if ($selected_option === 'ticker') {
                            echo add_ticker_to_eth($sample_content);
                        } else {
                            echo add_tooltip_to_eth($sample_content);
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <th scope="row">API:</th>
                    <td>
                        <select id="ethereum_price_api" name="ethereum_price_api">
                            <option value="cryptocompare" <?php selected($selected_api, 'cryptocompare'); ?>>CryptoCompare</option>
                            <option value="coingecko" <?php selected($selected_api, 'coingecko'); ?>>CoinGecko</option>
                        </select>
                    </td>
                    <td id="ethereum_price_api_description">
                        <?php echo $api_descriptions[$selected_api]; ?>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Currencies:</th>
                    <td>
                        <select id="ethereum_price_currency_1" name="ethereum_price_currency_1">
                            <?php
                            foreach ($currency_options as $currency_code => $currency_label) {
                                $selected = ($selected_currencies[0] === $currency_code) ? 'selected' : '';
                                echo '<option value="' . $currency_code . '" ' . $selected . '>' . $currency_label . '</option>';
                            }
                            ?>
                        </select>
                    </td>
                    <td>
                        <select id="ethereum_price_currency_2" name="ethereum_price_currency_2">
                            <?php
                            foreach ($currency_options as $currency_code => $currency_label) {
                                $selected = ($selected_currencies[1] === $currency_code) ? 'selected' : '';
                                echo '<option value="' . $currency_code . '" ' . $selected . '>' . $currency_label . '</option>';
                            }
                            ?>
                        </select>
                    </td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>

<script>
document.addEventListener("DOMContentLoaded", function() {
  var currencySelect1 = document.getElementById("ethereum_price_currency_1");
  var currencySelect2 = document.getElementById("ethereum_price_currency_2");

  // Disable the initially selected currencies
  var initialCurrency1 = currencySelect2.value;
  var initialCurrency2 = currencySelect1.value;
  
  for (var i = 0; i < currencySelect1.options.length; i++) {
    if (currencySelect1.options[i].value === initialCurrency1 || currencySelect1.options[i].value === initialCurrency2) {
      currencySelect1.options[i].disabled = true;
    }
  }
  
  for (var i = 0; i < currencySelect2.options.length; i++) {
    if (currencySelect2.options[i].value === initialCurrency2 || currencySelect2.options[i].value === initialCurrency1) {
      currencySelect2.options[i].disabled = true;
    }
  }

  // Disable selected currency in currencySelect1 if it is selected in currencySelect2
  currencySelect2.addEventListener("change", function() {
    var selectedCurrency = currencySelect2.value;

    // Enable all options in currencySelect1
    for (var i = 0; i < currencySelect1.options.length; i++) {
      currencySelect1.options[i].disabled = false;
    }

    // Disable the selectedCurrency option in currencySelect1
    for (var i = 0; i < currencySelect1.options.length; i++) {
      if (currencySelect1.options[i].value === selectedCurrency) {
        currencySelect1.options[i].disabled = true;
        break;
      }
    }
  });

  // Disable selected currency in currencySelect2 if it is selected in currencySelect1
  currencySelect1.addEventListener("change", function() {
    var selectedCurrency = currencySelect1.value;

    // Enable all options in currencySelect2
    for (var i = 0; i < currencySelect2.options.length; i++) {
      currencySelect2.options[i].disabled = false;
    }

    // Disable the selectedCurrency option in currencySelect2
    for (var i = 0; i < currencySelect2.options.length; i++) {
      if (currencySelect2.options[i].value === selectedCurrency) {
        currencySelect2.options[i].disabled = true;
        break;
      }
    }
  });
});
</script>







<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get the select elements
        var displayModeSelect = document.getElementById('ethereum_price_option');
        var apiSelect = document.getElementById('ethereum_price_api');
        // Get the preview and API description elements
        var previewElement = document.getElementById('ethereum_price_preview');
        var apiDescriptionElement = document.getElementById('ethereum_price_api_description');
        // Define the sample content and API descriptions
        var sampleContent = '<?php echo addslashes($sample_content); ?>';
        var apiDescriptions = {
            'cryptocompare': 'Free CryptoCompare API plan allows up to <b>2,500 requests per minute</b>, and <b>immediate data freshnes</b> but is limited to <b>250,000 lifetime calls</b>. </br>More information: <a href="https://min-api.cryptocompare.com/pricing" target="_blank">https://min-api.cryptocompare.com/pricing</a>',
            'coingecko': 'Free CoinGecko API plan allows up to <b>30 requests per minute</b> and has <b>data freshnes of 5 min</b>, and has <b>no total limit</b> in lifetime calls. </br>More information: <a href="https://www.coingecko.com/en/api/pricing" target="_blank">https://www.coingecko.com/en/api/pricing</a>'
        };

        // Function to load the ticker style
        function loadTickerStyle() {
            var tickerStyle = document.createElement('link');
            tickerStyle.rel = 'stylesheet';
            tickerStyle.href = '<?php echo plugins_url('css/ticker-style.css', __FILE__); ?>';
            document.head.appendChild(tickerStyle);
        }

        // Function to load the tooltip style
        function loadTooltipStyle() {
            var tooltipStyle = document.createElement('link');
            tooltipStyle.rel = 'stylesheet';
            tooltipStyle.href = '<?php echo plugins_url('css/tooltip-style.css', __FILE__); ?>';
            document.head.appendChild(tooltipStyle);
        }

        // Update preview content and load styles based on the selected options
        function updateDisplay() {
            var selectedOption = displayModeSelect.value;
            var selectedApi = apiSelect.value;

            if (selectedOption === 'ticker') {
                previewElement.innerHTML = '<?php echo addslashes(add_ticker_to_eth($sample_content)); ?>';
                loadTickerStyle();
            } else {
                previewElement.innerHTML = '<?php echo addslashes(add_tooltip_to_eth($sample_content)); ?>';
                loadTooltipStyle();
            }

            if (apiDescriptionElement) {
                apiDescriptionElement.innerHTML = apiDescriptions[selectedApi];
            }
        }

        // Listen for the change event on the select elements
        if (displayModeSelect) {
            displayModeSelect.addEventListener('change', updateDisplay);
        }
        if (apiSelect) {
            apiSelect.addEventListener('change', updateDisplay);
        }

        // Initial update based on the selected options
        updateDisplay();
    });
</script>
    <?php
}
?>