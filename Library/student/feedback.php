<?php
  include "navbar.php";
  include "connection.php";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Feedback</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width = device - width, initial - scale = 1">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style type="text/css">
      body
      {
        background-image: url("images/5.jpg");
      }
      .wrapper
      {
        padding: 50px;
        margin: 20px auto;
        width: 900px;
        height: 600px;
        background-color: white;
        opacity: .9;
      }
      .form-control
      {
        height: 70px;
        width: 60%;
      }
      .scroll
      {
        width: 100%;
        height: 297px;
        overflow: auto;
      }

    </style>
  </head>
  <body>
    <div class="wrapper">
      <h4>If you have any suggestions or questions, please comment below.</h4>
      <form class="" action="feedback.php" method="post">
        <input class="form-control" type="text" name="comment" value="" placeholder="Write something..." required="">
        <br>
        <input class="btn btn-primary" type="submit" name="submit" value="Comment" style="width: 150px; height: 35px;">

      </form>
      <br><br>

    <div class="scroll">
      <?php
        if(isset($_POST['submit']))
        {
              $sql="INSERT INTO `comments` (username,comment) VALUES ('$_SESSION[login_user]', '".$_POST['comment']."');";
            
          if(mysqli_query($db,$sql))
          {
            $q="SELECT * FROM `comments` ORDER BY `comments`.`id` DESC";
            $result=mysqli_query($db,$q);

            echo "<table class='table table-bordered'>";
            while($row=mysqli_fetch_assoc($result))
            {
              echo "<tr>";
                echo "<td>";  echo $row['username'];  echo "</td>";
                echo "<td>";  echo $row['comment'];  echo "</td>";
              echo "</tr>";
            }
          }
        }

        else
        {
          $q="SELECT * FROM `comments` ORDER BY `comments`.`id` DESC";
          $result=mysqli_query($db,$q);

          echo "<table class='table table-bordered'>";
          while($row=mysqli_fetch_assoc($result))
          {
            echo "<tr>";
              echo "<td>";  echo $row['username'];  echo "</td>";
              echo "<td>";  echo $row['comment'];  echo "</td>";
            echo "</tr>";
          }
        }
      ?>
    </div>

    </div>
  </body>
</html>
