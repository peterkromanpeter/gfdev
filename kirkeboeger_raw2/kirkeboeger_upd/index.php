<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
//<!-- Check for user access requirements--> 
$groupswithaccess="ADMIN";
require_once("../../slpw/sitelokpw.php");
?>

<!DOCTYPE html>
<html lang="da">
<head>
  <!-- Check for title--> 
  <title>Stednavne</title>

  <meta charset="utf-8">
  <script type="text/javascript">
  var blabfolderpath="/slpw/plugin_blab/"
  </script>
  <link rel="stylesheet" type="text/css" href="/slpw/plugin_blab/blab.css">
  <script type="text/javascript" src="/slpw/plugin_blab/sarissa.js"></script>
  <script type="text/javascript" src="/slpw/plugin_blab/blab.js"></script>
  <link rel="stylesheet" type="text/css" href="/slpw/plugin_blab/blab.css">
  <script type="text/javascript">
  var memberprofilepage=1
  </script>
  <?php
  if (function_exists('startwhoisonline'))
    startwhoisonline('profileimage,name');
  ?>


  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css" />

  <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>

  <script type="text/javascript" src="jquery.dataTables.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
        $('#tdata').dataTable( {
            "language": {
                "url": "dataTables.danish.lang"
            }
        } );
    } );
</script>



<style> 

.dataTables_filter { float:right; }
.dataTables_info { float: left; }



 .openseadragon1 {
  cursor:zoom-in;
}

