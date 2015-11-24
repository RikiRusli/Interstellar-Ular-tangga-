<?php
	# Tugas Besar ADBO (Interstellar) - Space Snake&Ladder
	# Dosen Pembimbing : Pascal Alfadian
	
	# @author Ivan TW - 2014730026 || Riki Rusli (Ketua) - 2014730032 || Daniel Ferdinan - 2014730038
	# Kelas yang menjadi engine permainan Interstellar dalam mode Manusia melawan Manusia.
	
	class InterstellarHumanVsHuman{
		
		private $random;
		private $numBH;
		private $numWG;
		private $board;
		private $giliran;
		
		private $xin=0;
		private $xout=0;
		private $yin=0;
		private $yout=0;
		
		public function __construct(){
			if(isset($_SESSION['board'])&&isset($_SESSION['giliran'])){
				//unserialize;
				$this->board=unserialize($_SESSION['board']);
				$this->giliran=$_SESSION['giliran'];
			}
			else{
				$this->numBH=rand(2,4);
				if($this->numBH%2==1){
					$this->numBH++;
				}
				$this->numWG=rand(2,4);
				if($this->numWG%2==1){
					$this->numWG++;
				}
				$this->board=new Board(6,4,4,2);
				$this->make_All_As();
				$this->make_All_BH();
				$this->make_All_WG();
				$this->giliran=0;
			}
		}
		
		# Setter posisi X kartesian awal (untuk menentukan posisi masuk blackhole/warp-gate)
		# @param isGanjil masukan untuk menentukan kotak ganjil/genap yang akan ditempati
		# 0 untuk kotak ganjil | 1 untuk kotak genap
		public function set_X_In($isGanjil){
			$x=rand(2,4)+1;
			$x+=$isGanjil;
			if($x%2==0){
				$x++;
			}
			$this->xin=$x;
		}
		
		# Setter posisi X kartesian awal (untuk menentukan posisi keluar blackhole/warp-gate)
		# @param isGanjil masukan untuk menentukan kotak ganjil/genap yang akan ditempati
		# 0 untuk kotak ganjil | 1 untuk kotak genap
		public function set_X_Out($isGanjil){
			$x=rand(2,4)+1;
			$x+=$isGanjil;
			if($x%2==0){
				$x++;
			}
			$this->xout=$x;
		}
		
		# Setter posisi Y kartesian awal (untuk menentukan posisi masuk blackhole/warp-gate)
		# @param isGanjil masukan untuk menentukan kotak ganjil/genap yang akan ditempati
		# 0 untuk kotak ganjil | 1 untuk kotak genap
		public function set_Y_In($isGanjil){
			$x=rand(2,4)+1;
			$x+=$isGanjil;
			if($x%2==0){
				$x++;
			}
			$this->yout=$x;
		}
		
		# Setter posisi Y kartesian awal (untuk menentukan posisi keluar blackhole/warp-gate)
		# @param isGanjil masukan untuk menentukan kotak ganjil/genap yang akan ditempati
		# 0 untuk kotak ganjil | 1 untuk kotak genap
		public function set_Y_Out($isGanjil){
			$x=rand(2,4)+1;
			$x+=$isGanjil;
			if($x%2==0){
				$x++;
			}
			$this->yout=$x;
		}
		
		# Method untuk men-generate blackhole pada board permainan Interstellar
		public function make_All_BH(){
			for($i=0;$i<$this->numBH;$i++){
				$this->set_X_In(1);
				$this->set_Y_In(1);
				$this->set_X_Out(1);
				$this->set_Y_Out(1);
				$b1=new BlackHole($this->xin,$this->yin,$this->xout,$this->yout);
				$b2=new BlackHole($this->xin,$this->yin,$this->xout,$this->yout);
				$this->board->get_Planet($this->yin,$this->xin)->set_Hole_Pl($b1);
				$this->board->get_Planet($this->yout,$this->xout)->set_Hole_Pl($b2);
				$this->board->add_Black_Hole($i,$b1);	
				$this->board->add_Black_Hole($i,$b2);
			}
		}
		
		# Method untuk men-generate warp-gate pada board permainan Interstellar
		public function make_All_WG(){
			for($i=0;$i<$this->numWG;$i++){
				$this->set_X_In(0);
				$this->set_Y_In(0);
				$this->set_X_Out(0);
				$this->set_Y_Out(0);
				$w1=new SpaceWarpGate($this->xin,$this->yin,$this->xout,$this->yout);
				$w2=new SpaceWarpGate($this->xin,$this->yin,$this->xout,$this->yout);
				$this->board->get_Planet($this->yin,$this->xin)->set_Warp_Pl($w1);
				$this->board->get_Planet($this->yout,$this->xout)->set_Warp_Pl($w2);
				$this->board->add_Warper($i,$w1);	
				$this->board->add_Warper($i,$w2);
			}
		}
		
		# Method untuk men-generate astronot (pemain) pada board permainan Interstellar
		public function make_All_As(){
			for($i=0;$i<2;$i++){
				$i++;
				$as=new Astronot("astronot ".$i);
				$i--;
				$this->board->add_Astronot($i,$as);
			}
		}
		
		# Method untuk menentukan akhir dari permainan (sudah/belum)
		# @param as masukan objek astronot (pemain)
		# @param endPoint masukan titik akhir dari permainan
		# @return status permainan apakah sudah berhenti/belum - boolean
		public function end_Game($as,$endPoint){
			if($as->get_Locate_As()==$endPoint){
				return true;
			}
			else{
				return false;
			}
		}
		
		# Method untuk men-generate board permainan Interstellar yang akan ditampilkan ke konsol
		public function print_Board(){
			for($i=0;$i<10;$i++){
				for($j=0;$j<10;$j++){
					if($this->board->get_Planet($i,$j)->get_Warp_Pl()!=null){
						echo "[ ω ] ";
					}
					else if($this->board->get_Planet($i,$j)->get_Hole_Pl()!=null){
						echo "[ β ] ";
					}
					else if($this->board->get_As_At(0)->get_Locate_As()==$this->board->get_Planet($i,$j)->get_Locate_Pl()){
						echo "[ X ] ";
					}
					else if($this->board->get_As_At(1)->get_Locate_As()==$this->board->get_Planet($i,$j)->get_Locate_Pl()){
						echo "[ Y ] ";
					}
					else{
						# echo "[ Φ ] ";
						echo "[ ... ] ";
					}
				}
				echo "<br>";
					for ($k = 0; $k < 10; $k++) {
					if ($i % 2 == 0) {
						$indexGenap = ((9 - $i) * 10) + ((9 - $k) + 1);
						echo "  |" . " $indexGenap  " ."  | ";
					} else {
						$indexGanjil = ((9 - $i) * 10) + ($k + 1);
						if ($indexGanjil < 10) {
							echo "  |0" . " $indexGanjil  " . "  | ";
						} else {
							echo "  |" . " $indexGanjil  " . "  | ";
						}
					}
				}
				echo "<br>";
			}
		}

		# Method untuk menjalankan permainan Manusia melawan Manusia.
		public function play(){		
			$dadu_Main=0;
			
			echo "roll or exit? exit pls close the browser tab"."<br>";
			//insert something here!!!!!
			if(isset($_GET['input'])){
				$code=$_GET['input'];
				$code = true;
				if($code==false){
					break;
				}
				else{
					$dadu_Main=$this->board->roll_The_Dice();
					echo $this->board->get_As_At($this->giliran)->get_Name()." mendapat dadu:".$dadu_Main."<br>";
				}	
				
				if($this->board->get_As_At($this->giliran)->get_Locate_As()+$dadu_Main>100){
					$this->board->get_As_At($this->giliran)->move_Backward($dadu_Main);
					$this->board->get_As_At($this->giliran)->set_Locate_As();
				}
				else{
					for($i=0;$i<$dadu_Main;$i++){
						$this->board->get_As_At($this->giliran)->move();
						$this->board->get_As_At($this->giliran)->set_Locate_As();
					}
				}
				
				if($dadu_Main==6){
					echo "Lucky 6!!"."<br>";
					$dadu_Main=$this->board->roll_The_Dice();
					echo "mendapat dadu:".$dadu_Main."<br>";
					if($this->board->get_As_At($this->giliran)->get_Locate_As()+$dadu_Main>100){
						$this->board->get_As_At($this->giliran)->move_Backward($dadu_Main);
						$this->board->get_As_At($this->giliran)->set_Locate_As();
					}
					else{
						for($i=0;$i<$dadu_Main;$i++){
							$this->board->get_As_At($this->giliran)->move();
							$this->board->get_As_At($this->giliran)->set_Locate_As();
						}
					}
				}
				
				if ($this->board->get_Planet($this->board->get_As_At($this->giliran)->get_Y_As(), $this->board->get_As_At($this->giliran)->get_X_As())->get_Hole_Pl()!=null) {
					//kalo nginjek blackhole ubah posisi player ke xout yout
					echo $this->board->get_As_At($this->giliran)->get_Name()."kena blackhole"."<br>";
					$xawal = $this->board->get_As_At($this->giliran)->get_X_As();
					$yawal = $this->board->get_As_At($this->giliran)->get_Y_As();
					//simpen dulu posisi nya di variabel agar tidak terlalu rujid
					$xout = $this->board->get_Planet($yawal, $xawal)->get_Hole_Pl()->get_x_Out_Lc();
					$yout = $this->board->get_Planet($yawal, $xawal)->get_Hole_Pl()->get_y_Out_Lc();
					//ubah posisi player
					$this->board->get_As_At($this->giliran)->set_X_As($xout);
					$this->board->get_As_At($this->giliran)->set_Y_As($yout);
					//update locate player
					//board.getPlanet(board.getAsAt(0).getYAs(), board.getAsAt(0).getXAs()).setLocatePl(board.getAsAt(0).getYAs(), board.getAsAt(0).getXAs());
					$this->board->get_As_At($this->giliran)->set_Locate_As();
				}
				
				if ($this->board->get_Planet($this->board->get_As_At($this->giliran)->get_Y_As(), $this->board->get_As_At($this->giliran)->get_X_As())->get_Warp_Pl()!=null) {
					//kalo nginjek warp ubah posisi player ke xout yout
					echo $this->board->get_As_At($this->giliran)->get_Name()."kena warp"."<br>";
					$xawal = $this->board->get_As_At($this->giliran)->get_X_As();
					$yawal = $this->board->get_As_At($this->giliran)->get_Y_As();
					//simpen dulu posisi nya di variabel agar tidak terlalu rujid
					$xout = $this->board->get_Planet($yawal, $xawal)->get_Warp_Pl()->get_x_Out_Lc();
					$yout = $this->board->get_Planet($yawal, $xawal)->get_Warp_Pl()->get_y_Out_Lc();
					//ubah posisi player
					$this->board->get_As_At($this->giliran)->set_X_As($xout);
					$this->board->get_As_At($this->giliran)->set_Y_As($yout);
					//update locate player
					//board.getPlanet(board.getAsAt(0).getYAs(), board.getAsAt(0).getXAs()).setLocatePl(board.getAsAt(0).getYAs(), board.getAsAt(0).getXAs());
					$this->board->get_As_At($this->giliran)->set_Locate_As();
				}
				
				//kalo nginjek lawan
				if ($this->giliran == 0) {
					if ($this->board->get_As_At($this->giliran)->get_Locate_As() == $this->board->get_As_At($this->giliran + 1)->get_Locate_As()) {
						$this->board->get_As_At(1)->set_X_As(0);
						$this->board->get_As_At(1)->set_Y_As(9);
						$this->board->get_As_At(1)->set_Locate_As();
						echo "mampus keinjek!!!"."<br>";
					}
				}
				if ($this->giliran == 1) {
					if ($this->board->get_As_At($this->giliran)->get_Locate_As() == $this->board->get_As_At(0)->get_Locate_As())  {
						$this->board->get_As_At(0)->set_X_As(0);
						$this->board->get_As_At(0)->set_Y_As(9);
						$this->board->get_As_At(0)->set_Locate_As();
						echo "mampus keinjek!!!"."<br>";
					}
				}
				
				if($this->board->get_As_At(0)->get_Locate_As()+1==101){
					echo "<br>";
					echo $this->board->get_As_At(0)->get_Name()." pada posisi:".($this->board->get_As_At(0)->get_Locate_As());
					echo " ___ ";
					echo $this->board->get_As_At(1)->get_Name()." pada posisi:".($this->board->get_As_At(1)->get_Locate_As());
					echo "<br>";
				}
				else if($this->board->get_As_At(1)->get_Locate_As()+1==101){
					echo "<br>";
					echo $this->board->get_As_At(0)->get_Name()." pada posisi:".($this->board->get_As_At(0)->get_Locate_As());
					echo " ___ ";
					echo $this->board->get_As_At(1)->get_Name()." pada posisi:".($this->board->get_As_At(1)->get_Locate_As());
					echo "<br>";
				}
				else{
					echo "<br>";
					echo $this->board->get_As_At(0)->get_Name()." pada posisi:".($this->board->get_As_At(0)->get_Locate_As());
					echo " ___ ";
					echo $this->board->get_As_At(1)->get_Name()." pada posisi:".($this->board->get_As_At(1)->get_Locate_As());
					echo "<br>";
				}
				$this->print_Board();
				echo "<br>";
				
				if ($this->end_Game($this->board->get_As_At($this->giliran), 100)) {
					$lanjut = false;
					if ($this->giliran == 0) {
						echo "Player 1 win";
						echo "<br>";
					} else {
						echo "Player 2 win";
						echo "<br>";
					}
				} else {
					$this->giliran++;
					if ($this->giliran ==2) {
						$this->giliran = 0;
					}
				}
				
				//komputer gerak
				//$this->komputer_Gerak();
				
				//serialize	
				$_SESSION['board']=serialize($this->board);
				$_SESSION['giliran']=$this->giliran;
			}
			//form input
				$forminput = '<br /><form method="get" action "TesterHumanVsComp.php">
						<input type="hidden" name="input" value="roll" />
						<input type="hidden" name="type" value="'.$_GET['type'].'" />
						<input type="hidden" name="halaman" value="board" />
						<input type="submit" value="Roll" />
					</form>
				';
				echo $forminput;
		}
	}
?>
