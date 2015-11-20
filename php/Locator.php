<?php
	class Locator {

		private $x;
		private $y;
		//private Locator lOut;

		private $xOut;
		private $yOut;

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

		public function get_X_Lc() {
			return $this->x;
		}

		public function get_Y_Lc() {
			return $this->y;
		}

		public function get_X_Out_Lc() {
			return $this->xOut;
		}

		public function get_Y_Out_Lc() {
			return $this->yOut;
		}

		public function set_X_Lc($xInput) {
			$this->x = $xInput;
		}

		public function set_Y_Lc($yInput) {
			$this->y = $yInput;
		}

		public function set_X_Out_Lc($xOutInput) {
			$this->xOut = $xOutInput;
		}

		public function set_Y_Out_Lc($yOutInput) {
			$this->yOut = $yOutInput;
		}

		/*
		 public void setlOut(Locator lOut) {
		 $this->lOut = lOut;
		 }
		 */
		public function relocate($asInput) {
			//merubah posisi astronot
			$asInput->setXAs($this->getXOutLc());
			$asInput->setYAs($this->getYOutLc());
		}
	}
?>
