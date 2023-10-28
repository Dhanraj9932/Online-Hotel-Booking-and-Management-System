<?php 
include_once 'class.user.php';
session_start();

$user=new User();

$uid=$_SESSION['uid']; 
 
if(!$user->get_session()) 
{ 
    header("location:user/user_login.php");
} 
if(isset($_GET['q'])) 
{ 
    $user->user_logout();
 header("location:index.php"); 
} 
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Admin Panel</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">

    <style>
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
        
        ul {
            color: white;
            font-size: 13px;
        }
        h1{
            font-size :50px;
            padding-bottom: 1px;
            color:#fff; 
            font-family:Lucida Handwriting;
        }
        h6
        {
            color: navajowhite;
            font-family:  monospace;
        }
        marquee{
            background:white;
            border-bottom: 2px solid black;
            speed:10;
            font-size:17px;
        }	
    </style>


</head>

<body>
    
    <header>
        <marquee scrollamount="5"> &#127882; Book within this month and get an exciting GIFT VOUCHERS during accomadation &#127873;</marquee>   
    </header>
    <div class="container"> 
    <h1> <center>HOTEL MAHARAJA </center></h1>
    <hr style = "width: 80%;"> 
    
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <ul class="nav navbar-nav">                    
                    
                    <li class="active"><a href="user.php">Welcome
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
                    <li><a href="history.php">Previous Bookings</a></li>
                    <li><a href="cancel.php">Cancel Bookings</a></li>
                    <li><a href="help.php" >Help & Support</a></li>
                    
                    
                    
                </ul>

                <ul class="nav navbar-nav navbar-right">
                <li><a href="http://www.facebook.com/hotel"><img src="images/facebook.png" height="22px" width="22px"></a></li>
		    <li><a href="http://www.instagram.com"><img src="images/ig.png" height="22px" width="22px"></a></li>  
                    <li><a href="http://www.twitter.com"><img src="images/tw.png" height="22px" width="22px"></a></li> 
		   <li><a href="http://www.youtube.com"><img src="images/yt.png" height="25px" width="25px"></a></li>  
                
                    <li>
                        <a href="admin.php?q=logout">
                            <button type="button" class="btn btn-danger">Logout</button>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
          
        <?php
        
        $dt = new DateTime();
        $sql="SELECT * FROM room_category";
        $result = mysqli_query($user->db, $sql);
        if($result)
        {
            if(mysqli_num_rows($result) > 0)
            {
//               ********************************************** Show Room Category***********************
                while($row = mysqli_fetch_array($result))
                {
                    
                    echo "
                            <div class='row'>
                            <div class='col-md-3'></div>
                            <div class='col-md-6 well'>
                                <h4>".$row['roomname']."</h4><hr>
                                <h6>No of Beds: ".$row['no_bed']." ".$row['bedtype']." bed.</h6>
                                <h6>Facilities: ".$row['facility']."</h6>
                                <h6>Price: ".$row['price']." Rs/day.</h6>
                            </div>
                            <div class='col-md-3'>
                                <a href='./booknow_us.php?roomname=".$row['roomname']."&price=".$row['price']."&date="
                                .$dt->format('Y-m-d H:i:s')."'><button class='btn btn-primary button'>Book Now</button> </a>
                            </div>   
                            </div>
                            
                                                
                    
                         "; //echo end
                    
                    
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