body {
  background-image: url("baggrund5.jpg");
  background-repeat: no-repeat;
}


      /* Always set the map height explicitly to define the size of the div
      * element that contains the map. */
      #map {
        height: 500px;
        
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        width:100%;
        margin: 0;
        padding: 0;
      }
      #description {
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
      }

      #infowindow-content .title {
        font-weight: bold;
      }

      #infowindow-content {
        display: none;
      }

      #map #infowindow-content {
        display: inline;
      }

      .pac-card {
        margin: 10px 10px 0 0;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        background-color: #fff;
        font-family: Roboto;
      }

      #pac-container {
        padding-bottom: 12px;
        margin-right: 12px;
      }

      .pac-controls {
        display: inline-block;
        padding: 5px 11px;
      }

      .pac-controls label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }

      #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 400px;
      }

      #pac-input:focus {
        border-color: #4d90fe;
      }

      #title {
        color: #fff;
        background-color: #4d90fe;
        font-size: 25px;
        font-weight: 500;
        padding: 6px 12px;
      }
      /* nye her */


      /*nye slut her */
      /* unvisited link */
      a:link {
        color: ;
        text-decoration: underline;
      }

      /* visited link */
      a:visited {
        color: ;
      }

      /* mouse over link */
      a:hover {
        color: cornflowerblue;
      }

      /* selected link */
      a:active {
        color: ;

      }


      #tdata, th {
        border-bottom: 1px solid #666666;
        border-top: 0px;
        border-right: 0px;
        border-left: 0px;

        border-collapse: collapse;
        padding-top:10px;
        padding-left:20px;
        color:black;
        font-family: Serif;
        font-size: 16px;
        font-weight: bold;
        text-align: left;
      }

      #tdata, td {

        border-top: 1px solid #666666;
        border-bottom: 1px solid #666666;
        border-left: 1px solid #666666;
        border-right: 1px solid #666666;
        border-collapse: collapse;
        vertical-align: bottom;
        height: 10px;
        margin-bottom:0px;
        padding-bottom: 0px:;
        padding-top:0px;
        padding-left:20px;
        color:blue;
        font-family: Arial;
        font-size: 12px;
        font-weight: bold;
        text-align: left; 
        background-color: rgba(204, 255, 153, 0.3);

      }

      

      h3 {
        margin-top: 0px;
        padding-top:0px;
        margin-bottom: 0px;
        margin-right: 10px;
        margin-left: 0px;
        color: #9F5584;
        font-weight: normal;
        font-family: Arial ;
        font-size: 18px;
        text-align: center;

      }

      h4 {
        margin-top: 0px;
        padding-top:0px;
        margin-bottom: 0px;
        margin-right: 10px;
        margin-left: 0px;
        color: #f6f6f6;
        font-weight: normal;
        font-family: Robotto ;
        font-size: 18px;
        text-align: center;

      }


      h5 {
        margin-top: 0px;
        padding-top:0px;
        margin-bottom: 0px;
        margin-right: 0px;
        margin-left: 0px;
        color: #9F5584;
        font-weight: normal;
        font-family: Arial ;
        font-size: 15px;
        text-align: center;

      }

      h6 {
        margin-top: 0px;
        padding-top:0px;
        margin-bottom: 0px;
        margin-right: 10px;
        margin-left: 0px;
        color: #666666;
        font-weight: normal;
        font-family: Helvetica ;
        font-size: 14px;
        text-align: center;

      }


      input[type=text] {
        width: 100%;
        height: 30px;
        padding: 2px 20px;
        box-sizing: border-box;
        border: 2px solid #ccc;
        border-radius: 4px;
        background-color: #f8f8f8;
        font-family: arial;
        font-size: 12px;
        resize: none;
      }

      textarea {
        width: 100%;  
        padding: 12px 20px;
        box-sizing: border-box;
        border: 2px solid #ccc;
        border-radius: 4px;
        background-color: #f8f8f8;
        font-family: arial;
        font-size: 16px;
        resize: none;
      }

      .message {
        margin-top: 7px;
        font-family: arial;
        font-size: 12px; 
        text-align: center;
        padding-left: 0px;
        padding-right: 0px;
      }

      table tr td:nth-child(5):hover { background-color: #739cbf; cursor: pointer;}
      table tr td:nth-child(5) {font-family: FontAwesome; font-size: 18px; color: #fe7569; text-align: center;}



      .w3-black,.w3-hover-black:hover{color:#ccc!important;background-color:#000!important}
      .w3-hover-text-blue:hover{color:#66CCFF!important}
      .w3-dark-grey,.w3-hover-dark-grey:hover,.w3-dark-gray,.w3-hover-dark-gray:hover{color:#fff!important;background-color:#666666!important}

      </style>




      <!-- Check for message requirements-->     
      <style type="text/css">
      
      .message.success { background-color: lightgreen; border: 1px solid #666666; color: #666666;}
      .message.error { background-color: red; border: 1px solid lightgrey; color: white; }
      
      </style>

      <script>
      $(document).ready(function(){
        $(".message").fadeOut(8000);
        $(".message2").fadeOut(8000);
        $(".success").fadeOut(8000);
        $(".error").fadeOut(8000);
      });
      </script>

    </head>

    
    <body>
  
   

      <!-- Page content start-->        
      <div class="w3-row">


        <!-- Page header start-->  

   <div class="w3-row" style="background-color:#666666">
        <div class="w3-col w3-mobile" style=" width: 25%; padding-top: 12px; padding-left: 10px; height: 80px; background-color:#666666;">
        <div class="w3-container w3-hide-small">
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>        
        <ins class="adsbygoogle" 
        style="display:inline-block;width:250px;height:60px"
        data-ad-client="ca-pub-3626513934315518"
        data-ad-slot="8001567329"></ins>
        <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
        </div>
        </div>

        <div class="w3-col w3-mobile" style="width: 65%; margin:0; height: 80px; background-color:#666666;">
        <div class="w3-container">
        <input type="text" style="-webkit-font-smoothing:antialiased;-webkit-transition:color .2s ease-in-out;-moz-transition:color .2s ease-in-out;-o-transition:color .2s ease-in-out;-ms-transition:color .2s ease-in-out;transition:color .2s ease-in-out;font-family: Lucida Blackletter; text-docoration:none; font-weight:bold; font-size: 48px; text-align:center; text-shadow: 5px 5px 10px #191919;color: #FFFFFF; background-color:#666666; margin-left:0px; border-style:none; height:80px;" value="Titel på siden">
        </div>
        </div>
       
        <div class="w3-col w3-mobile" style="width: 10%; padding-left: 5px; height:80px; background-color:#666666;">
         <div class="w3-container">    
        <input type="image" style= "margin-top: 5px; margin-buttom: 5px; margin-right: 5 px; width: 70px; background-color: #666666;" <img src= "<?php echo $slprofileimage;?>">
        </div>
        </div>
  
    </div> 

        <!-- Page Header end-->

        <!-- Top Menubar start-->

        <?php include('../../templates/gf_theme_topmenu-bar.php');?>   

        <!-- Top Menubar end-->



        <!-- Main page start 4 columns incl. right sidebar-->  

        <div class="w3-row">
          <!-- Column1 start-->         
          <div class="w3-col w3-mobile" style="width:50%; margin-top: 30px; margin-left: 20px; margin-bottom:10px; margin-right: 8px; padding-bottom: 10px;">

<!-- Valgknapper til bred/eksakt søgning -->

  

           <div id="list_items"></div>



           <div class="w3-row" style="width:100%;"> <!-- for content inside this column -->
            <br> 
          <!-- <hr style= "margin-left: 10px; width: 95%;  border-color: #9F5584;">  --> 
          </div>    

          <div class="w3-container w3-mobile" style="width:75%; margin-top: 15px; margin-left: 65px; background-color:#f6f6f6; border: solid 1px #cccccc; padding-left: 10px; padding-bottom: 10px; padding-right: 10px;">

            <form id="myForm" style=" padding-top: 12px; padding-bottom: 0px; margin-left: 25px;" action="insert.php" method="post">

              <h5> Tilføj Kirkebog</h5>
              <div class="w3-container">
               <div class="w3-center" style="font-size:11px; font-family:arial;"> Alle felter skal udfyldes</div>
             </div>
             <hr style= "margin-left: 15px; width: 90%;  border-color: #9F5584;">    

             <?php if (isset($_SESSION['response'])): ?>
             <?php
             $response = json_decode($_SESSION['response']);
             unset($_SESSION['response']);
             ?>

             <div class="message <?php echo $response->success ? "success" : "error" ?>">
              <?php echo $response->message; ?>
            </div>
          <?php endif ?>


          <input type="hidden" name= "id" value= "">
          <input type="date" name= "Dato" value= "<?php echo date("Y-m-d");?>"hidden>


          <input type="text" placeholder="Sogn" name="sogn" id="Sogn" value="" style="color: #9F5584; font-weight: bold;" required>

          <input type="text" placeholder= "Herred" name= "herred" id=" Herred" value= "" style= "color: #9F5584; font-weight: bold;" required>

          <input type="text" placeholder= "Amt" name= "amt" id="Amt" value="" style="color: #9F5584; font-weight: bold;" required>

          <input type="text" placeholder= "Kirkebog, f.eks Hovedministerialbog (1837 - 1906)" name= "kirkebog" id="Kirkebog" value="" style="color: #9F5584; font-weight: bold;" required>

          <input type="text" placeholder= "Link til kirkebogen" name= "url" id="URL" value="" style="color: #9F5584; font-weight: bold;" required>


          <input type="submit" style= "margin-top: 10px; font-family: arial; font-size: 12px; box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19); background-color:#cccccc;" value="Tilføj">
        </form>


      </div>

      <br>
      <br>
      <br>
      <br>
 
      <div class="w3-row" style="width:100%; height:650px;"> <!-- for content inside this column -->

        <!-- DB update form start-->     

        <!-- DB update form end-->


      </div>
    </div>
    <!-- Column1, end-->



    <!-- Column3 start--> 
    
<!-- Column3 end--> 

<!-- Column4 start--> 
<!-- Right sidebar start-->
<?php include('../../templates/gf_theme_sidemenu.php');?>  
<!-- Right sidebar end--> 
<!-- Column4 end--> 
</div>
<!-- Main page end--> 


</div>  


<?php include('../../templates/gf_theme_footer.php');?>

<!-- Page content end-->  

</html>


