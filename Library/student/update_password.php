<?php
  include "connection.php";
  include "navbar.php";
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Change Password</title>

    <style type="text/css">
      body
      {
        height: 713px;
        background-image: url("images/2.jpg");
        background-repeat: no-repeat;
      }
      .wrapper
      {
        width: 400px;
        height: 400px;
        margin: 110px auto;;
        background-color: white;
        opacity: .9;
      }
      .form-control
      {
        width: 240px;
      }
    </style>
  </head>
  <body>
    <div class="wrapper">
      <br>
      <div style="text-align: center;">
        <h1 style="font-family:arial; text-align: center; font-size: 20px;">Library Management System</h1>
        <h1 style="font-family:arial; text-align: center; font-size: 15px;"><i>Change Your Password</i></h1>
      </div>
      <div style="padding-left: 80px">
      <form class="" action="" method="post">
        <input type="text" name="username" class="form-control" placeholder="Username" required=""><br>
        <input type="text" name="email" class="form-control" placeholder="Email" required=""><br>
        <input type="password" name="password" class="form-control" placeholder="New Password" required=""><br>
        <button class="btn btn-info" type="submit" name="submit">Update</button>
      </form>
      </div>
    </div>
    <?php
      if(isset($_POST['submit']))
      {
        if(mysqli_query($db,"UPDATE `student` SET password='$_POST[password]' WHERE username='$_POST[username]' AND email='$_POST[email]';"))
        {
          ?>
          <script type="text/javascript">
            alert("The password has updated successfully.");
          </script>
          <?php
        }
      }

    ?>
  </body>
</html>
