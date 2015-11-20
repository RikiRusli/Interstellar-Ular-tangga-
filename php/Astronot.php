<?php
	
	# Tugas Besar ADBO (Interstellar) - Space Snake&Ladder
	# Dosen Pembimbing : Pascal Alfadian
	
	# @author Ivan TW - 2014730026 || Riki Rusli (Ketua) - 2014730032 || Daniel Ferdinan - 2014730038
	# Kelas yang merepresentasikan astronot (pemain) pada permainan Interstellar.
	
	class Astronot{
		
		private $name="";
		private $x=0;
		private $y=9;
		private $locate;
		private $isWin=false;
		
		# Konstruktor dari kelas Astronot
		# @param name masukan nama astronot (pemain) - String
		public function __construct($nameInput) {
                $this->name=$nameInput;
        	}
		
		# Getter dari nama astronot
		# @return nama astronot - String
		public function get_Name(){
			return $this->name;
		}
		
		# Getter dari posisi X Astronot
		# @return posisi sumbu X kartesian astronot - int
		public function get_X_As(){
			return $this->x;	
		}
		
		# Getter dari posisi Y Astronot
		# @return posisi sumbu Y kartesian astronot - int
		public function get_Y_As(){
			return $this->y;
		}
		
		# Getter dari posisi astronot (pemain) pada board Interstellar
		# @return posisi astronot pada board - int
		public function get_Locate_As(){
			return $this->locate+1;
		}
		
		public function is_Win_As() {
        		return $this->isWin;
		}

		public function set_Name($name){
			$this->name = $name;
		}

		public function set_X_As($xInput){
			$this->x = $xInput;
		}

		public function set_Y_As($yInput){
			$this->y = $yInput;
		}

		public function set_Locate_As(){
			if ($this->y % 2 == 0) {
				//System.out.println("ini");
				$this->locate = (9 - $this->y) * 10 + (9 - $this->x);

			} else {
				//System.out.println("itu"+$this->x+" "+$this->y);
				$this->locate = (9 - $this->y) * 10 + $this->x;
			}

		}
		
		public function set_Win_As($isWin){
			$this->isWin = $isWin;
		}
		
		public function move() {
			//saat x=9 maka y mines 1
			if ($this->get_Y_As() % 2 != 0) {
				if ($this->get_X_As() < 9) {
					$this->set_X_As($this->x + 1);
					//this.setLocateAs(locate+1);
				} else {

					$this->set_Y_As($this->y - 1);
					//this.setLocateAs(locate+1);
				}
			} else {
				if ($this->get_X_As() > 0) {
					$this->set_X_As($this->x - 1);
					//this.setLocateAs(locate+1);
				} else {
					$this->set_Y_As($this->y - 1);
					//this.setLocateAs(locate+1);
				}
			}
        }
		
		public function move_Backward($dadu){
			$this->set_X_As($dadu-$this->x);
		}
		
		public function is_Win() {
			if ($this->get_Locate_As() == 100) {
				return true;
			} else {
				return false;
			}
		}
		//DONE
	}
?>
