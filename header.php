<nav>
    <a href="contact.php">Contact</a>
    <a href="index.php">Home page</a>
    <a href="login.php">Login page</a> 
    <a href="accountcreation.php">Create an Account</a>

    <?php
    
        if ($loggedin) { ?>
             <a href="deleteaccount.php">Delete your account</a> 
             <a href="logout.php">logout</a>
    <?php } ?>
    
</nav>