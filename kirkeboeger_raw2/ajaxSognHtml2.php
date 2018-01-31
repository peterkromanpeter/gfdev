

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
            WHERE (`Sogn` LIKE '".$query."%') ORDER BY Amt ASC, Sogn ASC ") or die(mysql_error());

      if(mysqli_num_rows($raw_results) > 0){ ?>


   <table id="tdata" class="dataTable">
      <thead>
         <tr>
            <th class="sorting" aria-controls="tdata">Sogn</th>
            <th class="sorting" aria-controls="tdata">Kirkebog</th>
            <th class="sorting" aria-controls="tdata">Herred</th>
            <th class="sorting" aria-controls="tdata">Amt</th>
             <th class="sorting" aria-controls="tdata"></th>
         </tr>
      </thead>


     <?php while($row = $result=mysqli_fetch_array($raw_results)): ?>


            

 
         <tr>
            <td><?php echo $row["Sogn"] ?></td>
            <td><?php echo "<a href=\"".$row["URL"]."\"target=\"_blank\">" . $row["Kirkebog"]?></td>
            <td><?php echo $row["Herred"] ?></td>
            <td><?php echo $row["Amt"] ?></td>
           <td><?php echo "<a href=\"".$row["Infourl"]."\"target=\"_blank\">" . $row["Info"]?></td>
         </tr>
       
      <?php endwhile; ?>
   </table>


<?php
        }else{ // if there is no matching rows do following

          echo "Ingen resultater for denne søgning";
        }         
    }else{ // if query length is less than minimum

      echo "Minimum antal tegn er ".$min_length;
    }

    mysqli_close($con);
  }
  ?>  