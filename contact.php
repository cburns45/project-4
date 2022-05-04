<?php
        include "status.php";
?>

<!Doctype HTML>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="main.css">

    </head>

        <body>
        <?php 
        include "header.php";
    ?>
    <div>
        <form action="index.php" method="post">

                <div id="info">

                    <dl>
                        <div>
                                <dt><label for="first_name">First Name:</label></dt>
                                <dd><input type="text" id="first_name" name="first_name" value="" /></dd>
                        </div>

                        <div>
                                <dt><label for="last_name">Last Name:</label></dt>
                                <dd><input type="text" id="last_name" name="last_name" value="" /></dd>
                        </div>
                        
                        <div>
                                <dt><label for="email_address">E-mail Adress:</label></dt>
                                <dd><input type="text" id="email_address" name="email_address" value="" /></dd>
                        </div>

                        <div>
                                <dt><label for="message">Message</label></dt>
                                <dd><textarea name="message" id="message" cols="30" rows="10"></textarea></dd>
                        </div>

                    </dl>

                    <button type="submit">Submit</button>
                    
                </div>
            
         </form> 
    </div>

                <?php 
                        $first= "first_name";
                        $last = "last_name";
                        $email= "email_address";
                        $message = "message";
                        
                ?>
                        <?php 
                        if(isset($_POST[$first])) { 
                                echo $_POST[$first] 
                        ?>
                        <?php } else { ?>
                                <?php echo " \nPlease enter your first name"; ?>
                        <?php  } ?>

                        <?php 
                        if(isset($_POST[$last])) { 
                                echo $_POST[$last] 
                        ?>
                       <?php } else { ?>
                                <?php echo " \nPlease enter your last name"; ?>
                        <?php  } ?> 

                        <?php 
                        if(isset($_POST[$email])) { 
                                 echo $_POST[$email] 
                        ?>
                       <?php } else { ?>
                                <?php echo " \nPlease enter an email"; ?>
                        <?php  } ?>

                        <?php 
                        if(isset($_POST[$message])) { 
                                echo $_POST[$message]
                        ?>
                       <?php } else { ?>
                                <?php echo " \nsend me a message!"; ?>
                        <?php  } ?>

        </body>

</html>