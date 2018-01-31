<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html lang="da-DK">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<head>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8" lang="da" >
      <title>Blågård kontraministerialbøger</title>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8; lang="da" /> 




<!-- Search styles -->
<link rel="stylesheet" type="text/css" href="style.css"/>
<style>
table, th {
   
    border-bottom: 1px  #666666;
    border-top: 0px;
    border-right: 0px;
    border-left: 0px;
    border-style: solid;
    border-collapse: collapse;
    padding-top:10px;
    padding-left:20px;
    color:black;
    font-family: Serif;
    font-size: 20px;
    font-weight: bold;
    text-align: left;


    
}

table, td {
   
    
    border-style: 1 px solid;
    border-collapse: collapse;
    padding-top:10px;
    padding-left:20px;
    color:#666666;
    font-family: arial;
    font-size: 14px;
    font-weight: normal;
    text-align: left;


    
}

a:link {
    color: black;
    text-decoration: underline;
}
a:visited {
    color: #e08a94;
    text-decoration: underline;
}
a:hover {
    color: cornflowerblue;
    text-decoration: underline;
    font-weight:normal;
}
a:active {
    color: black;
    text-decoration: underline;
}
</style>
<!-- End of search styles -->


</head>


<body>
  




<!-- Search code starts here -->
<?php
    
    $con=mysqli_connect("mysql31.unoeuro.com", "genealogisk_dk1", "AevleBaevle194287Bum", "genealogiskforum_dk_db9") or die("Error connecting to database: ".mysql_error());
    
    mysqli_select_db($con,"genealogiskforum_dk_db9");
   
    mysqli_set_charset($con,"utf8");
   
?> 


   
<div class="flex-container" style="width:site-width; background-color:white;">
<div class="flex-item" style="margin-top:10px; float:left; margin-left:20px;width: site-width; overflow:auto;">

<?php

$sql = "SELECT Sogn, Kirkebog, Herred, Amt, URL FROM kbh_kontra WHERE `Sogn` = 'Blågård' ";

$result = $con->query($sql);

if ($result->num_rows > 0) {
    
    


             echo "<table><tr><th>Sogn</th> <th>Kirkebog</th> <th>Herred</th> <th>Amt</th> </tr>  ";
              
 
            while($row = $result->fetch_assoc()) {
           

            echo "<tr><td>" . $row["Sogn"]. "</td><td>";


            
            echo "<a href=\"".$row["URL"]."\"target=\"_blank\">" . $row["Kirkebog"]."<td>" .  $row["Herred"]. "<td>" . $row["Amt"]. $row["Info"]. "<td>". "</a>"; 

            echo "</td></tr>";

            
    }
             echo "</table>"; 
                        

        }else{ 

            echo "No results";
        }         
    
mysqli_close($con);

?>


   
</div> 
</div> 





<!-- End of search code -->



</body>






</html>

