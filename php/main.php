<?php
	session_start();
	
	require "Astronot.php";
	
	require "Locator.php";
	
	require "BlackHole.php";
	
	require "SpaceWarpGate.php";
	
	require "Planet.php";
	
	require "Dadu.php";
	
	require "Board.php";
	
	require "InterStellarCompVsComp.php";
	
	require "InterstellarHumanVsComp.php";
	
	require "InterstellarHumanVsHuman.php";
	
	
	
	
	class Tester{
		public static function main(){
				/**
				* isset jika ada variabel true,, GET utk ngambil yang dari form 
				
				*/
				
				if(isset($_GET['halaman']) && $_GET['halaman']=='main'){
					session_destroy();
				}
				if(isset($_GET['type']) && $_GET['type']=='hvc'){
					$g1=new InterstellarHumanVsComp();
					$g1->play();
				}
				else if(isset($_GET['type']) && $_GET['type']=='hvh'){
					$g2=new InterstellarHumanVsHuman();
					$g2->play();
				}
				else if(isset($_GET['type'])&& $_GET['type']=='cvc'){
					$g3=new InterStellarCompVsComp();
					$g3->play();
				}
				
		}
		
	}
	Tester::main();
?>
