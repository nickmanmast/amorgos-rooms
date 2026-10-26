<?php

$connect = mysqli_connect("localhost","root","") or die("Couldn't connect!");
mysqli_select_db($connect,"amorgos_rooms_db") or die("Couldn't find db.");

$id = $_GET['id'];
$code = $_GET['code'];

if($id&&$code)
{
    $check = $connect -> query("SELECT * FROM users  WHERE id='$id' AND random='$code'");
    $checknum = mysqli_num_rows($check);

    if($checknum==1)
    {
        $acti = $connect -> query("UPDATE users SET activated='1' WHERE id='$id'");
        die("Your account is activated. You may now login.");
    }
    else
    {
        die("Invalid ID or Activation code.");
    }
}
else
{
    die("Data missing!");
}

?>