<?php
  include "connection.php";
  include "navbar.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Books</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
      .srch
      {
        padding-left: 1221px;
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
      <a href="add.php">Add Books</a>
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
    <!--_____________ search bar for books starts __________________-->

    <div class="srch">
      <form class="navbar-form" method="post" name="form1">

          <input class="form-control" type="text" name="search" placeholder="search books..." required="">
          <button style="background-color: #6db6b9e6" type="submit" name="submit" class="btn btn-default">
            <span class="glyphicon glyphicon-search"></span>
          </button>
      </form>


      <!-- kaaj choltese -->
      <form class="navbar-form" method="post" name="form1">

          <input class="form-control" type="text" name="search_auth" placeholder="search author..." required="">
          <button style="background-color: #6db6b9e6" type="submit" name="submit_auth" class="btn btn-default">
            <span class="glyphicon glyphicon-search"></span>
          </button>
      </form>
      <!-- kaaj shesh -->

      <!-- genre er kaaj choltese -->
      <form class="navbar-form" method="post" name="form1">

          <input class="form-control" type="text" name="search_genre" placeholder="search genre..." required="">
          <button style="background-color: #6db6b9e6" type="submit" name="submit_genre" class="btn btn-default">
            <span class="glyphicon glyphicon-search"></span>
          </button>
      </form>
      <!-- genre er kaaj shesh -->


      <form class="navbar-form" method="post" name="form1">
          <input class="form-control" type="text" name="isbn" placeholder="Enter Book ISBN" required="">
          <button style="background-color: #6db6b9e6" type="submit" name="submit_del" class="btn btn-default">
            Delete
          </button>


      </form>
    </div>

    <?php


    if (isset($_POST['submit']))
    {

      ?>

      <h2>Search result for you desired Book - </h2>

      <?php


      $q=mysqli_query($db,"SELECT * FROM books WHERE name like '%$_POST[search]%' ");
      if(mysqli_num_rows($q)==0)
      {
        echo "Sorry! No book found. Try searching again.";
      }
      else
      {
        echo "<table class='table table-bordered table-hover' >";
          echo "<tr style='background-color: #6db6b9e6;'>";

              echo "<th>";  echo "ISBN";  echo "</th>";
              echo "<th>";  echo "Book Name";  echo "</th>";
              echo "<th>";  echo "Author Name";  echo "</th>";
              echo "<th>";  echo "Edition";  echo "</th>";
              echo "<th>";  echo "Publication";  echo "</th>";
              echo "<th>";  echo "Status";  echo "</th>";
              echo "<th>";  echo "Quantity";  echo "</th>";
              echo "<th>";  echo "Department";  echo "</th>";

          echo "</tr>";

          while($row=mysqli_fetch_assoc($q))
          {
            echo "<tr>";
              echo "<td>";  echo $row['isbn'];  echo "</td>";
              echo "<td>";  echo $row['name'];  echo "</td>";
              echo "<td>";  echo $row['author'];  echo "</td>";
              echo "<td>";  echo $row['edition'];  echo "</td>";
              echo "<td>";  echo $row['publication'];  echo "</td>";
              echo "<td>";  echo $row['status'];  echo "</td>";
              echo "<td>";  echo $row['quantity'];  echo "</td>";
              echo "<td>";  echo $row['department'];  echo "</td>";

            echo "</tr>";
          }
        echo "</table>";
      }
    }
    /*if the button is not pressd*/
    /*
    else
    {
      $result=mysqli_query($db,"SELECT * FROM `books`;");

      echo "<table class='table table-bordered table-hover' >";
      echo "<tr style='background-color: #6db6b9e6;'>";

          echo "<th>";  echo "ISBN";  echo "</th>";
          echo "<th>";  echo "Book Name";  echo "</th>";
          echo "<th>";  echo "Author Name";  echo "</th>";
          echo "<th>";  echo "Edition";  echo "</th>";
          echo "<th>";  echo "Publication";  echo "</th>";
          echo "<th>";  echo "Status";  echo "</th>";
          echo "<th>";  echo "Quantity";  echo "</th>";
          echo "<th>";  echo "Department";  echo "</th>";

      echo "</tr>";

      while($row=mysqli_fetch_assoc($result))
      {
        echo "<tr>";
          echo "<td>";  echo $row['isbn'];  echo "</td>";
          echo "<td>";  echo $row['name'];  echo "</td>";
          echo "<td>";  echo $row['author'];  echo "</td>";
          echo "<td>";  echo $row['edition'];  echo "</td>";
          echo "<td>";  echo $row['publication'];  echo "</td>";
          echo "<td>";  echo $row['status'];  echo "</td>";
          echo "<td>";  echo $row['quantity'];  echo "</td>";
          echo "<td>";  echo $row['department'];  echo "</td>";

        echo "</tr>";
      }
    echo "</table>";
  }
  */

    /*kaaj choltese*/
    if (isset($_POST['submit_auth']))
    {
      ?>

      <h2>Search result for you desired Author - </h2>

      <?php

      $aq=mysqli_query($db,"SELECT * FROM books WHERE author like '%$_POST[search_auth]%' ");
      if(mysqli_num_rows($aq)==0)
      {
        echo "Sorry! No book found. Try searching again.";
      }
      else
      {
        echo "<table class='table table-bordered table-hover' >";
          echo "<tr style='background-color: #6db6b9e6;'>";

              echo "<th>";  echo "ISBN";  echo "</th>";
              echo "<th>";  echo "Book Name";  echo "</th>";
              echo "<th>";  echo "Author Name";  echo "</th>";
              echo "<th>";  echo "Edition";  echo "</th>";
              echo "<th>";  echo "Publication";  echo "</th>";
              echo "<th>";  echo "Status";  echo "</th>";
              echo "<th>";  echo "Quantity";  echo "</th>";
              echo "<th>";  echo "Department";  echo "</th>";

          echo "</tr>";

          while($a_row=mysqli_fetch_assoc($aq))
          {
            echo "<tr>";
              echo "<td>";  echo $a_row['isbn'];  echo "</td>";
              echo "<td>";  echo $a_row['name'];  echo "</td>";
              echo "<td>";  echo $a_row['author'];  echo "</td>";
              echo "<td>";  echo $a_row['edition'];  echo "</td>";
              echo "<td>";  echo $a_row['publication'];  echo "</td>";
              echo "<td>";  echo $a_row['status'];  echo "</td>";
              echo "<td>";  echo $a_row['quantity'];  echo "</td>";
              echo "<td>";  echo $a_row['department'];  echo "</td>";

            echo "</tr>";
          }
        echo "</table>";
      }
    }
    /*if the button is not pressed
    else
    {
      $auth_result=mysqli_query($db,"SELECT * FROM `books`;");

      echo "<table class='table table-bordered table-hover' >";
      echo "<tr style='background-color: #6db6b9e6;'>";

          echo "<th>";  echo "ISBN";  echo "</th>";
          echo "<th>";  echo "Book Name";  echo "</th>";
          echo "<th>";  echo "Author Name";  echo "</th>";
          echo "<th>";  echo "Edition";  echo "</th>";
          echo "<th>";  echo "Publication";  echo "</th>";
          echo "<th>";  echo "Status";  echo "</th>";
          echo "<th>";  echo "Quantity";  echo "</th>";
          echo "<th>";  echo "Department";  echo "</th>";

      echo "</tr>";

      while($a_row=mysqli_fetch_assoc($auth_result))
      {
        echo "<tr>";
          echo "<td>";  echo $a_row['isbn'];  echo "</td>";
          echo "<td>";  echo $a_row['name'];  echo "</td>";
          echo "<td>";  echo $a_row['author'];  echo "</td>";
          echo "<td>";  echo $a_row['edition'];  echo "</td>";
          echo "<td>";  echo $a_row['publication'];  echo "</td>";
          echo "<td>";  echo $a_row['status'];  echo "</td>";
          echo "<td>";  echo $a_row['quantity'];  echo "</td>";
          echo "<td>";  echo $a_row['department'];  echo "</td>";

        echo "</tr>";
      }
    echo "</table>";
  }*/

    /*kaaj shesh*/

    /*genre search er kaaj shuru*/

    if (isset($_POST['submit_genre']))
    {
      ?>

      <h2>Search result for you desired Genre - </h2>

      <?php

      $gq=mysqli_query($db,"SELECT * FROM books WHERE department like '%$_POST[search_genre]%' ");
      if(mysqli_num_rows($gq)==0)
      {
        echo "Sorry! No book found. Try searching again.";
      }
      else
      {
        echo "<table class='table table-bordered table-hover' >";
          echo "<tr style='background-color: #6db6b9e6;'>";

              echo "<th>";  echo "ISBN";  echo "</th>";
              echo "<th>";  echo "Book Name";  echo "</th>";
              echo "<th>";  echo "Author Name";  echo "</th>";
              echo "<th>";  echo "Edition";  echo "</th>";
              echo "<th>";  echo "Publication";  echo "</th>";
              echo "<th>";  echo "Status";  echo "</th>";
              echo "<th>";  echo "Quantity";  echo "</th>";
              echo "<th>";  echo "Department";  echo "</th>";

          echo "</tr>";

          while($g_row=mysqli_fetch_assoc($gq))
          {
            echo "<tr>";
              echo "<td>";  echo $g_row['isbn'];  echo "</td>";
              echo "<td>";  echo $g_row['name'];  echo "</td>";
              echo "<td>";  echo $g_row['author'];  echo "</td>";
              echo "<td>";  echo $g_row['edition'];  echo "</td>";
              echo "<td>";  echo $g_row['publication'];  echo "</td>";
              echo "<td>";  echo $g_row['status'];  echo "</td>";
              echo "<td>";  echo $g_row['quantity'];  echo "</td>";
              echo "<td>";  echo $g_row['department'];  echo "</td>";

            echo "</tr>";
          }
        echo "</table>";
      }
    }

    /*genre search er kaaj shesh*/

    /*rough starts*/
    ?>

    <h2>List of Books</h2>

    <?php
    $result=mysqli_query($db,"SELECT * FROM `books`;");

    echo "<table class='table table-bordered table-hover' >";
    echo "<tr style='background-color: #6db6b9e6;'>";

        echo "<th>";  echo "ISBN";  echo "</th>";
        echo "<th>";  echo "Book Name";  echo "</th>";
        echo "<th>";  echo "Author Name";  echo "</th>";
        echo "<th>";  echo "Edition";  echo "</th>";
        echo "<th>";  echo "Publication";  echo "</th>";
        echo "<th>";  echo "Status";  echo "</th>";
        echo "<th>";  echo "Quantity";  echo "</th>";
        echo "<th>";  echo "Department";  echo "</th>";

    echo "</tr>";

    while($row=mysqli_fetch_assoc($result))
    {
      echo "<tr>";
        echo "<td>";  echo $row['isbn'];  echo "</td>";
        echo "<td>";  echo $row['name'];  echo "</td>";
        echo "<td>";  echo $row['author'];  echo "</td>";
        echo "<td>";  echo $row['edition'];  echo "</td>";
        echo "<td>";  echo $row['publication'];  echo "</td>";
        echo "<td>";  echo $row['status'];  echo "</td>";
        echo "<td>";  echo $row['quantity'];  echo "</td>";
        echo "<td>";  echo $row['department'];  echo "</td>";

      echo "</tr>";
    }
  echo "</table>";

    /*rough ends*/


    if(isset($_POST['submit_del']))
    {
      if (isset($_SESSION['login_user']))
      {
        mysqli_query($db, "DELETE FROM books WHERE isbn = '$_POST[isbn]';");
        ?>
          <script type="text/javascript">
            alert("Delete Successful.");
          </script>
        <?php
      }
      else
      {
        ?>
          <script type="text/javascript">
            alert("Please login first.");
          </script>
        <?php
      }
    }

    ?>

  </body>
</html>
