<?php
session_start();
// $role = $_SESSION['role'];
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <title>Hello, world!</title>
</head>

<body>
  <div class="container my-5">


    <form action="login.php" method="post">
      <?php
      if (isset ($_POST["submit"])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        require_once 'connect.php';
        $sql = "SELECT * FROM user WHERE email = '$email'";
        $result = mysqli_query($con, $sql);
        $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if ($user) {

          header("location:index.php");

        } else {
          echo "<div class='alert alert-danger'>Email do not exists</div>";
        }
      }
      ?>
      <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control" name="email" placeholder="Enter your email">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" name="password" placeholder="Enter your password">
      </div>

      <button type="submit" class="btn btn-primary" name="submit">Login</button>
    </form>
  </div>
</body>

</html>