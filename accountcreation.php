<!Doctype HTML>
<?php
    include "status.php";
    include "database.php";
?>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="main.css">

    </head>

        
        
    <body>
        <?php 
            include "header.php";
        ?>  


        <h1>Create an Account</h1>
    
        <?php
            if($loggedin){
                echo "You must log out to create a new account";
            } else { ?>
                <form action="accountcreation.php" method="POST">
                    <input type="text" name = "username">
                    <input type="password" name = "password">
                    <button type="submit">Submit</button>

                </form>
          <?php  } ?>

        <?php

            if(isset($_POST["username"]) && isset($_POST ["password"])) {
                $username = $_POST["username"];
                $submitpassword = $_POST["password"]; 

                openDB();
                $passwordHash = readDB($username);

                if(!password_verify($submitpassword, $passwordHash)) {
                    createRow($username, $submitpassword);
                    echo "Your account has been created!";
                } else{
                    echo "Account exists!";
                }

                closeDB();
            }



        ?>

    </body>

</html>