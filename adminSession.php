<?php
	session_destroy();

    if(!isset($_SESSION['Admin'])) {
        echo "<script  type='text/javascript'>
                    alert('Access Denied. Please Sign in as an Admin');
                    window.location = 'index.html';
                </script>";
        header("Location: newindex.html");

    }

 ?>
