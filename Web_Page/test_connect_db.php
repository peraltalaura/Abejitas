<?php
//a php function to connect to the database
		function connectDataBase()
		{
			if (!($lotura=mysqli_connect("localhost","java","dam1")))
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
