<?php

session_start();

$username = $_POST['usr'];
$password = $_POST['psw'];
if($username&&$password)
{
    $connect = mysqli_connect("localhost","root","") or die("Couldn't connect!");
    mysqli_select_db($connect,"amorgos_rooms_db") or die("Couldn't find db.");

    // Perform query
    if ($result = $connect -> query("SELECT * FROM users WHERE usr='$username'")) {
        //echo "Returned rows are: " . $result -> num_rows;
        // Free result set 
        //$result -> free_result();
    }
    if($result -> num_rows != 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            $dbusername = $row['usr'];
            $dbpassword = $row['psw'];
            $activated = $row['activated'];

            if($activated==FALSE)
            {
                die("Your account is not yet active. Please check your email! Click here: <a href='index.html'>Click</a> to return to site");
                exit();
            }
        }
        if($username==$dbusername&&md5($password)==$dbpassword)
        {
            echo "You are in! <a href= 'index.html'>Click</a> here to enter the member page.";
            $_SESSION['usr']=$dbusername;
        }
        else
        {
            echo "Incorrect password!";
        }
    }
    else
    {
        die("That user doesnt exist");
    }
    $result -> free_result();
    $connect -> close();
}
else
{
    die("Please enter a username and a password");
}
?>