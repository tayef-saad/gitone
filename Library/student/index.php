<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>
      Online Library Management System
    </title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width = device - width, initial - scale = 1">

    <style type="text/css">
      nav
      {
        float: right;
        font-family: sans-serif;
        word-spacing: 25px;
        padding: 10px;
      }
      nav li
      {
        display: inline-block;
        line-height: 60px;
      }
    </style>
  </head>


  <body>
    <div class="wrapper">
    <header>
      <div class="logo">
        <img src="images/city library.png", height="80px">
      </div>

      <?php
      if(isset($_SESSION['login_user']))
      {
        ?>
          <nav>
            <ul>
              <li><a href="index.php">HOME</a></li>
              <li><a href="books.php">BOOKS</a></li>
              <li><a href="logout.php">LOGOUT</a></li>
              <li><a href="feedback.php">FEEDBACK</a></li>
            </ul>
          </nav>
        <?php
      }
      else
      {?>
          <nav>
            <ul>
              <li><a href="index.php">HOME</a></li>
              <li><a href="books.php">BOOKS</a></li>
              <li><a href="student_login.php">STUDENT-LOGIN</a></li>
              <li><a href="feedback.php">FEEDBACK</a></li>
            </ul>
          </nav>
        <?php
      }
      ?>

    </header>
    <section>
    <div class="sec_img">
      <div class="index_box">
        <br><br><h1 style="font-family:arial; text-align: center; font-size: 40px;">Welcome to City Library</h1><br>
        <h1 style="font-family:arial; text-align: center; font-size: 30px;"><i>Gate Opens at: 8.00</i></h1><br>
        <h1 style="font-family:arial; text-align: center; font-size: 30px;"><i>Gate Closes at: 20.00</i></h1><br>

      </div>
    </div>
    </section>
    <footer>
      <p style="font-family:arial; color:white; text-align:center">
        <br>
        Email: &nbspcity.library@gmail.com <br>
        Mobile: &nbsp01*********
      </p>
    </footer>

    </div>
  </body>
</html>
