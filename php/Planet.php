<?php
	class Planet{
	  
	  private $x;
	  private $y;
	  
	  private $locate;
	  private $warp=null;
	  private $hole=null;
	  
	  public function __construct($xInput,$yInput,$locateInput){
		  $this->x=$xInput;
		  $this->y=$yInput;
		  $this->locate=$locateInput;
	  }
	  
	  public function set_X_Pl($xInput){
		  $this->x=$xInput;
	  }
	  
	  public function set_Y_Pl($yInput){
		  $this->y=$yInput;
	  }
	  
	  public function set_Locate_Pl($yInput,$xInput){
		  if($yInput%2!=0){
			  $this->locate=(9-$yInput)*10+$xInput;
		  }
		  else{
			  $this->locate=(9-$yInput)*10+(9-$xInput);
		  }
	  }
	  
	  public function set_Warp_Pl($warpIn){
		  $this->warp=$warpIn;
	  }
	  
	  public function set_Hole_Pl($bhIn){
		  $this->hole=$bhIn;
	  }
	  
	  public function get_X_Pl(){
		  return $this->x;
	  }
	  
	  public function get_Y_Pl(){
		  return $this->y;
	  }
	  
	  public function get_Locate_Pl(){
		  return $this->locate;
	  }
	  
	  public function get_Warp_Pl(){
		  return $this->warp;
	  }
	  
	  public function get_Hole_Pl(){
		  return $this->hole;
	  }
	  //DONE
  }
?>
