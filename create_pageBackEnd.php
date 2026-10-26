<?php

session_start();

$connect = mysqli_connect("localhost","root","");
if(isset($_POST["submit"]))
{
    $str = $_POST ["search"];
}

?>