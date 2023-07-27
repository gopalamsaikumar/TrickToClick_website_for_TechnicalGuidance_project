<?php
  $email= $_POST['email'];
  $password=$_POST['password'];
  $con=new mysqli("localhost","root","","test");
  if($con->connect_error){
    die("failed to connect :".$con->connect_error);
  } 
  else{
    $stmt=$con->prepare("select * from registrations where email=?");
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $stmt_result=$stmt->get_result();
    if($stmt_result->num_rows>0){
        $data =$stmt_result->fetch_assoc();
        if($data['password']==$password){
            header("Location:mainpage.html");
        }else{
            echo "INVALID USERNAME PR PASSWORD";
        }
    }else{
        echo "INVALID USERNAME OR PASSWORD";
    }
  }
?>