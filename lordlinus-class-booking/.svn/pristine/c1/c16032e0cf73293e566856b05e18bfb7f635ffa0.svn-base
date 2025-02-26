<?php
error_reporting(E_ALL);
include("mail/class.phpmailer.php");
class Mailinter
{
	function __construct()
	{
		$this->host_name = get_option('lord_setting_host');
		$this->port_number = get_option('lord_setting_port');
		$this->username = get_option('lord_setting_username');
		$this->password = get_option('lord_setting_password');
		$this->mail = new PHPMailer;
	}
	function send_mail_on_booking_staff($email, $body)
	{
		$bloginfo = get_bloginfo( 'name' );
		$this->mail->IsSMTP();
		$this->mail->IsHTML();
		$this->mail->Host = $this->host_name;
		$this->mail->Port = $this->port_number;
		$this->mail->SMTPAuth = true;
		$this->mail->Username = $this->username;
		$this->mail->Password = $this->password;
		$this->mail->AddAddress($email);
		$this->mail->Subject = "$bloginfo : New booking Made";
		$this->mail->Body =$body;
		$this->mail->Send();
	}
}
?>