<?php

class Mail365Import {

	public function __construct () 
	{
		if (isset($_POST["group"]) && !empty($_POST["group"])) {
			$this->import();
		} else {
			$this->index();
		}
	}
	
	public static function index()
	{
		$api = Mail365Api::getInstance();
		$listOfGroups = $api->getContactGroups('', 0, 50, "false", "false", "false");
		include(dirname(plugin_dir_path(__FILE__)) . '/templates/Import/import.php');

		return true;
	}
	
	public static function addManagementPage()
	{
		wp_enqueue_style('mail365_admin', dirname(plugin_dir_url(__FILE__)) . '/css/mail365.css', false);
		wp_enqueue_script('mail365_admin', dirname(plugin_dir_url(__FILE__)) . '/js/mail365.js');
		
		$jsTrans = array(
			'deleteQuestion' => __('Are you sure you want to delete an item', 'mail365')
		);
		wp_localize_script('mail365_admin', 'mail365JsTrans', $jsTrans);
	
		if (empty($_POST)) {
			new self();
		}
	}
	
	public function import() 
	{
		$limit = 500;
		$offset = 0;
		
		if ($_POST["user_role"] !== 'all') {
			$users = get_users(
				array(
					'offset' => $offset,
					'number' => $limit,
					'role' => $_POST['user_role']
				)
			);
		} else {
			$users = get_users(
				array(
					'offset' => $offset,
					'number' => $limit
				)
			);
		}
		
		$api = mail365Api::getInstance();
		
		$result = array(
			"added" => 0,
			"duplicate" => 0,
			"notAdded" => 0,
			"total" => 0
		);
		
		for ($i = 0; $i < count($users); $i++) {
			$data = array(
				"Электронная почта" => $users[$i]->data->user_email
			);
			
			$res = $api->postContactGroupsIdContacts($_POST["group"], json_encode($data));
			
			if ($res["http_code"] == 200) {
				$result["added"]++;
			} elseif ($res["http_code"] == 409) {
				$result["duplicate"]++;
			} else {
				$result["notAdded"]++;
			}
			
			$result["total"]++;
		}
		
		$response = array(
			"added" => __('Successful added contacts:', 'mail365') . " ". $result["added"]++,
			"duplicate" => __('Duplicate contacts:', 'mail365') . " ". $result["duplicate"]++
		);
		
		die(json_encode($response));
	}
}

?>