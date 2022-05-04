
    <?php 
        include "database.php";
    ?>
        
<html>  
    <?php
        if(isset($_POST["username"]) && isset($_POST["password"])){

            $username = $_POST["username"];
            $submitPassword = $_POST["password"];
            openDB();
            $passwordHash = readDB($username);



            if(password_verify($submitPassword, $passwordHash)){

                $_SESSION["loggedin"] = true;
                $_SESSION["username"] = $username;
                $_SESSION["password"] = $submitPassword;
                echo "login successful";

            } else{

                $_SESSION["loggedin"] = false;
                echo "Username or password is incorrect";
            }

            closeDB();
        }
    ?>
</html>  