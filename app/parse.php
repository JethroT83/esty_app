<?php
namespace app {
	class parse extends model{

    	#array("shop_name": "string", "limit": "int","offset": "int","page": "int","lat": "latitude","lon": "longitude","distance_max": "float")
		public function getShops($params = array()){


			//Limit the payload to 10 stores by default
			if(!isset($params['limit'])){
				$params['limit'] = 10;
			}

			$r = self::$api->findAllShops(array('params'=>$params));

			$result = array();
			if(isset($r['results'])){
				$result = $r['results'];
			}

			return $result;
		}

		public function getShopListings($id, $verbose = false){


			$r = self::$api->findAllShopListingsFeatured(array('params'=>array('shop_id'=>$id,'limit'=>5)));
			$results = array();
			if($verbose === true){
				$results = $r['results'];
			}else{

				foreach($r['results'] as $i => $info){
					$a['listing_id']  	= $info['listing_id'];
					$a['title']  		= $info['title'];
					$a['description']  	= $info['description'];
					$results[$i] = $a;
 				}

			}


			return $results;

		}

	}
}