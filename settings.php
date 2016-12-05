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
                <a href=""><img src="images/Saint_Joseph's_University_seal.png" alt="" width="80" height="80" /></a>Team 8 <span>Hospital Management System</span>                
              </div>
              <div class="search">
                Doctor Portal    
              </div>
              <br>
              <br>
              <br>
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

      </div>
    </body>

</html>
