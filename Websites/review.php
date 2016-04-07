<!-- Team 4 -->
<!-- ss12 -->

<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset = utf-8">
      <title>Review</title>
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
      .size{ width 100px, height 100px,background-size:200px}
	  
      body{
      background-image:url("background.jpg");
      }
      </style>
   </head>
   <body>
      <div id ="header" style="text-align:center;">
         <img src ="giphy.gif" alt = "READ" width ="120" height="120">
         <h1><caption><strong><mark><font color="Black"face="Comic Sans MS">Reading is Fun</mark> damental !</font></strong></caption></h1>
         <img src ="giphy.gif" alt = "READ" width ="120" height="120">
      </div>
   <?php
    $servername = "localhost";
    $username = "coolcat";
    $password = "toma456";
    $dbname = "juan";// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } $sql = "SELECT * FROM jtable";
    $result = $conn->query($sql);
    // output data of each row
    $data = $result->fetch_all(MYSQLI_ASSOC);
       foreach($data as $i=>$item)
       {
          
           $pieces = explode(" ",$item["text"]);
           foreach($pieces as $j => $word)
           {
                 if( $j < $item["atword"]||$j < 8)
                   echo "<mark>".$word." "."</mark>";
               else
                   echo $word." ";
           }
           echo "<p>"."Student ID: ".$item["id"]."\n"."</p>";
       }
       echo
         $data;
    ?>
   </body>
</html>