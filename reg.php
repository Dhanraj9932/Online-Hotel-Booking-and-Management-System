<?php

error_reporting(0);


include_once 'class.user.php'; 
$user=new User();

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$phone = $_POST['phone'];
$email = $_POST['mail'];
$file = $_POST['file'];
$nation = $_POST['nation'];
$pass = $_POST['pass'];


if($pass == true) 
{ 
    extract($_REQUEST); 
    $register=$user->reg_us($fname, $lname, $phone, $email, $file, $nation, $pass); 
    if($register) 
    { 
        echo "
<script type='text/javascript'>
    alert('You are Registered Successfully');
</script>"; 
        echo "
<script type='text/javascript'>
    window.location.href = 'user.php';
</script>"; 
    } 
    else 
    {
        echo "
<script type='text/javascript'>
    alert('Registration failed! email already exists');
</script>";
    }
} 
?>

<html>
<head>
<style>
 
 form{
    color:#00458B;
    width:100%;
 }
 .main{
     margin:40px 450px ;
     border:2px solid #5EBEC4;
     padding:20px 50px;
     border-radius:5px;
     font-size:20px;
     background:#fff
 }

 label{
   font-size:17px;
   color: black
    }

 input{
    margin:10px auto;
    width:100%;
    border-radius:3px;
    height:25px;
    border:1px solid black;
    
 }
 .f{
   border:none;
 }
 .sub{
    margin:15px auto;
    border:1px solid blue;
    width:30%;
    height:30px;
    border-radius:40px;
    font-size:90%
 }
 .sub:hover{
 background:#7DA2A9; 
}
 h2{
     font-family:Malgun Gothic;
     margin:3px auto 5px auto
 }
 body{
   background:#7981aa
   
 }

</style>    
</head>

<body>
  <div class="main">  
 <form name = "reg" method = 'POST' action = "reg.php">
    <h2>Register</h2> <hr>
    <label>First Name:</label>
    <input name="fname" type = "text" required>  <br> 
    <label>Last Name:</label>
    <input name="lname" type = "text" required>  <br>    
    <label>Email:</label>
    <input name="mail" type = "email" required>  <br> 
    <label>Phone:</label>
    <input name="phone" type = "text" required> <br> 
    <label>Nationality:</label>
    <input name="nation" type = "text" required> <br> 
    <label>Proof (Aadhaar or Passport):</label>
    <input class = 'f' name="file" type = "file" required > <br>
    <label>Create Password:</label>
    <input name="pass" type = "password" required > <br> 
    <label>Re-enter password:</label>
    <input name="pass1" type = "password" required > <br> 
    <center><input type = "submit" class = "sub" onclick = "ver();" >

    <br><a href = "user.php" style="font-size:16px; ">Already have an account? Login</a>
    </center>
 </form>
</div>

<script>
   var p1 = toString(document.reg.pass);
   var p2 = toString(document.reg.pass1);
   function ver(){
      if(p1 != "" && p2 != ""){ 
      if(p1!=p2)
      {
         window.alert("Password doesn't match");
         p2.focus();
         return false;
      }
      }
      else{
          window.alert(Enter Password);
          return false;
      }
   }

</script>   

</body>
</html>    