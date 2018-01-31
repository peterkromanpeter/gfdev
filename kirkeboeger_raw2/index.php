    <?php
    //session_start();
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    //<!-- Check for user access requirements--> 
    //$groupswithaccess="PUBLIC";
    require_once("../slpw/sitelokpw.php");
    ?>


    <!DOCTYPE html>
    <html lang="da">
    <head>
        <!-- Check for title--> 
        <title>Kirkebøger</title>

        <meta charset="utf-8" lang="da">
        <script type="text/javascript">
        var blabfolderpath="../slpw/plugin_blab/"
        </script>
        <link rel="stylesheet" type="text/css" href="../slpw/plugin_blab/blab.css">
        <script type="text/javascript" src="../slpw/plugin_blab/sarissa.js"></script>
        <script type="text/javascript" src="../slpw/plugin_blab/blab.js"></script>
        <script type="text/javascript">
        var memberprofilepage=1
        </script>
        <?php
        if (function_exists('startwhoisonline'))
            startwhoisonline('profileimage,name');
        ?>
        <script>
        $(document).ready(function() {
        $('#tdata').DataTable({responsive: true, searching: true, paging: false, info: true, select: true, "dom": '<"top"if>t', order: []});
    });
        </script>


        <meta name="viewport" content="width=device-width; initial-scale=1.0"> 
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../templates/template_style.css">
        <link rel="stylesheet" type="text/css" href=" kb.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>
     
  
        <script>
        $(document).ready(function(){
            $(".message").fadeOut(8000);
            $(".message2").fadeOut(8000);
            $(".message3").fadeOut(8000);
            $(".message4").fadeOut(8000);        
            $(".success").fadeOut(8000);
            $(".error").fadeOut(8000);
        });
        </script>

    </head>


    <body>
       <!-- Page content start-->        
       <div class="w3-row" style="overflow: none">

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
                    <input type="text" style="-webkit-font-smoothing:antialiased;-webkit-transition:color .2s ease-in-out;-moz-transition:color .2s ease-in-out;-o-transition:color .2s ease-in-out;-ms-transition:color .2s ease-in-out;transition:color .2s ease-in-out;font-family: Lucida Blackletter; text-docoration:none; font-weight:bold; font-size: 48px; text-align:center; text-shadow: 5px 5px 10px #191919;color: #FFFFFF; background-color:#666666; margin-left:0px; border-style:none; height:80px;" value="Kirkebøger">
                </div>
            </div>

        <div class="w3-col w3-mobile" style="width: 10%; padding-left: 5px; height:80px; background-color:#666666;">
           <div class="w3-container">    
            <input type="image" style= "margin-top: 5px; margin-buttom: 5px; margin-right: 5 px; width: 70px; background-color: #666666;" img src= "<?php echo $slprofileimage;?>">
        </div>
    </div>

    </div> 
    <!-- Page Header end-->


    <!-- Top Menubar start-->
    <?php include('../templates/gf_theme_topmenu-bar.php');?>  
    <!-- Top Menubar end-->



    <!-- Main page start -->  
    <div class="w3-row">

        <!-- Column1 start-->         
        <div class="w3-col w3-mobile" style="width:70%; margin-top: 30px; margin-left: 20px; margin-bottom:10px; padding-bottom: 10px;">

                <form style="color:#9F5584; padding-bottom:7px;"> 

                  <input type="radio" id="broad" style="position:relative; margin-left: 30px;" checked= "checked"  name= "radio1" value="bredt" /> Søg bredt 

                  <input type="radio" id="exact" style= "position: relative; background-color: #eee;"  name="radio1" value="eksakt"/> Søg Sogn

                </form>


                <!-- Søge felt til sogne -->
                <form action="index.php" style="padding-top:10px; padding-bottom:10px;" method="GET" >


                 <input type="search" id="input_1" placeholder= "Søg " title="Skriv det Sogn du søger. Du kan evt. bruge % som jokertegn." style="width: 300px; height: 35px; border: 1px solid #666666;border-radius:2px;color:#666666; color: #9F5584; font-weight: ligther; font-size: 13px; padding-left:10px;" name="query"  />



                 <input type="submit" title="Klik her, eller tast Enter, for at aktivere søgningen." style="margin-left:15px; padding-right:10px;height:30px;font-family:arial; font-size: 12px; text-align:left; background-color:#cccccc; border: 2px solid #grey;border-radius:2px; color:black; background-color:#cccccc; box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);" name="soeg" id="Sog" value="Søg"/>


                 <input type="submit" id="nulstil" style="margin-left:15px; height:30px;font-family:arial; font-size: 12px; text-align:left; background-color:#cccccc; border: 2px solid #grey;border-radius:2px; color:black; background-color:#cccccc; box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);" value="Nulstil"/>

               </form>  
               <br>


               <div id="list_items" class='list'></div>

               <?php include_once('ajaxSognHtml.php') ; ?> 
             </div>
                <!-- Column1, end-->
            <script>
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
        </script>
      

       <!-- Column4 - Right sidebar start--> 
        <?php include('../templates/gf_theme_sidemenu.php');?>  
        <!-- Column4 - Right sidebar end--> 
     
        </div>


      

     

    </div>
    <!-- Main page end--> 


    <!-- Page content end-->  

    <!-- Footer start-->  
    <?php include('../templates/gf_theme_footer.php');?>  
    <!-- Footer end--> 


    </body>   
    </html>