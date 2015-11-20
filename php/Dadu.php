<?php
	class Dadu{
		
		public $max_Value;
		
		public function __construct($maxValueInput){
			$this->max_Value=$maxValueInput;
		}
		
		public function get_Max_Value(){
			return $this->max_Value;
		}
		
		public function set_MaxValue($xInput){
			$this->max_Value=$xInput;
		}
		
		public function roll(){
			return $x=rand(1,$this->get_Max_Value());
		}
		
	}
?>
