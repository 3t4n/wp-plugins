<?php
class AutoofficeModel
{
	public $data = ['post' => [], 'select' => []];
	protected $rule = [];
	public $db_name = 'aopf_autooffice_settings';

	/**
	 * construct
	 */
	public function __construct()
	{
		$this->rule = self::aopf_autooffice_rule();
	}
	
	public static function aopf_autooffice_rule()
	{
		return [
			'stores_id' => [
				'rule' => '^[0-9]{1,}$',
				'required' => true,
			],
			'stores_name' => [
				'rule' => '^[0-9 a-z]{3,}$',
				'required' => true,
			],
			'api_key' => [
				'rule' => '^[0-9 a-z]{32}$',
				'required' => true,
			],
			'newsletter' => [
				'rule' => '^[0-9]{1,}$',
				'required' => true,
			],
			'advertising' => [
				'rule' => '^[0-9]{1,}$',
				'required' => false,
			],
			'subsform' => [
				'rule' => '^[0-9]{1,}$',
				'required' => false,
			],
			'widget_newsletter' => [
				'rule' => '^[0-9]{1,}$',
				'required' => false,
			],
			'widget_advertising' => [
				'rule' => '^[0-9]{0,}$',
				'required' => false,
			],
			'widget_subsform' => [
				'rule' => '^[0-9]{1,}$',
				'required' => false,
			],
			'form_html' => [
				'rule' => 'none',
				'required' => false,
			],
			'form_css' => [
				'rule' => 'none',
				'required' => false,
				'url' => '/assets/css/core.css',
			],
			'form_js' => [
				'rule' => 'none',
				'required' => false,
				'url' => '/assets/js/core.js',
			],
		];
	}

	/**
	 * getData()
	 */
	public function aopf_autooffice_getData()
	{
		self::aopf_autooffice_dataAcquisition($this->rule);
		return $this->data;
	}

	/**
	 * load($post)
	 */
	public function aopf_autooffice_load($post)
	{
		self::aopf_autooffice_getData();
		foreach($post as $key => $value){
			if (isset($this->data['select'][$key])) {
				if (!empty($value) && $this->data['select'][$key]['value']===$value) {
					continue;
				}
				
				$validate = self::aopf_autooffice_validation($value, $this->data['select'][$key]['rule'], $this->data['select'][$key]['required']);
				if (!empty($validate['status'])) {
					$this->data['post'][$key]['value'] = $value;
					$this->data['post'][$key]['id'] = $this->data['select'][$key]['id'];
				} else {
					self::aopf_autooffice_setSession('error', $key, $validate['error']);
					$this->data['post']['error'] = true;
				}	
			}
		}

		return $this->data;
	}

	/**
	 * save()
	 */
	public function aopf_autooffice_save() 
	{
		global $wpdb;
		$table_name = $wpdb->prefix . $this->db_name;
		
		$error = 0;
		$success = 0;
		if (!empty($this->data['post'])) {
			foreach ($this->data['post'] as $key=>$value) {
				if (!empty($value['error'])) {
					continue;
				}

				if(!empty($value['id'])){
					$db = $wpdb->update(
						$table_name,
						array('value' => stripslashes_deep($value['value'])),
						array('id' => $value['id'])
					);
				} else {	  
					$db = $wpdb->insert(
						$table_name,
						array(
							'key' => $key, 
							'value' => stripslashes_deep($value['value']), 
							'date_create'=>date('Y-m-d H:i:s')
						)
					);                    
				}
				
				if ($db===false) {
					$error++;   
				}
			}
		}

		if (empty($error)) {
			return true;
		}

		return false;
	}
	
	/**
	 * filesave()
	 */
	public function aopf_autooffice_filesave() 
	{
		$error = 0;
		$success = 0;
		if (!empty($this->data['post'])) {
			foreach ($this->data['post'] as $key=>$value) {
				if (!empty($value['error'])) {
					continue;
				}
				
				$record = file_put_contents(AOPF_AUTOOFFICE_DIR.$this->rule[$key]['url'], stripcslashes($value['value']), FILE_USE_INCLUDE_PATH);
				if (!empty($value['value']) && empty($record)) {
					$error++;   
				}
			}
		}

		if (empty($error)) {
			return true;
		}

		return false;
	}
	
