<?php
	# Tugas Besar ADBO (Interstellar) - Space Snake&Ladder
	# Dosen Pembimbing : Pascal Alfadian
	
	# @author Ivan TW - 2014730026 || Riki Rusli (Ketua) - 2014730032 || Daniel Ferdinan - 2014730038
	# Kelas yang merepresentasikan kotak (pada board) pada permainan Interstellar.
	
	class Planet{
	  
	  # Atribut posisi X dan Y kartesian untuk mengakses kotak permainan Interstellar
	  private $x;
	  private $y;
	  
	  private $locate;
	  private $warp=null;
	  private $hole=null;
	  
	  # Konstruktor untuk men-generate kotak-kotak permainan Interstellar
	  # @param x posisi X kartesian kotak
	  # @param y posisi Y kartesian kotak
	  # @param locate angka yang tertera pada kotak-kotak permainan (1-100)
	  public function __construct($xInput,$yInput,$locateInput){
		  $this->x=$xInput;
		  $this->y=$yInput;
		  $this->locate=$locateInput;
	  }
	  
	  # Setter posisi X kartesian planet (kotak)
	  # @param x masukan posisi X - int
	  public function set_X_Pl($xInput){
		  $this->x=$xInput;
	  }
	  
	  # Setter posisi Y kartesian planet (kotak)
	  # @param y masukan posisi Y - int
	  public function set_Y_Pl($yInput){
		  $this->y=$yInput;
	  }
	  
	  # Setter angka yang tertera pada kotak-kotak permainan (1-100)
	  # @param y masukan posisi Y - int
	  # @param x masukan posisi X - int
	  public function set_Locate_Pl($yInput,$xInput){
		  if($yInput%2!=0){
			  $this->locate=(9-$yInput)*10+($xInput+1);
		  }
		  else{
			  $this->locate=(9-$yInput)*10+(10-$xInput);
		  }
	  }
	  
	  # Setter untuk menempatkan/mengubah panet (kotak) menjadi warp-gate
	  # @param warpIn masukan objek SpaceWarpGate
	  public function set_Warp_Pl($warpIn){
		  $this->warp=$warpIn;
	  }
	  
	  # Setter untuk menempatkan/mengubah panet (kotak) menjadi blackhole
	  # @param holeIn masukan objek BlackHole
	  public function set_Hole_Pl($bhIn){
		  $this->hole=$bhIn;
	  }
	  
	  # Getter posisi X kartesian planet (kotak)
	  # @return posisi X planet - int
	  public function get_X_Pl(){
		  return $this->x;
	  }
	  
	  # Getter posisi Y kartesian planet (kotak)
	  # @return posisi Y planet - int
	  public function get_Y_Pl(){
		  return $this->y;
	  }
	  
	  # Getter angka yang tertera pada kotak-kotak permainan (1-100)
	  # @return angka kotak (planet) permainan - int
	  public function get_Locate_Pl(){
		  return $this->locate;
	  }
	  
	  # Getter untuk warp-gate yang menempati planet (kotak) permainan
	  # @return objek warp-gate pada kotak yang ditempati
	  public function get_Warp_Pl(){
		  return $this->warp;
	  }
	  
	  # Getter untuk blackhole yang menempati planet (kotak) permainan
	  # @return objek blackhole pada kotak yang ditempati
	  public function get_Hole_Pl(){
		  return $this->hole;
	  }
	  //DONE
  }
?>
