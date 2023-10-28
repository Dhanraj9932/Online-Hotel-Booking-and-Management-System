<?php session_start();
include_once 'admin/include/class.user.php';
$user=new User();
$uid=$_SESSION['aid']; 
if(!$user->get_session()) 
{ 
    header("location:admin/login.php");
} 
if(isset($_GET['q'])) 
{ 
    $user->user_logout();
 header("location:index.php"); 
} 
//
$sql = "SELECT * FROM `admin`";
$r=mysqli_query($user->db,$sql);
$rowcount=mysqli_num_rows($r);   

$sql2 = "SELECT * FROM `user`";
$r2=mysqli_query($user->db,$sql2);
$rowcount2=mysqli_num_rows($r2);   

$sql3 = "SELECT * FROM `booking_details` WHERE book = 'false'";
$r3=mysqli_query($user->db,$sql3);
$rowcount3=mysqli_num_rows($r3);

$sql4 = "SELECT * FROM `booking_details` WHERE book = 'true'";
$r4=mysqli_query($user->db,$sql4);
$rowcount4=mysqli_num_rows($r4);   

$sql5 = "SELECT * FROM `cancel`";
$r5=mysqli_query($user->db,$sql5);
$rowcount5=mysqli_num_rows($r5);   
//


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
            background:#4674ae;
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
            margin-top:20px
        }
        h3{
            margin:20px;
            color:#fff
        }

        .board{
            margin:30px 250px;
            background:white;
            border-radius: 10px;
            padding:10px;
            background:#fCfFEf;
            color:
            
        }
        table{
            width: 96%;
            height:96%;
            margin:1% 1% 
        }
        td{
            padding:10px;
            border: 1px solid black;
        }

    </style>


</head>

<body>
<center>
<h1> HOTEL MAHARAJA </h1>
    <hr> 

    
       <h3>Admin Panel</h3>
       <hr style = "width: 50%;">
</center>  

    <div class="container"> 
    

    <div class="container">
        
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    
                    <li class="active"><a href="admin.php">Admin</a></li>
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

        <div class="board">
    <table>
    <tr>
        <td>Available Rooms:</td><td> <?php echo$rowcount3;?> rooms</td>
    </tr>    
    <tr>
        <td>Booked Rooms:</td><td> <?php echo$rowcount4;?> rooms</td>
    </tr>    
    <tr>
        <td>Customers:</td><td> <?php echo$rowcount2;?> users</td>
    </tr>
    <tr>
        <td>Admins:</td><td> <?php echo$rowcount;?> admins</td>
    </tr>
    </table>
        </div>

        <div class="row">
           <div class="col-md-3"></div>
            <div class="col-md-6 well">
                <h4>Room Category</h4>
                <hr>
                <ul>
                    <li><a href="admin/addroom.php">Add Room Category</a></li>
                    <li><a href="show_room_cat.php">Show All Room Category</a></li>
                    
                  <!--  <li><a href="edit_room_cat.php">Edit Room Category</a></li>-->
                </ul>
            </div>
            <div class="col-md-3"></div>
        </div>

        <div class="row">
           <div class="col-md-3"></div>
            <div class="col-md-6 well">
                <h4>Bookings</h4>
                <hr>
                <ul>
                    <li><a href="room.php">Book Now</a></li>
                    
                    <li><a href="show_all_room.php">Show All Booked Rooms</a></li>
                    <li><a href="show_all_room.php">Edit Booked Room</a></li>
                </ul>
            </div>
           <div class="col-md-3"></div>
        </div>
        
        
        <div class="row">
           <div class="col-md-3"></div>
            <div class="col-md-6 well">
                <h4>Add Manager</h4>
                <hr>
                <ul>
                
                    <li><a href="admin/registration.php">Add Manager</a></li>
 
                </ul>
            </div>
            <div class="col-md-3"></div>
        </div>









    </div>










    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>