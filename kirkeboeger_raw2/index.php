<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

?>

<!DOCTYPE html>
<html lang="da">
<head>
  <!-- Check for title--> 
  <title>Kirkebøger</title>

    <meta charset="utf-8">
  

  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="kb.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css" />

  <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>
 

  <script type="text/javascript">
   $(document).ready(function() {
        $('#tdata').dataTable( {
            "language": {
          "url": "dataTables.danish.lang"
    
            }
        } );
    } );
</script>


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

        <!-- Page Header end-->

        <!-- Top Menubar start-->

       <!-- Top Menubar end-->



        <!-- Main page start 4 columns incl. right sidebar-->  

        <div class="w3-row">
          <!-- Column1 start-->         
          <div class="w3-col w3-mobile" style="width:75%; margin-top: 30px; margin-left: 20px; margin-bottom:10px; margin-right: 8px; padding-bottom: 10px;">

            <!-- Valgknapper til bred/eksakt søgning -->

            <form style="color:#9F5584; padding-bottom:7px;"> 

              <input type="radio" id="broad" style="position:relative; margin-left: 30px;"checked="checked"  name="radio1" value="bredt" /> Søg bredt 

              <input type="radio" id="exact" style="position: relative; background-color: #eee;"  name="radio1" value="eksakt"/> Søg Sogn

            </form> 


            <!-- Søge felt til sogne -->
            <form action=""  form title="Skriv det Sogn du søger. Du kan evt. bruge % som jokertegn."  onsubmit="return false"style="padding-top:10px; padding-bottom:10px;" method="POST" >


             <input type="search" id="input_1" placeholder= "Søg " style="width: 300px; height: 35px; border: 1px solid #666666;border-radius:2px;color:#666666; color: #9F5584; font-weight: ligther; font-size: 13px; padding-left:10px;" name="query"  />



             <input type="button" submit title="Klik her, eller tast Enter, for at aktivere søgningen." style="margin-left:15px; padding-right:10px;height:30px;font-family:arial; font-size: 12px; text-align:left; background-color:#cccccc; border: 2px solid #grey;border-radius:2px; color:black; background-color:#cccccc; box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);" name="soeg" id="Sog" value="Søg"/>


             <input type="reset" id="nulstil" style="margin-left:15px; height:30px;font-family:arial; font-size: 12px; text-align:left; background-color:#cccccc; border: 2px solid #grey;border-radius:2px; color:black; background-color:#cccccc; box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);" value="Nulstil"/>

           </form>  
           <br>


           <div id="list_items" class='list'></div>
         </div>
           <script>
        //Variable to be used in the scripts
      var input_1 = document.getElementById('input_1'); //main searchfield
      var SogButton=document.getElementById('Sog'); //"Søg" buttin
      var NustilButton=document.getElementById('nulstil');  //"Nulstil" button 



      function radioBtn(){
       var linkPhp;
       if($("#exact").is(":checked")) {
         linkPhp='ajaxSognHtml2.php';        
         return linkPhp;
       }else if($("#broad").is(":checked")){
         linkPhp='ajaxSognHtml.php';         
         return linkPhp;  
       }
     }


      // "Søg" button function
      SogButton.addEventListener('click',function (){
        $('#list_items > table').remove();    
        $.ajax({
         url: radioBtn(),
         data: {query:input_1.value},
         method:'POST',
         dataType: 'html'
       }).done(function (res){             
        $('#list_items').html(res);
        $('#tdata').DataTable({searching: true, paging: false, info: true, "dom": '<"top"<if>', order: []});
      });         
    });


        // Return key search function
        input_1.addEventListener('keyup',function(e){
        if(e.keyCode===13){          
       $.ajax({
         url: radioBtn(),
         data: {query:input_1.value},
         method:'POST',
         dataType: 'html'
       }).done(function (res){             
        $('#list_items').html(res);
        $('#tdata').DataTable({searching: true, paging: false, info: true, "dom": '<"top"<if>', order: []});           
          });
         } 
       });


        //"Nulstil" button
       NustilButton.addEventListener('click',function (){
        document.getElementById("exact").checked = false;
        document.getElementById("broad").checked = true;
          $.ajax({
         url: radioBtn(),
         data: {query:input_1.value},
         method:'POST',
         dataType: 'html'
       }).done(function (res){             
        $('#list_items').html(res);
        $('#tdata').DataTable({searching: false, paging: false, info: false, "dom": '<"top"<if>', order: []});           
        $('#list_items > table').remove();

          });       
       });
        </script>

        <div class="w3-row" style="width:100%;"> <!-- for content inside this column -->
          <br> 
         <!-- <hr style= "margin-left: 10px; width: 95%;  border-color: #9F5584;">  --> 
        </div>    

        <div class="w3-container w3-mobile" style="width:75%; margin-top: 15px; margin-left: 0px; background-color:white; border: solid 0px #cccccc; padding-left: 10px; padding-bottom: 10px; padding-right: 10px;">

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
      <div class="w3-col w3-mobile w3-hide-small" style="width:45%; height: 400px; margin-top:20px; margin-right: 0px;">

    </div>
    <!-- Column3 end--> 

 
    <!-- Column4 start--> 
    <!-- Right sidebar start-->

    <!-- Right sidebar end--> 
    <!-- Column4 end--> 
    

  <!-- Main page end--> 
</div>  

<footer>

</footer>
<!-- Page content end-->  

</html>


