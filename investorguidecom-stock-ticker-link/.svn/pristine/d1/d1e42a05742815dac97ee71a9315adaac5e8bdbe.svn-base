<?php
        load_plugin_textdomain('ig_stock_links', 'wp-content/plugins/investorguide-stock-ticker-links');
        include_once('investorguide_stock_ticker_links.php');
        wp_nonce_field('update-options') ;

        if ('process' == $_POST['stage']) {
                 update_option('ig_stock_links_filter_words_list', $_POST['filter_words_list']);

        }

        /* Get options for form fields */
        $filter_words_list = get_option('ig_stock_links_filter_words_list');


?>

<div class="wrap">
  <h2><?php _e('InvestorGuide.com Stock Ticker Links Options') ?></h2>
  <form name="form1" method="post" >

    <input type="hidden" name="stage" value="process" />

    <p class="submit">
      <input type="submit" name="Submit" value="<?php _e('Save Options') ?> &raquo;" />
    </p>

    <strong>List of tickers or acronyms that should not be linked</strong><br />
    <p>Use comma to seperate the ticker/acronym. For example, "AAPL,GOOG,ETF,ROI,SEC,FINRA,APY"</p>
    <textarea id="filter_words_list" name="filter_words_list" rows="10" cols="54"><?php echo get_option('ig_stock_links_filter_words_list'); ?></textarea>
	
    <p class="submit">
      <input type="submit" name="Submit" value="<?php _e('Save Options') ?> &raquo;" />
    </p>
  </form>

</div>
