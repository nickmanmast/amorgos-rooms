<?php

session_start();

if($_SESSION['usr'])
{
    echo "Welcome, ".$_SESSION['usr']."!<br><a href ='logout.php'>Log out</a>";

}
else
{
    die("You must be logged in!");
}

?> 