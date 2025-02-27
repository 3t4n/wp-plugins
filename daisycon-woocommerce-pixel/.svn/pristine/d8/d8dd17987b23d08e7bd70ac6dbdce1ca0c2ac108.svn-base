<?php

class Daisycon_User_Profile_Service
{
	public function get()
	{
		$profile = (new Daisycon_Http_Handler())->get(DAISYCON_PLUGIN_URL_SERVER_TO_SERVER . '/store/user-profile');
		return true === is_array($profile) && true === isset($profile['body'])
			? json_decode($profile['body'])->data ?? []
			: null;
	}
}
