<?php
include "status.php";

?>


<html>
    <head>
    <link rel="stylesheet" type="text/css" href="main.css">
    
    </head>
    <body>
        
        
        <?php 
        include "header.php";
        
        
        

            if($loggedin){?>
                <h1>Hey, you're logged in. Good for you!</h1>
                <p>Enjoy this meme.</p>
                <img src="https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/womanyellingcat-1573233850.jpg?resize=480:*" alt="Cat meme">

        <?php } else  { ?>
            
            <form action="login.php" method="post">
                <p>Username:</p>
                <input type="text" name="username">
                <p>Password:</p>
                <input type="password" name="password">
                <button type="submit">SUBMIT</button>
            </form>
           <?php include "validation.php"; ?>
           

        <?php } ?>
        

        
    </body>
</html>