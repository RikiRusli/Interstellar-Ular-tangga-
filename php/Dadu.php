<?php
	
	# Tugas Besar ADBO (Interstellar) - Space Snake&Ladder
	# Dosen Pembimbing : Pascal Alfadian
	
	# @author Ivan TW - 2014730026 || Riki Rusli (Ketua) - 2014730032 || Daniel Ferdinan - 2014730038
	# Kelas yang merepresentasikan dadu pada permainan Interstellar.
	
	class Dadu{
		
		public $max_Value;
		
		# Konstruktor untuk men-generate dadu dengan nilai mata dadu maksimum sesuai parameter
		# @param maxV masukan nilai mata dadu maksimum - int
		public function __construct($maxValueInput){
			$this->max_Value=$maxValueInput;
		}
		
		# Getter nilai mata dadu maksimum
		# @return nilai mata dadu maksimum - int
		public function get_Max_Value(){
			return $this->max_Value;
		}
		
		# Setter nilai mata dadu maksimum
		# @param maxValue masukan nilai mata dadu maksimum - int
		public function set_MaxValue($xInput){
			$this->max_Value=$xInput;
		}
		
		# Method untuk mengocok dadu dan mendapatkan nilai nya
		# @return nilai mata dadu yang didapat (menggunakan random) - int
		public function roll(){
			return $x=rand(1,$this->get_Max_Value());
		}
	}
?>
