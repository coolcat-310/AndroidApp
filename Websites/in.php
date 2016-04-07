<!DOCTYPE html>
<html>

	<head>
		<meta charset = 'utf-8'>
		<title>Welcome</title>
	</head>

	<body>
	
	
	<?php
		if(isset($_POST['submit']))
			{
				// Putting data from form into variables to be manipulated
			$quote = $_POST['quote'];
			$conn = mysql_connect('localhost', 'coolcat', 'toma456');
				if (!$conn) 
					{
						die('Could not connect: ' . mysql_error());
					}
						
				mysql_select_db("testy",$conn);
                            
				// Getting the form variables and then placing their values into the MySQL table
				mysql_query("INSERT INTO tab (quote) VALUES ('".$quote."')");
			}	
	?>

			<form id="form1" method="post" action="in.php">
            <p>
                <label for="quote">Title:</label>
                <input name="quote" type="text" class="widebox" id="quote">
            </p>
         
            <p>
               <input type="submit" name="submit" value="Insert New Article" id="submit">
            </p>
        </form>
	</body>

</html>