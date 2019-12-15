<?php
/*
 * Nate Kelley
 * Date: 9/19/19
 * This is my get all users page,
 * this page should display the variables submitted into the database.
 */
/* error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', '1');
echo " I am alive "; */

// Global Variables, keep these the same.
define('HOSTNAME', "localhost");
define('USERNAME', "root");
define('PASSWORD', "root");
define('EMPTY_STRING', "");
//variables
$dbName = "activity2";
$tableName = "members";

echo "<header><h2>Activity 2<h2></header>";
// Let's connect to our database, we are issuing DBconnect as the datatbase.
$dbConnect = mysqli_connect(HOSTNAME, USERNAME, PASSWORD);

// Condition to test for success of data, displays a successful connection.
if (! $dbConnect) {
    echo "<p> Connection error: " . mysqli_connect_error() . "</p>"; // display an error if anything happened.
} // Failed connection says users name
else {
    if (mysqli_select_db($dbConnect, $dbName)) {
        echo "<p> Successfully connected " . $dbName . " database. </p>";
        
        $sql = "SELECT ID, firstName,lastName FROM $tableName";
        
        // this will be our result
        if ($result = mysqli_query($dbConnect, $sql)) {
            // echo "<p> worked </p>";
            if (mysqli_num_rows($result) > 0) {
                                
                $rowNumber = 0;
               
                while ($row = mysqli_fetch_assoc($result)) {
                     $rowNumber++;
                    echo " <strong> $rowNumber</strong> ";
                    foreach ($row as $column ){
                        echo "$column";
                    }
                    echo "<br>";
                }
            }
            else {
                echo "<p> no users registered</p>";
            }
        }
        else {
            echo "<p> Error </p>" . mysqli_error($dbConnect);
        }
    }
    else {
        echo "<p> could not select the space " . $dbName . " database. </p>";
    }
    echo " Database is Closing: ";
    mysqli_close($dbConnect);
}
?>