<?php

if($_POST){

  require 'conn.php';
  $conn = connect_db();
 
  if(isset($_POST['register']) ){
    $username = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $msg = $_POST['msg'];


    $sql = "Select contactme.username From contactme Where username = '$username'";
    $sql = $conn->query($sql);
    $sql = $sql->fetch_assoc();
    if($sql){ 
      header('location: register.php');
      exit();
    }else{
    
      $sql = "Insert Into contactme (username, email, number, msg) VALUES ('$username', '$email', '$number', '$msg')";
      $sql = $conn->query($sql);
      if($sql){
        echo "Registration succesful";
        header('location: index.html');
      }
    }

  }
  

}

//header('location: index.php');

?>