<?php

class Database{
	public $con;
	public function __construct(){
		$this->con = mysqli_connect("127.0.0.1","root","","medical_crud");
		if($this->con){
			
		}else{
			echo "Not Connected";
		}
	}
}


?>