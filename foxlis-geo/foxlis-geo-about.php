<?php

if (!function_exists('foxlis_geo_page_html')) {
    function foxlis_geo_page_html()
    {
        ?>
        <div class="wrap">
            <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
            <h2>Main information</h2>
            <p><?= implode(array_fill(0, 130, '*')) ?></p>
            <p style="font-size: larger">This plug-in helps you to detect geo-location of your visitors by
                ip-address.</p>
            <p>More details about Foxlis Geo API <a href="https://foxlis.com/geo" target="_blank">here</a>.</p>
            <p>Free account could give you very good experience using our service.</p>
            <p style="font-size: larger">If you realy like it, please, support us buying points <a
                        href="https://foxlis.com/geo/prices" target="_blank">here</a>.</p>
            <p>It will be usefull for your business and help us to develop good things for you.</p>
            <p>Also <a href="https://foxlis.com/geo/prices" target="_blank">here</a> you can read about free account
                limitations and paid account benefits.</p>
            <p style="font-size: larger">Foxlis is a digital develop team. <a href="https://foxlis.com" target="_blank">Contact
                    with
                    us</a> if you want to create or correct your project code.</p>
            <p><?= implode(array_fill(0, 130, '*')) ?></p>
            <h2>How you can use this plug-in</h2>
            <p>This plug-in usage is very simple.</p>
            <ol>
                <li>
                    <p>Go to the <a href="<?php menu_page_url('foxlis_geo_options') ?>">options</a> and choose your
                        language.</p>
                </li>
                <li>
                    <p>If you need to configure redirects, go to the <a
                                href="<?php menu_page_url('foxlis_geo_options_redirect') ?>">redirect page</a>.</p>
                </li>
                <li>
                    <p>In your code use this example to get city location name.</p>
                    <pre>&lt;?php echo foxlis_geo()->getCity(); ?&gt;</pre>
                    <pre><strong>Your city now is <?php echo foxlis_geo()->getCity(); ?></strong></pre>
                    <p>You can get another specific name at language you prefer like an example below.</p>
                    <pre>&lt;?php echo foxlis_geo()->getCity()->fr; ?&gt;</pre>
                </li>
                <li>
                    <p>In your code use this example to get country location name.</p>
                    <pre>&lt;?php echo foxlis_geo()->getCountry(); ?&gt;</pre>
                    <pre><strong>Your country now is <?php echo foxlis_geo()->getCountry(); ?></strong></pre>
                    <p>You can get another specific name at language you prefer like an example below.</p>
                    <pre>&lt;?php echo foxlis_geo()->getCountry()->fr; ?&gt;</pre>
                </li>
                <li>
                    <p>In your code use this example to get subdivisions location name.</p>
                    <pre>&lt;?php $subdivisionsEntity = foxlis_geo()->getSubdivisions(); $subdivisions = $subdivisionsEntity(); ?&gt;</pre>
                    <pre><strong>Your first subdivision now is <?php $subdivisionsEntity = foxlis_geo()->getSubdivisions();
                            echo isset($subdivisionsEntity()[0]) ? $subdivisionsEntity()[0] : ''; ?></strong></pre>
                    <p>You can get another specific name at language you prefer like an example below.</p>
                    <pre>&lt;?php $subdivisionsEntity = foxlis_geo()->getSubdivisions(); $subdivisions = $subdivisionsEntity->fr; ?&gt;</pre>
                </li>
                <li>
                    <p>In your code use this example to get continent location name.</p>
                    <pre>&lt;?php echo foxlis_geo()->getContinent(); ?&gt;</pre>
                    <pre><strong>Your continent now is <?php echo foxlis_geo()->getContinent(); ?></strong></pre>
                    <p>You can get another specific name at language you prefer like an example below.</p>
                    <pre>&lt;?php echo foxlis_geo()->getContinent()->fr; ?&gt;</pre>
                </li>
                <li>
                    <p>In your code use this example to get location array.</p>
                    <pre>&lt;?php $locationEntity = foxlis_geo()->getLocation(); $locationData = $locationEntity(); ?&gt;</pre>
                    <p>You can get location accuracy radius.</p>
                    <pre>&lt;?php $locationEntity = foxlis_geo()->getLocation(); $accuracyRadius = $locationEntity->getAccuracyRadius(); ?&gt;</pre>
                    <pre><strong>Your accuracy radius now is <?php $locationEntity = foxlis_geo()->getLocation();
                            echo $locationEntity->getAccuracyRadius(); ?></strong></pre>
                    <p>You can get location latitude.</p>
                    <pre>&lt;?php $locationEntity = foxlis_geo()->getLocation(); $latitude = $locationEntity->getLatitude(); ?&gt;</pre>
                    <pre><strong>Your latitude now is <?php $locationEntity = foxlis_geo()->getLocation();
                            echo $locationEntity->getLatitude(); ?></strong></pre>
                    <p>You can get location longitude.</p>
                    <pre>&lt;?php $locationEntity = foxlis_geo()->getLocation(); $longitude = $locationEntity->getLongitude(); ?&gt;</pre>
                    <pre><strong>Your longitude now is <?php $locationEntity = foxlis_geo()->getLocation();
                            echo $locationEntity->getLongitude(); ?></strong></pre>
                    <p>You can get location time zone.</p>
                    <pre>&lt;?php $locationEntity = foxlis_geo()->getLocation(); $timeZone = $locationEntity->getTimeZone(); ?&gt;</pre>
                    <pre><strong>Your time zone now is <?php $locationEntity = foxlis_geo()->getLocation();
                            echo $locationEntity->getTimeZone(); ?></strong></pre>
                </li>
            </ol>
        </div>
        <?php
    }
}
