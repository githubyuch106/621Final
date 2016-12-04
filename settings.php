<?php

        session_start();
        require 'doctorSession.php';
        
        //Lets you know if the password has been changed  
        $ifchanged = $_SESSION['PassChanged'];
        if($ifchanged == 1){
          echo "<script  type='text/javascript'>
                    alert('Password was succesfully changed');
                </script>";
         $ifchanged = 0;
         $_SESSION['PassChanged']=0;
        }


?>

<html>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Hospital</title>
        <link href="styles.css" rel="stylesheet" type="text/css" />
        <link href="drop.css" rel="stylesheet" type="text/css" />
    </head>
    <body>

        <div id="container">
      <!-- begin #header -->
        <div id="header">
        <div class="headerTop">
              <div class="logo">
                  <a href=""><img src="images/logo.png" alt="" width="179" height="77" /></a>AMS <span>the best technologies</span>
                </div>
                <div class="search">
                    Product search:<br />
                    <div class="si"><input name="" type="text" /></div><div><a href=""><img src="images/searchButton.jpg" alt="" width="66" height="26" /></a></div>
                </div>
            </div>
            <div class="mainMenu">
            <ul class="menuTemplate1 decor1_1" license="mylicense">
        <li class="separator"></li>
          
        <li><a href="doctor.php" class="arrow">Back</a>

            </ul>
            
        </div>

        <h3>Change Password</h3>
        <br><br>
        <form method="POST" action="changePassword.php">
            New Password: <input type="test" name="password"/>
            <br><br>
            Comfirmation Password: <input type="test" name="confirm"/>
            <br><br>
            <input type="submit" value= "Submit"/>
        </form>

         </div>

      <!-- This clearing element should immediately follow the #mainContent div in order to force the #container div to contain all   child floats --><br class="clearfloat" />
      <!-- begin #footer -->

      <!-- end #footer -->
      </div>
    </body>

</html>
