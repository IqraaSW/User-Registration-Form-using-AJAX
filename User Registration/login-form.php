<?php

session_start();

require('./connection.php');
?>
<div class="main">

    <div class="main-head">
        <h2>Login</h2>
        <a href="register-form.php">Register Here</a>
    </div>

    <form action="login-form.php" method="GET" name="formLogin" id="formLogin">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
        </div>
        <button type="submit" class="btn btn-success buttons">Submit</button>
    </form>

    <div class="dataContainer"></div>
</div>



<script>
let formLogin = document.getElementById("formLogin");
formLogin.addEventListener("submit", fetchData);

function fetchData(e) {
    e.preventDefault()

    let username = document.getElementById("username").value;
    let password = document.getElementById("password").value;

    if (username == "" || password == "") {
        alert("Please fill all the fields");
        return false;
    }


    let xhr = new XMLHttpRequest(); 
    xhr.onreadystatechange = function() {
        if (xhr.responseText.includes('success')) {
            window.location.href = "./welcome-page.php";
        } else {
            console.log(xhr.responseText)
            document.querySelector('.dataContainer').innerHTML = xhr.responseText;
        }
    }
    xhr.open('GET', `login.php?username=${username}&password=${password}`, true); 
    xhr.send(); 

}
</script>