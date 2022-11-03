<?php
  include "connection.php";
  include "navbar.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Student Information</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
      .srch
      {
        padding-left: 1250px;
      }
      body {
        font-family: "Lato", sans-serif;
        transition: background-color .5s;
      }

      .sidenav {
        height: 100%;
        margin-top: 50px;
        width: 0;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: #222;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;
      }

      .sidenav a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 25px;
        color: #818181;
        display: block;
        transition: 0.3s;
      }

      .sidenav a:hover {
        color: #f1f1f1;
      }

      .sidenav .closebtn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
        margin-left: 50px;
      }

      #main {
        transition: margin-left .5s;
        padding: 16px;
      }

      @media screen and (max-height: 450px) {
        .sidenav {padding-top: 15px;}
        .sidenav a {font-size: 18px;}
      }
    </style>
  </head>
  <body>
    <!--_______________sidenav________________-->
    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <a href="books.php">Books</a>
      <a href="request.php">Book Request</a>
      <a href="issue_info.php">Issue Information</a>
      <a href="expired.php">Expired List</a>
    </div>

    <div id="main">
      <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; menu</span>

    <script>
    function openNav() {
      document.getElementById("mySidenav").style.width = "300px";
      document.getElementById("main").style.marginLeft = "300px";
      document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
    }

    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
      document.getElementById("main").style.marginLeft= "0";
      document.body.style.backgroundColor = "white";
    }
    </script>
    <!--_____________search bar__________________-->
    <div class="srch">
      <form class="navbar-form" method="post" name="form1">

          <input class="form-control" type="text" name="search" placeholder="search username..." required="">
          <button style="background-color: #6db6b9e6" type="submit" name="submit" class="btn btn-default">
            <span class="glyphicon glyphicon-search"></span>
          </button>


      </form>

    </div>
    <h2>List of Students</h2>
    <?php
    if (isset($_POST['submit']))
    {
      $q=mysqli_query($db,"SELECT first, last, roll, email, username, phone FROM student WHERE username like '%$_POST[search]%' ");
      if(mysqli_num_rows($q)==0)
      {
        echo "Sorry! No student found with that username. Try searching again.";
      }
      else
      {
        echo "<table class='table table-bordered table-hover' >";
          echo "<tr style='background-color: #6db6b9e6;'>";

              echo "<th>";  echo "First Name";  echo "</th>";
              echo "<th>";  echo "Last Name";  echo "</th>";
              echo "<th>";  echo "Roll";  echo "</th>";
              echo "<th>";  echo "Email";  echo "</th>";
              echo "<th>";  echo "Username";  echo "</th>";
              echo "<th>";  echo "Phone";  echo "</th>";


          echo "</tr>";

          while($row=mysqli_fetch_assoc($q))
          {
            echo "<tr>";
            echo "<td>";  echo $row['first'];  echo "</td>";
            echo "<td>";  echo $row['last'];  echo "</td>";
            echo "<td>";  echo $row['roll'];  echo "</td>";
            echo "<td>";  echo $row['email'];  echo "</td>";
            echo "<td>";  echo $row['username'];  echo "</td>";
            echo "<td>";  echo $row['phone'];  echo "</td>";
            echo "</tr>";
          }
        echo "</table>";
      }
    }
    /*if the button is not pressd*/
    else
    {
      $result=mysqli_query($db,"SELECT first, last, roll, email, username, phone FROM student;");

      echo "<table class='table table-bordered table-hover' >";
      echo "<tr style='background-color: #6db6b9e6;'>";

          echo "<th>";  echo "First Name";  echo "</th>";
          echo "<th>";  echo "Last Name";  echo "</th>";
          echo "<th>";  echo "Roll";  echo "</th>";
          echo "<th>";  echo "Email";  echo "</th>";
          echo "<th>";  echo "Username";  echo "</th>";
          echo "<th>";  echo "Phone";  echo "</th>";

      echo "</tr>";

      while($row=mysqli_fetch_assoc($result))
      {
        echo "<tr>";
          echo "<td>";  echo $row['first'];  echo "</td>";
          echo "<td>";  echo $row['last'];  echo "</td>";
          echo "<td>";  echo $row['roll'];  echo "</td>";
          echo "<td>";  echo $row['email'];  echo "</td>";
          echo "<td>";  echo $row['username'];  echo "</td>";
          echo "<td>";  echo $row['phone'];  echo "</td>";

        echo "</tr>";
      }
    echo "</table>";
    }

    ?>
  </body>
</html>
