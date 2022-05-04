<?php
    include "status.php";

?>

<html>
    <?php
        if($loggedin){
            session_destroy();
        }

    ?>
    <p>
        <a href="index.php">Back to Home</a>
    </p>
    

</html>

