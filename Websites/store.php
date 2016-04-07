<?php 
	$index = $_GET["read"];
        $conn = mysql_connect('localhost', 'coolcat', 'toma456');
        if (!$conn)
        {
            die('Could not connect: ' . mysql_error());
        }
        mysql_select_db("juan",$conn);
        // Getting the form variables and then placing their values into the MySQL table
        mysql_query("INSERT INTO jtable (atword) VALUES ('".$index."')"); 
?>