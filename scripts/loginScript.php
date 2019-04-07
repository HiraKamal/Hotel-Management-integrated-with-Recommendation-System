<?php
include 'DbConnect.php';
session_start();
if(isset($_SESSION['newsession']))
{
    echo "<script>alert('User Logged In !');location.href = '../index-2.php'</script>";
}
else
{
    if(isset($_POST['login']))
    {
        $name = $_POST['username'];
        $pass = $_POST['password'];
        $query = "SELECT * FROM users WHERE username = '$name'";
        $ex_query = $con->query($query);
        $count = $ex_query->num_rows;
        if ($count == 1) {
            $data = mysqli_fetch_array($ex_query);
            if($pass == $data['password'])
            {
                $_SESSION['newsession'] = $name;
                echo "<script>alert('User Successfully Logged In !');location.href = '../index-2.php'</script>";
            }
            else
            {
                echo "<script>alert('Invalid Password !');location.href = '../login.php'</script>";
            }
        }
        else
        {
            echo "<script>alert('Invalid Email !');location.href = '../login.php'</script>";
        }
    }
}
?>