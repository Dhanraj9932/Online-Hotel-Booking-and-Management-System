<?php
    include "db_config.php";
        class user
        {
            public $db;
            public function __construct()
            {
                $this->db=new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,'hotel');
               if(mysqli_connect_errno())
               {
                    echo "Error: Could not connect to database.";
                    exit;
               }
            }

            public function reg_us($fname, $lname, $phone, $email, $file, $nation, $password)
            {
                //$password=md5($password);
                $sql="SELECT * FROM user WHERE mail='$email'";    
                $check=$this->db->query($sql);
                $count_row=$check->num_rows;
                if($count_row==0)
                {
                    $sql1="INSERT INTO user SET fname ='$fname', lname ='$lname', mail='$email', pass='$password', file = '$file', num = '$phone', nation = '$nation'";
                    $result= mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
                    return $result;
                }
                else
                {
                    return false;
                }
            }

            public function reg_user($name, $username, $password, $email)
            {
                //$password=md5($password);
                $sql="SELECT * FROM user WHERE name='$username' OR mail='$email'";
                $check=$this->db->query($sql);
                $count_row=$check->num_rows;
                if($count_row==0)
                {
                    $sql1="INSERT INTO manager SET uname='$username', upass='$password', fullname='$name', uemail='$email'";
                    $result= mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
                    return $result;
                }
                else
                {
                    return false;
                }
            }

            
            
            
            public function add_room($roomname, $room_qnty, $no_bed, $bedtype,$facility,$price)
            {
                
                    $available=$room_qnty;
                    $booked=0;
                    
                    $sql="INSERT INTO room_category SET roomname='$roomname', available='$available', booked='$booked', room_qnty='$room_qnty', no_bed='$no_bed', bedtype='$bedtype', facility='$facility', price='$price'";
                    $result= mysqli_query($this->db,$sql) or die(mysqli_connect_errno()."Data cannot inserted");
                
                
                    for($i=0;$i<$room_qnty;$i++)
                    {
                        $sql2="INSERT INTO `booking_details`(`cat`, `uid`, `cin`, `cout`, `name`, `nump`, `phone`, `book`) VALUES ('$roomname', '0','00-00-0000','00-00-0000','',0,0,'false')";
                        
                        $r = mysqli_query($this->db,$sql2);
                        
                    }
                    if($r && $result){
                    return $r;
                    }
                    else{
                        return "Internal error";
                    }
                

            }
            
            public function check_available($checkin, $checkout)
            {
                
                
                   $sql="SELECT DISTINCT cat FROM booking_details WHERE room_id NOT IN (SELECT DISTINCT room_id
   FROM booking_details WHERE (cin <= '$checkin' AND cout >='$checkout') OR (cin >= '$checkin' AND cin <='$checkout') OR (cin <= '$checkin' AND cout >='$checkin') )";
                    $check= mysqli_query($this->db,$sql)  or die(mysqli_connect_errno()."Query Doesnt run");;

                
                    return $check;
                

            }
            
            public function cancel($uid, $name, $date, $bkid, $cat)
            {
                       
                        $can = "SELECT * FROM `payment` WHERE `uid` = $uid AND `uname` = $name";
                       
                        $q1 = mysqli_query($this->db,$can); 
                        if(mysqli_num_rows($q1)>0)
                        {    
                        $row = mysqli_fetch_array($q1); 
                        $rec = $row['rec_id'];
                        $price = $row['price'];
                        }
                        
                        //
                        $can2 = "INSERT INTO `cancel`(`rec_id`,`bk_id`, `uid`, `uname`, `c_amt`, `c_date`, `refund_status`) VALUES ($rec, $bkid, $uid, $name, $price ,$date, 'done')";
                        $c = mysqli_query($this->db, $can2);
                        $can3 = "UPDATE `booking_details` SET `uid` ='0', cin ='0', cout ='0', `name` ='0', nump ='0', phone ='0', book ='false' WHERE uid = 1 AND bk_id =  $bkid";
                        $c2 = mysqli_query($this->db, $can3);
                        $can4 = "UPDATE INTO `room_category` SET `available`=`available`+1,`booked`=`booked`-1 WHERE `roomname` = $cat";
                        $c3 = mysqli_query($this->db, $can4);
                        if(($c && $c2) && c3){
                            $result = "Successfuly Canceled...";
                        }
                        else{
                            $result = "Internal error";
                        }
                        
                    return $result;
            }
            
            
            public function booknow($checkin, $checkout, $name, $nppl, $phone, $roomname, $uid, $amt, $mode, $date)
            {
                    
                    $sql="SELECT * FROM booking_details WHERE cat='$roomname' AND (room_id NOT IN (SELECT DISTINCT room_id
   FROM booking_details WHERE cin <= '$checkin' AND cout >='$checkout'))";
                    $check = mysqli_query($this->db,$sql)  or die(mysqli_connect_errno()."Data herecannot inserted");
                 
                    if(mysqli_num_rows($check) > 0)
                    {
                        $row = mysqli_fetch_array($check);
                        $id=$row['room_id'];
                        
                        $sql2="UPDATE booking_details SET uid = $uid, cin='$checkin', cout='$checkout', name='$name', nump='$nppl', phone='$phone', book='true' WHERE room_id=$id";
                        
                         $send = mysqli_query($this->db,$sql2);
                         /* payment table insertion */
                         $sql3="INSERT INTO `payment` (`uid`, `uname`, `price`, `pay_mode`, `t_date`) VALUES ('$uid','$name','$amt','$mode','$date')";
                         $upd = mysqli_query($this->db,$sql3);
                         $sql5 = "UPDATE `room_category` SET `available`=`available`-1,`booked`=`booked`+1 WHERE `roomname` = '$roomname'";
                         $up = mysqli_query($this->db,$sql5);
                           //
                        if(($send && $upd) && $up)
                        {
                            $result="Your Room has been booked!!";
                        }
                        else
                        {
                            $result="Sorry, Internel Error";
                        }
                    }
                    else                       
                    {
                        $result = "No Room Is Available";
                    }
                    
                    
                
                    return $result;
                

            }
            
            
            
            
            
             public function edit_all_room($checkin, $checkout, $name, $phone,$id)
            {
                                
                        $sql2="UPDATE booking_details  SET cin='$checkin', cout='$checkout', name='$name', phone='$phone', book='true' WHERE room_id=$id";
                         $send=mysqli_query($this->db,$sql2);
                        if($send)
                        {
                            $result="Edited Successfully!!";
                        }
                        else
                        {
                            $result="Sorry, Internel Error";
                        }
                    
                
                    return $result;
                

            }
            
            
            
            
            
             public function edit_room_cat($roomname, $room_qnty, $no_bed, $bedtype,$facility,$price,$room_cat)
            {
                    
                 
                        $sql2="DELETE FROM booking_details WHERE room_cat='$room_cat'";
                        mysqli_query($this->db,$sql2);
                 
                 
                        for($i=0;$i<$room_qnty;$i++)
                        {
                            $sql3="INSERT INTO booking_details SET room_cat='$roomname', book='false'";
                            mysqli_query($this->db,$sql3);

                        }

                 
                        $available=$room_qnty;
                        $booked=0;
                 
                        $sql="UPDATE room_category  SET roomname='$roomname', available='$available', booked='$booked', room_qnty='$room_qnty', no_bed='$no_bed', bedtype='$bedtype', facility='$facility', price='$price' WHERE roomname='$room_cat'";
                         $send=mysqli_query($this->db,$sql);
                        if($send)
                        {
                            $result="Updated Successfully!!";
                        }
                        else
                        {
                            $result="Sorry, Internel Error";
                        }
  
                    
                
                    return $result;
                

            }
            
            
            
            #    $sq1 = "UPDATE `booking_details` SET `uid`='',`cin`='',`cout`='',`name`='',`nump`=0,`phone`= 0 ,`book`='false' WHERE (name = 'onkar' AND uid = 1) AND (cin = '2021-11-25' AND cout = '2021-11-27')";

            
            
            
            
            public function check_login($emailusername,$password)
            {
                //$password=md5($password);
                $sql2="SELECT aid from admin WHERE mail='$emailusername' and apass='$password'";
                $result=mysqli_query($this->db,$sql2);
                $user_data=mysqli_fetch_array($result);
                $count_row=$result->num_rows;
                
                if($count_row==1)
                {
                    $_SESSION['login']=true;
                    $_SESSION['uid']=$user_data['uid'];
                    return true;    
                }
                else
                {
                    return false;
                }
            }

            public function check_ulogin($emailusername, $password)
            {
                $sql2="SELECT uid from user WHERE mail='$emailusername'and pass='$password'";
                $result=mysqli_query($this->db,$sql2);
                $user_data=mysqli_fetch_array($result);
                $count_row=$result->num_rows;
                
                if($count_row==1)
                {
                    $_SESSION['login']=true;
                    $_SESSION['uid']=$user_data['uid'];
                    return true;    
                }
                else
                {
                    return false;
                }
            }

            public function get_session()
            {
                return $_SESSION['login'];
            }
            public function user_logout()
            {
                $_SESSION['login']=false;
                session_destroy();
            }

            

        }

?>