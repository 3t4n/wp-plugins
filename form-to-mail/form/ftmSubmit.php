<?php
require_once ABSPATH . WPINC . '/class-phpmailer.php';
require_once ABSPATH . WPINC . '/class-smtp.php';

class ftmSubmit extends PHPMailer{
	public $post;		// объект поста с формой
	private $nonce;		// проверочный ключ
	public $formdata;	// массив данных формы
	public $send_email;	// Адрес получателя
	public $from_email;	// Адрес отправителя
	
	/**
	* SMTP SSL
	*
	* $Username		Логин
    * $Password		Пароль
    * $Host			Хост
    * $Port			Порт
    * $SMTPAuth		Авторизация SMTP
    * 
    * WP mail
    * 
    * $ContentType	Тип контента
    * $CharSet		Кодировка
    * $From			Адрес отправителя
    * $FromName		Имя отправителя
    * $Subject		Тема
    * $Body			Тело письма
    * $mailHeader	Заголовки письма
    * $SMTPSecure	Тип шифрования
    * 
	*/
	function __construct($arg = null){
		
		$this->FromName = $arg['FromName']?$arg['FromName']:get_option('ftm_name');
		$this->Subject = $arg['Subject']?$arg['Subject']:'Без темы';
		
		$this->send_email = $arg['to']?$arg['to']:get_option('ftm_mail');		
		$this->from_email = $arg['From']?$arg['From']:get_option('ftm_mail');
		$this->Body = $arg['Body']?$arg['Body']:'';
		
		$this->Username = get_option('ftm_smtp_username');
        $this->Password = get_option('ftm_smtp_password');
        $this->Host = get_option('ftm_smtp_host');
        $this->From = get_option('ftm_smtp_from');
        $this->Port = get_option('ftm_smtp_port');
        
		$this->Mailer = 'smtp';
		$this->ContentType = 'text/html';
		$this->CharSet = 'UTF-8';
		
		if(!empty($_POST['ftm_nonce']) AND !empty($_POST['ftm_post'])){ // $_POST
			$this->nonce = $_POST['ftm_nonce'];
			$this->post = get_post($_POST['ftm_post']); //подгружаем пост формы
			$this->verify_nonce($this->nonce);
			$this->formdata = $_POST['ftm_form_data'];
			
		}
		if(!empty($this->Body)){
			$this->autop();
			$this->Body = $this->layout_mail($this->Body);
		}
	}
	
	/*
	* Отправка формы с сайта 
	*/
	public function postform($post = false){
		
		if($post){
			if(is_numeric($post)){
				$this->post = get_post($post);
			}elseif(is_object($post)){
				$this->post = $post;
			}
		}
		if(empty($this->post)){
			return false;
		}
		if(is_array(json_decode($this->post->post_content,true))){ 
			$content = json_decode($this->post->post_content,true); // преобразуем JSON в массив
		}else{
			$content = [];
		}
		foreach($content as $field){
			$post_field = strip_tags($this->formdata[$field['name']]);
			
			if($field['required'] == 'true' AND empty($post_field)){	// Проверка required
				$this->respond('ftm_validate_required', $field);
			}
			if(!$this->validate($post_field,$field['type'])){ // Проверка правильности данных
				$this->ftm_respond('ftm_validate_type', $field);
			};
			if(is_array($post_field)){ // массив в строку
				$post_field = implode(', ',$post_field);
			}
			$formdata[$field['name']] = $post_field;
		}
		$this->formdata = $formdata;
		do_action('ftm_form_validate',$this->formdata);
		$this->Body = $this->post->post_excerpt;
		$this->autop();
		$this->template_mail(); //Приведение вида в текст по шаблону
		do_action('ftm_template_mail',$this->Body);
		
		if(!empty(get_post_meta( $this->post->ID, 'ftm_send_email', true ))){ // Если указан E-mail, то используем его
			$this->send_email = get_post_meta( $this->post->ID, 'ftm_send_email', true );
		}
		if(!empty(get_post_meta( $this->post->ID, 'ftm_from_email', true ))){ // Если указан E-mail, то используем его
			$this->from_email = get_post_meta( $this->post->ID, 'ftm_from_email', true );
		}
		$this->Subject = $this->post->post_title;
		$this->ftm_send();
	}
	
