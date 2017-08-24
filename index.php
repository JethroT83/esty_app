<?php


	#Run AutoLoad
	#require(__DIR__ . '/app/autoload.php');
	require(__DIR__.'/vendor/autoload.php');
	
	#Include Database Credentials
	#require(__DIR__ . '/app/database.php');

	############### To Run ########################

	#export ETSY_CONSUMER_KEY=qwertyuiop123456dfghj
	#export ETSY_CONSUMER_SECRET=qwertyuiop12
	#php scripts/auth-setup.php /path/to/my-oauth-config-destination.php

	# It is likely that you do not have php-oauth installed
	# sudo apt-get install php-oauth


	################ OAUTH LOGIN ####################
		$auth = require_once(__DIR__."/oauth-config.php");

		$client = new Etsy\EtsyClient($auth['consumer_key'], $auth['consumer_secret']);
		$client->authorize($auth['access_token'], $auth['access_token_secret']);

		$api = new Etsy\EtsyApi($client);

		print_r($api->getUser(array('params' => array('user_id' => '__SELF__'))));



	################  TEST         ##################
	//new \app\test();


	################  Running Code ##################