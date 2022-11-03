<?php
  include "connection.php";
  include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Book Request</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<style type="text/css">
		.srch
		{
			padding-left: 1000px;

		}

    .form-control
		{
			width: 200px;
			height: 40px;
		}

		.body {
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
  color: white;
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
.img-circle
{
	margin-left: 20px;
}
.h:hover
{
	color:white;
	width: 300px;
	height: 50px;
	background-color: #00544c;
}
.scroll
{
  width: 100%;
  height: 440px;
  overflow: auto;
}
th,td
{
  width: 9%;
}

	</style>

</head>
<body>
<!--_________________sidenav_______________-->

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

<div class="container">
  <h2 style="text-align: center;">Information of Borrowed Books</h2>
  <?php
  $c=0;

    if(isset($_SESSION['login_user']))
    {
      $sql="SELECT student.username, roll, books.isbn, name, author, edition, issue, back FROM student INNER JOIN issue_book
      ON student.username = issue_book.username INNER JOIN books ON issue_book.isbn = books.isbn
      WHERE student.username='$_SESSION[login_user]' and issue_book.approval = 'Yes'ORDER BY back ASC";
      $res = mysqli_query($db,$sql);

      echo "<table class='table table-bordered table-hover' style='width: 99%'>";
    			echo "<tr style='background-color: #6db6b9e6;'>";
    				//Table header

    				echo "<th>"; echo "Student Username";  echo "</th>";
    				echo "<th>"; echo "Roll No";  echo "</th>";
    				echo "<th>"; echo "ISBN";  echo "</th>";
    				echo "<th>"; echo "Book Name";  echo "</th>";
            echo "<th>"; echo "Author Name";  echo "</th>";
            echo "<th>"; echo "Edition";  echo "</th>";
            echo "<th>"; echo "Issue Date";  echo "</th>";
            echo "<th>"; echo "Return Date";  echo "</th>";

    			echo "</tr>";
          echo "</table>";

          echo "<div class='scroll'>";
          echo "<table class='table table-bordered table-hover' >";

    			while($row=mysqli_fetch_assoc($res))
    			{
            $d=date("Y-m-d");

            if($d > $row['back'])
            {
              $c = $c+1;
              $var='<p style="color: red; "><b>EXPIRED</b></p>';
              mysqli_query($db, "UPDATE issue_book SET approval='$var'
              WHERE `back` = '$row[back]' and approval='Yes' limit $c;");

              echo $d."<br>";
            }

            echo "<tr>";
            echo "<td>"; echo $row['username']; echo "</td>";
            echo "<td>"; echo $row['roll']; echo "</td>";
            echo "<td>"; echo $row['isbn']; echo "</td>";
            echo "<td>"; echo $row['name']; echo "</td>";
            echo "<td>"; echo $row['author']; echo "</td>";
            echo "<td>"; echo $row['edition']; echo "</td>";
            echo "<td>"; echo $row['issue']; echo "</td>";
            echo "<td>"; echo $row['back']; echo "</td>";

    				echo "</tr>";
    			}

    		echo "</table>";
        echo "</div>";

    }
    else
    {
      ?>

  <h3 style="text-align: center;">Log in to see the information of borrowed books</h3>

      <?php
    }
  ?>

</div>

</div>
</body>
</html>
