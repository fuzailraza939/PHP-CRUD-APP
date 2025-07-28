<?php

include 'connection.php';
?>

<!DOCTYPE html>


<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>crudapp</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #eaeff2;
      margin: 0;
      padding: 0;
    }

    .header {
      background: purple; /* Dark blue */
      color: white;
      text-align: center;
      padding: 15px 0;
      border-top: 5px solid black; /* Sky blue */
    }

    .header h2 {
      margin: 0;
      font-size: 28px;
    }

    .container {
      max-width: 800px;
      margin: 40px auto;
      padding: 20px;
      background: white;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .add-user-btn {
      display: inline-block;
      background-color: #2196f3; /* Blue */
      color: white;
      padding: 10px 15px;
      border: none;
      border-radius: 4px;
      margin-bottom: 20px;
      cursor: pointer;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    table th, table td {
      padding: 12px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    table th {
      background-color: #f1f1f1;
    }

    .btn-update {
      background-color: #009688; /* Teal */
      color: white;
      border: none;
      padding: 6px 12px;
      margin-right: 5px;
      border-radius: 4px;
      cursor: pointer;
    }

    .btn-delete {
      background-color: #c62828; /* Dark red */
      color: white;
      border: none;
      padding: 6px 12px;
      border-radius: 4px;
      cursor: pointer;
    }
  </style>
</head>
<body>

  <div class="header">
    <h2>CRUD-OPERATION</h2>
  </div>

  <div class="container">
    <button class="add-user-btn">Add User</button>

    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Username</th>
          <th>Email</th>
          <th>Password</th>
          <th>Option</th>
        </tr>
      </thead>
      <tbody>
        <!-- Example Row (Empty) -->

        <?php
         $sql = "select *from `crudapp`.`users`";
         $result = mysqli_query($connect, $sql);

         if($result){
          // $row = mysqli_fetch_assoc($result);
          // echo $row['username'];


          while($row = mysqli_fetch_assoc($result)){
            $id = $row['id'];
           $username = $row['username'];
            $email = $row['email'];
             $password = $row['password'];

             echo '
             
             <tr>
          <td>'.$id.'</td>
          <td>'.$username.'</td>
          <td>'.$email.'</td>
          <td>'.$password.'</td>
          <td>
             <a href="update.php?updateid='.$id.'" class="btn btn-update">Update</a>
             <a href="delete.php?deleteid='.$id.'" class="btn btn-delete">Delete</a>
          </td>
        </tr>

             ';




          }
         }


?>



      </tbody>
    </table>
  </div>