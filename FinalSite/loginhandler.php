<?php
/*
 * Nate Kelley
 * Date: 10/1/19
 * This is my page handler for my HTML form,
 * this page should display the variables submitted into the database.
 */

// need my API, required and includes
require_once ('myfuncs.php');

// Global Variables, keep these the same.
define('EMPTY_STRING',"");
// Variables
$dbName = "activity2";
$tableName = "members";
$message = "";
// //failed attempt.
if (! isset($_POST['submit'])) { // if not set<--
    die("Post Failed no data");
} // we have good data, "trim" removes white space
else {
    $userName = trim($_POST['userName']);
    $password = trim($_POST['Password']);
}

$dbConnect = connect($dbName);

// Condition to test for success of data, displays a successful connection.
if ($dbConnect) {
    // validate the data inpusst
    if ($userName === NULL || $userName === EMPTY_STRING || $password === NULL || $password === EMPTY_STRING) {
        echo "<p> userName is <b><em>required field</em></b> and cannot be blank </p>";
    } else {
        // the values are entering the table name, and entered into the last and first name areas.
        $sql = "SELECT ID, USERNAME, PASSWORD FROM $tableName
                WHERE userName='" . $userName . "'" . "AND password ='" . $password . "'";
    }

    // this will be our result
    if ($result = $dbConnect->query($sql)) {
        $nbrRows = $result->num_rows;
        if ($nbrRows == 1) {
            // this fetch will take said rows and will build an array with buckets that are labaled in the datafield names
            $row = $result->fetch_assoc();
            
            setUserID($row['ID']);
            
            //changed this from longinResponse to below.
            include ('makeBlogRequest.php');
            
        } else if ($nbrRows == 0) {
            // echo "<p>Login failed</p>";
            $message = "Login Failed";
            
           include_once ('loginFail.php');
            
        } else if ($nbrRows > 1) {
            
            $message = "Multiple users found";
            
            include_once ('loginFail.php');
            
        } else {
            $message = "Unknown Error";
            
            include_once ('loginFail.php');
        }
    } else {
        echo "<p> Error" . mysqli_error($dbConnect) . "</p>";
    }

    //echo " Database is Closing:";
    $dbConnect->close();
}
?>

