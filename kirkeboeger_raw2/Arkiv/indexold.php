<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html lang="da-DK">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<head>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8" lang="da" >
      <title>Search</title>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8; lang="da" /> 

<style> 
.flex-container {
    display: -webkit-flex;
    display: flex;
     -webkit-flex-flow: row wrap;
    flex-flow: row wrap;   
    width: site-width;
    height: 60px;
    background-color: #666666;
    margin-bottom:20px
    border-bottom: 1px solid #f6f6f6;
    border-top: 1px solid #f6f6f6;
    margin-top: 0px;

    justify-content: left; 

}
.flex-item {
    background-color: #666666;

    height: 45px;
    
    color: #f6f6f6;
    margin-top: 10px;
}
</style>


<!-- Search styles -->
<link rel="stylesheet" type="text/css" href="style.css"/>
<style>
table, th {
   
    border-bottom: 1px  #f6f6f6;
    border-top: 0px;
    border-right: 0px;
    border-left: 0px;
    border-style: solid;
    border-collapse: collapse;
    padding-top:10px;
    padding-left:20px;
    color:white;
    font-family: Serif;
    font-size: 20px;
    font-weight: bold;
    text-align: center;


    
}

table, td {
   
    border: 1px  #f6f6f6;
    border-style: none;
    border-collapse: collapse;
    padding-top:10px;
    padding-left:20px;
    color:#f6f6f6;
    font-family: arial;
    font-size: 14px;
    font-weight: normal;
    text-align: center;


    
}

a:link {
    color: white;
    text-decoration: underline;
}
a:visited {
    color: white;
    text-decoration: underline;
}
a:hover {
    color: white;
    text-decoration: underline;
}
a:active {
    color: white;
    text-decoration: underline;
}
</style>
<!-- End of search styles -->


</head>


<body>

  <div class="flex-container">

   <!-- Søge felt til sogne -->



    <div class="flex-item"><form action="" style="margin-top:10px; margin-left:25px;" method="POST">
    <input type="text" style="height:25px;border: 2px solid #f6f6f6;border-radius:2px;color:#666666;" name="query" />
    <input type="submit" style="height:25px;font-family:arial; font-size: 12px; text-align:left; background-color:#cccccc; border: 2px solid #f6f6f6;border-radius:2px; color:#666666; background-color:#cccccc; " value="Søg Sogn"/>

    <input type="submit" style="height:25px;font-family:arial; font-size: 12px; text-align:left; background-color:#cccccc; border: 2px solid #f6f6f6;border-radius:2px; color:#666666; background-color:#cccccc; " value="Nulstil"/>
</form>  
</div>  




<!-- Search code starts here -->
<?php
    if ((isset($_POST['query'])) && (trim($_POST['query'])!="")) {
    $con=mysqli_connect("mysql31.unoeuro.com", "genealogisk_dk1", "JX1wt77k7m", "genealogiskforum_dk_db9") or die("Error connecting to database: ".mysql_error());
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
<div class="flex-container" style="height:700px;background-color:#666666;">
<div class="flex-item" style="margin-top:60px; float:left; margin-left:20px;height: 600px; overflow:auto;">

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

        $raw_results = mysqli_query($con, "SELECT * FROM sogne
            WHERE (`Sogn` LIKE '%".$query."%')") or die(mysql_error());
        // * means that it selects all fields, you can also write: `id`, `title`, `text`
        // articles is the name of our table         
        // '%$query%' is what we're looking for, % means anything, for example if $query is Hello
        // it will match "hello", "Hello man", "gogohello", if you want exact match use `title`='$query'
        // or if you want to match just full word so "gogohello" is out use '% $query %' ...OR ... '$query %' ... OR ... '% $query'

        if(mysqli_num_rows($raw_results) > 0){ // if one or more rows are returned do following            
            //while($results = mysql_fetch_array($raw_results)){
            // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop



             echo "<table><tr><th>Amt</th> <th>Sogn</th> <th>URL</th></tr>" .$results['Sogn'];
              //Vis tabel med overskrifter
 
            while($row = $result=mysqli_fetch_array($raw_results)) {
            //echo '<a href="https://genealogiskforum.dk".$results[Sogn].</a>';
            echo "<tr><td>" . $row["Amt"]. "</td><td>" . $row["Sogn"]. "</td><td>" . $row["URL"]. "</td></tr>";
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
</div> 
<!-- End of search code -->



</body>






</html>

