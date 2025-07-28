<?php

include 'connection.php';

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO `crudapp`.`users` (username, email, password) VALUES ('$username', '$email', '$password')";

    $result = mysqli_query($connect, $sql);


    if($result){

      echo "
      <script>
      alert('from has been submitted')
      window.location.href = 'display.php'
      </script>
      ";
        // header('location: display.php');
    }else{
        die(mysqli_connect_error($connect));
    }

    mysqli_close($connect);

}

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Curd App</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #2980b9, #6dd5fa);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }
    .form-container {
      background: #fff;
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.1);
      width: 350px;
    }
    h2 {
      text-align: center;
      margin-bottom: 30px;
      color: #333;
    }
    input[type="text"],
    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      border: none;
      border-radius: 5px;
      background: #f0f0f0;
    }
    button {
      width: 100%;
      padding: 12px;
      background: #3498db;
      color: white;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
    }
    button:hover {
      background: #2980b9;
    }
    

  .error {
    border: 2px solid red;
    background-color: #ffe6e6;
  }

  .error-message {
    color: red;
    font-size: 0.9em;
    margin-top: 4px;
  }

  .form-container label {
    display: block;
    margin-top: 12px;
  }

  .form-container input {
    display: block;
    margin-bottom: 5px;
    padding: 8px;
    width: 100%;
    box-sizing: border-box;
  }

  </style>
</head>
<body>

   


<div class="form-container">
  <h2>Create Profile Account</h2>
  <form id="profileForm" method="post" novalidate>
    <label>Username</label>
    <input type="text" name="username" placeholder="Username">
    <div class="error-message" id="usernameError"></div>

    <label>Email</label>
    <input type="email" name="email" placeholder="Email" >
    <div class="error-message" id="emailError"></div>

    <label>Password</label>
    <input type="password" name="password" placeholder="Password">
    <div class="error-message" id="passwordError"></div>

    <button type="submit" name="submit">Submit</button>
  </form>
</div>

<script>
  document.getElementById('profileForm').addEventListener('submit', function (e) {
    let isValid = true;

    const username = this.username;
    const email = this.email;
    const password = this.password;

    // Reset all
    [username, email, password].forEach(input => input.classList.remove('error'));
    ['usernameError', 'emailError', 'passwordError'].forEach(id => document.getElementById(id).textContent = '');

    // Username validation
    if (username.value.trim() === '') {
      username.classList.add('error');
      document.getElementById('usernameError').textContent = 'Username is required';
      isValid = false;
    }

    // Email validation
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email.value)) {
      email.classList.add('error');
      document.getElementById('emailError').textContent = 'Enter a valid email';
      isValid = false;
    }

    // Password validation
    if (password.value.length < 6) {
      password.classList.add('error');
      document.getElementById('passwordError').textContent = 'Password must be at least 6 characters';
      isValid = false;
    }

    if (!isValid) {
      e.preventDefault(); // Prevent form submission
    }
  });
</script>

</body>
</html>