	/** 
	 * setSession($type='', $key='', $value='')
	 */
	public function aopf_autooffice_setSession($type='', $key='', $value='') 
	{
		if (empty($type) || empty($key)) {
			return false;
		}	

		$param = '['.$type.']['.self::aopf_autooffice_HashValue($key).']';

		if (!empty($value)) {
			unset($_SESSION[$param]);
			$_SESSION[$param] = $value;	
		} else {
			unset($_SESSION[$param]);
		}
	}
	
	/** 
	 * getSession($type='', $key='')
	 */
	public function aopf_autooffice_getSession($type='', $key='') 
	{
		if (empty($type) || empty($key)) {
			return false;
		}	

		$param = '['.$type.']['.self::aopf_autooffice_HashValue($key).']';
		$view = $_SESSION[$param];
		self::aopf_autooffice_setSession($type, $key);
		return $view;	
	}
	
	/** 
	 * hasSession($type='', $key='')
	 */
	public function aopf_autooffice_hasSession($type='', $key='') 
	{
		if (!empty($type) && !empty($key)) {
			$param = '['.$type.']['.self::aopf_autooffice_HashValue($key).']';
			if(!empty($_SESSION[$param])) {
				return true;
			}
		}	

		return false;
	}
	
	/**
	 * getDefaultForm()
	 */
	public function aopf_autooffice_getDefaultForm() 
	{
		$form = '
<form action="https://'.$this->data['select']['stores_name']['value'].'.aoserver.ru/?r=personal/newsletter/subscriptions/add&id='.$this->data['select']['stores_id']['value'].'&lg=ru" method="post">

	<input type="hidden" name="Contact[id_newsletter]" value="'.$this->data['select']['newsletter']['value'].'">

	<input type="hidden" name="Contact[id_advertising_channel_page]" value="'.$this->data['select']['advertising']['value'].'">

	<input type="hidden" name="email_field" value="Contact[email]">

	<input type="hidden" name="id_form" value="'.$this->data['select']['subsform']['value'].'">

	<input type="email" required="required" name="Contact[email]" placeholder="E-mail" style="width:100%">

	<input type="submit" value="Подписаться">

</form>
		';
		
		return $form;
	}
	
	/**
	 * getDefaultForm()
	 */
	public function aopf_autooffice_getDefaultFormCss() 
	{
		$path = AOPF_AUTOOFFICE_DIR.$this->rule['form_css']['url'];
		
		if (file_exists($path)) {
			return file_get_contents($path, FILE_USE_INCLUDE_PATH);
		}
		
		return false;
	}
	
	/**
	 * getDefaultForm()
	 */
	public function aopf_autooffice_getDefaultFormJs() 
	{
		$path = AOPF_AUTOOFFICE_DIR.$this->rule['form_js']['url'];
		
		if (file_exists($path)) {
			return file_get_contents($path, FILE_USE_INCLUDE_PATH);
		}
		
		return false;
	}
	
