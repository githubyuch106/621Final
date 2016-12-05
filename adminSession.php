<?php
//Make sure page cant be accessed without logging in
    if(!isset($_SESSION['Admin'])) {
        echo "<script  type='text/javascript'>
                    alert('Access Denied. Please Login as an Admin.');
                    window.location = 'index.html';
                </script>";
        header("Location: index.html");

    }

 ?>
