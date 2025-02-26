<?php
/**
 * @package sdi-scarcity
 * @version 0.1
 */

 class SdiCampaign extends SdiScarcity
 {

 	/**
 	 *  ADMIN - add new campaign 
 	 */
 	public static function newCampaign()
 	{
 		global $wpdb;

 		$alert = "";
 		if (parent::request('post')) {
 			if (!empty($_POST['start_datetime']) && !empty($_POST['name'])) {
	 			
	 			if ($wpdb->insert($wpdb->prefix.'sdi_scarcity_timer', [
	 				'name' => $_POST['name'],
	 				'start_datetime' => $_POST['start_datetime'],
	 				'end_datetime' => $_POST['end_datetime'],
	 				'headline' => $_POST['headline'],
	 				'headline_placement' => $_POST['headline_placement'],
	 				'display' => $_POST['display'],
	 				'redirect' => $_POST['redirect'],
	 				'product_id' => $_POST['product_id']
	 			])) {
	 				$alert = parent::alert("New campaign is created.","succes");
	 			}

	 		} else {
	 			$alert = parent::alert("Please set the date of your campaign","error");
	 		}
 		}
 		
 		(new SdiAdmin())->adminContent('new-campaign', compact('alert'));
 	}

 	/**
 	 *  ADMIN - edit campaign 
 	 */
 	public function editCampaign()
 	{
 		global $wpdb;
 		
 		if (!empty($_POST)) {
 			$wpdb->update(
 				$wpdb->prefix.'sdi_scarcity_timer', [
	 				'name' => $_POST['name'],
	 				'start_datetime' => $_POST['start_datetime'],
	 				'end_datetime' => $_POST['end_datetime'],
	 				'headline' => $_POST['headline'],
	 				'headline_placement' => $_POST['headline_placement'],
	 				'display' => $_POST['display'],
	 				'redirect' => $_POST['redirect'],
	 				'product_id' => $_POST['product_id']
	 			],
	 			[ 'ID' => $_GET['edit'] ],
	 			[
	 				'%s',
	 				'%s',
	 				'%s',
	 				'%s',
	 				'%s',
	 				'%s',
	 				'%s',
	 				'%d'
	 			],
	 			['%d']
 			);
			$alert = 'Your changes has been saved.';
			$alertType = 'success';
 		}
 		
 		$campaign = SdiCampaign::getCampaign($_GET['edit']);

 		return compact('campaign', 'alert', 'alertType');
 	}

 	/**
 	 *  ADMIN - list all campaign
 	 */
 	public static function listCampaign()
 	{
 		return (new SdiDb())->find("sdi_scarcity_timer", [
 			'fields' => ['id','name','start_datetime', 'end_datetime', 'headline', 'headline_placement', 'display', 'redirect', 'product_id']
 		]);
 	}

 	/**
 	 * Get the specified campaign
 	 * @param int $id
 	 */
 	public static function getCampaign($id)
 	{
 		return (new SdiDb())->getRow("sdi_scarcity_timer", [
 			'fields' => ['id', 'name','start_datetime', 'end_datetime', 'headline', 'headline_placement', 'display', 'redirect', 'product_id'], 
 			'condition' => 'id='.$id
 		]);
 	}

 	/**
 	 * Get the specified campaign
 	 * @param array $atts
 	 * @param mixed $content
 	 */
 	public static function timer( $atts, $content = null ) {
		ob_start();
		$id = $atts['id'];
		if (!empty($id)) {
			$campaign = self::getCampaign($id);
			
			if (!empty($campaign)) {

				$productQuantity = 0;
				if (!empty($campaign['product_id'])) {
					$product = wc_get_product($campaign['product_id']);
					if (!empty($product)) {
						if ($product->get_stock_quantity() && $product->get_stock_status() == "instock") {
							$productQuantity = $product->get_stock_quantity();
						}
					}
				}
				
				$campaign['headline'] = str_replace('{products}', $productQuantity, $campaign['headline']); 

				// Extract the time remaining
				extract(self::getTimeRemaining($id));

				extract($campaign);

				//Check if user custom template exist
				$themeCustomTemplatePath = get_stylesheet_directory().'/sdi-scarcity/'.$display.'/timer.php';
				if (file_exists($themeCustomTemplatePath)) {
					include_once($themeCustomTemplatePath);
				} else {
					// use our plugin default
					include_once(SDI_PLUGIN_PATH.'/templates/'.$display.'/timer.php');
				}

			}
		}
		return ob_get_clean();
	}

	/**
 	 * Get the time remaining of user
 	 * @param int $campaignId
 	 * @return array
 	 */
	public static function getTimeRemaining($campaignId)
	{

		// check if user already visited the link
		$campaign = self::getCampaign($campaignId);
		if (!empty($campaign)) {
			$ip  = self::getVisitorIdentity();
			$db = new SdiDb();

			$result = $db->getRow('sdi_scarcity_timer_users',[
				'condition' => 'ip=\''.$ip.'\'&timer_id=\''.$campaignId.'\''
			]);

			if (empty($result)) {
				$time = time();
				$data = [
					'timer_id' => $campaignId,
					'ip'	   => $ip,
					'start_datetime' => $time
				];
				$db->insert($db->prefix.'sdi_scarcity_timer_users',$data);
			} else {
				$time = $result['start_datetime'];
			}
			$endTime = strtotime($campaign['end_datetime']);
			$timeLeft = $endTime - $time;
			return [
				'campaignId'		=> $campaignId,
				'timerStart'		=> $time,
				'timerEnd'			=> $campaign['end_datetime'],
				'days' 	=> sprintf('%02d', floor($timeLeft / 86400)),
				'hours'	=> sprintf('%02d', floor(($timeLeft % 86400) / 3600)),
				'minutes'	=> sprintf('%02d', floor(($timeLeft % 3600) / 60)),
				'seconds'	=> sprintf('%02d', ($timeLeft % 60))
			];
		} else {
			return false;
		}
	}

	/**
 	 * Get user Ip
 	 * @return string
 	 */
	public static function getVisitorIdentity()
	{
		return isset($_SERVER['HTTP_CLIENT_IP'])?$_SERVER['HTTP_CLIENT_IP']:isset($_SERVER['HTTP_X_FORWARDED_FOR'])?$_SERVER['HTTP_X_FORWARDED_FOR']:$_SERVER['REMOTE_ADDR'];
	}

	public function updateTimer()
	{
		echo json_encode(['success' => false]);
		exit;
	}
 }