	/**
	 * getDefaultForm()
	 */
	public function aopf_autooffice_parserForm($form) 
	{
		$this->data = self::aopf_autooffice_getData();
		
		$new_form = false;
		preg_match('/action=[\"|\'](.*?)[\"|\']/i', $form, $array);
		if (empty($array[1])) {
			self::aopf_autooffice_setSession('error', 'All', __('Error_message_1', 'autooffice'));
			return $form;
		}
		
		if (
			!empty($this->data['select']['stores_name']) && 
			!empty($this->data['select']['stores_id'])
		) {
		
			$data_url = parse_url($array[1]);
			if (!empty($data_url)) {
				$action = $data_url['scheme'].'://';
				$action .= preg_replace('/^(.*?)[\.]/i', $this->data['select']['stores_name']['value'].'.', $data_url['host']).$data_url['path'].'?';
				$query = explode('&', $data_url['query']);
				if (!empty($query) && is_array($query)) {
					foreach ($query as $key => $value) {
						if (!empty($value)) {
							if (!empty($key)) {
								$value = '&'.$value;
							}
							
							if (preg_match('/(id=)/i', $value)) {
								$action .= '&id='.$this->data['select']['stores_id']['value'];
							} else {
								$action .= $value;
							}
						}
					}
				} else {
					$action = false;
				}
			}
			
			if (empty($action)) {
				$action = 'https://'.$this->data['select']['stores_name']['value'].'.aoserver.ru/?r=personal/newsletter/subscriptions/add&id='.$this->data['select']['stores_id']['value'].'&lg=ru';
			}
		}
		
		if (!empty($this->data['select']['newsletter'])) {

			$new_form = preg_replace('/action=[\"|\'](.*?)[\"|\']/i', 'action="'.$action.'"', $form);
			if (!preg_match('/name=[\"|\']Contact\[id_newsletter\][\"|\'][\s]{1,}value=[\"|\'](.*?)[\"|\']/i', $form)) {
				self::aopf_autooffice_setSession('error', 'All', __('Error_message_2', 'autooffice'));
				return $form;
			}
			$new_form = preg_replace('/name=[\"|\']Contact\[id_newsletter\][\"|\'][\s]{1,}value=[\"|\'](.*?)[\"|\']/i', 'name="Contact[id_newsletter]" value="'.$this->data['select']['newsletter']['value'].'"', $new_form);
		}
		
		if (!empty($this->data['select']['advertising'])) {
			
			if (preg_match('/name=[\"|\']Contact\[id_advertising_channel_page\][\"|\'][\s]{1,}value=[\"|\'](.*?)[\"|\']/i', $form)) {
				$new_form = preg_replace('/name=[\"|\']Contact\[id_advertising_channel_page\][\"|\'][\s]{1,}value=[\"|\'](.*?)[\"|\']/i', 'name="Contact[id_advertising_channel_page]" value="'.$this->data['select']['advertising']['value'].'"', $new_form);
			} else {
				if (!empty($this->data['select']['advertising']['value'])) {
					self::aopf_autooffice_setSession('error', 'All', __('Error_message_3', 'autooffice'));
					return $form;
				}
			}
		}
		
		if (!empty($this->data['select']['subsform'])) {
			
			if (preg_match('/name=[\"|\']id_form[\"|\'][\s]{1,}value=[\"|\'](.*?)[\"|\']/i', $form)) {
				$new_form = preg_replace('/name=[\"|\']id_form[\"|\'][\s]{1,}value=[\"|\'](.*?)[\"|\']/i', 'name="id_form" value="'.$this->data['select']['subsform']['value'].'"', $new_form);
			} else {
				if (!empty($this->data['select']['subsform']['value'])) {
					self::aopf_autooffice_setSession('error', 'All', __('Error_message_4', 'autooffice'));
					return $form;
				}
			}
		}
		
		self::aopf_autooffice_setSession('success', 'All', __('Success', 'autooffice'));
		return $new_form;
	}

	/**
	 * validation($value, $rule)
	 */
	protected function aopf_autooffice_validation($value, $rule, $required)
	{
		if (!empty($required) && empty($value)) {
			return ['status'=>false, 'error'=>__('Data required', 'autooffice')];		
		}

		if (empty($required) && empty($value)) {
			return ['status'=>true, 'error'=>''];		
		}

		if ($rule==='none') {
			return ['status'=>true, 'error'=>''];
		} 

		if(!preg_match('/'.$rule.'/i', $value)){
			return ['status'=>false, 'error'=>__('Invalid Data', 'autooffice')];
		}

		return ['status'=>true, 'error'=>''];	
	}
	
