<?php
/*
 * Nate Kelley
 * Date: 11/4/19
 * This is my page handler for my HTML post form,
 * this page should display the posting variables submitted into the database.
 */
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', '1');
// echo " I am alive ";

// require my functions
require_once ('myfuncs.php');
// check your db name
$dbName = "activity2";

// check the name of your table
$tablename = "members";

// match your database
getAllUsers($dbName, $tablename);

/**
 *
 * @param
 *            dbName
 * @param
 *            tablename
 */
function getAllUsers($dbName, $tablename)
{ // name the Array here
    $users = array();
    $index = 0;

    $dbConnect = connect($dbName);

    // success
    if ($dbConnect) {
        $sql = "SELECT ID, username, firstName, lastName FROM $tablename";

        if ($result = $dbConnect->query($sql)) {

            if ($result->num_rows === 0) {

                echo " no users found ";
            } else {

                // echo " <p> " . $result->num_rows . " users are registered </p> ";

                while ($row = $result->fetch_assoc()) {
                    // need your variables for your users
                    $users[$index] = array(
                        $row['ID'],
                        $row['username'],
                        $row['firstName'],
                        $row['lastName']
                    );
                    $index ++;
                }
            }
        } else {
            // fail
            echo "<p> Error" . $dbConnect->error . "</p>";
        }
    }

    $dbConnect->close();
    return $users;
}

// we need two different users to make blog posts.
// getAllBlogs($dbName, 'posts');
function getAllBlogs($dbName, $tablename)
{ // name the Array here
    $blogs = array();
    $index = 0;
    $dbConnect = connect($dbName);

    // success
    if ($dbConnect->connect_error) {
        echo "<p> Cennection error " . $dbConnect->connect_error . "</p>";
    } else {
        $sql = "SELECT * FROM  $tablename";

        if ($result = $dbConnect->query($sql)) {

            if ($result->num_rows === 0) {

                echo "no users found";
            } else {

                while ($row = $result->fetch_assoc()) {
                    // need your variables for your users
                    $blogs[$index] = array(
                        $row['PostID'],
                        $row['members_ID'],
                        $row['Title'],
                        $row['Content']
                    );
                    $index ++;
                }
            }
        } else {
            // fail
            echo "<p> Error" . $dbConnect->error . "</p>";
        }
    }

    $dbConnect->close();
    return $blogs;
}

function getUser($dbName, $tablename, $id)
{
    $user = "";
    $dbConnect = connect($dbName);

    $sql = "SELECT username FROM $tablename WHERE ID=" . $id;

    if ($result = $dbConnect->query($sql)) {
        if ($result->num_rows != 0) {
            $row = $result->fetch_assoc();
            $user = $row['username']; // this needs to get fixed
        }
    } else {
        // fail
        echo "<p>Error" . $dbConnect->error . "</p>";
    }

    $dbConnect->close();
    return $user;
}

function updateBlog($dbName, $tablename, $PostID, $userID, $Content)
{
    $dbConnect = connect($dbName);
    $sql = "UPDATE $tablename 
            SET USERS_ID_LastPost='" . $userID . "', 
            Content='" . $Content . "' 
            WHERE PostID='" . $PostID . "'";

    if ($result = $dbConnect->query($sql)) {
        echo " Update Successful";
    } else {
        // fail
        echo "<p>Error" . $dbConnect->error . "</p>";
    }
    $dbConnect->close();
    return;
}

function deleteBlog($dbName, $tablename, $PostID)
{
    $dbConnect = connect($dbName);
    $sql = "DELETE FROM  $tablename
    WHERE PostID='" . $PostID . "'";

    if ($result = $dbConnect->query($sql)) {
        echo " Deleted ";
    } else {
        // fail
        echo "<p>Error" . $dbConnect->error . "</p>";
    }

    $dbConnect->close();

    return;
}

function searchBlog($dbName, $tablename, $Title, $Content)
{
    $blogs = array();
    $index = 0;
    $dbConnect = connect($dbName);

    // success
    if ($dbConnect->connect_error) {
        echo "<p> Cennection error " . $dbConnect->connect_error . "</p>";
    } else {
        $sql = " SELECT * FROM $tablename WHERE Title LIKE '%" . $Title . "%' AND Content LIKE '%" . $Content . "%'";

        if ($result = $dbConnect->query($sql)) {

            if ($result->num_rows === 0) {

                echo "no users found";
            } else {

                while ($row = $result->fetch_assoc()) {
                    // need your variables for your users
                    $blogs[$index] = array(
                        $row['PostID'],
                        $row['members_ID'],
                        $row['Title'],
                        $row['Content']
                    );

                    $index ++;
                }
            }
        } else {
            // fail
            echo "<p> Error" . $dbConnect->error . "</p>";
        }
    }

    $dbConnect->close();
    return $blogs;
}

?>

