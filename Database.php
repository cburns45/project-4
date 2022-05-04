<?php

    //global connection

    $connection = null;

    //global database

    $db = "dig3134";

    //open connection

    function openDB(){
        global $connection;

        global $db; 

        //connect to the server 
        //Host: localhost
        //User: root
        //Password: empty
        //Database: dig3134, but use $db since the variable is made

        $connection = mysqli_connect("localhost", "root", "", $db);

        $error = mysqli_connect_errno();

        if($error){
            echo "Couldn't connect!";
        }

    }

    function createRow($username, $password) {

        // Make the global $connection local to this function
        global $connection;

       
        // Prepare statement
        //
        // Using two 'variables' (two '?') in this statement.
        $statement = mysqli_prepare(
            $connection,
            'INSERT INTO `users` (`username`, `password`) VALUES (?, ?)'
        );

        // Check if the prepared statement failed or not
        //
        // mysqli_prepare() will return the prepared statement or
        //  it will return FALSE, if it failed.
        if($statement === FALSE) {
            echo "Prepared statement failed!";
        }

        // Create a hash of the password to save.
        // (NEVER SAVE PASSWORDS IN THEIR ORIGINAL FORM!)
        $password = password_hash($password, PASSWORD_DEFAULT);

        // Bind parameters
        //Statement: $statement
        //Type: 'ss' Two string values
        //$username: Username to add
        //$password: Password to add
        //
        // mysqli_stmt_bind_param() will return FALSE if it failed
        if( !mysqli_stmt_bind_param($statement, "ss", $username, $password) ) {
            echo "Binding failed!";
        }

        // Execute query

        // mysqli_stmt_execute will return FALSE if it failed
        if( !mysqli_stmt_execute($statement) ) {
            echo "Execute failed!";
        }

        // Close statement
        
        // mysqli_stmt_close() will return FALSE if it failed
        if( !mysqli_stmt_close($statement) ) {
            echo "Statement closing failed!";
        }


    }

    function readDB($username){
        global $connection;

        //prepare statement

        $statement = mysqli_prepare($connection, "SELECT `password` FROM `users` WHERE `username` = ?");

        //check to see if the statment fails 

        if($statement === FALSE) {
            echo "Prepared statement failed!";
        }

        //bind parameters
        //check to see if that works
        if( !mysqli_stmt_bind_param($statement, "s", $username) ) {
            echo "Binding failed!";
        }

        //execute the query
        //see if it works
        if( !mysqli_stmt_execute($statement) ) {
            echo "Execute failed!";
        }

        //bind the result
        //see if the binding worked
        if ( !mysqli_stmt_bind_result($statement, $result) ) {
            echo "Binding result failed!";
        }

        //fetch the value
        //will return false if it fails
        if( !mysqli_stmt_fetch($statement) ) {
            $result = null;
        }

        //close the statement
        //make sure that works
        if( !mysqli_stmt_close($statement) ) {
            echo "Statement closing failed!";
        }

        return $result; 
    }

    // D - DELETE FROM... WHERE
    //
    function deleteRow($username) {

        // Make the global $connection local to this function
        global $connection;


        // Prepare statement
        $statement = mysqli_prepare(
            $connection,
            'DELETE FROM `users` WHERE `username` = ?'
        );

        // Check if the prepared statement failed or not

        if($statement === FALSE) {
            echo "Prepared statement failed!";
        }

        // Bind parameters
       
        // Use:
        //  - Statement: $statement
        //  - Type: 's' One string value
        //  - $username: Username to delete
        //
        //false if failed
        if( !mysqli_stmt_bind_param($statement, "s", $username) ) {
            echo "Binding failed!";
        }

        // Execute query
        //
        // mysqli_stmt_execute will return FALSE if it failed
        if( !mysqli_stmt_execute($statement) ) {
            echo "Execute failed!";
        }

        // Close statement
        //
        // mysqli_stmt_close() will return FALSE if it failed
        if( !mysqli_stmt_close($statement) ) {
            echo "Statement closing failed!";
        }

        // We don't care about results when using DELETE.
        // If nothing failed, everything was successful at this point.

    }

    //close connection
    function closeDB() {
       
        global $connection;
        //closes connection to server
        mysqli_close($connection);
    }

?>
