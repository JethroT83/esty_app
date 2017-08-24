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
									"One Source Supply",
									"Smart Parts Crafts");

		public function get(){

			$P = new \app\parse();
			$result = array();
			foreach($this->topSellers as $i => $topSeller){

				$params = array('shop_name'=>$topSeller,'limit'=>1);
				$shops = $P->getShops($params);

				$shopID = $shops[0]['shop_id'];
				$listings = $P->getShopListings($shopID);

				$result[$topSeller] = $listings;

			}

			return $result;

		}



	}
}