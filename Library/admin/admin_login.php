<?php
  include "connection.php";
  include "navbar.php";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>
      Student Login
    </title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width = device - width, initial - scale = 1">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  </head>
  <body>
    <!--
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
        <a class="navbar-brand active">CITY LIBRARY</a>
        </div>

        <ul class="nav navbar-nav">
          <li><a href="index.php">HOME</a></li>
          <li><a href="books.php">BOOKS</a></li>
          <li><a href="feedback.php">FEEDBACK</a></li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
          <li><a href="student_login.php"><span class="glyphicon glyphicon-log-in"> LOGIN </span></a></li>
          <li><a href="student_login.php"><span class="glyphicon glyphicon-log-out"> LOGOUT</span></a></li>
          <li><a href="registration.php"><span class="glyphicon glyphicon-user"> SIGN UP</span></a></li>
        </ul>
      </div>
    </nav>
  -->

    <!--
    <header>
      <div class="logo">
        <img src="images/city library.png", height="80px">
      </div>

      <nav>
        <ul>
          <li><a href="index.html">HOME</a></li>
          <li><a href="">BOOKS</a></li>
          <li><a href="student_login.html">STUDENT-LOGIN</a></li>
          <li><a href="registration.html">REGISTRATION</a></li>
          <li><a href="">FEEDBACK</a></li>
        </ul>
      </nav>
    </header>
    -->
    <section>
      <div class="log_img">
        <br><br><br><br><br>
        <div class="login_box">
          <br>
          <h1 style="font-family:arial; text-align: center; font-size: 20px;">Library Management System</h1>
          <h1 style="font-family:arial; text-align: center; font-size: 15px;"><i>User Login Form</i></h1>
          <form name="login" class="" action="" method="post">
            <br>
            <div class="login">
            <input class="form-control" type="text" name="username" placeholder="Username" required="">
            <br>
            <input class="form-control" type="password" name="password" placeholder="Password" required="">
            <br>
            <!--<button>Login</button>-->
            <input class="btn btn-default" type="submit" name="submit" value="Login" style= "color: white;
            background-color: #41ad29; width: 70px; height: 35px">
            </div>

          <p>
            <br>&nbsp &nbsp &nbsp &nbsp
            <a style="font-family:arial"; href="update_password.php">Forgot Password</a>
            &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp New to this Website?
            <a style="font-family:arial"; href="registration.php">Sign Up</a>
          </p>
        </div>
        </form>
      </div>
    </section>

    <?php
      if(isset($_POST['submit']))
      {
        $count=0;
        $result=mysqli_query($db,"SELECT * FROM `admin` WHERE username='$_POST[username]' AND password='$_POST[password]';");
        $count=mysqli_num_rows($result);
        if($count==0)
        {
          ?>
                  <!--
                  <script type="text/javascript">
                    alert("The Username and Password don't match");
                  </script>
                  -->
            <div class="alert alert-danger" style="width: 600px; margin-left: 465px">
              <strong style="margin-left: 150px">The Username and Password don't match.</strong>

            </div>
          <?php
        }
        else
        {
          $_SESSION['login_user'] = $_POST['username'];
          ?>
          <script type="text/javascript">
            window.location="index.php"
          </script>
          <?php
        }
      }

    ?>
  </body>
</html>
