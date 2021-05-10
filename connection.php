    <!-- Required meta tags-->
    <!-- Developed by Gad IRADUFASHA & Aimee -->
    <!-- At https://www.donnekt.com -->
    <!-- Github: https://github.com/Gadrawingz -->

<?php

class DatabaseConn {
	public $host="localhost";
	protected $database= "innovation_hub";
	private   $user="root";
	private   $pass="";
	public    $conn;

	public function connection() {

		try {
			$dsn = "mysql:host=$this->host; dbname=$this->database";
			$this->conn = new PDO($dsn, $this->user, $this->pass);
			return $this->conn;
		} catch(PDOException $error) {
			echo "ERROR OCCURED ".$error->getMessage();
		}
	}
}
?>