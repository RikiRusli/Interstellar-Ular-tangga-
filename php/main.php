<?php
	# Tugas Besar ADBO (Interstellar) - Space Snake&Ladder
	# Dosen Pembimbing : Pascal Alfadian
	
	# @author Ivan TW - 2014730026 || Riki Rusli (Ketua) - 2014730032 || Daniel Ferdinan - 2014730038
	# Kelas Tester yang menjalankan semua kelas menjadi permainan Interstellar
	
	# memulai session
	session_start();
	
	# Copy-Paste kelas Astronot.php
	require "Astronot.php";
	
	# Copy-Paste kelas Locator.php
	require "Locator.php";
	
	# Copy-Paste kelas BlackHole.php
	require "BlackHole.php";
	
	# Copy-Paste kelas SpaceWarpGate.php
	require "SpaceWarpGate.php";
	
	# Copy-Paste kelas Planet.php
	require "Planet.php";
	
	# Copy-Paste kelas Dadu.php
	require "Dadu.php";
	
	# Copy-Paste kelas Board.php
	require "Board.php";
	
	# Copy-Paste kelas InterstellarCompVsComp.php
	require "InterStellarCompVsComp.php";
	
	# Copy-Paste kelas InterstellarHumanVsComp.php
	require "InterstellarHumanVsComp.php";
	
	# Copy-Paste kelas InterstellarHumanVsHuman.php
	require "InterstellarHumanVsHuman.php";
	
	class Tester{
		public static function main(){
				
				# isset jika ada variabel true,, GET utk ngambil yang dari form 
				
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
