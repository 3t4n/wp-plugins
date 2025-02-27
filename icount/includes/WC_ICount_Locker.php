<?php

namespace WC_Gateway_ICount;
class WC_ICount_Locker_Exception extends \Exception{}
class WC_ICount_Locker
{
	const PREFIX = 'woo_icount_payment_';
	private string $file;
	private $resource;

	public function __construct(string $name, $is_require = true)
	{		
		$this->file = sys_get_temp_dir() . DIRECTORY_SEPARATOR . self::PREFIX . $name .'.tmp';
			
		$this->resource = fopen($this->file, 'c');
		if (!is_resource($this->resource) || !flock($this->resource, LOCK_EX) && $is_require)
			throw new WC_ICount_Locker_Exception('Cannot Lock Code Block');
	}

	public function __destruct()
	{
		if(is_resource($this->resource)){
			flock($this->resource, LOCK_UN);
			//fclose($this->resource);
		}
		//unlink($this->file);
		wp_delete_file($this->file);
	}
}