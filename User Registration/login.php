<?php

session_start();

$username = $_GET['username'];
$password = $_GET['password'];



$sql = "SELECT `username`, `password` FROM `user` WHERE `username` = '$username'";


if($result = mysqli_query($conn, $sql)) {
    if (mysqli_num_rows($result) > 0)   {
       while($row = mysqli_fetch_array($result)){
           if ($row['password'] == $password) {
                  $_SESSION['username'] = $username;
               echo '<p class="alert alert-success mt-3" role="alert">success</p>';

           } else {
               echo '<p class="alert alert-danger mt-3" role="alert">wrong password</p>';
           }
       }
    }else {
        echo '<p class="alert alert-danger mt-3" role="alert">user not found</p>';
    }
}
else {
    echo '<p class="alert alert-danger mt-3" role="alert">Error adding data</p>';
    //echo "ERROR: Could not able to execute $insertRecord. " . mysqli_error($conn);
}
    ?>