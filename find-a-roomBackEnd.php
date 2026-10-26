<?php

$search = $_POST['searchbar'];

$connect = mysqli_connect("localhost","root","");
mysqli_select_db($connect,"amorgos_rooms_db");

$sql = "SELECT * FROM rooms WHERE cname like '%$search%'";

$result = $connect->query($sql);

if ($result->num_rows > 0){
$show_result = '<section class="find-a-room">';
while($row = $result->fetch_assoc() ){
    
    $show_result .= '<section class="find-a-room">';
    $show_result .= '<p>' .htmlspecialchars($row['cname']) . '</p>';
    $show_result .= '<p>' .htmlspecialchars($row['loc']) . '</p>';
    $show_result .= '<p>' .htmlspecialchars($row['comp-phone']) . '</p>';
    $show_result .= '<p>' .htmlspecialchars($row['email']) . '</p>';
    $show_link   = htmlspecialchars($row['link']);
    //echo $row["cname"]."<br>  Location: ".$row["loc"]."<br> Phone: ".$row["comp-phone"]."<br> Email: ".$row["email"]."<br><br>";
    //header ("location: find-a-roomsearched.html"); 
	
}
} else {
	echo "0 records";
}

$connect->close();

?>

<!DOCTYPE html>
<html>

  <head>
      <meta charset="UTF-8">
      <title> Amorgos Rooms </title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="styles/style.css">      
  </head>


  <body>
       <header>
            <a href="index.html" class="header-brand">Amorgos-rooms </a>
             
          <nav>
            <ul>
              <li><a href="find-a-room.html">Find a room</a></li>
              <li><a href="more.html">More... </a></li> 
              <li><a href="contact.html">Contact us</a></li>  
            </ul>
          </nav>  
       </header>
       
       <main>
            <section align="center" class="find-a-room-search"><br>
                <form action="find-a-roomBackEnd.php" method="POST">
                    <input type="search" name="searchbar" placeholder="Search...">
                    <input type="submit" value="Enter" name="sub">
                </form> 
                <br>
                <form>Location search...
                  <select name="location">
                    <option value="Katapola">Κατάπολα
                    <option value="Aegiali">Αιγιάλη
                    <option value="Xora">Χώρα
                    <option value="Lagada">Λαγκάδα
                    <option value="Leykes">Λευκές    
                  </select>    
                </form> 
            </section>   
            
            <section class="find-a-room">

               <!-- <p>
                <a href="Pension-Amorgos.html">
                  <img src="media/images/link.png" alt="internal-link">
                </a> 
                
                Pension Amorgos<br>
                Katapola<br>
                Τηλ:22850-XXXX<br>
                email:pension.amorgos@gmail.com<br>
               </p>  -->

             <p>
                 <?php
                     echo $show_result;
                     echo "<a href='$show_link'> <img src='media/images/link.png' alt='internal-link'> </a>";
                 ?>
              </p> 
            </section>

           
           <br><br> 
          <div class="tab-wrapper"> 
           <h2 class="find-a-room-link"> <a href="create_page.html">Create your page </a></h2><br><br>
          </div>  
       </main>


      <footer>
        <div class="footer-menu">
          <ul>
             <li><a href="more.html">Learn more</a> </li>
             <li><a href="contact.html">contact us </a></li>
             <li><a href='sign-up.php'>Sign up </a></li>
             <li><a href='login.php'>Login </a></li>
          </ul>
        
        
          <div class="footer-menu-sm">
          
             <a href="#">
               <img src="media/images/instagram-logo.png" alt="instagram icon">
             </a>
             <a href="#">
               <img src="media/images/facebook-logo.png" alt="facebook icon">
             </a>
             <a href="#">
               <img src="media/images/pngwing.com.png" alt="tiktok icon">
             </a>          
          </div>  
        </div>
      </footer> 

  </body>


</html>