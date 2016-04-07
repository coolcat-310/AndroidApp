<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset = utf-8">
   <title>Upload</title>
   <style type="text/css">
     h1
     {
      display:inline-block;
      padding: 20px 20px;
      background-color:#009933;
      border-radius: 25px;
      margin:0;
      color:white;
      text-align:center;
     }
     .tab { text-indent: 40px; }


      body{
      background-image:url("background.jpg");
      }
   </style>
   </head>
   <body>
      <?php
        if(isset($_GET['submit']))
        {
        // Putting data from form into variables to be manipulated
        $quote = $_GET['read'];
        $conn = mysql_connect('localhost', 'coolcat', 'toma456');
        if (!$conn)
        {
            die('Could not connect: ' . mysql_error());
        }
        
        mysql_select_db("juan",$conn);
        
        // Getting the form variables and then placing their values into the MySQL table
        mysql_query("INSERT INTO jtable (text) VALUES ('".$quote."')");
        }
    ?>

      <h1> The reading material is:</h1>
      <table style="text-align:center;" border = "1";border-width:5px; border-style:double;>
         <thead>
            <tr>
               <th><font face="Comic Sans MS"><?php echo $_GET["read"];?></font></th>
            </tr>
        </thead>
        <tbody>
            <tr>
               <th>
                  <p><font face="Comic Sans MS">book id</font></p>
                  <p><font face="Comic Sans MS">teacher id</font></p>
               </th>
            </tr>
         </tbody>
      </table>

   </body>
</html>