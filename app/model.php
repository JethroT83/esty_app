<?php

namespace app{
	
	class model{

		protected static $api;


		public static function login(){

			$client = new \Etsy\EtsyClient(AUTH['consumer_key'], AUTH['consumer_secret']);
			$client->authorize(AUTH['access_token'], AUTH['access_token_secret']);
			self::$api = new \Etsy\EtsyApi($client);
		}


	}

}