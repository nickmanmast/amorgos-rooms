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
                <section class="index-banner">
                  <div class="login-box">   
                    <form action="loginBackEnd.php" method="POST">
                        Enter username: <input type="username" name="usr" autofocus><br><br>
                        Enter password: <input type="password" name="psw"><br><br>
                        <input type="submit" value="Σύνδεση">
                    </form>   
                   </div>
                </section>    
       </main> 

       
      <footer>
        <div class="footer-menu">
          <div class="login-menu">
          <ul>
             <li><a href="more.html">Learn more</a> </li>
             <li><a href="contact.html">Contact us </a></li>
             <li><a href='sign-up.php'>Sign up </a></li>
             <li><a href='login.php'>Login </a></li>
             <li><a href="logout.php">Log out </a></li>
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
        </div>
      </footer> 

  </body>


</html>
