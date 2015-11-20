<?php
	# Tugas Besar ADBO (Interstellar) - Space Snake&Ladder
	# Dosen Pembimbing : Pascal Alfadian
	
	# @author Ivan TW - 2014730026 || Riki Rusli (Ketua) - 2014730032 || Daniel Ferdinan - 2014730038
	# Kelas yang menjadi engine dari fungsi blackhole dan warp-gate pada permainan Interstellar.
	
	class Locator {
		
		private $x;
		private $y;
		//private Locator lOut;

		private $xOut;
		private $yOut;
		
		# Method untuk melakukan fungsi memindahkan astronot (pemain) dalam permainan Interstellar
		# @param x posisi X awal dari astronot
		# @param y posisi Y awal dari astronot
		# @param xOut posisi X tujuan dari astronot
		# @param yOut posisi Y tujuan dari astronot
		public function __construct($x, $y, $xOut, $yOut) {
			$this->x = $x;
			$this->y = $y;
			$this->xOut = $xOut;
			$this->yOut = $yOut;
			//$this->lOut=out;
		}
		/*
		 public Locator getlOut() {
		 return lOut;
		 }
		 */
		
		# Getter posisi X kartesian dari locator awal
		# @return posisi X kartersian dari locator awal
		public function get_X_Lc() {
			return $this->x;
		}
		
		# Getter posisi Y kartesian dari locator awal
		# @return posisi Y kartersian dari locator awal
		public function get_Y_Lc() {
			return $this->y;
		}

		# Getter posisi X kartesian dari locator tujuan
		# @return posisi X kartersian dari locator tujuan - int
		public function get_X_Out_Lc() {
			return $this->xOut;
		}

		# Getter posisi Y kartesian dari locator tujuan
		# @return posisi Y kartersian dari locator tujuan - int
		public function get_Y_Out_Lc() {
			return $this->yOut;
		}

		# Setter untuk posisi X kartersian locator awal
		# @param x masukan posisi X kartesian locator awal - int
		public function set_X_Lc($xInput) {
			$this->x = $xInput;
		}

		# Setter untuk posisi Y kartersian locator awal
		# @param y masukan posisi Y kartesian locator awal - int
		public function set_Y_Lc($yInput) {
			$this->y = $yInput;
		}

		# Setter untuk posisi X kartersian locator tujuan
		# @param xOut masukan posisi X kartesian locator tujuan - int
		public function set_X_Out_Lc($xOutInput) {
			$this->xOut = $xOutInput;
		}

		# Setter untuk posisi Y kartersian locator tujuan
		# @param yOut masukan posisi Y kartesian locator tujuan - int
		public function set_Y_Out_Lc($yOutInput) {
			$this->yOut = $yOutInput;
		}

		/*
		 public void setlOut(Locator lOut) {
		 $this->lOut = lOut;
		 }
		 */
		 
		 # Method untuk mengubah lokasi Astronot (pemain) pada board permainan Interstellar
		 # @param as masukan objek astronot yang akan diubah lokasinya
		public function relocate($asInput) {
			//merubah posisi astronot
			$asInput->setXAs($this->getXOutLc());
			$asInput->setYAs($this->getYOutLc());
		}
	}
?>
