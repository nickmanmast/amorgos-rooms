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
                <section class="sign-up-bgbanner">

                  <div class="sign-up-head">
                    <h2> Sign up your own business here </h2>
                  </div>
                  
                  <div class="sign-up-info">
                    <form action="sign-upBackEnd.php" method="POST">
                      <br>
                      <table>
                        <tr> <td> FirstName:</td> <td><input type="text" name="fname" autofocus></td><tr>
                        <tr><td>Last Name:</td> <td><input type="text" name="lname"></td></tr>
                        <tr><td>Company name: </td><td><input type="text" name="cname"></td></tr>
                        <tr><td>Phone number: </td><td><input type="tel" name="pnumber"></td></tr>
                        <tr><td>E-mail: </td><td><input pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{1,63}$" type="email" name="email"></td></tr>
                        <tr><td>Username: </td><td><input type="text" name="usr"></td></tr>
                        <tr><td>Password: </td><td><input type="password" name="psw"></td></tr>
                        <tr><td>Confirm password: </td><td><input type="password" name="cpsw"></td></tr>
                      </table>
                      <input type="submit" value="submit" name="sub">
                    </form>  
                  </div>  

                </section>    
       </main>


      <footer>
        <div class="footer-menu">
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
      </footer> 

  </body>


</html>
