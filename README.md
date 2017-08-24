# etsy_app
Gets top 5 sold items for 10 stores

Requirements

Note: I will be working on remove this dependencies

cURL devel:

    Ubuntu: sudo apt-get install libcurl4-dev
    Fedora/CentOS: sudo yum install curl-devel
    
OAuth pecl package:

    sudo apt-get install php-oauth
    
And then add the line extension=oauth.so to your php.ini


OAuth configuration script

Etsy API uses OAuth 1.0 authentication, so lets setup our credentials.

The script scripts/auth-setup.php will generate an OAuth config file required by the Etsy client to make signed requests. Example:

    export ETSY_CONSUMER_KEY=qwertyuiop123456dfghj
    export ETSY_CONSUMER_SECRET=qwertyuiop12

php scripts/auth-setup.php /path/to/my-oauth-config-destination.php
It will show an URL you must open, sign in on Etsy and allow the application. Then copy paste the verification code on the terminal. (On Mac OSX, it will open your default browser automatically)

Generated OAuth config file

After all, it should looks like this:

    <?php
     return array (
      'consumer_key' => 'df7df6s5fdsf9sdh8gf9jhg98',
      'consumer_secret' => 'sdgd6sd4d',
      'token_secret' => 'a1234567890qwertyu',
      'token' => '3j3j3h33h3g5',
      'access_token' => '8asd8as8gag5sdg4fhg4fjfgj',
      'access_token_secret' => 'f8dgdf6gd5f4s',
    );
Initialization

    <?php
    require('vendor/autoload.php');
    $auth = require('/path/to/my-oauth-config-destination.php');

    $client = new Etsy\EtsyClient($auth['consumer_key'], $auth['consumer_secret']);
    $client->authorize($auth['access_token'], $auth['access_token_secret']);

    $api = new Etsy\EtsyApi($client);

    print_r($api->getUser(array('params' => array('user_id' => '__SELF__'))));
