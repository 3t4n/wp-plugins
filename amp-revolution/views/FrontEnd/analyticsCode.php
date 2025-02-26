<amp-analytics type="googleanalytics" id="analytics1">
	<script type="application/json">
		{
			"vars": {

				"account": "<?php echo ARSCP_AMP_Revolution::get()->options->get_option_data('analitycsCode','integrator','');?>"
			},
			"triggers": {
				"trackPageview": {
					"on": "visible",
					"request": "pageview"
				},
				"trackEvent": {
					"selector": "#event-test",
					"on": "click",
					"request": "event",
					"vars": {
						"eventCategory": "ui-components",
						"eventAction": "click"
					}
				}
			}
		}
	</script>
</amp-analytics>