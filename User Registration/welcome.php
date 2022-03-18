<?php

session_start();

if($_SESSION['username'] == ""){
    header("Location: login-form.php");
}

?>
<div class="welcome">


    <div id="welcome-head">

        <h1> Welcome <?php echo $_SESSION['username']?></h1>
    </div>

    <submit class="btn"><a href="./logout.php">Logout</a></submit> 



</div>

