<?php

$this->trackingOptions->twitter->putWCConversionCode=function($order=null)
	{
		if((!is_null($order))&&($this->is_enabled())&&($this->getCode()!=''))
		{
			echo '<!-- Easy Pixels Twitter universal website conversions code --><script>
			twq(\'track\',\'Purchase\', { 
			    //required parameters 
			    value: \''.$order->get_total().'\', 
			    currency: "'.json_encode($order->get_currency()).'", 
			    num_items: "'.sizeof($order->get_items()).'", 
			    order_id: "'.$order->get_order_number().'" 
			});</script>';
		}
	};
