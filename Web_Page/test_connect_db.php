<?php
		function connectDataBase()
		{
			if (!($lotura=mysqli_connect("localhost","root","")))
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
