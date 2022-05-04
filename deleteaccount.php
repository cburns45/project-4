<?php
    include "status.php";
    include "database.php";

?>

<html>
    <body>
        <?php
            include "header.php";
        ?>

        <?php

            if (!$loggedin){
                echo "<p>You must be logged in to delete an account!</p>";
            }
        ?>

        <?php

            if($loggedin){
                $username = $_SESSION["username"];
                $submitPassword = $_SESSION["password"];

                openDB();
                deleteRow($username);
                echo "<p>Account has been deleted</p>";
                closeDB();

                session_destroy();
            }





        ?>
    </body>
</html>