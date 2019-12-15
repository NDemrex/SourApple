<?php

 /* Nate Kelley
 * Date: 10/1/19
 * connection to database
 * 
 */

//define my results
define('HOSTNAME', "localhost");
define('USERNAME', "root");
define('PASSWORD', "root");

/**
 * @param 
 *          dbName
 */

function connect($dbName)
{
    // Let's connect to our database, we are issuing DBconnect as the datatbase.
    $dbConnect = new mysqli(HOSTNAME, USERNAME, PASSWORD, $dbName);
    if ($dbConnect ->connect_error ) {
        echo "<p> Connection error: " . $dbConnect->connect_error ."</p>"; // display an error if anything happened.
    } // Failed connection says users name
    else {
    return $dbConnect;
}
}

function setUserID($id) {
    session_start();
    $_SESSION['members_ID'] = $id;
   return ;
}

function getUserID() {
    session_start();
    return $_SESSION['members_ID'];
}
?>