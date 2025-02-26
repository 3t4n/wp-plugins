<?php

namespace AkariWorker\Inc;

class PageMeta {
    function __construct() {
        $this->googleTag();

        add_action("wp_head", function() {
            $this->metaPixel();
        });

        // The custom script is given priority over any other scripts.
        add_action("wp_head", function() {
            $this->other();
        }, 0);
    }

    public function googleTag() {
        $gtag_id = get_option("akari_worker_google_analytics_id");

        // If its a Google Analytics tag.
        if ($gtag_id && preg_match('/G-[a-z]+/i', $gtag_id)) {
            add_action("wp_head", function() {
                $this->googleAnalytics();
            });
        }

        // If its a Google Tag Manager Tag.
        if ($gtag_id && preg_match('/GTM-[a-z]+/i', $gtag_id)) {
            $this->googleTagManager();
        }
    }

    public function googleAnalytics() { ?>
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=<?= get_option("akari_worker_google_analytics_id") ?>"></script>

        <script>
            <!-- Google Analytics -->
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', '<?= get_option("akari_worker_google_analytics_id") ?>');
        </script>
        <!-- End Google Analytics -->
    <?php }

    public function googleTagManager() {
        add_action("wp_head", function() { ?>
            <!-- Google Tag Manager -->
            <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            })(window,document,'script','dataLayer','<?= get_option("akari_worker_google_analytics_id") ?>');</script>
            <!-- End Google Tag Manager -->
        <?php });

        add_action("wp_body_open", function() { ?>
            <!-- Google Tag Manager (noscript) -->
            <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?= get_option("akari_worker_google_analytics_id") ?>"
            height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
            <!-- End Google Tag Manager (noscript) -->
        <?php });
    }

    public function metaPixel() {
        if (get_option("akari_worker_meta_pixel_id")) { ?>
            <script>
                !function(f,b,e,v,n,t,s)
                {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
                n.callMethod.apply(n,arguments):n.queue.push(arguments)};
                if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
                n.queue=[];t=b.createElement(e);t.async=!0;
                t.src=v;s=b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t,s)}(window, document,'script',
                'https://connect.facebook.net/en_US/fbevents.js');
            </script>

            <script>
                fbq('init', '<?= get_option("akari_worker_meta_pixel_id") ?>');
                fbq('track', 'PageView');
            </script>
        <?php }
    }

    public function other() { ?>
        <?php if (get_option("akari_worker_custom_script")): ?>
            <?= htmlspecialchars_decode(get_option("akari_worker_custom_script")) ?>
        <?php endif; ?>
    <?php }
}
