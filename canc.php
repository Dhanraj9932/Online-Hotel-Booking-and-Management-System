<?php
    include_once 'class.user.php'; 
session_start();
$user=new User();
$uid=$_SESSION['uid']; 


     

     $dt = new DateTime();
     $date = $dt->format('Y-m-d');
     $nm = $_GET['name'];
     $result=$user->cancel( $uid, $nm, $date);
     if($result)
     {
         echo "<script type='text/javascript'>
               alert('".$result."');
          </script>";
          
     }


?>


<!DOCTYPE html>
<html lang="en">

<head>
<style>
    .aa{
    user-select:none;
    }
</style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Hotel Booking</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="admin/css/reg.css" type="text/css">
  
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( ".datepicker" ).datepicker({
                  dateFormat : 'yy-mm-dd'
                });
  } );
  </script>

    
</head>

<body>
    <div class="container">
      
      
       <img class="img-responsive" src="images/home_banner.jpg" style="width:100%; height:180px;">      
        

      <div class="well">
            <h2>Canceled: <?php echo $name; ?></h2>
            <hr>
            
                
                <?php
                 echo "<div class='form-group'>
                    ".$result."
                </div> 
                "; 
               ?>

                

               <br>
                <div id="click_here">
                
                    <a href="user.php">Back to Home</a>
                </div>
  

            </form>
        </div>
        
        



    </div>
    
    
    
    
    






    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
</body>

</html>