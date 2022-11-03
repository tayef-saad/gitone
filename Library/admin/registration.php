<?php
  include "connection.php";
  include "navbar.php";
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>
      Admin Registration
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
        <br>
        <div class="reg_box">

          <h1 style="font-family:arial; text-align: center; font-size: 20px;">Library Management System</h1>
          <h1 style="font-family:arial; text-align: center; font-size: 15px;"><i>User Registration Form</i></h1>
          <br>
          <form name="registration" class="" action="" method="post">

            <div class="login">
              <input class="form-control" type="text" name="first" placeholder="First Name" required="">
              <br>
              <input class="form-control" type="text" name="last" placeholder="Last Name" required="">
              <br>
              <input class="form-control" type="text" name="email" placeholder="Email" required="">
              <br>
              <input class="form-control" type="text" name="username" placeholder="Username" required="">
              <br>
              <input class="form-control" type="password" name="password" placeholder="Password" required="">
              <br>
              <input class="form-control" type="text" name="phone" placeholder="Phone No" required="">
              <br>
              <!--<button>Sign Up</button>-->
              <input class="btn btn-default" type="submit" name="submit" value="Sign Up" style= "color: white; background-color: #41ad29; width: 90px; height: 35px">
            </div>
          </form>
        </div>
      </div>
    </section>

    <?php

      if(isset($_POST['submit']))
      {
        $count=0;
        $sql="SELECT username FROM `admin`";
        $result=mysqli_query($db,$sql);

        while ($row=mysqli_fetch_assoc($result))
        {
          if($row['username']==$_POST['username'])
          {
            $count=$count+1;
          }
        }

        if($count==0)
        {
          mysqli_query($db,"INSERT INTO `admin` VALUES('$_POST[first]', '$_POST[last]', '',
          '$_POST[email]', '$_POST[username]', '$_POST[password]', '$_POST[phone]');");

        ?>
        <script type="text/javascript">
          alert("Registration Successful");
        </script>
        <?php
        }

        else
        {
          ?>
          <script type="text/javascript">
          alert("The Username already exists.");
          </script>
          <?php
        }
      }

    ?>
  </body>
