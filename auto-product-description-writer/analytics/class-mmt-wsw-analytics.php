<?php
/**
 * MoMo ACG Analytics
 *
 * @package mmt-eo-reports
 * @author MoMo Themes
 * @since v2.3.0
 */
class MMT_ACG_WC_Analytics {
	/**
	 * Site URL
	 *
	 * @var string
	 */
	public $site_url;
	/**
	 * Site Name
	 *
	 * @var string
	 */
	public $site_name;
	/**
	 * Product Name
	 *
	 * @var string
	 */
	public $product;
	/**
	 * Google MID
	 *
	 * @var string
	 */
	public $ga4mid;
	/**
	 * Google tid
	 *
	 * @var string
	 */
	public $ga3tid;
	/**
	 * Facebook Pixel ID.
	 *
	 * @var string
	 */
	public $pixel;
	/**
	 * Constructor
	 */
	public function __construct() {

		$this->site_url  = 'http://www.momothemes.com';
		$this->site_name = 'MoMo Themes';
		$this->product   = 'WooAI';

		$this->ga4mid = '';
		$this->ga3tid = '';
		$this->pixel  = '452504221224808';

		// Ensure you have an instance of your Freemius SDK.
		$freemius = momoacgwc_fs();

		// Hook into the purchase completion event.
		$freemius->add_filter( 'checkout/purchaseCompleted', array( $this, 'mmt_anaytics_process_after_complete' ), 20 );

		// Enrich the checkout template with the necessary scripts.
		$freemius->add_filter( 'templates/checkout.php', array( $this, 'mmt_anaytics_add_js_for_gafb' ) );
	}

	/**
	 * Javascript after Purchase Complete
	 *
	 * @param String $js_function Js Function.
	 */
	public function mmt_anaytics_process_after_complete( $js_function ) {
		$added = "function ( response ) {
			console.log(response);
			var isTrial = null != response.purchase.trial_ends,
            isSubscription = null != response.purchase.initial_amount,
            total = isTrial
                ? 0
                : (isSubscription
                        ? response.purchase.initial_amount
                        : response.purchase.gross
                  ).toString(),
            productName = '" . esc_js( $this->product ) . "',
			storeUrl = '" . esc_js( $this->site_url ) . "',
			storeName = '" . esc_js( $this->site_name ) . "';

			console.log(fbq);
	
			// Facebook Pixel tracking code.
			if (typeof fbq !== 'undefined') {
				fbq('track', 'Purchase', {
					currency: response.purchase.currency.toUpperCase(),
					value: total,
				});
				
				console.log('Facebook Pixel tracking code executed after purchase completion.');
			} else {
				console.log('Facebook Pixel not defined.');
			}
		}";
		/* if ( ! empty( $js_function ) ) {
			$js_function .= $added;
		} */
		return $added;
	}
	/**
	 * Add Google Analytics and Facebook Pixel
	 *
	 * @param string $html Other HTML code.
	 */
	public function mmt_anaytics_add_js_for_gafb( $html ) {
		return "<script type='text/javascript'>
			(function() {
				function loadScript(src, callback) {
					var script = document.createElement('script');
					script.type = 'text/javascript';
					script.async = true;
					script.src = src;
					script.onload = callback;
					script.onerror = function() {
						console.log('Error loading script:', src);
					};
					document.head.appendChild(script);
				}

				if (typeof gtag === 'undefined') {
					// Add your GA4 script tag here.
					window.dataLayer = window.dataLayer || [];
					function gtag(){dataLayer.push(arguments);}
					gtag('js', new Date());
					gtag('config', '{$this->ga4mid}');

					loadScript('https://www.googletagmanager.com/gtag/js?id={$this->ga4mid}', function() {
						console.log('GA4 script loaded successfully.');
						// Ensure gtag is defined and ready for use
						window.gtag = gtag;
					});
				} else {
					console.log('GA4 script already loaded.');
				}

				if (typeof fbq === 'undefined') {

				!function(f,b,e,v,n,t,s)
					{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
					n.callMethod.apply(n,arguments):n.queue.push(arguments)};
					if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
					n.queue=[];t=b.createElement(e);t.async=!0;
					t.src=v;s=b.getElementsByTagName(e)[0];
					s.parentNode.insertBefore(t,s)}(window, document,'script',
					'https://connect.facebook.net/en_US/fbevents.js');
					fbq('init', '{$this->pixel}');
					fbq('track', 'PageView');
					console.log('Facebook Pixel script loaded successfully.');
				} else {
					console.log('Facebook Pixel script already loaded.');
				}
			})();
		</script>" . $html;
	}
}
new MMT_ACG_WC_Analytics();
