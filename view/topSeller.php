<?php 
namespace view {

	class topSeller{

		public function display(){

			$TS = new \controller\topSellerController();
			$data = $TS->get();

			$html = "";
			foreach($data as $topSeller => $listings){
				
				$html .= '<div>';
				$html .= 		'<div class="row">';
				$html .= 			'<div class="col-xs-12">';
				$html .= 				'<h2>'.$topSeller.'</h2>';
				$html .= 			'</div>';
				$html .= 		'</div>';
				foreach($listings as $i => $info){
					$html .= '<div class="row">';
					$html .= 	'<div class="col-xs-4">';
					$html .= 		'<h3>'.$info["title"].'</h3>';
					$html .= 	'</div>';
					$html .= 	'<div class="col-xs-8">';
					$html .= 		'<span>'.$info["description"].'</span>';
					$html .= 	'</div>';
					$html .= '</div>';

				}

				$html .= '</div>';
			}


			return $html;
		}


	}

}


?>