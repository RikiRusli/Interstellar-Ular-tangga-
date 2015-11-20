<?php
	class Board{
		private $numBH;
		private $numWG;
		private $numAs;
		public $dice;
		
		private $arrPl;
		private $arrWG;
		private $arrBH;
		private $arrAs;
		
		public function __construct($maxDadu,$wg,$bh,$as){
			$this->dice=new Dadu($maxDadu);
			$this->numBH=$bh;
			$this->numWG=$wg;
			$this->numAs=$as;
			$arrPl=array();
			$arrWG=array();
			$arrBH=array();
			$arrAs=array();
			$locate=1;
			
			for($i=0;$i<10;$i++){
				for($j=0;$j<10;$j++){
					$this->arrPl[$i][$j]= new Planet($i,$j,$locate);
					$this->arrPl[$i][$j]->set_Locate_Pl($i,$j);
				}
			}
		}
		
		public function roll_The_Dice(){
			return $this->dice->roll();
		}
		
		public function add_Black_Hole($idx,$hole){
			$this->arrBH[$idx]=$hole;
		}
		
		public function add_Warper($idx,$warp){
			$this->arrWG[$idx]=$warp;
		}
		
		public function add_Astronot($idx,$astronot){
			$this->arrAs[$idx]=$astronot;
		}
		
		public function get_Num_BH(){
			return count($arrBH);
		}
		
		public function get_Num_WG(){
			return count($arrWG);
		}
		
		public function get_As_At($idx){
			return $this->arrAs[$idx];
		}
		
		public function get_BH($idx){
			return $this->arrBH[$idx];
		}
		
		public function get_WG($idx){
			return $this->arrWG[$idx];
		}
		
		public function get_Planet($idxY,$idxX){
			return $this->arrPl[$idxY][$idxX];
		}
		
	}
?>
