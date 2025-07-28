<?php

include 'connection.php';

$id = $_GET['deleteid'];
$sql = "delete from `crudapp`.`users` where id=$id";
$result = mysqli_query($connect, $sql);

if($result){

      echo "
      <script>
      alert('Delete data has been submitted')
      window.location.href = 'display.php'
      </script>
      ";
        // header('location: display.php');
    }else{
        die(mysqli_connect_error($connect));
    }

    mysqli_close($connect);

?>
