<?php
	# Tugas Besar ADBO (Interstellar) - Space Snake&Ladder
	# Dosen Pembimbing : Pascal Alfadian
	
	# @author Ivan TW - 2014730026 || Riki Rusli (Ketua) - 2014730032 || Daniel Ferdinan - 2014730038
	# Kelas yang merepresentasikan warp-gate (tangga) pada permainan Interstellar.
	
	class SpaceWarpGate extends Locator{
		
		# Method untuk mengimplementasikan fungsi dari warp-gate (tangga)
		# Yaitu memindahkan astronot (pemain) ke kotak yang lebih besar angkanya pada board secara random
		# @param x posisi X awal dari astronot
		# @param y posisi Y awal dari astronot
		# @param xOut posisi X tujuan dari astronot
		# @param yOut posisi Y tujuan dari astronot
		public function __construct($x,$y,$xOut,$yOut){
			parent::__construct($x,$y,$xOut,$yOut);
		}
	}
?>
