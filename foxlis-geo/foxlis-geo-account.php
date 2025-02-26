<?php

if (!function_exists('foxlis_geo_account_page_html')) {
    function foxlis_geo_account_page_html()
    {
        $account = foxlis_geo_sevice()->getFoxlisAccount();
        ?>
        <div class="wrap">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        <?php
        if (empty($account->getData())) {
            ?>
            <h2>No Data</h2>
            <p>Correct account key needed. You can get it <a href="https://foxlis.com/geo/activation" target="_blank">here</a> and place to the <a href="<?php menu_page_url( 'foxlis_geo_options' ) ?>">option field</a> after that.</p>
            <?php
        } else {
            ?>
            <h2>Account Data</h2>
            <table>
                <tr>
                    <td><strong>Free Points:</strong></td>
                    <td><?php echo $account->getFreePoints() ?></td>
                </tr>
                <tr>
                    <td><strong>Pay Points:</strong></td>
                    <td><?php echo $account->getPayPoints() ?></td>
                </tr>
                <tr>
                    <td><strong>End paid date:</strong></td>
                    <td><?php echo $account->getExpiredAt() ? $account->getExpiredAt() : 'No Data' ?></td>
                </tr>
                <tr>
                    <td><strong>End ban date:</strong></td>
                    <td><?php echo $account->getBan() ? $account->getBan() : 'No Ban' ?></td>
                </tr>
                <tr>
                    <td><strong>Block:</strong></td>
                    <td><?php echo $account->getBlock() ? $account->getBlock() : 'No Block' ?></td>
                </tr>
            </table>
            <?php
        }
        ?>
        <p>You can get more details and requests history (for paid account) <a href="https://foxlis.com/profile/geo/history" target="_blank">here</a>.</p>
        </div>
        <?php
    }
}
