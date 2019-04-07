<?php
session_start();
include 'DbConnect.php';

if(isset($_POST['register']))
{
    $name=$_POST['username'];
    $email=$_POST['email'];
    $pass=$_POST['password'];

    $query= "INSERT INTO logindatabase(username,password,email) VALUES ('$name','$pass','$email')";

    if($con->query($query))
    {
        $query1="SELECT * FROM logindatabase WHERE username= '$name'";
        $ex_query1= $con->query($query1);
        $data=mysqli_fetch_array($ex_query1);
        $_SESSION['newsession']=$email;
        echo  "<script>alert('User Registered!');location.href = '../index-2.php'</script>";
    }
    else{
        echo "ni chala";
    }


}