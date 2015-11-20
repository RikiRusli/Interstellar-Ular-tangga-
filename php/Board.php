<?php
	
	# Tugas Besar ADBO (Interstellar) - Space Snake&Ladder
	# Dosen Pembimbing : Pascal Alfadian
	
	# @author Ivan TW - 2014730026 || Riki Rusli (Ketua) - 2014730032 || Daniel Ferdinan - 2014730038 
	# Kelas yang merepresentasikan game board pada permainan Interstellar.
	
	class Board{
		private $numBH;
		private $numWG;
		private $numAs;
		public $dice;
		
		private $arrPl;
		private $arrWG;
		private $arrBH;
		private $arrAs;
		
		# Konstruktor untuk men-generate board permainan secara keseluruhan
		# @param maxDadu maksimum banyak mata dadu yang diinginkan dalam permainan (umumnya 6)
		# @param wg banyaknya warp-gate (tangga) dalam board Interstellar
		# @param bh banyaknya blackhole dalam (ular) board Interstellar
		# @param as banyaknya astronot (pemain) dalam permainan Interstellar
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
		
		#Method yang digunakan untuk mengocok dadu (memanggil method di kelas Dadu)
		public function roll_The_Dice(){
			return $this->dice->roll();
		}
		
		# Method untuk menambahkan blackhole (ular) pada board Interstellar
		# @param idx masukan indeks kotak yang akan ditempati blackhole pada board Interstellar
		# @param b masukan objek blackhole
		public function add_Black_Hole($idx,$hole){
			$this->arrBH[$idx]=$hole;
		}
		
		# Method untuk menambahkan warp-gate (tangga) pada board Interstellar
		# @param idx masukan indeks kotak yang akan ditempati warp-gate pada board Interstellar
		# @param w masukan objek warp-gate
		public function add_Warper($idx,$warp){
			$this->arrWG[$idx]=$warp;
		}
		
		# Method untuk menambahkan astronot (pemain) pada board Interstellar
		# @param idx masukan indeks kotak yang akan ditempati astronot (pemain) pada board Interstellar
		# @param a masukan objek astronot (pemain)
		public function add_Astronot($idx,$astronot){
			$this->arrAs[$idx]=$astronot;
		}
		
		# Getter untuk banyak blackhole (ular) pada board permainan Interstellar
		# @return banyak blackhole pada board permainan Interstellar - int
		public function get_Num_BH(){
			return count($arrBH);
		}
		
		# Getter untuk banyak warp-gate (tangga) pada board permainan Interstellar
		# @return banyak warp-gate pada board permainan Interstellar - int
		public function get_Num_WG(){
			return count($arrWG);
		}
		
		# Getter Astronot pada index spesifik dalam board permainan Interstellar
		# @param idx masukan indeks astronot - int
		# @return objek astronot pada indeks spesifik sesuai parameter - Astronot
		public function get_As_At($idx){
			return $this->arrAs[$idx];
		}
		
		# Getter BlackHole pada index spesifik dalam board permainan Interstellar
		# @param idx masukan indeks BlackHole - int
		# @return objek BlackHole pada indeks spesifik sesuai parameter - BlackHole
		public function get_BH($idx){
			return $this->arrBH[$idx];
		}
		
		# Getter warp-gate pada index spesifik dalam board permainan Interstellar
		# @param idx masukan indeks warp-gate - int
		# @return objek warp-gate pada indeks spesifik sesuai parameter - SpaceWarpGate
		public function get_WG($idx){
			return $this->arrWG[$idx];
		}
		
		# Getter planet (kotak) pada index spesifik dalam board permainan Interstellar
		# @param idxy masukan posisi kotak X sumbu kartesian - int
		# @param idxx masukan posisi kotak Y sumbu kartesian - int
		# @return objek planet pada indeks spesifik sesuai parameter - Planet
		public function get_Planet($idxY,$idxX){
			return $this->arrPl[$idxY][$idxX];
		}
	}
?>
