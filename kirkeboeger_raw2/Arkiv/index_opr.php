<!DOCTYPE html>

<html lang="en">
<head>

 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8" lang="da" >
      <title>raw</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 



<!-- Search styles -->
<link rel="stylesheet" type="text/css" href="style.css"/>
<style>

input[type=search] {    
    color: #9F5584;

}

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
   
    border: 1px  #f6f6f6;
    border-style: none;
    border-collapse: collapse;
    padding-top:10px;
    padding-left:20px;
    color:black;
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
input[type=search] {    
    color: #9F5584;
}

</style>
<!-- End of search styles -->


</head>


<body>
   <!-- Søge felt til sogne -->
    <div class="flex-container" style="width:site-width; background-color:#f6f6f6;">
    <div class="flex-item"><form action="" form title="Skriv evt. bare en del af sognets navn hvis du søger et sogn. Hvis du søger et Amt eller et Herred skal du skrive HELE Amtets eller Herredets navn" style= "padding-top:10px; padding-bottom:10px; margin-left:20px;width:375px;" method="POST" >
    <input type="search" style=" font-family: arial; font-size: 12px; font-weight: lighter; height:25px; width: 200px; text-align:left; color: #9F5584; border: 1px solid #666666; border-radius:2px;" placeholder="Søg Sogn, Herred eller Amt" name="query"  />
    <input type="submit" submit title="Klik her, eller tast Enter, for at aktivere søgningen." style="margin-left:5px;padding-right:10px;height:25px;font-family:arial; font-size: 12px; text-align:left; background-color:#cccccc; border: 2px solid #grey;border-radius:2px; color:black; background-color:#cccccc; box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);" value="Søg"/>

    <input type="submit" style="margin-left:5px;height:25px;font-family:arial; font-size: 12px; text-align:left; background-color:#cccccc; border: 2px solid grey;border-radius:2px; color:black; background-color:#cccccc; box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);;" value="Nulstil"/>
</form>  
</div>  




<!-- Search code starts here -->
<?php
    if ((isset($_POST['query'])) && (trim($_POST['query'])!="")) {
    $con=mysqli_connect("mysql31.unoeuro.com", "genealogisk_dk1", "AevleBaevle194287Bum", "genealogiskforum_dk_db9") or die("Error connecting to database: ".mysql_error());
    /*
        first is location of the mysql server, usually localhost
        second - your username
        third is your password
         
        if connection fails it will stop loading the page and display an error
    */     
    mysqli_select_db($con,"genealogiskforum_dk_db9");
    /* the name of database we'are working in */
    mysqli_set_charset($con,"utf8");
    // This is an example of config.php
?> 


</div>    
<div class="flex-container" style="width:site-width; background-color:white;">
<div class="flex-item" style="margin-top:10px; float:left; margin-left:20px;width: site-width; overflow:auto;">

<?php
    $query = trim($_POST['query']); 
    //print "query=".$query;
    // gets value sent over search form    

    $min_length = 2;
    // you can set minimum length of the query if you want

    if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then

        $query = htmlspecialchars($query,ENT_QUOTES,"utf-8"); 
        // changes characters used in html to their equivalents, for example: < to &gt;     

        $query = mysqli_real_escape_string($con, $query);
        // makes sure nobody uses SQL injection

        $raw_results = mysqli_query($con, "SELECT * FROM kirkebogssogne
            WHERE (`Sogn` LIKE '%".$query."%') OR (`Amt`='$query') OR (`Herred`='$query') OR (`Staden`='$query') ORDER BY Amt ASC, Sogn ASC") or die(mysql_error());

        // * means that it selects all fields, you can also write: `id`, `title`, `text`
        // articles is the name of our table         
        // '%$query%' is what we're looking for, % means anything, for example if $query is Hello
        // it will match "hello", "Hello man", "gogohello", if you want exact match use `title`='$query'
        // or if you want to match just full word so "gogohello" is out use '% $query %' ...OR ... '$query %' ... OR ... '% $query'

        if(mysqli_num_rows($raw_results) > 0){ // if one or more rows are returned do following            
            //while($results = mysql_fetch_array($raw_results)){
            // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop



             echo "<table><tr><th>Sogn</th> <th>Kirkebog</th> <th>Herred</th> <th>Amt</th> </tr>  " .$results['Sogn'];
              //Vis tabel med overskrifter
 
            while($row = $result=mysqli_fetch_array($raw_results)) {
           

            echo "<tr><td>" . $row["Sogn"]. "</td><td>";


            if ($row["URL"]=="")
            echo  $row["Kirkebog"]."<td>". $row["Herred"]. "<td>" . $row["Amt"]. $row["Info"]."<td>";  
  
            else
            echo "<a href=\"".$row["URL"]."\"target=\"_blank\">" . $row["Kirkebog"]."<td>" .  $row["Herred"]. "<td>" . $row["Amt"]. "<td>"."<a href=\"".$row["Infourl"]."\"target=\"_blank\">" .$row["Info"]. "<td>". "</a>"; 

            echo "</td></tr>";

            //echo "<tr><td>" . $row["Sogn"]. "</td><td><a href=\"".$row["URL"]."\"target=\"_blank\">" . $row["Kirkebog"]."<td>" . $row["Herred"]. "<td>" . $row["Amt"].  "</a></td></tr>";
            //echo "<tr><td>" . $row["sogne_id"]. "</td><td><a href=\"https://www.google.com\">" . $row["Sogn"]. " " . "</a></td></tr>";
    }
             echo "</table>"; 
             //viser resultaterne i en tabel

                //echo "<p1>".$results['Sogn']."</p>";
                // viser resultaterne i en simpel textliste, you can also show id ($results['id'])

                //echo "<li>".$results['Sogn']."</li>";
                //echo "<li>";
                // viser resultaterne i en liste             

        }else{ // if there is no matching rows do following

            echo "No results";
        }         
    }else{ // if query length is less than minimum

        echo "Minimum length is ".$min_length;
    }
mysqli_close($con);
}
?>


   

</div> 

<div class="flex-item">
<img src="Praest der laeser.png" alt="Slægtsforskeren" style="width: 200px; height: 150px; margin-left:800px;">
</div>



<!-- End of search code -->



</body>






</html>

