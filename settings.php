<?php
        session_start();

        //Make sure page cant be accessed without logging in
        if(!isset($_SESSION['EmpID'])){
            header("Location: home.html");
        }
        
        //Lets you know if the password has been changed  
        $ifchanged = $_SESSION['PassChanged'];
        if($ifchanged == 1){
          echo "Password has succesfullly been changed !";
          $_SESSION['PassChanged'] = 0;
        }


?>

<html>

    <body>


        <h2>Settings Page</h2>
        <h3>Change Password</h3>

     
        <form method="POST" action="changePassword.php">
            New Password: <input type="test" name="password"/>
            <br>
            Comfirmation Password: <input type="test" name="confirm"/>
            <br>
            <br>
            <input type="submit" value= "Submit"/>
        </form>

        <form action="doctorHome.php">
            <input type="submit" value= "Back"/>
        </form>
    </body>

</html>