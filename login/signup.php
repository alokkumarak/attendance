<?php

require_once 'db_connect.php';

if(isset($_POST['signup-btn'])) {

      $username = $_POST['user-name'];
      $email = $_POST['user-email'];
      $password = $_POST['user-pass'];
      $college = $_POST['user-coll'];
      $registration = $_POST['user-regi'];
      $mobile = $_POST['user-mob'];

      $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    try {
      $SQLInsert = "INSERT INTO users (username, password, email, college, registration, mobile, to_date)
                   VALUES (:username, :password, :email, :college, :registration, :mobile, current_timestamp())";

      $statement = $conn->prepare($SQLInsert);
      $statement->execute(array(':username' => $username, ':password' => $hashed_password, ':email' => $email, 
      ':college' => $college,':registration' => $registration,':mobile' => $mobile));

      if($statement->rowCount() == 1) {
        header('location: index.html');
      }
    }
    catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }

}

?>