	/**
	 * dataAcquisition($rule)
	 */
	public function aopf_autooffice_dataAcquisition($rule)
	{
		global $wpdb;
		$table_name = $wpdb->prefix . $this->db_name;
		
		foreach ($rule as $key=>$value) {
			$this->data['select'][$key] = [
				'value' => '',
				'rule' => !empty($value['rule']) ? $value['rule'] : '',
				'required' => !empty($value['required']) ? $value['required'] : '',
				'tag' => !empty($value['tag']) ? $value['tag'] : '',
			];
			
			if ($key=='form_html') {
				$this->data['select'][$key]['value'] = $this->aopf_autooffice_getDefaultForm();
			} 
			
			if ($key=='form_css') {
				$this->data['select'][$key]['value'] = $this->aopf_autooffice_getDefaultFormCss();
			} 
			
			if ($key=='form_js') {
				$this->data['select'][$key]['value'] = $this->aopf_autooffice_getDefaultFormJs();
			} 
		}

		if(
			$wpdb->get_var("show tables like '$table_name'") && 
			$wpdb->query('SELECT * FROM '.$table_name)
		) {
			$res = $wpdb->get_results('SELECT * FROM '.$table_name);
			if (!empty($res) && is_array($res)) {
				foreach ($res as $value) {
					if (isset($this->data['select'][$value->key])) {
						$this->data['select'][$value->key]['id'] = $value->id;
						
						if ($value->key=='form_html') {
							if (!empty($value->value)) {
								$this->data['select'][$value->key]['value'] = $value->value;
							}
							continue;
						} 
						
						$this->data['select'][$value->key]['value'] = $value->value;
					}
				}
			}
		}

		if (!empty($_GET['page']) && preg_match('/autooffice/i', $_GET['page'])) {
			$this->data['load'] = self::aopf_autooffice_getLoadData();
		}
	}

	/*
	 * getLoadData()
	 */
	protected function aopf_autooffice_getLoadData() 
	{

		if (empty($this->data['select']['stores_name']['value']) || empty($this->data['select']['api_key']['value'])) {
			return false;
		}
		
		$time = strtotime(date('Y-m-d H:i:s'));
		$hash = md5(hash('sha512', $time . $this->data['select']['stores_name']['value']) . hash('ripemd160', $this->data['select']['api_key']['value']));
		$url = 'https://'.$this->data['select']['stores_name']['value'].'.aoserver.ru/?r=api/data';
		
		$data = json_encode([
			'request_date' => $time,
			'request_identifier' => $hash,
		]);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 50);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json'
		));
		
		$answer = curl_exec($ch);
		if (empty($answer)) {
			return false;
		}
		
		return json_decode($answer, true);
	}
	
	/**
	 * create_table()
	 */
	public function aopf_autooffice_create_table()
	{
		global $wpdb;
		$table_name = $wpdb->prefix . $this->db_name;

		if ($wpdb->get_var("show tables like '$table_name'") != $table_name) {
		   
			$sql = "
				CREATE TABLE ".$table_name." (
					`id` int(11) NOT NULL AUTO_INCREMENT,
					`date_create` DATETIME NOT NULL,
					`deleted` TINYINT(4) NULL DEFAULT '0',
					`date_deleted` DATETIME NOT NULL,
					`type` int(11) NULL,
					`key` VARCHAR(255) NOT NULL,
					`value` TEXT NULL,
					`massive` TEXT NULL, 
					PRIMARY KEY (`id`),
					KEY `type` (`type`),
					KEY `key` (`key`)
				);
			";
		   
			require_once ABSPATH . 'wp-admin/includes/upgrade.php';
			dbDelta($sql);
		}
	}
	
	/**
	 * delete_table()
	 */
	public function aopf_autooffice_delete_table()
	{
		global $wpdb;
		$table_name = $wpdb->prefix . $this->db_name;

		if ($wpdb->get_var( "show tables like '$table_name'") == $table_name) {
			$result = $wpdb->query('DROP TABLE IF EXISTS '.$table_name);
			if (!empty($result)) {
				return true;
			}
		}
		
		return false;
	}
	
	/**
	 * insert_table()
	 */
	public function aopf_autooffice_trincate_table()
	{
		global $wpdb;
		$table_name = $wpdb->prefix . $this->db_name;

		if ($wpdb->get_var( "show tables like '$table_name'") == $table_name) {
			$result = $wpdb->query('TRUNCATE TABLE '.$table_name);
			if (!empty($result)) {
				return true;
			}
		}
		
		return false;
	}
	
	
	/**
	 * HashValue()
	 */
	protected function aopf_autooffice_HashValue($str = '') 
	{        
		return trim(md5($str));
	}
	
	/**
	 * model($className=__CLASS__)
	 */ 
	public static function aopf($className=__CLASS__)
	{
		return new $className;
	}
}