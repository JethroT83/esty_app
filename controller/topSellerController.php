<?php
namespace controller{

	class topSellerController{


		private $topSellers = array("BohemianFinding",
									"OnceMoreWithLove",
									"Thevelvetacorn",
									"Sparklypaperco",
									"Prettygrafikdesign",
									"paperandgumption",
									"ModParty",
									"Everfitte",
									"AnniePlansPrintables",
									"Thevelvetacorn");

		public function get(){

			$P = new \app\parse();
			$result = array();
			foreach($this->topSellers as $i => $topSeller){

				$params = array('shop_name'=>$topSeller,'limit'=>1);
				$shops = $P->getShops($params);

				if(isset($shops[0]['shop_id'])){

					$shopID = $shops[0]['shop_id'];
					$listings = $P->getShopListings($shopID);

					$result[$topSeller] = $listings;
				}else{
					die("store ".$topSeller ." does not exist.");
				}

			}

			return $result;

		}



	}
}