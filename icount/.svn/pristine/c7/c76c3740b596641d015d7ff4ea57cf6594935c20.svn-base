<?php

namespace WC_Gateway_ICount;
class WC_ICount_ENUM
{
	private static array $cases = [];

	private function __construct(){}

	public static function get(string $const): ?self
	{
		if(!array_key_exists(static::class,self::$cases)){
			$constants = (new \ReflectionClass(static::class))->getConstants();
			foreach($constants as $c=>$useless){
				self::$cases[static::class][$c] = new static;
			}
		}
		return self::$cases[static::class][$const] ?? null;
	}

	public function __toString()
	{
		return spl_object_hash($this);
	}
}