	private function verify_nonce($nonce){ // проверка проверочного кода
		if(!wp_verify_nonce($nonce, 'ftm_ajax-nonce')){
			$this->ftm_respond('ftm_mail_failed');
		};
		return true;
	}
	
	/*
	* Валидация 
	*/
	public function validate($value,$type){	// валидация полей
		$validate_type = 'validate_'.$type;
		if(method_exists($this,$validate_type)){
			return $this->$validate_type($value);
		}else{
			return $this->validate_string($value);
		};
		
	}
	private function validate_string($value){	// Строка
		if(is_string($value)){
			return true;
		}
		return false;
	}
	private function validate_array($value){	// Массив
		if(is_array($value) OR empty($value)){
			return true;
		}
		return false;
	}
	private function validate_tel($value){	// Телефон
		$numbers = preg_replace("/[^0-9]/", '', $value);
		if(strlen($numbers) < 15 AND strlen($numbers) > 7){
			return true;
		}
		return false;
	}
	private function validate_email($value){	// E-mail
		if (filter_var($value, FILTER_VALIDATE_EMAIL)) {
		    return sanitize_email($value);
		}
		return false;
	}
	
	/*
	* wpautop
	*/
	public function autop(){
		$this->Body = wpautop($this->Body);
	}	
	
	/*
	* Шаблон письма
	*/
	public function template_mail(){
		$this->Body = $this->layout_mail($this->Body);
		$replace_keys = [];
		$replace_values = [];
		foreach($this->formdata as $key_field => $field){
			$replace_keys[] = '/[\[][\ ]*'.$key_field.'[\ ]*[\]]/';
			$replace_values[] = $field;
		}
		$this->Body = preg_replace($replace_keys, $replace_values, $this->Body);
		
	}
		
	/*
	* Обертка письма
	*/
	public function layout_mail($message){
		if(get_option('ftm_template_layout_if') == 'true'){
			$layout_path = ltrim(get_option('ftm_template_layout'),'/');
			$layout_path = $_SERVER['DOCUMENT_ROOT'].$layout_path;
			if(file_exists($layout_path)){
				$layout = file_get_contents($layout_path);
				$replace_massage = '/[\[][\ ]*message[\ ]*[\]]/';
				$message = preg_replace($replace_massage, $message, $layout);
			}
		}
		return $message;
	}
	
	/*
	* Отправка письма
	*/
	public function ftm_pre_send(){
		if(is_array($this->send_email)){ // Адресаты получателей
			foreach($this->send_email as $send_email_name => $send_email){
				$send_email_name = !is_string($send_email_name)?$send_email_name:'';
				if(!empty($send_email)){
					$this->AddAddress($send_email,$send_email_name);
				}
			}
		}else{
			$this->AddAddress($this->send_email);
		}
		$this->MsgHTML($this->Body);
		
		if(get_option('ftm_smtp_if') == 'true'){
			$this->SetFrom($this->From); // Адрес отправителя
			$this->SMTPAuth  = true;
			$this->SMTPSecure = 'ssl';
		}else{
			$this->SetFrom($this->from_email); // Адрес отправителя
		}
	}
	public function ftm_send(){
		$this->ftm_pre_send();
		$send = $this->send();
		if($send === true){
			return $this->respond('ftm_mail_success',NULL, true);
		}
		return $this->respond('ftm_mail_failed',NULL);
	}
	
	
	/**
	* Ответ
	* 
	* @param $type - тип сообщения
	* @param $field - поле
	* @param $return - ответ 
	* 
	*/
	private function respond($type, $field = null, $return = false){
		if (wp_doing_ajax()) {
			echo '{"respond": "'.$type.'","form_id": "'.$this->post->ID.'","form_title": "'.$this->post->post_title.'","field_name": "'.$field['name'].'","field_title": "'.$field['label'].'"}';
			wp_die();
		}
		return $return;
	}
}