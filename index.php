<?php

	#Run AutoLoad
	require(__DIR__.'/vendor/autoload.php');

	#Get OAUTH Credentials
	define("AUTH", require_once(__DIR__."/oauth-config.php"));

	############### To Run ########################

	#export ETSY_CONSUMER_KEY=qwertyuiop123456dfghj
	#export ETSY_CONSUMER_SECRET=qwertyuiop12
	#php scripts/auth-setup.php /path/to/my-oauth-config-destination.php

	# It is likely that you do not have php-oauth installed
	# sudo apt-get install php-oauth


	################ OAUTH LOGIN ####################

		$M = new \app\model();
		$M::login();


	################  HTML  ##################


?>
<html>
	</header>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
	</header>
	<body>


<?php

		$V = new \view\topSeller();
		echo $V->display();

?>
	</body>
</html>