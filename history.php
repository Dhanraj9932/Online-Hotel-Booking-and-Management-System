<?php
include_once 'class.user.php'; 
$user=new User();
session_start();

$uid=$_SESSION['uid']; 

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Hotel Booking</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    
    
    <style>
           h1{
            font-size :50px;
            padding-bottom: 1px;
            color:#fff; 
            font-family:Lucida Handwriting;
        }
        marquee{
            background:white;
            border-bottom: 2px solid black;
            speed:10;
            font-size:17px;
        }
        .well {
            background: rgba(0, 0, 0, 0.7);
            border: none;
            height: 200px;
        }
        
        body {
            background-image: url('images/home_bg.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        
        h4 {
            color: #ffbb2b;
        }
        h6
        {
            color: navajowhite;
            font-family:  monospace;
        }


    </style>
    
    
</head>

<body>
<header>
        <marquee scrollamount="5"> &#127882; Book within this month and get an exciting GIFT VOUCHERS during accomadation &#127873;</marquee>   
    </header>
    <div class="container">
      
    <h1> <center>HOTEL MAHARAJA </center></h1>
    <hr> 
       
    <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <ul class="nav navbar-nav">                    
                <li><a href="user.php"> Welcome 
                        <?php $sql="SELECT * FROM user";
                         $result = mysqli_query($user->db, $sql);
                            if($result){
                                if(mysqli_num_rows($result) > 0)
                                {
                          while($row = mysqli_fetch_array($result))
                                    {
                                        if($row['uid'] == $uid){
                                        echo$row['fname'];
                                        }
                                    }
                                }       
                            }
                            ?>
        </a></li>
                    <li><a href="room2.php">Book now</a></li>
                    <li><a href="reservation2.php">Check-Availability</a></li>
                    <li><a href="history.php" class="active">Previous Bookings</a></li>
                    <li><a href="cancel.php">Cancel Bookings</a></li>
                    <li><a href="help.php" >Help & Support</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="admin.php?q=logout">
                            <button type="button" class="btn btn-danger">Logout</button>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        
        
        
        <?php
        
        $sql="SELECT * FROM booking_details";
        $result = mysqli_query($user->db, $sql);
        if($result)
        {
            if(mysqli_num_rows($result) > 0)
            {
//               ********************************************** Show Room Category***********************
                while($row = mysqli_fetch_array($result))
                {
                    if($row['uid'] == $uid){
                    echo "
                            <div class='row'>
                            <div class='col-md-3'></div>
                            <div class='col-md-6 well'>
                                <h4>Room: ".$row['cat']."</h4><hr>
                                <h4>Name: ".$row['name']."</h4>
                                <h6>Check-in: ".$row['cin']." Check-in: ".$row['cout'].".</h6>
                                
                            </div>                              
                            </div>
                            
                            
                        
                    
                         "; //echo end
                        }
                       /* else{
                            echo" No Booked Rooms";
                            break;
                        }*/
                    
                }
                
                
                          
            }
            else
            {
                echo "NO Data Exist";
            }
        }
        else
        {
            echo "Cannot connect to server".$result;
        }
        
        
        
        
        
        ?>


    </div>
    
    
    
    
    





    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>