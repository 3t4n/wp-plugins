<?php
function fcpgz_callback_function()
{
    global $wpdb;
    ?>
    <img width="44px" src="<?php echo esc_url(plugins_url('assets/FC.png', dirname(__FILE__))); ?>" alt="Freecharge Logo">
    <h1 class="h1">Freecharge PG</h1>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Freecharge Plugin | Setup</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                background-color: #f7f7f7;
            }

            .container {
                max-width: 800px;
                margin: 0 auto;
                padding: 20px;
                background-color: #fff;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }

            .h1 {
                text-align: center;
                color: #fff;
                background: linear-gradient(90.47deg, #ff6167, #ffa668);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                font: 700 30px/36px Source Sans Pro, sans-serif;
            }

            h1,
            h2 {
                color: #333;
            }

            h2 {
                margin-top: 20px;
            }

            p {
                color: #666;
                line-height: 1.6;
            }

            table {
                border-collapse: collapse;
                width: 100%;
            }

            th,
            td {
                padding: 8px;
                text-align: left;
                border: 1px solid #dddddd;
            }

            th {
                background-color: #f2f2f2;
            }

            .button-container {
                position: relative;
                display: inline-block;
            }

            .button {
                background-color: #007BFF;
                color: #fff;
                padding: 5px 10px;
                font-size: 12px;
                border: none;
                cursor: pointer;
                border-radius: 50%;
                width: 20px;
                height: 20px;
                text-align: center;
                line-height: 20px;
            }

            .message {
                display: none;
                position: absolute;
                top: 20px;
                right: -40px;
                background-color: #007BFF;
                color: #fff;
                padding: 5px;
                border-radius: 5px;
                font-size: 12px;
                width: 100px;
                text-align: center;
            }

            .button-container:hover .message {
                display: block;
            }
        </style>
    </head>

    <body>
    <div class="container">
        <h1>Freecharge Plugin | Setup </h1>
        <p>Before using the Freecharge Plugin, please ensure you update your settings for a seamless and secure
            experience.</p>
        <h2>1. Setup Plugin</h2>
        <p>Follow this URL to access the Plugin Payment settings:</p>
        <div class="button-container">
            <a href="<?php echo esc_url(home_url('wp-admin/admin.php?page=wc-settings&tab=checkout&section=freecharge')); ?>">
                Plugin Settings
            </a>
            <button class="button">?</button>
            <div class="message"><?php esc_html_e('Click here to configure your plugin. Make sure woocommerce is installed.', 'freecharge-pay-woo'); ?></div>
        </div>
        
        <ol>
            <li>Following credentials are required for the integration that is shared over welcome email.</li>
            <ol type="i">
                <li>Merchant ID</li>
                <li>Merchant Key</li>
            </ol>
            <li>Select mode of payment gateway.</li>
            <ol type="i">
                <li>Sandbox- For Testing your Plugin.</li>
                <li>Production - For doing actual payment through Freecharge.</li>
            </ol>
            <li>Return Page : This is your post payment redirect URL.</li>
        </ol>

        <h2>2.Wordpress Database</h2>
        <p>Make sure you are connected with Wordpress Database.</p>
        <h2>3. Privacy and Terms</h2>
        <p>Please review the following documents to understand how your data is managed and protected:</p>
        <ul>
            <li><a href="https://www.freechargepg.in/privacy-policy" target="_blank">Freecharge Privacy Policy</a></li>
            <li><a href="https://www.freechargepg.in/term-and-condition" target="_blank">Freecharge Terms and Conditions</a></li>
        </ul>
    </div>

    <script>
        // JavaScript to handle the button and message behavior
        const button = document.querySelector(".button");
        const message = document.querySelector(".message");

        button.addEventListener("click", () => {
            message.style.display = message.style.display === "block" ? "none" : "block";
        });
    </script>
    </body>
    </html>
    <?php
}

function fcpgz_pg_sub_menu_callback_function()
{
    ?>
    <h5><?php esc_html_e('Sub menu Page', 'freecharge-pay-woo'); ?></h5>
    <img src="<?php echo esc_url(plugins_url('/assets/FCi.png', dirname(__FILE__))); ?>" alt="Freecharge Icon">
    <?php
}