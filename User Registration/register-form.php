<?php


require('./connection.php');
?>

<div class="main">
    <div class="main-head">
        <h2>Register User</h2>
        <p class="page_link"><a href="login-form.php">Login Here</a></p>
    </div>

    <div class="message"></div>

    <form action="register_form.php" method="POST" name="formRegister" id="formRegister">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
        </div>

        <div class="form-group">
            <label for="confirm-password">Confirm Password</label>
            <input type="password" class="form-control" id="confirm-password" name="confirm-password"
                placeholder="Enter password">
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>


<script>
let formRegister = document.getElementById("formRegister");

formRegister.addEventListener("submit", function(e) {
    e.preventDefault()
    const username = document.forms['formRegister']['username'].value
    const password = document.forms['formRegister']['password'].value
    const confirmPassword = document.forms['formRegister']['confirm-password'].value
    const email = document.forms['formRegister']['email'].value


    if (username == "" || password == "" || confirmPassword == "" || email == "") {
        alert("Please fill all the fields")
        return
    }
    if (password !== confirmPassword) {
        alert('password does not match');
        return;
    }

    let xhr = new XMLHttpRequest();
    xhr.open('POST', `register.php`, true);
    xhr.onreadystatechange = function() {
        if (xhr.responseText) {
            document.querySelector(".message").innerHTML = xhr.responseText;
        }
    }
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send(`username=${username}&password=${password}&email=${email}`);
})
</script>