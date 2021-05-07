<?php
	function ConnectDataBase(){
		$servername = "localhost";
		$username = "root";
		$password = "dam1";

		if (!($lotura=mysqli_connect($servername,$username,$password)))
			{
			echo "There is an error connecting the server.";
			exit();
			}
			if (!mysqli_select_db($lotura,"erlete_db"))
			{
			echo "There is an error selecting the DB.";
			exit();
            }
            
			return $lotura;
	}

	
?>
