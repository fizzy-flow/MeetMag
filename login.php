<?php
  session_start(); 
  $email = null;
  $password = null;
  $userError = null;
  $passError = null;
  if(isset($_POST['submit'])){
      ## connect mysql server
    $mysqli = new mysqli('localhost', 'root', 'List7Arch7tailor', 'testdeco3801');
    # check connection
    if ($mysqli->connect_errno) {
        echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
        exit();
    }
    $email = $_POST['loginemail']; 
    $password = md5($_POST['password']);
    $sql = "SELECT * from users WHERE email = '{$email}' AND password = '{$password}' LIMIT 1";
    $result = $mysqli->query($sql);

    //if combination is wrong
    if (!$result->num_rows == 1) {
        echo "<p>Invalid username/password combination</p>";
        header("Location:index.php");
    } 
    //if combination is right
    else {
      $_SESSION['email'] = $email;
      $_SESSION['password'] = $password;
      echo "<p>Logged in successfully</p>";
      header('Location:menu.html');
    }

}
?>